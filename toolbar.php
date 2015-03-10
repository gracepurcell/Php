<?php
$session_id = session_id();
if ($session_id == "") {
    session_start();
}
if (isset($_SESSION['username'])) {
?>
    <div>
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="AllEvents.php">EVENTS</a></li>	
            <li><a href="AllManagers.php">MANAGERS</a></li>
            <li><a href="AllLocations.php">LOCATIONS</a></li>
            <li><a href="AllLocationM.php">LOCATION MANAGERS</a></li>
            <li><a href="Contact.html">CONTACT</a></li>
            <li><a href="index.php">ABOUT US</a></li>
         </ul>
    </div>
    <div>
        <a href="logout.php">Logout</a>
    </div>
<?php
}

    
else {
    echo '<p><a href="index.php">Home</a></p>';
    echo '<p><a href="login.php">Login</a></p>';
}