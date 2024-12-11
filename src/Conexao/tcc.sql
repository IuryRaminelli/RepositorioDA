-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/12/2024 às 22:34
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
(13, '2024-11-02', 'aa', 'src/View/img/FORMULÁRIO-MODELO-08-–-ATA-DA-CONVENÇÃO-MUNICIPAL-PARA-ELEIÇÃO-DO-DIRETÓRIO-4.pdf');

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
(17, 'CodeRace', 'A', '2024-11-01', 'Faculdade AMF'),
(18, 'teste2', 'teste2', '2024-11-02', 'IFFAR'),
(20, 'SeTEIC 16', '16° Semana Academica', '2024-11-06', 'IFFAR-SVS'),
(21, 'teste de cadastro com imagem', 'teste de cadastro com imagem', '2024-11-06', 'IFFAR-SVS'),
(22, 'cccc', 'ccccc', '2024-11-11', 'aaaa'),
(24, 'Palestra 43', 'Os repositórios institucionais estão formados por material digital em coleções altamente estruturadas, compostas pelos produtos das atividades acadêmicas desenvolvidas em universidades e em instituições de pesquisa. Podem contemplar ampla variedade de doc', '2024-12-04', 'São Vicente do Sul'),
(26, 'Nota de Pesar', 'O Instituto Federal Farroupilha - Campus São Vicente do Sul registra, com imenso pesar, o falecimento da egressa Carmem Rumpel Segabinazzi, ocorrido no dia de ontem, 01 de dezembro de 2024. Carmem era residente de São Vicente do Sul e foi nossa aluna do C', '2024-12-04', 'São Vicente do Sul'),
(27, 'testeeeeeeeee', 'testetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste', '2024-12-04', 'Mata'),
(29, 'masi um teste', 'asssssssssssssssssssssssss', '2024-12-04', 'São Vicente do Sul');

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
(13, 'CodeRace', 'src/View/img/PHOTO-2024-08-31-09-31-53.jpg'),
(14, 'CodeRace', 'src/View/img/PHOTO-2024-08-31-09-31-52.jpg'),
(15, 'teste2', 'src/View/img/CLASSEalgo.png'),
(16, 'teste2', 'src/View/img/casoUsoADM.png'),
(19, 'SeTEIC 16', 'src/View/img/Design sem nome (3).png'),
(20, 'SeTEIC 16', 'src/View/img/classeModel.png'),
(21, 'SeTEIC 16', 'src/View/img/zp3F9ij__400x400.png'),
(22, 'teste de cadastro com imagem', 'src/View/img/Design sem nome (3).png'),
(23, 'cccc', 'src/View/img/https___dev-to-uploads.s3.amazonaws.com_uploads_articles_ju90mj1tkx425b76rv7u.jpg'),
(24, 'cccc', 'src/View/img/IFF.jpg'),
(25, 'cccc', 'src/View/img/casoUsoADM.png'),
(26, 'Palestra 43', 'src/View/img/ronaldinho2.jpg'),
(27, 'Palestra 43', 'src/View/img/Screenshot_1.png'),
(28, 'Palestra 43', 'src/View/img/Diagrama em branco.png'),
(29, 'Palestra 43', 'src/View/img/TCC.png'),
(30, 'Palestra 43', 'src/View/img/TelaLogin.png'),
(31, 'Palestra 43', 'src/View/img/classeViewpt2.png'),
(38, 'Nota de Pesar', 'src/View/img/ronaldinho2.jpg'),
(39, 'testeeeeeeeee', 'src/View/img/ronaldinho2.jpg'),
(40, 'testeeeeeeeee', 'src/View/img/Diagrama em branco.png'),
(42, 'masi um teste', 'src/View/img/Diagrama em branco.png');

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
(1, 555, '2024-10-25', 'Patrocínio AMPER'),
(3, -900, '2024-10-22', 'Pagamento Águas'),
(4, 545, '2024-10-26', 'Teste'),
(6, 1200, '2024-11-07', 'apoio financeiro'),
(7, -800, '2024-11-12', 'Teste'),
(8, 1000, '2024-11-12', 'Estatuto DAADS'),
(11, -94, '2024-12-10', 'apoio financeiro');

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
(1, 'Adminstrador', 'administrador@teste.com', '123', '51998754368', 'admin'),
(2, 'IURY RAMINELLI', 'raminelliiury4@gmail.com', '123', '51998754368', 'membro'),
(3, 'Itamar', 'raminellitamar@gmail.com', '123', '11111', 'membro');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `estatuto`
--
ALTER TABLE `estatuto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `membros`
--
ALTER TABLE `membros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `transacao`
--
ALTER TABLE `transacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
