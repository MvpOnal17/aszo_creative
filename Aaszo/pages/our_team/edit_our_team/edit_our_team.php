<?php
if ($_GET['q'] == 'edit_our_team' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    $description = $_POST['description'];
    $facebook_link = $_POST['facebook_link'];
    $twitter_link = $_POST['twitter_link'];
    $instagram_link = $_POST['instagram_link'];

    $get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image_path FROM our_team WHERE id = $id"));
    $old_path = $get['image_path'];
    $new_path = $old_path;

    if (!empty($_FILES['image_path']['name'])) {
        if (file_exists($old_path)) unlink($old_path);

        $folder = 'uploads/team/';
        $filename = time() . '_' . $_FILES['image_path']['name'];
        $new_path = $folder . $filename;
        move_uploaded_file($_FILES['image_path']['tmp_name'], $new_path);
    }

    $update = mysqli_query($conn, "UPDATE our_team SET 
        name='$name', role='$role', description='$description',
        facebook_link='$facebook_link', twitter_link='$twitter_link', instagram_link='$instagram_link',
        image_path='$new_path', updated_at=NOW()
        WHERE id=$id");

    if ($update) {
        echo "<script>Swal.fire('Berhasil', 'Data diperbarui', 'success').then(()=>location.href='?q=our_team')</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Gagal memperbarui data', 'error')</script>";
    }
}