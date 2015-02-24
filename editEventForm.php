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
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/event.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    </head>
    <body>
        
        <h1>Event Management Company</h1>
        
        <?php require 'toolbar.php' ?>
        <h2>Edit Event Form</h2>
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
    </body>
</html>
