<?php
if ($_GET['q'] == 'delete_contact' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $delete = mysqli_query($conn, "DELETE FROM contact_info WHERE id=$id");

    echo $delete
        ? "<script>Swal.fire('Berhasil', 'Data berhasil dihapus', 'success').then(()=> location.href='?q=contact');</script>"
        : "<script>Swal.fire('Gagal', 'Gagal menghapus data', 'error');</script>";
}