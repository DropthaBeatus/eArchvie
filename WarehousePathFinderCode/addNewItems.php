<?php
require_once "../db.conf";
require_once('dbcontroller.php');

//written by: Liam Flaherty and Micheal Ehenes
//tested by: Liam Flaherty
//debugged by: Liam Flaherty

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$itemName = $_POST['itemName'];
$itemCode = $_POST['itemCode'];
$quantity = $_POST['quantity'];
$cost = $_POST['cost'];
$LocX = $_POST['coordx'];
$LocY = $_POST['coordy'];
$warehouseID = $_SESSION['WarehouseID'];




if($mysqli->connect_error){
    die('Connect Error('. $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}


$query = "insert into StoreItems( WarehouseID, itemCode, itemName, itemQuantity, itemCost, itemLocX, itemLocY) values('$warehouseID', '$itemCode', '$itemName', '$quantity', '$cost', '$LocX', '$LocY');";

$result = $mysqli->query($query);
$result->close();

$mysqli->close();


?>
