-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/06/2024 às 22:48
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrar_funcionario_localizacao` (IN `cepCad` VARCHAR(10), IN `logradouroCad` VARCHAR(300), IN `complementoCad` VARCHAR(300), IN `bairroCad` VARCHAR(300), IN `localidadeCad` VARCHAR(300), IN `ufCad` VARCHAR(300), IN `dddCad` VARCHAR(300), IN `tipoLocal` VARCHAR(15), IN `nomeCad` VARCHAR(300), IN `emailCad` VARCHAR(300), IN `senhaCad` VARCHAR(300), IN `cpfCad` VARCHAR(11), IN `data_nascimentoCad` DATE, IN `telefone_celularCad` VARCHAR(10), IN `telefone_residencialCad` VARCHAR(10), IN `id_convenioCad` INT(11), IN `id_cargoCad` INT(11), IN `id_especialidadeCad` INT(11), IN `situacaoCad` TINYINT(1))   BEGIN
#Declarando a variaval para armazenar o id do insert
DECLARE ultimo_id INT;
#Cadastrando uma nova localização
INSERT INTO localizacoes(cep, logradouro, complemento, bairro, localidade, uf, ddd, tipo)
 
VALUES (cepCad, logradouroCad, complementoCad, bairroCad, localidadeCad, ufCad, dddCad, tipoLocal);
 
#Armazenando o id na variavel
SET ultimo_id = LAST_INSERT_ID();
 
#Cadastrando um novo usuário
INSERT INTO usuarios(nome, email, senha, cpf, data_nascimento, telefone_celular, telefone_residencial, id_localizacao, id_convenio, id_cargo, id_especialidade, situacao)
VALUES (nomeCad, emailCad, senhaCad, cpfCad, data_nascimentoCad, telefone_celularCad, telefone_residencialCad, ultimo_id, id_convenioCad, id_cargoCad, id_especialidadeCad, situacaoCad);
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrar_localizacao_atribuir_usuario` (IN `cepCad` VARCHAR(10), IN `logradouroCad` VARCHAR(300), IN `complementoCad` VARCHAR(300), IN `bairroCad` VARCHAR(300), IN `localidadeCad` VARCHAR(300), IN `ufCad` VARCHAR(300), IN `dddCad` VARCHAR(300), IN `tipoLocal` VARCHAR(15), IN `idUsuarioEdit` INT(11))   BEGIN
 
#Declarando a variaval para armazenar o id do insert
DECLARE ultimo_id INT;
 
#Cadastrando uma nova localização
INSERT INTO localizacoes(cep, logradouro, complemento, bairro, localidade, uf, ddd, tipo)
VALUES (cepCad, logradouroCad, complementoCad, bairroCad, localidadeCad, ufCad, dddCad, tipoLocal);
 
#Armazenando o id na variavel
SET ultimo_id = LAST_INSERT_ID();
 
#Atribuindo a localização ao Usuário
UPDATE usuarios SET id_localizacao = ultimo_id
 
WHERE usuarios.id = idUsuarioEdit;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrar_usuario_localizacao` (IN `cepCad` VARCHAR(10), IN `logradouroCad` VARCHAR(300), IN `complementoCad` VARCHAR(300), IN `bairroCad` VARCHAR(300), IN `localidadeCad` VARCHAR(300), IN `ufCad` VARCHAR(300), IN `dddCad` VARCHAR(300), IN `tipoLocal` VARCHAR(15), IN `nomeCad` VARCHAR(300), IN `emailCad` VARCHAR(300), IN `senhaCad` VARCHAR(300), IN `cpfCad` VARCHAR(11), IN `data_nascimentoCad` DATE, IN `telefone_celularCad` VARCHAR(10), IN `telefone_residencialCad` VARCHAR(10), IN `id_convenioCad` INT(11))   BEGIN
#Declarando a variaval para armazenar o id do insert
DECLARE ultimo_id INT;
#Cadastrando uma nova localização
INSERT INTO localizacoes(cep, logradouro, complemento, bairro, localidade, uf, ddd, tipo)
VALUES (cepCad, logradouroCad, complementoCad, bairroCad, localidadeCad, ufCad, dddCad, tipoLocal);
 
#Armazenando o id na variavel
SET ultimo_id = LAST_INSERT_ID();
 
#Cadastrando um novo usuário
INSERT INTO usuarios(nome, email, senha, cpf, data_nascimento, telefone_celular, telefone_residencial, id_localizacao, id_convenio)
VALUES (nomeCad, emailCad, senhaCad, cpfCad, data_nascimentoCad, telefone_celularCad, telefone_residencialCad, ultimo_id, id_convenioCad);
 
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

--
-- Despejando dados para a tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `id_cliente`, `id_funcionario`, `id_exame`, `id_convenio`, `id_localizacao`, `data_agendado`, `situacao`) VALUES
(18, 83, 89, 6, 0, 60, '2024-06-20 07:00:00', 1),
(19, 84, 90, 8, 0, 61, '2024-06-19 20:00:00', 1),
(20, 85, 85, 11, 0, 62, '2024-06-19 20:00:00', 1);

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
(4, 'Médico'),
(5, 'Gerente'),
(36, 'Administrador'),
(37, 'Atendente'),
(38, 'Enfermeiro'),
(39, 'Segurança'),
(40, 'Técnico de Enfermagem'),
(41, 'Estagiário'),
(42, 'Jovem Aprendiz'),
(43, 'Recepcionista'),
(44, 'Nutricionista'),
(45, 'Psicólogo'),
(46, 'Fisioterapeuta');

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
(0, 'Sem convênio', 'medtime@gmail.com', '12 3410-5424'),
(6, 'Saúde Total', 'saudetotal@saude.com', '12 3206-8638'),
(7, 'Vida Plena Assistência Médica', 'vpam@vidaplena.com', '12 2013-4292'),
(8, 'Seguro Saúde Familiar', 'segurosaudefamiliar@seguro.com', '12 3275-2444');

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
(9, 4, 'Oftalmologista'),
(10, 4, 'Otorrinolaringologista'),
(11, 4, 'Cardiologista'),
(12, 4, 'Psiquiatra'),
(13, 4, 'Neurologista'),
(14, 4, 'Proctologista'),
(15, 4, 'Dermatologista'),
(16, 4, 'Endocrinologista');

-- --------------------------------------------------------

--
-- Estrutura para tabela `exames`
--

CREATE TABLE `exames` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `id_responsavel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `exames`
--

INSERT INTO `exames` (`id`, `nome`, `id_responsavel`) VALUES
(6, 'Eletrocardiograma', 89),
(7, 'Ecocardiograma', 89),
(8, 'Hemograma', 90),
(9, 'Glicemia', 90),
(10, 'Colesterol', 90),
(11, 'Radiografia', 85),
(12, 'Ultrassonografia', 91),
(13, 'Mamografia', 91),
(14, 'Ressonância Magnética', 87);

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
(0, '0', 'Sem', 'Sem', 'Sem', 'Sem', 'Sem', 'Sem', 'Sem'),
(46, '12424080', 'Rua Synphronio de Castro Júnior', '', 'Conjunto Residencial Araretama', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(47, '12445610', 'Avenida Espanha', '', 'Residencial Pasin', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(48, '12421460', 'Rua dos Manacás', '', 'Nossa Senhora do Perpétuo Socorro', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(49, '12403200', 'Rua São Vicente de Paulo', '', 'Jardim Dom Bosco', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(50, '12412670', 'Rua José Tineo Viva', '', 'Residencial e Comercial Vila Verde', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(51, '12423816', 'Rua Palermo', '', 'Residencial Village Splendore', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(52, '12410260', 'Rua João Gama', '', 'Parque São Benedito', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(53, '12441010', 'Avenida Doutor José Monteiro Machado César', '', 'Loteamento João Tamborindeguy Fernandes', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(54, '12414418', 'Rua Iria Correa Leite Moreira', '', 'Vitória Vale III', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(55, '12401080', 'Rua Frei Maurício', '', 'Jardim Boa Vista', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(57, '12440410', 'Avenida das Orquídeas', '', 'Residencial Vale das Acácias', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(58, '12402520', 'Rua Benedito Leite de Abreu', '', 'Loteamento Residencial Andrade', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(59, '12424170', 'Rua Samanta Smith', '', 'Residencial e Comercial Cidade Jardim', 'Pindamonhangaba', 'SP', '12', 'Residencial'),
(60, '12400610', 'Avenida Atílio Amadei', 'Vida e Saúde', 'Residencial Campo Belo', 'Pindamonhangaba', 'SP', '12', 'Clinica'),
(61, '12400150', 'Rua Capitão Alfredo César', 'Bem-Estar', 'Centro', 'Pindamonhangaba', 'SP', '12', 'Clinica'),
(62, '12401355', 'Rua Dirce Glória Bueno Ferreira', 'Nova Esperança', 'Bosque da Princesa', 'Pindamonhangaba', 'SP', '12', 'Clinica');

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefone_celular` varchar(10) DEFAULT NULL,
  `telefone_residencial` varchar(10) DEFAULT NULL,
  `id_localizacao` int(11) DEFAULT 0,
  `id_convenio` int(11) DEFAULT 0,
  `id_cargo` int(11) DEFAULT NULL,
  `id_especialidade` int(11) DEFAULT NULL,
  `situacao` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `cpf`, `data_nascimento`, `telefone_celular`, `telefone_residencial`, `id_localizacao`, `id_convenio`, `id_cargo`, `id_especialidade`, `situacao`) VALUES
(82, 'Administrador', 'admin@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '0', '0000-00-00', NULL, NULL, 0, 0, 5, NULL, 1),
(83, 'Ana Carolina Silva', 'anacarol@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '25243569062', '1992-03-31', '', '', 46, 0, 4, NULL, 1),
(84, 'Bruno Henrique Souza', 'bhs@hotmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '06419566061', '2001-05-06', '(12) 99867', '', 47, 0, 46, NULL, 1),
(85, 'Carlos Eduardo Oliveira', 'cadu@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '26557542044', '1999-01-01', '', '', 48, 0, 4, NULL, 1),
(86, 'Daniela Ferreira Santos', 'dani@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '43989218000', '2000-12-12', '', '', 49, 0, 37, NULL, 1),
(87, 'Eduardo Costa Pereira', 'educosta@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '05646396050', '1998-04-22', '', '', 50, 0, 4, NULL, 1),
(88, 'Fernanda Lima Mendes', 'fer@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '76565340080', '2006-06-26', '', '', 51, 0, 42, NULL, 1),
(89, 'Gabriel Rocha Almeida', 'gbral@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '72447932006', '1996-07-02', '', '', 52, 0, 4, 11, 1),
(90, 'Heloísa Martins Barbosa', 'helo@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '01945263059', '1996-05-08', '', '', 53, 0, 4, 13, 1),
(91, 'Isabela Vieira Gomes', 'isavieira@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '14387083000', '1999-09-05', '', '', 54, 0, 4, NULL, 1),
(92, 'João Paulo Nogueira', 'jpnogueira@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '42045586073', '1991-06-09', '', '', 55, 0, 4, NULL, 1),
(93, 'Larissa Rodrigues Silva', 'laridrigues@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '43520958007', '2000-04-05', '', '', 0, 0, NULL, NULL, 1),
(95, 'Natália Azevedo Pinto', 'nathy@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '01989414044', '2000-05-25', '', '', 57, 8, NULL, NULL, 1),
(96, 'Ricardo Lima Tavares', 'ricardolima@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '02144328072', '1969-04-30', '', '', 58, 8, NULL, NULL, 1),
(97, 'Viviane Oliveira Machado', 'vivianeoliveira@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '06026158014', '1989-03-04', '', '', 59, 0, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_agendamentos`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `view_agendamentos` (
`paciente` varchar(300)
,`id` int(11)
,`médico` varchar(300)
,`exame` varchar(300)
,`convenio` varchar(300)
,`clinica` varchar(300)
,`data consulta` datetime
,`situacao` varchar(7)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_funcionarios`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `view_funcionarios` (
`nome` varchar(300)
,`email` varchar(300)
,`cpf` varchar(11)
,`data_nascimento` date
,`telefone_celular` varchar(10)
,`telefone_residencial` varchar(10)
,`cep` varchar(10)
,`convenio` varchar(300)
,`cargo` varchar(400)
,`especificacao` varchar(300)
,`situacao` varchar(7)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_usuarios`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `view_usuarios` (
`nome` varchar(300)
,`email` varchar(300)
,`cpf` varchar(11)
,`data_nascimento` date
,`cep` varchar(10)
,`convenio` varchar(300)
,`cargo` varchar(400)
,`especialdade` varchar(300)
,`situacao` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_usuario_com_localizacao`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `view_usuario_com_localizacao` (
`nome` varchar(300)
,`email` varchar(300)
,`cpf` varchar(11)
,`data_nascimento` date
,`telefone_celular` varchar(10)
,`telefone_residencial` varchar(10)
,`cep` varchar(10)
,`convenio` varchar(300)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `view_usuario_sem_localizacao`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `view_usuario_sem_localizacao` (
`nome` varchar(300)
,`email` varchar(300)
,`cpf` varchar(11)
,`data_nascimento` date
,`telefone_celular` varchar(10)
,`telefone_residencial` varchar(10)
,`convenio` varchar(300)
);

-- --------------------------------------------------------

--
-- Estrutura para view `view_agendamentos`
--
DROP TABLE IF EXISTS `view_agendamentos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_agendamentos`  AS SELECT `usuarios`.`nome` AS `paciente`, `agendamentos`.`id` AS `id`, (select `usuarios`.`nome` from `usuarios` where `usuarios`.`id` = `agendamentos`.`id_funcionario`) AS `médico`, `exames`.`nome` AS `exame`, `convenios`.`nome` AS `convenio`, `localizacoes`.`complemento` AS `clinica`, `agendamentos`.`data_agendado` AS `data consulta`, if(`agendamentos`.`situacao` > 0,'Ativo','Inativo') AS `situacao` FROM ((((`agendamentos` join `usuarios` on(`agendamentos`.`id_cliente` = `usuarios`.`id`)) join `exames` on(`agendamentos`.`id_exame` = `exames`.`id`)) join `convenios` on(`agendamentos`.`id_convenio` = `convenios`.`id`)) join `localizacoes` on(`agendamentos`.`id_localizacao` = `localizacoes`.`id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para view `view_funcionarios`
--
DROP TABLE IF EXISTS `view_funcionarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_funcionarios`  AS SELECT `usuarios`.`nome` AS `nome`, `usuarios`.`email` AS `email`, `usuarios`.`cpf` AS `cpf`, `usuarios`.`data_nascimento` AS `data_nascimento`, `usuarios`.`telefone_celular` AS `telefone_celular`, `usuarios`.`telefone_residencial` AS `telefone_residencial`, `localizacoes`.`cep` AS `cep`, `convenios`.`nome` AS `convenio`, `cargos`.`nome` AS `cargo`, `especialidades`.`especificacao` AS `especificacao`, if(`usuarios`.`situacao` > 0,'Ativo','Inativo') AS `situacao` FROM ((((`usuarios` join `localizacoes` on(`usuarios`.`id_localizacao` = `localizacoes`.`id`)) join `convenios` on(`usuarios`.`id_convenio` = `convenios`.`id`)) join `cargos` on(`usuarios`.`id_cargo` = `cargos`.`id`)) join `especialidades` on(`usuarios`.`id_especialidade` = `especialidades`.`id`)) WHERE `usuarios`.`id_cargo` is not null ;

-- --------------------------------------------------------

--
-- Estrutura para view `view_usuarios`
--
DROP TABLE IF EXISTS `view_usuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_usuarios`  AS SELECT `usuarios`.`nome` AS `nome`, `usuarios`.`email` AS `email`, `usuarios`.`cpf` AS `cpf`, `usuarios`.`data_nascimento` AS `data_nascimento`, `localizacoes`.`cep` AS `cep`, `convenios`.`nome` AS `convenio`, `cargos`.`nome` AS `cargo`, `especialidades`.`especificacao` AS `especialdade`, `usuarios`.`situacao` AS `situacao` FROM ((((`usuarios` join `localizacoes` on(`usuarios`.`id_localizacao` = `localizacoes`.`id`)) join `convenios` on(`usuarios`.`id_convenio` = `convenios`.`id`)) join `cargos` on(`usuarios`.`id_cargo` = `cargos`.`id`)) join `especialidades` on(`usuarios`.`id_especialidade` = `especialidades`.`id`)) ;

-- --------------------------------------------------------

--
-- Estrutura para view `view_usuario_com_localizacao`
--
DROP TABLE IF EXISTS `view_usuario_com_localizacao`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_usuario_com_localizacao`  AS SELECT `usuarios`.`nome` AS `nome`, `usuarios`.`email` AS `email`, `usuarios`.`cpf` AS `cpf`, `usuarios`.`data_nascimento` AS `data_nascimento`, `usuarios`.`telefone_celular` AS `telefone_celular`, `usuarios`.`telefone_residencial` AS `telefone_residencial`, `localizacoes`.`cep` AS `cep`, `convenios`.`nome` AS `convenio` FROM ((`usuarios` join `localizacoes` on(`usuarios`.`id_localizacao` = `localizacoes`.`id`)) join `convenios` on(`usuarios`.`id_convenio` = `convenios`.`id`)) WHERE `usuarios`.`id_cargo` is null ;

-- --------------------------------------------------------

--
-- Estrutura para view `view_usuario_sem_localizacao`
--
DROP TABLE IF EXISTS `view_usuario_sem_localizacao`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_usuario_sem_localizacao`  AS SELECT `usuarios`.`nome` AS `nome`, `usuarios`.`email` AS `email`, `usuarios`.`cpf` AS `cpf`, `usuarios`.`data_nascimento` AS `data_nascimento`, `usuarios`.`telefone_celular` AS `telefone_celular`, `usuarios`.`telefone_residencial` AS `telefone_residencial`, `convenios`.`nome` AS `convenio` FROM (`usuarios` join `convenios` on(`usuarios`.`id_convenio` = `convenios`.`id`)) WHERE `usuarios`.`id_localizacao` is null AND `usuarios`.`id_cargo` is null ;

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
  ADD KEY `fk_responsavel` (`id_responsavel`);

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
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf_unico` (`cpf`),
  ADD KEY `fk_localizacao` (`id_localizacao`),
  ADD KEY `fk_convenio` (`id_convenio`),
  ADD KEY `fk_cargo` (`id_cargo`),
  ADD KEY `fk_especialidade` (`id_especialidade`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `convenios`
--
ALTER TABLE `convenios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `exames`
--
ALTER TABLE `exames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `localizacoes`
--
ALTER TABLE `localizacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `suportes`
--
ALTER TABLE `suportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `fk_cliente2` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_convenio1` FOREIGN KEY (`id_convenio`) REFERENCES `convenios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_exame` FOREIGN KEY (`id_exame`) REFERENCES `exames` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_funcionarios2` FOREIGN KEY (`id_funcionario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_localizacao3` FOREIGN KEY (`id_localizacao`) REFERENCES `localizacoes` (`id`);

--
-- Restrições para tabelas `especialidades`
--
ALTER TABLE `especialidades`
  ADD CONSTRAINT `fk_cargo1` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `exames`
--
ALTER TABLE `exames`
  ADD CONSTRAINT `fk_responsavel` FOREIGN KEY (`id_responsavel`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_localizacao2` FOREIGN KEY (`id_localizacao`) REFERENCES `localizacoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `suportes`
--
ALTER TABLE `suportes`
  ADD CONSTRAINT `fk_cliente3` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_convenio` FOREIGN KEY (`id_convenio`) REFERENCES `convenios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_especialidade` FOREIGN KEY (`id_especialidade`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_localizacao` FOREIGN KEY (`id_localizacao`) REFERENCES `localizacoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
