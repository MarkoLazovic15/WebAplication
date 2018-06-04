<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css"  href="/main.css" />
    </head>
    <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/header.html";
    ?>
    <body>
        <form action="../control/DodajVoziloConn.php" method="post">
            
            Model: <input type="text" name="Model" />
            <br />
            Proizvodjac: <input type="text" name="Proizvodjac" />
            <br />
            Registracija: <input type="text" name="Registracija" />
            <br />
            Vozac: 
            <select name = 'Vozac'>"
            <?php
            require_once ("../modeli/VozaciModel.php");
            require_once ('../DatabaseConn.php');

            $databaseConn = new DatabaseConn();
            $vozaciModel = new VozaciModel($databaseConn);
            $vozaci = $vozaciModel->getAllDrivers();
            

            foreach($vozaci as $vozac){
                echo "<option value={$vozac->vozac_id}>{$vozac->ime} {$vozac->prezime} ID:{$vozac->vozac_id}</option>";
            } 
            

            ?>
            </select>
            </br>
            <button type="submit">Dodaj vozilo</button>
            
        </form>
    </body>
</html>
