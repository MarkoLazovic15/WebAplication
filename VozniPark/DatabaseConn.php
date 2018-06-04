<?php
require_once 'Configuration.php';
class DatabaseConn{
    private $bp;

    function __construct(){
               
    }
    public function getConnection(){
        if($this->bp ===NULL){
            $this->bp = mysqli_connect( Configuration::DATABASE_HOST,
                                        Configuration::DATABASE_USER,
                                        Configuration::DATABASE_PASS,
                                        Configuration::DATABASE_NAME    );
        if(!$this->bp){
            die("Greska pri pristupu bazi podataka!");
        }      
        }
        return $this->bp;
    }
}