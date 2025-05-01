<?php
if ($_GET['q'] == 'delete_our_team' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image_path FROM our_team WHERE id = $id"));

    if ($get && file_exists($get['image_path'])) {
        unlink($get['image_path']);
    }

    $delete = mysqli_query($conn, "DELETE FROM our_team WHERE id = $id");

    if ($delete) {
        echo "<script>Swal.fire('Berhasil', 'Data dihapus', 'success').then(()=>location.href='?q=our_team')</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Gagal menghapus data', 'error')</script>";
    }
}