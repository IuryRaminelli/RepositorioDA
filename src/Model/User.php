<?php
    class User{
        private $id;
        private $nome;
        private $email;
        private $telefone;
        private $tipo;
        private $senha;
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
        public function getIdUser(){
            return $this->id;
        } 
        public function setIdUser($id){
            return $this->id = $id;
        }
        public function getNome(){
            return $this->nome;
        } 
        public function setNome($nome){
            return $this->nome = $nome;
        }
        public function getEmail(){
            return $this->email;
        } 
        public function setEmail($email){
            return $this->email = $email;
        }
        
        public function getTelefone(){
            return $this->telefone;
        } 
        public function setTelefone($telefone){
            return $this->telefone = $telefone;
        }
        public function getTipo(){
            return $this->tipo;
        } 
        public function setTipo($tipo){
            return $this->tipo = $tipo;
        }
        public function getSenha(){
            return $this->senha;
        } 
        public function setSenha($senha){
            return $this->senha = $senha;
        }
        
        public function __toString(){
            return "idUser: " . $this->id . " nome: " . $this->nome . " Email: " . $this->email . " Telefone: " . $this->telefone . " Tipo: " . $this->tipo . " senha: " . $this->senha . "<br><br>";
        } 
    }
?>