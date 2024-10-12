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
        public function selectAllAtas(){
            $pstmt = $this->conexao->prepare("SELECT * FROM atas");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Atas::class);
            return $lista;
        }

    }
?>