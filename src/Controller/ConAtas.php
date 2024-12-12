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
            $pstmt->bindValue(1, $Atas->getDia());
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
            $pstmt = $this->conexao->prepare("DELETE FROM atas WHERE id = :id");
            $pstmt->bindValue(":id", $id);
            $pstmt->execute();
            return $pstmt;
        }

        public function selectAllAtas(){
            $pstmt = $this->conexao->prepare("SELECT * FROM atas ORDER BY dia DESC");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Atas::class);
            return $lista;
        }

    }
?>