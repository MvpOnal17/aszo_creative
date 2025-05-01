<?php
if ($_GET['q'] == 'add_about_feature' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $feature_text = $_POST['feature_text'];
    $column_position = $_POST['column_position'];

    // Ambil ID About (asumsi hanya 1 baris di about_section)
    $about = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM about_section LIMIT 1"));
    $about_section_id = $about ? $about['id'] : null;

    if ($about_section_id) {
        $created_at = $updated_at = date('Y-m-d H:i:s');
        $query = "INSERT INTO about_features (about_section_id, feature_text, column_position, created_at, updated_at)
                  VALUES ('$about_section_id', '$feature_text', '$column_position', '$created_at', '$updated_at')";
        if (mysqli_query($conn, $query)) {
            echo "<script>Swal.fire('Berhasil', 'Fitur berhasil ditambahkan', 'success').then(()=> location.href='?q=about_section');</script>";
        } else {
            echo "<script>Swal.fire('Gagal', 'Query gagal', 'error');</script>";
        }
    } else {
        echo "<script>Swal.fire('Gagal', 'about_section belum tersedia', 'error');</script>";
    }
}