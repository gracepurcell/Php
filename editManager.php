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

$id = $_POST['ID'];
$name = $_POST['Name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];


$managerGateway->updateManager($id, $name, $phone, $address, $email);

header('Location: AllManagers.php');






