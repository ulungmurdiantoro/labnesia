<?php
/*
Template Name: Pelatihan dan Sertifikasi
*/
if ( ! defined( 'ABSPATH' ) ) exit;
$url_home      = esc_url( home_url( '/' ) );
$url_kelas     = esc_url( home_url( '/kelas-pendampingan/' ) );
$url_gratis    = esc_url( home_url( '/mulai-gratis/' ) );
$url_faq       = esc_url( home_url( '/faq/' ) );
$url_inhouse   = esc_url( home_url( '/inhouse/' ) );
$url_pelatihan = esc_url( home_url( '/pelatihan-sertifikasi/' ) );
$url_optimasi  = esc_url( home_url( '/optimasi-alat/' ) );

/**
 * Fetch published jadwal posts for a given JP-tier category, soonest first.
 */
function labnesia_ps_jadwal_posts( $slug ) {
	$q = new WP_Query( [
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'category_name'  => $slug,
	] );
	$posts = $q->posts;
	$today = strtotime( 'today' );
	usort( $posts, function( $a, $b ) use ( $today ) {
		$date_a = get_post_meta( $a->ID, '_jadwal_tanggal', true ) ?: $a->post_date;
		$date_b = get_post_meta( $b->ID, '_jadwal_tanggal', true ) ?: $b->post_date;
		$ts_a = strtotime( $date_a );
		$ts_b = strtotime( $date_b );
		$upcoming_a = $ts_a >= $today;
		$upcoming_b = $ts_b >= $today;
		if ( $upcoming_a !== $upcoming_b ) {
			return $upcoming_a ? -1 : 1;
		}
		return $upcoming_a ? ( $ts_a <=> $ts_b ) : ( $ts_b <=> $ts_a );
	} );
	return $posts;
}

/**
 * Render one jadwal-card for a JP-tier post — identical presentation to the
 * cards on /jadwal/ (poster, badge, date, title, excerpt, Daftar Sekarang).
 * Registration only — syllabus content lives in its own section, see
 * labnesia_ps_silabus_section().
 */
function labnesia_ps_jadwal_item( $post, $tag_label ) {
	$event_date     = get_post_meta( $post->ID, '_jadwal_tanggal', true );
	$event_date_end = get_post_meta( $post->ID, '_jadwal_tanggal_selesai', true );
	$event_display  = $event_date
		? labnesia_format_jadwal_date( $event_date, $event_date_end )
		: date_i18n( 'j M Y', strtotime( $post->post_date ) );
	$daftar_url = get_post_meta( $post->ID, '_jadwal_link_daftar', true );
	if ( ! $daftar_url ) $daftar_url = get_permalink( $post );
	$source_thumb = get_post_meta( $post->ID, '_source_featured_image', true );
	$permalink    = get_permalink( $post );
	?>
	<div class="jadwal-card">
		<a href="<?php echo esc_url( $permalink ); ?>">
			<?php if ( has_post_thumbnail( $post ) ) : ?>
				<?php echo get_the_post_thumbnail( $post, 'medium_large', [ 'class' => 'jadwal-card-thumb' ] ); ?>
			<?php elseif ( $source_thumb ) : ?>
				<img class="jadwal-card-thumb" src="<?php echo esc_url( $source_thumb ); ?>" alt="<?php echo esc_attr( get_the_title( $post ) ); ?>" loading="lazy">
			<?php else : ?>
				<div class="jadwal-card-thumb-fallback"><?php labnesia_icon( 'calendar', 'rgba(255,255,255,0.5)', 32 ); ?></div>
			<?php endif; ?>
		</a>
		<div class="jadwal-card-body">
			<div class="jadwal-card-meta">
				<span class="jadwal-card-cat"><?php echo esc_html( $tag_label ); ?></span>
				<span class="jadwal-card-date">
					<?php labnesia_icon( 'calendar', 'var(--amber)', 11 ); ?>
					<?php echo esc_html( $event_display ); ?>
				</span>
			</div>
			<a href="<?php echo esc_url( $permalink ); ?>" style="text-decoration:none">
				<div class="jadwal-card-title"><?php echo esc_html( get_the_title( $post ) ); ?></div>
			</a>
			<div class="jadwal-card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt( $post ), 16 ) ); ?></div>
			<div class="jadwal-card-actions">
				<a href="<?php echo esc_url( $daftar_url ); ?>" class="jadwal-card-daftar" target="_blank" rel="noopener noreferrer">Daftar Sekarang</a>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Render a single combined "Silabus" section listing the syllabus for every
 * post in $posts that has structured silabus meta (_jadwal_silabus_data).
 * Kept entirely separate from the registration cards.
 */
function labnesia_ps_silabus_section( $posts ) {
	$entries = [];
	foreach ( $posts as $post ) {
		$silabus = get_post_meta( $post->ID, '_jadwal_silabus_data', true );
		if ( is_array( $silabus ) && ! empty( $silabus['silabus'] ) ) {
			$entries[] = [ 'post' => $post, 'silabus' => $silabus ];
		}
	}
	if ( empty( $entries ) ) return;
	?>
	<div class="silabus-section">
		<p class="eyebrow">Silabus Pelatihan</p>
		<h3 class="silabus-section-title">Lihat materi lengkap tiap skema.</h3>
		<div class="silabus-accordion">
			<?php foreach ( $entries as $i => $entry ) : $post = $entry['post']; $silabus = $entry['silabus']; ?>
			<div class="sil-step">
				<div class="sil-header<?php echo 0 === $i ? ' active' : ''; ?>" onclick="toggleSilabus(this)">
					<div class="sil-title"><?php echo esc_html( get_the_title( $post ) ); ?></div>
					<span class="sil-chevron">&#8250;</span>
				</div>
				<div class="sil-body<?php echo 0 === $i ? ' open' : ''; ?>">
					<?php foreach ( $silabus['silabus'] as $block ) : ?>
					<div class="jsb-block">
						<?php if ( ! empty( $block['heading'] ) ) : ?><div class="jsb-block-title"><?php echo esc_html( $block['heading'] ); ?></div><?php endif; ?>
						<div class="jsb-list">
							<?php foreach ( $block['items'] as $item ) : ?>
							<div class="jsb-item"><span class="jsb-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span><?php echo esc_html( $item ); ?></div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endforeach; ?>

					<div class="jsb-grid">
						<?php if ( ! empty( $silabus['output'] ) ) : ?>
						<div class="jsb-block">
							<div class="jsb-block-title">Output</div>
							<div class="jsb-list">
								<?php foreach ( $silabus['output'] as $item ) : ?>
								<div class="jsb-item"><span class="jsb-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span><?php echo esc_html( $item ); ?></div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif; ?>
						<?php if ( ! empty( $silabus['benefit'] ) ) : ?>
						<div class="jsb-block">
							<div class="jsb-block-title">Benefit</div>
							<div class="jsb-list">
								<?php foreach ( $silabus['benefit'] as $item ) : ?>
								<div class="jsb-item"><span class="jsb-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span><?php echo esc_html( $item ); ?></div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif; ?>
						<?php if ( ! empty( $silabus['rekomendasi'] ) ) : ?>
						<div class="jsb-block">
							<div class="jsb-block-title">Direkomendasikan untuk</div>
							<div class="jsb-list">
								<?php foreach ( $silabus['rekomendasi'] as $item ) : ?>
								<div class="jsb-item"><span class="jsb-check"><?php labnesia_icon( 'check', 'var(--teal)', 13 ); ?></span><?php echo esc_html( $item ); ?></div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php endif; ?>
					</div>

					<?php if ( ! empty( $silabus['investasi'] ) ) : ?>
					<div class="jsb-investasi">Investasi: <?php echo esc_html( $silabus['investasi'] ); ?></div>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
}

function labnesia_get_static_jp24_schemes() {
	return [
		[
			'title' => 'Laboratory Quality System Officer ISO/IEC 17025',
			'subtitle' => 'Petugas Sistem Mutu Laboratorium ISO/IEC 17025',
			'date' => '22 s.d. 23 Juni 2026',
			'format' => 'Online via Zoom',
			'investasi' => 'Rp 1.750.000 / peserta',
			'benefit' => [
				'Mendapatkan e-sertifikat pelatihan 24 JP',
				'Soft copy materi pelatihan',
				'Rekaman pelatihan',
				'Kartu member Labnesia'
			],
			'rekomendasi' => [
				'Kepala Laboratorium',
				'Manajer Laboratorium',
				'Pranata Laboratorium',
				'Quality Assurance',
				'Quality Control',
				'Teknisi Laboratorium / Analis Lab',
				'Mahasiswa / Fresh Graduate'
			],
			'silabus' => [
				[
					'heading' => '1. Ketidakberpihakan & Kerahasiaan (Klausul 4)',
					'items' => [
						'Analisis risiko ketidakberpihakan',
						'Kebijakan dan prosedur kerahasiaan'
					]
				],
				[
					'heading' => '2. Struktur Organisasi Laboratorium (Klausul 5)',
					'items' => [
						'Status legal & struktur organisasi',
						'Wewenang, tanggung jawab & peran personel'
					]
				],
				[
					'heading' => '3. Pengelolaan Sumber Daya (Klausul 6)',
					'items' => [
						'Kompetensi personel & kondisi lingkungan',
						'Ketertelusuran metrologi',
						'Pengelolaan produk & jasa eksternal'
					]
				],
				[
					'heading' => '4. Persyaratan Proses (Klausul 7)',
					'items' => [
						'Kaji ulang permintaan, tender & kontrak',
						'Seleksi, verifikasi & validasi metode',
						'Pengambilan sampel & penanganan barang uji',
						'Keabsahan hasil & pelaporan',
						'Analisis keluhan & ketidaksesuaian'
					]
				],
				[
					'heading' => '5. Sistem Manajemen Laboratorium (Klausul 8)',
					'items' => [
						'Opsi sistem manajemen (A & B)',
						'Pengendalian dokumen & rekaman',
						'Tindakan risiko & peluang',
						'Audit internal & kaji ulang manajemen'
					]
				]
			]
		],
		[
			'title' => 'GLP Laboratory Technician',
			'subtitle' => 'Teknisi Laboratorium Berbasis GLP',
			'date' => 'Batch 1: 23 s.d. 24 Juli 2026 | Batch 2: 16 s.d. 17 September 2026',
			'format' => 'Online via Zoom',
			'investasi' => 'Rp 1.750.000 / peserta',
			'benefit' => [
				'Mendapatkan e-sertifikat pelatihan 24 JP',
				'Soft copy materi pelatihan',
				'Rekaman pelatihan',
				'Kartu member Labnesia'
			],
			'rekomendasi' => [
				'Kepala Laboratorium',
				'Manajer Laboratorium',
				'Pranata Laboratorium',
				'Quality Assurance',
				'Quality Control',
				'Teknisi Laboratorium / Analis Lab',
				'Mahasiswa / Fresh Graduate'
			],
			'silabus' => [
				[
					'heading' => '1. Persiapan Penerapan GLP',
					'items' => [
						'Pemetaan area kerja untuk mencegah kontaminasi silang',
						'Penyusunan SOP teknis yang aplikatif',
						'Pengecekan status kalibrasi alat & pengelolaan logbook'
					]
				],
				[
					'heading' => '2. Pelaksanaan Pengujian Sesuai Prinsip GLP',
					'items' => [
						'Pelaksanaan pengujian mengikuti Study Plan tanpa penyimpangan',
						'Teknik penimbangan, pemipetan & preparasi sampel yang meminimalisir human error'
					]
				],
				[
					'heading' => '3. Pengendalian Mutu dan Data',
					'items' => [
						'Pencatatan data prinsip ALCOA',
						'Verifikasi akurasi menggunakan bahan acuan bersertifikat',
						'Pembacaan Control Chart & deteksi out-of-trend',
						'Pengelolaan raw data, spesimen & sampel untuk audit'
					]
				],
				[
					'heading' => '4. Pengelolaan Limbah & Pasca Pengujian',
					'items' => [
						'Pemilahan limbah B3 berdasarkan karakteristik',
						'Pengembalian area kerja ke kondisi standar',
						'Pengelolaan manifes limbah'
					]
				]
			]
		],
		[
			'title' => 'Laboratory HSE Officer',
			'subtitle' => 'Petugas K3L Laboratorium',
			'date' => 'Batch 1: 31 Juli s.d. 1 Agustus 2026 | Batch 2: 02 s.d. 03 Desember 2026',
			'format' => 'Online via Zoom',
			'investasi' => 'Rp 1.750.000 / peserta',
			'benefit' => [
				'Mendapatkan e-sertifikat pelatihan 24 JP',
				'Soft copy materi pelatihan',
				'Rekaman pelatihan',
				'Kartu member Labnesia'
			],
			'rekomendasi' => [
				'Kepala Laboratorium',
				'Manajer Laboratorium',
				'Pranata Laboratorium',
				'Quality Assurance',
				'Quality Control',
				'Teknisi Laboratorium / Analis Lab',
				'Mahasiswa / Fresh Graduate'
			],
			'silabus' => [
				[
					'heading' => '1. Identifikasi Bahaya & Penilaian Risiko (HIRADC)',
					'items' => [
						'Identifikasi potensi bahaya di laboratorium',
						'Penilaian risiko',
						'Penetapan pengendalian risiko'
					]
				],
				[
					'heading' => '2. Pengelolaan Bahan Kimia Laboratorium',
					'items' => [
						'Penyimpanan bahan kimia',
						'Pelabelan dan inventarisasi',
						'Penanganan bahan kimia'
					]
				],
				[
					'heading' => '3. Pengelolaan & Penyimpanan Limbah B3',
					'items' => [
						'Pemilahan dan pengemasan limbah B3',
						'Pelabelan limbah B3',
						'Penyimpanan limbah di TPS'
					]
				],
				[
					'heading' => '4. Pengelolaan Tindakan Tanggap Darurat',
					'items' => [
						'Identifikasi situasi darurat',
						'Respons keadaan darurat',
						'Pelaporan kejadian'
					]
				],
				[
					'heading' => '5. Inspeksi K3 & Lingkungan Kerja Laboratorium',
					'items' => [
						'Perencanaan inspeksi',
						'Pelaksanaan inspeksi',
						'Pelaporan hasil inspeksi'
					]
				]
			]
		],
		[
			'title' => 'QC Laboratory Analyst',
			'subtitle' => 'Analis Quality Control Laboratorium',
			'date' => '07 s.d. 08 Agustus 2026',
			'format' => 'Online via Zoom',
			'investasi' => 'Rp 1.750.000 / peserta',
			'benefit' => [
				'Mendapatkan e-sertifikat pelatihan 24 JP',
				'Soft copy materi pelatihan',
				'Rekaman pelatihan',
				'Kartu member Labnesia'
			],
			'rekomendasi' => [
				'Kepala Laboratorium',
				'Manajer Laboratorium',
				'Pranata Laboratorium',
				'Quality Assurance',
				'Quality Control',
				'Teknisi Laboratorium / Analis Lab',
				'Mahasiswa / Fresh Graduate'
			],
			'silabus' => [
				[
					'heading' => 'Materi Pelatihan',
					'items' => [
						'Kaji Ulang Permintaan, Tender & Kontrak Pengujian',
						'Pemilihan, Verifikasi & Validasi Metode Pengujian',
						'Pengambilan Sampel (Sampling)',
						'Penanganan & Persiapan Sampel untuk Analisis',
						'Pembuatan & Pengelolaan Rekaman Teknis Pengujian',
						'Penjaminan Mutu Hasil Pengujian',
						'Evaluasi Ketidakpastian Pengukuran',
						'Penyusunan Laporan Hasil Uji',
						'Identifikasi & Pengendalian Pekerjaan yang Tidak Sesuai'
					]
				]
			]
		],
		[
			'title' => 'Laboratory Operations Officer',
			'subtitle' => 'Pranata Laboratorium',
			'date' => '12 s.d. 13 Agustus 2026',
			'format' => 'Online via Zoom',
			'investasi' => 'Rp 1.750.000 / peserta',
			'benefit' => [
				'Mendapatkan e-sertifikat pelatihan 24 JP',
				'Soft copy materi pelatihan',
				'Rekaman pelatihan',
				'Kartu member Labnesia'
			],
			'rekomendasi' => [
				'Kepala Laboratorium',
				'Manajer Laboratorium',
				'Pranata Laboratorium',
				'Quality Assurance',
				'Quality Control',
				'Teknisi Laboratorium / Analis Lab',
				'Mahasiswa / Fresh Graduate'
			],
			'silabus' => [
				[
					'heading' => '1. Menetapkan Konteks Organisasi dan Perencanaan Mutu (Plan)',
					'items' => [
						'Identifikasi konteks laboratorium',
						'Penetapan ruang lingkup dan risiko',
						'Penetapan sasaran mutu'
					]
				],
				[
					'heading' => '2. Mengelola Sumber Daya dan Operasional (Do)',
					'items' => [
						'Pengelolaan sumber daya manusia dan infrastruktur',
						'Pengendalian informasi terdokumentasi',
						'Komunikasi dan pengendalian eksternal'
					]
				],
				[
					'heading' => '3. Melakukan Evaluasi Kinerja (Check)',
					'items' => [
						'Pemantauan kepuasan pelanggan',
						'Pelaksanaan audit internal',
						'Pelaksanaan tinjauan manajemen'
					]
				],
				[
					'heading' => '4. Melakukan Peningkatan Berkelanjutan (Act)',
					'items' => [
						'Penanganan ketidaksesuaian',
						'Peningkatan berkelanjutan'
					]
				]
			]
		],
		[
			'title' => 'Research and Development Officer',
			'subtitle' => 'Petugas R&D',
			'date' => '19 s.d. 20 Agustus 2026',
			'format' => 'Online via Zoom',
			'investasi' => 'Rp 1.750.000 / peserta',
			'benefit' => [
				'Mendapatkan e-sertifikat pelatihan 24 JP',
				'Soft copy materi pelatihan',
				'Rekaman pelatihan',
				'Kartu member Labnesia'
			],
			'rekomendasi' => [
				'Staf R&D / Research Officer',
				'Product Development Officer',
				'Pranata Laboratorium',
				'Quality Assurance',
				'Quality Control',
				'Teknisi Laboratorium / Analis Lab',
				'Mahasiswa / Fresh Graduate'
			],
			'silabus' => [
				[
					'heading' => '1. Perencanaan Kegiatan Penelitian dan Pengembangan',
					'items' => [
						'Identifikasi kebutuhan dan peluang penelitian/pengembangan',
						'Penyusunan rencana kegiatan R&D',
						'Penetapan pengendalian risiko dan parameter keberhasilan'
					]
				],
				[
					'heading' => '2. Pelaksanaan Kegiatan Penelitian dan Pengembangan',
					'items' => [
						'Pelaksanaan eksperimen/pengembangan sesuai rencana kerja',
						'Pengoperasian peralatan and teknologi pendukung R&D',
						'Pengendalian dan dokumentasi hasil penelitian'
					]
				],
				[
					'heading' => '3. Analisis dan Validasi Hasil Penelitian',
					'items' => [
						'Pengolahan dan analisis data hasil penelitian',
						'Validasi dan verifikasi hasil penelitian',
						'Penyusunan kesimpulan dan rekomendasi teknis'
					]
				],
				[
					'heading' => '4. Pengelolaan Dokumentasi dan Pelaporan Kegiatan R&D',
					'items' => [
						'Penyusunan dokumentasi teknis kegiatan R&D',
						'Pengendalian arsip dan ketertelusuran dokumen',
						'Penyusunan dan penyampaian laporan hasil R&D'
					]
				],
				[
					'heading' => '5. Implementasi dan Peningkatan Berkelanjutan Hasil Pengembangan',
					'items' => [
						'Koordinasi implementasi hasil pengembangan',
						'Evaluasi efektivitas hasil implementasi',
						'Penerapan peningkatan berkelanjutan'
					]
				]
			]
		],
		[
			'title' => 'Quality Assurance Officer',
			'subtitle' => 'Petugas QA',
			'date' => '02 s.d. 03 September 2026',
			'format' => 'Online via Zoom',
			'investasi' => 'Rp 1.750.000 / peserta',
			'benefit' => [
				'Mendapatkan e-sertifikat pelatihan 24 JP',
				'Soft copy materi pelatihan',
				'Rekaman pelatihan',
				'Kartu member Labnesia'
			],
			'rekomendasi' => [
				'Kepala Laboratorium',
				'Manajer Mutu / Quality Manager',
				'Quality Assurance',
				'Quality Control',
				'Pranata Laboratorium',
				'Teknisi Laboratorium / Analis Lab',
				'Mahasiswa / Fresh Graduate'
			],
			'silabus' => [
				[
					'heading' => 'Materi Pelatihan',
					'items' => [
						'Pengelolaan & Pengendalian Dokumen Sistem Manajemen Mutu',
						'Implementasi Sistem Manajemen Mutu Sesuai Standar yang Berlaku',
						'Pelaksanaan Audit Internal Sistem Manajemen Mutu',
						'Identifikasi & Pengendalian Ketidaksesuaian',
						'Pelaksanaan Tindakan Korektif dan Tindakan Pencegahan',
						'Analisis Risiko dan Peluang dalam Sistem Manajemen Mutu',
						'Pemantauan, Pengukuran & Evaluasi Kinerja Mutu',
						'Pengendalian Rekaman & Pelaporan Kinerja Mutu',
						'Penerapan Prinsip Perbaikan Berkelanjutan (Continuous Improvement)'
					]
				]
			]
		],
		[
			'title' => 'Quality Management System (ISO 9001) Officer',
			'subtitle' => 'Petugas Sistem Manajemen Mutu ISO 9001',
			'date' => '09 s.d. 10 September 2026',
			'format' => 'Online via Zoom',
			'investasi' => 'Rp 1.750.000 / peserta',
			'benefit' => [
				'Mendapatkan e-sertifikat pelatihan 24 JP',
				'Soft copy materi pelatihan',
				'Rekaman pelatihan',
				'Kartu member Labnesia'
			],
			'rekomendasi' => [
				'Kepala Laboratorium',
				'Manajer Mutu / Quality Manager',
				'Quality Assurance Officer',
				'Quality Control',
				'Pranata Laboratorium',
				'Teknisi Laboratorium / Analis Lab',
				'Mahasiswa / Fresh Graduate'
			],
			'silabus' => [
				[
					'heading' => '1. Analisis Konteks Organisasi dan Pihak Berkepentingan',
					'items' => [
						'Penentuan konteks organisasi',
						'Pemahaman kebutuhan pihak berkepentingan',
						'Penetapan ruang lingkup SMM'
					]
				],
				[
					'heading' => '2. Perencanaan Mutu dan Manajemen Risiko',
					'items' => [
						'Penanganan risiko dan peluang',
						'Penetapan sasaran mutu',
						'Perencanaan perubahan'
					]
				],
				[
					'heading' => '3. Pengelolaan Sumber Daya dan Informasi Terdokumentasi',
					'items' => [
						'Pengelolaan kompetensi dan kesadaran',
						'Pengelolaan infrastruktur dan lingkungan',
						'Pengendalian informasi terdokumentasi'
					]
				],
				[
					'heading' => '4. Pengendalian Operasional dan Penyedia Eksternal',
					'items' => [
						'Perencanaan operasional',
						'Pengendalian penyedia eksternal (purchasing)',
						'Pengendalian produksi dan penyediaan jasa'
					]
				],
				[
					'heading' => '5. Evaluasi Kinerja dan Peningkatan Berkelanjutan',
					'items' => [
						'Pemantauan dan pengukuran kinerja',
						'Pelaksanaan audit internal',
						'Tinjauan manajemen dan peningkatan'
					]
				]
			]
		],
		[
			'title' => 'Regulatory Affairs Officer',
			'subtitle' => 'Petugas Regulasi',
			'date' => '07 s.d. 08 Oktober 2026',
			'format' => 'Online via Zoom',
			'investasi' => 'Rp 1.750.000 / peserta',
			'benefit' => [
				'Mendapatkan e-sertifikat pelatihan 24 JP',
				'Soft copy materi pelatihan',
				'Rekaman pelatihan',
				'Kartu member Labnesia'
			],
			'rekomendasi' => [
				'Kepala Laboratorium',
				'Regulatory Affairs Staff / Officer',
				'Quality Assurance',
				'Product Registration Officer',
				'Staf perizinan & Compliance',
				'Pranata Laboratorium',
				'Mahasiswa / Fresh Graduate'
			],
			'silabus' => [
				[
					'heading' => 'Materi Pelatihan',
					'items' => [
						'Penerapan Prinsip Kepatuhan Regulasi dan Etika Profesi',
						'Penyusunan dan Evaluasi Dokumen Registrasi dan Perizinan Produk',
						'Proses Pengajuan Registrasi dan Perizinan Produk kepada Otoritas Terkait',
						'Pemantauan Perubahan Regulasi dan Analisis Dampaknya terhadap Produk/Perusahaan',
						'Pengelolaan Arsip dan Sistem Dokumentasi Regulatory Affairs',
						'Evaluasi Kepatuhan Produk dan Penyusunan Tindak Lanjut Ketidaksesuaian (Compliance Management)'
					]
				]
			]
		],
		[
			'title' => 'Environmental Management System (ISO 14001) Officer',
			'subtitle' => 'Petugas Sistem Manajemen Lingkungan ISO 14001',
			'date' => '14 s.d. 15 Oktober 2026',
			'format' => 'Online via Zoom',
			'invest static' => 'Rp 1.750.000 / peserta',
			'investasi' => 'Rp 1.750.000 / peserta',
			'benefit' => [
				'Mendapatkan e-sertifikat pelatihan 24 JP',
				'Soft copy materi pelatihan',
				'Rekaman pelatihan',
				'Kartu member Labnesia'
			],
			'rekomendasi' => [
				'Kepala Laboratorium',
				'Manajer Lingkungan',
				'HSE Officer',
				'Quality Assurance',
				'Pranata Laboratorium',
				'Staf operasional & Produksi',
				'Mahasiswa / Fresh Graduate'
			],
			'silabus' => [
				[
					'heading' => 'Materi Pelatihan',
					'items' => [
						'Penerapan Konteks Organisasi dalam Sistem Manajemen Lingkungan (SML)',
						'Identifikasi Aspek dan Dampak Lingkungan',
						'Identifikasi dan Evaluasi Kewajiban Kepatuhan',
						'Penyusunan Sasaran dan Program Lingkungan',
						'Pengendalian Operasional dan Dokumen SML',
						'Pelaksanaan Pemantauan dan Pengukuran Kinerja Lingkungan'
					]
				]
			]
		],
		[
			'title' => 'Sustainability Officer',
			'subtitle' => 'Petugas Keberlanjutan',
			'date' => '28 s.d. 29 Oktober 2026',
			'format' => 'Online via Zoom',
			'investasi' => 'Rp 1.750.000 / peserta',
			'benefit' => [
				'Mendapatkan e-sertifikat pelatihan 24 JP',
				'Soft copy materi pelatihan',
				'Rekaman pelatihan',
				'Kartu member Labnesia'
			],
			'rekomendasi' => [
				'Sustainability Officer',
				'Environmental, Social & Governance (ESG) Officer',
				'HSE Officer',
				'CSR Officer',
				'Quality Assurance',
				'Staf operasional & Manajemen',
				'Mahasiswa / Fresh Graduate'
			],
			'silabus' => [
				[
					'heading' => '1. Identifikasi Aspek dan Dampak Keberlanjutan Operasional',
					'items' => [
						'Identifikasi aktivitas operasional',
						'Penentuan aspek keberlanjutan',
						'Penilaian dampak keberlanjutan'
					]
				],
				[
					'heading' => '2. Perencanaan Program Peningkatan Kinerja Lingkungan dan Sosial',
					'items' => [
						'Penetapan tujuan program',
						'Penyusunan rencana aksi',
						'Penyusunan dokumen perencanaan'
					]
				],
				[
					'heading' => '3. Implementasi Program Keberlanjutan Organisasi',
					'items' => [
						'Koordinasi pelaksanaan program',
						'Pelaksanaan kegiatan program',
						'Dokumentasi pelaksanaan'
					]
				],
				[
					'heading' => '4. Pemantauan dan Evaluasi Capaian Target Keberlanjutan',
					'items' => [
						'Penyusunan struktur laporan',
						'Pemantauan capaian target keberlanjutan',
						'Evaluasi efektivitas program keberlanjutan'
					]
				],
				[
					'heading' => '5. Komunikasi Kinerja Keberlanjutan Internal',
					'items' => [
						'Penyusunan materi komunikasi',
						'Penyampaian informasi',
						'Dokumentasi komunikasi'
					]
				],
				[
					'heading' => '6. Pengelolaan Data Kinerja Keberlanjutan',
					'items' => [
						'Identifikasi kebutuhan data',
						'Pengumpulan dan pencatatan data',
						'Penjagaan ketertelusuran data'
					]
				]
			]
		],
		[
			'title' => 'ESG Officer',
			'subtitle' => 'Environmental, Social, Governance Officer',
			'date' => '04 s.d. 05 November 2026',
			'format' => 'Online via Zoom',
			'investasi' => 'Rp 1.750.000 / peserta',
			'benefit' => [
				'Mendapatkan e-sertifikat pelatihan 24 JP',
				'Soft copy materi pelatihan',
				'Rekaman pelatihan',
				'Kartu member Labnesia'
			],
			'rekomendasi' => [
				'ESG Officer',
				'Sustainability Officer',
				'CSR Officer',
				'Investor Relations Officer',
				'Quality Assurance',
				'Staf Manajemen Risiko & Kepatuhan',
				'Mahasiswa / Fresh Graduate'
			],
			'silabus' => [
				[
					'heading' => 'Materi Pelatihan',
					'items' => [
						'Identifikasi dan Pemetaan Pemangku Kepentingan',
						'Identifikasi Isu dan Risiko ESG',
						'Penilaian Dampak dan Risiko ESG',
						'Penyusunan Matriks Materialitas',
						'Integrasi Risiko ESG ke dalam Manajemen Risiko Organisasi',
						'Persiapan Informasi Pengungkapan ESG',
						'Dukungan Tata Kelola dan Kebijakan ESG Organisasi'
					]
				]
			]
		],
		[
			'title' => 'Pelatihan & Workshop Keamanan Pangan dan Sensori',
			'subtitle' => 'Panelis Terlatih Pengujian Sensori Pangan',
			'date' => '18 s.d. 19 November 2026',
			'format' => 'Onsite — Semarang',
			'investasi' => 'Mahasiswa & Fresh Graduate: Rp 1.300.000 | Umum: Rp 1.500.000',
			'benefit' => [
				'Sertifikat Pelatihan',
				'Modul & Pelatihan (PDF)',
				'Training Kit dan Souvenir',
				'Coffee Break dan Makan Siang',
				'Template dan Form Uji Sensori',
				'Konsultasi Pasca Pelatihan',
				'Akses Grup Diskusi Peserta',
				'Bonus Sertifikasi Kompetensi'
			],
			'rekomendasi' => [
				'Quality Assurance / Quality Control (QA/QC)',
				'Analis Lab',
				'Teknisi Lab',
				'R&D Pangan',
				'Industri Pangan',
				'Mahasiswa / Fresh Graduate'
			],
			'silabus' => [
				[
					'heading' => 'Hari 1',
					'items' => [
						'Prinsip Analisis Sensori',
						'Fisiologi Panca Indera',
						'Kosakata dalam Uji Sensori',
						'Jenis Pengujian Sensori',
						'Melaksanakan Prosedur Uji Pembedaan',
						'Workshop : Uji Kemampuan Dasar (Warna, Rasa, Aroma)'
					]
				],
				[
					'heading' => 'Hari 2',
					'items' => [
						'Melaksanakan Prosedur Uji Deskriptif Kuantitatif (QDA)',
						'Good Sensory Practices (GSP)',
						'Pembentukan Panelis Terlatih',
						'Mengelola Kinerja & Konsistensi Penilaian',
						'Workshop : Uji Kemampuan Produk (Pembedaan, Rating, Scoring)'
					]
				]
			]
		],
		[
			'title' => 'Food Safety Management Officer',
			'subtitle' => 'Petugas Sistem Keamanan Pangan',
			'date' => '16 s.d. 17 Desember 2026',
			'format' => 'Online via Zoom',
			'investasi' => 'Rp 1.750.000 / peserta',
			'benefit' => [
				'Mendapatkan e-sertifikat pelatihan 24 JP',
				'Soft copy materi pelatihan',
				'Rekaman pelatihan',
				'Kartu member Labnesia'
			],
			'rekomendasi' => [
				'Kepala Laboratorium',
				'Manajer Laboratorium',
				'Pranata Laboratorium',
				'Quality Assurance',
				'Quality Control',
				'Teknisi Laboratorium / Analis Lab',
				'Mahasiswa / Fresh Graduate'
			],
			'silabus' => [
				[
					'heading' => 'Materi Pelatihan',
					'items' => [
						'Penguasaan Prinsip Dasar dan Regulasi Keamanan Pangan',
						'Implementasi Program Prasyarat (Prerequisite Programs/PRPs)',
						'Pengembangan dan Penerapan Rencana HACCP',
						'Pengelolaan Pengendalian Operasional Keamanan Pangan',
						'Pelaksanaan Verifikasi dan Peningkatan Berkelanjutan FSMS',
						'Pengelolaan Komunikasi dan Pelatihan Keamanan Pangan'
					]
				]
			]
		]
	];
}

function labnesia_get_static_jp16_schemes() {
	return [
		[
			'title' => 'Verifikasi dan Validasi Metode Pengujian Standar Laboratorium ISO/IEC 17025',
			'subtitle' => 'Topik Teknis Penerapan ISO/IEC 17025',
			'date' => '10 s.d. 11 Agustus 2026',
			'format' => 'Online via Zoom',
			'investasi' => 'Rp 1.250.000 / peserta (Pendaftaran 2 peserta atau lebih diskon Rp 250.000/peserta)',
			'benefit' => [
				'Mendapatkan e-sertifikat pelatihan 16 JP',
				'Soft copy materi pelatihan',
				'Rekaman pelatihan',
				'Kartu member Labnesia'
			],
			'rekomendasi' => [
				'Kepala Laboratorium',
				'Manajer Laboratorium',
				'Pranata Laboratorium',
				'Quality Assurance',
				'Quality Control',
				'Teknisi Laboratorium / Analis Lab',
				'Mahasiswa / Fresh Graduate'
			],
			'output' => [
				'Laporan Verifikasi dan Validasi Metode'
			],
			'silabus' => [
				[
					'heading' => 'Materi Pelatihan',
					'items' => [
						'Konsep validasi & verifikasi metode',
						'Parameter verifikasi (akurasi, presisi, linearitas, dll.)',
						'Penyusunan protokol verifikasi',
						'Studi kasus metode laboratorium'
					]
				]
			]
		],
		[
			'title' => 'Penerapan Jaminan Mutu Internal dan Pengendalian Mutu Hasil Uji Standar Laboratorium ISO/IEC 17025',
			'subtitle' => 'Topik Teknis Penerapan ISO/IEC 17025',
			'date' => '07 s.d. 08 September 2026',
			'format' => 'Online via Zoom',
			'investasi' => 'Rp 1.250.000 / peserta (Pendaftaran 2 peserta atau lebih diskon Rp 250.000/peserta)',
			'benefit' => [
				'Mendapatkan e-sertifikat pelatihan 16 JP',
				'Soft copy materi pelatihan',
				'Rekaman pelatihan',
				'Kartu member Labnesia'
			],
			'rekomendasi' => [
				'Kepala Laboratorium',
				'Manajer Laboratorium',
				'Pranata Laboratorium',
				'Quality Assurance',
				'Quality Control',
				'Teknisi Laboratorium / Analis Lab',
				'Mahasiswa / Fresh Graduate'
			],
			'output' => [
				'Laporan Pembuatan Control Chart',
				'Laporan Pengecekan antar alat',
				'Laporan Replika pengujian',
				'Laporan Uji banding antar analis'
			],
			'silabus' => [
				[
					'heading' => 'Materi Pelatihan',
					'items' => [
						'Pembuatan Control Chart',
						'Pengecekan antar alat',
						'Replika pengujian',
						'Uji banding antar analis'
					]
				]
			]
		]
	];
}

function labnesia_ps_static_cards_section( $schemes ) {
	if ( empty( $schemes ) ) return;
	?>
	<style>
		.btn-daftar-skema:hover { background: #158a65 !important; }
		.btn-toggle-silabus:hover { background: var(--gray-100) !important; border-color: var(--gray-400) !important; }
	</style>
	<div class="scheme-grid" style="margin-top: 24px; display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px;">
		<?php foreach ( $schemes as $scheme ) : $jp_type = isset($scheme['output']) ? '16' : '24'; ?>
		<div class="scheme-card" style="display: flex; flex-direction: column; justify-content: space-between; border: 2px solid var(--gray-200); border-radius: 18px; overflow: hidden; background: white; transition: all 0.2s;">
			<div>
				<!-- Header (gradient) -->
				<div class="scheme-header auditor" style="background: linear-gradient(135deg, #0B1F3A, #1C3A60); padding: 20px 24px; color: white;">
					<div class="scheme-tag" style="opacity: 0.85; font-size: 9px; letter-spacing: 0.08em; display: flex; justify-content: space-between; text-transform: uppercase; font-weight: 700; margin-bottom: 6px;">
						<span><?php echo esc_html( $scheme['format'] ); ?></span>
						<span style="color: var(--amber); font-weight: 800;"><?php echo $jp_type; ?> JP</span>
					</div>
					<div class="scheme-name" style="font-size: 18px; line-height: 1.35; font-weight: 800; margin-bottom: 4px;"><?php echo esc_html( $scheme['title'] ); ?></div>
					<?php if ( ! empty( $scheme['subtitle'] ) ) : ?>
						<div class="scheme-sub" style="font-size: 12px; opacity: 0.85; font-weight: normal;"><?php echo esc_html( $scheme['subtitle'] ); ?></div>
					<?php endif; ?>
				</div>

				<!-- Body -->
				<div class="scheme-body" style="padding: 20px 24px;">
					<!-- Jadwal/Batch -->
					<div class="scheme-block" style="margin-bottom: 18px;">
						<div class="scheme-block-title" style="color: var(--navy); font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Jadwal Pelaksanaan</div>
						<div class="scheme-list" style="display: flex; flex-direction: column; gap: 6px;">
							<div class="scheme-item" style="font-size: 13.5px; font-weight: 700; color: var(--navy); display: flex; align-items: flex-start; gap: 8px;">
								<span style="margin-top: 1px; color: var(--amber); flex-shrink: 0;"><?php labnesia_icon( 'calendar', 'var(--amber)', 12 ); ?></span>
								<?php echo esc_html( $scheme['date'] ); ?>
							</div>
						</div>
					</div>

					<!-- Silabus -->
					<div class="scheme-block" style="margin-bottom: 18px;">
						<div class="scheme-block-title" style="color: var(--navy); font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Materi Pokok / Silabus</div>
						
						<!-- Collapsible Trigger -->
						<button type="button" class="btn-toggle-silabus" onclick="toggleCardSilabus(this)" style="display: flex; align-items: center; justify-content: space-between; width: 100%; border: 1px solid var(--gray-300); background: var(--gray-50); padding: 8px 12px; border-radius: 8px; font-size: 12.5px; font-weight: 700; color: var(--navy); cursor: pointer; text-align: left; transition: all 0.2s; outline: none; font-family: var(--font-display);">
							<span>Lihat Detail Silabus</span>
							<span class="toggle-icon" style="transition: transform 0.2s; font-size: 10px; display: inline-block;">▼</span>
						</button>

						<!-- Collapsible Content -->
						<div class="collapsible-silabus-content" style="display: none; margin-top: 10px; border-top: 1px dashed var(--gray-200); padding-top: 10px;">
							<div class="scheme-list" style="display: flex; flex-direction: column; gap: 6px;">
								<?php foreach ( $scheme['silabus'] as $block ) : ?>
									<?php if ( count($scheme['silabus']) > 1 && ! empty( $block['heading'] ) ) : ?>
										<div style="font-size: 11px; font-weight: 700; color: var(--gray-700); margin-top: 6px; text-transform: uppercase; letter-spacing: 0.04em;"><?php echo esc_html( $block['heading'] ); ?></div>
									<?php endif; ?>
									<?php foreach ( $block['items'] as $item ) : ?>
										<div class="scheme-item" style="display: flex; align-items: flex-start; gap: 8px; font-size: 13px; color: var(--gray-600); line-height: 1.5;">
											<span class="scheme-check" style="color: var(--teal); font-weight: 700; flex-shrink: 0; margin-top: 2px;"><?php labnesia_icon( 'check', 'var(--teal)', 12 ); ?></span>
											<div><?php echo esc_html( $item ); ?></div>
										</div>
									<?php endforeach; ?>
								<?php endforeach; ?>
							</div>
						</div>
					</div>

					<!-- Target / Rekomendasi -->
					<?php if ( ! empty( $scheme['rekomendasi'] ) ) : ?>
					<div class="scheme-block" style="margin-bottom: 18px;">
						<div class="scheme-block-title" style="color: var(--navy); font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Direkomendasikan Untuk</div>
						<div class="scheme-list" style="display: flex; flex-flow: row wrap; gap: 6px;">
							<?php foreach ( $scheme['rekomendasi'] as $target ) : ?>
								<span style="font-size: 11px; background: var(--gray-100); color: var(--gray-700); padding: 4px 8px; border-radius: 6px; font-weight: 600; display: inline-block;">
									<?php echo esc_html( $target ); ?>
								</span>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

					<!-- Benefit khusus (jika ada seperti Sensori) -->
					<?php if ( count($scheme['benefit']) > 4 || (isset($scheme['title']) && strpos($scheme['title'], 'Sensori') !== false) ) : ?>
					<div class="scheme-block" style="margin-bottom: 18px;">
						<div class="scheme-block-title" style="color: var(--navy); font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Fasilitas & Benefit Khusus</div>
						<div class="scheme-list" style="display: flex; flex-direction: column; gap: 6px;">
							<?php foreach ( $scheme['benefit'] as $benefit ) : ?>
								<div class="scheme-item" style="display: flex; align-items: flex-start; gap: 8px; font-size: 12.5px; color: var(--gray-600); line-height: 1.45;">
									<span class="scheme-check" style="color: var(--teal); font-weight: 700; flex-shrink: 0; margin-top: 1px;"><?php labnesia_icon( 'gift', 'var(--teal)', 11 ); ?></span>
									<div><?php echo esc_html( $benefit ); ?></div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

					<!-- Output khusus (jika ada seperti 16 JP) -->
					<?php if ( ! empty( $scheme['output'] ) ) : ?>
					<div class="scheme-block" style="margin-bottom: 0;">
						<div class="scheme-block-title" style="color: var(--navy); font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">Output Laporan</div>
						<div class="scheme-list" style="display: flex; flex-direction: column; gap: 6px;">
							<?php foreach ( $scheme['output'] as $out ) : ?>
								<div class="scheme-item" style="display: flex; align-items: flex-start; gap: 8px; font-size: 12.5px; color: var(--navy); font-weight: 700; line-height: 1.45;">
									<span class="scheme-check" style="color: var(--teal); font-weight: 700; flex-shrink: 0; margin-top: 1px;"><?php labnesia_icon( 'file', 'var(--teal)', 11 ); ?></span>
									<div><?php echo esc_html( $out ); ?></div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<!-- Footer Kartu: Investasi & CTA -->
			<div style="padding: 18px 24px 24px; background: var(--gray-50); border-top: 1px solid var(--gray-200); display: flex; flex-direction: column; gap: 14px;">
				<div style="display: flex; flex-direction: column; gap: 2px;">
					<span style="font-size: 10px; font-weight: 700; color: var(--gray-500); text-transform: uppercase; letter-spacing: 0.06em;">Investasi</span>
					<span style="font-size: 16px; font-weight: 800; color: var(--navy);"><?php echo esc_html( $scheme['investasi'] ); ?></span>
				</div>
				<button type="button" class="btn-daftar-skema" data-skema="<?php echo esc_attr( $scheme['title'] ); ?>" data-jp="<?php echo $jp_type; ?>" onclick="daftarSkemaStatis(this)" style="width: 100%; text-align: center; border: none; background: var(--teal); color: white; padding: 12px; border-radius: 8px; font-weight: 700; font-size: 13.5px; cursor: pointer; transition: background 0.2s; font-family: var(--font-display);">
					Daftar Skema Ini
				</button>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<?php
}
?>

<?php get_header(); ?>
<style>
  .page-hero{background:var(--navy);padding:104px 48px 64px;position:relative;overflow:hidden}
  .page-hero::before{content:'';position:absolute;inset:0;opacity:0.04;background-image:radial-gradient(circle at 1px 1px,white 1px,transparent 0);background-size:40px 40px}
  .page-hero-inner{max-width:1200px;margin:0 auto;position:relative}
  .breadcrumb{display:flex;align-items:center;gap:8px;margin-bottom:24px}
  .breadcrumb a{color:rgba(255,255,255,0.4);text-decoration:none;font-size:13px}
  .breadcrumb-sep{color:rgba(255,255,255,0.2);font-size:13px}
  .breadcrumb-cur{color:rgba(255,255,255,0.7);font-size:13px}
  .page-eyebrow{display:inline-flex;align-items:center;gap:8px;background:rgba(245,166,35,0.15);border:1px solid rgba(245,166,35,0.3);color:var(--amber);padding:5px 14px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;margin-bottom:20px}
  .page-eyebrow-dot{width:5px;height:5px;border-radius:50%;background:var(--amber);animation:pulse 2s infinite}
  @keyframes pulse{0%,100%{opacity:1}50%{opacity:.4}}
  .page-hero h1{font-size:46px;font-weight:800;color:white;line-height:1.12;letter-spacing:-1.3px;margin-bottom:18px;max-width:680px}
  .page-hero h1 .accent{color:var(--teal-light)}
  .page-hero-sub{font-family:var(--font-serif);font-style:italic;color:rgba(255,255,255,0.6);font-size:16px;line-height:1.65;max-width:580px;border-left:3px solid var(--teal);padding-left:18px;margin-bottom:32px}
  .hero-meta{display:flex;gap:28px;flex-wrap:wrap}
  .hero-meta-item{display:flex;align-items:center;gap:8px}
  .hero-meta-icon{width:32px;height:32px;background:rgba(255,255,255,0.1);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:14px}
  .hero-meta-label{font-size:11px;color:rgba(255,255,255,0.45)}
  .hero-meta-val{font-size:14px;font-weight:700;color:white}

  .jp-tabs{display:inline-flex;gap:6px;background:var(--gray-50);padding:6px;border-radius:12px;flex-wrap:wrap;justify-content:center}
  .jp-tab{background:transparent;border:none;padding:10px 20px;border-radius:8px;font-size:14px;font-weight:700;color:var(--gray-600);cursor:pointer;transition:all .2s;font-family:var(--font-display)}
  .jp-tab:hover{color:var(--navy)}
  .jp-tab.active{background:var(--navy);color:white}
  .jp-panel{display:none}
  .jp-panel.active{display:block}

  section{padding:64px 48px}
  .section-inner{max-width:1200px;margin:0 auto}
  .eyebrow{font-size:11px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--teal);margin-bottom:10px}
  .h2{font-size:32px;font-weight:800;color:var(--navy);line-height:1.18;letter-spacing:-0.7px;margin-bottom:14px}
  .body-text{font-size:15px;color:var(--gray-600);line-height:1.7}

  .scheme-grid{display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-top:40px}
  .scheme-card{border:2px solid var(--gray-200);border-radius:18px;overflow:hidden;transition:all .2s}
  .scheme-card:hover{border-color:var(--teal);box-shadow:0 8px 28px rgba(26,158,117,0.1)}
  .scheme-header{padding:24px;color:white}
  .scheme-header.implementer{background:linear-gradient(135deg,#1A9E75,#0F6E56)}
  .scheme-header.auditor{background:linear-gradient(135deg,#0B1F3A,#1C3A60)}
  .scheme-tag{font-size:10px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;opacity:.7;margin-bottom:6px}
  .scheme-name{font-size:22px;font-weight:800;margin-bottom:4px}
  .scheme-sub{font-size:13px;opacity:.85}
  .scheme-body{padding:24px;background:white}
  .scheme-block{margin-bottom:18px}
  .scheme-block:last-child{margin-bottom:0}
  .scheme-block-title{font-size:12px;font-weight:700;color:var(--navy);text-transform:uppercase;letter-spacing:.05em;margin-bottom:8px}
  .scheme-list{display:flex;flex-direction:column;gap:6px}
  .scheme-item{display:flex;align-items:flex-start;gap:8px;font-size:13.5px;color:var(--gray-600);line-height:1.5}
  .scheme-check{color:var(--teal);font-weight:700;flex-shrink:0;margin-top:1px}

  .summary-banner{background:var(--navy);border-radius:16px;padding:24px 28px;margin-top:32px;text-align:center}
  .summary-text{font-size:15px;color:white;font-weight:600}
  .summary-text span{color:var(--teal-light)}

  /* CURRICULUM ACCORDION */
  .curr-step{margin-bottom:10px}
  .curr-header{display:flex;align-items:center;gap:14px;padding:16px 20px;background:var(--gray-50);border:1px solid var(--gray-200);border-radius:12px;cursor:pointer;transition:all .2s}
  .curr-header:hover{border-color:var(--teal);background:var(--teal-pale)}
  .curr-header.active{border-color:var(--teal);background:var(--teal-pale)}
  .curr-num{width:32px;height:32px;border-radius:8px;background:var(--navy);color:white;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;flex-shrink:0}
  .curr-header.active .curr-num{background:var(--teal)}
  .curr-title{flex:1;font-size:14px;font-weight:700;color:var(--navy)}
  .curr-chevron{font-size:16px;color:var(--gray-400);transition:transform .2s}
  .curr-header.active .curr-chevron{transform:rotate(180deg)}
  .curr-body{display:none;padding:16px 20px;border:1px solid var(--teal);border-top:none;border-radius:0 0 12px 12px;background:white;margin-top:-4px}
  .curr-body.open{display:block}
  .curr-sub-item{display:flex;align-items:flex-start;gap:8px;margin-bottom:8px;font-size:13px;color:var(--gray-600);line-height:1.5}
  .curr-sub-check{color:var(--teal);flex-shrink:0;margin-top:2px}

  /* SYARAT & BENEFIT */
  .info-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:32px}
  .info-card{background:var(--gray-50);border:1px solid var(--gray-200);border-radius:14px;padding:24px}
  .info-card-title{font-size:15px;font-weight:700;color:var(--navy);margin-bottom:14px;display:flex;align-items:center;gap:8px}
  .info-item{display:flex;align-items:flex-start;gap:10px;margin-bottom:10px;font-size:13.5px;color:var(--gray-600);line-height:1.5}
  .info-num{width:20px;height:20px;border-radius:50%;background:var(--teal);color:white;font-size:11px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0}
  .info-check{color:var(--teal);font-weight:700;flex-shrink:0}

  /* PRICING CARDS */
  .pricing-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-top:32px}
  .price-tier{border:1.5px solid var(--gray-200);border-radius:14px;padding:20px;text-align:center;transition:all .2s}
  .price-tier:hover{border-color:var(--teal)}
  .price-tier.featured{border-color:var(--amber);background:var(--amber-pale);position:relative}
  .price-tier-badge{position:absolute;top:-10px;left:50%;transform:translateX(-50%);background:var(--amber);color:var(--navy);font-size:10px;font-weight:800;padding:3px 12px;border-radius:100px;white-space:nowrap}
  .price-tier-label{font-size:11px;font-weight:600;color:var(--gray-600);text-transform:uppercase;letter-spacing:.05em;margin-bottom:8px}
  .price-tier-val{font-size:24px;font-weight:800;color:var(--navy)}
  .price-tier-unit{font-size:11px;color:var(--gray-400)}
  .price-tier-note{font-size:11px;color:var(--gray-500);margin-top:6px}

  /* DISCLAIMER BOX */
  .disclaimer-box{background:var(--gray-50);border:1px solid var(--gray-200);border-left:4px solid var(--gray-400);border-radius:0 12px 12px 0;padding:20px 24px;margin-top:32px}
  .disclaimer-title{font-size:12px;font-weight:700;color:var(--gray-600);text-transform:uppercase;letter-spacing:.06em;margin-bottom:8px;display:flex;align-items:center;gap:8px}
  .disclaimer-text{font-size:13px;color:var(--gray-600);line-height:1.7}
  .disclaimer-text strong{color:var(--gray-800)}

  /* JADWAL — registration cards only, matching /jadwal/ exactly */
  .jadwal-section{background:var(--gray-50)}
  .jadwal-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px}
  .jadwal-card{background:#fff;border:1px solid var(--gray-200);border-radius:16px;overflow:hidden;display:flex;flex-direction:column;transition:box-shadow .2s,transform .2s}
  .jadwal-card:hover{box-shadow:0 12px 28px rgba(11,31,58,0.1);transform:translateY(-2px)}
  .jadwal-card-thumb{width:100%;aspect-ratio:16/10;object-fit:cover;display:block;background:var(--gray-100)}
  .jadwal-card-thumb-fallback{width:100%;aspect-ratio:16/10;background:var(--navy);display:flex;align-items:center;justify-content:center}
  .jadwal-card-body{padding:20px 22px 24px;display:flex;flex-direction:column;flex:1}
  .jadwal-card-meta{display:flex;align-items:center;gap:8px;flex-wrap:wrap;margin-bottom:8px}
  .jadwal-card-cat{font-size:10px;font-weight:700;letter-spacing:.04em;text-transform:uppercase;color:var(--teal);background:var(--teal-pale);padding:3px 9px;border-radius:100px}
  .jadwal-card-date{font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--amber);display:flex;align-items:center;gap:4px}
  .jadwal-card-title{font-size:17px;font-weight:800;color:var(--navy);line-height:1.35;margin-bottom:8px}
  .jadwal-card-excerpt{font-size:13px;color:var(--gray-600);line-height:1.6;flex:1;margin-bottom:14px}
  .jadwal-card-actions{display:flex;gap:8px;flex-wrap:wrap}
  .jadwal-card-actions a{font-size:13px;font-weight:700;padding:8px 14px;border-radius:8px;text-decoration:none}
  .jadwal-card-daftar{background:var(--teal);color:#fff}
  .jadwal-card-daftar:hover{background:#158a65}
  @media (max-width:1024px){.jadwal-grid{grid-template-columns:repeat(2,1fr)}}
  @media (max-width:640px){.jadwal-grid{grid-template-columns:1fr}}

  /* SILABUS — standalone section, separate from the registration cards */
  .silabus-section{margin-bottom:40px}
  .silabus-section-title{font-size:22px;font-weight:800;color:var(--navy);letter-spacing:-0.4px;margin-bottom:20px}
  .silabus-accordion{display:flex;flex-direction:column;gap:10px}
  .sil-step{background:white;border:1px solid var(--gray-200);border-radius:12px;overflow:hidden}
  .sil-header{display:flex;align-items:center;justify-content:space-between;gap:14px;padding:16px 20px;cursor:pointer;transition:background .2s}
  .sil-header:hover{background:var(--gray-50)}
  .sil-header.active{background:var(--teal-pale)}
  .sil-title{font-size:14px;font-weight:700;color:var(--navy)}
  .sil-chevron{font-size:16px;color:var(--gray-400);transition:transform .2s;flex-shrink:0;display:inline-block}
  .sil-header.active .sil-chevron{transform:rotate(90deg)}
  .sil-body{display:none;padding:0 20px 20px;border-top:1px solid var(--gray-100)}
  .sil-body.open{display:block;padding-top:18px}
  .jsb-block{margin-bottom:14px}
  .jsb-block:last-child{margin-bottom:0}
  .jsb-block-title{font-size:12px;font-weight:700;color:var(--navy);text-transform:uppercase;letter-spacing:.04em;margin-bottom:6px}
  .jsb-list{display:flex;flex-direction:column;gap:5px}
  .jsb-item{display:flex;align-items:flex-start;gap:8px;font-size:13px;color:var(--gray-600);line-height:1.5}
  .jsb-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-top:6px}
  .jsb-investasi{background:var(--teal-pale);border-radius:8px;padding:10px 14px;margin-top:14px;font-size:13px;color:#085041;font-weight:700}
  @media (max-width:640px){.jsb-grid{grid-template-columns:1fr}}

  /* OTHER SCHEMES */
  .new-tag{background:var(--teal-pale);color:var(--teal);font-size:9px;font-weight:800;padding:2px 6px;border-radius:3px;letter-spacing:.04em;text-transform:uppercase;margin-left:auto}

  /* CTA FORM */
  .cta-form-section{background:var(--navy);position:relative;overflow:hidden}
  .cta-form-section::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse at 50% 0%,rgba(26,158,117,0.2) 0%,transparent 60%)}
  .cta-form-inner{max-width:680px;margin:0 auto;text-align:center;position:relative}
  .cta-form-title{font-size:34px;font-weight:800;color:white;line-height:1.2;letter-spacing:-0.8px;margin-bottom:14px}
  .cta-form-sub{font-size:15px;color:rgba(255,255,255,0.6);line-height:1.6;margin-bottom:32px}
  .form-card{background:white;border-radius:18px;padding:28px;text-align:left}
  .form-row{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:12px}
  .form-field-full{margin-bottom:12px}
  .form-label{font-size:12px;font-weight:600;color:var(--gray-800);display:block;margin-bottom:5px}
  .form-input{width:100%;padding:11px 14px;border:1px solid var(--gray-200);border-radius:9px;font-size:14px;font-family:var(--font-display);outline:none;transition:border .2s}
  .form-input:focus{border-color:var(--teal)}
  .form-select{width:100%;padding:11px 14px;border:1px solid var(--gray-200);border-radius:9px;font-size:14px;font-family:var(--font-display);outline:none;background:white}
  .btn-submit-cta{width:100%;padding:13px;background:var(--teal);color:white;border:none;border-radius:9px;font-weight:700;font-size:15px;cursor:pointer;margin-top:8px;transition:all .2s}
  .btn-submit-cta:hover{background:#158a65}
  @media (max-width:992px){
    .scheme-grid{grid-template-columns:1fr !important}
    .pricing-grid{grid-template-columns:1fr !important}
  }

</style>

<div class="page-hero">
  <div class="page-hero-inner">
    <div class="breadcrumb">
      <a href="<?php echo $url_home; ?>">Beranda</a>
      <span class="breadcrumb-sep">›</span>
      <span class="breadcrumb-cur">Pelatihan & Sertifikasi Kompetensi</span>
    </div>
    <div class="page-eyebrow"><div class="page-eyebrow-dot"></div> Produk Unggulan 2026 · Terpopuler</div>
    <h1>Pelatihan <span class="accent">Lead Implementer</span> & <span class="accent">Auditor Internal</span><br>ISO/IEC 17025:2017</h1>
    <p class="page-hero-sub">Pelatihan teori dan praktik untuk individu yang ingin membangun atau mengaudit sistem manajemen mutu laboratorium — pertama di Indonesia dengan kurikulum berstandar internasional.</p>
    <div class="hero-meta">
      <div class="hero-meta-item">
        <div class="hero-meta-icon"><?php labnesia_icon( 'clock', '#ffffff', 15 ); ?></div>
        <div><div class="hero-meta-label">Total pelatihan</div><div class="hero-meta-val">40 JP per skema</div></div>
      </div>
      <div class="hero-meta-item">
        <div class="hero-meta-icon"><?php labnesia_icon( 'globe', '#ffffff', 15 ); ?></div>
        <div><div class="hero-meta-label">Format</div><div class="hero-meta-val">Online / Onsite</div></div>
      </div>
      <div class="hero-meta-item">
        <div class="hero-meta-icon"><?php labnesia_icon( 'user', '#ffffff', 15 ); ?></div>
        <div><div class="hero-meta-label">Untuk</div><div class="hero-meta-val">Individu & profesional lab</div></div>
      </div>
      <div class="hero-meta-item">
        <div class="hero-meta-icon"><?php labnesia_icon( 'medal', '#ffffff', 15 ); ?></div>
        <div><div class="hero-meta-label">Track record</div><div class="hero-meta-val">100+ peserta terlatih</div></div>
      </div>
    </div>
  </div>
</div>

<!-- CATATAN PENTING -->
<div style="background:var(--gray-50);padding:24px 48px">
  <div style="max-width:1200px;margin:0 auto;display:flex;gap:14px;align-items:flex-start;background:var(--amber-pale);border:1px solid rgba(245,166,35,0.35);border-left:4px solid var(--amber);border-radius:0 12px 12px 0;padding:18px 22px">
    <span style="flex-shrink:0;margin-top:2px"><?php labnesia_icon( 'info', '#8B6000', 18 ); ?></span>
    <div>
      <p style="font-size:12px;font-weight:700;color:#6B4400;text-transform:uppercase;letter-spacing:.05em;margin-bottom:4px">Catatan Penting</p>
      <p style="font-size:13px;color:#8B5800;line-height:1.65">Pelatihan yang kami selenggarakan bertujuan untuk meningkatkan kompetensi sumber daya manusia (SDM) di lingkungan perguruan tinggi, serta dapat digunakan sebagai salah satu bentuk pemenuhan persyaratan administratif untuk mengikuti uji kompetensi pada skema tertentu di LSP Edukia, sesuai dengan ketentuan yang berlaku. </p>
      <p style="font-size:13px;color:#8B5800;line-height:1.65">Perlu ditegaskan bahwa keikutsertaan dalam pelatihan ini tidak menjamin kelulusan dalam proses sertifikasi kompetensi. Seluruh proses sertifikasi diselenggarakan secara independen oleh LSP Edukia berdasarkan asesmen yang objektif dan mengacu pada standar SNI ISO/IEC 17024.</p>
    </div>
  </div>
</div>

<!-- JP TABS -->
<div style="background:#fff;padding:28px 48px 0;text-align:center">
  <div class="jp-tabs">
    <button type="button" class="jp-tab active" onclick="showJP(this,'jp-40')">Pelatihan 40 JP</button>
    <button type="button" class="jp-tab" onclick="showJP(this,'jp-24')">Pelatihan 24 JP</button>
    <button type="button" class="jp-tab" onclick="showJP(this,'jp-16')">Pelatihan 16 JP</button>
  </div>
</div>

<div id="jp-40" class="jp-panel active">
<!-- TWO SCHEMES -->
<section>
  <div class="section-inner">
    <p class="eyebrow">Dua Skema Pelatihan</p>
    <h2 class="h2">Pilih sesuai peran Anda<br>di laboratorium.</h2>
    <p class="body-text" style="max-width:560px">Lead Implementer fokus pada membangun sistem. Auditor Internal fokus pada menilai sistem yang sudah berjalan. Banyak profesional mengambil keduanya untuk pemahaman menyeluruh.</p>

    <div class="scheme-grid">
      <div class="scheme-card">
        <div class="scheme-header implementer">
          <div class="scheme-tag">Skema 1 · Membangun Sistem</div>
          <div class="scheme-name">Lead Implementer</div>
          <div class="scheme-sub">Standar Laboratorium ISO/IEC 17025:2017</div>
        </div>
        <div class="scheme-body">
          <div class="scheme-block">
            <div class="scheme-block-title">Tujuan Pelatihan</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Membekali peserta merancang, menerapkan, dan mengelola sistem manajemen mutu laboratorium</div>
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Fokus pada pengembangan sistem yang efektif dan keberlanjutan implementasi</div>
            </div>
          </div>
          <div class="scheme-block">
            <div class="scheme-block-title">Peran Utama</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Mengembangkan sistem manajemen mutu dari awal hingga berjalan efektif</div>
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Menyusun prosedur, dokumentasi, dan kontrol operasional</div>
            </div>
          </div>
          <div class="scheme-block">
            <div class="scheme-block-title">Cocok untuk</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Kepala laboratorium, Koordinator mutu, Pimpinan institusi lab</div>
            </div>
          </div>
        </div>
      </div>

      <div class="scheme-card">
        <div class="scheme-header auditor">
          <div class="scheme-tag">Skema 2 · Menilai Sistem</div>
          <div class="scheme-name">Auditor Internal</div>
          <div class="scheme-sub">Standar Laboratorium ISO/IEC 17025:2017</div>
        </div>
        <div class="scheme-body">
          <div class="scheme-block">
            <div class="scheme-block-title">Tujuan Pelatihan</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Membekali peserta melakukan audit internal terhadap sistem yang sudah diimplementasikan</div>
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Fokus pada evaluasi kepatuhan, identifikasi ketidaksesuaian, dan tindak korektif</div>
            </div>
          </div>
          <div class="scheme-block">
            <div class="scheme-block-title">Peran Utama</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Melakukan audit terhadap sistem yang sudah berjalan</div>
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Menyusun laporan audit dan rekomendasi perbaikan</div>
            </div>
          </div>
          <div class="scheme-block">
            <div class="scheme-block-title">Cocok untuk</div>
            <div class="scheme-list">
              <div class="scheme-item"><span class="scheme-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Auditor mutu internal, Personel laboratorium, Pengawas teknis/manajer mutu</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="summary-banner">
      <p class="summary-text"><span>Lead Implementer</span> = Membangun & Menjalankan Sistem &nbsp;·&nbsp; <span>Auditor Internal</span> = Menilai & Memastikan Sistem Berjalan Sesuai Standar</p>
    </div>
  </div>
</section>

<!-- CURRICULUM -->
<section style="background:var(--gray-50)">
  <div class="section-inner">
    <p class="eyebrow">Kurikulum Pelatihan</p>
    <h2 class="h2">Materi lengkap per skema,<br>disesuaikan dengan peran Anda.</h2>
    <p class="body-text" style="max-width:600px;margin-bottom:28px">Pilih tab skema di bawah untuk melihat detail kurikulum yang sesuai — Lead Implementer berfokus pada membangun sistem, Auditor Internal berfokus pada menilai dan mengaudit sistem yang sudah berjalan.</p>

    <!-- Curriculum Scheme Tabs -->
    <div style="display:inline-flex;gap:6px;background:var(--gray-200);padding:5px;border-radius:10px;margin-bottom:28px">
      <button type="button" id="curr-tab-li" class="curr-scheme-tab active" onclick="showCurrScheme('li')"
        style="border:none;padding:9px 22px;border-radius:7px;font-size:13px;font-weight:700;cursor:pointer;transition:all .2s;font-family:var(--font-display);background:var(--navy);color:white">
        Lead Implementer
      </button>
      <button type="button" id="curr-tab-ai" class="curr-scheme-tab" onclick="showCurrScheme('ai')"
        style="border:none;padding:9px 22px;border-radius:7px;font-size:13px;font-weight:700;cursor:pointer;transition:all .2s;font-family:var(--font-display);background:transparent;color:var(--gray-600)">
        Auditor Internal
      </button>
    </div>

    <!-- Lead Implementer Curriculum -->
    <div id="curr-panel-li" class="curr-scheme-panel">
      <div class="curr-step">
        <div class="curr-header active" onclick="toggleCurr(this)">
          <div class="curr-num">1</div>
          <div class="curr-title">Pengenalan ISO/IEC 17025:2017</div>
          <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
        </div>
        <div class="curr-body open">
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Kerangka standar dan regulasi yang relevan</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Prinsip Sistem Manajemen Laboratorium dan Plan-Do-Check-Act (PDCA)</div>
        </div>
      </div>
      <div class="curr-step">
        <div class="curr-header" onclick="toggleCurr(this)">
          <div class="curr-num">2</div>
          <div class="curr-title">Perencanaan Implementasi ISO/IEC 17025:2017</div>
          <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
        </div>
        <div class="curr-body">
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Ketidakberpihakan, kerahasiaan, dan kode etik</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Kepemimpinan, struktur organisasi, dan personel</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Pengelolaan sistem dokumentasi dan informasi</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Pengelolaan fasilitas, kondisi lingkungan, dan peralatan</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Perencanaan penyedia eksternal laboratorium</div>
        </div>
      </div>
      <div class="curr-step">
        <div class="curr-header" onclick="toggleCurr(this)">
          <div class="curr-num">3</div>
          <div class="curr-title">Implementasi ISO/IEC 17025:2017</div>
          <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
        </div>
        <div class="curr-body">
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Pelayanan pelanggan, pengelolaan sampel, dan sampling</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Pemilihan, verifikasi, dan validasi metode</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Ketertelusuran dan ketidakpastian pengukuran</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Jaminan mutu, pengendalian mutu, dan uji profisiensi</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Penerbitan laporan hasil pengukuran</div>
        </div>
      </div>
      <div class="curr-step">
        <div class="curr-header" onclick="toggleCurr(this)">
          <div class="curr-num">4</div>
          <div class="curr-title">Pemantauan, Evaluasi &amp; Continual Improvement</div>
          <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
        </div>
        <div class="curr-body">
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Pengelolaan pengaduan dan manajemen risiko</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Identifikasi ketidaksesuaian dan tindakan perbaikan</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Audit internal dan kaji ulang manajemen</div>
        </div>
      </div>
    </div>

    <!-- Auditor Internal Curriculum -->
    <div id="curr-panel-ai" class="curr-scheme-panel" style="display:none">
      <div class="curr-step">
        <div class="curr-header active" onclick="toggleCurr(this)">
          <div class="curr-num">1</div>
          <div class="curr-title">Pengenalan ISO/IEC 17025:2017</div>
          <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
        </div>
        <div class="curr-body open">
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Sejarah dan pentingnya Standar ISO/IEC 17025:2017</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Prinsip-Prinsip Dasar SNI ISO/IEC 17025:2017</div>
        </div>
      </div>
      <div class="curr-step">
        <div class="curr-header" onclick="toggleCurr(this)">
          <div class="curr-num">2</div>
          <div class="curr-title">Persyaratan Umum ISO/IEC 17025:2017</div>
          <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
        </div>
        <div class="curr-body">
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Pemahaman Umum Persyaratan ISO/IEC 17025:2017</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Perencanaan dan Pengaturan Audit Internal</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>ISO 19011:2018 — Pedoman Audit Sistem Manajemen</div>
        </div>
      </div>
      <div class="curr-step">
        <div class="curr-header" onclick="toggleCurr(this)">
          <div class="curr-num">3</div>
          <div class="curr-title">Kompetensi Auditor Internal</div>
          <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
        </div>
        <div class="curr-body">
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Kriteria dan Keterampilan Auditor Internal</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Proses Seleksi, Pelatihan, dan Sertifikasi Auditor Internal</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Etika dan Sikap Auditor Internal</div>
        </div>
      </div>
      <div class="curr-step">
        <div class="curr-header" onclick="toggleCurr(this)">
          <div class="curr-num">4</div>
          <div class="curr-title">Pelaksanaan Audit Internal</div>
          <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
        </div>
        <div class="curr-body">
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Teknik Pengumpulan Bukti (Pengambilan Sampel, Wawancara, Pemeriksaan Dokumen, dan Pengamatan)</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Pengujian dan Evaluasi Bukti</div>
        </div>
      </div>
      <div class="curr-step">
        <div class="curr-header" onclick="toggleCurr(this)">
          <div class="curr-num">5</div>
          <div class="curr-title">Identifikasi Ketidaksesuaian dan Tindakan Korektif</div>
          <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
        </div>
        <div class="curr-body">
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Teknik Pengumpulan Bukti (Pengambilan Sampel, Wawancara, Pemeriksaan Dokumen, dan Pengamatan)</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Pengujian dan Evaluasi Bukti</div>
        </div>
      </div>
      <div class="curr-step">
        <div class="curr-header" onclick="toggleCurr(this)">
          <div class="curr-num">6</div>
          <div class="curr-title">Analisis Risiko dan Peluang Perbaikan</div>
          <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
        </div>
        <div class="curr-body">
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Identifikasi dan penilaian risiko dalam proses audit</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Perumusan peluang perbaikan sistem laboratorium</div>
        </div>
      </div>
      <div class="curr-step">
        <div class="curr-header" onclick="toggleCurr(this)">
          <div class="curr-num">7</div>
          <div class="curr-title">Pelaporan Audit Internal</div>
          <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
        </div>
        <div class="curr-body">
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Struktur Laporan Audit Internal yang Efektif</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Rekomendasi dan Tindakan Korektif yang Tepat</div>
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Komunikasi Hasil Audit kepada Manajemen</div>
        </div>
      </div>
      <div class="curr-step">
        <div class="curr-header" onclick="toggleCurr(this)">
          <div class="curr-num">8</div>
          <div class="curr-title">Simulasi Audit Internal Laboratorium</div>
          <span class="curr-chevron"><?php labnesia_icon( 'chevron-down', 'var(--gray-400)', 16 ); ?></span>
        </div>
        <div class="curr-body">
          <div class="curr-sub-item"><span class="curr-sub-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Simulasi Audit Internal Laboratorium secara menyeluruh sesuai persyaratan ISO/IEC 17025:2017</div>
        </div>
      </div>
    </div>

    <!-- SYARAT & BENEFIT -->
    <div class="info-grid">
      <div class="info-card">
        <div class="info-card-title"><?php labnesia_icon( 'clipboard-list', 'var(--teal)', 18 ); ?> Syarat Mengikuti Pelatihan</div>
        <div class="info-item"><div class="info-num">1</div>Pendidikan minimal D3</div>
        <div class="info-item"><div class="info-num">2</div>Pengalaman bekerja (termasuk praktik/riset) di laboratorium</div>
        <div class="info-item"><div class="info-num">3</div>Memiliki sertifikat pelatihan pemahaman dan penerapan ISO/IEC 17025:2017 (untuk skema lanjutan)</div>
      </div>
      <div class="info-card">
        <div class="info-card-title"><?php labnesia_icon( 'gift', 'var(--teal)', 18 ); ?> Benefit Pelatihan</div>
        <div class="info-item"><span class="info-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Sertifikat Pelatihan 40 JP</div>
        <div class="info-item"><span class="info-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Soft copy materi pelatihan lengkap</div>
        <div class="info-item"><span class="info-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Kunjungan ke laboratorium (bagi peserta onsite)</div>
        <div class="info-item"><span class="info-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Forum WhatsApp bersama pakar</div>
        <div class="info-item"><span class="info-check"><?php labnesia_icon( 'check', 'var(--teal)', 14 ); ?></span>Gratis template dokumen ISO/IEC 17025:2017</div>
      </div>
    </div>

    <!-- DISCLAIMER -->
    <div class="disclaimer-box">
      <div class="disclaimer-title"><?php labnesia_icon( 'info', 'var(--gray-600)', 12 ); ?> Informasi Mengenai Uji Kompetensi</div>
      <p class="disclaimer-text">Program pelatihan ini dapat digunakan sebagai salah satu bentuk pemenuhan persyaratan administrasi untuk mengikuti uji kompetensi pada skema terkait di Lembaga Sertifikasi Profesi/Person (LSP) yang relevan, sesuai dengan persyaratan dan ketentuan yang berlaku. <strong>Keikutsertaan dalam pelatihan ini tidak menjamin kemudahan proses uji atau menjamin kelulusan sertifikasi kompetensi.</strong> Pendaftaran uji kompetensi dilakukan secara mandiri oleh peserta langsung kepada LSP terkait, dan jadwal resmi uji kompetensi dipublikasikan melalui media LSP secara terpisah.</p>
    </div>
  </div>
</section>

<script>
function showCurrScheme(scheme) {
  document.querySelectorAll('.curr-scheme-panel').forEach(function(p) { p.style.display = 'none'; });
  document.querySelectorAll('.curr-scheme-tab').forEach(function(t) {
    t.style.background = 'transparent';
    t.style.color = 'var(--gray-600)';
  });
  document.getElementById('curr-panel-' + scheme).style.display = 'block';
  var activeTab = document.getElementById('curr-tab-' + scheme);
  activeTab.style.background = (scheme === 'li') ? 'var(--navy)' : 'var(--navy)';
  activeTab.style.color = 'white';
}
</script>

<!-- PRICING -->
<section>
  <div class="section-inner">
    <p class="eyebrow">Investasi Pelatihan</p>
    <h2 class="h2">Skema harga yang fleksibel,<br>online maupun onsite.</h2>
    <div class="pricing-grid" style="grid-template-columns: repeat(2, 1fr); max-width: 600px; margin: 32px auto 0;">
      <div class="price-tier">
        <div class="price-tier-label">Online · Normal</div>
        <div class="price-tier-val">Rp 6,5 jt</div>
        <div class="price-tier-unit">per orang</div>
        <div class="price-tier-note">Rp 6 jt jika ≥3 peserta</div>
      </div>
      <div class="price-tier">
        <div class="price-tier-label">Onsite · Normal</div>
        <div class="price-tier-val">Rp 7,5 jt</div>
        <div class="price-tier-unit">per orang</div>
        <div class="price-tier-note">+Rp 1 jt dari harga online</div>
      </div>
    </div>
    <p style="font-size:12px;color:var(--gray-400);margin-top:16px;text-align:center">Harga belum termasuk biaya uji kompetensi di LSP terkait (jika peserta memilih mengikuti uji kompetensi secara mandiri).</p>
  </div>
</section>

<!-- JADWAL -->
<?php $jp40_posts = labnesia_ps_jadwal_posts( 'pelatihan-40-jp' ); ?>
<section class="jadwal-section">
  <div class="section-inner">
    <p class="eyebrow">Jadwal Pelatihan</p>
    <h2 class="h2">Dibuka rutin sepanjang 2026.</h2>
    <p class="body-text" style="max-width:560px">Jadwal dan tema menyesuaikan kebutuhan & ketersediaan pakar. Hubungi tim kami untuk konfirmasi jadwal terdekat.</p>
    <?php if ( $jp40_posts ) : ?>
    <div class="jadwal-grid">
      <?php foreach ( $jp40_posts as $p ) : labnesia_ps_jadwal_item( $p, '40 JP' ); endforeach; ?>
    </div>
    <?php else : ?>
    <p class="body-text" style="margin-top:16px">Belum ada jadwal 40 JP yang dipublikasikan. <a href="<?php echo esc_url( home_url( '/jadwal/?kategori=pelatihan-40-jp' ) ); ?>" style="color:var(--teal);font-weight:600">Lihat semua jadwal &rarr;</a></p>
    <?php endif; ?>
  </div>
</section>
</div>
<!-- /jp-40 -->

<!-- JP 24 PANEL -->
<?php $jp24_posts = labnesia_ps_jadwal_posts( 'pelatihan-24-jp' ); ?>
<div id="jp-24" class="jp-panel">
<section>
  <div class="section-inner">
    <p class="eyebrow">Skema 24 JP</p>
    <h2 class="h2">Pelatihan kompetensi tematik<br>untuk profesional lab.</h2>
    <p class="body-text" style="max-width:560px;margin-bottom:32px">Skema pelatihan 2 hari (24 JP), online via Zoom, sesuai kebutuhan peran spesifik Anda di laboratorium maupun organisasi. Investasi Rp 1.750.000/peserta.</p>

    <?php labnesia_ps_static_cards_section( labnesia_get_static_jp24_schemes() ); ?>

    <div id="batch-24" style="margin-top: 64px;">
      <?php if ( $jp24_posts ) : ?>
      <p class="eyebrow">Daftar Batch</p>
      <div class="jadwal-grid">
        <?php foreach ( $jp24_posts as $p ) : labnesia_ps_jadwal_item( $p, '24 JP' ); endforeach; ?>
      </div>
      <p style="font-size:12px;color:var(--gray-400);margin-top:16px">Setiap skema termasuk e-sertifikat 24 JP, soft copy materi, rekaman pelatihan, dan kartu member Labnesia. Sertifikat pelatihan dapat menjadi salah satu syarat untuk melanjutkan ke uji sertifikasi kompetensi di LSP terkait.</p>
      <?php else : ?>
      <p class="body-text" style="margin-top:16px">Belum ada jadwal 24 JP yang dipublikasikan. <a href="<?php echo esc_url( home_url( '/jadwal/?kategori=pelatihan-24-jp' ) ); ?>" style="color:var(--teal);font-weight:600">Lihat semua jadwal &rarr;</a></p>
      <?php endif; ?>
    </div>
  </div>
</section>
</div>
<!-- /jp-24 -->

<!-- JP 16 PANEL -->
<?php $jp16_posts = labnesia_ps_jadwal_posts( 'pelatihan-16-jp' ); ?>
<div id="jp-16" class="jp-panel">
<section>
  <div class="section-inner">
    <p class="eyebrow">Skema 16 JP</p>
    <h2 class="h2">Pelatihan topik teknis spesifik,<br>lebih singkat dan fokus.</h2>
    <p class="body-text" style="max-width:560px;margin-bottom:32px">Skema pelatihan 2 hari (16 JP), online via Zoom, untuk pendalaman satu topik teknis penerapan ISO/IEC 17025. Investasi Rp 1.250.000/peserta — diskon Rp 250.000/peserta untuk pendaftaran 2 peserta atau lebih.</p>

    <?php labnesia_ps_static_cards_section( labnesia_get_static_jp16_schemes() ); ?>

    <div id="batch-16" style="margin-top: 64px;">
      <?php if ( $jp16_posts ) : ?>
      <p class="eyebrow">Daftar Batch</p>
      <div class="jadwal-grid">
        <?php foreach ( $jp16_posts as $p ) : labnesia_ps_jadwal_item( $p, '16 JP' ); endforeach; ?>
      </div>
      <p style="font-size:12px;color:var(--gray-400);margin-top:16px">Setiap skema termasuk e-sertifikat 16 JP, soft copy materi, rekaman pelatihan, dan kartu member Labnesia. Sertifikat pelatihan dapat menjadi salah satu syarat untuk melanjutkan ke uji sertifikasi kompetensi di LSP terkait.</p>
      <?php else : ?>
      <p class="body-text" style="margin-top:16px">Belum ada jadwal 16 JP yang dipublikasikan. <a href="<?php echo esc_url( home_url( '/jadwal/?kategori=pelatihan-16-jp' ) ); ?>" style="color:var(--teal);font-weight:600">Lihat semua jadwal &rarr;</a></p>
      <?php endif; ?>
    </div>
  </div>
</section>
</div>
<!-- /jp-16 -->

<!-- CTA FORM -->
<section class="cta-form-section" id="daftar">
  <div class="cta-form-inner">
    <p class="eyebrow" style="color:var(--teal-light)">Daftar Sekarang</p>
    <h2 class="cta-form-title">Tingkatkan kompetensi Anda<br>mulai hari ini.</h2>
    <p class="cta-form-sub">Tim kami akan menghubungi Anda untuk konfirmasi jadwal dan detail pembayaran.</p>
    <form class="form-card" id="pf-form" onsubmit="return submitPelatihanForm(event)">
      <div class="form-row">
        <div>
          <label class="form-label">Nama lengkap *</label>
          <input class="form-input" type="text" id="pf-nama" placeholder="Nama Anda" required>
        </div>
        <div>
          <label class="form-label">Nomor WhatsApp *</label>
          <input class="form-input" type="tel" id="pf-whatsapp" placeholder="08xx-xxxx-xxxx" required>
        </div>
      </div>
      <div class="form-field-full">
        <label class="form-label">Institusi / Laboratorium</label>
        <input class="form-input" type="text" id="pf-institusi" placeholder="Nama institusi Anda">
      </div>
      <div class="form-row">
        <div>
          <label class="form-label">Skema pelatihan *</label>
          <select class="form-select" id="pf-skema" required>
            <option>Lead Implementer ISO/IEC 17025</option>
            <option>Auditor Internal ISO/IEC 17025</option>
            <option>Skema lainnya (sebutkan di catatan)</option>
          </select>
        </div>
        <div>
          <label class="form-label">Format</label>
          <select class="form-select" id="pf-format">
            <option>Online — Early Bird</option>
            <option>Online — Normal</option>
            <option>Onsite — Early Bird</option>
            <option>Onsite — Normal</option>
          </select>
        </div>
      </div>
      <button class="btn-submit-cta" type="submit" id="pf-submit-btn">Daftar Pelatihan <?php labnesia_icon( 'arrow-right', '#ffffff', 15 ); ?></button>
      <p style="font-size:11px;color:var(--gray-400);text-align:center;margin-top:10px">Tidak ada biaya di tahap ini — tim kami akan menghubungi Anda terlebih dahulu.</p>
    </form>
    <div id="pf-success" style="display:none;margin-top:20px;background:var(--teal-pale);border:1px solid rgba(26,158,117,0.3);border-radius:16px;padding:24px;text-align:center">
      <div style="font-size:16px;font-weight:800;color:#085041;margin-bottom:6px">Pendaftaran terkirim!</div>
      <p style="font-size:13px;color:#085041;line-height:1.6">Tim kami akan menghubungi Anda dalam 1×24 jam melalui WhatsApp untuk konfirmasi dan detail pembayaran.</p>
    </div>
  </div>
</section>


<script>
function daftarSkemaStatis(btn) {
  const skemaName = btn.getAttribute('data-skema');
  const jpType = btn.getAttribute('data-jp') || '24';
  const selectElement = document.getElementById('pf-skema');
  if (selectElement) {
    let found = false;
    for (let i = 0; i < selectElement.options.length; i++) {
      if (selectElement.options[i].text === skemaName) {
        selectElement.selectedIndex = i;
        found = true;
        break;
      }
    }
    if (!found) {
      const newOpt = document.createElement('option');
      newOpt.text = skemaName;
      newOpt.value = skemaName;
      selectElement.add(newOpt, selectElement.options[0]);
      selectElement.selectedIndex = 0;
    }
  }
  const targetId = 'batch-' + jpType;
  const batchSection = document.getElementById(targetId);
  if (batchSection) {
    batchSection.scrollIntoView({ behavior: 'smooth' });
  } else {
    const formSection = document.getElementById('daftar');
    if (formSection) {
      formSection.scrollIntoView({ behavior: 'smooth' });
    }
  }
}

function toggleCardSilabus(btn) {
  const content = btn.nextElementSibling;
  const icon = btn.querySelector('.toggle-icon');
  const label = btn.querySelector('span');
  if (content.style.display === 'none' || content.style.display === '') {
    content.style.display = 'block';
    icon.style.transform = 'rotate(180deg)';
    label.textContent = 'Tutup Detail Silabus';
    btn.style.background = 'var(--teal-pale)';
    btn.style.borderColor = 'var(--teal)';
  } else {
    content.style.display = 'none';
    icon.style.transform = 'rotate(0deg)';
    label.textContent = 'Lihat Detail Silabus';
    btn.style.background = 'var(--gray-50)';
    btn.style.borderColor = 'var(--gray-300)';
  }
}

function showJP(el,id){
  document.querySelectorAll('.jp-tab').forEach(t=>t.classList.remove('active'));
  document.querySelectorAll('.jp-panel').forEach(p=>p.classList.remove('active'));
  el.classList.add('active');
  document.getElementById(id).classList.add('active');
}
function toggleSilabus(el){
  const body = el.nextElementSibling;
  const isOpen = body.classList.contains('open');
  const accordion = el.closest('.silabus-accordion');
  accordion.querySelectorAll('.sil-body').forEach(b=>b.classList.remove('open'));
  accordion.querySelectorAll('.sil-header').forEach(h=>h.classList.remove('active'));
  if(!isOpen){body.classList.add('open');el.classList.add('active')}
}
function toggleCurr(el){
  const body=el.nextElementSibling;
  const isOpen=body.classList.contains('open');
  document.querySelectorAll('.curr-body').forEach(b=>b.classList.remove('open'));
  document.querySelectorAll('.curr-header').forEach(h=>h.classList.remove('active'));
  if(!isOpen){body.classList.add('open');el.classList.add('active')}
}

const PF_GAS_URL  = <?php echo wp_json_encode( get_theme_mod( 'labnesia_gas_url', '' ) ); ?>;

function submitPelatihanForm(event){
  event.preventDefault();

  const nama      = document.getElementById('pf-nama').value.trim();
  const whatsapp  = document.getElementById('pf-whatsapp').value.trim();
  const institusi = document.getElementById('pf-institusi').value.trim();
  const skema     = document.getElementById('pf-skema').value;
  const format    = document.getElementById('pf-format').value;

  if(!nama || !whatsapp || !skema){
    alert('Mohon lengkapi Nama, Nomor WhatsApp, dan Skema pelatihan.');
    return false;
  }

  const btn = document.getElementById('pf-submit-btn');
  btn.disabled = true;
  const originalLabel = btn.innerHTML;
  btn.innerHTML = 'Mengirim...';

  function showSuccess(){
    document.getElementById('pf-form').style.display = 'none';
    document.getElementById('pf-success').style.display = 'block';
  }

  if(!PF_GAS_URL){
    btn.disabled = false;
    btn.innerHTML = originalLabel;
    showSuccess();
    return false;
  }

  const formData = new FormData();
  formData.append('form', 'pelatihan-sertifikasi');
  formData.append('nama', nama);
  formData.append('whatsapp', whatsapp);
  formData.append('institusi', institusi);
  formData.append('skema', skema);
  formData.append('format', format);

  fetch(PF_GAS_URL, { method: 'POST', mode: 'no-cors', body: formData })
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