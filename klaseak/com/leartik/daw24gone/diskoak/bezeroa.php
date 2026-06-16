<?php
namespace com\leartik\daw24gone\diskoak;

Class Bezeroa{
    private $izena;
    private $abizena;
    private $helbidea;
    private $herria;
    private $postaKodea;
    private $emaila;

    public function __construct(){
        // momentus hutzik
    }
    
    public function setIzena($izena){
        $this->izena = $izena;
    }
    
    public function getIzena(){
        return $this->izena;
    }

    public function setAbizena($abizena){
        $this->abizena = $abizena;
    }

    public function getAbizena(){
        return $this->abizena;
    }
    
    public function setHelbidea($helbidea){
        $this->helbidea = $helbidea;
    }

    public function getHelbidea(){
        return $this->helbidea;
    }

    public function setHerria($herria){
        $this->herria = $herria;
    }

    public function getHerria(){
        return $this->herria;
    }

    public function setPostaKodea($postaKodea){
        $this->postaKodea = $postaKodea;
    }

    public function getPostaKodea(){
        return $this->postaKodea;
    }

    public function setEmaila($emaila){
        $this->emaila = $emaila;
    }

    public function getEmaila(){
        return $this->emaila;
    }
}


?>