<?php
class RacunarModel{

    private $data;
    private $bp;

    public function __construct(DataBaseConn &$dbc){
        $this->bp = $dbc->getConnection();
        $this->data = array();
    }

    public function dodajRacunar($proizvodjac, $model, $korisnik_id){
        $rezultat = mysqli_query($this->bp,
        "INSERT INTO
        racunar(racunar_proizvodjac, racunar_model, racunar_korisnik_id) 
        values 
        ('$proizvodjac','$model',$korisnik_id);");
        
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
    }
    public function getAllRacunar(){
        $rezultat = mysqli_query($this->bp,
        "SELECT 
        `racunar`.`racunar_id`,
        `racunar`.`racunar_proizvodjac`,
        `racunar`.`racunar_model`,
        `korisnik`.`korisnik_ime`,
        `korisnik`.`korisnik_prezime`,
        `korisnik`.`korisnik_odeljenje`
        FROM
            `racunar`,
            `korisnik`
        WHERE
            `racunar`.`racunar_korisnik_id` = `korisnik`.`korisnik_id`;");
        
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
       
        while ($racunar = mysqli_fetch_object($rezultat)){
            $data[$racunar->racunar_id] = $racunar;
        }
        return $data;
    } 

    public function getRacunarByID($id){
        $rezultat = mysqli_query($this->bp,
                                "SELECT 
                                `racunar`.`racunar_id`,
                                `racunar`.`racunar_proizvodjac`,
                                `racunar`.`racunar_model`,
                                `korisnik`.`korisnik_ime`,
                                `korisnik`.`korisnik_prezime`,
                                `korisnik`.`korisnik_odeljenje`
                            FROM
                                `racunar`,
                                `korisnik`
                            WHERE
                                `racunar`.`racunar_korisnik_id` = `korisnik`.`korisnik_id`
                            AND `racunar`.`racunar_id` =  $id;");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }

        $racunar = mysqli_fetch_object($rezultat);
        return $racunar;
    }
    public function updateRacunar($proizvodjac, $model, $korisnik_id, $racunar_id){
        $rezultat = mysqli_query($this->bp,
                                "UPDATE
                                    racunar
                                SET
                                    racunar.racunar_proizvodjac = '$proizvodjac',
                                    racunar.racunar_model = '$model',
                                    racunar.racunar_korisnik_id = $korisnik_id
                                WHERE
                                    `racunar`.`racunar_id` = $racunar_id;");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
    }
    public function deleteRacunar($id){
        $rezultat = mysqli_query($this->bp,
                                "DELETE 
                                    FROM
                                    racunar 
                                    WHERE 
                                    `racunar`.`racunar_id` = $id");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
    }
}