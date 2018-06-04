<?php
require_once ('DataBaseConfig.php');
class DataBaseConn{
    private $bp;

    public function getConnection(){
        if($this->bp === null){
            $this->bp = mysqli_connect( DataBaseConfig::DATABASE_HOST,
                                        DataBaseConfig::DATABASE_USER,
                                        DataBaseConfig::DATABASE_PASS,
                                        DataBaseConfig::DATABASE_NAME);

        if(!$this->bp){
            die("Greska pri pristupu bazi podataka!");
        }
    }
    return $this->bp;
    }
}