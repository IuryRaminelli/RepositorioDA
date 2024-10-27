<?php
    class Atividade{
        private $idAtiv;
        private $imagem;
        private $nome;
        private $descricao;
        private $dia;
        private $local;
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
        public function getIdAtiv(){
            return $this->idAtiv;
        } 
        public function setIdAtiv($idAtiv){
            return $this->idAtiv = $idAtiv;
        }
        public function getImagem(){
            return $this->imagem;
        } 
        public function setImagem($imagem){
            return $this->imagem = $imagem;
        }
        public function getNome(){
            return $this->nome;
        } 
        public function setNome($nome){
            return $this->nome = $nome;
        }
        public function getDescricao(){
            return $this->descricao;
        } 
        public function setDescricao($descricao){
            return $this->descricao = $descricao;
        }
        public function getDia(){
            return $this->dia;
        } 
        public function setDia($dia){
            return $this->dia = $dia;
        }
        public function getLocal(){
            return $this->local;
        } 
        public function setLocal($local){
            return $this->local = $local;
        }
        public function __toString(){
            return "idAtiv: " . $this->idAtiv . "imagem: " . $this->imagem . " nome: " . $this->nome . " descricao: " . $this->descricao . " dia: " . $this->dia . " local: " . $this->local ."<br><br>";
        } 
    }
?>