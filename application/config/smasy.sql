-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31-Jul-2017 às 13:20
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smasy`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_permissoes`
--

CREATE TABLE `ci_permissoes` (
  `idPermissao` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `permissoes` text,
  `situacao` tinyint(1) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_usuarios`
--

CREATE TABLE `ci_usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `nome` varchar(80) CHARACTER SET latin1 NOT NULL,
  `rg` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `cpf` varchar(20) CHARACTER SET latin1 NOT NULL,
  `rua` varchar(70) CHARACTER SET latin1 DEFAULT NULL,
  `numero` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `bairro` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `cidade` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `estado` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(80) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(45) CHARACTER SET latin1 NOT NULL,
  `telefone` varchar(20) CHARACTER SET latin1 NOT NULL,
  `celular` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `situacao` tinyint(1) NOT NULL,
  `dataCadastro` date NOT NULL,
  `nivel` int(11) NOT NULL,
  `permissoes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ion_groups`
--

CREATE TABLE `ion_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ion_login_attempts`
--

CREATE TABLE `ion_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ion_users`
--

CREATE TABLE `ion_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ion_users_groups`
--

CREATE TABLE `ion_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_aluno`
--

CREATE TABLE `smasy_aluno` (
  `ra` int(11) NOT NULL,
  `codpessoa` int(11) NOT NULL,
  `anoingresso` varchar(10) DEFAULT NULL,
  `responsavel` int(11) DEFAULT NULL,
  `reccreatedby` int(11) NOT NULL,
  `reccreatedon` datetime NOT NULL,
  `recmodifiedby` int(11) DEFAULT NULL,
  `recmodifiedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_cidade`
--

CREATE TABLE `smasy_cidade` (
  `id` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_coligada`
--

CREATE TABLE `smasy_coligada` (
  `codigo` int(11) NOT NULL,
  `nome_fantasia` varchar(255) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `inscricao_estadual` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rua` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `numero` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `complemento` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `bairro` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `cidade` int(11) DEFAULT NULL,
  `cep` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `reccreatedby` int(11) NOT NULL,
  `reccreatedon` datetime NOT NULL,
  `recmodifiedby` int(11) DEFAULT NULL,
  `recmodifiedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_contrato`
--

CREATE TABLE `smasy_contrato` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `arquivo` text,
  `caminhoarquivo` text,
  `reccreatedby` int(11) DEFAULT NULL,
  `reccreatedon` datetime DEFAULT NULL,
  `recmodifiedby` int(11) DEFAULT NULL,
  `recmodifiedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_despesa`
--

CREATE TABLE `smasy_despesa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text,
  `valor` double DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `frequencia` int(11) DEFAULT NULL,
  `data_vencimento` date DEFAULT NULL,
  `data_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_despesacoligada`
--

CREATE TABLE `smasy_despesacoligada` (
  `codcoligada` int(11) NOT NULL,
  `coddespesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_diasemana`
--

CREATE TABLE `smasy_diasemana` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_estado`
--

CREATE TABLE `smasy_estado` (
  `id` int(11) NOT NULL,
  `uf` varchar(10) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `pais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_faixaetaria`
--

CREATE TABLE `smasy_faixaetaria` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `idadeini` int(11) DEFAULT NULL,
  `idadefim` int(11) DEFAULT NULL,
  `recmodifiedon` datetime DEFAULT NULL,
  `recmodifiedby` int(11) DEFAULT NULL,
  `reccreatedon` datetime DEFAULT NULL,
  `reccreatedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_formapgto`
--

CREATE TABLE `smasy_formapgto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `reccreatedby` int(11) NOT NULL,
  `reccreatedon` datetime NOT NULL,
  `recmodifiedby` int(11) DEFAULT NULL,
  `recmodifiedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_horario`
--

CREATE TABLE `smasy_horario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `horaini` time DEFAULT NULL,
  `horafim` time DEFAULT NULL,
  `reccreatedby` int(11) DEFAULT NULL,
  `reccreatedon` datetime DEFAULT NULL,
  `recmodifiedby` int(11) DEFAULT NULL,
  `recmodifiedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_imagem`
--

CREATE TABLE `smasy_imagem` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `caminho` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_matriculaaluno`
--

CREATE TABLE `smasy_matriculaaluno` (
  `codturma` varchar(50) NOT NULL,
  `ra` int(11) NOT NULL,
  `codplanopgto` int(11) NOT NULL,
  `codcontrato` int(11) NOT NULL,
  `formapgto` int(11) NOT NULL,
  `dtmatricula` date NOT NULL,
  `dtvencimento` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `reccreatedby` int(11) NOT NULL,
  `reccreatedon` datetime NOT NULL,
  `recmodifiedby` int(11) NOT NULL,
  `recmodifiedon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_modalidade`
--

CREATE TABLE `smasy_modalidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `taxamatricula` decimal(10,2) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `reccreatedby` int(11) DEFAULT NULL,
  `reccreatedon` datetime DEFAULT NULL,
  `recmodifiedby` int(11) DEFAULT NULL,
  `recmodifiedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_pais`
--

CREATE TABLE `smasy_pais` (
  `id` int(11) NOT NULL,
  `sigla` varchar(10) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_pessoa`
--

CREATE TABLE `smasy_pessoa` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `dtnascimento` date NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `cidade` int(11) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `idimagem` int(11) DEFAULT NULL,
  `telefone1` varchar(20) DEFAULT NULL,
  `telefone2` varchar(20) DEFAULT NULL,
  `telefone3` varchar(20) DEFAULT NULL,
  `rg` varchar(25) DEFAULT NULL,
  `ufcartident` varchar(50) DEFAULT NULL,
  `orgemissorident` varchar(50) DEFAULT NULL,
  `dtemissaoident` date DEFAULT NULL,
  `naturalidade` int(11) DEFAULT NULL,
  `estadonatal` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `reccreatedby` int(11) NOT NULL,
  `reccreatedon` datetime NOT NULL,
  `recmodifiedby` int(11) DEFAULT NULL,
  `recmodifiedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_planospgto`
--

CREATE TABLE `smasy_planospgto` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `desconto` decimal(10,2) DEFAULT NULL,
  `tipodesconto` int(11) DEFAULT NULL,
  `parcelas` int(11) DEFAULT NULL,
  `reccreatedby` int(11) DEFAULT NULL,
  `reccreatedon` datetime DEFAULT NULL,
  `recmodifiedby` int(11) DEFAULT NULL,
  `recmodifiedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_professor`
--

CREATE TABLE `smasy_professor` (
  `codprof` int(11) NOT NULL,
  `codpessoa` int(11) NOT NULL,
  `valorhora` double DEFAULT NULL,
  `percaluno` int(11) DEFAULT NULL,
  `contrato` int(11) NOT NULL,
  `reccreatedby` int(11) NOT NULL,
  `reccreatedon` datetime NOT NULL,
  `recmodifiedby` int(11) DEFAULT NULL,
  `recmodifiedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_sala`
--

CREATE TABLE `smasy_sala` (
  `id` int(11) NOT NULL,
  `codcoligada` int(11) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `produtiva` int(1) DEFAULT NULL,
  `capacidade` int(11) DEFAULT NULL,
  `reccreatedby` int(11) DEFAULT NULL,
  `reccreatedon` datetime DEFAULT NULL,
  `recmodifiedby` int(11) DEFAULT NULL,
  `recmodifiedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_turma`
--

CREATE TABLE `smasy_turma` (
  `codturma` varchar(50) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `maxalunos` int(11) NOT NULL,
  `minalunos` int(11) NOT NULL,
  `dtinicial` date DEFAULT NULL,
  `dtfinal` date DEFAULT NULL,
  `codmodalidade` int(11) NOT NULL,
  `codfaixaetaria` int(11) NOT NULL,
  `codsala` int(11) DEFAULT NULL,
  `reccreatedby` int(11) DEFAULT NULL,
  `reccreatedon` datetime DEFAULT NULL,
  `recmodifiedby` int(11) DEFAULT NULL,
  `recmodifiedon` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `smasy_turmacmpl`
--

CREATE TABLE `smasy_turmacmpl` (
  `codturma` varchar(50) NOT NULL,
  `codprof` int(11) NOT NULL,
  `codhorario` int(11) NOT NULL,
  `coddia` int(11) NOT NULL,
  `reccreatedon` datetime NOT NULL,
  `reccreatedby` int(11) NOT NULL,
  `recmodifiedon` datetime NOT NULL,
  `recmodifiedby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_permissoes`
--
ALTER TABLE `ci_permissoes`
  ADD PRIMARY KEY (`idPermissao`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `ci_usuarios`
--
ALTER TABLE `ci_usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `fk_usuarios_permissoes1_idx` (`permissoes_id`);

--
-- Indexes for table `ion_groups`
--
ALTER TABLE `ion_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ion_login_attempts`
--
ALTER TABLE `ion_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ion_users`
--
ALTER TABLE `ion_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ion_users_groups`
--
ALTER TABLE `ion_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `smasy_aluno`
--
ALTER TABLE `smasy_aluno`
  ADD PRIMARY KEY (`ra`),
  ADD KEY `fk_aluno_pessoa_idx` (`codpessoa`),
  ADD KEY `fk_aluno_pessoa_respo_idx` (`responsavel`);

--
-- Indexes for table `smasy_cidade`
--
ALTER TABLE `smasy_cidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cidade_estado_idx` (`estado`);

--
-- Indexes for table `smasy_coligada`
--
ALTER TABLE `smasy_coligada`
  ADD PRIMARY KEY (`codigo`,`cnpj`);

--
-- Indexes for table `smasy_contrato`
--
ALTER TABLE `smasy_contrato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smasy_despesa`
--
ALTER TABLE `smasy_despesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smasy_despesacoligada`
--
ALTER TABLE `smasy_despesacoligada`
  ADD PRIMARY KEY (`codcoligada`,`coddespesa`);

--
-- Indexes for table `smasy_diasemana`
--
ALTER TABLE `smasy_diasemana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smasy_estado`
--
ALTER TABLE `smasy_estado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estado_pais_idx` (`pais`);

--
-- Indexes for table `smasy_faixaetaria`
--
ALTER TABLE `smasy_faixaetaria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smasy_formapgto`
--
ALTER TABLE `smasy_formapgto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smasy_horario`
--
ALTER TABLE `smasy_horario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smasy_imagem`
--
ALTER TABLE `smasy_imagem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smasy_matriculaaluno`
--
ALTER TABLE `smasy_matriculaaluno`
  ADD PRIMARY KEY (`codturma`,`ra`),
  ADD KEY `fk_matric_aluno` (`ra`),
  ADD KEY `fk_matric_planopgto` (`codplanopgto`),
  ADD KEY `fk_matric_contrato` (`codcontrato`),
  ADD KEY `fk_matric_formapgto` (`formapgto`);

--
-- Indexes for table `smasy_modalidade`
--
ALTER TABLE `smasy_modalidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smasy_pais`
--
ALTER TABLE `smasy_pais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smasy_pessoa`
--
ALTER TABLE `smasy_pessoa`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_pessoa_estado_idx` (`estado`),
  ADD KEY `fk_pessoa_cidade_idx` (`cidade`),
  ADD KEY `fk_pessoa_imagem_idx` (`idimagem`);

--
-- Indexes for table `smasy_planospgto`
--
ALTER TABLE `smasy_planospgto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smasy_professor`
--
ALTER TABLE `smasy_professor`
  ADD PRIMARY KEY (`codprof`),
  ADD KEY `fk_professor_pessoa_idx` (`codpessoa`),
  ADD KEY `fk_professor_contrato` (`contrato`);

--
-- Indexes for table `smasy_sala`
--
ALTER TABLE `smasy_sala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smasy_turma`
--
ALTER TABLE `smasy_turma`
  ADD PRIMARY KEY (`codturma`),
  ADD KEY `fk_turma_modalidade_idx` (`codmodalidade`),
  ADD KEY `fk_turma_faixaetaria` (`codfaixaetaria`),
  ADD KEY `fk_turma_sala` (`codsala`);

--
-- Indexes for table `smasy_turmacmpl`
--
ALTER TABLE `smasy_turmacmpl`
  ADD KEY `fk_turmaprof_prof_idx` (`codprof`),
  ADD KEY `fk_turmaprof_turma_idx` (`codturma`),
  ADD KEY `fk_turmacmpl_horario` (`codhorario`),
  ADD KEY `fk_turmacmpl_dia` (`coddia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_permissoes`
--
ALTER TABLE `ci_permissoes`
  MODIFY `idPermissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ci_usuarios`
--
ALTER TABLE `ci_usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ion_groups`
--
ALTER TABLE `ion_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ion_login_attempts`
--
ALTER TABLE `ion_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ion_users`
--
ALTER TABLE `ion_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ion_users_groups`
--
ALTER TABLE `ion_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `smasy_aluno`
--
ALTER TABLE `smasy_aluno`
  MODIFY `ra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17934;
--
-- AUTO_INCREMENT for table `smasy_cidade`
--
ALTER TABLE `smasy_cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9715;
--
-- AUTO_INCREMENT for table `smasy_coligada`
--
ALTER TABLE `smasy_coligada`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `smasy_contrato`
--
ALTER TABLE `smasy_contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `smasy_despesa`
--
ALTER TABLE `smasy_despesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `smasy_diasemana`
--
ALTER TABLE `smasy_diasemana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `smasy_estado`
--
ALTER TABLE `smasy_estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `smasy_faixaetaria`
--
ALTER TABLE `smasy_faixaetaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `smasy_formapgto`
--
ALTER TABLE `smasy_formapgto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `smasy_horario`
--
ALTER TABLE `smasy_horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `smasy_imagem`
--
ALTER TABLE `smasy_imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `smasy_modalidade`
--
ALTER TABLE `smasy_modalidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `smasy_pais`
--
ALTER TABLE `smasy_pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `smasy_pessoa`
--
ALTER TABLE `smasy_pessoa`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17975;
--
-- AUTO_INCREMENT for table `smasy_planospgto`
--
ALTER TABLE `smasy_planospgto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `smasy_professor`
--
ALTER TABLE `smasy_professor`
  MODIFY `codprof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17909;
--
-- AUTO_INCREMENT for table `smasy_sala`
--
ALTER TABLE `smasy_sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `ci_usuarios`
--
ALTER TABLE `ci_usuarios`
  ADD CONSTRAINT `fk_usuarios_permissoes1` FOREIGN KEY (`permissoes_id`) REFERENCES `ci_permissoes` (`idPermissao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ion_users_groups`
--
ALTER TABLE `ion_users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `ion_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `ion_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `smasy_aluno`
--
ALTER TABLE `smasy_aluno`
  ADD CONSTRAINT `fk_aluno_pessoa` FOREIGN KEY (`codpessoa`) REFERENCES `smasy_pessoa` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_pessoa_respo` FOREIGN KEY (`responsavel`) REFERENCES `smasy_pessoa` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `smasy_cidade`
--
ALTER TABLE `smasy_cidade`
  ADD CONSTRAINT `fk_cidade_estado` FOREIGN KEY (`estado`) REFERENCES `smasy_estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `smasy_estado`
--
ALTER TABLE `smasy_estado`
  ADD CONSTRAINT `fk_estado_pais` FOREIGN KEY (`pais`) REFERENCES `smasy_pais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `smasy_matriculaaluno`
--
ALTER TABLE `smasy_matriculaaluno`
  ADD CONSTRAINT `fk_matric_aluno` FOREIGN KEY (`ra`) REFERENCES `smasy_aluno` (`ra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matric_contrato` FOREIGN KEY (`codcontrato`) REFERENCES `smasy_contrato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matric_formapgto` FOREIGN KEY (`formapgto`) REFERENCES `smasy_formapgto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matric_planopgto` FOREIGN KEY (`codplanopgto`) REFERENCES `smasy_planospgto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matric_turma` FOREIGN KEY (`codturma`) REFERENCES `smasy_turma` (`codturma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `smasy_pessoa`
--
ALTER TABLE `smasy_pessoa`
  ADD CONSTRAINT `fk_pessoa_cidade` FOREIGN KEY (`cidade`) REFERENCES `smasy_cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pessoa_estado` FOREIGN KEY (`estado`) REFERENCES `smasy_estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pessoa_imagem` FOREIGN KEY (`idimagem`) REFERENCES `smasy_imagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `smasy_professor`
--
ALTER TABLE `smasy_professor`
  ADD CONSTRAINT `fk_professor_contrato` FOREIGN KEY (`contrato`) REFERENCES `smasy_contrato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_professor_pessoa` FOREIGN KEY (`codpessoa`) REFERENCES `smasy_pessoa` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `smasy_turma`
--
ALTER TABLE `smasy_turma`
  ADD CONSTRAINT `fk_turma_faixaetaria` FOREIGN KEY (`codfaixaetaria`) REFERENCES `smasy_faixaetaria` (`id`),
  ADD CONSTRAINT `fk_turma_modalidade` FOREIGN KEY (`codmodalidade`) REFERENCES `smasy_modalidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turma_sala` FOREIGN KEY (`codsala`) REFERENCES `smasy_sala` (`id`);

--
-- Limitadores para a tabela `smasy_turmacmpl`
--
ALTER TABLE `smasy_turmacmpl`
  ADD CONSTRAINT `fk_turmacmpl_dia` FOREIGN KEY (`coddia`) REFERENCES `smasy_diasemana` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turmacmpl_horario` FOREIGN KEY (`codhorario`) REFERENCES `smasy_horario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turmacmpl_prof` FOREIGN KEY (`codprof`) REFERENCES `smasy_professor` (`codprof`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_turmacmpl_turma` FOREIGN KEY (`codturma`) REFERENCES `smasy_turma` (`codturma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
