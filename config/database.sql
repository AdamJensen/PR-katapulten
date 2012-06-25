-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 04. 05 2012 kl. 11:42:59
-- Serverversion: 5.1.62
-- PHP-version: 5.3.2-1ubuntu4.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prkatapult`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `arrangementer`
--

DROP TABLE IF EXISTS `arrangementer`;
CREATE TABLE IF NOT EXISTS `arrangementer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` text COLLATE utf8_danish_ci NOT NULL,
  `oprettet` text COLLATE utf8_danish_ci NOT NULL,
  `bruger` text COLLATE utf8_danish_ci NOT NULL,
  `titel` text COLLATE utf8_danish_ci NOT NULL,
  `startdato` text COLLATE utf8_danish_ci NOT NULL,
  `slutdato` text COLLATE utf8_danish_ci NOT NULL,
  `starttid` text COLLATE utf8_danish_ci NOT NULL,
  `sluttid` text COLLATE utf8_danish_ci NOT NULL,
  `sted` text COLLATE utf8_danish_ci NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=100 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `bruger`
--

DROP TABLE IF EXISTS `bruger`;
CREATE TABLE IF NOT EXISTS `bruger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `init` text NOT NULL,
  `fornavn` text NOT NULL,
  `efternavn` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `kurser`
--

DROP TABLE IF EXISTS `kurser`;
CREATE TABLE IF NOT EXISTS `kurser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` text COLLATE utf8_danish_ci NOT NULL,
  `oprettet` text COLLATE utf8_danish_ci NOT NULL,
  `bruger` text COLLATE utf8_danish_ci NOT NULL,
  `titel` text COLLATE utf8_danish_ci NOT NULL,
  `startdato` text COLLATE utf8_danish_ci NOT NULL,
  `slutdato` text COLLATE utf8_danish_ci NOT NULL,
  `starttid` text COLLATE utf8_danish_ci NOT NULL,
  `sluttid` text COLLATE utf8_danish_ci NOT NULL,
  `sted` text COLLATE utf8_danish_ci NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=96 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `opgaver`
--

DROP TABLE IF EXISTS `opgaver`;
CREATE TABLE IF NOT EXISTS `opgaver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(32) NOT NULL,
  `klarmeldt` int(1) NOT NULL DEFAULT '0',
  `oprettet` text NOT NULL,
  `bruger` text CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `type` text NOT NULL,
  `type_indhold` text NOT NULL,
  `titel` text CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `sted` text NOT NULL,
  `startdato` text NOT NULL,
  `starttid` text NOT NULL,
  `slutdato` text NOT NULL,
  `sluttid` text NOT NULL,
  `tekst` text NOT NULL,
  `ant_a1` text NOT NULL,
  `ant_a2` text NOT NULL,
  `ant_a3` text NOT NULL,
  `teaser_hjemmeside` mediumtext CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `hoved_hjemmeside` longtext CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `teaser_enyhed` text NOT NULL,
  `hoved_enyhed` text NOT NULL,
  `teaser_bibnyt` text NOT NULL,
  `hoved_bibnyt` text NOT NULL,
  `teaser_infoboard` text NOT NULL,
  `teaser_kultunaut` text NOT NULL,
  `hoved_kultunaut` text NOT NULL,
  `teaser_ballerupbladet` text NOT NULL,
  `hoved_ballerupbladet` text NOT NULL,
  `teaser_kiglyt` text NOT NULL,
  `hoved_kiglyt` text NOT NULL,
  `teaser_4aarstider` text NOT NULL,
  `hoved_4aarstider` text NOT NULL,
  `tekst_plakat` text NOT NULL,
  `teaser_kulturkalenderen` text NOT NULL,
  `hoved_kulturkalenderen` text CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `mail` text NOT NULL,
  `tekst_radio` text NOT NULL,
  `billetantal` int(11) DEFAULT NULL,
  `spillested` text NOT NULL,
  `salgstart` int(11) DEFAULT NULL,
  `salgslut` int(11) DEFAULT NULL,
  `pris` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `upload`
--

DROP TABLE IF EXISTS `upload`;
CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(32) COLLATE utf8_danish_ci NOT NULL,
  `filnavn` text COLLATE utf8_danish_ci NOT NULL,
  `filsti` text COLLATE utf8_danish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=99 ;
