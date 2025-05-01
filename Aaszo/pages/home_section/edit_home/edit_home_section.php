<?php
if ($_GET['q'] == 'edit_home' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id                = $_POST['id'];
    $company_badge     = $_POST['company_badge'];
    $title_line1       = $_POST['title_line1'];
    $title_line2       = $_POST['title_line2'];
    $title_highlight   = $_POST['title_highlight'];
    $description       = $_POST['description'];
    $btn_start_text    = $_POST['btn_start_text'];
    $btn_start_link    = $_POST['btn_start_link'];
    $btn_video_text    = $_POST['btn_video_text'];
    $btn_video_link    = $_POST['btn_video_link'];
    $updated_at        = date('Y-m-d H:i:s');

    // Ambil path gambar lama
    $getOld = mysqli_query($conn, "SELECT image_path FROM home_section WHERE id = '$id'");
    $oldData = mysqli_fetch_assoc($getOld);
    $oldImagePath = $oldData['image_path'];

    // Cek jika ada gambar baru yang diupload
    if (!empty($_FILES['image_path']['name'])) {
        $upload_folder = 'uploads/home_picture/';
        $file_name = $_FILES['image_path']['name'];
        $tmp_name = $_FILES['image_path']['tmp_name'];
        $newImagePath = $upload_folder . time() . '_' . basename($file_name);

        // Proses upload file baru
        if (move_uploaded_file($tmp_name, $newImagePath)) {
            // Hapus file lama jika ada
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $image_sql = ", image_path = '$newImagePath'";
        } else {
            echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Upload Gagal',
                    text: 'Gagal upload gambar baru ke server.',
                }).then(() => window.location.href = '?q=home_section');
            </script>";
            exit;
        }
    } else {
        $image_sql = ""; // tidak update image_path
    }

    // Query update
    $query = "UPDATE home_section SET 
        company_badge = '$company_badge',
        title_line1 = '$title_line1',
        title_line2 = '$title_line2',
        title_highlight = '$title_highlight',
        description = '$description',
        btn_start_text = '$btn_start_text',
        btn_start_link = '$btn_start_link',
        btn_video_text = '$btn_video_text',
        btn_video_link = '$btn_video_link',
        updated_at = '$updated_at'
        $image_sql
        WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo "
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data berhasil diperbarui!',
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
}