<?php
if ($_GET['q'] == 'delete_home' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Ambil path gambar sebelum dihapus
    $getData = mysqli_query($conn, "SELECT image_path FROM home_section WHERE id = '$id'");
    $row = mysqli_fetch_assoc($getData);
    $image_path = $row['image_path'];

    // Hapus data dari database
    $delete = mysqli_query($conn, "DELETE FROM home_section WHERE id = '$id'");

    if ($delete) {
        // Hapus file gambar dari server
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        echo "
       
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data berhasil dihapus!',
            }).then(() => window.location.href = '?q=home_section');
        </script>";
    } else {
        echo "
       
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Gagal menghapus data: " . mysqli_error($conn) . "',
            }).then(() => window.location.href = '?q=home_section');
        </script>";
    }
}