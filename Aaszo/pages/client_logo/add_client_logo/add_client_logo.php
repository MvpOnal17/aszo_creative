<?php
if ($_GET['q'] == 'add_client_logo' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $folder = 'uploads/client_logo/';
    $filename = time() . '_' . $_FILES['image_path']['name'];
    $filepath = $folder . $filename;

    if (move_uploaded_file($_FILES['image_path']['tmp_name'], $filepath)) {
        $now = date('Y-m-d H:i:s');
        $insert = mysqli_query($conn, "INSERT INTO client_logos (image_path, created_at, updated_at)
                                       VALUES ('$filepath', '$now', '$now')");

        if ($insert) {
            echo "<script>Swal.fire('Berhasil', 'Logo berhasil ditambahkan', 'success').then(()=> location.href='?q=client_logo');</script>";
        } else {
            echo "<script>Swal.fire('Gagal', 'Database gagal menyimpan', 'error');</script>";
        }
    } else {
        echo "<script>Swal.fire('Gagal', 'Upload file gagal', 'error');</script>";
    }
}