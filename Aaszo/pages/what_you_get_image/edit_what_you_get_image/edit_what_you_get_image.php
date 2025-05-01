<?php
if ($_GET['q'] == 'edit_what_you_get_image' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image_path FROM what_you_get_image WHERE id=$id"));

    if ($get && file_exists($get['image_path'])) {
        unlink($get['image_path']);
    }

    $folder = 'uploads/what_you_get/';
    $filename = time() . '_' . $_FILES['image_path']['name'];
    $filepath = $folder . $filename;

    if (move_uploaded_file($_FILES['image_path']['tmp_name'], $filepath)) {
        $updated_at = date('Y-m-d H:i:s');
        $query = "UPDATE what_you_get_image 
                  SET image_path='$filepath', updated_at='$updated_at' 
                  WHERE id=$id";

        if (mysqli_query($conn, $query)) {
            echo "<script>Swal.fire('Berhasil', 'Gambar berhasil diperbarui!', 'success').then(() => location.href='?q=what_you_get');</script>";
        } else {
            unlink($filepath);
            echo "<script>Swal.fire('Gagal', 'Gagal update data di database.', 'error');</script>";
        }
    } else {
        echo "<script>Swal.fire('Gagal', 'Upload file gagal.', 'error');</script>";
    }
}