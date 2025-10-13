-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/10/2025 às 20:34
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
-- Banco de dados: `fitlife`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `nome_materno` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone_celular` varchar(20) NOT NULL,
  `telefone_fixo` varchar(20) DEFAULT NULL,
  `cep` varchar(8) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `senha_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `nome_completo`, `data_nascimento`, `sexo`, `nome_materno`, `cpf`, `email`, `telefone_celular`, `telefone_fixo`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `senha_hash`) VALUES
(1, 'Nathan Marculino Pacheco', '0004-11-12', 'masculino', 'Nathan Marculino Pacheco', '198.384.477-22', 'natanpacheco144@gmail.com', '21995609453', '2131354235', '25041-31', 'Rua Amarilis', 'Jardim Maricen', 'Duque de Caxias', 'RJ', '$2y$10$ImS5w6jchSBVrU.LjatrZeqQM5.AfhXPTdOJPfNaoeyzYn/zrlMQi'),
(2, 'Luiz carlos', '2001-11-12', 'masculino', 'Luiz carlos pachecos', '245.132.617-49', 'canaldomundo377@gmail.com', '21995609453', '2131354235', '25041-31', 'Rua Amarilis', 'Jardim Maricen', 'Duque de Caxias', 'RJ', '$2y$10$YBAQCvps/8sRHXN4pBew/eUiBjVrdOgOswLqd5dBcDKGK8DNkVbZu');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
