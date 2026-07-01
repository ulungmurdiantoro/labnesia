<?php
/*
Template Name: Pelatihan dan Sertifikasi
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
<body <?php body_class( 'page-pelatihan-sertifikasi' ); ?>>
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
      <span class="breadcrumb-cur">Pelatihan & Sertifikasi Kompetensi</span>
    </div>
    <div class="page-eyebrow"><div class="page-eyebrow-dot"></div> Produk Unggulan 2026 · Terpopuler</div>
    <h1>Pelatihan <span class="accent">Lead Implementer</span> & <span class="accent">Auditor Internal</span><br>ISO/IEC 17025:2017</h1>
    <p class="page-hero-sub">Pelatihan teori dan praktik untuk individu yang ingin membangun atau mengaudit sistem manajemen mutu laboratorium — pertama di Indonesia dengan kurikulum berstandar internasional.</p>
    <div class="hero-meta">
      <div class="hero-meta-item">
        <div class="hero-meta-icon">⏱️</div>
        <div><div class="hero-meta-label">Total pelatihan</div><div class="hero-meta-val">40 JP per skema</div></div>
      </div>
      <div class="hero-meta-item">
        <div class="hero-meta-icon">🌐</div>
        <div><div class="hero-meta-label">Format</div><div class="hero-meta-val">Online / Onsite</div></div>
      </div>
      <div class="hero-meta-item">
        <div class="hero-meta-icon">👤</div>
        <div><div class="hero-meta-label">Untuk</div><div class="hero-meta-val">Individu & profesional lab</div></div>
      </div>
      <div class="hero-meta-item">
        <div class="hero-meta-icon">🏅</div>
        <div><div class="hero-meta-label">Track record</div><div class="hero-meta-val">100+ peserta terlatih</div></div>
      </div>
    </div>
  </div>
</div>

<!-- FIREWALL BANNER -->
<div class="firewall-banner">
  <div class="firewall-banner-inner">
    <span class="firewall-icon">ℹ️</span>
    <p class="firewall-text"><strong>Pelatihan dan uji kompetensi adalah dua kegiatan yang independen.</strong> Labnesia menyelenggarakan pelatihan untuk meningkatkan kompetensi peserta. Uji kompetensi (jika diperlukan) diselenggarakan secara independen oleh Lembaga Sertifikasi Profesi/Person (LSP) terkait, dengan pendaftaran mandiri oleh peserta. <a href="<?php echo $url_faq; ?>#faq-umum" style="color:var(--teal);font-weight:600">Pelajari lebih lanjut →</a></p>
  </div>
</div>

<!-- TWO SCHEMES -->
<section>
  <div class="section-inner">
    <p class="eyebrow">Dua Skema Pelatihan</p>
    <h2 class="h2">Pilih sesuai peran Anda<br>di laboratorium.</h2>
    <p class="body-text" style="max-width:560px">Lead Implementer fokus pada membangun sistem. Auditor Internal fokus pada menilai sistem yang sudah berjalan. Banyak profesional mengambil keduanya untuk pemahaman menyeluruh.</p>

    <div class="scheme-grid">
      <div class="scheme-card">
        <div class="scheme-header implementer">
          <div class="scheme-tag">Skema 1 · Membangun Sistem</div>
          <div class="scheme-name">Lead Implementer</div>
          <div class="scheme-sub">Standar Laboratorium ISO/IEC 17025:2017</div>
        </div>
        <div class="scheme-body">
          <div class="scheme-block">
            <div class="scheme-block-title">Tujuan Pelatihan</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check">✓</span>Membekali peserta merancang, menerapkan, dan mengelola sistem manajemen mutu laboratorium</div>
              <div class="scheme-item"><span class="scheme-check">✓</span>Fokus pada pengembangan sistem yang efektif dan keberlanjutan implementasi</div>
            </div>
          </div>
          <div class="scheme-block">
            <div class="scheme-block-title">Peran Utama</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check">✓</span>Mengembangkan sistem manajemen mutu dari awal hingga berjalan efektif</div>
              <div class="scheme-item"><span class="scheme-check">✓</span>Menyusun prosedur, dokumentasi, dan kontrol operasional</div>
            </div>
          </div>
          <div class="scheme-block">
            <div class="scheme-block-title">Cocok untuk</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check">✓</span>Kepala laboratorium, Koordinator mutu, Pimpinan institusi lab</div>
            </div>
          </div>
        </div>
      </div>

      <div class="scheme-card">
        <div class="scheme-header auditor">
          <div class="scheme-tag">Skema 2 · Menilai Sistem</div>
          <div class="scheme-name">Auditor Internal</div>
          <div class="scheme-sub">Standar Laboratorium ISO/IEC 17025:2017</div>
        </div>
        <div class="scheme-body">
          <div class="scheme-block">
            <div class="scheme-block-title">Tujuan Pelatihan</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check">✓</span>Membekali peserta melakukan audit internal terhadap sistem yang sudah diimplementasikan</div>
              <div class="scheme-item"><span class="scheme-check">✓</span>Fokus pada evaluasi kepatuhan, identifikasi ketidaksesuaian, dan tindak korektif</div>
            </div>
          </div>
          <div class="scheme-block">
            <div class="scheme-block-title">Peran Utama</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check">✓</span>Melakukan audit terhadap sistem yang sudah berjalan</div>
              <div class="scheme-item"><span class="scheme-check">✓</span>Menyusun laporan audit dan rekomendasi perbaikan</div>
            </div>
          </div>
          <div class="scheme-block">
            <div class="scheme-block-title">Cocok untuk</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check">✓</span>Auditor mutu internal, Personel laboratorium, Pengawas teknis/manajer mutu</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="summary-banner">
      <p class="summary-text"><span>Lead Implementer</span> = Membangun & Menjalankan Sistem &nbsp;·&nbsp; <span>Auditor Internal</span> = Menilai & Memastikan Sistem Berjalan Sesuai Standar</p>
    </div>
  </div>
</section>

<!-- CURRICULUM -->
<section style="background:var(--gray-50)">
  <div class="section-inner">
    <p class="eyebrow">Kurikulum Pelatihan</p>
    <h2 class="h2">Teori dan praktik,<br>4 modul pembelajaran.</h2>
    <p class="body-text" style="max-width:560px;margin-bottom:24px">Struktur kurikulum berlaku untuk kedua skema, dengan penekanan materi yang disesuaikan — implementasi untuk Lead Implementer, audit untuk Auditor Internal.</p>

    <div class="curr-step">
      <div class="curr-header active" onclick="toggleCurr(this)">
        <div class="curr-num">1</div>
        <div class="curr-title">Pengenalan ISO/IEC 17025:2017</div>
        <span class="curr-chevron">▾</span>
      </div>
      <div class="curr-body open">
        <div class="curr-sub-item"><span class="curr-sub-check">✓</span>Kerangka standar dan regulasi yang relevan</div>
        <div class="curr-sub-item"><span class="curr-sub-check">✓</span>Prinsip Sistem Manajemen Laboratorium dan Plan-Do-Check-Act (PDCA)</div>
      </div>
    </div>
    <div class="curr-step">
      <div class="curr-header" onclick="toggleCurr(this)">
        <div class="curr-num">2</div>
        <div class="curr-title">Perencanaan Implementasi ISO/IEC 17025:2017</div>
        <span class="curr-chevron">▾</span>
      </div>
      <div class="curr-body">
        <div class="curr-sub-item"><span class="curr-sub-check">✓</span>Ketidakberpihakan, kerahasiaan, dan kode etik</div>
        <div class="curr-sub-item"><span class="curr-sub-check">✓</span>Kepemimpinan, struktur organisasi, dan personel</div>
        <div class="curr-sub-item"><span class="curr-sub-check">✓</span>Pengelolaan sistem dokumentasi dan informasi</div>
        <div class="curr-sub-item"><span class="curr-sub-check">✓</span>Pengelolaan fasilitas, kondisi lingkungan, dan peralatan</div>
        <div class="curr-sub-item"><span class="curr-sub-check">✓</span>Perencanaan penyedia eksternal laboratorium</div>
      </div>
    </div>
    <div class="curr-step">
      <div class="curr-header" onclick="toggleCurr(this)">
        <div class="curr-num">3</div>
        <div class="curr-title">Implementasi ISO/IEC 17025:2017</div>
        <span class="curr-chevron">▾</span>
      </div>
      <div class="curr-body">
        <div class="curr-sub-item"><span class="curr-sub-check">✓</span>Pelayanan pelanggan, pengelolaan sampel, dan sampling</div>
        <div class="curr-sub-item"><span class="curr-sub-check">✓</span>Pemilihan, verifikasi, dan validasi metode</div>
        <div class="curr-sub-item"><span class="curr-sub-check">✓</span>Ketertelusuran dan ketidakpastian pengukuran</div>
        <div class="curr-sub-item"><span class="curr-sub-check">✓</span>Jaminan mutu, pengendalian mutu, dan uji profisiensi</div>
        <div class="curr-sub-item"><span class="curr-sub-check">✓</span>Penerbitan laporan hasil pengukuran</div>
      </div>
    </div>
    <div class="curr-step">
      <div class="curr-header" onclick="toggleCurr(this)">
        <div class="curr-num">4</div>
        <div class="curr-title">Pemantauan, Evaluasi & Continual Improvement</div>
        <span class="curr-chevron">▾</span>
      </div>
      <div class="curr-body">
        <div class="curr-sub-item"><span class="curr-sub-check">✓</span>Pengelolaan pengaduan dan manajemen risiko</div>
        <div class="curr-sub-item"><span class="curr-sub-check">✓</span>Identifikasi ketidaksesuaian dan tindakan perbaikan</div>
        <div class="curr-sub-item"><span class="curr-sub-check">✓</span>Audit internal dan kaji ulang manajemen</div>
      </div>
    </div>

    <!-- SYARAT & BENEFIT -->
    <div class="info-grid">
      <div class="info-card">
        <div class="info-card-title">📋 Syarat Mengikuti Pelatihan</div>
        <div class="info-item"><div class="info-num">1</div>Pendidikan minimal D3</div>
        <div class="info-item"><div class="info-num">2</div>Pengalaman bekerja (termasuk praktik/riset) di laboratorium</div>
        <div class="info-item"><div class="info-num">3</div>Memiliki sertifikat pelatihan pemahaman dan penerapan ISO/IEC 17025:2017 (untuk skema lanjutan)</div>
      </div>
      <div class="info-card">
        <div class="info-card-title">🎁 Benefit Pelatihan</div>
        <div class="info-item"><span class="info-check">✓</span>Sertifikat Pelatihan 40 JP</div>
        <div class="info-item"><span class="info-check">✓</span>Soft copy materi pelatihan lengkap</div>
        <div class="info-item"><span class="info-check">✓</span>Kunjungan ke laboratorium (bagi peserta onsite)</div>
        <div class="info-item"><span class="info-check">✓</span>Forum WhatsApp bersama pakar</div>
        <div class="info-item"><span class="info-check">✓</span>Gratis template dokumen ISO/IEC 17025:2017</div>
      </div>
    </div>

    <!-- DISCLAIMER -->
    <div class="disclaimer-box">
      <div class="disclaimer-title">ℹ️ Informasi Mengenai Uji Kompetensi</div>
      <p class="disclaimer-text">Program pelatihan ini dapat digunakan sebagai salah satu bentuk pemenuhan persyaratan administrasi untuk mengikuti uji kompetensi pada skema terkait di Lembaga Sertifikasi Profesi/Person (LSP) yang relevan, sesuai dengan persyaratan dan ketentuan yang berlaku. <strong>Keikutsertaan dalam pelatihan ini tidak menjamin kemudahan proses uji atau menjamin kelulusan sertifikasi kompetensi.</strong> Pendaftaran uji kompetensi dilakukan secara mandiri oleh peserta langsung kepada LSP terkait, dan jadwal resmi uji kompetensi dipublikasikan melalui media LSP secara terpisah.</p>
    </div>
  </div>
</section>

<!-- PRICING -->
<section>
  <div class="section-inner">
    <p class="eyebrow">Investasi Pelatihan</p>
    <h2 class="h2">Skema harga yang fleksibel,<br>online maupun onsite.</h2>
    <div class="pricing-grid">
      <div class="price-tier">
        <div class="price-tier-label">Online · Normal</div>
        <div class="price-tier-val">Rp 6,5 jt</div>
        <div class="price-tier-unit">per orang</div>
        <div class="price-tier-note">Rp 6 jt jika ≥3 peserta</div>
      </div>
      <div class="price-tier featured">
        <div class="price-tier-badge">Early Bird</div>
        <div class="price-tier-label">Online · Early Bird</div>
        <div class="price-tier-val">Rp 5,75 jt</div>
        <div class="price-tier-unit">per orang</div>
        <div class="price-tier-note">Rp 5,25 jt jika ≥3 peserta</div>
      </div>
      <div class="price-tier">
        <div class="price-tier-label">Onsite · Normal</div>
        <div class="price-tier-val">Rp 7,5 jt</div>
        <div class="price-tier-unit">per orang</div>
        <div class="price-tier-note">+Rp 1 jt dari harga online</div>
      </div>
      <div class="price-tier">
        <div class="price-tier-label">Onsite · Early Bird</div>
        <div class="price-tier-val">Rp 6,75 jt</div>
        <div class="price-tier-unit">per orang</div>
        <div class="price-tier-note">+Rp 1 jt dari harga online</div>
      </div>
    </div>
    <p style="font-size:12px;color:var(--gray-400);margin-top:16px;text-align:center">Harga belum termasuk biaya uji kompetensi di LSP terkait (jika peserta memilih mengikuti uji kompetensi secara mandiri).</p>
  </div>
</section>

<!-- JADWAL -->
<section class="jadwal-section">
  <div class="section-inner">
    <p class="eyebrow">Jadwal Pelatihan</p>
    <h2 class="h2">Dibuka rutin sepanjang 2026.</h2>
    <p class="body-text" style="max-width:560px">Jadwal dan tema menyesuaikan kebutuhan & ketersediaan pakar. Hubungi tim kami untuk konfirmasi jadwal terdekat.</p>
    <div class="jadwal-list">
      <div class="jadwal-item">
        <span class="jadwal-tag tag-implementer">Implementer</span>
        <div class="jadwal-info">
          <div class="jadwal-title">Lead Implementer ISO/IEC 17025 — Umum</div>
          <div class="jadwal-meta">Online · 40 JP · Jadwal dibuka rutin tiap bulan</div>
        </div>
        <div class="jadwal-cta"><a href="#daftar" class="btn-jadwal">Daftar</a></div>
      </div>
      <div class="jadwal-item">
        <span class="jadwal-tag tag-auditor">Auditor Internal</span>
        <div class="jadwal-info">
          <div class="jadwal-title">Auditor Internal ISO/IEC 17025 — Umum</div>
          <div class="jadwal-meta">Online · 40 JP · Jadwal dibuka rutin tiap bulan</div>
        </div>
        <div class="jadwal-cta"><a href="#daftar" class="btn-jadwal">Daftar</a></div>
      </div>
      <div class="jadwal-item">
        <span class="jadwal-tag tag-implementer">Implementer</span>
        <div class="jadwal-info">
          <div class="jadwal-title">Implementer ISO/IEC 17025 — Lab Lingkungan</div>
          <div class="jadwal-meta">Online · 40 JP · Bidang spesifik laboratorium lingkungan</div>
        </div>
        <div class="jadwal-cta"><a href="#daftar" class="btn-jadwal">Daftar</a></div>
      </div>
      <div class="jadwal-item">
        <span class="jadwal-tag tag-implementer">Implementer</span>
        <div class="jadwal-info">
          <div class="jadwal-title">Implementer ISO/IEC 17025 — Lab Pangan, Gizi, Halal</div>
          <div class="jadwal-meta">Online · 40 JP · Bidang spesifik laboratorium pangan</div>
        </div>
        <div class="jadwal-cta"><a href="#daftar" class="btn-jadwal">Daftar</a></div>
      </div>
      <div class="jadwal-item">
        <span class="jadwal-tag tag-implementer">Implementer</span>
        <div class="jadwal-info">
          <div class="jadwal-title">Implementer ISO/IEC 17025 — Lab Biologi/Mikrobiologi</div>
          <div class="jadwal-meta">Online · 40 JP · Bidang spesifik laboratorium biologi</div>
        </div>
        <div class="jadwal-cta"><a href="#daftar" class="btn-jadwal">Daftar</a></div>
      </div>
    </div>
  </div>
</section>

<!-- OTHER SCHEMES -->
<section>
  <div class="section-inner">
    <p class="eyebrow">Skema Lainnya</p>
    <h2 class="h2">Pelatihan kompetensi lain<br>untuk profesional lab.</h2>
    <p class="body-text" style="max-width:560px">Selain dua skema utama di atas, tersedia juga skema pelatihan tematik berikut sesuai kebutuhan peran Anda di laboratorium.</p>
    <div class="other-schemes">
      <div class="scheme-pill"><span class="scheme-pill-icon">🍽️</span>Food Safety Management Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon">👃</span>Panelis Terlatih Pengujian Sensori<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon">🧪</span>GLP Laboratory Technician<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon">🦺</span>Laboratory HSE Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon">⚙️</span>Laboratory Operations Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon">📊</span>Quality Management System (ISO 9001) Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon">🔬</span>QC Laboratory Analyst<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon">✅</span>Quality Assurance Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon">🧬</span>Research and Development Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon">📜</span>Regulatory Affairs Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon">🌱</span>Sustainability Officer<span class="new-tag">New</span></div>
      <div class="scheme-pill"><span class="scheme-pill-icon">♻️</span>Environmental Management (ISO 14001) Officer<span class="new-tag">New</span></div>
    </div>
  </div>
</section>

<!-- CTA FORM -->
<section class="cta-form-section" id="daftar">
  <div class="cta-form-inner">
    <p class="eyebrow" style="color:var(--teal-light)">Daftar Sekarang</p>
    <h2 class="cta-form-title">Tingkatkan kompetensi Anda<br>mulai hari ini.</h2>
    <p class="cta-form-sub">Tim kami akan menghubungi Anda untuk konfirmasi jadwal dan detail pembayaran.</p>
    <div class="form-card">
      <div class="form-row">
        <div>
          <label class="form-label">Nama lengkap *</label>
          <input class="form-input" type="text" placeholder="Nama Anda">
        </div>
        <div>
          <label class="form-label">Nomor WhatsApp *</label>
          <input class="form-input" type="tel" placeholder="08xx-xxxx-xxxx">
        </div>
      </div>
      <div class="form-field-full">
        <label class="form-label">Institusi / Laboratorium</label>
        <input class="form-input" type="text" placeholder="Nama institusi Anda">
      </div>
      <div class="form-row">
        <div>
          <label class="form-label">Skema pelatihan *</label>
          <select class="form-select">
            <option>Lead Implementer ISO/IEC 17025</option>
            <option>Auditor Internal ISO/IEC 17025</option>
            <option>Skema lainnya (sebutkan di catatan)</option>
          </select>
        </div>
        <div>
          <label class="form-label">Format</label>
          <select class="form-select">
            <option>Online — Early Bird</option>
            <option>Online — Normal</option>
            <option>Onsite — Early Bird</option>
            <option>Onsite — Normal</option>
          </select>
        </div>
      </div>
      <button class="btn-submit-cta" onclick="alert('Pendaftaran diterima! Tim kami akan menghubungi Anda untuk konfirmasi jadwal.')">Daftar Pelatihan →</button>
      <p style="font-size:11px;color:var(--gray-400);text-align:center;margin-top:10px">Tidak ada biaya di tahap ini — tim kami akan menghubungi Anda terlebih dahulu.</p>
    </div>
  </div>
</section>

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
function toggleCurr(el){
  const body=el.nextElementSibling;
  const isOpen=body.classList.contains('open');
  document.querySelectorAll('.curr-body').forEach(b=>b.classList.remove('open'));
  document.querySelectorAll('.curr-header').forEach(h=>h.classList.remove('active'));
  if(!isOpen){body.classList.add('open');el.classList.add('active')}
}
</script>
<?php wp_footer(); ?>
</body>
</html>

