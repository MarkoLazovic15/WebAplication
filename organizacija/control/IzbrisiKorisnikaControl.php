<?php
require_once ('../model/korisnikModel.php');
require_once ('../DataBaseConn.php');

$dbc = new DataBaseConn();
$korisnikModel = new KorisnikModel($dbc);
$bp = $dbc->getConnection();

$id = (int) @$_GET['ID'];

$korisnikModel->izbrisiKorisnik($id);

header("Location: /organizacija.php");

?>