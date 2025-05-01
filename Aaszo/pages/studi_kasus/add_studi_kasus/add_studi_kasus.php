<?php
if ($_GET['q'] == 'add_studi_kasus' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $folder = 'uploads/studi_kasus/';
    $thumbnail_name = time() . '_thumb_' . $_FILES['thumbnail_path']['name'];
    $modal_image_name = time() . '_modal_' . $_FILES['modal_image_path']['name'];

    $thumbnail_path = $folder . $thumbnail_name;
    $modal_image_path = $folder . $modal_image_name;

    move_uploaded_file($_FILES['thumbnail_path']['tmp_name'], $thumbnail_path);
    move_uploaded_file($_FILES['modal_image_path']['tmp_name'], $modal_image_path);

    $sql = "INSERT INTO studi_kasus (
        title, description, thumbnail_path, date_display,
        modal_title, modal_image_path, modal_description_1, modal_description_2, modal_description_3,
        modal_icon_1, modal_icon_2, modal_icon_3,
        modal_cta_text, modal_cta_link
    ) VALUES (
        '" . addslashes($_POST['title']) . "',
        '" . addslashes($_POST['description']) . "',
        '$thumbnail_path',
        '" . addslashes($_POST['date_display']) . "',
        '" . addslashes($_POST['modal_title']) . "',
        '$modal_image_path',
        '" . addslashes($_POST['modal_description_1']) . "',
        '" . addslashes($_POST['modal_description_2']) . "',
        '" . addslashes($_POST['modal_description_3']) . "',
        '" . addslashes($_POST['modal_icon_1']) . "',
        '" . addslashes($_POST['modal_icon_2']) . "',
        '" . addslashes($_POST['modal_icon_3']) . "',
        '" . addslashes($_POST['modal_cta_text']) . "',
        '" . addslashes($_POST['modal_cta_link']) . "'
    )";

    if (mysqli_query($conn, $sql)) {
        echo "<script>Swal.fire('Berhasil', 'Studi kasus berhasil ditambahkan', 'success').then(()=> location.href='?q=studi_kasus');</script>";
    } else {
        echo "<script>Swal.fire('Gagal', 'Gagal menambah data', 'error');</script>";
    }
}