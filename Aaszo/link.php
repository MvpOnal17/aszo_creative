<?php
@$page = $_GET['q'];
if (!empty($page)) {
    switch ($page) {


        case 'dashboard':
            include './pages/dashboard/dashboard.php';
            break;

        case 'home_section':
            include './pages/home_section/home_section.php';
            break;

        case 'add_home_section':
            include './pages/home_section/add_home_section/add_home_section.php';
            break;

        case 'edit_home_section':
            include './pages/home_section/edit_home_section/edit_home_section.php';
            break;

        case 'delete_home_section':
            include './pages/home_section/delete_home_section/delete_home_section.php';
            break;

        case 'add_home_awards':
            include './pages/home_awards/add_home_awards/add_home_awards.php';
            break;

        case 'edit_home_awards':
            include './pages/home_awards/edit_home_awards/edit_home_awards.php';
            break;

        case 'delete_home_awards':
            include './pages/home_awards/delete_home_awards/delete_home_awards.php';
            break;

        case 'about_section':
            include './pages/about_section/about_section.php';
            break;

        case 'add_about_section':
            include './pages/about_section/add_about_section/add_about_section.php';
            break;

        case 'edit_about_section':
            include './pages/about_section/edit_about_section/edit_about_section.php';
            break;

        case 'delete_about_section':
            include './pages/about_section/delete_about_section/delete_about_section.php';
            break;

        case 'add_about_feature':
            include './pages/about_feature/add_about_feature/add_about_feature.php';
            break;

        case 'edit_about_feature':
            include './pages/about_feature/edit_about_feature/edit_about_feature.php';
            break;

        case 'delete_about_feature':
            include './pages/about_feature/delete_about_feature/delete_about_feature.php';
            break;

        case 'what_you_get':
            include './pages/what_you_get/what_you_get.php';
            break;

        case 'add_what_you_get':
            include './pages/what_you_get/add_what_you_get/add_what_you_get.php';
            break;

        case 'edit_what_you_get':
            include './pages/what_you_get/edit_what_you_get/edit_what_you_get.php';
            break;

        case 'delete_what_you_get':
            include './pages/what_you_get/delete_what_you_get/delete_what_you_get.php';
            break;

        case 'add_what_you_get_image':
            include './pages/what_you_get_image/add_what_you_get_image/add_what_you_get_image.php';
            break;

        case 'edit_what_you_get_image':
            include './pages/what_you_get_image/edit_what_you_get_image/edit_what_you_get_image.php';
            break;

        case 'delete_what_you_get_image':
            include './pages/what_you_get_image/delete_what_you_get_image/delete_what_you_get_image.php';
            break;


        case 'visi_misi':
            include './pages/visi_misi/visi_misi.php';
            break;

        case 'add_visi_misi':
            include './pages/visi_misi/add_visi_misi/add_visi_misi.php';
            break;

        case 'edit_visi_misi':
            include './pages/visi_misi/edit_visi_misi/edit_visi_misi.php';
            break;

        case 'delete_visi_misi':
            include './pages/visi_misi/delete_visi_misi/delete_visi_misi.php';
            break;


        case 'client_logo':
            include './pages/client_logo/client_logo.php';
            break;

        case 'add_client_logo':
            include './pages/client_logo/add_client_logo/add_client_logo.php';
            break;

        case 'edit_client_logo':
            include './pages/client_logo/edit_client_logo/edit_client_logo.php';
            break;

        case 'delete_client_logo':
            include './pages/client_logo/delete_client_logo/delete_client_logo.php';
            break;

        case 'studi_kasus':
            include './pages/studi_kasus/studi_kasus.php';
            break;

        case 'add_studi_kasus':
            include './pages/studi_kasus/add_studi_kasus/add_studi_kasus.php';
            break;

        case 'edit_studi_kasus':
            include './pages/studi_kasus/edit_studi_kasus/edit_studi_kasus.php';
            break;

        case 'delete_studi_kasus':
            include './pages/studi_kasus/delete_studi_kasus/delete_studi_kasus.php';
            break;

        case 'our_team':
            include './pages/our_team/our_team.php';
            break;

        case 'add_our_team':
            include './pages/our_team/add_our_team/add_our_team.php';
            break;

        case 'edit_our_team':
            include './pages/our_team/edit_our_team/edit_our_team.php';
            break;

        case 'delete_our_team':
            include './pages/our_team/delete_our_team/delete_our_team.php';
            break;

        case 'contact':
            include './pages/contact/contact.php';
            break;

        case 'add_contact':
            include './pages/contact/add_contact/add_contact.php';
            break;

        case 'edit_contact':
            include './pages/contact/edit_contact/edit_contact.php';
            break;

        case 'delete_contact':
            include './pages/contact/delete_contact/delete_contact.php';
            break;
    }
} else {
    include './pages/dashboard/dashboard.php';
}