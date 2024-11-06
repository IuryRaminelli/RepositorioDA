<?php
    include_once __DIR__ . '/../Conexao/Conexao.php';
    include_once __DIR__ . '/../Model/Estatuto.php';

    class ConEstatuto{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        public function insertEstatuto(Estatuto $Estatuto){
            $pstmt = $this->conexao->prepare("INSERT INTO estatuto 
            (ano, descricao, arquivo) VALUES (?,?,?)");
            $pstmt->bindValue(1, $Estatuto->getAno());
            $pstmt->bindValue(2, $Estatuto->getDescricao());
            $pstmt->bindValue(3, $Estatuto->getArquivo());
            $pstmt->execute();
            return $pstmt;
        }

        public function selectEstatutoById($id) {
            $pstmt = $this->conexao->prepare("SELECT * FROM estatuto e WHERE e.id = :id");
            $pstmt->bindValue(":id", $id);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Estatuto::class);
            return $lista;
        }
        
        public function deleteEstatuto($id) {
            try {
                $stmt = $this->conexao->prepare("DELETE FROM estatuto WHERE id = :id");
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
                $stmt->execute();
    
                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "Erro ao excluir a ata: " . $e->getMessage();
                return false;
            }
        }


        public function selectAllEstatuto(){
            $pstmt = $this->conexao->prepare("SELECT * FROM estatuto");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Estatuto::class);
            return $lista;
        }

    }
?>