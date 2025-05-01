<?php
if ($_GET['q'] == 'edit_client_logo' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $folder = 'uploads/client_logo/';

    $get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image_path FROM client_logos WHERE id = $id"));
    $old_path = $get['image_path'];

    if ($_FILES['image_path']['name']) {
        if (file_exists($old_path)) {
            unlink($old_path);
        }

        $filename = time() . '_' . $_FILES['image_path']['name'];
        $new_path = $folder . $filename;
        move_uploaded_file($_FILES['image_path']['tmp_name'], $new_path);

        $now = date('Y-m-d H:i:s');
        $update = mysqli_query($conn, "UPDATE client_logos SET image_path='$new_path', updated_at='$now' WHERE id=$id");

        if ($update) {
            echo "<script>Swal.fire('Berhasil', 'Logo berhasil diperbarui', 'success').then(()=> location.href='?q=client_logo');</script>";
        } else {
            echo "<script>Swal.fire('Gagal', 'Update gagal', 'error');</script>";
        }
    }
}