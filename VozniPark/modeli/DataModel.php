<?php
require_once 'VozniPark/DatabaseConn.php';
class DataModel {
    private $data;
    private $bp;

    function __construct(DatabaseConn &$dbc){
        $this->bp = $dbc->getConnection();
        $this->data = array();
    }

    public function getAllData():array{
        $rezultat = mysqli_query($this->bp,
                                "SELECT 
                                    vozilo.vozilo_id,
                                    vozilo.model,
                                    vozilo.prizvodjac,
                                    vozilo.registracija,
                                    vozac.ime,
                                    vozac.prezime
                                FROM
                                    vozac,
                                    vozilo
                                WHERE
                                    vozac.vozac_id = vozilo.vozac_id;");
        if (!$rezultat){
            die(mysqli_error($bp));
        }
       
        while ($vozilo = mysqli_fetch_object($rezultat)){
            $data[$vozilo->vozilo_id] = $vozilo;
        }
        return $data;
    }
}