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
        <table border="1">
            Pregled Vozila:
            <tr>
                <th rowspan = "2">ID VOZILA</th>
                <th rowspan = "2">Model</th>
                <th rowspan = "2">Proizvodjac</th>
                <th rowspan = "2">Registracija</th>
                <th colspan="2">Vozac</th>
                <th rowspan = "2" colspan="2">Opcije:</th>
            </tr>
            <tr>
                <th>Ime</th><th>Prezime</th>
            </tr>
            <?php   
            require_once ('VozniPark/DatabaseConn.php');
            require_once ('VozniPark/modeli/DataModel.php');
            require_once ('VozniPark/modeli/VozaciModel.php');

            $databaseConn = new DatabaseConn(); 
            $dm = new DataModel($databaseConn);
            $data = $dm->getAllData();
            
            foreach($data as $vozilo){
                echo "<tr>\n";
                echo "<td>{$vozilo->vozilo_id}</td>\n";
                echo "<td>{$vozilo->model}</td>\n";
                echo "<td>{$vozilo->prizvodjac}</td>\n";
                echo "<td>{$vozilo->registracija}</td>\n";
                echo "<td>{$vozilo->ime}</td>\n";
                echo "<td>{$vozilo->prezime}</td>\n";
                echo "<td><a href='VozniPark/view/izmenaVozila.php?ID={$vozilo->vozilo_id}'>Izmena</a></td>\n";
                echo "<td><a href='VozniPark/control/IzbrisiVoziloConn.php?ID={$vozilo->vozilo_id}'  onclick='return myFunction()'    >    Uklanjanje   </a>  </td>\n   ";
                echo "</tr>\n";
            }
            ?>

            </table>
            <a href="VozniPark/view/dodajVozilo.php">Dodaj Vozilo</a></br></br>

            Pregled Vozaca:</br>
            <table border="1">
            <tr>
                <td>ID Vozaca</td>
                <td>Ime</td>
                <td>Prezime</td>
                <td colspan="2">Opcije:</td>
            </tr>
           
            <?php   
            $vozaciModel = new VozaciModel($databaseConn);
            $vozaci = $vozaciModel->getAllDrivers();
            foreach($vozaci as $vozac){
                echo "<tr>\n";
                echo "<td>{$vozac->vozac_id}</td>\n";
                echo "<td>{$vozac->ime}</td>\n";
                echo "<td>{$vozac->prezime}</td>\n";
                echo "<td><a href='VozniPark/view/IzmenaVozaca.php?ID={$vozac->vozac_id}'>Izmena</a></td>\n";
                echo "<td><a href='VozniPark/control/IzbrisiVozacaConn.php?ID={$vozac->vozac_id}' onclick='return myFunction()'>Uklanjanje</a></td>\n";
                echo "</tr>\n";
            }
            ?>

            </table>
            <a href="VozniPark/view/DodajVozaca.php">Dodaj Vozaca</a>
    </body>
</html>