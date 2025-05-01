<?php
$our_team_query = mysqli_query($conn, "SELECT * FROM our_team ORDER BY id ASC");
?>

<!-- Tabel Our Team -->
<div class="row">
    <div class="col-lg-12">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold">Tabel Our Team</h5>
                <div class="text-end mb-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeamModal">
                        <i class="ti ti-plus"></i> Tambah Tim
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Deskripsi</th>
                                <th>FB</th>
                                <th>TW</th>
                                <th>IG</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            while ($row = mysqli_fetch_assoc($our_team_query)) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><img src="<?= $row['image_path'] ?>" width="80" class="rounded"></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['role'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td><?= $row['facebook_link'] ?></td>
                                <td><?= $row['twitter_link'] ?></td>
                                <td><?= $row['instagram_link'] ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editTeamModal<?= $row['id'] ?>">Edit</button>
                                    <form action="?q=delete_our_team" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editTeamModal<?= $row['id'] ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <form action="?q=edit_our_team" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Anggota Tim</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="name">Nama</label>
                                                <input type="text" name="name" class="form-control mb-2"
                                                    value="<?= $row['name'] ?>" required>

                                                <label for="role">Peran (Role)</label>
                                                <input type="text" name="role" class="form-control mb-2"
                                                    value="<?= $row['role'] ?>" required>

                                                <label for="description">Deskripsi</label>
                                                <textarea name="description" class="form-control mb-2"
                                                    required><?= $row['description'] ?></textarea>

                                                <label for="facebook_link">Link Facebook</label>
                                                <input type="text" name="facebook_link" class="form-control mb-2"
                                                    value="<?= $row['facebook_link'] ?>">

                                                <label for="twitter_link">Link Twitter</label>
                                                <input type="text" name="twitter_link" class="form-control mb-2"
                                                    value="<?= $row['twitter_link'] ?>">

                                                <label for="instagram_link">Link Instagram</label>
                                                <input type="text" name="instagram_link" class="form-control mb-2"
                                                    value="<?= $row['instagram_link'] ?>">

                                                <label for="image_path">Gambar (Foto Profil)</label>
                                                <input type="file" name="image_path" class="form-control mb-2">
                                                <img src="<?= $row['image_path'] ?>" width="100" class="rounded mt-2">
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

<!-- Modal Tambah -->
<div class="modal fade" id="addTeamModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="?q=add_our_team" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Anggota Tim</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="name" class="form-control mb-2" placeholder="Nama" required>
                    <input type="text" name="role" class="form-control mb-2" placeholder="Role" required>
                    <textarea name="description" class="form-control mb-2" placeholder="Deskripsi" required></textarea>
                    <input type="text" name="facebook_link" class="form-control mb-2" placeholder="Link Facebook">
                    <input type="text" name="twitter_link" class="form-control mb-2" placeholder="Link Twitter">
                    <input type="text" name="instagram_link" class="form-control mb-2" placeholder="Link Instagram">
                    <input type="file" name="image_path" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>