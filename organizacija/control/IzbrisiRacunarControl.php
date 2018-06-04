<?php
require_once ('../model/racunarModel.php');
require_once ('../DataBaseConn.php');

$dbc = new DataBaseConn();
$racunarModel = new RacunarModel($dbc);
$bp = $dbc->getConnection();

$id = (int) @$_GET['ID'];
$racunarModel->deleteRacunar($id);

header("Location: /organizacija.php");

?>