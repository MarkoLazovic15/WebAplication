<?php
require_once ("../DataBaseConn.php");
require_once ("../modeli/magacinModel.php");

$dbc = new DataBaseConn();
$bp = $dbc->getConnection();

$naziv = mysqli_real_escape_string($bp,@$_POST['naziv']);
$lokacija = mysqli_real_escape_string($bp,@$_POST['lokacija']);
$model = new MagacinModel($dbc);
$model->dodajMagacin($naziv,$lokacija);

header("Location: /magacin.php");
