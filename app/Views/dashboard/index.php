<?php
$namaAdmin = session()->get('username') ?? 'Admin';
$tanggalHariIni = date('d F Y');
?>
<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- ========================================== -->
<!-- TOAST NOTIFICATION -->
<!-- ========================================== -->
<div id="toastContainer" style="position: fixed; top: 20px; right: 20px; z-index: 99999; display: flex; flex-direction: column; gap: 10px; max-width: 380px; width: 100%;"></div>

<?php if(session()->getFlashData('success')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        showToast('success', '<?= addslashes(session()->getFlashData('success')) ?>');
    });
</script>
<?php endif; ?>

<?php if(session()->getFlashData('failed')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        showToast('error', '<?= addslashes(session()->getFlashData('failed')) ?>');
    });
</script>
<?php endif; ?>

<!-- Statistik -->
<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="stat-card">
                    <div class="stat-icon stat-icon-orange"><i class="icon-restaurant"></i></div>
                    <div class="stat-info">
                        <strong class="number" data-number="<?= $total_foods ?? 0 ?>">0</strong>
                        <span>Total Makanan</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="stat-card">
                    <div class="stat-icon stat-icon-green"><i class="icon-coffee"></i></div>
                    <div class="stat-info">
                        <strong class="number" data-number="<?= $total_drinks ?? 0 ?>">0</strong>
                        <span>Total Minuman</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="stat-card">
                    <div class="stat-icon stat-icon-brown"><i class="icon-restaurant_menu"></i></div>
                    <div class="stat-info">
                        <strong class="number" data-number="<?= ($total_foods ?? 0) + ($total_drinks ?? 0) ?>">0</strong>
                        <span>Total Menu</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="stat-card">
                    <div class="stat-icon stat-icon-teal"><i class="icon-check-circle"></i></div>
                    <div class="stat-info">
                        <strong class="number" data-number="<?= ($foods_available ?? 0) + ($drinks_available ?? 0) ?>">0</strong>
                        <span>Tersedia</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tabel Menu (Tab Makanan / Minuman) -->
<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="menu-table-card ftco-animate">
            <div class="menu-table-tabs">
                <button type="button" class="table-tab active" data-tab="makanan">
                    Makanan <span class="count"><?= count($foods ?? []) ?></span>
                </button>
                <button type="button" class="table-tab" data-tab="minuman">
                    Minuman <span class="count"><?= count($drinks ?? []) ?></span>
                </button>
            </div>

            <!-- Tab: Makanan -->
            <div class="tab-panel active" id="panel-makanan">
                <div class="table-toolbar">
                    <input type="text" class="table-search" data-target="table-foods" placeholder="Cari nama makanan...">
                    <!-- Tombol Tambah Makanan - Trigger Modal -->
                    <button type="button" class="btn btn-dashboard btn-dashboard-primary btn-sm-dashboard" data-toggle="modal" data-target="#addModal" data-type="makanan">
                        <i class="icon-plus"></i> Tambah Makanan
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="table-foods">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th>Foto</th>
                                <th>Nama Makanan</th>
                                <th>Kategori</th>
                                <th class="text-right">Harga</th>
                                <th class="text-center">Status</th>
                                <th class="text-center" style="width: 110px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($foods)): ?>
                                <?php $no = 1; foreach($foods as $item): ?>
                                <tr data-name="<?= esc(strtolower($item['nama_makanan'])) ?>">
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td>
                                        <?php if(!empty($item['foto'])): ?>
                                            <img src="<?= base_url('img/' . $item['foto']) ?>" alt="<?= esc($item['nama_makanan']) ?>" class="table-thumb">
                                        <?php else: ?>
                                            <div class="table-thumb table-thumb-placeholder"><i class="icon-utensils"></i></div>
                                        <?php endif; ?>
                                    </td>
                                    <td><strong><?= esc($item['nama_makanan']) ?></strong></td>
                                    <td><span class="tag-chip"><?= esc($item['kategori'] ?? '-') ?></span></td>
                                    <td class="text-right fw-bold">Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                                    <td class="text-center">
                                        <span class="status-pill <?= ($item['status'] == 'tersedia') ? 'status-available' : 'status-unavailable' ?>">
                                            <?= ucfirst($item['status'] ?? 'tersedia') ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <!-- Tombol Edit - Trigger Modal -->
                                        <button type="button" class="action-btn action-edit" 
                                                data-toggle="modal" data-target="#editModalFood-<?= $item['id'] ?>" 
                                                title="Edit">
                                            <i class="icon-edit"></i>
                                        </button>
                                        
                                        <!-- Tombol Hapus -->
                                        <a href="<?= base_url('admin/foods/delete/' . $item['id']) ?>" 
                                           class="action-btn action-delete" 
                                           title="Hapus" 
                                           onclick="return confirm('Yakin ingin menghapus makanan ini?')">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-5">Belum ada data makanan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-empty-search" data-for="table-foods" style="display:none;">Tidak ada makanan yang cocok dengan pencarian.</div>
            </div>

            <!-- Tab: Minuman -->
            <div class="tab-panel" id="panel-minuman">
                <div class="table-toolbar">
                    <input type="text" class="table-search" data-target="table-drinks" placeholder="Cari nama minuman...">
                    <!-- Tombol Tambah Minuman - Trigger Modal -->
                    <button type="button" class="btn btn-dashboard btn-dashboard-primary btn-sm-dashboard" data-toggle="modal" data-target="#addModal" data-type="minuman">
                        <i class="icon-plus"></i> Tambah Minuman
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id="table-drinks">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th>Foto</th>
                                <th>Nama Minuman</th>
                                <th>Kategori</th>
                                <th>Ukuran</th>
                                <th class="text-right">Harga</th>
                                <th class="text-center">Status</th>
                                <th class="text-center" style="width: 110px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($drinks)): ?>
                                <?php $no = 1; foreach($drinks as $item): ?>
                                <tr data-name="<?= esc(strtolower($item['nama_minuman'])) ?>">
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td>
                                        <?php if(!empty($item['foto'])): ?>
                                            <img src="<?= base_url('img/' . $item['foto']) ?>" alt="<?= esc($item['nama_minuman']) ?>" class="table-thumb">
                                        <?php else: ?>
                                            <div class="table-thumb table-thumb-placeholder"><i class="icon-coffee"></i></div>
                                        <?php endif; ?>
                                    </td>
                                    <td><strong><?= esc($item['nama_minuman']) ?></strong></td>
                                    <td><span class="tag-chip"><?= esc($item['kategori'] ?? '-') ?></span></td>
                                    <td><span class="tag-chip tag-chip-muted"><?= esc($item['ukuran'] ?? 'Medium') ?></span></td>
                                    <td class="text-right fw-bold">Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                                    <td class="text-center">
                                        <span class="status-pill <?= ($item['status'] == 'tersedia') ? 'status-available' : 'status-unavailable' ?>">
                                            <?= ucfirst($item['status'] ?? 'tersedia') ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <!-- Tombol Edit - Trigger Modal -->
                                        <button type="button" class="action-btn action-edit" 
                                                data-toggle="modal" data-target="#editModalDrink-<?= $item['id'] ?>" 
                                                title="Edit">
                                            <i class="icon-edit"></i>
                                        </button>
                                        
                                        <!-- Tombol Hapus -->
                                        <a href="<?= base_url('admin/drinks/delete/' . $item['id']) ?>" 
                                           class="action-btn action-delete" 
                                           title="Hapus" 
                                           onclick="return confirm('Yakin ingin menghapus minuman ini?')">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-5">Belum ada data minuman.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-empty-search" data-for="table-drinks" style="display:none;">Tidak ada minuman yang cocok dengan pencarian.</div>
            </div>
        </div>
    </div>
</section>

<!-- Recent Activities & Today's Statistics -->
<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 ftco-animate">
                <h2 class="panel-title">Aktivitas Terbaru</h2>
                <div class="panel-card">
                    <?php if(!empty($recent_activities)): ?>
                        <?php foreach($recent_activities as $activity): ?>
                        <div class="activity-row">
                            <div class="activity-icon">
                                <?php
                                    $iconMap = [
                                        'plus'  => 'icon-plus-circle',
                                        'login' => 'icon-login',
                                        'cart'  => 'icon-shopping_cart',
                                        'edit'  => 'icon-edit',
                                    ];
                                    $iconClass = $iconMap[$activity['icon']] ?? 'icon-user';
                                ?>
                                <i class="<?= $iconClass ?>"></i>
                            </div>
                            <div class="activity-text">
                                <?= esc($activity['activity']) ?>
                            </div>
                            <small class="activity-time"><?= esc($activity['time']) ?></small>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="panel-empty">Belum ada aktivitas terbaru.</div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-6 ftco-animate">
                <h2 class="panel-title">Statistik Hari Ini</h2>
                <div class="panel-card">
                    <div class="row text-center px-2 pt-3">
                        <div class="col-6">
                            <div class="mini-stat">
                                <i class="icon-eye"></i>
                                <strong class="number" data-number="<?= $today_visitors ?? 0 ?>">0</strong>
                                <span>Pengunjung</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mini-stat">
                                <i class="icon-shopping_cart"></i>
                                <strong class="number" data-number="<?= $today_transactions ?? 0 ?>">0</strong>
                                <span>Transaksi</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer-note">
                        Update terakhir: <?= date('d F Y, H:i') ?> WIB
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- MODAL TAMBAH DATA (CREATE) -->
<!-- ========================================== -->
<?= $this->include('dashboard/modal_add') ?>

<!-- ========================================== -->
<!-- MODAL EDIT DATA (UPDATE) -->
<!-- ========================================== -->
<?= $this->include('dashboard/modal_edit') ?>

<!-- ========================================== -->
<!-- STYLE -->
<!-- ========================================== -->
<style>
    /* ... semua CSS yang sudah ada tetap sama ... */
    :root{
        --burjo-brown: #6b4226;
        --burjo-accent: #c49b6f;
        --burjo-cream: #fdf8f2;
        --burjo-green: #3a8a52;
        --burjo-red: #c0392b;
    }

    .admin-header-section{ padding-top: 50px; }
    .admin-header{ gap: 16px; }
    .admin-date{
        font-size: 12.5px;
        color: var(--burjo-accent);
        text-transform: uppercase;
        letter-spacing: 0.6px;
        font-weight: 600;
    }
    .admin-header h1{
        font-size: 26px;
        font-weight: 700;
        color: #2c2c2c;
    }
    .admin-header-actions{ display: flex; gap: 10px; flex-wrap: wrap; }

    .btn-dashboard{
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 10px 18px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
        border: none;
        cursor: pointer;
    }
    .btn-dashboard-primary{ background: var(--burjo-brown); color: #fff; }
    .btn-dashboard-primary:hover{ background: #54331d; color: #fff; }
    .btn-dashboard-outline{ background: #fff; color: var(--burjo-brown); border: 1px solid #e2d5c7; }
    .btn-dashboard-outline:hover{ border-color: var(--burjo-brown); color: var(--burjo-brown); }
    .btn-sm-dashboard{ padding: 8px 14px; font-size: 13px; }

    /* Stat cards */
    .stat-card{
        background: #fff;
        border-radius: 12px;
        padding: 22px 18px;
        display: flex;
        align-items: center;
        gap: 14px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        margin-bottom: 24px;
        transition: box-shadow 0.25s, transform 0.25s;
    }
    .stat-card:hover{ transform: translateY(-4px); box-shadow: 0 10px 26px rgba(0,0,0,0.08); }
    .stat-icon{
        width: 52px;
        height: 52px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
        color: #fff;
    }
    .stat-icon-orange{ background: #f39c12; }
    .stat-icon-green{ background: var(--burjo-green); }
    .stat-icon-brown{ background: var(--burjo-brown); }
    .stat-icon-teal{ background: #2393a0; }
    .stat-info strong.number{
        display: block;
        font-size: 26px;
        font-weight: 700;
        color: #2c2c2c;
        line-height: 1.1;
    }
    .stat-info span{ font-size: 13px; color: #888; }

    /* Table card + tabs */
    .menu-table-card{
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        overflow: hidden;
    }
    .menu-table-tabs{ display: flex; border-bottom: 1px solid #eee; }
    .table-tab{
        flex: 0 0 auto;
        padding: 16px 26px;
        border: none;
        background: none;
        font-size: 14.5px;
        font-weight: 600;
        color: #999;
        cursor: pointer;
        border-bottom: 3px solid transparent;
        transition: all 0.2s;
    }
    .table-tab .count{
        display: inline-block;
        background: #f1f1f1;
        color: #888;
        font-size: 11.5px;
        padding: 1px 8px;
        border-radius: 20px;
        margin-left: 6px;
    }
    .table-tab.active{ color: var(--burjo-brown); border-bottom-color: var(--burjo-brown); }
    .table-tab.active .count{ background: rgba(196,155,111,0.2); color: var(--burjo-brown); }

    .tab-panel{ display: none; padding: 20px 22px 6px; }
    .tab-panel.active{ display: block; }

    .table-toolbar{
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        justify-content: space-between;
        margin-bottom: 16px;
    }
    .table-search{
        flex: 1 1 240px;
        max-width: 320px;
        padding: 9px 14px;
        border: 1px solid #e2e2e2;
        border-radius: 8px;
        font-size: 13.5px;
        outline: none;
    }
    .table-search:focus{ border-color: var(--burjo-accent); }

    .table thead th{
        border-top: none;
        border-bottom: 1px solid #eee;
        font-size: 12.5px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        color: #999;
        font-weight: 600;
        padding: 10px 12px;
    }
    .table td{ vertical-align: middle; padding: 12px; font-size: 14px; }
    .table tbody tr:hover{ background: #fbf7f2; }

    .table-thumb{ width: 46px; height: 46px; object-fit: cover; border-radius: 8px; }
    .table-thumb-placeholder{
        display: flex; align-items: center; justify-content: center;
        background: #f5f1ec; color: #c2b6a6;
    }

    .tag-chip{
        display: inline-block;
        font-size: 11.5px;
        color: var(--burjo-brown);
        background: rgba(196,155,111,0.18);
        padding: 3px 11px;
        border-radius: 20px;
    }
    .tag-chip-muted{ color: #555; background: #f0f0f0; }

    .status-pill{
        font-size: 11.5px;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 20px;
        color: #fff;
    }
    .status-available{ background: var(--burjo-green); }
    .status-unavailable{ background: var(--burjo-red); }

    .action-btn{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 7px;
        margin: 0 2px;
        color: #fff;
        font-size: 13px;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }
    .action-edit{ background: #f0ad4e; }
    .action-delete{ background: var(--burjo-red); }
    .action-btn:hover{ opacity: 0.85; color: #fff; }

    .table-empty-search{ padding: 30px 0; text-align: center; color: #999; font-size: 14px; }

    /* Activity & today panel */
    .panel-title{ font-size: 19px; font-weight: 700; color: #2c2c2c; margin-bottom: 16px; }
    .panel-card{ background: #fff; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.04); }
    .activity-row{
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 18px;
        border-bottom: 1px solid #f2f2f2;
    }
    .activity-row:last-child{ border-bottom: none; }
    .activity-icon{
        width: 34px; height: 34px;
        border-radius: 50%;
        background: var(--burjo-cream);
        display: flex; align-items: center; justify-content: center;
        color: var(--burjo-brown);
        flex-shrink: 0;
    }
    .activity-text{ flex: 1; font-size: 14px; color: #444; }
    .activity-time{ color: #aaa; font-size: 12px; white-space: nowrap; }
    .panel-empty{ padding: 30px; text-align: center; color: #999; }

    .mini-stat{ padding: 6px 0 16px; }
    .mini-stat i{ font-size: 26px; color: var(--burjo-accent); display: block; margin-bottom: 6px; }
    .mini-stat strong.number{ display: block; font-size: 22px; font-weight: 700; color: #2c2c2c; }
    .mini-stat span{ font-size: 12.5px; color: #888; }
    .panel-footer-note{
        text-align: center;
        font-size: 12.5px;
        color: #999;
        padding: 12px;
        border-top: 1px solid #f2f2f2;
    }

    /* Alert styling */
    .alert {
        border-radius: 12px;
        padding: 15px 20px;
        margin-bottom: 20px;
    }
    .alert .close {
        outline: none;
    }

    @media (max-width: 576px){
        .tab-panel{ padding: 16px 14px 6px; }
        .table-toolbar{ flex-direction: column; align-items: stretch; }
        .table-search{ max-width: 100%; }
    }
</style>

<script>
(function () {
    // Tab switching
    var tabs = document.querySelectorAll('.table-tab');
    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            tabs.forEach(function (t) { t.classList.remove('active'); });
            document.querySelectorAll('.tab-panel').forEach(function (p) { p.classList.remove('active'); });
            tab.classList.add('active');
            document.getElementById('panel-' + tab.dataset.tab).classList.add('active');
        });
    });

    // Table search
    document.querySelectorAll('.table-search').forEach(function (input) {
        input.addEventListener('input', function () {
            var targetId = input.dataset.target;
            var table = document.getElementById(targetId);
            if (!table) return;
            var rows = table.querySelectorAll('tbody tr[data-name]');
            var q = input.value.trim().toLowerCase();
            var visible = 0;

            rows.forEach(function (row) {
                var match = row.dataset.name.indexOf(q) !== -1;
                row.style.display = match ? '' : 'none';
                if (match) visible++;
            });

            var emptyMsg = document.querySelector('.table-empty-search[data-for="' + targetId + '"]');
            if (emptyMsg) emptyMsg.style.display = (visible === 0 && rows.length > 0) ? 'block' : 'none';
        });
    });

    // Set jenis menu saat tombol diklik
    document.querySelectorAll('[data-toggle="modal"][data-target="#addModal"]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var type = this.dataset.type || 'makanan';
            document.getElementById('jenisMenu').value = type;
            document.getElementById('jenisMenuLabel').textContent = type.charAt(0).toUpperCase() + type.slice(1);
            
            // Tampilkan/sembunyikan field ukuran
            var ukuranField = document.getElementById('ukuranField');
            if (type === 'minuman') {
                ukuranField.style.display = 'block';
            } else {
                ukuranField.style.display = 'none';
            }
        });
    });
})();
</script>

<?= $this->endSection() ?>