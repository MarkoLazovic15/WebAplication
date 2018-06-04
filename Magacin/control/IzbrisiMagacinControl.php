<?php
require_once ('../modeli/magacinModel.php');
require_once ('../DataBaseConn.php');

$dbc = new DataBaseConn();
$magacinModel = new MagacinModel($dbc);
$bp = $dbc->getConnection();

$id = (int) @$_GET['ID'];

$magacinModel->izbrisiMagacin($id);

header("Location: /magacin.php");

?>