<?php
    class Atas{
        private $idAtas;
        private $dia;
        private $descricao;
        private $arquivo;
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
        public function getIdAtas(){
            return $this->idAtas;
        } 
        public function setIdAtas($idAtas){
            return $this->idAtas = $idAtas;
        }
        public function getDia(){
            return $this->dia;
        } 
        public function setDia($dia){
            return $this->dia = $dia;
        }
        public function getDescricao(){
            return $this->descricao;
        } 
        public function setDescricao($descricao){
            return $this->descricao = $descricao;
        }
        
        public function getArquivo(){
            return $this->arquivo;
        } 
        public function setTelefone($arquivo){
            return $this->arquivo = $arquivo;
        }
        
        public function __toString(){
            return "idAtas: " . $this->idAtas . " dia: " . $this->dia . " descricao: " . $this->descricao . " arquivo: " . $this->arquivo . "<br><br>";
        } 
    }
?>