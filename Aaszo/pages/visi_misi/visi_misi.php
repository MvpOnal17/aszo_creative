<?php
$visi_query = mysqli_query($conn, "SELECT * FROM visi_misi LIMIT 1");
$visi = mysqli_fetch_assoc($visi_query);
?>

<!-- Tabel Visi Misi -->
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold">Tabel Visi Misi (Call To Action)</h5>
                <div class="text-end mb-3">
                    <?php if (!$visi): ?>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVisiModal">
                        <i class="ti ti-plus"></i> Tambah Data
                    </button>
                    <?php endif; ?>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Teks Tombol</th>
                                <th>Link Tombol</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($visi): ?>
                            <tr>
                                <td>1</td>
                                <td><?= $visi['heading'] ?></td>
                                <td><?= $visi['description'] ?></td>
                                <td><?= $visi['button_text'] ?></td>
                                <td><?= $visi['button_link'] ?></td>
                                <td><?= $visi['created_at'] ?></td>
                                <td><?= $visi['updated_at'] ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editVisiModal">
                                        Edit
                                    </button>
                                    <form method="POST" action="?q=delete_visi_misi" class="d-inline">
                                        <input type="hidden" name="id" value="<?= $visi['id'] ?>">
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <?php else: ?>
                            <tr>
                                <td colspan="8">Belum ada data, silakan tambahkan.</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="addVisiModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="?q=add_visi_misi">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Visi Misi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label>Judul</label>
                    <input type="text" name="heading" class="form-control mb-2" required>
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control mb-2" required></textarea>
                    <label>Teks Tombol</label>
                    <input type="text" name="button_text" class="form-control mb-2" required>
                    <label>Link Tombol</label>
                    <input type="text" name="button_link" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<?php if ($visi): ?>
<div class="modal fade" id="editVisiModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="?q=edit_visi_misi">
            <input type="hidden" name="id" value="<?= $visi['id'] ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Visi Misi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label>Judul</label>
                    <input type="text" name="heading" class="form-control mb-2" value="<?= $visi['heading'] ?>"
                        required>
                    <label>Deskripsi</label>
                    <textarea name="description" class="form-control mb-2"
                        required><?= $visi['description'] ?></textarea>
                    <label>Teks Tombol</label>
                    <input type="text" name="button_text" class="form-control mb-2" value="<?= $visi['button_text'] ?>"
                        required>
                    <label>Link Tombol</label>
                    <input type="text" name="button_link" class="form-control" value="<?= $visi['button_link'] ?>"
                        required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php endif; ?>