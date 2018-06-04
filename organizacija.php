<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Vozni Park</title>
        <link rel="stylesheet" type="text/css"  href="/main.css" />
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Monda" rel="stylesheet">
        <script src="/main.js"></script>
    </head>
    
    <?php include "header.html"; ?>
    <body>
        Pregled Racunara:
        <table border="1">
            <tr>
                <th rowspan = "2">ID RACUNARA</th>
                <th rowspan = "2">Proizvodjac</th>
                <th rowspan = "2">Model</th>
                <th colspan="3">Korisnik</th>
                <th rowspan = "2" colspan="2">Opcije:</th>
            </tr>
            <tr>
                <th>Ime</th><th>Prezime</th><th>Odeljenje</th>
            </tr>
            <?php   
            require_once ('organizacija/DatabaseConn.php');
            require_once ('organizacija/model/korisnikModel.php');
            require_once ('organizacija/model/racunarModel.php');

            $databaseConn = new DatabaseConn(); 
            $racunarModel = new RacunarModel($databaseConn);
            $racunari = $racunarModel->getAllRacunar();
            
            foreach($racunari as $racunar){
                echo "<tr>\n";
                echo "<td>{$racunar->racunar_id}</td>\n";
                echo "<td>{$racunar->racunar_proizvodjac}</td>\n";
                echo "<td>{$racunar->racunar_model}</td>\n";
                echo "<td>{$racunar->korisnik_ime}</td>\n";
                echo "<td>{$racunar->korisnik_prezime}</td>\n";
                echo "<td>{$racunar->korisnik_odeljenje}</td>\n";
                echo "<td><a href='organizacija/view/IzmeniRacunar.php?ID={$racunar->racunar_id}'>Izmena</a></td>\n";
                echo "<td><a href='organizacija/control/IzbrisiRacunarControl.php?ID={$racunar->racunar_id}' onclick='return myFunction()'>Uklanjanje</a></td>\n";
                echo "</tr>\n";
            }
            ?>

            </table>
            <a href="organizacija/view/DodajRacunar.php">Dodaj Racunar</a></br></br>

            Pregled Korisnika:</br>
            <table border="1">
            <tr>
                <td>ID Korisnika</td>
                <td>Ime</td>
                <td>Prezime</td>
                <td>Odeljenje</td>
                <td colspan="2">Opcije:</td>
            </tr>
           
            <?php   
            $krisnikModel = new KorisnikModel($databaseConn);
            $korisnici = $krisnikModel->getAllKorisnik();
            foreach($korisnici as $korisnik){
                echo "<tr>\n";
                echo "<td>{$korisnik->korisnik_id}</td>\n";
                echo "<td>{$korisnik->korisnik_ime}</td>\n";
                echo "<td>{$korisnik->korisnik_prezime}</td>\n";
                echo "<td>{$korisnik->korisnik_odeljenje}</td>\n";
                echo "<td><a href='organizacija/view/IzmeniKorisnika.php?ID={$korisnik->korisnik_id}'>Izmena</a></td>\n";
                echo "<td><a href='organizacija/control/IzbrisiKorisnikaControl.php?ID={$korisnik->korisnik_id}' onclick='return myFunction()'>Uklanjanje</a></td>\n";
                echo "</tr>\n";
            }
            ?>

            </table>
            <a href="organizacija/view/DodajKorisnika.php">Dodaj Korisnika</a>
    </body>
</html>