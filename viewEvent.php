<?php
require_once 'Event.php';
require_once 'Connection.php';
require_once 'EventTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';



$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEventById($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/event.js"></script>
        <title></title>
        <link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        
        <h1>Event Management Company</h1>
        
        
        <table>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td class="view">Date</td>'
                    . '<td>' . $row['date'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="view">Time</td>'
                    . '<td>' . $row['time'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="view">Title</td>'
                    . '<td>' . $row['title'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="view">Attending</td>'
                    . '<td>' . $row['attending'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="view">Address</td>'
                    . '<td>' . $row['address'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="view">Event Manager</td>'
                    . '<td>' . $row['managerName'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="view">Price</td>'
                    . '<td>' . $row['price'] . '</td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
        <div class="actionsViewDiv">
            <p>
                <a class="actionsView" href="editEventForm.php?id=<?php echo $row['id']; ?>">
                    Edit Event</a>
                <a class="actionsView" href="deleteEvent.php?id=<?php echo $row['id']; ?>">
                    Delete Event</a>
            </p>
        </div>
    </body>
</html>
