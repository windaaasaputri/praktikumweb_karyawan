<?php
include_once "../database/database.php";

$id = $_GET['id'];
$deleteSQL = "DELETE FROM `karyawan` WHERE `karyawan`.`id` = ?";
$database = new Database();
$connection = $database->getConnection();
$statement = $connection->prepare($deleteSQL);
$statement->bindParam(1, $id);
$statement->execute();

header('Location: main.php?page=karyawan');

?>