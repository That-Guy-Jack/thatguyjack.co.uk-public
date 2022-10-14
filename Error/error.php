<!DOCTYPE html>
<html>
    <head>
        <title>ThatGuyJack - Generic Error</title>
        <link rel="icon" href="https://thatguyjack.co.uk/img/icon.png"></link>
		<meta name="description" content="ThatGuyJack - Generic Error">
		<meta name="icon" content="https://thatguyjack.co.uk/img/icon.png"> 
		<meta property="og:title" content="ThatGuyJack">
		<meta property="og:description" content="ThatGuyJack - Generic Error">
		<meta property="og:image" content="https://thatguyjack.co.uk/img/icon.png">
		<meta name="keywords" content="ThatGuyJack">
		<link type="text/plain" rel="author" href="https://thatguyjack.co.uk/humans.txt" />
        <link rel="stylesheet" href="https://thatguyjack.co.uk/css/style.css"/>
        <style>
        .content-button{
            padding:15px 20px;
            border: 4px solid #d91600;
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
        <script type="text/javascript" src="https://thatguyjack.co.uk/js/tsparticles.min.js"></script>
        <script>
            function redirect(page){
                if(page == "discord" ){
                	window.open('/discord', '_blank');
                }
                if(page == "email"){
                	window.open('/email', '_blank');
                }            
                if(page == "home"){
                    window.open('/');
                }
            }
        </script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1B4VZC6B39"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-1B4VZC6B39');
</script>
    </head>
    <body>                 
        <div class="nav">
            <img class="nav-logo" id="logo" src="https://thatguyjack.co.uk/img/default-monochrome.svg"/>
        </div>
        <div class="content">
            <div class="content-header">
                <h1 class="main-header">Oops Looks Like there was a error!</h1>
                <p class="header-footer">Generic Error, Contact The server Admin For help</p>
            </div>
        	<div class="content-button-container">
                <button style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button" id="button3" name="button3" onclick='redirect("home")'>Home</button>
                <button style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button" id="button1" name="button1" onclick='redirect("email")'>Email</button>
                <button style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button" id="button3" name="button3" onclick='redirect("discord")'>Discord</button>
            </div>
        </div>
        <div id="background"></div>
        <script>
            tsParticles.loadJSON("background", "https://thatguyjack.co.uk/assets/particles-error.json").then(function (container) {
                container.start;
            });
        </script>
        <div class="white-content">
        </div>
    </body>
</html>
