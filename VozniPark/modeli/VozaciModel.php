<?php
class VozaciModel{
    private $data;
    private $bp;

    function __construct(DatabaseConn &$dbc){
        $this->bp = $dbc->getConnection();
        $this->data = array();
    }
    
    public function getAllDrivers():array{

        $rezultat = mysqli_query($this->bp,
                                "SELECT 
                                    *
                                FROM
                                    vozac;");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
       
        while ($vozac = mysqli_fetch_object($rezultat)){
            $data[$vozac->vozac_id] = $vozac;
        }
        return $data;
    }

    public function deleteDriver($id){
        $rezultat = mysqli_query($this->bp,
                                "DELETE 
                                FROM
                                vozac 
                                WHERE 
                                vozac_id = $id;");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
    }
   
    public function updateDriver($ime,$prezime,$id){
        print_r($id);
        $rezultat = mysqli_query($this->bp,
                                "UPDATE 
                                vozac
                                SET
                                vozac.ime = '$ime',
                                vozac.prezime = '$prezime'
                                WHERE 
                                vozac_id = $id;");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
    }
   
    public function addDriver($ime,$prezime){
        $rezultat = mysqli_query($this->bp,
                                "INSERT INTO
                                vozac(ime, prezime) 
                                values 
                                ('$ime','$prezime');");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
    }

    public function getVozacById($id){
        $rezultat = mysqli_query($this->bp,
                                "SELECT 
                                vozac.ime,
                                vozac.prezime,
                                vozac.vozac_id
                            FROM
                                vozac
                            WHERE
                                vozac.vozac_id = $id");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
       
        $vozilo = mysqli_fetch_object($rezultat);


        return $vozilo;

    }
    
}