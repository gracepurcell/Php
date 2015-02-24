<?php
require_once 'Event.php';
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
        
        <h1>Prestige Parties</h1>
        
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        
        <div class = "aboutUs">
            <h2> About Us </h2>
            <p> Lorem Ipsum is simply dummy text of the printing and 
                typesetting industry. Lorem Ipsum has been the industry's 
                standard dummy text ever since the 1500s, when an unknown
                printer took a galley of type and scrambled it to make a 
                type specimen book. It has survived not only five centuries, 
                but also the leap into electronic typesetting, remaining 
                essentially unchanged. It was popularised in the 1960s with 
                the release of Letraset sheets containing Lorem Ipsum passages, 
                and more recently with desktop publishing software like Aldus 
                PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
        <!--<table>
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
        <p><a href="createEventForm.php">Create Event</a></p>-->
    </body>
</html>
