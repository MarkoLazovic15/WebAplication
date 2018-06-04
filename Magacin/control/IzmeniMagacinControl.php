<?php
require_once ('../modeli/magacinModel.php');
require_once ('../DataBaseConn.php');

$dbc = new DatabaseConn();
$magacinModel= new MagacinModel($dbc);
$bp = $dbc->getConnection();

$naziv = mysqli_real_escape_string($bp,@$_POST['naziv']);
$lokacija = mysqli_real_escape_string($bp,@$_POST['lokacija']);
$magacin_id = mysqli_real_escape_string($bp, @$_POST['ID']);
$magacinModel->izmeniMagacin($naziv,$lokacija,$magacin_id);

header("Location: /magacin.php");
?>

