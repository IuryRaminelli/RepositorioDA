<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/User.php';

    class ConUser{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        function insertUser(User $User){
            $pstmt = $this->conexao->prepare("INSERT INTO user 
            (nome, email, telefone, senha) VALUES 
            (?,?,?,?)");
            $pstmt->bindValue(1, $User->getNome());
            $pstmt->bindValue(2, $User->getEmail());
            $pstmt->bindValue(3, $User->getTelefone());
            $pstmt->bindValue(4, $User->getSenha());
            $pstmt->execute();
            return $pstmt;
        }
        function selectLoginUser1($email){
            $pstmt = $this->conexao->prepare("SELECT * FROM user us WHERE us.email = :email ");
            $pstmt->bindValue(":email", $email);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, user::class);
            return $lista;
        } 

        public function isLoggedIn(){
            if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == true){
                return true;
            }
            return false;
        }
    }

    
?>