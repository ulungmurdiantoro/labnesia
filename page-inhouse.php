<?php
/*
Template Name: Inhouse Training
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
<body <?php body_class( 'page-inhouse' ); ?>>
<?php wp_body_open(); ?>

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

<div class="page-hero">
  <div class="page-hero-inner">
    <div class="breadcrumb">
      <a href="<?php echo $url_home; ?>">Beranda</a>
      <span class="breadcrumb-sep">›</span>
      <span class="breadcrumb-cur">In House Training &amp; Pendampingan Private</span>
    </div>
    <div class="page-eyebrow"><div class="page-eyebrow-dot"></div> Untuk Institusi &amp; Laboratorium</div>
    <h1>Solusi Privat untuk<br>Lab Anda — <span class="accent">Membangun</span> atau <span class="accent">Menjaga</span>.</h1>
    <p class="page-hero-sub">Dua kebutuhan yang berbeda, dua solusi yang tepat. Lab yang belum terakreditasi butuh dibangun sistemnya. Lab yang sudah terakreditasi butuh dijaga statusnya.</p>
  </div>
</div>

<!-- SPLIT SELECTOR -->
<div class="split-section">
  <div class="split-inner">
    <div class="split-vs">ATAU</div>
    <a href="#bangun" class="split-card left" style="text-decoration:none;color:white">
      <div class="split-eyebrow">Belum Terakreditasi</div>
      <div class="split-title">Full Pendampingan<br>(In House)</div>
      <div class="split-desc">Lab Anda belum punya sistem mutu sama sekali, atau prosesnya berhenti di tengah jalan. Kami bangun dari nol hingga siap akreditasi.</div>
      <div class="split-for">🎯 Tujuan: <strong>Mendapatkan</strong> akreditasi</div>
      <span class="split-arrow-link">Lihat paket Full Pendampingan ↓</span>
    </a>
    <a href="#jaga" class="split-card right" style="text-decoration:none;color:white">
      <div class="split-eyebrow">Sudah Terakreditasi</div>
      <div class="split-title">Annual Partnership<br>(Kemitraan Tahunan)</div>
      <div class="split-desc">Lab Anda sudah terakreditasi, tapi perlu mempertahankan status setiap tahun dan menjaga kompetensi SDM yang terus berganti.</div>
      <div class="split-for">🛡️ Tujuan: <strong>Mempertahankan</strong> akreditasi</div>
      <span class="split-arrow-link">Lihat paket Annual Partnership ↓</span>
    </a>
  </div>
</div>

<!-- SECTION A: FULL PENDAMPINGAN -->
<section class="section-anchor" id="bangun">
  <div class="section-inner">
    <span class="section-tag-blue">🏗️ Untuk Lab yang Belum Terakreditasi</span>
    <h2 class="h2">Full Pendampingan (In House)<br>— Privat, Dari Nol hingga Akreditasi.</h2>
    <p class="body-text" style="max-width:620px">Bimbingan langsung dari tim ahli untuk membangun atau menyempurnakan sistem manajemen laboratorium — ISO/IEC 17025:2017, GLP, ISO 9001, ISO 45001 (K3), ISO 14001 (Lingkungan). Dilakukan privat, khusus untuk lab Anda, di lokasi Anda.</p>

    <div class="package-grid">
      <div class="package-card">
        <div class="package-header">
          <div class="package-eyebrow">Tahap 5 Saja · Privat</div>
          <div class="package-name">Kelas Lanjutan Privat</div>
          <div class="package-price">Rp 36 jt <span class="package-unit">/lab</span></div>
        </div>
        <div class="package-body">
          <div class="package-feature"><div class="pf-check">✓</div><div class="pf-text">Untuk lab yang sudah selesai Tahap 1–4 (Kelas Pendampingan publik)</div></div>
          <div class="package-feature"><div class="pf-check">✓</div><div class="pf-text">Pendampingan pendaftaran akreditasi</div></div>
          <div class="package-feature"><div class="pf-check">✓</div><div class="pf-text">Pendampingan audit kelayakan</div></div>
          <div class="package-feature"><div class="pf-check">✓</div><div class="pf-text">Persiapan &amp; simulasi asesmen</div></div>
          <div class="package-hok"><div class="hok-label">Output</div><div class="hok-val">Siap Asesmen</div></div>
        </div>
      </div>

      <div class="package-card featured">
        <div class="package-header featured-h">
          <div class="package-badge">★ Lengkap</div>
          <div class="package-eyebrow">Tahap 1–5 · Privat Penuh</div>
          <div class="package-name">Full Pendampingan</div>
          <div class="package-price">Rp 150–200 jt <span class="package-unit">/lab</span></div>
        </div>
        <div class="package-body">
          <div class="package-feature"><div class="pf-check">✓</div><div class="pf-text">Diagnosis awal hingga pendaftaran akreditasi — seluruh tahap</div></div>
          <div class="package-feature"><div class="pf-check">✓</div><div class="pf-text">Dipandu langsung oleh tim pakar berpengalaman</div></div>
          <div class="package-feature"><div class="pf-check">✓</div><div class="pf-text">Penguatan sistem manajemen &amp; kompetensi teknis</div></div>
          <div class="package-feature"><div class="pf-check">✓</div><div class="pf-text">Audit internal &amp; evaluasi manajemen lengkap</div></div>
          <div class="package-feature"><div class="pf-check">✓</div><div class="pf-text">Free akses webinar &amp; bootcamp sepanjang tahun</div></div>
          <div class="package-hok"><div class="hok-label">Output</div><div class="hok-val">Siap Akreditasi Penuh</div></div>
        </div>
      </div>

      <div class="package-card">
        <div class="package-header">
          <div class="package-eyebrow">Per Tema · Modular</div>
          <div class="package-name">IHT Tematik</div>
          <div class="package-price">Mulai 12,5 jt <span class="package-unit">/tema</span></div>
        </div>
        <div class="package-body">
          <div class="package-feature"><div class="pf-check">✓</div><div class="pf-text">Pilih tema spesifik sesuai kebutuhan: GLP, ISO 9001, ISO 45001, ISO 14001</div></div>
          <div class="package-feature"><div class="pf-check">✓</div><div class="pf-text">Cocok untuk lab yang sudah maju di sebagian sistem</div></div>
          <div class="package-feature"><div class="pf-check">✓</div><div class="pf-text">Bisa dikombinasikan dengan beberapa tema sekaligus</div></div>
          <div class="package-feature"><div class="pf-check">✓</div><div class="pf-text">Fleksibel sesuai HOK (Hari Orang Kerja) yang dibutuhkan</div></div>
          <div class="package-hok"><div class="hok-label">Estimasi</div><div class="hok-val">2–5 HOK/tema</div></div>
        </div>
      </div>
    </div>

    <table class="comp-mini-table">
      <thead>
        <tr><th>Aspek</th><th>Kelas Lanjutan</th><th class="comp-highlight">Full Pendampingan ★</th><th>IHT Tematik</th></tr>
      </thead>
      <tbody>
        <tr><td>Cakupan</td><td>Tahap 5 saja</td><td class="comp-highlight">Tahap 1–5 lengkap</td><td>Per tema spesifik</td></tr>
        <tr><td>Cocok untuk</td><td>Sudah selesai Kelas Pendampingan publik</td><td class="comp-highlight">Belum mulai sama sekali</td><td>Sudah punya sebagian sistem</td></tr>
        <tr><td>Durasi</td><td>2–3 bulan</td><td class="comp-highlight">6–12 bulan</td><td>Sesuai HOK yang dipilih</td></tr>
        <tr><td>Output</td><td>Siap asesmen</td><td class="comp-highlight">Siap akreditasi penuh</td><td>Sistem tema terkait selesai</td></tr>
      </tbody>
    </table>
  </div>
</section>

<!-- SECTION B: ANNUAL PARTNERSHIP -->
<section class="annual-section section-anchor" id="jaga">
  <div class="section-inner">
    <span class="section-tag-teal">🛡️ Untuk Lab yang Sudah Terakreditasi</span>
    <h2 class="h2">Annual Partnership<br>— Pastikan Tetap Terakreditasi, Setiap Tahun.</h2>
    <p class="body-text" style="max-width:620px">"Lab Anda sudah terakreditasi? Pastikan tetap terakreditasi tahun depan, tahun depannya lagi, dan seterusnya — tanpa perlu memulai dari awal." Satu paket, dua manfaat: <strong>untuk lab</strong> (pendampingan surveillance &amp; review sistem) dan <strong>untuk SDM Anda</strong> (akses event sepanjang tahun + pelatihan premium berskema).</p>

    <!-- TWO BENEFIT PILLARS -->
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:32px;margin-bottom:8px">
      <div style="background:white;border:1px solid var(--gray-200);border-radius:12px;padding:18px 20px;display:flex;gap:14px;align-items:flex-start">
        <span style="font-size:24px;flex-shrink:0">🏢</span>
        <div>
          <p style="font-size:13px;font-weight:700;color:var(--navy);margin-bottom:4px">Untuk Lab Anda</p>
          <p style="font-size:12.5px;color:var(--gray-600);line-height:1.5">Pendampingan onsite, review sistem mutu, dan kesiapan menghadapi surveillance — akreditasi tetap terjaga setiap tahun.</p>
        </div>
      </div>
      <div style="background:white;border:1px solid var(--gray-200);border-radius:12px;padding:18px 20px;display:flex;gap:14px;align-items:flex-start">
        <span style="font-size:24px;flex-shrink:0">👥</span>
        <div>
          <p style="font-size:13px;font-weight:700;color:var(--navy);margin-bottom:4px">Untuk SDM Lab Anda</p>
          <p style="font-size:12.5px;color:var(--gray-600);line-height:1.5">Akses webinar &amp; bootcamp sepanjang tahun, plus pelatihan premium berskema untuk personel — kompetensi tim tetap terjaga meski ada pergantian SDM.</p>
        </div>
      </div>
    </div>

    <div class="annual-tier-grid" style="grid-template-columns:repeat(2,1fr);max-width:760px;margin-left:auto;margin-right:auto">
      <div class="annual-tier">
        <div class="annual-tier-header">
          <div class="annual-tier-name">Surveillance Lite</div>
          <div class="annual-tier-desc">Untuk lab dengan kebutuhan dasar</div>
        </div>
        <div class="annual-tier-price-row">
          <div class="annual-tier-final">Rp 36 jt</div>
          <div class="annual-tier-unit">per tahun</div>
        </div>
        <div class="annual-tier-body">
          <div class="annual-feature"><span class="annual-check">✓</span><strong>5 HOK</strong> pendampingan onsite — fokus kesiapan surveillance</div>
          <div class="annual-feature"><span class="annual-check">✓</span>Review dokumen mutu tahunan</div>
          <div class="annual-feature"><span class="annual-check">✓</span>Akses webinar &amp; bootcamp sepanjang tahun untuk seluruh tim</div>
          <div class="annual-feature"><span class="annual-check">✓</span><strong>1 tema pelatihan premium</strong> + akses uji kompetensi terkait, untuk 1 personel</div>
        </div>
      </div>

      <div class="annual-tier best">
        <div class="annual-tier-header">
          <div class="annual-tier-best-badge">★ Direkomendasikan</div>
          <div class="annual-tier-name">Surveillance Pro</div>
          <div class="annual-tier-desc">Untuk lab dengan kebutuhan lebih intensif</div>
        </div>
        <div class="annual-tier-price-row">
          <div class="annual-tier-final">Rp 70 jt</div>
          <div class="annual-tier-unit">per tahun</div>
        </div>
        <div class="annual-tier-body">
          <div class="annual-feature"><span class="annual-check">✓</span><strong>10 HOK</strong> pendampingan onsite — review menyeluruh sistem &amp; teknis</div>
          <div class="annual-feature"><span class="annual-check">✓</span>Review dokumen mutu + pendampingan audit internal tahunan</div>
          <div class="annual-feature"><span class="annual-check">✓</span>Akses webinar &amp; bootcamp sepanjang tahun untuk seluruh tim</div>
          <div class="annual-feature"><span class="annual-check">✓</span><strong>2 tema pelatihan premium</strong> + akses uji kompetensi terkait, untuk 2 personel</div>
          <div class="annual-feature"><span class="annual-check">✓</span>Prioritas penjadwalan konsultasi</div>
        </div>
      </div>
    </div>

    <p style="font-size:13px;color:var(--gray-600);background:var(--gray-50);border:1px solid var(--gray-200);border-radius:8px;padding:12px 16px;margin-top:16px;line-height:1.6">
      ⓘ Biaya menyesuaikan dengan besaran ruang lingkup laboratorium dan rekomendasi terbaik untuk penyelesaian temuan dan optimalisasi sistem mutu laboratorium.
    </p>

    <p style="font-size:13px;color:var(--gray-600);margin-top:16px;text-align:center">Butuh skema institusional untuk kebutuhan lebih besar (multi-lab, multi-kampus)? <a href="#kontak" style="color:var(--teal-dark);font-weight:600">Hubungi tim kami untuk paket on-demand →</a></p>

    <!-- INDIVIDUAL -->
    <h3 style="font-size:20px;font-weight:800;color:var(--navy);margin-top:48px;margin-bottom:8px">Kemitraan Individu</h3>
    <p class="body-text" style="margin-bottom:20px">Untuk profesional lab yang ingin akses berkelanjutan secara personal, bukan atas nama institusi.</p>
    <div class="indiv-grid">
      <div class="indiv-card">
        <div class="indiv-tier-name">🥈 Silver</div>
        <div class="indiv-price">Rp 7 jt <span>/tahun</span></div>
        <div class="annual-feature"><span class="annual-check">✓</span>Akses webinar &amp; bootcamp sepanjang tahun</div>
        <div class="annual-feature"><span class="annual-check">✓</span><strong>1 pelatihan</strong> + akses uji kompetensi (1 skema)</div>
        <div class="annual-feature"><span class="annual-check">✓</span><strong>3 pelatihan premium</strong></div>
        <div class="annual-feature"><span class="annual-check">✓</span>Template dokumen dasar</div>
        <div class="annual-feature"><span class="annual-check">✓</span>Forum diskusi VIP</div>
      </div>
      <div class="indiv-card gold">
        <div class="indiv-tier-name">🥇 Gold</div>
        <div class="indiv-price">Rp 13 jt <span>/tahun</span></div>
        <div class="annual-feature"><span class="annual-check">✓</span>Semua benefit Silver</div>
        <div class="annual-feature"><span class="annual-check">✓</span>Akses webinar & bootcamp sepanjang tahun</div>
        <div class="annual-feature"><span class="annual-check">✓</span><strong>2 pelatihan</strong> + akses uji kompetensi (2 skema)</div>
        <div class="annual-feature"><span class="annual-check">✓</span>5 pelatihan premium</div>
        <div class="annual-feature"><span class="annual-check">✓</span>Template dokumen dasar</div>
        <div class="annual-feature"><span class="annual-check">✓</span>Forum diskusi VIP</div>
        <div class="annual-feature"><span class="annual-check">✓</span>2 sesi konsultasi privat dengan pakar</div>
      </div>
    </div>
  </div>
</section>

<!-- WHY US -->
<section>
  <div class="section-inner">
    <p class="eyebrow">Mengapa Privat Bersama Labnesia</p>
    <h2 class="h2">Bukan sekadar konsultan,<br>tapi mitra jangka panjang.</h2>
    <div class="why-grid">
      <div class="why-card">
        <div class="why-icon">👨‍🏫</div>
        <div class="why-title">Praktik Langsung dari Pakarnya</div>
        <div class="why-desc">Dibimbing oleh praktisi berpengalaman dengan pendekatan sistematis — bukan hanya konsultan teori.</div>
      </div>
      <div class="why-card">
        <div class="why-icon">📊</div>
        <div class="why-title">Progress Terpantau, Timeline Terkontrol</div>
        <div class="why-desc">Pendampingan dipantau tim internal dengan dukungan administratif yang rapi dan transparan.</div>
      </div>
      <div class="why-card">
        <div class="why-icon">🎯</div>
        <div class="why-title">Output Jelas, Outcome Berdampak</div>
        <div class="why-desc">Program dirancang untuk memberikan hasil nyata bagi laboratorium dan institusi Anda.</div>
      </div>
      <div class="why-card">
        <div class="why-icon">💰</div>
        <div class="why-title">Skema Disesuaikan Anggaran</div>
        <div class="why-desc">Biaya terjangkau dan fleksibel — disesuaikan dengan anggaran dan kebutuhan laboratorium Anda.</div>
      </div>
      <div class="why-card">
        <div class="why-icon">🏆</div>
        <div class="why-title">Track Record Terbukti</div>
        <div class="why-desc">30+ laboratorium telah kami dampingi dalam membangun sistem mutu dan meraih akreditasi.</div>
      </div>
      <div class="why-card">
        <div class="why-icon">💡</div>
        <div class="why-title">Lab Jadi Unit Layanan &amp; Income Generator</div>
        <div class="why-desc">Buka potensi baru untuk mendukung institusi secara nyata — dari cost center menjadi revenue center.</div>
      </div>
    </div>
  </div>
</section>

<!-- CTA SPLIT -->
<section class="cta-split-section" id="kontak">
  <div class="cta-split-inner">
    <p class="eyebrow" style="color:var(--teal-light)">Konsultasi Kebutuhan Lab Anda</p>
    <h2 class="cta-split-title">Mana yang sesuai<br>kondisi lab Anda?</h2>
    <p class="cta-split-sub">Tim kami akan bantu petakan kebutuhan spesifik institusi Anda — tanpa tekanan, tanpa komitmen di awal.</p>
    <div class="cta-split-actions">
      <a href="https://wa.me/6282172221567?text=Halo%2C%20saya%20ingin%20konsultasi%20Full%20Pendampingan%20untuk%20lab%20kami" class="cta-action-card">
        <div class="cta-action-tag">Belum Terakreditasi</div>
        <div class="cta-action-title">Konsultasi Full Pendampingan</div>
        <div class="cta-action-desc">Ceritakan kondisi lab Anda saat ini. Kami bantu rancang jalur tercepat menuju akreditasi.</div>
      </a>
      <a href="https://wa.me/6285185000367?text=Halo%2C%20saya%20ingin%20konsultasi%20Annual%20Partnership%20untuk%20lab%20kami" class="cta-action-card">
        <div class="cta-action-tag">Sudah Terakreditasi</div>
        <div class="cta-action-title">Konsultasi Annual Partnership</div>
        <div class="cta-action-desc">Diskusikan paket kemitraan tahunan yang sesuai dengan ukuran dan kebutuhan institusi Anda.</div>
      </a>
    </div>
    <p style="font-size:13px;color:rgba(255,255,255,0.4);margin-top:24px">📞 +62 821-7222-1567 (Endang) · +62 851-8500-0367 (Berryl) · +62 811-399-523 (Kintan)</p>
  </div>
</section>

<footer class="site-footer">
    <div class="footer-bottom">
    <span>&copy; <?php echo date('Y'); ?> Labnesia &middot; Padma Global Nusatama</span>
    <span><a href="https://labnesia.id">labnesia.id</a></span>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

