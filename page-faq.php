<?php
/*
Template Name: FAQ
*/
if ( ! defined( 'ABSPATH' ) ) exit;
$url_gratis  = esc_url( home_url( '/mulai-gratis/' ) );
$url_kontak  = esc_url( home_url( '/kontak/' ) );
?>
<?php get_header(); ?>
<style>
  /* PAGE HERO */
  .page-hero{background:var(--navy);padding:104px 48px 72px;text-align:center;position:relative;overflow:hidden}
  .page-hero::before{content:'';position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:40px 40px}
  .page-hero::after{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(77, 161, 169,0.15) 0%,transparent 60%)}
  .page-hero-inner{max-width:680px;margin:0 auto;position:relative;z-index:1}
  .eyebrow-tag{display:inline-block;background:rgba(77, 161, 169,0.15);border:1px solid rgba(77, 161, 169,0.3);color:var(--teal-light);padding:5px 16px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:20px}
  .page-hero h1{font-size:48px;font-weight:800;color:white;line-height:1.1;letter-spacing:-1.5px;margin-bottom:16px}
  .page-hero h1 .accent{color:var(--teal-light)}
  .page-hero-sub{font-size:17px;color:rgba(255,255,255,0.55);line-height:1.65;margin-bottom:32px}

  /* JUMP NAV */
  .jump-nav{background:var(--gray-50);border-bottom:1px solid var(--gray-200);padding:16px 48px;position:sticky;top:64px;z-index:80}
  .jump-nav-inner{max-width:1100px;margin:0 auto;display:flex;gap:8px;flex-wrap:wrap}
  .jump-btn{padding:7px 16px;border-radius:100px;font-size:13px;font-weight:600;text-decoration:none;border:1px solid var(--gray-200);color:var(--gray-600);background:white;cursor:pointer;transition:all .2s}
  .jump-btn:hover,.jump-btn.active{background:var(--navy);color:white;border-color:var(--navy)}

  .eyebrow{font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--teal);margin-bottom:10px}

  /* FAQ SECTIONS */
  .faq-section{padding:80px 48px;background:var(--gray-50)}
  .faq-inner{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:280px 1fr;gap:48px;align-items:start}
  .faq-nav{position:sticky;top:140px}
  .faq-nav-title{font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:var(--gray-400);margin-bottom:12px}
  .faq-nav-item{display:block;padding:10px 14px;border-radius:8px;font-size:14px;font-weight:500;color:var(--gray-600);text-decoration:none;transition:all .2s;cursor:pointer;border:none;background:none;width:100%;text-align:left;margin-bottom:2px}
  .faq-nav-item:hover{background:white;color:var(--navy)}
  .faq-nav-item.active{background:var(--navy);color:white;font-weight:600}
  .faq-group{margin-bottom:48px}
  .faq-group-title{font-size:20px;font-weight:800;color:var(--navy);margin-bottom:20px;padding-bottom:12px;border-bottom:2px solid var(--teal);display:flex;align-items:center;gap:10px}
  .faq-group-icon{font-size:22px}
  .faq-item{background:white;border:1px solid var(--gray-200);border-radius:12px;margin-bottom:10px;overflow:hidden}
  .faq-q{padding:15px 20px;font-size:15px;font-weight:700;color:var(--navy);cursor:pointer;display:flex;justify-content:space-between;align-items:center;gap:16px;transition:background .2s}
  .faq-q:hover{background:var(--gray-50)}
  .faq-chevron{font-size:16px;color:var(--gray-400);transition:transform .2s;flex-shrink:0}
  .faq-a{padding:0 22px 18px;font-size:15px;color:var(--gray-600);line-height:1.75;display:none}
  .faq-a.open{display:block}
  .faq-item.active .faq-q{background:var(--teal-pale)}
  .faq-item.active .faq-chevron{transform:rotate(180deg)}
  .faq-a strong{color:var(--navy)}
  .faq-a a{color:var(--teal);text-decoration:none}
  .faq-a a:hover{text-decoration:underline}
  .faq-highlight{background:var(--amber-pale);border:1px solid rgba(255, 236, 122,0.3);border-radius:8px;padding:14px 18px;margin-top:10px;font-size:13px;color:#6B4400}

  @media(max-width:768px){
    .page-hero{padding:88px 24px 56px}
    .page-hero h1{font-size:28px}
    .jump-nav{padding:14px 20px;top:56px}
    .jump-nav-inner{gap:6px}
    .jump-btn{font-size:12px;padding:6px 12px}
    .faq-section{padding:48px 20px}
    .faq-inner,.faq-inner[style]{grid-template-columns:1fr;gap:24px;padding:48px 20px!important}
    .faq-nav{position:static}
    .faq-group-title{font-size:17px}
  }
</style>

<!-- HERO -->
<div class="page-hero">
  <div class="page-hero-inner">
    <div class="eyebrow-tag">Pusat Informasi Lengkap</div>
    <h1>Semua jawaban<br><span class="accent">yang Anda butuhkan.</span></h1>
    <p class="page-hero-sub">Jawaban atas pertanyaan yang paling sering ditanyakan seputar program, harga, dan proses akreditasi. Tidak ada yang disembunyikan.</p>
  </div>
</div>

<!-- JUMP NAV -->
<div class="jump-nav">
  <div class="jump-nav-inner">
    <a class="jump-btn active" href="#faq-umum">FAQ Umum</a>
    <a class="jump-btn" href="#faq-produk">FAQ Program</a>
    <a class="jump-btn" href="#faq-akreditasi">FAQ Akreditasi</a>
    <a class="jump-btn" href="#faq-harga">FAQ Harga</a>
    <a class="jump-btn" href="<?php echo $url_kontak; ?>">Tanya Langsung</a>
  </div>
</div>


<!-- FAQ SECTION -->
<div class="faq-section">
  <div class="faq-inner" style="padding:80px 48px">
    <div class="faq-nav">
      <div class="faq-nav-title">Topik FAQ</div>
      <button class="faq-nav-item active" onclick="scrollToFaq('faq-umum',this)">Pertanyaan Umum</button>
      <button class="faq-nav-item" onclick="scrollToFaq('faq-produk',this)">Tentang Program</button>
      <button class="faq-nav-item" onclick="scrollToFaq('faq-akreditasi',this)">Tentang Akreditasi</button>
      <button class="faq-nav-item" onclick="scrollToFaq('faq-harga',this)">Harga &amp; Pembayaran</button>
      <button class="faq-nav-item" onclick="scrollToFaq('faq-teknis',this)">Teknis &amp; Logistik</button>

      <div style="margin-top:28px;padding:16px;background:var(--teal-pale);border-radius:10px;border:1px solid rgba(77, 161, 169,0.2)">
        <p style="font-size:12px;font-weight:700;color:var(--teal);margin-bottom:6px">Tidak menemukan jawaban?</p>
        <p style="font-size:12px;color:#085041;line-height:1.5;margin-bottom:10px">Tim kami siap membantu dalam 1×24 jam.</p>
        <a href="<?php echo $url_kontak; ?>" style="display:block;text-align:center;padding:8px;background:var(--teal);color:white;border-radius:7px;font-size:12px;font-weight:700;text-decoration:none">Tanya Tim <?php labnesia_icon( 'arrow-right', '#ffffff', 12 ); ?></a>
      </div>
    </div>

    <div class="faq-content-area">

      <!-- UMUM -->
      <div class="faq-group" id="faq-umum">
        <div class="faq-group-title"><span class="faq-group-icon"><?php labnesia_icon( 'message-circle', 'var(--teal)', 20 ); ?></span>Pertanyaan Umum</div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apa itu Labnesia dan apa yang membedakannya dari penyedia pelatihan lain? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Labnesia adalah Pusat Kompetensi ISO/IEC 17025 yang berfokus pada pelatihan, workshop, dan pendampingan implementasi sistem manajemen mutu bagi laboratorium pengujian dan kalibrasi di Indonesia. Yang membedakan kami: <strong>(1) output nyata</strong> di setiap sesi bukan hanya materi, <strong>(2) para pakar</strong> yang berpengalaman dalam implementasi sistem manajemen laboratorium, <strong>(3) model publik yang terjangkau</strong> dibanding pendampingan privat konvensional, dan <strong>(4) track record</strong> — 30+ laboratorium yang telah kami dampingi dalam membangun sistem mutu dan meraih akreditasi.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah Labnesia terakreditasi resmi? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Labnesia adalah penyelenggara pelatihan dan pendampingan implementasi sistem manajemen laboratorium. Untuk uji kompetensi perseorangan, Labnesia dapat bekerja sama dengan Lembaga Sertifikasi Profesi (LSP) maupun Lembaga Sertifikasi Person (LSP) seperti LSP Edukia, yang menyelenggarakan uji kompetensi secara independen sesuai SNI ISO/IEC 17024. <strong>Pendaftaran uji kompetensi dilakukan secara mandiri oleh peserta langsung kepada LSP terkait</strong> — Labnesia tidak mendaftarkan peserta dan tidak terlibat dalam proses asesmen maupun keputusan kelulusan. Pelatihan dan uji kompetensi merupakan dua kegiatan yang sepenuhnya independen.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Jenis laboratorium apa saja yang bisa mengikuti program Labnesia? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Program kami terbuka untuk semua jenis laboratorium yang ingin mendapatkan akreditasi ISO/IEC 17025 dari KAN, termasuk: Lab Lingkungan, Lab Pangan/Gizi/Halal, Lab Sipil, Lab Pertanian &amp; Pascapanen, Lab Farmasi/Kimia, Lab Biologi &amp; Mikrobiologi, Lab Kalibrasi, Lab Peternakan &amp; Perikanan, dan Lab Energi/Mineral. Kami juga melayani lab dari perguruan tinggi, industri swasta, BUMN, dan pemerintah.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah ada yang benar-benar gratis dari Labnesia? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Ya, beberapa hal yang benar-benar gratis: <strong>GAP Analysis</strong> (laporan kondisi lab + roadmap), <strong>Webinar Lab Talk</strong> mingguan, <strong>Download panduan &amp; template</strong> dasar, dan <strong>Komunitas</strong> Forum Lab Kompeten. Ini bukan gimmick — ini adalah bagian dari filosofi "give first" kami. Kami percaya lab yang sudah merasakan manfaatnya akan memutuskan sendiri.</p><a href="<?php echo $url_gratis; ?>">Akses semua yang gratis <?php labnesia_icon( 'arrow-right', 'var(--teal)', 15 ); ?></a></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apa hubungan Labnesia dengan LSP Edukia? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Labnesia dan LSP yang menjadi mitra kerja sama adalah dua entitas yang independen dengan peran berbeda. <strong>Labnesia</strong> menyelenggarakan pelatihan, workshop, dan pendampingan implementasi sistem manajemen laboratorium — bertujuan meningkatkan kompetensi peserta. Labnesia dapat bekerja sama dengan <strong>Lembaga Sertifikasi Profesi (LSP)</strong> maupun <strong>Lembaga Sertifikasi Person (LSP)</strong>, seperti LSP Edukia, yang menyelenggarakan uji kompetensi secara independen dan objektif sesuai SNI ISO/IEC 17024.</p><p style="margin-top:10px">Pelatihan yang diselenggarakan Labnesia dapat digunakan sebagai salah satu bentuk pemenuhan persyaratan administrasi untuk mengikuti uji kompetensi pada skema tertentu di LSP mitra. Namun, <strong>keikutsertaan dalam pelatihan Labnesia tidak menjamin kelulusan uji kompetensi</strong>, tidak memberikan jalur khusus, dan tidak memengaruhi keputusan asesmen. Pendaftaran uji kompetensi dilakukan secara mandiri oleh peserta langsung kepada LSP terkait, dan jadwal resmi uji kompetensi dipublikasikan melalui media LSP secara terpisah.</p></div></div>
      </div>

      <!-- PRODUK -->
      <div class="faq-group" id="faq-produk">
        <div class="faq-group-title"><span class="faq-group-icon"><?php labnesia_icon( 'book-open', 'var(--teal)', 20 ); ?></span>Tentang Program Kelas Pendampingan</div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apa perbedaan Kelas Pendampingan dengan pelatihan biasa? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Pelatihan biasa memberikan materi — peserta keluar dengan pengetahuan. Kelas Pendampingan memberikan output dokumen nyata di setiap sesi. Contoh: di sesi Ketidakpastian Pengujian, peserta tidak hanya belajar konsep — mereka langsung mengerjakan <strong>Laporan Ketidakpastian sesuai parameter lab masing-masing</strong>. Keluar dari sesi, dokumen sudah jadi dan siap digunakan. Inilah perbedaan utamanya.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Berapa sesi dalam Kelas Pendampingan dan berapa total jam pelatihan? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Total ada <strong>13 sesi</strong> yang tersebar dalam 4 tahap, dengan total <strong>64 JP (jam pelatihan)</strong>. Ini belum termasuk 40 JP pelatihan tambahan (sudah termasuk dalam paket) bertema Lead Implementer atau Auditor Internal ISO/IEC 17025, yang bertujuan meningkatkan kompetensi peserta dan dapat digunakan sebagai salah satu bentuk pemenuhan persyaratan administrasi untuk mengikuti uji kompetensi di LSP Edukia secara mandiri, sesuai ketentuan yang berlaku. Setiap sesi rata-rata 4 JP, dengan beberapa sesi teknis yang lebih panjang (8–16 JP).</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah saya harus hadir di semua sesi? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Kami sangat merekomendasikan kehadiran di semua sesi karena setiap sesi membangun fondasi untuk sesi berikutnya. Namun kami memahami ada kondisi tak terduga — rekaman sesi tersedia untuk peserta yang tidak dapat hadir. Untuk mendapatkan sertifikat setiap sesi, peserta perlu hadir minimal 80% dari durasi sesi tersebut.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah ada yang perlu disiapkan sebelum ikut Kelas Pendampingan? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Tidak ada prasyarat khusus. Yang perlu disiapkan: <strong>(1)</strong> Data laboratorium dasar (parameter pengujian, peralatan yang dimiliki, struktur organisasi), <strong>(2)</strong> Koneksi internet yang stabil untuk sesi online, dan <strong>(3)</strong> Komitmen waktu — setiap sesi biasanya dilaksanakan di akhir pekan atau hari kerja pagi. Kami juga menyarankan untuk mengikuti GAP Analysis gratis terlebih dahulu agar lebih siap.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Setelah Kelas Pendampingan (Tahap 1–4) selesai, apa langkah selanjutnya? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Setelah Tahap 1–4, lab Anda sudah memiliki semua dokumen mutu dan sudah melakukan Audit Internal. Langkah selanjutnya adalah <strong>mendaftar akreditasi ke KAN</strong> dan menghadapi proses asesmen. Untuk ini tersedia dua opsi: <strong>Kelas Lanjutan Privat (Rp 36 jt/lab)</strong> untuk pendampingan Tahap 5 secara intensif, atau Anda bisa mencoba secara mandiri dengan bekal yang sudah ada.</p></div></div>
      </div>

      <!-- AKREDITASI -->
      <div class="faq-group" id="faq-akreditasi">
        <div class="faq-group-title"><span class="faq-group-icon"><?php labnesia_icon( 'trophy', 'var(--teal)', 20 ); ?></span>Tentang Akreditasi KAN</div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah setelah mengikuti Kelas Pendampingan lab saya pasti terakreditasi? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Kelas Pendampingan Tahap 1–4 membawa lab Anda ke kondisi <strong>"siap Audit Internal"</strong> — bukan langsung terakreditasi. Proses akreditasi KAN adalah keputusan independen dari KAN setelah mereka melakukan asesmen. Yang kami pastikan: sistem mutu Anda sudah dibangun secara sistematis, dokumen sudah mengacu pada persyaratan standar, dan tim sudah mendapatkan pelatihan yang dibutuhkan. Keputusan akreditasi sepenuhnya berada di tangan KAN melalui proses asesmen yang independen.</p><div class="faq-highlight">Dari 30+ lab yang telah kami dampingi, mayoritas berhasil membangun sistem mutu yang solid dan meraih akreditasi KAN. Hasil asesmen sepenuhnya ditentukan oleh KAN secara independen.</div></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Berapa lama proses akreditasi KAN dari awal hingga mendapat sertifikat? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Secara keseluruhan, prosesnya berkisar 10–18 bulan: <strong>Persiapan sistem mutu</strong> (6 bulan dengan Kelas Pendampingan) + <strong>Pendaftaran di KANMIS</strong> (1–2 bulan) + <strong>Proses audit kecukupan KAN</strong> (1–3 bulan) + <strong>Asesmen lapangan KAN</strong> (1–3 bulan) + <strong>Terbitnya sertifikat</strong> (1–2 bulan). Total dengan jalur kami rata-rata <strong>12–15 bulan</strong>, lebih cepat dibanding jalur mandiri yang bisa 2–4 tahun.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apa saja jenis laboratorium yang bisa diakreditasi KAN? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>KAN memberikan akreditasi untuk dua jenis lab berdasarkan ISO/IEC 17025: <strong>Laboratorium Pengujian</strong> (menganalisis sampel untuk mengukur karakteristik) dan <strong>Laboratorium Kalibrasi</strong> (mengkalibrasi peralatan ukur). Semua bidang bisa diakreditasi — dari pangan, lingkungan, kimia, biologi, sipil, hingga energi dan mineral.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah ada biaya untuk proses akreditasi KAN sendiri? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Ya, ada biaya resmi dari KAN yang terpisah dari biaya program Labnesia. Biaya KAN biasanya berkisar antara Rp 3–15 juta tergantung jumlah parameter yang diakreditasi dan kompleksitas lab. Biaya ini dibayarkan langsung ke KAN, bukan ke Labnesia. Tim kami akan membantu menghitung estimasi biaya KAN untuk lab Anda selama program berlangsung.</p></div></div>
      </div>

      <!-- HARGA -->
      <div class="faq-group" id="faq-harga">
        <div class="faq-group-title"><span class="faq-group-icon"><?php labnesia_icon( 'banknote', 'var(--teal)', 20 ); ?></span>Harga &amp; Pembayaran</div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah harga di website ini adalah harga final? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Harga yang tertera adalah harga publik standar. Sesekali ada promo terbatas (early bird, promo Ramadhan, dll) yang berlaku sementara. Untuk kebutuhan instansi dengan multiple lab atau jumlah peserta besar, hubungi tim kami untuk mendiskusikan paket khusus. Kami percaya pada transparansi harga — tidak ada biaya tersembunyi.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah ada cicilan atau skema pembayaran bertahap? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Ya, tersedia skema pembayaran: <strong>(1) Lunas</strong> mendapat diskon tambahan 5%, <strong>(2) DP 50%</strong> di awal + pelunasan sebelum Sesi 4, <strong>(3) Cicilan 3×</strong> untuk institusi dengan surat komitmen. Hubungi tim kami untuk mengatur skema yang sesuai dengan alur pencairan anggaran institusi Anda.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah program ini bisa di-reimburse ke institusi / DIPA / anggaran dinas? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Ya, dan banyak peserta kami menggunakan jalur ini. Kami menyediakan: <strong>Invoice resmi</strong>, <strong>Kuitansi bermaterai</strong>, <strong>PKS (Perjanjian Kerja Sama)</strong>, dan <strong>Surat Keterangan Program</strong> sesuai kebutuhan dokumen pengadaan instansi Anda. Hubungi kami dan tim akan bantu mempersiapkan dokumen yang dibutuhkan untuk proses reimburse.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Ada refund jika saya tidak puas? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Kami berkomitmen pada kualitas. Jika setelah mengikuti 3 sesi pertama Anda merasa program tidak memberikan nilai yang dijanjikan, kami akan mendiskusikan solusi terbaik — termasuk kemungkinan pengembalian sebagian biaya atau penggantian sesi. Ini bukan sesuatu yang pernah kami hadapi, tapi komitmen ini kami pegang sungguh-sungguh.</p></div></div>
      </div>

      <!-- TEKNIS -->
      <div class="faq-group" id="faq-teknis">
        <div class="faq-group-title"><span class="faq-group-icon"><?php labnesia_icon( 'settings', 'var(--teal)', 20 ); ?></span>Teknis &amp; Logistik</div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Platform apa yang digunakan untuk sesi online? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Sesi online menggunakan <strong>Zoom</strong> atau <strong>Google Meet</strong>. Peserta hanya perlu laptop/PC dengan kamera dan mikrofon. Untuk sesi Hybrid (di host laboratory), peserta bisa hadir langsung di lokasi host atau bergabung secara online.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Kapan jadwal sesi? Apakah bisa disesuaikan dengan jam kerja? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Jadwal sesi biasanya dilaksanakan <strong>Sabtu atau Minggu pagi</strong> (08.00–12.00 atau 13.00–17.00 WIB) untuk meminimalkan gangguan jam kerja. Beberapa sesi bisa dilaksanakan hari kerja jika mayoritas peserta batch tersebut menyetujui. Jadwal final ditetapkan di awal batch bersama seluruh peserta.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah rekaman sesi tersedia? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Ya, semua sesi direkam dan tersedia di platform peserta dalam 48 jam setelah sesi berlangsung. Akses rekaman berlaku selama 1 tahun penuh dari tanggal batch dimulai.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Bagaimana dengan peserta dari luar Jawa atau daerah terpencil? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Program ini dirancang online sehingga bisa diikuti dari mana saja di Indonesia. Kami sudah memiliki peserta dari Papua, Kalimantan, Sulawesi, NTT, dan Aceh. Yang dibutuhkan hanya koneksi internet yang cukup stabil. Untuk sesi yang ada komponen hybrid (kunjungan host lab), peserta dari luar kota bisa tetap mengikuti secara online atau memanfaatkan Lab Host yang lebih dekat dengan lokasi mereka.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Berapa lama respon setelah mendaftar GAP Analysis gratis? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Tim kami akan merespons dan menjadwalkan sesi GAP Analysis Anda dalam <strong>maksimal 3 hari kerja</strong> setelah pendaftaran. Untuk laboratorium dengan kebutuhan mendesak (misalnya menghadapi tenggat surveillance atau deadline pengajuan akreditasi), sebutkan kondisi tersebut saat mendaftar agar tim dapat memprioritaskan jadwal Anda.</p></div></div>
        <div class="faq-item"><div class="faq-q" onclick="toggleFaq(this)">Apakah GAP Analysis dan pendampingan bisa dilakukan onsite (langsung di lab)? <span class="faq-chevron"><?php labnesia_icon( 'chevron-down', 'var(--teal)', 16 ); ?></span></div><div class="faq-a"><p>Ya. GAP Analysis dan sesi pendampingan dapat dilaksanakan secara <strong>online maupun onsite (langsung di tempat)</strong> sesuai kebutuhan dan kesepakatan dengan laboratorium. Metode online lebih fleksibel dan efisien dari segi biaya, sementara metode onsite memungkinkan tim kami melihat langsung kondisi fasilitas, peralatan, dan proses kerja di lapangan. Untuk laboratorium di luar Jawa, kombinasi keduanya (sebagian online, sebagian onsite) juga dapat diatur.</p></div></div>
      </div>

    </div>
  </div>
</div>

<script>
function toggleFaq(el){
  const item=el.parentElement;
  const ans=item.querySelector('.faq-a');
  const isOpen=ans.classList.contains('open');
  document.querySelectorAll('.faq-a').forEach(a=>a.classList.remove('open'));
  document.querySelectorAll('.faq-item').forEach(i=>i.classList.remove('active'));
  if(!isOpen){ans.classList.add('open');item.classList.add('active')}
}
function scrollToFaq(id,btn){
  document.getElementById(id).scrollIntoView({behavior:'smooth',block:'start'});
  document.querySelectorAll('.faq-nav-item').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
}
document.querySelectorAll('.jump-btn').forEach(btn=>{
  btn.addEventListener('click',function(){
    document.querySelectorAll('.jump-btn').forEach(b=>b.classList.remove('active'));
    this.classList.add('active');
  });
});
</script>
<?php get_footer(); ?>
