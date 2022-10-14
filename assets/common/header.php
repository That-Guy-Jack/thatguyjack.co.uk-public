<?php 
echo '
            <meta name="keywords" content="ThatGuyJack">
            <meta property="og:title" content="ThatGuyJack">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="/assets/css/style.css"/>
            <link rel="stylesheet" media="screen and (max-width: 900px)" href="/assets/css/800style.css" />
            <link type="text/plain" rel="author" href="/humans.txt" />
            <script type="text/javascript" src="/assets/js/tsparticles.min.js"></script>
            <meta property="og:image" content="/assets/img/icon.png">
            <link rel="icon" href="/assets/img/icon.png"></link>
            <meta name="icon" content="/assets/img/icon.png"> 
	    <script defer data-domain="thatguyjack.co.uk" src="https://analytics.uk.tgj.services/js/plausible.js"></script>
            
            <script>
              function redirect(page){
                if(page == "github"){
                	window.open("https://github.com/That-Guy-Jack", "_blank");
                }
                if(page == "discord" ){
                	window.open("/discord", "_blank");
                }
                if(page == "email"){
                	window.open("/email", "_blank");
                }            
                if(page == "twitch"){
                    window.open("/twitch", "_blank");
                }
                if(page == "linkedin"){
                    window.open("/linkedin", "_blank");
                }
                if(page == "panel" ){
                	window.open("https://panel.thatguyjack.co.uk", "_blank");
                }
                if(page == "nextcloud"){
                	window.open("https://nextcloud.thatguyjack.co.uk", "_blank");
                }            
                if(page == "cdn"){
                    window.open("https://cdn.thatguyjack.co.uk", "_blank");
                }
              }
              function invite(bot){
                if(bot == "utils"){
                    window.location.href = "https://discord.com/oauth2/authorize?client_id=774995904683966505&permissions=20041280&scope=bot"
                }
                if(bot=="weeb"){
                    window.location.href = "https://discord.com/oauth2/authorize?client_id=795101278979227668&scope=bot" 
                }
                if(bot=="mubot"){
                    window.location.href  = "https://discord.com/oauth2/authorize?client_id=887071515210842173&permissions=380141424448&scope=bot"
                }
            }
            </script>';	
?>
