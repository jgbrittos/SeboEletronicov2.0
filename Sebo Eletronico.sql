
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 14/06/2014 às 18:05:50
-- Versão do Servidor: 5.1.66
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u367438131_sebo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `id_livro` int(64) NOT NULL AUTO_INCREMENT,
  `id_dono` int(64) DEFAULT NULL,
  `titulo_livro` varchar(64) DEFAULT NULL,
  `editora` varchar(64) DEFAULT NULL,
  `autor` varchar(64) DEFAULT NULL,
  `edicao` int(64) DEFAULT NULL,
  `genero` varchar(64) DEFAULT NULL,
  `estado_conserv` varchar(64) DEFAULT NULL,
  `descricao_livro` varchar(400) DEFAULT NULL,
  `venda` varchar(5) NOT NULL,
  `troca` varchar(5) NOT NULL,
  PRIMARY KEY (`id_livro`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Tabela Relacionada ao Livro' AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`id_livro`, `id_dono`, `titulo_livro`, `editora`, `autor`, `edicao`, `genero`, `estado_conserv`, `descricao_livro`, `venda`, `troca`) VALUES
(7, 11, 'Fundamentos de arquitetura de computadores', 'Prentice Hall', 'Taenembaum', 7, 'Engenharia de Software', 'novo', 'livro de FAC', '', 'troca'),
(6, 11, 'Redes de computadores', 'Prentice Hall', 'Taenembaum', 5, 'Engenharia de Software', 'usado', 'livro muito bom de introdução a redes de computadores', 'venda', ''),
(4, 11, 'fisica', 'galileu', 'galileu', 1, 'Engenharia', 'usado', 'livro de fisica', 'ven', 'tro'),
(5, 12, 'Titulo', 'Editora', 'Autor', 1, 'Engenharia de Software', 'novo', 'Descricao', 'venda', 'troca'),
(8, 11, 'Calculo 2', 'ABC paulista', 'George Thomas', 12, 'Engenharia', 'novo', 'livro de c2 do russo', 'venda', 'troca'),
(9, 12, 'Livro 1', 'Panini', 'Fulano', 1, 'Engenharia', 'novo', 'Talz', 'venda', 'troca');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mural`
--

CREATE TABLE IF NOT EXISTS `mural` (
  `id_comentario` int(5) NOT NULL AUTO_INCREMENT,
  `texto` varchar(400) NOT NULL,
  `nome_pergunta` varchar(50) NOT NULL,
  `id_livro` int(5) NOT NULL,
  PRIMARY KEY (`id_comentario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Extraindo dados da tabela `mural`
--

INSERT INTO `mural` (`id_comentario`, `texto`, `nome_pergunta`, `id_livro`) VALUES
(80, 'Carrinho de Compra\r\n', 'joao', 2),
(79, '', 'joao', 0),
(78, '', 'joao', 0),
(77, '', 'joao', 0),
(75, 'dcsdcsdcsdc', 'joao', 2),
(76, 'dcsdcsdcsdc', 'joao', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relac_compra`
--

CREATE TABLE IF NOT EXISTS `relac_compra` (
  `id_compra` int(5) NOT NULL AUTO_INCREMENT,
  `id_vendedor` int(5) NOT NULL,
  `id_livro` int(5) NOT NULL,
  PRIMARY KEY (`id_compra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `senha`
--

CREATE TABLE IF NOT EXISTS `senha` (
  `id_senha` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo_senha` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_senha`),
  UNIQUE KEY `id_senha` (`id_senha`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `senha`
--

INSERT INTO `senha` (`id_senha`, `codigo_senha`) VALUES
(12, 123456),
(13, 654321),
(14, 987654);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador do Usuario',
  `nome_usuario` varchar(64) DEFAULT NULL COMMENT 'Nome do Usuario',
  `senha_usuario` varchar(64) DEFAULT NULL COMMENT 'Senha do Usuario',
  `telefone_usuario` int(64) DEFAULT NULL COMMENT 'Telefone do Usuario',
  `email_usuario` varchar(64) DEFAULT NULL COMMENT 'Email do Usuario',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`),
  KEY `nome_usuario` (`nome_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Tabela Relacionada ao Usuario' AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `senha_usuario`, `telefone_usuario`, `email_usuario`) VALUES
(11, 'João Gabriel', '12', 82235587, 'joaogabrieldebrittoesilva@gmail.com'),
(12, 'Caique', '13', 12345678, 'caiquepereira@gmail.com'),
(13, 'Beatriz Rezener', '14', 82068271, 'beatrizrezener@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
