<?php
/*
Template Name: Panduan Memilih
*/
if ( ! defined( 'ABSPATH' ) ) exit;
$url_kelas   = esc_url( home_url( '/kelas-pendampingan/' ) );
$url_gratis  = esc_url( home_url( '/mulai-gratis/' ) );
$url_kontak  = esc_url( home_url( '/kontak/' ) );
$url_banding = esc_url( home_url( '/perbandingan-program/' ) );
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

  .decision-section{padding:64px 48px 80px;background:white}
  .decision-inner{max-width:1100px;margin:0 auto}
  .decision-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
  .decision-card{border-radius:16px;overflow:hidden;border:1px solid var(--gray-200)}
  .decision-header{padding:24px;position:relative}
  .decision-num{font-size:40px;font-weight:800;opacity:.15;position:absolute;top:10px;right:16px}
  .decision-tag{font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:8px}
  .decision-title{font-size:20px;font-weight:800;line-height:1.2;margin-bottom:6px}
  .decision-price{font-size:15px;font-weight:700}
  .decision-body{padding:24px;background:var(--gray-50)}
  .decision-fit{margin-bottom:14px}
  .decision-fit-title{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.06em;color:var(--gray-400);margin-bottom:8px}
  .fit-item{display:flex;align-items:flex-start;gap:8px;margin-bottom:6px;font-size:13px;color:var(--gray-600)}
  .fit-check{color:var(--teal);font-weight:700;flex-shrink:0;margin-top:2px}
  .decision-body .btn{display:block;text-align:center;padding:11px;border-radius:9px;font-size:14px;font-weight:700;text-decoration:none;margin-top:16px;transition:all .2s}
  .btn-teal-d{background:var(--teal);color:white}
  .btn-teal-d:hover{background:#158a65}
  .btn-navy-d{background:var(--navy);color:white}
  .btn-navy-d:hover{background:#0f2845}
  .btn-outline-d{background:transparent;color:var(--teal);border:1.5px solid var(--teal)}
  .btn-outline-d:hover{background:var(--teal-pale)}
  .d-free{background:var(--teal-pale)}
  .d-free .decision-tag{color:var(--teal)}
  .d-free .decision-title{color:#085041}
  .d-free .decision-price{color:var(--teal)}
  .d-core{background:var(--navy)}
  .d-core .decision-num{color:white}
  .d-core .decision-tag{color:var(--teal-light)}
  .d-core .decision-title{color:white}
  .d-core .decision-price{color:var(--amber)}
  .d-premium{background:var(--amber-pale)}
  .d-premium .decision-tag{color:#8B5800}
  .d-premium .decision-title{color:var(--navy)}
  .d-premium .decision-price{color:#6B4400}

  .decision-cta{padding:56px 48px;background:var(--gray-50);text-align:center}
  .decision-cta-inner{max-width:560px;margin:0 auto}
  .decision-cta h2{font-size:26px;font-weight:800;color:var(--navy);margin-bottom:10px;letter-spacing:-0.4px}
  .decision-cta p{font-size:14px;color:var(--gray-600);margin-bottom:22px}
  .decision-cta-actions{display:flex;gap:12px;justify-content:center;flex-wrap:wrap}

  @media (max-width:1024px){ .decision-grid{grid-template-columns:1fr} }
</style>

<!-- HERO -->
<div class="page-hero">
  <div class="page-hero-inner">
    <div class="eyebrow-tag">Panduan Memilih</div>
    <h1>Tidak yakin harus mulai<br><span class="accent">dari mana? Ini panduannya.</span></h1>
    <p class="page-hero-sub">Jawab pertanyaan sederhana ini: seberapa siap lab Anda, dan berapa anggaran yang tersedia?</p>
  </div>
</div>

<!-- DECISION GUIDE -->
<section class="decision-section">
  <div class="decision-inner">
    <div class="decision-grid">
      <div class="decision-card">
        <div class="decision-header d-free">
          <div class="decision-num">01</div>
          <div class="decision-tag">Anggaran nol atau sangat terbatas</div>
          <div class="decision-title">Mulai dari yang gratis dulu.</div>
          <div class="decision-price">100% Gratis</div>
        </div>
        <div class="decision-body">
          <div class="decision-fit">
            <div class="decision-fit-title">Cocok jika...</div>
            <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Belum ada anggaran dari institusi</div>
            <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Masih tahap eksplorasi dan orientasi</div>
            <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Ingin tahu dulu kondisi lab sebelum commit</div>
            <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Mahasiswa atau fresh graduate</div>
          </div>
          <div style="font-size:13px;font-weight:700;color:var(--teal);margin-bottom:8px">Yang bisa dilakukan sekarang:</div>
          <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>GAP Analysis gratis</div>
          <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Webinar Lab Talk mingguan</div>
          <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Download panduan &amp; template</div>
          <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Bergabung ke komunitas</div>
          <a href="<?php echo $url_gratis; ?>" class="btn btn-outline-d">Akses yang gratis <?php labnesia_icon( 'arrow-right', 'var(--teal)', 14 ); ?></a>
        </div>
      </div>

      <div class="decision-card">
        <div class="decision-header d-core">
          <div class="decision-num">02</div>
          <div class="decision-tag">Anggaran tersedia, ingin hasil nyata</div>
          <div class="decision-title">Kelas Pendampingan adalah pilihan terbaik.</div>
          <div class="decision-price">Rp 14–35 jt / lab</div>
        </div>
        <div class="decision-body">
          <div class="decision-fit">
            <div class="decision-fit-title">Cocok jika...</div>
            <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Lab belum terakreditasi dan ingin mulai</div>
            <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Punya Rp 14–35 jt tapi tidak mampu Rp 150+ jt</div>
            <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Butuh pendampingan terstruktur 6 bulan</div>
            <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Ingin hasil: siap audit internal KAN</div>
          </div>
          <div style="font-size:13px;font-weight:700;color:var(--teal-light);margin-bottom:8px">Rekomendasi paket:</div>
          <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>3 peserta (Rp 35 jt) — Manajer Mutu + Teknis + Admin</div>
          <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Hemat s.d. Rp 20 jt dari nilai benefit</div>
          <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Batch Juli 2026 — sisa 4 slot</div>
          <a href="<?php echo $url_kelas; ?>#daftar" class="btn btn-teal-d">Daftar Sekarang <?php labnesia_icon( 'arrow-right', '#ffffff', 14 ); ?></a>
        </div>
      </div>

      <div class="decision-card">
        <div class="decision-header d-premium">
          <div class="decision-num">03</div>
          <div class="decision-tag">Anggaran besar, butuh hasil cepat</div>
          <div class="decision-title">Kelas Lanjutan atau Full Pendampingan.</div>
          <div class="decision-price">Rp 36 jt – 200 jt</div>
        </div>
        <div class="decision-body">
          <div class="decision-fit">
            <div class="decision-fit-title">Cocok jika...</div>
            <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Sudah selesai Tahap 1–4 dan siap daftar KAN</div>
            <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Butuh pendampingan intensif &amp; privat</div>
            <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Institusi punya anggaran besar untuk IHT</div>
            <div class="fit-item"><div class="fit-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></div>Target akreditasi dalam 6–8 bulan ke depan</div>
          </div>
          <div style="font-size:13px;color:var(--gray-600);margin-top:12px;line-height:1.5">Kelas Lanjutan Privat diperuntukkan bagi yang sudah menyelesaikan Kelas Pendampingan Tahap 1–4.</div>
          <a href="<?php echo $url_kontak; ?>" class="btn btn-navy-d">Konsultasi kebutuhan <?php labnesia_icon( 'arrow-right', '#ffffff', 14 ); ?></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="decision-cta">
  <div class="decision-cta-inner">
    <h2>Ingin lihat rincian lengkap tiap program?</h2>
    <p>Bandingkan harga, durasi, dan output setiap program secara berdampingan sebelum memutuskan.</p>
    <div class="decision-cta-actions">
      <a href="<?php echo $url_banding; ?>" class="btn-primary">Lihat Perbandingan Program</a>
      <a href="<?php echo $url_kontak; ?>" class="btn-ghost" style="color:var(--navy);border-color:var(--gray-200)">Konsultasi Langsung</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
