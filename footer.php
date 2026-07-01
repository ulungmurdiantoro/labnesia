<!-- FOOTER -->
<footer class="site-footer" role="contentinfo">
    <div class="footer-grid">
        <div class="footer-brand">
            <a class="nav-logo" href="<?php echo esc_url( home_url('/') ); ?>" style="margin-bottom:16px;display:flex;align-items:center;gap:10px;">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/logo/LOGO-LABNESIA-004.gif' ); ?>" alt="<?php bloginfo('name'); ?>" style="height:44px;width:auto;display:block;">
            </a>
            <p>Membangun SDM Kompeten, Menguatkan Laboratorium Indonesia. Terakreditasi Komite Akreditasi Nasional (KAN).</p>
            <p style="margin-top:16px;font-size:13px;">
                <?php labnesia_icon('mail', 'rgba(255,255,255,0.45)', 14); ?> <a href="mailto:<?php echo esc_attr( get_theme_mod('labnesia_email','info@labnesia.id') ); ?>" style="color:inherit;">
                    <?php echo esc_html( get_theme_mod('labnesia_email','info@labnesia.id') ); ?>
                </a><br>
                <?php labnesia_icon('phone', 'rgba(255,255,255,0.45)', 14); ?> +62 821-7222-1567 (Endang)<br>
                <?php labnesia_icon('map-pin', 'rgba(255,255,255,0.45)', 14); ?> labnesia.id
            </p>
        </div>

        <div class="footer-col">
            <h4><?php _e('Mulai Gratis','labnesia'); ?></h4>
            <a href="<?php echo esc_url( home_url('/mulai-gratis/') ); ?>">Gap Analysis Gratis</a>
            <a href="<?php echo esc_url( home_url('/mulai-gratis/') ); ?>#webinar">Webinar Lab Talk</a>
            <a href="<?php echo esc_url( home_url('/mulai-gratis/') ); ?>#download">Download Panduan</a>
            <a href="<?php echo esc_url( home_url('/mulai-gratis/') ); ?>">Komunitas Lab</a>
            <a href="<?php echo esc_url( home_url('/mulai-gratis/') ); ?>#praktisi">Kuliah Praktisi</a>
        </div>

        <div class="footer-col">
            <h4><?php _e('Program','labnesia'); ?></h4>
            <a href="<?php echo esc_url( home_url('/kelas-pendampingan/') ); ?>">Kelas Pendampingan</a>
            <a href="<?php echo esc_url( home_url('/inhouse/') ); ?>">Inhouse Training</a>
            <a href="<?php echo esc_url( home_url('/pelatihan-sertifikasi/') ); ?>">Pelatihan &amp; Sertifikasi</a>
            <a href="<?php echo esc_url( home_url('/optimasi-alat/') ); ?>">Optimasi Alat Lab</a>
            <a href="<?php echo esc_url( home_url('/faq/') ); ?>">FAQ &amp; Perbandingan</a>
        </div>

        <div class="footer-col">
            <h4><?php _e('Informasi','labnesia'); ?></h4>
            <a href="<?php echo esc_url( home_url('/faq/') ); ?>">FAQ &amp; Perbandingan</a>
            <a href="<?php echo esc_url( home_url('/kelas-pendampingan/') ); ?>#para-pakar">Para Pakar</a>
            <a href="<?php echo esc_url( home_url('/kelas-pendampingan/') ); ?>#alumni">Alumni &amp; Testimoni</a>
            <a href="<?php echo esc_url( home_url('/faq/') ); ?>#kontak">Hubungi Kami</a>
        </div>
    </div>

    <div class="footer-bottom">
        <span>© <?php echo date('Y'); ?> Labnesia · Padma Global Nusatama</span>
        <span><a href="https://labnesia.id">labnesia.id</a></span>
    </div>
</footer>

<!-- FLOATING CTA -->
<a href="https://wa.me/<?php echo esc_attr( get_theme_mod('labnesia_whatsapp','6282172221567') ); ?>?text=Halo%20Labnesia%2C%20saya%20ingin%20konsultasi%20gratis%20tentang%20akreditasi%20lab."
   class="float-cta" id="konsultasi" target="_blank" rel="noopener noreferrer">
    <?php labnesia_icon( 'message-circle', 'var(--navy)', 16 ); ?> Konsultasi Gratis
</a>

<?php wp_footer(); ?>
</body>
</html>
