<?php
    include_once __DIR__ . '/../Conexao/Conexao.php';
    include_once __DIR__ . '/../Model/User.php';

    class ConUser{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        public function insertUser(User $User){
            $pstmt = $this->conexao->prepare("INSERT INTO user 
            (nome, email, senha, telefone, tipo) VALUES 
            (?,?,?,?,?)");
            $pstmt->bindValue(1, $User->getNome());
            $pstmt->bindValue(2, $User->getEmail());
            $pstmt->bindValue(3, password_hash($User->getSenha(), PASSWORD_DEFAULT));
            $pstmt->bindValue(4, $User->getTelefone());
            $pstmt->bindValue(5, $User->getTipo());
            $pstmt->execute();
            return $pstmt;
        }
        public function selectLoginUser1($email){
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

        public function alterarUser(User $User) {
            try {
                $query = "UPDATE user SET nome = :nome, email = :email, telefone = :telefone, tipo = :tipo";
                if (!empty($User->getSenha())) {
                    $query .= ", senha = :senha";
                }
                $query .= " WHERE id = :id";
        
                $pstmt = $this->conexao->prepare($query);
                $pstmt->bindValue(':nome', $User->getNome());
                $pstmt->bindValue(':email', $User->getEmail());
                $pstmt->bindValue(':telefone', $User->getTelefone());
                $pstmt->bindValue(':tipo', $User->getTipo());
                if (!empty($User->getSenha())) {
                    $pstmt->bindValue(':senha', password_hash($User->getSenha(), PASSWORD_DEFAULT));
                }
                $pstmt->bindValue(':id', $User->getIdUser());
                $pstmt->execute();
        
                return $pstmt->rowCount() > 0;
            } catch (PDOException $e) {
                error_log('Erro ao alterar usuário: ' . $e->getMessage());
                return false;
            }
        }
              
        public function deleteUser($id) {
            try {
                $stmt = $this->conexao->prepare("DELETE FROM user WHERE id = :id");
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
                $stmt->execute();
    
                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "Erro ao excluir a usuário: " . $e->getMessage();
                return false;
            }
        }

        public function selectUserById($id) {
            $pstmt = $this->conexao->prepare("SELECT * FROM user WHERE id = :id");
            $pstmt->bindValue(":id", $id);
            $pstmt->execute();
            $lista = $pstmt->fetchObject(User::class);
            return $lista;
        }

        public function selectAllUser(){
            $pstmt = $this->conexao->prepare("SELECT * FROM user");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, User::class);
            return $lista;
        }

    }

    
?>