<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Magacin</title>
    <link rel="stylesheet" type="text/css" href="/main.css" />
</head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/header.html"; ?>
<body>
<form action="../control/DodajRobuControl.php" method="post">
            Naziv: <input type="text" name="naziv">
            </br>
            Kolicina:<input type="text" name="kolicina">
            </br>
            Magacin <select name = 'Magacin'>"
            <?php
            require_once ("../modeli/magacinModel.php");
            require_once ('../DataBaseConn.php');

            $databaseConn = new DataBaseConn();
            $magainModel = new MagacinModel($databaseConn);
            $magacini = $magainModel->getAllMagacin();
            

            foreach($magacini as $magacin){
                echo "<option value={$magacin->magacin_id}>{$magacin->magacin_naziv} {$magacin->magacin_lokacija} ID:{$magacin->magacin_id}</option>";
            } 
            

            ?>
            </select>
            </br>
            <button type="submit">Dodaj robu</button>
        </form>
</body>
</html>