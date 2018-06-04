<?php
require_once ("../DataBaseConn.php");
require_once ("../model/korisnikModel.php");

$dbc = new DataBaseConn();
$bp = $dbc->getConnection();

$ime = mysqli_real_escape_string($bp,@$_POST['ime']);
$prezime = mysqli_real_escape_string($bp,@$_POST['prezime']);
$odeljenje = mysqli_real_escape_string($bp,@$_POST['odeljenje']);
$model = new KorisnikModel($dbc);
$model->dodajKorisnika($ime,$prezime,$odeljenje);

header("Location: /organizacija.php");
