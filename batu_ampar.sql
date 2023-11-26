-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2023 pada 09.55
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batu_ampar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agama`
--

CREATE TABLE `tb_agama` (
  `id_agama` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `islam_l` int(4) DEFAULT NULL,
  `islam_p` int(4) DEFAULT NULL,
  `katholik_l` int(4) DEFAULT NULL,
  `katholik_p` int(4) DEFAULT NULL,
  `kristen_l` int(4) DEFAULT NULL,
  `kristen_p` int(4) DEFAULT NULL,
  `hindu_l` int(4) DEFAULT NULL,
  `hindu_p` int(4) DEFAULT NULL,
  `budha_l` int(4) DEFAULT NULL,
  `budha_p` int(4) DEFAULT NULL,
  `kepercayaan_l` int(4) DEFAULT NULL,
  `kepercayaan_p` int(4) DEFAULT NULL,
  `tanggal_agama` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_agama`
--

INSERT INTO `tb_agama` (`id_agama`, `id_akun`, `islam_l`, `islam_p`, `katholik_l`, `katholik_p`, `kristen_l`, `kristen_p`, `hindu_l`, `hindu_p`, `budha_l`, `budha_p`, `kepercayaan_l`, `kepercayaan_p`, `tanggal_agama`) VALUES
(7, 22, 536, 491, 0, 0, 0, 0, 11, 9, 0, 0, 0, 0, '2023-06-27'),
(8, 23, 1645, 1637, 0, 0, 2, 7, 0, 0, 0, 0, 0, 0, '2023-06-21'),
(9, 24, 967, 910, 0, 0, 4, 5, 0, 0, 0, 0, 0, 0, '2023-06-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(11) NOT NULL,
  `nip` varchar(23) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_desa` int(11) DEFAULT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `nip`, `id_level`, `id_desa`, `nama_pengguna`, `jenis_kelamin`, `no_telp`, `alamat`, `username`, `password`, `foto`) VALUES
(18, '9088765667576687', 1, 16, 'Nisa aja', 'Perempuan', '08345678995', 'mawar', 'nisa', '5fad30428811fe378fd389cd7659a33c', 'default1.png'),
(21, '9088765667576687', 2, 16, 'Rayen', 'Laki - laki', '082157889345', 'jl. angsau', 'camat', 'e0dc1c969db5fa159c0e3ccc290e2314', 'WhatsApp_Image_2023-02-26_at_16_43_24.jpeg'),
(22, '214546587', 3, 16, 'ayu nisa', 'Perempuan', '082157889345', 'tirta jaya', 'desa', 'e54cc06625bbadf12163b41a3cb92bf8', 'Screenshot_2020-04-07-19-23-32-1.png'),
(23, '098765', 3, 23, 'Ayu', 'Perempuan', '09876543', '', 'durian bungkuk', 'ef7b88b01e35c2cd2c387f1e10b63b54', 'pantai_tabanio.PNG'),
(24, '0987654', 3, 25, 'lian', 'Perempuan', '098765', '', 'gunung melati', 'ef7b88b01e35c2cd2c387f1e10b63b54', 'default.png'),
(25, '', 3, 27, '', '', '', '', 'desa', 'ef7b88b01e35c2cd2c387f1e10b63b54', 'default.png'),
(26, '', 3, 18, '', '', '', '', 'desa', 'ef7b88b01e35c2cd2c387f1e10b63b54', 'default.png'),
(27, '', 3, 19, '', '', '', '', 'desa', 'ef7b88b01e35c2cd2c387f1e10b63b54', 'default.png'),
(28, '', 3, 20, '', '', '', '', 'desa', 'ef7b88b01e35c2cd2c387f1e10b63b54', 'default.png'),
(29, '', 3, 21, '', '', '', '', 'desa', 'ef7b88b01e35c2cd2c387f1e10b63b54', 'default.png'),
(30, '', 3, 22, '', '', '', '', 'desa', 'ef7b88b01e35c2cd2c387f1e10b63b54', 'default.png'),
(31, '', 3, 24, '', '', '', '', 'desa', 'ef7b88b01e35c2cd2c387f1e10b63b54', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bpd`
--

CREATE TABLE `tb_bpd` (
  `id_bpd` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama_bpd` varchar(50) NOT NULL,
  `tgllahir_bpd` date NOT NULL,
  `jabatan_bpd` varchar(30) NOT NULL,
  `nosk_bpd` varchar(50) NOT NULL,
  `periodeawal_bpd` int(4) NOT NULL,
  `periodeakhir_bpd` int(4) NOT NULL,
  `telp_bpd` varchar(13) NOT NULL,
  `tanggal_bpd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bpd`
--

INSERT INTO `tb_bpd` (`id_bpd`, `id_akun`, `nama_bpd`, `tgllahir_bpd`, `jabatan_bpd`, `nosk_bpd`, `periodeawal_bpd`, `periodeakhir_bpd`, `telp_bpd`, `tanggal_bpd`) VALUES
(7, 22, 'H.Ambliyansyah', '2000-03-08', 'Wakil Ketua', '188.45/219-KUM/2021', 2021, 2028, '0822456789098', '2023-06-20'),
(8, 22, 'Jaimahh', '1998-11-30', 'Ketua Bidang 1', '188.45/219-KUM/2021', 2021, 2027, '082234567986', '2023-06-20'),
(9, 23, 'Muhammad Budiyono', '2001-02-08', 'Ketua', '188.45/211-KUM/2021', 2021, 2027, '087654323456', '2023-06-21'),
(10, 23, 'Sudarsono', '1999-01-06', 'Wakil Ketua', '188.45/211-KUM/2021', 2021, 2027, '0876542345678', '2023-06-21'),
(11, 24, 'Djurpriono', '1998-06-17', 'Ketua', '188.45/214-KUM/2021', 2021, 2027, '082245689098', '2023-06-21'),
(12, 24, 'Pasimann', '1999-03-10', 'Wakil Ketua', '188.45/214-KUM/2021', 2021, 2027, '08765432678', '2023-06-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bumdesa`
--

CREATE TABLE `tb_bumdesa` (
  `id_bumdesa` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `tgl_bumdesa` date NOT NULL,
  `nama_bumdesa` varchar(50) NOT NULL,
  `alamat_bumdes` varchar(100) NOT NULL,
  `tgl_berdiri` date NOT NULL,
  `modal_awal` int(50) NOT NULL,
  `bpom` varchar(200) NOT NULL,
  `jenis_usaha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bumdesa`
--

INSERT INTO `tb_bumdesa` (`id_bumdesa`, `id_akun`, `tgl_bumdesa`, `nama_bumdesa`, `alamat_bumdes`, `tgl_berdiri`, `modal_awal`, `bpom`, `jenis_usaha`) VALUES
(21, 22, '2023-07-06', 'ayu aja', 'angsau', '2023-06-28', 50000, 'Surat BPOM.pdf', 'karet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_desa`
--

CREATE TABLE `tb_desa` (
  `id_desa` int(11) NOT NULL,
  `nama_desa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_desa`
--

INSERT INTO `tb_desa` (`id_desa`, `nama_desa`) VALUES
(16, 'Damar Lima'),
(18, 'Ambawang'),
(19, 'Batu Ampar'),
(20, 'Bluru'),
(21, 'Damit'),
(22, 'Damit Hulu'),
(23, 'Durian Bungkuk'),
(24, 'Gunung Mas'),
(25, 'Gunung Melati'),
(26, 'Jilatan'),
(27, 'Jilatan Alur'),
(28, 'Pantai Linuh'),
(29, 'Tajau Mulya'),
(30, 'Tajau Pecah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jeniskelamin`
--

CREATE TABLE `tb_jeniskelamin` (
  `id_jeniskelamin` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `jeniskelamin_l` int(4) DEFAULT NULL,
  `jeniskelamin_p` int(4) DEFAULT NULL,
  `tanggal_jeniskelamin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jeniskelamin`
--

INSERT INTO `tb_jeniskelamin` (`id_jeniskelamin`, `id_akun`, `jeniskelamin_l`, `jeniskelamin_p`, `tanggal_jeniskelamin`) VALUES
(8, 22, 547, 500, '2023-06-27'),
(9, 23, 1643, 1635, '2023-06-21'),
(10, 24, 971, 915, '2023-06-21'),
(11, 22, 0, 0, '2023-06-27'),
(12, 22, 3, 4, '2023-06-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jumlah`
--

CREATE TABLE `tb_jumlah` (
  `id_jumlah` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `penduduk_awal_l` int(4) DEFAULT NULL,
  `penduduk_awal_p` int(4) DEFAULT NULL,
  `kelahiran_l` int(4) DEFAULT NULL,
  `kelahiran_p` int(4) DEFAULT NULL,
  `kematian_l` int(4) DEFAULT NULL,
  `kematian_p` int(4) DEFAULT NULL,
  `pendatang_l` int(4) DEFAULT NULL,
  `pendatang_p` int(4) DEFAULT NULL,
  `pindah_l` int(4) DEFAULT NULL,
  `pindah_p` int(4) DEFAULT NULL,
  `tanggal_jumlah` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jumlah`
--

INSERT INTO `tb_jumlah` (`id_jumlah`, `id_akun`, `penduduk_awal_l`, `penduduk_awal_p`, `kelahiran_l`, `kelahiran_p`, `kematian_l`, `kematian_p`, `pendatang_l`, `pendatang_p`, `pindah_l`, `pindah_p`, `tanggal_jumlah`) VALUES
(8, 22, 542, 493, 1, 4, 0, 0, 5, 3, 1, 0, '2023-07-06'),
(9, 23, 1645, 1637, 1, 1, 3, 2, 0, 0, 0, 1, '2023-06-21'),
(10, 24, 965, 911, 5, 0, 0, 0, 2, 4, 1, 0, '2023-06-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `nama_level`) VALUES
(1, 'ADMIN'),
(2, 'CAMAT'),
(3, 'DESA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `tidak_sekolah_l` int(4) DEFAULT NULL,
  `tidak_sekolah_p` int(4) DEFAULT NULL,
  `tidak_sd_l` int(4) DEFAULT NULL,
  `tidak_sd_p` int(4) DEFAULT NULL,
  `tamatsd_l` int(4) DEFAULT NULL,
  `tamatsd_p` int(11) DEFAULT NULL,
  `sltp_l` int(4) DEFAULT NULL,
  `sltp_p` int(4) DEFAULT NULL,
  `slta_l` int(4) DEFAULT NULL,
  `slta_p` int(4) DEFAULT NULL,
  `diploma12_l` int(4) DEFAULT NULL,
  `diploma12_p` int(4) DEFAULT NULL,
  `diploma3_l` int(4) DEFAULT NULL,
  `diploma3_p` int(4) DEFAULT NULL,
  `strata1_l` int(4) DEFAULT NULL,
  `strata1_p` int(4) DEFAULT NULL,
  `strata2_l` int(4) DEFAULT NULL,
  `strata2_p` int(4) DEFAULT NULL,
  `strata3_l` int(4) DEFAULT NULL,
  `strata3_p` int(4) DEFAULT NULL,
  `tanggal_pendidikan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`id_pendidikan`, `id_akun`, `tidak_sekolah_l`, `tidak_sekolah_p`, `tidak_sd_l`, `tidak_sd_p`, `tamatsd_l`, `tamatsd_p`, `sltp_l`, `sltp_p`, `slta_l`, `slta_p`, `diploma12_l`, `diploma12_p`, `diploma3_l`, `diploma3_p`, `strata1_l`, `strata1_p`, `strata2_l`, `strata2_p`, `strata3_l`, `strata3_p`, `tanggal_pendidikan`) VALUES
(5, 22, 67, 69, 86, 86, 221, 190, 83, 60, 73, 64, 0, 0, 8, 7, 9, 22, 0, 0, 0, 0, '2023-07-06'),
(6, 23, 398, 377, 155, 180, 508, 564, 361, 288, 202, 176, 1, 7, 5, 14, 12, 29, 1, 0, 0, 0, '2023-06-21'),
(7, 24, 384, 325, 142, 114, 154, 159, 143, 149, 119, 136, 10, 9, 4, 7, 14, 14, 1, 2, 0, 0, '2023-06-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_perangkat`
--

CREATE TABLE `tb_perangkat` (
  `id_perangkat` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama_perangkat` varchar(100) NOT NULL,
  `tgllahir_perangkat` date NOT NULL,
  `jabatan_perangkat` varchar(50) NOT NULL,
  `nosk_perangkat` varchar(50) NOT NULL,
  `periodeawal_perangkat` int(4) NOT NULL,
  `periodeakhir_perangkat` int(4) NOT NULL,
  `telp_perangkat` varchar(13) NOT NULL,
  `tanggal_perangkat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_perangkat`
--

INSERT INTO `tb_perangkat` (`id_perangkat`, `id_akun`, `nama_perangkat`, `tgllahir_perangkat`, `jabatan_perangkat`, `nosk_perangkat`, `periodeawal_perangkat`, `periodeakhir_perangkat`, `telp_perangkat`, `tanggal_perangkat`) VALUES
(9, 22, 'Rusmadi', '1998-11-12', 'Kepala Desa', '188.45/896-KUM/2017', 2017, 2023, '087654123456', '2023-06-20'),
(10, 22, 'RAFI\'I', '1997-05-07', 'Sekertaris', '1 Tahun 2017', 2017, 2023, '0822345678', '2023-06-20'),
(11, 22, 'Dewi Saadah', '2003-06-07', 'Kepala Urusan Umum & Perencanaan', '3 Tahun 2017', 2017, 2023, '08234567890', '2023-06-20'),
(12, 22, 'Hamidah', '1999-06-01', 'Kepala Urusan Keuangan', '2 Tahun 2017', 2017, 2023, '0865432345678', '2023-06-20'),
(13, 23, 'H.Sunhaji', '2003-06-05', 'Kepala Desa', '188.45/899-KUM/2017', 2017, 2023, '08765349066', '2023-06-21'),
(14, 23, 'Muhammad Fathurrozi', '2000-07-05', 'Sekertaris', '11 Tahun 2017', 2017, 2023, '087654234568', '2023-06-21'),
(15, 23, 'Yulia Rahmawati', '2001-07-04', 'Kepala Urusan Umum & Perencanaan', '00', 2021, 2023, '0876543234567', '2023-06-21'),
(16, 24, 'Pujianto', '2003-06-03', 'Kepala Desa', '188.45/901-KUM/2017', 2017, 2023, '087431234560', '2023-06-21'),
(17, 24, 'Siti Muntamah', '2003-06-05', 'Sekertaris', '20 Tahun 2018', 2018, 2023, '0876543234567', '2023-06-21'),
(18, 22, 'UDIK SISWOYO', '2003-06-10', 'Kepala Urusan Umum & Perencanaan', '188.45/899-KUM/2017', 2022, 2023, '082345678', '2023-06-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rt`
--

CREATE TABLE `tb_rt` (
  `id_rt` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama_rt` varchar(50) NOT NULL,
  `tgllahir_rt` date NOT NULL,
  `dusun_rt` varchar(20) NOT NULL,
  `jabatan_rt` varchar(50) NOT NULL,
  `nosk_rt` varchar(50) NOT NULL,
  `periodeawal_rt` int(4) NOT NULL,
  `periodeakhir_rt` int(4) NOT NULL,
  `telp_rt` varchar(15) NOT NULL,
  `tanggal_rt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rt`
--

INSERT INTO `tb_rt` (`id_rt`, `id_akun`, `nama_rt`, `tgllahir_rt`, `dusun_rt`, `jabatan_rt`, `nosk_rt`, `periodeawal_rt`, `periodeakhir_rt`, `telp_rt`, `tanggal_rt`) VALUES
(9, 22, 'Mu\'minah', '2002-01-09', 'Sukaramah', 'RT. 01', '1 Tahun 2022', 2022, 2023, '087543123678', '2023-06-20'),
(10, 22, 'Hasann', '2000-06-07', 'Sukamaju', 'RT. 03', '1 Tahun 2022', 2022, 2023, '088423456789', '2023-06-20'),
(11, 23, 'Jamidi', '1999-11-04', 'Sumber Arum', 'RT. 01', '1 Tahun 2022', 2022, 2023, '0876542345678', '2023-06-21'),
(12, 23, 'Ruwanto', '2001-02-28', 'Sumber Arum', 'RT. 02', '1 Tahun 2022', 2022, 2023, '0876542345678', '2023-06-21'),
(13, 24, 'Mustain', '1998-02-05', 'Dusun 2', 'RT. 01', '1 Tahun 2022', 2022, 2023, '0098765432', '2023-06-21'),
(14, 24, 'Purwoto', '2002-07-03', 'Dusun 2', 'RT. 02', '1 Tahun 2021', 2022, 2023, '08523456798765', '2023-06-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tani`
--

CREATE TABLE `tb_tani` (
  `id_tani` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama_klmpok` varchar(50) NOT NULL,
  `jenis_usaha` varchar(50) NOT NULL,
  `alamat_tani` varchar(50) NOT NULL,
  `tgl_berdiri` date NOT NULL,
  `ket` varchar(100) DEFAULT NULL,
  `tgl_tani` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tani`
--

INSERT INTO `tb_tani` (`id_tani`, `id_akun`, `nama_klmpok`, `jenis_usaha`, `alamat_tani`, `tgl_berdiri`, `ket`, `tgl_tani`) VALUES
(4, 22, 'Berkah Pemuda', 'Peternakan Dan Perkebunan', 'RT.020', '2018-12-05', '', '2023-06-21'),
(5, 23, 'Al Barokah', 'Kebun Karet dan Ternak Sapi', 'RT.019', '2012-10-31', '', '2023-06-21'),
(6, 23, 'Tembung Sae', 'Kebun Karet dan Ternak Sapi', 'RT.003', '2013-10-02', '', '2023-06-21'),
(7, 23, 'Sido Kumpul', 'Padi Dan Ternak Sapi', 'RT.020', '2005-04-22', '', '2023-06-21'),
(8, 22, 'WISMA NUGRAHA', 'Kebun Karet dan Ternak Sapi', 'RT.01', '2023-06-07', '', '2023-06-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_usia`
--

CREATE TABLE `tb_usia` (
  `id_usia` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `u5_l` int(4) DEFAULT NULL,
  `u5_p` int(4) DEFAULT NULL,
  `u10_l` int(4) DEFAULT NULL,
  `u10_p` int(4) DEFAULT NULL,
  `u15_l` int(4) DEFAULT NULL,
  `u15_p` int(4) DEFAULT NULL,
  `u20_l` int(4) DEFAULT NULL,
  `u20_p` int(4) DEFAULT NULL,
  `u30_l` int(4) DEFAULT NULL,
  `u30_p` int(4) DEFAULT NULL,
  `u40_l` int(4) DEFAULT NULL,
  `u40_p` int(4) DEFAULT NULL,
  `u50_l` int(4) DEFAULT NULL,
  `u50_p` int(4) DEFAULT NULL,
  `u60_l` int(4) DEFAULT NULL,
  `u60_p` int(4) DEFAULT NULL,
  `u70_l` int(4) DEFAULT NULL,
  `u70_p` int(4) DEFAULT NULL,
  `u70_lebih_l` int(4) DEFAULT NULL,
  `u70_lebih_p` int(4) DEFAULT NULL,
  `tanggal_usia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_usia`
--

INSERT INTO `tb_usia` (`id_usia`, `id_akun`, `u5_l`, `u5_p`, `u10_l`, `u10_p`, `u15_l`, `u15_p`, `u20_l`, `u20_p`, `u30_l`, `u30_p`, `u40_l`, `u40_p`, `u50_l`, `u50_p`, `u60_l`, `u60_p`, `u70_l`, `u70_p`, `u70_lebih_l`, `u70_lebih_p`, `tanggal_usia`) VALUES
(3, 22, 62, 57, 53, 46, 48, 36, 46, 46, 84, 87, 81, 77, 78, 65, 57, 55, 22, 21, 14, 12, '2023-06-27'),
(4, 23, 127, 99, 137, 137, 150, 151, 141, 137, 255, 268, 214, 242, 258, 250, 188, 177, 113, 96, 60, 78, '2023-06-21'),
(5, 24, 154, 118, 115, 106, 60, 51, 52, 44, 87, 72, 163, 145, 114, 132, 95, 106, 74, 83, 57, 58, '2023-06-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wajibktp`
--

CREATE TABLE `tb_wajibktp` (
  `id_wajibktp` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `jumlahkk_l` int(4) DEFAULT NULL,
  `jumlahkk_p` int(4) DEFAULT NULL,
  `sudahktpel_l` int(4) DEFAULT NULL,
  `sudahktpel_p` int(4) DEFAULT NULL,
  `belumktpel_l` int(4) DEFAULT NULL,
  `belumktpel_p` int(4) DEFAULT NULL,
  `tanggal_wajibktp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_wajibktp`
--

INSERT INTO `tb_wajibktp` (`id_wajibktp`, `id_akun`, `jumlahkk_l`, `jumlahkk_p`, `sudahktpel_l`, `sudahktpel_p`, `belumktpel_l`, `belumktpel_p`, `tanggal_wajibktp`) VALUES
(7, 22, 292, 55, 417, 370, 0, 0, '2023-06-27'),
(8, 23, 869, 161, 1057, 1163, 114, 104, '2023-06-21'),
(9, 24, 506, 41, 572, 568, 53, 55, '2023-06-21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`id_agama`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_desa` (`id_desa`);

--
-- Indeks untuk tabel `tb_bpd`
--
ALTER TABLE `tb_bpd`
  ADD PRIMARY KEY (`id_bpd`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `tb_bumdesa`
--
ALTER TABLE `tb_bumdesa`
  ADD PRIMARY KEY (`id_bumdesa`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `tb_desa`
--
ALTER TABLE `tb_desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indeks untuk tabel `tb_jeniskelamin`
--
ALTER TABLE `tb_jeniskelamin`
  ADD PRIMARY KEY (`id_jeniskelamin`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `tb_jumlah`
--
ALTER TABLE `tb_jumlah`
  ADD PRIMARY KEY (`id_jumlah`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `tb_perangkat`
--
ALTER TABLE `tb_perangkat`
  ADD PRIMARY KEY (`id_perangkat`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `tb_rt`
--
ALTER TABLE `tb_rt`
  ADD PRIMARY KEY (`id_rt`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `tb_tani`
--
ALTER TABLE `tb_tani`
  ADD PRIMARY KEY (`id_tani`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `tb_usia`
--
ALTER TABLE `tb_usia`
  ADD PRIMARY KEY (`id_usia`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `tb_wajibktp`
--
ALTER TABLE `tb_wajibktp`
  ADD PRIMARY KEY (`id_wajibktp`),
  ADD KEY `id_akun` (`id_akun`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_bpd`
--
ALTER TABLE `tb_bpd`
  MODIFY `id_bpd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_bumdesa`
--
ALTER TABLE `tb_bumdesa`
  MODIFY `id_bumdesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_desa`
--
ALTER TABLE `tb_desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_jeniskelamin`
--
ALTER TABLE `tb_jeniskelamin`
  MODIFY `id_jeniskelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_jumlah`
--
ALTER TABLE `tb_jumlah`
  MODIFY `id_jumlah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_perangkat`
--
ALTER TABLE `tb_perangkat`
  MODIFY `id_perangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_rt`
--
ALTER TABLE `tb_rt`
  MODIFY `id_rt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_tani`
--
ALTER TABLE `tb_tani`
  MODIFY `id_tani` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_usia`
--
ALTER TABLE `tb_usia`
  MODIFY `id_usia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_wajibktp`
--
ALTER TABLE `tb_wajibktp`
  MODIFY `id_wajibktp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD CONSTRAINT `tb_agama_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id_akun`);

--
-- Ketidakleluasaan untuk tabel `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD CONSTRAINT `tb_akun_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`),
  ADD CONSTRAINT `tb_akun_ibfk_2` FOREIGN KEY (`id_desa`) REFERENCES `tb_desa` (`id_desa`);

--
-- Ketidakleluasaan untuk tabel `tb_bpd`
--
ALTER TABLE `tb_bpd`
  ADD CONSTRAINT `tb_bpd_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id_akun`);

--
-- Ketidakleluasaan untuk tabel `tb_bumdesa`
--
ALTER TABLE `tb_bumdesa`
  ADD CONSTRAINT `tb_bumdesa_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id_akun`);

--
-- Ketidakleluasaan untuk tabel `tb_jeniskelamin`
--
ALTER TABLE `tb_jeniskelamin`
  ADD CONSTRAINT `tb_jeniskelamin_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id_akun`);

--
-- Ketidakleluasaan untuk tabel `tb_jumlah`
--
ALTER TABLE `tb_jumlah`
  ADD CONSTRAINT `tb_jumlah_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id_akun`);

--
-- Ketidakleluasaan untuk tabel `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD CONSTRAINT `tb_pendidikan_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id_akun`);

--
-- Ketidakleluasaan untuk tabel `tb_perangkat`
--
ALTER TABLE `tb_perangkat`
  ADD CONSTRAINT `tb_perangkat_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id_akun`);

--
-- Ketidakleluasaan untuk tabel `tb_rt`
--
ALTER TABLE `tb_rt`
  ADD CONSTRAINT `tb_rt_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id_akun`);

--
-- Ketidakleluasaan untuk tabel `tb_tani`
--
ALTER TABLE `tb_tani`
  ADD CONSTRAINT `tb_tani_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id_akun`);

--
-- Ketidakleluasaan untuk tabel `tb_usia`
--
ALTER TABLE `tb_usia`
  ADD CONSTRAINT `tb_usia_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id_akun`);

--
-- Ketidakleluasaan untuk tabel `tb_wajibktp`
--
ALTER TABLE `tb_wajibktp`
  ADD CONSTRAINT `tb_wajibktp_ibfk_2` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id_akun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
