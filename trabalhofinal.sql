-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Set-2021 às 21:31
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trabalhofinal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacoes`
--

CREATE TABLE `locacoes` (
  `idUser` int(11) NOT NULL,
  `idVeiculo` int(11) NOT NULL,
  `valor` double NOT NULL,
  `tempo_dias` int(11) NOT NULL,
  `data_locacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `locacoes`
--

INSERT INTO `locacoes` (`idUser`, `idVeiculo`, `valor`, `tempo_dias`, `data_locacao`) VALUES
(1, 17, 300, 2, '2021-08-29 21:33:23'),
(20, 17, 400, 2, '2021-08-30 19:06:27'),
(1, 20, 200, 2, '2021-08-31 17:52:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(20, 'lucas', 'lucas', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `precos`
--

CREATE TABLE `precos` (
  `idVeiculo` int(11) NOT NULL,
  `preco` double NOT NULL,
  `gasto` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `precos`
--

INSERT INTO `precos` (`idVeiculo`, `preco`, `gasto`) VALUES
(21, 400, '14Km/1L');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `identificacao` varchar(50) NOT NULL,
  `ano` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `tipo`, `modelo`, `identificacao`, `ano`) VALUES
(17, 'Barco', 'Martinelli Tornado 550', '0891FN01YD', '2003'),
(20, 'Moto', 'XJ', 'ABC-1234', '2021'),
(21, 'Carro', 'Celta', 'AAA-0000', '2011'),
(23, 'Carro', 'Corsa', 'OOO-0000', '2009'),
(26, 'Barco', 'Martinelli Tornado 550', '0891FN01YD', '2003');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `locacoes`
--
ALTER TABLE `locacoes`
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idVeiculo` (`idVeiculo`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `precos`
--
ALTER TABLE `precos`
  ADD KEY `fk_fornecedorDoProduto` (`idVeiculo`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `locacoes`
--
ALTER TABLE `locacoes`
  ADD CONSTRAINT `locacoes_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `login` (`id`),
  ADD CONSTRAINT `locacoes_ibfk_2` FOREIGN KEY (`idVeiculo`) REFERENCES `veiculos` (`id`);

--
-- Limitadores para a tabela `precos`
--
ALTER TABLE `precos`
  ADD CONSTRAINT `fk_fornecedorDoProduto` FOREIGN KEY (`idVeiculo`) REFERENCES `veiculos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
