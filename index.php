<?php
/**
 * Front page template — Labnesia.id
 * Renders the full one-page layout matching the HTML mockup.
 */
get_header(); ?>

<!-- ══════════════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════════════ -->
<section class="hero" id="hero">
    <div class="hero-bg-pattern" aria-hidden="true"></div>
    <div class="hero-glow" aria-hidden="true"></div>

    <div class="hero-inner">
        <!-- LEFT: Headline & CTAs -->
        <div>
            <h1>Lab Anda Layak<br>Jadi <span class="accent">Laboratorium Unggul</span></h1>

            <p class="hero-belief">
                "Laboratorium berkualitas dimulai dari SDM yang kompeten.<br>
                Akreditasi adalah hasil — bukan tujuan akhir."
            </p>

            <div class="hero-actions">
                <a href="#give" class="btn-primary">Mulai dari yang Gratis <?php labnesia_icon( 'arrow-right', 'var(--navy)', 15 ); ?></a>
                <a href="<?php echo esc_url( home_url( '/kelas-pendampingan/' ) ); ?>" class="btn-ghost">Lihat Program Pendampingan</a>
            </div>

            <div class="hero-stats">
                <?php foreach ( labnesia_hero_stats() as $stat ) : ?>
                <div class="hero-stat">
                    <div class="hero-stat-num"><?php echo esc_html( $stat['num'] ); ?></div>
                    <div class="hero-stat-label"><?php echo esc_html( $stat['label'] ); ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- RIGHT: Journey map -->
        <div class="hero-map" aria-label="Peta perjalanan akreditasi">
            <p class="hero-map-title">Peta perjalanan akreditasi lab Anda</p>

            <div class="journey-step">
                <div class="journey-dot dot-done" aria-label="Selesai"><?php labnesia_icon( 'check', '#ffffff', 16 ); ?></div>
                <div class="journey-info">
                    <div class="journey-label">Awareness &amp; Pemahaman Dasar</div>
                    <div class="journey-sub">ISO 17025, struktur dokumen, KANMIS</div>
                </div>
                <span class="journey-badge badge-free">Gratis</span>
            </div>

            <div class="journey-step">
                <div class="journey-dot dot-done" aria-label="Selesai"><?php labnesia_icon( 'check', '#ffffff', 16 ); ?></div>
                <div class="journey-info">
                    <div class="journey-label">GAP Analysis &amp; Roadmap</div>
                    <div class="journey-sub">Identifikasi gap dokumen &amp; teknis</div>
                </div>
                <span class="journey-badge badge-free">Gratis</span>
            </div>

            <a href="<?php echo esc_url( home_url( '/kelas-pendampingan/' ) ); ?>" class="journey-step active" style="text-decoration:none;color:inherit;">
                <div class="journey-dot dot-active" aria-label="Aktif"><?php labnesia_icon( 'star', 'var(--navy)', 16 ); ?></div>
                <div class="journey-info">
                    <div class="journey-label">Kelas Pendampingan Akreditasi</div>
                    <div class="journey-sub">4 tahap, online/hybrid, bersama pakar</div>
                </div>
                <span class="journey-badge badge-core">Core</span>
            </a>

            <div class="journey-step">
                <div class="journey-dot dot-locked" aria-label="Belum dimulai">4</div>
                <div class="journey-info">
                    <div class="journey-label">Persiapan &amp; Simulasi Asesmen</div>
                    <div class="journey-sub">Audit kelayakan, CAPA, pendaftaran KAN</div>
                </div>
                <span class="journey-badge badge-adv">Lanjutan</span>
            </div>

            <div class="journey-step">
                <div class="journey-dot dot-locked" aria-label="Tujuan akhir">5</div>
                <div class="journey-info">
                    <div class="journey-label">Laboratorium Terakreditasi KAN</div>
                    <div class="journey-sub">Siap jadi profit center &amp; income generator</div>
                </div>
                <span class="journey-badge badge-adv"><?php labnesia_icon( 'trophy', 'rgba(255,255,255,.7)', 12 ); ?> Goal</span>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════════════
     PROBLEM SECTION
══════════════════════════════════════════════════════════════ -->
<section class="problem-section site-section">
    <div class="section-inner">
        <p class="section-eyebrow">Kenapa banyak lab belum terakreditasi?</p>
        <h2 class="section-title">Kami tahu hambatannya.<br>Kami sudah siapkan jawabannya.</h2>

        <div class="problem-grid">
            <?php
            $problems = [
                [ 'icon'=>'banknote', 'title'=>'Biaya konsultan terlalu mahal',
                  'desc'=>'Pendampingan in-house konvensional bisa mencapai 150–200 juta rupiah. Kebanyakan laboratorium tidak punya anggaran sebesar itu.',
                  'answer'=>'Kelas publik mulai dari Rp 14 juta/peserta' ],
                [ 'icon'=>'compass', 'title'=>'Tidak tahu harus mulai dari mana',
                  'desc'=>'Dokumen ISO 17025 terasa rumit. Mana yang harus dibuat dulu? Bagaimana cara daftar di KANMIS? Tim tidak ada yang paham alurnya.',
                  'answer'=>'Gap Analysis gratis + roadmap implementasi' ],
                [ 'icon'=>'hourglass', 'title'=>'Proses terlalu lama &amp; tidak jelas',
                  'desc'=>'Banyak lab mencoba sendiri bertahun-tahun tanpa hasil. Tidak ada timeline yang jelas dan tidak ada yang memastikan setiap langkah benar.',
                  'answer'=>'Timeline 6 bulan dengan output terstandarisasi' ],
                [ 'icon'=>'user', 'title'=>'Bergantung pada satu orang saja',
                  'desc'=>'Jika Manajer Mutu resign, sistem mutu ikut runtuh. Implementasi tidak berkelanjutan karena hanya satu orang yang paham.',
                  'answer'=>'Rekomendasi 3 peserta per lab (Manajer Mutu, Teknis, Admin)' ],
                [ 'icon'=>'building-2', 'title'=>'Proses pengadaan instansi yang panjang',
                  'desc'=>'In-house training membutuhkan proposal, tender, dan persetujuan yang bisa memakan waktu 6–12 bulan sebelum mulai.',
                  'answer'=>'Daftar sebagai individu, langsung mulai bulan ini' ],
                [ 'icon'=>'search', 'title'=>'Belum yakin dengan kualitas program',
                  'desc'=>'Banyak program pelatihan yang bagus di marketing tapi tidak menghasilkan lab yang benar-benar siap akreditasi.',
                  'answer'=>'30+ lab yang sudah terakreditasi KAN bersama kami' ],
            ];
            foreach ( $problems as $p ) : ?>
            <div class="problem-card">
                <div class="problem-icon" aria-hidden="true"><?php labnesia_icon( $p['icon'], 'var(--teal)', 32 ); ?></div>
                <div class="problem-title"><?php echo esc_html( $p['title'] ); ?></div>
                <div class="problem-desc"><?php echo $p['desc']; ?></div>
                <div class="problem-answer"><?php labnesia_icon( 'arrow-right', 'var(--teal)', 14 ); ?> <?php echo $p['answer']; ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════════════
     GIVE VALUE SECTION
══════════════════════════════════════════════════════════════ -->
<section class="give-section site-section" id="give">
    <div class="section-inner">
        <div class="give-header">
            <p class="section-eyebrow" style="color:var(--teal-light);">Give Value First</p>
            <h2 class="section-title">Kami berikan dulu,<br>baru Anda putuskan.</h2>
            <p class="section-sub">Kami percaya bahwa laboratorium yang sudah merasakan manfaatnya akan tahu sendiri langkah selanjutnya. Tidak perlu dipaksa.</p>
            <div class="give-philosophy">
                <p>"Sebelum Anda mengeluarkan satu rupiah pun, kami ingin memastikan Anda sudah merasakan nilai nyata dari pendampingan kami — itu komitmen kami sebagai mitra, bukan sekadar penyedia jasa."</p>
            </div>
        </div>

        <div class="give-grid">
            <?php
            $give_items = [
                [ 'tag'=>'tag-gratis',    'tag_text'=>'100% Gratis', 'tag_icon'=>true,  'icon'=>'clipboard-list', 'title'=>'Gap Analysis Gratis',
                  'desc'=>'Kami analisis kondisi lab Anda saat ini: gap dokumen, gap teknis, dan kesiapan sistem mutu. Hasilnya Anda dapatkan: Laporan GAP, Penetapan Ruang Lingkup, Struktur Organisasi, dan Roadmap Implementasi.',
                  'cta'=>'Daftar Gap Analysis', 'url'=>'#', 'featured'=>true ],
                [ 'tag'=>'tag-gratis',    'tag_text'=>'100% Gratis', 'tag_icon'=>false, 'icon'=>'graduation-cap', 'title'=>'Webinar Lab Talk',
                  'desc'=>'Sesi edukasi mingguan tentang ISO 17025, tips akreditasi, studi kasus lab, dan sharing dari pakar. Cocok untuk awareness &amp; orientasi tim lab Anda.',
                  'cta'=>'Lihat jadwal webinar', 'url'=>'#', 'featured'=>false ],
                [ 'tag'=>'tag-gratis',    'tag_text'=>'100% Gratis', 'tag_icon'=>false, 'icon'=>'download', 'title'=>'Download Panduan &amp; Template',
                  'desc'=>'Panduan SNI ISO 17025, checklist persiapan akreditasi, silabus pelatihan, dan contoh dokumen audit kecukupan. Langsung bisa digunakan oleh tim Anda.',
                  'cta'=>'Download sekarang', 'url'=>'#', 'featured'=>false ],
                [ 'tag'=>'tag-terbuka',   'tag_text'=>'Terbuka Umum', 'tag_icon'=>false, 'icon'=>'zap', 'title'=>'Bootcamp 1 Hari',
                  'desc'=>'Program intensif 1 hari (online) untuk memahami alur akreditasi secara menyeluruh. Dari struktur dokumen hingga cara daftar di KANMIS 2.0. Biaya sangat terjangkau.',
                  'cta'=>'Lihat jadwal bootcamp', 'url'=>'#', 'featured'=>false ],
                [ 'tag'=>'tag-terbuka',   'tag_text'=>'Untuk Mahasiswa', 'tag_icon'=>false, 'icon'=>'graduation-cap', 'title'=>'Program Kuliah Praktisi',
                  'desc'=>'Sesi tatap muka di kampus: mahasiswa tingkat akhir mendapatkan pemahaman nyata tentang sistem mutu lab &amp; karir di bidang ini. Gratis untuk kampus mitra Labnesia.',
                  'cta'=>'Undang Labnesia ke kampus', 'url'=>'#', 'featured'=>false ],
                [ 'tag'=>'tag-eksklusif', 'tag_text'=>'Eksklusif Member', 'tag_icon'=>false, 'icon'=>'message-circle', 'title'=>'Komunitas Lab Kompeten',
                  'desc'=>'Forum diskusi eksklusif nasional antar manajer lab, analis, dan auditor internal. Tanya jawab dengan pakar, sharing pengalaman asesmen, dan update regulasi terbaru dari KAN.',
                  'cta'=>'Bergabung ke komunitas', 'url'=>'#', 'featured'=>false ],
            ];
            foreach ( $give_items as $item ) :
                $classes = 'give-card' . ( $item['featured'] ? ' featured' : '' );
            ?>
            <div class="<?php echo esc_attr($classes); ?>">
                <span class="give-card-tag <?php echo esc_attr($item['tag']); ?>"><?php if ( $item['tag_icon'] ) : ?><?php labnesia_icon( 'sparkles', 'currentColor', 11 ); ?> <?php endif; ?><?php echo $item['tag_text']; ?></span>
                <div class="give-card-icon" aria-hidden="true"><?php labnesia_icon( $item['icon'], '#ffffff', 36 ); ?></div>
                <div class="give-card-title"><?php echo $item['title']; ?></div>
                <div class="give-card-desc"><?php echo $item['desc']; ?></div>
                <a href="<?php echo esc_url($item['url']); ?>" class="give-card-cta"><?php echo $item['cta']; ?> <?php labnesia_icon( 'arrow-right', 'currentColor', 14 ); ?></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════════════
     PRODUCT SECTION
══════════════════════════════════════════════════════════════ -->
<section class="product-section site-section" id="produk">
    <div class="section-inner">
        <div class="product-intro">
            <div>
                <p class="section-eyebrow">Program &amp; Layanan</p>
                <h2 class="section-title">Mulai dari mana<br>yang sesuai dengan<br>kondisi lab Anda.</h2>
                <p class="section-sub">Tidak ada satu ukuran untuk semua. Kami punya jalur yang tepat — mulai dari yang gratis, hingga pendampingan penuh menuju akreditasi KAN.</p>
            </div>

            <!-- Ladder -->
            <div class="ladder-container">
                <?php
                $ladder = [
                    [ 'name'=>'Webinar &amp; Bootcamp',        'price'=>'Gratis – 500rb',    'desc'=>'Awareness, orientasi, dan pemahaman dasar ISO 17025',                              'active'=>false, 'badge'=>'' ],
                    [ 'name'=>'Pelatihan &amp; Sertifikasi KAN','price'=>'2–7 jt/orang',     'desc'=>'Pelatihan 40 JP + sertifikat kompetensi KAN (Lead Implementer / AI)',             'active'=>false, 'badge'=>'' ],
                    [ 'name'=>'Kelas Pendampingan', 'name_icon'=>true,           'price'=>'14–35 jt/lab',      'desc'=>'4 tahap, output terstandarisasi, 6 bulan, siap audit internal',                    'active'=>true,  'badge'=>'Produk Unggulan 2026', 'url'=>'/kelas-pendampingan/' ],
                    [ 'name'=>'Kelas Lanjutan (Privat)',         'price'=>'36 jt/lab',         'desc'=>'Fokus Tahap 5: pendaftaran KAN, audit kelayakan, simulasi asesmen',                'active'=>false, 'badge'=>'' ],
                    [ 'name'=>'Full Pendampingan (In House)',    'price'=>'150–200 jt/lab',    'desc'=>'Pendampingan privat penuh Tahap 1–5, dari nol hingga akreditasi',                 'active'=>false, 'badge'=>'' ],
                    [ 'name'=>'Host Laboratory Program',         'price'=>'MoU / Kemitraan',   'desc'=>'Lab Anda jadi pusat pelatihan &amp; income generator nasional',                   'active'=>false, 'badge'=>'' ],
                ];
                foreach ( $ladder as $step ) :
                    $cls = 'ladder-step' . ( $step['active'] ? ' active' : '' );
                ?>
                <div class="<?php echo $cls; ?>">
                    <div class="ladder-left"><div class="ladder-dot"></div></div>
                    <div class="ladder-body">
                        <div class="ladder-row">
                            <span class="ladder-name"><?php if ( ! empty( $step['name_icon'] ) ) : ?><?php labnesia_icon( 'star', 'var(--teal)', 13 ); ?> <?php endif; ?><?php echo $step['name']; ?></span>
                            <span class="ladder-price"><?php echo esc_html($step['price']); ?></span>
                        </div>
                        <div class="ladder-desc"><?php echo $step['desc']; ?></div>
                        <?php if ( $step['badge'] ) : ?>
                        <div class="ladder-badge"><?php echo esc_html($step['badge']); ?></div>
                        <?php endif; ?>
                        <?php if ( ! empty($step['url']) ) : ?>
                        <a href="<?php echo esc_url( home_url( $step['url'] ) ); ?>" class="ladder-link">Lihat detail <?php labnesia_icon( 'arrow-right', 'currentColor', 12 ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Give banner -->
        <div class="give-banner">
            <div class="give-banner-left">
                <div class="give-banner-title">Belum ada anggaran? Mulai dari yang gratis dulu.</div>
                <div class="give-banner-sub">Gap Analysis gratis + komunitas + webinar mingguan tersedia tanpa biaya. Ketika lab Anda sudah siap, kami ada di sini.</div>
            </div>
            <div class="give-banner-actions">
                <a href="#" class="btn-teal">Daftar Gap Analysis Gratis</a>
                <a href="#" class="btn-primary">Konsultasi dengan Tim Kami</a>
            </div>
        </div>

        <!-- 3 Featured product cards -->
        <h3 class="section-sub-title">Program yang paling banyak dipilih</h3>
        <div class="product-cards">
            <!-- Card 1 -->
            <div class="product-card">
                <div class="product-card-header">
                    <div class="product-card-eyebrow">Entry · Individu</div>
                    <div class="product-card-name">Pelatihan &amp; Sertifikasi</div>
                    <div class="product-card-price">Rp 2–7 jt <span class="product-card-unit">/orang</span></div>
                </div>
                <div class="product-card-body">
                    <div class="product-feature"><div class="feature-check"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></div><div class="feature-text">Pelatihan 40 JP online/offline</div></div>
                    <div class="product-feature"><div class="feature-check"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></div><div class="feature-text">Sertifikat kompetensi KAN (Lead Implementer atau Auditor Internal)</div></div>
                    <div class="product-feature"><div class="feature-check"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></div><div class="feature-text">Modul pembelajaran terstandarisasi oleh para pakar</div></div>
                    <div class="product-feature"><div class="feature-check"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></div><div class="feature-text">Cocok untuk individu &amp; fresh graduate</div></div>
                    <a href="#" class="product-card-cta cta-outline">Lihat jadwal pelatihan</a>
                </div>
            </div>

            <!-- Card 2 — Featured -->
            <div class="product-card featured">
                <div class="product-card-header">
                    <div class="featured-badge"><?php labnesia_icon( 'star', 'var(--navy)', 10 ); ?> Terpopuler</div>
                    <div class="product-card-eyebrow">Core Program · Laboratorium</div>
                    <div class="product-card-name">Kelas Pendampingan</div>
                    <div class="product-card-price">Rp 14 jt <span class="product-card-unit">/peserta</span></div>
                </div>
                <div class="product-card-body">
                    <div class="product-feature"><div class="feature-check"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></div><div class="feature-text">4 tahap sistematis: Awareness → Dokumen → Kompetensi Teknis → Evaluasi</div></div>
                    <div class="product-feature"><div class="feature-check"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></div><div class="feature-text">Output nyata di setiap sesi (template, laporan, checklist siap pakai)</div></div>
                    <div class="product-feature"><div class="feature-check"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></div><div class="feature-text">GRATIS Serkom KAN senilai Rp 6,5 jt + template dokumen Rp 3,5 jt</div></div>
                    <div class="product-feature"><div class="feature-check"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></div><div class="feature-text">GRATIS konsultasi privat 1-on-1 dengan pakar (Rp 3 jt)</div></div>
                    <div class="product-feature"><div class="feature-check"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></div><div class="feature-text">Akses webinar &amp; bootcamp 1 tahun penuh</div></div>
                    <div class="product-feature"><div class="feature-check"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></div><div class="feature-text">Hemat hingga Rp 20 juta dibanding harga satuan</div></div>
                    <a href="#" class="product-card-cta cta-primary">Daftar Kelas Pendampingan</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="product-card">
                <div class="product-card-header">
                    <div class="product-card-eyebrow">Advanced · Privat</div>
                    <div class="product-card-name">Kelas Lanjutan &amp; Full Pendampingan</div>
                    <div class="product-card-price">Rp 36 jt+ <span class="product-card-unit">/lab</span></div>
                </div>
                <div class="product-card-body">
                    <div class="product-feature"><div class="feature-check"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></div><div class="feature-text">Untuk lab yang sudah selesai Tahap 1–4 dan siap daftar akreditasi KAN</div></div>
                    <div class="product-feature"><div class="feature-check"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></div><div class="feature-text">Pendampingan audit kelayakan &amp; simulasi asesmen intensif</div></div>
                    <div class="product-feature"><div class="feature-check"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></div><div class="feature-text">Full pendampingan 150–200 jt tersedia untuk yang ingin nol hingga akreditasi</div></div>
                    <div class="product-feature"><div class="feature-check"><?php labnesia_icon( 'check', 'var(--teal)', 16 ); ?></div><div class="feature-text">Host Laboratory Program untuk menjadi mitra &amp; income generator</div></div>
                    <a href="#" class="product-card-cta cta-outline">Konsultasi kebutuhan lab</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════════════
     ALUMNI SECTION
══════════════════════════════════════════════════════════════ -->
<section class="alumni-section site-section" id="alumni">
    <div class="section-inner">
        <p class="section-eyebrow">Bukti Nyata</p>
        <h2 class="section-title">30+ Laboratorium<br>sudah membuktikannya.</h2>

        <div class="stats-row">
            <?php
            $stats = [
                [ 'num'=>'30', 'unit'=>'+', 'label'=>'Laboratorium berhasil terakreditasi KAN bersama Labnesia' ],
                [ 'num'=>'15', 'unit'=>'+', 'label'=>'Pakar aktif di 9 bidang laboratorium berbeda' ],
                [ 'num'=>'9',  'unit'=>'',  'label'=>'Jenis lab: lingkungan, pangan, sipil, farmasi, kalibrasi, dll' ],
                [ 'num'=>'2x', 'unit'=>'',  'label'=>'Lebih cepat dari jalur mandiri rata-rata' ],
            ];
            foreach ( $stats as $s ) : ?>
            <div class="stat-card">
                <div class="stat-num"><?php echo esc_html($s['num']); ?><?php if($s['unit']): ?><span class="stat-unit"><?php echo esc_html($s['unit']); ?></span><?php endif; ?></div>
                <div class="stat-label"><?php echo esc_html($s['label']); ?></div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="testimonial-grid">
            <div class="testimonial">
                <p class="testimonial-text">"Pendampingan yang dilakukan sangat baik dan menyenangkan, kami merasakan atmosfer kekeluargaan. Metode ini menjadi kunci kelancaran kami dalam proses Akreditasi KAN. Kami mendapat wawasan baru serta info terupdate seputar laboratorium."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">WS</div>
                    <div>
                        <div class="author-name">Wawan Abdullah Setiawan, S.Si., M.Si.</div>
                        <div class="author-role">Ketua Divisi Biomolekuler · UPT Lab Terpadu Universitas Lampung</div>
                    </div>
                </div>
            </div>
            <div class="testimonial">
                <p class="testimonial-text">"Dengan program Kelas Pendampingan, tim kami yang awalnya tidak paham alur akreditasi kini bisa menyusun seluruh dokumen mutu secara mandiri. Outputnya nyata — bukan hanya teori semata."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">RP</div>
                    <div>
                        <div class="author-name">Manajer Mutu Laboratorium</div>
                        <div class="author-role">Laboratorium Pangan &amp; Gizi · Universitas Negeri</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lab-logos">
            <span style="font-size:13px;color:var(--gray-600);font-weight:600;">Lab yang sudah bergabung:</span>
            <span class="lab-logo-pill">UGM — Lab Teknologi Pertanian</span>
            <span class="lab-logo-pill">Universitas Jambi — Lab Terpadu</span>
            <span class="lab-logo-pill">Univ. Lampung — UPT Lab</span>
            <span class="lab-logo-pill">Univ. Sumatera Utara</span>
            <span class="lab-logo-pill">Lab BP2MHP Semarang</span>
            <span class="lab-logo-pill">PT Trusur Unggul Teknusa</span>
            <span class="lab-more">+24 laboratorium lainnya <?php labnesia_icon( 'arrow-right', 'currentColor', 13 ); ?></span>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════════════
     JOURNEY / START SECTION
══════════════════════════════════════════════════════════════ -->
<section class="journey-section site-section" id="mulai">
    <div class="section-inner">
        <p class="section-eyebrow" style="color:var(--teal-light);">Mulai dari mana?</p>
        <h2 class="section-title">Pilih titik masuk yang<br>paling nyaman untuk Anda.</h2>
        <p class="section-sub">Tidak ada tekanan. Mulai dari yang gratis, rasakan manfaatnya, dan putuskan langkah berikutnya bersama kami.</p>

        <div class="funnel-grid">
            <div class="funnel-step">
                <div class="funnel-icon" style="background:rgba(26,158,117,0.15);border-color:rgba(26,158,117,0.3);" aria-hidden="true"><?php labnesia_icon( 'target', '#ffffff', 26 ); ?></div>
                <div class="funnel-num">Langkah 1</div>
                <div class="funnel-label">Kenali posisi lab Anda</div>
                <div class="funnel-sub">Gap Analysis gratis untuk tahu kondisi aktual lab Anda sekarang</div>
            </div>
            <div class="funnel-step">
                <div class="funnel-icon" style="background:rgba(245,166,35,0.15);border-color:rgba(245,166,35,0.3);" aria-hidden="true"><?php labnesia_icon( 'handshake', '#ffffff', 26 ); ?></div>
                <div class="funnel-num">Langkah 2</div>
                <div class="funnel-label">Pilih program yang tepat</div>
                <div class="funnel-sub">Konsultasi 30 menit dengan tim kami — gratis, tanpa paksaan</div>
            </div>
            <div class="funnel-step">
                <div class="funnel-icon" style="background:rgba(255,255,255,0.1);border-color:rgba(255,255,255,0.15);" aria-hidden="true"><?php labnesia_icon( 'trophy', '#ffffff', 26 ); ?></div>
                <div class="funnel-num">Langkah 3</div>
                <div class="funnel-label">Lab Anda terakreditasi KAN</div>
                <div class="funnel-sub">Dengan sistem mutu yang berjalan, bukan hanya dokumen yang ada</div>
            </div>
        </div>

        <div class="start-options">
            <a href="#" class="start-option">
                <div class="start-option-tag">Mulai Hari Ini · Gratis</div>
                <div class="start-option-title">Daftar Gap Analysis Lab Saya</div>
                <div class="start-option-desc">Dapatkan laporan gap dokumen &amp; teknis, penetapan ruang lingkup, dan roadmap implementasi. 100% gratis.</div>
                <div class="start-option-arrow"><?php labnesia_icon( 'arrow-right', 'var(--teal-light)', 20 ); ?></div>
            </a>
            <a href="#" class="start-option">
                <div class="start-option-tag">Butuh Informasi Dulu</div>
                <div class="start-option-title">Konsultasi 30 Menit Bersama Tim Kami</div>
                <div class="start-option-desc">Ceritakan kondisi lab Anda. Kami bantu petakan jalur terbaik tanpa komitmen apapun dari Anda.</div>
                <div class="start-option-arrow"><?php labnesia_icon( 'arrow-right', 'var(--teal-light)', 20 ); ?></div>
            </a>
            <a href="#" class="start-option">
                <div class="start-option-tag">Sudah Siap · Daftar Sekarang</div>
                <div class="start-option-title">Masuk ke Kelas Pendampingan</div>
                <div class="start-option-desc">Batch berikutnya dimulai bulan depan. Tempat terbatas — maks. 10 instansi per batch.</div>
                <div class="start-option-arrow"><?php labnesia_icon( 'arrow-right', 'var(--teal-light)', 20 ); ?></div>
            </a>
        </div>
    </div>
</section>

<?php get_footer();
