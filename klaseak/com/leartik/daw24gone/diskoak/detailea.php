<?php
namespace com\leartik\daw24gone\diskoak;

Class Detailea{
    private $diskoa;
    private $kopurua;

    public function setDiskoa($diskoa){
        $this->diskoa = $diskoa;
    }

    public function getDiskoa(){
        return $this->diskoa;
    }

    public function setKopurua($kopurua){
        $this->kopurua = $kopurua;
    }

    public function getKopurua(){
        return $this->kopurua;
    }

    public function getGuztira(){
    $prezioa = $this->diskoa->getPrezioa();
    $deskontua = $this->diskoa->getDeskontua();

    if ($deskontua > 0) {
        $prezioUnitarioa = $prezioa - ($prezioa * ($deskontua / 100));
    } else {
        $prezioUnitarioa = $prezioa;
    }
    return $prezioUnitarioa * $this->kopurua;
    }
}
?>