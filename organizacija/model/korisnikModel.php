<?php

class KorisnikModel{
    private $data;
    private $bp;

    public function __construct(DataBaseConn &$dbc){
        $this->bp = $dbc->getConnection();
        $this->data = array();
    }

    public function dodajKorisnika($ime,$prezime, $odeljenje){
        $rezultat = mysqli_query($this->bp,
        "INSERT INTO
        korisnik(korisnik_ime, korisnik_prezime, korisnik_odeljenje) 
        values 
        ('$ime','$prezime','$odeljenje');");
        
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
        
    }
    public function getAllKorisnik():array{
        $rezultat = mysqli_query($this->bp,
                                "SELECT 
                                    *
                                FROM
                                korisnik;");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
        while ($korisnik = mysqli_fetch_object($rezultat)){
            $data[$korisnik->korisnik_id] = $korisnik;
        }
        return $data;
    }

    public function getKorisnikByID($id){
        $rezultat = mysqli_query($this->bp,
        "SELECT 
            korisnik.korisnik_id,
            korisnik.korisnik_ime,
            korisnik.korisnik_prezime,
            korisnik.korisnik_odeljenje
        FROM
            korisnik
        WHERE
            korisnik.korisnik_id = $id");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }

        $korisnik = mysqli_fetch_object($rezultat);
        return $korisnik;
        
    }
    public function izmeniKorisnik($ime,$prezime,$odeljenje,$korisnik_id){
        $rezultat = mysqli_query($this->bp,
                                "UPDATE
                                korisnik
                                SET
                                korisnik.korisnik_ime = '$ime',
                                korisnik.korisnik_prezime = '$prezime',
                                korisnik.korisnik_odeljenje = '$odeljenje'
                                WHERE
                                korisnik.korisnik_id = $korisnik_id;");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
    }
    public function izbrisiKorisnik($id){
        $rezultat = mysqli_query($this->bp,
                                "DELETE 
                                    FROM
                                    `korisnik`
                                    WHERE 
                                    `korisnik`.`korisnik_id` = $id;");
        if (!$rezultat){
            die(mysqli_error($this->bp));
        }
    }


}