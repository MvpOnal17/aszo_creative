<?php
if ($_GET['q'] == 'add_about_section' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data
    $fields = ['about_meta', 'about_title', 'about_description', 'experience_years', 'experience_text', 'profile_name', 'profile_position', 'contact_label', 'contact_number'];
    foreach ($fields as $f) {
        $$f = $_POST[$f];
    }

    // Upload gambar
    $folder = 'uploads/about/';
    $main = time() . '_main_' . $_FILES['image_main_path']['name'];
    $second = time() . '_second_' . $_FILES['image_secondary_path']['name'];
    $profile = time() . '_profile_' . $_FILES['profile_image']['name'];

    $main_path = $folder . $main;
    $second_path = $folder . $second;
    $profile_path = $folder . $profile;

    if (
        move_uploaded_file($_FILES['image_main_path']['tmp_name'], $main_path) &&
        move_uploaded_file($_FILES['image_secondary_path']['tmp_name'], $second_path) &&
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $profile_path)
    ) {
        $created_at = $updated_at = date('Y-m-d H:i:s');
        $query = "INSERT INTO about_section (
            about_meta, about_title, about_description,
            experience_years, experience_text,
            profile_name, profile_position, profile_image,
            contact_label, contact_number,
            image_main_path, image_secondary_path,
            created_at, updated_at
        ) VALUES (
            '$about_meta', '$about_title', '$about_description',
            '$experience_years', '$experience_text',
            '$profile_name', '$profile_position', '$profile_path',
            '$contact_label', '$contact_number',
            '$main_path', '$second_path',
            '$created_at', '$updated_at'
        )";

        if (mysqli_query($conn, $query)) {
            echo "<script>Swal.fire('Berhasil', 'Data berhasil ditambahkan', 'success').then(()=> location.href='?q=about_section');</script>";
        } else {
            echo "<script>Swal.fire('Gagal', 'Query gagal', 'error');</script>";
        }
    } else {
        echo "<script>Swal.fire('Upload Gagal', 'Gagal upload gambar', 'error');</script>";
    }
}