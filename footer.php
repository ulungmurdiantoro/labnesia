<!-- FOOTER -->
<footer class="site-footer" role="contentinfo">
    <div class="footer-grid">
        <div class="footer-brand">
            <a class="nav-logo" href="<?php echo esc_url( home_url('/') ); ?>" style="margin-bottom:16px;display:flex;align-items:center;gap:10px;">
                <div class="nav-logo-mark">Lab</div>
                <div>
                    <span class="nav-logo-text"><?php bloginfo('name'); ?></span>
                    <span class="nav-logo-sub"><?php echo esc_html( get_theme_mod('labnesia_tagline','Pusat Kompetensi ISO/IEC 17025') ); ?></span>
                </div>
            </a>
            <p>Membangun SDM Kompeten, Menguatkan Laboratorium Indonesia. Terakreditasi Komite Akreditasi Nasional (KAN).</p>
            <p style="margin-top:16px;font-size:13px;">
                📧 <a href="mailto:<?php echo esc_attr( get_theme_mod('labnesia_email','info@labnesia.id') ); ?>" style="color:inherit;">
                    <?php echo esc_html( get_theme_mod('labnesia_email','info@labnesia.id') ); ?>
                </a><br>
                📞 +62 821-7222-1567 (Endang)<br>
                📍 labnesia.id
            </p>
        </div>

        <div class="footer-col">
            <h4><?php _e('Mulai Gratis','labnesia'); ?></h4>
            <a href="#">Gap Analysis Gratis</a>
            <a href="#">Webinar Lab Talk</a>
            <a href="#">Download Panduan</a>
            <a href="#">Komunitas Lab</a>
            <a href="#">Kuliah Praktisi</a>
        </div>

        <div class="footer-col">
            <h4><?php _e('Program','labnesia'); ?></h4>
            <a href="#">Pelatihan &amp; Sertifikasi</a>
            <a href="#">Kelas Pendampingan</a>
            <a href="#">Kelas Lanjutan Privat</a>
            <a href="#">Full Pendampingan</a>
            <a href="#">Host Lab Program</a>
        </div>

        <div class="footer-col">
            <h4><?php _e('Tentang','labnesia'); ?></h4>
            <a href="#">Tentang Labnesia</a>
            <a href="#">Para Pakar</a>
            <a href="#">Alumni &amp; Testimoni</a>
            <a href="#">Blog &amp; Artikel</a>
            <a href="#">Hubungi Kami</a>
        </div>
    </div>

    <div class="footer-bottom">
        <span>© <?php echo date('Y'); ?> Labnesia · Padma Global Nusatama</span>
        <span>Terakreditasi KAN · LSP-033-IDN · <a href="https://labnesia.id">labnesia.id</a></span>
    </div>
</footer>

<!-- FLOATING CTA -->
<a href="https://wa.me/<?php echo esc_attr( get_theme_mod('labnesia_whatsapp','6282172221567') ); ?>?text=Halo%20Labnesia%2C%20saya%20ingin%20konsultasi%20gratis%20tentang%20akreditasi%20lab."
   class="float-cta" id="konsultasi" target="_blank" rel="noopener noreferrer">
    💬 Konsultasi Gratis
</a>

<?php wp_footer(); ?>
</body>
</html>
