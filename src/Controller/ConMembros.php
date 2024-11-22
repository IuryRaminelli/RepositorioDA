<?php
    include_once __DIR__ . '/../Conexao/Conexao.php';
    include_once __DIR__ . '/../Model/Membros.php';

    class ConMembros{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        public function insertMembros(Membros $Membros){
            $pstmt = $this->conexao->prepare("INSERT INTO membros 
            (ano, presidente, vicep, secretario, vices, tesoureiro, vicet) VALUES (?,?,?,?,?,?,?)");
            $pstmt->bindValue(1, $Membros->getAno());
            $pstmt->bindValue(2, $Membros->getPresidente());
            $pstmt->bindValue(3, $Membros->getViceP());
            $pstmt->bindValue(4, $Membros->getSecretario());
            $pstmt->bindValue(5, $Membros->getViceS());
            $pstmt->bindValue(6, $Membros->getTesoureiro());
            $pstmt->bindValue(7, $Membros->getViceT());
            $pstmt->execute();
            return $pstmt;
        }

        public function selectMembrosById($id) {
            $pstmt = $this->conexao->prepare("SELECT * FROM membros m WHERE m.id = :id");
            $pstmt->bindValue(":id", $id);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Membros::class);
            return $lista;
        }
        
        public function deleteMembros($id) {
            try {
                $stmt = $this->conexao->prepare("DELETE FROM membros WHERE id = :id");
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
                $stmt->execute();
    
                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "Erro ao excluir membros: " . $e->getMessage();
                return false;
            }
        }

        public function selectAllMembros(){
            $pstmt = $this->conexao->prepare("SELECT * FROM membros ORDER BY ano DESC");
            $pstmt->execute();
            return $pstmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }
?>