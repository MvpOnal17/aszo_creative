<?php
$contact_query = mysqli_query($conn, "SELECT * FROM contact_info LIMIT 1");
$contact = mysqli_fetch_assoc($contact_query);
?>

<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title fw-semibold">Tabel Contact Info</h5>

                <div class="text-end mb-3">
                    <?php if (!$contact): ?>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addContactModal">
                        <i class="ti ti-plus"></i> Tambah Kontak
                    </button>
                    <?php else: ?>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editContactModal">
                        <i class="ti ti-edit"></i> Edit Kontak
                    </button>
                    <?php endif; ?>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Judul Section</th>
                                <th>Deskripsi Section</th>
                                <th>Judul Lokasi</th>
                                <th>Alamat Baris 1</th>
                                <th>Alamat Baris 2</th>
                                <th>Judul Telepon</th>
                                <th>Telepon 1</th>
                                <th>Telepon 2</th>
                                <th>Judul Email</th>
                                <th>Email 1</th>
                                <th>Email 2</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php if ($contact): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $contact['section_title'] ?></td>
                                <td><?= $contact['section_description'] ?></td>
                                <td><?= $contact['location_title'] ?></td>
                                <td><?= $contact['location_line1'] ?></td>
                                <td><?= $contact['location_line2'] ?></td>
                                <td><?= $contact['phone_title'] ?></td>
                                <td><?= $contact['phone_number1'] ?></td>
                                <td><?= $contact['phone_number2'] ?></td>
                                <td><?= $contact['email_title'] ?></td>
                                <td><?= $contact['email_address1'] ?></td>
                                <td><?= $contact['email_address2'] ?></td>
                                <td><?= $contact['created_at'] ?></td>
                                <td><?= $contact['updated_at'] ?></td>

                                <td>
                                    <form action="?q=delete_contact" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            <?php else: ?>
                            <tr>
                                <td colspan="14">Belum ada data.</td>
                            </tr>
                            <?php endif; ?>
                            <?php if ($contact): ?>
                            <div class="modal fade" id="editContactModal" tabindex="-1">
                                <div class="modal-dialog modal-xl">
                                    <form method="POST" action="?q=edit_contact">
                                        <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Kontak</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body row g-3">
                                                <div class="col-md-6"><label>Judul Section</label><input type="text"
                                                        name="section_title" class="form-control"
                                                        value="<?= $contact['section_title'] ?>" required></div>
                                                <div class="col-md-6"><label>Deskripsi Section</label><input type="text"
                                                        name="section_description" class="form-control"
                                                        value="<?= $contact['section_description'] ?>" required></div>

                                                <div class="col-md-6"><label>Judul Lokasi</label><input type="text"
                                                        name="location_title" class="form-control"
                                                        value="<?= $contact['location_title'] ?>" required></div>
                                                <div class="col-md-6"><label>Alamat Baris 1</label><input type="text"
                                                        name="location_line1" class="form-control"
                                                        value="<?= $contact['location_line1'] ?>" required></div>
                                                <div class="col-md-6"><label>Alamat Baris 2</label><input type="text"
                                                        name="location_line2" class="form-control"
                                                        value="<?= $contact['location_line2'] ?>"></div>

                                                <div class="col-md-6"><label>Judul Telepon</label><input type="text"
                                                        name="phone_title" class="form-control"
                                                        value="<?= $contact['phone_title'] ?>" required></div>
                                                <div class="col-md-6"><label>Telepon 1</label><input type="text"
                                                        name="phone_number1" class="form-control"
                                                        value="<?= $contact['phone_number1'] ?>" required></div>
                                                <div class="col-md-6"><label>Telepon 2</label><input type="text"
                                                        name="phone_number2" class="form-control"
                                                        value="<?= $contact['phone_number2'] ?>"></div>

                                                <div class="col-md-6"><label>Judul Email</label><input type="text"
                                                        name="email_title" class="form-control"
                                                        value="<?= $contact['email_title'] ?>" required></div>
                                                <div class="col-md-6"><label>Email 1</label><input type="email"
                                                        name="email_address1" class="form-control"
                                                        value="<?= $contact['email_address1'] ?>" required></div>
                                                <div class="col-md-6"><label>Email 2</label><input type="email"
                                                        name="email_address2" class="form-control"
                                                        value="<?= $contact['email_address2'] ?>"></div>
                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-success">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addContactModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <form method="POST" action="?q=add_contact">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kontak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">
                    <div class="col-md-6"><label>Judul Section</label><input type="text" name="section_title"
                            class="form-control" required></div>
                    <div class="col-md-6"><label>Deskripsi Section</label><input type="text" name="section_description"
                            class="form-control" required></div>

                    <div class="col-md-6"><label>Judul Lokasi</label><input type="text" name="location_title"
                            class="form-control" required></div>
                    <div class="col-md-6"><label>Alamat Baris 1</label><input type="text" name="location_line1"
                            class="form-control" required></div>
                    <div class="col-md-6"><label>Alamat Baris 2</label><input type="text" name="location_line2"
                            class="form-control"></div>

                    <div class="col-md-6"><label>Judul Telepon</label><input type="text" name="phone_title"
                            class="form-control" required></div>
                    <div class="col-md-6"><label>Telepon 1</label><input type="text" name="phone_number1"
                            class="form-control" required></div>
                    <div class="col-md-6"><label>Telepon 2</label><input type="text" name="phone_number2"
                            class="form-control"></div>

                    <div class="col-md-6"><label>Judul Email</label><input type="text" name="email_title"
                            class="form-control" required></div>
                    <div class="col-md-6"><label>Email 1</label><input type="email" name="email_address1"
                            class="form-control" required></div>
                    <div class="col-md-6"><label>Email 2</label><input type="email" name="email_address2"
                            class="form-control"></div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>