<?php
if ($_GET['q'] == 'add_home_awards' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO home_awards (title, description) VALUES ('$title', '$description')";
    if (mysqli_query($conn, $query)) {
        echo "
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Award berhasil ditambahkan!',
            }).then(() => window.location.href = '?q=home');
        </script>";
    } else {
        echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Gagal menambahkan award: " . mysqli_error($conn) . "',
            }).then(() => window.location.href = '?q=home_section');
        </script>";
    }
}