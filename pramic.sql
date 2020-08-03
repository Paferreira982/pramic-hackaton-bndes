/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.11-MariaDB : Database - pramic
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pramic` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `pramic`;

/*Table structure for table `associacoes` */

DROP TABLE IF EXISTS `associacoes`;

CREATE TABLE `associacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `comunidade` varchar(50) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `telefone2` varchar(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `comunidade` (`comunidade`),
  CONSTRAINT `associacoes_ibfk_1` FOREIGN KEY (`comunidade`) REFERENCES `comunidades` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4;

/*Data for the table `associacoes` */

LOCK TABLES `associacoes` WRITE;

insert  into `associacoes`(`id`,`nome`,`comunidade`,`telefone`,`telefone2`,`email`,`senha`) values 
(1,'AM da Mangueira','Mangueira','21999999999','21999999998','asd@asd.com','25d55ad283aa400af464c76d713c07ad'),
(2,'Associação da PL','Parada de Lucas','21999999999','21999999998','enorcliff1@yolasite.com','a63e3a48b89e878856476a92874dfe41'),
(3,'Associação de Manguinhos','Manguinhos','21999999999','21999999998','arustan2@webs.com','de3ec0aa2234aa1e3ee275bbc715c6c9'),
(4,'AM da Rocinha','Rocinha','21999999999','21999999998','dambrosi3@github.io','15137ac9aa4a99ca503af92199223644'),
(5,'Associação da CDD','Cidade de Deus','21999999999','21999999998','fstormonth4@networkadvertising.org','7815696ecbf1c96e6894b779456d330e'),
(6,'AM do Jacarezinho','Jacarezinho','21999999999','21999999998','fscawton5@ucla.edu','e332a76c29654fcb7f6e6b31ced090c7'),
(7,'AM da Maré','Maré','21999999999','21999999998','dbolland6@java.com','15137ac9aa4a99ca503af92199223644'),
(8,'AM do Alemão','Complexo do Alemão','21999999999','21999999998','psamworth7@imgur.com','37e6a41f48e6bb7dcf98759238776ce3'),
(9,'Associação de Moradores de Acari','Acari','21999999999','21999999998','atwomey8@surveymonkey.com','15137ac9aa4a99ca503af92199223644'),
(10,'AM do Santa Marta','Santa Marta','21999999999','21999999998','pguile9@cornell.edu','7815696ecbf1c96e6894b779456d330e'),
(102,'ABC','Cidade de Deus','99999999999','99999999999','asdf@asd.com','81dc9bdb52d04dc20036dbd8313ed055'),
(103,'ABC','Acari','21999999999','21888888888','asdf@qweq.com','e332a76c29654fcb7f6e6b31ced090c7'),
(110,'ABC','Acari','21999999999','21888888888','asdasdf@asd.com','25d55ad283aa400af464c76d713c07ad'),
(113,'asdA','Cidade de Deus','21999999999','21888888888','aasdASsd@asd.com','7815696ecbf1c96e6894b779456d330e'),
(115,'asdfsdf','Acari','33333333333','33333333333','1241234asd@asd.com','25d55ad283aa400af464c76d713c07ad'),
(116,'asdfasdfawsdf','Cidade de Deus','7777777777','99999999999','asfghfghd@asd.com','7815696ecbf1c96e6894b779456d330e'),
(117,'ABDF','Complexo do Alemão','87888888888','66666666666','a23232323sd@asd.com','15137ac9aa4a99ca503af92199223644'),
(118,'sadddddsdsd','Complexo do Alemão','33333333333','32222222222','asaaaa22wd@asd.com','25d55ad283aa400af464c76d713c07ad'),
(119,'ASDasdasdf','Jacarezinho','44444444444','33333333333','aFGHsd@asd.com','25d55ad283aa400af464c76d713c07ad');

UNLOCK TABLES;

/*Table structure for table `atividades` */

DROP TABLE IF EXISTS `atividades`;

CREATE TABLE `atividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atividade` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `atividades` */

LOCK TABLES `atividades` WRITE;

insert  into `atividades`(`id`,`atividade`) values 
(1,'Limpeza'),
(2,'Reparos de encanamento'),
(3,'Combate a Dengue e Chicungunha'),
(4,'Segurança e sinalização em tor');

UNLOCK TABLES;

/*Table structure for table `comunidades` */

DROP TABLE IF EXISTS `comunidades`;

CREATE TABLE `comunidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`nome`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `comunidades` */

LOCK TABLES `comunidades` WRITE;

insert  into `comunidades`(`id`,`nome`) values 
(1,'Acari'),
(2,'Cidade de Deus'),
(3,'Complexo do Alemão'),
(4,'Jacarezinho'),
(5,'Mangueira'),
(6,'Manguinhos'),
(7,'Maré'),
(8,'Parada de Lucas'),
(9,'Rocinha'),
(10,'Santa Marta');

UNLOCK TABLES;

/*Table structure for table `eventos` */

DROP TABLE IF EXISTS `eventos`;

CREATE TABLE `eventos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(80) NOT NULL,
  `descricao` varchar(370) NOT NULL,
  `id_atividade` int(11) NOT NULL,
  `imagem` varchar(30) NOT NULL,
  `comunidade` varchar(50) NOT NULL,
  `local` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `token` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comunidade` (`comunidade`),
  KEY `id_atividade` (`id_atividade`),
  CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`comunidade`) REFERENCES `comunidades` (`nome`),
  CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_atividade`) REFERENCES `atividades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

/*Data for the table `eventos` */

LOCK TABLES `eventos` WRITE;

insert  into `eventos`(`id`,`titulo`,`descricao`,`id_atividade`,`imagem`,`comunidade`,`local`,`data`,`hora`,`token`) values 
(1,' ipsumakkk dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',1,'IMG-20180727-WA0007.jpg','Mangueira','455 Sunfield Hill','2019-10-13','12:00:00','55fb279e'),
(2,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',1,'foto-evento.jpg','Mangueira','40 Graedel Point','2020-01-10','09:28:00','2e6d2905'),
(3,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',1,'foto-evento.jpg','Mangueira','152 Onsgard Place','2020-05-07','12:00:00','9b9048a9'),
(4,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',1,'foto-evento.jpg','Mangueira','5 John Wall Place','2020-06-04','13:23:00','5945c65e'),
(5,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',1,'foto-evento4.jpg','Rocinha','594 Vahlen Road','2020-05-27','12:44:00','f3e10a41'),
(6,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',1,'foto-evento4.jpg','Rocinha','75 Mayfield Alley','2020-04-07','17:44:00','df1bd1c5'),
(7,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',1,'foto-evento4.jpg','Rocinha','3 Wayridge Drive','2019-12-23','11:56:00','6e53e7b0'),
(8,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',1,'foto-evento4.jpg','Rocinha','917 Harbort Point','2020-05-20','12:00:00','5f51a6e4'),
(9,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',1,'foto-evento4.jpg','Rocinha','1521 Schlimgen Court','2020-05-30','12:00:00','830e2916'),
(10,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',2,'foto-evento6.jpg','Rocinha','36 Marquette Junction','2019-11-20','12:00:00','267ffaa1'),
(11,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',2,'foto-evento2.jpg','Maré','49 Doe Crossing Crossing','2020-03-23','12:00:00','2819423c'),
(12,'Maré unida contra os mosquitos.','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',3,'foto-evento2.jpg','Maré','4529 Superior Plaza','2019-09-17','12:00:00','61ee4aa5'),
(13,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',2,'foto-evento6.jpg','Maré','29 Forest Drive','2020-03-11','05:28:00','f1580dae'),
(14,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',2,'foto-evento2.jpg','Maré','844 Rutledge Hill','2019-10-01','12:00:00','b933039d'),
(15,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',2,'foto-evento6.jpg','Maré','2 Rockefeller Trail','2019-09-20','10:08:00','57ab5127'),
(16,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',2,'foto-evento2.jpg','Maré','38971 Moose Parkway','2020-03-04','08:40:00','eae47fd8'),
(17,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',2,'foto-evento2.jpg','Maré','569 Mccormick Trail','2020-04-05','07:40:00','f0d4d194'),
(18,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',2,'foto-evento5.jpg','Maré','1 Sunbrook Plaza','2019-11-26','12:00:00','f68ba98c'),
(19,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',2,'foto-evento5.jpg','Maré','05 Valley Edge Avenue','2019-12-05','06:46:00','13f6b5f0'),
(20,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',3,'foto-evento5.jpg','Maré','5370 Clyde Gallagher Drive','2020-05-06','12:00:00','6ccb1b44'),
(21,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',3,'foto-evento6.jpg','Jacarezinho','5 Elka Alley','2019-12-04','12:00:00','ade17bb7'),
(22,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',3,'foto-evento5.jpg','Jacarezinho','2 Fair Oaks Point','2019-10-23','03:26:00','5b69142c'),
(23,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',3,'foto-evento3.jpg','Jacarezinho','2 Orin Avenue','2020-01-25','12:49:00','224496e3'),
(24,'Jacarezinho em ação!','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',1,'foto-evento3.jpg','Jacarezinho','11 Hayes Junction','2019-09-01','14:00:00','f840a826'),
(25,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',3,'foto-evento3.jpg','Jacarezinho','99755 Reindahl Street','2020-03-25','12:00:00','21bd41dd'),
(26,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',3,'foto-evento3.jpg','Jacarezinho','195 Hovde Plaza','2019-11-07','05:48:00','a13b831d'),
(27,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',3,'foto-evento3.jpg','Jacarezinho','79 Derek Park','2020-01-21','09:23:00','5f953024'),
(28,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',3,'foto-evento6.jpg','Jacarezinho','9 Ridgeway Road','2020-05-23','13:59:00','9aba9fe9'),
(29,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',3,'foto-evento6.jpg','Jacarezinho','8 North Parkway','2019-10-22','13:50:00','e7574672'),
(30,'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',3,'foto-evento6.jpg','Jacarezinho','84 Bayside Place','2020-05-03','08:59:00','093e357a'),
(33,'safgsdfgsdfg','sdfgsdfgsdfg',2,'IMG-20200204-WA0036.jpg','Mangueira','sdfgsdfgsdfgsdfg','2020-08-26','21:21:00','5o2rnewo'),
(34,'tytytytytyyty','akjshdfçamhsdçfjlahçsdljf',3,'IMG_20180810_184803559.jpg','Mangueira','aaaaaaaaaaaaaaa','2020-10-18','12:22:00','refklywy'),
(35,'qwefqawef','asdfasdf',3,'IMG-20180727-WA0007.jpg','Mangueira','asdfasdfasdf','2020-08-18','22:22:00','5i7qp7of');

UNLOCK TABLES;

/*Table structure for table `rel_vol_evt` */

DROP TABLE IF EXISTS `rel_vol_evt`;

CREATE TABLE `rel_vol_evt` (
  `cpf` varchar(14) NOT NULL,
  `evento` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cpf`,`evento`),
  KEY `evento` (`evento`),
  CONSTRAINT `rel_vol_evt_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `voluntarios` (`cpf`),
  CONSTRAINT `rel_vol_evt_ibfk_2` FOREIGN KEY (`evento`) REFERENCES `eventos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `rel_vol_evt` */

LOCK TABLES `rel_vol_evt` WRITE;

insert  into `rel_vol_evt`(`cpf`,`evento`) values 
('243.407.260-79',24),
('510.895.960-57',16),
('510.895.960-57',29),
('566.843.330-70',12),
('591.143.060-69',24);

UNLOCK TABLES;

/*Table structure for table `voluntarios` */

DROP TABLE IF EXISTS `voluntarios`;

CREATE TABLE `voluntarios` (
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `idade` int(2) NOT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `voluntarios` */

LOCK TABLES `voluntarios` WRITE;

insert  into `voluntarios`(`cpf`,`nome`,`idade`,`telefone`,`email`) values 
('034.802.467-35','Bartholomew Keelan',70,'21947510572','bkeelanf@hubpages.com'),
('046.867.668-49','Casie Staines',18,'21919129420','cstaines1d@bbc.co.uk'),
('052.075.955-44','Freda Dunsleve',74,'21964535833','fdunsleve5@fda.gov'),
('074.044.834-37','Fae holmes',18,'21921146861','fholmes1e@businessweek.com'),
('102.183.229-56','Bernie Hugo',74,'21905461210','bhugo1z@moonfruit.com'),
('108.227.242-83','Dyann Tuite',50,'21999124633','dtuite2p@unc.edu'),
('120.115.427-15','Wendye Drynan',84,'21966526472','wdrynan18@discovery.com'),
('121.314.613-85','Larry Khotler',27,'21975466102','lkhotler4@bravesites.com'),
('142.433.860-58','Tallulah Glader',88,'21936092396','tglader3@timesonline.co.uk'),
('143.723.551-71','Sauncho Hachette',50,'21970206137','shachette0@addthis.com'),
('156.905.082-25','Sondra Stenner',37,'21956438703','sstenner1q@usgs.gov'),
('168.166.212-73','Veronique Cheake',18,'21945655961','vcheake12@oracle.com'),
('185.318.217-14','Fair Strivens',18,'21908649299','fstrivensq@comcast.net'),
('189.392.389-01','Edgar Shivell',26,'21948542166','eshivelln@webnode.com'),
('202.606.763-80','Lambert Pavic',21,'21900889329','lpavic29@hc360.com'),
('209.238.732-21','Eldin Rapsey',60,'21916023077','erapseyc@vkontakte.ru'),
('227.249.246-37','Ola Milan',18,'21928085242','omilan1h@answers.com'),
('243.407.260-79','adasdasd',23,NULL,'aqweqsd@asd.com'),
('246.497.599-52','Neely McClean',34,'21946560978','nmccleanb@about.com'),
('252.870.001-70','Patten Dowrey',18,'21917381488','pdowrey1y@moonfruit.com'),
('256.665.920-80','Jack Philipard',39,'21974487390','jphilipard21@creativecommons.org'),
('306.819.551-76','Christophorus Ellit',18,'21946811525','cellit19@rediff.com'),
('339.818.282-53','Esme Mapston',20,'21911501198','emapstong@wordpress.org'),
('342.827.816-81','Marcille Offin',55,'21981784299','moffinu@nih.gov'),
('352.202.763-55','Corliss Ciobutaru',18,'21965779829','cciobutarux@nsw.gov.au'),
('353.178.426-98','Jill Szymonwicz',43,'21999539781','jszymonwicz2b@auda.org.au'),
('382.393.162-03','Lucia Stroobant',40,'21920919792','lstroobant17@usa.gov'),
('394.586.634-35','Cynthie Thorsen',18,'21942369875','cthorsen1g@cornell.edu'),
('420.001.966-04','Ingunna Brookwell',65,'21972564306','ibrookwell2@cnbc.com'),
('422.414.239-61','Carlita Grimsley',88,'21960291443','cgrimsley1v@globo.com'),
('422.813.129-89','Wilhelmine Andrioni',36,'21958659004','wandrioni24@wikispaces.com'),
('422.928.892-82','Aida Burn',79,'21920124011','aburn2k@wikimedia.org'),
('444.342.570-53','Angelika Kas',26,'21948181009','akas1t@macromedia.com'),
('453.597.702-26','Pearce Martinat',56,'21982974600','pmartinat20@geocities.com'),
('457.234.792-26','Candida Fradson',18,'21947450098','cfradson10@weather.com'),
('470.608.324-92','Shirlene Wyer',69,'21978338767','swyere@phpbb.com'),
('478.915.400-80','Avivah Rhubottom',38,'21974873160','arhubottoms@shop-pro.jp'),
('481.757.133-67','Marney Fehner',73,'21906345342','mfehnerv@nbcnews.com'),
('483.917.538-82','Nestor Gawkes',50,'21961005072','ngawkesi@aboutads.info'),
('484.149.391-38','Danette Hatterslay',79,'21930164048','dhatterslay1p@163.com'),
('492.029.179-20','Consuelo Begg',57,'21916009882','cbegg6@infoseek.co.jp'),
('492.867.828-06','Maurise Gethins',39,'21915168513','mgethins1@bizjournals.com'),
('493.145.276-94','Avis Smedley',18,'21931881172','asmedley1i@live.com'),
('510.895.960-57','Fred',23,'','asdew@asd.com'),
('526.622.165-17','Doy Rennebach',63,'21911101742','drennebach22@liveinternet.ru'),
('533.022.075-80','Anabelle Spray',58,'21935514577','aspray8@google.pl'),
('539.711.944-50','Seamus Ragless',79,'21921629873','sraglessh@amazon.com'),
('542.070.995-84','Tobit Habbon',18,'21940386763','thabbon1a@printfriendly.com'),
('542.498.754-27','Patrizio Luckings',23,'21930580927','pluckings23@usa.gov'),
('542.881.787-45','Kendall Myles',55,'21966462018','kmyles14@wix.com'),
('554.384.831-52','Alfons Perceval',69,'21976713773','aperceval2g@mapquest.com'),
('565.808.859-90','Fair Oliveras',52,'21980540079','foliveras2q@blog.com'),
('566.843.330-70','Jose',22,'','asdfas@asdfasdf.com'),
('580.326.237-89','Griffith Howatt',65,'21996171147','ghowattd@tinyurl.com'),
('584.477.391-50','Ailyn Crossfeld',87,'21970690187','acrossfeldy@harvard.edu'),
('591.143.060-69','asdfasdf',32,'','aqweqsd@asd.com'),
('608.834.746-04','Ephrem Addington',64,'21975375717','eaddington1w@mapquest.com'),
('613.652.008-19','Jdavie Scotti',37,'21915771666','jscotti28@netlog.com'),
('627.541.003-27','Calypso Twinterman',43,'21913604536','ctwinterman11@yandex.ru'),
('635.335.722-61','Clemmie Overall',44,'21956483150','coverall1u@photobucket.com'),
('637.650.760-68','Rodi O\'Nowlan',64,'21938306730','ronowlan2l@timesonline.co.uk'),
('639.077.002-64','Doretta Camell',89,'21997795688','dcamell13@google.ca'),
('641.323.535-00','Cross Rabbatts',52,'21997100840','crabbattsm@reverbnation.com'),
('642.099.163-80','Goran Ollie',72,'21951084457','gollier@yale.edu'),
('654.693.854-80','Bertrand Van Castele',48,'21941680174','bvant@moonfruit.com'),
('678.933.809-60','Quincy Daton',19,'21943993204','qdaton1k@discovery.com'),
('679.354.476-64','Doti Bowmen',48,'21905619961','dbowmen7@nymag.com'),
('702.390.568-75','Steward Lockitt',35,'21961888655','slockitt1s@jalbum.net'),
('708.782.281-69','Aeriel Bortoloni',82,'21978779875','abortoloniz@mapy.cz'),
('717.819.515-93','Cesar Cator',18,'21961179570','ccator2a@samsung.com'),
('727.630.089-82','Rossie Allberry',33,'21969767953','rallberry2i@last.fm'),
('728.337.569-17','Suki Coldtart',30,'21910813265','scoldtart2n@i2i.jp'),
('733.267.013-23','Jule Brason',18,'21907109163','jbrason2j@npr.org'),
('734.620.412-84','Karalynn Zapata',52,'21968341703','kzapata2c@xinhuanet.com'),
('736.559.973-96','Amii Walthew',62,'21904138031','awalthew1r@wikimedia.org'),
('737.699.278-35','Sybila Stiggles',56,'21974568962','sstiggleso@printfriendly.com'),
('738.134.757-68','Alford Grim',83,'21900141190','agriml@chron.com'),
('750.077.851-26','Chevy Keddle',54,'21974380945','ckeddle15@examiner.com'),
('772.055.098-19','Georgena Broom',80,'21988742764','gbroom1x@tinypic.com'),
('773.137.573-08','Tommie Matushevitz',54,'21993305519','tmatushevitz9@toplist.cz'),
('795.908.268-74','Jessy Engall',61,'21991078351','jengallp@gov.uk'),
('796.214.175-62','Emmalynn Blinman',67,'21911302235','eblinman1m@gov.uk'),
('801.630.927-34','Desmond Sussans',19,'21975150733','dsussans16@smugmug.com'),
('824.559.596-13','Lefty Cregeen',18,'21948326692','lcregeen1j@theatlantic.com'),
('846.354.170-09','Cyb Easby',58,'21981821571','ceasbya@1688.com'),
('849.208.171-96','Brynne Bielby',42,'21944641556','bbielby2e@wp.com'),
('865.942.671-21','Miguel Hicken',18,'21920592986','mhicken2m@issuu.com'),
('873.661.201-30','La verne Poveleye',74,'21944278771','lvernew@booking.com'),
('883.271.808-90','Monty Mandy',23,'21982915959','mmandy2r@theglobeandmail.com'),
('886.082.357-39','Madlin McGurgan',20,'21903188606','mmcgurgan25@istockphoto.com'),
('895.832.850-84','Holt Joyner',19,'21972954383','hjoyner27@ustream.tv'),
('896.870.871-23','Missie Ruslin',36,'21991489311','mruslin2f@t-online.de'),
('900.986.603-33','Bobby Spanswick',18,'21986660446','bspanswick2o@biglobe.ne.jp'),
('903.650.239-71','Alan McGrirl',86,'21914754861','amcgrirl2d@umich.edu'),
('915.761.154-10','Terra Kerans',54,'21980287086','tkerans1f@pinterest.com'),
('918.483.097-34','Lock Sissland',27,'21960971285','lsisslandj@imdb.com'),
('940.412.497-79','Daveen Kleiser',40,'21933093330','dkleiser1o@google.com.hk'),
('967.278.965-41','Torey Twiname',57,'21907032753','ttwinamek@hexun.com'),
('973.854.076-13','Esteban Lob',18,'21991892531','elob1b@w3.org'),
('974.214.163-62','Edith Sommerled',74,'21907902849','esommerled1c@acquirethisname.com'),
('985.841.962-74','Alidia Gething',51,'21952648580','agething26@ftc.gov');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
