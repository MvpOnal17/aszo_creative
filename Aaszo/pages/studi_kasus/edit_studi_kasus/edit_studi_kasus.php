<?php
if ($_GET['q'] == 'edit_studi_kasus' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $folder = 'uploads/studi_kasus/';
    $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT thumbnail_path, modal_image_path FROM studi_kasus WHERE id = $id"));

    $thumbnail_path = $data['thumbnail_path'];
    $modal_image_path = $data['modal_image_path'];

    if ($_FILES['thumbnail_path']['name']) {
        if (file_exists($thumbnail_path)) unlink($thumbnail_path);
        $filename = time() . '_thumb_' . $_FILES['thumbnail_path']['name'];
        $thumbnail_path = $folder . $filename;
        move_uploaded_file($_FILES['thumbnail_path']['tmp_name'], $thumbnail_path);
    }

    if ($_FILES['modal_image_path']['name']) {
        if (file_exists($modal_image_path)) unlink($modal_image_path);
        $filename2 = time() . '_modal_' . $_FILES['modal_image_path']['name'];
        $modal_image_path = $folder . $filename2;
        move_uploaded_file($_FILES['modal_image_path']['tmp_name'], $modal_image_path);
    }

    $sql = "UPDATE studi_kasus SET 
        title = '" . addslashes($_POST['title']) . "',
        description = '" . addslashes($_POST['description']) . "',
        thumbnail_path = '$thumbnail_path',
        date_display = '" . addslashes($_POST['date_display']) . "',
        modal_title = '" . addslashes($_POST['modal_title']) . "',
        modal_image_path = '$modal_image_path',
        modal_description_1 = '" . addslashes($_POST['modal_description_1']) . "',
        modal_description_2 = '" . addslashes($_POST['modal_description_2']) . "',
        modal_description_3 = '" . addslashes($_POST['modal_description_3']) . "',
        modal_icon_1 = '" . addslashes($_POST['modal_icon_1']) . "',
        modal_icon_2 = '" . addslashes($_POST['modal_icon_2']) . "',
        modal_icon_3 = '" . addslashes($_POST['modal_icon_3']) . "',
        modal_cta_text = '" . addslashes($_POST['modal_cta_text']) . "',
        modal_cta_link = '" . addslashes($_POST['modal_cta_link']) . "',
        updated_at = NOW()
        WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>Swal.fire('Berhasil', 'Studi kasus berhasil diperbarui', 'success').then(()=> location.href='?q=studi_kasus');</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Gagal memperbarui data', 'error');</script>";
    }
}