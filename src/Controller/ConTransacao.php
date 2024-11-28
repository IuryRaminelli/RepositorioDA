<?php
    include_once __DIR__ . '/../Conexao/Conexao.php';
    include_once __DIR__ . '/../Model/Transacao.php';

    class ConTransacao{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        public function insertTransacao(Transacao $Transacao){
            $pstmt = $this->conexao->prepare("INSERT INTO transacao 
            (quantidade, dia, descricao) VALUES (?,?,?)");
            $pstmt->bindValue(1, $Transacao->getQuantidade());
            $pstmt->bindValue(2, $Transacao->getDia());
            $pstmt->bindValue(3, $Transacao->getDescricao());
            $pstmt->execute();
            return $pstmt;
        }
        public function selectAllTransacao(){
            $pstmt = $this->conexao->prepare("SELECT * FROM transacao ORDER BY dia DESC");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Transacao::class);
            return $lista;
        }

        public function deleteTransacao($id) {
            try {
                $stmt = $this->conexao->prepare("DELETE FROM transacao WHERE id = :id");
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
                $stmt->execute();
    
                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "Erro ao excluir transação: " . $e->getMessage();
                return false;
            }
        }
    }
?>