<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css"  href="/main.css" />
    </head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/header.html";?>
    <body>
        <form action="../control/DodajVozacaConn.php" method="post">
            
            Ime: <input type="text" name="Ime" />
            <br />
            Przime: <input type="text" name="Prezime" />
            <br />
            </select>
            </br>
            <button type="submit">Dodaj vozaca</button>
            
        </form>
    </body>
</html>