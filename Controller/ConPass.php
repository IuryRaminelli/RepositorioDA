<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/PassagemCompra.php';

    class ConPass{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        function insertPass(PassagemCompra $PassagemCompra){
            $pstmt = $this->conexao->prepare("INSERT INTO passagemcompra 
            (fkOnibus, fkUser, preco, formaPag, dataHoraComprada) VALUES 
            (?,?,?,?,?)");
            $pstmt->bindValue(1, $PassagemCompra->getFkOnibus());
            $pstmt->bindValue(2, $PassagemCompra->getFkUser());
            $pstmt->bindValue(3, $PassagemCompra->getPreco());
            $pstmt->bindValue(4, $PassagemCompra->getFormaPag());
            $pstmt->bindValue(5, $PassagemCompra->getDataHoraComprada());
            $pstmt->execute();
            return $pstmt;
        }
    }

?>