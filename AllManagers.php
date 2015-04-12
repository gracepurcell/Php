<?php
require_once 'Connection.php';
require_once 'ManagerTableGateway.php';
require_once 'EventTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$managerGateway = new ManagerTableGateway($connection);
$gateway = new EventTableGateway($connection);

$managers = $managerGateway->getManagers();

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
        
        <section id="profile">
            <img src="images/manager1.jpg" class="img-responsive">
            <div class="container">
                <div class="heading col-lg-6 col-lg-offset-6">
                    <p>Anything I can help with?<i class="fa fa-glass"></i></p>
                </div>
            </div>
            
        </section> 
       
       <div class="container eventpage">
            <h1>Managers <i class="fa fa-briefcase"></i></h1>
            <table class="profiletable table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                $row = $managers->fetch(PDO::FETCH_ASSOC);
                while ($row) {


                    echo '<td>' . $row['ID'] . '</td>';
                    echo '<td>' . $row['Name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['phone'] . '</td>';
                    echo '<td>'
                    . '<a class="actions" href="viewManager.php?id='.$row['ID'].'"><i class="fa fa-plus"></i></a> '
                    . '<a class="actions" href="editManagerForm.php?id='.$row['ID'].'"><i class="fa fa-pencil-square-o"></i></a> '
                    . '<a class="actions" href="deleteManager.php?id='.$row['ID'].'"><i class="fa fa-trash-o"></i></a> '
                    . '</td>';
                    echo '</tr>';

                    $row = $managers->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <div class="create col-md-2">
            <p><a href="createManager.php">Create Manager</a></p>
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
