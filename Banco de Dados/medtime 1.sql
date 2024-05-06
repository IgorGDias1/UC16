-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/05/2024 às 20:44
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
-- Banco de dados: `medtime`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrar_usuario_localizacao` (IN `nomeCad` VARCHAR(300), IN `emailCad` VARCHAR(300), IN `senhaCad` VARCHAR(300), IN `cpfCad` VARCHAR(11), IN `data_nascimentoCad` DATE, IN `telefone_celularCad` VARCHAR(10), IN `telefone_residencialCad` VARCHAR(10), IN `id_convenioCad` INT(11), IN `tipoCad` VARCHAR(15), IN `cepCad` VARCHAR(10), IN `logradouroCad` VARCHAR(300), IN `complementoCad` VARCHAR(300), IN `bairroCad` VARCHAR(300), IN `localidadeCad` VARCHAR(300), IN `ufCad` VARCHAR(300), IN `dddCad` VARCHAR(300), IN `tipoLocal` VARCHAR(15))   BEGIN
#Declarando a variaval para armazenar o id do insert
DECLARE ultimo_id INT;
#Cadastrando uma nova localização
INSERT INTO localizacoes(cep, logradouro, complemento, bairro, localidade, uf, ddd, tipo)
VALUES (cepCad, logradouroCad, complementoCad, bairroCad, localidadeCad, ufCad, dddCad, tipoLocal);

#Armazenando o id na variavel
SET ultimo_id = LAST_INSERT_ID();

#Cadastrando um novo usuário
INSERT INTO clientes(nome, email, senha, cpf, data_nascimento, telefone_celular, telefone_residencial, id_localizacao, id_convenio, tipo)
VALUES (nomeCad, emailCad, senhaCad, cpfCad, data_nascimentoCad, telefone_celularCad, telefone_residencialCad, ultimo_id, id_convenioCad, tipoCad);
 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_exame` int(11) NOT NULL,
  `id_convenio` int(11) DEFAULT NULL,
  `id_localizacao` int(11) NOT NULL,
  `data_agendado` datetime NOT NULL,
  `situacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`) VALUES
(2, 'Atendente'),
(3, 'Enfermeiro'),
(4, 'Médico');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefone_celular` varchar(10) DEFAULT NULL,
  `telefone_residencial` varchar(10) DEFAULT NULL,
  `id_localizacao` int(11) DEFAULT NULL,
  `id_convenio` int(11) DEFAULT NULL,
  `tipo` varchar(15) NOT NULL DEFAULT 'Cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `senha`, `cpf`, `data_nascimento`, `telefone_celular`, `telefone_residencial`, `id_localizacao`, `id_convenio`, `tipo`) VALUES
(17, 'Administrador Oliveira', 'admin@admin.com', '202cb962ac59075b964b07152d234b70', '1234512345', '2001-01-01', NULL, NULL, NULL, NULL, 'Cliente'),
(19, 'dagoberto', 'daga@dg.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '13812738217', '0000-00-00', '', '', 3, 1, 'Cliente'),
(20, 'teste', 'teste@teste.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '23132713817', '1000-01-01', '', '', 15, 1, 'Cliente'),
(22, 'dwadwa', 'dwadw@dwad.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '23413421313', '0000-00-00', '', '', 3, 1, 'Cliente'),
(23, 'Guilherme Rodrigues', 'gui@gui.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', '45066017852', '0000-00-00', '', '', 3, 1, 'Cliente'),
(28, '[value-2]', '[value-3]', '[value-4]', '[value-5]', '2001-01-01', '[value-7]', '[value-8]', 3, 1, '[value-11]');

-- --------------------------------------------------------

--
-- Estrutura para tabela `convenios`
--

CREATE TABLE `convenios` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `telefone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `convenios`
--

INSERT INTO `convenios` (`id`, `nome`, `email`, `telefone`) VALUES
(1, 'Sorriso Seguro Saúde', 'sss@gmail.com', '40028922');

-- --------------------------------------------------------

--
-- Estrutura para tabela `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `especificacao` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `especialidades`
--

INSERT INTO `especialidades` (`id`, `id_cargo`, `especificacao`) VALUES
(1, 4, 'Otorrinolaringologista');

-- --------------------------------------------------------

--
-- Estrutura para tabela `exames`
--

CREATE TABLE `exames` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `exames`
--

INSERT INTO `exames` (`id`, `nome`, `id_funcionario`) VALUES
(1, 'Audiometria', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(10) DEFAULT NULL,
  `id_localizacao` int(11) DEFAULT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_especialidade` int(11) DEFAULT NULL,
  `situacao` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `email`, `senha`, `cpf`, `telefone`, `id_localizacao`, `id_cargo`, `id_especialidade`, `situacao`) VALUES
(1, 'Perry da Silva', 'perry@ornitorrinco.com', '202cb962ac59075b964b07152d234b70', '10987654321', '6939064115', NULL, 4, 1, 1),
(2, 'Administrador José', 'admin@admin.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '85493064212', NULL, NULL, 2, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `localizacoes`
--

CREATE TABLE `localizacoes` (
  `id` int(11) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `logradouro` varchar(300) NOT NULL,
  `complemento` varchar(300) DEFAULT NULL,
  `bairro` varchar(300) NOT NULL,
  `localidade` varchar(300) NOT NULL,
  `uf` varchar(300) NOT NULL,
  `ddd` varchar(300) NOT NULL,
  `tipo` varchar(15) NOT NULL DEFAULT 'Residencial'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `localizacoes`
--

INSERT INTO `localizacoes` (`id`, `cep`, `logradouro`, `complemento`, `bairro`, `localidade`, `uf`, `ddd`, `tipo`) VALUES
(3, '59145-05', 'Rua México', '', 'Passagem de Areia', 'Parnamirim', 'RN', '84', 'Residencial'),
(15, '12440-410', 'Avenida das Orquídeas', '', 'Residencial Vale das Acácias', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(16, '69050-605', 'Rua Portelândia', '', 'Chapada', 'Manaus', 'AM', '92', 'Residencial');

-- --------------------------------------------------------

--
-- Estrutura para tabela `resultados`
--

CREATE TABLE `resultados` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `data_realizacao` date NOT NULL,
  `id_localizacao` int(11) NOT NULL,
  `resultado` varchar(300) NOT NULL,
  `reagendamento` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `suportes`
--

CREATE TABLE `suportes` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `assunto` varchar(300) NOT NULL,
  `mensagem` varchar(300) NOT NULL,
  `situacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente2` (`id_cliente`),
  ADD KEY `fk_convenio1` (`id_convenio`),
  ADD KEY `fk_exame` (`id_exame`),
  ADD KEY `fk_funcionarios2` (`id_funcionario`),
  ADD KEY `fk_localizacao3` (`id_localizacao`);

--
-- Índices de tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf_unico` (`cpf`),
  ADD KEY `fk_localizacao` (`id_localizacao`),
  ADD KEY `fk_convenio` (`id_convenio`);

--
-- Índices de tabela `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cargo1` (`id_cargo`);

--
-- Índices de tabela `exames`
--
ALTER TABLE `exames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_funcionario4` (`id_funcionario`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `fk_localizacao1` (`id_localizacao`),
  ADD KEY `fk_cargo` (`id_cargo`),
  ADD KEY `fk_especialidade1` (`id_especialidade`);

--
-- Índices de tabela `localizacoes`
--
ALTER TABLE `localizacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente` (`id_cliente`),
  ADD KEY `fk_funcionario` (`id_funcionario`),
  ADD KEY `fk_localizacao2` (`id_localizacao`);

--
-- Índices de tabela `suportes`
--
ALTER TABLE `suportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente3` (`id_cliente`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `convenios`
--
ALTER TABLE `convenios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `exames`
--
ALTER TABLE `exames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `localizacoes`
--
ALTER TABLE `localizacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `fk_cliente2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_convenio1` FOREIGN KEY (`id_convenio`) REFERENCES `convenios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_exame` FOREIGN KEY (`id_exame`) REFERENCES `exames` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_funcionarios2` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `fk_localizacao3` FOREIGN KEY (`id_localizacao`) REFERENCES `localizacoes` (`id`);

--
-- Restrições para tabelas `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_convenio` FOREIGN KEY (`id_convenio`) REFERENCES `convenios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_localizacao` FOREIGN KEY (`id_localizacao`) REFERENCES `localizacoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `especialidades`
--
ALTER TABLE `especialidades`
  ADD CONSTRAINT `fk_cargo1` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `exames`
--
ALTER TABLE `exames`
  ADD CONSTRAINT `fk_funcionario4` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `fk_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_especialidade1` FOREIGN KEY (`id_especialidade`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_localizacao1` FOREIGN KEY (`id_localizacao`) REFERENCES `localizacoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_localizacao2` FOREIGN KEY (`id_localizacao`) REFERENCES `localizacoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `suportes`
--
ALTER TABLE `suportes`
  ADD CONSTRAINT `fk_cliente3` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
