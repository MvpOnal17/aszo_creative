<?php
if ($_GET['q'] == 'edit_visi_misi' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $heading = $_POST['heading'];
    $description = $_POST['description'];
    $button_text = $_POST['button_text'];
    $button_link = $_POST['button_link'];
    $now = date('Y-m-d H:i:s');

    $query = "UPDATE visi_misi SET 
                heading = '$heading',
                description = '$description',
                button_text = '$button_text',
                button_link = '$button_link',
                updated_at = '$now'
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        echo "<script>Swal.fire('Berhasil', 'Data berhasil diperbarui', 'success').then(()=> location.href='?q=visi_misi');</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Gagal memperbarui data', 'error');</script>";
    }
}