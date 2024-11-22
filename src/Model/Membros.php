<?php
    class Membros{
        private $idMembros;
        private $ano;
        private $presidente;
        private $vicep;
        private $secretario;
        private $vices;
        private $tesoureiro;
        private $vicet;
        public function __construct(){
            if (func_num_args() != 0) {
                $atributos = func_get_args()[0];
                foreach ($atributos as $atributo => $valor) {
                    if(isset($valor) && property_exists(get_class($this), $atributo)){
                        $this->$atributo = $valor;
                    }    			
                }
            }
        }
        public function getIdMembro(){
            return $this->idMembros;
        } 
        public function setIdMembro($idMembros){
            return $this->idMembros = $idMembros;
        }
        public function getAno(){
            return $this->ano;
        } 
        public function setAno($ano){
            return $this->ano = $ano;
        }
        public function getPresidente(){
            return $this->presidente;
        } 
        public function setPresidente($presidente){
            return $this->presidente = $presidente;
        }
        public function getViceP(){
            return $this->vicep;
        } 
        public function setViceP($vicep){
            return $this->vicep = $vicep;
        }
        public function getSecretario(){
            return $this->secretario;
        } 
        public function setSecretario($secretario){
            return $this->secretario = $secretario;
        }
        public function getViceS(){
            return $this->vices;
        } 
        public function setViceS($vices){
            return $this->vices = $vices;
        }
        public function getTesoureiro(){
            return $this->tesoureiro;
        } 
        public function setTesoureiro($tesoureiro){
            return $this->tesoureiro = $tesoureiro;
        }
        public function getViceT(){
            return $this->vicet;
        } 
        public function setViceT($vicet){
            return $this->vicet = $vicet;
        }
        
        public function __toString(){
            return "idMembro: " . $this->idMembros . " Ano: " . $this->ano . " Presidente: " . $this->presidente . " Vice-Presidente: " . $this->vicep . " Secretário: " . 
            $this->secretario . " Vice-Secretário: " . $this->vices . " Tesoureiro: " . $this->tesoureiro . " Vice-Tesoureiro: " . $this->vicet . "<br><br>";
        } 
    }
?>