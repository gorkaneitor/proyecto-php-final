<?php
namespace com\leartik\daw24gone\diskoak;

Class Saskia{

    private $detaileak;

    public function __construct(){
        $this->detaileak = array();
    }

    public function setDetaileak($detaileak){
        $this->detaileak = $detaileak;
    }
    
    public function getDetaileak(){
        return $this->detaileak;
    }
    
    public function detaileaGehitu($detailea){
        $this->detaileak[] = $detailea;
    }

    public function unitateaGehitu($id){
        foreach ($this->detaileak as $detailea) {
            if ($detailea->getDiskoa()->getId() == $id) {
                $detailea->setKopurua($detailea->getKopurua() + 1);
                return;
            }
        }
    }

    public function unitateaKendu($id){
        foreach ($this->detaileak as $index => $detailea) {
            if ($detailea->getDiskoa()->getId() == $id) {
                $kop = $detailea->getKopurua() - 1;
                if ($kop > 0) {
                    $detailea->setKopurua($kop);
                } else {
                    $this->detaileaEzabatu($id);
                }
                return;
            }
        }
    }

    public function detaileaEzabatu($id){
        foreach ($this->detaileak as $index => $detailea) {
            if ($detailea->getDiskoa()->getId() == $id) {
                array_splice($this->detaileak, $index, 1);
                return;
            }
        }
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