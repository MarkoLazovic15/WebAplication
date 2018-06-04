<?php
require_once ('../DatabaseConn.php');
require_once ('../modeli/VozaciModel.php');

$databaseConn = new DatabaseConn();
$bp = $databaseConn->getConnection();

$ime       = mysqli_real_escape_string($bp, @$_POST['Ime']);
$prezime   = mysqli_real_escape_string($bp, @$_POST['Prezime']);
$vozac_id  = mysqli_real_escape_string($bp, @$_POST['ID']);
print_r($vozac_id);
$vozaciModel = new VozaciModel($databaseConn);
$vozaciModel->updateDriver($ime,$prezime,$vozac_id);

header("Location: /VozniPark.php");