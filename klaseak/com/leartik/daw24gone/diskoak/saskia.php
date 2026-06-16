<?php
namespace com\leartik\daw24gone\diskoak;

Class Saskia{

    private $detaileak;

    public function __construct(){
        $this->detaileak = array();
    }

    public function setDetaileak($detaileak){
        $this-> detaileak = $detaileak;
    }
    
    public function getDetaileak(){
        return $this->detaileak;
    }
    
    public function detaileaGehitu($detailea){
        $this->detaileak[] = $detailea;
    }
    
    public function getSaskiaGuztira(){
    $totala = 0;
    foreach ($this->detaileak as $detailea) {
        $totala += $detailea->getGuztira();
    }
    return $totala;
}
}
?>