-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2020 pada 16.32
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `email`, `telepon`, `foto`, `username`, `password`) VALUES
(1, 'Rahmat Ilyas', 'rahmat.ilyas142@gmail.co', '085333341194', 'default_admin.jpg', 'admin', '$2y$10$Ox5esXmqfdfjX/DZlDHERunGJQqYaXcWdMX7RdS4m41ejcHt28iWK'),
(2, 'Nisrawati', 'nisra@gmail.com', '085345234567', 'default_admin.jpg', 'cai123', '$2y$10$ZP5GHJ3HDxKf1bL.mn8R/ubv2N..dnzq8jBGxI6VqWuUDEpaOXLBe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fasilitas_kamar`
--

CREATE TABLE `tb_fasilitas_kamar` (
  `id` int(11) NOT NULL,
  `nama_fasilitas` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_fasilitas_kamar`
--

INSERT INTO `tb_fasilitas_kamar` (`id`, `nama_fasilitas`, `keterangan`) VALUES
(1, 'Ranjang', 'Baik'),
(2, 'Handuk Mandi', 'Bersih'),
(3, 'Lemari Pakaian', 'Kosong'),
(4, 'Televisi', 'Baik'),
(5, 'Kolam Renag', 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id` int(11) NOT NULL,
  `kd_kamar` varchar(255) NOT NULL,
  `no_kamar` varchar(255) NOT NULL,
  `tipe_kamar` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kamar`
--

INSERT INTO `tb_kamar` (`id`, `kd_kamar`, `no_kamar`, `tipe_kamar`, `status`) VALUES
(1, 'SNR-01-001', '001', 'STANDAR', 'Kosong'),
(2, 'SNR-01-002', '002', 'STANDAR', 'Kosong'),
(3, 'DLX-02-001', '001', 'DULAX', 'Terisi'),
(4, 'ENI-03-001', '001', 'EKONOMI', 'Terisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id` int(11) NOT NULL,
  `no_pemesanan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tggl_cekin` datetime NOT NULL,
  `tggl_cekout` datetime NOT NULL,
  `lama_inap` int(11) NOT NULL,
  `tipe_kamar` varchar(255) NOT NULL,
  `jum_kmr` int(11) NOT NULL,
  `no_kamar` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id`, `no_pemesanan`, `nama`, `email`, `telepon`, `alamat`, `tggl_cekin`, `tggl_cekout`, `lama_inap`, `tipe_kamar`, `jum_kmr`, `no_kamar`, `status`) VALUES
(1, 'PRDS-00001', 'Rahmat Ilyas', 'rahmat.ilyas142@gmail.com', '085333341194', 'Jl. Bontotangga, Kab. Gowa', '2020-07-10 00:00:00', '2020-07-13 00:00:00', 4, 'DULAX', 1, '001', 'Cek In'),
(2, 'PRDS-00002', 'Rati Damayanti', 'ratidamayanti@gmail.com', '085345234567', 'Jl. Manggis, Bontocani', '2020-07-12 00:00:00', '2020-07-14 00:00:00', 3, 'STANDAR', 2, '001,002', 'Cek Out'),
(3, 'PRDS-00003', 'Nisrawati', 'nisra@gmail.com', '085643265345', 'Jl. Samata', '2020-07-12 00:00:00', '2020-07-14 00:00:00', 3, 'EKONOMI', 1, '001', 'Booking');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tipe_kamar`
--

CREATE TABLE `tb_tipe_kamar` (
  `id` int(11) NOT NULL,
  `nama_tipe` varchar(255) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `harga_kamar` double NOT NULL,
  `biaya_layanan` double NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `kamar_terpakai` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tipe_kamar`
--

INSERT INTO `tb_tipe_kamar` (`id`, `nama_tipe`, `fasilitas`, `harga_kamar`, `biaya_layanan`, `jumlah_kamar`, `kamar_terpakai`, `picture`, `keterangan`) VALUES
(1, 'STANDAR', '1,2,3,4', 150000, 30000, 2, 0, '5f08607ed638b.jpg', 'Nyaman untuk beristirahat'),
(2, 'DULAX', '1,2,3,4,5', 200000, 40000, 1, 1, '5f0865f713e89.jpg', 'Nyaman dan aman, Pas untuk santai'),
(3, 'EKONOMI', '1,2,3', 100000, 10000, 1, 1, '5f0869c067f85.jpg', 'Baik dan Murah tapi tidak MURAHAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `no_pemesanan` varchar(255) NOT NULL,
  `no_kartu_kredit` varchar(255) NOT NULL,
  `jenis_kartu` varchar(255) NOT NULL,
  `masa_berlaku` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `ttl_harga_kamar` double NOT NULL,
  `ttl_biaya_layanan` double NOT NULL,
  `total_bayar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `no_pemesanan`, `no_kartu_kredit`, `jenis_kartu`, `masa_berlaku`, `tahun`, `ttl_harga_kamar`, `ttl_biaya_layanan`, `total_bayar`) VALUES
(1, 'PRDS-00001', '9898878787656453', 'Debit BCA', '06', '2022', 800000, 160000, 960000),
(2, 'PRDS-00002', '8567586748894855', 'Debit Mandiri', '06', '2023', 900000, 180000, 1080000),
(3, 'PRDS-00003', '35364334756747373', 'Debit Mandiri', '08', '2023', 300000, 30000, 330000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_fasilitas_kamar`
--
ALTER TABLE `tb_fasilitas_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tipe_kamar`
--
ALTER TABLE `tb_tipe_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_fasilitas_kamar`
--
ALTER TABLE `tb_fasilitas_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_tipe_kamar`
--
ALTER TABLE `tb_tipe_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
