<?php
if ($_GET['q'] == 'add_visi_misi' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $heading = $_POST['heading'];
    $description = $_POST['description'];
    $button_text = $_POST['button_text'];
    $button_link = $_POST['button_link'];
    $now = date('Y-m-d H:i:s');

    $query = "INSERT INTO visi_misi (heading, description, button_text, button_link, created_at, updated_at)
              VALUES ('$heading', '$description', '$button_text', '$button_link', '$now', '$now')";

    if (mysqli_query($conn, $query)) {
        echo "<script>Swal.fire('Berhasil', 'Data berhasil ditambahkan', 'success').then(()=> location.href='?q=visi_misi');</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Terjadi kesalahan saat menambahkan', 'error');</script>";
    }
}