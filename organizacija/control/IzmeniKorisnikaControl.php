<?php
require_once ('../model/korisnikModel.php');
require_once ('../DataBaseConn.php');

$dbc = new DatabaseConn();
$korisnikModel = new KorisnikModel($dbc);
$bp = $dbc->getConnection();

$ime = mysqli_real_escape_string($bp,@$_POST['ime']);
$prezime = mysqli_real_escape_string($bp,@$_POST['prezime']);
$odeljenje = mysqli_real_escape_string($bp, @$_POST['odeljenje']);
$korisnik_id = mysqli_real_escape_string($bp, @$_POST['ID']);
$korisnikModel->izmeniKorisnik($ime,$prezime,$odeljenje,$korisnik_id);

header("Location: /organizacija.php");
?>

