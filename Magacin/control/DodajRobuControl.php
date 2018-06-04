<?php
require_once ("../DataBaseConn.php");
require_once ("../modeli/robaModel.php");

$dbc = new DataBaseConn();
$bp = $dbc->getConnection();

$naziv = mysqli_real_escape_string($bp,$_POST['naziv']);
$kolicina = mysqli_real_escape_string($bp, $_POST['kolicina']);
$magacin_id = mysqli_real_escape_string($bp,$_POST['Magacin']);

$robaModel = new RobaModel($dbc);
$robaModel->dodajRobu($naziv, $kolicina,$magacin_id);

header("Location: /magacin.php");