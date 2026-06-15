<?php 
    namespace com\leartik\daw24gone\diskoak;
    
    class Diskoa{
        private $id;
        private $id_kategoria;
        private $titulua;
        private $kanta_kop;
        private $prezioa;
        private $deskontua;
        private $nobedadea;


        public function __construct(){}


        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }


        public function setId_kategoria($id_kategoria){
            $this->id_kategoria = $id_kategoria;
        }

        public function getId_kategoria(){
            return $this->id_kategoria;
        }


        public function setTitulua($titulua){
            $this->titulua = $titulua;

        }

        public function getTitulua(){
            return $this->titulua;
        }


        public function setKanta_kop($kanta_kop){
            $this->kanta_kop = $kanta_kop;

        }

        public function getKanta_kop(){
            return $this->kanta_kop;
        }

        
        public function setPrezioa($prezioa){
            $this->prezioa = $prezioa;

        }

        public function getPrezioa(){
            return $this->prezioa;
        }


        public function setDeskontua($deskontua){
            $this->deskontua = $deskontua;

        }

        public function getDeskontua(){
            return $this->deskontua;
        }


        public function setNobedadea($nobedadea){
            $this->nobedadea = $nobedadea;
        }

        public function getNobedadea(){
            return $this->nobedadea;
        }
    }   
?>