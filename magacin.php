<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Magacin</title>
    <link rel="stylesheet" type="text/css"  href="/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Monda" rel="stylesheet">
    <script src="/main.js"></script>
</head>

<?php include "header.html"; ?>
<body>
    Pregled Robe:
    <table border = "1" >
        <tr>
            <th rowspan = "2">ID Robe</th>
            <th rowspan = "2">Naziv</th>
            <th rowspan = "2">Kolicina</th>
            <th colspan="2">Magacin</th>
            <th rowspan = "2" colspan="2">Opcije</th>
        </tr>
        <tr>
        <th>Naziv</th><th>Lokacija</th>
        </tr>
<?php
    require_once ("Magacin/DataBaseConn.php");
    require_once ("Magacin/modeli/robaModel.php");
    require_once ("Magacin/modeli/magacinModel.php");
    
    $dbc = new DatabaseConn();
    $rModel = new RobaModel($dbc);
    $data = $rModel->getAllRobu();

    foreach($data as $roba){
        echo "<tr>\n";
        echo "<td>{$roba->roba_id}</td>\n";
        echo "<td>{$roba->roba_naziv}</td>\n";
        echo "<td>{$roba->roba_kolicina}</td>\n";
        echo "<td>{$roba->magacin_naziv}</td>\n";
        echo "<td>{$roba->magacin_lokacija}</td>\n";
        echo "<td><a href='Magacin/view/IzmeniRobu.php?ID={$roba->roba_id}'>Izmena</a></td>\n";
        echo "<td><a href='Magacin/control/IzbrisiRobuControl.php?ID={$roba->roba_id}' onclick='return myFunction()'>Uklanjanje</a></td>\n";
        echo "</tr>\n";
    }
?>
    </table>
    <a href="Magacin/view/DodajRobu.php">Dodaj Robu</a></br></br>

    Pregled Magacina:
    <table border="1">
            <tr>
                <th>ID Magacina</th>
                <th>Naziv</th>
                <th>Lokacija</th>
                <th colspan="2">Opcije:</th>
            </tr>
            <?php
                $magacinModel = new MagacinModel($dbc);
                $magacini = $magacinModel->getAllMagacin();
                foreach($magacini as $magacin){
                    echo "<tr>\n";
                    echo "<td>{$magacin->magacin_id}</td>\n";
                    echo "<td>{$magacin->magacin_naziv}</td>\n";
                    echo "<td>{$magacin->magacin_lokacija}</td>\n";
                    echo "<td><a href='Magacin/view/IzmeniMagacin.php?ID={$magacin->magacin_id}'>Izmena</a></td>\n";
                    echo "<td><a href='Magacin/control/IzbrisiMagacinControl.php?ID={$magacin->magacin_id}' onclick='return myFunction()'>Uklanjanje</a></td>\n";
                    echo "</tr>\n";
                }
            ?>
            </table>
    <a href="Magacin/view/DodajMagacin.php">Dodaj Magacin</a></br></br>
</body>
</html>