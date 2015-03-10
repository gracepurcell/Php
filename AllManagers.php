<?php
require_once 'Connection.php';
require_once 'ManagerTableGateway.php';
require_once 'EventTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$managerGateway = new ManagerTableGateway($connection);
$gateway = new EventTableGateway($connection);

$managers = $managerGateway->getManagers();
$statement = $gateway->getEventsByManagerId($id);
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
        <h2>Manager Table</h2>
        <table>
            <thead>
                <tr>
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


                    echo '<td>' . $row['Name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['phone'] . '</td>';
                    echo '<td>'
                    . '<a class="actions" href="viewManager.php?id='.$row['ID'].'">View</a> '
                    . '<a class="actions" href="editManagerForm.php?id='.$row['ID'].'">Edit</a> '
                    . '<a class="actions" href="deleteManager.php?id='.$row['ID'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';

                    $row = $managers->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createManager.php">Create Manager</a></p>
        
        <h2></h2>
        <?php if (!empty($events)) { ?>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Title</th>
                    <th>Attending</th>
                    <th>Address</th>
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
        <?php } else {?>
        
        <p>There are no programmers assigned to this manager </p>
        
        <?php } ?>
    </body>
</html>
