<?php
$what_you_get_query = mysqli_query($conn, "SELECT * FROM what_you_get ORDER BY position, id ASC");
$image_query = mysqli_query($conn, "SELECT * FROM what_you_get_image LIMIT 1");
$image = mysqli_fetch_assoc($image_query);
?>

<!-- Tabel what_you_get -->
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold">Tabel What You Get</h5>
                <div class="text-end mb-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addWhatYouGetModal">
                        <i class="ti ti-plus"></i> Tambah Data
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Posisi</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            while ($row = mysqli_fetch_assoc($what_you_get_query)) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['title'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td><?= ucfirst($row['position']) ?></td>
                                <td><?= $row['created_at'] ?></td>
                                <td><?= $row['updated_at'] ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editWYGModal<?= $row['id'] ?>">Edit</button>
                                    <form action="?q=delete_what_you_get" method="POST" class="d-inline">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editWYGModal<?= $row['id'] ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <form method="POST" action="?q=edit_what_you_get">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Data</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <label>Judul</label>
                                                <input type="text" name="title" class="form-control"
                                                    value="<?= $row['title'] ?>" required>
                                                <label>Deskripsi</label>
                                                <textarea name="description" class="form-control"
                                                    required><?= $row['description'] ?></textarea>
                                                <label>Posisi</label>
                                                <select name="position" class="form-control" required>
                                                    <option value="left"
                                                        <?= $row['position'] == 'left' ? 'selected' : '' ?>>Kiri
                                                    </option>
                                                    <option value="right"
                                                        <?= $row['position'] == 'right' ? 'selected' : '' ?>>Kanan
                                                    </option>
                                                </select>
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

<!-- Modal Tambah What You Get -->
<div class="modal fade" id="addWhatYouGetModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="?q=add_what_you_get">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Fitur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label>Judul</label>
                    <input type="text" name="title" class="form-control" required>
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control" required></textarea>
                    <label>Posisi</label>
                    <select name="position" class="form-control" required>
                        <option value="left">Kiri</option>
                        <option value="right">Kanan</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Tabel Gambar What You Get -->
<div class="row mt-5">
    <div class="col-lg-12">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold">Gambar What You Get</h5>

                <?php if (!$image): ?>
                <div class="text-end mb-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addImageWYGModal">
                        <i class="ti ti-plus"></i> Tambah Gambar
                    </button>
                </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($image): ?>
                            <tr>
                                <td>1</td>
                                <td><img src="<?= $image['image_path'] ?>" width="150" class="rounded"></td>
                                <td><?= $image['created_at'] ?></td>
                                <td><?= $image['updated_at'] ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editImageWYGModal">
                                        <i class="ti ti-edit"></i> Edit
                                    </button>
                                    <form method="POST" action="?q=delete_what_you_get_image" class="d-inline">
                                        <input type="hidden" name="id" value="<?= $image['id'] ?>">
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus gambar ini?')">
                                            <i class="ti ti-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php else: ?>
                            <tr>
                                <td colspan="5">Belum ada gambar. Silakan tambahkan terlebih dahulu.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Gambar -->
<div class="modal fade" id="addImageWYGModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="?q=add_what_you_get_image" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="file" name="image_path" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Gambar -->
<div class="modal fade" id="editImageWYGModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="?q=edit_what_you_get_image" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $image['id'] ?? '' ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Gambar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="file" name="image_path" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>