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
            (imagem, nome, descricao, dia, local) VALUES (?,?,?,?,?)");
            $pstmt->bindValue(1, $Atividade->getImagem());
            $pstmt->bindValue(2, $Atividade->getNome());
            $pstmt->bindValue(3, $Atividade->getDescricao());
            $pstmt->bindValue(4, $Atividade->getDia());
            $pstmt->bindValue(5, $Atividade->getLocal());
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
                // Prepara a instrução SQL para excluir a ata
                $stmt = $this->conexao->prepare("DELETE FROM atividade WHERE id = :id");
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
                echo "Erro ao excluir a atividade: " . $e->getMessage();
                return false; // Em caso de erro
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