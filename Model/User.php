<?php
    class User{
        private $idUser;
        private $nome;
        private $email;
        private $telefone;
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
            return $this->idUser;
        } 
        public function setIdUser($idUser){
            return $this->idUser = $idUser;
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
        public function getSenha(){
            return $this->senha;
        } 
        public function setSenha($senha){
            return $this->senha = $senha;
        }
        
        public function __toString(){
            return "idUser: " . $this->idUser . " nome: " . $this->nome . " Email: " . $this->email . " Telefone: " . $this->telefone . " senha: " . $this->senha . "<br><br>";
        } 
    }
?>