<?php
require_once ('../model/racunarModel.php');
require_once ('../DataBaseConn.php');

$dbc = new DatabaseConn();
$racunarModel = new RacunarModel($dbc);
$bp = $dbc->getConnection();

$proizvodjac = mysqli_real_escape_string($bp, @$_POST['proizvodjac']);
$model = mysqli_real_escape_string($bp, @$_POST['model']);
$korisnik_id = mysqli_real_escape_string($bp, @$_POST['korisnik']);
$racunar_id = mysqli_real_escape_string($bp, @$_POST['ID']);

$racunarModel->updateRacunar($proizvodjac,$model,$korisnik_id,$racunar_id);

header("Location: /organizacija.php");
?>