-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2015 at 06:41 AM
-- Server version: 5.5.41-log
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `abm`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountbank`
--

CREATE TABLE IF NOT EXISTS `accountbank` (
`id_aBank` int(11) unsigned NOT NULL,
  `name_bank` varchar(1000) DEFAULT NULL,
  `account_no` varchar(1000) DEFAULT NULL,
  `kode_company` varchar(1000) DEFAULT NULL,
  `type_account` varchar(1000) DEFAULT NULL,
  `date_create` varchar(1000) DEFAULT NULL,
  `remark` text,
  `vis` int(11) unsigned NOT NULL,
  `mod_date` varchar(1000) DEFAULT NULL,
  `mod_user` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=903 ;

--
-- Dumping data for table `accountbank`
--

INSERT INTO `accountbank` (`id_aBank`, `name_bank`, `account_no`, `kode_company`, `type_account`, `date_create`, `remark`, `vis`, `mod_date`, `mod_user`) VALUES
(901, 'Mandiri Bank', '1234567890', 'SDHTM', '501', '12 March 2015', 'Coba', 0, '19 March 2015', 'Admin'),
(902, 'BPD KALTIM', '1234567890', 'SDHTM', '502', '12 March 2015', 'Test', 0, '10 June 2015', 'Dhimas');

-- --------------------------------------------------------

--
-- Table structure for table `billexpenses`
--

CREATE TABLE IF NOT EXISTS `billexpenses` (
`id_oe` int(255) NOT NULL,
  `cost_code` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `name_user` int(100) NOT NULL,
  `name_verify` int(100) NOT NULL,
  `value` varchar(1000) NOT NULL DEFAULT '',
  `rate` int(10) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `source_funds` varchar(1000) DEFAULT NULL,
  `type` int(10) NOT NULL,
  `remark` text NOT NULL,
  `date_input` varchar(100) NOT NULL DEFAULT '',
  `picture` varchar(1000) NOT NULL,
  `vis` int(10) NOT NULL,
  `create_user` varchar(100) NOT NULL,
  `create_date` varchar(100) NOT NULL,
  `modified_user` varchar(100) NOT NULL,
  `modified_date` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=500003 ;

--
-- Dumping data for table `billexpenses`
--

INSERT INTO `billexpenses` (`id_oe`, `cost_code`, `description`, `name_user`, `name_verify`, `value`, `rate`, `payment`, `source_funds`, `type`, `remark`, `date_input`, `picture`, `vis`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
(1, '7003', 'Beli Baso 4 mangkok', 2022, 0, '80000', 501, '2', '1', 14, 'Hujan-hujan lapar mamam baso ena.............mema', '08 March 2015', 'bill.png', 0, 'Admin', '11 March 2015', 'Admin', '11/03/2015'),
(500001, '7001', 'Perangko 6000, 6 ea', 2021, 2020, '36000', 501, '0', '1', 11, 'Keperluan untuk dokumen tender 2 ea, 4 ea untuk spare. ', '14 October 2014', '0', 0, '', '11 October 2014', 'Dimza', '15 October 2014'),
(500002, '7002', 'SKETCH 3 App', 2020, 0, '1200000', 501, '3', '1', 12, 'Sketch 3 aplikasi desin UI/UIX, Price 99 USD dengan Kurs 12,600. Transfer Bank to Bank Mandiri a/n Dhimas Yuli Priya Wicaksana (No Rek)', '10 March 2015', '0', 0, 'Admin', '10 March 2015', 'Admin', '10 March 2015');

-- --------------------------------------------------------

--
-- Table structure for table `buying`
--

CREATE TABLE IF NOT EXISTS `buying` (
`id_buy` int(255) NOT NULL,
  `idTender` int(11) NOT NULL,
  `idPurchaseInt` int(11) NOT NULL,
  `quote_no` varchar(1000) NOT NULL,
  `po_in` varchar(1000) NOT NULL,
  `po_out` varchar(1000) NOT NULL,
  `supplier_no` int(255) NOT NULL,
  `company_no` varchar(100) NOT NULL,
  `currency_no` int(255) NOT NULL,
  `date` varchar(1000) NOT NULL,
  `tax` int(255) NOT NULL,
  `remark` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `payment` int(10) NOT NULL,
  `vis` int(10) NOT NULL,
  `file_doc` varchar(100) NOT NULL,
  `create_user` varchar(1000) NOT NULL,
  `create_date` varchar(1000) NOT NULL,
  `modified_user` varchar(1000) NOT NULL,
  `modified_date` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `buying`
--

INSERT INTO `buying` (`id_buy`, `idTender`, `idPurchaseInt`, `quote_no`, `po_in`, `po_out`, `supplier_no`, `company_no`, `currency_no`, `date`, `tax`, `remark`, `status`, `payment`, `vis`, `file_doc`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
(2, 0, 0, '0014/SS-QTS/08/2014', '0275/CVRN-PO/VIII/2014', '0002/CVSS-PO/VIII/2014', 4005, 'SDHTM', 501, '18 August 2014', 0, 'hai!,kamu,coba,goda,aku?', '20', 1, 1, '', 'Dimza', '19 August 2014', 'Dimza', '11/10/2014'),
(3, 0, 0, '0016/SS-QTS/08/2014', '1231/TU-PO/VII/2014', '0004/CVSS-PO/VIII/2014', 4001, 'SDHTM', 502, '19 August 2014', 10, 'hai!,kamu,coba,goda,aku?', '20', 1, 1, '', 'Dimza', '19 August 2014', 'Dimza', '11/10/2014'),
(5, 0, 0, '0015/SS-QTS/08/2014', '', '0005/CVSS-PO/VIII/2014', 4002, 'SDHTM', 501, '19 August 2014', 0, 'hai!,kamu,coba,goda,aku?', '20', 0, 1, '', 'Dimza', '19 August 2014', 'Dimza', '11/10/2014'),
(6, 0, 0, '0015/SS-QTS/08/2014', '0275/CVRN-PO/VIII/2014', '0006/CVSS-PO/VIII/2014', 4002, 'SDHTM', 501, '19 August 2014', 0, 'hai!,kamu,coba,goda,aku?', '20', 0, 1, '', 'Dimza', '19 August 2014', 'Dimza', '11/10/2014'),
(7, 0, 0, '0005/ABM-QTS/07/2014', '0275/CVRN-PO/VIII/2014', '0001/ABM-PO/VIII/2014', 4001, 'ATHYA', 501, '19 August 2014', 0, 'hai!,kamu,coba,goda,aku?', '20', 0, 0, '', 'Dimza', '19 August 2014', 'Dimza', '11/10/2014'),
(8, 0, 0, '0001/DK-QTS/08/2014', '0275/CVRN-PO/VIII/2014', '0001/DAKA-PO/VIII/2014', 4003, 'DWRTH', 501, '19 August 2014', 10, 'hai!,kamu,coba,goda,aku?', '20', 3, 0, '', 'Dimza', '19 August 2014', 'Dimza', '9/10/2014'),
(9, 0, 0, '0007/ABM-QTS/08/2014', '0275/CVRN-PO/VIII/2014', '0002/ABM-PO/VIII/2014', 4005, 'ATHYA', 502, '19 August 2014', 10, 'hai!,kamu,coba,goda,aku?', '20', 0, 0, '', 'Dimza', '19 August 2014', 'Dimza', '13/10/2014'),
(10, 0, 0, '0016/SS-QTS/08/2014', '0275/CVRN-PO/VIII/2014', '0007/CVSS-PO/VIII/2014', 4003, 'SDHTM', 501, '19 August 2014', 0, 'hai!,kamu,coba,goda,aku?', '20', 0, 0, '', 'Dimza', '19 August 2014', 'Dimza', '19 August 2014'),
(11, 0, 0, '0002/DK-QTS/08/2014', '0275/CVRN-PO/VIII/2014', '0002/DAKA-PO/VIII/2014', 4002, 'DWRTH', 501, '19 August 2014', 10, 'hai!,kamu,coba,goda,aku?', '20', 0, 0, '', 'Dimza', '19 August 2014', 'Dimza', '19 August 2014'),
(12, 0, 0, '0003/DAKA-QTS/08/2014', '0275/CVRN-PO/VIII/2014', '0003/DAKA-PO/VIII/2014', 4003, 'DWRTH', 502, '20 August 2014', 0, 'hai!,kamu,coba,goda,aku?', '20', 3, 0, '', 'Dimza', '20 August 2014', 'Dimza', '9/10/2014'),
(13, 0, 0, 'n/a', '2341/ADARO-PO/VII/2014', '0008/CVSS-PO/IX/2014', 4002, 'SDHTM', 501, '14 September 2014', 10, 'Coba buat po tanpa ada pembuatan Quote form dahulu', '20', 0, 0, '', 'Dimza', '14 September 2014', 'Dimza', '14 September 2014'),
(14, 0, 0, 'n/a', '4500/TU-PO/IX/2014', '0004/DAKA-PO/IX/2014', 4005, 'DWRTH', 502, '15 September 2014', 10, 'Coba lagi yah tanpa adanya no quote', '20', 3, 0, '', 'Dimza', '15 September 2014', 'Dimza', '9/10/2014'),
(15, 0, 0, '0004/DAKA-QTS/VIII/2014', 'FLW-94323-223', '0005/DAKA-PO/IX/2014', 4005, 'DWRTH', 502, '15 September 2014', 10, 'Coba lagi dengan quote', '20', 0, 0, '', 'Dimza', '15 September 2014', 'Dimza', '15 September 2014'),
(16, 0, 0, '0005/DAKA-QTS/IX/2014', '1500/VCO-PO/VIII/2014', '0006/DAKA-PO/IX/2014', 4005, 'DWRTH', 502, '15 September 2014', 10, 'cuba cuba lagi yaaaaaaaaa...............', '20', 0, 0, '', 'Dimza', '15 September 2014', 'Dimza', '15 September 2014'),
(17, 0, 0, '0019/CVSS-QTS/IX/2014', '2341/THS-PO/VII/2014', '0009/CVSS-PO/IX/2014', 4004, 'SDHTM', 502, '21 September 2014', 10, 'Asking for discount to megatronic........', '20', 0, 0, '', 'Dimza', '21 September 2014', 'Dimza', '21 September 2014'),
(18, 0, 0, '0020/CVSS-QTS/IX/2014', '2341/THS-PO/VII/2014', '0010/CVSS-PO/IX/2014', 4003, 'SDHTM', 502, '21 September 2014', 10, 'coba', '20', 0, 0, '', 'Dimza', '21 September 2014', 'Dimza', '21 September 2014'),
(19, 0, 0, 'n/a', '2341/THS-PO/VII/2014', '0003/ABM-PO/IX/2014', 4004, 'ATHYA', 502, '21 September 2014', 0, 'tes............', '20', 2, 0, '', 'Dimza', '21 September 2014', 'Dimza', '9/10/2014'),
(20, 0, 0, 'n/a', '2341/THS-PO/VII/2014', '0004/ABM-PO/IX/2014', 4002, 'ATHYA', 502, '21 September 2014', 10, 'dawdawd', '20', 2, 0, '', 'Dimza', '21 September 2014', 'Dimza', '9/10/2014'),
(21, 0, 0, '0021/CVSS-QTS/X/2014', '2341/CVRN-PO/VII/2014', '0011/CVSS-PO/X/2014', 4002, 'SDHTM', 501, '02 October 2014', 10, 'tesssssssssss', '20', 0, 0, '', 'Dimza', '2 October 2014', 'Dimza', '2 October 2014'),
(22, 0, 0, '0023/CVSS-QTS/X/2014', '3456/THS-PO/VIII/2014', '0012/CVSS-PO/X/2014', 4002, 'SDHTM', 502, '05 October 2014', 10, 'yessss\r\n', '20', 0, 0, '', 'Dimza', '5 October 2014', 'Dimza', '5 October 2014'),
(23, 0, 0, 'n/a', '3456/THS-PO/VIII/2014', '0013/CVSS-PO/X/2014', 4002, 'SDHTM', 502, '05 October 2014', 10, 'YAPPPPPPP', '20', 0, 0, '', 'Dimza', '5 October 2014', 'Dimza', '5 October 2014'),
(24, 0, 0, '0002/SS-QTS/07/2014', '0275/CVRN-PO/VIII/2014', '0014/CVSS-PO/X/2014', 4002, 'SDHTM', 502, '06 October 2014', 10, 'cobaaa........................', '20', 0, 0, '', 'Dimza', '6 October 2014', 'Dimza', '6 October 2014'),
(25, 0, 0, '0026/CVSS-QTS/X/2014', '0666/CVRN-PO/X/2014', '0015/CVSS-PO/X/2014', 4003, 'SDHTM', 502, '17 October 2014', 10, 'pajak mereka yang bayar kita store.', '20', 0, 0, '', 'Dimza', '16 October 2014', 'Dimza', '16 October 2014'),
(26, 100, 0, '', '123456789', '0001/CVSS-PO//2015', 4001, 'SDHTM', 502, '', 10, 'Ini di coba kedua yah bro.....', '20', 0, 0, '', '3013', '', '3013', ''),
(27, 0, 0, '0001/ATH-QTS//2015', '123456789', '0001/ATH-PO//2015', 4003, 'ATH', 502, '2015-09-20', 10, 'ini coba ketiga kalinya semoga sukses!', '20', 0, 0, '', '3013', '2015-09-20', '3013', '2015-09-20'),
(28, 0, 1111, '', '123456789', '0001/ABM-PO/2015', 4027, 'ATHYA', 501, '2015-09-20', 10, 'ini coba ke emapat kalinyah....', '20', 0, 0, '', '3013', '2015-09-20', '3013', '2015-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `buyingnum`
--

CREATE TABLE IF NOT EXISTS `buyingnum` (
`idBuyNum` int(255) NOT NULL,
  `buyNum` varchar(100) DEFAULT NULL,
  `idCompany` varchar(100) DEFAULT NULL,
  `noCompany` int(11) NOT NULL,
  `year` int(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `buyingnum`
--

INSERT INTO `buyingnum` (`idBuyNum`, `buyNum`, `idCompany`, `noCompany`, `year`) VALUES
(1, '0000', 'ATHYA', 2, 2014),
(2, '0000', 'DWRTH', 3, 2014),
(3, '0000', 'PGSUS', 4, 2014),
(4, '0000', 'SDHTM', 1, 2014),
(5, '0000', 'ATH', 5, 2014),
(6, '0000', 'TEKRAJ', 6, 2014),
(7, '0000', 'SDHTM', 1, 2015),
(8, '0000', 'ATHYA', 2, 2015),
(9, '0000', 'DWRTH', 3, 2015),
(10, '0000', 'PGSUS', 4, 2015),
(11, '0000', 'ATH', 5, 2015),
(12, '0000', 'TEKRAJ', 6, 2015),
(13, '0001', 'SDHTM', 1, 2015),
(14, '0001', 'ATH', 5, 2015),
(15, '0001', 'ATHYA', 2, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `buying_list`
--

CREATE TABLE IF NOT EXISTS `buying_list` (
`id_buying_list` int(255) NOT NULL,
  `po_out` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `part_number` varchar(1000) NOT NULL,
  `goods_no` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `unit` varchar(1000) NOT NULL,
  `price` varchar(1000) NOT NULL,
  `sub_price` varchar(1000) NOT NULL,
  `matauang` varchar(1000) NOT NULL,
  `tax` int(255) NOT NULL,
  `status` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `buying_list`
--

INSERT INTO `buying_list` (`id_buying_list`, `po_out`, `description`, `part_number`, `goods_no`, `qty`, `unit`, `price`, `sub_price`, `matauang`, `tax`, `status`) VALUES
(6, '', 'Dell Optiplex 9010', 'BKZZWX1', 10003, 1, 'SET', '110000000', '110000000', 'IDR', 10, ''),
(7, '0002/DAKA-PO/VIII/2014', 'Dell Optiplex 9010', 'BKZZWX1', 10003, 1, 'SET', '110000000', '110000000', 'IDR', 10, '21'),
(12, '0001/ABM-PO/VIII/2014', 'Dell Optiplex 9010', 'BKZZWX1', 10003, 1, 'SET', '110000000', '110000000', 'IDR', 0, '21'),
(13, '0001/DAKA-PO/VIII/2014', 'Cisco 3900 Series Routers', 'CISCO3945E-SEC/K9', 10004, 1, 'EA', '90000000', '90000000', 'IDR', 0, '21'),
(14, '0003/DAKA-PO/VIII/2014', 'Cisco 3900 Series Routers', 'CISCO3945E-SEC/K9', 10004, 1, 'EA', '9000', '9000', '', 10, '20'),
(15, '0002/CVSS-PO/VIII/2014', 'Micro 800 series PLC', '2080-LC50-24QWB', 10005, 2, 'EA', '2875000', '5750000', '', 0, '21'),
(16, '0002/CVSS-PO/VIII/2014', 'Power Flex 753 250 HP', '20F1AND248AN0NNNNN', 10006, 1, 'EA', '188000000', '188000000', '', 0, '21'),
(18, '0008/CVSS-PO/IX/2014', 'Dell Optiplex 9010', 'BKZZWX1', 10003, 3, 'SET', '12750000', '38250000', '501', 10, '20'),
(19, '0004/DAKA-PO/IX/2014', 'Micro 800 series PLC', '2080-LC50-24QWB', 10005, 2, 'EA', '325', '650', '502', 10, '20'),
(20, '0005/DAKA-PO/IX/2014', 'Power Flex 753 250 HP', '20F1AND248AN0NNNNN', 10006, 1, 'SET', '16348', '16348', '502', 10, '20'),
(21, '0006/DAKA-PO/IX/2014', 'Micro 800 series PLC', '2080-LC50-24QWB', 10005, 5, 'EA', '250', '1250', '502', 10, '20'),
(22, '0010/CVSS-PO/IX/2014', 'Cisco 3900 Series Routers', 'CISCO3945E-SEC/K9', 10004, 1, 'EA', '9000', '9000', '502', 10, '21'),
(23, '0003/ABM-PO/IX/2014', 'Thin Client Devices nComputing L300', 'L300', 10007, 5, 'EA', '150', '750', '502', 10, '21'),
(24, '0004/ABM-PO/IX/2014', 'Dell Optiplex 9010', 'BKZZWX1', 10003, 5, 'SET', '1200', '6000', '502', 10, '21'),
(25, '0002/ABM-PO/VIII/2014', 'Micro 800 series PLC', '2080-LC50-24QWB', 10005, 1, 'SET', '250', '250', '502', 0, '21'),
(26, '0011/CVSS-PO/X/2014', 'Dell Optiplex 9010', 'BKZZWX1', 10003, 5, 'SET', '11450000', '57250000', '501', 10, '20'),
(27, '0012/CVSS-PO/X/2014', 'Dell Optiplex 9010', 'BKZZWX1', 10003, 3, 'SET', '1200', '3600', '502', 10, '21'),
(28, '0013/CVSS-PO/X/2014', 'Dell Optiplex 9010', 'BKZZWX1', 10003, 2, 'SET', '1200', '2400', '502', 10, '20'),
(29, '0014/CVSS-PO/X/2014', 'Dell Optiplex 9010', 'BKZZWX1', 10003, 10, 'SET', '1500', '15000', '502', 10, '21'),
(30, '0009/CVSS-PO/IX/2014', 'Thin Client Devices nComputing L300', 'L300', 10007, 2, 'EA', '130', '260', '502', 10, '21'),
(31, '0015/CVSS-PO/X/2014', 'Cisco 3900 Series Routers', 'CISCO3945E-SEC/K9', 10004, 1, 'UNIT', '9000', '9000', '502', 10, '20');

-- --------------------------------------------------------

--
-- Table structure for table `ca`
--

CREATE TABLE IF NOT EXISTS `ca` (
`id_ca` int(255) NOT NULL,
  `assets_name` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL,
  `value` int(100) NOT NULL,
  `currency_no` int(100) NOT NULL,
  `company_no` int(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `remark` text NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `vis` int(10) NOT NULL,
  `create_user` varchar(100) NOT NULL,
  `create_date` varchar(100) NOT NULL,
  `modified_user` varchar(100) NOT NULL,
  `modified_date` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70004 ;

--
-- Dumping data for table `ca`
--

INSERT INTO `ca` (`id_ca`, `assets_name`, `type`, `value`, `currency_no`, `company_no`, `date`, `remark`, `picture`, `vis`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
(70000, 'n/a', 'n/a', 0, 0, 0, '0', '0', '', 1, '0', '0', '0', '0'),
(70002, 'PC DELL OPTIPLEX 980', 'Office Devices', 1200, 502, 1, '13 October 2014', 'Core i5, HDD 500GB, 8 GB RAM, etc', '0', 0, 'Dimza', '13 October 2014', 'Dimza', '13 October 2014'),
(70003, 'DELL Monitor 19 Inch', 'OFFICE DEVICES', 200, 502, 1, '07 January 2015', 'non available', '0', 0, 'Dimza', '7 January 2015', 'Dimza', '7 January 2015');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`id_client` int(255) NOT NULL,
  `nama_client` varchar(1000) DEFAULT '',
  `alamat_client` text,
  `kota_client` varchar(1000) DEFAULT '',
  `kodepos_client` int(255) DEFAULT NULL,
  `propinsi_client` varchar(1000) DEFAULT '',
  `negara_client` varchar(1000) DEFAULT '',
  `telpon_client` varchar(1000) DEFAULT '',
  `email_client` varchar(1000) DEFAULT '',
  `situs` varchar(100) DEFAULT '',
  `tags` varchar(1000) DEFAULT '',
  `vis` int(10) DEFAULT NULL,
  `logo` varchar(1000) DEFAULT '',
  `create_user` varchar(1000) DEFAULT '',
  `create_date` varchar(1000) DEFAULT '',
  `modified_user` varchar(1000) DEFAULT '',
  `modified_date` varchar(1000) DEFAULT ''
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2005 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nama_client`, `alamat_client`, `kota_client`, `kodepos_client`, `propinsi_client`, `negara_client`, `telpon_client`, `email_client`, `situs`, `tags`, `vis`, `logo`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
(2001, 'CHEVRON Pacific Indonesia, PT', 'Jl AKK Besar Kompl Pasir Ridge, Prapatan', 'Balikpapan', 76111, 'Kalimantan Timur', 'Indonesia', '(0542)-734000', 'klo@chevron.com', 'http://eproc.chevron.com', '', 0, '', '', '', 'Dimza', 'Sunday 14th of September 2014 08:39:12 PM'),
(2002, 'THIESS Contractors Indonesia, PT', 'Ratu Prabu 2  Jl. TB. Simatupang Kav. 1B', 'Jakarta', 12560, 'DKI Jakarta', 'Indonesia', '(+62-21)-2754-9999', 'thiess-indonesia@thiess.co.id', 'http://thiess.co.id', '', 0, '', 'Dimza', 'Wednesday 6th of August 2014 05:08:22 AM', 'Dimza', 'Monday 15th of September 2014 06:25:19 PM'),
(2003, 'VICO Indonesia, PT', 'Jl. Cendrawasih No 1. PO. Box. 1400', 'Samarinda', 75001, 'Kalimantan Timur', 'Indonesia', '+62-541-525000', 'vico-indonesia@vico.co.id', 'http://vico.co.id', '', 0, '', 'Dimza', 'Saturday 13th of September 2014 08:20:55 PM', 'Dimza', 'Sunday 14th of September 2014 06:56:52 PM'),
(2004, 'TOTAL EP INDONESIE, PT', ' Jl. Kom L Yos Sudarso 1 Karang Jati', 'Balikpapan', 76123, 'Kalimantan Timur', 'Indonesia', '(0542)-533999', 'total@total.com', 'http://total.com', '', 0, '', 'Dimza', 'Tuesday 7th of October 2014 08:34:08 AM', 'Dimza', 'Tuesday 7th of October 2014 08:34:08 AM');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`id_company` int(255) NOT NULL,
  `akta_notaris` varchar(1000) NOT NULL DEFAULT '',
  `npwp` varchar(100) DEFAULT NULL,
  `type_industry` varchar(1000) DEFAULT NULL,
  `skala_usaha` varchar(100) DEFAULT NULL,
  `kode_company` varchar(1000) NOT NULL,
  `nama_company` varchar(1000) NOT NULL,
  `kota_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `direktur` varchar(1000) NOT NULL,
  `coms_1` varchar(1000) DEFAULT NULL,
  `coms_2` varchar(1000) DEFAULT NULL,
  `alamat_company` text NOT NULL,
  `kota_company` varchar(1000) NOT NULL,
  `kodepos_company` int(255) NOT NULL,
  `propinsi_company` varchar(1000) NOT NULL,
  `negara_company` varchar(1000) NOT NULL,
  `telpon_company` varchar(1000) NOT NULL,
  `email_company` varchar(1000) NOT NULL,
  `situs` varchar(100) NOT NULL,
  `domain` varchar(1000) NOT NULL,
  `vis` int(10) NOT NULL,
  `create_user` varchar(1000) NOT NULL,
  `create_date` varchar(1000) NOT NULL,
  `modified_user` varchar(1000) NOT NULL,
  `modified_date` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `akta_notaris`, `npwp`, `type_industry`, `skala_usaha`, `kode_company`, `nama_company`, `kota_lahir`, `tanggal_lahir`, `direktur`, `coms_1`, `coms_2`, `alamat_company`, `kota_company`, `kodepos_company`, `propinsi_company`, `negara_company`, `telpon_company`, `email_company`, `situs`, `domain`, `vis`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
(1, '-', '-', 'TRD, SERVICES', 'SMALL', 'SDHTM', 'SINDHUTAMA SUPPORTINDO, CV', 'Balikpapan', '07 January 2015', 'Dimas Prinsuryono Anggiato', '-', '-', '4th Ramayana Complex, Jalan Soekarno-Hatta Km. 3,5', 'Balikpapan', 76126, 'Kalimantan Timur', 'Indonesia', '(0542)-7104404', 'sales@sindhutama.co.id', 'http://sindhutama.co.id', '@sindhutama.co.id', 0, '3013', '2015-09-04', '3013', '2015-09-04'),
(2, '-', '-', 'TRD, SERVICES', 'MIDDLE', 'ATHYA', 'ATHAYA ABBAS MANDIRI, PT', 'Balikpapan', '07 January 2015', 'Denny Yusniarman', '-', '-', 'Komp. Balikpapan Baru Ruko Sentra Eropa 3 Blok AC 5 No 11', 'Balikpapan', 76114, 'Kalimantan Timur', 'Indonesia', '(0542)-8862162', 'sales@athaya-bpp.com', 'http://athaya-bpp.com', '@athaya-bpp.com', 0, '3013', '2015-09-04', '3013', '2015-09-04'),
(3, '-', '-', 'TRD, SERVICES', 'SMALL', 'DWRTH', 'DWI ARTHA KENCANA, CV', 'Balikpapan', '01 August 2014', 'Karina Dewi', '-', '-', 'Komp. Balikpapan Baru Ruko Sentra Eropa 3 Blok AC 5 No 11', 'Balikpapan', 76114, 'Kalimantan Timur', 'Indonesia', '(0542)-8862162', 'sales@dwicarthakencana.com', 'http://dwicarthakencana.com', '@dwiarthakencana.com', 0, '3013', '2015-09-04', '3013', '2015-09-04'),
(4, '-', '-', 'TRD, SERVICES', 'SMALL', 'PGSUS', 'PEGASUS SOLUSI PRATAMA, PT', 'Balikpapan', '07 January 2015', 'Ferry Mahdonna', '-', '-', 'Komp. Balikpapan Baru Ruko Sentra Eropa 3 Blok AC 5 No 11', 'Balikpapan', 76114, 'Kalimantan Timur', 'Indonesia', '(0542)-8862162', 'marketing.bpn@pegasuspratama.com', 'http://pegasuspratama.com', '@pegasuspratama.com', 0, '3013', '2015-09-04', '3013', '2015-09-04'),
(5, '-', '-', 'TRD', 'SMALL', 'ATH', 'ARTHA TIRTA HAMONANGAN, CV', 'Balikpapan', '07 January 2015', 'Akhmad Subekti', '-', '-', '-', 'Balikpapan', 0, 'Kaliamntan Timur', 'Indonesia', '-', 'artha.hamonangan@gmail.com', '-', '-', 0, '3013', '2015-09-04', '3013', '2015-09-04'),
(6, '-', '-', 'TRD', 'MIDDLE', 'TEKRAJ', 'TEKNIK RAJAWALI, CV', 'Balikpapan', '07 January 2015', 'Unknown', '-', '-', '-', 'Balikpapan', 0, 'Kaliamntan Timur', 'Indonesia', '-', '-', '-', '-', 0, '3013', '2015-09-04', '3013', '2015-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`contactId` int(255) unsigned NOT NULL,
  `clientId` int(10) DEFAULT NULL,
  `prefix` varchar(100) DEFAULT NULL,
  `firstName` varchar(1000) DEFAULT NULL,
  `middleName` varchar(1000) DEFAULT NULL,
  `lastName` varchar(1000) DEFAULT NULL,
  `jobTittle` varchar(1000) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `areaCode` varchar(100) DEFAULT NULL,
  `phoneWork` varchar(100) DEFAULT NULL,
  `phoneMobile` varchar(100) DEFAULT NULL,
  `country` varchar(1000) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `city` varchar(1000) DEFAULT NULL,
  `state` varchar(1000) DEFAULT NULL,
  `postalCode` int(11) DEFAULT NULL,
  `vis` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `modDate` varchar(1000) DEFAULT NULL,
  `picture` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9002 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactId`, `clientId`, `prefix`, `firstName`, `middleName`, `lastName`, `jobTittle`, `email`, `areaCode`, `phoneWork`, `phoneMobile`, `country`, `address`, `city`, `state`, `postalCode`, `vis`, `userId`, `modDate`, `picture`) VALUES
(9001, 2002, 'Mr.', 'Hendra', NULL, 'Hermawan', 'Spv. Exim and Expediter', 'hhermawan@thiess.co.id', '0542', '541007', '081123456', 'Indonesia', 'Jalan Jenderal Sudirman No. 1', 'Balikpapan', 'Kalimantan Timur', 76123, 1, 108, '10 June 2015', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cost_code`
--

CREATE TABLE IF NOT EXISTS `cost_code` (
`id_costcode` int(11) unsigned NOT NULL,
  `noreg_cost` varchar(1000) DEFAULT NULL,
  `kode_company` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `date_cost` varchar(100) DEFAULT NULL,
  `remark` text,
  `vis` int(11) DEFAULT NULL,
  `mod_user` varchar(100) DEFAULT NULL,
  `mod_date` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cost_code`
--

INSERT INTO `cost_code` (`id_costcode`, `noreg_cost`, `kode_company`, `description`, `date_cost`, `remark`, `vis`, `mod_user`, `mod_date`) VALUES
(1, '7001', 'SDHTM', 'SDHTM.TRD', '07 January 2015', NULL, 0, 'Dimza', '07 January 2015'),
(2, '7002', 'SDHTM', 'SDHTM.CO', '9 January 2015', NULL, 0, 'Dona', '9 January 2015'),
(3, '7003', 'SDHTM', 'SDHTM.OTHER', '9 January 2015', NULL, 0, 'Dona', '9 January 2015');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
`idCurrency` int(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `symbol` varchar(1000) NOT NULL,
  `nation` varchar(1000) NOT NULL,
  `vis` int(10) NOT NULL,
  `createUser` varchar(1000) NOT NULL,
  `createDate` varchar(1000) NOT NULL,
  `modUser` varchar(1000) NOT NULL,
  `modDate` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=504 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`idCurrency`, `description`, `symbol`, `nation`, `vis`, `createUser`, `createDate`, `modUser`, `modDate`) VALUES
(501, 'Rupiah', 'IDR', 'Indonesia', 0, 'Admin', 'hursday 12th of March 2015 06:35:35 AM', 'Admin', 'Wednesday 10th of June 2015 01:27:46 PM'),
(502, 'Dollar US', 'USD', 'United State of America', 0, 'Admin', 'hursday 12th of March 2015 06:35:35 AM', 'Admin', 'Wednesday 10th of June 2015 01:27:04 PM'),
(503, 'Singapore Dollar', 'SGD', 'Singapore', 0, 'Aji', 'Wednesday 10th of June 2015 12:34:08 PM', 'Aji', 'Wednesday 10th of June 2015 12:34:08 PM');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_order`
--

CREATE TABLE IF NOT EXISTS `delivery_order` (
`id_do` int(255) NOT NULL,
  `do_no` varchar(1000) NOT NULL,
  `quote_no` varchar(1000) NOT NULL,
  `company_no` varchar(100) NOT NULL,
  `client_no` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `remark` varchar(1000) NOT NULL,
  `status` int(10) NOT NULL,
  `vis` int(10) NOT NULL,
  `create_user` varchar(100) NOT NULL,
  `create_date` varchar(100) NOT NULL,
  `modified_user` varchar(100) NOT NULL,
  `modified_date` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `delivery_order`
--

INSERT INTO `delivery_order` (`id_do`, `do_no`, `quote_no`, `company_no`, `client_no`, `date`, `remark`, `status`, `vis`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
(1, '0001/CVSS-DO/X/2014', '0002/SS-QTS/07/2014', '1', '2001', '06 October 2014', 'ces', 0, 0, 'Dimza', '6/10/2014', 'Dimza', '6/10/2014');

-- --------------------------------------------------------

--
-- Table structure for table `do_abm`
--

CREATE TABLE IF NOT EXISTS `do_abm` (
`id_do_abm` int(255) NOT NULL,
  `kode_company` varchar(100) NOT NULL,
  `no_do_abm` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `do_abm`
--

INSERT INTO `do_abm` (`id_do_abm`, `kode_company`, `no_do_abm`) VALUES
(1, 'ATHYA', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `do_dk`
--

CREATE TABLE IF NOT EXISTS `do_dk` (
`id_do_dk` int(255) NOT NULL,
  `kode_company` varchar(100) NOT NULL,
  `no_do_dk` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `do_dk`
--

INSERT INTO `do_dk` (`id_do_dk`, `kode_company`, `no_do_dk`) VALUES
(1, 'DWRTH', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `do_list`
--

CREATE TABLE IF NOT EXISTS `do_list` (
`id_do_list` int(255) NOT NULL,
  `do_no` varchar(1000) NOT NULL,
  `goods_no` int(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `part_number` varchar(1000) NOT NULL,
  `qty` int(255) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `vis` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `do_ps`
--

CREATE TABLE IF NOT EXISTS `do_ps` (
`id_do_ps` int(255) NOT NULL,
  `kode_company` varchar(100) NOT NULL,
  `no_do_ps` varchar(1000) NOT NULL DEFAULT ''
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `do_ps`
--

INSERT INTO `do_ps` (`id_do_ps`, `kode_company`, `no_do_ps`) VALUES
(1, 'PGSUS', '0000'),
(2, 'PGSUS', '0001');

-- --------------------------------------------------------

--
-- Table structure for table `do_ss`
--

CREATE TABLE IF NOT EXISTS `do_ss` (
`id_do_ss` int(255) NOT NULL,
  `kode_company` varchar(100) NOT NULL,
  `no_do_ss` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `do_ss`
--

INSERT INTO `do_ss` (`id_do_ss`, `kode_company`, `no_do_ss`) VALUES
(1, 'SDHTM', '0000'),
(2, 'SDHTM', '0001');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`id_karyawan` int(255) NOT NULL,
  `no_pegawai` int(255) DEFAULT NULL,
  `join_date` varchar(100) DEFAULT '',
  `status_karyawan` varchar(1000) DEFAULT '',
  `kode_company` varchar(100) DEFAULT '',
  `nama_depan` varchar(1000) DEFAULT '',
  `nama_tengah` varchar(1000) DEFAULT '',
  `nama_belakang` varchar(1000) DEFAULT '',
  `tempat_lahir` varchar(1000) DEFAULT '',
  `ttl_karyawan` varchar(1000) DEFAULT '',
  `alamat_karyawan` varchar(1000) DEFAULT '',
  `kota_karyawan` varchar(1000) DEFAULT '',
  `kodepos_karyawan` int(255) DEFAULT NULL,
  `propinsi_karyawan` varchar(1000) DEFAULT '',
  `negara_karyawan` varchar(1000) DEFAULT '',
  `telpon_karyawan` varchar(1000) DEFAULT '',
  `mobile_karyawan` varchar(1000) DEFAULT '',
  `email_karyawan` varchar(1000) DEFAULT '',
  `job_tittle` varchar(1000) DEFAULT '',
  `basic_salary` int(255) DEFAULT NULL,
  `meals_salary` int(255) DEFAULT NULL,
  `npwp` varchar(1000) DEFAULT '',
  `bpjs` varchar(1000) DEFAULT '',
  `sex` varchar(1000) DEFAULT '',
  `martial_status` varchar(1000) DEFAULT '',
  `spouse_name` varchar(1000) DEFAULT '',
  `no_child` int(10) DEFAULT NULL,
  `emergency_contact` varchar(1000) DEFAULT '',
  `emergency_phone` varchar(1000) DEFAULT '',
  `id_type` varchar(1000) DEFAULT '',
  `id_no` varchar(1000) DEFAULT '',
  `foto` varchar(1000) DEFAULT '',
  `status` int(10) DEFAULT NULL,
  `vis` int(10) DEFAULT NULL,
  `create_user` varchar(1000) DEFAULT '',
  `create_date` varchar(1000) DEFAULT '',
  `modified_user` varchar(1000) DEFAULT '',
  `modified_date` varchar(1000) DEFAULT ''
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id_karyawan`, `no_pegawai`, `join_date`, `status_karyawan`, `kode_company`, `nama_depan`, `nama_tengah`, `nama_belakang`, `tempat_lahir`, `ttl_karyawan`, `alamat_karyawan`, `kota_karyawan`, `kodepos_karyawan`, `propinsi_karyawan`, `negara_karyawan`, `telpon_karyawan`, `mobile_karyawan`, `email_karyawan`, `job_tittle`, `basic_salary`, `meals_salary`, `npwp`, `bpjs`, `sex`, `martial_status`, `spouse_name`, `no_child`, `emergency_contact`, `emergency_phone`, `id_type`, `id_no`, `foto`, `status`, `vis`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
(1, 3013, '2015-01-01', 'Contract', 'SDHTM', 'Dhimas', '', 'YP Wicaksana', 'Balikpapan', '1987-01-06', 'Jl. Cilacap No. 183 Panorama', 'Balikpapan', 76123, 'Kalimantan Timur', 'Indonesia', '(0274)-7515885', '085323335885', 'sales.support@sindhutama.co.id', 'HR SPECIALIST', 1800000, 0, '165127432721000', '0', 'Male', 'Married', 'Ratih Dewantari', 1, 'Husband / Wife', '08115302150', 'KTP', '6471041607870001', 'tes.jpg', 1, 0, 'Dimza', '15 July 2014', 'Dimza', '26 July 2014'),
(4, 2022, '2015-01-01', 'Permanent', 'ATHYA', 'Ferry', '', 'Mahdona', 'Balikpapan', '1987-01-06', 'Jl. Kura-kura Ninja', 'Balikpapan', 76123, 'Kalimantan Timur', 'Indonesia', '-', '-', 'marketing.bpn@pegasuspratama.com', 'MARKETING', 0, 0, '-', '0', 'Male', 'Divorce', 'n/a', 0, 'Other', '0', 'KTP', '0', '11.png', 1, 1, 'Dimza', '7 January 2015', 'Dimza', '3 February 2015'),
(12, 2020, '2015-01-01', 'Permanent', 'ATHYA', 'Denny', '', 'Yusniarman', 'Balikpapan', '2015-08-05', 'Gading Mansion Blok J 7 No 7 Sepinggan Pratama', 'Balikpapan', 76114, 'Kalimantan Timur', 'Indonesia', '0811595622', '081392101822', 'dyusniarman@athaya-bpp.com', 'SALES MANAGER', 0, 0, '15.716.764.4-721.000', '0', 'Male', 'Married', 'n/a', 0, 'Husband / Wife', '0811595622', 'KTP', '090909', '11.png', 0, 0, '', '', '', ''),
(13, 3010, '2012-02-23', 'Permanent', 'SDHTM', 'Dimas ', '', 'P Anggianto', 'Balikpapan', '1987-04-30', 'Komplek Perum Ramayana No.4 RT.023 Kel. Batu Ampar', 'Balikpapan', 76126, 'Kalimantan Timur', 'Indonesia', '082157883004', '08115983004', 'dimas@sindhutama.co.id', 'SALES EXECUTIVE', 0, 0, '03.216.603.5-721.000', '0', 'Male', 'Single', 'n/a', 0, 'Other', '081214609966', 'PASSPORT', 'A 8303550', '0838631.jpg', 0, 0, '', '', '', ''),
(14, 3012, '2014-06-23', 'Permanent', 'SDHTM', 'Aji', '', 'B Saputra', 'Balikpapan', '1987-01-06', 'Lahendong No.36', 'Balikpapan', 76111, 'Kalimantan Timur', 'Indonesia', '081 999 00 3385', '081 999 00 3385', 'ajibayu@sindhutama.co.id', 'SALES ADMIN', 0, 0, '15.989.818.8-721.000', '0', 'Male', 'Single', 'n/a', 0, 'Other', '081 999 00 3385', 'KTP', '6471030601870007', 'jay.jpg', 1, 0, '', '', '', ''),
(15, 2031, '2015-06-12', 'Permanent', 'ATHYA', 'Rooy ', '', 'wahyudi', 'Balikpapan', '2015-08-19', 'Jl. MT. Haryono Rt.33 NO.40', 'Balikpapan', 76114, 'Kalimantan Timur', 'Indonesia', '0542 730328', '081350010005', 'hse@athaya-bpp.com', 'HSE OFFICER', 0, 0, '59.265.970.0721.000', '0', 'Male', 'Divorce', 'n/a', 0, 'Other', '081350010005', 'KTP', '647105.190881.0003', '11.png', 0, 0, '', '', '', ''),
(16, 2030, '2015-05-17', 'Permanent', 'ATHYA', 'Ikram', '', 'Ikram', 'Bogor', '1990-07-14', 'Perumahan Batu Ampar Lestari', 'Balikpapan', 76114, 'Kalimantan Timur', 'Indonesia', '-', '081349473798', 'project@athaya-bpp.com', 'SALES ENGINEER', 0, 0, '-', '0', 'Male', 'Married', 'n/a', 0, 'Other', '081349473798', 'KTP', '0', '11.png', 1, 0, '', '', '', ''),
(17, 2024, '2013-25-13', 'Permanent', 'ATHYA', 'Ainun', '', 'Zariyah', 'Balikpapan', '1989-08-15', 'Jl. Wiluyo Puspoyudo No. 08, RT. 13', 'Balikpapan', 76112, 'Kalimantan Timur', 'Indonesia', '-', '085247661410', 'ainun@athaya-bpp.com', 'SALES ADMIN', 0, 0, '-', '0', 'Female', 'Single', 'n/a', 0, 'Mother', '085387773689', 'KTP', '6471055508890005', '11.png', 0, 0, '', '', '', ''),
(18, 2023, '2011-05-17', 'Permanent', 'ATHYA', 'Dewi', '', 'Matyasari', 'Balikpapan', '1987-03-09', 'Komp. Sepinggan Pratama Cluster Gading Mansion Blok J7 No.7', 'Balikpapan', 76114, 'Kalimantan Timur', 'Indonesia', '-', '08115931987', 'dewi.m@athaya-bpp.com', 'FINANCE STAFF', 0, 0, '59.261.823.5.721.000', '0', 'Female', 'Married', 'n/a', 0, 'Brother / Sister', '081253334399', 'KTP', '6471024903870003', '11.png', 0, 0, '', '', '', ''),
(19, 2028, '2015-01-01', 'Permanent', 'ATHYA', 'Akhmad', '', 'Subekti', 'Balikpapan', '1981-02-15', 'Jl. MT. Haryono RT.07 N0.43 Kelurahan Damai', 'Balikpapan', 76114, 'Kalimantan Timur', 'Indonesia', '-', '081253515518', 'artha.hamonangan@gmail.com', 'SALES ADMIN', 0, 0, '-', '0', 'Male', 'Divorce', 'n/a', 0, 'Other', '081347958358', 'KTP', '0', '11.png', 0, 0, '', '', '', ''),
(20, 2027, '2015-05-04', 'Permanent', 'ATHYA', 'Maulidya', '', 'P Aswid', 'Balikpapan', '1997-07-17', 'Jl. Sulawesi 1 RT. 40 NO. 22', 'Balikpapan', 76124, 'Kalimantan Timur', 'Indonesia', '-', '085654197142', 'dhea@athaya-bpp.com', 'FINANCE STAFF', 0, 0, '-', '0', 'Female', 'Single', 'n/a', 0, 'Other', '085247027796', 'KTP', '6471045707970004', 'img402.jpg', 0, 0, '', '', '', ''),
(22, 2026, '2014-10-15', 'Permanent', 'ATHYA', 'Rosna', '', 'Rosna', 'Makassar', '1988-05-23', 'Jl. Dahor Rt.53 No.56 Kel. Baru Ilir', 'Balikpapan', 0, 'Kalimantan Timur', 'Indonesia', '-', '085247797790', 'finance@athaya-bpp.com', 'FINANCE STAFF', 0, 0, '59.261.820.1-721.000', '0', 'Female', 'Single', 'n/a', 0, 'Other', '081347481110', 'KTP', '6471026305880004', 'ROSNA.jpg', 0, 0, '', '', '', ''),
(23, 2032, '2015-08-05', 'Probation', 'ATHYA', 'Yusriono', '', 'Budianto', 'Jakarta', '1966-09-29', 'Jl, Indrakila NO 9 RT 9 Gunung Samarinda\r\n', 'Balikpapan', 0, 'Kalimantan Timur', 'Indonesia', '-', '-', 'yusriono.budianto8@yahoo.com', 'DRIVER', 0, 0, '699243168008000', '0', 'Male', 'Married', 'n/a', 0, 'Husband / Wife', '081280310502', 'KTP', '3175072909660007', '11.png', 0, 0, '', '', '', ''),
(24, 2033, '2015-08-29', 'Probation', 'ATHYA', 'Abdul', '', 'Razak', 'Balikpapan', '1969-10-10', 'Jl. prapatan rt 27 no 75 balik papan kota', 'Balikpapan', 76111, 'Kalimantan Timur', 'Indonesia', '0542 7585766', '-', 'abdul.razak@outlook.com', 'DRIVER', 0, 0, '77.730.4721000', '0', 'Male', 'Married', 'n/a', 0, 'Husband / Wife', '081347669022', 'KTP', '647105 101069 0014', '11.png', 0, 0, '', '', '', ''),
(25, 2021, '2012-01-13', 'Permanent', 'ATHYA', 'Karina', '', 'Dewi', 'Balikpapan', '1990-02-27', 'Komp. BTN Gunung Empat No.19 Rt.39 Kel. Margo Mulyo', 'Balikpapan', 76114, 'Kalimantan Timur', 'Indonesia', '-', '+625428862162', 'karina@athaya-bpp.com', 'Sr. SALES ADMIN', 0, 0, '16.439.127.8-721.000', '0', 'Female', 'Single', 'n/a', 0, 'Other', '+62542765971', 'KTP', '101', 'IMG_2989.jpg', 0, 0, '', '', '', ''),
(27, 2025, '2015-01-01', 'Permanent', 'ATHYA', 'Aspian', '', 'Asmail', 'Balikpapan', '1969-06-09', 'Jl. Sulawesi Karang Rejo RT.40 No. 22 ', 'Balikpapan', 0, 'kalimantan timur', 'Indonesia', '085247027796', '085247027796', 'aspian.as693@gmail.com', 'LOGISTIC OFFICER', 0, 0, '-', '0', 'Male', 'Married', 'n/a', 0, 'Husband / Wife', '085247027796', 'KTP', '6471040906690002', '11.png', 0, 0, '', '', '', ''),
(28, 2034, '2015-01-01', 'Permanent', 'ATHYA', 'Jufry', '', 'Upy', 'Balikpapan', '1981-06-20', 'Jl. Sulawesi RT 48 No. 04 Karang Rejo ', 'Balikpapan', 0, 'kalimantan timur', 'Indonesia', '-', '081256302218', 'jufrydante@gmail.com', 'LOGISTIC OFFICER', 0, 0, '72.496.976.1-721.000', '0', 'Male', 'Single', 'n/a', 0, 'Brother / Sister', '081254513494', 'KTP', '6471042006810003', '11.png', 0, 0, '', '', '', ''),
(29, 2029, '2015-01-01', 'Permanent', 'ATHYA', 'Ben', '', 'Yus', 'Balikpapan', '1981-06-20', 'Jl. Sulawesi RT 48 No. 04 karang Rejo ', 'Balikpapan', 0, 'kalimantan timur', 'Indonesia', '-', '081256302218', 'jufrydante@gmail.com', 'Sr. LOGISTIC OFFICER', 0, 0, '72.496.976.1-721.000', '0', 'Male', 'Single', 'n/a', 0, 'Brother / Sister', '081254513494', 'KTP', '6471042006810003', '11.png', 0, 0, '', '', '', ''),
(30, 3011, '2012-02-23', 'Permanent', 'SDHTM', 'Okky', '', 'Pujaan', 'Balikpapan', '1987-04-30', 'Komplek Perum Ramayana No.4 RT.023 Kel. Batu Ampar', 'Balikpapan', 76126, 'Kalimantan Timur', 'Indonesia', '082157883004', '08115983004', 'dimas@sindhutama.co.id', 'FINANCE STAFF', 0, 0, '03.216.603.5-721.000', '0', 'Male', 'Single', 'n/a', 0, 'Other', '081214609966', 'PASSPORT', 'A 8303550', '11.png', 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employeedetail`
--

CREATE TABLE IF NOT EXISTS `employeedetail` (
`empDetailId` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employeepersonal`
--

CREATE TABLE IF NOT EXISTS `employeepersonal` (
`employeeId` int(11) unsigned NOT NULL,
  `firstName` varchar(1000) DEFAULT NULL,
  `lastName` varchar(1000) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `numberId` int(11) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `placeBirth` varchar(100) DEFAULT NULL,
  `dateBirth` varchar(100) DEFAULT NULL,
  `mobilePhone` varchar(100) DEFAULT NULL,
  `homePhone` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `martialStatus` varchar(100) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
`id_goods` int(255) NOT NULL,
  `kode_principal` int(255) NOT NULL,
  `kode_principal2` int(255) NOT NULL,
  `type_goods` varchar(1000) NOT NULL,
  `description_goods` text NOT NULL,
  `brand_goods` varchar(1000) NOT NULL,
  `part_number` varchar(1000) NOT NULL,
  `manufactured` varchar(1000) NOT NULL,
  `price_list` int(255) NOT NULL,
  `currency_goods` varchar(1000) NOT NULL,
  `remark_goods` text NOT NULL,
  `status_goods` varchar(1000) NOT NULL,
  `foto` varchar(1000) NOT NULL,
  `vis` int(10) NOT NULL,
  `create_user` varchar(1000) NOT NULL,
  `create_date` varchar(1000) NOT NULL,
  `modified_user` varchar(1000) NOT NULL,
  `modified_date` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10025 ;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id_goods`, `kode_principal`, `kode_principal2`, `type_goods`, `description_goods`, `brand_goods`, `part_number`, `manufactured`, `price_list`, `currency_goods`, `remark_goods`, `status_goods`, `foto`, `vis`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
(10001, 4005, 4006, 'VALVE', 'VALVE: BALL,TYPE TRUNNION TRIM 316SS,OPERATED', ' CAMERON', ' 3-1500BA407P', ' CAMERON', 7950, '502', 'USD', 'AVAILABLE', '', 0, '', '7 January 2015', 'Admin', '9 June 2015'),
(10002, 4005, 4006, 'VALVE', 'VALVE, BALL 2 IN; 900 ANSI; RTJ FLANGED ENDS', 'NELES-JAMESBURY', ' 2-1500BA407P', 'NELES-JAMESBURY', 3850, '502', 'VALVE, BALL 2 IN; 900 ANSI; RTJ FLANGED ENDS; FULL PORT; LEVER OPERATED; TOP ENTRY STYLE; TRUNNION BALL MOUNTING; \r\nBODY & BONNET: A216/A105 WCB/WCC; BALL & STEM: AISI 4140 ENC; SEALS: GFT; STEM SEAL: VITON O-RING; EMERGENCY \r\nSEALANT REQUIRED; . SPECIFICATIONS: -API6D MONOGRAM AND API6FA FIRE SAFE (API REGISTRATION/CERTIFICATES) -C/W \r\nTRUE MILL CERTIFICATES (ORIGINAL MILL AND TEST CERTIFICATES OR LEGALIZED STAMPED COPIED MILL/INSPECTION CERT. \r\nFROM THE MANUFACTURER.', 'AVAILABLE', '', 0, '', '7 January 2015', 'Admin', '9 June 2015'),
(10003, 4002, 0, 'MISC', 'Dell Optiplex 9010', 'DELL', 'BKZZWX1', 'DELL', 1200, '502', 'Core i7, etc', 'AVAILABLE', 'w.jpg', 0, '', '7 January 2015', 'Dimza', '7 January 2015'),
(10004, 4003, 4001, 'MISC', 'Cisco 3900 Series Routers', 'CISCO', 'CISCO3945E-SEC/K9', 'CISCO System', 9000, '502', 'The Cisco 3900 Series offers embedded hardware encryption acceleration, voice- and video-capable DSP slots, optional firewall, intrusion prevention, call processing, voicemail, and application services. In addition, the platforms support the industryâ€™s widest range of wired and wireless connectivity options such as T1/E1, T3/E3, xDSL, copper, and fiber Gigabit Ethernet.', 'AVAILABLE', 'cisco.jpg', 0, 'Dimza', '7 January 2015', 'Dimza', '7 January 2015'),
(10005, 4005, 4006, 'Instruments', 'Micro 800 series PLC', 'Allen Bradley', '2080-LC50-24QWB', 'Allen Bradley', 250, '502', 'The Allen-Bradley Micro800 PLC family, together with the Connected Components Workbench software, provides machine builders affordable convenience and ease of use, while providing the right amount of control capability to match your application needs.', 'AVAILABLE', 'micro800.png', 0, 'Dimza', '7 January 2015', 'Dhimas', '10 July 2015'),
(10006, 4005, 0, 'Instruments', 'Power Flex 753 250 HP', 'Allen Bradley', '20F1AND248AN0NNNNN', 'Allen Bradley', 16348, '502', 'Allen Bradley Power Flex 753 250 HP Variable Frequency Drive VFD', 'AVAILABLE', '20F_PowerFlex753ACDrive_right1-large_312w255h.jpg', 0, 'Dimza', '7 January 2015', 'Admin', '9 June 2015'),
(10007, 4004, 0, 'MISC', 'Thin Client nComputing L300', 'NComputing', 'L300', 'NComputing', 150, '502', 'Packages coming with only devices + adapter', 'AVAILABLE', 'ncomputing_l300.jpg', 0, 'Dimza', '7 January 2015', 'Dimza', '7 January 2015'),
(10008, 4004, 0, 'MISC', 'N-Series Product N400', 'NComputing', 'n400', 'NComputing', 350, '502', '', '', '', 0, 'Dimza', '7 January 2015', 'Dimza', '7 January 2015'),
(10009, 4004, 0, 'MISC', 'N-Series Product N500', 'NComputing', 'n500', 'NComputing', 375, '502', 'Momentum continues to grow as a result of the N-series delivering 100% of the amazingly rich HDX experience at approximately 1/3 the cost of typical HDX-capable PCs and traditional thin client devices. Powered by our third-generation dual core Numoâ„¢ 3 System-on-Chip (SoC), N-series devices support and simplify XenDesktopÂ®, XenAppÂ®, and VDI-in-a-BoxÂ® desktop and application virtualization deployments with full HD video while using less than 5 watts of power.', 'AVAILABLE', 'Product-image_N-series.png', 0, 'Dimza', '7 January 2015', 'Dimza', '7 January 2015'),
(10010, 4003, 0, 'MISC', 'CISCO IP PHONE 7960', 'CISCO', 'CP-7960G', 'CISCO System', 479, '502', 'n/a', 'AVAILABLE', 'ipphone.jpg', 0, 'Dimza', '7 January 2015', 'Dimza', '7 January 2015'),
(10011, 4006, 4006, 'Instruments', 'PUSH BOTTON STATION, MODEL: XAD-W, WITH FLAT JOINT', 'TECHNOR', 'XAD-W 121 01', 'Unknown', 0, 'USD', '"PUSH BOTTON STATION, MODEL: XAD-W, WITH FLAT JOINT\r\nP/N: XAD-W 121 01,\r\nNUMBER OF WAYS: 1 OPERATOR OR PILOT LIGHT,\r\nMATERIAL: ALUMINIUM\r\nCABLE ENTRIES DIA: 3/4IN,\r\nCABLE ENTRIES NUMBER: 1,\r\nCABLE ENTRIES POSITION: A,\r\nGROUP: IIB\r\nCERTIFICATION: Eexd,\r\nBRAND: TECHNOR"', 'AVAILABLE', '', 0, 'Admin', '9 June 2015', 'Admin', '9 June 2015'),
(10012, 4006, 4006, 'Piping', 'Deskripsi Barang Coba', 'Sempak', '123456', 'Sempak', 1000, '501', 'Coba', 'AVAILABLE', '31x-4TdJNJL._SY300_.jpg', 1, 'Admin', '9 June 2015', 'Admin', '10 June 2015'),
(10013, 4006, 4006, 'MISC', 'NON REFILLABLE GAS CYLINDER BOTTLE - O2 = 1 %', 'CALGAZ', 'n/a', 'CALGAZ', 0, '', 'NON REFILLABLE GAS CYLINDER BOTTLE\r\nCONTENT =\r\nO2 = 1 %\r\nN2 BALANCED\r\nCYLINDER SIZE = 6D\r\nPRESSURE = 1000 PSI\r\nVOL = 103L\r\nMANUFACTURED = CAL GAZ\r\n\r\nCertificate/Documentation required: MSDS and NFPA Diamond', 'UNKNOWN', '', 0, 'Dhimas', '2015-08-25', 'Dhimas', '2015-08-25'),
(10014, 4018, 4018, 'Others', 'Corrugated Box,Paperboard Sheet,Printing Offset Box', 'Unknown', 'Unknown', 'Unknown', 0, '', 'Pembuatan Kardus', 'AVAILABLE', 'index.jpg', 0, 'Dhimas', '2015-09-03', 'Dhimas', '2015-09-03'),
(10015, 4003, 4003, 'MISC', 'Switches, Routers, Wireless,  Security etc', 'Cisco', 'Unknown', 'Cisco', 0, '', 'Alat alat IT', 'AVAILABLE', 'cisco-1.jpg', 0, 'Dhimas', '2015-09-03', 'Dhimas', '2015-09-03'),
(10016, 4005, 4005, 'Electrical', 'CCTV (digital, indoor, surface mount/in-ceiling', 'Pelco', 'SD4E36-PG-E1-X', 'Schneider', 0, '', 'Unknown', 'AVAILABLE', 'pelco_1.jpg', 0, 'Dhimas', '2015-09-03', 'Aji', '2015-09-03'),
(10017, 4005, 4005, 'Electrical', 'Spectra® IV IP Series Network Dome System H.264', 'Pelco', 'SD4N-W1-X', 'Schneider', 0, '', 'DIGITAL PAN/TILT/ZOOM HIGH-SPEED DOME', 'AVAILABLE', 'pelco_2.jpg', 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03'),
(10018, 4010, 4010, 'MISC', 'Band clamping systems', 'Band it', 'Unknown', 'Unknown', 0, '', '', 'AVAILABLE', 'BAND-IT-Band.jpg', 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03'),
(10019, 4010, 4010, 'MISC', '201 Stainless Steel BAND-ITÂ® Band in Totes', 'Band-it', 'Unknown', 'Unknown', 0, '', '', 'AVAILABLE', 'BAND-IT-Totes.jpg', 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03'),
(10020, 4028, 4028, 'Chemical', 'NON REFILLABLE GAS CYLINDER BOTTLE', 'CALGAZ', 'A0194254', '', 0, '', '', 'AVAILABLE', 'calgaz.jpg', 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03'),
(10021, 4024, 4024, 'Mechanical', 'Truck Hand Pallet Grianger', 'Grainger', '4YX96', 'Grainger', 0, '', '', 'AVAILABLE', 'Hand_pallet_grainger.jpg', 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03'),
(10022, 4023, 4023, 'Electrical', 'wolf safety pen torch', 'Wolf', '625-9517', '', 0, '', '', 'AVAILABLE', 'wolf_m-20.jpg', 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03'),
(10023, 4016, 4016, 'Mechanical', 'Dia 18" Kemet Cast Iron Hand Lap Plate With Cross Hatch Groove, #360707', 'Kemet', '360707', '', 0, '', 'Dia 18" Kemet Cast Iron Hand Lap Plate With Cross Hatch Groove, #360707', 'AVAILABLE', 'kemet.jpg', 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03'),
(10024, 4011, 4011, 'Chemical', 'Cylinder & valve assembly', 'Kidde Fenwal', '81-870269-000', '', 0, '', '', 'AVAILABLE', 'Cylinder_3inch_Valve_Assembly_600_900LB_FM200.jpg', 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
`id_inv` int(255) NOT NULL,
  `noreg_inv` int(255) NOT NULL,
  `reference_no` varchar(1000) NOT NULL,
  `company_no` varchar(100) NOT NULL,
  `client_no` varchar(100) NOT NULL,
  `supplier_no` varchar(100) NOT NULL,
  `po_out` varchar(1000) NOT NULL,
  `goods_no` int(255) NOT NULL,
  `nama_barang` varchar(1000) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `date` varchar(1000) NOT NULL,
  `remark` varchar(1000) NOT NULL,
  `status` int(255) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `swh` int(10) NOT NULL,
  `vis` int(10) NOT NULL,
  `create_user` varchar(1000) NOT NULL,
  `create_date` varchar(1000) NOT NULL,
  `modified_user` varchar(1000) NOT NULL,
  `modified_date` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id_inv`, `noreg_inv`, `reference_no`, `company_no`, `client_no`, `supplier_no`, `po_out`, `goods_no`, `nama_barang`, `jumlah`, `unit`, `date`, `remark`, `status`, `foto`, `swh`, `vis`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
(12, 100012, '23424DASFSAF23', 'DWRTH', '2002', '4003', '0001/DAKA-PO/VIII/2014', 10004, 'Cisco 3900 Series Routers', 1, 'EA', '21 September 2014', 'dawdawdawd', 50, 'n/a', 100, 0, 'Dimza', '21 September 2014', 'Dimza', '21 September 2014'),
(13, 100013, '23425232WER', 'ATHYA', '2001', '4005', '0002/ABM-PO/VIII/2014', 10005, 'Micro 800 series PLC', 1, 'SET', '21 September 2014', 'adwdawdawd', 50, '94603-1.jpg', 100, 0, 'Dimza', '21 September 2014', 'Dimza', '21 September 2014'),
(14, 100014, '2341/THS-PO/VII/2014', 'ATHYA', '2002', '4003', 'n/a', 10004, 'Cisco 3900 Series Routers', 1, 'SET', '21 September 2014', 'dawdawdawd', 50, 'n/a', 200, 0, 'Dimza', '21 September 2014', 'Dimza', '21 September 2014'),
(19, 100019, '5245/CVRN-PO/VIII/2014', 'DWRTH', '2001', '4005', 'n/a', 10005, 'Micro 800 series PLC', 5, 'EA', '', '', 50, 'n/a', 200, 0, 'Dimza', '6 October 2014', 'Dimza', '6 October 2014'),
(22, 100022, 'FLW-94323-223', 'SDHTM', '2005', '4003', 'n/a', 10010, 'CISCO IP PHONE 7960', 2, 'SET', '10 October 2014', 'dicoba bole yah........................', 50, 'ipphone.jpg', 200, 1, 'Dimza', '10 October 2014', 'Dimza', '10/10/2014'),
(23, 100023, 'FLW-94323-223', 'SDHTM', '2005', '4003', 'n/a', 10010, 'CISCO IP PHONE 7960', 2, 'SET', '10 October 2014', 'di coba', 50, 'ipphone-1.jpg', 200, 0, 'Dimza', '10 October 2014', 'Dimza', '10 October 2014');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
`id_invoice` int(11) unsigned NOT NULL,
  `no_invoice` varchar(1000) DEFAULT NULL,
  `no_reference` varchar(100) DEFAULT NULL,
  `no_do` varchar(100) DEFAULT NULL,
  `kode_company` varchar(100) DEFAULT NULL,
  `no_client` int(11) DEFAULT NULL,
  `no_currency` int(11) DEFAULT NULL,
  `date_invoice` varchar(100) DEFAULT NULL,
  `days_expired` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `remark` varchar(1000) DEFAULT NULL,
  `vis` int(11) DEFAULT NULL,
  `create_user` varchar(100) DEFAULT NULL,
  `create_date` varchar(100) DEFAULT NULL,
  `modified_user` varchar(100) DEFAULT NULL,
  `modified_date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `no_invoice`, `no_reference`, `no_do`, `kode_company`, `no_client`, `no_currency`, `date_invoice`, `days_expired`, `tax`, `status`, `remark`, `vis`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
(4, '0001/CVSS-INV/XI/2014', '4234234234', '0001/CVSS-DO/X/2014', 'SDHTM', 2001, 502, '4/11/2014', 30, 10, 10, 'dawdawdawdawd', 0, 'Dimza', '4/11/2014', 'Dimza', '4/11/2014');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_list`
--

CREATE TABLE IF NOT EXISTS `invoice_list` (
`id_invoice_list` int(255) NOT NULL,
  `invoice_no` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `part_number` varchar(1000) NOT NULL,
  `goods_no` varchar(1000) NOT NULL,
  `qty` int(255) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `price` int(255) NOT NULL,
  `sub_price` int(255) NOT NULL,
  `matauang` varchar(1000) NOT NULL,
  `tax` int(255) NOT NULL,
  `status` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invo_abm`
--

CREATE TABLE IF NOT EXISTS `invo_abm` (
`id_invo_abm` int(255) NOT NULL,
  `kode_company` varchar(100) NOT NULL,
  `no_invo_abm` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `invo_abm`
--

INSERT INTO `invo_abm` (`id_invo_abm`, `kode_company`, `no_invo_abm`) VALUES
(1, 'ATHYA', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `invo_dk`
--

CREATE TABLE IF NOT EXISTS `invo_dk` (
`id_invo_dk` int(255) NOT NULL,
  `kode_company` varchar(100) NOT NULL,
  `no_invo_dk` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `invo_dk`
--

INSERT INTO `invo_dk` (`id_invo_dk`, `kode_company`, `no_invo_dk`) VALUES
(1, 'DWRTH', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `invo_ps`
--

CREATE TABLE IF NOT EXISTS `invo_ps` (
`id_invo_ps` int(255) NOT NULL,
  `kode_company` varchar(100) NOT NULL,
  `no_invo_ps` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `invo_ps`
--

INSERT INTO `invo_ps` (`id_invo_ps`, `kode_company`, `no_invo_ps`) VALUES
(1, 'PGSUS', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `invo_ss`
--

CREATE TABLE IF NOT EXISTS `invo_ss` (
`id_invo_ss` int(255) NOT NULL,
  `kode_company` varchar(100) NOT NULL,
  `no_invo_ss` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `invo_ss`
--

INSERT INTO `invo_ss` (`id_invo_ss`, `kode_company`, `no_invo_ss`) VALUES
(1, 'SDHTM', '0000'),
(4, 'SDHTM', '0001');

-- --------------------------------------------------------

--
-- Table structure for table `letter`
--

CREATE TABLE IF NOT EXISTS `letter` (
`id_letter` int(255) NOT NULL,
  `letter_no` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `kode_company` varchar(100) NOT NULL,
  `instansi` varchar(1000) NOT NULL,
  `tanggal` varchar(1000) NOT NULL,
  `remark` text NOT NULL,
  `vis` int(10) NOT NULL,
  `create_user` varchar(100) NOT NULL,
  `create_date` varchar(1000) NOT NULL,
  `modified_user` varchar(100) NOT NULL,
  `modified_date` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `letter`
--

INSERT INTO `letter` (`id_letter`, `letter_no`, `description`, `kode_company`, `instansi`, `tanggal`, `remark`, `vis`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
(1, '0001/CVSS-SP/IX/2014', '', 'SDHTM', '', '20 September 2014', 'Coba sajaklah', 1, 'Dimza', '20/09/2014', 'Dimza', '7/10/2014'),
(2, '0001/DAKA-SP/IX/2014', 'Surat Permohonan Supplai Terlambat', 'DWRTH', '', '20/09/2014', 'halo..........', 0, 'Dimza', '20/09/2014', 'Dimza', '20/09/2014'),
(3, '0002/CVSS-SP/IX/2014', 'Surat Kuasa Bank Mandiri', 'SDHTM', '', '21/09/2014', 'Cobaaaaaaaa', 0, 'Dimza', '21/09/2014', 'Dimza', '21/09/2014');

-- --------------------------------------------------------

--
-- Table structure for table `letternumber`
--

CREATE TABLE IF NOT EXISTS `letternumber` (
`idLetterNumber` int(255) unsigned NOT NULL,
  `letterNum` varchar(1000) DEFAULT NULL,
  `idCompany` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `letternumber`
--

INSERT INTO `letternumber` (`idLetterNumber`, `letterNum`, `idCompany`) VALUES
(1, '0000', 'ATHYA'),
(2, '0000', 'DWRTH'),
(3, '0000', 'PGSUS'),
(4, '0000', 'SDHTM'),
(5, '0001', 'DWRTH'),
(6, '0001', 'SDHTM'),
(7, '0002', 'SDHTM');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE IF NOT EXISTS `notif` (
`id_notif` int(11) unsigned NOT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id_notif`, `description`) VALUES
(1, 'coba update'),
(2, 'bagus juga');

-- --------------------------------------------------------

--
-- Table structure for table `opportunity`
--

CREATE TABLE IF NOT EXISTS `opportunity` (
`opportunityId` int(11) unsigned NOT NULL,
  `opportunityNo` varchar(1000) DEFAULT NULL,
  `quoteId` int(11) DEFAULT NULL,
  `clientId` int(255) DEFAULT NULL,
  `contactId` int(100) DEFAULT NULL,
  `currencyId` int(11) DEFAULT NULL,
  `employeeId` int(255) NOT NULL,
  `opportunityType` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `values` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `vis` int(11) DEFAULT NULL,
  `userId` varchar(100) DEFAULT NULL,
  `modDate` varchar(100) DEFAULT NULL,
  `closeDate` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1002 ;

--
-- Dumping data for table `opportunity`
--

INSERT INTO `opportunity` (`opportunityId`, `opportunityNo`, `quoteId`, `clientId`, `contactId`, `currencyId`, `employeeId`, `opportunityType`, `description`, `values`, `status`, `vis`, `userId`, `modDate`, `closeDate`) VALUES
(1001, 'OPTY-00-1001', 0, 2002, 9001, 502, 2023, 'PRODUCTS', 'OR4701388 - Stainless Tube Bar', 1000, 'open', 0, '108', '21 July 2014', '21 July 2016');

-- --------------------------------------------------------

--
-- Table structure for table `po_abm_out`
--

CREATE TABLE IF NOT EXISTS `po_abm_out` (
`id_po_abm_out` int(255) NOT NULL,
  `kode_company` varchar(1000) NOT NULL,
  `no_po_abm_out` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `po_abm_out`
--

INSERT INTO `po_abm_out` (`id_po_abm_out`, `kode_company`, `no_po_abm_out`) VALUES
(1, 'ATHYA', '0000'),
(2, 'ATHYA', '0001'),
(3, 'ATHYA', '0002'),
(4, 'ATHYA', '0003'),
(5, 'ATHYA', '0004');

-- --------------------------------------------------------

--
-- Table structure for table `po_dk_out`
--

CREATE TABLE IF NOT EXISTS `po_dk_out` (
`id_po_dk_out` int(255) NOT NULL,
  `kode_company` varchar(1000) NOT NULL,
  `no_po_dk_out` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `po_dk_out`
--

INSERT INTO `po_dk_out` (`id_po_dk_out`, `kode_company`, `no_po_dk_out`) VALUES
(1, 'DWRTH', '0000'),
(2, 'DWRTH', '0001'),
(3, 'DWRTH', '0002'),
(4, 'DWRTH', '0003'),
(5, 'DWRTH', '0004'),
(6, 'DWRTH', '0005'),
(7, 'DWRTH', '0006');

-- --------------------------------------------------------

--
-- Table structure for table `po_ps_out`
--

CREATE TABLE IF NOT EXISTS `po_ps_out` (
`id_po_ps_out` int(255) NOT NULL,
  `kode_company` varchar(1000) NOT NULL,
  `no_po_ps_out` varchar(1000) NOT NULL DEFAULT ''
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `po_ps_out`
--

INSERT INTO `po_ps_out` (`id_po_ps_out`, `kode_company`, `no_po_ps_out`) VALUES
(1, 'PGSUS', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `po_ss_out`
--

CREATE TABLE IF NOT EXISTS `po_ss_out` (
`id_po_ss_out` int(255) NOT NULL,
  `kode_company` varchar(1000) NOT NULL,
  `no_po_ss_out` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `po_ss_out`
--

INSERT INTO `po_ss_out` (`id_po_ss_out`, `kode_company`, `no_po_ss_out`) VALUES
(1, 'SDHTM', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseint`
--

CREATE TABLE IF NOT EXISTS `purchaseint` (
`idPurchaseInt` int(255) NOT NULL,
  `idCompany` int(11) NOT NULL,
  `idSupplier` int(11) NOT NULL,
  `idCurrency` int(11) NOT NULL,
  `tittle` text NOT NULL,
  `dateCreated` date NOT NULL,
  `tax` int(11) NOT NULL,
  `remark` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `vis` int(11) NOT NULL,
  `modUser` int(11) NOT NULL,
  `modDate` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1112 ;

--
-- Dumping data for table `purchaseint`
--

INSERT INTO `purchaseint` (`idPurchaseInt`, `idCompany`, `idSupplier`, `idCurrency`, `tittle`, `dateCreated`, `tax`, `remark`, `status`, `payment`, `vis`, `modUser`, `modDate`) VALUES
(1111, 1, 4013, 501, 'Pembelian Glassboard', '2015-09-01', 10, 'Barang di kirimkan ke forwarder kita di jakarta.', '10', '0', 0, 3013, '2015-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseint_list`
--

CREATE TABLE IF NOT EXISTS `purchaseint_list` (
`idPurIntList` int(255) NOT NULL,
  `idPurchaseInt` int(11) NOT NULL,
  `idCurrency` int(11) NOT NULL,
  `idGoods` int(11) NOT NULL,
  `description` text NOT NULL,
  `partNumber` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `subPrice` varchar(100) NOT NULL,
  `tax` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE IF NOT EXISTS `quote` (
`id_quote` int(255) NOT NULL,
  `client_no` int(255) NOT NULL,
  `company_no` varchar(1000) NOT NULL,
  `kode` int(10) NOT NULL,
  `currency_no` int(255) NOT NULL,
  `quote_no` varchar(1000) NOT NULL,
  `reference_no` varchar(1000) NOT NULL,
  `date` varchar(1000) NOT NULL,
  `dateQts` date NOT NULL,
  `expired_days` int(255) NOT NULL,
  `create_user` varchar(1000) NOT NULL,
  `create_date` varchar(1000) NOT NULL,
  `tax` int(255) NOT NULL,
  `file_doc` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `vis` int(255) NOT NULL,
  `remark` text NOT NULL,
  `modified_user` varchar(1000) NOT NULL,
  `modified_date` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`id_quote`, `client_no`, `company_no`, `kode`, `currency_no`, `quote_no`, `reference_no`, `date`, `dateQts`, `expired_days`, `create_user`, `create_date`, `tax`, `file_doc`, `status`, `vis`, `remark`, `modified_user`, `modified_date`) VALUES
(53, 2002, 'SDHTM', 1, 502, '0020/CVSS-QTS/IX/2014', 'KDG007152', '21 September 2014', '0000-00-00', 30, 'Dimza', '21/09/2014', 10, '', '11', 0, 'haloooooo', 'Dimza', '21/09/2014'),
(54, 2001, 'SDHTM', 1, 502, '0021/CVSS-QTS/X/2014', 'KDG007000', '2/10/2014', '0000-00-00', 30, 'Dimza', '2/10/2014', 10, '', '12', 0, 'coba lagi di hari ini', 'Dimza', '2/10/2014'),
(55, 2001, 'SDHTM', 1, 502, '0022/CVSS-QTS/X/2014', 'KDG007000', '2/10/2014', '0000-00-00', 30, 'Dimza', '2/10/2014', 10, '', '10', 0, 'coba lagi', 'Dimza', '2/10/2014'),
(56, 2001, 'SDHTM', 1, 502, '0023/CVSS-QTS/X/2014', 'KDG007000', '05 October 2014', '0000-00-00', 30, 'Dimza', '5/10/2014', 10, '', '11', 0, 'dawdawd', 'Dimza', '5/10/2014'),
(57, 2001, 'SDHTM', 1, 502, '0024/CVSS-QTS/X/2014', 'KDG34234', '05 October 2014', '0000-00-00', 30, 'Dimza', '5/10/2014', 10, '', '13', 0, 'haloooo', 'Dimza', '5/10/2014'),
(58, 2001, 'SDHTM', 1, 502, '0025/CVSS-QTS/X/2014', 'KDG34234', '05 October 2014', '0000-00-00', 30, 'Dimza', '5/10/2014', 10, '', '12', 0, 'HALOOOOOOOO', 'Dimza', '5/10/2014'),
(59, 2001, 'SDHTM', 1, 502, '0026/CVSS-QTS/X/2014', 'KDG006666', '16/10/2014', '0000-00-00', 30, 'Dimza', '16/10/2014', 0, '', '13', 0, 'NO VAT bla bla bla bla', 'Dimza', '16/10/2014'),
(60, 2001, 'SDHTM', 1, 502, '0027/CVSS-QTS/II/2015', '565657575', '5 February 2015', '0000-00-00', 30, 'Dimza', '5 February 2015', 10, '', '10', 0, 'tax vat.....', 'Dimza', '5 February 2015'),
(61, 2001, 'DWRTH', 3, 502, '0006/DAKA-QTS/III/2015', 'KDG342346', '9 March 2015', '0000-00-00', 30, 'Dimza', '9 March 2015', 10, '', '15', 0, 'tes', 'Dimza', '9 March 2015'),
(62, 2001, 'DWRTH', 3, 502, '0007/DAKA-QTS/III/2015', 'KDG342346', '9 March 2015', '0000-00-00', 30, 'Dimza', '9 March 2015', 10, 'quote_for_PT._NBI-1.pdf', '14', 0, 'test lagi', 'Dimza', '9 March 2015'),
(63, 2001, 'SDHTM', 1, 502, '0028/CVSS-QTS/VI/2015', '123456789', '08 June 2015', '0000-00-00', 30, 'Admin', '8 June 2015', 10, '2_20-_20RFQ.pdf', '14', 0, 'TEs ajah dulu ya kan!', 'Admin', '8 June 2015'),
(64, 2003, 'PGSUS', 4, 503, '0001/PGSUS-QTS/VI/2015', '', '10 June 2015', '0000-00-00', 30, 'Aji', '10 June 2015', 10, '0', '11', 0, 'VAT not Included', 'Aji', '10 June 2015'),
(65, 2001, 'SDHTM', 1, 502, '0029/CVSS-QTS/VI/2015', '76069 2WHPNJ (Coupling Pump)', '25 June 2015', '0000-00-00', 5, 'Aji', '26 June 2015', 10, 'invoice_Chevron0001_12Jun2015.xlsx', '10', 0, 'Finish', 'Aji', '26 June 2015'),
(66, 2003, 'ATH', 5, 502, '0001/ATH-QTS//2015', '0123456789', '', '2015-09-04', 30, 'Dhimas', '2015-09-04', 10, '0', '10', 0, 'n/a', 'Dhimas', '2015-09-04'),
(67, 2001, 'ATH', 5, 502, '0001/ATH-QTS/IX/2015', '123456789', '', '2015-09-21', 30, 'Dhimas', '2015-09-21', 10, '0', '10', 0, 'adawdadadawd ', 'Dhimas', '2015-09-21'),
(68, 2002, 'SDHTM', 1, 502, '0001/CVSS-QTS/IX/2015', '123456789', '', '2015-09-21', 30, 'Dhimas', '2015-09-21', 10, '0', '10', 0, 'Referensi dari Pak Ade Lili', 'Dhimas', '2015-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `quotenum`
--

CREATE TABLE IF NOT EXISTS `quotenum` (
`idQuoteNum` int(255) unsigned NOT NULL,
  `quoteNum` varchar(100) DEFAULT NULL,
  `idCompany` varchar(100) DEFAULT NULL,
  `noCompany` int(11) unsigned NOT NULL,
  `year` int(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `quotenum`
--

INSERT INTO `quotenum` (`idQuoteNum`, `quoteNum`, `idCompany`, `noCompany`, `year`) VALUES
(1, '0000', 'ATHYA', 2, 2014),
(2, '0000', 'DWRTH', 3, 2014),
(3, '0000', 'PGSUS', 4, 2014),
(4, '0000', 'SDHTM', 1, 2014),
(5, '0000', 'ATH', 5, 2014),
(6, '0000', 'TEKRAJ', 6, 2014),
(27, '0000', 'SDHTM', 1, 2015),
(28, '0000', 'ATHYA', 2, 2015),
(29, '0000', 'DWRTH', 3, 2015),
(30, '0000', 'PGSUS', 4, 2015),
(31, '0000', 'ATH', 5, 2015),
(32, '0000', 'TEKRAJ', 6, 2015),
(33, '0001', 'ATH', 5, NULL),
(34, '0000', 'SDHTM', 1, 2015),
(35, '0000', 'ATHYA', 2, 2015),
(36, '0000', 'DWRTH', 3, 2015),
(37, '0000', 'PGSUS', 4, 2015),
(38, '0000', 'ATH', 5, 2015),
(39, '0000', 'TEKRAJ', 6, 2015),
(40, '0001', 'ATH', 5, NULL),
(41, '0000', 'SDHTM', 1, 2015),
(42, '0000', 'ATHYA', 2, 2015),
(43, '0000', 'DWRTH', 3, 2015),
(44, '0000', 'PGSUS', 4, 2015),
(45, '0000', 'ATH', 5, 2015),
(46, '0000', 'TEKRAJ', 6, 2015),
(47, '0001', 'SDHTM', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quote_abm`
--

CREATE TABLE IF NOT EXISTS `quote_abm` (
`id_quote_abm` int(255) NOT NULL,
  `kode_company` varchar(100) NOT NULL,
  `no_quote_abm` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `quote_abm`
--

INSERT INTO `quote_abm` (`id_quote_abm`, `kode_company`, `no_quote_abm`) VALUES
(1, 'ATHYA', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `quote_dk`
--

CREATE TABLE IF NOT EXISTS `quote_dk` (
`id_quote_dk` int(255) NOT NULL,
  `kode_company` varchar(100) NOT NULL,
  `no_quote_dk` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `quote_dk`
--

INSERT INTO `quote_dk` (`id_quote_dk`, `kode_company`, `no_quote_dk`) VALUES
(1, 'DWRTH', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `quote_list`
--

CREATE TABLE IF NOT EXISTS `quote_list` (
`id_quote_list` int(255) NOT NULL,
  `quote_no` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `part_number` varchar(1000) NOT NULL,
  `goods_no` varchar(1000) NOT NULL,
  `qty` int(255) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `price` int(255) NOT NULL,
  `sub_price` int(255) NOT NULL,
  `matauang` varchar(1000) NOT NULL,
  `tax` int(255) NOT NULL,
  `margin` varchar(1000) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `date_create` varchar(1000) NOT NULL DEFAULT '',
  `user_create` varchar(1000) NOT NULL DEFAULT ''
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `quote_list`
--

INSERT INTO `quote_list` (`id_quote_list`, `quote_no`, `description`, `part_number`, `goods_no`, `qty`, `unit`, `price`, `sub_price`, `matauang`, `tax`, `margin`, `status`, `date_create`, `user_create`) VALUES
(18, '0009/SS-QTS/07/2014', 'Resource id #6', 'Resource id #7', '10001', 10, 'EA', 4500, 45000, '', 0, '', '', '', ''),
(19, '0009/SS-QTS/07/2014', '', '', '10001', 10, 'EA', 4500, 45000, '', 0, '', '', '', ''),
(20, '0009/SS-QTS/07/2014', 'Resource id #6', 'Resource id #7', '10001', 10, 'EA', 4500, 45000, '', 0, '', '', '', ''),
(21, '0009/SS-QTS/07/2014', 'Resource id #6', 'Resource id #7', '10001', 10, 'EA', 4500, 45000, '', 0, '', '', '', ''),
(22, '0009/SS-QTS/07/2014', 'Resource id #6', 'Resource id #7', '10001', 10, 'EA', 4500, 45000, '', 0, '', '', '', ''),
(23, '0009/SS-QTS/07/2014', 'Resource id #6', 'Resource id #7', '10001', 10, 'EA', 4500, 45000, '', 0, '', '', '', ''),
(24, '0009/SS-QTS/07/2014', 'Resource id #5', 'Resource id #6', '10001', 10, 'EA', 4500, 45000, '', 0, '', '', '', ''),
(25, '0010/SS-QTS/07/2014', 'Resource id #6', 'Resource id #7', '10002', 15, 'EA', 2345, 35175, '', 0, '', '', '', ''),
(36, '0012/SS-QTS/07/2014', 'Resource id #7', 'Resource id #8', '10001', 12, 'EA', 12, 144, '', 0, '', '', '', ''),
(37, '0012/SS-QTS/07/2014', 'Resource id #7', 'Resource id #8', '10002', 12, 'EA', 123, 1476, '', 0, '', '', '', ''),
(38, '0003/ABM-QTS/07/2014', 'Resource id #6', 'Resource id #7', '10001', 1234, 'EA', 12, 14808, '', 10, '', '', '', ''),
(43, '0006/ABM-QTS/07/2014', 'Resource id #6', 'Resource id #7', '10001', 12, 'EA', 12, 144, '', 0, '', '', '', ''),
(44, '0006/ABM-QTS/07/2014', 'Resource id #7', 'Resource id #8', '10001', 12, 'EA', 12, 144, '', 0, '', '', '', ''),
(45, '0006/ABM-QTS/07/2014', 'Resource id #7', 'Resource id #8', '10001', 12, 'EA', 12, 144, '', 0, '', '', '', ''),
(46, '0006/ABM-QTS/07/2014', 'Resource id #7', 'Resource id #8', '10001', 12, 'EA', 12, 144, '', 0, '', '', '', ''),
(47, '0013/SS-QTS/07/2014', 'Resource id #8', 'Resource id #9', '10001', 12, 'EA', 1200, 14400, '', 10, '', '', '', ''),
(48, '0013/SS-QTS/07/2014', '', '', '10002', 45, 'EA', 545, 24525, '', 10, '', '', '', ''),
(49, '0007/ABM-QTS/08/2014', 'Resource id #8', 'Resource id #9', '10003', 5, 'SET', 1200, 6000, '', 10, '', '', '', ''),
(50, '0014/SS-QTS/08/2014', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 12, 'SET', 1000, 12000, '', 0, '', '', '', ''),
(51, '0005/ABM-QTS/07/2014', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 10, 'SET', 1000, 10000, '', 0, '', '', '', ''),
(55, '0005/ABM-QTS/07/2014', 'VALVE, BALL 2 IN; 900 ANSI; RTJ FLANGED \r\nENDS', ' 2"-G900-M-73-2200GV-5-08', '10002', 5, 'EA', 150, 750, '', 0, '', '', '', ''),
(58, '0002/SS-QTS/07/2014', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 10, 'SET', 1200, 12000, '', 10, '', '', '', ''),
(60, '0016/SS-QTS/08/2014', 'Cisco 3900 Series Routers', 'CISCO3945E-SEC/K9', '10004', 2, 'UNIT', 110000000, 220000000, '', 10, '', '', '', ''),
(61, '0002/ABM-QTS/07/2014', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 0, '', 1200, 0, 'USD', 0, '', '', '', ''),
(63, '0002/ABM-QTS/07/2014', 'VALVE, BALL 2 IN; 900 ANSI; RTJ FLANGED \r\nENDS', ' 2"-G900-M-73-2200GV-5-08', '10002', 2, 'EA', 3850, 7700, 'USD', 0, '', '', '', ''),
(67, '', '', '', '', 0, '', 0, 0, '', 0, '', '', '', ''),
(68, '', '', '', '', 0, '', 0, 0, '', 0, '', '', '', ''),
(69, '0002/DK-QTS/08/2014', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 12, 'EA', 8000000, 96000000, 'IDR', 10, '', '', '', ''),
(70, '0016/SS-QTS/08/2014', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 5, 'UNIT', 9000000, 45000000, 'IDR', 10, '', '', '', ''),
(71, '0008/ABM-QTS/08/2014', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 2, 'EA', 1200, 2400, 'USD', 0, '', '', '', ''),
(72, '0003/DAKA-QTS/08/2014', 'Cisco 3900 Series Routers', 'CISCO3945E-SEC/K9', '10004', 2, 'UNIT', 9000, 18000, 'USD', 10, '', '', '', ''),
(73, '0004/DAKA-QTS/VIII/2014', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 5, 'SET', 1200, 6000, 'USD', 0, '', '', '', ''),
(74, '0017/CVSS-QTS/VX/2014', 'VALVE, BALL 2 IN; 900 ANSI; RTJ FLANGED \r\nENDS', ' 2"-G900-M-73-2200GV-5-08', '10002', 2, 'EA', 3850, 7700, '', 0, '', '', '', ''),
(75, '0001/DK-QTS/08/2014', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 5, 'SET', 13500000, 67500000, '', 10, '', '', '', ''),
(76, '0005/DAKA-QTS/IX/2014', 'Micro 800 series PLC', '2080-LC50-24QWB', '10005', 5, 'EA', 385, 1925, '502', 10, '', '', '', ''),
(78, '0019/CVSS-QTS/IX/2014', 'Thin Client Devices nComputing L300', 'L300', '10007', 2, 'EA', 345, 690, '502', 10, '', '', '', ''),
(79, '0020/CVSS-QTS/IX/2014', 'Cisco 3900 Series Routers', 'CISCO3945E-SEC/K9', '10004', 1, 'SET', 9000, 9000, '502', 10, '', '', '', ''),
(80, '0021/CVSS-QTS/X/2014', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 5, 'SET', 1758, 8790, '502', 10, '', '', '', ''),
(82, '0021/CVSS-QTS/X/2014', 'Micro 800 series PLC', '2080-LC50-24QWB', '10005', 2, 'EA', 298, 596, '502', 10, '', '', '', ''),
(83, '0023/CVSS-QTS/X/2014', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 3, 'SET', 1200, 3600, '502', 10, '', '', '', ''),
(84, '0024/CVSS-QTS/X/2014', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 2, 'SET', 1200, 2400, 'USD', 10, '', '', '', ''),
(85, '0025/CVSS-QTS/X/2014', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 2, 'SET', 1200, 2400, '502', 10, '', '', '', ''),
(86, '0025/CVSS-QTS/X/2014', 'Cisco 3900 Series Routers', 'CISCO3945E-SEC/K9', '10004', 1, 'EA', 9000, 9000, '502', 10, '', '', '', ''),
(87, '0026/CVSS-QTS/X/2014', 'Cisco 3900 Series Routers', 'CISCO3945E-SEC/K9', '10004', 1, 'UNIT', 9789, 9789, '502', 0, '', '10', '', ''),
(88, '0026/CVSS-QTS/X/2014', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 5, 'SET', 1352, 6760, '502', 0, '', '10', '', ''),
(91, '0027/CVSS-QTS/II/2015', 'Micro 800 series PLC', '2080-LC50-24QWB', '10005', 2, 'EA', 300, 600, '502', 10, '', '', '', ''),
(92, '0001/DK-QTS/08/2014', 'Thin Client nComputing L300', 'L300', '10007', 10, 'EA', 1500000, 15000000, '501', 10, '', '111', '', ''),
(93, '0006/DAKA-QTS/III/2015', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 5, 'SET', 1450, 7250, '502', 10, '', '111', '', ''),
(94, '0001/PGSUS-QTS/VI/2015', 'Micro 800 series PLC', '2080-LC50-24QWB', '10005', 7, 'EA', 650, 4550, '503', 10, '', '111', '', ''),
(95, '0001/PGSUS-QTS/VI/2015', 'Power Flex 753 250 HP', '20F1AND248AN0NNNNN', '10006', 2, 'EA', 16348, 32696, '503', 0, '', '111', '', ''),
(96, '0007/DAKA-QTS/III/2015', 'Cisco 3900 Series Routers', 'CISCO3945E-SEC/K9', '10004', 3, 'UNIT', 9500, 28500, '502', 10, '', '111', '', ''),
(97, '0001/ATH-QTS//2015', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 3, 'SET', 1200, 3600, '502', 10, '', '111', '', ''),
(98, '0001/ATH-QTS//2015', 'Cisco 3900 Series Routers', 'CISCO3945E-SEC/K9', '10004', 2, 'SET', 9000, 18000, '502', 0, '', '111', '', ''),
(99, '0001/ATH-QTS//2015', 'Thin Client nComputing L300', 'L300', '10007', 7, 'EA', 150, 1050, '502', 0, '', '111', '', ''),
(100, '0001/CVSS-QTS/IX/2015', 'Dell Optiplex 9010', 'BKZZWX1', '10003', 13, 'SET', 1250, 16250, '502', 10, '', '111', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `quote_ps`
--

CREATE TABLE IF NOT EXISTS `quote_ps` (
`id_quote_ps` int(255) NOT NULL,
  `kode_company` varchar(100) NOT NULL,
  `no_quote_ps` varchar(1000) NOT NULL DEFAULT ''
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `quote_ps`
--

INSERT INTO `quote_ps` (`id_quote_ps`, `kode_company`, `no_quote_ps`) VALUES
(1, 'SDHTM', '0000'),
(2, 'PGSUS', '0001');

-- --------------------------------------------------------

--
-- Table structure for table `quote_ss`
--

CREATE TABLE IF NOT EXISTS `quote_ss` (
`id_quote_ss` int(255) NOT NULL,
  `kode_company` varchar(100) NOT NULL,
  `no_quote_ss` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `quote_ss`
--

INSERT INTO `quote_ss` (`id_quote_ss`, `kode_company`, `no_quote_ss`) VALUES
(1, 'SDHTM', '0000'),
(2, 'SDHTM', '0001'),
(3, 'SDHTM', '0002'),
(4, 'SDHTM', '0003'),
(5, 'SDHTM', '0004'),
(6, 'SDHTM', '0005'),
(7, 'SDHTM', '0006'),
(8, 'SDHTM', '0007'),
(9, 'SDHTM', '0008'),
(10, 'SDHTM', '0009'),
(11, 'SDHTM', '0010'),
(12, 'SDHTM', '0011'),
(13, 'SDHTM', '0012'),
(14, 'SDHTM', '0013'),
(15, 'SDHTM', '0014'),
(16, 'SDHTM', '0015'),
(17, 'SDHTM', '0016'),
(18, 'SDHTM', '0017'),
(19, 'SDHTM', '0018'),
(20, 'SDHTM', '0019'),
(21, 'SDHTM', '0020'),
(22, 'SDHTM', '0021'),
(23, 'SDHTM', '0022'),
(24, 'SDHTM', '0023'),
(25, 'SDHTM', '0024'),
(26, 'SDHTM', '0025'),
(27, 'SDHTM', '0026'),
(28, 'SDHTM', '0027'),
(29, 'SDHTM', '0028'),
(30, 'SDHTM', '0029');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
`id_stock` int(255) NOT NULL,
  `goods_no` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `remark` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL,
  `vis` int(10) NOT NULL,
  `swh` int(10) NOT NULL,
  `create_user` varchar(100) NOT NULL,
  `create_date` varchar(100) NOT NULL,
  `modified_user` varchar(100) NOT NULL,
  `modified_date` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id_stock`, `goods_no`, `qty`, `unit`, `remark`, `status`, `vis`, `swh`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
(1, 10004, 2, 'SET', 'nda da', '60', 0, 0, 'Dimza', '21 September 2014', 'Dimza', '21 September 2014'),
(2, 10003, 13, 'SET', 'Coba', '61', 0, 0, 'Dimza', '21 September 2014', 'Dimza', '21 September 2014'),
(3, 10005, 5, 'EA', 'coba lagi', '61', 0, 0, 'Dimza', '21 September 2014', 'Dimza', '21 September 2014'),
(4, 10007, 2, 'EA', 'coba yah', '60', 0, 0, 'Dimza', '21 September 2014', 'Dimza', '21 September 2014'),
(5, 10010, 2, 'SET', '', '61', 0, 0, 'Dimza', 'Friday 10th of October 2014 03:18:05 AM', 'Dimza', 'Friday 10th of October 2014 03:18:05 AM'),
(6, 10011, 0, 'unit', '', '61', 0, 0, 'Admin', '9 June 2015', 'Admin', '9 June 2015'),
(7, 10012, 0, 'unit', '', '61', 0, 0, 'Admin', '9 June 2015', 'Admin', '9 June 2015'),
(8, 10013, 0, 'unit', '', '61', 0, 0, 'Admin', '9 June 2015', 'Admin', '9 June 2015'),
(9, 10014, 0, 'unit', '', '61', 0, 0, 'Admin', '9 June 2015', 'Admin', '9 June 2015'),
(10, 10015, 0, 'unit', '', '61', 0, 0, 'Admin', '9 June 2015', 'Admin', '9 June 2015'),
(11, 10012, 0, 'unit', '', '61', 0, 0, 'Admin', '9 June 2015', 'Admin', '9 June 2015'),
(12, 10013, 0, 'unit', '', '61', 0, 0, 'Dhimas', '2015-08-25', 'Dhimas', '2015-08-25'),
(13, 10014, 0, 'unit', '', '61', 0, 0, 'Dhimas', '2015-09-03', 'Dhimas', '2015-09-03'),
(14, 10015, 0, 'unit', '', '61', 0, 0, 'Dhimas', '2015-09-03', 'Dhimas', '2015-09-03'),
(15, 10016, 0, 'unit', '', '61', 0, 0, 'Dhimas', '2015-09-03', 'Dhimas', '2015-09-03'),
(16, 10017, 0, 'unit', '', '61', 0, 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03'),
(17, 10018, 0, 'unit', '', '61', 0, 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03'),
(18, 10019, 0, 'unit', '', '61', 0, 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03'),
(19, 10020, 0, 'unit', '', '61', 0, 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03'),
(20, 10021, 0, 'unit', '', '61', 0, 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03'),
(21, 10022, 0, 'unit', '', '61', 0, 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03'),
(22, 10023, 0, 'unit', '', '61', 0, 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03'),
(23, 10024, 0, 'unit', '', '61', 0, 0, 'Aji', '2015-09-03', 'Aji', '2015-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id_supplier` int(255) NOT NULL,
  `noreg_supplier` int(255) NOT NULL,
  `nama_supplier` varchar(1000) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `kota_supplier` varchar(1000) NOT NULL,
  `kodepos_supplier` int(255) NOT NULL,
  `propinsi_supplier` varchar(1000) NOT NULL,
  `negara_supplier` varchar(1000) NOT NULL,
  `telpon_supplier` varchar(1000) NOT NULL,
  `fax_supplier` varchar(100) NOT NULL,
  `email_supplier` varchar(1000) NOT NULL,
  `situs` varchar(100) NOT NULL,
  `productBrand` text,
  `tags` text NOT NULL,
  `vis` int(10) NOT NULL,
  `create_user` varchar(1000) NOT NULL,
  `create_date` varchar(1000) NOT NULL,
  `modified_user` varchar(1000) NOT NULL,
  `modified_date` varchar(1000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `noreg_supplier`, `nama_supplier`, `alamat_supplier`, `kota_supplier`, `kodepos_supplier`, `propinsi_supplier`, `negara_supplier`, `telpon_supplier`, `fax_supplier`, `email_supplier`, `situs`, `productBrand`, `tags`, `vis`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
(1, 4001, 'CONTROL SYSTEM ARENA PARA NUSA, PT', 'Beltway Office Park, Tower B 3rd Floor, Jl. Ampera Raya No.9-10', 'Jakarta Selatan', 12550, 'DKI Jakarta', 'Indonesia', ' +62-21-780-7881', '', 'sales@ptcs.co.id', 'http://ptcs.co.id', NULL, '', 0, 'Dimza', '20 July 2014', 'Dimza', 'Thursday 9th of October 2014 08:51:41 AM'),
(2, 4002, 'METRODATA ELECTRONICS, PT', 'APL Tower 37th Floor Suite 3 Jl. Letjen S. Parman Kav. 28', 'Jakarta', 11470, 'DKI', 'Indonesia', '(62-21)-29345-888', '0', 'info.metrodata@metrodata.co.id', 'http://metrodata.co.id', 'dell', 'computer,desktop', 0, 'Dimza', 'Thursday 31st of July 2014 10:38:29 AM', 'Dhimas', '11 June 2015'),
(3, 4003, 'CISCO System Indonesia, PT', 'Perkantoran Hijau Arkadia Tower F, 5th Floor Jl. TB. Simatupang Kav.88 ', 'Jakarta Selatan', 12510, 'DKI Jakarta', 'Indonesia', '(+62-21)-2754-6400', '0', 'witaher@cisco.com', 'http://cisco.com', 'cisco', 'networking', 0, 'Dimza', 'Wednesday 6th of August 2014 05:18:57 AM', 'Aji', '12 June 2015'),
(4, 4004, 'MEGATRONIC MITRANIAGA, PT', 'Komp. Ketapang Indah Blok A1/8 Jl. KH. Zainul Arifin no.1', 'Jakarta', 11140, 'DKI Jakarta', 'Indonesia', ' +62 21 6338839', '', 'info@megatronix.co.id', 'http://www.megatronix.co.id/', NULL, '', 0, 'Dimza', 'Wednesday 20th of August 2014 10:46:37 AM', 'Dimza', 'Thursday 9th of October 2014 08:51:19 AM'),
(5, 4005, 'Transavia Otamasi Pratama, PT', 'Graha Paramita, 2nd Floor Jl. Denpasar Raya Blok D2 Kav.8 Kuningan', 'Jakarta', 0, 'DKI Jakarta', 'Indonesia', '+62-21-2526061', '', 'top@transaviaotomasi.com', 'http://www.transaviaotomasi.com/', NULL, '', 1, 'Dimza', 'Thursday 11th of September 2014 07:49:54 AM', 'Aji', '2015-09-02'),
(6, 4006, 'Unknown', 'n/a', 'n/a', 0, 'n/a', 'IDN', '0', '', 'sales@kosong.com', 'http://kosong.com', NULL, '', 1, 'Admin', '9 June 2015', 'Admin', '11 June 2015'),
(7, 4007, 'ENVIRO EQUIP', 'No.107A, Jalan Hujan Emas 8, Taman Overseas Union, 58200 Kuala Lumpur', 'KUALA LUMPUR', 58200, '', 'MYS', '(603) 7987 8386 ', '', 'klsales@enviroequip.com.my', '', NULL, '', 0, 'Admin', '11 June 2015', 'Admin', '11 June 2015'),
(8, 4008, 'PT SARANA TEKNIK', 'Komp Perkantoran Sunter Permai Bl B11 Jl. Danau Sunter Utara Kav. K-2\r\nSunter Agung ', 'Jakata', 14350, 'DKI Jakarta', 'IDN', '021- 6519582', '', 'sarana@bit.net.id', 'http://www.sarana-teknik.com', NULL, '', 1, 'Admin', '11 June 2015', 'Admin', '11 June 2015'),
(9, 4009, 'SARANA TEKNIK, PT', '', '', 0, '', 'IDN', '239487238742', '', '', 'http://', NULL, '', 1, 'Admin', '11 June 2015', 'Aji', '11 June 2015'),
(10, 4010, 'Badja Abadi Sentosa, PT', 'Pertokoan Glodok Jaya No. 90. Jl. Hayam Wuruk, Jakarta 11180 - Indonesia', 'Jakarta', 0, '', 'IDN', '+62 21 649 8752, 649 8755, 649 8760', '', 'ali@badjaabadisentosa.com', 'http://', 'BAND-IT,Flow meter&valves,Pumps,Fuel Nozzle Guns,Hose Reels,Hydrometers&Accessories,Welding Machines,Magnaflux', 'Electrical,Mechanical,Pumps', 0, 'Aji', '2015-08-28', 'Aji', '2015-08-28'),
(11, 4011, 'Reka Elektra Sarwawisesa, PT', 'Jakarta Office:Jl. Raharja No. 8\r\nPondok Pinang Kebayoran Lama\r\nJakarta 12310\r\nIndonesia \r\nBalikpapan Office:Jl. Bukit Niaga No.22\r\nBalikpapan 76113\r\nKalimantan Timur\r\nINDONESIA', 'Jakarta/Balikpapan', 0, '', 'IDN', '+62 (21) 750 5777/+62 (542) 441 570', '+62 (542) 441 570', 'sales@rekaelektra.com', 'http://www.rekaelektra.com', 'Fenwal,Net Safety,Vacon,Terasaki', 'Electrical,Mechanical,Instrument,Telecomunication,Construction', 0, 'Aji', '2015-08-28', 'Aji', '2015-08-28'),
(12, 4012, 'DONADON SDD Srl', 'Via Franceschelli, 7 â€“ 20011 Corbetta (Milano)', 'Milano', 0, '', 'ITA', '+39 02 90 11 10 01', '+39 02 90 11 22 10', 'donadonsdd@donadonsdd.com', 'http://www. Donadonsdd.com', 'EXPLOSION VENTING PANELS,SAFETY VALVES,RUPTURE INDICATORS,Rupture Disc and Bursting Disc', '', 0, 'Aji', '2015-08-28', 'Aji', '2015-08-28'),
(13, 4013, 'Ausindo Mandiri, PT', 'Jl. Jend. Sudirman Blok D1/5, Balikpapan, East Kalimantan Indonesia', 'Balikpapan', 76114, 'EAST KALIMANTAN', 'IDN', '+62-542-422181 ', '+62 542 417398 ', 'ausindo@indo.net.id', 'http://', 'Pumps&Parts', 'Pompa', 0, 'Aji', '2015-08-28', 'Aji', '2015-08-28'),
(14, 4014, 'Emerson Indonesia, PT', 'Jl. Jend. Sudirman Kav.1, Jakarta 10220', 'Jakarta', 10220, 'DKI Jakarta', 'IDN', '+62-21-2513003 ', '+62-21-2510622', 'merlyn.cokrolukito@emerson.com', 'http://www.asconumatics.net', 'Asco Numatics', 'Electrical', 0, 'Aji', '2015-08-28', 'Aji', '2015-08-28'),
(15, 4015, 'KEMET FAR EAST PTE LTD', '32 Ang Mo Kio Industrial Park 2\r\n#02-12 Sing Industrial Complex\r\nSingapore 569510\r\n', 'Singapore', 569510, '', 'SGP', '(00 65) 6482 0990', 'Unknown', 'cindyong@kemet.com.sg', 'http://www.kemet.co.uk/', 'Unknown', 'Unknown', 0, 'Aji', '2015-08-28', 'Aji', '2015-08-28'),
(16, 4016, 'Somagede Indonesia, PT', 'Komplek Griya Inti Sentosa\r\nJl. Griya Agung No.3,\r\nSunter Agung\r\nJakarta 14350', 'Jakarta', 14350, 'DKI Jakarta', 'IDN', '(021) 6410730', '(021) 6401572', 'sales@somagede.com', 'http://www.somagede.com', 'Sumitomo,TSI Tools,Rigibore,Henkel(Loctite),ALMT Corp,Aquence,Selleys,Big Daishowa,Yamasa,PWB Systems,Bluim,Lube,OSG Corporation,Kemet', 'Cutting Tools and Adhesives Specialist : Supply and distribute all types of machining,maintenance,measuring tools and safety products', 0, 'Aji', '2015-08-28', 'Aji', '2015-08-28'),
(17, 4017, 'Joi Agung Sentosa, PT', 'Taman Kebon Jeruk Blok W3 No. 24\r\nJoglo - Kembangan, Jakarta Barat\r\nIndonesia\r\n', 'Jakarta', 0, 'DKI Jakarta', 'IDN', '+62-21-5859670/5859678', '+62-21-5859685', 'aries@joiagungsentosa.com', 'https://farris.cwfcbusiness.com', 'Farris', 'Unknown', 0, 'Aji', '2015-08-28', 'Aji', '2015-08-28'),
(18, 4018, 'Rajawali Sumber Anugerah', 'jl Bantul, palbapang, Cepor Kidul, Bantul\r\nYogyakarta\r\n', 'Yogyakarta', 0, 'DIY', 'IDN', '085100539157', '', 'rajawali.pack@yahoo.com', 'http://www.kartonbox-yogya.com', 'Corrugated Box,Paperboard Sheet,Printing Offset Box', 'Unknown', 0, 'Aji', '2015-09-02', 'Aji', '2015-09-02'),
(19, 4019, 'Marechal Electric Asia Pte Ltd', '11th floor, One Pacific Place\r\nJl. Jend. Sudirman Kav. 52-53, SCBD\r\nJakarta 12190 \r\n', 'Jakarta', 12190, 'DKI Jakarta', 'IDN', '+6221 2985 9826', '+6221 2985 9889', 't.tournier@marechal.com', 'http://www.technor.com/', 'Marechal Electric Group,Technor', 'Unknown', 0, 'Aji', '2015-09-02', 'Aji', '2015-09-02'),
(20, 4020, 'PT. Transavia Otomasi Pratama', 'Graha Paramita, 2nd Floor\r\nJl. Denpasar Raya Blok D-2 Kav. 8 Kuningan, Jakarta 12940\r\nIndonesia', 'Jakarta', 0, 'DKI', 'IDN', '', '', '', 'http://', '', 'Electrical,Mechanical', 1, 'Aji', '2015-09-02', 'Aji', '2015-09-02'),
(21, 4021, 'PT. Transavia Otomasi Pratama', 'Graha Paramita, 2nd Floor\r\nJl. Denpasar Raya Blok D-2 Kav. 8 Kuningan, Jakarta 12940.\r\nIndonesia', 'Jakarta', 12940, 'DKI Jakarta', 'IDN', '(62-21) 252 - 6061  -   252 - 6088', '(62-21) 252 - 6062    -   252 - 6063', 'top@transaviaotomasi.com', 'www.transaviaotomasi.com', '', 'Electrical,Mechanical', 1, 'Aji', '2015-09-02', 'Aji', '2015-09-02'),
(22, 4022, 'PT. Transavia Otomasi Pratama', 'Graha Paramita, 2nd Floor\r\nJl. Denpasar Raya Blok D-2 Kav. 8 Kuningan, Jakarta 12940.\r\nIndonesia', 'Jakarta', 12940, 'DKI Jakarta', 'IDN', '(62-21) 252 - 6061  -   252 - 6088', '(62-21) 252 - 6062    -   252 - 6063', 'top@transaviaotomasi.com', 'www.transaviaotomasi.com', 'Automation Equipment,Electric Equipment,Electrical, Industrial,Instrument Control,Software, Application,UPS', '', 1, 'Aji', '2015-09-02', 'Aji', '2015-09-02'),
(23, 4023, 'Wolf Safety Lamp Agency', '28 Joo Koon Circle, Singapore 629057', 'Singapore', 629057, 'Singapore', 'SGP', '(65) 6349 1930', '(65) 6778 6002', 'michael.lim@windsormarine.com.sg', 'www.windsormarine.com.sg', 'Safety Lamp Agency', '', 0, 'Aji', '2015-09-02', 'Aji', '2015-09-02'),
(24, 4024, 'Petromido Perkasa, PT', 'Jl. Parangtritis Raya No. 1 FM\r\nLodan Ancol, Jakarta, Indonesia 14430\r\n', 'Jakarta', 14430, 'DKI Jakarta', 'IDN', '08125410368', '+62- 21 6917983', 'admin@petromindoperkasa.com', 'http://petromindoperkasa.com/', 'Grainger', 'Mechanical,Electrical,Konstruksi', 0, 'Aji', '2015-09-02', 'Aji', '2015-09-02'),
(25, 4025, 'Infoduta Computindo Perkasa, PT', 'Jl. K.H. Wahid Hasyim No.5 Jakarta Pusat-10340 Indonesia HR Building, G-1 Floor', 'Jakarta', 10340, 'DKI Jakarta', 'IDN', '+62 21  3983 1939 ', '+6221 3983 1937', 'sales.7@infoduta.com', 'www.infoduta.com', 'Dell IBM,HP,Fujitsu,Lenovo,Toshiba,Sonny,Apple', 'Komputer PC,Laptop,Workstation server,Hi-tech Recommended  for hardware-software-service-rental', 0, 'Aji', '2015-09-02', 'Aji', '2015-09-02'),
(26, 4026, 'GUNA ELEKTRO, PT', 'Jl. Arjuna Utara 50,\r\nJakarta Barat 11510, Indonesia\r\nPO BOX 2280/JKT 10022', 'Jakarta', 11510, 'DKI Jakarta', 'IDN', '+62 21 565 5010, 565 5020', '+62 21 565 5030,567 4630', 'info@GAE.co.id', 'www.GAE.co.id', '', 'Electrical,Renewable Energies,Data Communication Network,Plan Equipment & Component Manufacturing,Pump Engineering & Rotating Equipment Services', 0, 'Aji', '2015-09-02', 'Aji', '2015-09-02'),
(27, 4027, 'Offisindo', 'Jl.Ciputat Raya no 335,\r\nKebayoran Lama,\r\nJakarta Selatan 12240', 'Jakarta', 12240, 'DKI Jakarta', 'IDN', '021-98287492', '021-7206282', 'sales@offisindo.com', 'offisindo.com', '', 'ATK', 0, 'Aji', '2015-09-02', 'Aji', '2015-09-02'),
(28, 4028, 'CALGAZ INTERNATIONAL LLC', '438B Alexandra Road Block B #07-01 Alexandra Technopark Singapore 119968', 'Singapore', 119968, 'Singapore', 'SGP', '+65 6265 3788', '+65 6278 1397', 'singapore@airliquide.co.uk', '', 'Calgaz', '', 0, 'Aji', '2015-09-02', 'Aji', '2015-09-02'),
(29, 4029, 'SIFA Asia Pte Ltd', '04-24, Cargo Agent Building D,9 Airline Road\r\nP.O. Box 805 Changi Airfreight Centre, Singapore 819827', 'Singapore', 819827, 'Singapore', 'SGP', '+62 6508 9400', '+62 6508 9449', '', 'www..sifatransit.com', '', 'Forwarder', 0, 'Aji', '2015-09-02', 'Aji', '2015-09-02'),
(30, 4030, 'Marvellindo Mitra Tehnik, PT', 'Jl. Kayu Putih 9C No.32, Jakarta Timur - 13210\r\n', 'Jakarta', 13210, 'DKI Jakarta', 'IDN', '021-44697096', '021-4702837', 'marvellindo_pt@yahoo.com', 'http://wildenchemicalpump.blogspot.com/', 'Wilden', 'Pump', 0, 'Aji', '2015-09-02', 'Aji', '2015-09-02'),
(31, 4031, 'Swift energy Sdn Bhd', 'Lot 48521 (PT25145) Batu 6, Off Jalan Bukit Kemuning, Seksyen 34, 40470 Shah Alam, Selangor Darul Ehsan, Malaysia', 'Selangor', 40470, '', 'MYS', '+603 5162 551', '+603 5162 5522', 'senergy@pd.jaring.my', 'www.senergy.com.my', '', 'solar panel', 0, 'Aji', '2015-09-09', 'Aji', '2015-09-09'),
(32, 4032, 'Laberman, PT', 'Perkantoran Taman Meruya Blok M No. 80\r\nJl. Batu Mulia, Meruya Ilir, Jakarta 11620', 'jakarta', 11620, 'DKI Jakarta', 'IDN', '+(62-21) 586 3633', '+(62-21) 584 4911', 'laberman@cbn.net.id', 'http://www.laberman.com/', 'Unknown', 'Oil / Gas and Industrial Equipment', 0, 'Aji', '2015-09-09', 'Aji', '2015-09-09'),
(33, 4033, 'Wana Putra Sejahtera, PT', 'Jl. Inspeksi Kalimalang,Setia Dharma\r\nBekasi â€“ Jawa Barat 17510', 'Bekasi', 17510, 'Jawa Barat', 'IDN', '(021) 29566169', '(021) 29566170', 'wps_sejahtera@yahoo.co.id', 'http://http://wanaputrasejahtera.com/', 'Makita,Bosch,etc', 'Electrical,Mechanical,Telecomunication,Safety Industri,Welding Consumables', 0, 'Aji', '2015-09-09', 'Aji', '2015-09-09'),
(34, 4034, 'Parama Nusa Utama, PT', 'Jl. Administrasi Negara I No. 4,\r\nJakarta Pusat 10210\r\nIndonesia\r\n', 'jakarta', 10210, 'DKI Jakarta', 'IDN', '+62 21 5706808', '+62 21 5706783', 'admin@paramanusa.co.id', 'http://admin@paramanusa.co.id', 'Goodwin', 'Mechanical', 0, 'Aji', '2015-09-09', 'Aji', '2015-09-09'),
(35, 4035, 'Siemens Indonesia, PT', 'Building Technologies Division RC-ID BT CPS Arkadia Office Park, Tower F, Penthouse FI, Jalan T.B Simatupang Kav. 88 Pasar Minggu, Jakarta 12520 Indonesia', 'jakarta', 12520, 'DKI Jakarta', 'IDN', '+62-21 27543555', '+62-21 27543481', 'edward.nainggolan@siemens.com', 'http://www.siemens.com', 'Siemens', 'Electrical', 0, 'Aji', '2015-09-09', 'Aji', '2015-09-09'),
(36, 4036, 'Kawan Lama Sejahtera, PT', 'Jl. Jend Sudirman No.18 (Stal Kuda) RT.41 RW.14\r\nkEL.Gn Bahagia. Kec. Balikpapan Selatan Balikpapan 76114 - Indonesia', 'Balikpapan', 76114, 'Kaltim', 'IDN', '0542 - 766485', '0542 - 763971', 'sales1counterbpn@kawanlama.com', 'http://', 'Krisbow', '', 0, 'Aji', '2015-09-09', 'Aji', '2015-09-09'),
(37, 4037, 'Acr. Prima JAYA', 'Jl. Soekarno Hatta Km 1/2 Kompleks Ruko Taman Citra blok B.3\r\nBalikpapan', 'Balikpapan', 0, 'Kaltim', 'IDN', '0542 - 421594', '0542 - 420859', 'acr.primajaya@yahoo.com', 'http://', 'Schneider,ABB,Etc', 'Electrical', 0, 'Aji', '2015-09-09', 'Aji', '2015-09-09'),
(38, 4038, 'Fujimak Food Service Equipment (S) PTE LTD', '30 Hillview Terrace Singapore 669246', 'Singapore', 669246, 'Singapore', 'SGP', '+65 6762 0122', '+65 6760 3727', 'miura@fujimak.com.sg', 'www.fujimak.co.jp', 'Fujimak', 'Food Service Equipment', 0, 'Aji', '2015-09-09', 'Aji', '2015-09-09'),
(39, 4039, 'SatNet Com, PT', 'Jl. Ruhui Rahayu No. 96-98 RT 001\r\n\r\nKel. Gunung Bahagia Kec. Balikpapan Selatan\r\n\r\nBalikpapan 76114', 'Balikpapan', 76114, 'Kaltim', 'IDN', '+62 (0) 542 - 875570', '+62 (0) 542 - 876302', 'hasmi@satnetcom.com', 'www.satnetcom.com', '', 'Broadband Internet,Microwave wireless & Fiber Optic,LongHaul Tracking System,etc', 0, 'Aji', '2015-09-09', 'Aji', '2015-09-09'),
(40, 4040, 'Surya Kutai Electrik, PT', 'Jl.  Jend. sudirman Ruko Bandar Blok C.12 Klandasan - Balikpapan 76114', 'jakarta', 76114, 'DKI Jakarta', 'IDN', '0542 - 422205', '0542 - 415880', 'ske_p.baru@yahoo.co.id', 'http://', 'Phillips', 'Lighting Supplier', 0, 'Aji', '2015-09-10', 'Aji', '2015-09-10'),
(41, 4041, 'Famili Kita, PT', 'Jl. Jend. Sudirman, Komp. Balikpapan Permai Blok F1 No. 39 - 40 Balikpapan Selatan  76114', 'Balikpapan', 76114, 'Kaltim', 'IDN', '(0542) - 427503', '(0542) - 443208', 'famili@familikita.co.id', 'www.familikita.co.id', 'Grundfos,Matten,Flotech', 'Water Solution Specialist', 0, 'Aji', '2015-09-10', 'Aji', '2015-09-10'),
(42, 4042, 'Emerson Indonesia, PT - (Emerson Industrial Automation - Asconumatics)', 'Wisma 46 kota BNI, 16th FI Suite 16.01,\r\nJl. Jend. Sudirman Kav, 1, Jakarta 10220', 'jakarta', 10220, 'DKI Jakarta', 'IDN', '+62 - 21 - 2513003', '+62 - 21 - 2510622', 'merlyn.cokrolukito@emerson.com', 'www.asconumatics.net', 'Emerson', '', 0, 'Aji', '2015-09-10', 'Aji', '2015-09-10'),
(43, 4043, 'Kevin Jaya Abadi, PT', 'Jl. Tanjung Barat No. 8 TB. Simatupang Jakarta 12530', 'jakarta', 12530, 'DKI Jakarta', 'IDN', '(021) 7884 7589', '(021) 78847640', 'kja.amanpaint@gmail.com', 'www.amanpaint.com', '', 'Paint', 0, 'Aji', '2015-09-10', 'Aji', '2015-09-10'),
(44, 4044, 'Madesa Sejahtera Utama, PT', 'Jl. Gunung Sahari Raya 51A/14\r\nJakarta Pusat 10610 Indonesia', 'jakarta', 10610, 'DKI Jakarta', 'IDN', '(021) 4205315', '(021) - 4253679', 'edarmawan@ptmadesa.com', 'www.ptmadesa.com', '', 'Medical Equipment', 0, 'Aji', '2015-09-10', 'Aji', '2015-09-10'),
(45, 4045, 'Datacom Computer Center', 'Jl Jend Sudirman Ruko Bandar Bl D/8 Klandasan Seberang Kantor Polisi Purwa\r\nKlandasan Ulu, Balikpapan Selatan\r\nBalikpapan 76112 Kalimantan Timur', 'Balikpapan', 76112, 'Kaltim', 'IDN', '(0542) 739115', ' (0542) 739116 ', 'datacom_bpn@yahoo.com', '', '', 'Computer Equipment & sales', 0, 'Aji', '2015-09-10', 'Aji', '2015-09-10'),
(46, 4046, 'Borneo Jaya Baru, PT', 'Jl. MT. Haryono No. 19 RT. 60 Kel. Damai - Balikpapan\r\nKalimantan Timur - Indonesia', 'Balikpapan', 0, 'Kaltim', 'IDN', '+62 542 8860969 - 70 - 71', '+62 542 872043', 'info@borneojayabaru.com', '', 'Kabel metal', '', 0, 'Aji', '2015-09-15', 'Aji', '2015-09-15'),
(47, 4047, 'Wahyu Mandiri, CV', 'Jl. Soekarno - Hatta KM.5 Komp. Perum Bhumi Nirwana Indah Blok R No.16 RT. 092, Kel. Batu Ampar - Balikpapan Utara, Balikpapan 76126, Kalimantan Timur, Indonesia', 'Balikpapan', 76126, 'Kaltim', 'IDN', '(0542) - 8039282', '(0542) - 7588170', 'cv.wahyumandiri@yahoo.com', 'http://', 'International  Paint Product', '', 0, 'Aji', '2015-09-15', 'Aji', '2015-09-15'),
(48, 4048, 'Arista Tehnik', 'Jl. P. antasari Perempatan Gn. Kawi', 'Balikpapan', 0, 'Kaltim', 'IDN', '(0542) - 5667755', '(0542) - 7218506', 'aristatehnik@aristatehnik.com', 'www.aristatehnik.com', 'Schneider,Vasco,etc', 'Electrical', 0, 'Aji', '2015-09-15', 'Aji', '2015-09-15'),
(49, 4049, 'Draegerindo Jaya, PT', 'Jl. MT. Haryono No. 78A RT. 43 - Balikpapan 76114', 'Balikpapan', 76114, 'Kaltim', 'IDN', '+62 - 542 875963', '+62 - 542 875983', 'Budi.Norachmansyah@draeger.com', 'www.draeger.com', 'Draeger', '', 0, 'Aji', '2015-09-15', 'Aji', '2015-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE IF NOT EXISTS `tender` (
`tenderId` int(11) unsigned NOT NULL,
  `companyId` varchar(11) DEFAULT NULL,
  `clientId` int(11) DEFAULT NULL,
  `currencyId` int(11) DEFAULT NULL,
  `referenceNo` varchar(1000) DEFAULT NULL,
  `tittleTender` text,
  `createDate` date DEFAULT NULL,
  `closeDate` date DEFAULT NULL,
  `salesCall` int(11) DEFAULT NULL,
  `statusTender` int(11) DEFAULT NULL,
  `remark` text,
  `modDate` date DEFAULT NULL,
  `modUser` int(11) DEFAULT NULL,
  `vis` int(11) DEFAULT NULL,
  `doc` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `tender`
--

INSERT INTO `tender` (`tenderId`, `companyId`, `clientId`, `currencyId`, `referenceNo`, `tittleTender`, `createDate`, `closeDate`, `salesCall`, `statusTender`, `remark`, `modDate`, `modUser`, `vis`, `doc`) VALUES
(100, 'ATHYA', 2004, 501, 'CTBM001918', 'PRESSURE SAFETY VALVE', '2015-04-11', '2015-10-10', 2020, 112, 'n/a', '2015-09-20', 3013, 0, 'rfq_206000069239.pdf'),
(101, 'DWRTH', 2001, 502, 'KDG007741', 'PURCHASE OF INSTRUMENT MATERIAL', '2015-04-11', '2015-09-20', 2021, 111, 'n/a', '2015-09-20', 3013, 0, 'rfq_206000069239.pdf'),
(107, 'SDHTM', 2004, 501, 'DSBM002459-IAP', 'PROVISION OF VARIOUS ELECTRICAL MOTOR', '2015-08-21', '2015-09-09', 2021, 113, 'n/a', '2015-09-09', 3013, 0, 'rfq_206000069239.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tenderitems`
--

CREATE TABLE IF NOT EXISTS `tenderitems` (
`tenderItemsId` int(11) unsigned NOT NULL,
  `tenderNo` varchar(1000) DEFAULT NULL,
  `idSupplier` int(11) NOT NULL,
  `goodsId` varchar(1000) DEFAULT NULL,
  `gooods_no` int(255) DEFAULT NULL,
  `description` text,
  `partNumber` text,
  `priceList` varchar(1000) DEFAULT NULL,
  `qtyItems` int(11) DEFAULT NULL,
  `unitItems` varchar(100) DEFAULT NULL,
  `remark` text,
  `createDate` date DEFAULT NULL,
  `modUser` varchar(100) DEFAULT NULL,
  `doc` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tenderitems`
--

INSERT INTO `tenderitems` (`tenderItemsId`, `tenderNo`, `idSupplier`, `goodsId`, `gooods_no`, `description`, `partNumber`, `priceList`, `qtyItems`, `unitItems`, `remark`, `createDate`, `modUser`, `doc`) VALUES
(5, '100', 0, NULL, NULL, 'N-Series Product N400', 'n400', '100', 10, 'EA', 'tes halo tes di coba coba ajah yah', '2015-09-01', '2025', 'penawaranPDAM.pdf'),
(6, '107', 0, NULL, NULL, 'CISCO IP PHONE 7960', 'CP-7960G', '450', 7, 'SET', 'Coba', '2015-09-02', '2025', 'penawaranPDAM.pdf'),
(8, '107', 0, NULL, NULL, 'Dell Optiplex 9010', 'BKZZWX1', '5400', 4, 'SET', 'tes', '2015-09-09', '', 'RFQ-2.pdf'),
(9, '101', 4028, NULL, NULL, 'CISCO IP PHONE 7960', 'CP-7960G', '1234', 13, 'SET', 'Coba', '2015-09-20', '3013', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tlquote`
--

CREATE TABLE IF NOT EXISTS `tlquote` (
`id_tlQuote` int(11) unsigned NOT NULL,
  `noQuote` varchar(1000) DEFAULT NULL,
  `iconQuote` int(11) DEFAULT NULL,
  `dateQuote` varchar(100) DEFAULT NULL,
  `salesQuote` int(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tlquote`
--

INSERT INTO `tlquote` (`id_tlQuote`, `noQuote`, `iconQuote`, `dateQuote`, `salesQuote`) VALUES
(1, '0007/DAKA-QTS/III/2015', 101, '9 March 2015', 2020),
(2, '0028/CVSS-QTS/VI/2015', 101, '08 June 2015', 2020),
(3, '0001/PGSUS-QTS/VI/2015', 101, '10 June 2015', 2022),
(4, '0029/CVSS-QTS/VI/2015', 101, '25 June 2015', 2021),
(5, '0006/DAKA-QTS/III/2015', 101, '1 July 2015', 2023),
(6, '0020/CVSS-QTS/IX/2014', 101, '2 January 2015', 2024),
(7, '0021/CVSS-QTS/X/2014', 101, '13 May 2015', 2020),
(8, '0022/CVSS-QTS/X/2014', 101, '10 May 2015', 2025),
(9, '0023/CVSS-QTS/X/2014', 101, '20 March 2015', 2021),
(10, '0024/CVSS-QTS/X/2014', 101, '9 June 2015', 2023),
(11, '0001/ATH-QTS//2015', 101, '2015-09-04', 2031),
(12, '0001/ATH-QTS/IX/2015', 101, '2015-09-21', 2033),
(13, '0001/CVSS-QTS/IX/2015', 101, '2015-09-21', 3013);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_pegawai` int(255) NOT NULL,
  `online` int(10) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `kode_company` varchar(100) NOT NULL,
  `nama_pegawai` varchar(1000) NOT NULL,
  `nopeg` int(100) NOT NULL,
  `role` int(10) NOT NULL,
  `spc` int(11) NOT NULL,
  `valid_date` varchar(100) NOT NULL,
  `remark` varchar(1000) NOT NULL,
  `vis` int(10) NOT NULL,
  `create_user` varchar(100) NOT NULL,
  `create_date` varchar(100) NOT NULL,
  `modified_user` varchar(100) NOT NULL,
  `modified_date` varchar(100) NOT NULL,
  `status` varchar(1000) NOT NULL DEFAULT ''
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_pegawai`, `online`, `username`, `password`, `kode_company`, `nama_pegawai`, `nopeg`, `role`, `spc`, `valid_date`, `remark`, `vis`, `create_user`, `create_date`, `modified_user`, `modified_date`, `status`) VALUES
(100, 2, 'admin@sindhutama.co.id', '21232f297a57a5a743894a0e4a801fc3', 'SDHTM', 'Admin', 1234, 1, 0, '', '', 1, '', '', 'Dhimas', '10 June 2015', '12'),
(105, 1, 'ajibayu@sindhutama.co.id', '8848beec60aa63b83d318aa2f920506e', 'SDHTM', 'Aji', 3012, 1, 0, '01 January 2015', 'halo di coba', 0, 'Dimza', '15 October 2014', 'Admin', '10 June 2015', '11'),
(107, 0, 'marketing.bpn@pegasuspratama.com', 'c769c2bd15500dd906102d9be97fdceb', 'PGSUS', 'Dona', 2022, 1, 0, '07 January 2015', 'coba\r\n\r\n', 0, 'Dimza', '7 January 2015', 'Dhimas', '11 June 2015', '12'),
(108, 1, 'sales.support@sindhutama.co.id', '46827e0001b0cc87e9443d13fb81f69d', 'SDHTM', 'Dhimas', 3013, 1, 33, '10 March 2015', 'tes', 0, 'Admin', '10 March 2015', 'Aji', '10 June 2015', '11'),
(109, 0, 'project@athaya-bpp.com', 'e10adc3949ba59abbe56e057f20f883e', 'ATHYA', 'Ikram', 2030, 1, 0, '', '', 0, 'Admin', '15 June 2015', 'Dhimas', '4 September 2015', '11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountbank`
--
ALTER TABLE `accountbank`
 ADD PRIMARY KEY (`id_aBank`);

--
-- Indexes for table `billexpenses`
--
ALTER TABLE `billexpenses`
 ADD PRIMARY KEY (`id_oe`);

--
-- Indexes for table `buying`
--
ALTER TABLE `buying`
 ADD PRIMARY KEY (`id_buy`);

--
-- Indexes for table `buyingnum`
--
ALTER TABLE `buyingnum`
 ADD PRIMARY KEY (`idBuyNum`);

--
-- Indexes for table `buying_list`
--
ALTER TABLE `buying_list`
 ADD PRIMARY KEY (`id_buying_list`);

--
-- Indexes for table `ca`
--
ALTER TABLE `ca`
 ADD PRIMARY KEY (`id_ca`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `cost_code`
--
ALTER TABLE `cost_code`
 ADD PRIMARY KEY (`id_costcode`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
 ADD PRIMARY KEY (`idCurrency`);

--
-- Indexes for table `delivery_order`
--
ALTER TABLE `delivery_order`
 ADD PRIMARY KEY (`id_do`);

--
-- Indexes for table `do_abm`
--
ALTER TABLE `do_abm`
 ADD PRIMARY KEY (`id_do_abm`);

--
-- Indexes for table `do_dk`
--
ALTER TABLE `do_dk`
 ADD PRIMARY KEY (`id_do_dk`);

--
-- Indexes for table `do_list`
--
ALTER TABLE `do_list`
 ADD PRIMARY KEY (`id_do_list`);

--
-- Indexes for table `do_ps`
--
ALTER TABLE `do_ps`
 ADD PRIMARY KEY (`id_do_ps`);

--
-- Indexes for table `do_ss`
--
ALTER TABLE `do_ss`
 ADD PRIMARY KEY (`id_do_ss`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `employeedetail`
--
ALTER TABLE `employeedetail`
 ADD PRIMARY KEY (`empDetailId`);

--
-- Indexes for table `employeepersonal`
--
ALTER TABLE `employeepersonal`
 ADD PRIMARY KEY (`employeeId`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
 ADD PRIMARY KEY (`id_goods`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
 ADD PRIMARY KEY (`id_inv`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
 ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `invoice_list`
--
ALTER TABLE `invoice_list`
 ADD PRIMARY KEY (`id_invoice_list`);

--
-- Indexes for table `invo_abm`
--
ALTER TABLE `invo_abm`
 ADD PRIMARY KEY (`id_invo_abm`);

--
-- Indexes for table `invo_dk`
--
ALTER TABLE `invo_dk`
 ADD PRIMARY KEY (`id_invo_dk`);

--
-- Indexes for table `invo_ps`
--
ALTER TABLE `invo_ps`
 ADD PRIMARY KEY (`id_invo_ps`);

--
-- Indexes for table `invo_ss`
--
ALTER TABLE `invo_ss`
 ADD PRIMARY KEY (`id_invo_ss`);

--
-- Indexes for table `letter`
--
ALTER TABLE `letter`
 ADD PRIMARY KEY (`id_letter`);

--
-- Indexes for table `letternumber`
--
ALTER TABLE `letternumber`
 ADD PRIMARY KEY (`idLetterNumber`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
 ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `opportunity`
--
ALTER TABLE `opportunity`
 ADD PRIMARY KEY (`opportunityId`), ADD KEY `opportunityToClient` (`clientId`);

--
-- Indexes for table `po_abm_out`
--
ALTER TABLE `po_abm_out`
 ADD PRIMARY KEY (`id_po_abm_out`);

--
-- Indexes for table `po_dk_out`
--
ALTER TABLE `po_dk_out`
 ADD PRIMARY KEY (`id_po_dk_out`);

--
-- Indexes for table `po_ps_out`
--
ALTER TABLE `po_ps_out`
 ADD PRIMARY KEY (`id_po_ps_out`);

--
-- Indexes for table `po_ss_out`
--
ALTER TABLE `po_ss_out`
 ADD PRIMARY KEY (`id_po_ss_out`);

--
-- Indexes for table `purchaseint`
--
ALTER TABLE `purchaseint`
 ADD PRIMARY KEY (`idPurchaseInt`);

--
-- Indexes for table `purchaseint_list`
--
ALTER TABLE `purchaseint_list`
 ADD PRIMARY KEY (`idPurIntList`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
 ADD PRIMARY KEY (`id_quote`);

--
-- Indexes for table `quotenum`
--
ALTER TABLE `quotenum`
 ADD PRIMARY KEY (`idQuoteNum`);

--
-- Indexes for table `quote_abm`
--
ALTER TABLE `quote_abm`
 ADD PRIMARY KEY (`id_quote_abm`);

--
-- Indexes for table `quote_dk`
--
ALTER TABLE `quote_dk`
 ADD PRIMARY KEY (`id_quote_dk`);

--
-- Indexes for table `quote_list`
--
ALTER TABLE `quote_list`
 ADD PRIMARY KEY (`id_quote_list`);

--
-- Indexes for table `quote_ps`
--
ALTER TABLE `quote_ps`
 ADD PRIMARY KEY (`id_quote_ps`);

--
-- Indexes for table `quote_ss`
--
ALTER TABLE `quote_ss`
 ADD PRIMARY KEY (`id_quote_ss`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
 ADD PRIMARY KEY (`id_stock`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tender`
--
ALTER TABLE `tender`
 ADD PRIMARY KEY (`tenderId`);

--
-- Indexes for table `tenderitems`
--
ALTER TABLE `tenderitems`
 ADD PRIMARY KEY (`tenderItemsId`);

--
-- Indexes for table `tlquote`
--
ALTER TABLE `tlquote`
 ADD PRIMARY KEY (`id_tlQuote`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountbank`
--
ALTER TABLE `accountbank`
MODIFY `id_aBank` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=903;
--
-- AUTO_INCREMENT for table `billexpenses`
--
ALTER TABLE `billexpenses`
MODIFY `id_oe` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=500003;
--
-- AUTO_INCREMENT for table `buying`
--
ALTER TABLE `buying`
MODIFY `id_buy` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `buyingnum`
--
ALTER TABLE `buyingnum`
MODIFY `idBuyNum` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `buying_list`
--
ALTER TABLE `buying_list`
MODIFY `id_buying_list` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `ca`
--
ALTER TABLE `ca`
MODIFY `id_ca` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70004;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
MODIFY `id_client` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2005;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
MODIFY `id_company` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `contactId` int(255) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9002;
--
-- AUTO_INCREMENT for table `cost_code`
--
ALTER TABLE `cost_code`
MODIFY `id_costcode` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
MODIFY `idCurrency` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=504;
--
-- AUTO_INCREMENT for table `delivery_order`
--
ALTER TABLE `delivery_order`
MODIFY `id_do` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `do_abm`
--
ALTER TABLE `do_abm`
MODIFY `id_do_abm` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `do_dk`
--
ALTER TABLE `do_dk`
MODIFY `id_do_dk` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `do_list`
--
ALTER TABLE `do_list`
MODIFY `id_do_list` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `do_ps`
--
ALTER TABLE `do_ps`
MODIFY `id_do_ps` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `do_ss`
--
ALTER TABLE `do_ss`
MODIFY `id_do_ss` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `id_karyawan` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `employeedetail`
--
ALTER TABLE `employeedetail`
MODIFY `empDetailId` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeepersonal`
--
ALTER TABLE `employeepersonal`
MODIFY `employeeId` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
MODIFY `id_goods` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10025;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
MODIFY `id_inv` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
MODIFY `id_invoice` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `invoice_list`
--
ALTER TABLE `invoice_list`
MODIFY `id_invoice_list` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invo_abm`
--
ALTER TABLE `invo_abm`
MODIFY `id_invo_abm` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invo_dk`
--
ALTER TABLE `invo_dk`
MODIFY `id_invo_dk` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invo_ps`
--
ALTER TABLE `invo_ps`
MODIFY `id_invo_ps` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invo_ss`
--
ALTER TABLE `invo_ss`
MODIFY `id_invo_ss` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `letter`
--
ALTER TABLE `letter`
MODIFY `id_letter` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `letternumber`
--
ALTER TABLE `letternumber`
MODIFY `idLetterNumber` int(255) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
MODIFY `id_notif` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `opportunity`
--
ALTER TABLE `opportunity`
MODIFY `opportunityId` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1002;
--
-- AUTO_INCREMENT for table `po_abm_out`
--
ALTER TABLE `po_abm_out`
MODIFY `id_po_abm_out` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `po_dk_out`
--
ALTER TABLE `po_dk_out`
MODIFY `id_po_dk_out` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `po_ps_out`
--
ALTER TABLE `po_ps_out`
MODIFY `id_po_ps_out` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `po_ss_out`
--
ALTER TABLE `po_ss_out`
MODIFY `id_po_ss_out` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `purchaseint`
--
ALTER TABLE `purchaseint`
MODIFY `idPurchaseInt` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1112;
--
-- AUTO_INCREMENT for table `purchaseint_list`
--
ALTER TABLE `purchaseint_list`
MODIFY `idPurIntList` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
MODIFY `id_quote` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `quotenum`
--
ALTER TABLE `quotenum`
MODIFY `idQuoteNum` int(255) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `quote_abm`
--
ALTER TABLE `quote_abm`
MODIFY `id_quote_abm` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `quote_dk`
--
ALTER TABLE `quote_dk`
MODIFY `id_quote_dk` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `quote_list`
--
ALTER TABLE `quote_list`
MODIFY `id_quote_list` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `quote_ps`
--
ALTER TABLE `quote_ps`
MODIFY `id_quote_ps` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `quote_ss`
--
ALTER TABLE `quote_ss`
MODIFY `id_quote_ss` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
MODIFY `id_stock` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `id_supplier` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tender`
--
ALTER TABLE `tender`
MODIFY `tenderId` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `tenderitems`
--
ALTER TABLE `tenderitems`
MODIFY `tenderItemsId` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tlquote`
--
ALTER TABLE `tlquote`
MODIFY `id_tlQuote` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_pegawai` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `opportunity`
--
ALTER TABLE `opportunity`
ADD CONSTRAINT `opportunityToClient` FOREIGN KEY (`clientId`) REFERENCES `client` (`id_client`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
