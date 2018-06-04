<?php
require_once ('../modeli/robaModel.php');
require_once ('../DataBaseConn.php');

$dbc = new DatabaseConn();
$robaModel = new RobaModel($dbc);
$bp = $dbc->getConnection();

$naziv = mysqli_real_escape_string($bp, @$_POST['naziv']);
$kolicina = mysqli_real_escape_string($bp, @$_POST['kolicina']);
$magacin_id = mysqli_real_escape_string($bp, @$_POST['magacini']);
$roba_id = mysqli_real_escape_string($bp, @$_POST['ID']);

$robaModel->updateRoba($naziv,$kolicina,$magacin_id,$roba_id);
header("Location: /magacin.php");
?>