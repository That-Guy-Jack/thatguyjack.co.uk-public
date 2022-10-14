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
            <img class="nav-logo" id="logo" src="./assets/img/default-monochrome.svg"/>
            <a href="/">Home</a>
            <a href="/minecraft">Minecraft</a>
            <a href="/online/" target="_blank"> Mc Players</a>
            <a href="/graph/" target="_blank" >Server Stats</a>
            <a href="/blog">Blog</a>
        	<a href="/apps">Apps</a>
        </div>';
		}	
?>