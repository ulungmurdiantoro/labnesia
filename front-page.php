<?php
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
<body <?php body_class( 'page-home' ); ?>>
<?php wp_body_open(); ?>

<!-- NAV -->
<header class="site-header" id="site-header">
  <a class="nav-logo" href="<?php echo $url_home; ?>">
    <img src="<?php echo $logo_url; ?>" alt="Labnesia" style="height:44px;width:auto;display:block;">
  </a>
  <div class="nav-links" id="primary-nav">
    <a href="<?php echo $url_home; ?>">Beranda</a>
    <a href="<?php echo $url_kelas; ?>">Kelas Pendampingan</a>
    <a href="<?php echo $url_inhouse; ?>">Inhouse Training</a>
    <a href="<?php echo $url_pelatihan; ?>">Pelatihan Sertifikasi</a>
    <a href="<?php echo $url_optimasi; ?>">Optimasi Alat</a>
    <a href="<?php echo $url_faq; ?>">FAQ</a>
    <a href="<?php echo $url_gratis; ?>" class="nav-cta">Mulai Gratis</a>
  </div>
  <button class="nav-toggle" id="nav-toggle" aria-label="Toggle menu">
    <svg viewBox="0 0 24 24"><path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
  </button>
</header>

<!-- HERO -->
<section class="hero" id="hero">
  <div class="hero-bg-pattern"></div>
  <div class="hero-glow"></div>
  <div class="hero-inner">
    <div>
      <div class="hero-eyebrow">
        <div class="hero-eyebrow-dot"></div>
        Mitra Pengembangan Laboratorium Indonesia
      </div>
      <h1>Lab Anda Layak<br>Jadi <span class="accent">Laboratorium Unggul</span></h1>
      <p class="hero-belief">
        "Laboratorium berkualitas dimulai dari SDM yang kompeten.<br>
        Akreditasi adalah hasil — bukan tujuan akhir."
      </p>
      <div class="hero-actions">
        <a href="#give" class="btn-primary">Mulai dari yang Gratis →</a>
        <a href="#produk" class="btn-ghost">Lihat Program Pendampingan</a>
      </div>
      <div class="hero-stats">
        <div class="hero-stat">
          <div class="hero-stat-num">30+</div>
          <div class="hero-stat-label">Laboratorium berhasil terakreditasi KAN</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-num">15</div>
          <div class="hero-stat-label">Pakar berpengalaman di bidangnya</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-num">9</div>
          <div class="hero-stat-label">Jenis laboratorium yang kami layani</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-num">6 bln</div>
          <div class="hero-stat-label">Rata-rata waktu siap asesmen KAN</div>
        </div>
      </div>
    </div>

    <div class="hero-map">
      <p class="hero-map-title">Peta perjalanan akreditasi lab Anda</p>
      <div class="journey-step">
        <div class="journey-dot dot-done">✓</div>
        <div class="journey-info">
          <div class="journey-label">Awareness & Pemahaman Dasar</div>
          <div class="journey-sub">ISO 17025, struktur dokumen, KANMIS</div>
        </div>
        <span class="journey-badge badge-free">Gratis</span>
      </div>
      <div class="journey-step">
        <div class="journey-dot dot-done">✓</div>
        <div class="journey-info">
          <div class="journey-label">GAP Analysis & Roadmap</div>
          <div class="journey-sub">Identifikasi gap dokumen & teknis</div>
        </div>
        <span class="journey-badge badge-free">Gratis</span>
      </div>
      <div class="journey-step">
        <div class="journey-dot" style="background:var(--teal)">🎓</div>
        <div class="journey-info">
          <div class="journey-label">Pelatihan & Sertifikasi Kompetensi</div>
          <div class="journey-sub">Untuk individu — Lead Implementer / Auditor Internal</div>
        </div>
        <span class="journey-badge" style="background:rgba(26,158,117,0.2);color:#4DD9A8">Individu</span>
      </div>
      <div class="journey-step active">
        <div class="journey-dot dot-active">★</div>
        <div class="journey-info">
          <div class="journey-label">Kelas Pendampingan Akreditasi</div>
          <div class="journey-sub">4 tahap, online/hybrid, bersama pakar</div>
        </div>
        <span class="journey-badge badge-core">Core</span>
      </div>
      <div class="journey-step">
        <div class="journey-dot dot-locked">4</div>
        <div class="journey-info">
          <div class="journey-label">Persiapan & Simulasi Asesmen</div>
          <div class="journey-sub">Audit kelayakan, CAPA, pendaftaran KAN</div>
        </div>
        <span class="journey-badge badge-adv">Lanjutan</span>
      </div>
      <div class="journey-step">
        <div class="journey-dot dot-locked">5</div>
        <div class="journey-info">
          <div class="journey-label">Laboratorium Terakreditasi</div>
          <div class="journey-sub">Siap jadi profit center & income generator</div>
        </div>
        <span class="journey-badge badge-adv">🏆 Goal</span>
      </div>
    </div>
  </div>
</section>

<!-- PROBLEM SECTION -->
<section class="problem-section">
  <div class="section-inner">
    <p class="section-eyebrow">Kenapa banyak lab belum terakreditasi?</p>
    <h2 class="section-title">Kami tahu hambatannya.<br>Kami sudah siapkan jawabannya.</h2>
    <div class="problem-grid">
      <div class="problem-card">
        <div class="problem-icon">💸</div>
        <div class="problem-title">Biaya konsultan terlalu mahal</div>
        <div class="problem-desc">Pendampingan in-house konvensional bisa mencapai 150–200 juta rupiah. Kebanyakan laboratorium tidak punya anggaran sebesar itu.</div>
        <div class="problem-answer">→ Kelas publik mulai dari Rp 14 juta/peserta</div>
      </div>
      <div class="problem-card">
        <div class="problem-icon">😕</div>
        <div class="problem-title">Tidak tahu harus mulai dari mana</div>
        <div class="problem-desc">Dokumen ISO 17025 terasa rumit. Mana yang harus dibuat dulu? Bagaimana cara daftar di KANMIS? Tim tidak ada yang paham alurnya.</div>
        <div class="problem-answer">→ Gap Analysis gratis + roadmap implementasi</div>
      </div>
      <div class="problem-card">
        <div class="problem-icon">⏳</div>
        <div class="problem-title">Proses terlalu lama & tidak jelas</div>
        <div class="problem-desc">Banyak lab mencoba sendiri bertahun-tahun tanpa hasil. Tidak ada timeline yang jelas dan tidak ada yang memastikan setiap langkah benar.</div>
        <div class="problem-answer">→ Timeline 6 bulan dengan output terstandarisasi</div>
      </div>
      <div class="problem-card">
        <div class="problem-icon">👤</div>
        <div class="problem-title">Bergantung pada satu orang saja</div>
        <div class="problem-desc">Jika Manajer Mutu resign, sistem mutu ikut runtuh. Implementasi tidak berkelanjutan karena hanya satu orang yang paham.</div>
        <div class="problem-answer">→ Rekomendasi 3 peserta per lab (Manajer Mutu, Teknis, Admin)</div>
      </div>
      <div class="problem-card">
        <div class="problem-icon">🏢</div>
        <div class="problem-title">Proses pengadaan instansi yang panjang</div>
        <div class="problem-desc">In-house training membutuhkan proposal, tender, dan persetujuan yang bisa memakan waktu 6–12 bulan sebelum mulai.</div>
        <div class="problem-answer">→ Daftar sebagai individu, langsung mulai bulan ini</div>
      </div>
      <div class="problem-card">
        <div class="problem-icon">🤔</div>
        <div class="problem-title">Belum yakin dengan kualitas program</div>
        <div class="problem-desc">Banyak program pelatihan yang bagus di marketing tapi tidak menghasilkan lab yang benar-benar siap akreditasi.</div>
        <div class="problem-answer">→ 30+ lab yang sudah terakreditasi KAN bersama kami</div>
      </div>
    </div>
  </div>
</section>

<!-- GIVE VALUE SECTION -->
<section class="give-section" id="give">
  <div class="section-inner">
    <div class="give-header">
      <p class="section-eyebrow" style="color: var(--teal-light);">Give Value First</p>
      <h2 class="section-title">Kami berikan dulu,<br>baru Anda putuskan.</h2>
      <p class="section-sub">Kami percaya bahwa laboratorium yang sudah merasakan manfaatnya akan tahu sendiri langkah selanjutnya. Tidak perlu dipaksa.</p>
      <div class="give-philosophy">
        <p>"Sebelum Anda mengeluarkan satu rupiah pun, kami ingin memastikan Anda sudah merasakan nilai nyata dari pendampingan kami — itu komitmen kami sebagai mitra, bukan sekadar penyedia jasa."</p>
      </div>
    </div>

    <div class="give-grid">
      <!-- Free tier -->
      <div class="give-card featured">
        <span class="give-card-tag tag-gratis">✦ 100% Gratis</span>
        <div class="give-card-icon">📋</div>
        <div class="give-card-title">Gap Analysis Gratis</div>
        <div class="give-card-desc">Kami analisis kondisi lab Anda saat ini: gap dokumen, gap teknis, dan kesiapan sistem mutu. Hasilnya Anda dapatkan: Laporan GAP, Penetapan Ruang Lingkup, Struktur Organisasi, dan Roadmap Implementasi.</div>
        <a href="<?php echo $url_gratis; ?>" class="give-card-cta">Daftar Gap Analysis →</a>
      </div>

      <div class="give-card">
        <span class="give-card-tag tag-gratis">100% Gratis</span>
        <div class="give-card-icon">🎓</div>
        <div class="give-card-title">Webinar Lab Talk</div>
        <div class="give-card-desc">Sesi edukasi mingguan tentang ISO 17025, tips akreditasi, studi kasus lab, dan sharing dari pakar. Cocok untuk awareness & orientasi tim lab Anda.</div>
        <a href="<?php echo $url_gratis; ?>" class="give-card-cta">Lihat jadwal webinar →</a>
      </div>

      <div class="give-card">
        <span class="give-card-tag tag-gratis">100% Gratis</span>
        <div class="give-card-icon">📥</div>
        <div class="give-card-title">Download Panduan & Template</div>
        <div class="give-card-desc">Panduan SNI ISO 17025, checklist persiapan akreditasi, silabus pelatihan, dan contoh dokumen audit kecukupan. Langsung bisa digunakan oleh tim Anda.</div>
        <a href="<?php echo $url_gratis; ?>" class="give-card-cta">Download sekarang →</a>
      </div>

      <div class="give-card">
        <span class="give-card-tag tag-terbuka">Terbuka Umum</span>
        <div class="give-card-icon">⚡</div>
        <div class="give-card-title">Bootcamp 1 Hari</div>
        <div class="give-card-desc">Program intensif 1 hari (online) untuk memahami alur akreditasi secara menyeluruh. Dari struktur dokumen hingga cara daftar di KANMIS 2.0. Biaya sangat terjangkau.</div>
        <a href="<?php echo $url_gratis; ?>" class="give-card-cta">Lihat jadwal bootcamp →</a>
      </div>

      <div class="give-card">
        <span class="give-card-tag tag-terbuka">Untuk Mahasiswa</span>
        <div class="give-card-icon">🎓</div>
        <div class="give-card-title">Program Kuliah Praktisi</div>
        <div class="give-card-desc">Sesi tatap muka di kampus: mahasiswa tingkat akhir mendapatkan pemahaman nyata tentang sistem mutu lab & karir di bidang ini. Gratis untuk kampus mitra Labnesia.</div>
        <a href="<?php echo $url_gratis; ?>" class="give-card-cta">Undang Labnesia ke kampus →</a>
      </div>

      <div class="give-card">
        <span class="give-card-tag tag-eksklusif">Eksklusif Member</span>
        <div class="give-card-icon">💬</div>
        <div class="give-card-title">Komunitas Lab Kompeten</div>
        <div class="give-card-desc">Forum diskusi eksklusif nasional antar manajer lab, analis, dan auditor internal. Tanya jawab dengan pakar, sharing pengalaman asesmen, dan update regulasi terbaru dari KAN.</div>
        <a href="<?php echo $url_gratis; ?>" class="give-card-cta">Bergabung ke komunitas →</a>
      </div>
    </div>
  </div>
</section>

<!-- PRODUCT SECTION -->
<section class="product-section" id="produk">
  <div class="section-inner">
    <div class="product-intro">
      <div>
        <p class="section-eyebrow">Program & Layanan</p>
        <h2 class="section-title">Mulai dari mana<br>yang sesuai dengan<br>kondisi lab Anda.</h2>
        <p class="section-sub">Tidak ada satu ukuran untuk semua. Kami punya jalur yang tepat — mulai dari yang gratis, hingga pendampingan penuh menuju akreditasi KAN.</p>
      </div>
      <div class="ladder-container">
        <div class="ladder-step">
          <div class="ladder-left"><div class="ladder-dot"></div></div>
          <div class="ladder-body">
            <div class="ladder-row"><span class="ladder-name">Webinar & Bootcamp</span><span class="ladder-price">Gratis – 500rb</span></div>
            <div class="ladder-desc">Awareness, orientasi, dan pemahaman dasar ISO 17025</div>
          </div>
        </div>
        <div class="ladder-step">
          <div class="ladder-left" style="background:var(--teal)"><div class="ladder-dot" style="background:var(--teal)"></div></div>
          <div class="ladder-body" style="border-color:var(--teal);background:var(--teal-pale)">
            <div class="ladder-row"><span class="ladder-name" style="color:var(--teal)">Sertifikasi Kompetensi</span><span class="ladder-price">2–7 jt/orang</span></div>
            <div class="ladder-desc" style="margin-bottom:8px">Pelatihan 40 JP — Lead Implementer atau Auditor Internal ISO/IEC 17025</div>
            <div class="ladder-badge">Produk Unggulan 2026</div>
          </div>
        </div>
        <div class="ladder-step active">
          <div class="ladder-left"><div class="ladder-dot"></div></div>
          <div class="ladder-body">
            <div class="ladder-row">
              <span class="ladder-name">★ Kelas Pendampingan</span>
              <span class="ladder-price">14–35 jt/lab</span>
            </div>
            <div class="ladder-desc">4 tahap, output terstandarisasi, 6 bulan, siap audit internal</div>
            <div class="ladder-badge" style="margin-top:8px">Produk Unggulan 2026</div>
          </div>
        </div>
        <div class="ladder-step">
          <div class="ladder-left"><div class="ladder-dot"></div></div>
          <div class="ladder-body">
            <div class="ladder-row"><span class="ladder-name">Kelas Lanjutan (Privat)</span><span class="ladder-price">36 jt/lab</span></div>
            <div class="ladder-desc">Fokus Tahap 5: pendaftaran KAN, audit kelayakan, simulasi asesmen</div>
          </div>
        </div>
        <div class="ladder-step">
          <div class="ladder-left"><div class="ladder-dot"></div></div>
          <div class="ladder-body">
            <div class="ladder-row"><span class="ladder-name">Full Pendampingan (In House)</span><span class="ladder-price">150–200 jt/lab</span></div>
            <div class="ladder-desc">Pendampingan privat penuh Tahap 1–5, dari nol hingga akreditasi</div>
          </div>
        </div>
        <div class="ladder-step">
          <div class="ladder-left"><div class="ladder-dot"></div></div>
          <div class="ladder-body">
            <div class="ladder-row"><span class="ladder-name">Host Laboratory Program</span><span class="ladder-price">MoU / Kemitraan</span></div>
            <div class="ladder-desc">Lab Anda jadi pusat pelatihan & income generator nasional</div>
          </div>
        </div>

        <div style="display:flex;align-items:center;gap:12px;margin:20px 0 12px;padding-left:52px">
          <div style="flex:1;height:1px;background:var(--gray-200)"></div>
          <div style="display:flex;align-items:center;gap:7px;background:var(--teal-pale);border:1px solid rgba(26,158,117,0.25);border-radius:100px;padding:5px 14px;white-space:nowrap;flex-shrink:0">
            <div style="width:7px;height:7px;border-radius:50%;background:var(--teal)"></div>
            <span style="font-size:11px;font-weight:700;color:var(--teal);letter-spacing:.04em">Sudah terakreditasi KAN?</span>
          </div>
          <div style="flex:1;height:1px;background:var(--gray-200)"></div>
        </div>

        <div class="ladder-step" style="margin-bottom:0">
          <div class="ladder-left" style="background:var(--teal)"><div class="ladder-dot" style="background:var(--teal)"></div></div>
          <div class="ladder-body" style="border-color:var(--teal);background:var(--teal-pale);margin-left:20px">
            <div class="ladder-row">
              <span class="ladder-name" style="color:var(--teal)">Annual Partnership</span>
              <span class="ladder-price">36–70 jt/tahun</span>
            </div>
            <div class="ladder-desc" style="margin-bottom:8px">Pastikan tetap terakreditasi tahun depan, tahun depannya lagi, dan seterusnya — tanpa perlu memulai dari awal.</div>
            <div style="display:flex;gap:6px;flex-wrap:wrap">
              <span style="font-size:11px;font-weight:600;padding:2px 8px;border-radius:4px;background:rgba(26,158,117,0.12);color:var(--teal)">Surveillance KAN</span>
              <span style="font-size:11px;font-weight:600;padding:2px 8px;border-radius:4px;background:rgba(26,158,117,0.12);color:var(--teal)">Update SDM rutin</span>
              <span style="font-size:11px;font-weight:600;padding:2px 8px;border-radius:4px;background:rgba(26,158,117,0.12);color:var(--teal)">Hemat vs beli satuan</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Give value banner -->
    <div class="give-banner">
      <div class="give-banner-left">
        <div class="give-banner-title">Belum ada anggaran? Mulai dari yang gratis dulu.</div>
        <div class="give-banner-sub">Gap Analysis gratis + komunitas + webinar mingguan tersedia tanpa biaya. Ketika lab Anda sudah siap, kami ada di sini.</div>
      </div>
      <div class="give-banner-actions">
        <a href="<?php echo $url_gratis; ?>" class="btn-teal">Daftar Gap Analysis Gratis</a>
        <a href="<?php echo $url_gratis; ?>" class="btn-primary">Konsultasi dengan Tim Kami</a>
      </div>
    </div>

    <!-- 3 Featured Products -->
    <h3 style="font-size:24px;font-weight:800;color:var(--navy);margin-bottom:24px;">Program yang paling banyak dipilih</h3>
    <div class="product-cards" style="grid-template-columns:repeat(4,1fr);gap:16px">
      <div class="product-card" style="position:relative">
        <div class="product-card-header">
          <div style="position:absolute;top:16px;right:16px;background:var(--amber);color:var(--navy);font-size:10px;font-weight:800;letter-spacing:.06em;text-transform:uppercase;padding:4px 10px;border-radius:4px">Terpopuler 2026</div>
          <div class="product-card-eyebrow">Entry · Individu</div>
          <div class="product-card-name">Pelatihan & Sertifikasi Kompetensi</div>
          <div class="product-card-price">Rp 2–7 jt <span class="product-card-unit">/orang</span></div>
        </div>
        <div class="product-card-body">
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text">Pelatihan 40 JP online/offline</div></div>
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text">Materi Lead Implementer atau Auditor Internal ISO/IEC 17025</div></div>
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text">Modul pembelajaran terstandarisasi oleh para pakar</div></div>
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text">Cocok untuk individu & fresh graduate</div></div>
          <a href="<?php echo $url_pelatihan; ?>" class="product-card-cta cta-outline">Lihat jadwal pelatihan</a>
        </div>
      </div>

      <div class="product-card featured">
        <div class="product-card-header">
          <div class="featured-badge">★ Terpopuler</div>
          <div class="product-card-eyebrow">Core Program · Laboratorium</div>
          <div class="product-card-name">Kelas Pendampingan</div>
          <div class="product-card-price">Rp 14 jt <span class="product-card-unit">/peserta</span></div>
        </div>
        <div class="product-card-body">
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text">4 tahap sistematis: Awareness → Dokumen → Kompetensi Teknis → Evaluasi</div></div>
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text">Output nyata di setiap sesi (template, laporan, checklist siap pakai)</div></div>
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text">GRATIS voucher uji kompetensi (via LSP Edukia)* + template dokumen ISO/IEC 17025</div></div>
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text">GRATIS konsultasi privat 1-on-1 dengan pakar (Rp 3 jt)</div></div>
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text">Akses webinar & bootcamp 1 tahun penuh</div></div>
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text">Hemat hingga Rp 20 juta dibanding harga satuan</div></div>
          <a href="<?php echo $url_kelas; ?>" class="product-card-cta cta-primary">Daftar Kelas Pendampingan</a>
        </div>
      </div>

      <div class="product-card">
        <div class="product-card-header">
          <div class="product-card-eyebrow">Advanced · Privat</div>
          <div class="product-card-name">Kelas Lanjutan & Full Pendampingan</div>
          <div class="product-card-price">Rp 36 jt+ <span class="product-card-unit">/lab</span></div>
        </div>
        <div class="product-card-body">
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text">Untuk lab yang sudah selesai Tahap 1–4 dan siap daftar akreditasi KAN</div></div>
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text">Pendampingan audit kelayakan & simulasi asesmen intensif</div></div>
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text">Full pendampingan 150–200 jt tersedia untuk yang ingin nol hingga akreditasi</div></div>
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text">Host Laboratory Program untuk menjadi mitra & income generator</div></div>
          <a href="<?php echo $url_inhouse; ?>" class="product-card-cta cta-outline">Konsultasi kebutuhan lab</a>
        </div>
      </div>

      <!-- ANNUAL PARTNERSHIP CARD -->
      <div class="product-card" style="border-color:var(--teal);border-width:1.5px">
        <div class="product-card-header" style="background:linear-gradient(135deg,#085041,#0F6E56);position:relative">
          <div style="position:absolute;top:12px;right:12px;background:rgba(255,255,255,0.15);border:1px solid rgba(255,255,255,0.2);border-radius:5px;padding:3px 9px;font-size:9px;font-weight:700;letter-spacing:.07em;text-transform:uppercase;color:rgba(255,255,255,0.85)">Sudah Terakreditasi</div>
          <div class="product-card-eyebrow">Recurring · Tahunan</div>
          <div class="product-card-name">Annual Partnership</div>
          <div class="product-card-price" style="color:#4DD9A8">Rp 36 jt <span class="product-card-unit">/tahun</span></div>
        </div>
        <div class="product-card-body" style="background:var(--teal-pale)">
          <div style="background:rgba(26,158,117,0.12);border:1px solid rgba(26,158,117,0.2);border-radius:8px;padding:10px 12px;margin-bottom:14px">
            <p style="font-size:12px;color:#085041;line-height:1.5;font-style:italic">"Pastikan lab tetap terakreditasi tahun depan, tahun depannya lagi — tanpa memulai dari awal."</p>
          </div>
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text" style="color:#085041">Pendampingan onsite & kesiapan surveillance</div></div>
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text" style="color:#085041">Pelatihan premium + akses uji kompetensi untuk SDM</div></div>
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text" style="color:#085041">Free akses webinar & bootcamp 1 tahun</div></div>
          <div class="product-feature"><div class="feature-check">✓</div><div class="feature-text" style="color:#085041">Review & update dokumen mutu</div></div>
          <div style="margin-top:12px;padding-top:12px;border-top:1px solid rgba(26,158,117,0.2)">
            <p style="font-size:11px;color:var(--teal);font-weight:600;margin-bottom:4px">Tersedia untuk:</p>
            <div style="display:flex;gap:4px;flex-wrap:wrap">
              <span style="font-size:10px;padding:2px 7px;border-radius:3px;background:rgba(26,158,117,0.15);color:var(--teal);font-weight:600">Surveillance Lite · Surveillance Pro</span>
            </div>
          </div>
          <a href="<?php echo $url_inhouse; ?>#jaga" class="product-card-cta" style="background:var(--teal);color:white;margin-top:16px">Lihat paket tahunan</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ALUMNI SECTION -->
<section class="alumni-section" id="alumni">
  <div class="section-inner">
    <p class="section-eyebrow">Bukti Nyata</p>
    <h2 class="section-title">30+ Laboratorium<br>sudah membuktikannya.</h2>

    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-num">30<span class="stat-unit">+</span></div>
        <div class="stat-label">Laboratorium berhasil terakreditasi KAN bersama Labnesia</div>
      </div>
      <div class="stat-card">
        <div class="stat-num">15<span class="stat-unit">+</span></div>
        <div class="stat-label">Pakar aktif di 9 bidang laboratorium berbeda</div>
      </div>
      <div class="stat-card">
        <div class="stat-num">9</div>
        <div class="stat-label">Jenis lab: lingkungan, pangan, sipil, farmasi, kalibrasi, dll</div>
      </div>
      <div class="stat-card">
        <div class="stat-num">2x</div>
        <div class="stat-label">Lebih cepat dari jalur mandiri rata-rata</div>
      </div>
    </div>

    <div class="testimonial-grid">
      <div class="testimonial">
        <div class="testimonial-text">"Pendampingan yang dilakukan sangat baik dan menyenangkan, kami merasakan atmosfer kekeluargaan. Metode ini menjadi kunci kelancaran kami dalam proses Akreditasi KAN. Kami mendapat wawasan baru serta info terupdate seputar laboratorium."</div>
        <div class="testimonial-author">
          <div class="author-avatar">WS</div>
          <div>
            <div class="author-name">Wawan Abdullah Setiawan, S.Si., M.Si.</div>
            <div class="author-role">Ketua Divisi Biomolekuler · UPT Lab Terpadu Universitas Lampung</div>
          </div>
        </div>
      </div>
      <div class="testimonial">
        <div class="testimonial-text">"Dengan program Kelas Pendampingan, tim kami yang awalnya tidak paham alur akreditasi kini bisa menyusun seluruh dokumen mutu secara mandiri. Outputnya nyata — bukan hanya teori semata."</div>
        <div class="testimonial-author">
          <div class="author-avatar">RP</div>
          <div>
            <div class="author-name">Manajer Mutu Laboratorium</div>
            <div class="author-role">Laboratorium Pangan & Gizi · Universitas Negeri</div>
          </div>
        </div>
      </div>
    </div>

    <div class="lab-logos">
      <span style="font-size:13px;color:var(--gray-600);font-weight:600;">Lab yang sudah bergabung:</span>
      <span class="lab-logo-pill">UGM — Lab Teknologi Pertanian</span>
      <span class="lab-logo-pill">Universitas Jambi — Lab Terpadu</span>
      <span class="lab-logo-pill">Univ. Lampung — UPT Lab</span>
      <span class="lab-logo-pill">Univ. Sumatera Utara</span>
      <span class="lab-logo-pill">Lab BP2MHP Semarang</span>
      <span class="lab-logo-pill">PT Trusur Unggul Teknusa</span>
      <span class="lab-more">+24 laboratorium lainnya →</span>
    </div>
  </div>
</section>

<!-- INCOME GENERATOR TEASER -->
<section style="background:linear-gradient(135deg,#0F2845 0%,#0B1F3A 100%);padding:80px 48px;position:relative;overflow:hidden">
  <div style="position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:40px 40px"></div>
  <div style="max-width:1200px;margin:0 auto;position:relative;display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center">
    <div>
      <p style="font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--amber);margin-bottom:14px">🔬 Insight Khusus Pemilik Lab</p>
      <h2 style="font-size:36px;font-weight:800;color:white;line-height:1.15;letter-spacing:-0.8px;margin-bottom:18px">Alat Lab Sudah Ada.<br>Tapi Digunakan untuk Apa?</h2>
      <p style="font-size:16px;color:rgba(255,255,255,0.6);line-height:1.7;margin-bottom:28px">Banyak laboratorium punya alat canggih dan mahal, tapi belum tahu cara mengoptimalkannya menjadi layanan dan sumber pendapatan. Masalahnya bukan di alatnya — tapi di cara memetakan potensinya.</p>
      <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:28px">
        <span style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);color:rgba(255,255,255,0.7);font-size:12px;padding:6px 14px;border-radius:100px">Lab Lingkungan</span>
        <span style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);color:rgba(255,255,255,0.7);font-size:12px;padding:6px 14px;border-radius:100px">Lab Pangan & Gizi</span>
        <span style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);color:rgba(255,255,255,0.7);font-size:12px;padding:6px 14px;border-radius:100px">Lab Sipil</span>
        <span style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);color:rgba(255,255,255,0.7);font-size:12px;padding:6px 14px;border-radius:100px">+6 bidang lainnya</span>
      </div>
      <a href="<?php echo $url_optimasi; ?>" class="btn-primary">Pelajari Optimalisasi Lab Anda →</a>
    </div>
    <div style="background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:20px;padding:28px">
      <p style="font-size:11px;font-weight:700;color:rgba(255,255,255,0.4);letter-spacing:.08em;text-transform:uppercase;margin-bottom:18px">Alur optimalisasi yang kami bahas</p>
      <div style="display:flex;align-items:center;gap:6px;flex-wrap:wrap">
        <div style="background:rgba(26,158,117,0.15);border:1px solid rgba(26,158,117,0.3);border-radius:10px;padding:14px 16px;flex:1;min-width:90px;text-align:center"><p style="font-size:12px;font-weight:700;color:#4DD9A8">Punya Alat</p></div>
        <span style="color:rgba(255,255,255,0.3)">→</span>
        <div style="background:rgba(245,166,35,0.15);border:1px solid rgba(245,166,35,0.3);border-radius:10px;padding:14px 16px;flex:1;min-width:90px;text-align:center"><p style="font-size:12px;font-weight:700;color:var(--amber)">Parameter Uji</p></div>
        <span style="color:rgba(255,255,255,0.3)">→</span>
        <div style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);border-radius:10px;padding:14px 16px;flex:1;min-width:90px;text-align:center"><p style="font-size:12px;font-weight:700;color:rgba(255,255,255,0.7)">Produk</p></div>
        <span style="color:rgba(255,255,255,0.3)">→</span>
        <div style="background:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.15);border-radius:10px;padding:14px 16px;flex:1;min-width:90px;text-align:center"><p style="font-size:12px;font-weight:700;color:rgba(255,255,255,0.7)">Layanan</p></div>
        <span style="color:rgba(255,255,255,0.3)">→</span>
        <div style="background:rgba(26,158,117,0.2);border:1px solid rgba(26,158,117,0.4);border-radius:10px;padding:14px 16px;flex:1;min-width:90px;text-align:center"><p style="font-size:12px;font-weight:700;color:#4DD9A8">Income</p></div>
      </div>
      <p style="font-size:13px;color:rgba(255,255,255,0.4);margin-top:18px;line-height:1.6">Webinar tematik tersedia untuk 8+ bidang laboratorium — dari pemetaan instrumen, parameter uji, hingga strategi menjadikan lab sebagai unit layanan publik.</p>
    </div>
  </div>
</section>

<!-- JOURNEY / START SECTION -->
<section class="journey-section" id="mulai">
  <div class="section-inner">
    <p class="section-eyebrow" style="color:var(--teal-light);">Mulai dari mana?</p>
    <h2 class="section-title">Pilih titik masuk yang<br>paling nyaman untuk Anda.</h2>
    <p class="section-sub">Tidak ada tekanan. Mulai dari yang gratis, rasakan manfaatnya, dan putuskan langkah berikutnya bersama kami.</p>

    <div class="funnel-grid">
      <div class="funnel-step">
        <div class="funnel-icon" style="background:rgba(26,158,117,0.15);border-color:rgba(26,158,117,0.3);">🎯</div>
        <div class="funnel-num">Langkah 1</div>
        <div class="funnel-label">Kenali posisi lab Anda</div>
        <div class="funnel-sub">Gap Analysis gratis untuk tahu kondisi aktual lab Anda sekarang</div>
      </div>
      <div class="funnel-step">
        <div class="funnel-icon" style="background:rgba(245,166,35,0.15);border-color:rgba(245,166,35,0.3);">🤝</div>
        <div class="funnel-num">Langkah 2</div>
        <div class="funnel-label">Pilih program yang tepat</div>
        <div class="funnel-sub">Konsultasi 30 menit dengan tim kami — gratis, tanpa paksaan</div>
      </div>
      <div class="funnel-step">
        <div class="funnel-icon" style="background:rgba(255,255,255,0.1);border-color:rgba(255,255,255,0.15);">🏆</div>
        <div class="funnel-num">Langkah 3</div>
        <div class="funnel-label">Lab Anda terakreditasi KAN</div>
        <div class="funnel-sub">Dengan sistem mutu yang berjalan, bukan hanya dokumen yang ada</div>
      </div>
    </div>

    <div class="start-options" style="grid-template-columns:repeat(4,1fr)">
      <a href="<?php echo $url_gratis; ?>" class="start-option">
        <div class="start-option-tag">Mulai Hari Ini · Gratis</div>
        <div class="start-option-title">Daftar Gap Analysis Lab Saya</div>
        <div class="start-option-desc">Dapatkan laporan gap dokumen & teknis, penetapan ruang lingkup, dan roadmap implementasi. 100% gratis.</div>
        <div class="start-option-arrow">→</div>
      </a>
      <a href="<?php echo $url_gratis; ?>" class="start-option">
        <div class="start-option-tag">Butuh Informasi Dulu</div>
        <div class="start-option-title">Konsultasi 30 Menit Bersama Tim Kami</div>
        <div class="start-option-desc">Ceritakan kondisi lab Anda. Kami bantu petakan jalur terbaik tanpa komitmen apapun dari Anda.</div>
        <div class="start-option-arrow">→</div>
      </a>
      <a href="<?php echo $url_kelas; ?>" class="start-option">
        <div class="start-option-tag">Sudah Siap · Daftar Sekarang</div>
        <div class="start-option-title">Masuk ke Kelas Pendampingan</div>
        <div class="start-option-desc">Batch berikutnya dimulai bulan depan. Tempat terbatas — maks. 10 instansi per batch.</div>
        <div class="start-option-arrow">→</div>
      </a>
      <a href="<?php echo $url_inhouse; ?>" class="start-option" style="border-color:rgba(26,158,117,0.4);background:rgba(26,158,117,0.08)">
        <div class="start-option-tag" style="color:#4DD9A8">Sudah Terakreditasi KAN</div>
        <div class="start-option-title">Jaga Akreditasi dengan Annual Partnership</div>
        <div class="start-option-desc">Program tahunan untuk lab yang ingin tetap terakreditasi — tanpa memulai dari nol setiap tahun.</div>
        <div class="start-option-arrow">→</div>
      </a>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="site-footer">
  <div class="footer-inner" style="max-width:1100px;margin:0 auto;display:grid;grid-template-columns:2fr 1fr 1fr;gap:48px">
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

<!-- FLOATING CTA -->
<a href="<?php echo $url_gratis; ?>" class="float-cta" id="konsultasi">
  💬 Konsultasi Gratis
</a>

<script>
  // Subtle scroll effect for nav
  window.addEventListener('scroll', () => {
    const nav = document.querySelector('nav');
    if (window.scrollY > 50) {
      nav.style.borderBottomColor = 'rgba(255,255,255,0.12)';
    } else {
      nav.style.borderBottomColor = 'rgba(255,255,255,0.08)';
    }
  });

  // Journey map interactivity
  document.querySelectorAll('.journey-step').forEach(step => {
    step.addEventListener('click', () => {
      document.querySelectorAll('.journey-step').forEach(s => s.classList.remove('active'));
      step.classList.add('active');
    });
  });

  // Ladder interactivity
  document.querySelectorAll('.ladder-step').forEach(step => {
    step.addEventListener('click', () => {
      document.querySelectorAll('.ladder-step').forEach(s => s.classList.remove('active'));
      step.classList.add('active');
    });
  });
</script>

<?php wp_footer(); ?>
</body>
</html>

