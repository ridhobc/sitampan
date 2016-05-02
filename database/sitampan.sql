-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Apr 2016 pada 15.06
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sitampan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_at` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
('level-admin', '1', 1427942948, 1, 1427942948, 1),
('level-admin', '23', 1447136767, 1, 1447136767, 1),
('level-admin-iku', '1', 1444897771, 1, 1444897771, 1),
('level-admin-iku', '23', 1447136705, 1, 1447136705, 1),
('level-admin-psp', '1', 1442894367, 1, 1442894367, 1),
('level-admin-psp', '15', 1442894214, 1, 1442894214, 1),
('level-admin-psp', '21', 1444376150, 1, 1444376150, 1),
('level-admin-sm', '1', 1442971820, 1, 1442971820, 1),
('level-admin-sm', '7', 1427969317, 1, 1439963276, 1),
('level-user', '12', 1439965234, 1, 1439965234, 1),
('level-user', '13', 1452591569, 1, 1452591586, 1),
('level-user', '14', 1442800514, 1, 1442800514, 1),
('level-user', '15', 1442889909, 1, 1442889909, 1),
('level-user', '16', 1443494976, 1, 1443494976, 1),
('level-user', '17', 1447139552, 1, 1447139552, 1),
('level-user', '18', 1443759781, 1, 1443759781, 1),
('level-user', '19', 1447118310, 1, 1447118310, 1),
('level-user', '21', 1444376135, 1, 1444376135, 1),
('level-user', '22', 1447117853, 1, 1447117853, 1),
('level-user', '24', 1447137475, 23, 1447137475, 23),
('level-user', '25', 1447150766, 1, 1447150766, 1),
('level-user', '26', 1447214376, 1, 1447214376, 1),
('level-user', '27', 1447214555, 1, 1447214555, 1),
('level-user', '28', 1449200252, 1, 1449200252, 1),
('level-user', '29', 1452569818, 1, 1452569818, 1),
('level-user', '30', 1453088121, 1, 1453088121, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) unsigned DEFAULT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
('create-auth-assignment', 1, 'menambah auth assignment', NULL, NULL, 1427969036, 1427969036, 1, 1),
('create-auth-item', 1, 'akses untuk menambahkan auth item', NULL, NULL, 1427954269, 1427954269, 1, 1),
('create-auth-item-child', 1, 'menambah item child', NULL, NULL, 1427968366, 1427968366, 1, 1),
('create-auto-number', 1, 'Membuat Autonumber untuk Agenda IP', NULL, NULL, 1443493457, 1443493457, 1, 1),
('create-pbi', 1, 'menambah unit eselon I', NULL, NULL, 1428647374, 1428647374, 1, 1),
('create-pebin', 1, 'merekam kementerian dan lembaga (pebin)', NULL, NULL, 1428389906, 1428389906, 1, 1),
('create-ppbi', 1, 'Menambah Unit Eselon I', NULL, NULL, 1428647296, 1428647296, 1, 1),
('create-psp', 1, 'Rekam PSP', NULL, NULL, 1442894026, 1442894026, 1, 1),
('create-surat-masuk', 1, 'input surat masuk', NULL, NULL, 1439962651, 1439962651, 1, 1),
('create-tanah', 1, 'merekam tanah', NULL, NULL, 1428379551, 1428379551, 1, 1),
('create-upb', 1, 'menambah satker', NULL, NULL, 1428387750, 1428387750, 1, 1),
('create-user', 1, 'menambah user', NULL, NULL, 1427970176, 1427970176, 1, 1),
('delete-auth-assignment', 1, 'menghapus auth assignment', NULL, NULL, 1427969679, 1427969679, 1, 1),
('delete-auth-item', 1, 'untuk menghapus auth item', NULL, NULL, 1427954333, 1427954333, 1, 1),
('delete-auth-item-child', 1, 'Hapus Auth Item Child', NULL, NULL, 1441244156, 1441244156, 1, 1),
('delete-auto-number', 1, 'menghapus Setting Agenda IP/ AUTO NUMBER', NULL, NULL, 1443493433, 1443493433, 1, 1),
('delete-disposisi', 1, 'Hapus Disposisi', NULL, NULL, 1443512235, 1443512235, 1, 1),
('delete-psp', 1, 'hapus psp', NULL, NULL, 1442894047, 1442894047, 1, 1),
('delete-surat-masuk', 1, 'hapus surat masuk\r\n', NULL, NULL, 1439962633, 1439962633, 1, 1),
('delete-upb', 1, 'menghapus Satker', NULL, NULL, 1428477798, 1428477798, 1, 1),
('delete-user', 1, 'menghapus user', NULL, NULL, 1427970208, 1427970208, 1, 1),
('level-admin', 1, 'dapat menginput semuanyaasasasasas', NULL, NULL, NULL, 1443494995, NULL, 1),
('level-admin-iku', 1, 'admin IKU', NULL, NULL, 1444897721, 1444897721, 1, 1),
('level-admin-psp', 1, 'adminnya PSP', NULL, NULL, 1442894116, 1443493167, 1, 1),
('level-admin-sm', 1, 'adminnya surat masuk', NULL, NULL, 1439963146, 1443493267, 1, 1),
('level-user', 1, 'level user yang hanya bisa beberapa hak akses', NULL, NULL, 1427954209, 1443493095, 1, 1),
('update-auth-assignment', 1, 'update auth assignment', NULL, NULL, 1427969730, 1427969730, 1, 1),
('update-auth-item', 1, 'akses untuk mengupdate auth item', NULL, NULL, 1427954304, 1427954304, 1, 1),
('update-auth-item-child', 1, 'mengupdate auth item child', NULL, NULL, 1428378090, 1428378090, 1, 1),
('Update-auto-number', 1, 'Merubah Auto Number Agenda IP', NULL, NULL, 1443493475, 1443493475, 1, 1),
('update-disposisi', 1, 'update disposisi', NULL, NULL, 1447985609, 1447985609, 1, 1),
('update-pbi', 1, 'mengupdate eselon I', NULL, NULL, 1428647395, 1428647395, 1, 1),
('update-pebin', 1, 'mengubah kemneterian dan lembaga', NULL, NULL, 1428646312, 1428646312, 1, 1),
('update-penetapan-psp', 1, 'Merubah penetapan PSP', NULL, NULL, 1443520880, 1443520880, 1, 1),
('update-ppbi', 1, 'mengupdate unit kanwil', NULL, NULL, 1428647415, 1428647415, 1, 1),
('update-psp', 1, 'update psp', NULL, NULL, 1442894038, 1442894038, 1, 1),
('update-surat-masuk', 1, 'edit surat masuk', NULL, NULL, 1439963203, 1439963203, 1, 1),
('update-upb', 1, 'update satker', NULL, NULL, 1428479355, 1428479355, 1, 1),
('update-user', 1, 'mengubah user', NULL, NULL, 1427970190, 1427970190, 1, 1),
('view-profil-pribadi', 1, 'melihat profil pribadi', NULL, NULL, 1428378807, 1428378807, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('level-admin', 'create-auth-assignment'),
('level-admin', 'create-auth-item'),
('level-admin', 'create-auth-item-child'),
('level-admin', 'create-auto-number'),
('level-admin', 'create-pbi'),
('level-admin', 'create-pebin'),
('level-admin-psp', 'create-psp'),
('level-admin-sm', 'create-surat-masuk'),
('level-admin', 'create-tanah'),
('level-admin', 'create-upb'),
('level-admin', 'create-user'),
('level-admin', 'delete-auth-assignment'),
('level-admin', 'delete-auth-item'),
('level-admin', 'delete-auth-item-child'),
('level-admin', 'delete-auto-number'),
('level-admin', 'delete-disposisi'),
('level-admin-psp', 'delete-psp'),
('level-admin-sm', 'delete-surat-masuk'),
('level-admin', 'delete-upb'),
('level-admin', 'delete-user'),
('level-admin', 'level-user'),
('level-admin', 'update-auth-assignment'),
('level-admin', 'update-auth-item'),
('level-admin', 'update-auth-item-child'),
('level-admin', 'Update-auto-number'),
('level-admin-sm', 'Update-auto-number'),
('level-admin-sm', 'update-disposisi'),
('level-admin', 'update-pbi'),
('level-admin', 'update-pebin'),
('level-admin-psp', 'update-penetapan-psp'),
('level-admin', 'update-ppbi'),
('level-admin-psp', 'update-psp'),
('level-admin-sm', 'update-surat-masuk'),
('level-user', 'update-surat-masuk'),
('level-admin', 'update-upb'),
('level-admin', 'update-user'),
('level-admin', 'view-profil-pribadi'),
('level-user', 'view-profil-pribadi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auto_number`
--

CREATE TABLE IF NOT EXISTS `auto_number` (
  `group` varchar(32) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `optimistic_lock` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `tabel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auto_number`
--

INSERT INTO `auto_number` (`group`, `number`, `optimistic_lock`, `update_time`, `tabel`) VALUES
('0262d912f4fbcc85c0ce4e563b51bf73', 25, 25, 1449740888, NULL),
('0fdcb075d8e062e7b7db603d3722845f', 13, 13, 1452570252, NULL),
('11e7b8ab5f6b87faac7a543c8f6a891b', 3104, 3104, 1451549719, NULL),
('181b8d41106cd1d64b3124744dfdfea9', 43, 43, 1453090485, NULL),
('2512c990611ed7b546c6dad91e45995e', 9, 9, 1449209504, NULL),
('25887883001b38731413959a01731053', 27, 27, 1454987520, NULL),
('297018fa5f479c7155a571eb71fccd07', 19, 19, 1447293090, NULL),
('2ad046307a6c8840e719fbcaee3f9d08', 24, 24, 1447322220, NULL),
('4a6965cd34bc12fc24377b4aac58400c', 62, 62, 1452607380, NULL),
('74a33ac03c35c3fb008192db2e5a739c', 46, 46, 1450689120, NULL),
('82e6865144e4c025d4b6b5febd353d5a', 36, 36, 1452841720, NULL),
('837fec70a38a781516c346c48d3e57b7', 963, 963, 1459917238, NULL),
('94f432caa2de97c41fc433daccf31461', 39, 39, 1456202695, NULL),
('9995a8fbfc638cd62739b12dc84ac30f', 1, 1, 1453883639, NULL),
('af31904c431d3ee00f47aa10f1bb2f3d', 25, 25, 1453187465, NULL),
('c2a63f8d16d8e4df7c389d81931c375e', 10, 10, 1449819370, NULL),
('c4879d32263646a5d19732a4a18aeb80', 31, 31, 1449710346, NULL),
('cccdd9903e91c7f57a1c376df1151331', 12, 12, 1447319066, NULL),
('d5e318975f0327a1a0869e4948caff88', 86, 86, 1450683942, NULL),
('d6ceeb26e94da693fb44a4b80210e4f9', 19, 19, 1459914137, NULL),
('e2c64d5ac0eb8bfe6f122b6f354e90f1', 21, 21, 1453879256, NULL),
('e6a4f939e70e6d087a227660ec2d6a62', 3, 3, 1447836156, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bcf15`
--

CREATE TABLE IF NOT EXISTS `bcf15` (
  `id` int(11) NOT NULL,
  `bcf15no` varchar(100) DEFAULT NULL,
  `bcf15tgl` date DEFAULT NULL,
  `penandatangan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bcf15_detail`
--

CREATE TABLE IF NOT EXISTS `bcf15_detail` (
  `id` int(11) NOT NULL,
  `bcf15_id` int(11) NOT NULL,
  `bc11no` varchar(200) DEFAULT NULL,
  `bc11tgl` date DEFAULT NULL,
  `bc11pos` varchar(45) DEFAULT NULL,
  `bc11subpos` varchar(45) DEFAULT NULL,
  `nama_sarkut` varchar(200) DEFAULT NULL,
  `jumlah_brg` varchar(200) DEFAULT NULL,
  `satuan_brg` int(11) DEFAULT NULL,
  `uraian_brg` varchar(200) DEFAULT NULL,
  `berat_brg` varchar(200) DEFAULT NULL,
  `consignee` varchar(45) DEFAULT NULL,
  `alamat_consignee` varchar(45) DEFAULT NULL,
  `kota_consignee` varchar(45) DEFAULT NULL,
  `notify` varchar(45) DEFAULT NULL,
  `alamat_notify` varchar(45) DEFAULT NULL,
  `kota_notify` varchar(45) DEFAULT NULL,
  `tpp_id` int(11) NOT NULL,
  `tps_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bcf15_detail_cont`
--

CREATE TABLE IF NOT EXISTS `bcf15_detail_cont` (
  `id` int(11) NOT NULL,
  `bcf15_detail_id` int(11) NOT NULL,
  `ukuran` varchar(45) DEFAULT NULL,
  `nomor_pk` varchar(45) DEFAULT NULL,
  `jenis_pk` int(11) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `message` text,
  `updateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(10) unsigned NOT NULL,
  `receiver_name` varchar(45) NOT NULL,
  `receiver_email` varchar(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `attachment` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `emails`
--

INSERT INTO `emails` (`id`, `receiver_name`, `receiver_email`, `subject`, `content`, `attachment`) VALUES
(3, 'Ridwan Nento', 'ridhobc@gmail.com', 'asa', 'asas', 'attachments/1444623884.png'),
(4, 'Ridwan Nento', 'ridhobc@gmail.com', 'asas', 'qwqw', NULL),
(5, 'Ridwan Nento', 'ridhobc@gmail.com', 'qwqw', 'qqwqw', 'attachments/1444628903.png'),
(6, 'Ridwan Nento', 'ridhobc@gmail.com', 'asas', 'asas', 'attachments/1444629530.png'),
(7, 'Ridwan Nento', 'ridhobc@gmail.com', 'asas', 'asas', 'attachments/1444629634.png'),
(8, 'Ridwan Nento', 'ridhobc@gmail.com', 'asasas', 'asasas', NULL),
(9, 'Ridwan Nento', 'ridhobc@gmail.com', 'as', 'qsqs', NULL),
(10, 'Ridwan Nento', 'ridhobc@gmail.com', 'asas', 'asas', 'attachments/1444630393.png'),
(11, 'Ridwan Nento', 'ridhobc@gmail.com', 'asas', '12', 'attachments/1444630531.png'),
(12, 'Ridwan Nento', 'ridhobc@gmail.com', 'as', 'asas', 'attachments/1444630610.png'),
(13, 'Ridwan Nento', 'ridhobc@gmail.com', 'as', 'asas', 'attachments/1444630924.png'),
(14, 'Ridwan Nento', 'ridhobc@gmail.com', 'asas', 'a', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(80) NOT NULL,
  `event_detail` varchar(255) NOT NULL,
  `event_start_date` datetime NOT NULL,
  `event_end_date` datetime NOT NULL,
  `event_type` int(11) NOT NULL,
  `event_url` varchar(255) DEFAULT NULL,
  `event_all_day` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_detail`, `event_start_date`, `event_end_date`, `event_type`, `event_url`, `event_all_day`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_status`) VALUES
(1, 'as', 'asas', '2015-10-05 07:00:00', '2015-10-22 07:55:00', 1, NULL, 0, '2015-10-12 12:57:00', 1, '2015-11-02 16:29:24', 1, 2),
(2, 'aasa', 'sasas', '2015-09-07 07:00:00', '2015-09-07 07:00:00', 2, NULL, 0, '2015-10-12 12:57:35', 1, '2015-11-02 16:29:38', 1, 2),
(3, 'asas', 'asas', '2015-11-02 07:00:00', '2015-11-02 07:00:00', 1, NULL, 0, '2015-11-02 13:05:01', 1, '2015-11-02 16:29:48', 1, 2),
(4, 'LK Triwulan III 2015', 'Laporan Triwulan III 2015 di Bogor, Hotel Golden Flower', '2015-10-25 07:00:00', '2015-10-31 23:00:00', 3, NULL, 0, '2015-11-02 16:31:30', 1, NULL, NULL, 0),
(5, 'BAST Guguk ke Jatim I', 'BAST Guguk ke Jatim I', '2015-10-21 14:00:00', '1970-01-01 07:00:00', 4, NULL, 0, '2015-11-02 16:35:56', 1, '2015-11-02 16:36:25', 1, 2),
(6, 'BAST Guguk ke Jatim I', 'BAST Guguk ke Jatim I', '2015-10-21 07:00:00', '2015-10-23 23:00:00', 4, NULL, 0, '2015-11-02 16:36:56', 1, NULL, NULL, 0),
(7, 'ATT!!! BATAS TERAKHIR MENGISI PUPNS', 'BATAS TERAKHIR PENGISIAN PUPNS SAMPAI TGL 30 NOVEMBER 2015', '2015-11-10 21:00:00', '2015-12-01 13:00:00', 2, NULL, 0, '2015-11-10 12:43:22', 1, '2015-11-10 16:57:14', 1, 0),
(8, 'PPKP IKU ', 'PPKP', '2015-11-11 10:00:00', '2015-11-11 12:00:00', 3, NULL, 0, '2015-11-11 10:25:51', 1, NULL, NULL, 0),
(9, 'Verifikasi Lapangan', 'Verifikasi Lapangan RKBMN Pengadaan 2017 KPPBC TMP medan PIC Yanuar, Wing', '2015-11-16 14:00:00', '2015-11-19 05:00:00', 2, NULL, 0, '2015-11-17 12:50:44', 1, '2015-11-17 12:51:49', 1, 0),
(10, 'Verifikasi Lapangan Kanwil DJBC Sumbagsel ', 'Verifikasi Lapangan RKBMN Pengadaan Kanwil DJBC Sumbagsel PIC Rika', '2015-11-16 14:00:00', '2015-11-19 05:00:00', 2, NULL, 0, '2015-11-17 12:52:31', 1, '2015-11-17 12:53:05', 1, 0),
(11, 'Verifikasi Lapangan KPPBC TMP A Makassar', 'Verifikasi Lapangan KPPBC TMP A Makassar PIC Fery, Nento', '2015-11-23 07:00:00', '2015-11-25 21:00:00', 2, NULL, 0, '2015-11-17 12:53:49', 1, NULL, NULL, 0),
(12, 'Verifikasi Lapangan KPPBC Maumere', 'Verifikasi Lapangan KPPBC Maumere Cundoko, Naeli', '2015-11-24 07:00:00', '2015-11-27 22:00:00', 2, NULL, 0, '2015-11-17 12:54:38', 1, NULL, NULL, 0),
(13, 'Verifikasi Lapangan KPPBC Maumere', 'Verifikasi Lapangan KPPBC Maumere', '2015-11-30 07:00:00', '2015-12-02 22:00:00', 2, NULL, 0, '2015-11-17 12:55:11', 1, NULL, NULL, 0),
(14, 'Jangan Lupa', 'tesss', '2015-11-04 07:00:00', '2015-11-04 07:00:00', 4, NULL, 0, '2015-11-18 17:29:14', 1, '2015-11-18 17:29:39', 1, 2),
(15, 'Undangan RDK', 'Undangan Rapat Pembahasan Draft Ketentuan Standarisasi Aset di Lingkungan DJBC ', '2015-12-10 17:00:00', '2015-12-10 20:00:00', 3, NULL, 0, '2015-12-07 13:58:49', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1457951444),
('m130524_201442_init', 1457951453);

-- --------------------------------------------------------

--
-- Struktur dari tabel `msg_of_day`
--

CREATE TABLE IF NOT EXISTS `msg_of_day` (
`msg_of_day_id` int(11) NOT NULL,
  `msg_details` varchar(100) NOT NULL,
  `msg_user_type` char(3) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `msg_of_day`
--

INSERT INTO `msg_of_day` (`msg_of_day_id`, `msg_details`, `msg_user_type`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_status`) VALUES
(1, 'Silahkan Update Photo Profil nya, Jangan Lupa PUPNS diisi dan dikirim', 'S', '2015-10-09 11:32:16', 1, '2015-12-07 13:55:35', 1, 1),
(2, 'asasaaasasasaa', 'S', '2015-10-19 09:41:51', 1, '2015-11-20 09:39:41', 1, 2),
(3, 'asasasas', '0', '2015-11-20 11:10:43', 1, '2015-11-20 11:12:42', 1, 1),
(4, 'Undangan RDK Pbahasan Standarisasi Aset di Lingkungan DJBC, Kamis 10 Desember 2015 Pukul 17.00 sd se', '0', '2015-12-07 13:57:17', 1, '2016-01-07 16:09:10', 1, 1),
(5, 'Hari ini ultahnya jenal ya, Makan-makan dong', '0', '2016-01-07 16:09:41', 1, '2016-01-11 14:06:58', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
`notice_id` int(11) NOT NULL,
  `notice_title` varchar(25) NOT NULL,
  `notice_description` varchar(255) DEFAULT NULL,
  `notice_user_type` char(3) NOT NULL,
  `notice_date` date DEFAULT NULL,
  `notice_file_path` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penandatangan`
--

CREATE TABLE IF NOT EXISTS `penandatangan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(45) DEFAULT NULL,
  `namapejabat` varchar(45) DEFAULT NULL,
  `nippejabat` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tpp`
--

CREATE TABLE IF NOT EXISTS `tpp` (
  `id` int(11) NOT NULL,
  `namatpp` varchar(200) DEFAULT NULL,
  `alamattpp` varchar(200) DEFAULT NULL,
  `pimpinantpp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tps`
--

CREATE TABLE IF NOT EXISTS `tps` (
  `id` int(11) NOT NULL,
  `namatps` varchar(200) DEFAULT NULL,
  `alamattps` varchar(200) DEFAULT NULL,
  `pimpinantps` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT '1',
  `born` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion_id` int(11) DEFAULT '1',
  `role` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `nip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iddisposisi` int(10) unsigned DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jabatan` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `name`, `gender`, `born`, `birthday`, `address`, `phone`, `email`, `religion_id`, `role`, `status`, `created_at`, `updated_at`, `nip`, `iddisposisi`, `photo`, `jabatan`) VALUES
(1, 'nento', 'IXvivtD69Nkk_wJQcq38ja8K13GllPuI', '$2y$13$gx2.LvVoalAq1e/vTJr6w.A3gkXVUCQohTGKuqkKGhg3WZl.XrJ6y', 'XNNI1PHI-QGAAtS_rXBcTu-MxMXyBXfT_1447830986', 'Ridwan Nento', 1, 'Menadoaa', '1985-05-10', 'Ada aja', '081356882384', 'ridhobc@gmail.com', 1, 'admin', 10, 1423539221, 1453169909, '198505102004121004', 1, 'Ridwan Nento_198505102004121004.JPG', 'pelaksana'),
(7, 'siti', '0ObcspJtj1W6uPD8QubqGB2sW8PieaZr', '$2y$13$gx2.LvVoalAq1e/vTJr6w.A3gkXVUCQohTGKuqkKGhg3WZl.XrJ6y', 'VwgINlHNbdZjL9T8z6mPyu_DwYitNbCb_1439964894', 'Siti Rasmiati', 1, 'aaa', '1960-05-09', 'asa', 'asa', 'perlengkapanbc@gmail.com', 1, 'user', 10, 1432085079, 1447925432, '196005091984032001', 21, 'Siti Rasmiati_196005091984032001.JPG', 'pelaksana'),
(12, 'jenal', 'WY_Cahcm31rZwJr1bQW13Z5fJU1EsPuC', '$2y$13$gx2.LvVoalAq1e/vTJr6w.A3gkXVUCQohTGKuqkKGhg3WZl.XrJ6y', NULL, 'Jenal Mutakin', 1, '.', '1986-01-07', '.', '', 'jenalbc@gmail.com', 1, 'user', 10, 1439964949, 1452157661, '198601072006021003', 17, 'Jenal Mutakin_198601072006021003.JPG', 'pelaksana'),
(13, 'agus', '45TvtdfEz9ODSuKiVTVtEXQMoQkwSjtG', '$2y$13$0VeBju8cljNkBFtJhV7BX.LF.vS86Dr7zZJfXYVRmVfa4Yh4b8iuK', NULL, 'agus', 1, 'a', '1986-01-06', 'a', '11', 'agus@gmail.com', 1, 'user', 10, 1439965722, 1447925467, '198601062007101001', 8, 'agus_198601062007101001.JPG', 'pelaksana'),
(14, 'cundoko', 'ax6M6nnjnc0YPGS_lrWDCqT4EIM5BuW0', '$2y$13$vNtpMWyWyL96JT01MrbLM.lflIbIIRZTS.yPeaZib7wVApy6rw0nS', NULL, 'Cundoko', 1, 'Magelang', '1982-11-24', 'Green Park View Apartment Jalan Daan Mogot KM 14 Jakarta Barat', '081586602466', 'cundoko@gmail.com', 1, 'user', 10, 1447398284, 1449710532, '198211242004121001', 3, NULL, 'pelaksana'),
(15, 'naely', '87XFmrN_HzKsuTCfImUg_wL5sALbI17g', '$2y$13$zcY6eUb6731gWD6REsRL4.4iGTWBaHBAyBQB7VFhBaTCfBqPJOHDC', NULL, 'Naeli', 0, 'tes', '1989-07-30', 'aa', 'a', 'perlengkapanbc@gmail.com', 1, 'user', 10, 1442889883, 1444378465, '198907302015022001', 16, NULL, 'pelaksana'),
(16, 'fery', 'sazT3bmfEGv0kdYdQU32WU_5B32t8oEn', '$2y$13$I9gb.bzQaSqDpoHO7/n1JeURNfzggV1qv81GGVMbHy.13WaloYP5C', NULL, 'Fery', 1, '.', '1980-11-24', '.', '.', 'perlengkapanbc@gmail.com', 1, 'user', 10, 1443494931, 1447925491, '198011242003121001', 2, 'Fery_198011242003121001.JPG', 'pelaksana'),
(17, 'zein', 'SS6eWFI0pU97_elsONoHlc9bw4oTADo8', '$2y$13$.tJtMMFeOynY8qdw7YH2DON9vvP4r9bcfkAX7cOhfw7dL63Pt6j86', NULL, 'zein husein ', 1, '.', '1988-05-26', '.', '.', 'perlengkapanbc@gmail.com', 1, 'user', 10, 1443507905, 1447925509, '198805262007101003', 7, 'zein husein _198805262007101003.JPG', 'pelaksana'),
(18, 'arif', 'zoG8lGQCn9BTd4bvc23oMChUCdmAjiZE', '$2y$13$Ss5PmDCfkShY8RYiOtRamuxjHHQ4gm6EDinEVY9eAu2mYQy.yvPV2', NULL, 'Arif Santosa', 1, 'Klaten', '1984-10-28', 'Perumahan Alam Asri Kemuning Jl Kemuning 4 Blok C1 No 5 Pamulang Tangerang Selatan', '05693027949', 'santostampan@gmail.com', 1, 'user', 10, 1443759319, 1447925522, '198410282007011001', 18, 'Arif Santosa_198410282007011001.JPG', 'pelaksana'),
(19, 'rika', 'CkOG7sMULidXxUr68IJqkjkYooZi2Zkl', '$2y$13$6LePJZAVD9GykyE59hScN.k947yWd.4eu4ZDBogollw.dQDriXXJC', NULL, 'Rika Savita', 0, '.', '1984-04-08', '.', '.', 'perlengkapanbc@gmail.com', 1, 'user', 10, 1443759848, 1447925533, '198404082003122001', 6, 'Rika Savita_198404082003122001.JPG', 'pelaksana'),
(20, 'wing', 'HOF-GJPVRuo50qu_RKIyOxJXVyWc_Hnb', '$2y$13$vqCsFdlPqAkfC/OdybWnLewkmhx.0Qi2xns5bm4JxHrhLlg/HwANy', NULL, 'Wing', 1, '.', '1993-03-11', '.', '.', 'perlengkapanbc@gmail.com', 1, 'user', 10, 1443759900, 1444378562, '19930311201301003', 12, NULL, 'pelaksana'),
(21, 'bahrul', '7PJRpPxmJZ68ni0SHzZbHLqLxl9ddGnV', '$2y$13$6K26oKcBKRcbll44vnP8w.VrzAdWz291HElqU47pBbDSPgC.YD/xG', NULL, 'Bahrul Ulum', 1, '-', '1990-07-23', '-', '-', 'perlengkapanbc@gmail.com', 1, 'user', 10, 1444376074, 1444378578, '199007232015021001', 22, NULL, 'pelaksana'),
(22, 'yanuar', 'vVvCiboKbYUfZOX8zulbqDOWw5aF9_9S', '$2y$13$gx2.LvVoalAq1e/vTJr6w.A3gkXVUCQohTGKuqkKGhg3WZl.XrJ6y', NULL, 'Yanuar Arifianto', 1, 'Wonosobo', '1989-01-15', '-', '-', 'yanuar.arifianto@gmail.com', 1, 'user', 10, 1447117830, 1447927826, '198901152010121004', 13, NULL, 'pelaksana'),
(23, 'seksi', 'lrD1DVG-hz3h4ZpsFPAVuo78B3ZlQ51Z', '$2y$13$gx2.LvVoalAq1e/vTJr6w.A3gkXVUCQohTGKuqkKGhg3WZl.XrJ6y', NULL, 'Tri Utomo Hendro WIbowo', 1, NULL, '1975-05-31', '-', '-', 'triutomo@gmail.com', 1, 'admin', 10, 1447136665, 1452246683, '197505311995031001', 24, NULL, 'seksi'),
(24, 'reno', '-_5O8QzoefE4oewKWR-WUvs51pkvc_ga', '$2y$13$gx2.LvVoalAq1e/vTJr6w.A3gkXVUCQohTGKuqkKGhg3WZl.XrJ6y', NULL, 'Reno Wijaya', 1, NULL, '1990-10-23', '-', '*', 'reno.wijaya345@gmail.com', 1, 'user', 10, 1447137459, 1447927917, '199010232009121001', 11, NULL, 'pelaksana'),
(25, 'ferdian', 'phCOQNYkI97t-EDg4lEot6pkITMXfEz_', '$2y$13$gx2.LvVoalAq1e/vTJr6w.A3gkXVUCQohTGKuqkKGhg3WZl.XrJ6y', NULL, 'Ferdian', 1, NULL, '1977-10-18', '-', '-', 'farrelferdi@ymail.com', 1, 'user', 10, 1447150750, 1447927764, '197710182003121002', 4, 'Ferdian_197710182003121002.JPG', 'pelaksana'),
(27, 'jeffry', 'cFHRcZkWBMdLCKfuqd_u_2Gu9eNCediJ', '$2y$13$gx2.LvVoalAq1e/vTJr6w.A3gkXVUCQohTGKuqkKGhg3WZl.XrJ6y', NULL, 'Jeffry Mauritz', 1, NULL, '1987-10-09', '-', '-', 'jeffry.mauritz@customs.go.id', 2, 'user', 10, 1447214542, 1447927714, '198710092007101002', 9, NULL, 'pelaksana'),
(28, 'oyi', 'KsH6bP6_sUbfRUbNLY9KJkHPWEIhjrNy', '$2y$13$9Dujx0qneq8ET7Vnp9M35OVMrfQ/CqQIALnirNIyIw3BgDQXjk3em', NULL, 'Yosnia Qorina Zamza', 0, NULL, '1990-12-11', '-', '-', 'oyi@gmail.com', 1, 'user', 10, 1449200232, 1449200232, '199012112012122001', 5, NULL, NULL),
(29, 'radit', 'rAF3BlaXCmfEJdKVct10-K2wGafOyeJu', '$2y$13$gx2.LvVoalAq1e/vTJr6w.A3gkXVUCQohTGKuqkKGhg3WZl.XrJ6y', NULL, 'Raditya', 1, NULL, '1988-06-17', '-', '081277340240', 'radityanor@gmail.com', 1, 'user', 10, 1452569775, 1452569775, '198806172007101001', 10, NULL, NULL),
(30, 'haryo', 'mTKBAl0MBRFWAeu7dUcnfdZm7SQQDnyO', '$2y$13$gx2.LvVoalAq1e/vTJr6w.A3gkXVUCQohTGKuqkKGhg3WZl.XrJ6y', NULL, 'Haryo Sulistianto', 1, NULL, '1995-07-04', '-', '085710755146', 'haryo.sulistianto@gmail.com', 1, 'user', 10, 1453088106, 1453088106, '199507042015021005', 23, NULL, NULL),
(31, 'nento10', 'liqmOmOdDhrCXhWdxievmISJzWjUdUX2', '$2y$13$gx2.LvVoalAq1e/vTJr6w.A3gkXVUCQohTGKuqkKGhg3WZl.XrJ6y', NULL, '1', 1, NULL, '2016-01-18', '1', '.', 'perlengkapanbc1@gmail.com', 1, 'user', 10, 1453088356, 1453103963, '1-', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bcf15`
--
ALTER TABLE `bcf15`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_bcf15_penandatangan1_idx` (`penandatangan_id`);

--
-- Indexes for table `bcf15_detail`
--
ALTER TABLE `bcf15_detail`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_bcf15_tpp_idx` (`tpp_id`), ADD KEY `fk_bcf15_tps1_idx` (`tps_id`), ADD KEY `fk_bcf15_detail_bcf151_idx` (`bcf15_id`);

--
-- Indexes for table `bcf15_detail_cont`
--
ALTER TABLE `bcf15_detail_cont`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_bcf15_detail_cont_bcf15_detail1_idx` (`bcf15_detail_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indexes for table `msg_of_day`
--
ALTER TABLE `msg_of_day`
 ADD PRIMARY KEY (`msg_of_day_id`), ADD UNIQUE KEY `msg_details` (`msg_details`), ADD KEY `created_by` (`created_by`), ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
 ADD PRIMARY KEY (`notice_id`), ADD KEY `created_by` (`created_by`), ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `penandatangan`
--
ALTER TABLE `penandatangan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tpp`
--
ALTER TABLE `tpp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tps`
--
ALTER TABLE `tps`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `msg_of_day`
--
ALTER TABLE `msg_of_day`
MODIFY `msg_of_day_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bcf15`
--
ALTER TABLE `bcf15`
ADD CONSTRAINT `fk_bcf15_penandatangan1` FOREIGN KEY (`penandatangan_id`) REFERENCES `penandatangan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `bcf15_detail`
--
ALTER TABLE `bcf15_detail`
ADD CONSTRAINT `fk_bcf15_detail_bcf151` FOREIGN KEY (`bcf15_id`) REFERENCES `bcf15` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_bcf15_tpp` FOREIGN KEY (`tpp_id`) REFERENCES `tpp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_bcf15_tps1` FOREIGN KEY (`tps_id`) REFERENCES `tps` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `bcf15_detail_cont`
--
ALTER TABLE `bcf15_detail_cont`
ADD CONSTRAINT `fk_bcf15_detail_cont_bcf15_detail1` FOREIGN KEY (`bcf15_detail_id`) REFERENCES `bcf15_detail` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

DELIMITER $$
--
-- Event
--
CREATE DEFINER=`root`@`localhost` EVENT `event1` ON SCHEDULE EVERY 1 DAY STARTS '2015-04-09 08:47:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN

call start_process();
call clear_import_not_success();
call clear_null_hospcode();
call clear_upload_error();
call merge_newborncare();
call cal_chart_dial_1('2014-09-30');
call cal_chart_dial_2('2014-09-30');
call cal_chart_dial_3('2014-09-30');
call cal_chart_dial_4();
call cal_chart_dial_5();
call cal_chart_dial_6();
call cal_ncd_cholesteral_colorchart('2014-09-30');
call cal_ncd_nocholesteral_colorchart('2014-09-30');
call cal_pyramid_level_1('2014-09-30');
call cal_pyramid_level_2();
call cal_pyramid_level_3();
call cal_sys_person_type();
call cal_count_service(2014);
call cal_count_service(2015);
call cal_rpt_visit_oldman(2014);
call cal_rpt_visit_oldman(2015);
call cal_rpt_panth_visit_ratio(2014);
call cal_rpt_panth_visit_ratio(2015);
call cal_rpt_panth_drug_value(2014);
call cal_rpt_panth_drug_value(2015);
call cal_rpt_cervical_cancer_screening(2014);
call cal_rpt_cervical_cancer_screening(2015);
call end_process();

END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
