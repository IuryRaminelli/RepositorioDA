-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/10/2024 às 14:25
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
(1, '2024-10-14', 'teste', 'src/View/img/simulado_COBIT.pdf'),
(2, '2024-10-25', 'teste2', 'src/View/img/50_Code_race_Sistema_de_Informação.pdf');

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
(3, -900, '2024-10-22', 'Pagamento Águas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `telefone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `email`, `senha`, `telefone`) VALUES
(1, 'Administrador', 'administrador@teste.com', '@admin24', '123'),
(2, 'Thiago Ryan', 'raminelliiury4@gmail.com', '123', '1212');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `atas`
--
ALTER TABLE `atas`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atas`
--
ALTER TABLE `atas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `transacao`
--
ALTER TABLE `transacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
