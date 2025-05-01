<?php
if ($_GET['q'] == 'edit_awards' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE home_awards SET 
        title = '$title',
        description = '$description',
        updated_at = NOW()
        WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo "
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Award berhasil diperbarui!',
            }).then(() => window.location.href = '?q=home_section');
        </script>";
    } else {
        echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Gagal memperbarui award: " . mysqli_error($conn) . "',
            }).then(() => window.location.href = '?q=home_section');
        </script>";
    }
}