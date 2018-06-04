<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Magacin</title>
        <link rel="stylesheet" type="text/css"  href="/main.css" />
    </head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/header.html"; ?>
    <body>
        <form action="../control/DodajMagacinControl.php" method="post">
            Naziv: <input type="text" name="naziv">
            </br>
            Lokacija:<input type="text" name="lokacija">
            </br>
            <button type = "submit">Dodaj Magacin</button>
        </form>
    </body>
</html>