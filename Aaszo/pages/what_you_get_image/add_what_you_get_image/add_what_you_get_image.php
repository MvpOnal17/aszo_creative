<?php
if ($_GET['q'] == 'add_what_you_get_image' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $folder = 'uploads/what_you_get/';
    $filename = time() . '_' . $_FILES['image_path']['name'];
    $filepath = $folder . $filename;

    if (move_uploaded_file($_FILES['image_path']['tmp_name'], $filepath)) {
        $created_at = date('Y-m-d H:i:s');
        $query = "INSERT INTO what_you_get_image (image_path, created_at, updated_at) 
                  VALUES ('$filepath', '$created_at', '$created_at')";

        if (mysqli_query($conn, $query)) {
            echo "<script>Swal.fire('Berhasil', 'Gambar berhasil ditambahkan!', 'success').then(() => location.href='?q=what_you_get');</script>";
        } else {
            unlink($filepath);
            echo "<script>Swal.fire('Gagal', 'Gagal menambahkan data ke database.', 'error');</script>";
        }
    } else {
        echo "<script>Swal.fire('Gagal', 'Upload file gagal.', 'error');</script>";
    }
}