-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27/05/2025 às 23:39
-- Versão do servidor: 5.7.24
-- Versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnh` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `cnh`, `rg`, `telefone`, `endereco`, `estado`, `email`, `genero`, `senha`) VALUES
(20, 'Lucas', '12345678901', '123456789', '123456789', '123456789', 'Rua teste', 'RS', 'lucasteste@gmail.com', 'masculino', '123456'),
(19, 'Raul', '12345678901', '123456789', '123456789', '123456789', 'Rua teste', 'RJ', 'raulteste@gmail.com', 'masculino', '123456'),
(21, 'Vinicius', '12345678901', '123456789', '123456789', '123456789', 'Rua teste', 'RS', 'viniciustesters@gmail.com', 'masculino', '123456'),
(22, 'Pedro', '12345678901', '123456789', '123456789', '123456789', 'Rua teste', 'RS', 'pedroteste@gmail.com', 'masculino', '123456'),
(23, 'Kawe', '12345678901', '123456789', '123456789', '123456789', 'Rua teste', 'RS', 'kaweteste@gmail.com', 'masculino', '123456'),
(24, 'Maria Julia', '12345678901', '123456789', '123456789', '123456789', 'Rua teste', 'RS', 'mariajulia@gmail.com', 'feminino', '123456');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `cpf`, `email`, `senha`) VALUES
(8, 'Maria Julia', '12345678901', 'mariajulia@gmail.com', '123456'),
(7, 'Vinicius', '12345678901', 'viniciusteste@gmail.com', '123456'),
(3, 'Lucas', '12345678901', 'lucasteste@gmail.com', '123456'),
(4, 'Pedro', '12345678901', 'pedroteste@gmail.com', '123456'),
(5, 'Kawe', '12345678901', 'kaweteste@gmail.com', '123456'),
(6, 'Raul', '12345678901', 'raulteste@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculo`
--

DROP TABLE IF EXISTS `veiculo`;
CREATE TABLE IF NOT EXISTS `veiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `km` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chassi` varchar(17) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cor` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renavam` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto6` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto7` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto8` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto9` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto10` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `veiculo`
--

INSERT INTO `veiculo` (`id`, `placa`, `km`, `ano`, `chassi`, `cor`, `tipo`, `renavam`, `nome`, `preco`, `foto`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`, `foto7`, `foto8`, `foto9`, `foto10`) VALUES
(8, '3e4s333', '27000', '2020', '9BWZZZ377VT0042', 'Azul-Preto', '', '32423er3212', 'SUZUKI GSX 1000', '63.980,00', 'suzuki-gsxs1000a-abs-wmimagem1910503876.jpg', '', '', '', '', '', '', '', '', ''),
(9, 'XYZ9K88', '16.800', '2021', '93HFG1260KZ0009', 'PRETO', 'moto', '987654321', 'HONDA XRE 300', '27.000,00', 'honda-xre-300-abs-wmimagem08283392847.jpg', '', '', '', '', '', '', '', '', ''),
(10, 'JKL4R56', '50.535', '2011', '8APZZZ000GS1234', 'PRETO', 'moto', '102938475', 'HONDA HORNET 600', '38.990,00', 'honda-cb-600f-hornet-wmimagem12594807846.jpg', '', '', '', '', '', '', '', '', ''),
(11, 'RST2M34', '15.000', '2020', '93XYZ0000HT1122', 'AZUL', 'moto', '837465928', 'YAMAHA MT-09', '50.990,00', 'yamaha-mt09-wmimagem17323007548.webp', '', '', '', '', '', '', '', '', ''),
(12, 'DEF5Q22', '320', '2023', '9GHZZZ88RFT556644', 'PRETO-VERDE', 'moto', '77889900121', 'KAWASAKI Z 900', '58.800,00', 'kawasaki-z900-wmimagem13230215364.jpg', '', '', '', '', '', '', '', '', ''),
(13, 'PQR1V77', '12.757', '2020', '239CVZZZ55LP09887', 'AZUL-BRANCO', 'moto', '33221144556', 'BMW R 1250 GS', '92.500,00', 'bmw-r-1250-gs-adventure-premium-wmimagem1918490378.jpg', '', '', '', '', '', '', '', '', ''),
(14, 'LMN3T55', '24.000', '2022', '8TRZZZ16XD1233210', 'PRETO-VERDE', 'moto', '44556677889', 'TRIUMPH TIGER 1200', '86.990,00', 'triumph-tiger-1200-rally-explorer-wmimagem20164864273.jpg', '', '', '', '', '', '', '', '', ''),
(15, 'QWE2A11', '130', '2024', '9BWZZZ37ZVP045631', 'VERMELHA', 'moto', '14598273610', 'BMW S 1000 RR', '115.900', 's1000rr.jpg', '', '', '', '', '', '', '', '', ''),
(16, 'YHG8M23', '9.000', '2022', '93HFA2160LZ124785', 'AZUL-PRETO', 'moto', '21837465902', 'HONDA CG 160 TITAN', '18.000', 'honda-cg-160-titan-wmimagem16055123238.webp', '', '', '', '', '', '', '', '', ''),
(17, 'BGV2F31', '0', '2025', '9BWZZZ377VT004251', 'Prata', 'carro', '12456987301', 'CHEVROLET S10', '299.900', 's10.jpg', '', '', '', '', '', '', '', '', ''),
(18, 'DTX9A45', '101.000', '2018', '8AGHP56S0KL147925', 'Branco', 'carro', '90876321456', 'VOLKSWAGEN PASSAT', '126.900', 'passat.webp', '', '', '', '', '', '', '', '', ''),
(19, 'CGH3K72', '47.000', '2019', '93YBC12F8NZ993411', 'Branco', 'carro', '34789216540', 'VOLKSWAGEN GOLF', '209.900', 'golf.webp', '', '', '', '', '', '', '', '', ''),
(20, 'FYR5H91', '47.000', '2022', '1HGCM82633A123456', 'CInza', 'carro', '12345098765', 'VOLKSWAGEN JETTA', '199.900', 'jetta.jpg', '', '', '', '', '', '', '', '', ''),
(21, 'GZW6E24', '150.000', '2026', '2G1WT58K679203848', 'Branco', 'carro', '87654321098', 'VOLKSWAGEN GOL', '25.000,00', 'volkswagen-gol-1.6-mi-8v-gasolina-2p-manual-wmimagem18413029292.jpg', '', '', '', '', '', '', '', '', ''),
(22, 'HTL1J53', '80.000', '2018', '4T1BF1FK0GU253489', '56789123450', 'carro', '56789123450', 'VOLKSWAGEN GOL', '57.000,00', 'volkswagen-gol-1.0-12v-mpi-totalflex-trendline-4p-manual-wmimagem18032299620.jpg', '', '', '', '', '', '', '', '', ''),
(23, 'JKM2M19', '90.000', '1996', '5J6RM4H73CL092438', 'Vermelho', 'carro', '10293847561', 'CHEVROLET OMEGA', '25.222', 'chevrolet-omega-3-0-mpfi-cd-12v-gasolina-4p-manual-wmimagem11341078776.webp', '', '', '', '', '', '', '', '', ''),
(24, 'LRA4D86', '153.000', '1975', '1FTFW1EF1EFC56784', 'Marrom', 'carro', '91827364509', 'VOLKSWAGEM FUSCA', '30.000', 'volkswagen-fusca-1.3-l-8v-gasolina-2p-manual-wmimagem19041156287.jpg', '', '', '', '', '', '', '', '', ''),
(25, 'MDX7T34', '240.000', '1975', 'JHMCM56557C011234', 'Preto', 'carro', '30495816273', 'CHEVROLET DIPLOMATA', '27.000', 'chevrolet-opala-4.1-diplomata-12v-gasolina-2p-manual-wmimagem18443856881.jpg', '', '', '', '', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
