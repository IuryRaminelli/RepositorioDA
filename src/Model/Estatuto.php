<?php
    class Estatuto{
        private $id;
        private $ano;
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
        public function getIdEstat(){
            return $this->id;
        } 
        public function setIdEstat($id){
            return $this->id = $id;
        }
        public function getAno(){
            return $this->ano;
        } 
        public function setAno($ano){
            return $this->ano = $ano;
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
        public function setArquivo($arquivo){
            return $this->arquivo = $arquivo;
        }
        
        public function __toString(){
            return "idEstat: " . $this->id . " ano: " . $this->ano . " descricao: " . $this->descricao . " arquivo: " . $this->arquivo . "<br><br>";
        } 
    }
?>