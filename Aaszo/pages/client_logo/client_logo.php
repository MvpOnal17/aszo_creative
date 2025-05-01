<?php
$client_logo_query = mysqli_query($conn, "SELECT * FROM client_logos ORDER BY id ASC");
?>

<!-- Client Logo Table -->
<div class="row">
    <div class="col-lg-12">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold">Tabel Client Logo</h5>
                <div class="text-end mb-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClientLogoModal">
                        <i class="ti ti-plus"></i> Tambah Logo
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Logo</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            while ($row = mysqli_fetch_assoc($client_logo_query)) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><img src="<?= $row['image_path'] ?>" width="120" class="rounded"></td>
                                <td><?= $row['created_at'] ?></td>
                                <td><?= $row['updated_at'] ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editLogoModal<?= $row['id'] ?>">
                                        Edit
                                    </button>
                                    <form action="?q=delete_client_logo" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus logo ini?')">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editLogoModal<?= $row['id'] ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <form action="?q=edit_client_logo" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Logo</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="file" name="image_path" class="form-control" required>
                                                <img src="<?= $row['image_path'] ?>" class="mt-2 rounded" width="100">
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

<!-- Modal Tambah Logo -->
<div class="modal fade" id="addClientLogoModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="?q=add_client_logo" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Logo Baru</h5>
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