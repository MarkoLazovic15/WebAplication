<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Magacin</title>
    <link rel="stylesheet" type="text/css" href="/main.css" />
</head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/header.html"; ?>
<body>
<form action="../control/DodajRacunarControl.php" method="post">
            Proizvodjac: <input type="text" name="proizvodjac">
            </br>
            Model:<input type="text" name="model">
            </br>
            Korisnik: <select name = 'korisnik'>"
            <?php
            require_once ("../model/korisnikModel.php");
            require_once ('../DataBaseConn.php');

            $databaseConn = new DataBaseConn();
            $magainModel = new KorisnikModel($databaseConn);
            $korisnici = $magainModel->getAllKorisnik();
            

            foreach($korisnici as $korisnik){
                echo "<option value={$korisnik->korisnik_id}>{$korisnik->korisnik_ime} {$korisnik->korisnik_prezime} {$korisnik->korisnik_odeljenje} ID:{$korisnik->korisnik_id}</option>";
            } 
            

            ?>
            </select>
            </br>
            <button type="submit">Dodaj Racunar</button>
        </form>
</body>
</html>