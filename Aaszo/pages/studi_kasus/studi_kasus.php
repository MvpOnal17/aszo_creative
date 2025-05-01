<?php
$studi_kasus_query = mysqli_query($conn, "SELECT * FROM studi_kasus ORDER BY id DESC");
?>

<!-- Tabel Studi Kasus -->
<div class="row">
    <div class="col-lg-12">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold">Tabel Studi Kasus</h5>
                <div class="text-end mb-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudiKasusModal">
                        <i class="ti ti-plus"></i> Tambah Studi Kasus
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Thumbnail</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            while ($row = mysqli_fetch_assoc($studi_kasus_query)) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><img src="<?= $row['thumbnail_path'] ?>" width="100" class="rounded-3"></td>
                                <td><?= $row['title'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td><?= $row['date_display'] ?></td>
                                <td><?= $row['created_at'] ?></td>
                                <td><?= $row['updated_at'] ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editStudiKasusModal<?= $row['id'] ?>">Edit</button>
                                    <form action="?q=delete_studi_kasus" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus studi kasus ini?')">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit Studi Kasus -->
                            <div class="modal fade" id="editStudiKasusModal<?= $row['id'] ?>" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <form action="?q=edit_studi_kasus" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Studi Kasus</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body row g-3">
                                                <?php
                                                    $fields = [
                                                        'title' => 'Judul',
                                                        'description' => 'Deskripsi',
                                                        'date_display' => 'Tanggal',
                                                        'modal_title' => 'Judul Modal',
                                                        'modal_description_1' => 'Deskripsi Modal 1',
                                                        'modal_description_2' => 'Deskripsi Modal 2',
                                                        'modal_description_3' => 'Deskripsi Modal 3',
                                                        'modal_icon_1' => 'Icon Modal 1',
                                                        'modal_icon_2' => 'Icon Modal 2',
                                                        'modal_icon_3' => 'Icon Modal 3',
                                                        'modal_cta_text' => 'Teks Tombol CTA',
                                                        'modal_cta_link' => 'Link Tombol CTA'
                                                    ];
                                                    foreach ($fields as $key => $label) {
                                                        $value = htmlspecialchars($row[$key]);
                                                        $input = in_array($key, ['description', 'modal_description_1', 'modal_description_2', 'modal_description_3']) ?
                                                            "<textarea name='$key' class='form-control' required>$value</textarea>" :
                                                            "<input type='text' name='$key' class='form-control' value='$value' required>";
                                                        echo "<div class='col-md-6'><label>$label</label>$input</div>";
                                                    }
                                                    ?>
                                                <div class="col-md-6">
                                                    <label>Thumbnail</label>
                                                    <input type="file" name="thumbnail_path" class="form-control">
                                                    <img src="<?= $row['thumbnail_path'] ?>" class="mt-2 rounded"
                                                        width="100">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Gambar Modal</label>
                                                    <input type="file" name="modal_image_path" class="form-control">
                                                    <img src="<?= $row['modal_image_path'] ?>" class="mt-2 rounded"
                                                        width="100">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-success">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Studi Kasus -->
<div class="modal fade" id="addStudiKasusModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form action="?q=add_studi_kasus" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Studi Kasus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">
                    <?php
                    $fields = [
                        'title' => 'Judul',
                        'description' => 'Deskripsi',
                        'date_display' => 'Tanggal',
                        'modal_title' => 'Judul Modal',
                        'modal_description_1' => 'Deskripsi Modal 1',
                        'modal_description_2' => 'Deskripsi Modal 2',
                        'modal_description_3' => 'Deskripsi Modal 3',
                        'modal_icon_1' => 'Icon Modal 1',
                        'modal_icon_2' => 'Icon Modal 2',
                        'modal_icon_3' => 'Icon Modal 3',
                        'modal_cta_text' => 'Teks Tombol CTA',
                        'modal_cta_link' => 'Link Tombol CTA'
                    ];
                    foreach ($fields as $key => $label) {
                        $input = in_array($key, ['description', 'modal_description_1', 'modal_description_2', 'modal_description_3']) ?
                            "<textarea name='$key' class='form-control' required></textarea>" :
                            "<input type='text' name='$key' class='form-control' required>";
                        echo "<div class='col-md-6'><label>$label</label>$input</div>";
                    }
                    ?>
                    <div class="col-md-6">
                        <label>Thumbnail</label>
                        <input type="file" name="thumbnail_path" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Gambar Modal</label>
                        <input type="file" name="modal_image_path" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>