<?php
/**
 * 404 Not Found template
 */
get_header(); ?>

<main style="padding:140px 48px 80px;min-height:80vh;display:flex;align-items:center;justify-content:center;text-align:center;background:var(--gray-50);">
    <div>
        <p style="font-size:80px;font-weight:800;color:var(--gray-200);letter-spacing:-4px;line-height:1;">404</p>
        <h1 style="font-size:32px;font-weight:800;color:var(--navy);margin:16px 0 12px;">Halaman tidak ditemukan</h1>
        <p style="font-size:16px;color:var(--gray-600);margin-bottom:32px;">Halaman yang Anda cari mungkin sudah dipindahkan atau tidak ada.</p>
        <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn-primary">← Kembali ke Beranda</a>
    </div>
</main>

<?php get_footer();
