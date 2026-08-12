-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Agu 2026 pada 08.59
-- Versi server: 8.4.3
-- Versi PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filsafatbali_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ajaran_tertua`
--

CREATE TABLE `ajaran_tertua` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prinsip1_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prinsip1_deskripsi` text COLLATE utf8mb4_unicode_ci,
  `prinsip2_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prinsip2_deskripsi` text COLLATE utf8mb4_unicode_ci,
  `prinsip3_nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prinsip3_deskripsi` text COLLATE utf8mb4_unicode_ci,
  `contoh_penerapan` text COLLATE utf8mb4_unicode_ci,
  `sumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ajaran_tertua`
--

INSERT INTO `ajaran_tertua` (`id`, `user_id`, `judul`, `gambar`, `tags`, `lokasi`, `tahun`, `deskripsi`, `prinsip1_nama`, `prinsip1_deskripsi`, `prinsip2_nama`, `prinsip2_deskripsi`, `prinsip3_nama`, `prinsip3_deskripsi`, `contoh_penerapan`, `sumber`, `status`, `created_at`, `updated_at`) VALUES
(3, 3, 'Tri Hita Karana', 'ajaran_tertua/KjBLRKMVTL4pr6u4Qx8zCtne0Voqy2cQZDXJD53b.jpg', 'FILOSOFI', 'UBUD, GIANYAR', 'DIDIRIKAN TAHUN 1965', 'Tri Hita Karana berasal dari bahasa Sanskerta: tri (tiga), hita (kebahagiaan/keselamatan), karana (penyebab). Falsafah ini adalah landasan kehidupan masyarakat Bali yang mengajarkan keharmonisan hubungan manusia dengan Tuhan, sesama manusia, dan alam semesta.', 'Parhyangan', 'Hubungan harmonis antara manusia dan Tuhan (Ida Sang Hyang Widhi Wasa).', 'Pawongan', 'Hubungan harmonis antar sesama manusia melalui gotong royong dan sistem banjar.', 'Palemahan', 'Hubungan harmonis antara manusia dengan alam sekitar dan lingkungan hidup.', 'Sistem Subak Bali yang mengatur irigasi sawah secara kolektif adalah contoh nyata penerapan Tri Hita Karana — meliputi ritual keagamaan, kerja sama petani, dan pengelolaan alam berkelanjutan.', 'Sadia, I.W. (1965). Tri Hita Karana dalam Kehidupan Orang Bali. Denpasar: Pustaka Bali.', 'disetujui', '2026-08-02 20:38:15', '2026-08-02 20:46:45'),
(5, 3, 'Desa Kala Patra', 'ajaran_tertua/mZH4ggR9EHCd4H071H2O7IBiRFqWJCORJnThFAgb.jpg', 'KEARIFAN LOKAL', 'BADUNG', 'FLEKSIBILITAS BUDAYA', 'Desa Kala Patra merupakan kearifan lokal Bali tentang fleksibilitas dan kepatuhan hukum adat. Ajaran ini menekankan bahwa penerapan norma, aturan, dan tradisi harus selalu disesuaikan dengan situasi, tempat, waktu, dan keadaan yang dihadapi.', 'Desa (Tempat)', 'Menghormati aturan, norma, dan tradisi setempat di mana kita berada.', 'Kala (Waktu)', 'Mampu beradaptasi dengan perkembangan zaman dan era tanpa kehilangan nilai dasar kebaikan.', 'Patra (Keadaan)', 'Bertindak sesuai dengan kapasitas, kondisi, dan situasi riil yang sedang terjadi.', 'Kemampuan masyarakat Bali dalam menerima perkembangan zaman dan pariwisata modern tanpa mengorbankan akar tradisi kebudayaan', 'Ngurah, I.G. (1988). Desa Kala Patra dalam Tata Hukum Adat Bali. Denpasar.', 'disetujui', '2026-08-02 20:43:55', '2026-08-02 20:46:36'),
(6, 3, 'Tat Twam Asi', 'ajaran_tertua/ydbL5XJIPlfSUKSzYkVVeZw1DljJUsTF0eQLBnLo.jpg', 'Kemanusiaan', 'Klungkung', 'DIDIRIKAN TAHUN 1940', 'Tat Twam Asi adalah ungkapan Sanskerta yang berarti \"Itu adalah Kamu\" atau \"Kamu adalah Itu\". Ini adalah salah satu Mahavakya (ucapan agung) dalam filsafat Vedanta Upanishad, yang dalam konteks Bali menjadi prinsip moral paling mendasar.\r\n\r\nAjaran ini mengajarkan bahwa jiwa setiap makhluk hidup pada hakikatnya identik — bersumber dari Brahman yang sama. Oleh karena itu, ketika kita menyakiti orang lain, kita sesungguhnya menyakiti diri sendiri. Sebaliknya, membantu orang lain berarti membantu diri kita sendiri.\r\n\r\nDalam kehidupan sehari-hari orang Bali, Tat Twam Asi tercermin dalam tradisi ngayah (kerja bakti tanpa pamrih untuk pura), saling membantu dalam upacara, dan penghormatan mendalam kepada setiap tamu.', 'Kesatuan Atman', 'Jiwa setiap manusia (Atman) pada dasarnya identik dan bersumber dari satu Brahman yang sama.', 'Empati Universal', 'Karena semua makhluk adalah satu, rasa sakit dan kebahagiaan orang lain juga dirasakan oleh kita.', 'Tanpa Pamrih', 'Tindakan kebaikan dilakukan bukan untuk imbalan, melainkan karena kesadaran kesatuan dengan sesama.Tindakan kebaikan dilakukan bukan untuk imbalan, melainkan karena kesadaran kesatuan dengan sesama.', 'Tradisi ngayah — bekerja bakti di pura atau rumah tetangga yang mengalami musibah — adalah contoh hidup dari Tat Twam Asi. Tidak ada perhitungan untung-rugi; semua dilakukan karena rasa memiliki dan kesatuan.', 'Mantra, I.B. (1940). Tat Twam Asi: Filsafat Kasih Sayang Universal. Klungkung: Paramita.', 'disetujui', '2026-08-03 01:44:42', '2026-08-03 01:45:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Ajaran Tertua',
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `kesimpulan` text COLLATE utf8mb4_unicode_ci,
  `contoh` text COLLATE utf8mb4_unicode_ci,
  `referensi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `artikels`
--

INSERT INTO `artikels` (`id`, `judul`, `kategori`, `penulis`, `desa`, `tahun`, `isi`, `kesimpulan`, `contoh`, `referensi`, `gambar`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'ggg', 'Ajaran Tertua', 'Penulis', NULL, NULL, 'd', 'h', NULL, NULL, 'artikel/gCyWLYhl6UkvH59PuMSNIjh2qPFwHBpFurdGazQE.png', 'pending', 3, '2026-07-31 22:33:49', '2026-07-31 23:44:45'),
(2, 'aku', 'Cecimpedan', 'Penulis', NULL, NULL, 'dd', 's', NULL, NULL, 'artikel/mbk1HttIhRYNiPzqpWL7MPiOiKkmM2FEB8ey5G2X.png', 'pending', 3, '2026-07-31 23:27:49', '2026-07-31 23:51:53'),
(3, 'ad', 'Cecimpedan', 'Penulis', NULL, NULL, 'dk', 'ks', NULL, NULL, 'artikel/bVqJDaM279ctMX8szc71dDYiIaUQbUG6qIiM6uvi.png', 'ditolak', 3, '2026-07-31 23:35:38', '2026-08-01 19:55:58'),
(4, 'Filosofi Subak: Demokrasi Air dalam Peradaban Bali', 'Ajaran Tertua', 'Penulis', NULL, NULL, 'Subak adalah sistem irigasi pertanian yang telah ada di Bali selama lebih dari seribu tahun. Lebih dari sekedar teknik pengairan, Subak adalah lembaga sosial, spiritual, dan demokratis yang mengatur penggunaan air di antara para petani dengan cara yang adil dan berkelanjutan.\r\n\r\nSetiap Subak dikelola oleh anggota petani yang memilih pemimpin (pekaseh) secara demokratis. Keputusan tentang jadwal tanam, pembagian air, dan upacara dilakukan bersama. Tidak ada petani yang bisa mengambil lebih banyak dari jatahya — sistem ini mengklaim bukan hanya oleh manusia, tapi juga oleh ritual keagamaan.', 'Subak adalah bukti bahwa kearifan lokal Bali tidak hanya indah secara filosofis, tetapi juga efektif secara praktis. UNESCO mengakuisisinya sebagai Warisan Budaya Dunia pada tahun 2012.', NULL, NULL, 'artikel/PmjK5vzDvIV14BocIQkJrKxpKlJAqNIepvF3NgSP.png', 'disetujui', 3, '2026-08-02 19:37:56', '2026-08-02 19:55:20'),
(5, 'Cecimpedan Bali sebagai Media Pendidikan Karakter Anak', 'Cecimpedan', 'Penulis', NULL, NULL, 'Teka-teki tradisional Bali (Cecimpedan) bukan sekadar permainan kata sederhana untuk anak-anak. Di dalam struktur pertanyaan dan jawabannya, tersimpan nilai-nilai pemikiran kritis, pengamatan alam, dan etika dasar bermasyarakat.\r\n\r\nMelalui cecimpedan, generasi muda diajak memahami simbolisme flora, fauna, serta peralatan sehari-hari dalam konteks filosofis yang mudah dicerna.', 'Pelestarian cecimpedan penting untuk menjaga kemampuan nalar kritis anak berbasis kebudayaan lokal di tengah gempuran teknologi digital.', NULL, NULL, 'artikel/e96mYp97qmdP5CFZW95dHkzKe4Z5YOmtCjeYvNHz.jpg', 'disetujui', 3, '2026-08-02 19:39:33', '2026-08-02 19:55:17'),
(6, 'Sor Singgih: Hierarki Bahasa sebagai Cermin Tatanan Sosial', 'Istilah Bali', 'Penulis', NULL, NULL, 'Bahasa Bali mengenal tingkatan tutur—Alus, Madya, dan Kasar—yang dikenal dengan sebutan Sor Singgih Basa. Tingkatan ini bukan diciptakan untuk membeda-bedakan kasta secara kaku, melainkan sebagai norma rasa hormat dan etika bertutur kata.\r\n\r\nMemahami sor singgih membantu seseorang menempatkan diri dengan santun saat berbicara kepada sesama, tetangga, pejabat, maupun tokoh agama.', 'Sor Singgih Basa Bali merupakan cerminan kehalusan budi pekerti dan rasa saling menghormati dalam komunikasi sosial.', NULL, NULL, 'artikel/IoNBDnL0OVQDeAAMLm2QVhUOBuwWOSkWZcjBBL41.jpg', 'disetujui', 3, '2026-08-02 19:40:30', '2026-08-02 19:55:15'),
(7, 'Rwa Bhineda, Keseimbangan Kehidupan', 'Ajaran Tertua', 'Penulis', NULL, NULL, 'Rwa Bhineda mengajarkan dualitas kehidupan: baik-buruk, siang-malam, duka-suka. Kedua hal berlawanan ini tidak untuk dihilangkan salah satunya, melainkan diselaraskan agar tercipta keseimbangan kosmis.', 'Memahami Rwa Bhineda membuat manusia lebih tenang dan bijaksana dalam menghadapi pasang surut dinamika kehidupan.', NULL, NULL, 'artikel/dz57mbPTqOgnnD1bUi3dGW9jLtoGGpfp4VVccOLk.jpg', 'disetujui', 3, '2026-08-02 19:44:56', '2026-08-02 19:55:08'),
(8, 'Makna Tersembunyi di Balik Cecimpedan tentang Alam', 'Cecimpedan', 'Penulis', NULL, NULL, 'Banyak cecimpedan mengambil objek tumbuhan, sungai, dan binatang. Hal ini melatih kepekaan inderawi anak-anak zaman dahulu terhadap kondisi alam sekitar mereka.', 'Cecimpedan alam memupuk rasa cinta lingkungan sejak usia dini.', NULL, NULL, 'artikel/CjNQFaGcGEBeVYwCS9J2ZBrsxR4SOdpYqVmOSazX.jpg', 'disetujui', 3, '2026-08-02 19:47:44', '2026-08-02 19:54:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `item_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `user_id`, `item_title`, `item_type`, `item_url`, `created_at`, `updated_at`) VALUES
(2, 4, 'Makna Tersembunyi di Balik Cecimpedan tentang Alam', 'artikel', '#', '2026-08-08 19:39:07', '2026-08-08 19:39:07'),
(4, 4, 'Filosofi Subak: Demokrasi Air dalam Peradaban Bali', 'artikel', '#', '2026-08-08 19:42:24', '2026-08-08 19:42:24'),
(7, 4, 'Ni Bawang teken Ni Kesuna', 'Satua Bali', '#', '2026-08-08 19:50:07', '2026-08-08 19:50:07'),
(9, 4, 'Seka', 'Istilah Bali', '#', '2026-08-08 20:03:48', '2026-08-08 20:03:48'),
(10, 4, 'Pura', 'Istilah Bali', '#', '2026-08-08 20:03:51', '2026-08-08 20:03:51'),
(15, 4, 'I Tuwung Kuning', 'Satua Bali', '#', '2026-08-09 21:42:54', '2026-08-09 21:42:54'),
(18, 4, 'Rwa Bhineda, Keseimbangan Kehidupan', 'artikel', 'http://127.0.0.1:8000?open=Rwa%20Bhineda%2C%20Keseimbangan%20Kehidupan#artikel', '2026-08-10 16:15:10', '2026-08-10 16:15:10'),
(19, 4, 'Sor Singgih: Hierarki Bahasa sebagai Cermin Tatanan Sosial', 'artikel', 'http://127.0.0.1:8000?open=Sor%20Singgih%3A%20Hierarki%20Bahasa%20sebagai%20Cermin%20Tatanan%20Sosial#artikel', '2026-08-10 16:15:14', '2026-08-10 16:15:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cecimpedans`
--

CREATE TABLE `cecimpedans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci,
  `tingkat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pertanyaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `terjemahan` text COLLATE utf8mb4_unicode_ci,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `makna` text COLLATE utf8mb4_unicode_ci,
  `filosofi` text COLLATE utf8mb4_unicode_ci,
  `variasi_daerah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asal_daerah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rekaman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cecimpedans`
--

INSERT INTO `cecimpedans` (`id`, `user_id`, `judul`, `isi`, `tingkat`, `pertanyaan`, `terjemahan`, `jawaban`, `makna`, `filosofi`, `variasi_daerah`, `asal_daerah`, `rekaman`, `gambar`, `kategori`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, NULL, NULL, 'Mudah', 'nos', 'yg', 'kj', 'lo', 'jn', 'ch', 'jb', 'dx', NULL, NULL, 'pending', '2026-07-31 22:59:33', '2026-07-31 23:57:32'),
(3, 3, NULL, NULL, 'Mudah', 's', 's', 's', 's', 's', 's', 's', 's', NULL, NULL, 'pending', '2026-07-31 23:57:54', '2026-07-31 23:57:54'),
(4, 3, NULL, NULL, 'Sedang', '\"Bungkusne putih, isinye abang, sabilang karohne makejang ilang.\"', 'Bungkusnya putih, isinya merah, setiap kali dibuka semuanya habis.', 'Buah Semangka', 'Cecimpedan ini mengajarkan tentang kerelaan seperti semangka yang melepaskan seluruh isinya ketika dibuka. Manusia juga seharusnya memberi tanpa mengharapkan balasan.', '1. Kerelaan memberi tanpa mengharapkan kembali.\r\n2. Keindahan yang baru terungkap saat dibuka — seperti kepribadian manusia.\r\n3. Paradoks: semakin diberikan, semakin bernilai.', 'Di beberapa daerah, cecimpedan ini juga dijawab dengan \'buah delima\' karena kemiripan deskripsinya.', 'Gianyar, Bali Tengah', 'Direkam tahun 1982 oleh Balai Bahasa Bali', NULL, NULL, 'disetujui', '2026-08-01 23:26:31', '2026-08-02 19:20:34'),
(5, 3, NULL, NULL, 'Sulit', '\"Adanne luh, awakne besik, ngalih ya dini ditu, pesu ya di tengah.\"', 'Namanya banyak, badannya satu, mencarinya ke sana ke sini, keluarnya di tengah.', 'Jarum Jahit', 'Mengajarkan ketelitian dan fokus pada tujuan utama. Seperti jarum jahit yang menyatukan kain terpisah, manusia harus mampu mempererat keharmonisan.', '1. Ketekunan dalam menyelesaikan atau menyatukan sesuatu yang terpisah.\r\n2. Fokus pada tujuan utama meski harus menembus berbagai rintangan.\r\n3. Simbol kerapian dan keharmonisan hasil karya.', 'Sering dijadikan petuah tradisional untuk melatih ketelitian anak-anak Bali zaman dahulu.', 'Badung, Bali Selatan', 'Arsipan Dokumentasi Kebudayaan Bali', NULL, NULL, 'disetujui', '2026-08-01 23:29:02', '2026-08-02 18:38:08'),
(6, 3, NULL, NULL, 'Mudah', '\"Nongos di tegale, ngelah baju liu pesan, nanging sing taen nganggo.\"', 'Tinggal di ladang, punya baju banyak sekali, tetapi tidak pernah memakainya.', 'Pohon Pisang', 'Pohon pisang memiliki pelepah melimpah namun tidak menggunakannya untuk kesombongan. Mengajarkan kedermawanan dan kerendahan hati.', '1. Kedermawanan alam yang selalu memberikan perlindungan.\r\n2. Kesederhanaan hidup: memiliki banyak hal namun tidak tinggi hati.\r\n3. Filosofi pisang yang baru mati setelah memberikan manfaat (buah).', 'Kadang disebut juga melambangkan tanaman bambu di beberapa wilayah pesisir.', 'Tabanan, Bali Barat', 'Balai Bahasa Provinsi Bali', NULL, NULL, 'disetujui', '2026-08-01 23:31:44', '2026-08-02 18:37:54'),
(7, 3, NULL, NULL, 'Mudah', '\"Memene ngalain, panakne masiab.\"', 'Ibunya pergi, anak-anaknya bersorak.', 'Kukusan lan Papasan', 'Mengajarkan pentingnya kerja sama dan sinergi dalam kehidupan. Seperti uap panas dan beras yang saling melengkapi untuk menghasilkan nasi yang matang, manusia butuh keharmonisan dan kebersamaan untuk mencapai tujuan bersama.', '1. Sinergi dan kerja sama yang harmonis untuk menghasilkan sesuatu yang bermanfaat (seperti uap dan beras yang menghasilkan nasi matang).  \r\n2. Simbol kerelaan dan pengorbanan, di mana uap air menghilang demi mematangkan butiran beras di dalamnya.  \r\n3. Pembelajaran kebersamaan (gotong royong) dalam menghadapi ujian atau proses kehidupan yang panas/sulit.', 'Sering dijadikan petuah tradisional di dapur rumah warga untuk melatih nalar kritis dan pemahaman proses memasak anak-anak Bali zaman dahulu', 'Gianyar, Bali', 'Dokumentasi Sastra Lisan & Kebudayaan Bali', NULL, NULL, 'disetujui', '2026-08-09 04:22:52', '2026-08-09 04:23:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `discussions`
--

CREATE TABLE `discussions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `downloads`
--

CREATE TABLE `downloads` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `article_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `filsafat`
--

CREATE TABLE `filsafat` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fokus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tokoh_terkenal` text COLLATE utf8mb4_unicode_ci,
  `karakteristik` text COLLATE utf8mb4_unicode_ci,
  `implikasi` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `filsafat`
--

INSERT INTO `filsafat` (`id`, `user_id`, `judul`, `deskripsi`, `asal`, `fokus`, `tokoh_terkenal`, `karakteristik`, `implikasi`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'a', 'a', 'b', 'a', 'a', 'a', 'a', 'pending', '2026-07-31 22:03:09', '2026-07-31 22:51:56'),
(2, 3, 's', 't', 'b', 'u', 'c', 'h', 'x', 'pending', '2026-07-31 22:32:31', '2026-07-31 22:32:31'),
(3, 3, 'aku', '<p>s</p>', 's', 's', 's', 's', '<ol><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>ssss<strong>sssss<u>ssssssssssss</u></strong></li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>ss</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>sss</li><li data-list=\"ordered\"><span class=\"ql-ui\" contenteditable=\"false\"></span>ss</li></ol>', 'pending', '2026-07-31 23:57:19', '2026-08-10 18:26:04'),
(4, 3, 'Filsafat Barat', 'Filsafat Barat berkembang sejak Yunani Kuno dan menjadi dasar lahirnya ilmu pengetahuan modern, logika, etika, politik, serta pemikiran rasional.', 'Yunani Kuno', 'Logika & Rasionalitas', 'Socrates: Mengajarkan pentingnya berpikir kritis melalui dialog.\r\nPlato: Pendiri Akademi dan pencetus teori dunia ide.\r\nAristoteles: Mengembangkan logika, etika, politik, dan ilmu alam.', 'Berpikir logis dan analitis.\r\nArgumentasi rasional mendalam.\r\nPenggunaan metode ilmiah.\r\nPencarian kebenaran universal.', 'Menjadi dasar perkembangan ilmu pengetahuan, demokrasi, pendidikan, hukum, dan teknologi modern.', 'disetujui', '2026-08-03 03:10:17', '2026-08-03 03:34:53'),
(5, 3, 'Filsafat Timur', 'Filsafat Timur berkembang di Asia dan menekankan keseimbangan hidup, spiritualitas, serta keharmonisan manusia dengan alam.', 'Asia (India, Tiongkok, Jepang)', 'Spiritualitas & Keharmonisan', 'Konfusius: Mengajarkan moralitas, etika, dan tata krama dalam kehidupan bermasyarakat.\r\nLaozi: Pendiri Taoisme yang mengajarkan hidup menyatu dengan jalan alam (Tao).\r\nSiddhartha Gautama: Mengajarkan jalan pencerahan dan kebebasan dari penderitaan.', 'Keharmonisan hidup dengan alam.\r\nKeseimbangan kosmis (Yin & Yang).\r\nKedalaman spiritualitas dan introspeksi.\r\nPengendalian diri dan kebijaksanaan batin.', 'Mempengaruhi budaya Asia, praktik meditasi, etika keluarga, pandangan agama, dan kearifan hidup sehari-hari.', 'disetujui', '2026-08-03 03:12:28', '2026-08-03 03:34:50'),
(6, 3, 'Filsafat Moral', 'Filsafat Moral (Etika) mengkaji nilai baik dan buruk, serta membimbing bagaimana manusia seharusnya bertindak secara bijaksana dan bertanggung jawab.', 'Universal', 'Etika & Nilai Kebaikan', 'Immanuel Kant: Mengembangkan etika deontologi (kewajiban moral mutlak).\r\nJohn Stuart Mill: Tokoh Utilitarianisme (tindakan terbaik memberi manfaat terbanyak).', 'Penilaian tindakan baik vs buruk.\r\nPenekanan pada etika dan integritas.\r\nPrinsip kewajiban dan hak asasi.\r\nTanggung jawab moral individu.', 'Menjadi dasar hukum etika profesi, norma sosial, pendidikan karakter, dan hak asasi manusia.', 'disetujui', '2026-08-03 03:14:04', '2026-08-03 03:34:47'),
(7, 3, 'Filsafat Politik', 'Membahas konsep negara, kekuasaan, keadilan, hukum, serta hubungan ideal antara pemerintah dengan rakyat.', 'Yunani Kuno & Modern', 'Negara & Keadilan Sosial', 'Niccolò Machiavelli: Pemikir realisme politik tentang kekuasaan dan negara.\r\nJohn Locke: Pencetus teori kontrak sosial dan hak asasi individu.', 'Prinsip keadilan dan hukum.\r\nPembagian kekuasaan negara.\r\nPerlindungan hak-hak masyarakat.\r\nSistem tata kelola pemerintahan.', 'Melandasi lahirnya sistem demokrasi, konstitusi negara, hukum internasional, dan kebebasan sipil.', 'disetujui', '2026-08-03 03:15:54', '2026-08-03 03:34:43'),
(8, 3, 'Filsafat Ilmu', 'Mempelajari hakikat ilmu pengetahuan, metode ilmiah, kebenaran bukti, serta batasan kemampuan berpikir manusia.', 'Era Modern', 'Metodologi & Kebenaran Ilmiah', 'Karl Popper: Mengembangkan prinsip falsifikasi dalam pengujian sains.\r\nThomas Kuhn: Memperkenalkan teori pergeseran paradigma ilmiah.', 'Penggunaan metode ilmiah ketat.\r\nPembuktian empiris dan observasi.\r\nLogika deduktif dan induktif.\r\nEvaluasi kritis terhadap teori.', 'Menjadi fondasi utama penelitian akademik, teknologi modern, riset medis, dan perkembangan sains.', 'disetujui', '2026-08-03 03:17:10', '2026-08-03 03:34:40'),
(9, 3, 'Filsafat Agama', 'Mengkaji makna keberadaan Ketuhanan, hubungan antara akal pikiran dan keimanan, serta tujuan hakiki kehidupan.', 'Universal', 'Ketuhanan & Keimanan', 'Thomas Aquinas: Menyelaraskan ajaran iman dengan rasionalitas filsafat.\r\nAl-Ghazali: Menggabungkan logika, ajaran agama, dan kedalaman sufisme.', 'Perenungan tentang Ketuhanan.\r\nPencarian makna dan tujuan hidup.\r\nPenyelarasan wahyu dan akal budi.\r\nRefleksi atas kehidupan setelah kematian.', 'Memberikan kedalaman pemahaman spiritual, kerukunan beragama, serta landasan etika moral bermasyarakat.', 'disetujui', '2026-08-03 03:18:42', '2026-08-03 03:23:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `istilahs`
--

CREATE TABLE `istilahs` (
  `id` bigint UNSIGNED NOT NULL,
  `istilah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arti` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sejarah` text COLLATE utf8mb4_unicode_ci,
  `contoh_penggunaan` text COLLATE utf8mb4_unicode_ci,
  `padanan_kata` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `istilahs`
--

INSERT INTO `istilahs` (`id`, `istilah`, `arti`, `kategori`, `sejarah`, `contoh_penggunaan`, `padanan_kata`, `gambar`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'ngaben', 'eee', 'Agamad', 'e', 'e', 'e', NULL, 'pending', 3, '2026-07-31 22:02:08', '2026-07-31 23:59:48'),
(2, 'Ngaben', 'Upacara kremasi jenazah dalam agama Hindu Bali. Tujuannya membebaskan roh dari ikatan duniawi.', 'Upacara', 'Tradisi Ngaben telah dikenal sejak berkembangnya agama Hindu di Bali sekitar abad ke-9 hingga ke-11 Masehi. Upacara ini merupakan bagian dari Pitra Yadnya, yaitu persembahan suci kepada leluhur sebagai bentuk bakti kepada orang tua dan keluarga yang telah meninggal. Dalam kepercayaan Hindu Bali, Ngaben bertujuan mengembalikan unsur Panca Maha Bhuta ke alam semesta serta membantu penyucian Atma agar dapat melanjutkan perjalanan menuju alam leluhur atau mengalami kelahiran kembali sesuai hukum Karma Phala.', 'Kremasi (Indonesia)', 'Digunakan dalam upacara Pitra Yadnya.', NULL, 'disetujui', 3, '2026-08-01 22:12:14', '2026-08-01 22:13:04'),
(3, 'Pura', 'Tempat ibadah umat Hindu Bali. Setiap desa adat memiliki Pura Kahyangan Tiga sebagai pusat spiritual.', 'Tempat', 'Pura mulai berkembang di Bali bersamaan dengan masuknya agama Hindu sekitar abad ke-8 hingga ke-11 Masehi. Pada masa Kerajaan Bali Kuno, pura tidak hanya berfungsi sebagai tempat pemujaan kepada Ida Sang Hyang Widhi Wasa, tetapi juga menjadi pusat kegiatan keagamaan, pendidikan, dan kehidupan masyarakat. Hingga kini, pura tetap menjadi bagian penting dari identitas budaya dan spiritual masyarakat Bali.', 'Tempat Ibadah', 'Digunakan untuk menyebut tempat suci umat Hindu Bali.', NULL, 'disetujui', 3, '2026-08-01 22:33:37', '2026-08-01 22:37:02'),
(4, 'Seka', 'Kelompok masyarakat Bali yang dibentuk berdasarkan kesamaan fungsi atau minat.', 'Sosial', 'Sekaa merupakan organisasi tradisional masyarakat Bali yang telah ada sejak zaman kerajaan sebagai wadah kebersamaan dalam menjalankan kegiatan adat, keagamaan, kesenian, maupun sosial. Pembentukan sekaa didasarkan pada semangat gotong royong dan tanggung jawab bersama. Hingga saat ini, berbagai jenis sekaa seperti Sekaa Teruna, Sekaa Gong, dan Sekaa Subak masih berperan penting dalam menjaga kelestarian budaya dan kehidupan bermasyarakat di Bali.', 'Kelompok', 'Digunakan untuk menyebut organisasi atau kelompok masyarakat Bali.', NULL, 'disetujui', 3, '2026-08-01 22:36:03', '2026-08-01 22:36:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_04_045956_add_role_to_users_table', 1),
(5, '2026_07_04_053036_create_ajarans_table', 1),
(6, '2026_07_20_054121_create_cecimpedans_table', 1),
(7, '2026_07_22_080748_create_satuas_table', 1),
(8, '2026_07_22_082327_create_istilahs_table', 1),
(9, '2026_07_29_001652_create_bookmarks_table', 1),
(10, '2026_07_29_001741_create_favorites_table', 1),
(11, '2026_07_29_001755_create_downloads_table', 1),
(12, '2026_07_29_001806_create_discussions_table', 1),
(13, '2026_07_30_021101_add_kategori_to_ajarans_table', 1),
(14, '2026_07_30_035638_alter_status_on_ajarans_table', 1),
(15, '2026_07_31_035025_add_satua_fields_to_satuas_table', 1),
(16, '2026_08_01_045816_create_filsafat_table', 1),
(17, '2026_08_01_071509_rename_ajarans_to_artikels_table', 2),
(18, '2026_08_01_074332_add_kesimpulan_to_artikels_table', 3),
(19, '2026_08_02_043037_create_ajaran_tertua_table', 4),
(20, '2026_08_12_023127_add_role_and_verification_to_users_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuas`
--

CREATE TABLE `satuas` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokoh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alur` text COLLATE utf8mb4_unicode_ci,
  `moral` text COLLATE utf8mb4_unicode_ci,
  `filosofi` text COLLATE utf8mb4_unicode_ci,
  `asal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ringkasan` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','disetujui','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `satuas`
--

INSERT INTO `satuas` (`id`, `judul`, `sub_judul`, `isi`, `tokoh`, `alur`, `moral`, `filosofi`, `asal`, `gambar`, `ringkasan`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'a', 'am', 'a', 'a', 'a', 'a', 'a', 'Bali', 'satua/KTBuJJWDmPMAzpu89xJwTKnLBIiBQni0mTGBneef.png', 'a', 'pending', 3, '2026-07-31 22:02:47', '2026-07-31 23:59:09'),
(2, 'x', 'cd', 'd', 'd', 'd', 'd', 'd', 'Bali', 'satua/cElZdxAJqFymuUaKJ4MWjajQ2AguIiwwqCF8AmRf.png', 'd', 'pending', 3, '2026-07-31 23:59:36', '2026-07-31 23:59:36'),
(3, 'Ni Ketimun Mas', 'Golden Cucumber Girl', 'Pada zaman dahulu hiduplah seorang janda tua yang sangat mendambakan seorang anak. Suatu hari, ia bertemu dengan seorang raksasa yang memberinya sebuah biji mentimun. Raksasa itu berjanji bahwa dari biji tersebut akan lahir seorang anak, tetapi ketika anak itu berusia tujuh belas tahun, ia harus diserahkan kepadanya. Sang janda menyetujui perjanjian itu. Beberapa waktu kemudian, dari sebuah mentimun emas lahirlah seorang bayi perempuan yang diberi nama Ni Ketimun Mas. Ia tumbuh menjadi gadis yang cantik, rajin, dan baik hati. Ketika usianya menginjak tujuh belas tahun, raksasa datang untuk menagih janjinya. Sang ibu yang tidak rela kehilangan putrinya meminta bantuan seorang pertapa. Pertapa itu memberikan empat benda ajaib berupa biji mentimun, jarum, garam, dan terasi untuk digunakan saat melarikan diri. Ketika dikejar raksasa, Ni Ketimun Mas melemparkan benda-benda tersebut satu per satu. Biji mentimun berubah menjadi ladang yang lebat, jarum menjadi hutan bambu yang tajam, garam menjadi lautan yang luas, dan terasi berubah menjadi lumpur mendidih yang akhirnya menenggelamkan raksasa. Ni Ketimun Mas pun berhasil selamat dan kembali hidup bahagia bersama ibunya. Kisah ini mengajarkan bahwa keberanian, kecerdikan, serta kasih sayang antara ibu dan anak dapat mengalahkan kekuatan yang jahat.', 'Dalam kepercayaan Bali Jalak Bali dianggap simbol kesucian dan keindahan.', 'Perburuan liar dan hilangnya habitat akibat alih fungsi lahan.', 'Program penangkaran dan pelepasliaran rutin.', 'Pesan filosofi mengenai ketabahan.', 'Bali', 'satua/oLsAtiZF7MhlOlZ8RBuK9MswYioT6U9WlfkvKEdy.jpg', 'Hutan musim gugur dan sabana di bagian barat Bali terutama kawasan Taman Nasional Bali Barat.', 'disetujui', 3, '2026-08-01 22:39:59', '2026-08-01 23:12:43'),
(4, 'I Siap Selem', 'The Black Chicken', 'Pada zaman dahulu hiduplah seekor ayam jantan berwarna hitam bernama I Siap Selem yang dikenal rajin, baik hati, dan selalu menolong sesama. Suatu hari, ia menemukan sebutir permata berharga di tengah jalan. Banyak hewan lain yang ingin memiliki permata tersebut, tetapi I Siap Selem tidak serakah. Ia berusaha mencari pemiliknya hingga akhirnya mengetahui bahwa permata itu milik seorang raja yang telah hilang. Karena kejujuran dan ketulusannya, I Siap Selem mengembalikan permata tersebut kepada sang raja tanpa mengharapkan imbalan. Raja sangat kagum atas sikapnya dan memberikan hadiah sebagai tanda terima kasih. Sementara itu, beberapa hewan yang sebelumnya berniat merebut permata merasa malu karena keserakahan mereka. Sejak saat itu, I Siap Selem dihormati oleh semua hewan karena dikenal sebagai sosok yang jujur dan berbudi luhur. Kisah ini mengajarkan bahwa kejujuran, ketulusan, dan tidak serakah akan membawa kebahagiaan serta penghargaan dari orang lain.', 'I Siap Selem\r\nI Doglagan\r\nEnam anak ayam lainnya', '1. Hidup bersama.\r\n2. Anak-anak bermain.\r\n3. I Doglagan tersesat.\r\n4. Sang induk mencari.\r\n5. Keluarga berkumpul kembali.', 'Kasih sayang ibu, kepedulian, dan kebersamaan keluarga.', 'Cinta seorang ibu tidak mengenal batas dan keluarga harus saling menjaga.', 'Bali', 'satua/tQ2cUgZKPwQM5orThf87OXsl1lgKljRP9uKDXBXC.jpg', 'I Siap Selem adalah satua Bali yang menceritakan seekor induk ayam hitam beserta tujuh anaknya.', 'disetujui', 3, '2026-08-01 22:41:23', '2026-08-01 23:13:42'),
(5, 'I Lutung teken I Kekua', 'The Monkey Together with the Turtle', 'Pada zaman dahulu hiduplah seekor lutung yang cerdas dan baik hati bernama I Lutung serta seekor kura-kura bernama I Kekua yang licik dan serakah. Suatu hari mereka sepakat mencari makanan bersama. Ketika menemukan pohon buah yang lebat, I Lutung dengan mudah memanjat pohon dan memetik buah-buahan. Ia membagikan buah tersebut kepada I Kekua yang berada di bawah. Namun, setelah kenyang, I Kekua justru berniat mencelakai temannya. Ia diam-diam mengumpulkan duri dan batu tajam di bawah pohon agar I Lutung terluka saat turun. Mengetahui niat buruk itu, I Lutung berpikir dengan tenang lalu melompat ke cabang lain hingga berhasil turun dengan selamat tanpa menginjak duri yang telah dipasang. Melihat rencananya gagal, I Kekua merasa malu atas perbuatannya. I Lutung kemudian menasihati bahwa persahabatan harus dibangun dengan kejujuran dan saling membantu, bukan dengan tipu daya dan rasa iri. Sejak saat itu, I Kekua menyadari kesalahannya dan berjanji tidak akan mengulangi perbuatan buruknya. Kisah ini mengajarkan bahwa kecerdikan yang disertai kebaikan akan mengalahkan kelicikan, serta setiap perbuatan buruk pada akhirnya akan merugikan pelakunya sendiri.', 'I Lutung\r\nI Kekua', '1. Bersahabat.\r\n2. Mencari makanan.\r\n3. Serakah.\r\n4. Bertengkar.\r\n5. Menyesal.', 'Jangan serakah dan jangan mengkhianati teman.', 'Persahabatan lebih berharga daripada keuntungan sesaat.', 'Bali', 'satua/vH07xj6FA7AySYMtZfaYxLcCkGlg4d6fMjIHyvcE.jpg', 'Persahabatan lutung dan monyet yang diuji oleh sifat serakah.', 'disetujui', 3, '2026-08-01 22:42:46', '2026-08-01 23:13:28'),
(6, 'Ni Bawang teken Ni Kesuna', 'The Tale of Ni Bawang and Ni Kesuna', 'Kesuna bersifat pemalas, iri hati, dan sering berlaku kasar. Ibu Ni Kesuna selalu memanjakan anaknya sendiri dan memperlakukan Ni Bawang dengan tidak adil, sehingga hampir semua pekerjaan rumah dibebankan kepadanya. Suatu hari, ketika Ni Bawang sedang mencuci pakaian di sungai, salah satu selendangnya hanyut terbawa arus. Ia berusaha mencarinya hingga bertemu dengan seorang nenek yang telah menemukan selendang tersebut. Sebagai balas budi atas kejujuran dan kesopanannya, sang nenek menawarkan dua buah labu, satu berukuran kecil dan satu lagi besar. Ni Bawang memilih labu yang kecil karena tidak serakah. Sesampainya di rumah, ketika labu itu dibelah, ternyata di dalamnya terdapat emas dan berbagai perhiasan. Melihat hal itu, Ni Kesuna dan ibunya menjadi iri. Mereka mencoba melakukan hal yang sama, tetapi Ni Kesuna bersikap kasar kepada sang nenek dan dengan serakah memilih labu yang paling besar. Ketika labu tersebut dibelah, isinya bukan harta, melainkan berbagai binatang berbisa yang membuat mereka ketakutan dan menyesali perbuatannya. Sejak saat itu, mereka menyadari kesalahan mereka, sedangkan Ni Bawang hidup bahagia berkat kebaikan dan kejujurannya. Kisah ini mengajarkan bahwa kejujuran, kerendahan hati, dan sikap tidak serakah akan membawa kebahagiaan, sedangkan iri hati dan keserakahan hanya mendatangkan kesulitan.', 'Ni Bawang\r\nNi Kesuna\r\nIbu', '1. Ni Bawang hidup sederhana.\r\n2. Ni Kesuna iri.\r\n3. Ni Bawang mendapat balasan.\r\n4. Ni Kesuna meniru.\r\n5. Akibat keserakahan.', 'Rajin bekerja, bersikap jujur, rendah hati.', 'Setiap perbuatan memiliki konsekuensi.', 'Bali', 'satua/RtOkX5pvhgsgQapHC8fCKIMvc3gV3FqCQfDxhdAk.jpg', 'Ni Bawang teken Ni Kesuna merupakan satua Bali yang mengisahkan dua saudara dengan sifat yang sangat berbeda.', 'disetujui', 3, '2026-08-01 22:44:37', '2026-08-01 23:13:31'),
(7, 'I Tuwung Kuning', 'Yellow Eggplant', 'Pada zaman dahulu hiduplah seorang gadis cantik bernama I Tuwung Kuning yang terkenal karena kecantikan, kelembutan hati, dan kerajinannya. Ia tinggal bersama ibunya dan selalu membantu pekerjaan rumah setiap hari. Suatu ketika, ibunya pergi ke pasar dan berpesan agar I Tuwung Kuning menjaga rumah dengan baik. Saat ibunya pergi, datanglah seorang raksasa yang menyamar sebagai manusia dan berusaha menculiknya. I Tuwung Kuning berusaha melarikan diri, tetapi akhirnya berhasil ditangkap dan dibawa ke tempat persembunyian raksasa. Mengetahui putrinya menghilang, sang ibu mencari ke berbagai tempat hingga meminta bantuan warga desa. Dengan keberanian dan kerja sama, mereka berhasil menemukan tempat persembunyian raksasa. Setelah terjadi perlawanan, raksasa itu akhirnya dapat dikalahkan dan I Tuwung Kuning berhasil diselamatkan. Ia pun kembali hidup bersama ibunya dengan aman dan bahagia. Kisah I Tuwung Kuning mengajarkan bahwa keberanian, kasih sayang orang tua, serta kerja sama dalam menghadapi kesulitan akan membawa kebaikan dan keselamatan.', 'I Tuwung Kuning\r\nAyah\r\nIbu', '1. Kesalahpahaman.\r\n2. Meninggalkan rumah.\r\n3. Perjuangan.\r\n4. Penyesalan.\r\n5. Pertemuan.', 'Kasih sayang keluarga, kesabaran, kerja keras.', 'Hubungan keluarga merupakan ikatan yang sangat berharga.', 'Bali', 'satua/8WMBBg3QjOKzJR8FzlxBqbU4ESl6MjBeXAFeNYVy.jpg', 'I Tuwung Kuning adalah satua Bali yang menceritakan penyesalan orang tua.', 'disetujui', 3, '2026-08-01 22:46:04', '2026-08-01 23:13:25'),
(8, 'I Belog', 'The Fool', 'Pada zaman dahulu hiduplah seorang pemuda bernama I Belog yang dikenal sangat bodoh, polos, dan selalu bertindak tanpa berpikir panjang. Suatu hari, ketika melewati sebuah kuburan, ia melihat jenazah seorang gadis cantik dan mengira gadis itu masih hidup. Karena tidak mendapat jawaban saat melamarnya, ia menganggap diamnya sebagai tanda setuju, lalu membawa jenazah tersebut pulang dan memperkenalkannya kepada ibunya sebagai istrinya. Setiap hari I Belog memberikan makanan kepada \"istrinya\", padahal makanan itu hanya dimakan oleh kucing yang masuk ke kamar. Beberapa hari kemudian, jenazah itu mulai membusuk dan menimbulkan bau yang sangat menyengat. Ibunya pun membuka kamar dan terkejut mengetahui bahwa yang dibawa I Belog hanyalah mayat. Mereka kemudian membuang jenazah tersebut ke jurang. Namun, karena tubuh ibunya ikut berbau busuk setelah mengangkat jenazah, I Belog mengira ibunya juga telah meninggal. Meskipun ibunya berusaha menjelaskan bahwa dirinya masih hidup, I Belog tidak percaya dan justru membuang ibunya ke jurang. Setelah hidup sendirian, suatu hari I Belog kentut dan mencium bau yang tidak sedap. Ia pun menyimpulkan bahwa dirinya juga sudah mati. Tanpa berpikir panjang, ia pergi ke jurang dan menjatuhkan dirinya sendiri hingga meninggal. Kisah I Belog mengajarkan bahwa kebodohan, kurangnya pengetahuan, dan tindakan yang dilakukan tanpa berpikir dapat membawa petaka bagi diri sendiri maupun orang lain.', 'I Belog\r\nIbu', '1. Nasihat ibu.\r\n2. Salah paham.\r\n3. Kejadian lucu.\r\n4. Belajar.\r\n5. Bijaksana.', 'Pentingnya mendengarkan dengan baik.', 'Kebodohan bukanlah sebuah kesalahan apabila seseorang mau belajar.', 'Bali', 'satua/ONSR8TkMUyVDLoFI7XwxKNyYcJI9CGlUsukN0Bo9.jpg', 'I Belog adalah satua Bali yang menceritakan seorang pemuda yang sangat polos.', 'disetujui', 3, '2026-08-01 22:51:41', '2026-08-01 23:13:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Sci7BxSvUU2xHxJhYpsOCc5Qp2V4YXl3LehP7GSd', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJBMUFsNXVRbVI2VmlYMlYwRFFuRk53Sm5PUkF6TEFPZHZJd0V6aEJkIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDAiLCJyb3V0ZSI6ImhvbWUifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjN9', 1786521177),
('THsuL9D85Cmbbg0FwY0BJBPvlUCaBZku4PKAnTaJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJkUGp1dFNTZE9SZlNpVWx6NVF6ajZ0UjMyS1FCZ3FHWGhkaXZQQXFYIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3JlZ2lzdGVyIiwicm91dGUiOiJyZWdpc3RlciJ9LCJ1cmwiOnsiaW50ZW5kZWQiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYWRtaW5cL3ZlcmlmaWthc2lcL2FydGlrZWwifX0=', 1786500350),
('uVpFMEHQaKIcIeiNKvNNtcqqEVgE2T0SNw51BC9d', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJXMVJFaE9Xbm9nck1KN2dPbUR6TmFhRnI3Qk51VnpJdDNJUENDRXdHIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvcGVuZ2d1bmEiLCJyb3V0ZSI6ImFkbWluLnBlbmdndW5hLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjJ9', 1786505902);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'offset_ajaran_tetua', '0', '2026-08-11 03:24:27', '2026-08-11 03:24:27'),
(2, 'offset_cecimpedan', '0', '2026-08-11 03:24:27', '2026-08-11 03:24:27'),
(3, 'offset_satua_bali', '0', '2026-08-11 03:24:27', '2026-08-11 03:24:27'),
(4, 'offset_istilah_bali', '0', '2026-08-11 03:24:27', '2026-08-11 03:24:27'),
(5, 'offset_kontributor', '5', '2026-08-11 03:24:27', '2026-08-10 19:33:44'),
(6, 'offset_terverifikasi', '0', '2026-08-11 03:24:27', '2026-08-11 03:24:27'),
(7, 'total_ajaran_tetua', '3', '2026-08-10 19:36:16', '2026-08-10 19:57:29'),
(8, 'total_cecimpedan', '4', '2026-08-10 19:36:16', '2026-08-10 19:57:29'),
(9, 'total_satua_bali', '8', '2026-08-10 19:36:16', '2026-08-10 19:36:16'),
(10, 'total_istilah_bali', '3', '2026-08-10 19:36:16', '2026-08-10 19:57:29'),
(11, 'total_kontributor', '15', '2026-08-10 19:36:16', '2026-08-10 19:57:29'),
(12, 'total_terverifikasi', '40', '2026-08-10 19:36:16', '2026-08-11 23:16:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','penulis','pengguna') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pengguna',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `is_verified`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', 'pengguna', 0, '2026-07-31 21:47:37', '$2y$12$vmNOZ0kmnjIKYueVyfDjw.idFuXs0Z0zJkBKeVPK4vavSNhvXPJS2', 'DM9KbwB3Sh', '2026-07-31 21:47:37', '2026-07-31 21:47:37'),
(2, 'Admin ', 'admin@filsafatbali.id', 'admin', 0, NULL, '$2y$12$x77Xcd44HbJP96KpYxL5z.Sz.6n7f1jj6y5d451icRppm4J7bpv5y', 'dMCPmfHauXf9Ej3zW9ohfqlPBxIH63XHuj2rWivNg7XZtdfi5D1KBlzjJeJe', '2026-08-01 05:51:11', '2026-07-31 21:58:07'),
(3, 'Penulis', 'penulis@filsafatbali.id', 'penulis', 1, NULL, '$2y$12$wUVyFyP15Gvbyo0MIqhJ/OR09HU4pJFgJGbc1WywJIeQLdufQd1va', NULL, '2026-08-01 05:51:11', '2026-08-11 23:50:13'),
(4, 'dekagus', 'agusudiyana457@gmail.com', 'pengguna', 0, NULL, '$2y$12$9qTmDMfWc.8pCnyfwzYee.mfjou/lpt2ZsDqpA.pvlgtRPCmAWC0m', NULL, '2026-08-08 18:38:52', '2026-08-08 18:38:52'),
(9, 'bayu', 'putrayasamd80@gmail.com', 'penulis', 0, NULL, '$2y$12$NDiL/WsMkw9cj1TsKuAyb.f0TnPl6DnFeMMu/B3s/A1XvmZX6kOPW', NULL, '2026-08-11 19:56:10', '2026-08-11 19:56:10'),
(13, 'ydfwygd', 'uegdhffefoj@gmail.com', 'penulis', 2, NULL, '$2y$12$c6k1kHS2CnO2i4tZ4I2L9eurXYKFCOt/6fWfwD2aqQscGTdt.CdrS', NULL, '2026-08-11 20:23:53', '2026-08-11 20:59:38'),
(17, 'dehus', 'kadeeed@gmail.com', 'penulis', 0, NULL, '$2y$12$qmOhD/xLCgtnc2W42NPyduOnBTFNQGRteq0Eyd4KCwevk5EOpaKcG', NULL, '2026-08-11 21:09:16', '2026-08-11 21:09:16'),
(18, 'kakek', 'kadekagus2180@gmail.com', 'penulis', 1, NULL, '$2y$12$vyZL5AkTe6CD5vz/rRO0N.kZ5xXjcNVdJFAffuG/Zg/63fsdyW70G', NULL, '2026-08-11 21:09:52', '2026-08-11 23:18:36');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ajaran_tertua`
--
ALTER TABLE `ajaran_tertua`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ajaran_tertua_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ajarans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookmarks_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cecimpedans`
--
ALTER TABLE `cecimpedans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cecimpedans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussions_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `downloads_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indeks untuk tabel `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `filsafat`
--
ALTER TABLE `filsafat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filsafat_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `istilahs`
--
ALTER TABLE `istilahs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `istilahs_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `satuas`
--
ALTER TABLE `satuas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `satuas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ajaran_tertua`
--
ALTER TABLE `ajaran_tertua`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `cecimpedans`
--
ALTER TABLE `cecimpedans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `filsafat`
--
ALTER TABLE `filsafat`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `istilahs`
--
ALTER TABLE `istilahs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `satuas`
--
ALTER TABLE `satuas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ajaran_tertua`
--
ALTER TABLE `ajaran_tertua`
  ADD CONSTRAINT `ajaran_tertua_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `artikels`
--
ALTER TABLE `artikels`
  ADD CONSTRAINT `ajarans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cecimpedans`
--
ALTER TABLE `cecimpedans`
  ADD CONSTRAINT `cecimpedans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `filsafat`
--
ALTER TABLE `filsafat`
  ADD CONSTRAINT `filsafat_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `istilahs`
--
ALTER TABLE `istilahs`
  ADD CONSTRAINT `istilahs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `satuas`
--
ALTER TABLE `satuas`
  ADD CONSTRAINT `satuas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
