<!-- Row untuk menampilkan data Home Section -->
<div class="row">
    <div class="col-lg-12">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold">Data Home Section</h5>
                <div class="text-end mb-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="ti ti-plus"></i> Tambah Data
                    </button>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Company Badge</th>
                                <th>Title Line 1</th>
                                <th>Title Line 2</th>
                                <th>Title Highlight</th>
                                <th>Description</th>
                                <th>Button Start Text</th>
                                <th>Button Start Link</th>
                                <th>Button Video Text</th>
                                <th>Button Video Link</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM home_section";
                            $result = mysqli_query($conn, $query);
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['company_badge'] ?></td>
                                <td><?= $row['title_line1'] ?></td>
                                <td><?= $row['title_line2'] ?></td>
                                <td><?= $row['title_highlight'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td><?= $row['btn_start_text'] ?></td>
                                <td><?= $row['btn_start_link'] ?></td>
                                <td><?= $row['btn_video_text'] ?></td>
                                <td><?= $row['btn_video_link'] ?></td>
                                <td>
                                    <img src="<?= $row['image_path'] ?>" alt="Image" width="100">
                                </td>
                                <td><?= $row['created_at'] ?></td>
                                <td><?= $row['updated_at'] ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editModal<?= $row['id'] ?>">Edit</button>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal<?= $row['id'] ?>">Hapus</button>
                                </td>

                            </tr>
                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1"
                                aria-labelledby="editModalLabel<?= $row['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form action="?q=edit_home_section" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Data</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Isi form mirip form tambah, tapi dengan value diisi -->
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label>Company Badge</label>
                                                        <input type="text" name="company_badge" class="form-control"
                                                            value="<?= $row['company_badge'] ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Title Line 1</label>
                                                        <input type="text" name="title_line1" class="form-control"
                                                            value="<?= $row['title_line1'] ?>" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Title Line 2</label>
                                                        <input type="text" name="title_line2" class="form-control"
                                                            value="<?= $row['title_line2'] ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Title Highlight</label>
                                                        <input type="text" name="title_highlight" class="form-control"
                                                            value="<?= $row['title_highlight'] ?>">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label>Description</label>
                                                        <textarea name="description"
                                                            class="form-control"><?= $row['description'] ?></textarea>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Button Start Text</label>
                                                        <input type="text" name="btn_start_text" class="form-control"
                                                            value="<?= $row['btn_start_text'] ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Button Start Link</label>
                                                        <input type="text" name="btn_start_link" class="form-control"
                                                            value="<?= $row['btn_start_link'] ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Button Video Text</label>
                                                        <input type="text" name="btn_video_text" class="form-control"
                                                            value="<?= $row['btn_video_text'] ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Button Video Link</label>
                                                        <input type="text" name="btn_video_link" class="form-control"
                                                            value="<?= $row['btn_video_link'] ?>">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label>Gambar Lama:</label><br>
                                                        <img src="<?= $row['image_path'] ?>" width="100"
                                                            class="mb-2"><br>
                                                        <label>Upload Gambar Baru (optional)</label>
                                                        <input type="file" name="image_path" class="form-control"
                                                            accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Update</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Modal Hapus -->
                            <div class="modal fade" id="deleteModal<?= $row['id'] ?>" tabindex="-1"
                                aria-labelledby="deleteModalLabel<?= $row['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="?q=delete_home_section" method="POST">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus data
                                                <strong><?= $row['title_line1'] ?></strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
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

<!-- Row untuk menampilkan data Home Awards -->
<div class="row">
    <div class="col-lg-12">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold">Data Home Awards</h5>
                <div class="text-end mb-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAwardModal">
                        <i class="ti ti-plus"></i> Tambah Award
                    </button>
                </div>

                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query_award = "SELECT * FROM home_awards ORDER BY id DESC";
                            $result_award = mysqli_query($conn, $query_award);
                            $no_award = 1;
                            while ($award = mysqli_fetch_assoc($result_award)) {
                            ?>
                            <tr>
                                <td><?= $no_award++ ?></td>
                                <td><?= $award['title'] ?></td>
                                <td><?= $award['description'] ?></td>
                                <td><?= $award['created_at'] ?></td>
                                <td><?= $award['updated_at'] ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editAwardModal<?= $award['id'] ?>">Edit</button>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteAwardModal<?= $award['id'] ?>">Hapus</button>
                                </td>
                            </tr>

                            <!-- Modal Edit Award -->
                            <div class="modal fade" id="editAwardModal<?= $award['id'] ?>" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="?q=edit_home_awards" method="POST">
                                        <input type="hidden" name="id" value="<?= $award['id'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Award</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>Title</label>
                                                    <input type="text" name="title" class="form-control"
                                                        value="<?= $award['title'] ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label>Description</label>
                                                    <textarea name="description" class="form-control"
                                                        required><?= $award['description'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Update</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Modal Delete Award -->
                            <div class="modal fade" id="deleteAwardModal<?= $award['id'] ?>" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="?q=delete_home_awards" method="POST">
                                        <input type="hidden" name="id" value="<?= $award['id'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah Anda yakin ingin menghapus award
                                                <strong><?= $award['title'] ?></strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
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
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="?q=add_home_section" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Data Home Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Company Badge</label>
                            <input type="text" name="company_badge" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Title Line 1</label>
                            <input type="text" name="title_line1" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Title Line 2</label>
                            <input type="text" name="title_line2" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Title Highlight</label>
                            <input type="text" name="title_highlight" class="form-control">
                        </div>
                        <div class="col-12 mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Button Start Text</label>
                            <input type="text" name="btn_start_text" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Button Start Link</label>
                            <input type="text" name="btn_start_link" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Button Video Text</label>
                            <input type="text" name="btn_video_text" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Button Video Link</label>
                            <input type="text" name="btn_video_link" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Upload Gambar</label>
                            <input type="file" name="image_path" class="form-control" accept="image/*" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Modal Tambah Award -->
<div class="modal fade" id="addAwardModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="?q=add_home_awards" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Award</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>