-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.24-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema nba_db
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ nba_db;
USE nba_db;

--
-- Table structure for table `nba_db`.`tbl_expenses`
--

DROP TABLE IF EXISTS `tbl_expenses`;
CREATE TABLE `tbl_expenses` (
  `idtbl_expenses` int(10) unsigned NOT NULL auto_increment,
  `expheadid` int(10) unsigned NOT NULL default '0',
  `amount` int(10) unsigned NOT NULL default '0',
  `year` varchar(45) NOT NULL default '',
  `month` varchar(45) NOT NULL default '',
  `date` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`idtbl_expenses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nba_db`.`tbl_expenses`
--

/*!40000 ALTER TABLE `tbl_expenses` DISABLE KEYS */;
INSERT INTO `tbl_expenses` (`idtbl_expenses`,`expheadid`,`amount`,`year`,`month`,`date`) VALUES 
 (2,23,100000,'2067','Baisakh',1),
 (4,27,4500,'2067','Baisakh',2),
 (5,16,100000,'2067','Baisakh',1),
 (6,26,0,'','--------',0),
 (7,26,4500,'2067','Baisakh',2),
 (8,26,4500,'2067','Baisakh',3),
 (9,17,1200,'2067','Jestha',14),
 (10,20,4580,'2067','Jestha',14);
/*!40000 ALTER TABLE `tbl_expenses` ENABLE KEYS */;


--
-- Table structure for table `nba_db`.`tbl_exphead`
--

DROP TABLE IF EXISTS `tbl_exphead`;
CREATE TABLE `tbl_exphead` (
  `idtbl_exphead` int(10) unsigned NOT NULL auto_increment,
  `heading` varchar(100) NOT NULL default '',
  `description` varchar(500) NOT NULL default '',
  PRIMARY KEY  (`idtbl_exphead`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nba_db`.`tbl_exphead`
--

/*!40000 ALTER TABLE `tbl_exphead` DISABLE KEYS */;
INSERT INTO `tbl_exphead` (`idtbl_exphead`,`heading`,`description`) VALUES 
 (16,'Light','street light'),
 (17,'Registration','staff registration'),
 (18,'Electric Bill','Office Electric bill!'),
 (19,'Deepawali Expenses','Deepawali expenditures!! '),
 (20,'Identity card','Expenses on ID card printing!'),
 (21,'Meeting Expenses','expenses on meeting carried out!!'),
 (22,'Program Sponsorship Expenses','Program Sponsorship Expenses'),
 (23,'Renewal Expenses','The Expenses on the renewal of .. '),
 (24,'Maintenance Expenses','Maintenance of broken things!!'),
 (25,'Depriciation','Depriciation charge!'),
 (26,'Communication Charge','Telecommunication Charge!'),
 (27,'Rent','Rent charge of office@!'),
 (28,'Miscelleaneous','mic chat'),
 (29,'sabin','hello');
/*!40000 ALTER TABLE `tbl_exphead` ENABLE KEYS */;


--
-- Table structure for table `nba_db`.`tbl_income`
--

DROP TABLE IF EXISTS `tbl_income`;
CREATE TABLE `tbl_income` (
  `idtbl_income` int(10) unsigned NOT NULL auto_increment,
  `year` varchar(45) NOT NULL default '',
  `month` varchar(45) NOT NULL default '',
  `date` varchar(45) NOT NULL default '',
  `voucher_no` varchar(45) NOT NULL default '',
  `inc_head_id` int(10) unsigned NOT NULL default '0',
  `amount` int(10) unsigned NOT NULL default '0',
  `memno` varchar(45) NOT NULL default '',
  PRIMARY KEY  (`idtbl_income`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nba_db`.`tbl_income`
--

/*!40000 ALTER TABLE `tbl_income` DISABLE KEYS */;
INSERT INTO `tbl_income` (`idtbl_income`,`year`,`month`,`date`,`voucher_no`,`inc_head_id`,`amount`,`memno`) VALUES 
 (46,'2067','Jestha','1','123',3,1000,'1'),
 (47,'','','','',0,0,''),
 (48,'2068','Jestha','2','123',3,4500,'1');
/*!40000 ALTER TABLE `tbl_income` ENABLE KEYS */;


--
-- Table structure for table `nba_db`.`tbl_incomehead`
--

DROP TABLE IF EXISTS `tbl_incomehead`;
CREATE TABLE `tbl_incomehead` (
  `idtbl_incomehead` int(10) unsigned NOT NULL auto_increment,
  `heading` varchar(100) NOT NULL default '',
  `description` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`idtbl_incomehead`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nba_db`.`tbl_incomehead`
--

/*!40000 ALTER TABLE `tbl_incomehead` DISABLE KEYS */;
INSERT INTO `tbl_incomehead` (`idtbl_incomehead`,`heading`,`description`) VALUES 
 (1,'Membership','a'),
 (2,'Cleaning',''),
 (3,'Renewal','');
/*!40000 ALTER TABLE `tbl_incomehead` ENABLE KEYS */;


--
-- Table structure for table `nba_db`.`tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE `tbl_login` (
  `idtbl_login` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(45) NOT NULL default '',
  `password` varchar(45) NOT NULL default '',
  PRIMARY KEY  (`idtbl_login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nba_db`.`tbl_login`
--

/*!40000 ALTER TABLE `tbl_login` DISABLE KEYS */;
INSERT INTO `tbl_login` (`idtbl_login`,`username`,`password`) VALUES 
 (1,'admin','admin');
/*!40000 ALTER TABLE `tbl_login` ENABLE KEYS */;


--
-- Table structure for table `nba_db`.`tbl_member`
--

DROP TABLE IF EXISTS `tbl_member`;
CREATE TABLE `tbl_member` (
  `idtbl_member` int(10) unsigned NOT NULL auto_increment,
  `fname` varchar(45) NOT NULL default '',
  `mname` varchar(45) NOT NULL default '',
  `lname` varchar(45) NOT NULL default '',
  `address1` varchar(100) NOT NULL default '',
  `address2` varchar(100) NOT NULL default '',
  `phone1` varchar(45) NOT NULL default '',
  `phone2` varchar(45) NOT NULL default '',
  `mobile` varchar(45) NOT NULL default '',
  `dob` varchar(45) NOT NULL default '',
  `sex` varchar(45) NOT NULL default '',
  `firmname` varchar(45) NOT NULL default '',
  `designation` varchar(45) NOT NULL default '',
  `blood` varchar(45) NOT NULL default '',
  `passport` varchar(45) character set latin1 collate latin1_bin NOT NULL default '',
  `citizenship` varchar(45) NOT NULL default '',
  `memno` varchar(45) NOT NULL default '',
  `image` varchar(45) NOT NULL default '',
  `pan_vat` varchar(45) NOT NULL default '',
  `validID` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`idtbl_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nba_db`.`tbl_member`
--

/*!40000 ALTER TABLE `tbl_member` DISABLE KEYS */;
INSERT INTO `tbl_member` (`idtbl_member`,`fname`,`mname`,`lname`,`address1`,`address2`,`phone1`,`phone2`,`mobile`,`dob`,`sex`,`firmname`,`designation`,`blood`,`passport`,`citizenship`,`memno`,`image`,`pan_vat`,`validID`) VALUES 
 (127,'Sabin','Muni','Bajracharya','Lagan Tole Kathmandu','','4215276','','9849789870','2040-bhadra-13','Male','Bajra n Sons','','','','','1','1.jpg','',0);
/*!40000 ALTER TABLE `tbl_member` ENABLE KEYS */;


--
-- Table structure for table `nba_db`.`tbl_validity`
--

DROP TABLE IF EXISTS `tbl_validity`;
CREATE TABLE `tbl_validity` (
  `idtbl_validity` int(10) unsigned NOT NULL auto_increment,
  `tillYear` varchar(45) NOT NULL default '',
  `tillMth` varchar(45) NOT NULL default '',
  `tillDate` varchar(45) NOT NULL default '',
  `memno` varchar(45) NOT NULL default '0',
  PRIMARY KEY  (`idtbl_validity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nba_db`.`tbl_validity`
--

/*!40000 ALTER TABLE `tbl_validity` DISABLE KEYS */;
INSERT INTO `tbl_validity` (`idtbl_validity`,`tillYear`,`tillMth`,`tillDate`,`memno`) VALUES 
 (7,'2069','Baisakh','1','1');
/*!40000 ALTER TABLE `tbl_validity` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
