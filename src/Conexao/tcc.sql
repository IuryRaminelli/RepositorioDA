-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/11/2024 às 22:28
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
(5, '2024-10-31', 'qqq', 'src/View/img/Conceitos_Software_Livre.pdf'),
(12, '2024-11-01', 'Aaa', 'src/View/img/Edital nº 142-2024 - Resultado final - BAAE 2024.pdf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `atividade`
--

CREATE TABLE `atividade` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `dia` date NOT NULL,
  `local` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `atividade`
--

INSERT INTO `atividade` (`id`, `nome`, `descricao`, `dia`, `local`) VALUES
(17, 'CodeRace', 'A', '2024-11-01', 'Faculdade AMF'),
(18, 'teste2', 'teste2', '2024-11-02', 'IFFAR');

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
(16, 'teste2', 'src/View/img/casoUsoADM.png');

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
(2, 200, '0000-00-00', 'Patrocínio Sicredi'),
(3, -900, '2024-10-22', 'Pagamento Águas'),
(4, 545, '2024-10-26', 'Teste'),
(5, 4000, '2024-10-30', 'teste2');

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
(2, 'IURY RAMINELLI', 'raminelliiury4@gmail.com', '123', '51998754368', 'membro');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `estatuto`
--
ALTER TABLE `estatuto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `transacao`
--
ALTER TABLE `transacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
