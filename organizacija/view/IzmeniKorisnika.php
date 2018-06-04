<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Izmeni korisnika</title>
        <link rel="stylesheet" type="text/css"  href="/main.css" />
    </head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/header.html";?>
    <body>
       <form action="../control/IzmeniKorisnikaControl.php" method="post">
       <?php
            require_once ('../model/korisnikModel.php');
            require_once ('../model/racunarModel.php');
            require_once ('../DataBaseConn.php');

            $id = (int) @$_GET['ID'];
            $dbc = new DatabaseConn();
            $korisnikModel = new KorisnikModel($dbc);
            $korisnik = $korisnikModel->getKorisnikByID($id);


        ?>
            <input type="hidden" name="ID" value="<?php echo $korisnik->korisnik_id; ?>" />
            Ime: <input type="text" name="ime" value="<?php echo $korisnik->korisnik_ime; ?>" />
            <br />
            Prezime: <input type="text" name="prezime" value="<?php echo $korisnik->korisnik_prezime; ?>" />
            <br />
            Odeljenje: <input type="text" name="odeljenje" value="<?php echo $korisnik->korisnik_odeljenje; ?>" />
            <br />
            </select>
            <hr />
            <button type="submit">Izmena Korisnika</button>
        </form>
    </body>
</html>