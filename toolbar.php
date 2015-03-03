<?php
$session_id = session_id();
if ($session_id == "") {
    session_start();
}
if (isset($_SESSION['username'])) {
    echo '<div class="navbar col-md-6 col-md-offset-1">';
    echo '<ul class="nav nav-pills nav-justified">';
    echo '<li role="presentation"><a href="index.php" data-hover="HOME">HOME</a></li>';
    echo '<li role="presentation"><a href="AllEvents.php" data-hover="EVENTS">EVENTS</a></li>';	
    echo '<li role="presentation"><a href="AllManagers.php" data-hover="MANAGERS">MANAGERS</a></li>';
    echo '<li role="presentation"><a href="AllLocations.php" data-hover="LOCATIONS">LOCATIONS</a></li>' ;
    echo '<li role="presentation"><a href="AllLocationM.php" data-hover="LOCATION MANAGERS">LOCATION MANAGERS</a></li>';
    echo '<li role="presentation"><a href="Contact.html" data-hover="CONTACT">CONTACT</a></li>';
    echo '<li role="presentation"><a href="index.php" data-hover="ABOUT US">ABOUT US</a></li>';
    echo '</ul>';
    echo '</div>';
}

    
else {
    echo '<p><a href="index.php">Home</a></p>';
    echo '<p><a href="login.php">Login</a></p>';
}