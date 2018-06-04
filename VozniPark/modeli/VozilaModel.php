<?php
class VozilaModel{
    private $data;
    private $bp;

    function __construct(DatabaseConn &$dbc){
        $this->bp = $dbc->getConnection();
        $this->data = array();
    }
    public function dodajVozilo($proizvodjac,$model,$registracija,$vozac_id){
        $rezultat = mysqli_query($this->bp,
                                "INSERT INTO
                                vozilo(prizvodjac, model, registracija, vozac_id) 
                                values 
                                ('$proizvodjac','$model','$registracija',$vozac_id);");
        if (!$rezultat){
            die(mysqli_error($bp));
        }
    }
    //Vraca sva vozila array objekata
    public function getAllCars():array{
        $rezultat = mysqli_query($this->bp,
                                "SELECT 
                                    *
                                FROM
                                    vozilo;");
        if (!$rezultat){
            die(mysqli_error($bp));
        }
       
        while ($vozilo = mysqli_fetch_object($rezultat)){
            $data[$vozilo->vozilo_id] = $vozilo;
        }
        return $data;
    }
    //Vraca vozilo kao objekat
    public function getCarByID($id){
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
                                vozac.vozac_id = vozilo.vozac_id
                            AND
                                vozilo.vozilo_id = $id;");
        if (!$rezultat){
            die(mysqli_error($bp));
        }
       
        $vozilo = mysqli_fetch_object($rezultat);


        return $vozilo;
    }
    //brise vozilo, trazi id vozila
    public function deleteCar($id){
        $rezultat = mysqli_query($this->bp,
                                "DELETE 
                                    FROM
                                    vozilo 
                                    WHERE 
                                    vozilo_id = $id;");
        if (!$rezultat){
            die(mysqli_error($bp));
        }
    }
   //menja vozilo
    public function updateCar($proizvodjac,$model,$registracija,
                            $vozac_id,$vozilo_id){
        $rezultat = mysqli_query($this->bp,
                                "UPDATE
                                vozilo
                                SET
                                vozilo.prizvodjac = '$proizvodjac',
                                vozilo.model = '$model',
                                vozilo.registracija = '$registracija',
                                vozilo.vozac_id = $vozac_id
                                WHERE
                                vozilo.vozilo_id = $vozilo_id;");
        if (!$rezultat){
            die(mysqli_error($bp));
        }
    }
   
}