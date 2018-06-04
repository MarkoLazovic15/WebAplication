<?php

class MagacinModel{
    private $data;
    private $bp;

    function __construct(DataBaseConn &$dbc){
        $this->bp = $dbc->getConnection();
        $this->data = array();
    }

    public function dodajMagacin($naziv,$lokacija){
        $rezultat = mysqli_query($this->bp,
        "INSERT INTO
        magacin(magacin_naziv, magacin_lokacija) 
        values 
        ('$naziv','$lokacija');");
        
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
        
    }
    public function getAllMagacin():array{
        $rezultat = mysqli_query($this->bp,
                                "SELECT 
                                    *
                                FROM
                                    magacin;");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
        while ($magacin = mysqli_fetch_object($rezultat)){
            $data[$magacin->magacin_id] = $magacin;
        }
        return $data;
    }

    public function getMagacinByID($id){
        $rezultat = mysqli_query($this->bp,
        "SELECT 
            magacin.magacin_id,
            magacin.magacin_naziv,
            magacin.magacin_lokacija
        FROM
            magacin
        WHERE
            magacin.magacin_id = $id");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }

        $magacin = mysqli_fetch_object($rezultat);
        return $magacin;
        
    }
    public function izmeniMagacin($naziv,$lokacija,$magacin_id){
        $rezultat = mysqli_query($this->bp,
                                "UPDATE
                                magacin
                                SET
                                magacin.magacin_naziv = '$naziv',
                                magacin.magacin_lokacija = '$lokacija'
                                WHERE
                                magacin.magacin_id = $magacin_id;");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
    }
    public function izbrisiMagacin($id){
        $rezultat = mysqli_query($this->bp,
                                "DELETE 
                                    FROM
                                    `magacin`
                                    WHERE 
                                    `magacin`.`magacin_id` = $id;");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
    }


}