-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Abr-2021 às 02:02
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ponteon`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresarios`
--

CREATE TABLE `empresarios` (
  `id_empresario` int(11) NOT NULL,
  `nome_completo` varchar(255) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cidade` varchar(256) NOT NULL,
  `pai_empresarial` varchar(256) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresarios`
--

INSERT INTO `empresarios` (`id_empresario`, `nome_completo`, `celular`, `estado`, `cidade`, `pai_empresarial`, `data`) VALUES
(24, 'Fulano de Tal', '(49)9854-1456', 'SC', 'Chapecó', '', '2021-04-02 13:06:00'),
(26, 'Beltrano Tomé ', '(48)9987-6423', 'SC', 'Itajaí', 'Fulano de Tal', '2021-04-02 13:14:00'),
(27, 'Pedro Pederneiras', '(21)9854-1412', 'RJ', 'Niterói', 'Fulano de Tal', '2021-04-02 13:16:00'),
(28, 'José das Dores', '(11)9822-1112', 'SP', 'Osasco', 'Pedro Pederneiras', '2021-04-02 13:16:00'),
(29, 'Zézinho dos Codes', '(91)9854-1452', 'PA', 'Belém', 'Fulano de Tal', '2021-04-02 13:18:00'),
(30, 'Maria Recursiva', '(47)9681-2876', 'SC', 'Blumenau', 'José das Dores', '2021-04-02 13:18:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresarios`
--
ALTER TABLE `empresarios`
  ADD PRIMARY KEY (`id_empresario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresarios`
--
ALTER TABLE `empresarios`
  MODIFY `id_empresario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
