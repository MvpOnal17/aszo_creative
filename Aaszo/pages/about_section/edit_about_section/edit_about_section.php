<?php
if ($_GET['q'] == 'edit_about_section' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $fields = [
        'about_meta',
        'about_title',
        'about_description',
        'experience_years',
        'experience_text',
        'profile_name',
        'profile_position',
        'contact_label',
        'contact_number'
    ];
    foreach ($fields as $f) {
        $$f = $_POST[$f];
    }

    $folder = 'uploads/about/';
    $get = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image_main_path, image_secondary_path, profile_image FROM about_section WHERE id=$id"));

    $main_path = $get['image_main_path'];
    $second_path = $get['image_secondary_path'];
    $profile_path = $get['profile_image'];

    // Gambar utama
    if (!empty($_FILES['image_main_path']['name'])) {
        if (file_exists($main_path)) unlink($main_path);
        $new_main = time() . '_main_' . basename($_FILES['image_main_path']['name']);
        $main_path = $folder . $new_main;
        move_uploaded_file($_FILES['image_main_path']['tmp_name'], $main_path);
    }

    // Gambar kedua
    if (!empty($_FILES['image_secondary_path']['name'])) {
        if (file_exists($second_path)) unlink($second_path);
        $new_second = time() . '_second_' . basename($_FILES['image_secondary_path']['name']);
        $second_path = $folder . $new_second;
        move_uploaded_file($_FILES['image_secondary_path']['tmp_name'], $second_path);
    }

    // Gambar profile CEO
    if (!empty($_FILES['profile_image']['name'])) {
        if (file_exists($profile_path)) unlink($profile_path);
        $new_profile = time() . '_profile_' . basename($_FILES['profile_image']['name']);
        $profile_path = $folder . $new_profile;
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $profile_path);
    }

    $updated_at = date('Y-m-d H:i:s');
    $query = "UPDATE about_section SET
        about_meta='$about_meta',
        about_title='$about_title',
        about_description='$about_description',
        experience_years='$experience_years',
        experience_text='$experience_text',
        profile_name='$profile_name',
        profile_position='$profile_position',
        profile_image='$profile_path',
        contact_label='$contact_label',
        contact_number='$contact_number',
        image_main_path='$main_path',
        image_secondary_path='$second_path',
        updated_at='$updated_at'
        WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>Swal.fire('Berhasil', 'Data berhasil diupdate', 'success').then(() => location.href='?q=about_section');</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Update gagal', 'error');</script>";
    }
}