<!-- app/Views/dashboard/modal_edit.php -->

<!-- ========================================== -->
<!-- MODAL EDIT MAKANAN -->
<!-- ========================================== -->
<?php if(!empty($foods)): ?>
    <?php foreach($foods as $food): ?>
    <!-- Edit Modal Food Begin -->
    <div class="modal fade modal-burjo" id="editModalFood-<?= $food['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalFoodLabel-<?= $food['id'] ?>" aria-hidden="true" style="z-index: 9999;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalFoodLabel-<?= $food['id'] ?>">
                        <span class="modal-header-icon"><i class="icon-edit"></i></span>
                        Edit Makanan: <?= esc($food['nama_makanan']) ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?= form_open_multipart(base_url('admin/foods/edit/' . $food['id'])); ?>
                <?= csrf_field(); ?>

                <div class="modal-body">
                    <!-- Nama -->
                    <div class="form-group">
                        <?= form_label('Nama Makanan', 'nama_food_' . $food['id']); ?>
                        <?= form_input([
                            'name'        => 'nama',
                            'id'          => 'nama_food_' . $food['id'],
                            'class'       => 'form-control',
                            'value'       => $food['nama_makanan'],
                            'placeholder' => 'Nama Makanan',
                            'required'    => true
                        ]); ?>
                    </div>

                    <!-- Kategori -->
                    <div class="form-group">
                        <?= form_label('Kategori', 'kategori_food_' . $food['id']); ?>
                        <?= form_dropdown(
                            'kategori',
                            [
                                'Makanan Utama' => 'Makanan Utama',
                                'Snack'         => 'Snack',
                                'Dessert'       => 'Dessert'
                            ],
                            $food['kategori'],
                            [
                                'id'       => 'kategori_food_' . $food['id'],
                                'class'    => 'form-control',
                                'required' => true
                            ]
                        ); ?>
                    </div>

                    <!-- Harga -->
                    <div class="form-group">
                        <?= form_label('Harga', 'harga_food_' . $food['id']); ?>
                        <?= form_input([
                            'type'        => 'number',
                            'name'        => 'harga',
                            'id'          => 'harga_food_' . $food['id'],
                            'class'       => 'form-control',
                            'value'       => $food['harga'],
                            'placeholder' => 'Harga',
                            'required'    => true,
                            'min'         => 0
                        ]); ?>
                    </div>

                    <!-- Deskripsi -->
                    <div class="form-group">
                        <?= form_label('Deskripsi', 'deskripsi_food_' . $food['id']); ?>
                        <?= form_textarea([
                            'name'        => 'deskripsi',
                            'id'          => 'deskripsi_food_' . $food['id'],
                            'class'       => 'form-control',
                            'rows'        => 2,
                            'value'       => $food['deskripsi'] ?? '',
                            'placeholder' => 'Deskripsi (opsional)'
                        ]); ?>
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <?= form_label('Status', 'status_food_' . $food['id']); ?>
                        <?= form_dropdown(
                            'status',
                            [
                                'tersedia' => 'Tersedia',
                                'habis'    => 'Habis'
                            ],
                            $food['status'] ?? 'tersedia',
                            [
                                'id'    => 'status_food_' . $food['id'],
                                'class' => 'form-control'
                            ]
                        ); ?>
                    </div>

                    <!-- Foto Saat Ini -->
                    <?php if(!empty($food['foto'])): ?>
                    <div class="form-group">
                        <label>Foto Saat Ini</label>
                        <div>
                            <img src="<?= base_url('img/' . $food['foto']) ?>" 
                                 alt="<?= esc($food['nama_makanan']) ?>" 
                                 style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; border: 1px solid #e2d4c4;">
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Checkbox Ganti Foto -->
                    <div class="form-group">
                        <div class="form-check">
                            <?= form_checkbox([
                                'name'    => 'check',
                                'id'      => 'check_food_' . $food['id'],
                                'value'   => '1',
                                'class'   => 'form-check-input'
                            ]); ?>
                            <?= form_label(
                                'Ceklis jika ingin mengganti foto',
                                'check_food_' . $food['id'],
                                ['class' => 'form-check-label']
                            ); ?>
                        </div>
                    </div>

                    <!-- Upload Foto Baru -->
                    <div class="form-group" id="fotoField_food_<?= $food['id'] ?>" style="display: none;">
                        <?= form_label('Foto Baru', 'foto_food_' . $food['id']); ?>
                        <?= form_upload([
                            'name'  => 'foto',
                            'id'    => 'foto_food_' . $food['id'],
                            'class' => 'form-control',
                            'accept'=> 'image/*'
                        ]); ?>
                        <span class="field-hint">Format JPG, PNG, GIF (Max 2MB)</span>
                        <div class="file-preview" id="fotoPreview_food_<?= $food['id'] ?>" style="display: none;"></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-burjo-secondary" data-dismiss="modal">Batal</button>
                    <?= form_submit('submit', 'Simpan Perubahan', ['class' => 'btn-burjo-primary']); ?>
                </div>

                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- Edit Modal Food End -->

    <script>
    (function() {
        var checkId = 'check_food_<?= $food['id'] ?>';
        var fotoFieldId = 'fotoField_food_<?= $food['id'] ?>';
        var previewId = 'fotoPreview_food_<?= $food['id'] ?>';
        
        var check = document.getElementById(checkId);
        var fotoField = document.getElementById(fotoFieldId);
        var preview = document.getElementById(previewId);
        var fotoInput = document.getElementById('foto_food_<?= $food['id'] ?>');

        if (check && fotoField) {
            check.addEventListener('change', function() {
                fotoField.style.display = this.checked ? 'block' : 'none';
                if (!this.checked && preview) {
                    preview.style.display = 'none';
                    preview.innerHTML = '';
                }
            });
        }

        if (fotoInput && preview) {
            fotoInput.addEventListener('change', function(e) {
                var file = e.target.files[0];
                if (!file) {
                    preview.style.display = 'none';
                    preview.innerHTML = '';
                    return;
                }
                var reader = new FileReader();
                reader.onload = function(ev) {
                    preview.innerHTML = '<img src="' + ev.target.result + '" alt="Preview foto" style="width:68px;height:68px;object-fit:cover;border-radius:8px;border:1px solid #e2d4c4;">';
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            });
        }
    })();
    </script>
    <?php endforeach; ?>
<?php endif; ?>


<!-- ========================================== -->
<!-- MODAL EDIT MINUMAN -->
<!-- ========================================== -->
<?php if(!empty($drinks)): ?>
    <?php foreach($drinks as $drink): ?>
    <!-- Edit Modal Drink Begin -->
    <div class="modal fade modal-burjo" id="editModalDrink-<?= $drink['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalDrinkLabel-<?= $drink['id'] ?>" aria-hidden="true" style="z-index: 9999;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalDrinkLabel-<?= $drink['id'] ?>">
                        <span class="modal-header-icon"><i class="icon-edit"></i></span>
                        Edit Minuman: <?= esc($drink['nama_minuman']) ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <?= form_open_multipart(base_url('admin/drinks/edit/' . $drink['id'])); ?>
                <?= csrf_field(); ?>

                <div class="modal-body">
                    <!-- Nama -->
                    <div class="form-group">
                        <?= form_label('Nama Minuman', 'nama_drink_' . $drink['id']); ?>
                        <?= form_input([
                            'name'        => 'nama',
                            'id'          => 'nama_drink_' . $drink['id'],
                            'class'       => 'form-control',
                            'value'       => $drink['nama_minuman'],
                            'placeholder' => 'Nama Minuman',
                            'required'    => true
                        ]); ?>
                    </div>

                    <!-- Kategori -->
                    <div class="form-group">
                        <?= form_label('Kategori', 'kategori_drink_' . $drink['id']); ?>
                        <?= form_dropdown(
                            'kategori',
                            [
                                'Minuman' => 'Minuman',
                                'Jus'     => 'Jus',
                                'Teh'     => 'Teh',
                                'Kopi'    => 'Kopi'
                            ],
                            $drink['kategori'],
                            [
                                'id'       => 'kategori_drink_' . $drink['id'],
                                'class'    => 'form-control',
                                'required' => true
                            ]
                        ); ?>
                    </div>

                    <!-- Harga -->
                    <div class="form-group">
                        <?= form_label('Harga', 'harga_drink_' . $drink['id']); ?>
                        <?= form_input([
                            'type'        => 'number',
                            'name'        => 'harga',
                            'id'          => 'harga_drink_' . $drink['id'],
                            'class'       => 'form-control',
                            'value'       => $drink['harga'],
                            'placeholder' => 'Harga',
                            'required'    => true,
                            'min'         => 0
                        ]); ?>
                    </div>

                    <!-- Deskripsi -->
                    <div class="form-group">
                        <?= form_label('Deskripsi', 'deskripsi_drink_' . $drink['id']); ?>
                        <?= form_textarea([
                            'name'        => 'deskripsi',
                            'id'          => 'deskripsi_drink_' . $drink['id'],
                            'class'       => 'form-control',
                            'rows'        => 2,
                            'value'       => $drink['deskripsi'] ?? '',
                            'placeholder' => 'Deskripsi (opsional)'
                        ]); ?>
                    </div>

                    <!-- Ukuran -->
                    <div class="form-group">
                        <?= form_label('Ukuran', 'ukuran_drink_' . $drink['id']); ?>
                        <?= form_input([
                            'name'        => 'ukuran',
                            'id'          => 'ukuran_drink_' . $drink['id'],
                            'class'       => 'form-control',
                            'value'       => $drink['ukuran'] ?? '',
                            'placeholder' => 'Gelas, Botol, Large'
                        ]); ?>
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <?= form_label('Status', 'status_drink_' . $drink['id']); ?>
                        <?= form_dropdown(
                            'status',
                            [
                                'tersedia' => 'Tersedia',
                                'habis'    => 'Habis'
                            ],
                            $drink['status'] ?? 'tersedia',
                            [
                                'id'    => 'status_drink_' . $drink['id'],
                                'class' => 'form-control'
                            ]
                        ); ?>
                    </div>

                    <!-- Foto Saat Ini -->
                    <?php if(!empty($drink['foto'])): ?>
                    <div class="form-group">
                        <label>Foto Saat Ini</label>
                        <div>
                            <img src="<?= base_url('img/' . $drink['foto']) ?>" 
                                 alt="<?= esc($drink['nama_minuman']) ?>" 
                                 style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; border: 1px solid #e2d4c4;">
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Checkbox Ganti Foto -->
                    <div class="form-group">
                        <div class="form-check">
                            <?= form_checkbox([
                                'name'    => 'check',
                                'id'      => 'check_drink_' . $drink['id'],
                                'value'   => '1',
                                'class'   => 'form-check-input'
                            ]); ?>
                            <?= form_label(
                                'Ceklis jika ingin mengganti foto',
                                'check_drink_' . $drink['id'],
                                ['class' => 'form-check-label']
                            ); ?>
                        </div>
                    </div>

                    <!-- Upload Foto Baru -->
                    <div class="form-group" id="fotoField_drink_<?= $drink['id'] ?>" style="display: none;">
                        <?= form_label('Foto Baru', 'foto_drink_' . $drink['id']); ?>
                        <?= form_upload([
                            'name'  => 'foto',
                            'id'    => 'foto_drink_' . $drink['id'],
                            'class' => 'form-control',
                            'accept'=> 'image/*'
                        ]); ?>
                        <span class="field-hint">Format JPG, PNG, GIF (Max 2MB)</span>
                        <div class="file-preview" id="fotoPreview_drink_<?= $drink['id'] ?>" style="display: none;"></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-burjo-secondary" data-dismiss="modal">Batal</button>
                    <?= form_submit('submit', 'Simpan Perubahan', ['class' => 'btn-burjo-primary']); ?>
                </div>

                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!-- Edit Modal Drink End -->

    <script>
    (function() {
        var checkId = 'check_drink_<?= $drink['id'] ?>';
        var fotoFieldId = 'fotoField_drink_<?= $drink['id'] ?>';
        var previewId = 'fotoPreview_drink_<?= $drink['id'] ?>';
        
        var check = document.getElementById(checkId);
        var fotoField = document.getElementById(fotoFieldId);
        var preview = document.getElementById(previewId);
        var fotoInput = document.getElementById('foto_drink_<?= $drink['id'] ?>');

        if (check && fotoField) {
            check.addEventListener('change', function() {
                fotoField.style.display = this.checked ? 'block' : 'none';
                if (!this.checked && preview) {
                    preview.style.display = 'none';
                    preview.innerHTML = '';
                }
            });
        }

        if (fotoInput && preview) {
            fotoInput.addEventListener('change', function(e) {
                var file = e.target.files[0];
                if (!file) {
                    preview.style.display = 'none';
                    preview.innerHTML = '';
                    return;
                }
                var reader = new FileReader();
                reader.onload = function(ev) {
                    preview.innerHTML = '<img src="' + ev.target.result + '" alt="Preview foto" style="width:68px;height:68px;object-fit:cover;border-radius:8px;border:1px solid #e2d4c4;">';
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            });
        }
    })();
    </script>
    <?php endforeach; ?>
<?php endif; ?>