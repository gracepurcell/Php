<?php
require_once 'Manager.php';
require_once 'Connection.php';
require_once 'ManagerTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$managerGateway = new ManagerTableGateway($connection);

$managers = $managerGateway->getManagerById($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/manager.js"></script>
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
                $row = $managers->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td class="view">Name</td>'
                    . '<td>' . $row['name'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="view">Phone</td>'
                    . '<td>' . $row['phone'] . '</td>';
                    echo '</tr>';
                    
                ?>
            </tbody>
        </table>
        <div class="actionsViewDiv">
            <p>
                <a class="actionsView" href="editManagerForm.php?id=<?php echo $row['ID']; ?>">
                    Edit Manager</a>
                <a class="actionsView" href="deleteManager.php?id=<?php echo $row['ID']; ?>">
                    Delete Manager</a>
                <a class="actionsView" href="createManagerForm.php?id=<?php echo $row['ID']; ?>">
                    Create Manager</a>
            </p>
        </div>
    </body>
</html>
