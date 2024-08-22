create database cadastro;
use cadastro;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `created`, `modified`) VALUES
(1, 'Miguel', 'migdm@gmail.com.br', '2017-11-12 22:35:47', NULL);


ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);
 
 
 ALTER TABLE `cadastro`.`usuarios` 
CHANGE COLUMN `id` `id` INT NOT NULL AUTO_INCREMENT ;