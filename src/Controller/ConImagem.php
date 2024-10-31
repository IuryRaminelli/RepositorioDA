<?php
    include_once __DIR__ . '/../Conexao/Conexao.php';
    include_once __DIR__ . '/../Model/Imagem.php';

    class ConImagem{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        public function insertImagem(Imagem $Imagem){
            $pstmt = $this->conexao->prepare("INSERT INTO imagem 
            (idativ, arquivo) VALUES (?,?)");
            $pstmt->bindValue(1, value: $Imagem->getIdAtiv());
            $pstmt->bindValue(2, $Imagem->getArquivo());
            $pstmt->execute();
            return $pstmt;
        }

        public function selectImagemById($id) {
            $pstmt = $this->conexao->prepare("SELECT * FROM imagem i WHERE i.id = :id");
            $pstmt->bindValue(":id", $id);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Imagem::class);
            return $lista;
        }
        
        public function deleteImagem($id) {
            try {
                // Prepara a instrução SQL para excluir a ata
                $stmt = $this->conexao->prepare("DELETE FROM imagem WHERE id = :id");
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
                $stmt->execute();
    
                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "Erro ao excluir a imagem: " . $e->getMessage();
                return false;
            }
        }


        public function selectAllImagem(){
            $pstmt = $this->conexao->prepare("SELECT * FROM imagem");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Imagem::class);
            return $lista;
        }

    }
?>