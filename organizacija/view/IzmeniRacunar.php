<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Izmena robe</title>
        <link rel="stylesheet" type="text/css"  href="/main.css" />
    </head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/header.html";?>
    <body>
       <form action="../control/IzmeniRacunarControl.php" method="post">
       <?php
            require_once ('../model/korisnikModel.php');
            require_once ('../model/racunarModel.php');
            require_once ('../DataBaseConn.php');

            $id = (int) @$_GET['ID'];
            $dbc = new DatabaseConn();
            $korisnikModel = new KorisnikModel($dbc);
            $racunarModel = new RacunarModel($dbc);
            $racunar = $racunarModel->getRacunarByID($id);
            $korisnici = $korisnikModel->getAllKorisnik();

        ?>
            <input type="hidden" name="ID" value="<?php echo $racunar->racunar_id; ?>" />
            Proizvodjac: <input type="text" name="proizvodjac" value="<?php echo $racunar->racunar_proizvodjac; ?>" />
            <br />
            Model: <input type="text" name="model" value="<?php echo $racunar->racunar_model; ?>" />
            <br />
            
            Korisnici:
            <select name="korisnik">
            <?php
            foreach($korisnici as $korisnik){
                echo "<option value={$korisnik->korisnik_id}>{$korisnik->korisnik_ime} {$korisnik->korisnik_prezime} {$korisnik->korisnik_odeljenje} ID:{$korisnik->korisnik_id}</option>";
            } 
            ?>
            </select>
            <hr />
            <button type="submit">Izmena Racunara</button>
        </form>
    </body>
</html>
