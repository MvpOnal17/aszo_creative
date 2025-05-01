<?php
$about_section_query = mysqli_query($conn, "SELECT * FROM about_section");
$about_features_query = mysqli_query($conn, "SELECT * FROM about_features ORDER BY column_position, id ASC");
?>

<!-- About Section Table -->
<div class="row mt-5">
    <div class="col-lg-12">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold">Tabel about_section</h5>
                <div class="text-end mb-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAboutModal">
                        <i class="ti ti-plus"></i> Tambah About
                    </button>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Meta</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Pengalaman</th>
                                <th>CEO</th>
                                <th>Kontak</th>
                                <th>Gambar Utama</th>
                                <th>Gambar Kedua</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            while ($row = mysqli_fetch_assoc($about_section_query)) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['about_meta'] ?></td>
                                <td><?= $row['about_title'] ?></td>
                                <td><?= $row['about_description'] ?></td>
                                <td><?= $row['experience_years'] ?> - <?= $row['experience_text'] ?></td>
                                <td><?= $row['profile_name'] ?> (<?= $row['profile_position'] ?>)</td>
                                <td><?= $row['contact_label'] ?>: <?= $row['contact_number'] ?></td>
                                <td><img src="<?= $row['image_main_path'] ?>" width="80"></td>
                                <td><img src="<?= $row['image_secondary_path'] ?>" width="80"></td>
                                <td><?= $row['created_at'] ?></td>
                                <td><?= $row['updated_at'] ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editAboutModal<?= $row['id'] ?>">Edit</button>
                                    <form method="POST" action="?q=delete_about_section" class="d-inline">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Modal Edit About -->
                            <div class="modal fade" id="editAboutModal<?= $row['id'] ?>" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <form method="POST" action="?q=edit_about_section" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit About</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label>Meta Title</label>
                                                        <input type="text" name="about_meta" class="form-control"
                                                            value="<?= $row['about_meta'] ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Judul</label>
                                                        <input type="text" name="about_title" class="form-control"
                                                            value="<?= $row['about_title'] ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Deskripsi</label>
                                                        <input type="text" name="about_description" class="form-control"
                                                            value="<?= $row['about_description'] ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Tahun Pengalaman</label>
                                                        <input type="text" name="experience_years" class="form-control"
                                                            value="<?= $row['experience_years'] ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Teks Pengalaman</label>
                                                        <input type="text" name="experience_text" class="form-control"
                                                            value="<?= $row['experience_text'] ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Nama Profil</label>
                                                        <input type="text" name="profile_name" class="form-control"
                                                            value="<?= $row['profile_name'] ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Jabatan</label>
                                                        <input type="text" name="profile_position" class="form-control"
                                                            value="<?= $row['profile_position'] ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Label Kontak</label>
                                                        <input type="text" name="contact_label" class="form-control"
                                                            value="<?= $row['contact_label'] ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>No Kontak</label>
                                                        <input type="text" name="contact_number" class="form-control"
                                                            value="<?= $row['contact_number'] ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Gambar Utama</label>
                                                        <input type="file" name="image_main_path" class="form-control">
                                                        <img src="<?= $row['image_main_path'] ?>" width="100"
                                                            class="mt-2">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Gambar Kedua</label>
                                                        <input type="file" name="image_secondary_path"
                                                            class="form-control">
                                                        <img src="<?= $row['image_secondary_path'] ?>" width="100"
                                                            class="mt-2">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Upload Foto CEO (opsional)</label>
                                                        <input type="file" name="profile_image" class="form-control"
                                                            accept="image/*">
                                                        <img src="<?= $row['profile_image'] ?>" class="mt-2"
                                                            width="100">
                                                    </div>

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

<!-- About Features Table -->
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold">Tabel about_features</h5>
                <div class="text-end mb-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFeatureModal">
                        <i class="ti ti-plus"></i> Tambah Fitur
                    </button>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>ID About</th>
                                <th>Fitur</th>
                                <th>Posisi</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            while ($row = mysqli_fetch_assoc($about_features_query)) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['about_section_id'] ?></td>
                                <td><?= $row['feature_text'] ?></td>
                                <td><?= ucfirst($row['column_position']) ?></td>
                                <td><?= $row['created_at'] ?></td>
                                <td><?= $row['updated_at'] ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editFeatureModal<?= $row['id'] ?>">Edit</button>
                                    <form method="POST" action="?q=delete_about_feature" class="d-inline">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Modal Edit Feature -->
                            <div class="modal fade" id="editFeatureModal<?= $row['id'] ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <form method="POST" action="?q=edit_about_feature">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Fitur</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" name="feature_text" class="form-control"
                                                    value="<?= $row['feature_text'] ?>">
                                                <input type="hidden" name="column_position"
                                                    value="<?= $row['column_position'] ?>">
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

<!-- Modal Tambah Feature -->
<div class="modal fade" id="addFeatureModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="?q=add_about_feature" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Fitur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="feature_text" class="form-control mb-3" placeholder="Tulis fitur...">
                    <select name="column_position" class="form-control">
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

<!-- Modal Tambah About -->
<div class="modal fade" id="addAboutModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form action="?q=add_about_section" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah About</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Meta Title</label>
                            <input type="text" name="about_meta" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Judul</label>
                            <input type="text" name="about_title" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Deskripsi</label>
                            <input type="text" name="about_description" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Tahun Pengalaman</label>
                            <input type="text" name="experience_years" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Teks Pengalaman</label>
                            <input type="text" name="experience_text" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Nama Profil</label>
                            <input type="text" name="profile_name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Jabatan</label>
                            <input type="text" name="profile_position" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Label Kontak</label>
                            <input type="text" name="contact_label" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>No Kontak</label>
                            <input type="text" name="contact_number" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Gambar Utama</label>
                            <input type="file" name="image_main_path" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Gambar Kedua</label>
                            <input type="file" name="image_secondary_path" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Upload Foto CEO</label>
                            <input type="file" name="profile_image" class="form-control" accept="image/*" required>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>