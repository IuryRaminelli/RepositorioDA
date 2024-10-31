<?php
    class Imagem{
        private $id;
        private $idativ;
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
        public function getIdImagem(){
            return $this->id;
        } 
        public function setIdEstat($id){
            return $this->id = $id;
        }
        public function getIdAtiv(){
            return $this->idativ;
        } 
        public function setIdAtiv($idativ){
            return $this->idativ = $idativ;
        }
        
        public function getArquivo(){
            return $this->arquivo;
        } 
        public function setArquivo($arquivo){
            return $this->arquivo = $arquivo;
        }
        
        public function __toString(){
            return "idImagem: " . $this->id . " idativ: " . $this->idativ . " arquivo: " . $this->arquivo . "<br><br>";
        } 
    }
?>