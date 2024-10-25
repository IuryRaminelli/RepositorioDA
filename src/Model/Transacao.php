<?php
    class Transacao{
        private $idTrans;
        private $quantidade;
        private $dia;
        private $descricao;
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
        public function getIdTrans(){
            return $this->idTrans;
        } 
        public function setIdTrans($idTrans){
            return $this->idTrans = $idTrans;
        }
        public function getQuantidade(){
            return $this->quantidade;
        } 
        public function setNome($quantidade){
            return $this->quantidade = $quantidade;
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
        public function __toString(){
            return "idTrans: " . $this->idTrans . " quantidade: " . $this->quantidade . " dia: " . $this->dia . " descricao: " . $this->descricao . "<br><br>";
        } 
    }
?>