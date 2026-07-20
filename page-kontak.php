<?php
/*
Template Name: Kontak
*/
if ( ! defined( 'ABSPATH' ) ) exit;
$wa_text = rawurlencode( labnesia_wa_default_message() );
$gas_url = get_theme_mod( 'labnesia_gas_url', '' );
?>
<?php get_header(); ?>
<style>
  .page-hero{background:var(--navy);padding:104px 48px 72px;text-align:center;position:relative;overflow:hidden}
  .page-hero::before{content:'';position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:40px 40px}
  .page-hero::after{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(77, 161, 169,0.15) 0%,transparent 60%)}
  .page-hero-inner{max-width:680px;margin:0 auto;position:relative;z-index:1}
  .eyebrow-tag{display:inline-block;background:rgba(77, 161, 169,0.15);border:1px solid rgba(77, 161, 169,0.3);color:var(--teal-light);padding:5px 16px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:20px}
  .page-hero h1{font-size:44px;font-weight:800;color:white;line-height:1.15;letter-spacing:-1.2px;margin-bottom:16px}
  .page-hero h1 .accent{color:var(--teal-light)}
  .page-hero-sub{font-size:17px;color:rgba(255,255,255,0.55);line-height:1.65}

  /* LIVE CHAT */
  .chat-section{background:var(--navy);padding:80px 48px;position:relative;overflow:hidden}
  .chat-section::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(77, 161, 169,0.2) 0%,transparent 60%)}
  .chat-inner{max-width:1100px;margin:0 auto;position:relative;z-index:1;display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center}
  .chat-left .eyebrow{font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--teal-light);margin-bottom:10px}
  .chat-left h2{font-size:36px;font-weight:800;color:white;line-height:1.15;letter-spacing:-0.8px;margin-bottom:12px}
  .chat-left p{font-size:16px;color:rgba(255,255,255,0.55);line-height:1.65;margin-bottom:28px}
  .contact-options{display:flex;flex-direction:column;gap:10px}
  .contact-opt{background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.12);border-radius:12px;padding:16px 20px;display:flex;align-items:center;gap:14px;text-decoration:none;transition:all .2s}
  .contact-opt:hover{background:rgba(255,255,255,0.12);border-color:rgba(77, 161, 169,0.4)}
  .contact-icon{width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0}
  .contact-name{font-size:14px;font-weight:700;color:white;margin-bottom:2px}
  .contact-val{font-size:13px;color:rgba(255,255,255,0.5)}
  .chat-right{background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.12);border-radius:20px;padding:28px}
  .chat-title{font-size:18px;font-weight:800;color:white;margin-bottom:6px}
  .chat-sub{font-size:14px;color:rgba(255,255,255,0.45);margin-bottom:22px}
  .chat-input{width:100%;padding:11px 14px;border:1px solid rgba(255,255,255,0.15);border-radius:9px;font-size:14px;font-family:var(--font-display);outline:none;background:rgba(255,255,255,0.07);color:white;margin-bottom:10px;transition:border .2s}
  .chat-input:focus{border-color:var(--teal)}
  .chat-input::placeholder{color:rgba(255,255,255,0.3)}
  .chat-textarea{width:100%;padding:11px 14px;border:1px solid rgba(255,255,255,0.15);border-radius:9px;font-size:14px;font-family:var(--font-display);outline:none;background:rgba(255,255,255,0.07);color:white;resize:vertical;min-height:100px;margin-bottom:10px;transition:border .2s}
  .chat-textarea:focus{border-color:var(--teal)}
  .chat-textarea::placeholder{color:rgba(255,255,255,0.3)}
  .btn-chat{width:100%;padding:13px;background:var(--teal);color:white;border:none;border-radius:9px;font-weight:700;font-size:15px;font-family:var(--font-display);cursor:pointer;transition:all .2s}
  .btn-chat:hover{background:#43939A}

  @media (max-width:1024px){ .chat-inner{grid-template-columns:1fr;gap:40px} }
  @media (max-width:768px){
    .page-hero{padding:88px 24px 56px}
    .page-hero h1{font-size:30px}
    .chat-section{padding:56px 24px}
  }
</style>

<!-- HERO -->
<div class="page-hero">
  <div class="page-hero-inner">
    <div class="eyebrow-tag">Kontak</div>
    <h1>Masih ada yang<br><span class="accent">perlu dijawab?</span></h1>
    <p class="page-hero-sub">Tim kami siap membantu — tanpa tekanan, tanpa sales pitch. Ceritakan kondisi lab Anda dan kami akan berikan rekomendasi yang jujur.</p>
  </div>
</div>

<!-- LIVE CHAT / KONTAK -->
<div class="chat-section" id="kontak">
  <div class="chat-inner">
    <div class="chat-left">
      <p class="eyebrow">Tanya Tim Kami</p>
      <h2>Hubungi kami langsung.</h2>
      <p>Pilih kanal yang paling nyaman untuk Anda, atau isi form di samping — tim kami akan merespons dalam 1×24 jam kerja.</p>
      <div class="contact-options">
        <a href="https://wa.me/6282172221567?text=<?php echo $wa_text; ?>" class="contact-opt">
          <div class="contact-icon" style="background:rgba(37,211,102,0.2)"><?php labnesia_icon( 'whatsapp', '#ffffff', 18 ); ?></div>
          <div>
            <div class="contact-name">Endang — WhatsApp</div>
            <div class="contact-val">+62 821-7222-1567 · Aktif 08.00–17.00</div>
          </div>
        </a>
        <a href="https://wa.me/6285185000367?text=<?php echo $wa_text; ?>" class="contact-opt">
          <div class="contact-icon" style="background:rgba(37,211,102,0.2)"><?php labnesia_icon( 'whatsapp', '#ffffff', 18 ); ?></div>
          <div>
            <div class="contact-name">Berryl — WhatsApp</div>
            <div class="contact-val">+62 851-8500-0367 · Aktif 08.00–17.00</div>
          </div>
        </a>
        <a href="https://wa.me/62811399523?text=<?php echo $wa_text; ?>" class="contact-opt">
          <div class="contact-icon" style="background:rgba(37,211,102,0.2)"><?php labnesia_icon( 'whatsapp', '#ffffff', 18 ); ?></div>
          <div>
            <div class="contact-name">Kintan — WhatsApp</div>
            <div class="contact-val">+62 811-399-523 · Aktif 08.00–17.00</div>
          </div>
        </a>
        <a href="mailto:info@labnesia.id" class="contact-opt">
          <div class="contact-icon" style="background:rgba(255,255,255,0.1)"><?php labnesia_icon( 'mail', '#ffffff', 18 ); ?></div>
          <div>
            <div class="contact-name">Email</div>
            <div class="contact-val">info@labnesia.id · Dijawab dalam 24 jam</div>
          </div>
        </a>
      </div>
    </div>
    <div class="chat-right">
      <form id="kontak-form" onsubmit="return submitKontakForm(event)">
        <div class="chat-title">Kirim pertanyaan Anda</div>
        <div class="chat-sub">Isi form ini dan tim kami akan menjawab dalam 1×24 jam kerja.</div>
        <div class="form-error" id="kontak-error" style="display:none;background:var(--amber-pale);color:#6B4400;border:1px solid rgba(245, 166, 35,0.3);border-radius:8px;padding:10px 14px;font-size:13px;margin-bottom:12px"></div>
        <input class="chat-input" type="text" id="kontak-nama" placeholder="Nama Anda" required>
        <input class="chat-input" type="tel" id="kontak-whatsapp" placeholder="Nomor WhatsApp" required>
        <input class="chat-input" type="text" id="kontak-institusi" placeholder="Nama lab / instansi">
        <input class="chat-input" type="text" id="kontak-jabatan" placeholder="Jabatan di instansi">
        <textarea class="chat-textarea" id="kontak-pertanyaan" placeholder="Tuliskan pertanyaan atau kondisi lab Anda di sini..." required></textarea>
        <button class="btn-chat" type="submit" id="kontak-submit-btn">Kirim Pertanyaan <?php labnesia_icon( 'arrow-right', '#ffffff', 15 ); ?></button>
      </form>
      <div id="kontak-success" style="display:none;text-align:center;padding:24px">
        <div style="font-size:32px;color:var(--teal);margin-bottom:10px"><?php labnesia_icon( 'check', 'var(--teal)', 32 ); ?></div>
        <div class="chat-title">Pertanyaan terkirim!</div>
        <div class="chat-sub">Tim kami akan menghubungi Anda dalam 1×24 jam kerja.</div>
      </div>
    </div>
  </div>
</div>

<script>
const KF_GAS_URL = <?php echo wp_json_encode( $gas_url ); ?>;

function submitKontakForm(event){
  event.preventDefault();

  const nama       = document.getElementById('kontak-nama').value.trim();
  const whatsapp   = document.getElementById('kontak-whatsapp').value.trim();
  const institusi  = document.getElementById('kontak-institusi').value.trim();
  const jabatan    = document.getElementById('kontak-jabatan').value.trim();
  const pertanyaan = document.getElementById('kontak-pertanyaan').value.trim();
  const errorEl    = document.getElementById('kontak-error');

  if(!nama || !whatsapp || !pertanyaan){
    errorEl.textContent = 'Mohon lengkapi Nama, Nomor WhatsApp, dan Pertanyaan Anda.';
    errorEl.style.display = 'block';
    return false;
  }
  errorEl.style.display = 'none';

  const btn = document.getElementById('kontak-submit-btn');
  btn.disabled = true;
  const originalLabel = btn.innerHTML;
  btn.innerHTML = 'Mengirim...';

  function showSuccess(){
    document.getElementById('kontak-form').style.display = 'none';
    document.getElementById('kontak-success').style.display = 'block';
  }

  if(!KF_GAS_URL){
    btn.disabled = false;
    btn.innerHTML = originalLabel;
    showSuccess();
    return false;
  }

  const formData = new FormData();
  formData.append('form', 'kontak');
  formData.append('nama', nama);
  formData.append('whatsapp', whatsapp);
  formData.append('institusi', institusi);
  formData.append('jabatan', jabatan);
  formData.append('pertanyaan', pertanyaan);

  fetch(KF_GAS_URL, { method: 'POST', mode: 'no-cors', body: formData })
    .catch(function(){ /* no-cors gives an opaque response either way — still proceed */ })
    .finally(function(){
      btn.disabled = false;
      btn.innerHTML = originalLabel;
      showSuccess();
    });

  return false;
}
</script>
<?php get_footer(); ?>
