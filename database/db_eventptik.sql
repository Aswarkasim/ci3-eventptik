-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Jul 2020 pada 01.59
-- Versi Server: 10.1.32-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eventptik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_absen_panitia`
--

CREATE TABLE `tbl_absen_panitia` (
  `id_absen_panitia` int(7) NOT NULL,
  `id_event` varchar(20) NOT NULL,
  `nama_panitia` varchar(100) NOT NULL,
  `nim` int(15) NOT NULL,
  `angkatan` varchar(6) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `is_hadir` int(1) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_absen_panitia`
--

INSERT INTO `tbl_absen_panitia` (`id_absen_panitia`, `id_event`, `nama_panitia`, `nim`, `angkatan`, `posisi`, `is_hadir`, `date_created`) VALUES
(0, '268945653890717', 'Aswar Kasim', 1629041001, '2016', 'Bendahara', 1, '2020-07-02 07:20:42'),
(3, '268945653890717', 'Aswar Kasim', 2147483647, '2014', '', 0, '2020-07-02 07:50:08'),
(4, '268945653890717', 'Aswar Kasim', 1629040012, '2018', 'Komsumsi', 0, '2020-07-02 07:51:04'),
(5, '268945653890717', 'Ali  Fahri', 2147483647, '2017', 'Pubdok', 0, '2020-07-20 00:30:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` varchar(20) NOT NULL,
  `username_admin` varchar(128) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` enum('Admin','Super Admin') NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username_admin`, `nama_admin`, `email`, `nohp`, `password`, `role`, `is_active`, `date_created`) VALUES
('9', 'superadmin', 'Super Admin', 'superadmin@gmail.com', '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Super Admin', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id_banner` varchar(5) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `urutan` int(3) DEFAULT NULL,
  `topik` text NOT NULL,
  `deskripsi` text,
  `link` text,
  `posisi_konten` enum('text-center','text-right','text-left') DEFAULT 'text-center',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_banner`
--

INSERT INTO `tbl_banner` (`id_banner`, `gambar`, `urutan`, `topik`, `deskripsi`, `link`, `posisi_konten`, `date_created`) VALUES
('26571', 'pexels-photo-4367841.jpeg', NULL, 'Pusat Informasi Event PTIK Versi Alfa', 'Sistem Informasi Kegiatan Teknik Informmatika dan Komputer. Universitas Negeri Makassar. Aplikasi ini membantu pengelolaan kegiataan yang ada di Teknik Informatika dan Komputer', NULL, NULL, '2020-04-09 07:10:13'),
('76019', 'pexels-photo-436784.jpeg', 1, 'Menjadi Tangguh di Era 4.0', 'Lorem ipsum dolor sit amet', 'https://instagram/aswar_kasim', 'text-center', '2020-04-08 13:24:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id_event` varchar(20) NOT NULL,
  `id_panitia` varchar(20) NOT NULL,
  `nama_event` varchar(200) NOT NULL,
  `slug` text NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `tempat` text NOT NULL,
  `biaya` varchar(30) DEFAULT '0',
  `bank` varchar(10) DEFAULT NULL,
  `norek` varchar(50) DEFAULT NULL,
  `nama_rekening` varchar(50) DEFAULT NULL,
  `max_peserta` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('ongoing','selesai') NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  `pendaftaran` int(1) NOT NULL DEFAULT '0',
  `poster` varchar(100) NOT NULL,
  `sertifikat` varchar(100) NOT NULL,
  `sertifikat_panitia` varchar(100) NOT NULL,
  `text_sertifikat` text NOT NULL,
  `overlay` varchar(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_event`
--

INSERT INTO `tbl_event` (`id_event`, `id_panitia`, `nama_event`, `slug`, `id_kategori`, `tanggal`, `waktu`, `tempat`, `biaya`, `bank`, `norek`, `nama_rekening`, `max_peserta`, `deskripsi`, `status`, `is_active`, `pendaftaran`, `poster`, `sertifikat`, `sertifikat_panitia`, `text_sertifikat`, `overlay`, `date_created`) VALUES
('268945653890717', '493685231076152', 'Membuat sesuatu yang menarik', 'dbvnvbnvb', 'asdvc', '2020-03-28', '10:00:00', 'Ruang Senat FT', 'Rp. 100.000', 'BCA', '34235235', 'Assa', 20, '', 'ongoing', 0, 1, 'Page_2.png', 'template_sertifikat1.jpg', 'template_sertifikat.jpg', 'Atas partisipasinya sebagai peserta dalam kegiatan Menjadi tangguh di era industri 4.0 yang diselanggarakan pada hari Sabtu, 20 Maret 2020 di Aula Dekanat FT UNM', '', '2020-03-15 02:53:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `date_created`) VALUES
('asdvc', 'Seminar', '2020-03-05 02:34:02'),
('assdc', 'Talkshow', '2020-03-05 02:37:34'),
('nadkn', 'Lomba', '2020-03-05 02:34:02'),
('nzxcl', 'Pelatihan', '2020-03-05 02:35:24'),
('vasas', 'Workshop', '2020-03-05 02:35:24'),
('xzcnj', 'Sharing', '2020-03-05 02:37:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konfigurasi`
--

CREATE TABLE `tbl_konfigurasi` (
  `id_konfigurasi` int(1) NOT NULL,
  `nama_aplikasi` varchar(100) NOT NULL,
  `nama_pimpinan` varchar(100) NOT NULL,
  `provinsi` varchar(128) NOT NULL,
  `kabupaten` varchar(128) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `kontak_person` varchar(20) NOT NULL,
  `stok_min` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_konfigurasi`
--

INSERT INTO `tbl_konfigurasi` (`id_konfigurasi`, `nama_aplikasi`, `nama_pimpinan`, `provinsi`, `kabupaten`, `kecamatan`, `alamat`, `kontak_person`, `stok_min`) VALUES
(1, 'Arks Dev', 'Waddah', 'Sulawesi Selatan', 'Makassar', 'Manggala', 'jl. Dg. Hayo', '085298730727', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` varchar(5) NOT NULL,
  `nama_lokasi` text NOT NULL,
  `maps` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_panitia`
--

CREATE TABLE `tbl_panitia` (
  `id_panitia` varchar(20) NOT NULL,
  `id_event` varchar(20) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `posisi` enum('Ketua','Lainnya') NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_panitia`
--

INSERT INTO `tbl_panitia` (`id_panitia`, `id_event`, `namalengkap`, `username`, `posisi`, `password`, `is_active`, `date_created`) VALUES
('365677189340215', '268945653890717', 'Samsul', 'samsul', 'Lainnya', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, '2020-06-26 13:46:53'),
('986974207203855', '268945653890717', 'Liska Damayanti', 'liska', 'Ketua', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, '2020-03-15 09:53:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peserta`
--

CREATE TABLE `tbl_peserta` (
  `id_peserta` varchar(20) NOT NULL,
  `id_event` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `is_daftar` int(1) DEFAULT '2',
  `is_hadir` int(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_peserta`
--

INSERT INTO `tbl_peserta` (`id_peserta`, `id_event`, `id_user`, `is_daftar`, `is_hadir`, `date_created`) VALUES
('286851139247', '268945653890717', '277546930634018', 1, 1, '2020-06-21 02:42:47'),
('392695754234', '268945653890717', '277546930634018', 2, 1, '2020-06-22 02:46:06'),
('826350929074', '268945653890717', 'asbashjas', 0, 1, '2020-04-09 06:31:34'),
('843705967035', '268945653890717', '277546930634018', 2, 1, '2020-06-22 02:46:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tagihan`
--

CREATE TABLE `tbl_tagihan` (
  `id_tagihan` varchar(15) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_event` varchar(15) NOT NULL,
  `id_peserta` varchar(20) NOT NULL,
  `is_valid` int(1) NOT NULL,
  `is_read` int(1) NOT NULL DEFAULT '0',
  `is_read_panitia` int(1) NOT NULL DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `metode` enum('Cash','Transfer') DEFAULT NULL,
  `bukti` varchar(30) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tagihan`
--

INSERT INTO `tbl_tagihan` (`id_tagihan`, `id_user`, `id_event`, `id_peserta`, `is_valid`, `is_read`, `is_read_panitia`, `tanggal`, `metode`, `bukti`, `date_created`) VALUES
('839152425340', '574706232501461', '268945653890717', '085276467323', 1, 1, 1, NULL, NULL, NULL, '2020-05-19 09:39:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(128) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `is_ptik` int(1) NOT NULL DEFAULT '0',
  `nim` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl` varchar(3) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `tahun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `namalengkap`, `is_ptik`, `nim`, `tanggal_lahir`, `email`, `nohp`, `gambar`, `password`, `is_active`, `date_created`, `tgl`, `bulan`, `tahun`) VALUES
('277546930634018', 'mawardi', 'Mawardi Kudin', 0, '16290410024', NULL, 'maswardi@gmail.com', '342344', '', '80248aa22707653fc9daaf44a89067b7f0448a7f', 1, '2020-04-13 07:34:25', '1', 'Januari', '1940'),
('574706232501461', 'anca', 'Nur Darmawansyah', 1, '', '2020-04-01', 'anca@gmail.com', '021112151', 'DONATION.jpg', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, '0000-00-00 00:00:00', '1', 'Januari', '1940'),
('683083927161595', 'evadamayanti', 'Nureva Damayanti', 1, '16290410024', '2020-04-07', 'eva@gmail.com', '342344', 'Eva_line.jpg', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 1, '0000-00-00 00:00:00', '1', 'Januari', '1940'),
('asbashjas', 'aswarkasim', 'Aswar Kasim', 0, '16290410024', '2020-04-09', 'admin@gmail.com', '342344', 'Lockdown.jpg', 'c4d54ad2f9c87b616d8ad4418d7946909c3dec8d', 0, '0000-00-00 00:00:00', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_absen_panitia`
--
ALTER TABLE `tbl_absen_panitia`
  ADD PRIMARY KEY (`id_absen_panitia`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tbl_panitia`
--
ALTER TABLE `tbl_panitia`
  ADD PRIMARY KEY (`id_panitia`);

--
-- Indexes for table `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `tbl_tagihan`
--
ALTER TABLE `tbl_tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_absen_panitia`
--
ALTER TABLE `tbl_absen_panitia`
  MODIFY `id_absen_panitia` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  MODIFY `id_konfigurasi` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
