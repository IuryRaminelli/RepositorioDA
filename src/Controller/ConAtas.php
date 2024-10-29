<?php
    include_once __DIR__ . '/../Conexao/Conexao.php';
    include_once __DIR__ . '/../Model/Atas.php';

    class ConAtas{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        public function insertAtas(Atas $Atas){
            $pstmt = $this->conexao->prepare("INSERT INTO atas 
            (dia, descricao, arquivo) VALUES (?,?,?)");
            $pstmt->bindValue(1, value: $Atas->getDia());
            $pstmt->bindValue(2, $Atas->getDescricao());
            $pstmt->bindValue(3, $Atas->getArquivo());
            $pstmt->execute();
            return $pstmt;
        }

        public function selectAtaById($id) {
            $pstmt = $this->conexao->prepare("SELECT * FROM atas a WHERE a.id = :id");
            $pstmt->bindValue(":id", $id);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Atas::class);
            return $lista;
        }
        
        public function deleteAta($id) {
            try {
                // Prepara a instrução SQL para excluir a ata
                $stmt = $this->conexao->prepare("DELETE FROM atas WHERE id = :id");
                $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Vincula o parâmetro
    
                // Executa a instrução
                $stmt->execute();
    
                // Verifica se a exclusão foi bem-sucedida
                if ($stmt->rowCount() > 0) {
                    return true; // Deletado com sucesso
                } else {
                    return false; // Não foi encontrado nenhum registro com esse ID
                }
            } catch (PDOException $e) {
                echo "Erro ao excluir a ata: " . $e->getMessage();
                return false; // Em caso de erro
            }
        }

        public function selectAllAtas(){
            $pstmt = $this->conexao->prepare("SELECT * FROM atas");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Atas::class);
            return $lista;
        }

    }
?>