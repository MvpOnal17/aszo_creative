<?php
if ($_GET['q'] == 'add_contact' && $_SERVER['REQUEST_METHOD'] === 'POST') {
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

    $insert = mysqli_query($conn, "INSERT INTO contact_info (
        section_title, section_description, location_title, location_line1, location_line2,
        phone_title, phone_number1, phone_number2, email_title, email_address1, email_address2
    ) VALUES (
        '$section_title', '$section_description', '$location_title', '$location_line1', '$location_line2',
        '$phone_title', '$phone_number1', '$phone_number2', '$email_title', '$email_address1', '$email_address2'
    )");

    echo $insert
        ? "<script>Swal.fire('Berhasil', 'Data berhasil ditambahkan', 'success').then(()=> location.href='?q=contact');</script>"
        : "<script>Swal.fire('Gagal', 'Gagal menambahkan data', 'error');</script>";
}