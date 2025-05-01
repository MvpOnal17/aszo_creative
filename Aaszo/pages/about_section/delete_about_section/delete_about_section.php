<?php
if ($_GET['q'] == 'delete_about_section' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image_main_path, image_secondary_path, profile_image FROM about_section WHERE id=$id"));

    // Hapus file jika ada
    if (!empty($get['image_main_path']) && file_exists($get['image_main_path'])) {
        unlink($get['image_main_path']);
    }
    if (!empty($get['image_secondary_path']) && file_exists($get['image_secondary_path'])) {
        unlink($get['image_secondary_path']);
    }
    if (!empty($get['profile_image']) && file_exists($get['profile_image'])) {
        unlink($get['profile_image']);
    }

    // Hapus dari database
    if (mysqli_query($conn, "DELETE FROM about_section WHERE id=$id")) {
        echo "<script>Swal.fire('Berhasil', 'Data berhasil dihapus', 'success').then(()=> location.href='?q=about_section');</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Gagal hapus data', 'error');</script>";
    }
}