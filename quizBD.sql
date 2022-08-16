-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: quiz-ifc
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `perguntas`
--

DROP TABLE IF EXISTS `perguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perguntas` (
  `idPergunta` int NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(800) DEFAULT NULL,
  `idRespostaCorreta` int DEFAULT '1',
  PRIMARY KEY (`idPergunta`),
  KEY `idRespostaCorreta` (`idRespostaCorreta`),
  CONSTRAINT `perguntas_ibfk_1` FOREIGN KEY (`idRespostaCorreta`) REFERENCES `respostaCorreta` (`idRespostaCorreta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perguntas`
--

LOCK TABLES `perguntas` WRITE;
/*!40000 ALTER TABLE `perguntas` DISABLE KEYS */;
INSERT INTO `perguntas` VALUES (1,'O que significa PHP?',1);
/*!40000 ALTER TABLE `perguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respostaCorreta`
--

DROP TABLE IF EXISTS `respostaCorreta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `respostaCorreta` (
  `idRespostaCorreta` int NOT NULL AUTO_INCREMENT,
  `respostaCorreta` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idRespostaCorreta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respostaCorreta`
--

LOCK TABLES `respostaCorreta` WRITE;
/*!40000 ALTER TABLE `respostaCorreta` DISABLE KEYS */;
INSERT INTO `respostaCorreta` VALUES (1,'HyperText coiso');
/*!40000 ALTER TABLE `respostaCorreta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respostaIncorreta`
--

DROP TABLE IF EXISTS `respostaIncorreta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `respostaIncorreta` (
  `idRespostaIncorreta` int NOT NULL AUTO_INCREMENT,
  `RespostaIncorreta1` varchar(500) DEFAULT NULL,
  `RespostaIncorreta2` varchar(500) DEFAULT NULL,
  `RespostaIncorreta3` varchar(500) DEFAULT NULL,
  `idPergunta` int DEFAULT '1',
  PRIMARY KEY (`idRespostaIncorreta`),
  KEY `idPergunta` (`idPergunta`),
  CONSTRAINT `respostaincorreta_ibfk_1` FOREIGN KEY (`idPergunta`) REFERENCES `perguntas` (`idPergunta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respostaIncorreta`
--

LOCK TABLES `respostaIncorreta` WRITE;
/*!40000 ALTER TABLE `respostaIncorreta` DISABLE KEYS */;
INSERT INTO `respostaIncorreta` VALUES (1,'tua mae','HPH','C++',1);
/*!40000 ALTER TABLE `respostaIncorreta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'quiz-ifc'
--

--
-- Dumping routines for database 'quiz-ifc'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-15 23:52:17
