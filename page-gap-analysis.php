<?php
/*
Template Name: Gap Analysis
*/
if ( ! defined( 'ABSPATH' ) ) exit;
$url_home      = esc_url( home_url( '/' ) );
$url_kelas     = esc_url( home_url( '/kelas-pendampingan/' ) );
$url_gratis    = esc_url( home_url( '/mulai-gratis/' ) );
$url_faq       = esc_url( home_url( '/faq/' ) );
$url_inhouse   = esc_url( home_url( '/inhouse/' ) );
$url_pelatihan = esc_url( home_url( '/pelatihan-sertifikasi/' ) );
$url_optimasi  = esc_url( home_url( '/optimasi-alat/' ) );
$logo_url      = esc_url( get_template_directory_uri() . '/assets/logo/LOGO-LABNESIA-004.gif' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gap Analysis ISO/IEC 17025 — Labnesia</title>
<?php wp_head(); ?>
</head>
<body <?php body_class('page-gap-analysis'); ?>>
<?php wp_body_open(); ?>

<!-- NAV -->
<header class="site-header" id="site-header">
  <a class="nav-logo" href="<?php echo $url_home; ?>">
    <img src="<?php echo $logo_url; ?>" alt="Labnesia" style="height:44px;width:auto;display:block;">
  </a>
  <nav class="nav-links" id="primary-nav">
    <a href="<?php echo $url_home; ?>">Beranda</a>
    <a href="<?php echo $url_kelas; ?>">Kelas Pendampingan</a>
    <a href="<?php echo $url_inhouse; ?>">Inhouse Training</a>
    <a href="<?php echo $url_pelatihan; ?>">Pelatihan Sertifikasi</a>
    <a href="<?php echo $url_optimasi; ?>">Optimasi Alat</a>
    <a href="<?php echo $url_faq; ?>">FAQ</a>
    <a href="<?php echo $url_gratis; ?>" class="nav-cta">Mulai Gratis</a>
  </nav>
  <button class="nav-toggle" id="nav-toggle" aria-label="Toggle menu">
    <svg viewBox="0 0 24 24"><path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
  </button>
</header>

<!-- HERO -->
<section class="hero">
  <div class="hero-inner">
    <div class="hero-badge"><div class="hero-badge-dot"></div> Audit Internal ISO/IEC 17025</div>
    <h1>Gap Analysis <span>Laboratorium</span><br>ISO/IEC 17025 : 2017</h1>
    <p class="hero-sub">Nilai kesiapan laboratorium Anda secara mandiri. Checklist 138 indikator berdasarkan persyaratan ISO/IEC 17025 — lengkap, terstruktur, dan langsung terkalkulasi.</p>
    <div class="hero-stats">
      <div class="hero-stat"><div class="hero-stat-num">138</div><div class="hero-stat-label">Indikator Penilaian</div></div>
      <div class="hero-stat"><div class="hero-stat-num">5</div><div class="hero-stat-label">Klausul ISO 17025</div></div>
      <div class="hero-stat"><div class="hero-stat-num">0–4</div><div class="hero-stat-label">Skala Skor</div></div>
    </div>
  </div>
</section>

<!-- STICKY SCORE BAR -->
<div class="sticky-score" id="stickyBar">
  <div>
    <div class="sticky-score-label">Total Skor</div>
    <span class="sticky-score-val" id="totalDisplay">0</span>
    <span class="sticky-score-pct">/ 552 (<span id="pctDisplay">0</span>%)</span>
  </div>
  <div class="sticky-progress"><div class="sticky-progress-bar" id="totalBar"></div></div>
  <button class="sticky-score-btn" onclick="showResult()">Lihat Hasil →</button>
</div>

<!-- PANDUAN SKOR -->
<div class="guide-section">
  <div class="guide-inner">
    <div class="guide-title">Panduan Skor Penilaian</div>
    <div class="guide-cards">
      <div class="guide-card s0">
        <div class="guide-score">0</div>
        <div class="guide-label">Belum Ada</div>
        <div class="guide-desc">Sistem tidak ada sama sekali</div>
      </div>
      <div class="guide-card s1">
        <div class="guide-score">1</div>
        <div class="guide-label">Direncanakan</div>
        <div class="guide-desc">Sudah ada rencana untuk memenuhi persyaratan ISO/IEC 17025:2017</div>
      </div>
      <div class="guide-card s2">
        <div class="guide-score">2</div>
        <div class="guide-label">Dikembangkan</div>
        <div class="guide-desc">Sistem sedang dikembangkan untuk memenuhi persyaratan ISO/IEC 17025:2017</div>
      </div>
      <div class="guide-card s3">
        <div class="guide-score">3</div>
        <div class="guide-label">Dilaksanakan</div>
        <div class="guide-desc">Sistem sudah dilaksanakan untuk memenuhi persyaratan ISO/IEC 17025:2017</div>
      </div>
      <div class="guide-card s4">
        <div class="guide-score">4</div>
        <div class="guide-label">Terdokumentasi</div>
        <div class="guide-desc">Sistem sudah didokumentasikan dan diimplementasikan dengan baik</div>
      </div>
    </div>
  </div>
</div>

<!-- FORM -->
<div class="form-wrap">
<form id="gap-form">

<?php
$klausuls = [
  [
    'id' => 'k4', 'num' => '4', 'title' => 'Persyaratan Umum', 'max' => 16,
    'subs' => [
      ['title' => '4.1 Ketidakberpihakan', 'items' => [
        'Laboratorium mengidentifikasi ketidakberpihakan yang dapat mengurangi kepercayaan',
        'Analisa ketidakberpihakan diterapkan dalam kegiatan laboratorium',
      ]],
      ['title' => '4.2 Kerahasiaan', 'items' => [
        'Laboratorium menjaga kerahasiaan informasi milik pelanggan',
        'Dituangkan dalam komitmen berkekuatan hukum dan setiap personel menandatangani',
      ]],
    ]
  ],
  [
    'id' => 'k5', 'num' => '5', 'title' => 'Persyaratan Struktur', 'max' => 76,
    'subs' => [
      ['title' => '5.1 Legalitas Hukum Laboratorium', 'items' => [
        'Laboratorium dapat dipertanggungjawabkan secara legal',
      ]],
      ['title' => '5.2 Manajemen Laboratorium', 'items' => [
        'Terdapat manajemen yang sesuai dengan tugas dan fungsinya untuk mengoperasikan kegiatan laboratorium',
        'Manajemen dan personil teknis mempunyai kewenangan dan sumber daya yang diperlukan untuk melaksanakan tugas',
      ]],
      ['title' => '5.3 & 5.4 Ruang Lingkup Kegiatan Laboratorium', 'items' => [
        'Sebagai laboratorium pihak ke-3 yang memberikan layanan komersial',
        'Sebagai laboratorium pihak ke-1 yang menjalankan tugas pengujian sampel milik organisasi induk',
        'Sebagai laboratorium yang melakukan kegiatan pengujian sebagai bagian dari sertifikasi produk',
        'Laboratorium melaksanakan kegiatan pengujian sesuai dengan persyaratan dalam ISO/IEC 17025 dan memenuhi kebutuhan pelanggan serta regulator',
      ]],
      ['title' => '5.5 Struktur Organisasi', 'items' => [
        'Struktur organisasi mendefinisikan hubungan semua fungsi (manajemen puncak, pekerjaan teknis, manajer mutu)',
        'Tanggung jawab dan kewenangan semua personel yang mengelola, melaksanakan atau memverifikasi pekerjaan telah ditentukan',
        'Penyeliaan yang memadai untuk personel yang melaksanakan kegiatan pengujian',
        'Personel menyadari relevansi dan pentingnya kegiatan mereka serta berkontribusi dalam pencapaian tujuan sistem manajemen',
        'Menetapkan manajemen teknis yang sepenuhnya bertanggung jawab atas pelaksanaan teknis',
      ]],
      ['title' => '5.6 Tanggung Jawab Pengelolaan Sistem Manajemen', 'items' => [
        'Menunjuk seorang staf sebagai manajer mutu yang bertanggung jawab atas implementasi dan penerapan sistem manajemen mutu',
      ]],
      ['title' => '5.7 Efektifitas dan Integritas Sistem Manajemen', 'items' => [
        'Proses komunikasi yang tepat ditetapkan dalam laboratorium dan komunikasi memegang peranan dalam sistem manajemen',
        'Penunjukan staf untuk menggantikan personel manajerial inti jika berhalangan',
      ]],
    ]
  ],
  [
    'id' => 'k6', 'num' => '6', 'title' => 'Persyaratan Sumber Daya', 'max' => 136,
    'subs' => [
      ['title' => '6.2 Personel', 'items' => [
        'Laboratorium menetapkan persyaratan kompetensi personel sesuai pendidikan, pelatihan, keterampilan dan pengalaman',
        'Laboratorium mengkomunikasikan tugas, tanggung jawab dan wewenang personel',
        'Laboratorium memprogramkan Training/Pelatihan Personel sesuai kebutuhan',
        'Laboratorium melakukan supervisi personel',
        'Laboratorium memberikan kewenangan personel untuk melakukan pekerjaan pengujian (pembuatan lap validasi, ketidakpastian, jaminan mutu, interpretasi hasil uji)',
        'Laboratorium melakukan pemantauan kompetensi personel',
      ]],
      ['title' => '6.3 Fasilitas dan Kondisi Lingkungan', 'items' => [
        'Laboratorium melakukan identifikasi ruang',
        'Persyaratan teknis untuk akomodasi dan lingkungan ditetapkan',
        'Melakukan pemantauan, pengendalian dan perekaman kondisi lingkungan di tempat yang diperlukan',
        'Akses ke ruangan laboratorium dibatasi, dipantau atau dikendalikan',
        'Pemisah yang efektif antara ruang yang berdampingan bila ada kegiatan yang tidak sesuai',
      ]],
      ['title' => '6.4 Peralatan', 'items' => [
        'Laboratorium dilengkapi dengan semua peralatan yang diperlukan',
        'Peralatan dioperasikan oleh personel yang berwenang',
        'Peralatan diidentifikasi secara unik, diberi kode',
        'Rekaman peralatan dipelihara',
        'Laboratorium mempunyai prosedur penanganan yang aman, transportasi, penyimpanan, penggunaan dan perawatan peralatan ukur',
        'Peralatan yang mengalami pembebanan berlebih atau tidak berfungsi dengan baik ditarik dari penggunaannya',
        'Program kalibrasi ditetapkan untuk peralatan yang berpengaruh signifikan pada hasil pengujian',
        'Peralatan diidentifikasi status kalibrasi',
        'Peralatan di luar pengendalian langsung dipastikan fungsi dan statusnya',
        'Pengecekan antara dilakukan sesuai dengan prosedur',
        'Peralatan pengujian dijaga keamanannya dari penyetelan yang akan mengakibatkan ketidakabsahan hasil pengujian',
      ]],
      ['title' => '6.5 Ketertelusuran Metrologi', 'items' => [
        'Mempunyai program kalibrasi bagi peralatan ukurnya',
        'Pelaksanaan kalibrasi oleh Laboratorium Kalibrasi Terakreditasi (dibuktikan sertifikat dan ruang lingkup)',
        'Mempunyai daftar bahan acuan / reference material',
        'CRM dikeluarkan oleh lembaga berwenang (dibuktikan sertifikat CRM)',
        'Bahan acuan yang dibuat sendiri / IRM didukung data statistik pembuatan material',
      ]],
      ['title' => '6.6 Produk dan Jasa Dari Penyedia Eksternal', 'items' => [
        'Laboratorium mempunyai alasan atas pekerjaan yang disubkontrakkan (beban kerja, keahlian, dll)',
        'Laboratorium memberitahu pelanggan secara tertulis dan memperoleh persetujuan tertulis dari pelanggan',
        'Laboratorium bertanggungjawab kepada pelanggan atas pekerjaan yang disubkontrakkan',
        'Laboratorium memelihara daftar sub kontraktor',
        'Laboratorium mempunyai prosedur pembelian, penerimaan, penyimpanan produk dan jasa yang relevan dengan pengujian',
        'Laboratorium menyimpan rekaman verifikasi kesesuaian perlengkapan, pereaksi dan barang habis pakai dengan spesifikasi standar',
        'Laboratorium melakukan evaluasi pemasok bahan habis pakai, produk dan jasa',
      ]],
    ]
  ],
  [
    'id' => 'k7', 'num' => '7', 'title' => 'Persyaratan Proses', 'max' => 216,
    'subs' => [
      ['title' => '7.1 Kaji Ulang Permintaan, Tender dan Kontrak', 'items' => [
        'Laboratorium mempunyai prosedur kaji ulang permintaan, tender dan kontrak',
        'Laboratorium mempunyai rekaman kaji ulang permintaan, tender dan kontrak',
        'Laboratorium melakukan kaji ulang pekerjaan yang disubkontrakkan',
        'Laboratorium menyediakan akses ke pelanggan untuk menyaksikan pengujian',
      ]],
      ['title' => '7.2 Pemilihan, Verifikasi, dan Validasi Metode', 'items' => [
        'Laboratorium menggunakan metode yang sesuai untuk semua pengujian',
        'Laboratorium menggunakan metode standar yang dipublikasikan secara nasional/internasional',
        'Metode standar yang digunakan merupakan standar terbaru dan selalu diupdate',
        'Metode yang digunakan tersedia dan mudah dijangkau personel',
        'Laboratorium melaksanakan validasi/verifikasi metode sesuai ruang lingkup',
      ]],
      ['title' => '7.3 Pengambilan Contoh', 'items' => [
        'Laboratorium mempunyai rencana dan metode pengambilan sampel',
        'Rekaman data kegiatan pengambilan sampel dipelihara',
        'Laboratorium mempunyai data PPC dan rekaman kompetensinya',
        'PPC telah mengikuti pelatihan pengambilan contoh dan selalu dipelihara kompetensinya',
        'Pengambilan contoh dilakukan minimal 2 orang untuk menjaga ketidakberpihakan',
      ]],
      ['title' => '7.4 Penanganan Barang Atau Bahan Yang Diuji', 'items' => [
        'Laboratorium memiliki prosedur penanganan, perlindungan, penyimpanan dan pemusnahan barang yang diuji',
        'Laboratorium mempunyai sistem untuk mengidentifikasi barang yang diuji',
        'Laboratorium merekam keabnormalan atau penyimpangan barang yang akan diuji kepada pelanggan',
        'Laboratorium memiliki prosedur dan fasilitas untuk menghindari deteriorasi',
      ]],
      ['title' => '7.5 Rekaman Teknis', 'items' => [
        'Laboratorium mempunyai prosedur penyimpanan rekaman teknis',
        'Laboratorium mampu menunjukkan ketertelusuran rekaman teknis dari penerimaan sampel sampai menjadi hasil uji',
        'Setiap perubahan yang dilakukan terhadap rekaman: data asli tidak dikaburkan, data benar dituliskan di sampingnya, penggantian disahkan dengan paraf',
      ]],
      ['title' => '7.6 Evaluasi Ketidakpastian Pengukuran', 'items' => [
        'Laboratorium mempunyai prosedur estimasi ketidakpastian pengukuran',
        'Laboratorium melaksanakan perhitungan ketidakpastian untuk semua pengujian dengan hasil empiris',
        'Laboratorium melakukan evaluasi ketidakpastian bila: alat di-rekalibrasi, metode pengujian berubah, atau kondisi lingkungan berubah',
      ]],
      ['title' => '7.7 Jaminan Mutu Hasil Pengujian', 'items' => [
        'Laboratorium mempunyai prosedur jaminan mutu internal',
        'Laboratorium mempunyai bukti rekaman jaminan mutu internal',
        '(a) Laboratorium menggunakan Bahan Acuan Atau Bahan Kendali Mutu',
        '(b) Instrumentasi Tertelusur Secara Metrologis',
        '(c) Cek Fungsional Pengukuran Dan Pengujian Peralatan',
        '(d) Laboratorium menggunakan Control Chart',
        '(e) Pemeriksaan Antara Secara Periodik',
        '(f) Replikat Pengujian',
        '(g) Pengujian Ulang Sample Arsip (Retain Item)',
        '(h) Korelasi Hasil Untuk Karakteristik Yang Berbeda',
        '(i) Kaji Ulang Hasil Yang Dilaporkan',
        '(j) Perbandingan Intralaboratorium',
        '(k) Uji Sample Buta',
        'Partisipasi dalam uji profisiensi atau uji banding sesuai ruang lingkup pengujian',
        'Apabila hasil uji profisiensi "Outlier" maka Laboratorium melaksanakan investigasi',
      ]],
      ['title' => '7.8 Pelaporan Hasil', 'items' => [
        'Hasil pengujian dilaporkan secara akurat, jelas, tidak meragukan dan obyektif',
        'Hasil pengujian yang dilakukan subkontraktor diberi identitas yang jelas',
        'Amandemen laporan pengujian dibuat dalam bentuk dokumen susulan',
      ]],
      ['title' => '7.9 Pengaduan', 'items' => [
        'Laboratorium mempunyai prosedur untuk menyelesaikan pengaduan yang diterima dari pelanggan',
        'Tersedia formulir pengaduan untuk pelanggan dan mudah diakses',
        'Laboratorium memelihara rekaman pengaduan dan penyelidikan serta tindakan perbaikan',
        'Tindakan akhir pengaduan diberitahukan kepada pelanggan',
      ]],
      ['title' => '7.10 Pekerjaan Yang Tidak Sesuai', 'items' => [
        'Laboratorium mempunyai prosedur untuk pekerjaan yang tidak sesuai',
        'Laboratorium memelihara rekaman pekerjaan tidak sesuai',
        'Laboratorium melakukan evaluasi pekerjaan yang tidak sesuai',
      ]],
      ['title' => '7.11 Pengendalian Data dan Manajemen Informasi', 'items' => [
        'Laboratorium menetapkan kebijakan dan prosedur berkaitan dengan kerahasiaan pelanggan, termasuk penyimpanan dan penyampaian hasil secara elektronik',
        'Komputer atau peralatan otomatis yang digunakan divalidasi dan dipelihara untuk menjamin kelayakan fungsinya',
        'Akses data dan informasi dilindungi dari pengguna yang tidak sah',
        'Penyimpanan data dan informasi terjaga integritasnya, terhindar dari kehilangan, kerusakan dan gangguan',
        'Perhitungan dan pemindahan data diperiksa dengan cara yang sistematik',
      ]],
    ]
  ],
  [
    'id' => 'k8', 'num' => '8', 'title' => 'Persyaratan Sistem Manajemen', 'max' => 124,
    'subs' => [
      ['title' => '8.2 Dokumentasi Sistem Manajemen', 'items' => [
        'Laboratorium menetapkan dan mensosialisasikan kebijakan mutu dan sasaran mutu laboratorium',
        'Kebijakan mutu memuat kompetensi, ketidakberpihakan dan kerja profesional dalam operasional',
        'Komitmen manajemen puncak untuk memelihara dan meningkatkan efektifitas SMM laboratorium',
        'Laboratorium menetapkan dokumentasi sistem manajemen (kebijakan, prosedur, instruksi kerja dan formulir)',
        'Standar yang terkait dengan kegiatan laboratorium telah dirujuk ke dokumen sistem mutu',
        'Laboratorium menetapkan program kerja ISO 17025',
        'Semua personel mudah mengakses dokumen terkait semua pekerjaan mereka',
      ]],
      ['title' => '8.3 Pengendalian Dokumen Sistem Manajemen', 'items' => [
        'Laboratorium mengendalikan semua dokumen (internal dan eksternal)',
        'Dokumen dikaji ulang dan disahkan oleh personel yang berwenang sebelum diterbitkan',
        'Dokumen sistem mutu diidentifikasi secara unik',
        'Perubahan dokumen dikaji ulang dan disahkan oleh fungsi yang sama',
        'Mempunyai prosedur pengendalian perubahan dokumen yang disimpan dalam sistem komputer',
      ]],
      ['title' => '8.4 Rekaman Mutu', 'items' => [
        'Laboratorium menetapkan dan memelihara prosedur rekaman mutu (identifikasi, indeks, pengaksesan, pemeliharaan, waktu penyimpanan, pemusnahan)',
        'Rekaman mutu telah diidentifikasi, back up, disimpan dalam waktu tertentu',
        'Rekaman mutu harus jelas, mudah didapat, dipelihara pada lingkungan yang sesuai, dijaga keamanan dan kerahasiaannya',
      ]],
      ['title' => '8.5 Tindakan Terhadap Risiko dan Peluang', 'items' => [
        'Mengidentifikasi risiko dan peluang serta membuat analisanya',
        'Laboratorium melaksanakan tindakan mengatasi risiko dan peluang',
        'Bila analisa risiko telah ditetapkan, pastikan telah diterapkan dan dimonitor efektifitasnya',
      ]],
      ['title' => '8.6 Peningkatan', 'items' => [
        'Laboratorium melakukan langkah untuk mencegah pekerjaan tidak sesuai terulang kembali',
        'Laboratorium melakukan pengukuran umpan balik pelanggan',
        'Umpan balik pelanggan dijadikan sarana meningkatkan efektivitas sistem manajemen secara berkelanjutan',
      ]],
      ['title' => '8.7 Tindakan Perbaikan', 'items' => [
        'Laboratorium melakukan langkah untuk mengatasi pekerjaan tidak sesuai',
        'Rekaman tindakan perbaikan yang dilakukan dipelihara',
      ]],
      ['title' => '8.8 Audit Internal', 'items' => [
        'Laboratorium melakukan internal audit sesuai dengan jadwal yang ditetapkan',
        'Audit internal dilakukan oleh personel yang kompeten',
        'Laboratorium menetapkan kriteria dan lingkup audit',
        'Laboratorium melakukan verifikasi tindak lanjut hasil audit internal',
        'Laboratorium memelihara rekaman audit internal',
      ]],
      ['title' => '8.9 Kaji Ulang Manajemen', 'items' => [
        'Laboratorium melakukan kaji ulang manajemen secara periodik',
        'Materi pembahasan meliputi 15 unsur sesuai persyaratan',
        'Laboratorium memelihara rekaman kaji ulang dan melakukan verifikasi',
      ]],
    ]
  ],
];

$qNum = 1;
foreach ($klausuls as $k) :
?>
<div class="klausul" id="<?php echo $k['id']; ?>">
  <div class="klausul-header">
    <div>
      <div class="klausul-title">Klausul <?php echo $k['num']; ?> — <?php echo $k['title']; ?></div>
      <div class="klausul-score-display" id="<?php echo $k['id']; ?>_display">Skor: 0 / <?php echo $k['max']; ?></div>
    </div>
    <div class="klausul-badge">Klausul <?php echo $k['num']; ?></div>
  </div>

  <?php foreach ($k['subs'] as $sub) : ?>
  <div class="sub-klausul">
    <div class="sub-header"><?php echo $sub['title']; ?></div>
    <?php foreach ($sub['items'] as $item) : $qId = 'q' . $qNum; ?>
    <div class="item-row">
      <div class="item-num"><?php echo $qNum; ?></div>
      <div class="item-text"><?php echo htmlspecialchars($item); ?></div>
      <div class="score-radios">
        <?php for ($s = 0; $s <= 4; $s++) : ?>
        <label>
          <input type="radio" name="<?php echo $qId; ?>" value="<?php echo $s; ?>" data-klausul="<?php echo $k['id']; ?>" onchange="updateScores()">
          <div class="score-btn s<?php echo $s; ?>"><?php echo $s; ?></div>
        </label>
        <?php endfor; ?>
      </div>
    </div>
    <?php $qNum++; endforeach; ?>
  </div>
  <?php endforeach; ?>

  <div class="klausul-footer">
    <span class="kf-label">Skor Klausul <?php echo $k['num']; ?></span>
    <div class="kf-bar"><div class="kf-bar-fill" id="<?php echo $k['id']; ?>_bar"></div></div>
    <span class="kf-score" id="<?php echo $k['id']; ?>_score">0</span>
    <span class="kf-max">&nbsp;/ <?php echo $k['max']; ?></span>
  </div>
</div>
<?php endforeach; ?>

<!-- RESULT SECTION -->
<div class="result-section" id="resultSection">
  <div class="result-title">📊 Hasil Gap Analysis Laboratorium Anda</div>
  <div class="result-grid">
    <div class="result-card">
      <div class="result-card-label">Klausul 4 — Persyaratan Umum</div>
      <div><span class="result-card-score" id="r_k4">0</span><span class="result-card-max"> / 16</span></div>
      <div class="result-card-bar"><div class="result-card-fill" id="rb_k4" style="max-width:100%;width:0%"></div></div>
    </div>
    <div class="result-card">
      <div class="result-card-label">Klausul 5 — Persyaratan Struktur</div>
      <div><span class="result-card-score" id="r_k5">0</span><span class="result-card-max"> / 76</span></div>
      <div class="result-card-bar"><div class="result-card-fill" id="rb_k5" style="max-width:100%;width:0%"></div></div>
    </div>
    <div class="result-card">
      <div class="result-card-label">Klausul 6 — Persyaratan Sumber Daya</div>
      <div><span class="result-card-score" id="r_k6">0</span><span class="result-card-max"> / 136</span></div>
      <div class="result-card-bar"><div class="result-card-fill" id="rb_k6" style="max-width:100%;width:0%"></div></div>
    </div>
    <div class="result-card">
      <div class="result-card-label">Klausul 7 — Persyaratan Proses</div>
      <div><span class="result-card-score" id="r_k7">0</span><span class="result-card-max"> / 216</span></div>
      <div class="result-card-bar"><div class="result-card-fill" id="rb_k7" style="max-width:100%;width:0%"></div></div>
    </div>
    <div class="result-card">
      <div class="result-card-label">Klausul 8 — Persyaratan Sistem Manajemen</div>
      <div><span class="result-card-score" id="r_k8">0</span><span class="result-card-max"> / 124</span></div>
      <div class="result-card-bar"><div class="result-card-fill" id="rb_k8" style="max-width:100%;width:0%"></div></div>
    </div>
  </div>
  <div class="result-total">
    <div class="result-total-num"><span id="r_total">0</span> / 552</div>
    <div class="result-total-label">Grand Total · <span id="r_pct">0</span>% Kesiapan Laboratorium</div>
  </div>
  <div class="result-interpretation" id="r_interp"></div>
  <div class="result-actions">
    <a href="#" class="btn-wa" id="wa_link" target="_blank" rel="noopener">
      💬 Konsultasi via WhatsApp
    </a>
    <a href="<?php echo $url_kelas; ?>" class="btn-konsul">📋 Lihat Program Pendampingan →</a>
  </div>
</div>

<!-- SUBMIT -->
<div class="submit-area">
  <button type="button" class="btn-hitung" onclick="showResult()">Hitung Skor & Lihat Hasil →</button>
  <div class="submit-note">Isi semua item untuk hasil yang akurat. Tidak perlu membuat akun.</div>
</div>

</form>
</div><!-- /form-wrap -->

<!-- FOOTER -->
<footer class="site-footer">
  <div class="footer-inner" style="max-width:1100px;margin:0 auto;padding:40px 48px;display:grid;grid-template-columns:2fr 1fr 1fr;gap:48px">
    <div>
      <img src="<?php echo $logo_url; ?>" alt="Labnesia" style="height:44px;width:auto;display:block;margin-bottom:16px;">
      <p style="color:rgba(255,255,255,0.5);font-size:14px;line-height:1.7;max-width:300px;">Membangun SDM Kompeten, Menguatkan Laboratorium Indonesia. Terakreditasi KAN.</p>
    </div>
    <div>
      <div style="color:rgba(255,255,255,0.3);font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;margin-bottom:16px;">Program</div>
      <div style="display:flex;flex-direction:column;gap:10px;">
        <a href="<?php echo $url_kelas; ?>" style="color:rgba(255,255,255,0.6);font-size:14px;">Kelas Pendampingan</a>
        <a href="<?php echo $url_inhouse; ?>" style="color:rgba(255,255,255,0.6);font-size:14px;">Inhouse Training</a>
        <a href="<?php echo $url_pelatihan; ?>" style="color:rgba(255,255,255,0.6);font-size:14px;">Pelatihan &amp; Sertifikasi</a>
        <a href="<?php echo $url_optimasi; ?>" style="color:rgba(255,255,255,0.6);font-size:14px;">Optimasi Alat Lab</a>
        <a href="<?php echo $url_faq; ?>" style="color:rgba(255,255,255,0.6);font-size:14px;">FAQ &amp; Perbandingan</a>
      </div>
    </div>
    <div>
      <div style="color:rgba(255,255,255,0.3);font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;margin-bottom:16px;">Kontak</div>
      <div style="color:rgba(255,255,255,0.6);font-size:14px;line-height:2;">
        📧 info@labnesia.id<br>
        📞 +62 821-7222-1567<br>
        📞 +62 851-8500-0367<br>
        📍 labnesia.id
      </div>
    </div>
  </div>
  <div style="border-top:1px solid rgba(255,255,255,0.08);padding:20px 48px;max-width:1100px;margin:0 auto;display:flex;justify-content:space-between;font-size:12px;color:rgba(255,255,255,0.3);">
    <span>&copy; <?php echo date('Y'); ?> Labnesia &middot; Padma Global Nusatama</span>
    <a href="https://labnesia.id" style="color:rgba(255,255,255,0.3);">labnesia.id</a>
  </div>
</footer>

<script>
const MAX = {k4:16, k5:76, k6:136, k7:216, k8:124};
const GRAND_MAX = 552;

function getKlausulScore(kid) {
  var total = 0;
  var inputs = document.querySelectorAll('input[data-klausul="'+kid+'"]:checked');
  inputs.forEach(function(i){ total += parseInt(i.value); });
  return total;
}

function updateScores() {
  var grand = 0;
  ['k4','k5','k6','k7','k8'].forEach(function(kid) {
    var s = getKlausulScore(kid);
    grand += s;
    var max = MAX[kid];
    var pct = max > 0 ? (s/max*100) : 0;
    var el = document.getElementById(kid+'_score');
    var bar = document.getElementById(kid+'_bar');
    var disp = document.getElementById(kid+'_display');
    if (el) el.textContent = s;
    if (bar) bar.style.width = pct+'%';
    if (disp) disp.textContent = 'Skor: '+s+' / '+max;
  });
  var pct = Math.round(grand / GRAND_MAX * 100);
  document.getElementById('totalDisplay').textContent = grand;
  document.getElementById('pctDisplay').textContent = pct;
  document.getElementById('totalBar').style.width = pct+'%';
}

function showResult() {
  updateScores();
  var grand = 0;
  ['k4','k5','k6','k7','k8'].forEach(function(kid) {
    var s = getKlausulScore(kid);
    grand += s;
    var max = MAX[kid];
    var num = kid.replace('k','');
    var re = document.getElementById('r_k'+num);
    var rb = document.getElementById('rb_k'+num);
    if (re) re.textContent = s;
    if (rb) rb.style.width = (s/max*100)+'%';
  });
  var pct = Math.round(grand / GRAND_MAX * 100);
  document.getElementById('r_total').textContent = grand;
  document.getElementById('r_pct').textContent = pct;

  var interp = document.getElementById('r_interp');
  if (pct < 30) {
    interp.className = 'result-interpretation low';
    interp.innerHTML = '⚠️ Skor di bawah 30% — Laboratorium memerlukan pendampingan menyeluruh. Sistem manajemen belum terbentuk dengan baik. Rekomendasi: Kelas Pendampingan Akreditasi Labnesia.';
  } else if (pct < 60) {
    interp.className = 'result-interpretation mid';
    interp.innerHTML = '🔶 Skor 30–60% — Sistem sudah mulai dibangun namun perlu optimasi signifikan. Rekomendasi: Inhouse Training atau Kelas Pendampingan untuk mempercepat kesiapan audit.';
  } else {
    interp.className = 'result-interpretation high';
    interp.innerHTML = '✅ Skor di atas 60% — Laboratorium dalam kondisi cukup siap menuju asesmen KAN. Rekomendasi: Lakukan audit internal final dan konsultasi dengan pakar Labnesia.';
  }

  var msg = encodeURIComponent(
    'Halo Labnesia, saya telah mengisi Gap Analysis ISO/IEC 17025.\n\n'+
    'Hasil skor:\n'+
    '• Klausul 4: '+getKlausulScore('k4')+'/16\n'+
    '• Klausul 5: '+getKlausulScore('k5')+'/76\n'+
    '• Klausul 6: '+getKlausulScore('k6')+'/136\n'+
    '• Klausul 7: '+getKlausulScore('k7')+'/216\n'+
    '• Klausul 8: '+getKlausulScore('k8')+'/124\n'+
    '• Grand Total: '+grand+'/552 ('+pct+'%)\n\n'+
    'Saya ingin berkonsultasi lebih lanjut tentang program pendampingan akreditasi.'
  );
  document.getElementById('wa_link').href = 'https://wa.me/6282172221567?text='+msg;

  var rs = document.getElementById('resultSection');
  rs.classList.add('show');
  setTimeout(function(){ rs.scrollIntoView({behavior:'smooth', block:'start'}); }, 100);
}
</script>

<?php wp_footer(); ?>
</body>
</html>

