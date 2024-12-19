<?php
include_once __DIR__ . '/../Conexao/Conexao.php';
include_once __DIR__ . '/../Model/Transacao.php';

class ConTransacao {
    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function insertTransacao(Transacao $Transacao) {
        try {
            $pstmt = $this->conexao->prepare("
                INSERT INTO transacao (quantidade, dia, descricao) 
                VALUES (?, ?, ?)
            ");
            $pstmt->bindValue(1, $Transacao->getQuantidade());
            $pstmt->bindValue(2, $Transacao->getDia());
            $pstmt->bindValue(3, $Transacao->getDescricao());
            $pstmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao inserir transação: " . $e->getMessage();
            return false;
        }
    }

    public function selectAllTransacao() {
        try {
            $pstmt = $this->conexao->prepare("
                SELECT * FROM transacao 
                ORDER BY dia DESC
            ");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Transacao::class);
            return $lista;
        } catch (PDOException $e) {
            echo "Erro ao buscar transações: " . $e->getMessage();
            return [];
        }
    }

    public function deleteTransacao($id) {
        try {
            $stmt = $this->conexao->prepare("
                DELETE FROM transacao 
                WHERE id = :id
            ");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Erro ao excluir transação: " . $e->getMessage();
            return false;
        }
    }

    public function selectAllLogTransacao() {
        try {
            $pstmt = $this->conexao->prepare("
                SELECT idTrans, quantidade, descricao, dia, data_exclusao 
                FROM log_transacoes 
                ORDER BY data_exclusao DESC
            ");
            $pstmt->execute();
            return $pstmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao buscar histórico de exclusões: " . $e->getMessage();
            return [];
        }
    }
}
?>
