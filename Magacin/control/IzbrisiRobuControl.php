<?php
require_once ('../modeli/robaModel.php');
require_once ('../DataBaseConn.php');

$dbc = new DataBaseConn();
$robaModel = new RobaModel($dbc);
$bp = $dbc->getConnection();

$id = (int) @$_GET['ID'];
$robaModel->deleteRoba($id);

header("Location: /magacin.php");

?>