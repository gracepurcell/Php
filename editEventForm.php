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
        
        
       <div class="container editEvent">
            <h1>Edit Event Form</h1>
            <?php
            if (isset($errorMessage)) {
                echo '<p>Error: ' . $errorMessage . '</p>';
            }
            ?>
        
        
        
        
        <form id="editEventForm" name="editEventForm" action="editEvent.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table class="editTable" border="0">
                <tbody>
                    <tr>
                        <td>Date</td>
                        <td>
                            <input type="text" name="date" value="<?php
                                if (isset($_POST) && isset($_POST['date'])) {
                                    echo $_POST['date'];
                                }
                                else echo $row['date'];
                            ?>" />
                            <span id="emailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['date'])) {
                                    echo $errorMessage['date'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>
                            <input type="text" name="time" value="<?php
                                if (isset($_POST) && isset($_POST['time'])) {
                                    echo $_POST['time'];
                                }
                                else echo $row['time'];
                            ?>" />
                            <span id="emailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['time'])) {
                                    echo $errorMessage['time'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="title" value="<?php
                                if (isset($_POST) && isset($_POST['title'])) {
                                    echo $_POST['title'];
                                }
                                else echo $row['title'];
                            ?>" />
                            <span id="titleError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['title'])) {
                                    echo $errorMessage['title'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Attending</td>
                        <td>
                            <input type="text" name="attending" value="<?php
                                if (isset($_POST) && isset($_POST['attending'])) {
                                    echo $_POST['attending'];
                                }
                                else echo $row['attending'];
                            ?>" />
                            <span id="attendingError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['attending'])) {
                                    echo $errorMessage['attending'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="<?php
                                if (isset($_POST) && isset($_POST['address'])) {
                                    echo $_POST['address'];
                                }
                                else echo $row['address'];
                            ?>" />
                            <span id="addressError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['address'])) {
                                    echo $errorMessage['address'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Event Manager</td>
                        <td>
                            <input type="text" name="eventManager" value="<?php
                                if (isset($_POST) && isset($_POST['eventManager'])) {
                                    echo $_POST['eventManager'];
                                }
                                else echo $row['eventManager'];
                            ?>" />
                            <span id="eventManagerError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['eventManager'])) {
                                    echo $errorMessage['eventManager'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>
                            <input type="text" name="price" value="<?php
                                if (isset($_POST) && isset($_POST['price'])) {
                                    echo $_POST['price'];
                                }
                                else echo $row['price'];
                            ?>" />
                            <span id="priceError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['price'])) {
                                    echo $errorMessage['price'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Update Event" name="updateEvent" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
            
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
                        <a href="/jquery/"><i class="diamond fa fa-diamond"></i>  secure payment</a>  
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
