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
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'ativo');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `anual`
--

LOCK TABLES `anual` WRITE;
/*!40000 ALTER TABLE `anual` DISABLE KEYS */;
/*!40000 ALTER TABLE `anual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
INSERT INTO `cidade` VALUES (1,'Três Coroas','RS'),(2,'Parobé','RS'),(3,'Taquara','RS'),(4,'Igrejinha','RS');
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dia`
--

LOCK TABLES `dia` WRITE;
/*!40000 ALTER TABLE `dia` DISABLE KEYS */;
/*!40000 ALTER TABLE `dia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dia_quinzenal`
--

LOCK TABLES `dia_quinzenal` WRITE;
/*!40000 ALTER TABLE `dia_quinzenal` DISABLE KEYS */;
/*!40000 ALTER TABLE `dia_quinzenal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `diaria`
--

LOCK TABLES `diaria` WRITE;
/*!40000 ALTER TABLE `diaria` DISABLE KEYS */;
/*!40000 ALTER TABLE `diaria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` VALUES (1,'gersoncarneiro@msn.com',1),(2,'je@gmail',2),(3,'MiguelMartinsDias@dayrep.com',5),(4,'MiguelMartinsDias@dayrep.com',6),(5,'GustavoSousaLima@rhyta.com',7),(6,'AliceCunhaSousa@jourrapide.com',8),(7,'AntonioRochaFerreira@teleworm.us',9),(8,'FernandaGoncalvesFerreira@dayrep.com',10),(9,'DiegoFerreiraCavalcanti@jourrapide.com',11);
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,1,'Rua Pedro Piolly dos Santos','287','3L',1),(2,2,'Desp','123','De',4),(3,5,'Rua Irece','1186','Contagem',4),(4,6,'Rua Irece','1186','Contagem',4),(5,7,'Rua Santa Luzia','1649','Itabuna',2),(6,8,'Rua Sapucaia','1359','Aparecida',3),(7,9,'Rua São Valentim','1546','Join',3),(8,10,'Rua Boqueirão','1442','Campo Grande',3),(9,11,'Avenida Gonçalves','916','Salvador',1);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES ('5346346436',1,1),('5435436436',2,2),('23535325353',3,6),('4643646464',3,7),('4364436434',3,8),('365476358475475',4,9),('563754867574367',5,10),('469895074684368',6,11);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `funcionario_tarefa`
--

LOCK TABLES `funcionario_tarefa` WRITE;
/*!40000 ALTER TABLE `funcionario_tarefa` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario_tarefa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `gerente`
--

LOCK TABLES `gerente` WRITE;
/*!40000 ALTER TABLE `gerente` DISABLE KEYS */;
INSERT INTO `gerente` VALUES ('2014-10-17','2015-10-15',1,1,'inativo'),('2013-03-06','2014-10-17',2,1,'inativo'),('2015-10-15','2015-10-15',1,1,'inativo'),('2015-10-15','2015-10-15',2,2,'inativo'),('2015-10-15',NULL,1,1,'ativo'),('2015-10-15',NULL,8,3,'ativo'),('2015-10-15',NULL,2,2,'ativo'),('2015-10-15',NULL,9,4,'ativo'),('2015-10-15',NULL,10,5,'ativo'),('2015-10-15',NULL,11,6,'ativo');
/*!40000 ALTER TABLE `gerente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `mensal`
--

LOCK TABLES `mensal` WRITE;
/*!40000 ALTER TABLE `mensal` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `mes`
--

LOCK TABLES `mes` WRITE;
/*!40000 ALTER TABLE `mes` DISABLE KEYS */;
/*!40000 ALTER TABLE `mes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `mes_semestral`
--

LOCK TABLES `mes_semestral` WRITE;
/*!40000 ALTER TABLE `mes_semestral` DISABLE KEYS */;
/*!40000 ALTER TABLE `mes_semestral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `movimento`
--

LOCK TABLES `movimento` WRITE;
/*!40000 ALTER TABLE `movimento` DISABLE KEYS */;
/*!40000 ALTER TABLE `movimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (1,'Gerson Carneiro de Souza'),(2,'Junko Enoshima'),(3,'Empresa 1'),(4,'Empresa 1-A'),(5,'Miguel Martins Dias'),(6,'Miguel Martins Dias'),(7,'Gustavo Sousa Lima'),(8,'Alice Cunha Sousa'),(9,'Antônio Rocha Ferreira'),(10,'Fernanda Goncalves Ferreira'),(11,'Diego Ferreira Cavalcanti');
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pessoa_fisica`
--

LOCK TABLES `pessoa_fisica` WRITE;
/*!40000 ALTER TABLE `pessoa_fisica` DISABLE KEYS */;
INSERT INTO `pessoa_fisica` VALUES (1,'547.548.548-65','75665868'),(2,'335.454.364-36','646546546456'),(5,'306.215.131-56','32523532535'),(6,'306.215.131-56','55352353535'),(7,'428.450.816-42','35436466346'),(8,'757.649.392-59','454364364364'),(9,'354.364.364-74','475475464364'),(10,'754.756.865-75','548564379678'),(11,'458.934.789-47','487684378476');
/*!40000 ALTER TABLE `pessoa_fisica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pessoa_juridica`
--

LOCK TABLES `pessoa_juridica` WRITE;
/*!40000 ALTER TABLE `pessoa_juridica` DISABLE KEYS */;
INSERT INTO `pessoa_juridica` VALUES (3,'75.896.876/896-05','78690890',NULL,1),(4,'55.876.907/080-79','87070986',3,1);
/*!40000 ALTER TABLE `pessoa_juridica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `quinzenal`
--

LOCK TABLES `quinzenal` WRITE;
/*!40000 ALTER TABLE `quinzenal` DISABLE KEYS */;
/*!40000 ALTER TABLE `quinzenal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `regime_tributario`
--

LOCK TABLES `regime_tributario` WRITE;
/*!40000 ALTER TABLE `regime_tributario` DISABLE KEYS */;
INSERT INTO `regime_tributario` VALUES (1,'Lucro Real','É a base de cálculo do imposto sobre a renda apurada segundo registros contábeis e fiscais efetuados sistematicamente de acordo com as leis comerciais e fiscais. A apuração do lucro real é feita na parte A do Livro de Apuração do Lucro Real, mediante adições e exclusões ao lucro líquido do período de apuração (trimestral ou anual) do imposto e compensações de prejuízos fiscais autorizadas pela legislação do imposto de renda, de acordo com as determinações contidas na Instrução Normativa SRF nº 28, de 1978, e demais atos legais e infralegais posteriores.'),(2,'Lucro Presumido','O Lucro Presumido é a forma de tributação simplificada do Imposto de Renda das Pessoas Jurídicas (IRPJ) e Contribuição Social sobre o Lucro (CSLL).');
/*!40000 ALTER TABLE `regime_tributario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `semestral`
--

LOCK TABLES `semestral` WRITE;
/*!40000 ALTER TABLE `semestral` DISABLE KEYS */;
/*!40000 ALTER TABLE `semestral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `setor`
--

LOCK TABLES `setor` WRITE;
/*!40000 ALTER TABLE `setor` DISABLE KEYS */;
INSERT INTO `setor` VALUES (1,'Administração','Setor de administração'),(2,'Recepção','Setor de recepção'),(3,'D.P.','Setor de Departamento Pessoal'),(4,'Fiscal','Setor fiscal'),(5,'Contábil','Setor contábil'),(6,'Tributário','Setor tributário');
/*!40000 ALTER TABLE `setor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tarefa`
--

LOCK TABLES `tarefa` WRITE;
/*!40000 ALTER TABLE `tarefa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarefa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tarefa_empresa`
--

LOCK TABLES `tarefa_empresa` WRITE;
/*!40000 ALTER TABLE `tarefa_empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarefa_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `telefone`
--

LOCK TABLES `telefone` WRITE;
/*!40000 ALTER TABLE `telefone` DISABLE KEYS */;
INSERT INTO `telefone` VALUES (1,51,'98864519','celular',1),(2,45,'34545454','comercial',2),(3,51,'887997977','celular',2),(4,51,'46432178','residencial',5),(5,51,'5885868688','residencial',6),(6,51,'978769679','celular',7),(7,51,'9686767867','celular',8),(8,51,'9568786585','residencial',9),(9,51,'98565757','celular',10),(10,51,'9769876976','celular',11);
/*!40000 ALTER TABLE `telefone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'ativo','f0fa25a3aa1d9e2cac08fcc08e40d8d8',NULL,1),(2,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,2),(3,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,5),(4,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,6),(5,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,7),(6,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,8),(7,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,9),(8,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,10),(9,'ativo','81dc9bdb52d04dc20036dbd8313ed055',NULL,11);
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

-- Dump completed on 2015-10-15 17:03:11
