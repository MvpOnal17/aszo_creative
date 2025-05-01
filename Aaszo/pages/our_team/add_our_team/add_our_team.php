<?php
if ($_GET['q'] == 'add_our_team' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $folder = 'uploads/team/';
    $filename = time() . '_' . $_FILES['image_path']['name'];
    $path = $folder . $filename;
    move_uploaded_file($_FILES['image_path']['tmp_name'], $path);

    $name = $_POST['name'];
    $role = $_POST['role'];
    $description = $_POST['description'];
    $facebook_link = $_POST['facebook_link'];
    $twitter_link = $_POST['twitter_link'];
    $instagram_link = $_POST['instagram_link'];

    $query = mysqli_query($conn, "INSERT INTO our_team 
        (name, role, description, facebook_link, twitter_link, instagram_link, image_path) 
        VALUES ('$name', '$role', '$description', '$facebook_link', '$twitter_link', '$instagram_link', '$path')");

    if ($query) {
        echo "<script>Swal.fire('Berhasil', 'Anggota tim ditambahkan', 'success').then(()=>location.href='?q=our_team')</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Gagal menambahkan anggota', 'error')</script>";
    }
}