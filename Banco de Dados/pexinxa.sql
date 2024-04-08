-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/03/2024 às 01:58
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
-- Banco de dados: `pexinxa`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria_fornecedor`
--

CREATE TABLE `categoria_fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria_promocao`
--

CREATE TABLE `categoria_promocao` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cupom_fornecedor`
--

CREATE TABLE `cupom_fornecedor` (
  `id` int(11) NOT NULL,
  `cupom` varchar(100) NOT NULL,
  `id_fornecedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cupom_promocao`
--

CREATE TABLE `cupom_promocao` (
  `id` int(11) NOT NULL,
  `cupom` varchar(100) NOT NULL,
  `id_promocao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `id_promocao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `promocao`
--

CREATE TABLE `promocao` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `site_fornecedor` int(11) NOT NULL,
  `preco` double NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `site_fornecedor`
--

CREATE TABLE `site_fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `telefone`
--

CREATE TABLE `telefone` (
  `id` int(11) NOT NULL,
  `telefone` int(14) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `nome_tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria_fornecedor`
--
ALTER TABLE `categoria_fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categoria_promocao`
--
ALTER TABLE `categoria_promocao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cupom_fornecedor`
--
ALTER TABLE `cupom_fornecedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fornecedor` (`id_fornecedor`);

--
-- Índices de tabela `cupom_promocao`
--
ALTER TABLE `cupom_promocao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_promocao` (`id_promocao`);

--
-- Índices de tabela `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_promocao` (`id_promocao`);

--
-- Índices de tabela `promocao`
--
ALTER TABLE `promocao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `site_fornecedor` (`site_fornecedor`);

--
-- Índices de tabela `site_fornecedor`
--
ALTER TABLE `site_fornecedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices de tabela `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria_fornecedor`
--
ALTER TABLE `categoria_fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categoria_promocao`
--
ALTER TABLE `categoria_promocao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cupom_fornecedor`
--
ALTER TABLE `cupom_fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cupom_promocao`
--
ALTER TABLE `cupom_promocao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `promocao`
--
ALTER TABLE `promocao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `site_fornecedor`
--
ALTER TABLE `site_fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `telefone`
--
ALTER TABLE `telefone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cupom_fornecedor`
--
ALTER TABLE `cupom_fornecedor`
  ADD CONSTRAINT `cupom_fornecedor_ibfk_1` FOREIGN KEY (`id_fornecedor`) REFERENCES `site_fornecedor` (`id`);

--
-- Restrições para tabelas `cupom_promocao`
--
ALTER TABLE `cupom_promocao`
  ADD CONSTRAINT `cupom_promocao_ibfk_1` FOREIGN KEY (`id_promocao`) REFERENCES `promocao` (`id`);

--
-- Restrições para tabelas `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`id_promocao`) REFERENCES `promocao` (`id`);

--
-- Restrições para tabelas `promocao`
--
ALTER TABLE `promocao`
  ADD CONSTRAINT `promocao_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_promocao` (`id`),
  ADD CONSTRAINT `promocao_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `promocao_ibfk_3` FOREIGN KEY (`site_fornecedor`) REFERENCES `site_fornecedor` (`id`);

--
-- Restrições para tabelas `site_fornecedor`
--
ALTER TABLE `site_fornecedor`
  ADD CONSTRAINT `site_fornecedor_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `promocao` (`id`),
  ADD CONSTRAINT `site_fornecedor_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_fornecedor` (`id`);

--
-- Restrições para tabelas `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `telefone_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
