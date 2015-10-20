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
-- Table structure for table `anual`
--

DROP TABLE IF EXISTS `anual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anual` (
  `tarefa_id` int(10) unsigned NOT NULL,
  `dia_id` int(10) unsigned NOT NULL,
  `mes_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tarefa_id`),
  KEY `fk_anual_tarefa1_idx` (`tarefa_id`),
  KEY `fk_anual_dia1_idx` (`dia_id`),
  KEY `fk_anual_mes1_idx` (`mes_id`),
  CONSTRAINT `fk_anual_dia1` FOREIGN KEY (`dia_id`) REFERENCES `dia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_anual_mes1` FOREIGN KEY (`mes_id`) REFERENCES `mes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_anual_tarefa1` FOREIGN KEY (`tarefa_id`) REFERENCES `tarefa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anual`
--

LOCK TABLES `anual` WRITE;
/*!40000 ALTER TABLE `anual` DISABLE KEYS */;
INSERT INTO `anual` VALUES (8,1,1);
/*!40000 ALTER TABLE `anual` ENABLE KEYS */;
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
-- Table structure for table `dia`
--

DROP TABLE IF EXISTS `dia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dia` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dia`
--

LOCK TABLES `dia` WRITE;
/*!40000 ALTER TABLE `dia` DISABLE KEYS */;
INSERT INTO `dia` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10),(11,11),(12,12),(13,13),(14,14),(15,15),(16,16),(17,17),(18,18),(19,19),(20,20),(21,21),(22,22),(23,23),(24,24),(25,25),(26,26),(27,27),(28,28),(29,29),(30,30),(31,31);
/*!40000 ALTER TABLE `dia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dia_quinzenal`
--

DROP TABLE IF EXISTS `dia_quinzenal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dia_quinzenal` (
  `dia_id` int(10) unsigned NOT NULL,
  `quinzenal_tarefa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`dia_id`,`quinzenal_tarefa_id`),
  KEY `fk_dia_has_quinzenal_quinzenal1_idx` (`quinzenal_tarefa_id`),
  KEY `fk_dia_has_quinzenal_dia1_idx` (`dia_id`),
  CONSTRAINT `fk_dia_has_quinzenal_dia1` FOREIGN KEY (`dia_id`) REFERENCES `dia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_dia_has_quinzenal_quinzenal1` FOREIGN KEY (`quinzenal_tarefa_id`) REFERENCES `quinzenal` (`tarefa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dia_quinzenal`
--

LOCK TABLES `dia_quinzenal` WRITE;
/*!40000 ALTER TABLE `dia_quinzenal` DISABLE KEYS */;
INSERT INTO `dia_quinzenal` VALUES (2,6),(17,6);
/*!40000 ALTER TABLE `dia_quinzenal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diaria`
--

DROP TABLE IF EXISTS `diaria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diaria` (
  `tarefa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tarefa_id`),
  KEY `fk_daria_tarefa1_idx` (`tarefa_id`),
  CONSTRAINT `fk_daria_tarefa1` FOREIGN KEY (`tarefa_id`) REFERENCES `tarefa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diaria`
--

LOCK TABLES `diaria` WRITE;
/*!40000 ALTER TABLE `diaria` DISABLE KEYS */;
/*!40000 ALTER TABLE `diaria` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` VALUES (3,'MiguelMartinsDias@dayrep.com',5),(4,'MiguelMartinsDias@dayrep.com',6),(5,'GustavoSousaLima@rhyta.com',7),(6,'AliceCunhaSousa@jourrapide.com',8),(7,'AntonioRochaFerreira@teleworm.us',9),(8,'FernandaGoncalvesFerreira@dayrep.com',10),(9,'DiegoFerreiraCavalcanti@jourrapide.com',11),(11,'pamela_boyce@gmail.com',12),(12,'outro_email@msn.com',12),(13,'gersoncarneiro@msn.com',1),(14,'gerson.carneiro.de.souza@gmail.com',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,1,'Rua Pedro Piolly dos Santos','287','3L',2),(2,2,'Desp','123','De',4),(3,5,'Rua Irece','1186','Contagem',4),(4,6,'Rua Irece','1186','Contagem',4),(5,7,'Rua Santa Luzia','1649','Itabuna',2),(6,8,'Rua Sapucaia','1359','Aparecida',3),(7,9,'Rua São Valentim','1546','Join',3),(8,10,'Rua Boqueirão','1442','Campo Grande',3),(9,11,'Avenida Gonçalves','916','Salvador',1),(10,12,'Kimberly Way','741','Kansas',3);
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
  `setor_id` int(10) unsigned NOT NULL,
  `pessoa_fisica_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pessoa_fisica_id`),
  KEY `fk_funcionario_setor1_idx` (`setor_id`),
  KEY `fk_funcionario_pessoa_fisica1_idx` (`pessoa_fisica_id`),
  CONSTRAINT `fk_funcionario_pessoa_fisica1` FOREIGN KEY (`pessoa_fisica_id`) REFERENCES `pessoa_fisica` (`pessoa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_setor1` FOREIGN KEY (`setor_id`) REFERENCES `setor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES ('5346346436',1,1),('5435436436',2,2),('23535325353',3,6),('4643646464',3,7),('4364436434',3,8),('365476358475475',4,9),('563754867574367',5,10),('469895074684368',6,11),('576584674364575',1,12);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario_tarefa`
--

DROP TABLE IF EXISTS `funcionario_tarefa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario_tarefa` (
  `tarefa_id` int(11) NOT NULL,
  `funcionario_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tarefa_id`,`funcionario_id`),
  KEY `fk_funcionario_has_tarefa_tarefa1_idx` (`tarefa_id`),
  KEY `fk_funcionario_tarefa_funcionario1_idx` (`funcionario_id`),
  CONSTRAINT `fk_funcionario_has_tarefa_tarefa1` FOREIGN KEY (`tarefa_id`) REFERENCES `tarefa_empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcionario_tarefa_funcionario1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`pessoa_fisica_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario_tarefa`
--

LOCK TABLES `funcionario_tarefa` WRITE;
/*!40000 ALTER TABLE `funcionario_tarefa` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario_tarefa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerente`
--

DROP TABLE IF EXISTS `gerente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gerente` (
  `data_inicio` date NOT NULL,
  `data_final` date DEFAULT NULL,
  `funcionario_id` int(10) unsigned NOT NULL,
  `setor_id` int(10) unsigned NOT NULL,
  `status` enum('ativo','inativo') NOT NULL DEFAULT 'ativo',
  KEY `fk_gerente_funcionario1_idx` (`funcionario_id`),
  KEY `fk_gerente_setor1_idx` (`setor_id`),
  CONSTRAINT `fk_gerente_funcionario1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionario` (`pessoa_fisica_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_gerente_setor1` FOREIGN KEY (`setor_id`) REFERENCES `setor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerente`
--

LOCK TABLES `gerente` WRITE;
/*!40000 ALTER TABLE `gerente` DISABLE KEYS */;
INSERT INTO `gerente` VALUES ('2014-10-17','2015-10-15',1,1,'inativo'),('2013-03-06','2014-10-17',2,1,'inativo'),('2015-10-15','2015-10-15',1,1,'inativo'),('2015-10-15','2015-10-15',2,2,'inativo'),('2015-10-15','0000-00-00',1,1,'ativo'),('2015-10-15','0000-00-00',8,3,'ativo'),('2015-10-15','0000-00-00',2,2,'ativo'),('2015-10-15','0000-00-00',9,4,'ativo'),('2015-10-15','0000-00-00',10,5,'ativo'),('2015-10-15','2015-10-16',11,6,'inativo'),('2015-10-16',NULL,11,6,'ativo');
/*!40000 ALTER TABLE `gerente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensal`
--

DROP TABLE IF EXISTS `mensal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensal` (
  `tarefa_id` int(10) unsigned NOT NULL,
  `dia_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tarefa_id`),
  KEY `fk_mensal_tarefa1_idx` (`tarefa_id`),
  KEY `fk_mensal_dia1_idx` (`dia_id`),
  CONSTRAINT `fk_mensal_dia1` FOREIGN KEY (`dia_id`) REFERENCES `dia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mensal_tarefa1` FOREIGN KEY (`tarefa_id`) REFERENCES `tarefa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensal`
--

LOCK TABLES `mensal` WRITE;
/*!40000 ALTER TABLE `mensal` DISABLE KEYS */;
INSERT INTO `mensal` VALUES (4,13);
/*!40000 ALTER TABLE `mensal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mes`
--

DROP TABLE IF EXISTS `mes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mes` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mes`
--

LOCK TABLES `mes` WRITE;
/*!40000 ALTER TABLE `mes` DISABLE KEYS */;
INSERT INTO `mes` VALUES (1,'Janeiro'),(2,'Fevereiro'),(3,'Março'),(4,'Abril'),(5,'Maio'),(6,'Junho'),(7,'Julho'),(8,'Agosto'),(9,'Setembro'),(10,'Outubro'),(11,'Novembro'),(12,'Dezembro');
/*!40000 ALTER TABLE `mes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mes_semestral`
--

DROP TABLE IF EXISTS `mes_semestral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mes_semestral` (
  `mes_id` int(10) unsigned NOT NULL,
  `semestral_tarefa_id` int(10) unsigned NOT NULL,
  `dia_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`semestral_tarefa_id`,`mes_id`,`dia_id`),
  KEY `fk_mes_has_semestral_semestral1_idx` (`semestral_tarefa_id`),
  KEY `fk_mes_has_semestral_mes1_idx` (`mes_id`),
  KEY `fk_mes_semestral_dia1_idx` (`dia_id`),
  CONSTRAINT `fk_mes_has_semestral_mes1` FOREIGN KEY (`mes_id`) REFERENCES `mes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mes_has_semestral_semestral1` FOREIGN KEY (`semestral_tarefa_id`) REFERENCES `semestral` (`tarefa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mes_semestral_dia1` FOREIGN KEY (`dia_id`) REFERENCES `dia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mes_semestral`
--

LOCK TABLES `mes_semestral` WRITE;
/*!40000 ALTER TABLE `mes_semestral` DISABLE KEYS */;
INSERT INTO `mes_semestral` VALUES (2,7,3),(8,7,3);
/*!40000 ALTER TABLE `mes_semestral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimento`
--

DROP TABLE IF EXISTS `movimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `tempo_gasto` time NOT NULL,
  `percentual` decimal(10,0) NOT NULL,
  `tarefa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_movimento_tarefa1_idx` (`tarefa_id`),
  CONSTRAINT `fk_movimento_tarefa1` FOREIGN KEY (`tarefa_id`) REFERENCES `tarefa_empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimento`
--

LOCK TABLES `movimento` WRITE;
/*!40000 ALTER TABLE `movimento` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimento` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (1,'Gerson Carneiro de Souza'),(2,'Junko Enoshima'),(3,'Empresa 1'),(4,'Empresa 1-A'),(5,'Miguel Martins Dias'),(6,'Miguel Martins Dias'),(7,'Gustavo Sousa Lima'),(8,'Alice Cunha Sousa'),(9,'Antônio Rocha Ferreira'),(10,'Fernanda Goncalves Ferreira'),(11,'Diego Ferreira Cavalcanti'),(12,'Pamela J. Boyce');
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
INSERT INTO `pessoa_fisica` VALUES (1,'547.548.548-65','75665868'),(2,'335.454.364-36','646546546456'),(5,'306.215.131-56','32523532535'),(6,'306.215.131-56','55352353535'),(7,'428.450.816-42','35436466346'),(8,'757.649.392-59','454364364364'),(9,'354.364.364-74','475475464364'),(10,'754.756.865-75','548564379678'),(11,'458.934.789-47','487684378476'),(12,'464.765.754-75','547687547456');
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
INSERT INTO `pessoa_juridica` VALUES (3,'75.896.876/896-05','78690890',NULL,1),(4,'55.876.907/080-79','87070986',3,1);
/*!40000 ALTER TABLE `pessoa_juridica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quinzenal`
--

DROP TABLE IF EXISTS `quinzenal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quinzenal` (
  `tarefa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tarefa_id`),
  KEY `fk_quinzenal_tarefa1_idx` (`tarefa_id`),
  CONSTRAINT `fk_quinzenal_tarefa1` FOREIGN KEY (`tarefa_id`) REFERENCES `tarefa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quinzenal`
--

LOCK TABLES `quinzenal` WRITE;
/*!40000 ALTER TABLE `quinzenal` DISABLE KEYS */;
INSERT INTO `quinzenal` VALUES (6);
/*!40000 ALTER TABLE `quinzenal` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regime_tributario`
--

LOCK TABLES `regime_tributario` WRITE;
/*!40000 ALTER TABLE `regime_tributario` DISABLE KEYS */;
INSERT INTO `regime_tributario` VALUES (1,'Lucro Real','É a base de cálculo do imposto sobre a renda apurada segundo registros contábeis e fiscais efetuados sistematicamente de acordo com as leis comerciais e fiscais. A apuração do lucro real é feita na parte A do Livro de Apuração do Lucro Real, mediante adições e exclusões ao lucro líquido do período de apuração (trimestral ou anual) do imposto e compensações de prejuízos fiscais autorizadas pela legislação do imposto de renda, de acordo com as determinações contidas na Instrução Normativa SRF nº 28, de 1978, e demais atos legais e infralegais posteriores.'),(2,'Lucro Presumido','O Lucro Presumido é a forma de tributação simplificada do Imposto de Renda das Pessoas Jurídicas (IRPJ) e Contribuição Social sobre o Lucro (CSLL).');
/*!40000 ALTER TABLE `regime_tributario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semestral`
--

DROP TABLE IF EXISTS `semestral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semestral` (
  `tarefa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tarefa_id`),
  KEY `fk_semestral_tarefa1_idx` (`tarefa_id`),
  CONSTRAINT `fk_semestral_tarefa1` FOREIGN KEY (`tarefa_id`) REFERENCES `tarefa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semestral`
--

LOCK TABLES `semestral` WRITE;
/*!40000 ALTER TABLE `semestral` DISABLE KEYS */;
INSERT INTO `semestral` VALUES (7);
/*!40000 ALTER TABLE `semestral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setor`
--

DROP TABLE IF EXISTS `setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setor`
--

LOCK TABLES `setor` WRITE;
/*!40000 ALTER TABLE `setor` DISABLE KEYS */;
INSERT INTO `setor` VALUES (1,'Administração','Setor de administração'),(2,'Recepção','Setor de recepção'),(3,'D.P.','Setor de Departamento Pessoal'),(4,'Fiscal','Setor fiscal'),(5,'Contábil','Setor contábil'),(6,'Tributário','Setor tributário');
/*!40000 ALTER TABLE `setor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarefa`
--

DROP TABLE IF EXISTS `tarefa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarefa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) DEFAULT NULL,
  `descricao` text,
  `tipo` enum('global','pessoal') NOT NULL COMMENT 'Global: tarefa geral que será replicada para diversos  funcionarios.\npesssoal: tarefa gerada de usuário para usuaário.',
  `regime_tributario_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_tarefa_regime_tributario1_idx` (`regime_tributario_id`),
  CONSTRAINT `fk_tarefa_regime_tributario1` FOREIGN KEY (`regime_tributario_id`) REFERENCES `regime_tributario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarefa`
--

LOCK TABLES `tarefa` WRITE;
/*!40000 ALTER TABLE `tarefa` DISABLE KEYS */;
INSERT INTO `tarefa` VALUES (1,'Tarefa Diaria 1','Tarefa Diária','global',1),(2,'Tarefa Pessoal','Tarefa pessoal','pessoal',NULL),(4,'Tarefa Mensal','Mensal','global',2),(6,'Tarefa Quinzenal','Quinzenal','global',2),(7,'Tarefa Semestral','Semestral','global',1),(8,'Tarefa Anual','Anual','global',1);
/*!40000 ALTER TABLE `tarefa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarefa_empresa`
--

DROP TABLE IF EXISTS `tarefa_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarefa_empresa` (
  `id` int(11) NOT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  `tempo_estimado` time NOT NULL,
  `setor_id` int(10) unsigned DEFAULT NULL,
  `status` enum('pendente','finalizado','cancelado') NOT NULL DEFAULT 'pendente',
  `empresa_id` int(10) unsigned NOT NULL,
  `tarefa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tarefa_setor1_idx` (`setor_id`),
  KEY `fk_tarefa_pessoa_juridica1_idx` (`empresa_id`),
  KEY `fk_tarefa_empresa_tarefa1_idx` (`tarefa_id`),
  CONSTRAINT `fk_tarefa_empresa_tarefa1` FOREIGN KEY (`tarefa_id`) REFERENCES `tarefa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarefa_pessoa_juridica1` FOREIGN KEY (`empresa_id`) REFERENCES `pessoa_juridica` (`pessoa_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarefa_setor1` FOREIGN KEY (`setor_id`) REFERENCES `setor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarefa_empresa`
--

LOCK TABLES `tarefa_empresa` WRITE;
/*!40000 ALTER TABLE `tarefa_empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarefa_empresa` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefone`
--

LOCK TABLES `telefone` WRITE;
/*!40000 ALTER TABLE `telefone` DISABLE KEYS */;
INSERT INTO `telefone` VALUES (1,51,'98864519','celular',1),(2,45,'34545454','comercial',2),(4,51,'46432178','residencial',5),(5,51,'5885868688','residencial',6),(6,51,'978769679','celular',7),(7,51,'9686767867','celular',8),(8,51,'9568786585','residencial',9),(9,51,'98565757','celular',10),(10,51,'9769876976','celular',11),(11,51,'99986898','celular',1),(12,51,'35433111','residencial',1),(13,51,'978686866','celular',12),(14,51,'5355464374','comercial',12);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'ativo','f0fa25a3aa1d9e2cac08fcc08e40d8d8',NULL,1),(2,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,2),(3,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,5),(4,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,6),(5,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,7),(6,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,8),(7,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,9),(8,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,10),(9,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,11),(10,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,12);
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

-- Dump completed on 2015-10-20 14:14:56
