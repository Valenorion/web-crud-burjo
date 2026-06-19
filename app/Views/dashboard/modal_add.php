<!-- app/Views/dashboard/modal_add.php -->
<!-- Add Modal Begin -->
<div class="modal fade modal-burjo" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">
                    <span class="modal-header-icon"><i class="icon-plus"></i></span>
                    Tambah <span id="jenisMenuLabel">Makanan</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= form_open_multipart(base_url('admin/menu/store')); ?>
            <?= csrf_field(); ?>

            <div class="modal-body">
                <!-- Hidden field untuk jenis menu -->
                <input type="hidden" id="jenisMenu" name="jenis" value="makanan">

                <!-- Nama -->
                <div class="form-group">
                    <?= form_label('Nama Menu', 'nama'); ?>
                    <?= form_input([
                        'name'        => 'nama',
                        'id'          => 'nama',
                        'class'       => 'form-control',
                        'placeholder' => 'Contoh: Nasi Goreng Spesial',
                        'required'    => true,
                    ]); ?>
                </div>

                <!-- Kategori & Status -->
                <div class="form-row">
                    <div class="form-group">
                        <?= form_label('Kategori', 'kategori'); ?>
                        <?= form_dropdown(
                            'kategori',
                            [
                                ''              => 'Pilih Kategori',
                                'Makanan Utama' => 'Makanan Utama',
                                'Snack'         => 'Snack',
                                'Minuman'       => 'Minuman',
                                'Dessert'       => 'Dessert'
                            ],
                            '',
                            [
                                'id'       => 'kategori',
                                'class'    => 'form-control',
                                'required' => true,
                            ]
                        ); ?>
                    </div>
                    <div class="form-group">
                        <?= form_label('Status', 'status'); ?>
                        <?= form_dropdown(
                            'status',
                            [
                                'tersedia' => 'Tersedia',
                                'habis'    => 'Habis'
                            ],
                            'tersedia',
                            [
                                'id'    => 'status',
                                'class' => 'form-control',
                            ]
                        ); ?>
                    </div>
                </div>

                <!-- Harga & Ukuran -->
                <div class="form-row">
                    <div class="form-group">
                        <?= form_label('Harga', 'harga'); ?>
                        <?= form_input([
                            'type'        => 'number',
                            'name'        => 'harga',
                            'id'          => 'harga',
                            'class'       => 'form-control',
                            'placeholder' => 'cth: 15000',
                            'required'    => true,
                            'min'         => 0,
                        ]); ?>
                    </div>
                    <div class="form-group" id="ukuranField" style="display: none;">
                        <?= form_label('Ukuran', 'ukuran'); ?>
                        <?= form_input([
                            'name'        => 'ukuran',
                            'id'          => 'ukuran',
                            'class'       => 'form-control',
                            'placeholder' => 'Gelas, Botol, Large',
                        ]); ?>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="form-group">
                    <?= form_label('Deskripsi', 'deskripsi'); ?>
                    <?= form_textarea([
                        'name'        => 'deskripsi',
                        'id'          => 'deskripsi',
                        'class'       => 'form-control',
                        'rows'        => 2,
                        'placeholder' => 'Deskripsi singkat menu (opsional)',
                    ]); ?>
                </div>

                <!-- Foto -->
                <div class="form-group">
                    <?= form_label('Foto', 'foto'); ?>
                    <?= form_upload([
                        'name'  => 'foto',
                        'id'    => 'foto',
                        'class' => 'form-control',
                        'accept'=> 'image/*',
                    ]); ?>
                    <span class="field-hint">Format JPG, PNG, atau GIF, maksimal 2MB.</span>
                    <div class="file-preview" id="fotoPreview" style="display: none;"></div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-burjo-secondary" data-dismiss="modal">Batal</button>
                <?= form_submit('submit', 'Simpan Menu', [
                    'class' => 'btn-burjo-primary',
                ]); ?>
            </div>

            <?= form_close(); ?>
        </div>
    </div>
</div>
<!-- Add Modal End -->

<style>
    /* ========================================== */
    /* STYLE MODAL BURJO */
    /* ========================================== */
    .modal-burjo .modal-content {
        border: none;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.25);
    }

    .modal-burjo .modal-header {
        background: var(--burjo-brown, #6b4226);
        border: none;
        padding: 18px 22px;
        align-items: center;
    }

    .modal-burjo .modal-header-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 9px;
        background: rgba(255, 255, 255, 0.15);
        color: #fff;
        margin-right: 10px;
        font-size: 14px;
        vertical-align: middle;
    }

    .modal-burjo .modal-title {
        display: flex;
        align-items: center;
        color: #fff;
        font-weight: 600;
        font-size: 16.5px;
        margin: 0;
    }

    .modal-burjo .close {
        color: #fff;
        opacity: 0.85;
        text-shadow: none;
        font-size: 22px;
        transition: opacity 0.2s;
    }
    .modal-burjo .close:hover { opacity: 1; }

    .modal-burjo .modal-body {
        background: #fdf8f2;
        padding: 26px 24px;
    }

    .modal-burjo .form-row {
        display: flex;
        gap: 14px;
    }
    .modal-burjo .form-row .form-group {
        flex: 1;
        min-width: 0;
    }

    .modal-burjo .form-group { margin-bottom: 17px; }

    .modal-burjo label {
        font-weight: 600;
        font-size: 13px;
        color: #444;
        margin-bottom: 6px;
        display: block;
    }

    /* ========================================== */
    /* FIX: Warna Teks Input di Modal (Dark Theme) */
    /* ========================================== */
    .modal-burjo .form-control {
        color: #222 !important;
        background-color: #ffffff !important;
        border: 1.5px solid #e2d4c4 !important;
        width: 100%;
        border-radius: 8px;
        padding: 10px 13px;
        font-size: 14px;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .modal-burjo .form-control:focus {
        color: #222 !important;
        background-color: #ffffff !important;
        border-color: var(--burjo-accent, #c49b6f) !important;
        box-shadow: 0 0 0 3px rgba(196, 155, 111, 0.15) !important;
        outline: none;
    }

    .modal-burjo .form-control::placeholder {
        color: #999 !important;
        opacity: 1 !important;
    }

    /* Fix untuk input number */
    .modal-burjo input[type="number"].form-control {
        color: #222 !important;
        background-color: #ffffff !important;
    }

    /* Fix untuk select dropdown */
    .modal-burjo select.form-control {
        color: #222 !important;
        background-color: #ffffff !important;
    }

    .modal-burjo select.form-control option {
        color: #222 !important;
        background-color: #ffffff !important;
    }

    /* Fix untuk textarea */
    .modal-burjo textarea.form-control {
        color: #222 !important;
        background-color: #ffffff !important;
        resize: vertical;
    }

    /* Fix untuk input file */
    .modal-burjo input[type="file"].form-control {
        color: #222 !important;
        background-color: #ffffff !important;
        padding: 8px 13px;
        cursor: pointer;
    }

    /* Fix untuk autofill Chrome */
    .modal-burjo .form-control:-webkit-autofill,
    .modal-burjo .form-control:-webkit-autofill:hover,
    .modal-burjo .form-control:-webkit-autofill:focus,
    .modal-burjo input:-webkit-autofill,
    .modal-burjo input:-webkit-autofill:hover,
    .modal-burjo input:-webkit-autofill:focus,
    .modal-burjo select:-webkit-autofill,
    .modal-burjo select:-webkit-autofill:hover,
    .modal-burjo select:-webkit-autofill:focus {
        -webkit-box-shadow: 0 0 0 1000px #ffffff inset !important;
        -webkit-text-fill-color: #222 !important;
        background-color: #ffffff !important;
        color: #222 !important;
    }

    .modal-burjo .field-hint {
        display: block;
        margin-top: 5px;
        font-size: 11.5px;
        color: #999;
    }

    .modal-burjo .file-preview { margin-top: 10px; }
    .modal-burjo .file-preview img {
        width: 68px;
        height: 68px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #e2d4c4;
    }

    .modal-burjo .modal-footer {
        background: #f5f0eb;
        border-top: 1px solid #e8ddd0;
        padding: 14px 22px;
    }

    .modal-burjo .btn-burjo-secondary {
        border-radius: 8px;
        padding: 9px 20px;
        border: 1.5px solid #d8cab8;
        background: #fff;
        color: #6b4226;
        font-weight: 500;
        font-size: 13.5px;
        cursor: pointer;
        transition: background 0.2s;
    }
    .modal-burjo .btn-burjo-secondary:hover { background: #f5f0ea; }

    .modal-burjo .btn-burjo-primary {
        border-radius: 8px;
        padding: 9px 24px;
        border: none;
        background: var(--burjo-brown, #6b4226);
        color: #fff;
        font-weight: 600;
        font-size: 13.5px;
        cursor: pointer;
        transition: background 0.2s;
    }
    .modal-burjo .btn-burjo-primary:hover { background: #54331d; }

    @media (max-width: 480px) {
        .modal-burjo .form-row { flex-direction: column; gap: 0; }
    }
</style>

<script>
(function () {
    var fotoInput = document.getElementById('foto');
    var preview   = document.getElementById('fotoPreview');

    if (fotoInput && preview) {
        fotoInput.addEventListener('change', function (e) {
            var file = e.target.files[0];
            if (!file) {
                preview.style.display = 'none';
                preview.innerHTML = '';
                return;
            }
            var reader = new FileReader();
            reader.onload = function (ev) {
                preview.innerHTML = '<img src="' + ev.target.result + '" alt="Preview foto">';
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        });
    }
})();
</script>