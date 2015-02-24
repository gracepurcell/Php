<?php
require_once 'Connection.php';
require_once 'EventTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEvent();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/events.js"></script>
        <title></title>
        <link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <table>
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
    </body>
</html>
