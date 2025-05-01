<?php
if ($_GET['q'] == 'delete_what_you_get_image' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image_path FROM what_you_get_image WHERE id=$id"));

    if ($get && file_exists($get['image_path'])) {
        unlink($get['image_path']);
    }

    if (mysqli_query($conn, "DELETE FROM what_you_get_image WHERE id=$id")) {
        echo "<script>Swal.fire('Berhasil', 'Gambar berhasil dihapus!', 'success').then(() => location.href='?q=what_you_get');</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Gagal menghapus data.', 'error');</script>";
    }
}