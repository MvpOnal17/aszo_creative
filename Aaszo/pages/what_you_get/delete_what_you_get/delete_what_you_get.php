<?php
if ($_GET['q'] == 'delete_what_you_get' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM what_you_get WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>Swal.fire('Berhasil', 'Data berhasil dihapus!', 'success').then(() => location.href='?q=what_you_get');</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Gagal menghapus data.', 'error');</script>";
    }
}