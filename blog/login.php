<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: home.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
 <?php
function is_mobile() {
    if (empty($_SERVER['HTTP_USER_AGENT'])) {
        $is_mobile = false;
    } else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false
        // many mobile devices (all iPhone, iPad, etc.)
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false) {
        $is_mobile = true;
    } else {
        $is_mobile = false;
    }
    return $is_mobile;
}
?>

<!DOCTYPE html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://thatguyjack.co.uk/blog/css/style.css"/>
		<link rel="stylesheet" media="screen and (max-width: 900px)" href="https://thatguyjack.co.uk/blog/css/800style.css" />
		<title>ThatGuyJack - Blog - login</title>
        <link rel="icon" href="https://thatguyjack.co.uk/img/icon.png"></link>
		<meta name="description" content="ThatGuyJack - Blog">
		<meta name="icon" content="https://thatguyjack.co.uk/img/icon.png"> 
		<meta property="og:title" content="ThatGuyJack">
		<meta property="og:description" content="ThatGuyJack - Blog">
		<meta property="og:image" content="https://thatguyjack.co.uk/img/icon.png">
		<meta name="keywords" content="ThatGuyJack">
		<link type="text/plain" rel="author" href="https://thatguyjack.co.uk/humans.txt" />
		<style>
        .content-button{
            padding:15px 20px;
            border: 4px solid #685B60;
            background-color: transparent;
            color: black;
            font-size: 17px;
            margin:3px;
            opacity: 0;
            animation: fadeInAnimation 2s ease 1s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
            cursor: pointer;
            transition-duration: 0.2s;
            outline:none;
        }
        </style>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-1B4VZC6B39"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1B4VZC6B39');
</script>
        <script type="text/javascript" src="https://thatguyjack.co.uk/js/tsparticles.min.js"></script>

	</head>
<body>
	<div data-typesettings>	
	<?php 
		if (is_mobile()) {
			echo '
			<div class="mnav">
            <a href="/">Home</a>
            <a href="/minecraft">Minecraft</a>
            <a href="/online/" target="_blank"> Mc Players</a>
            <a href="/graph/" target="_blank" >Server Stats</a>
            <a href="/blog">Blog</a>
        	<a href="/apps">Apps</a>
        </div>';
		} else {
			echo '
			<div class="nav">
            <img class="nav-logo" id="logo" src="https://thatguyjack.co.uk/img/default-monochrome.svg"/>
            <a href="/">Home</a>
            <a href="/minecraft">Minecraft</a>
            <a href="/online/" target="_blank"> Mc Players</a>
            <a href="/graph/" target="_blank" >Server Stats</a>
            <a href="/blog">Blog</a>
        	<a href="/apps">Apps</a>
        </div>';
		}	

		?>
		<div class="content">
			<div id="div_login" class="header-footer">
			<h1 class="main-header">Login</h1>
			<br>
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box-login" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <input type="password" name="password"  placeholder="Password" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box-login" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit"value="Login" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button">
            </div>
        </form>
	</div>
	</div>

	<div id="background"></div>
        <script src="https://thatguyjack.co.uk/js/app.js"></script> 
        <div class="white-content"></div>
		<script src="https://xm87n2fnxq21.statuspage.io/embed/script.js"></script>
</body>
</html>