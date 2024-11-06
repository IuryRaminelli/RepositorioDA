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
            $pstmt->bindValue(1, $Imagem->getIdAtiv());
            $pstmt->bindValue(2, $Imagem->getArquivo());
            $pstmt->execute();
            return $pstmt;
        }


        public function selectAllImagem($idativ){
            $pstmt = $this->conexao->prepare("SELECT * FROM imagem WHERE idativ = :idativ");
            $pstmt->bindParam(':idativ', $idativ, PDO::PARAM_STR);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Imagem::class);
            return $lista;
        }

    }
?>