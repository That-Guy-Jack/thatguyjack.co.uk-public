<!DOCTYPE html>
<html>
    <head>
        <title>ThatGuyJack - Networking and Infrastructure Engineer</title>
		<meta name="description" content="ThatGuyJack - Networking and Infrastructure Engineer">
		<meta property="og:description" content="ThatGuyJack - Networking and Infrastructure Engineer">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require_once('./assets/common/header.php');?>
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
    </head>
    <body>
    <div data-typesettings>
    <div class="content">
        <div class="content-header">
            <h1 class="main-header">ThatGuyJack</h1>
            <p class="header-footer">Networking and Infrastructure Engineer</p>
        </div>
        <div class="content-button-container">
            <button style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button" id="button1" name="button1" onclick='redirect("email")'>Email</button>
            <button style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button" id="button2" name="button2" onclick='redirect("github")'>GitHub</button>
            <button style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button" id="button3" name="button3" onclick='redirect("linkedin")'>Linkedin</button>
            <button style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button" id="button2" name="button2" onclick='redirect("twitch")'>Twitch</button>
            <button style="padding:15px 20px;font-size: 17px;margin:3px" class="content-button" id="button3" name="button3" onclick='redirect("discord")'>Discord</button>
        </div>
    </div>
    </div>
        <div id="background"></div>
        <script src="./assets/js/app.js"></script>
        <div class="white-content"></div>
    </body>
</html>
