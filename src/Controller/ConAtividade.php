<?php
    include_once __DIR__ . '/../Conexao/Conexao.php';
    include_once __DIR__ . '/../Model/Atividade.php';

    class ConAtividade{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        public function insertAtividade(Atividade $Atividade){
            $pstmt = $this->conexao->prepare("INSERT INTO atividade 
            (nome, descricao, dia, local) VALUES (?,?,?,?)");
            $pstmt->bindValue(1, $Atividade->getNome());
            $pstmt->bindValue(2, $Atividade->getDescricao());
            $pstmt->bindValue(3, $Atividade->getDia());
            $pstmt->bindValue(4, $Atividade->getLocal());
            $pstmt->execute();
            return $pstmt;
        }


        public function selectAtividadeById($id) {
            $pstmt = $this->conexao->prepare("SELECT * FROM atividade at WHERE at.id = :id");
            $pstmt->bindValue(":id", $id);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Atividade::class);
            return $lista;
        }
        
        public function deleteAtividade($id) {
            try {
                $stmt = $this->conexao->prepare("DELETE FROM atividade WHERE id = :id");
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
                $stmt->execute();
    
                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "Erro ao excluir a atividade: " . $e->getMessage();
                return false; 
            }
        }

        public function selectAllAtividade(){
            $pstmt = $this->conexao->prepare("SELECT * FROM atividade");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Atividade::class);
            return $lista;
        }

    }
?>