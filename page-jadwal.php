<?php
/*
Template Name: Jadwal
*/
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php get_header(); ?>
<style>
  .page-hero{background:var(--navy);padding:104px 48px 72px;text-align:center;position:relative;overflow:hidden}
  .page-hero::before{content:'';position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:40px 40px}
  .page-hero::after{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(26,158,117,0.15) 0%,transparent 60%)}
  .page-hero-inner{max-width:680px;margin:0 auto;position:relative;z-index:1}
  .eyebrow-tag{display:inline-block;background:rgba(26,158,117,0.15);border:1px solid rgba(26,158,117,0.3);color:var(--teal-light);padding:5px 16px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:20px}
  .page-hero h1{font-size:44px;font-weight:800;color:white;line-height:1.15;letter-spacing:-1.2px;margin-bottom:16px}
  .page-hero h1 .accent{color:var(--teal-light)}
  .page-hero-sub{font-size:17px;color:rgba(255,255,255,0.55);line-height:1.65}

  .jadwal-empty{padding:96px 48px;background:var(--gray-50);text-align:center}
  .jadwal-empty-inner{max-width:520px;margin:0 auto}
  .jadwal-empty-icon{width:72px;height:72px;border-radius:50%;background:var(--teal-pale);display:flex;align-items:center;justify-content:center;margin:0 auto 24px}
  .jadwal-empty h2{font-size:24px;font-weight:800;color:var(--navy);margin-bottom:10px;letter-spacing:-0.4px}
  .jadwal-empty p{font-size:14px;color:var(--gray-600);line-height:1.7;margin-bottom:28px}
  .jadwal-empty-actions{display:flex;gap:12px;justify-content:center;flex-wrap:wrap}

  @media (max-width:768px){
    .page-hero{padding:88px 24px 56px}
    .page-hero h1{font-size:30px}
    .jadwal-empty{padding:64px 24px}
  }
</style>

<!-- HERO -->
<div class="page-hero">
  <div class="page-hero-inner">
    <div class="eyebrow-tag">Jadwal</div>
    <h1>Jadwal program &amp;<br><span class="accent">batch pelatihan.</span></h1>
    <p class="page-hero-sub">Kalender jadwal Kelas Pendampingan, Pelatihan &amp; Sertifikasi, dan webinar segera hadir di halaman ini.</p>
  </div>
</div>

<!-- EMPTY STATE -->
<section class="jadwal-empty">
  <div class="jadwal-empty-inner">
    <div class="jadwal-empty-icon"><?php labnesia_icon( 'calendar', 'var(--teal)', 30 ); ?></div>
    <h2>Segera hadir</h2>
    <p>Kami sedang menyiapkan halaman jadwal program secara lengkap. Sementara itu, hubungi tim kami langsung untuk info batch dan jadwal terdekat.</p>
    <div class="jadwal-empty-actions">
      <a href="<?php echo esc_url( home_url( '/kontak/' ) ); ?>" class="btn-primary">Tanya Jadwal Terdekat</a>
      <a href="<?php echo esc_url( home_url( '/mulai-gratis/' ) ); ?>" class="btn-ghost" style="color:var(--navy);border-color:var(--gray-200)">Mulai dari yang Gratis</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
