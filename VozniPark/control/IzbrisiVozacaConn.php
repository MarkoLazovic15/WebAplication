<?php
require_once ('../DatabaseConn.php');
require_once ('../modeli/VozaciModel.php');

$databaseConn = new DatabaseConn();
$bp = $databaseConn->getConnection();

$ID = (int) @$_GET['ID'];

$vozaciModel = new VozaciModel($databaseConn);
$vozaciModel->deleteDriver($ID);

header("Location: /VozniPark.php");