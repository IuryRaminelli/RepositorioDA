<?php
    include_once __DIR__ . '/../Conexao/Conexao.php';
    include_once __DIR__ . '/../Model/Atividade.php';

    class ConAtividade {
        private $conexao;

        public function __construct() {
            $this->conexao = Conexao::getConexao();
        }

        public function insertAtividade(Atividade $Atividade) {
            $pstmt = $this->conexao->prepare("INSERT INTO atividade (nome, descricao, dia, local) VALUES (?,?,?,?)");
            $pstmt->bindValue(1, $Atividade->getNome());
            $pstmt->bindValue(2, $Atividade->getDescricao());
            $pstmt->bindValue(3, $Atividade->getDia());
            $pstmt->bindValue(4, $Atividade->getLocal());
            $pstmt->execute();
            return $pstmt;
        }

        public function selectAtividadeById($id) {
            $pstmt = $this->conexao->prepare("SELECT * FROM atividade WHERE id = :id");
            $pstmt->bindValue(":id", $id);
            $pstmt->execute();
            $atividade = $pstmt->fetchObject(Atividade::class); // Retorna um único objeto
            return $atividade;
        }

        public function deleteAtividade($id) {
            try {
                $stmt = $this->conexao->prepare("DELETE FROM atividade WHERE id = :id");
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
    
                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                echo "Erro ao excluir a atividade: " . $e->getMessage();
                return false;
            }
        }

        public function selectAllAtividade() {
            $pstmt = $this->conexao->prepare("SELECT * FROM atividade ORDER BY id DESC");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Atividade::class);
            return $lista;
        }

        // Função para contar o total de atividades
        public function contarAtividades() {
            $pstmt = $this->conexao->prepare("SELECT COUNT(*) FROM atividade");
            $pstmt->execute();
            $totalAtividades = $pstmt->fetchColumn();  // Retorna o número total de atividades
            return $totalAtividades;
        }

        // Função para selecionar atividades com paginação
        public function selectAtividadesComPaginacao($pagina, $limite) {
            $offset = ($pagina - 1) * $limite;  // Calculando o valor de offset baseado na página
            $pstmt = $this->conexao->prepare("SELECT * FROM atividade ORDER BY id DESC LIMIT :limite OFFSET :offset");
            $pstmt->bindValue(":limite", $limite, PDO::PARAM_INT);
            $pstmt->bindValue(":offset", $offset, PDO::PARAM_INT);
            $pstmt->execute();
            $atividades = $pstmt->fetchAll(PDO::FETCH_CLASS, Atividade::class);
            return $atividades;
        }
        
    }
?>
