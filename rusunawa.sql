-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 15 Des 2018 pada 13.15
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rusunawa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(15) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `viewer` int(15) NOT NULL DEFAULT '0',
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi`, `tanggal`, `viewer`, `image`) VALUES
(3, 'Lorem ipsum dolor sit amet 0.45873158095286376', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.3589140766848941', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(4, 'Lorem ipsum dolor sit amet 0.08131035611155477', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.7674191973800019', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(5, 'Lorem ipsum dolor sit amet 0.030357068432827546', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.7603537875789719', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(6, 'Lorem ipsum dolor sit amet 0.9078543045631184', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.49951137648849875', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(7, 'Lorem ipsum dolor sit amet 0.4482003482507545', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.21649555043922322', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(8, 'Lorem ipsum dolor sit amet 0.5174388582980622', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.5839436534642648', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(9, 'Lorem ipsum dolor sit amet 0.24259327747169257', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.27023164673729955', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(10, 'Lorem ipsum dolor sit amet 0.6606498431979212', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.5993273040273481', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(11, 'Lorem ipsum dolor sit amet 0.575469414308173', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.18594161065848694', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(12, 'Lorem ipsum dolor sit amet 0.8953975726807467', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.13172617194403538', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(13, 'Lorem ipsum dolor sit amet 0.7505796512128595', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.10080605847836105', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(14, 'Lorem ipsum dolor sit amet 0.06670556875570265', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.10885180729334411', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(15, 'Lorem ipsum dolor sit amet 0.0817889208735795', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.2418408917652824', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(16, 'Lorem ipsum dolor sit amet 0.20882792883443455', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.8826490676800246', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(17, 'Lorem ipsum dolor sit amet 0.7987729122850792', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.6877226938379208', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(18, 'Lorem ipsum dolor sit amet 0.3673808056557372', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.7906662968831755', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(19, 'Lorem ipsum dolor sit amet 0.4405853221570936', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.8901634336357596', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(20, 'Lorem ipsum dolor sit amet 0.10078422455190143', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.07881830826291657', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(21, 'Lorem ipsum dolor sit amet 0.18216518702187126', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.7236012711409491', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(22, 'Lorem ipsum dolor sit amet 0.6084732921872971', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.3815514616496409', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(23, 'Lorem ipsum dolor sit amet 0.4958709306045165', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.7369535255590021', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(24, 'Lorem ipsum dolor sit amet 0.6539348071943362', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.5401132735797328', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(25, 'Lorem ipsum dolor sit amet 0.7820612748917762', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.48970582195530254', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(26, 'Lorem ipsum dolor sit amet 0.948501983609518', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.8281893197709596', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(27, 'Lorem ipsum dolor sit amet 0.39632612410590623', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.6718291637225348', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(28, 'Lorem ipsum dolor sit amet 0.13612470043462208', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.8745778900334406', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(29, 'Lorem ipsum dolor sit amet 0.4916451605890367', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.35740198973324333', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(30, 'Lorem ipsum dolor sit amet 0.04985173237496217', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.16327630929954007', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(31, 'Lorem ipsum dolor sit amet 0.7743232108413458', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.7441756080316152', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(32, 'Lorem ipsum dolor sit amet 0.7220608878154875', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.23104914299310106', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(33, 'Lorem ipsum dolor sit amet 0.28733483728704495', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.9227189216043045', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(34, 'Lorem ipsum dolor sit amet 0.27049155372240724', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.9204472097758644', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(35, 'Lorem ipsum dolor sit amet 0.4904532874845465', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.8340793148000532', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(36, 'Lorem ipsum dolor sit amet 0.6407918069891555', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.40905497540631797', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(37, 'Lorem ipsum dolor sit amet 0.7325992032257833', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.5430369633650751', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(38, 'Lorem ipsum dolor sit amet 0.7406206258950947', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.4880199213400669', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(39, 'Lorem ipsum dolor sit amet 0.5053055505317687', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.8109887473387539', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(40, 'Lorem ipsum dolor sit amet 0.30466590570720464', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.5908840034072138', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(41, 'Lorem ipsum dolor sit amet 0.007412907674361866', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.5214538057534526', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(42, 'Lorem ipsum dolor sit amet 0.12306685198384044', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.834617049279266', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(43, 'Lorem ipsum dolor sit amet 0.5930955676297616', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.6087238598696179', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(44, 'Lorem ipsum dolor sit amet 0.5962773129309317', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.539768182243936', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(45, 'Lorem ipsum dolor sit amet 0.20209989249901836', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.8726693623444711', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(46, 'Lorem ipsum dolor sit amet 0.2216675544359419', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.7440422957241929', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(47, 'Lorem ipsum dolor sit amet 0.5020381254162994', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.10220342232119611', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(48, 'Lorem ipsum dolor sit amet 0.8451879945073165', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.2788902551670468', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(49, 'Lorem ipsum dolor sit amet 0.7198256270213291', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.08784103960529066', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(50, 'Lorem ipsum dolor sit amet 0.06356418231834116', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.6025344632589579', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(51, 'Lorem ipsum dolor sit amet 0.15834406126136338', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.7491492282125626', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(52, 'Lorem ipsum dolor sit amet 0.6010277900854385', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.9381427820195842', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(53, 'Lorem ipsum dolor sit amet 0.530106797376747', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.4432662561938784', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(54, 'Lorem ipsum dolor sit amet 0.8474506473610649', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.4019029656442841', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(55, 'Lorem ipsum dolor sit amet 0.6469328754087285', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.6797160903734305', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(56, 'Lorem ipsum dolor sit amet 0.6923124656940927', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.19287158566794507', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(57, 'Lorem ipsum dolor sit amet 0.5207637329779228', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.9252096879530788', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(58, 'Lorem ipsum dolor sit amet 0.5268812985409809', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.04743371349520396', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(59, 'Lorem ipsum dolor sit amet 0.07211532450478089', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.46153953435042827', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(60, 'Lorem ipsum dolor sit amet 0.7799327576346069', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.1653965620001746', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(61, 'Lorem ipsum dolor sit amet 0.683317845392337', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.4423642376832331', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(62, 'Lorem ipsum dolor sit amet 0.07679098479150887', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.7156315331492866', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(63, 'Lorem ipsum dolor sit amet 0.3340014185141785', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.25106498343037903', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(64, 'Lorem ipsum dolor sit amet 0.439634168930011', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.10843034843768026', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(65, 'Lorem ipsum dolor sit amet 0.19616661984116457', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.7889568226309092', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(66, 'Lorem ipsum dolor sit amet 0.6619306231494347', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.6194930985751498', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(67, 'Lorem ipsum dolor sit amet 0.7211532869573247', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.7305950557166665', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(68, 'Lorem ipsum dolor sit amet 0.6199745960719647', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.794496013591528', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(69, 'Lorem ipsum dolor sit amet 0.9364131502214942', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.7806949315412854', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(70, 'Lorem ipsum dolor sit amet 0.8221419936252218', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.5199866476654882', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(71, 'Lorem ipsum dolor sit amet 0.30147054819527136', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.2578484744372298', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(72, 'Lorem ipsum dolor sit amet 0.04092679083433635', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.7292824599233293', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(73, 'Lorem ipsum dolor sit amet 0.3002223403195127', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.8728669070386019', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(74, 'Lorem ipsum dolor sit amet 0.3783313598281996', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.176487186156667', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(75, 'Lorem ipsum dolor sit amet 0.9909898089161048', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.2638352404011742', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(76, 'Lorem ipsum dolor sit amet 0.8199549958295701', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.7897146742695148', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(77, 'Lorem ipsum dolor sit amet 0.12680558313318116', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.15706768087769643', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg'),
(78, 'Lorem ipsum dolor sit amet 0.17416295891084052', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod0.4161944123135828', '2018-12-12 02:53:17', 3, 'f0b9f721e282a2a8d09cd26de8a306f7.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_laporan`
--

CREATE TABLE `detail_laporan` (
  `id_detail` int(15) NOT NULL,
  `id_laporan` int(15) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_laporan`
--

INSERT INTO `detail_laporan` (`id_detail`, `id_laporan`, `file`) VALUES
(1, 1, '500325900b982967585c7ff69eb1eacd.jpg'),
(2, 1, '4ffaebdab10bc45f356628a22e3e7e23.jpg'),
(3, 1, '853c3f18b9d93872dace0ac3b10acabf.png'),
(4, 1, 'c04d403e973053794724b499b6165d63.jpg'),
(5, 1, '8731616fcae8fd81dd3cbfd8fab94cad.jpg'),
(6, 2, '16d3d536269ab33956f0c91eab4613a0.jpg'),
(7, 2, 'bfd1f812e8d60cba412c71ab31ac7e28.jpg'),
(8, 2, '9f3a098798ea4676cb78cbf1609a3674.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(15) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama`) VALUES
(1, 'Halaman Depan'),
(2, 'Taman Belakang Kiri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `id_jenis` int(15) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isVerified` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_user`, `id_jenis`, `tanggal`, `isVerified`) VALUES
(1, 5, 1, '2018-12-12 03:03:16', '0'),
(2, 5, 2, '2018-12-15 04:53:26', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_user` int(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `no_identitas` varchar(25) NOT NULL,
  `jenis_identitas` enum('ktp') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_user`, `nama`, `telepon`, `no_identitas`, `jenis_identitas`) VALUES
(2, 'Saddam Sinatrya Jalu Mukti', '087763744268', '360321607010003', 'ktp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(15) NOT NULL,
  `id_tagihan` int(15) NOT NULL,
  `nominal_bayar` int(15) NOT NULL,
  `pertanggal` date NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_tagihan`, `nominal_bayar`, `pertanggal`, `tanggal`) VALUES
(1, 1, 100000, '2018-01-08', '2018-12-08 09:27:01'),
(2, 1, 100000, '2018-02-08', '2018-12-08 09:27:45'),
(3, 1, 100000, '2018-03-08', '2018-12-08 09:27:45'),
(4, 1, 100000, '2018-04-08', '2018-12-08 09:27:45'),
(5, 1, 100000, '2018-05-08', '2018-12-08 09:27:45'),
(6, 1, 100000, '2018-06-08', '2018-12-08 09:27:45'),
(7, 1, 100000, '2018-07-08', '2018-12-08 09:27:45'),
(8, 1, 100000, '2018-08-08', '2018-12-08 09:27:45'),
(9, 1, 100000, '2018-09-08', '2018-12-08 09:27:45'),
(10, 1, 100000, '2018-10-08', '2018-12-08 09:27:45'),
(13, 1, 500000, '2018-11-08', '2018-12-09 13:07:09'),
(14, 1, 500000, '2018-12-08', '2018-12-09 13:07:09'),
(15, 1, 500000, '2019-01-08', '2018-12-09 14:19:28'),
(16, 1, 500000, '2019-02-08', '2018-12-09 14:22:59'),
(17, 1, 500000, '2019-03-08', '2018-12-09 14:23:32'),
(18, 1, 500000, '2019-04-08', '2018-12-09 14:25:44'),
(19, 1, 500000, '2019-05-08', '2018-12-09 14:26:09'),
(20, 1, 500000, '2019-06-08', '2018-12-09 14:31:53'),
(21, 1, 500000, '2019-07-08', '2018-12-09 14:33:37'),
(22, 1, 500000, '2019-08-08', '2018-12-09 14:35:17'),
(23, 1, 500000, '2019-09-08', '2018-12-09 14:36:49');

--
-- Trigger `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `Tanggal Tenggat Maju 1 Bulan Setelah Insert` AFTER INSERT ON `pembayaran` FOR EACH ROW UPDATE `tagihan` SET `tagihan`.`tanggal_tenggat` = DATE_ADD(NEW.`pertanggal`, INTERVAL 1 MONTH) WHERE `tagihan`.`id_tagihan` = NEW.`id_tagihan`
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission`
--

CREATE TABLE `permission` (
  `id` int(15) NOT NULL,
  `role` enum('user','admin','petugas') NOT NULL,
  `module` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permission`
--

INSERT INTO `permission` (`id`, `role`, `module`) VALUES
(1, 'admin', '*/*'),
(2, 'user', 'home/index'),
(3, 'user', 'tagihan/index'),
(4, 'user', 'tagihan/data_aktif'),
(5, 'user', 'tagihan/view'),
(6, 'user', 'tagihan/pembayaran'),
(7, 'user', 'profil/*'),
(8, 'user', 'logout/index'),
(9, 'user', 'pelanggan/edit'),
(10, 'petugas', 'home/index'),
(11, 'petugas', 'laporan/index'),
(12, 'petugas', 'laporan/data'),
(13, 'petugas', 'profil/*'),
(14, 'petugas', 'logout/index'),
(15, 'petugas', 'petugas/edit'),
(16, 'petugas', 'laporan/view'),
(17, 'petugas', 'laporan/file'),
(18, 'petugas', 'petugas/lapor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_user` int(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `no_identitas` varchar(25) NOT NULL,
  `jenis_identitas` enum('ktp') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_user`, `nama`, `telepon`, `no_identitas`, `jenis_identitas`) VALUES
(5, 'Juan Angela Alma', '87763744268', '1212', 'ktp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(15) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `urutan` int(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id_slider`, `image`, `title`, `deskripsi`, `urutan`) VALUES
(2, '2.jpg', 'Lorem Ipsum', 'Lorem ipsum Dolor Sil Amet', 2),
(3, '3.jpg', 'Lorem Ipsum', 'Lorem ipsum Dolor Sil Amet', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(15) NOT NULL,
  `id_user` int(15) NOT NULL,
  `nama_tagihan` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `nominal` int(50) NOT NULL,
  `tanggal_tenggat` date NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_user`, `nama_tagihan`, `deskripsi`, `nominal`, `tanggal_tenggat`, `status`) VALUES
(1, 2, 'Blok E7', 'Cheap and Poor', 100000, '2018-10-08', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `role` enum('admin','user','petugas') NOT NULL,
  `blokir` enum('y','n') NOT NULL,
  `avatar` varchar(25) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `blokir`, `avatar`, `token`) VALUES
(1, 'admin', '$2y$10$qBn5nAypj6ckNsNlQmWW1eW2iBMJQpB6SIfzbuC.Qq497QAINijnW', 'admin', 'n', 'avatar-3.png', '6d067808c46aa9efacc8c1b135a945e9'),
(2, 'saddam', '$2y$10$zWitIEnT1uabdcmXUflLvuw7Gsw9z03CqKdnGCHodlE2i4YtsEx8S', 'user', 'n', 'avatar-3.png', 'cb00afff7d35886b6d946f8b9fc8baa6'),
(5, 'juan', '$2y$10$qQdN.wf9oNKz/1dzK48dz.6F2DE50S560rkvfse9U58vezNQeh9Gm', 'petugas', 'n', 'avatar-1.png', '5e42642220c4cbce0558f4a64abd6253');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_laporan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_laporan` (
`id_laporan` int(15)
,`id_user` int(15)
,`nama` varchar(255)
,`jenis` varchar(255)
,`total_laporan` varbinary(28)
,`tanggal` varchar(86)
,`isVerified` enum('1','0')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pelanggan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pelanggan` (
`id_user` int(15)
,`nama` varchar(255)
,`telepon` varchar(15)
,`total_tagihan` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pembayaran`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pembayaran` (
`id` int(15)
,`id_tagihan` int(15)
,`nominal_bayar` varchar(57)
,`pertanggal` varchar(72)
,`tanggal` varchar(83)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_petugas`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_petugas` (
`id_user` int(15)
,`nama` varchar(255)
,`telepon` varchar(15)
,`total_laporan` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_tagihan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_tagihan` (
`id_tagihan` int(15)
,`nama_tagihan` varchar(255)
,`status` enum('aktif','tidak aktif')
,`tanggal_tenggat` varchar(72)
,`nominal` varchar(103)
,`nama` varchar(255)
,`id_user` int(15)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_laporan`
--
DROP TABLE IF EXISTS `view_laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`localhost` SQL SECURITY DEFINER VIEW `view_laporan`  AS  (select `l`.`id_laporan` AS `id_laporan`,`l`.`id_user` AS `id_user`,`p`.`nama` AS `nama`,`j`.`nama` AS `jenis`,concat((select count(0) AS `numrows` from `detail_laporan` where (`detail_laporan`.`id_laporan` = `l`.`id_laporan`)),' Berkas') AS `total_laporan`,date_format(`l`.`tanggal`,'%e %M %Y %H:%i:%s') AS `tanggal`,`l`.`isVerified` AS `isVerified` from (((`laporan` `l` join `user` `u` on((`l`.`id_user` = `u`.`id_user`))) join `petugas` `p` on((`p`.`id_user` = `u`.`id_user`))) join `jenis` `j` on((`j`.`id_jenis` = `l`.`id_jenis`)))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pelanggan`
--
DROP TABLE IF EXISTS `view_pelanggan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`localhost` SQL SECURITY DEFINER VIEW `view_pelanggan`  AS  (select `pelanggan`.`id_user` AS `id_user`,`pelanggan`.`nama` AS `nama`,`pelanggan`.`telepon` AS `telepon`,(select count(0) AS `numrows` from `tagihan` where ((`tagihan`.`id_user` = `pelanggan`.`id_user`) and (`tagihan`.`status` = 'aktif'))) AS `total_tagihan` from `pelanggan`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pembayaran`
--
DROP TABLE IF EXISTS `view_pembayaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`localhost` SQL SECURITY DEFINER VIEW `view_pembayaran`  AS  (select `pembayaran`.`id` AS `id`,`pembayaran`.`id_tagihan` AS `id_tagihan`,concat('Rp. ',replace(format(`pembayaran`.`nominal_bayar`,0),',','.')) AS `nominal_bayar`,date_format(`pembayaran`.`pertanggal`,'%e %M %Y') AS `pertanggal`,date_format(`pembayaran`.`tanggal`,'%e %M %Y %H:%i') AS `tanggal` from `pembayaran`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_petugas`
--
DROP TABLE IF EXISTS `view_petugas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`localhost` SQL SECURITY DEFINER VIEW `view_petugas`  AS  (select `petugas`.`id_user` AS `id_user`,`petugas`.`nama` AS `nama`,`petugas`.`telepon` AS `telepon`,(select count(0) AS `numrows` from `laporan` where (`laporan`.`id_user` = `petugas`.`id_user`)) AS `total_laporan` from `petugas`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_tagihan`
--
DROP TABLE IF EXISTS `view_tagihan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`localhost` SQL SECURITY DEFINER VIEW `view_tagihan`  AS  (select `t`.`id_tagihan` AS `id_tagihan`,`t`.`nama_tagihan` AS `nama_tagihan`,`t`.`status` AS `status`,date_format(`t`.`tanggal_tenggat`,'%e %M %Y') AS `tanggal_tenggat`,concat('Rp. ',replace(format(`t`.`nominal`,0),',','.')) AS `nominal`,`p`.`nama` AS `nama`,`p`.`id_user` AS `id_user` from ((`tagihan` `t` join `user` `u` on((`t`.`id_user` = `u`.`id_user`))) join `pelanggan` `p` on((`p`.`id_user` = `u`.`id_user`)))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `detail_laporan`
--
ALTER TABLE `detail_laporan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_laporan` (`id_laporan`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user_2` (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tagihan` (`id_tagihan`);

--
-- Indeks untuk tabel `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `detail_laporan`
--
ALTER TABLE `detail_laporan`
  MODIFY `id_detail` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_laporan`
--
ALTER TABLE `detail_laporan`
  ADD CONSTRAINT `detail_laporan_ibfk_1` FOREIGN KEY (`id_laporan`) REFERENCES `laporan` (`id_laporan`);

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`),
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `petugas` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_tagihan`) REFERENCES `tagihan` (`id_tagihan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `tagihan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pelanggan` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
