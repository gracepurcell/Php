<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
			<button class="hidden-lg hidden-md hamburger col-sm-offset-5 col-sm-1 col-xs-offset-4 col-xs-1" type="button" ><a href="login.html"><i class="fa fa-bars fa-2x"></i></a></button>
					
			<button class="hidden-sm hidden-xs login" type="button" ><a href="login.php">SIGN IN</a></button>
				
			<button class="hidden-sm hidden-xs register" type="button" ><a href="login.php">REGISTER</a></button>
                    </div>
		</div>
            </div>
	</nav>

         <?php
        if (!isset($username)) {
            $username = '';
        }
        ?>
        
        <header>
            <div class="container 2">
                <div class="row">
                    <div class="col-md-6 Login-Register">
                        
                            <form action="checkLogin.php" method="POST">
                                <h1>Sign In</h1>
                                <table class="table" border="0">
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input class="input field form-control"
                                                       placeholder="Username"
                                                       type="text"
                                                       name="username"
                                                       value="<?php echo $username; ?>" />
                                                <span  id="usernameError" class="error">
                                                    <?php
                                                    if (isset($errorMessage) && isset($errorMessage['username'])) {
                                                        echo $errorMessage['username'];
                                                    }
                                                    ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input class="input field form-control" 
                                                       placeholder="Password"
                                                       type="password" 
                                                       name="password" 
                                                       value="" />
                                                <span id="passwordError" class="error">
                                                    <?php
                                                    if (isset($errorMessage) && isset($errorMessage['password'])) {
                                                        echo $errorMessage['password'];
                                                    }
                                                    ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div class="col-md-12">
                                                    <a href="#">Forget your password?</a>
						</div>
                                                <div class="col-md-2"> 
                                                    <i class=" fa fa-facebook-square fa-5x facebook"></i>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="loginbtn btn-default" type="submit" value="Login" name="login" />
                                                </div>
                                                
                                               
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </form>

                      
                    </div>
                    <div class="col-lg-6 Login-Register ">
                        
                        <form id="registerForm" 
                            action="checkRegister.php" 
                            method="POST" 
                            onsubmit="return validateRegistration(this);">
                            <h1>Register</h1>
                            <table class="table" border="0">
                              <tbody>
                                  <tr>
                                 
                                      <td>
                                          <input placeholder="Username" class="inputreg field form-control" type="text" name="username" value="<?php
                                              if (isset($_POST) && isset($_POST['username'])) {
                                                  echo $_POST['username'];
                                              }
                                          ?>" />
                                          <span id="usernameError" class="error">
                                              <?php
                                              if (isset($errorMessage) && isset($errorMessage['username'])) {
                                                  echo $errorMessage['username'];
                                              }
                                              ?>
                                          </span>
                                      </td>
                                  </tr>
                                  <tr>
                                   
                                      <td>
                                          <input placeholder="Password" class="inputreg field form-control" type="password" name="password" value="" />
                                          <span id="passwordError" class="error">
                                              <?php
                                              if (isset($errorMessage) && isset($errorMessage['password'])) {
                                                  echo $errorMessage['password'];
                                              }
                                              ?>
                                          </span>
                                      </td>
                                  </tr>
                                  <tr>
                                   
                                      <td>
                                          <input placeholder="Confirm Password" class="inputreg field form-control" type="password" name="password2" value="" />
                                          <span id="password2Error" class="error">
                                              <?php
                                              if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                                  echo $errorMessage['password2'];
                                              }
                                              ?>
                                          </span>
                                      </td>
                                  </tr>
                                  <tr>
                                      
                                      <td>
                                          <input class="loginbtn btn-default" type="submit" value="Register" name="register" />
                                      </td>
                                  </tr>
                              </tbody>
                          </table>

                      </form>
                    </div>
                 
                </div>
            </div>
            
        </header>
        
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
