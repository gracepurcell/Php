<?php
require_once 'Manager.php';
require_once 'Connection.php';
require_once 'ManagerTableGateway.php';

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
$managerGateway = new ManagerTableGateway($connection);

$managerGateway->deleteManager($id);

header("Location: home.php");
?>


