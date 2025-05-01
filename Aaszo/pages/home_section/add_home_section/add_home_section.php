<?php
if ($_GET['q'] == 'add_home' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data
    $company_badge     = $_POST['company_badge'];
    $title_line1       = $_POST['title_line1'];
    $title_line2       = $_POST['title_line2'];
    $title_highlight   = $_POST['title_highlight'];
    $description       = $_POST['description'];
    $btn_start_text    = $_POST['btn_start_text'];
    $btn_start_link    = $_POST['btn_start_link'];
    $btn_video_text    = $_POST['btn_video_text'];
    $btn_video_link    = $_POST['btn_video_link'];
    $created_at        = date('Y-m-d H:i:s');
    $updated_at        = $created_at;

    // Proses upload file
    $upload_folder = 'uploads/home_picture/';
    $file_name = $_FILES['image_path']['name'];
    $tmp_name = $_FILES['image_path']['tmp_name'];
    $target_file = $upload_folder . time() . '_' . basename($file_name);

    if (move_uploaded_file($tmp_name, $target_file)) {
        $image_path = $target_file;

        // Query INSERT
        $query = "INSERT INTO home_section (
            company_badge, title_line1, title_line2, title_highlight, description, 
            btn_start_text, btn_start_link, btn_video_text, btn_video_link, image_path, 
            created_at, updated_at
        ) VALUES (
            '$company_badge', '$title_line1', '$title_line2', '$title_highlight', '$description',
            '$btn_start_text', '$btn_start_link', '$btn_video_text', '$btn_video_link', '$image_path',
            '$created_at', '$updated_at'
        )";

        if (mysqli_query($conn, $query)) {
            // Success
            echo "
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data berhasil ditambahkan!',
                }).then(() => window.location.href = '?q=home_section');
            </script>";
        } else {
            echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Query gagal: " . mysqli_error($conn) . "',
                }).then(() => window.location.href = '?q=home_section');
            </script>";
        }
    } else {
        echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Upload Gagal',
                text: 'Gagal upload gambar ke server.',
            }).then(() => window.location.href = '?q=home_section');
        </script>";
    }
}