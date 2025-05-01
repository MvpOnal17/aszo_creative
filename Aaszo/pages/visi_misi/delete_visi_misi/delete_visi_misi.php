<?php
if ($_GET['q'] == 'delete_visi_misi' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $query = "DELETE FROM visi_misi WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        echo "<script>Swal.fire('Berhasil', 'Data berhasil dihapus', 'success').then(()=> location.href='?q=visi_misi');</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Gagal menghapus data', 'error');</script>";
    }
}