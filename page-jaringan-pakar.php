<?php
/*
Template Name: Jaringan Pakar
*/
if ( ! defined( 'ABSPATH' ) ) exit;

$roles = [
    [ 'icon'=>'mic',        'title'=>'Narasumber & Expert Speaker', 'desc'=>'Berbagi keahlian sebagai narasumber pada pelatihan, webinar, dan program Labnesia lainnya.' ],
    [ 'icon'=>'handshake',  'title'=>'Pendamping Strategic Mentoring', 'desc'=>'Mendampingi laboratorium — termasuk lab perguruan tinggi — dalam program strategic mentoring menuju standar ISO/IEC 17025.' ],
    [ 'icon'=>'users',      'title'=>'Kontributor Ekosistem', 'desc'=>'Ikut mengembangkan ekosistem laboratorium Indonesia yang produktif, terstandar, dan berdampak.' ],
];

$benefits = [
    [ 'title'=>'Bagian dari Labnesia Expert Network', 'desc'=>'Bergabung dalam jaringan pakar laboratorium nasional lintas institusi.' ],
    [ 'title'=>'Profil tampil di Platform Labnesia', 'desc'=>'Keahlian dan rekam jejak Anda dipublikasikan pada platform resmi Labnesia.' ],
    [ 'title'=>'Kesempatan menjadi Trainer / Mentor', 'desc'=>'Terlibat langsung sebagai trainer atau mentor pada program-program Labnesia.' ],
    [ 'title'=>'Akses prioritas ke Pelatihan', 'desc'=>'Mendapat prioritas untuk mengikuti program-program pelatihan Labnesia.' ],
    [ 'title'=>'Kolaborasi jejaring laboratorium nasional', 'desc'=>'Terhubung dengan jejaring laboratorium perguruan tinggi dan industri se-Indonesia.' ],
    [ 'title'=>'Berdampak bagi industri & masyarakat', 'desc'=>'Berkontribusi nyata membangun laboratorium yang produktif dan terstandar.' ],
];

$fields = [ 'Lingkungan','Sipil','Kimia','Farmasi / Kesehatan','Pangan, Gizi & Halal','Pertanian & Pascapanen','Peternakan / Perikanan','Material','Energi','Biologi / Mikrobiologi','Kalibrasi','Manajemen Bisnis Lab','Bidang lainnya' ];

$faqs = [
    [ 'q'=>'Siapa saja yang bisa mendaftar?', 'a'=>'Jalur perguruan tinggi terbuka untuk dosen, tenaga kependidikan, kepala/pengelola laboratorium, serta peneliti dan praktisi laboratorium. Jalur industri terbuka untuk praktisi lab industri, pemerintah, swasta, serta seluruh praktisi di bidang lab, GLP, ISO 17025, dan QC/QA.' ],
    [ 'q'=>'Apakah pendaftaran berbayar?', 'a'=>'Tidak. Pendaftaran Labnesia Expert Network tidak dipungut biaya. Anda cukup mengisi formulir pendaftaran daring.' ],
    [ 'q'=>'Apa perbedaan kedua jalur pendaftaran?', 'a'=>'Perbedaannya hanya pada latar belakang pendaftar: jalur perguruan tinggi untuk sivitas akademika, dan jalur industri untuk praktisi dari industri, swasta, serta laboratorium pemerintah. Peran dan benefit yang diperoleh pada dasarnya sama.' ],
    [ 'q'=>'Kapan pendaftaran dibuka?', 'a'=>'Pendaftaran Labnesia Expert Network terbuka sepanjang tahun. Anda dapat mengisi formulir pendaftaran kapan saja.' ],
    [ 'q'=>'Bagaimana proses setelah mendaftar?', 'a'=>'Tim Labnesia akan melakukan kurasi terhadap profil dan bidang keahlian Anda, kemudian menghubungi Anda melalui email atau WhatsApp untuk tahap selanjutnya.' ],
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
  .page-hero h1 .accent{color:var(--teal-light)}
  .page-hero-sub{font-size:17px;color:rgba(255,255,255,0.6);line-height:1.7;margin-bottom:32px}
  .page-hero-ctas{display:flex;flex-wrap:wrap;gap:12px;justify-content:center}

  .eyebrow{font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--teal);margin-bottom:10px}
  .sec-head{max-width:640px;margin:0 auto 36px;text-align:center}
  .sec-head h2{font-size:32px;font-weight:800;color:var(--navy);line-height:1.25;letter-spacing:-0.6px;margin-bottom:10px}
  .sec-head p{font-size:15px;color:var(--gray-600);line-height:1.6}

  /* TRACKS (jalur pendaftaran) */
  .tracks-wrap{max-width:1000px;margin:-64px auto 0;padding:0 24px;position:relative;z-index:2}
  .track-card{background:#fff;border-radius:18px;box-shadow:0 18px 40px rgba(11,31,58,0.14);overflow:hidden;border:1px solid var(--gray-200)}
  .track-tabs{display:flex}
  .track-tab{flex:1;font-weight:700;font-size:15px;padding:18px 12px;border:none;cursor:pointer;background:var(--gray-50);color:var(--gray-600);border-bottom:4px solid transparent;transition:background .15s,color .15s}
  .track-tab[aria-selected="true"]{background:#fff;color:var(--navy);border-bottom-color:var(--teal)}
  .track-panel{display:none;padding:36px;gap:32px}
  .track-panel.active{display:grid;grid-template-columns:1.15fr .85fr}
  @media(max-width:820px){.track-panel.active{grid-template-columns:1fr}.track-panel{padding:24px}}
  .track-panel h3{font-size:20px;font-weight:800;color:var(--navy);margin-bottom:6px}
  .track-panel .sub{color:var(--gray-600);font-size:14px;margin-bottom:20px}
  .invite-list{list-style:none;display:grid;gap:10px;margin-bottom:0}
  .invite-list li{display:flex;align-items:center;gap:10px;background:var(--navy);color:#fff;font-weight:600;font-size:13px;border-radius:100px;padding:10px 18px;width:fit-content;max-width:100%}
  .track-side{background:var(--teal-pale);border:1px solid rgba(26,158,117,0.25);border-radius:14px;padding:24px;align-self:start}
  .track-side .label{font-weight:700;font-size:11px;letter-spacing:.1em;text-transform:uppercase;color:var(--teal);margin-bottom:6px}
  .track-side .date{font-weight:800;font-size:19px;color:var(--navy);margin-bottom:14px}
  .track-side p{font-size:13px;color:var(--gray-600);line-height:1.6;margin-bottom:18px}
  .track-side .btn-primary{width:100%;text-align:center}
  .form-url{display:block;margin-top:12px;font-size:12px;color:var(--gray-600);word-break:break-all;text-align:center}

  /* PERAN */
  .roles-section{padding:80px 48px}
  .roles{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:repeat(3,1fr);gap:20px}
  @media(max-width:820px){.roles{grid-template-columns:1fr}}
  .role-card{background:#fff;border:1px solid var(--gray-200);border-radius:16px;padding:28px}
  .role-card .icon-tile{width:52px;height:52px;border-radius:12px;display:flex;align-items:center;justify-content:center;background:var(--navy);margin-bottom:16px}
  .role-card h3{font-size:17px;font-weight:700;color:var(--navy);margin-bottom:8px}
  .role-card p{font-size:13.5px;color:var(--gray-600);line-height:1.6}

  /* BENEFIT */
  .benefit-section{padding:80px 48px;background:var(--navy);color:#fff;position:relative;overflow:hidden}
  .benefit-section::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(26,158,117,0.12) 0%,transparent 60%)}
  .benefit-inner{max-width:1100px;margin:0 auto;position:relative;z-index:1}
  .benefit-section .sec-head h2{color:#fff}
  .benefit-section .sec-head p{color:rgba(255,255,255,0.6)}
  .benefits{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
  @media(max-width:760px){.benefits{grid-template-columns:1fr}}
  .benefit-item{display:flex;gap:14px;align-items:flex-start;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);border-radius:14px;padding:20px 22px}
  .benefit-item strong{display:block;font-size:14.5px;color:#fff;margin-bottom:4px}
  .benefit-item span{font-size:13px;color:rgba(255,255,255,0.55);line-height:1.6}

  /* BIDANG */
  .fields-section{padding:80px 48px;background:var(--gray-50)}
  .fields-inner{max-width:1000px;margin:0 auto;text-align:center}
  .fields{display:flex;flex-wrap:wrap;gap:10px;justify-content:center}
  .field-chip{display:inline-flex;align-items:center;gap:8px;background:#fff;border:1.5px solid rgba(26,158,117,0.3);color:var(--navy);font-weight:600;font-size:13px;border-radius:100px;padding:9px 18px}
  .field-chip::before{content:'';width:7px;height:7px;border-radius:50%;background:var(--teal)}

  /* FAQ */
  .faq-jp-section{padding:80px 48px}
  .faq-jp{max-width:760px;margin:0 auto}
  .faq-jp details{background:#fff;border:1px solid var(--gray-200);border-radius:14px;margin-bottom:10px;overflow:hidden}
  .faq-jp summary{font-weight:700;color:var(--navy);padding:18px 22px;cursor:pointer;list-style:none;position:relative;font-size:15px}
  .faq-jp summary::-webkit-details-marker{display:none}
  .faq-jp summary::after{content:'+';position:absolute;right:22px;top:50%;transform:translateY(-50%);font-size:20px;color:var(--teal);transition:transform .2s}
  .faq-jp details[open] summary::after{transform:translateY(-50%) rotate(45deg)}
  .faq-jp details p{padding:0 22px 20px;color:var(--gray-600);font-size:14px;line-height:1.7}

  /* CTA FINAL */
  .jp-cta{padding:0 48px 80px}
  .jp-cta-inner{max-width:1000px;margin:0 auto;background:linear-gradient(135deg,var(--teal) 0%,#158a65 100%);border-radius:22px;color:#fff;padding:56px 40px;text-align:center;box-shadow:0 18px 40px rgba(26,158,117,0.3)}
  .jp-cta-inner h2{font-size:28px;font-weight:800;margin-bottom:10px}
  .jp-cta-inner p{max-width:46ch;margin:0 auto 26px;color:rgba(255,255,255,0.9);font-size:15px}
  .jp-cta-inner .btns{display:flex;flex-wrap:wrap;gap:14px;justify-content:center}
  .jp-cta-inner .btn-wa{background:#fff;color:#158a65;padding:14px 24px;border-radius:10px;font-weight:700;font-size:14px;text-decoration:none;display:inline-block;transition:transform .15s}
  .jp-cta-inner .btn-wa:hover{transform:translateY(-2px)}
  .jp-cta-inner .btn-primary{background:var(--navy);color:#fff}
  .jp-cta-inner .btn-primary:hover{background:#122845}

  @media(max-width:768px){
    .page-hero{padding:88px 24px 56px}
    .page-hero h1{font-size:28px}
    .tracks-wrap{margin-top:-40px;padding:0 16px}
    .track-tab{font-size:13px;padding:14px 8px}
    .roles-section,.benefit-section,.fields-section,.faq-jp-section{padding:48px 24px}
    .jp-cta{padding:0 16px 56px}
    .jp-cta-inner{padding:36px 22px}
  }
</style>

<!-- HERO -->
<div class="page-hero">
  <div class="page-hero-inner">
    <div class="eyebrow-tag">Pendaftaran dibuka — Labnesia Expert Network</div>
    <h1>Call for Laboratory <span class="accent">Expert / Practitioner</span></h1>
    <p class="page-hero-sub">Bergabunglah dalam Labnesia Expert Network untuk berkolaborasi membangun laboratorium yang produktif, terstandar, dan berdampak bagi industri serta masyarakat.</p>
    <div class="page-hero-ctas">
      <a href="#daftar" class="btn-primary">Daftar Sekarang</a>
      <a href="#peran" class="btn-ghost">Pelajari Peran Pakar</a>
    </div>
  </div>
</div>

<!-- JALUR PENDAFTARAN -->
<div class="tracks-wrap" id="daftar">
  <div class="track-card">
    <div class="track-tabs" role="tablist" aria-label="Pilih jalur pendaftaran">
      <button class="track-tab" id="tab-pt" role="tab" aria-selected="true" aria-controls="panel-pt">Pakar Perguruan Tinggi</button>
      <button class="track-tab" id="tab-industri" role="tab" aria-selected="false" aria-controls="panel-industri">Praktisi Industri &amp; Pemerintah</button>
    </div>

    <div class="track-panel active" id="panel-pt" role="tabpanel" aria-labelledby="tab-pt">
      <div>
        <h3>Pakar Laboratorium Perguruan Tinggi</h3>
        <p class="sub">Untuk sivitas akademika yang mengelola dan mengembangkan laboratorium kampus.</p>
        <ul class="invite-list">
          <li>Dosen</li>
          <li>Tenaga Kependidikan</li>
          <li>Kepala / Pengelola Laboratorium</li>
          <li>Peneliti dan Praktisi Laboratorium</li>
        </ul>
      </div>
      <div class="track-side">
        <div class="label">Pendaftaran</div>
        <div class="date">Terbuka Sepanjang Tahun</div>
        <p>Isi formulir pendaftaran secara daring kapan saja. Tim Labnesia akan menghubungi Anda melalui email atau WhatsApp untuk proses selanjutnya.</p>
        <a class="btn-primary" href="https://tinyurl.com/LabnesiaExpertNetwork" target="_blank" rel="noopener">Isi Formulir Pendaftaran &rarr;</a>
        <span class="form-url">tinyurl.com/LabnesiaExpertNetwork</span>
      </div>
    </div>

    <div class="track-panel" id="panel-industri" role="tabpanel" aria-labelledby="tab-industri" hidden>
      <div>
        <h3>Praktisi Laboratorium Standar ISO/IEC 17025</h3>
        <p class="sub">Untuk praktisi dari industri, swasta, dan laboratorium pemerintah.</p>
        <ul class="invite-list">
          <li>Praktisi Lab Industri</li>
          <li>Praktisi Lab Pemerintah</li>
          <li>Praktisi Lab Swasta</li>
          <li>Praktisi bidang Lab, GLP, ISO 17025, QC/QA &amp; relevan</li>
        </ul>
      </div>
      <div class="track-side">
        <div class="label">Pendaftaran</div>
        <div class="date">Terbuka Sepanjang Tahun</div>
        <p>Isi formulir pendaftaran secara daring kapan saja. Tim Labnesia akan menghubungi Anda melalui email atau WhatsApp untuk proses selanjutnya.</p>
        <a class="btn-primary" href="https://tinyurl.com/LabnesiaExpertNetwork-2" target="_blank" rel="noopener">Isi Formulir Pendaftaran &rarr;</a>
        <span class="form-url">tinyurl.com/LabnesiaExpertNetwork-2</span>
      </div>
    </div>
  </div>
</div>

<!-- PERAN -->
<section class="roles-section" id="peran">
  <div class="sec-head">
    <p class="eyebrow">Peran Pakar Labnesia</p>
    <h2>Kontribusi Anda dalam Expert Network</h2>
    <p>Tiga peran utama yang akan Anda jalankan bersama Labnesia.</p>
  </div>
  <div class="roles">
    <?php foreach ( $roles as $r ) : ?>
    <div class="role-card">
      <div class="icon-tile"><?php labnesia_icon( $r['icon'], '#fff', 24 ); ?></div>
      <h3><?php echo esc_html( $r['title'] ); ?></h3>
      <p><?php echo esc_html( $r['desc'] ); ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- BENEFIT -->
<section class="benefit-section" id="benefit">
  <div class="benefit-inner">
    <div class="sec-head">
      <p class="eyebrow" style="color:var(--teal-light)">Benefit</p>
      <h2>Yang Anda dapatkan sebagai Pakar Labnesia</h2>
      <p>Keanggotaan Expert Network membuka akses ke jejaring, panggung, dan sertifikasi kompetensi.</p>
    </div>
    <div class="benefits">
      <?php foreach ( $benefits as $b ) : ?>
      <div class="benefit-item">
        <?php labnesia_icon( 'check', 'var(--teal-light)', 20 ); ?>
        <div><strong><?php echo esc_html( $b['title'] ); ?></strong><span><?php echo esc_html( $b['desc'] ); ?></span></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- BIDANG -->
<section class="fields-section" id="bidang">
  <div class="fields-inner">
    <div class="sec-head">
      <p class="eyebrow">Bidang Laboratorium</p>
      <h2>Kami membuka pendaftaran untuk 13+ bidang</h2>
      <p>Apapun bidang laboratorium Anda, keahlian Anda dibutuhkan.</p>
    </div>
    <div class="fields">
      <?php foreach ( $fields as $f ) : ?>
      <span class="field-chip"><?php echo esc_html( $f ); ?></span>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- FAQ -->
<section class="faq-jp-section" id="faq">
  <div class="sec-head">
    <p class="eyebrow">FAQ</p>
    <h2>Pertanyaan yang sering diajukan</h2>
  </div>
  <div class="faq-jp">
    <?php foreach ( $faqs as $f ) : ?>
    <details>
      <summary><?php echo esc_html( $f['q'] ); ?></summary>
      <p><?php echo esc_html( $f['a'] ); ?></p>
    </details>
    <?php endforeach; ?>
  </div>
</section>

<!-- CTA FINAL -->
<div class="jp-cta">
  <div class="jp-cta-inner">
    <h2>Siap bergabung dalam Labnesia Expert Network?</h2>
    <p>Isi formulir pendaftaran, atau hubungi tim kami untuk informasi lebih lanjut.</p>
    <div class="btns">
      <a class="btn-primary" href="#daftar">Isi Formulir Pendaftaran</a>
      <a class="btn-wa" href="https://wa.me/6282172221567" target="_blank" rel="noopener">WhatsApp Endang — +62 821-7222-1567</a>
      <a class="btn-wa" href="https://wa.me/6285185000367" target="_blank" rel="noopener">WhatsApp Berryl — +62 851-8500-0367</a>
      <a class="btn-wa" href="https://wa.me/62811399523" target="_blank" rel="noopener">WhatsApp Kintan — +62 811-399-523</a>
    </div>
  </div>
</div>

<script>
(function(){
  const tabs = document.querySelectorAll('.track-tab');
  const panels = document.querySelectorAll('.track-panel');
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => t.setAttribute('aria-selected', t === tab ? 'true' : 'false'));
      panels.forEach(p => {
        const active = p.id === tab.getAttribute('aria-controls');
        p.classList.toggle('active', active);
        p.hidden = !active;
      });
    });
  });
})();
</script>

<?php get_footer(); ?>
