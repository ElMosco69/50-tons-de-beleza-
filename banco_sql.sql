
CREATE DATABASE IF NOT EXISTS `crud_tcc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crud_tcc`;


CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(15) NOT NULL,
  `birthdate` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  `hood` varchar(100) NOT NULL,
  `zip_code` varchar(8) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(2) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `ie` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE IF NOT EXISTS funcionarios (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Nome varchar(50) NOT NULL,
  Setor varchar(50) NOT NULL,
  Cargo varchar(20) NOT NULL,
  DataNasc datetime NOT NULL,
  Foto varchar(30) NOT NULL,
	created datetime NOT NULL,
  modified datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6;

--
-- Extraindo dados da tabela `customers`
--

INSERT INTO `customers` (`id`, `name`, `cpf_cnpj`, `birthdate`, `address`, `hood`, `zip_code`, `city`, `state`, `phone`, `mobile`, `ie`, `created`, `modified`) VALUES
(1, 'Fulano de Tal', '123.456.789-00', '1989-01-01 00:00:00', 'Rua da Web, 123', 'Internet', '12345678', 'Teste', 'Te', '15 12345678', '15987654321', '123456', '2016-05-24 00:00:00', '2016-05-24 00:00:00'),
(2, 'Ciclano de Tal', '123.456.789-00', '1989-01-01 00:00:00', 'Rua da Web, 123', 'Internet', '12345678', 'Teste', 'Te', '15 12345678', '15987654321', '123456', '2016-05-24 00:00:00', '2016-05-24 00:00:00');


INSERT INTO funcionarios (Nome, Setor, Cargo, DataNasc, Foto, created, modified) VALUES
('Rogerio', 'Pesquisas', 'Biologo', '1985-04-30 00:00:00', '', '2025-08-28 12:05:00', '2025-08-28 12:05:00');



--
-- Índices para tabela `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);



--
-- AUTO_INCREMENT de tabela `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- Script para criar e cadastrar na tabela usuários (execute no banco do projeto):
CREATE TABLE usuarios(
    id int AUTO_INCREMENT not null PRIMARY KEY,
    nome varchar(50) not null,
    user varchar(50) not null,
    password varchar(100) not null,
    foto varchar(50),
    role varchar(20) DEFAULT 'user'
);

INSERT INTO `usuarios`(`nome`, `user`, `password`, `role`) 
VALUES 

('Luis Bruno Aura','luisbrunoaura','$2y$13$ujaaGvTVTmxLX/pYvz15UewLv0YIMcDgVGdaZ5b9MqnFzbvTMtp7S','admin'),
('Zé Lele','zelele','5243897562837456982','user'),
('Mary Zica','mazi','786098767869','user'),
('Fugiru Nakombi','fugina','623485634753234','user');

-- PRODUTOS-DA--GIGI  

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `Imagem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `produtos` (`nome`, `descricao`, `preco`, `quantidade`, `created`, `modified`, `Imagem`) VALUES
('Produto 1', 'Descrição do Produto 1', 19.99, 10,'2024-06-01 10:00:00', '2024-06-01 10:00:00', ''),
('Produto 2', 'Descrição do Produto 2', 29.99, 5, '2024-06-01 10:00:00', '2024-06-01 10:00:00', ''),
('Produto 3', 'Descrição do Produto 3', 9.99, 20, '2024-06-01 10:00:00', '2024-06-01 10:00:00', ''),
('Produto 4', 'Descrição do Produto 4', 14.99, 15, '2024-06-01 10:00:00', '2024-06-01 10:00:00', ''),
('Produto 5', 'Descrição do Produto 5', 24.99, 8, '2024-06-01 10:00:00', '2024-06-01 10:00:00', '');


-- TABELA PARA AVISOS-FEITA PARA TESTE- GIOVANNA ESTEVE AQUI-

CREATE TABLE IF NOT EXISTS `avisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `foto` varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `avisos` (`titulo`, `descricao`, `created`, `modified`, `foto`) VALUES
('Teste de Aviso', 'Este é um aviso de teste para verificar a funcionalidade de avisos no sistema.', '2024-06-01 10:00:00', '2024-06-01 10:00:00', '');

COMMIT;

