<?php
require_once 'Event.php';
require_once 'Connection.php';
require_once 'EventTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEventById($id);

$row = $statement->fetch(PDO::FETCH_ASSOC);
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
			<a href="index.php"><img src="images/logo.png" class="img-responsive"></a>
                    </div>
                    <div class="navbtns col-md-6 col-md-offset-2 col-xs-6">
                            <button type="button"><a href="home.php">HOME</a></button>
                            <button type="button"><a href="AllEvents.php">EVENTS</a></button>
                            <button type="button"><a href="locations.html">LOCATIONS</a></button>
                            <button type="button"><a href="AllManagers.php">MANAGERS</a></button>
                            <button type="button"><a href="resources.html">RESOURCES</a></button>
                    </div>
				
				
                    <div class="toolbar col-md-2 ">
			<button class="hidden-lg hidden-md hamburger col-sm-offset-5 col-sm-1 col-xs-offset-5 col-xs-1" type="button" ><a href="logout.php"><i class="fa fa-bars"></i></a></button>
					
			<!--<button class="hidden-sm hidden-xs login" type="button" ><a href="login.php">SIGN IN</a></button>-->
				
			<button class="hidden-sm hidden-xs register" type="button" ><a href="logout.php">LOGOUT</a></button>
                    </div>
		</div>
            </div>
	</nav>
        
        <section>
            <div class="viewEventHead">
                <div class="container">
                    <p class="headicons"> 
                        <i class="fa fa-diamond"></i>
                        <i class="fa fa-motorcycle"></i>
                        <i class="fa fa-glass"></i>
                    </p>
                    
                </div>
            </div>
        </section>
        
        <div class="container moreDetails">
            
       
            <h1> More Details </h1>
            
            
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table class="table table-striped ">
                <tbody>
                   <?php 
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                        echo '<tr>';
                        echo '<td class="view">Date</td>' . '<td>' . $row['date'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td class="view">Time</td>' . '<td>' . $row['time'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td class="view">Title</td>' . '<td>' . $row['title'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td class="view">Attending</td>' . '<td>' . $row['attending'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td class="view">Address</td>' . '<td>' . $row['address'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td class="view">Event Manager</td>' . '<td>' . $row['managerName'] . '</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '<td class="view">Price</td>' . '<td>' . $row['price'] . '</td>';
                        echo '</tr>';
                    ?>
                </tbody>
            </table>
            <div class="actionsViewDiv">
                <p>
                    <a class="actionsView" href="editEventForm.php?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil-square-o fa-3x"></i></a>
                    <a class="actionsView" href="deleteEvent.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash-o fa-3x"></i></a>
                </p>
            </div>
        </div>
          <section id="backgroundf2">	
        <div class="container">	
            <div class="foot col-md-12">
                <div class="col-md-3  ">
                    <nav class="footnav">
                        <a href="/html/"><i class="diamond fa fa-diamond"></i>  terms & conditions</a>
                        <a href="/css/"><i class="diamond fa fa-diamond"></i>  return policy</a>
                        <a href="/js/"><i class="diamond fa fa-diamond"></i>  reviews</a>
                        <a href="/jquery/"><i class="diamond fa fa-diamond"></i>  about shop</a>
                        <a href="/jquery/"><i class="diamond fa fa-diamond"></i>  securepayment</a>  
                    </nav>
                </div>
                <div class="payment col-md-2">
                    <i class="fa fa-cc-paypal fa-2x iconcolor"></i>
                    <i class="fa fa-cc-visa fa-2x iconcolor"></i>
                    <i class="fa fa-cc-mastercard fa-2x iconcolor"></i>
                    <i class="fa fa-cc-amex fa-2x iconcolor"></i>
                </div>
                
            </div>
        </div>
    </section>
    </body>
</html>
