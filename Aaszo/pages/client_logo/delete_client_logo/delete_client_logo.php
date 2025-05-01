<?php
if ($_GET['q'] == 'delete_client_logo' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image_path FROM client_logos WHERE id=$id"));

    if ($get && file_exists($get['image_path'])) {
        unlink($get['image_path']);
    }

    $delete = mysqli_query($conn, "DELETE FROM client_logos WHERE id=$id");

    if ($delete) {
        echo "<script>Swal.fire('Berhasil', 'Logo berhasil dihapus', 'success').then(()=> location.href='?q=client_logo');</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Gagal menghapus logo', 'error');</script>";
    }
}