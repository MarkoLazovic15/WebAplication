<?php
require_once ("../DataBaseConn.php");
require_once ("../model/racunarModel.php");

$dbc = new DataBaseConn();
$bp = $dbc->getConnection();

$proizvodjac = mysqli_real_escape_string($bp,$_POST['proizvodjac']);
$model = mysqli_real_escape_string($bp, $_POST['model']);
$korisnik_id = mysqli_real_escape_string($bp,$_POST['korisnik']);

$racunarModel = new RacunarModel($dbc);
$racunarModel->dodajRacunar($proizvodjac,$model,$korisnik_id);

header("Location: /organizacija.php");