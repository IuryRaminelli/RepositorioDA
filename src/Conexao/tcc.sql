-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/01/2025 às 17:38
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `atas`
--

CREATE TABLE `atas` (
  `id` int(11) NOT NULL,
  `dia` date NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `arquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `atas`
--

INSERT INTO `atas` (`id`, `dia`, `descricao`, `arquivo`) VALUES
(33, '2024-12-01', 'Ata de Eleição', 'src/View/img/3. Modelo de Minuta Ata Eleição de Diretoria.pdf'),
(34, '2024-11-07', 'Ata de Reunião', 'src/View/img/MODELO-DE-ATA-DE-APURAÇÃO-DOS-VOTOS-POR-CORRESPONDÊNCIA.pdf'),
(35, '2024-12-06', 'Ata de Reunião', 'src/View/img/modelo-de-ata-de-eleicao-e-posse.pdf'),
(36, '2024-10-02', 'Ata de Eleição', 'src/View/img/ata-candidatos.pdf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `atividade`
--

CREATE TABLE `atividade` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(2000) NOT NULL,
  `dia` date NOT NULL,
  `local` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `atividade`
--

INSERT INTO `atividade` (`id`, `nome`, `descricao`, `dia`, `local`) VALUES
(18, 'teste2', 'teste2', '2024-11-02', 'IFFAR'),
(20, 'SeTEIC 16', '16° Semana Academica', '2024-11-06', 'IFFAR-SVS'),
(22, 'cccc', 'ccccc', '2024-11-11', 'aaaa'),
(27, 'testeeeeeeeee', 'testetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste', '2024-12-04', 'Mata'),
(29, 'masi um teste', 'asssssssssssssssssssssssss', '2024-12-04', 'São Vicente do Sul'),
(36, '1° dia de 16ª SeTEIC', 'No 1° dia de 16ª SeTEIC, dia 29/10/2024 ocorreu diversas oficinas no turno da manhã e tarde, como, WordPress, Manutenção de Notebook, Modelagem 3D, entre outras. No turno da noite, ocorreu a palestra \"De Dados a Decisões: Aplicações de Machine Learning no Mundo Real\", com ', '2024-10-29', 'São Vicente do Sul'),
(37, '2° dia de 16ª SeTEIC', 'No 2° dia de 16ª SeTEIC, dia 30/10/2024 ocorreu diversas oficinas no turno da manhã e tarde, como, GameMaker, Canva, App Inventor, entre outras. No turno da noite, ocorreu a palestra \"Projetos de ensino e pesquisa nos cursos de engenharia da UFSM\".', '2024-10-30', 'São Vicente do Sul'),
(38, '3° dia de 16ª SeTEIC', 'No 3° dia de 16ª SeTEIC, dia 30/10/2024 ocorreu diversas oficinas no turno da manhã e tarde, como, GameMaker, Canva, App Inventor, entre outras. No turno da noite, ocorreu a palestra \"Da Universidade ao Mundo Real: Construindo uma Carreira em Engenharia de Software\".', '2024-10-31', 'São Vicente do Sul'),
(39, '4° dia de 16ª SeTEIC', 'No 4° e ultimo dia da 16ª SeTEIC, ocorreu uma Roda de Egressos e janta com os alunos e professores.', '2024-11-01', 'São Vicente do Sul'),
(40, 'Confraternização Final de Semestre', 'No dia 13 de Dezembro de 2023, ocorreu uma confraternização organizada pelo DA juntamente com os professores, para celebrar o final do Semestre....', '2023-12-13', 'São Vicente do Sul'),
(42, 'CodeRace', 'No dia 30 e 31 de Agosto de 2024, alunos da ADS e alguns representantes do DA, participaram de um hackathon na faculdade AMF.', '2024-08-31', 'Restinga Seca'),
(44, 'Testando Vídeo', 'Teste', '2024-12-19', 'São Vicente do Sul');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estatuto`
--

CREATE TABLE `estatuto` (
  `id` int(11) NOT NULL,
  `ano` year(4) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `arquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estatuto`
--

INSERT INTO `estatuto` (`id`, `ano`, `descricao`, `arquivo`) VALUES
(6, '2010', 'Estatuto DAADS', 'src/View/img/Estatutuo DAADS.pdf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem`
--

CREATE TABLE `imagem` (
  `id` int(11) NOT NULL,
  `idativ` varchar(255) NOT NULL,
  `arquivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imagem`
--

INSERT INTO `imagem` (`id`, `idativ`, `arquivo`) VALUES
(15, 'teste2', 'src/View/img/CLASSEalgo.png'),
(16, 'teste2', 'src/View/img/casoUsoADM.png'),
(19, 'SeTEIC 16', 'src/View/img/Design sem nome (3).png'),
(20, 'SeTEIC 16', 'src/View/img/classeModel.png'),
(21, 'SeTEIC 16', 'src/View/img/zp3F9ij__400x400.png'),
(23, 'cccc', 'src/View/img/https___dev-to-uploads.s3.amazonaws.com_uploads_articles_ju90mj1tkx425b76rv7u.jpg'),
(24, 'cccc', 'src/View/img/IFF.jpg'),
(25, 'cccc', 'src/View/img/casoUsoADM.png'),
(39, 'testeeeeeeeee', 'src/View/img/ronaldinho2.jpg'),
(40, 'testeeeeeeeee', 'src/View/img/Diagrama em branco.png'),
(42, 'masi um teste', 'src/View/img/Diagrama em branco.png'),
(45, '1° dia de 16ª SeTEIC', 'src/View/img/dia1.1.png'),
(46, '1° dia de 16ª SeTEIC', 'src/View/img/dia1.2.png'),
(47, '1° dia de 16ª SeTEIC', 'src/View/img/dia1.3.png'),
(48, '2° dia de 16ª SeTEIC', 'src/View/img/dia2.3.png'),
(49, '2° dia de 16ª SeTEIC', 'src/View/img/dia2.1.png'),
(50, '2° dia de 16ª SeTEIC', 'src/View/img/dia2.2.png'),
(51, '3° dia de 16ª SeTEIC', 'src/View/img/dia3.1.png'),
(52, '4° dia de 16ª SeTEIC', 'src/View/img/dia4.1.png'),
(53, '4° dia de 16ª SeTEIC', 'src/View/img/dia4.2.png'),
(54, '4° dia de 16ª SeTEIC', 'src/View/img/dia4.3.png'),
(55, 'Confraternização Final de Semestre', 'src/View/img/a1.png'),
(56, 'Confraternização Final de Semestre', 'src/View/img/a2.png'),
(57, 'Confraternização Final de Semestre', 'src/View/img/a3.png'),
(58, 'Confraternização Final de Semestre', 'src/View/img/a4.png'),
(59, 'CodeRace', 'src/View/img/b1.png'),
(61, 'Testando Vídeo', 'src/View/img/3e3166157ec5aab796cadcbc4de31351.jpg'),
(62, 'Testando Vídeo', 'src/View/img/ads.png'),
(63, 'Testando Vídeo', 'src/View/img/logo-ads.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `log_transacoes`
--

CREATE TABLE `log_transacoes` (
  `id` int(11) NOT NULL,
  `idTrans` int(11) NOT NULL,
  `quantidade` decimal(10,2) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `data_exclusao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `log_transacoes`
--

INSERT INTO `log_transacoes` (`id`, `idTrans`, `quantidade`, `descricao`, `dia`, `data_exclusao`) VALUES
(1, 11, -94.00, 'apoio financeiro', '2024-12-10', '2024-12-19 14:34:44'),
(2, 1, 555.00, 'Patrocínio AMPER', '2024-10-25', '2024-12-19 14:42:22'),
(3, 12, -2000.00, 'Saída de dinheiro teste', '2024-12-19', '2024-12-19 21:34:32');

-- --------------------------------------------------------

--
-- Estrutura para tabela `membros`
--

CREATE TABLE `membros` (
  `id` int(11) NOT NULL,
  `ano` int(10) NOT NULL,
  `presidente` varchar(200) NOT NULL,
  `vicep` varchar(200) NOT NULL,
  `secretario` varchar(200) NOT NULL,
  `vices` varchar(200) NOT NULL,
  `tesoureiro` varchar(200) NOT NULL,
  `vicet` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `membros`
--

INSERT INTO `membros` (`id`, `ano`, `presidente`, `vicep`, `secretario`, `vices`, `tesoureiro`, `vicet`) VALUES
(3, 2025, 'Rafael Müller Tischler', 'Murilo Brauner Ziani', 'Carolini Bassan Carlé', 'Maurício Carvalho Cogo', 'João Vitor Martins San Martin', 'João Miguel Zucuni Ugulini'),
(4, 2024, 'João Manoel Carvalho Lopes', 'Arthur Guarizi De Godoy', 'Joseane Dias de Oliveira', 'Bruna Flores Righes', 'Samara Librelotto Winkelmann', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `transacao`
--

CREATE TABLE `transacao` (
  `id` int(11) NOT NULL,
  `quantidade` double NOT NULL,
  `dia` date NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `transacao`
--

INSERT INTO `transacao` (`id`, `quantidade`, `dia`, `descricao`) VALUES
(3, -900, '2024-10-22', 'Pagamento Águas'),
(4, 545, '2024-10-26', 'Teste'),
(6, 1200, '2024-11-07', 'apoio financeiro'),
(7, -800, '2024-11-12', 'Teste'),
(8, 1000, '2024-11-12', 'Estatuto DAADS');

--
-- Acionadores `transacao`
--
DELIMITER $$
CREATE TRIGGER `after_delete_transacao` AFTER DELETE ON `transacao` FOR EACH ROW BEGIN
    INSERT INTO log_transacoes (idTrans, quantidade, descricao, dia)
    VALUES (OLD.id, OLD.quantidade, OLD.descricao, OLD.dia);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `email`, `senha`, `telefone`, `tipo`) VALUES
(1, 'Adminstradorrr', 'administrador@teste.com', '$2y$10$DGl6Ome9kC25xoubqKSflOBWm3X4tZQgc8.yPLzCHlSgyEJTSGIOy', '51998754368', 'admin'),
(2, 'IURY RAMINELLI', 'raminelliiury4@gmail.com', '123', '51998754368', 'membro'),
(3, 'Itamar', 'raminellitamar@gmail.com', '123', '11111', 'membro'),
(4, 'Santinhooo', 'santinho@gmail.com', '$2y$10$.n1.q9byFv7Mh3Rb3ImEwe81Z4y1oyDqvpBryC68djOzjaL4K6xoC', '1111', 'membro');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `atas`
--
ALTER TABLE `atas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `estatuto`
--
ALTER TABLE `estatuto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkatividade` (`idativ`);

--
-- Índices de tabela `log_transacoes`
--
ALTER TABLE `log_transacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `transacao`
--
ALTER TABLE `transacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atas`
--
ALTER TABLE `atas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `estatuto`
--
ALTER TABLE `estatuto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `log_transacoes`
--
ALTER TABLE `log_transacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `membros`
--
ALTER TABLE `membros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `transacao`
--
ALTER TABLE `transacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `fkatividade` FOREIGN KEY (`idativ`) REFERENCES `atividade` (`nome`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
