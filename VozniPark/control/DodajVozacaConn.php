<?php
require_once ('../DatabaseConn.php');
require_once ('../modeli/VozaciModel.php');

$databaseConn = new DatabaseConn();
$bp = $databaseConn->getConnection();

$ime       = mysqli_real_escape_string($bp, @$_POST['Ime']);
$prezime   = mysqli_real_escape_string($bp, @$_POST['Prezime']);

$vozaciModel = new VozaciModel($databaseConn);
$vozaciModel->addDriver($ime,$prezime);

header("Location: /VozniPark.php");