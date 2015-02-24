<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <?php
        if (!isset($username)) {
            $username = '';
        }
        ?>
        
        <h1>Event Management Company</h1>
        
        <form action="checkLogin.php" method="POST">
            <table class="login" border="0">
                <tbody>
                    <tr>
                        <td>Username</td>
                        <td>
                            <input class="input"
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
                        <td>Password</td>
                        <td>
                            <input class="input" type="password" name="password" value="" />
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
                            <input class="button1" type="submit" value="Login" name="login" />
                            <input class="button1"type="button" value="Register" name="register" onclick="document.location.href = 'register.php'"/>
                            <input class="button1"type="button" value="Forgot Password" name="forgot" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
