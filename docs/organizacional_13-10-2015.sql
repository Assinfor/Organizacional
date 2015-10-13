CREATE DATABASE  IF NOT EXISTS `organizacional` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `organizacional`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: organizacional
-- ------------------------------------------------------
-- Server version	5.6.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `pessoa_id` int(10) unsigned NOT NULL,
  `status` enum('ativo','inativo') NOT NULL DEFAULT 'ativo',
  PRIMARY KEY (`pessoa_id`),
  CONSTRAINT `fk_admin_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'ativo');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidade` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
INSERT INTO `cidade` VALUES (1,'Três Coroas','RS'),(2,'Parobé','RS'),(3,'Taquara','RS'),(4,'Igrejinha','RS');
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(90) DEFAULT NULL,
  `pessoa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_email_pessoa1_idx` (`pessoa_id`),
  CONSTRAINT `fk_email_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` VALUES (1,'gersoncarneiro@msn.com',1),(7,'je@gmail',52);
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(10) unsigned NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(40) DEFAULT NULL,
  `cidade_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_endereco_pessoa1_idx` (`pessoa_id`),
  KEY `fk_endereco_cidade1_idx` (`cidade_id`),
  CONSTRAINT `fk_endereco_cidade1` FOREIGN KEY (`cidade_id`) REFERENCES `cidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_endereco_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,1,'Rua Pedro Piolly dos Santos','287','3L',1),(46,52,'Desp','123','De',4);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `clt` varchar(20) DEFAULT NULL,
  `pessoa_fisica_pessoa_id` int(10) unsigned NOT NULL,
  `pis` varchar(45) NOT NULL,
  `setor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pessoa_fisica_pessoa_id`),
  KEY `fk_funcionario_pessoa_fisica1_idx` (`pessoa_fisica_pessoa_id`),
  CONSTRAINT `fk_funcionario_pessoa_fisica1` FOREIGN KEY (`pessoa_fisica_pessoa_id`) REFERENCES `pessoa_fisica` (`pessoa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES ('5346346436',1,'68679658568',2),('5435436436',52,'46464636643',12);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (1,'Gerson Carneiro de Souza'),(52,'Junko Enoshima'),(53,'Empresa 1'),(54,'Empresa 1-A');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa_fisica`
--

DROP TABLE IF EXISTS `pessoa_fisica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_fisica` (
  `pessoa_id` int(10) unsigned NOT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `rg` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`pessoa_id`),
  CONSTRAINT `fk_pessoa_fisica_pessoa` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_fisica`
--

LOCK TABLES `pessoa_fisica` WRITE;
/*!40000 ALTER TABLE `pessoa_fisica` DISABLE KEYS */;
INSERT INTO `pessoa_fisica` VALUES (1,'56547547','75665868'),(52,'335.454.364-36','646546546456');
/*!40000 ALTER TABLE `pessoa_fisica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa_juridica`
--

DROP TABLE IF EXISTS `pessoa_juridica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_juridica` (
  `pessoa_id` int(10) unsigned NOT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `ie` varchar(45) DEFAULT NULL,
  `matriz_id` int(10) unsigned DEFAULT NULL,
  `regime_tributario_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pessoa_id`),
  KEY `fk_pessoa_juridica_pessoa_juridica1_idx` (`matriz_id`),
  KEY `fk_pessoa_juridica_regime_tributario1_idx` (`regime_tributario_id`),
  CONSTRAINT `fk_pessoa_juridica_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoa_juridica_pessoa_juridica1` FOREIGN KEY (`matriz_id`) REFERENCES `pessoa_juridica` (`pessoa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pessoa_juridica_regime_tributario1` FOREIGN KEY (`regime_tributario_id`) REFERENCES `regime_tributario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_juridica`
--

LOCK TABLES `pessoa_juridica` WRITE;
/*!40000 ALTER TABLE `pessoa_juridica` DISABLE KEYS */;
INSERT INTO `pessoa_juridica` VALUES (53,'436743896798','385637564778',NULL,1),(54,'84789436789','48674389674389',53,1);
/*!40000 ALTER TABLE `pessoa_juridica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regime_tributario`
--

DROP TABLE IF EXISTS `regime_tributario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regime_tributario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regime_tributario`
--

LOCK TABLES `regime_tributario` WRITE;
/*!40000 ALTER TABLE `regime_tributario` DISABLE KEYS */;
INSERT INTO `regime_tributario` VALUES (1,'Lucro Real','É a base de cálculo do imposto sobre a renda apurada segundo registros contábeis e fiscais efetuados sistematicamente de acordo com as leis comerciais e fiscais. A apuração do lucro real é feita na parte A do Livro de Apuração do Lucro Real, mediante adições e exclusões ao lucro líquido do período de apuração (trimestral ou anual) do imposto e compensações de prejuízos fiscais autorizadas pela legislação do imposto de renda, de acordo com as determinações contidas na Instrução Normativa SRF nº 28, de 1978, e demais atos legais e infralegais posteriores.');
/*!40000 ALTER TABLE `regime_tributario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setor`
--

DROP TABLE IF EXISTS `setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setor`
--

LOCK TABLES `setor` WRITE;
/*!40000 ALTER TABLE `setor` DISABLE KEYS */;
INSERT INTO `setor` VALUES (1,'Setor AB','Esse é o setor AB'),(2,'Setor BC','Este é o setor BC.'),(3,'Setor C','Este é o Setor C'),(4,'Setor D','Este é o setor D'),(5,'Setor E','Este é o setor E'),(6,'Setor F','Este é o setor F'),(7,'Setor G','Este é o setor G'),(8,'Setor H','Este é o setor H'),(9,'Setor I','Este é o setor I'),(10,'Setor J','Este é o setor J'),(11,'Setor K','Este é o setor K'),(12,'Setor AJH','Este é o setor AJH');
/*!40000 ALTER TABLE `setor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefone`
--

DROP TABLE IF EXISTS `telefone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefone` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ddd` int(11) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `tipo` enum('comercial','residencial','celular') NOT NULL,
  `pessoa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_telefone_pessoa1_idx` (`pessoa_id`),
  CONSTRAINT `fk_telefone_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefone`
--

LOCK TABLES `telefone` WRITE;
/*!40000 ALTER TABLE `telefone` DISABLE KEYS */;
INSERT INTO `telefone` VALUES (1,51,'98864519','celular',1),(17,45,'34545454','comercial',52),(18,51,'887997977','celular',52);
/*!40000 ALTER TABLE `telefone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('ativo','inativo') DEFAULT 'ativo',
  `senha` varchar(45) DEFAULT NULL,
  `validador` varchar(45) DEFAULT NULL,
  `pessoa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_usuario_pessoa1_idx` (`pessoa_id`),
  CONSTRAINT `fk_usuario_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'ativo','f0fa25a3aa1d9e2cac08fcc08e40d8d8',NULL,1),(9,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,52);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-13 16:59:32
