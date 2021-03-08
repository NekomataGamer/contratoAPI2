-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Mar-2021 às 20:40
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
-- Banco de dados: `sistema_gerar_demissao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL DEFAULT '0',
  `email` varchar(150) NOT NULL DEFAULT '0',
  `pass` varchar(32) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pass`, `active`) VALUES
(1, 'Alison Vitor Bucker', 'originalalison@gmail.com', '1c181a54293224de0cff27543782dc75', 1),
(2, 'Fran', 'secretaria.saai@acu.education', '837198dec9497247f029e4bf75c6bc31', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_company`
--

CREATE TABLE `admin_company` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL DEFAULT 0,
  `id_company` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admin_company`
--

INSERT INTO `admin_company` (`id`, `id_admin`, `id_company`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '0',
  `cnpj` varchar(200) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `companies`
--

INSERT INTO `companies` (`id`, `name`, `cnpj`, `active`) VALUES
(1, 'ACU - ABSOULUTE CHRISTIAN UNIVERSITY USA', '08.177.816/0001-05', 1),
(2, 'FACULDADE NOSSA SENHORA DE FÁTIMA', '', 1),
(3, 'Alison Bucker', '28.336.045/0001-50', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `id_coordenador` int(11) NOT NULL DEFAULT 0,
  `id_coordenador_estagio` int(11) NOT NULL DEFAULT 0,
  `nome_curso` varchar(250) NOT NULL DEFAULT '0',
  `abrev` varchar(50) NOT NULL DEFAULT '0',
  `aera` int(11) NOT NULL DEFAULT 0,
  `curso_no_doc` varchar(250) NOT NULL DEFAULT '0',
  `cod_inep` varchar(250) NOT NULL DEFAULT '0',
  `cod_mod_inep` varchar(250) NOT NULL DEFAULT '0',
  `cod_polo_ed_dist` varchar(250) NOT NULL DEFAULT '0',
  `grade_unica` varchar(3) NOT NULL DEFAULT '0',
  `grade_unica_execao` varchar(3) NOT NULL DEFAULT '0',
  `educacao_distancia` varchar(3) NOT NULL DEFAULT '0',
  `titulo` varchar(250) NOT NULL DEFAULT '0',
  `titulacao` varchar(250) NOT NULL DEFAULT '0',
  `eixo_tecnologico` varchar(250) NOT NULL DEFAULT '0',
  `area_conhecimento` varchar(250) NOT NULL DEFAULT '0',
  `area_concentracao` varchar(250) NOT NULL DEFAULT '0',
  `habilitacao` varchar(250) NOT NULL DEFAULT '0',
  `autorizacao` text NOT NULL DEFAULT '0',
  `reconhecimento` text NOT NULL DEFAULT '0',
  `renovacao_conhecimento` text NOT NULL DEFAULT '0',
  `amparo_legal` text NOT NULL DEFAULT '0',
  `perfil_profissional` text NOT NULL DEFAULT '0',
  `observacao` text NOT NULL DEFAULT '0',
  `link_matricula` varchar(500) NOT NULL DEFAULT '0',
  `link_matricula_online` varchar(500) NOT NULL DEFAULT '0',
  `prefixo_curso` varchar(50) NOT NULL DEFAULT '0',
  `mostrar_faltas` varchar(3) NOT NULL DEFAULT '0',
  `separar_carg_hor_pratica` varchar(3) NOT NULL DEFAULT '0',
  `separar_carg_hor_dispensa` varchar(3) NOT NULL DEFAULT '0',
  `mostrar_ano_semestre` varchar(3) NOT NULL DEFAULT '0',
  `mostrar_titulo_periodo` varchar(3) NOT NULL DEFAULT '0',
  `substituir_dispensa_aproveitamento` varchar(3) NOT NULL DEFAULT '0',
  `substituir_pendente_acursar` varchar(3) NOT NULL DEFAULT '0',
  `nome_ch` varchar(250) NOT NULL DEFAULT '0',
  `abrev_ch` varchar(50) NOT NULL DEFAULT '0',
  `nome_ch_anual` varchar(250) NOT NULL DEFAULT '0',
  `abrev_ch_anual` varchar(250) NOT NULL DEFAULT '0',
  `id_curso_equivalencia` int(11) NOT NULL DEFAULT 0,
  `observacao_historico` text NOT NULL DEFAULT '0',
  `periodo_letivo_encerrado` varchar(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `master`
--

CREATE TABLE `master` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '0',
  `email` varchar(200) NOT NULL DEFAULT '0',
  `pass` varchar(32) NOT NULL DEFAULT '0',
  `active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `master`
--

INSERT INTO `master` (`id`, `name`, `email`, `pass`, `active`) VALUES
(1, 'Alison Bucker', 'originalalison@gmail.com', '1c181a54293224de0cff27543782dc75', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

CREATE TABLE `matriculas` (
  `id` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL DEFAULT 0,
  `id_curso` int(11) NOT NULL DEFAULT 0,
  `insc_inep_mec` int(11) NOT NULL DEFAULT 0,
  `matric_longa` int(11) NOT NULL DEFAULT 0,
  `periodo` int(11) DEFAULT NULL,
  `turma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `admin_company`
--
ALTER TABLE `admin_company`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `admin_company`
--
ALTER TABLE `admin_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `master`
--
ALTER TABLE `master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
