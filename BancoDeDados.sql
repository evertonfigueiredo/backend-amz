-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jan-2022 às 23:44
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `amz`
--
DROP DATABASE IF EXISTS `amz`;
CREATE DATABASE IF NOT EXISTS `amz` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `amz`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `fone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dataNasc` date NOT NULL,
  `logradouro` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `uf` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `client`
--

INSERT INTO `client` (`id`, `nome`, `email`, `fone`, `dataNasc`, `logradouro`, `cidade`, `bairro`, `uf`) VALUES
(1, 'Everton', 'everton@amz.com', '81998682810', '1998-01-02', 'Local de moradia', 'Surubim', 'Centro', 'PE'),
(2, 'Thiago', 'thiago@amz.com', '99999993', '2022-01-27', 'Teste ', 'Cidade Local', 'Centro', 'Amapá'),
(3, 'Gustavo', 'gustavo@amz.com', '8888888888', '2022-01-28', 'Teste de Local', 'Teste de Cidade', 'Testando Bairro', 'AM'),
(4, 'Fabiany', 'fabiany@amz.com', '898765464', '1997-09-19', 'Rua do OI', 'SP', 'SP', 'SP'),
(5, 'Inalda', 'inalda@amz.com', '54564874', '1956-04-16', 'Rua da vida', 'Aurora', 'centro', 'Estado'),
(6, 'Reginaldo', 'reginaldo@amz.com', '23423455', '1975-04-04', 'Rua da avenida', 'Eté', 'Local do Bairro', 'RJ'),
(8, 'Maria', 'maria@amz.com', '3154645646', '1987-01-04', 'Teste de Rua', 'Cidade', 'Bairro', 'PE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
