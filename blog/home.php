<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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
<html>
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
				<form method='post' action="home.php">
					<div id="div_login" class="header-footer">
					<h1 class="main-header">New Post:</h1>
					<br>
					</div>
						<input type="text" placeholder="Title" name="postTitle" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box-login">
						<br>					
						<label data-children-count="1">
							<textarea name="postBody" rows="7" placeholder="Enter the post" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-box" ></textarea>
						</label>
						<br>
						<input type="submit" value="Post" style="padding:15px 20px;font-size: 17px;margin:3px " class="content-button">
				</form>
				<br>
				<a href="logout.php" style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button">Logout</a>
<?php
$title = "";
$body = "";
$bodyAddress = "";
$filetitle = "";
	if(array_key_exists('postTitle',$_POST)){
		$title = $_POST["postTitle"];				
		
		if(array_key_exists('postBody',$_POST)){
			$body = $_POST["postBody"];
				$filetitle = preg_replace('/\s+/', '-',$title). ".txt";
				$file = fopen("/var/www/Blog/posts/".$filetitle,"w");
				fwrite($file,$body);
				fclose($file);
		}
	}
	/*
	if(array_key_exists('postBody',$_POST)){
		$body = $_POST["postBody"];
		$filetitle = preg_replace('/\s+/', '-',$title);
	}*/
	if(array_key_exists('postTitle',$_POST) && array_key_exists('postBody',$_POST)){
		if($title != "" && $body != ""){
			WritePost($title,$filetitle);
			echo "$filetitle <br>";
			echo "$title<br>";
			echo "$body<br>";
		} else {
			echo "No Post written!";
		}
	}
	function WritePost($title,$filetitle){
		$servername = "192.168.5.16";
		$username = "blog";
		$password = "Blog32145";
		$dbname = "Blog_db";
		$date = date("Y-m-d");

		$conn = new mysqli($servername,$username,$password,$dbname);
		if($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO posts (p_title, p_txtaddr, p_datetime) VALUES ('".$title."', '".$filetitle."', '".$date."');";
		echo "$sql <br>";
		if ($conn->query($sql) === TRUE){
			echo "New post created successfully!";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
?>
</div>
		</div>
			<div id="background"></div>
       		<script src="https://thatguyjack.co.uk/js/app.js"></script> 
        	<div class="white-content"></div>
			<script src="https://xm87n2fnxq21.statuspage.io/embed/script.js"></script>
		</body>
</html>