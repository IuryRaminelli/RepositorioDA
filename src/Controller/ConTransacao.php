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
            $pstmt = $this->conexao->prepare("SELECT * FROM transacao");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Transacao::class);
            return $lista;
        }

    }
?>