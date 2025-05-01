<?php
if ($_GET['q'] == 'delete_studi_kasus' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT thumbnail_path, modal_image_path FROM studi_kasus WHERE id=$id"));

    if ($get) {
        if (file_exists($get['thumbnail_path'])) unlink($get['thumbnail_path']);
        if (file_exists($get['modal_image_path'])) unlink($get['modal_image_path']);
    }

    if (mysqli_query($conn, "DELETE FROM studi_kasus WHERE id=$id")) {
        echo "<script>Swal.fire('Berhasil', 'Data berhasil dihapus', 'success').then(()=> location.href='?q=studi_kasus');</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Gagal menghapus data', 'error');</script>";
    }
}