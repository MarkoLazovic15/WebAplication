<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Izmena robe</title>
        <link rel="stylesheet" type="text/css"  href="/main.css" />
    </head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/header.html";?>
    <body>
       <form action="../control/IzmeniMagacinControl.php" method="post">
       <?php
            require_once ('../modeli/magacinModel.php');
            require_once ('../modeli/robaModel.php');
            require_once ('../DataBaseConn.php');

            $id = (int) @$_GET['ID'];
            $dbc = new DatabaseConn();
            $magacinModel = new MagacinModel($dbc);
            $magacin = $magacinModel->getMagacinByID($id);


        ?>
            <input type="hidden" name="ID" value="<?php echo $magacin->magacin_id; ?>" />
            Naziv: <input type="text" name="naziv" value="<?php echo $magacin->magacin_naziv; ?>" />
            <br />
            Lokacija: <input type="text" name="lokacija" value="<?php echo $magacin->magacin_lokacija; ?>" />
            <br />
            </select>
            <hr />
            <button type="submit">Izmena Magacina</button>
        </form>
    </body>
</html>