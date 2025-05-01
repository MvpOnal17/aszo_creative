<?php
if ($_GET['q'] == 'edit_what_you_get' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $position = $_POST['position'];
    $updated_at = date('Y-m-d H:i:s');

    $query = "UPDATE what_you_get 
              SET title='$title', description='$description', position='$position', updated_at='$updated_at'
              WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>Swal.fire('Berhasil', 'Data berhasil diupdate!', 'success').then(() => location.href='?q=what_you_get');</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Gagal mengupdate data.', 'error');</script>";
    }
}