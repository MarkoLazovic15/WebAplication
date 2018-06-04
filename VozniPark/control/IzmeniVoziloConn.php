<?php
require_once ('../DatabaseConn.php');
require_once ('../modeli/VozilaModel.php');

$databaseConn = new DatabaseConn();
$bp = $databaseConn->getConnection();

$model          = mysqli_real_escape_string($bp, @$_POST['Model']);
$proizvodjac    = mysqli_real_escape_string($bp, @$_POST['Proizvodjac']);
$registracija   = mysqli_real_escape_string($bp, @$_POST['Registracija']);
$vozac_id       = mysqli_real_escape_string($bp, @$_POST['Vozac']);
$vozilo_id      = mysqli_real_escape_string($bp, @$_POST['ID']);

$vm = new VozilaModel($databaseConn);
$vm->updateCar($proizvodjac,$model,$registracija,
$vozac_id,$vozilo_id);

header("Location: /VozniPark.php");