<?php
if ($_GET['q'] == 'edit_contact' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $section_title = $_POST['section_title'];
    $section_description = $_POST['section_description'];
    $location_title = $_POST['location_title'];
    $location_line1 = $_POST['location_line1'];
    $location_line2 = $_POST['location_line2'];
    $phone_title = $_POST['phone_title'];
    $phone_number1 = $_POST['phone_number1'];
    $phone_number2 = $_POST['phone_number2'];
    $email_title = $_POST['email_title'];
    $email_address1 = $_POST['email_address1'];
    $email_address2 = $_POST['email_address2'];

    $update = mysqli_query($conn, "UPDATE contact_info SET
        section_title = '$section_title',
        section_description = '$section_description',
        location_title = '$location_title',
        location_line1 = '$location_line1',
        location_line2 = '$location_line2',
        phone_title = '$phone_title',
        phone_number1 = '$phone_number1',
        phone_number2 = '$phone_number2',
        email_title = '$email_title',
        email_address1 = '$email_address1',
        email_address2 = '$email_address2',
        updated_at = NOW()
        WHERE id = $id
    ");

    echo $update
        ? "<script>Swal.fire('Berhasil', 'Data berhasil diperbarui', 'success').then(()=> location.href='?q=contact');</script>"
        : "<script>Swal.fire('Gagal', 'Gagal memperbarui data', 'error');</script>";
}