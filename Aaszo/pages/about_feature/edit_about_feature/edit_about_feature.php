<?php
if ($_GET['q'] == 'edit_about_feature' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $feature_text = $_POST['feature_text'];
    $column_position = $_POST['column_position'];
    $updated_at = date('Y-m-d H:i:s');

    $query = "UPDATE about_features SET feature_text='$feature_text', column_position='$column_position', updated_at='$updated_at' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        echo "<script>Swal.fire('Berhasil', 'Fitur berhasil diupdate', 'success').then(()=> location.href='?q=about_section');</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Update gagal', 'error');</script>";
    }
}