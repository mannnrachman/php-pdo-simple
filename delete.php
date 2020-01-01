<?php
include 'conn.php';

$id = $_GET['id'];
$sql = "DELETE FROM karyawan WHERE idKaryawan =:id";
$delete = $conn->prepare($sql);
$delete->bindParam(":id", $_GET['id']);
$delete->execute();
header("location: index.php");

?>