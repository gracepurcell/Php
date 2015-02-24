<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/programmer.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Create Event Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="creatEventForm" name="createEventForm" action="createEvent.php" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Date</td>
                        <td>
                            <input type="text" name="date" value="" />
                            <span id="emailError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>
                            <input type="text" name="time" value="" />
                            <span id="emailError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="title" value="" />
                            <span id="titleError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Attending</td>
                        <td>
                            <input type="text" name="attending" value="" />
                            <span id="attendingError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="" />
                            <span id="addressError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Event Manager</td>
                        <td>
                            <input type="text" name="eventManager" value="" />
                            <span id="eventManagerError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>
                            <input type="text" name="price" value="" />
                            <span id="priceError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Event" name="createEvent" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
