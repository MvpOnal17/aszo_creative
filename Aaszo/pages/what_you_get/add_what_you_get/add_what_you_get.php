<?php
if ($_GET['q'] == 'add_what_you_get' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $position = $_POST['position'];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = $created_at;

    $query = "INSERT INTO what_you_get (title, description, position, created_at, updated_at)
              VALUES ('$title', '$description', '$position', '$created_at', '$updated_at')";

    if (mysqli_query($conn, $query)) {
        echo "<script>Swal.fire('Berhasil', 'Data berhasil ditambahkan!', 'success').then(() => location.href='?q=what_you_get');</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Gagal menambahkan data.', 'error');</script>";
    }
}