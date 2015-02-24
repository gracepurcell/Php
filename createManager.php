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
$gateway = new ManagerTableGateway($connection);


$name = $_POST['name'];
$phone = $_POST['phone'];


$id = $gateway->insertManager($name, $phone);

header('Location: home.php');