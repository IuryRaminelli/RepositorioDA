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
        public function selectAllAtividade(){
            $pstmt = $this->conexao->prepare("SELECT * FROM atividade");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Atividade::class);
            return $lista;
        }

    }
?>