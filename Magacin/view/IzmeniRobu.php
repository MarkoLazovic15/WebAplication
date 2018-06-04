<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Izmena robe</title>
        <link rel="stylesheet" type="text/css"  href="/main.css" />
    </head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/header.html";?>
    <body>
       <form action="../control/IzmeniRobuControl.php" method="post">
       <?php
            require_once ('../modeli/magacinModel.php');
            require_once ('../modeli/robaModel.php');
            require_once ('../DataBaseConn.php');

            $id = (int) @$_GET['ID'];
            $dbc = new DatabaseConn();
            $magacinModel = new MagacinModel($dbc);
            $robaModel = new RobaModel($dbc);
            $roba = $robaModel->getRobaByID($id);
            $magacini = $magacinModel->getAllMagacin();

        ?>
            <input type="hidden" name="ID" value="<?php echo $roba->roba_id; ?>" />
            Naziv: <input type="text" name="naziv" value="<?php echo $roba->roba_naziv; ?>" />
            <br />
            Kolicina: <input type="text" name="kolicina" value="<?php echo $roba->roba_kolicina; ?>" />
            <br />
            
            Magacini:
            <select name="magacini">
            <?php
            foreach($magacini as $magacin){
                echo "<option value={$magacin->magacin_id}>{$magacin->magacin_naziv} {$magacin->magacin_lokacija} ID:{$magacin->magacin_id}</option>";
            } 
            ?>
            </select>
            <hr />
            <button type="submit">Izmena Robe</button>
        </form>
    </body>
</html>
