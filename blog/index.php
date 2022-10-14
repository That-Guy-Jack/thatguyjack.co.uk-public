<?php
//$postsFile = fread("blog-posts.txt","r") or die("Unable to read file");

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);


$servername = "192.168.5.16";
$username = "blog";
$password = "Blog32145";
$dbname = "Blog_db";

//Create Connection
$conn = new mysqli($servername,$username,$password,$dbname);
//Check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

// Get the posts and post information
$sql = "SELECT p_id, p_title, p_txtaddr, p_datetime FROM posts ORDER BY p_id DESC";
$result = $conn->query($sql);
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
		<title>ThatGuyJack - Blog</title>
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
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8305559085677433" crossorigin="anonymous"></script>
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
			<div class="content-header">
                	<h1 class="main-header">ThatGuyJack's Blog</h1>
            	    <p class="header-footer">Take A look at the cool Things i've done!</p>
        	</div>
		<?php
		// This is the important bit, it displays the posts
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo "<br>";
				echo "<hr>";
				echo "<article>";
				echo "<section>";
				echo "<h2>". $row["p_title"] . "</h2>";
				echo "<h1>". $row["p_datetime"] . "</h1>";

				$readposts = file("posts/".$row["p_txtaddr"]);
				for ($i=0; $i < sizeof($readposts); $i++){
				echo "$readposts[$i]";
				}
				echo "</section>";
				echo "</article>";
		
			}
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
