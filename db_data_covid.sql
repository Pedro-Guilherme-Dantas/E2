-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Mar-2021 às 13:16
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_data_covid`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `cid_id` int(11) NOT NULL,
  `cid_name` varchar(100) NOT NULL,
  `cid_x` int(11) NOT NULL,
  `cid_y` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`cid_id`, `cid_name`, `cid_x`, `cid_y`) VALUES
(1, 'Caicó', 130, 222),
(2, 'Cruzeta', 187, 197),
(3, 'Jucurutu', 127, 117),
(4, 'São Fernando', 93, 190),
(5, 'São João do Sabuji', 80, 289),
(6, 'São José do Seridó', 174, 232),
(7, 'Jardim do Seridó', 190, 262),
(8, 'Ouro Branco', 157, 288),
(9, 'Florânia', 182, 141),
(10, 'Acari', 233, 211),
(11, 'Ipueira', 79, 319),
(12, 'Serra Negra do Norte', 33, 262),
(13, 'Jardim de Piranhas', 49, 197),
(14, 'Timbaúba dos Batistas', 68, 230),
(15, 'Tenente Laurentino Cruz', 214, 140),
(16, 'São Vicente', 231, 153),
(17, 'Santana do Matos', 234, 74),
(18, 'Currais Novos', 292, 160),
(19, 'Lagoa Nova', 262, 123),
(20, 'Cerro Corá', 325, 97),
(21, 'Bodó', 292, 88),
(22, 'Carnaúba dos Dantas', 261, 251),
(23, 'Parelhas', 245, 297),
(24, 'Santana do Seridó', 202, 301),
(25, 'Equador', 230, 241);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cpfs`
--

CREATE TABLE `cpfs` (
  `CPF_COD` int(11) NOT NULL,
  `CPF_CPF` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cpfs`
--

INSERT INTO `cpfs` (`CPF_COD`, `CPF_CPF`) VALUES
(19, '06068346056'),
(20, '59535972073'),
(21, '49148195030'),
(22, '10895433010');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`cid_id`);

--
-- Índices para tabela `cpfs`
--
ALTER TABLE `cpfs`
  ADD PRIMARY KEY (`CPF_COD`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `cid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `cpfs`
--
ALTER TABLE `cpfs`
  MODIFY `CPF_COD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
