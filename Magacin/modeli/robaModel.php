<?php
class RobaModel{

    private $data;
    private $bp;

    public function __construct(DataBaseConn &$dbc){
        $this->bp = $dbc->getConnection();
        $this->data = array();
    }

    public function dodajRobu($naziv, $kolicina, $magacin_id){
        $rezultat = mysqli_query($this->bp,
        "INSERT INTO
        roba(roba_naziv, roba_kolicina, magacin_id) 
        values 
        ('$naziv',$kolicina,$magacin_id);");
        
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
    }
    public function getAllRobu(){
        $rezultat = mysqli_query($this->bp,
        "SELECT 
        `roba`.`roba_id`,
        `roba`.`roba_naziv`,
        `roba`.`roba_kolicina`,
        `magacin`.`magacin_naziv`,
        `magacin`.`magacin_lokacija`
        FROM
            `roba`,
            `magacin`
        WHERE
            `roba`.`magacin_id` = `magacin`.`magacin_id`;");
        
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
       
        while ($roba = mysqli_fetch_object($rezultat)){
            $data[$roba->roba_id] = $roba;
        }
        return $data;
    } 

    public function getRobaByID($id){
        $rezultat = mysqli_query($this->bp,
                                "SELECT 
                                `roba`.`roba_id`,
                                `roba`.`roba_naziv`,
                                `roba`.`roba_kolicina`,
                                `magacin`.`magacin_naziv`,
                                `magacin`.`magacin_lokacija`
                            FROM
                                roba,
                                magacin
                            WHERE
                                `roba`.`magacin_id` = `magacin`.`magacin_id`
                            AND `roba`.`roba_id` =  $id;");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }

        $roba = mysqli_fetch_object($rezultat);
        return $roba;
    }
    public function updateRoba($naziv,$kolicina,$magacin_id, $roba_id){
        $rezultat = mysqli_query($this->bp,
                                "UPDATE
                                    roba
                                SET
                                    roba.roba_naziv = '$naziv',
                                    roba.roba_kolicina = $kolicina,
                                    roba.magacin_id = '$magacin_id'
                                WHERE
                                    roba.roba_id = $roba_id;");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
    }
    public function deleteRoba($id){
        $rezultat = mysqli_query($this->bp,
                                "DELETE 
                                    FROM
                                    roba 
                                    WHERE 
                                    roba_id = $id;");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
    }
}