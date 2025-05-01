<?php
if ($_GET['q'] == 'delete_about_feature' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $query = "DELETE FROM about_features WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        echo "<script>Swal.fire('Berhasil', 'Fitur berhasil dihapus', 'success').then(()=> location.href='?q=about_section');</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Gagal menghapus fitur', 'error');</script>";
    }
}