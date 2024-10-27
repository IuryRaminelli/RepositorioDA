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
            $pstmt->bindValue(1, value: $Estatuto->getAno());
            $pstmt->bindValue(2, $Estatuto->getDescricao());
            $pstmt->bindValue(3, $Estatuto->getArquivo());
            $pstmt->execute();
            return $pstmt;
        }
        public function selectAllEstatuto(){
            $pstmt = $this->conexao->prepare("SELECT * FROM estatuto");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Estatuto::class);
            return $lista;
        }

    }
?>