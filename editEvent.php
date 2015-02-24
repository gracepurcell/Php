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

$id = $_POST['id'];
$date = $_POST['date'];
$time = $_POST['time'];
$title = $_POST['title'];
$attending = $_POST['attending'];
$address = $_POST['address'];
$eventManager = $_POST['eventManager'];
$price = $_POST['price'];


$gateway->updateEvent($id, $date, $time, $title, $attending, $address, $eventManager, $price);

header('Location: home.php');






