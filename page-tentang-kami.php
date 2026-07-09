<?php
/*
Template Name: Tentang Kami
*/
if ( ! defined( 'ABSPATH' ) ) exit;
$misi = [
    [ 'icon'=>'graduation-cap', 'title'=>'Meningkatkan Kompetensi SDM Laboratorium', 'desc'=>'Melalui pelatihan dan sertifikasi berstandar nasional dan internasional.' ],
    [ 'icon'=>'building-2',     'title'=>'Mengembangkan Laboratorium sebagai Pusat Pembelajaran', 'desc'=>'Mendukung pengalaman belajar optimal dan pengembangan kompetensi SDM.' ],
    [ 'icon'=>'target',         'title'=>'Mendampingi Akreditasi ISO/IEC 17025:2017', 'desc'=>'Dengan pendekatan sistematis, terstruktur, dan aplikatif.' ],
    [ 'icon'=>'sparkles',       'title'=>'Mendorong Lab Jadi Income Generator', 'desc'=>'Melalui tata kelola yang efisien, berdampak, dan berkelanjutan.' ],
    [ 'icon'=>'users',          'title'=>'Membangun Ekosistem Kemitraan', 'desc'=>'Untuk menjamin penerapan sistem manajemen mutu yang konsisten.' ],
];

$pakar_dir = get_template_directory_uri() . '/assets/pakar/';
$experts = [
    [ 'photo'=>'Mulyono-S.T.P.webp', 'name'=>'Mulyono, S.T.P.', 'role'=>'Manajer Mutu Laboratorium · Konsultan Akreditasi', 'tags'=>['ISO 17025','Kimia'] ],
    [ 'photo'=>'Ir.-Fajri-Mulya-Iresha-S.T.-M.T.-Ph.D.-CLLI-CLIA.webp', 'name'=>'Ir. Fajri Mulya Iresha, S.T., M.T., Ph.D., CLLI, CLIA', 'role'=>'Trainer ISO/IEC 17025 · Lab Lingkungan', 'tags'=>['Lingkungan','CLIA'] ],
    [ 'photo'=>'Hanim-Zuhrotul-Amanah-S.T.P.-M.P.-Ph.D.webp', 'name'=>'Hanim Zuhrotul Amanah, S.T.P., M.P., Ph.D.', 'role'=>'Manajer Mutu Lab Pangan · Konsultan Akreditasi', 'tags'=>['Pangan','GLP'] ],
    [ 'photo'=>'Indra-Permana-S.P.-M.P.webp', 'name'=>'Indra Permana, S.P., M.P.', 'role'=>'Manajer Teknis · Kepala Lab Tanah', 'tags'=>['Pertanian','Ilmu Tanah'] ],
    [ 'photo'=>'Chandra-Pribadi-S.T.webp', 'name'=>'Chandra Pribadi, S.T.', 'role'=>'Manajer Mutu · Batu Bara &amp; Mineral', 'tags'=>['Mineral','Energi'] ],
    [ 'photo'=>'Bekti-Trisumaryati-S.Si_.-M.P.webp', 'name'=>'Bekti Trisumaryati, S.Si., M.P.', 'role'=>'Pakar Laboratorium', 'tags'=>[] ],
    [ 'photo'=>'Zulhamidi-S.Pd_.-M.T.webp', 'name'=>'Zulhamidi, S.Pd., M.T.', 'role'=>'Pakar Laboratorium', 'tags'=>[] ],
    [ 'photo'=>'Dr.-Joko-Nugroho-Wahyu-Karyadi-S.T.P.-M.Eng_.webp', 'name'=>'Dr. Joko Nugroho Wahyu Karyadi, S.T.P., M.Eng.', 'role'=>'Pakar Laboratorium', 'tags'=>[] ],
    [ 'photo'=>'Ivanda-Adrian-Sastrawijaya-S.T.webp', 'name'=>'Ivanda Adrian Sastrawijaya, S.T.', 'role'=>'Pakar Laboratorium', 'tags'=>[] ],
    [ 'photo'=>'Mohamad-Awaludin-S.Si-M.T.Pn_.webp', 'name'=>'Mohamad Awaludin, S.Si., M.T.Pn.', 'role'=>'Pakar Laboratorium', 'tags'=>[] ],
    [ 'photo'=>'Nova-Shintia-Bokau-S.Si_.webp', 'name'=>'Nova Shintia Bokau, S.Si.', 'role'=>'Pakar Laboratorium', 'tags'=>[] ],
    [ 'photo'=>'Dr. Yuni Kilawati, S.Pi, M.Si..webp', 'name'=>'Dr. Yuni Kilawati, S.Pi, M.Si.', 'role'=>'Pakar Laboratorium', 'tags'=>[] ],
];
?>
<?php get_header(); ?>
<style>
  .page-hero{background:var(--navy);padding:104px 48px 72px;text-align:center;position:relative;overflow:hidden}
  .page-hero::before{content:'';position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:40px 40px}
  .page-hero::after{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(26,158,117,0.15) 0%,transparent 60%)}
  .page-hero-inner{max-width:760px;margin:0 auto;position:relative;z-index:1}
  .eyebrow-tag{display:inline-block;background:rgba(26,158,117,0.15);border:1px solid rgba(26,158,117,0.3);color:var(--teal-light);padding:5px 16px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:20px}
  .page-hero h1{font-size:44px;font-weight:800;color:white;line-height:1.15;letter-spacing:-1.2px;margin-bottom:16px}
  .page-hero-sub{font-size:17px;color:rgba(255,255,255,0.6);line-height:1.7}

  .visi-section{padding:80px 48px;background:var(--navy);color:#fff;position:relative;overflow:hidden}
  .visi-section::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 100%,rgba(26,158,117,0.12) 0%,transparent 60%)}
  .visi-inner{max-width:1100px;margin:0 auto;position:relative;z-index:1}
  .eyebrow-light{font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--teal-light);margin-bottom:14px}
  .visi-title{font-size:32px;font-weight:800;line-height:1.3;letter-spacing:-0.6px;max-width:760px}
  .visi-title em{font-style:normal;color:var(--teal-light)}

  .misi-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:32px}
  .misi-card{padding:24px;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:16px;transition:background .2s}
  .misi-card:hover{background:rgba(255,255,255,0.09)}
  .misi-card-icon{margin-bottom:14px}
  .misi-card-title{font-size:16px;font-weight:700;color:#fff;line-height:1.35;margin-bottom:6px}
  .misi-card-desc{font-size:13px;color:rgba(255,255,255,0.55);line-height:1.6}

  .visi-quote{margin-top:64px;max-width:680px;margin-left:auto;margin-right:auto;text-align:center}
  .visi-quote blockquote{font-size:26px;font-weight:800;line-height:1.4;letter-spacing:-0.4px;margin:0 0 14px}
  .visi-quote blockquote em{font-style:normal;color:var(--teal-light)}
  .visi-quote cite{font-style:normal;color:rgba(255,255,255,0.5);font-size:14px}

  .about-cta{padding:72px 48px;background:#fff;text-align:center}
  .about-cta-inner{max-width:640px;margin:0 auto}
  .about-cta h2{font-size:32px;font-weight:800;color:var(--navy);line-height:1.25;letter-spacing:-0.6px;margin-bottom:28px}

  /* JARINGAN PAKAR CTA */
  .jaringan-section{padding:80px 48px;background:var(--navy);position:relative;overflow:hidden}
  .jaringan-section::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(26,158,117,0.15) 0%,transparent 60%)}
  .jaringan-inner{max-width:1000px;margin:0 auto;position:relative;z-index:1;display:flex;align-items:center;justify-content:space-between;gap:32px;flex-wrap:wrap}
  .jaringan-text{max-width:560px}
  .jaringan-text .eyebrow-light{margin-bottom:12px}
  .jaringan-text h2{font-size:28px;font-weight:800;color:#fff;line-height:1.3;letter-spacing:-0.5px;margin-bottom:12px}
  .jaringan-text p{font-size:15px;color:rgba(255,255,255,0.6);line-height:1.7}
  .jaringan-cta-actions{display:flex;flex-direction:column;gap:8px;align-items:flex-start}
  .jaringan-cta-actions .btn-primary{white-space:nowrap}
  .jaringan-cta-actions .jaringan-note{font-size:12px;color:rgba(255,255,255,0.45)}
  @media (max-width:768px){
    .jaringan-section{padding:48px 24px}
    .jaringan-inner{flex-direction:column;align-items:flex-start}
    .jaringan-cta-actions{align-items:flex-start;width:100%}
    .jaringan-cta-actions .btn-primary{width:100%;text-align:center}
  }

  /* PAKAR */
  .pakar-section{padding:72px 48px;background:var(--gray-50)}
  .pakar-inner{max-width:1200px;margin:0 auto;text-align:center}
  .pakar-inner .eyebrow{font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--teal);margin-bottom:10px}
  .pakar-inner .h2{font-size:32px;font-weight:800;color:var(--navy);line-height:1.2;letter-spacing:-0.6px;margin-bottom:36px}
  .pakar-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:24px;text-align:left}
  .pakar-card{background:#fff;border:1px solid var(--gray-200);border-radius:16px;overflow:hidden;transition:box-shadow .2s,transform .2s}
  .pakar-card:hover{box-shadow:0 12px 28px rgba(11,31,58,0.1);transform:translateY(-2px)}
  .pakar-photo{width:100%;aspect-ratio:1/1;object-fit:cover;display:block;background:var(--gray-100)}
  .pakar-body{padding:16px 18px 18px}
  .pakar-name{font-size:14px;font-weight:700;color:var(--navy);line-height:1.35;margin-bottom:4px}
  .pakar-role{font-size:12px;color:var(--gray-600);line-height:1.5;min-height:18px}
  .pakar-tags{display:flex;flex-wrap:wrap;gap:4px;margin-top:10px}
  .pakar-tag{font-size:10px;padding:2px 7px;background:var(--teal-pale);color:var(--teal);border-radius:3px;font-weight:600}
  .pakar-note{margin-top:36px;text-align:center;font-size:13px;color:var(--gray-600)}

  @media (max-width:1024px){ .misi-grid{grid-template-columns:repeat(2,1fr)} .pakar-grid{grid-template-columns:repeat(3,1fr)} }
  @media (max-width:768px){
    .page-hero{padding:88px 24px 56px}
    .page-hero h1{font-size:30px}
    .visi-section{padding:56px 24px}
    .visi-title{font-size:26px}
    .misi-grid{grid-template-columns:1fr}
    .visi-quote blockquote{font-size:20px}
    .about-cta{padding:48px 24px}
    .about-cta h2{font-size:26px}
    .pakar-section{padding:48px 24px}
    .pakar-grid{grid-template-columns:repeat(2,1fr);gap:16px}
  }
</style>

<!-- HERO -->
<div class="page-hero">
  <div class="page-hero-inner">
    <div class="eyebrow-tag">Tentang Kami</div>
    <h1>Mitra laboratorium terbaik bagi sektor pendidikan, pemerintah, dan industri.</h1>
    <p class="page-hero-sub">Labnesia adalah platform layanan pengembangan laboratorium yang berkomitmen meningkatkan mutu tata kelola serta kompetensi SDM laboratorium. Melalui pelatihan, sertifikasi, pendampingan akreditasi, serta kemitraan kompetensi terapan — kami membantu lab menjaga konsistensi mutu dan mencapai standar terbaiknya.</p>
  </div>
</div>

<!-- VISI & MISI -->
<section class="visi-section">
  <div class="visi-inner">
    <p class="eyebrow-light">Visi</p>
    <h2 class="visi-title">Membangun kompetensi SDM dan tata kelola laboratorium yang <em>unggul, terpercaya, dan berdampak.</em></h2>

    <div style="margin-top:56px">
      <p class="eyebrow-light">Misi</p>
      <div class="misi-grid">
        <?php foreach ( $misi as $m ) : ?>
        <div class="misi-card">
          <div class="misi-card-icon"><?php labnesia_icon( $m['icon'], 'var(--teal-light)', 28 ); ?></div>
          <div class="misi-card-title"><?php echo esc_html( $m['title'] ); ?></div>
          <div class="misi-card-desc"><?php echo esc_html( $m['desc'] ); ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="visi-quote">
      <blockquote>&ldquo;Lab yang baik bukan hanya akurat,<br>tapi juga <em>berdampak</em>.&rdquo;</blockquote>
      <cite>&mdash; Labnesia</cite>
    </div>
  </div>
</section>

<!-- PAKAR -->
<section class="pakar-section" id="pakar">
  <div class="pakar-inner">
    <p class="eyebrow">Tim Kami</p>
    <h2 class="h2">Dipandu oleh praktisi lab berpengalaman —<br>bukan hanya akademisi.</h2>
    <div class="pakar-grid">
      <?php foreach ( $experts as $e ) : ?>
      <div class="pakar-card">
        <img class="pakar-photo" src="<?php echo esc_url( $pakar_dir . rawurlencode( $e['photo'] ) ); ?>" alt="<?php echo esc_attr( $e['name'] ); ?>" loading="lazy">
        <div class="pakar-body">
          <div class="pakar-name"><?php echo esc_html( $e['name'] ); ?></div>
          <div class="pakar-role"><?php echo wp_kses_post( $e['role'] ); ?></div>
          <?php if ( ! empty( $e['tags'] ) ) : ?>
          <div class="pakar-tags">
            <?php foreach ( $e['tags'] as $tag ) : ?>
            <span class="pakar-tag"><?php echo esc_html( $tag ); ?></span>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <p class="pakar-note">15+ pakar aktif di 9 bidang laboratorium berbeda — sesuai bidang lab dan topik yang sedang berjalan.</p>
  </div>
</section>

<!-- JARINGAN PAKAR -->
<section class="jaringan-section">
  <div class="jaringan-inner">
    <div class="jaringan-text">
      <p class="eyebrow-light">Labnesia Expert Network</p>
      <h2>Punya keahlian di bidang laboratorium? Bergabunglah sebagai Pakar Labnesia.</h2>
      <p>Kami membuka pendaftaran Expert Network untuk dosen, pengelola lab, peneliti, hingga praktisi industri dan pemerintah — sepanjang tahun.</p>
    </div>
    <div class="jaringan-cta-actions">
      <a href="<?php echo esc_url( home_url( '/jaringan-pakar/' ) ); ?>" class="btn-primary">Gabung Jaringan Pakar &rarr;</a>
      <span class="jaringan-note">Pendaftaran terbuka sepanjang tahun, tanpa biaya.</span>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="about-cta">
  <div class="about-cta-inner">
    <h2>Siap menjadi bagian dari transformasi laboratorium Indonesia?</h2>
    <a href="<?php echo esc_url( home_url( '/kontak/' ) ); ?>" class="btn-primary">Mulai Konsultasi &rarr;</a>
  </div>
</section>

<?php get_footer(); ?>
