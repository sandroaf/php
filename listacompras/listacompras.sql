-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Set-2023 às 21:41
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `listacompras`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `codigo` int(11) NOT NULL COMMENT 'Código do Imtem da lista de compras',
  `datahora` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Data e Hora do Item cadastrado',
  `descricao` varchar(200) NOT NULL COMMENT 'Descrição do item na lista de compras',
  `quantidade` decimal(12,2) DEFAULT NULL COMMENT 'Quantidade do item para comprar',
  `codigo_lista` int(11) NOT NULL COMMENT 'Código da lista que o item pertence'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`codigo`, `datahora`, `descricao`, `quantidade`, `codigo_lista`) VALUES
(1, '2023-09-11 15:36:40', 'Arroz', '1.00', 3),
(9, '2023-09-18 16:55:46', 'Açucar', NULL, 9),
(10, '2023-09-18 16:57:00', 'Velas', '2.00', 9),
(15, '2023-09-19 15:56:07', 'Apagador', '1.00', 11),
(16, '2023-09-19 15:56:22', 'Papel A4 ', '10.00', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista`
--

CREATE TABLE `lista` (
  `codigo` int(11) NOT NULL COMMENT 'Código das Lista de compres',
  `nome` varchar(100) NOT NULL COMMENT 'Nome da Lista de Compras'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Listas de Compras';

--
-- Extraindo dados da tabela `lista`
--

INSERT INTO `lista` (`codigo`, `nome`) VALUES
(10, 'Escola 2024'),
(9, 'Festa de Aniversário'),
(3, 'Sandro'),
(11, 'UNIDAVI');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `lista_fk` (`codigo_lista`);

--
-- Índices para tabela `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `nome_lista` (`nome`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `item`
--
ALTER TABLE `item`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código do Imtem da lista de compras', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `lista`
--
ALTER TABLE `lista`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código das Lista de compres', AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `lista_fk` FOREIGN KEY (`codigo_lista`) REFERENCES `lista` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
