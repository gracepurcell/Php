<?php
require_once 'Connection.php';
require_once 'EventTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEvents();
?>
<!DOCTYPE html>

<html>
    <head>
         <meta charset="UTF-8">
        <title>Prestige Parties</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
	<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
	<link href='css/font-awesome.css' rel='stylesheet' type='text/css'>
    </head>
    <body>
        
        <nav class="navbar navbar-default">
            <div class = "container 1">
		<div class="row">
                    <div class="col-md-2 col-xs-6 logo">
			<a href="index.html"><img src="images/logo.png" class="img-responsive"></a>
                    </div>
                    <div class="navbtns col-md-6 col-md-offset-2 col-xs-6">
                            <button type="button"><a href="index.html">HOME</a></button>
                            <button type="button"><a href="AllEvents.php">EVENTS</a></button>
                            <button type="button"><a href="locations.html">LOCATIONS</a></button>
                            <button type="button"><a href="AllManagers.php">MANAGERS</a></button>
                            <button type="button"><a href="resources.html">RESOURCES</a></button>
                    </div>
				
				
                    <div class="toolbar  col-md-offset-8 col-md-2 ">
			<button class="hidden-lg hidden-md hamburger col-sm-offset-5 col-sm-1 col-xs-offset-5 col-xs-1" type="button" ><a href="logout.php"><i class="fa fa-bars"></i></a></button>
					
			<!--<button class="hidden-sm hidden-xs login" type="button" ><a href="login.php">SIGN IN</a></button>-->
				
			<button class="hidden-sm hidden-xs register" type="button" ><a href="logout.php">LOGOUT</a></button>
                    </div>
		</div>
            </div>
	</nav>
        
        <section id="profile">
            <img src="images/profilehead1.jpg" class="img-responsive">
            <div class="container">
                <div class="heading col-lg-6 col-lg-offset-6">
                    <p>Would you like a drink?<i class="fa fa-glass"></i></p>
                </div>
            </div>
            
        </section>
        <?php require 'toolbar.php' ?>
        
        
        <div class="container eventpage">
            <h1>Events <i class="fa fa-calendar"></i></h1>
        <table class="profiletable table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Title</th>
                    <th>Attending</th>
                    <th>Address</th>
                    <th>Event Manager</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {


                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td>' . $row['time'] . '</td>';
                    echo '<td>' . $row['title'] . '</td>';
                    echo '<td>' . $row['attending'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['eventManager'] . '</td>';
                    echo '<td>' . $row['price'] . '</td>';
                    echo '<td>'
                    . '<a class="actions" href="viewEvent.php?id='.$row['id'].'">View</a> '
                    . '<a class="actions" href="editEventForm.php?id='.$row['id'].'">Edit</a> '
                    . '<a class="actions" href="deleteEvent.php?id='.$row['id'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';

                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createEventForm.php">Create Event</a></p>
        
        </div>
        
        <section id="backgroundf2">	
        <div class="container">	
            <div class="foot col-md-12">
                <div class="col-md-2 col-md-offset-1 ">
                    <nav class="footnav">
                        <a href="/html/">terms & conditions</a>
                        <a href="/css/">return policy</a>
                        <a href="/js/">reviews</a>
                        <a href="/jquery/">about shop</a>
                        <a href="/jquery/">securepayment</a>  
                    </nav>
                </div>

                <i class="fa fa-cc-paypal fa-3x iconcolor"></i>
                <i class="fa fa-cc-visa fa-3x iconcolor"></i>
                <i class="fa fa-cc-mastercard fa-3x iconcolor"></i>
                <i class="fa fa-cc-amex fa-3x iconcolor"></i>
            </div>
        </div>
    </section>
    </body>
</html>
