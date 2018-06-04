<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Magacin</title>
        <link rel="stylesheet" type="text/css"  href="/main.css" />
    </head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/header.html"; ?>
    <body>
        <form action="../control/DodajKorisnikaControl.php" method="post">
            Ime: <input type="text" name="ime">
            </br>
            Prezime:<input type="text" name="prezime">
            </br>
            Odeljenje:<input type="text" name="odeljenje">
            </br>
            <button type = "submit">Dodaj Korisnika</button>
        </form>
    </body>
</html>