<?php
/*
Template Name: Checklist Dokumen
*/
if ( ! defined( 'ABSPATH' ) ) exit;

// Form submissions go to the same Google Apps Script web app the site's other
// lead-capture forms use (see functions.php "labnesia_gas_url" customizer
// setting), distinguished by the 'form' field. Drive/WA redirect is handled
// client-side in the modal's JS after submit (see .modal-success blocks +
// submitDocForm()).
$GAS_URL          = get_theme_mod( 'labnesia_gas_url', '' );
$DRIVE_FOLDER_URL = 'https://drive.google.com/drive/folders/19jKGtlOI7l4YXMz5ogAWdbs6ZLOpnCDF?usp=sharing';
$wa_text          = rawurlencode( labnesia_wa_default_message() );

// Daftar dokumen — sebelumnya dari tabel `nama_dokumen`, sekarang statis di sini.
$all_documents = [
  [ 'kode_dokumen' => '5.1-3',  'nama_dokumen' => 'Surat Penugasan', 'klausul' => '5', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '5.1-6',  'nama_dokumen' => 'Laporan Ketidaksesuaian Implementasi, Pemeliharaan dan Peningkatan Personil', 'klausul' => '5', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.2-1',  'nama_dokumen' => 'Pengkualifikasian Personil', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.2-2',  'nama_dokumen' => 'Program Pembuatan Pelatihan Personil', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.2-3',  'nama_dokumen' => 'Evaluasi Pelatihan Personil', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.2-4',  'nama_dokumen' => 'Wewenang Personil Hasil Pelatihan', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.2-5',  'nama_dokumen' => 'Riwayat Hidup Personil', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.2-6',  'nama_dokumen' => 'Analisis Kinerja Personel', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.2-7',  'nama_dokumen' => 'Surat Delegasi Mengikuti Pelatihan', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.2-8',  'nama_dokumen' => 'Pemantauan Program Pelatihan', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.3-4',  'nama_dokumen' => 'Rekaman Pemantauan Suhu dan Kelembaban Ruangan', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.3-5',  'nama_dokumen' => 'Daftar Kunjungan Pelanggan', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.3-6',  'nama_dokumen' => 'Label Selain Petugas Dilarang Masuk', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-1',  'nama_dokumen' => 'Pengecekan Peralatan dan atau bahan Kimia', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-3',  'nama_dokumen' => 'Identifikasi Peralatan', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-4',  'nama_dokumen' => 'Commissioning Peralatan', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-5',  'nama_dokumen' => 'Rekaman Stok Peralatan Gelas', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-6',  'nama_dokumen' => 'Rekaman Stok Bahan Kimia', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-7',  'nama_dokumen' => 'Rekaman Pemakaian Alat', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-8',  'nama_dokumen' => 'Label Peralatan Rusak', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-9',  'nama_dokumen' => 'Rekaman Pengambilan Stok Peralatan Gelas', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-10', 'nama_dokumen' => 'Penggunaan Bahan Acuan Bersertifikat', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-11', 'nama_dokumen' => 'Rekaman Penggunaan Bahan Kimia Harian', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-12', 'nama_dokumen' => 'Berita Acara Peminjaman Peralatan', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-13', 'nama_dokumen' => 'Rekaman Penggunaan Peralatan Diluar Fasilitas Gedung Laboratorium', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-14', 'nama_dokumen' => 'Pemeriksaan Peralatan', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-15', 'nama_dokumen' => 'Verifikasi Peralatan', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-16', 'nama_dokumen' => 'Program Kalibrasi Peralatan', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-17', 'nama_dokumen' => 'Evaluasi Hasil Kalibrasi', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-18', 'nama_dokumen' => 'Pengecekan Antara Peralatan Laboratorium', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-19', 'nama_dokumen' => 'Inventarisasi Peralatan', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.4-20', 'nama_dokumen' => 'Daftar Riwayat Alat', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.5-1',  'nama_dokumen' => 'Rekaman Ketertelusuran Metrologi', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.5-2',  'nama_dokumen' => 'Berita Acara Pemusnahan Acuan', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.6-1',  'nama_dokumen' => 'Usulan Pembelian Produk dan Jasa', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.6-2',  'nama_dokumen' => 'Evaluasi dan Pemilihan Pemasok', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.6-3',  'nama_dokumen' => 'Evaluasi dan Pemilihan Penyedia Jasa Pelatihan', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.6-4',  'nama_dokumen' => 'Evaluasi Pemasok Jasa Pengujian Eksternal', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.6-5',  'nama_dokumen' => 'Pengajuan Subkontrak Pengujian', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.6-6',  'nama_dokumen' => 'Daftar Laboratorium Subkontrak yang Kompeten', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.6-7',  'nama_dokumen' => 'Evaluasi Data Hasil Subkontrak Pengujian', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.6-8',  'nama_dokumen' => 'Verifikasi Produk dan Jasa Yang Disediakan Secara Eksternal', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '6.6-9',  'nama_dokumen' => 'Kecukupan Persyaratan sebagai Pemasok Eksternal', 'klausul' => '6', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '7.1-2',  'nama_dokumen' => 'Laporan Survey Kepuasan Pelanggan', 'klausul' => '7', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '7.2-1',  'nama_dokumen' => 'Rencana Verifikasi Validasi Metode', 'klausul' => '7', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '7.2-2',  'nama_dokumen' => 'Laporan Verifikasi Metode Pengujian', 'klausul' => '7', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '7.2-3',  'nama_dokumen' => 'Laporan Validasi Metode Pengujian', 'klausul' => '7', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '8.2-3',  'nama_dokumen' => 'Rekaman Draft Sasaran Mutu', 'klausul' => '8', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '8.2-4',  'nama_dokumen' => 'Evaluasi Sasaran Mutu', 'klausul' => '8', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '8.3-2',  'nama_dokumen' => 'Rekaman Amandemen Dokumen Sistem Manajemen', 'klausul' => '8', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '8.3-3',  'nama_dokumen' => 'Status Revisi', 'klausul' => '8', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '8.3-6',  'nama_dokumen' => 'Daftar Dokumen Eksternal', 'klausul' => '8', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '8.3-7',  'nama_dokumen' => 'Daftar Dokumen Yang Akan Dikaji Ulang', 'klausul' => '8', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '8.3-8',  'nama_dokumen' => 'Undangan Rapat Kaji Ulang Dokumen', 'klausul' => '8', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '8.3-9',  'nama_dokumen' => 'Auditor dan Agenda Kaji Ulang Dokumen', 'klausul' => '8', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '8.3-10', 'nama_dokumen' => 'Daftar Periksa Kaji Ulang Dokumen', 'klausul' => '8', 'kategori' => 'berbayar' ],
  [ 'kode_dokumen' => '4.1-1',  'nama_dokumen' => 'Pernyataan Tata Etika (Code of Conduct) Personel', 'klausul' => '4', 'kategori' => 'gratis' ],
  [ 'kode_dokumen' => '4.1-2',  'nama_dokumen' => 'Analisis Resiko Ketidakberpihakan', 'klausul' => '4', 'kategori' => 'gratis' ],
  [ 'kode_dokumen' => '5.1-1',  'nama_dokumen' => 'Job Deskripsi Personil', 'klausul' => '5', 'kategori' => 'gratis' ],
  [ 'kode_dokumen' => '5.1-2',  'nama_dokumen' => 'Evaluasi Kinerja Personel', 'klausul' => '5', 'kategori' => 'gratis' ],
  [ 'kode_dokumen' => '5.1-4',  'nama_dokumen' => 'Daftar Hadir Pertemuan', 'klausul' => '5', 'kategori' => 'gratis' ],
  [ 'kode_dokumen' => '5.1-5',  'nama_dokumen' => 'Notulesi Pertemuan', 'klausul' => '5', 'kategori' => 'gratis' ],
  [ 'kode_dokumen' => '6.3-1',  'nama_dokumen' => 'Piket Kebersihan Laboratorium', 'klausul' => '6', 'kategori' => 'gratis' ],
  [ 'kode_dokumen' => '6.3-2',  'nama_dokumen' => 'Ceklist Piket Kebersihan', 'klausul' => '6', 'kategori' => 'gratis' ],
  [ 'kode_dokumen' => '6.3-3',  'nama_dokumen' => 'Rekaman Pemantauan pH dan DHL', 'klausul' => '6', 'kategori' => 'gratis' ],
  [ 'kode_dokumen' => '6.4-2',  'nama_dokumen' => 'Rekaman Alat', 'klausul' => '6', 'kategori' => 'gratis' ],
  [ 'kode_dokumen' => '7.1-1',  'nama_dokumen' => 'Survey Kepuasan Pelanggan', 'klausul' => '7', 'kategori' => 'gratis' ],
  [ 'kode_dokumen' => '7.4-1',  'nama_dokumen' => 'Formulir Registrasi Penerimaan Sampel', 'klausul' => '7', 'kategori' => 'gratis' ],
  [ 'kode_dokumen' => '8.2-1',  'nama_dokumen' => 'Rekaman Draft Kebijakan Mutu', 'klausul' => '8', 'kategori' => 'gratis' ],
  [ 'kode_dokumen' => '8.3-1',  'nama_dokumen' => 'Daftar Induk Dokumen Sistem Manajemen', 'klausul' => '8', 'kategori' => 'gratis' ],
];

$kategori_rank = [ 'gratis' => 0, 'preview' => 1 ];
usort( $all_documents, function( $a, $b ) use ( $kategori_rank ) {
  $ka = (int) $a['klausul']; $kb = (int) $b['klausul'];
  if ( $ka !== $kb ) return $ka <=> $kb;
  $ra = $kategori_rank[ $a['kategori'] ] ?? 2;
  $rb = $kategori_rank[ $b['kategori'] ] ?? 2;
  if ( $ra !== $rb ) return $ra <=> $rb;
  return strnatcmp( $a['kode_dokumen'], $b['kode_dokumen'] );
} );

// Group documents by klausul
$documents_by_klausul = [];
foreach ( $all_documents as $doc ) {
  $klausul = $doc['klausul'];
  if ( ! isset( $documents_by_klausul[ $klausul ] ) ) {
    $documents_by_klausul[ $klausul ] = [];
  }
  $documents_by_klausul[ $klausul ][] = $doc;
}

$display_limit = 5;

function labnesia_checklist_doc_class( $kategori ) {
  if ( $kategori === 'berbayar' ) return 'locked';
  if ( $kategori === 'preview' )  return 'preview';
  return 'open';
}

function labnesia_checklist_doc_icon( $kategori ) {
  if ( $kategori === 'berbayar' ) return '<i class="icon fa-solid fa-lock" aria-hidden="true"></i>';
  if ( $kategori === 'preview' )  return '<i class="icon fa-solid fa-magnifying-glass" aria-hidden="true"></i>';
  return '<i class="icon fa-solid fa-file-lines" aria-hidden="true"></i>';
}

function labnesia_checklist_doc_badge( $kategori ) {
  if ( $kategori === 'berbayar' ) return '<i class="icon fa-solid fa-lock" aria-hidden="true"></i> Terkunci';
  if ( $kategori === 'preview' )  return '<i class="icon fa-solid fa-circle-half-stroke" aria-hidden="true"></i> Preview';
  return '<i class="icon fa-solid fa-check" aria-hidden="true"></i> Gratis';
}

function labnesia_checklist_doc_onclick( $kategori ) {
  if ( $kategori === 'berbayar' ) return "openModal('terkunci')";
  if ( $kategori === 'preview' )  return "openModal('preview')";
  return "openModal('gratis')";
}
?>
<?php get_header(); ?>
<style>
  .container{max-width:1200px;margin:0 auto;padding:0 48px}
  .hero{background:var(--navy);padding:88px 0 48px;position:relative;overflow:hidden}
  .hero-grid{display:grid;grid-template-columns:1.1fr 1fr;gap:56px;align-items:center;position:relative;z-index:1}
  .hero-badge{display:inline-block;background:rgba(26,158,117,0.15);border:1px solid rgba(26,158,117,0.3);color:var(--teal-light);padding:5px 16px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:20px}
  .hero h1{font-size:38px;font-weight:800;color:#fff;line-height:1.2;letter-spacing:-0.8px;margin-bottom:16px}
  .hero h1 em,.hero h1 .gold{font-style:normal;color:var(--teal-light)}
  .hero-sub{font-size:16px;color:rgba(255,255,255,0.6);line-height:1.65;margin-bottom:28px}
  .hero-card{background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.12);border-radius:20px;padding:28px}
  .hero-card h3{color:#fff;font-size:18px;font-weight:800;margin-bottom:12px}
  .hero-card p{color:rgba(255,255,255,0.6);font-size:14px;line-height:1.7;margin-bottom:16px}
  .hero-list{display:flex;flex-direction:column;gap:10px}
  .hero-list div{color:rgba(255,255,255,0.85);font-size:13px}
  #poster{background:var(--gray-50);padding:64px 0;text-align:center}
  #poster h2{font-size:28px;font-weight:800;color:var(--navy);letter-spacing:-0.5px;margin-bottom:12px}
  #poster h2 span{color:var(--teal)}
  #poster p{color:var(--gray-600);font-size:15px;max-width:560px;margin:0 auto 24px}
  .poster-tags{display:flex;flex-wrap:wrap;gap:8px;justify-content:center;margin-bottom:28px}
  .poster-tags .tag{background:#fff;border:1px solid var(--gray-200);color:var(--gray-600);padding:6px 14px;border-radius:100px;font-size:12px;font-weight:600}
  #dokumen{padding:72px 0}
  .section-eyebrow{font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--teal);margin-bottom:10px;text-align:center}
  .section-title{font-size:30px;font-weight:800;color:var(--navy);letter-spacing:-0.6px;text-align:center;margin-bottom:12px}
  .section-sub{color:var(--gray-600);font-size:15px;text-align:center;max-width:560px;margin:0 auto 32px}
  .preview-note{display:flex;gap:14px;background:var(--teal-pale);border:1px solid rgba(26,158,117,0.2);border-radius:12px;padding:16px 20px;margin-bottom:40px}
  .preview-note-icon{font-size:22px;flex-shrink:0}
  .preview-note h4{font-size:14px;font-weight:700;color:var(--navy);margin-bottom:4px}
  .preview-note p{font-size:13px;color:#085041;line-height:1.6;margin:0}
  .klausul-block{margin-bottom:32px}
  .klausul-header{display:flex;align-items:center;gap:12px;margin-bottom:16px;padding-bottom:10px;border-bottom:2px solid var(--teal)}
  .klausul-num{background:var(--navy);color:#fff;font-size:12px;font-weight:700;padding:4px 10px;border-radius:6px}
  .klausul-header h3{font-size:16px;font-weight:800;color:var(--navy);flex:1}
  .klausul-count{font-size:12px;color:var(--gray-400);font-weight:600}
  .doc-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:14px}
  .doc-card{background:#fff;border:1px solid var(--gray-200);border-radius:12px;padding:16px;cursor:pointer;position:relative;transition:all .2s;display:flex;gap:12px}
  .doc-card:hover{border-color:var(--teal);box-shadow:0 8px 20px rgba(11,31,58,0.08)}
  .doc-card[hidden]{display:none}
  .doc-icon{font-size:22px;flex-shrink:0}
  .doc-name{font-size:13px;font-weight:700;color:var(--navy);line-height:1.35;margin-bottom:4px}
  .doc-code{font-size:11px;color:var(--gray-400);margin-bottom:6px}
  .doc-badge{font-size:10px;font-weight:700;padding:2px 8px;border-radius:100px}
  .doc-badge.open{background:var(--teal-pale);color:var(--teal)}
  .doc-badge.locked{background:var(--amber-pale);color:#8B5800}
  .doc-badge.preview{background:var(--gray-100);color:var(--gray-600)}
  .lock-overlay{position:absolute;inset:0;background:rgba(11,31,58,0.9);border-radius:12px;display:flex;align-items:center;justify-content:center;opacity:0;transition:opacity .2s}
  .doc-card:hover .lock-overlay{opacity:1}
  .lock-cta{color:#fff;font-size:12px;font-weight:700}
  .doc-grid-action{grid-column:1/-1;text-align:center;margin-top:4px}
  .btn-outline{background:transparent;border:1.5px solid var(--gray-200);color:var(--gray-600);padding:9px 20px;border-radius:8px;font-size:13px;font-weight:700;cursor:pointer;font-family:inherit}
  .btn-outline:hover{background:var(--gray-50)}
  .btn-primary,.btn-gold{background:var(--amber);color:var(--navy);border:none;padding:13px 26px;border-radius:10px;font-weight:700;font-size:15px;cursor:pointer;font-family:inherit;transition:background .2s}
  .btn-primary:hover,.btn-gold:hover{background:#e09620}
  .modal-overlay{display:none;position:fixed;inset:0;background:rgba(11,31,58,0.6);z-index:200;align-items:center;justify-content:center;padding:24px}
  .modal-overlay.active{display:flex}
  .modal{background:#fff;border-radius:18px;padding:28px;max-width:440px;width:100%;position:relative;max-height:90vh;overflow-y:auto}
  .modal-close{position:absolute;top:16px;right:16px;background:none;border:none;font-size:18px;cursor:pointer;color:var(--gray-400)}
  .modal h3{font-size:20px;font-weight:800;color:var(--navy);margin-bottom:6px}
  .modal>p{font-size:13px;color:var(--gray-600);margin-bottom:18px}
  .form-group{margin-bottom:12px}
  .form-group label{display:block;font-size:12px;font-weight:600;color:var(--gray-800);margin-bottom:5px}
  .form-group input,.form-group select{width:100%;padding:10px 14px;border:1px solid var(--gray-200);border-radius:8px;font-size:14px;font-family:inherit;outline:none}
  .form-group input:focus,.form-group select:focus{border-color:var(--teal)}
  .form-check{display:flex;gap:8px;align-items:flex-start;margin-bottom:16px;font-size:12px;color:var(--gray-600)}
  .form-error{background:var(--amber-pale);color:#6B4400;border:1px solid rgba(245,166,35,0.3);border-radius:8px;padding:10px 14px;font-size:13px;margin-bottom:12px}
  .btn-submit{width:100%;background:var(--teal);color:#fff;border:none;padding:13px;border-radius:9px;font-weight:700;font-size:14px;cursor:pointer;font-family:inherit;transition:background .2s}
  .btn-submit:hover{background:#158a65}
  .modal-success{text-align:center}
  .success-icon{font-size:36px;margin-bottom:10px}
  .modal-success h3{margin-bottom:8px}
  .modal-success p{font-size:13px;color:var(--gray-600);margin-bottom:18px}
  .modal-success-btn{display:inline-block;text-decoration:none}
  .sales-list{list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:8px}
  .sales-list a{color:var(--teal);font-weight:700;text-decoration:none;font-size:14px}
  .sales-list a:hover{text-decoration:underline}
  @media (max-width:900px){
    .hero{padding:80px 0 40px}
    .hero-grid{grid-template-columns:1fr}
    .container{padding:0 24px}
  }
</style>

<section class="hero" id="home">
  <div class="container hero-grid">
    <div>
      <div class="hero-badge">ISO/IEC 17025:2017 • Template Siap Pakai</div>
      <h1>Akreditasi <em>KAN</em> Lebih Cepat dengan Template <span class="gold">Siap Pakai</span></h1>
      <p class="hero-sub">
        Dapatkan template dokumen lengkap sesuai standar ISO/IEC 17025:2017 — dikurasi khusus untuk laboratorium Indonesia yang ingin lolos asesmen KAN.
      </p>

      <div class="hero-actions">
        <button class="btn-primary" onclick="document.getElementById('dokumen').scrollIntoView({ behavior: 'smooth' })"><i class="icon fa-solid fa-arrow-down" aria-hidden="true"></i> Download Template Gratis</button>
      </div>
    </div>

    <div class="hero-card">
      <h3>Kenapa template ini penting?</h3>
      <p>
        Banyak laboratorium gagal pada asesmen awal bukan karena kompetensi teknisnya lemah, tetapi karena dokumen sistem manajemen belum tertata dengan baik.
      </p>
      <div class="hero-list">
        <div><i class="icon fa-solid fa-check" aria-hidden="true"></i> Format lebih rapi dan mudah dipahami</div>
        <div><i class="icon fa-solid fa-check" aria-hidden="true"></i> Sesuai kebutuhan persiapan akreditasi KAN</div>
        <div><i class="icon fa-solid fa-check" aria-hidden="true"></i> Membantu tim lab bekerja lebih cepat</div>
        <div><i class="icon fa-solid fa-check" aria-hidden="true"></i> Cocok untuk lab baru maupun renewal</div>
      </div>
    </div>
  </div>
</section>

<section id="poster">
  <div class="container">
    <h2>Berhenti Buat Dokumen <span>dari Nol</span></h2>
    <p>
      Kesalahan dokumen adalah penyebab utama lab gagal asesmen pertama. Template kami sudah sesuai dengan kriteria asesor KAN.
    </p>
    <div class="poster-tags">
      <span class="tag">Kebijakan Mutu</span>
      <span class="tag">Prosedur Teknis</span>
      <span class="tag">Form Rekaman</span>
      <span class="tag">Audit Internal</span>
      <span class="tag">Kaji Ulang Manajemen</span>
      <span class="tag">Verifikasi Metode</span>
      <span class="tag">Ketidakpastian Pengukuran</span>
      <span class="tag">Uji Banding / Profisiensi</span>
    </div>
    <button class="btn-gold" onclick="document.getElementById('dokumen').scrollIntoView({ behavior: 'smooth' })">Ambil Template Gratis Sekarang <i class="icon fa-solid fa-arrow-right" aria-hidden="true"></i></button>
  </div>
</section>

<section id="dokumen">
  <div class="container">
    <div class="section-eyebrow">Template Dokumen</div>
    <h2 class="section-title">120+ Dokumen Siap Pakai,<br>Sesuai Klausul ISO/IEC 17025</h2>
    <p class="section-sub">
      14 template tersedia gratis setelah isi form. Template lanjutan dapat diakses melalui program Bootcamp atau Kelas Pendampingan.
    </p>

    <div class="preview-note">
      <div class="preview-note-icon"><i class="icon fa-solid fa-lightbulb" style="color:var(--teal)" aria-hidden="true"></i></div>
      <div>
        <h4>Cara menggunakan template ini</h4>
        <p>
          Template dengan label <strong>Gratis</strong> langsung bisa diunduh. Label <strong>Terkunci</strong> tersedia untuk peserta program berbayar Labnesia. Klik dokumen manapun untuk detail.
        </p>
      </div>
    </div>

    <?php
    $klausul_names = [
      4 => 'Kl. 4',
      5 => 'Kl. 5 & 6.2',
      6 => 'Kl. 6',
      7 => 'Kl. 7',
      8 => 'Kl. 8',
    ];

    $klausul_titles = [
      4 => 'Persyaratan Umum — Ketidakberpihakan & Kerahasiaan',
      5 => 'Personel — Kompetensi, Pelatihan & Evaluasi',
      6 => 'Fasilitas, Peralatan & Ketertelusuran',
      7 => 'Proses Pengujian — Sampel, Metode, Pelaporan & Uji Banding',
      8 => 'Sistem Manajemen — Mutu, Audit Internal & Kaji Ulang',
    ];

    foreach ( $documents_by_klausul as $klausul => $docs ) {
      $klausul_num   = $klausul_names[ $klausul ] ?? "Kl. $klausul";
      $klausul_title = $klausul_titles[ $klausul ] ?? '';
      $doc_count     = count( $docs );
      $hidden_count  = max( $doc_count - $display_limit, 0 );
      $klausul_id    = 'doc-grid-' . preg_replace( '/[^a-zA-Z0-9_-]/', '-', (string) $klausul );
    ?>
    <div class="klausul-block">
      <div class="klausul-header">
        <span class="klausul-num"><?php echo esc_html( $klausul_num ); ?></span>
        <h3><?php echo esc_html( $klausul_title ); ?></h3>
        <span class="klausul-count"><?php echo (int) $doc_count; ?> dok</span>
      </div>
      <div class="doc-grid" id="<?php echo esc_attr( $klausul_id ); ?>">
        <?php foreach ( $docs as $index => $doc ):
          $doc_class   = labnesia_checklist_doc_class( $doc['kategori'] );
          $doc_icon    = labnesia_checklist_doc_icon( $doc['kategori'] );
          $doc_badge   = labnesia_checklist_doc_badge( $doc['kategori'] );
          $doc_onclick = labnesia_checklist_doc_onclick( $doc['kategori'] );
          $show_lock   = ( $doc['kategori'] === 'berbayar' || $doc['kategori'] === 'preview' );
          $is_hidden   = $index >= $display_limit;
          $card_classes = 'doc-card ' . $doc_class . ( $is_hidden ? ' doc-hidden' : '' );
        ?>
        <div
          class="<?php echo esc_attr( $card_classes ); ?>"
          onclick="<?php echo esc_attr( $doc_onclick ); ?>"
          <?php echo $is_hidden ? 'hidden' : ''; ?>
        >
          <div class="doc-icon <?php echo esc_attr( $doc_class ); ?>"><?php echo $doc_icon; ?></div>
          <div class="doc-info">
            <div class="doc-name"><?php echo esc_html( $doc['nama_dokumen'] ); ?></div>
            <div class="doc-code"><?php echo esc_html( $doc['kode_dokumen'] ); ?></div>
            <span class="doc-badge <?php echo esc_attr( $doc_class ); ?>"><?php echo $doc_badge; ?></span>
          </div>
          <?php if ( $show_lock ): ?>
          <div class="lock-overlay"><span class="lock-cta"><?php echo ( $doc['kategori'] === 'berbayar' ) ? 'Daftar Bootcamp' : 'Buka di Kelas'; ?> <i class="icon fa-solid fa-arrow-right" aria-hidden="true"></i></span></div>
          <?php endif; ?>
        </div>
        <?php endforeach; ?>
        <?php if ( $hidden_count > 0 ): ?>
        <div class="doc-grid-action">
          <button
            type="button"
            class="btn-outline doc-toggle-btn"
            data-target="<?php echo esc_attr( $klausul_id ); ?>"
            data-hidden-count="<?php echo (int) $hidden_count; ?>"
            aria-controls="<?php echo esc_attr( $klausul_id ); ?>"
            aria-expanded="false"
            onclick="toggleDocuments(this)"
          >
            Lihat lainnya (<?php echo (int) $hidden_count; ?>)
          </button>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <?php } ?>

  </div>
</section>

<div class="modal-overlay" id="modal-gratis" onclick="closeModalOutside(event)">
  <div class="modal">
    <button class="modal-close" onclick="closeAllModals()"><i class="icon fa-solid fa-xmark" aria-hidden="true"></i></button>

    <form id="modal-form-gratis" onsubmit="return submitDocForm(event, 'gratis')">
      <h3>Akses Template Gratis</h3>
      <p>Isi data di bawah ini. Anda akan langsung mendapat akses ke 14 template gratis.</p>
      <input type="hidden" name="kategori" value="gratis">
      <div class="form-error" id="form-error-gratis" style="display:none"></div>

      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" placeholder="Contoh: Budi Santoso" name="name" required>
      </div>

      <div class="form-group">
        <label>Email Aktif</label>
        <input type="email" placeholder="nama@laboratorium.com" name="email" required>
      </div>

      <div class="form-group">
        <label>Nama Laboratorium</label>
        <input type="text" placeholder="Nama lab Anda" name="lab" required>
      </div>

      <div class="form-group">
        <label>Status Akreditasi</label>
        <select name="status" required>
          <option value="">-- Pilih status --</option>
          <option>Belum terakreditasi, baru mulai</option>
          <option>Sedang mempersiapkan dokumen</option>
          <option>Sudah terakreditasi, mau renewal</option>
          <option>Konsultan / pendamping lab</option>
        </select>
      </div>

      <div class="form-check">
        <input type="checkbox" id="f-agree-gratis" name="agree" required>
        <label for="f-agree-gratis">Saya setuju menerima email panduan akreditasi dan informasi program Labnesia.</label>
      </div>

      <button class="btn-submit" type="submit">Download Sekarang — Gratis</button>
    </form>

    <div class="modal-success" id="modal-success-gratis" style="display:none">
      <div class="success-icon"><i class="icon fa-solid fa-circle-check" style="color:var(--teal)" aria-hidden="true"></i></div>
      <h3>Berhasil! Template sudah dikirim</h3>
      <p>Klik tombol di bawah untuk membuka folder dokumen gratis.</p>
      <a class="btn-primary modal-success-btn" href="<?php echo esc_url( $DRIVE_FOLDER_URL ); ?>" target="_blank">Buka Dokumen Gratis <i class="icon fa-solid fa-arrow-right" aria-hidden="true"></i></a>
    </div>
  </div>
</div>

<div class="modal-overlay" id="modal-terkunci" onclick="closeModalOutside(event)">
  <div class="modal">
    <button class="modal-close" onclick="closeAllModals()"><i class="icon fa-solid fa-xmark" aria-hidden="true"></i></button>

    <form id="modal-form-berbayar" onsubmit="return submitDocForm(event, 'berbayar')">
      <h3>Akses Template Berbayar</h3>
      <p>Isi data di bawah ini. Anda akan langsung di hubungi oleh tim kami.</p>
      <input type="hidden" name="kategori" value="berbayar">
      <div class="form-error" id="form-error-berbayar" style="display:none"></div>

      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" placeholder="Contoh: Budi Santoso" name="name" required>
      </div>

      <div class="form-group">
        <label>Email Aktif</label>
        <input type="email" placeholder="nama@laboratorium.com" name="email" required>
      </div>

      <div class="form-group">
        <label>Nama Laboratorium</label>
        <input type="text" placeholder="Nama lab Anda" name="lab" required>
      </div>

      <div class="form-group">
        <label>Status Akreditasi</label>
        <select name="status" required>
          <option value="">-- Pilih status --</option>
          <option>Belum terakreditasi, baru mulai</option>
          <option>Sedang mempersiapkan dokumen</option>
          <option>Sudah terakreditasi, mau renewal</option>
          <option>Konsultan / pendamping lab</option>
        </select>
      </div>

      <div class="form-check">
        <input type="checkbox" id="f-agree-berbayar" name="agree" required>
        <label for="f-agree-berbayar">Saya setuju menerima email panduan akreditasi dan informasi program Labnesia.</label>
      </div>

      <button class="btn-submit" type="submit">Submit</button>
    </form>

    <div class="modal-success" id="modal-success-berbayar" style="display:none">
      <div class="success-icon"><i class="icon fa-solid fa-circle-check" style="color:var(--teal)" aria-hidden="true"></i></div>
      <h3>Data terkirim! Tim kami akan segera menghubungi Anda</h3>
      <p>Atau langsung hubungi tim sales kami:</p>
      <ul class="sales-list">
        <li><a href="https://wa.me/6282172221567?text=<?php echo $wa_text; ?>" target="_blank">+62 821-7222-1567 (Endang)</a></li>
        <li><a href="https://wa.me/6285185000367?text=<?php echo $wa_text; ?>" target="_blank">+62 851-8500-0367 (Berryl)</a></li>
        <li><a href="https://wa.me/62811399523?text=<?php echo $wa_text; ?>" target="_blank">+62 811-399-523 (Kintan)</a></li>
      </ul>
    </div>
  </div>
</div>

<script>
  function openModal(type = 'gratis') {
    closeAllModals();
    const modal = document.getElementById(`modal-${type}`);
    if (modal) {
      modal.classList.add('active');
    }
  }

  function closeAllModals() {
    ['gratis', 'preview', 'terkunci'].forEach((type) => {
      const modal = document.getElementById(`modal-${type}`);
      if (modal) {
        modal.classList.remove('active');
      }
    });
  }

  function closeModalOutside(event) {
    if (event.target.classList.contains('modal-overlay')) {
      closeAllModals();
    }
  }

  function toggleDocuments(button) {
    const targetId = button.getAttribute('data-target');
    const docGrid = document.getElementById(targetId);

    if (!docGrid) {
      return;
    }

    const hiddenCards = docGrid.querySelectorAll('.doc-hidden');
    const isExpanded = !docGrid.classList.contains('expanded');
    const hiddenCount = button.getAttribute('data-hidden-count');

    docGrid.classList.toggle('expanded', isExpanded);
    hiddenCards.forEach((card) => {
      card.hidden = !isExpanded;
      card.classList.toggle('is-visible', isExpanded);
    });

    button.textContent = isExpanded ? 'Sembunyikan dokumen' : `Lihat lainnya (${hiddenCount})`;
    button.setAttribute('aria-expanded', isExpanded ? 'true' : 'false');
  }

  const GAS_URL = <?php echo wp_json_encode( $GAS_URL ); ?>;

  function submitDocForm(event, kategori) {
    event.preventDefault();
    const form = event.target;
    const errorEl = document.getElementById('form-error-' + kategori);

    const name = form.querySelector('[name="name"]').value.trim();
    const email = form.querySelector('[name="email"]').value.trim();
    const lab = form.querySelector('[name="lab"]').value.trim();
    const status = form.querySelector('[name="status"]').value;
    const agree = form.querySelector('[name="agree"]').checked;

    if (!name || !email || !lab || !status) {
      errorEl.textContent = 'Mohon lengkapi semua data terlebih dahulu.';
      errorEl.style.display = 'block';
      return false;
    }
    if (!agree) {
      errorEl.textContent = 'Silakan centang persetujuan terlebih dahulu.';
      errorEl.style.display = 'block';
      return false;
    }
    errorEl.style.display = 'none';

    const btn = form.querySelector('button[type="submit"]');
    btn.disabled = true;
    const originalLabel = btn.innerHTML;
    btn.innerHTML = 'Mengirim...';

    const formData = new FormData();
    formData.append('form', 'checklist-dokumen');
    formData.append('nama', name);
    formData.append('email', email);
    formData.append('lab', lab);
    formData.append('status', status);
    formData.append('kategori', kategori);

    fetch(GAS_URL, { method: 'POST', mode: 'no-cors', body: formData })
      .catch(function(){ /* no-cors gives an opaque response either way — still proceed */ })
      .finally(function(){
        btn.disabled = false;
        btn.innerHTML = originalLabel;
        form.style.display = 'none';
        document.getElementById('modal-success-' + kategori).style.display = 'block';
      });

    return false;
  }
</script>

<?php get_footer(); ?>
