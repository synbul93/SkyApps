-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 11:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skyapps1`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `ringkasan_berita` mediumtext NOT NULL,
  `isi_berita` longtext NOT NULL,
  `editor` varchar(128) NOT NULL,
  `oleh` varchar(128) NOT NULL,
  `reporter` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `ringkasan_berita`, `isi_berita`, `editor`, `oleh`, `reporter`, `image`, `waktu`) VALUES
(1, 'Target Jokowi untuk Timnas Indonesia di Piala Dunia U-17 2023  ', 'Target Jokowi untuk Timnas Indonesia di Piala Dunia U-17 2023', 'Jakarta, CNN Indonesia -- Presiden Joko Widodo memberi target realistis kepada pemain Timnas Indonesia U-17 di Piala Dunia U-17 2023.\r\n\"Ya pertama bisa lolos babak penyisihan. Syukur bisa ke final dan syukur-syukur bisa juara,\" kata Joko Widodo di sela-sela kunjungan ke Stadion Si Jalak Harupat, Bandung, Rabu (12/7).\r\n\r\nDi waktu yang bersamaan, pelatih Bima Sakti tengah menggelar pemusatan latihan Timnas Indonesia U-17 di Stadion Si Jalak Harupat.\r\nmemberikan kesempatan pada anak-anak muda kita untuk ikut partisipasi di Piala Dunia U-17,\" tutur Jokowi.\r\n\r\nStadion Si Jalak Harupat merupakan salah satu calon venue Piala Dunia U-17 2023. Stadion yang terletak di Soreang, Bandung, itu sebelumnya sudah diajukan sebagai salah satu penyelenggara Piala Dunia U-20 2023.\r\n\r\nSayangnya Si Jalak Harupat tak jadi digunakan setelah FIFA mencabut status Indonesia sebagai tuan rumah Piala Dunia U-20 2023. Jatah tuan rumah kemudian diberikan kepada Argentina.\r\n', 'Arif', 'Sunarto', 'Ahmad', '54001087fce2871869752eeb1d9ed83c.png', '2023-07-10 14:48:05'),
(2, 'Teknologi Pengendali Awan', 'SFCSAFASDASDA', 'JATINANGOR, itb.ac.id- Sekolah Ilmu dan Teknologi Hayati (SITH) ITB mengenalkan kampus Jatinangor kepada beberapa mahasiswa Universitas Teknologi MARA (UiTM) Cawangan Pulau Pinang, Kampus Permatang Pauh, yang tengah mengikuti International Students Mobility Program (I-ASEP 2.0) 2023 pada Selasa (27/6/2023). Kunjungan ini merupakan sebuah upaya untuk mengenalkan lingkungan kampus Jatinangor yang juga menjadi kampus utama untuk program rekayasa SITH ITB.\n\nAcara kunjungan ini dipandu oleh Annisa Husna, Priyanka Ariffia, Melissa Phebeyola, Daffa Hisyam, dan Mohamad Ramdhani selaku perwakilan mahasiswa dari jurusan Rekayasa Hayati 2019. Selain itu, acara kunjungan ini juga dihadiri oleh beberapa perwakilan mahasiswa jurusan Mikrobiologi dan Biologi SITH Program Sains.\n\nKunjungan ini diawali dengan campus tour ITB Jatinangor ke laboratorium perancangan rekayasa produk sistem hayati. Lab tersebut umumnya digunakan untuk meneliti produksi lipid, kadar gula dari mikroalga serta ragi dengan alat bioreactor.\n\nTak hanya itu, mahasiswa UiTM juga mendapatkan kesempatan untuk mengunjungi laboratorium instruksional, lab analisa biomolekuler, lab rekayasa sel dan jaringan tumbuhan, lab rekayasa sistem produksi biomassa, serta lab isolasi dan analisis bahan alam yang biasa digunakan oleh program studi Rekayasa Hayati.\n\nSelanjutnya, para mahasiswa I-ASEP 2.0 UiTM berkunjung ke Herbarium Bandungense (FIPIA) SITH serta Museum Zoologi ITB. Para mahasiswa dipandu oleh Arifin Surya Dwipa Irsyam, M.Si., selaku kurator herbarium FIPIA.', 'Yandi', 'Sandri', 'Munawar', '0e3b73c23fe9e20a2d3a5dd44a17f5ae.png', '2023-07-10 14:48:05'),
(4, 'Teknologi Pengendali Awan', 'adsdawasdasdawawdasdasdqwd', 'asdawdasdasfqwqwdadasddqwddadqwdad', 'Seva', 'Lanja', 'Unti', 'ad178eb6069e5f0e9264aef367ed62d7.PNG', '2023-07-10 15:51:40'),
(5, 'Pengembangan Aplikasi Bajak Laut', 'asadasfstezsgfhrdhdrf', 'afsdh5gsehgfk7tmeraqw3rawe', 'Sancaka', 'Mandra ', 'Gunawan', '6b87620603ad26f76a9524c54c8a6984.PNG', '2023-07-10 18:10:27'),
(6, 'Pengembangan Aplikasi Bajak Laut', 'asasaawdawdaw', 'asdasdawdasdasdawdasdasdasdasdadagfsdvvrgergaegWEGARGARGVGDFFDDRGDZGdfgbdfhsnfbx', 'Asep Muanwar', 'Jandra', 'Jetli', 'default.jpg', '2023-07-11 14:06:39'),
(7, 'Manuk Dadalai', 'sdasdawdada', 'asdawrwra', 'Sutanto', 'Gobang', 'Justin', '0809f6865dda360c0eb00434a4762e7d.jpg', '2023-07-11 14:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `studi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `studi`) VALUES
(1, 'Teknik Informatika'),
(2, ' Mobile Application & Technology'),
(3, ' Accounting Information'),
(4, 'Audio Engineering'),
(5, ' Ilmu Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `program` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `jurusan`, `program`) VALUES
(1, 'Ilmu Komputer', 'S1, S2, S3'),
(2, 'Ilmu Akuntansi', 'S1, S2, S3'),
(3, 'Hukum', 'S1, S2, S3'),
(4, 'Kedokteran Umum\n', 'S1, S2, S3'),
(5, 'Komunikasi\n', 'S1, S2, S3'),
(6, 'Desain Visual\n', 'S1, S2, S3'),
(7, 'Psikologi\n', 'S1, S2, S3'),
(8, 'Ilmu Ekonomi', 'S1, S2, S3'),
(9, 'Teknik Sipil\n', 'S1, S2, S3'),
(10, 'Teknik Industri\n', 'S1, S2, S3'),
(11, 'Teknik Mesin\n', 'S1, S2, S3 Magister'),
(12, 'Teknik Lingkungan', 'S1, S2, S3 Magister');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nrp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `program` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `program`, `alamat`) VALUES
(19, 'Anderson Salles', '235235', 'ander.wili@gmail.com', 'Teknik Pertanian', 'S1', 'Jl. cimindi'),
(20, 'Dadang Gusmawan Solihin', '325235', 'dangz@gmail.com', 'Arsitek', 'S2', 'Jl. cimindi raya'),
(21, 'Jajang Kusmawan', '3424234', 'jk@gmail.com', 'Seni Musik', 'S3', 'Jl. cimindi'),
(22, 'Michael Jajang', '34233', 'mjangz@gmail.com', 'Teknik Pertanian', 'S2', 'Jl. cimindi'),
(23, 'Mad Deskan', '3243424', 'mad.desk@gmail.com', 'Kimia', 'S2', 'Jl. cimindi'),
(24, 'Martinz Jamal', '3534534', 'mrtinz@gmail.com', 'Teknik Informatika', 'S1', 'Jl. cimindi'),
(26, 'Robert Jajang kusmawan', '89685764', 'jangz@gmail.com', 'Kimia', 'S2', 'Jl. cimindi'),
(27, 'Marcel Usep Januar ', '2342352', 'trisuaka09@gmail.com', 'Teknik Informatika', 'S3', 'Jl. cimindi'),
(28, 'Deden Rahamat ', '534534534', 'denz@gmail.com', 'Arsitek', 'S2', 'Jl. cimindi'),
(30, 'Cristiano Rahmat Sutrisno', '23423423', 'crs@cristiano.com', 'Teknik Pertanian', 'S2', 'Jl. cimindi'),
(31, 'Raden Nanang Kusmawan', '3242342', 'rnk@mail.com', 'Teknik Sipil', 'S2', 'Jl. cimindi'),
(32, 'Ridwan Alam', '234234', 'ahmad@gmail.com', 'Seni Rupa', 'S1', 'Jl. cimindi'),
(33, 'Redoauane Barka', '3423423', 'reduan@barca.com', 'Teknik Pertanian', 'S2', 'Jl. cimindi'),
(34, 'Lionel Andres Maman', '342342', 'lam@lam.com', 'Seni Musik', 'S1', 'Jl. cimindi'),
(35, 'Jack Sparko', '5646456', 'jack@spark.com', 'Teknik Informatika', 'S2', 'Jl. cimindi'),
(36, 'Jendra Lopes Setiawan ', '35235235', 'jenz@gmail.com', 'Seni Musik', 'S1', 'Jl. cimindi'),
(37, 'Robert Denz Sudarsono', '534534', 'denz.sudar@sudar.com', 'Kimia', 'S1', 'Jl. cimindi'),
(38, 'Dadang Al am', '23423423', 'al@danz.com', 'Teknik Pertanian', 'S2', 'Jl. cimindi'),
(39, 'Ahmad Lazuardi Mardono', '35235345', 'alam@gmai.com', 'Teknik Sipil', 'S1', 'Jl. cimindi'),
(40, 'Kelly Juana Solihin', '342342', 'kel@gamil.com', 'Insinyur', 'S3', 'jl. raya cicendo');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `univ_name` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `ig` varchar(128) NOT NULL,
  `fb` varchar(128) NOT NULL,
  `twitter` varchar(128) NOT NULL,
  `wa` varchar(128) NOT NULL,
  `yt` varchar(128) NOT NULL,
  `alamat` mediumtext NOT NULL,
  `no_tel` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `link` varchar(128) NOT NULL,
  `favicon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `univ_name`, `image`, `ig`, `fb`, `twitter`, `wa`, `yt`, `alamat`, `no_tel`, `email`, `link`, `favicon`) VALUES
(1, 'Universitas B\'sky', 'ac7b46a69ae8f78a2687966087507e7a.png', 'https://instagram.com/bskystudio', 'https://facebook.com/bskystudio', '', 'https://wa.me/628170079494', 'https://www.youtube.com/channel/UCIJ8z4eaT9eHufsD5whN5mA', 'Jl. Raya Cimindi No.212 A, Sukaraja, Kec. Cicendo, Kota Bandung, Jawa Barat 40175', '+62 817-0079-494', 'bsky.teknik@gmail.com', 'https://bsky.co.id', '412b1ba9dbf4410924e25e9e13fcc76c.png');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `program` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `program`) VALUES
(1, 'S1'),
(2, 'S2'),
(3, 'S3'),
(4, 'Magister');

-- --------------------------------------------------------

--
-- Table structure for table `repository`
--

CREATE TABLE `repository` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `abstrak` longtext NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nrp` varchar(128) NOT NULL,
  `dosen` varchar(128) NOT NULL,
  `koleksi` varchar(128) NOT NULL,
  `penerbit` varchar(128) NOT NULL,
  `tgl_input` varchar(20) NOT NULL,
  `fakultas` varchar(128) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  `program` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL,
  `akses` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `repository`
--

INSERT INTO `repository` (`id`, `user_id`, `judul`, `abstrak`, `nama`, `nrp`, `dosen`, `koleksi`, `penerbit`, `tgl_input`, `fakultas`, `jurusan`, `program`, `file`, `akses`) VALUES
(1, 0, 'Pengembangan Aplikasi Desa', '', 'Martin', '2423423423423', 'Irman Mardiana SE', 'Tesis', 'Perpustakaan Bandung', '13 Dec 2023', 'Ilmu Komputer', 'Teknik Informatika', 'S1', 'dok wa jaka.pdf', 0),
(2, 0, 'Teknologi Pengendali Air', '', 'ahmad', '24121', 'Ahmad Syafei', 'Tugas Akhir', 'Perpustakaan Bandung', '13 Dec 2023', 'Arsitek', '', 'S2', 'Respo.pdf', 0),
(3, 0, 'Pengembangan Teknologi Nuklir', 'Tulisan ini membahas suatu kajian pemanfaatan debit sungai sebagai alternatif sumber daya energi untuk pembangkit listrik tenaga mini hidro (PLTM).', 'Jack Sparko', '35453453', 'Ahmad Syafei', 'Ghaib', 'Perpustakaan Bandung', '13 Dec 2023', 'Teknik Sipil', '', 'S3', 'rab cetak kartu_PERUBAHAN.pdf', 1),
(4, 0, 'Penelitian Bomb', 'Tulisan ini membahas suatu kajian pemanfaatan debit sungai sebagai alternatif sumber daya energi untuk pembangkit listrik tenaga mini hidro (PLTM).', 'jajang kusmawan', '342342', 'Ahmad Syafei', 'Disertasi', 'Perpustakaan Bandung', '13 Dec 2023', 'Kedokteran', '', 'S1', 'rab cetak kartu_PERUBAHAN.pdf', 1),
(5, 0, 'ada anak masuk sumur', '', 'jajang', '2413423412321', 'Sundanda', 'Ghaib', 'Perpustakaan Bandung', '13 Dec 2023', 'Teknik Sipil\r\n', 'Audio Engineering', 'S3', '', 0),
(6, 0, 'Penelitian Nuklir', '', 'Rahmad efendi', '32234212323', 'Irman Mardiana Se', 'Ghaib', 'Perpustakaan Bandung', '13 Dec 2023', 'Ilmu Komputer', 'Teknik Informatika', 'S2', '', 1),
(7, 0, 'Teknologi Pengendali Angin', 'Tulisan ini membahas suatu kajian pemanfaatan debit sungai sebagai alternatif sumber daya energi untuk pembangkit listrik tenaga mini hidro (PLTM).', 'Ronald Simatupang', '12345678910', 'Irman Mardiana Se', 'Ghaib', 'Perpustakaan Bandung', '13 Dec 2023', 'Teknik Sipil', '', 'Magister', 'Respo.pdf', 0),
(8, 0, 'Pengembangan Aplikasi Bajak Laut', 'Aplikasi ini di gunakan untuk membajak kapal laut, yang mencuri ikan di lautan Indonesia.', 'Ahmad Arjuna Ali', '2345674351', 'Prof. Irman Mardiana, Se, S.kom', 'Tugas Akhir', 'Gedung Perpustakaan B\'sky', '13 Jul 2023', 'Ilmu Komputer', 'Teknik Informatika', 'S2', 'dok_ledeng.pdf', 1),
(9, 0, 'Penelitian Nuklir', 'Penelitian terhadap nuklir', 'Jajang kusmawa', '1231232131', 'Irman Mardiana Se', 'Ghaib', 'Gedung Perpustakaan B\'sky', '13 Jul 2023', 'Ilmu Komputer', 'Teknik Informatika', 'S1', 'Dok BRIN.pdf', 0),
(13, 0, 'Penelitian Nuklir', '', 'Ahmad Sopyan ', '12345678911', 'Prof. Irman Mardiana, Se, S.kom', 'Ghaib', 'Gedung Perpustakaan B\'sky', '13 Jul 2023', 'Ilmu Komputer', 'Teknik Informatika', 'S1', 'dok wa jaka 2.pdf', 1),
(14, 0, 'Teknologi Pengendali Awan', '', 'Ahmad Sopyan ', '12345678900', 'Prof. Irman Mardiana, Se, S.kom', 'Tugas Akhir', 'Gedung Perpustakaan B\'sky', '13 Jul 2023', 'Ilmu Komputer', 'Teknik Informatika', 'S1', 'Dok BRIN.pdf', 0),
(15, 0, 'Penelitian Nuklir', '', 'Ahmad Sopyan ', '12345678911', 'Irman Mardiana Se', 'Ghaib', 'Perpustakaan Bandung', '13 Jul 2023', 'Ilmu Komputer', 'Teknik Informatika', 'S2', 'dok_ledeng.pdf', 0),
(16, 0, 'Teknologi Pengendali Angin', '', 'Jajang kusmawan', '123456789890', 'Irman Mardiana Se', 'Tugas Akhir', 'Perpustakaan Bandung', '13 Jul 2023', 'Ilmu Komputer', 'Teknik Informatika', 'S1', 'dok_ledeng.pdf', 0),
(17, 0, 'Teknologi Pengendali Angin', '', 'ahmad', '123242523626', 'Ahmad Syafei', 'Tugas Akhir', 'Gedung Perpustakaan B\'sky', '13 Jul 2023', 'Ilmu Ekonomi', ' Accounting Information', 'S1', 'bsky.png', 1),
(18, 0, 'Teknologi Pengendali Angin', '', 'Jajang kusmawan', '', 'Prof. Irman Mardiana, Se, S.kom', 'Ghaib', 'Perpustakaan Bandung', '0000-00-00', 'Psikologi\r\n', 'Audio Engineering', 'S1', 'Dok BRIN.pdf', 0),
(19, 0, 'Teknologi Pengendali Angin', '', 'jajang kusmawan', '123456789098', 'Ahmad Syafei', 'Tugas Akhir', 'Gedung Perpustakaan B\'sky', '0000-00-00', 'Komunikasi\r\n', 'Audio Engineering', 'S1', 'dok_ledeng.pdf', 0),
(20, 0, 'Teknologi Pengendali Awan', '', 'jajang kusmawan', '12356789876', 'Prof. Irman Mardiana, Se, S.kom', 'Tugas Akhir', 'Gedung Perpustakaan B\'sky', '0000-00-00', 'Ilmu Komputer', 'Teknik Informatika', 'S1', 'dok wa jaka 2.pdf', 1),
(21, 0, 'Teknologi Pengendali Awan', '', 'Ahmad Sopyan Sans', '1234567878', 'Prof. Irman Mardiana, Se, S.kom', 'Tugas Akhir', 'Gedung Perpustakaan B\'sky', '0000-00-00', 'Teknik Industri\r\n', 'Audio Engineering', 'S1', '', 0),
(22, 0, 'Teknologi Pengendali Awan', '', 'Ahmad Sopyan ', '21345698765', 'Prof. Irman Mardiana, Se, S.kom', 'Tugas Akhir', 'Gedung Perpustakaan B\'sky', '0000-00-00', 'Psikologi\r\n', 'Audio Engineering', 'S1', '', 0),
(23, 0, 'Teknologi Pengendali Awan', '', 'Ahmad Sopyan ', '212346575685', 'Prof. Irman Mardiana, Se, S.kom', 'Tugas Akhir', 'Perpustakaan Bandung', '0000-00-00', 'Desain Visual\r\n', 'Teknik Informatika', 'S1', 'Dok BRIN.pdf', 0),
(24, 0, 'Teknologi Pengendali Awan', 'SDAWRq353q', 'Deden Rahamat ', '1234235346347', 'Ahmad Syafei', 'Tugas Akhir', 'Gedung Perpustakaan B\'sky', '0000-00-00', 'Desain Visual\r\n', 'Audio Engineering', 'Magister', 'dok wa jaka 2.pdf', 0),
(25, 0, 'Pengembangan Aplikasi Bajak Laut', 'sadfwr23', 'Ahmad Sopyan ', '23523536347', 'Prof. Irman Mardiana, Se, S.kom', 'Tugas Akhir', 'Gedung Perpustakaan B\'sky', '0000-00-00', 'Teknik Mesin\r\n', ' Accounting Information', 'S1', 'dok_ledeng.pdf', 0),
(26, 0, 'Teknologi Pengendali Angin', 'afsf35', 'Ahmad Sopyan ', '2235235236523', 'Irman Mardiana Se', 'Ghaib', 'Gedung Perpustakaan B\'sky', '0000-00-00', 'Hukum', ' Accounting Information', 'S1', 'dok_ledeng.pdf', 0),
(27, 0, 'Penelitian Nuklir', 'SAFT43535', 'Ahmad Sopyan Lazuardi', '23534645732534', 'Ahmad Syafei', 'Ghaib', 'Gedung Perpustakaan B\'sky', '0000-00-00', 'Teknik Lingkungan', ' Mobile Application & Technology', 'S1', 'dok wa jaka 2.pdf', 0),
(28, 0, 'Teknologi Pengendali Awan', '', 'Ahmad Sopyan Sans', '1241243242352', 'Prof. Irman Mardiana, Se, S.kom', 'Tugas Akhir', 'Gedung Perpustakaan B\'sky', '0000-00-00', 'Ilmu Komputer', ' Accounting Information', 'S1', 'dok wa jaka.pdf', 0),
(29, 0, 'Penelitian Nuklir', '', 'Cristiano Rahmat Sutrisno', '242235346346', 'Ahmad Syafei', 'Tugas Akhir', 'Gedung Perpustakaan B\'sky', '0000-00-00', 'Teknik Sipil\r\n', ' Mobile Application & Technology', 'S3', 'faktur pajak wa jaka.pdf', 0),
(30, 0, 'Teknologi Pengendali Awan', '', 'Ahmad Ronald Suparja', '12345678900', 'Prof. Irman Mardiana, Se, S.kom', 'Ghaib', 'Gedung Perpustakaan B\'sky', '0000-00-00', 'Teknik Mesin\r\n', ' Accounting Information', 'S1', 'IMG_20230103_0001.pdf', 0),
(31, 0, 'Penelitian Nuklir', '', 'ahmad', '53434535353', 'Ahmad Syafei', 'Tugas Akhir', 'Perpustakaan Bandung', '0000-00-00', 'Kedokteran Umum\r\n', 'Teknik Informatika', 'S1', '824994c15dfd81af695b4fa1b47348ee.pdf', 0),
(32, 0, 'Penelitian Nuklir', '', 'ahmad', '53434535353', 'Ahmad Syafei', 'Tugas Akhir', 'Perpustakaan Bandung', '0000-00-00', 'Kedokteran Umum\r\n', 'Teknik Informatika', 'S1', 'c8898b74330822d30bef8c9ebce69607.pdf', 0),
(33, 0, 'Penelitian Nuklir', '', 'Raden Nanang Kusmawan', '53434535353', 'Ahmad Syafei', 'Tugas Akhir', 'Perpustakaan Bandung', '0000-00-00', 'Kedokteran Umum\r\n', 'Teknik Informatika', 'S1', 'AJB_05_20182.pdf', 0),
(34, 0, 'Manuk Dadalai', '', 'Redoauane Barka', '4535345353534534', 'Prof. Irman Mardiana, Se, S.kom', 'Ghaib', 'Gedung Perpustakaan B\'sky', '0000-00-00', 'Teknik Mesin\r\n', ' Mobile Application & Technology', 'S1', 'dok_ledeng1.pdf', 1),
(35, 0, 'Teknologi Pengendali Awan', '', 'Raden Nanang Kusmawan', '34234242432423423', 'Prof. Irman Mardiana, Se, S.kom', 'Tugas Akhir', 'Gedung Perpustakaan B\'sky', '26 Jul 2023', 'Komunikasi\r\n', ' Ilmu Komputer', 'S1', 'AJB_05_20184.pdf', 1),
(36, 0, 'Teknologi Pengendali Angin', '', 'jajang kusmawan', '4234234234234234', 'Ahmad Syafei', 'Ghaib', 'Gedung Perpustakaan B\'sky', '29 Jun 2023', 'Ilmu Komputer', 'Teknik Informatika', 'S1', 'Berita_Acara_Serah_Terima3.pdf', 0),
(37, 0, 'Teknologi Pengendali Angin', '', 'jajang kusmawan', '4234234234234234', 'Ahmad Syafei', 'Ghaib', 'Gedung Perpustakaan B\'sky', '29 Jun 2023', 'Ilmu Komputer', 'Teknik Informatika', 'S1', 'dok_wa_jaka1.pdf', 0),
(38, 0, 'Penelitian Nuklir', '', 'jajang kusmawan', '87875875875875858', 'Ahmad Syafei', 'Tugas Akhir', 'Perpustakaan Bandung', '19 Jul 2023', 'Ilmu Komputer', 'Teknik Informatika', 'S1', '325235_kartu1.pdf', 0),
(39, 0, 'Teknik Silat', '', 'Ahmad Solihin', '3523245346363463', 'Irman Mardiana ', 'gHAIB', 'Cimahi', '13 Jul 2023', 'Ilmu Komputer', 'Teknik Informatika', 'S2', '325235_kartu3.pdf', 0),
(40, 0, 'Teknik Silat Macan Putih', '', 'Ahmad Solihin', '3423423424242', 'Irman Mardiana ', 'gHAIB', 'Cimahi', '27 Jul 2023', 'Ilmu Ekonomi', ' Mobile Application & Technology', 'S3', '325235_kartu5.pdf', 1),
(41, 0, 'Teknik Silat Macan Putih', '', 'Ahmad Solihin', '3423423423', 'Irman Mardiana ', 'gHAIB', 'Cimahi', '19 Jul 2023', 'Ilmu Ekonomi', ' Accounting Information', 'S1', '325235_kartu7.pdf', 0),
(42, 0, 'Teknik Silat', '', 'Ahmad Solihin', '5345345353453', 'Irman Mardiana ', 'gHAIB', 'Cimahi', '12 Jul 2023', 'Komunikasi\r\n', 'Teknik Informatika', 'S1', 'Report_Data_Repository2.pdf', 0),
(43, 0, 'Teknik Silat Macan Putih', '', 'Ahmad Solihin', '35235235234', 'Irman Mardiana ', 'gHAIB', 'Cimahi', '19 Jul 2023', 'Kedokteran Umum\r\n', ' Mobile Application & Technology', 'S1', '325235_kartu9.pdf', 0),
(44, 0, 'Teknik Silat Macan Putih', '', 'Ahmad Solihin Santosa', '35235235234', 'Irman Mardiana ', 'gHAIB', 'Cimahi', '19 Jul 2023', 'Kedokteran Umum\r\n', ' Mobile Application & Technology', 'S1', '325235_kartu11.pdf', 0),
(45, 0, 'Teknik Silat', '', 'Ahmad Solihin Santosa Somlia', '353453453534', 'Irman Mardiana ', 'gHAIB', 'Cimahi', '19 Jul 2023', 'Hukum', ' Mobile Application & Technology', 'S1', '235235_kartu1.pdf', 0),
(47, 0, 'Teknik Silat', '', 'Satra', '45345343534535', 'Irman Mardiana ', 'gHAIB', 'Cimahi', '13 Jul 2023', 'Teknik Sipil\r\n', ' Mobile Application & Technology', 'S1', '235235_kartu3.pdf', 1),
(48, 76, 'Teknik Silat Macan Hitam', '', 'Satra Sandria', '453453453453', 'Irman Mardiana ', 'gHAIB', 'Cimahi', '13 Jul 2023', 'Ilmu Ekonomi', ' Mobile Application & Technology', 'S1', '235235_kartu4.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL,
  `can_approve` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `can_approve`) VALUES
(1, 'Administrator', 0),
(2, 'Dosen', 0),
(3, 'Mahasiswa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_dosen`
--

CREATE TABLE `tugas_dosen` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `fakultas` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_mulai` varchar(128) NOT NULL,
  `tgl_akhir` varchar(128) NOT NULL,
  `file` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tugas_dosen`
--

INSERT INTO `tugas_dosen` (`id`, `user_id`, `nama`, `judul`, `fakultas`, `deskripsi`, `tgl_mulai`, `tgl_akhir`, `file`) VALUES
(1, 78, 'Irman Mardiana', 'Membuat Php Mvc', 'Ilmu Komputer', 'asaasdwa', '16 Aug 2023', '24 Aug 2023', '235235_kartu3.pdf'),
(2, 78, 'Irman Mardiana', 'Php Mvc ', 'Ilmu Komputer', 'Menggunakan Codeigniter', '16 Aug 2023', '24 Aug 2023', '325235_kartu5.pdf'),
(3, 78, 'Irman Mardiana', 'Membuat Php MVC', 'Ilmu Komputer', 'sdawasdaw', '18 Aug 2023', '30 Aug 2023', '325235_kartu3.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_mhs`
--

CREATE TABLE `tugas_mhs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `fakultas` varchar(128) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `deskripsi` text NOT NULL,
  `dosen_tujuan` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL,
  `nilai` varchar(128) NOT NULL,
  `catatan_penolakan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tugas_mhs`
--

INSERT INTO `tugas_mhs` (`id`, `user_id`, `nama`, `fakultas`, `judul`, `deskripsi`, `dosen_tujuan`, `file`, `tanggal_upload`, `status`, `nilai`, `catatan_penolakan`) VALUES
(2, 76, 'Satria Roby', 'Ilmu Komputer', 'Teknik Kungfu', 'sdawa', '78', '', '2023-07-27 06:55:50', 2, '5.7', 'Kamu kurang beruntung'),
(3, 76, 'Ahmad Solihin', 'Ilmu Komputer', 'Teknik Silat Macan Putih', 'Ini Tugas Buat di alam ghaib', '78', '', '2023-07-27 07:36:54', 1, '8.7', ''),
(4, 76, 'Ahmad Solihin', 'Ilmu Komputer', 'Teknik Silat Macan Hitam', 'sdawdad', '78', 'PH_ServiceStangBorBW_FTT_25082023.pdf', '2023-08-02 08:08:22', 1, '6.8', ''),
(5, 76, 'Ahmad Solihin', 'Ilmu Komputer', 'Teknik Silat Macan Putih', 'Ini tugas dari firaun', '78', '27224b25caee7f7e5c9c1ac365c51257.pdf', '2023-08-02 07:59:20', 0, '', ''),
(7, 76, 'Ahmad Solihin', 'Ilmu Komputer', 'Menjadi Tukang', 'Jadi tukang rumah', '78', 'f745629c08fe18a8f6af26e94c0a89b9.pdf', '2023-08-02 08:04:04', 0, '', ''),
(8, 76, 'Ahmad Solihin', 'Ilmu Komputer', 'Teknik Kungfu', 'dasdawa', '78', '4ef734328448a6e8025ae5417a198243.pdf', '2023-08-02 08:57:20', 0, '', ''),
(9, 76, 'Ahmad Solihin', 'Ilmu Komputer', 'Menjadi Tukang', 'Tukang', '78', '16944ec3beea8c8f5aacc687ec37b32e.pdf', '2023-08-02 16:15:25', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `jurusan` varchar(128) NOT NULL,
  `nomor_induk` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_approved` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `jurusan`, `nomor_induk`, `image`, `password`, `role_id`, `is_active`, `is_approved`, `date_created`) VALUES
(8, 'SynBull', 'synbullz5@gmail.com', '', '45353534', '3a9f273576d9b6505577c56c79e7ce16.png', '$2y$10$nQHtLWFYf/RBabtZohVpv.ZKjNjD5HxL17RNIXoudgwAMalHZojPW', 1, 1, 1, 1684224753),
(76, 'Ahmad Solihin', 'trisuaka9@gmail.com', 'Ilmu Komputer', '23415673245', 'default.jpg', '$2y$10$IOJG2A4PWOGboiumria6deQt5ufpbugS6VPcmZEW4DIHHPRVLqlXG', 3, 1, 1, 1689648379),
(78, 'Irman Mardiana', 'studio@bskystudio.com', 'Ilmu Komputer', '3423423235235', 'default.jpg', '$2y$10$d.3GcCzC.iuDextajbkGjOsQQylJUrviHV6GoyN3r8I9yEkx30Hk6', 2, 1, 1, 1689660538),
(79, 'Satria Roby Kurniawan', 'bsky.teknik@gmail.com', 'Desain Visual\r\n', '342424242', 'default.jpg', '$2y$10$70n5TI23dFer6qYYd8GQVu4d1fOF56Bt8cwLMw1ywCYknKpe/PhGW', 2, 1, 1, 1689670415);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(5, 1, 3),
(7, 1, 4),
(28, 2, 4),
(29, 1, 8),
(30, 2, 8),
(33, 3, 8),
(36, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Dosen'),
(3, 'Menu'),
(4, 'Mahasiswa'),
(8, 'Setting');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `level`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'admin', 'Dashboard', 'admin', 'fas fa-fw fa-chart-line', 1),
(2, 8, 'setting', 'My Profile', 'setting', 'fas fa-user-secret', 1),
(3, 8, 'setting/edit', 'Edit Profile', 'setting/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'menu', 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'menu/submenu', 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 2, 'user', 'Dashboard', 'user', 'fas fa-fw fa-chart-line	', 1),
(7, 2, 'mahasiswa', 'Data Mahasiswa', 'mahasiswa', 'fas fa-fw fa-folder', 1),
(8, 2, 'mahasiswa/jurusan', 'Data Fakultas', 'mahasiswa/jurusan', 'fas fa-fw fa-building', 1),
(10, 2, 'repository', 'Repository', 'repository', 'fas fa-fw fa-graduation-cap', 1),
(11, 2, 'repository/tambah', 'Tambah Repository', 'repository/tambah', 'fas fa-fw fa-graduation-cap', 1),
(12, 1, 'admin/role', 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(13, 8, 'setting/changepassword', 'Change Password', 'setting/changepassword', 'fas fa-fw fa-key', 1),
(20, 1, 'admin/users', 'User', 'admin/users', 'fas fa-fw fa-user', 1),
(22, 4, 'user_mahasiswa/upload_tugas', 'Buat Tugas', 'user_mahasiswa/upload_tugas', 'fas fa-fw fa-graduation-cap', 1),
(23, 1, 'admin/artikel', 'Artikel Berita', 'admin/artikel', 'fas fa-fw fa-newspaper', 1),
(24, 4, 'user_mahasiswa', 'Daftar Repository', 'user_mahasiswa', 'fas fa-fw fa-graduation-cap', 1),
(25, 4, 'user_mahasiswa/tambah', 'Tambah Repository', 'user_mahasiswa/tambah', 'fas fa-fw fa-graduation-cap', 1),
(26, 2, 'user/daftar_tugas_dosen', 'Tugas', 'user/daftar_tugas_dosen', 'fas fa-fw fa-graduation-cap', 1),
(27, 1, 'profile', 'Profile Universitas', 'profile', 'fas fa-fw fa-building', 1),
(28, 4, 'user_mahasiswa/daftar_tugas', 'Data Tugas', 'user_mahasiswa/daftar_tugas', 'fas fa-fw fa-graduation-cap', 1),
(29, 2, 'user/upload_tugas_dosen', 'Tambah Tugas', 'user/upload_tugas_dosen', 'fas fa-fw fa-graduation-cap', 1),
(30, 2, 'user/daftar_tugas', 'Daftar Tugas Dosen', 'user/daftar_tugas', 'fas fa-fw fa-graduation-cap', 1),
(31, 4, 'user_mahasiswa/daftar_tugas_dosen', 'Daftar Tugas', 'user_mahasiswa/daftar_tugas_dosen', 'fas fa-fw fa-graduation-cap', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `user_id`, `email`, `token`, `date_created`) VALUES
(65, 75, 'trisuaka09@gmail.com', 'TwQgQkeB/hfVvPh2JuaUh4xNEGCiYOfbxxCEY+AplaI=', 1689648267),
(69, 79, 'bsky.teknik@gmail.com', '8GfU5dafnERcb9FXkOj/pCShWb7GV5dxJtUxfGXkOaw=', 1689670415);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_dosen`
--
ALTER TABLE `tugas_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas_mhs`
--
ALTER TABLE `tugas_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `repository`
--
ALTER TABLE `repository`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tugas_dosen`
--
ALTER TABLE `tugas_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tugas_mhs`
--
ALTER TABLE `tugas_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
