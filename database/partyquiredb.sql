-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2014 at 02:11 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `partyquiredb`
--


CREATE DATABASE partyquiredb;
USE partyquiredb;

-- --------------------------------------------------------

--
-- Table structure for table `tblactivities`
--

DROP TABLE IF EXISTS `tblactivities`;
CREATE TABLE IF NOT EXISTS `tblactivities` (
  `ActivityID` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `ActivityName` varchar(255) NOT NULL,
  PRIMARY KEY (`ActivityID`),
  UNIQUE KEY `ActivityName` (`ActivityName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='List of activities such as Viewing User Profiles, Viewing Venues and etc.' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblactivities`
--

INSERT INTO `tblactivities` (`ActivityID`, `ActivityName`) VALUES
(4, 'Book Venue'),
(3, 'Requested Quotation'),
(1, 'View User Profile'),
(2, 'View Venue Details');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookings`
--

DROP TABLE IF EXISTS `tblbookings`;
CREATE TABLE IF NOT EXISTS `tblbookings` (
  `BookingID` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `VenueID` int(12) unsigned NOT NULL,
  `StartDate` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndDate` date NOT NULL,
  `EndTime` time NOT NULL,
  `Purpose` text NOT NULL,
  `Description` text NOT NULL,
  `DateTimeLogged` datetime NOT NULL,
  `DateTimeModified` datetime NOT NULL,
  PRIMARY KEY (`BookingID`),
  UNIQUE KEY `VenueID` (`VenueID`,`StartDate`,`StartTime`,`EndDate`,`EndTime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Used to log venue bookings' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tblbookings`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblcities`
--

DROP TABLE IF EXISTS `tblcities`;
CREATE TABLE IF NOT EXISTS `tblcities` (
  `CityID` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `CityName` varchar(255) NOT NULL,
  PRIMARY KEY (`CityID`),
  UNIQUE KEY `CityName` (`CityName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='List of cities in UAE' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblcities`
--

INSERT INTO `tblcities` (`CityID`, `CityName`) VALUES
(2, 'Al Ain'),
(1, 'Dubai');

-- --------------------------------------------------------

--
-- Table structure for table `tbleventtypes`
--

DROP TABLE IF EXISTS `tbleventtypes`;
CREATE TABLE IF NOT EXISTS `tbleventtypes` (
  `EventTypeID` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `EventTypeName` varchar(20) NOT NULL,
  PRIMARY KEY (`EventTypeID`),
  UNIQUE KEY `EventTypeName` (`EventTypeName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='List of event types such as Birthday Party, Wedding, and etc.' AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbleventtypes`
--

INSERT INTO `tbleventtypes` (`EventTypeID`, `EventTypeName`) VALUES
(5, 'Anniversary'),
(4, 'Baptismal'),
(2, 'Birthday Party'),
(6, 'Farewell Party'),
(7, 'Gratitude Party'),
(1, 'Others'),
(9, 'Victory'),
(3, 'Wedding'),
(8, 'Welcome Party');

-- --------------------------------------------------------

--
-- Table structure for table `tblmessageflags`
--

DROP TABLE IF EXISTS `tblmessageflags`;
CREATE TABLE IF NOT EXISTS `tblmessageflags` (
  `MessageFlagID` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `MessageFlagName` varchar(20) NOT NULL,
  `MessageFlagColor` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`MessageFlagID`),
  UNIQUE KEY `MessageFlagName` (`MessageFlagName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='List of message flags' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblmessageflags`
--

INSERT INTO `tblmessageflags` (`MessageFlagID`, `MessageFlagName`, `MessageFlagColor`) VALUES
(1, 'For Follow Up', '#FF0000');

-- --------------------------------------------------------

--
-- Table structure for table `tblmessagefolders`
--

DROP TABLE IF EXISTS `tblmessagefolders`;
CREATE TABLE IF NOT EXISTS `tblmessagefolders` (
  `MessageFolderID` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `MessageFolderName` varchar(10) NOT NULL,
  PRIMARY KEY (`MessageFolderID`),
  UNIQUE KEY `MessageFolderName` (`MessageFolderName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='List of message folders such as Inbox, Outbox, and etc.' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblmessagefolders`
--

INSERT INTO `tblmessagefolders` (`MessageFolderID`, `MessageFolderName`) VALUES
(3, 'Archive'),
(1, 'Inbox'),
(2, 'Outbox');

-- --------------------------------------------------------

--
-- Table structure for table `tblmessages`
--

DROP TABLE IF EXISTS `tblmessages`;
CREATE TABLE IF NOT EXISTS `tblmessages` (
  `MessageID` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `MessageTypeID` int(2) unsigned NOT NULL,
  `SenderID` int(12) unsigned NOT NULL,
  `Message` text NOT NULL,
  `Recipients` text NOT NULL,
  `DateTimeLogged` datetime NOT NULL,
  `DateTimeModified` datetime NOT NULL,
  `DateTimeSent` datetime NOT NULL,
  PRIMARY KEY (`MessageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Used to log user composed messages.' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tblmessages`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblmessagestatus`
--

DROP TABLE IF EXISTS `tblmessagestatus`;
CREATE TABLE IF NOT EXISTS `tblmessagestatus` (
  `MessageStatusID` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `MessageStatusName` varchar(20) NOT NULL,
  PRIMARY KEY (`MessageStatusID`),
  UNIQUE KEY `MessageStatusName` (`MessageStatusName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='List of message status such as Read, Unread, and etc.' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblmessagestatus`
--

INSERT INTO `tblmessagestatus` (`MessageStatusID`, `MessageStatusName`) VALUES
(3, 'Archived'),
(4, 'Deleted'),
(2, 'Read'),
(1, 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `tblmessagetypes`
--

DROP TABLE IF EXISTS `tblmessagetypes`;
CREATE TABLE IF NOT EXISTS `tblmessagetypes` (
  `MessageTypeID` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `MessageTypeName` varchar(50) NOT NULL,
  PRIMARY KEY (`MessageTypeID`),
  UNIQUE KEY `MessageTypeName` (`MessageTypeName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='List of message types such as Request for Quotation, Inquiry, and etc.' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblmessagetypes`
--

INSERT INTO `tblmessagetypes` (`MessageTypeID`, `MessageTypeName`) VALUES
(3, 'Inquiry'),
(1, 'Others'),
(2, 'Request For Quotation');

-- --------------------------------------------------------

--
-- Table structure for table `tblpriviledges`
--

DROP TABLE IF EXISTS `tblpriviledges`;
CREATE TABLE IF NOT EXISTS `tblpriviledges` (
  `PriviledgeID` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `PriviledgeName` varchar(20) NOT NULL,
  PRIMARY KEY (`PriviledgeID`),
  UNIQUE KEY `PriviledgeName` (`PriviledgeName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='List of user priviledges such as User, Administrator, and etc.' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblpriviledges`
--

INSERT INTO `tblpriviledges` (`PriviledgeID`, `PriviledgeName`) VALUES
(2, 'Administrator'),
(1, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccountactivitylogs`
--

DROP TABLE IF EXISTS `tbluseraccountactivitylogs`;
CREATE TABLE IF NOT EXISTS `tbluseraccountactivitylogs` (
  `DateTimeLogged` datetime NOT NULL,
  `UserAccountID` int(12) unsigned NOT NULL,
  `ActivityID` int(6) unsigned NOT NULL,
  `ActivityDescription` text NOT NULL,
  PRIMARY KEY (`DateTimeLogged`,`UserAccountID`,`ActivityID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Used to log the activities of the user';

--
-- Dumping data for table `tbluseraccountactivitylogs`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccountmessages`
--

DROP TABLE IF EXISTS `tbluseraccountmessages`;
CREATE TABLE IF NOT EXISTS `tbluseraccountmessages` (
  `UserAccountID` int(12) unsigned NOT NULL,
  `MessageID` int(20) unsigned NOT NULL,
  `MessageFlagID` int(2) unsigned NOT NULL,
  `MessageFolderID` int(2) unsigned NOT NULL,
  `MessageStatusID` int(2) unsigned NOT NULL,
  PRIMARY KEY (`UserAccountID`,`MessageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Junction table for User Account and Messages to link all user messages.';

--
-- Dumping data for table `tbluseraccountmessages`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccountpriviledges`
--

DROP TABLE IF EXISTS `tbluseraccountpriviledges`;
CREATE TABLE IF NOT EXISTS `tbluseraccountpriviledges` (
  `UserAccountID` int(12) unsigned NOT NULL,
  `PriviledgeID` int(2) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`UserAccountID`,`PriviledgeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Used to link user accounts and priviledges to list all priviledges per user account.';

--
-- Dumping data for table `tbluseraccountpriviledges`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccounts`
--

DROP TABLE IF EXISTS `tbluseraccounts`;
CREATE TABLE IF NOT EXISTS `tbluseraccounts` (
  `UserAccountID` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  `Languages` varchar(255) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(64) NOT NULL,
  PRIMARY KEY (`UserAccountID`),
  UNIQUE KEY `EmailAddress` (`EmailAddress`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='List of all system users.' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbluseraccounts`
--

INSERT INTO `tbluseraccounts` (`UserAccountID`, `FirstName`, `MiddleName`, `LastName`, `Address`, `Languages`, `EmailAddress`, `Username`, `Password`) VALUES
(1, 'Admin', 'I', 'Strator', 'Party Quire UAR', 'English, Japanese, Filipino', 'admin@partyquire.com', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `tblvenueeventtypes`
--

DROP TABLE IF EXISTS `tblvenueeventtypes`;
CREATE TABLE IF NOT EXISTS `tblvenueeventtypes` (
  `VenueID` int(12) unsigned NOT NULL,
  `EventTypeID` int(4) unsigned NOT NULL,
  PRIMARY KEY (`VenueID`,`EventTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Used to link a venue for an event type.';

--
-- Dumping data for table `tblvenueeventtypes`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblvenuereviews`
--

DROP TABLE IF EXISTS `tblvenuereviews`;
CREATE TABLE IF NOT EXISTS `tblvenuereviews` (
  `DateTimeLogged` datetime NOT NULL,
  `VenueID` int(12) unsigned NOT NULL,
  `UserAccountID` int(12) unsigned NOT NULL,
  `ReviewRating` double(5,2) unsigned NOT NULL,
  `ReviewContent` text NOT NULL,
  PRIMARY KEY (`DateTimeLogged`,`VenueID`,`UserAccountID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Used for customer rating of venues.';

--
-- Dumping data for table `tblvenuereviews`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblvenues`
--

DROP TABLE IF EXISTS `tblvenues`;
CREATE TABLE IF NOT EXISTS `tblvenues` (
  `VenueID` int(12) unsigned NOT NULL AUTO_INCREMENT,
  `UserAccountID` int(12) unsigned NOT NULL,
  `VenueTypeID` int(2) unsigned NOT NULL,
  `CityID` int(8) unsigned NOT NULL,
  `VenueName` varchar(255) NOT NULL,
  `Location` text NOT NULL,
  `LocationMap` text,
  `MaximumOccupancy` int(5) unsigned NOT NULL,
  `MinimumBookingRequired` int(5) unsigned NOT NULL,
  `Ammenities` text NOT NULL,
  `VenueDescription` text NOT NULL,
  `DepositAndFees` text NOT NULL,
  `MinimumPackageRate` float(10,2) unsigned NOT NULL,
  `MaximumPackageRate` float(10,2) unsigned NOT NULL,
  PRIMARY KEY (`VenueID`),
  UNIQUE KEY `VenueName` (`VenueName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='List of venues.' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tblvenues`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblvenuetypes`
--

DROP TABLE IF EXISTS `tblvenuetypes`;
CREATE TABLE IF NOT EXISTS `tblvenuetypes` (
  `VenueTypeID` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `VenueTypeName` varchar(20) NOT NULL,
  PRIMARY KEY (`VenueTypeID`),
  UNIQUE KEY `VenueTypeName` (`VenueTypeName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='List of venue types such as Hotels, Function Rooms, Gardens, Beach, Resorts.' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblvenuetypes`
--

INSERT INTO `tblvenuetypes` (`VenueTypeID`, `VenueTypeName`) VALUES
(3, 'Beach'),
(5, 'Function Room'),
(2, 'Garden'),
(1, 'Hotel'),
(4, 'Resort');
