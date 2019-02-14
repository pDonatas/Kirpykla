<?php
require('../head.php');
if(!$_SESSION['logged']) header("location: login.php");
$query = $system->pdo->prepare("SELECT * FROM `reservations` WHERE id=?");
$query->execute(array($_GET['id']));
if($query->rowCount() > 0){
	$query = $system->pdo->prepare("DELETE FROM `reservations` WHERE id=?");
	$query->execute(array($_GET['id']));
}
header("location: index.php");
?>