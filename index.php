
<?php
require_once 'Event.php';
require_once 'Connection.php';
require_once 'EventTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

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
			<a href="index.php"><img src="images/logo.png" class="img-responsive"></a>
                    </div>
                    <!--<div class="navbtns col-md-6 col-md-offset-2 col-xs-6">
                            <button type="button"><a href="index.html">HOME</a></button>
                            <button type="button"><a href="events.html">EVENTS</a></button>
                            <button type="button"><a href="locations.html">LOCATIONS</a></button>
                            <button type="button"><a href="managers.html">MANAGERS</a></button>
                            <button type="button"><a href="resources.html">RESOURCES</a></button>
			</div>-->
				
				
                    <div class="toolbar  col-md-offset-8 col-md-2 ">
			<button class="hidden-lg hidden-md hamburger col-sm-offset-5 col-sm-1 col-xs-offset-5 col-xs-1" type="button" ><a href="login.html"><i class="fa fa-bars"></i></a></button>
					
			<button class="hidden-sm hidden-xs login" type="button" ><a href="login.php">SIGN IN</a></button>
				
			<button class="hidden-sm hidden-xs register" type="button" ><a href="login.php">REGISTER</a></button>
                    </div>
		</div>
            </div>
	</nav>
        
    <header>
        <img src="images/hero.jpg" class="hero-unit img-responsive">
            <div class="container 2">

                <div class="row">
                    <div class="col-md-12">
                        <div class=" img-responsive">
                            <div class="col-lg-12 ">
                                <p class="head">PRESTIGE PARTIES</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </header>

<!--  - - - - - - - - - - -  - - - - - - - - - - - - - -NEXT PAGE - - - - - - - - - - - - - - - - - - - - - - - - - - - -->		

    <section id="background">
        <div class="container three">

            <div class="row three">
                <div class="content col-sm-8 col-sm-offset-1 col-md-3 ">
                    <h2>How can we help you have a good time?</h2>
                    <p class="sub">Lorem Ipsum is simply dummy text of the printing.</p>
                    <p class="cont">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard  </p>
                    <button type="button" class="btn">How</button>
                </div>

                <div class="hidden-sm hidden-xs contentimg img-responsive col-md-8">
                <img src="images/about1.jpg" class="img-responsive img-rounded">
                </div>
            </div>
        </div>
    </section>		

<!-- - - - - - - - - - - - - - - - - - - - - - - - -  -SECTION - - - - - - - - - - - - - - - - -  -->		



<!--  - - - - - - - - - - - - - - - - - - - - - - - - FOOTER - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
				
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
