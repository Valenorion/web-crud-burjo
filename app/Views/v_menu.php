<?php
$hlm = "menu";
if(uri_string()!=""){
  $hlm = ucwords(uri_string());
}

// Gabungkan makanan & minuman jadi satu daftar supaya bisa dicari/difilter bareng
$menuItems = [];

if(!empty($foods)){
    foreach($foods as $item){
        $item['_type']  = 'makanan';
        $item['_nama']  = $item['nama_makanan'] ?? 'Menu';
        $menuItems[]    = $item;
    }
}

if(!empty($drinks)){
    foreach($drinks as $item){
        $item['_type']  = 'minuman';
        $item['_nama']  = $item['nama_minuman'] ?? 'Menu';
        $menuItems[]    = $item;
    }
}

// Ganti dengan nomor WhatsApp Burjo kamu (format: 62xxxxxxxxxx, tanpa "+" atau "0" di depan)
$nomorWA = '6281234567890';
?>
<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- Hero -->
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url('<?= base_url('img/burjo_1.png') ?>');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Menu Burjo</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('/') ?>">Home</a></span> <span>Menu</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Menu -->
<section class="ftco-section ftco-menu">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-2">Menu Kami</h2>
                <p>Cari menunya, lalu pesan langsung lewat WhatsApp.</p>
            </div>
        </div>

        <?php if(!empty($menuItems)): ?>
        <!-- Toolbar pencarian & filter -->
        <div class="menu-toolbar ftco-animate">
            <div class="search-box">
                <span class="icon-search"></span>
                <input type="text" id="menuSearch" placeholder="Cari menu, misal: indomie, es teh, nasi goreng...">
            </div>
            <div class="filter-chips" id="filterChips">
                <button type="button" class="chip active" data-filter="all">Semua</button>
                <button type="button" class="chip" data-filter="type:makanan">🍚 Makanan</button>
                <button type="button" class="chip" data-filter="type:minuman">🥤 Minuman</button>
            </div>
        </div>

        <div class="row" id="menuGrid">
            <?php foreach($menuItems as $item): ?>
            <?php
                $namaItem  = $item['_nama'];
                $tersedia  = ($item['status'] ?? '') == 'tersedia';
                $fotoUrl   = !empty($item['foto'])
                    ? base_url('img/' . $item['foto'])
                    : base_url('coffee1-1.0.0/images/' . ($item['_type'] == 'makanan' ? 'dish-1.jpg' : 'drink-1.jpg'));
                $teksWA    = rawurlencode("Halo Burjo, saya mau pesan: {$namaItem}");
                $linkWA    = "https://wa.me/{$nomorWA}?text={$teksWA}";
            ?>
            <div class="col-md-4 col-lg-3 d-flex menu-card-col ftco-animate"
                 data-type="<?= $item['_type'] ?>"
                 data-category="<?= esc(strtolower($item['kategori'] ?? '')) ?>"
                 data-name="<?= esc(strtolower($namaItem)) ?>">
                <div class="card-menu">
                    <div class="img-wrapper">
                        <a href="#" class="img" style="background-image: url('<?= $fotoUrl ?>');"></a>
                        <span class="badge-status <?= $tersedia ? 'badge-available' : 'badge-unavailable' ?>">
                            <?= $tersedia ? 'Tersedia' : 'Habis' ?>
                        </span>
                    </div>
                    <div class="text">
                        <div class="tags">
                            <span class="tag-chip"><?= esc($item['kategori'] ?? ($item['_type'] == 'makanan' ? 'Makanan' : 'Minuman')) ?></span>
                            <?php if($item['_type'] == 'minuman' && !empty($item['ukuran'])): ?>
                            <span class="tag-chip tag-size"><?= esc($item['ukuran']) ?></span>
                            <?php endif; ?>
                        </div>
                        <h3><?= esc($namaItem) ?></h3>
                        <?php if(!empty($item['deskripsi'])): ?>
                        <p class="desc"><?= esc($item['deskripsi']) ?></p>
                        <?php endif; ?>
                        <div class="card-footer-row">
                            <span class="price">Rp <?= number_format($item['harga'] ?? 0, 0, ',', '.') ?></span>
                            <?php if($tersedia): ?>
                            <a href="<?= $linkWA ?>" target="_blank" rel="noopener" class="order-btn">Pesan</a>
                            <?php else: ?>
                            <span class="order-btn is-disabled">Habis</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div id="emptyState" class="empty-state text-center" style="display:none;">
            <p>Menu yang kamu cari tidak ditemukan. Coba kata kunci lain ya.</p>
        </div>

        <?php else: ?>
        <div class="col-12 text-center">
            <p class="text-muted">Belum ada data menu.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<style>
    :root{
        --burjo-brown: #6b4226;
        --burjo-accent: #c49b6f;
        --burjo-cream: #fdf8f2;
        --burjo-green: #3a8a52;
        --burjo-red: #c0392b;
    }

    .heading-section h2{ color: var(--burjo-brown); }

    /* Toolbar */
    .menu-toolbar{
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 30px;
        padding-bottom: 18px;
        border-bottom: 1px solid #eee;
    }
    .search-box{
        position: relative;
        flex: 1 1 260px;
        max-width: 360px;
    }
    .search-box .icon-search{
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #aaa;
        font-size: 14px;
    }
    .search-box input{
        width: 100%;
        padding: 10px 14px 10px 36px;
        border: 1px solid #e2e2e2;
        border-radius: 30px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s;
    }
    .search-box input:focus{
        border-color: var(--burjo-accent);
    }
    .filter-chips{
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    .chip{
        border: 1px solid #e2e2e2;
        background: #fff;
        color: #555;
        padding: 7px 16px;
        border-radius: 30px;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.2s;
    }
    .chip:hover{
        border-color: var(--burjo-accent);
        color: var(--burjo-brown);
    }
    .chip.active{
        background: var(--burjo-brown);
        border-color: var(--burjo-brown);
        color: #fff;
    }

    /* Card */
    .menu-card-col{ margin-bottom: 26px; }
    .card-menu{
        background: var(--burjo-cream);
        border-radius: 12px;
        overflow: hidden;
        width: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        transition: box-shadow 0.25s ease;
    }
    .card-menu:hover{
        box-shadow: 0 8px 22px rgba(0,0,0,0.08);
    }
    .card-menu .img-wrapper{
        position: relative;
        height: 170px;
        background: #eee;
    }
    .card-menu .img-wrapper .img{
        display: block;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
    }
    .badge-status{
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 4px 11px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        color: #fff;
    }
    .badge-available{ background: var(--burjo-green); }
    .badge-unavailable{ background: var(--burjo-red); }

    .card-menu .text{
        padding: 16px 16px 18px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .tags{ margin-bottom: 6px; }
    .tag-chip{
        display: inline-block;
        font-size: 10.5px;
        color: var(--burjo-brown);
        background: rgba(196,155,111,0.18);
        padding: 2px 9px;
        border-radius: 20px;
        margin-right: 5px;
    }
    .card-menu h3{
        font-size: 16px;
        font-weight: 600;
        margin: 4px 0 6px;
        color: #2c2c2c;
    }
    .card-menu .desc{
        font-size: 12.5px;
        color: #888;
        line-height: 1.5;
        margin-bottom: 12px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .card-footer-row{
        margin-top: auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .price{
        font-size: 16px;
        font-weight: 700;
        color: var(--burjo-brown);
    }
    .order-btn{
        background: var(--burjo-green);
        color: #fff;
        font-size: 12.5px;
        font-weight: 600;
        padding: 6px 14px;
        border-radius: 20px;
        text-decoration: none;
        transition: opacity 0.2s;
    }
    .order-btn:hover{ opacity: 0.85; color: #fff; }
    .order-btn.is-disabled{
        background: #ddd;
        color: #888;
        cursor: not-allowed;
    }

    .empty-state{
        padding: 40px 0;
        color: #999;
    }

    @media (max-width: 576px){
        .card-menu .img-wrapper{ height: 140px; }
        .menu-toolbar{ flex-direction: column; align-items: stretch; }
        .search-box{ max-width: 100%; }
    }
</style>

<script>
(function () {
    var chips      = document.querySelectorAll('#filterChips .chip');
    var cards      = document.querySelectorAll('.menu-card-col');
    var searchBox  = document.getElementById('menuSearch');
    var emptyState = document.getElementById('emptyState');
    var activeFilter = 'all';

    function applyFilters() {
        var q = (searchBox.value || '').trim().toLowerCase();
        var visible = 0;

        cards.forEach(function (card) {
            var matchFilter = true;

            if (activeFilter !== 'all') {
                var parts = activeFilter.split(':');
                var key = parts[0], val = parts[1];
                if (key === 'type') matchFilter = card.dataset.type === val;
                if (key === 'cat')  matchFilter = card.dataset.category === val;
            }

            var matchSearch = q === '' || card.dataset.name.indexOf(q) !== -1;
            var show = matchFilter && matchSearch;

            card.style.display = show ? '' : 'none';
            if (show) visible++;
        });

        emptyState.style.display = visible === 0 ? 'block' : 'none';
    }

    chips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            chips.forEach(function (c) { c.classList.remove('active'); });
            chip.classList.add('active');
            activeFilter = chip.dataset.filter;
            applyFilters();
        });
    });

    if (searchBox) {
        searchBox.addEventListener('input', applyFilters);
    }
})();
</script>

<?= $this->endSection() ?>