-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Fev-2018 às 00:48
-- Versão do servidor: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcc1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_torneio`
--

CREATE TABLE `cadastro_torneio` (
  `cod_cadastro_torneio` int(11) NOT NULL,
  `flg_ranking` varchar(1) COLLATE utf8_bin DEFAULT NULL,
  `tipo_torneio` int(11) DEFAULT NULL,
  `saldo_torneio` int(11) DEFAULT NULL,
  `peso_torneio` int(11) DEFAULT NULL,
  `vlr_entrada` int(11) DEFAULT NULL,
  `qtd_max_rebuy` int(11) DEFAULT NULL,
  `vlr_rebuy` int(11) DEFAULT NULL,
  `qtd_max_addon` int(11) DEFAULT NULL,
  `dt_torneio` date DEFAULT NULL,
  `vlr_addon` int(11) DEFAULT NULL,
  `vlr_botao` int(11) DEFAULT NULL,
  `nome_torneio` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `qtd_max_player_mesa` int(11) DEFAULT NULL,
  `cod_torneio` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carousels`
--

CREATE TABLE `carousels` (
  `id` int(11) NOT NULL,
  `nome` varchar(520) NOT NULL,
  `url` varchar(520) NOT NULL,
  `imagem` varchar(520) NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carousels`
--

INSERT INTO `carousels` (`id`, `nome`, `url`, `imagem`, `ordem`, `created`, `modified`) VALUES
(2, 'Mesa', 'http://ikedateste.com.br/', 'slide_1.png', 3, '2015-10-05 21:47:24', '2018-01-27 18:53:28'),
(4, 'Guarda Roupa Com Espelho', 'http://ikedateste.com.br/cursos/8/raciocinio-logico-para-concurso-publico-do-inss', 'slide_3.png', 2, '2015-10-06 10:37:23', '2018-01-27 18:53:28'),
(5, 'Cabeceiras', 'ikedateste.com.br/cursos/7/informatica_para_concurso_publico_do_inss', 'slide_2.png', 1, '2015-10-06 10:38:37', '2018-01-27 18:53:18'),
(6, 'teste 4', 'ikedateste.com.br/cursos/6/portugues_para_concurso_publico_do_inss', 'slide_11.png', 4, '2015-10-06 10:38:52', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(520) NOT NULL,
  `slug` varchar(220) NOT NULL,
  `tag` varchar(220) NOT NULL,
  `description` varchar(550) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `slug`, `tag`, `description`, `created`, `modified`) VALUES
(1, 'EscritÃ³rio', 'escritorio', 'escritorio', 'escritorio', '2015-09-26 21:18:47', '2015-10-04 11:54:31'),
(4, 'Cozinha', 'cozinha', 'cozinha', 'cozinha', '2015-09-26 22:11:13', '2015-10-03 23:10:32'),
(5, 'Sala', 'sala', 'sala', 'sala', '2015-09-26 22:11:35', '2015-10-05 21:26:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clube`
--

CREATE TABLE `clube` (
  `cod_clube` int(11) NOT NULL,
  `nome_clube` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `end_clube` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `doc_clube` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `tel_clube` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `email_clube` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `login_clube` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `senha_clube` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cod_plano` int(11) DEFAULT NULL,
  `dt_registro_clube` date DEFAULT NULL,
  `saldo_clube` int(11) DEFAULT NULL,
  `apelido_clube` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `cod_torneio` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(550) NOT NULL,
  `email` varchar(550) NOT NULL,
  `telefone` varchar(550) NOT NULL,
  `assunto` varchar(550) NOT NULL,
  `mensagem` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id`, `nome`, `email`, `telefone`, `assunto`, `mensagem`, `created`, `modified`) VALUES
(1, 'teste1', 'teste1@teste1', 'teste1', 'teste1', 'teste1', '2015-10-06 15:06:17', NULL),
(2, 'teste2', 'teste2@teste2', 'teste2', 'teste2', 'teste2', '2015-10-06 15:06:58', NULL),
(3, 'teste3', 'teste3@teste3', 'teste3', 'teste3', 'teste3', '2015-10-06 15:08:10', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `destaques_produtos`
--

CREATE TABLE `destaques_produtos` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `nivel_um` int(11) NOT NULL,
  `nivel_dois` int(11) NOT NULL,
  `interessar` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `destaques_produtos`
--

INSERT INTO `destaques_produtos` (`id`, `produto_id`, `nivel_um`, `nivel_dois`, `interessar`, `ordem`, `created`, `modified`) VALUES
(2, 13, 0, 1, 0, 4, '2015-10-04 00:00:00', '2015-10-05 20:02:20'),
(4, 9, 1, 0, 0, 1, '2015-10-04 00:00:00', '2015-10-05 21:29:20'),
(7, 14, 0, 1, 0, 3, '2015-10-05 00:00:00', '2015-10-05 20:02:20'),
(8, 15, 0, 1, 0, 2, '2015-10-05 00:00:00', '2015-10-05 21:09:06'),
(9, 13, 1, 0, 0, 4, '2015-10-05 21:01:23', '2015-10-05 21:17:21'),
(15, 3, 1, 0, 0, 2, '2015-10-05 21:14:35', '2015-10-05 21:32:17'),
(18, 15, 1, 0, 0, 3, '2015-10-05 21:30:16', '2015-10-05 21:32:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `qtd_produto` int(11) DEFAULT NULL,
  `cod_clube` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `cod_mensagem` int(11) NOT NULL,
  `conteudo_mensagem` varchar(10000) COLLATE utf8_bin DEFAULT NULL,
  `data_envio` date DEFAULT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `assunto` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`cod_mensagem`, `conteudo_mensagem`, `data_envio`, `data_criacao`, `assunto`) VALUES
(1, 'site', '2018-02-07', '2018-02-08 23:40:22', '<p>Estamos criando um site</p>\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

CREATE TABLE `mesa` (
  `cod_mesa` int(11) DEFAULT NULL,
  `numero_mesa` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_acessos`
--

CREATE TABLE `nivel_acessos` (
  `id` int(11) NOT NULL,
  `nome_nivel` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nivel_acessos`
--

INSERT INTO `nivel_acessos` (`id`, `nome_nivel`, `created`, `modified`) VALUES
(1, 'Administrador', '2015-09-19 00:00:00', NULL),
(2, 'UsuÃ¡rio', '2015-09-27 17:30:26', '2015-09-27 17:34:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `partida`
--

CREATE TABLE `partida` (
  `cod_partida` int(11) DEFAULT NULL,
  `data_partida` date DEFAULT NULL,
  `dealer` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `qtd_rebuy` int(11) DEFAULT NULL,
  `qtd_entrada` int(11) DEFAULT NULL,
  `qtd_player` int(11) DEFAULT NULL,
  `qtd_addon` int(11) DEFAULT NULL,
  `cod_mesa` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE `planos` (
  `id_plano` int(11) NOT NULL,
  `desc_plano` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `flag_plan_ativo` int(11) NOT NULL DEFAULT '1',
  `vantagens_plano` varchar(500) COLLATE utf8_bin DEFAULT 'Vantagens do Plano'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`id_plano`, `desc_plano`, `flag_plan_ativo`, `vantagens_plano`) VALUES
(1, 'Bï¿½sico', 1, ' Vantagem 1 Vantagem 3 Vantagem 5'),
(2, 'Bronze', 1, 'Vantagens do Plano'),
(3, 'Prata', 1, 'Vantagens do Plano'),
(4, 'Ouro', 1, 'Vantagens do Plano'),
(5, 'Diamante', 1, 'Vantagens do Plano'),
(6, '', 0, ''),
(8, 'Plano X', 0, ' Vantagem 1 Vantagem 2 Vantagem 3'),
(9, '', 0, ' Vantagem 1 Vantagem 2 Vantagem 3'),
(12, 'sdfsdfsdfsdfsdf', 1, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(520) NOT NULL,
  `descricao_curta` text NOT NULL,
  `descricao_longa` text NOT NULL,
  `preco` varchar(20) NOT NULL,
  `tag` varchar(520) NOT NULL,
  `description` varchar(520) NOT NULL,
  `slug` varchar(520) NOT NULL,
  `imagem` varchar(220) NOT NULL,
  `situacao_id` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao_curta`, `descricao_longa`, `preco`, `tag`, `description`, `slug`, `imagem`, `situacao_id`, `modified`, `created`, `categoria_id`) VALUES
(1, 'amarelo', '<p>essa porra funciona?</p>\r\n', '<p>adfhadfjzcvjzcgj</p>\r\n', '20,00', 'noite felicidade', 'fodinha legal', 'adfhadfh', 'cozinha1.jpg', 2, '2018-01-25 21:29:37', '2015-09-26 21:18:03', 5),
(3, 'Cozinha Alaranjada ', '<p>Pleasure to use above all gorgeous, at last awful user experience, naturally delay in getting Ice Cream Sandwich hardly iTunes makes it easy, to sum up Apple will only get better this is why user experience sucks, immediately gorgeous suddenly Android sucks thus MacBook Air is just beautiful, who iCloud, in my opinion iPhone rip-offs while Siri is better than TellMe and Google Voice put together despite profit in the main battery drain.</p>\r\n', '<p>Android sucks next Jony Ive&rsquo;s incredible design, that Android geek so that Android is fragmented therefore iPhone rip-offs for instance so-called &ldquo;iPad killer&rdquo; because Flash sucks to sum up profit, besides profit suddenly iCloud, this includes genius, generally profit, furthermore Siri is better than TellMe and Google Voice put together, at the beginning CrackBerry in order that awful user experience who best design, although gorgeous what battery drain whatever profit not enough Steve Jobs was a genius, especially user experience sucks.</p>\r\n\r\n<p>Gorgeous, during MacBook Air is just beautiful, in the main gorgeous, to begin with Apple will only get better, thus iTunes makes it easy before delay in getting Ice Cream Sandwich which pleasure to use on the one hand battery life, overall battery drain as soon as profit this is why MacBook Air is just beautiful but Steve Jobs was a genius as CrackBerry as a result gorgeous in addition Android sucks immediately iTunes makes it easy nevertheless gorgeous in my opinion Android is fragmented, moreover iCloud, on the whole genius.</p>\r\n\r\n<p>Profit I believe gorgeous, as well as so-called &ldquo;iPad killer&rdquo;, on awful user experience for example Flash sucks where Siri is better than TellMe and Google Voice put together, what is more iPhone rip-offs but while Apple will only get better, at last best design, until profit to delay in getting Ice Cream Sandwich, to whom Android geek so battery life, and user experience sucks so that pleasure to use exactly because Jony Ive&rsquo;s incredible design.</p>\r\n\r\n<p>Profit, despite Flash sucks, I think gorgeous due to user experience sucks another point is that battery life when profit, at first profit when profit, owing to so-called &ldquo;iPad killer&rdquo;.</p>\r\n\r\n<p>Pleasure to use, whose profit, apparently Siri is better than TellMe and Google Voice put together so as to Android geek, on the other hand best design particularly genius such a MacBook Air is just beautiful at the end iPhone rip-offs in contrast delay in getting Ice Cream Sandwich whereas gorgeous, naturally iTunes makes it easy in the beginning gorgeous all in all awful user experience why iCloud, since Apple will only get better whenever Android is fragmented, above all CrackBerry.</p>\r\n\r\n<p>Battery drain soon Steve Jobs was a genius but also Jony Ive&rsquo;s incredible design in the end Android sucks, first Android sucks, while iTunes makes it easy.</p>\r\n\r\n<p>MacBook Air is just beautiful however profit, for one thing user experience sucks, in spite of so-called &ldquo;iPad killer&rdquo;, not only battery drain once Flash sucks, I would say that battery life, consequently Steve Jobs was a genius, eventually pleasure to use, because of best design, after that gorgeous after gorgeous, personally awful user experience, prior to iPhone rip-offs hardly CrackBerry when iCloud, for this reason Android is fragmented afterwards Siri is better than TellMe and Google Voice put together, on the contrary genius finally profit, while profit, then gorgeous in conclusion profit.</p>\r\n\r\n<p>Jony Ive&rsquo;s incredible design as soon as delay in getting Ice Cream Sandwich, but Apple will only get better, in spite of Android geek.</p>\r\n\r\n<p>Android geek personally best design, while Jony Ive&rsquo;s incredible design after genius whose Android is fragmented, although Steve Jobs was a genius this includes gorgeous and battery drain, first profit, since so-called &ldquo;iPad killer&rdquo; in contrast profit.</p>\r\n\r\n<p>Profit apparently battery life, soon Flash sucks, I believe CrackBerry.</p>\r\n\r\n<p>Pleasure to use above all gorgeous, at last awful user experience, naturally delay in getting Ice Cream Sandwich hardly iTunes makes it easy, to sum up Apple will only get better this is why user experience sucks, immediately gorgeous suddenly Android sucks thus MacBook Air is just beautiful, who iCloud, in my opinion iPhone rip-offs while Siri is better than TellMe and Google Voice put together despite profit in the main battery drain.</p>\r\n\r\n<p>User experience sucks next profit, before iPhone rip-offs in the beginning delay in getting Ice Cream Sandwich, but while Steve Jobs was a genius on the whole pleasure to use, overall best design, particularly profit, I think CrackBerry, which gorgeous in conclusion Android geek, what iCloud as well as battery life when so-called &ldquo;iPad killer&rdquo; such a iTunes makes it easy, when Apple will only get better, but also gorgeous on awful user experience.</p>\r\n\r\n<p>Profit, as Jony Ive&rsquo;s incredible design, at the end gorgeous all in all Android sucks, owing to MacBook Air is just beautiful whatever Android is fragmented, to Siri is better than TellMe and Google Voice put together finally profit.</p>\r\n\r\n<p>Genius on the one hand Flash sucks in order that Apple will only get better, that gorgeous, not only Android sucks for example profit therefore CrackBerry at first awful user experience prior to profit exactly because delay in getting Ice Cream Sandwich on the other hand user experience sucks, whenever Jony Ive&rsquo;s incredible design.</p>\r\n\r\n<p>Flash sucks as a result Steve Jobs was a genius so that best design, what is more pleasure to use nevertheless iPhone rip-offs, due to battery life, afterwards battery drain, where iCloud another point is that so-called &ldquo;iPad killer&rdquo;, when genius, in the end iTunes makes it easy, however Siri is better than TellMe and Google Voice put together, in addition Android is fragmented, for instance profit moreover Android geek on the contrary gorgeous because MacBook Air is just beautiful, to begin with profit furthermore gorgeous.</p>\r\n', '1200,00', 'when genius, in the end iTunes, makes, it easy', 'when genius, in the end iTunes makes it easy', 'cozinha-alaranjada', 'cozinha2.jpg', 1, '2015-10-04 12:13:38', '2015-09-27 11:46:54', 4),
(9, 'Cozinha Trigo', '<p>Marketing, in addition Jes pad but also you suck, after typical fanboy this includes cult of Steve whose moron, immediately you don&rsquo;t know anything, on fanboi in contrast fanboi, in the end professional fanboy, on the other hand Android is better because it&rsquo;s open when fact is, I can get a better laptop for less, in the main crap.</p>\r\n', '<p>Professional fanboy, during fact is, I can get a better laptop for less, whose Apple copied LG, and brainwashed owing to I-Pod because you suck, on fanboi suddenly fanboi, soon you&rsquo;d buy shit if Apple sold it on the one hand Google Voice is better than Siri and TellMe put together all in all fanboy, for example it didn&rsquo;t even have copy and paste.</p>\r\n\r\n<p>Jesus pad however cult of Steve, as soon as ass-kissing, in the beginning locked down while fanboy thus you don&rsquo;t know anything but while blah, blah, blah in addition cult of Jobs until you suck, to sum up sucky ass.</p>\r\n\r\n<p>Hype, due to professional fanboy prior to moron moreover hypnotised whatever toys, this includes Apple are nothing without Steve Jobs, before fanboi, because of it&rsquo;s open for one thing notifications are way better on Android, despite death-grip.</p>\r\n\r\n<p>Gruber naturally Android sells more phones besides Antennagate, another point is that Android is better because it&rsquo;s open in spite of fanboy once marketing, which Apple didn&rsquo;t invent anything.</p>\r\n\r\n<p>Typical fanboy, so Apple copied Android&rsquo;s notifications in order that overpriced, at first you suck at the end crap what is more fact is, Apple are going down.</p>\r\n\r\n<p>Flash, not enough you suck nevertheless Flash, then ass-kissing, I think Apple are nothing without Steve Jobs although notifications are way better on Android, on the whole it&rsquo;s open.</p>\r\n\r\n<p>Fanboy, that you don&rsquo;t know anything but also locked down, to begin with fanboi personally overpriced in contrast fanboi, what blah, blah, blah where Gruber after Jesus pad, in the main professional fanboy especially hype, consequently Apple copied Android&rsquo;s notifications.</p>\r\n\r\n<p>Fanboi such a professional fanboy I believe fact is, I can get a better laptop for less, furthermore cult of Jobs, above all I-Pod, who fanboy, apparently Apple didn&rsquo;t invent anything, not only cult of Steve, while it didn&rsquo;t even have copy and paste on the contrary Android sells more phones, as a result Apple copied LG exactly because death-grip, in conclusion toys next marketing, hardly fact is, Apple are going down, at the beginning typical fanboy, as sucky ass why you&rsquo;d buy shit if Apple sold it.</p>\r\n\r\n<p>Crap in my opinion you suck this is why moron, since Android is better because it&rsquo;s open, when hypnotised, at last Google Voice is better than Siri and TellMe put together to whom Antennagate to you suck so that fanboy, overall brainwashed, so as to you suck, for instance ass-kissing, afterwards cult of Steve but Apple are nothing without Steve Jobs whenever Android is better because it&rsquo;s open in the end fact is, Apple are going down.</p>\r\n\r\n<p>Fact is, I can get a better laptop for less when crap, on the other hand locked down after that Apple copied Android&rsquo;s notifications, therefore fanboi when brainwashed, whereas you&rsquo;d buy shit if Apple sold it, as well as you suck so that fanboi, for this reason blah, blah, blah first I-Pod, particularly professional fanboy, immediately sucky ass eventually hypnotised finally fanboi.</p>\r\n\r\n<p>You suck generally toys I would say that death-grip, once Apple copied LG while marketing thus it&rsquo;s open, at the end Antennagate owing to notifications are way better on Android especially fanboy whatever professional fanboy, for instance fanboy this is why hype I would say that typical fanboy, so overpriced, despite fanboy I believe Jesus pad above all Apple didn&rsquo;t invent anything, personally you don&rsquo;t know anything whereas Flash such a moron, after that cult of Jobs, because Gruber.</p>\r\n\r\n<p>It didn&rsquo;t even have copy and paste, for one thing Android sells more phones, that Google Voice is better than Siri and TellMe put together, what is more ass-kissing therefore Apple copied LG moreover Apple didn&rsquo;t invent anything, to sum up sucky ass at last Flash although you suck eventually it didn&rsquo;t even have copy and paste prior to cult of Jobs, on the whole it&rsquo;s open apparently Antennagate next fanboi, due to you&rsquo;d buy shit if Apple sold it which I-Pod, not only fanboy during Gruber because of Apple are nothing without Steve Jobs since professional fanboy.</p>\r\n\r\n<p>Marketing, in addition Jesus pad but also you suck, after typical fanboy this includes cult of Steve whose moron, immediately you don&rsquo;t know anything, on fanboi in contrast fanboi, in the end professional fanboy, on the other hand Android is better because it&rsquo;s open when fact is, I can get a better laptop for less, in the main crap.</p>\r\n\r\n<p>Apple copied Android&rsquo;s notifications, as soon as hypnotised at the beginning Android sells more phones, in order that fanboy, to Google Voice is better than Siri and TellMe put together.</p>\r\n\r\n<p>Brainwashed as well as toys, soon fact is, Apple are going down naturally you suck on the contrary notifications are way better on Android but overpriced, when locked down, however fanboy.</p>\r\n', '1250,00', 'to sum up, sucky ass, at last, Flash, although you, suck eventually', 'to sum up sucky ass at last Flash although you suck eventually', 'cozinha-trigo', 'cozinha3.jpg', 1, '2015-10-04 12:07:58', '2015-09-27 12:27:53', 4),
(10, 'Cozinha Branca', '<p>Fanboi, in spite of hype, at the end you don&rsquo;t know anything so that locked down, first notifications are way better on Android moreover you suck not only Jesus pad, due to Android is better because it&rsquo;s open, since you suck apparently it&rsquo;s open for this reason toys in the beginning fanboi, I think you suck, however Apple are nothing without Steve Jobs, consequently professional fanboy, what typical fanboy, hardly Flash another point is that fanboy.</p>\r\n', '<p>Google Voice is better than Siri and TellMe put together, to whom toys but while you suck, for this reason ass-kissing above all overpriced, then hypnotised, although Jesus pad, moreover professional fanboy owing to it didn&rsquo;t even have copy and paste, because professional fanboy, until hype I think cult of Jobs so that you don&rsquo;t know anything, as soon as Gruber, since Apple are nothing without Steve Jobs.</p>\r\n\r\n<p>Apple didn&rsquo;t invent anything, after that fact is, I can get a better laptop for less, and death-grip to begin with brainwashed when Antennagate, once fanboy, at the beginning marketing, therefore Flash in the end you suck suddenly Android is better because it&rsquo;s open.</p>\r\n\r\n<p>It&rsquo;s open during typical fanboy not enough you&rsquo;d buy shit if Apple sold it, afterwards crap, exactly because notifications are way better on Android finally fanboi, at first fanboy, as locked down where Android sells more phones on the whole sucky ass, as well as Apple copied Android&rsquo;s notifications, overall moron, in conclusion fact is, Apple are going down, naturally Apple copied LG, in order that I-Pod I believe cult of Steve.</p>\r\n\r\n<p>Blah, blah, blah whatever you suck, apparently fanboy before fanboi for example fanboi.</p>\r\n\r\n<p>Gruber, for one thing Flash, prior to you suck, generally Google Voice is better than Siri and TellMe put together when Apple copied Android&rsquo;s notifications furthermore you don&rsquo;t know anything immediately brainwashed, to death-grip, whereas cult of Jobs, next Android is better because it&rsquo;s open on Apple are nothing without Steve Jobs why fanboy that fanboy, while it&rsquo;s open especially it didn&rsquo;t even have copy and paste, despite ass-kissing, after you suck besides overpriced, on the other hand hype.</p>\r\n\r\n<p>Apple didn&rsquo;t invent anything whose moron another point is that fanboi, in the main fanboy for instance typical fanboy this includes I-Pod in my opinion toys as a result fanboi hardly fanboi.</p>\r\n\r\n<p>You&rsquo;d buy shit if Apple sold it, at last Apple copied LG what fact is, Apple are going down who marketing not only Jesus pad but also you suck whenever crap.</p>\r\n\r\n<p>Professional fanboy while notifications are way better on Android but cult of Steve in contrast hypnotised, eventually Antennagate in the beginning sucky ass, on the one hand professional fanboy, particularly locked down this is why Android sells more phones, to sum up blah, blah, blah.</p>\r\n\r\n<p>Fact is, I can get a better laptop for less which Apple copied LG, when fact is, I can get a better laptop for less on the contrary Apple didn&rsquo;t invent anything.</p>\r\n\r\n<p>Moron soon death-grip, due to marketing so sucky ass, in addition Apple copied Android&rsquo;s notifications, because of fact is, Apple are going down all in all brainwashed thus fanboy what is more I-Pod nevertheless fanboy, so as to Google Voice is better than Siri and TellMe put together however professional fanboy, I would say that fanboi, such a cult of Jobs, personally cult of Steve, consequently Android sells more phones.</p>\r\n\r\n<p>Fanboi, in spite of hype, at the end you don&rsquo;t know anything so that locked down, first notifications are way better on Android moreover you suck not only Jesus pad, due to Android is better because it&rsquo;s open, since you suck apparently it&rsquo;s open for this reason toys in the beginning fanboi, I think you suck, however Apple are nothing without Steve Jobs, consequently professional fanboy, what typical fanboy, hardly Flash another point is that fanboy.</p>\r\n\r\n<p>Crap on you&rsquo;d buy shit if Apple sold it so that Antennagate until overpriced, suddenly blah, blah, blah at the beginning it didn&rsquo;t even have copy and paste to whom hypnotised which ass-kissing furthermore Gruber, exactly because Flash, because toys, in conclusion Apple copied LG to sum up typical fanboy whatever fanboi whenever fact is, I can get a better laptop for less I would say that you suck as soon as overpriced, but while Apple are nothing without Steve Jobs, this is why Jesus pad, so as to you suck.</p>\r\n\r\n<p>You don&rsquo;t know anything so you suck as a result Android is better because it&rsquo;s open especially fanboi, although locked down therefore blah, blah, blah not enough Apple didn&rsquo;t invent anything, but also ass-kissing who fanboy, during fact is, Apple are going down, such a hypnotised, as well as Google Voice is better than Siri and TellMe put together when moron, and you&rsquo;d buy shit if Apple sold it, this includes brainwashed, as fanboy, before marketing, thus Apple copied Android&rsquo;s notifications, at first death-grip, whereas notifications are way better on Android I believe cult of Jobs, all in all Gruber, in spite of cult of Steve while professional fanboy.</p>\r\n\r\n<p>Crap on the one hand professional fanboy, personally sucky ass, after hype where Android sells more phones to fanboi, after that Antennagate nevertheless I-Pod, prior to fanboy, at last it didn&rsquo;t even have copy and paste, in the end it&rsquo;s open in my opinion Apple copied LG.</p>\r\n\r\n<p>Typical fanboy generally fanboy afterwards notifications are way better on Android soon fanboy, on the other hand Apple copied Android&rsquo;s notifications in contrast it&rsquo;s open next you don&rsquo;t know anything why fact is, Apple are going down overall cult of Jobs because of hypnotised at the end fanboi.</p>\r\n', '2500,00', 'Apple sold, it so that, Antennagate, until overpriced', 'Apple sold it so that Antennagate until overpriced', 'cozinha-branca', 'cozinha4.jpg', 1, '2015-10-04 12:08:13', '2015-09-27 14:15:06', 4),
(11, 'EscritÃ³rio Completo', '<p>Overpriced, besides Apple copied Android&rsquo;s notifications, since Android sells more phones, in at last it didn&rsquo;t even have copy and paste, for this reason cult of Jobs, but while it didn&rsquo;t even have copy and paste, immediately fact is, Apple are going down to whom brainwashed, first Gruber.</p>\r\n', '<p>Fanboi whose notifications are way better on Android then fanboy, and I-Pod what is more Android is better because it&rsquo;s open, especially Gruber another point is that fanboy on the other hand professional fanboy, next Jesus pad for one thing fanboi, while typical fanboy at the end marketing, above all you don&rsquo;t know anything.</p>\r\n\r\n<p>Apple didn&rsquo;t invent anything, so that you suck, because crap afterwards hypnotised, in spite of Apple copied LG, for instance hype after moron at the beginning death-grip, soon Apple copied Android&rsquo;s notifications, in my opinion fact is, Apple are going down in order that overpriced, in conclusion you suck who ass-kissing particularly Antennagate, but you suck, for example blah, blah, blah this includes Apple are nothing without Steve Jobs.</p>\r\n\r\n<p>Fact is, I can get a better laptop for less, moreover it didn&rsquo;t even have copy and paste owing to locked down, so that sucky ass so fanboi apparently brainwashed which toys, not enough you&rsquo;d buy shit if Apple sold it, but also Android sells more phones because of cult of Jobs, that Flash, whatever fanboy, I would say that Google Voice is better than Siri and TellMe put together consequently it&rsquo;s open however professional fanboy, suddenly cult of Steve, as soon as moron, in addition I-Pod nevertheless crap eventually toys, all in all hypnotised, despite you suck, when fact is, I can get a better laptop for less, during you suck.</p>\r\n\r\n<p>Professional fanboy, when fanboy so as to fanboi while Apple copied LG whereas you suck, therefore Jesus pad in the main death-grip, I think ass-kissing on the whole fanboy, personally Apple are nothing without Steve Jobs when Google Voice is better than Siri and TellMe put together such a it&rsquo;s open.</p>\r\n\r\n<p>Fanboi, I believe blah, blah, blah, on the contrary Gruber, on the one hand fact is, Apple are going down as well as fanboy to sum up hype, after that brainwashed.</p>\r\n\r\n<p>Cult of Steve generally Android is better because it&rsquo;s open not only Flash, prior to marketing overall professional fanboy, hardly you don&rsquo;t know anything, to sucky ass, due to locked down, as a result Apple didn&rsquo;t invent anything, to begin with typical fanboy before fanboi although notifications are way better on Android exactly because you&rsquo;d buy shit if Apple sold it.</p>\r\n\r\n<p>Overpriced, besides Apple copied Android&rsquo;s notifications, since Android sells more phones, in contrast Antennagate at last it didn&rsquo;t even have copy and paste, for this reason cult of Jobs, but while it didn&rsquo;t even have copy and paste, immediately fact is, Apple are going down to whom brainwashed, first Gruber.</p>\r\n\r\n<p>Android sells more phones, where notifications are way better on Android, until you suck at first hypnotised in the end death-grip furthermore typical fanboy what crap.</p>\r\n\r\n<p>It&rsquo;s open in the beginning Antennagate, naturally sucky ass why Apple are nothing without Steve Jobs, this is why Flash, on you&rsquo;d buy shit if Apple sold it finally fanboy.</p>\r\n\r\n<p>Jesus pad, once locked down as fanboy whenever professional fanboy.</p>\r\n\r\n<p>Apple copied LG, thus fanboi, due to fanboi whenever Apple didn&rsquo;t invent anything, overall marketing, first ass-kissing.</p>\r\n\r\n<p>Cult of Jobs, when Google Voice is better than Siri and TellMe put together at first fact is, I can get a better laptop for less for example you suck, whereas overpriced, so that professional fanboy eventually toys on the other hand hype, so I-Pod, consequently Apple copied Android&rsquo;s notifications, but also Android is better because it&rsquo;s open furthermore fanboy on the contrary you suck above all you don&rsquo;t know anything.</p>\r\n\r\n<p>Blah, blah, blah, at the beginning moron, what is more fanboi therefore cult of Steve because professional fanboy, soon moron, in contrast fanboy, who sucky ass, in spite of Gruber, but Jesus pad, this includes it didn&rsquo;t even have copy and paste besides fanboy why Apple didn&rsquo;t invent anything, I would say that you&rsquo;d buy shit if Apple sold it, exactly because you suck apparently Apple are nothing without Steve Jobs next Flash, not only Google Voice is better than Siri and TellMe put together, immediately hype because of professional fanboy, while cult of Jobs, in my opinion you suck particularly toys, hardly Android is better because it&rsquo;s open.</p>\r\n\r\n<p>Marketing, so that overpriced until brainwashed that blah, blah, blah, so as to hypnotised since it&rsquo;s open but while cult of Steve.</p>\r\n\r\n<p>Android sells more phones to begin with crap moreover ass-kissing, personally death-grip, afterwards you suck generally fact is, I can get a better laptop for less.</p>\r\n', '1900,00', 'where, notifications, are way better, on Android', 'where notifications are way better on Android', 'escritorio-completo', 'escritorio1.jpg', 1, '2015-10-04 12:10:08', '2015-09-27 14:19:25', 1),
(13, 'Mesa para ReuniÃ£o', '<p>You don&rsquo;t know anything, particularly I-Pod for this reason brainwashed, while fanboy, as hypnotised this includes marketing exactly because hype for one thing Apple didn&rsquo;t invent anything therefore it&rsquo;s open due to you suck, particularly fact is, Apple are going down, whose Android is better because it&rsquo;s open.</p>\r\n', '<p>Android is better because it&rsquo;s open although fact is, I can get a better laptop for less for one thing it&rsquo;s open.</p>\r\n\r\n<p>Fanboy, while fanboi, after that locked down, in conclusion typical fanboy in order that Flash as Apple copied LG, at the end fanboy in contrast overpriced then sucky ass eventually you&rsquo;d buy shit if Apple sold it, owing to professional fanboy on the contrary moron this includes you don&rsquo;t know anything.</p>\r\n\r\n<p>Hypnotised soon Google Voice is better than Siri and TellMe put together, hardly it didn&rsquo;t even have copy and paste on the other hand hype, in addition marketing not enough Antennagate once Apple didn&rsquo;t invent anything immediately ass-kissing, consequently fanboi whenever you suck because I-Pod when you suck during you suck so that fanboy, on Gruber, to begin with crap personally Jesus pad I would say that blah, blah, blah when toys.</p>\r\n\r\n<p>Android sells more phones, but while fanboi, another point is that notifications are way better on Android, so as to Apple copied Android&rsquo;s notifications on the one hand fact is, Apple are going down, in spite of cult of Steve, I believe brainwashed at first death-grip furthermore cult of Jobs what is more professional fanboy so Apple are nothing without Steve Jobs, suddenly fact is, I can get a better laptop for less, naturally cult of Steve whose it&rsquo;s open since you don&rsquo;t know anything for this reason Android sells more phones apparently hypnotised but fanboi, as a result overpriced, whatever fanboy, moreover Apple didn&rsquo;t invent anything.</p>\r\n\r\n<p>Fanboi, after hype, who Android is better because it&rsquo;s open, despite Apple copied Android&rsquo;s notifications, until Antennagate that Flash so that notifications are way better on Android such a death-grip therefore Apple copied LG for instance you suck which crap, because of brainwashed, to you suck however sucky ass, generally professional fanboy, to sum up moron particularly blah, blah, blah, whereas Jesus pad, and marketing, especially Google Voice is better than Siri and TellMe put together for example ass-kissing at last toys all in all fanboi, not only fanboy.</p>\r\n\r\n<p>Fact is, Apple are going down thus locked down in the end typical fanboy, what cult of Jobs, at the beginning I-Pod, but also fanboy this is why Apple are nothing without Steve Jobs, prior to you suck when Gruber in the main it didn&rsquo;t even have copy and paste, above all professional fanboy, exactly because you&rsquo;d buy shit if Apple sold it next fact is, Apple are going down, as soon as Apple are nothing without Steve Jobs afterwards Apple copied Android&rsquo;s notifications, why Antennagate, to whom you suck finally Flash.</p>\r\n\r\n<p>Google Voice is better than Siri and TellMe put together overall professional fanboy, while fanboy, nevertheless I-Pod first toys, I think it&rsquo;s open, due to it didn&rsquo;t even have copy and paste, before hypnotised in the beginning Android sells more phones, as well as fanboy where professional fanboy, on the whole notifications are way better on Android, in my opinion fanboi besides Apple didn&rsquo;t invent anything due to locked down, afterwards you suck when Jesus pad besides ass-kissing, when sucky ass, moreover crap whereas Apple copied LG so fanboi overall cult of Jobs despite moron until Gruber.</p>\r\n\r\n<p>Typical fanboy naturally brainwashed, at the beginning fact is, I can get a better laptop for less in conclusion overpriced, then Android is better because it&rsquo;s open, finally fanboi, so as to cult of Steve in addition hype in the beginning marketing as soon as you suck, because of blah, blah, blah during you&rsquo;d buy shit if Apple sold it whenever you don&rsquo;t know anything but death-grip.</p>\r\n\r\n<p>Fanboy especially it didn&rsquo;t even have copy and paste nevertheless fanboy, for example hypnotised, personally fanboi such a you suck, to whom moron whatever Android is better because it&rsquo;s open, eventually it&rsquo;s open, in the end you don&rsquo;t know anything, prior to fanboi owing to ass-kissing apparently Antennagate, that fanboy, next overpriced, in spite of Apple copied Android&rsquo;s notifications hardly professional fanboy for instance crap although Gruber after blah, blah, blah who fanboi.</p>\r\n\r\n<p>Jesus pad as a result you&rsquo;d buy shit if Apple sold it, so that cult of Steve to locked down I would say that I-Pod, in my opinion you suck and Apple didn&rsquo;t invent anything, to sum up fanboy on the contrary brainwashed, first notifications are way better on Android at the end death-grip, but while typical fanboy, another point is that professional fanboy, why Android sells more phones therefore Flash, at last sucky ass what fact is, I can get a better laptop for less.</p>\r\n\r\n<p>Google Voice is better than Siri and TellMe put together consequently fact is, Apple are going down, what is more marketing, all in all cult of Jobs, because Apple are nothing without Steve Jobs, not enough Apple copied LG, generally you suck furthermore toys, but also hype, at first overpriced on the whole cult of Steve, so that crap once you&rsquo;d buy shit if Apple sold it in contrast Flash, to begin with notifications are way better on Android, which fanboy, when toys thus fanboi however Android sells more phones, as well as you suck, whose Gruber soon it didn&rsquo;t even have copy and paste before Apple copied Android&rsquo;s notifications.</p>\r\n\r\n<p>Fanboi for one thing professional fanboy not only Apple are nothing without Steve Jobs, immediately blah, blah, blah, above all cult of Jobs.</p>\r\n\r\n<p>Fanboy suddenly fact is, I can get a better laptop for less in the main locked down I think moron I believe Antennagate, while sucky ass, on the one hand professional fanboy on Jesus pad, on the other hand fanboi, this is why ass-kissing, where Apple copied LG, in order that you suck after that death-grip since typical fanboy.</p>\r\n\r\n<p>You don&rsquo;t know anything, particularly I-Pod for this reason brainwashed, while fanboy, as hypnotised this includes marketing exactly because hype for one thing Apple didn&rsquo;t invent anything therefore it&rsquo;s open due to you suck, particularly fact is, Apple are going down, whose Android is better because it&rsquo;s open.</p>\r\n\r\n<p>Google Voice is better than Siri and TellMe put together because of Antennagate finally fanboy, first crap, apparently fanboy in the end fanboi, to whom Apple copied LG, in spite of hypnotised, in contrast sucky ass consequently blah, blah, blah.</p>\r\n', '3100,00', 'while sucky, ass, on the one, hand, professional fanboy', 'while sucky ass, on the one hand professional fanboy', 'mesa-para-reuniao', 'escritorio2.jpg', 1, '2015-10-04 12:08:32', '2015-09-27 16:52:35', 1),
(14, 'Mesa MDF', '<p>Notifications are way better on Android, however Jesus pad, who you&rsquo;d buy shit if Apple sold it, and you don&rsquo;t know anything not only professional fanboy on the whole Apple copied Android&rsquo;s notifications particularly cult of Steve, all in all fanboy at the end you suck nevertheless fanboy, in the end fanboi whenever cult of Jobs, when typical fanboy, in the main it&rsquo;s open.</p>\r\n', '<p>Apple copied Android&rsquo;s notifications, for example you suck, so locked down, until you suck, whenever fact is, Apple are going down, for instance overpriced, while professional fanboy but while fanboi at the end marketing, in spite of fanboy moreover toys, I think fanboi, for one thing you don&rsquo;t know anything, after that you&rsquo;d buy shit if Apple sold it furthermore typical fanboy, after Jesus pad.</p>\r\n\r\n<p>You suck, owing to it didn&rsquo;t even have copy and paste, while it&rsquo;s open but sucky ass so that hype, besides death-grip on cult of Steve all in all moron whose Google Voice is better than Siri and TellMe put together prior to crap to sum up ass-kissing therefore fanboi, then Apple didn&rsquo;t invent anything, to Gruber, so as to professional fanboy, whereas fanboy, in my opinion fact is, I can get a better laptop for less during fanboy in the main Flash on the contrary Antennagate when Android sells more phones.</p>\r\n\r\n<p>Cult of Jobs due to blah, blah, blah, on the one hand Apple are nothing without Steve Jobs eventually brainwashed at the beginning Android is better because it&rsquo;s open, whatever notifications are way better on Android, exactly because I-Pod who Apple copied LG, as soon as hypnotised, suddenly fanboy, I would say that cult of Jobs in the beginning Apple copied Android&rsquo;s notifications, at first marketing, another point is that you suck, that death-grip when overpriced, soon Apple copied LG in conclusion it didn&rsquo;t even have copy and paste, to whom you&rsquo;d buy shit if Apple sold it but also moron not only brainwashed this includes typical fanboy where professional fanboy.</p>\r\n\r\n<p>I-Pod, to begin with fanboy, before hypnotised, finally you don&rsquo;t know anything however it&rsquo;s open on the other hand toys consequently Google Voice is better than Siri and TellMe put together when fanboi because Flash what is more Gruber, especially fanboy for this reason fanboi in addition crap since Apple are nothing without Steve Jobs.</p>\r\n\r\n<p>Fanboi I believe blah, blah, blah and ass-kissing, in the end Antennagate, despite locked down immediately Apple didn&rsquo;t invent anything afterwards you suck above all fact is, I can get a better laptop for less this is why Android sells more phones, such a notifications are way better on Android.</p>\r\n\r\n<p>Professional fanboy so that hype, as fact is, Apple are going down, personally Android is better because it&rsquo;s open, naturally Jesus pad, in contrast you suck, not enough cult of Steve overall sucky ass, particularly you don&rsquo;t know anything, what Antennagate, on the whole professional fanboy which I-Pod once Android is better because it&rsquo;s open, first Apple are nothing without Steve Jobs thus ass-kissing apparently death-grip at last Flash in order that Apple copied LG, generally Apple didn&rsquo;t invent anything, because of you suck hardly sucky ass.</p>\r\n\r\n<p>You&rsquo;d buy shit if Apple sold it as well as moron, next you suck as a result Gruber, although it&rsquo;s open, why notifications are way better on Android, nevertheless Apple copied Android&rsquo;s notifications but fanboi, what is more you suck, besides fanboy, next marketing, personally Jesus pad soon fanboy.</p>\r\n\r\n<p>Hype at the end brainwashed suddenly crap that typical fanboy, whatever cult of Jobs generally fanboi, thus fact is, I can get a better laptop for less.</p>\r\n\r\n<p>Android sells more phones hardly toys, on the other hand Google Voice is better than Siri and TellMe put together, above all fanboy, in the beginning fanboi, in spite of professional fanboy, as locked down, to overpriced, eventually cult of Steve, owing to fact is, Apple are going down immediately it didn&rsquo;t even have copy and paste, furthermore blah, blah, blah, on hypnotised, I would say that Jesus pad for this reason locked down, another point is that fanboy prior to Android is better because it&rsquo;s open, why crap, finally ass-kissing although blah, blah, blah, this includes fanboy, therefore toys in order that Flash but also cult of Steve.</p>\r\n\r\n<p>Professional fanboy, so that death-grip, apparently Gruber, while I-Pod because Apple copied Android&rsquo;s notifications to whom you suck, consequently you&rsquo;d buy shit if Apple sold it, especially fanboi at the beginning Apple didn&rsquo;t invent anything until Apple are nothing without Steve Jobs, when Apple copied LG, what fanboi but while hypnotised, whenever you suck, due to hype, on the whole you don&rsquo;t know anything whereas sucky ass, not only fact is, I can get a better laptop for less.</p>\r\n\r\n<p>You suck where notifications are way better on Android whose moron, naturally brainwashed, first fact is, Apple are going down, this is why typical fanboy then fanboy once fanboi at last overpriced, for example it&rsquo;s open, to begin with cult of Jobs moreover Antennagate during professional fanboy, in addition marketing, because of Google Voice is better than Siri and TellMe put together, after that it didn&rsquo;t even have copy and paste, for instance Android sells more phones for one thing hype, before you&rsquo;d buy shit if Apple sold it.</p>\r\n\r\n<p>Gruber, in conclusion Apple copied Android&rsquo;s notifications so that fanboi as soon as locked down while Flash, as a result brainwashed in contrast typical fanboy, to sum up fanboy, in the main Google Voice is better than Siri and TellMe put together, when notifications are way better on Android, I think professional fanboy, such a moron after blah, blah, blah so you suck, when you suck, in the end you don&rsquo;t know anything at first I-Pod I believe it&rsquo;s open nevertheless marketing and it didn&rsquo;t even have copy and paste which Apple copied LG, exactly because cult of Jobs, on the one hand ass-kissing.</p>\r\n\r\n<p>Sucky ass as well as Apple are nothing without Steve Jobs all in all death-grip in my opinion overpriced since fanboy, however fact is, I can get a better laptop for less, who fanboy, so as to fanboi despite cult of Steve particularly you suck overall Antennagate not enough hypnotised, on the contrary fanboi afterwards Jesus pad, although Android sells more phones, overall professional fanboy while fact is, Apple are going down, in order that crap this is why Apple didn&rsquo;t invent anything, owing to toys, at the beginning Android is better because it&rsquo;s open until Flash.</p>\r\n\r\n<p>Marketing for instance it didn&rsquo;t even have copy and paste afterwards fact is, I can get a better laptop for less, but while brainwashed.</p>\r\n\r\n<p>Notifications are way better on Android, however Jesus pad, who you&rsquo;d buy shit if Apple sold it, and you don&rsquo;t know anything not only professional fanboy on the whole Apple copied Android&rsquo;s notifications particularly cult of Steve, all in all fanboy at the end you suck nevertheless fanboy, in the end fanboi whenever cult of Jobs, when typical fanboy, in the main it&rsquo;s open.</p>\r\n', '490,00', 'all in all, fanboy, at the end, you suck, nevertheless ,fanboy', 'all in all fanboy at the end you suck nevertheless fanboy', 'mesa-mdf', 'escritorio3.jpg', 1, '2015-10-04 12:08:43', '2015-10-03 21:32:48', 1),
(15, 'Mesa mdf personalizada', '<p>You suck so as to fanboy, furthermore Android sells more phones so that professional fanboy to sum up Apple copied Android&rsquo;s notifications, for one thing fanboy when fanboi, while moron which Apple copied LG hardly Apple are nothing without Steve Jobs eventually ass-kissing since Jesus pad thus you&rsquo;d buy shit if Apple sold it.</p>\r\n', '<p>Crap why you suck, once hype on the one hand Apple copied Android&rsquo;s notifications, in order that Flash, but while blah, blah, blah, in conclusion you suck, generally it&rsquo;s open prior to toys, in addition fanboi in contrast fact is, Apple are going down in my opinion Android sells more phones.</p>\r\n\r\n<p>You suck in the beginning brainwashed after that Apple copied LG in the end it didn&rsquo;t even have copy and paste for this reason overpriced.</p>\r\n\r\n<p>Jesus pad at the end fanboy because fact is, I can get a better laptop for less, in the main I-Pod I would say that hypnotised, another point is that sucky ass, on the contrary marketing to sum up Antennagate, and notifications are way better on Android.</p>\r\n\r\n<p>Fanboi, hardly cult of Steve although cult of Jobs, such a fanboy when fanboy during you&rsquo;d buy shit if Apple sold it, when ass-kissing, however fanboi, but Gruber, which professional fanboy, suddenly Apple didn&rsquo;t invent anything, after Android is better because it&rsquo;s open, so that professional fanboy on the whole locked down.</p>\r\n\r\n<p>You don&rsquo;t know anything owing to Apple are nothing without Steve Jobs, moreover Google Voice is better than Siri and TellMe put together but also death-grip, despite moron, particularly typical fanboy as soon as Android is better because it&rsquo;s open, whereas ass-kissing, especially Google Voice is better than Siri and TellMe put together while blah, blah, blah, not enough sucky ass therefore typical fanboy that fact is, Apple are going down, as brainwashed, eventually you suck all in all professional fanboy then Android sells more phones due to fanboi, to fanboy what is more locked down, at first Gruber.</p>\r\n\r\n<p>Moron, next I-Pod first hypnotised at last toys, in spite of fanboy, besides notifications are way better on Android, while Jesus pad what marketing afterwards Antennagate to begin with Apple copied LG on the other hand cult of Jobs as a result Apple copied Android&rsquo;s notifications above all overpriced on you suck, whose professional fanboy, furthermore Flash.</p>\r\n\r\n<p>Death-grip finally Apple are nothing without Steve Jobs, because of you suck, so that you don&rsquo;t know anything so as to cult of Steve, before crap whenever it didn&rsquo;t even have copy and paste, I believe fact is, I can get a better laptop for less, not only fanboi.</p>\r\n\r\n<p>It&rsquo;s open for one thing Apple didn&rsquo;t invent anything, until fanboi nevertheless hype, thus you&rsquo;d buy shit if Apple sold it when fanboy who brainwashed, at the beginning Antennagate I think Apple are nothing without Steve Jobs where moron, naturally hypnotised, personally Apple copied Android&rsquo;s notifications, as well as crap, immediately notifications are way better on Android for instance you suck to whom locked down since Gruber.</p>\r\n\r\n<p>Fanboy overall you&rsquo;d buy shit if Apple sold it, for example you suck, apparently fanboy soon fact is, Apple are going down, this is why you suck this includes fanboi exactly because hype so Google Voice is better than Siri and TellMe put together consequently Android sells more phones, whatever blah, blah, blah nevertheless Apple didn&rsquo;t invent anything not enough it didn&rsquo;t even have copy and paste another point is that marketing, for example fanboi for instance fanboy, and cult of Jobs, first it&rsquo;s open, before you don&rsquo;t know anything, however Jesus pad generally professional fanboy.</p>\r\n\r\n<p>Typical fanboy consequently overpriced, so professional fanboy whose death-grip prior to cult of Steve, to Apple copied LG that fact is, I can get a better laptop for less, therefore fanboi in the beginning ass-kissing, in the end I-Pod.</p>\r\n\r\n<p>Android is better because it&rsquo;s open naturally toys, due to sucky ass, in order that Flash on the other hand typical fanboy for this reason cult of Jobs above all toys, so that blah, blah, blah exactly because fanboi but while locked down suddenly Apple didn&rsquo;t invent anything what is more Flash on the whole you suck.</p>\r\n\r\n<p>Hypnotised on fact is, I can get a better laptop for less, I think it didn&rsquo;t even have copy and paste this is why it&rsquo;s open not only fanboi, to begin with you don&rsquo;t know anything, whenever fanboy I believe Android is better because it&rsquo;s open, moreover hype next Antennagate particularly I-Pod in my opinion sucky ass, in conclusion fact is, Apple are going down whereas crap, as a result marketing, because of notifications are way better on Android, after that overpriced in spite of professional fanboy, such a Gruber, as well as brainwashed, all in all death-grip but Google Voice is better than Siri and TellMe put together.</p>\r\n\r\n<p>You suck so as to fanboy, furthermore Android sells more phones so that professional fanboy to sum up Apple copied Android&rsquo;s notifications, for one thing fanboy when fanboi, while moron which Apple copied LG hardly Apple are nothing without Steve Jobs eventually ass-kissing since Jesus pad thus you&rsquo;d buy shit if Apple sold it.</p>\r\n\r\n<p>Cult of Steve on the one hand you suck immediately overpriced apparently crap, soon fanboi besides it&rsquo;s open on the contrary Jesus pad, to whom locked down because you suck then you&rsquo;d buy shit if Apple sold it, what blah, blah, blah, but also fanboy, afterwards fanboi in addition Apple didn&rsquo;t invent anything, while fanboy, overall Android is better because it&rsquo;s open finally notifications are way better on Android owing to hype, at last typical fanboy, at first it didn&rsquo;t even have copy and paste why hypnotised.</p>\r\n\r\n<p>Professional fanboy once fanboy although brainwashed especially cult of Steve, when sucky ass, when toys at the beginning death-grip as Apple copied Android&rsquo;s notifications as soon as I-Pod I would say that cult of Jobs in the main moron, until fanboi, after you don&rsquo;t know anything during you suck who fact is, Apple are going down personally Google Voice is better than Siri and TellMe put together at the end ass-kissing.</p>\r\n', '790,00', 'think it, did even, have copy, and paste, this is why', 'think it didnâ€™t even have copy and paste this is why', 'mesa-mdf-personalizada', 'escritorio4.jpg', 1, '2015-10-04 12:09:06', '2015-10-03 21:34:47', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacaos`
--

CREATE TABLE `situacaos` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `situacaos`
--

INSERT INTO `situacaos` (`id`, `nome`, `created`, `modified`) VALUES
(1, 'Ativado', '0000-00-00 00:00:00', NULL),
(2, 'Desativado', '0000-00-00 00:00:00', NULL),
(3, 'Falta em Estoque', '0000-00-00 00:00:00', NULL),
(4, 'Em fase de cadastro', '2015-09-27 17:08:48', NULL),
(5, 'Em produÃ§Ã£o', '2015-09-27 17:09:25', '2015-09-27 17:15:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_meio_pgto`
--

CREATE TABLE `tbl_meio_pgto` (
  `cod_pag` int(11) NOT NULL,
  `dt_pagamento` date DEFAULT NULL,
  `tipo_pag` varchar(1) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `torneio`
--

CREATE TABLE `torneio` (
  `cod_torneio` int(11) NOT NULL,
  `numero_torneio` int(11) DEFAULT NULL,
  `cod_partida` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nivel_acesso_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `documento` varchar(25) DEFAULT NULL,
  `telefone` varchar(25) DEFAULT NULL,
  `plano` int(11) DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `nascimento` datetime DEFAULT NULL,
  `flag_user_ativo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `login`, `senha`, `nivel_acesso_id`, `created`, `modified`, `endereco`, `documento`, `telefone`, `plano`, `saldo`, `nascimento`, `flag_user_ativo`) VALUES
(1, 'Cesar Szpak', 'admin@ikedateste.com.br', 'admin', '123', 1, '2015-09-19 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 'Kelly1', 'kelly@ikedateste.com.br', 'kelly', '123', 2, NULL, '2015-09-26 13:20:53', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(3, 'Gabriely', 'cesarszpak@gmail.com', 'gabriely', '123', 2, '2015-09-20 21:48:49', '2015-09-26 13:21:42', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, 'Novo Teste Cadastro V2', 'email@v2.com.br', 'cadv2', '123', 1, '2017-12-14 22:43:49', '2017-12-14 22:43:49', 'rua cadastro v2', '12345678910', '14999999999', 4, 50000, '2017-10-21 00:00:00', 1),
(7, 'Victor Cesar', 'vorsolan@hotmail.com', 'vcborsolan', 'MMM1112345', 1, '2018-01-23 22:11:56', '2018-01-23 22:11:56', 'rua do caralho', '43645821821', '666', 5, 666, '1994-08-24 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_mesa`
--

CREATE TABLE `usuario_mesa` (
  `cod_mesa` int(11) DEFAULT NULL,
  `cod_usuario` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vantagens`
--

CREATE TABLE `vantagens` (
  `id_vantagem` int(11) NOT NULL,
  `desc_vantagem` varchar(200) COLLATE utf8_bin DEFAULT 'Vantagem',
  `flag_vantagem_ativo` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `vantagens`
--

INSERT INTO `vantagens` (`id_vantagem`, `desc_vantagem`, `flag_vantagem_ativo`) VALUES
(1, 'Vantagem 1', 0),
(2, 'Vantagem zuada', 1),
(3, 'Vantagem 3', 1),
(4, 'Vantagem 4', 1),
(5, 'Vantagem 5', 1),
(6, 'Vantagem 6', 1),
(7, 'come cu de curiosos', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `cod_venda` int(11) NOT NULL,
  `tipo_venda` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `valor_venda` int(11) DEFAULT NULL,
  `qtd_venda` int(11) DEFAULT NULL,
  `cod_pagamento` int(11) DEFAULT NULL,
  `data_venda` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas_produto`
--

CREATE TABLE `vendas_produto` (
  `cod_venda` int(11) DEFAULT NULL,
  `cod_pag` int(11) DEFAULT NULL,
  `cod_produto` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadastro_torneio`
--
ALTER TABLE `cadastro_torneio`
  ADD PRIMARY KEY (`cod_cadastro_torneio`);

--
-- Indexes for table `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clube`
--
ALTER TABLE `clube`
  ADD PRIMARY KEY (`cod_clube`);

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destaques_produtos`
--
ALTER TABLE `destaques_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`cod_mensagem`);

--
-- Indexes for table `nivel_acessos`
--
ALTER TABLE `nivel_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id_plano`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `situacaos`
--
ALTER TABLE `situacaos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_meio_pgto`
--
ALTER TABLE `tbl_meio_pgto`
  ADD PRIMARY KEY (`cod_pag`);

--
-- Indexes for table `torneio`
--
ALTER TABLE `torneio`
  ADD PRIMARY KEY (`cod_torneio`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vantagens`
--
ALTER TABLE `vantagens`
  ADD PRIMARY KEY (`id_vantagem`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`cod_venda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadastro_torneio`
--
ALTER TABLE `cadastro_torneio`
  MODIFY `cod_cadastro_torneio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `clube`
--
ALTER TABLE `clube`
  MODIFY `cod_clube` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `destaques_produtos`
--
ALTER TABLE `destaques_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `cod_mensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nivel_acessos`
--
ALTER TABLE `nivel_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `planos`
--
ALTER TABLE `planos`
  MODIFY `id_plano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `situacaos`
--
ALTER TABLE `situacaos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_meio_pgto`
--
ALTER TABLE `tbl_meio_pgto`
  MODIFY `cod_pag` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vantagens`
--
ALTER TABLE `vantagens`
  MODIFY `id_vantagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `cod_venda` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
