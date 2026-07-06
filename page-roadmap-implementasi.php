<?php
/*
Template Name: Roadmap Implementasi
*/
if ( ! defined( 'ABSPATH' ) ) exit;
$url_kelas  = esc_url( home_url( '/kelas-pendampingan/' ) );
$url_gratis = esc_url( home_url( '/mulai-gratis/' ) );
?>
<?php get_header(); ?>
<style>
  .page-hero{background:var(--navy);padding:104px 48px 72px;text-align:center;position:relative;overflow:hidden}
  .page-hero::before{content:'';position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:40px 40px}
  .page-hero::after{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(26,158,117,0.15) 0%,transparent 60%)}
  .page-hero-inner{max-width:760px;margin:0 auto;position:relative;z-index:1}
  .eyebrow-tag{display:inline-block;background:rgba(26,158,117,0.15);border:1px solid rgba(26,158,117,0.3);color:var(--teal-light);padding:5px 16px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:20px}
  .page-hero h1{font-size:40px;font-weight:800;color:white;line-height:1.2;letter-spacing:-1px;margin-bottom:16px}
  .page-hero h1 .accent{color:var(--teal-light)}
  .page-hero-sub{font-size:17px;color:rgba(255,255,255,0.55);line-height:1.65}

  .roadmap-section{padding:80px 48px;background:#fff;overflow-x:auto}
  .roadmap-inner{max-width:1200px;margin:0 auto;min-width:960px}

  /* 3 explicit rows: (1) pre-box + KAN annotation, (2) main chain, (3) post-box.
     Each cell is a self-contained flex-column wrapper (box/line/label stacked
     inside it), so no absolute-position guessing is needed to align things. */
  .rm-grid{display:grid;grid-template-columns:repeat(6,1fr);column-gap:6px;row-gap:0;align-items:start}

  .rm-box{border-radius:12px;color:#fff;font-weight:800;font-size:13px;line-height:1.35;text-align:center;padding:16px 14px;min-height:64px;display:flex;align-items:center;justify-content:center}
  .rm-box span{display:block;font-weight:600;font-size:12px;opacity:.85;margin-top:2px}
  .rm-red{background:#E03131}
  .rm-navy{background:var(--navy)}
  .rm-green{background:var(--teal)}
  .rm-vline{width:3px;height:22px;background:var(--navy);position:relative}
  .rm-vline::after{content:'';position:absolute;left:50%;bottom:-2px;transform:translateX(-50%);width:0;height:0;border-left:8px solid transparent;border-right:8px solid transparent;border-top:11px solid var(--navy)}

  .rm-pre{grid-column:1/2;grid-row:1;display:flex;flex-direction:column;align-items:center}

  .rm-kan-note{grid-column:5/7;grid-row:1;display:flex;flex-direction:column;align-items:center;padding:0 24px 8px}
  .rm-kan-label{font-size:12px;font-weight:700;color:var(--navy);text-align:center;margin-bottom:10px}
  .rm-kan-arrow{width:100%;height:3px;background:var(--navy);position:relative}
  .rm-kan-arrow::before,.rm-kan-arrow::after{content:'';position:absolute;top:50%;width:11px;height:11px;border:3px solid var(--navy)}
  .rm-kan-arrow::before{left:0;border-width:0 0 3px 3px;transform:translateY(-50%) rotate(45deg)}
  .rm-kan-arrow::after{right:0;border-width:3px 3px 0 0;transform:translateY(-50%) rotate(45deg)}

  .rm-step{grid-row:2;position:relative;padding:0 6px;display:flex;flex-direction:column;align-items:center}
  .rm-step + .rm-step::before{content:'';position:absolute;top:30px;left:-15px;width:13px;height:4px;background:var(--navy)}
  .rm-step + .rm-step::after{content:'';position:absolute;top:25px;left:-2px;width:0;height:0;border-top:7px solid transparent;border-bottom:7px solid transparent;border-left:9px solid var(--navy)}
  .rm-month{margin-top:14px;background:var(--gray-100);color:var(--navy);font-weight:700;font-size:12px;padding:6px 12px;border-radius:6px;white-space:nowrap}

  .rm-post{grid-column:6/7;grid-row:3;display:flex;flex-direction:column;align-items:center}

  .roadmap-cta{padding:64px 48px;background:var(--gray-50);text-align:center}
  .roadmap-cta-inner{max-width:560px;margin:0 auto}
  .roadmap-cta h2{font-size:28px;font-weight:800;color:var(--navy);margin-bottom:10px;letter-spacing:-0.4px}
  .roadmap-cta p{font-size:14px;color:var(--gray-600);margin-bottom:22px}
  .roadmap-cta-actions{display:flex;gap:12px;justify-content:center;flex-wrap:wrap}

  @media (max-width:768px){
    .page-hero{padding:88px 24px 56px}
    .page-hero h1{font-size:28px}
    .roadmap-section{padding:48px 24px}
    .roadmap-cta{padding:48px 24px}
  }
</style>

<!-- HERO -->
<div class="page-hero">
  <div class="page-hero-inner">
    <div class="eyebrow-tag">Roadmap Implementasi</div>
    <h1>Tahapan sistematis pendampingan<br>akreditasi ISO/IEC 17025:2017<br><span class="accent">bersama Labnesia.</span></h1>
    <p class="page-hero-sub">Peta jalan lengkap dari Gap Analysis hingga laboratorium Anda terakreditasi KAN — beserta estimasi waktu tiap tahap.</p>
  </div>
</div>

<!-- ROADMAP CHART -->
<section class="roadmap-section">
  <div class="roadmap-inner">
    <div class="rm-grid">

      <!-- Row 1, col 1: standalone pre-step -->
      <div class="rm-pre">
        <div class="rm-box rm-red">Pre Gap Analysis<span>(Klinik Labnesia)</span></div>
        <div class="rm-vline"></div>
      </div>

      <!-- Row 1, cols 5-6: KAN registration/assessment annotation -->
      <div class="rm-kan-note">
        <div class="rm-kan-label">Proses registrasi dan asesmen oleh KAN</div>
        <div class="rm-kan-arrow"></div>
      </div>

      <!-- Row 2: main 6-step chain -->
      <div class="rm-step">
        <div class="rm-box rm-navy">Gap Analysis dan Pelatihan ISO/IEC 17025</div>
        <div class="rm-month">Bulan ke 1</div>
      </div>
      <div class="rm-step">
        <div class="rm-box rm-navy">Penyusunan Dokumen Manajemen</div>
        <div class="rm-month">Bulan ke 1 – 2</div>
      </div>
      <div class="rm-step">
        <div class="rm-box rm-navy">Implementasi dan Pelatihan Teknis</div>
        <div class="rm-month">Bulan ke 3 – 8</div>
      </div>
      <div class="rm-step">
        <div class="rm-box rm-navy">Audit Internal dan Kaji Ulang Manajemen</div>
        <div class="rm-month">Bulan ke 8 – 9</div>
      </div>
      <div class="rm-step">
        <div class="rm-box rm-green">Finalisasi dan Pendaftaran KANMIS</div>
        <div class="rm-month">Bulan ke 10 – 12</div>
      </div>
      <div class="rm-step">
        <div class="rm-box rm-green">Persiapan dan Simulasi Asesmen</div>
        <div class="rm-month">Bulan ke 12</div>
      </div>

      <!-- Row 3, cols 5-6: standalone post-step -->
      <div class="rm-post">
        <div class="rm-vline"></div>
        <div class="rm-box rm-green">Penyelesaian Corrective Action Pasca Asesmen</div>
        <div class="rm-month">Sesuai dengan jadwal KAN</div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="roadmap-cta">
  <div class="roadmap-cta-inner">
    <h2>Ingin dipandu langsung melalui setiap tahap ini?</h2>
    <p>Kelas Pendampingan Labnesia membawa lab Anda melalui seluruh tahapan ini secara terstruktur, bersama pakar dan output nyata di setiap sesi.</p>
    <div class="roadmap-cta-actions">
      <a href="<?php echo $url_kelas; ?>" class="btn-primary">Lihat Kelas Pendampingan</a>
      <a href="<?php echo $url_gratis; ?>#gap-analysis" class="btn-ghost" style="color:var(--navy);border-color:var(--gray-200)">Mulai dari Gap Analysis Gratis</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
