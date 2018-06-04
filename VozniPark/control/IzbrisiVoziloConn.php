<?php
require_once ("../modeli/VozilaModel.php");
require_once ('../DatabaseConn.php');

$databaseConn = new DatabaseConn();
$vozilaModel = new VozilaModel($databaseConn);

$ID = (int) @$_GET['ID'];
$vozilaModel->deleteCar($ID);

header("Location: /VozniPark.php");
?>