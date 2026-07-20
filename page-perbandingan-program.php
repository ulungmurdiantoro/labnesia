<?php
/*
Template Name: Perbandingan Program
*/
if ( ! defined( 'ABSPATH' ) ) exit;
$url_kelas     = esc_url( home_url( '/kelas-pendampingan/' ) );
$url_inhouse   = esc_url( home_url( '/inhouse/' ) );
$url_pelatihan = esc_url( home_url( '/pelatihan-sertifikasi/' ) );
$url_kontak    = esc_url( home_url( '/kontak/' ) );
$url_panduan   = esc_url( home_url( '/panduan-memilih/' ) );
?>
<?php get_header(); ?>
<style>
  .page-hero{background:var(--navy);padding:104px 48px 72px;text-align:center;position:relative;overflow:hidden}
  .page-hero::before{content:'';position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:40px 40px}
  .page-hero::after{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(26,158,117,0.15) 0%,transparent 60%)}
  .page-hero-inner{max-width:720px;margin:0 auto;position:relative;z-index:1}
  .eyebrow-tag{display:inline-block;background:rgba(26,158,117,0.15);border:1px solid rgba(26,158,117,0.3);color:var(--teal-light);padding:5px 16px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:20px}
  .page-hero h1{font-size:44px;font-weight:800;color:white;line-height:1.15;letter-spacing:-1.2px;margin-bottom:16px}
  .page-hero h1 .accent{color:var(--teal-light)}
  .page-hero-sub{font-size:17px;color:rgba(255,255,255,0.55);line-height:1.65}

  .comp-section{padding:64px 48px 80px;background:white}
  .comp-inner{max-width:1100px;margin:0 auto}
  .comp-wrap{overflow-x:auto}
  .comp-full{width:100%;border-collapse:collapse;min-width:700px}
  .comp-full th{padding:14px 20px;text-align:center;font-size:13px;font-weight:700;border-bottom:2px solid var(--gray-200);background:var(--gray-50)}
  .comp-full th:first-child{text-align:left}
  .comp-full th.col-featured{background:var(--teal);color:white;border-radius:12px 12px 0 0}
  .comp-full td{padding:14px 20px;text-align:center;font-size:14px;border-bottom:1px solid var(--gray-100)}
  .comp-full td:first-child{text-align:left;font-weight:600;color:var(--navy);font-size:13px}
  .comp-full tr:last-child td{border-bottom:none}
  .comp-full td.col-featured{background:rgba(26,158,117,0.04)}
  .check-yes{color:var(--teal);font-weight:700;font-size:16px}
  .check-no{color:var(--gray-300);font-size:16px}
  .check-partial{color:var(--amber);font-size:13px;font-weight:600}
  .price-tag{font-size:15px;font-weight:800;color:var(--navy)}
  .price-sub{font-size:11px;color:var(--gray-400);display:block}
  .comp-full tfoot td{padding:20px;background:var(--gray-50);font-size:13px}
  .comp-full tfoot td:first-child{font-weight:600;color:var(--gray-600)}
  .comp-cta-cell{background:var(--teal-pale) !important}
  .btn-comp{display:inline-block;padding:9px 20px;border-radius:8px;font-size:13px;font-weight:700;text-decoration:none;transition:all .2s}
  .btn-comp-primary{background:var(--teal);color:white}
  .btn-comp-primary:hover{background:#158a65}
  .btn-comp-ghost{background:transparent;color:var(--teal);border:1.5px solid var(--teal)}
  .btn-comp-ghost:hover{background:var(--teal-pale)}
  .btn-comp-outline{background:transparent;color:var(--gray-600);border:1.5px solid var(--gray-200)}
  .row-group-header td{background:var(--gray-50);font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--gray-400);padding:10px 20px}

  .comp-cta{padding:56px 48px;background:var(--gray-50);text-align:center}
  .comp-cta-inner{max-width:560px;margin:0 auto}
  .comp-cta h2{font-size:26px;font-weight:800;color:var(--navy);margin-bottom:10px;letter-spacing:-0.4px}
  .comp-cta p{font-size:14px;color:var(--gray-600);margin-bottom:22px}
  .comp-cta-actions{display:flex;gap:12px;justify-content:center;flex-wrap:wrap}

  @media(max-width:768px){
    .page-hero{padding:88px 24px 56px}
    .page-hero h1{font-size:28px}
    .comp-section{padding:40px 20px 56px}
    .comp-full{min-width:640px}
    .comp-cta{padding:40px 24px}
    .comp-cta h2{font-size:21px}
  }
</style>

<!-- HERO -->
<div class="page-hero">
  <div class="page-hero-inner">
    <div class="eyebrow-tag">Perbandingan Lengkap</div>
    <h1>Semua program, semua harga,<br><span class="accent">semua yang termasuk di dalamnya.</span></h1>
    <p class="page-hero-sub">Kami sengaja tampilkan ini secara terbuka. Transparansi adalah fondasi kepercayaan — dan kami membangun bisnis di atas itu.</p>
  </div>
</div>

<!-- COMPARISON TABLE -->
<section class="comp-section">
  <div class="comp-inner">
    <div class="comp-wrap">
      <table class="comp-full">
        <thead>
          <tr>
            <th style="min-width:180px">Aspek</th>
            <th>Mandiri</th>
            <th>Pelatihan &amp;<br>Sertifikasi</th>
            <th class="col-featured"><?php labnesia_icon( 'star', '#ffffff', 14 ); ?> Kelas Pendampingan<br><span style="font-weight:400;font-size:12px">Produk Unggulan</span></th>
            <th>Kelas Lanjutan<br>(Privat)</th>
            <th>Full<br>Pendampingan</th>
            <th style="background:#085041;color:white;border-radius:12px 12px 0 0;font-size:12px"><?php labnesia_icon( 'refresh-cw', '#ffffff', 14 ); ?> Annual Partnership<br><span style="font-weight:400;font-size:11px;opacity:.75">Lab sudah terakreditasi</span></th>
          </tr>
        </thead>
        <tbody>
          <tr class="row-group-header"><td colspan="7">Biaya &amp; Investasi</td></tr>
          <tr>
            <td>Investasi</td>
            <td><span class="price-tag">Rp 0</span><span class="price-sub">Modal waktu</span></td>
            <td><span class="price-tag">Rp 2–7 jt</span><span class="price-sub">Per orang</span></td>
            <td class="col-featured"><span class="price-tag">Rp 14jt</span><span class="price-sub">1 peserta/lab</span></td>
            <td><span class="price-tag">Rp 36 jt</span><span class="price-sub">Per lab</span></td>
            <td><span class="price-tag">Rp 150–200 jt</span><span class="price-sub">Per lab</span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="price-tag" style="color:#085041">Rp 36–70 jt</span><span class="price-sub">Per tahun · recurring</span></td>
          </tr>
          <tr>
            <td>Nilai benefit gratis</td>
            <td><span class="check-no">—</span></td>
            <td><span class="check-no">—</span></td>
            <td class="col-featured"><strong style="color:var(--teal)">s.d. Rp 20 jt</strong></td>
            <td><span class="check-no">—</span></td>
            <td><span class="check-partial">Termasuk biaya</span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span> Hemat 40% vs satuan</td>
          </tr>
          <tr class="row-group-header"><td colspan="7">Durasi &amp; Struktur</td></tr>
          <tr>
            <td>Durasi program</td>
            <td>2–4 tahun</td>
            <td>1–5 hari</td>
            <td class="col-featured"><strong>6 bulan terstruktur</strong></td>
            <td>2–3 bulan</td>
            <td>6–12 bulan</td>
            <td style="background:rgba(8,80,65,0.05)"><strong style="color:#085041">Tahunan · diperpanjang</strong></td>
          </tr>
          <tr>
            <td>Format pelaksanaan</td>
            <td>Mandiri</td>
            <td>Online / Offline</td>
            <td class="col-featured">Online + Hybrid</td>
            <td>Privat online</td>
            <td>In-house onsite</td>
            <td style="background:rgba(8,80,65,0.05)">Online + kunjungan berkala</td>
          </tr>
          <tr>
            <td>Jumlah peserta</td>
            <td>—</td>
            <td>Publik</td>
            <td class="col-featured"><strong>Maks. 10 instansi</strong></td>
            <td>1 lab (privat)</td>
            <td>1 lab (privat)</td>
            <td style="background:rgba(8,80,65,0.05)">1 lab (privat)</td>
          </tr>
          <tr class="row-group-header"><td colspan="7">Pendampingan &amp; Pakar</td></tr>
          <tr>
            <td>Pendampingan pakar aktif</td>
            <td><span class="check-no"><?php labnesia_icon( 'x', 'var(--gray-300)', 16 ); ?></span></td>
            <td><span class="check-partial">Selama pelatihan</span></td>
            <td class="col-featured"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span> <strong>15+ pakar, 6 bln</strong></td>
            <td><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
            <td><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span> Berkala per tahun</td>
          </tr>
          <tr>
            <td>Konsultasi privat 1-on-1</td>
            <td><span class="check-no"><?php labnesia_icon( 'x', 'var(--gray-300)', 16 ); ?></span></td>
            <td><span class="check-no"><?php labnesia_icon( 'x', 'var(--gray-300)', 16 ); ?></span></td>
            <td class="col-featured"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span> <strong>GRATIS</strong></td>
            <td><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
            <td><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
          </tr>
          <tr class="row-group-header"><td colspan="7">Output &amp; Deliverable</td></tr>
          <tr>
            <td>Output dokumen</td>
            <td><span class="check-no"><?php labnesia_icon( 'x', 'var(--gray-300)', 16 ); ?></span></td>
            <td><span class="check-no"><?php labnesia_icon( 'x', 'var(--gray-300)', 16 ); ?></span></td>
            <td class="col-featured"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span> <strong>Setiap sesi</strong></td>
            <td><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
            <td><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span> Review &amp; update</td>
          </tr>
          <tr>
            <td>Template dokumen ISO 17025</td>
            <td><span class="check-no"><?php labnesia_icon( 'x', 'var(--gray-300)', 16 ); ?></span></td>
            <td><span class="check-no"><?php labnesia_icon( 'x', 'var(--gray-300)', 16 ); ?></span></td>
            <td class="col-featured"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span> <strong>GRATIS</strong></td>
            <td><span class="check-partial">Tersedia</span></td>
            <td><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span> Included</td>
          </tr>
          <tr class="row-group-header"><td colspan="7">Sertifikasi &amp; Kompetensi</td></tr>
          <tr>
            <td>Sertifikat pelatihan (JP)</td>
            <td><span class="check-no"><?php labnesia_icon( 'x', 'var(--gray-300)', 16 ); ?></span></td>
            <td><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
            <td class="col-featured"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span> <strong>Setiap sesi</strong></td>
            <td><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
            <td><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
          </tr>
          <tr>
            <td>Pelatihan terkait uji kompetensi*</td>
            <td><span class="check-no"><?php labnesia_icon( 'x', 'var(--gray-300)', 16 ); ?></span></td>
            <td><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
            <td class="col-featured"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span> <strong>Voucher GRATIS*</strong></td>
            <td><span class="check-no"><?php labnesia_icon( 'x', 'var(--gray-300)', 16 ); ?></span></td>
            <td><span class="check-partial">Tersedia</span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span> Untuk SDM baru*</td>
          </tr>
          <tr class="row-group-header"><td colspan="7">Akses &amp; Komunitas</td></tr>
          <tr>
            <td>Akses webinar 1 tahun</td>
            <td><span class="check-no"><?php labnesia_icon( 'x', 'var(--gray-300)', 16 ); ?></span></td>
            <td><span class="check-no"><?php labnesia_icon( 'x', 'var(--gray-300)', 16 ); ?></span></td>
            <td class="col-featured"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span> <strong>GRATIS</strong></td>
            <td><span class="check-no"><?php labnesia_icon( 'x', 'var(--gray-300)', 16 ); ?></span></td>
            <td><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span> Full akses</td>
          </tr>
          <tr>
            <td>Grup diskusi nasional</td>
            <td><span class="check-no"><?php labnesia_icon( 'x', 'var(--gray-300)', 16 ); ?></span></td>
            <td><span class="check-no"><?php labnesia_icon( 'x', 'var(--gray-300)', 16 ); ?></span></td>
            <td class="col-featured"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span> Permanen</td>
            <td><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
            <td style="background:rgba(8,80,65,0.05)"><span class="check-yes"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></span></td>
          </tr>
          <tr class="row-group-header"><td colspan="7">Hasil Akhir</td></tr>
          <tr>
            <td>Target capaian</td>
            <td>Tidak pasti</td>
            <td>Kompetensi individu</td>
            <td class="col-featured"><strong>Siap Audit Internal</strong></td>
            <td><strong>Siap Asesmen KAN</strong></td>
            <td><strong>Siap Akreditasi</strong></td>
            <td style="background:rgba(8,80,65,0.05)"><strong style="color:#085041">Akreditasi terjaga tiap tahun</strong></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td>Mulai dari sini</td>
            <td><span class="check-partial">Butuh waktu panjang</span></td>
            <td><a href="<?php echo $url_pelatihan; ?>" class="btn-comp btn-comp-outline">Lihat jadwal</a></td>
            <td class="comp-cta-cell"><a href="<?php echo $url_kelas; ?>#daftar" class="btn-comp btn-comp-primary">Daftar Sekarang</a></td>
            <td><a href="<?php echo $url_kontak; ?>" class="btn-comp btn-comp-ghost">Konsultasi dulu</a></td>
            <td><a href="<?php echo $url_kontak; ?>" class="btn-comp btn-comp-ghost">Konsultasi dulu</a></td>
            <td style="background:rgba(8,80,65,0.08)"><a href="<?php echo $url_inhouse; ?>" class="btn-comp" style="background:#085041;color:white;border:none">Lihat paket <?php labnesia_icon( 'arrow-right', '#ffffff', 13 ); ?></a></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="comp-cta">
  <div class="comp-cta-inner">
    <h2>Masih bingung pilih yang mana?</h2>
    <p>Lihat panduan sederhana untuk menentukan titik masuk yang paling sesuai dengan kondisi dan anggaran lab Anda.</p>
    <div class="comp-cta-actions">
      <a href="<?php echo $url_panduan; ?>" class="btn-primary">Lihat Panduan Memilih</a>
      <a href="<?php echo $url_kontak; ?>" class="btn-ghost" style="color:var(--navy);border-color:var(--gray-200)">Konsultasi Langsung</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
