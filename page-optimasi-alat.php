<?php
/*
Template Name: Optimasi Alat Laboratorium
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
<?php wp_head(); ?>
</head>
<body <?php body_class( 'page-optimasi-alat' ); ?>>
<?php wp_body_open(); ?>

<nav class="site-header">
  <div class="nav-logo">
    <img src="<?php echo $logo_url; ?>" alt="Labnesia" style="height:44px;width:auto;display:block;">
  </div>
    <div class="nav-links">
    <a href="<?php echo $url_home; ?>">Beranda</a>
    <a href="<?php echo $url_kelas; ?>">Kelas Pendampingan</a>
    <a href="<?php echo $url_inhouse; ?>">Inhouse Training</a>
    <a href="<?php echo $url_pelatihan; ?>">Pelatihan Sertifikasi</a>
    <a href="<?php echo $url_optimasi; ?>">Optimasi Alat</a>
    <a href="<?php echo $url_faq; ?>">FAQ</a>
    <a href="<?php echo $url_gratis; ?>" class="nav-cta">Mulai Gratis</a>
  </div>
</nav>

<!-- HERO -->
<header class="hero" id="optimasi-alat">
  <div class="hero-bg-pattern"></div>
  <div class="hero-glow"></div>
  <div class="hero-inner">
    <div class="eyebrow">🔬 Insight Khusus Pemilik Lab</div>
    <h1>Alat Lab Anda Sudah Ada.<br>Tinggal Dipetakan Jadi <span>Layanan & Income.</span></h1>
    <p class="lede">Setiap jenis laboratorium punya alat dan ruang lingkup yang berbeda — karena itu kebutuhan optimasinya juga berbeda. Pilih jenis lab Anda di bawah, kenali demand khasnya, lalu hubungkan ke jalur program Labnesia yang sudah berjalan.</p>
    <div class="hero-actions">
      <a href="#jenis-lab" class="btn-primary">Pilih Jenis Lab Saya ↓</a>
      <a href="<?php echo $url_gratis; ?>" class="btn-ghost">Mulai dari Gap Analysis Gratis</a>
    </div>

    <div class="funnel">
      <div class="funnel-step">Punya Alat</div><div class="funnel-arrow">→</div>
      <div class="funnel-step">Parameter Uji</div><div class="funnel-arrow">→</div>
      <div class="funnel-step">Produk</div><div class="funnel-arrow">→</div>
      <div class="funnel-step">Layanan</div><div class="funnel-arrow">→</div>
      <div class="funnel-step">Income</div>
      <div class="funnel-note">Alur ini sama untuk semua jenis lab — yang berbeda hanya alat, parameter, dan pasarnya. Detail tiap bidang dibahas tuntas di rangkaian Webinar Nasional Labnesia 2026.</div>
    </div>
  </div>
</header>

<!-- PRINCIPLE BAND -->
<section class="principle">
  <div class="wrap">
    <div>
      <h2>Ini bukan layanan baru — ini cara pandang.</h2>
      <p>"Optimasi Alat" bukan paket atau produk terpisah dari Labnesia. Ini adalah sudut pandang untuk membaca <i>demand</i> tiap jenis laboratorium, yang ujungnya tetap kembali ke jalur yang sama: Gap Analysis, Kelas Pendampingan, hingga akreditasi ISO/IEC 17025.</p>
      <p style="margin-top:14px;">Tujuannya supaya Anda tidak bingung memilih layanan — cukup kenali bidang lab Anda, lihat demand khasnya, lalu masuk ke program yang sudah ada.</p>
    </div>
    <div class="principle-card">
      <div class="row"><div class="ico">⚙️</div><div><b>Instrumen = Aset</b><span>Bukan sekadar barang inventaris, tapi modal layanan.</span></div></div>
      <div class="row"><div class="ico">📋</div><div><b>Parameter = Produk</b><span>Tiap parameter uji yang bisa dijual ke pelanggan.</span></div></div>
      <div class="row"><div class="ico">🏢</div><div><b>Lab = Unit Layanan</b><span>Dikelola dengan sistem mutu, bukan sekadar ruang praktikum.</span></div></div>
      <div class="row"><div class="ico">🧭</div><div><b>Demand = Penentu Jalur</b><span>Jenis lab Anda menentukan parameter, pasar, dan kebutuhan optimasinya.</span></div></div>
    </div>
  </div>
</section>

<!-- LAB GRID -->
<section class="lab-section" id="jenis-lab">
  <div class="wrap">
    <div class="section-head">
      <div class="section-eyebrow">Pilih Bidang Laboratorium Anda</div>
      <h2>Ruang Lingkup & Alat per Jenis Lab</h2>
      <p>Klik salah satu untuk melihat ruang lingkup, contoh alat utama, dan demand optimasi yang biasa muncul di bidang tersebut.</p>
    </div>

    <div class="lab-grid">

      <details class="lab-card" open>
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon">🌱</div>
            <div><div class="lab-title">Lab Lingkungan</div><div class="lab-tagline">Air, udara, tanah & limbah</div></div>
          </div>
          <div class="chevron">▾</div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Air bersih & minum</span><span class="tag">Air limbah</span><span class="tag">Udara ambien</span><span class="tag">Tanah & sedimen</span><span class="tag">Mikrobiologi air</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">pH / DO / Turbidity meter</span><span class="tag alat">Spektrofotometer UV-Vis</span><span class="tag alat">AAS</span><span class="tag alat">GC-MS / HPLC</span><span class="tag alat">Autoclave & Inkubator</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Banyak lab kampus sudah punya alat dasar lingkungan, tapi belum memetakan parameter mana yang bisa dijual ke industri, DLH, atau PDAM sebagai layanan rutin.</p></div>
          <div class="connect-tag">↳ Cocok mulai dari: Gap Analysis Gratis + Kelas Pendampingan</div>
        </div>
      </details>

      <details class="lab-card">
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon">🏗️</div>
            <div><div class="lab-title">Lab Sipil</div><div class="lab-tagline">Material & struktur konstruksi</div></div>
          </div>
          <div class="chevron">▾</div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Beton</span><span class="tag">Tanah</span><span class="tag">Agregat</span><span class="tag">Aspal & hotmix</span><span class="tag">Baja tulangan</span><span class="tag">Paving block</span><span class="tag">Kayu konstruksi</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">Alat uji kuat tekan/tarik</span><span class="tag alat">CBR test set</span><span class="tag alat">Sieve shaker</span><span class="tag alat">Alat uji Marshall</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Demand datang dari proyek konstruksi & kontraktor yang butuh hasil uji material cepat dan diakui — peluang besar untuk lab kampus jadi rujukan uji daerah.</p></div>
          <div class="connect-tag">↳ Cocok mulai dari: Gap Analysis Gratis + Kelas Pendampingan</div>
        </div>
      </details>

      <details class="lab-card">
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon">🍱</div>
            <div><div class="lab-title">Lab Pangan, Gizi & Halal</div><div class="lab-tagline">Mutu, gizi & kehalalan produk</div></div>
          </div>
          <div class="chevron">▾</div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Kandungan gizi</span><span class="tag">Mutu pangan</span><span class="tag">Keamanan pangan</span><span class="tag">Kehalalan produk</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">Instrumen analisis nutrisi</span><span class="tag alat">PCR (deteksi DNA babi)</span><span class="tag alat">AAS (logam berat)</span><span class="tag alat">GC / HPLC (pengawet, gula)</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Industri pangan & UMKM butuh bukti gizi, keamanan, dan sertifikasi halal sebelum produk bisa naik kelas ke pasar yang lebih luas.</p></div>
          <div class="connect-tag">↳ Cocok mulai dari: Gap Analysis Gratis + Kelas Pendampingan</div>
        </div>
      </details>

      <details class="lab-card">
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon">🌾</div>
            <div><div class="lab-title">Lab Pertanian & Pascapanen</div><div class="lab-tagline">Mutu hasil panen & alsintan</div></div>
          </div>
          <div class="chevron">▾</div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Mutu fisik & kimia hasil panen</span><span class="tag">Pupuk</span><span class="tag">Tanah & media tanam</span><span class="tag">Kinerja alat mesin pertanian</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">UV-Vis, HPLC, GC-MS</span><span class="tag alat">AAS / ICP-OES</span><span class="tag alat">Moisture analyzer & NIR</span><span class="tag alat">Sensor uji alsintan (load cell, torque meter)</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Lab pascapanen punya peluang ganda: menjual paket uji mutu produk ke petani/agribisnis, sekaligus menguji performa mesin — bukan cuma sampelnya.</p></div>
          <div class="connect-tag">↳ Cocok mulai dari: Gap Analysis Gratis + Kelas Pendampingan</div>
        </div>
      </details>

      <details class="lab-card">
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon">💊</div>
            <div><div class="lab-title">Lab Farmasi</div><div class="lab-tagline">Mutu & keamanan obat</div></div>
          </div>
          <div class="chevron">▾</div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Bahan baku</span><span class="tag">Produk jadi</span><span class="tag">Uji stabilitas</span><span class="tag">Validasi/verifikasi metode</span><span class="tag">Zat aktif & impuritas</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">AAS / ICP (logam berat)</span><span class="tag alat">HPLC / GC (senyawa organik & zat aktif)</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Industri farmasi & herbal sangat bergantung pada data valid untuk menjamin mutu, keamanan, dan khasiat produk sebelum beredar.</p></div>
          <div class="connect-tag">↳ Cocok mulai dari: Kelas Pendampingan + Kelas Lanjutan</div>
        </div>
      </details>

      <details class="lab-card">
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon">🧪</div>
            <div><div class="lab-title">Lab Kimia</div><div class="lab-tagline">Riset, sintesis & QC industri</div></div>
          </div>
          <div class="chevron">▾</div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Riset & sintesis senyawa</span><span class="tag">QC/QA industri</span><span class="tag">Analisis logam & senyawa organik</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">Instrumen analitik umum</span><span class="tag alat">LIMS (manajemen data uji)</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Lab kimia kampus sering dipakai untuk riset internal saja, padahal berpeluang jadi Tempat Uji Kompetensi dan melayani industri sekitar.</p></div>
          <div class="connect-tag">↳ Cocok mulai dari: Gap Analysis Gratis + Kelas Pendampingan</div>
        </div>
      </details>

      <details class="lab-card">
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon">🐄</div>
            <div><div class="lab-title">Lab Peternakan</div><div class="lab-tagline">Mutu pakan & kesehatan ternak</div></div>
          </div>
          <div class="chevron">▾</div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Mutu pakan (proksimat & energi)</span><span class="tag">Mineral mikro ternak</span><span class="tag">Kontaminasi biologis/kimiawi</span><span class="tag">Residu obat</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">Instrumen analisis proksimat</span><span class="tag alat">Instrumen mineral</span><span class="tag alat">Alat deteksi kontaminan biologis/kimiawi</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Industri pakan dan peternakan butuh kepastian mutu pakan serta jaminan bebas residu sebelum produk ternak beredar ke pasar.</p></div>
          <div class="connect-tag">↳ Cocok mulai dari: Gap Analysis Gratis + Kelas Pendampingan</div>
        </div>
      </details>

      <details class="lab-card">
        <summary>
          <div class="lab-summary-left">
            <div class="lab-icon">🐟</div>
            <div><div class="lab-title">Lab Perikanan</div><div class="lab-tagline">Mutu, ekspor & genetik produk laut</div></div>
          </div>
          <div class="chevron">▾</div>
        </summary>
        <div class="lab-body">
          <div class="lab-row"><b>Ruang Lingkup</b><div class="tag-list">
            <span class="tag">Mikrobiologi (keamanan pangan)</span><span class="tag">Kimia & proksimat</span><span class="tag">Residu & kontaminan (ekspor)</span><span class="tag">Genetik / molekuler (eDNA)</span>
          </div></div>
          <div class="lab-row"><b>Contoh Alat Utama</b><div class="tag-list">
            <span class="tag alat">Nanodrop & RT-/Digital PCR</span><span class="tag alat">MALDI-TOF</span><span class="tag alat">GC-MS / LC-HRMS</span><span class="tag alat">ICP-AES</span>
          </div></div>
          <div class="lab-row"><b>Demand Optimasi Khas</b><p class="demand-text">Ekspor produk perikanan menuntut paket uji lengkap dan status lab acuan resmi — peluang besar untuk lab dengan instrumen canggih tapi utilisasi rendah.</p></div>
          <div class="connect-tag">↳ Cocok mulai dari: Kelas Pendampingan + Kelas Lanjutan</div>
        </div>
      </details>

    </div>

    <div class="coming-soon-grid">
      <div class="coming-card">
        <div class="lab-icon">🧫</div>
        <div><b>Lab Biologi & Mikrobiologi</b><span>Webinar tematik · 4 Juli 2026</span></div>
        <div class="soon-badge">Segera Hadir</div>
      </div>
      <div class="coming-card">
        <div class="lab-icon">📏</div>
        <div><b>Lab Kalibrasi</b><span>Webinar tematik · 11 Juli 2026</span></div>
        <div class="soon-badge">Segera Hadir</div>
      </div>
    </div>
  </div>
</section>

<!-- BRIDGE TO EXISTING PROGRAMS -->
<section class="bridge">
  <div class="wrap">
    <div class="section-head">
      <div class="section-eyebrow" style="color:var(--teal-light)">Bagaimana Ini Terhubung</div>
      <h2>Dari Demand Lab Anda, Kembali ke Jalur yang Sama</h2>
      <p>Apa pun bidang lab Anda, langkahnya tetap mengikuti peta perjalanan akreditasi Labnesia yang sudah berjalan.</p>
    </div>
    <div class="bridge-note">Tidak ada paket "Optimasi Alat" terpisah. Yang berbeda hanya <i>pintu masuknya</i> — disesuaikan dengan ruang lingkup dan alat di bidang lab Anda.</div>

    <div class="stage-grid">
      <div class="stage-card">
        <div class="stage-num">TAHAP 1</div>
        <h3>Kenali Posisi Lab</h3>
        <p>Petakan alat, parameter, dan ruang lingkup yang sudah dimiliki lab Anda saat ini.</p>
        <div class="stage-program">Gap Analysis Gratis</div>
      </div>
      <div class="stage-card">
        <div class="stage-num">TAHAP 2</div>
        <h3>Bangun Sistem & Dokumen</h3>
        <p>Ubah parameter uji dan SOP alat menjadi dokumen mutu serta paket layanan yang siap dijual.</p>
        <div class="stage-program">Kelas Pendampingan</div>
      </div>
      <div class="stage-card">
        <div class="stage-num">TAHAP 3</div>
        <h3>Siap Diaudit</h3>
        <p>Audit kelayakan instrumen, simulasi asesmen, hingga pendaftaran KAN.</p>
        <div class="stage-program">Kelas Lanjutan / Full Pendampingan</div>
      </div>
      <div class="stage-card">
        <div class="stage-num">TAHAP 4</div>
        <h3>Jaga Mutu Tiap Tahun</h3>
        <p>Review berkala kompetensi alat & SDM agar status akreditasi tetap terjaga.</p>
        <div class="stage-program">Annual Partnership</div>
      </div>
    </div>
  </div>
</section>

<!-- CTA STEPS -->
<section class="cta-steps">
  <div class="wrap">
    <div class="section-head">
      <div class="section-eyebrow">Mulai Dari Mana?</div>
      <h2>Tiga Langkah Sederhana</h2>
      <p>Tidak ada tekanan. Mulai dari yang gratis, rasakan manfaatnya, lalu putuskan langkah berikutnya bersama kami.</p>
    </div>
    <div class="steps-grid">
      <div class="cta-card">
        <div class="ico">🎯</div>
        <h4>1. Pilih jenis lab Anda</h4>
        <p>Lihat ruang lingkup & alat khas bidang Anda di daftar di atas, lalu kenali demand optimasinya.</p>
        <a href="#jenis-lab" class="link">Lihat daftar jenis lab →</a>
      </div>
      <div class="cta-card">
        <div class="ico">📋</div>
        <h4>2. Daftar Gap Analysis Gratis</h4>
        <p>Dapatkan laporan gap dokumen & teknis, penetapan ruang lingkup, dan roadmap implementasi.</p>
        <a href="<?php echo $url_gratis; ?>" class="link">Daftar Gap Analysis →</a>
      </div>
      <div class="cta-card">
        <div class="ico">🤝</div>
        <h4>3. Lanjut sesuai roadmap</h4>
        <p>Masuk ke Kelas Pendampingan atau konsultasikan dulu kebutuhan lab Anda bersama tim kami.</p>
        <a href="<?php echo $url_kelas; ?>" class="link">Lihat Kelas Pendampingan →</a>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="site-footer">
  <div class="footer-grid">
    <div class="footer-brand">
      <div class="nav-logo" style="margin-bottom:16px">
        <img src="<?php echo $logo_url; ?>" alt="Labnesia" style="height:44px;width:auto;display:block;">
      </div>
      <p>Membangun SDM Kompeten, Menguatkan Laboratorium Indonesia. Terakreditasi Komite Akreditasi Nasional (KAN).</p>
      <p style="margin-top:16px;font-size:13px;line-height:1.8;">📧 info@labnesia.id<br>📞 +62 821-7222-1567 (Endang)<br>📞 +62 851-8500-0367 (Berryl)<br>📞 +62 811-399-523 (Kintan)<br>📍 labnesia.id</p>
    </div>
    <div class="footer-col">
      <h4>Mulai Gratis</h4>
      <a href="<?php echo $url_gratis; ?>">Gap Analysis Gratis</a>
      <a href="#">Webinar Lab Talk</a>
      <a href="#">Download Panduan</a>
      <a href="#">Komunitas Lab</a>
    </div>
    <div class="footer-col">
      <h4>Program</h4>
      <a href="<?php echo $url_pelatihan; ?>">Pelatihan & Sertifikasi</a>
      <a href="<?php echo $url_kelas; ?>">Kelas Pendampingan</a>
      <a href="<?php echo $url_inhouse; ?>">Full Pendampingan</a>
      <a href="<?php echo $url_optimasi; ?>">Optimasi Alat per Bidang</a>
    </div>
    <div class="footer-col">
      <h4>Tentang</h4>
      <a href="<?php echo $url_faq; ?>">FAQ</a>
      <a href="#">Para Pakar</a>
      <a href="#">Alumni & Testimoni</a>
      <a href="#">Hubungi Kami</a>
    </div>
  </div>
    <div class="footer-bottom">
    <span>&copy; <?php echo date('Y'); ?> Labnesia &middot; Padma Global Nusatama</span>
    <span><a href="https://labnesia.id">labnesia.id</a></span>
  </div>
</footer>

<a href="#konsultasi" class="float-cta">💬 Konsultasi Gratis</a>

<script>
  window.addEventListener('scroll', () => {
    const nav = document.querySelector('nav');
    if (window.scrollY > 50) { nav.style.borderBottomColor = 'rgba(255,255,255,0.12)'; }
    else { nav.style.borderBottomColor = 'rgba(255,255,255,0.08)'; }
  });
</script>

<?php wp_footer(); ?>
</body>
</html>

