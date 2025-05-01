<?php
// Ambil 1 data terbaru dari home_section
$query = "SELECT * FROM home_section ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!-- Hero Section -->
<section id="home" class="hero section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
                    <div class="company-badge mb-4">
                        <i class="bi bi-gear-fill me-2"></i>
                        <?= $row['company_badge'] ?>
                    </div>
                    <h1 class="mb-4">
                        <?= $row['title_line1'] ?><br>
                        <?= $row['title_line2'] ?><br>
                        <span class="accent-text"><?= $row['title_highlight'] ?></span>
                    </h1>
                    <p class="mb-4 mb-md-5">
                        <?= $row['description'] ?>
                    </p>
                    <div class="hero-buttons">
                        <a href="<?= $row['btn_start_link'] ?>" class="btn btn-primary me-0 me-sm-2 mx-1">
                            <?= $row['btn_start_text'] ?>
                        </a>
                        <a href="<?= $row['btn_video_link'] ?>" class="btn btn-link mt-2 mt-sm-0 glightbox">
                            <i class="bi bi-play-circle me-1"></i>
                            <?= $row['btn_video_text'] ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
                    <img src="Aaszo/<?= $row['image_path'] ?>" alt="Hero Image" class="img-fluid">
                    <div class="customers-badge">
                        <div class="customer-avatars">
                            <img src="assets/img/avatar-1.webp" alt="Customer 1" class="avatar">
                            <img src="assets/img/avatar-2.webp" alt="Customer 2" class="avatar">
                            <img src="assets/img/avatar-3.webp" alt="Customer 3" class="avatar">
                            <img src="assets/img/avatar-4.webp" alt="Customer 4" class="avatar">
                            <img src="assets/img/avatar-5.webp" alt="Customer 5" class="avatar">
                            <span class="avatar more">12+</span>
                        </div>
                        <p class="mb-0 mt-2">20k Client</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
            <?php
            $icons = ['bi bi-trophy', 'bi bi-briefcase', 'bi bi-graph-up', 'bi bi-people-fill']; // ikon statis berdasarkan urutan
            $query = "SELECT * FROM home_awards ORDER BY id ASC LIMIT 4"; // batasi 4 item
            $result = mysqli_query($conn, $query);
            $index = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $icon = $icons[$index % count($icons)];
            ?>
                <div class="col-lg-3 col-md-6">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="<?= $icon ?>"></i>
                        </div>
                        <div class="stat-content">
                            <h4><?= $row['title'] ?></h4>
                            <p class="mb-0"><?= $row['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php
                $index++;
            }
            ?>
        </div>
    </div>

</section>


<?php
// Ambil data about_section
$about = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM about_section LIMIT 1"));

// Ambil fitur kiri dan kanan
$features_left = mysqli_query($conn, "SELECT feature_text FROM about_features WHERE column_position = 'left'");
$features_right = mysqli_query($conn, "SELECT feature_text FROM about_features WHERE column_position = 'right'");
?>

<section id="about" class="about section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 align-items-center justify-content-between">
            <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                <span class="about-meta"><?= htmlspecialchars($about['about_meta']) ?></span>
                <h2 class="about-title"><?= htmlspecialchars($about['about_title']) ?></h2>
                <p class="about-description"><?= nl2br($about['about_description']) ?></p>

                <div class="row feature-list-wrapper">
                    <div class="col-md-6">
                        <ul class="feature-list">
                            <?php while ($f = mysqli_fetch_assoc($features_left)): ?>
                                <li><i class="bi bi-check-circle-fill"></i> <?= htmlspecialchars($f['feature_text']) ?></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="feature-list">
                            <?php while ($f = mysqli_fetch_assoc($features_right)): ?>
                                <li><i class="bi bi-check-circle-fill"></i> <?= htmlspecialchars($f['feature_text']) ?></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>

                <div class="info-wrapper">
                    <div class="row gy-4">
                        <div class="col-lg-5">
                            <div class="profile d-flex align-items-center gap-3">
                                <img src="Aaszo/<?= $about['profile_image'] ?>" alt="CEO Profile" class="profile-image">
                                <div>
                                    <h4 class="profile-name"><?= $about['profile_name'] ?></h4>
                                    <p class="profile-position"><?= $about['profile_position'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact-info d-flex align-items-center gap-2">
                                <i class="bi bi-telephone-fill"></i>
                                <div>
                                    <p class="contact-label"><?= $about['contact_label'] ?></p>
                                    <p class="contact-number"><?= $about['contact_number'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                <div class="image-wrapper">
                    <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                        <img src="Aaszo/<?= $about['image_main_path'] ?>" alt="Main Image"
                            class="img-fluid main-image rounded-4">
                        <img src="Aaszo/<?= $about['image_secondary_path'] ?>" alt="Secondary Image"
                            class="img-fluid small-image rounded-4">
                    </div>
                    <div class="experience-badge floating">
                        <h3><?= $about['experience_years'] ?>+ <span>Years</span></h3>
                        <p><?= $about['experience_text'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php
$left = mysqli_query($conn, "SELECT * FROM what_you_get WHERE position='left' ORDER BY id ASC");
$right = mysqli_query($conn, "SELECT * FROM what_you_get WHERE position='right' ORDER BY id ASC");
$image = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM what_you_get_image LIMIT 1"));

// Daftar ikon berdasarkan urutan total semua fitur (maks. 6 fitur)
$icons = [
    'bi bi-display',
    'bi bi-feather',
    'bi bi-eye',
    'bi bi-code-square',
    'bi bi-phone',
    'bi bi-browser-chrome'
];
?>

<!-- Features 2 Section -->
<section id="features" class="features-2 section">
    <div class="container section-title" data-aos="fade-up">
        <h2>What You Get?</h2>
        <p>Kami hadir memberikan berbagai keunggulan untuk solusi digital Anda.</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">

            <!-- Kiri -->
            <div class="col-lg-4">
                <?php $i = 0;
                $delay = 200;
                while ($row = mysqli_fetch_assoc($left)) : ?>
                    <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="<?= $delay ?>">
                        <div class="d-flex align-items-center justify-content-end gap-4">
                            <div class="feature-content">
                                <h3><?= $row['title'] ?></h3>
                                <p><?= $row['description'] ?></p>
                            </div>
                            <div class="feature-icon flex-shrink-0">
                                <i class="<?= $icons[$i] ?? 'bi bi-star' ?>"></i>
                            </div>
                        </div>
                    </div>
                <?php $delay += 100;
                    $i++;
                endwhile; ?>
            </div>

            <!-- Tengah (Gambar) -->
            <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="phone-mockup text-center">
                    <?php if ($image): ?>
                        <img src="Aaszo/<?= $image['image_path'] ?>" alt="Mockup Image" class="img-fluid">
                    <?php endif; ?>
                </div>
            </div>

            <!-- Kanan -->
            <div class="col-lg-4">
                <?php $delay = 200;
                while ($row = mysqli_fetch_assoc($right)) : ?>
                    <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="<?= $delay ?>">
                        <div class="d-flex align-items-center gap-4">
                            <div class="feature-icon flex-shrink-0">
                                <i class="<?= $icons[$i] ?? 'bi bi-star' ?>"></i>
                            </div>
                            <div class="feature-content">
                                <h3><?= $row['title'] ?></h3>
                                <p><?= $row['description'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php $delay += 100;
                    $i++;
                endwhile; ?>
            </div>

        </div>
    </div>
</section>


<!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row content justify-content-center align-items-center position-relative">
            <?php
            $visi_misi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM visi_misi LIMIT 1"));
            ?>

            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-4 mb-4"><?= $visi_misi['heading'] ?></h2>
                <p class="mb-4"><?= $visi_misi['description'] ?></p>
                <a href="<?= $visi_misi['button_link'] ?>" class="btn btn-cta"><?= $visi_misi['button_text'] ?></a>
            </div>


            <!-- Abstract Background Elements -->
            <div class="shape shape-1">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M47.1,-57.1C59.9,-45.6,68.5,-28.9,71.4,-10.9C74.2,7.1,71.3,26.3,61.5,41.1C51.7,55.9,35,66.2,16.9,69.2C-1.3,72.2,-21,67.8,-36.9,57.9C-52.8,48,-64.9,32.6,-69.1,15.1C-73.3,-2.4,-69.5,-22,-59.4,-37.1C-49.3,-52.2,-32.8,-62.9,-15.7,-64.9C1.5,-67,34.3,-68.5,47.1,-57.1Z"
                        transform="translate(100 100)"></path>
                </svg>
            </div>

            <div class="shape shape-2">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M41.3,-49.1C54.4,-39.3,66.6,-27.2,71.1,-12.1C75.6,3,72.4,20.9,63.3,34.4C54.2,47.9,39.2,56.9,23.2,62.3C7.1,67.7,-10,69.4,-24.8,64.1C-39.7,58.8,-52.3,46.5,-60.1,31.5C-67.9,16.4,-70.9,-1.4,-66.3,-16.6C-61.8,-31.8,-49.7,-44.3,-36.3,-54C-22.9,-63.7,-8.2,-70.6,3.6,-75.1C15.4,-79.6,28.2,-58.9,41.3,-49.1Z"
                        transform="translate(100 100)"></path>
                </svg>
            </div>

            <!-- Dot Pattern Groups -->
            <div class="dots dots-1">
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <pattern id="dot-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                    </pattern>
                    <rect width="100" height="100" fill="url(#dot-pattern)"></rect>
                </svg>
            </div>

            <div class="dots dots-2">
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <pattern id="dot-pattern-2" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                    </pattern>
                    <rect width="100" height="100" fill="url(#dot-pattern-2)"></rect>
                </svg>
            </div>

            <div class="shape shape-3">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M43.3,-57.1C57.4,-46.5,71.1,-32.6,75.3,-16.2C79.5,0.2,74.2,19.1,65.1,35.3C56,51.5,43.1,65,27.4,71.7C11.7,78.4,-6.8,78.3,-23.9,72.4C-41,66.5,-56.7,54.8,-65.4,39.2C-74.1,23.6,-75.8,4,-71.7,-13.2C-67.6,-30.4,-57.7,-45.2,-44.3,-56.1C-30.9,-67,-15.5,-74,0.7,-74.9C16.8,-75.8,33.7,-70.7,43.3,-57.1Z"
                        transform="translate(100 100)"></path>
                </svg>
            </div>
        </div>

    </div>

</section><!-- /Call To Action Section -->

<!-- Clients Section -->
<section id="clients" class="clients section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 2,
                            "spaceBetween": 40
                        },
                        "480": {
                            "slidesPerView": 3,
                            "spaceBetween": 60
                        },
                        "640": {
                            "slidesPerView": 4,
                            "spaceBetween": 80
                        },
                        "992": {
                            "slidesPerView": 6,
                            "spaceBetween": 120
                        }
                    }
                }
            </script>
            <div class="swiper-wrapper align-items-center mb-5">
                <?php
                $logos = mysqli_query($conn, "SELECT * FROM client_logos ORDER BY id ASC");
                while ($logo = mysqli_fetch_assoc($logos)) {
                ?>
                    <div class="swiper-slide">
                        <img src="Aaszo/<?= $logo['image_path'] ?>" class="img-fluid" alt="Client Logo">
                    </div>
                <?php } ?>
            </div>

            <div class="swiper-pagination"></div>
        </div>

    </div>

</section><!-- /Clients Section -->



<!-- Studi Kasus Section -->
<section id="case" class="services section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Studi Kasus</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->

    <?php
    $studi_kasus_query = mysqli_query($conn, "SELECT * FROM studi_kasus ORDER BY id DESC");
    ?>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4">
            <?php while ($row = mysqli_fetch_assoc($studi_kasus_query)) { ?>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card p-4 border rounded-4 shadow-sm bg-white">
                        <!-- Thumbnail -->
                        <div class="mb-3">
                            <img src="Aaszo/<?= $row['thumbnail_path'] ?>" alt="Thumbnail"
                                class="img-fluid rounded-4 w-100">
                        </div>

                        <!-- Judul -->
                        <h3 class="fw-bold mb-1"><?= $row['title'] ?></h3>

                        <!-- Tanggal -->
                        <small class="text-muted d-block mb-2"><?= $row['date_display'] ?></small>

                        <!-- Deskripsi -->
                        <p class="mb-3"><?= $row['description'] ?></p>

                        <!-- Button -->
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalStudi<?= $row['id'] ?>">
                            Read More <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalStudi<?= $row['id'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title fw-bold"><?= $row['modal_title'] ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Tutup"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-4 text-center">
                                        <img src="Aaszo/<?= $row['modal_image_path'] ?>" alt="Preview"
                                            class="img-fluid rounded-4 w-100">
                                    </div>
                                    <hr>
                                    <div class="row text-center mt-5">
                                        <div class="col-md-4 mb-4">
                                            <div class="mb-3">
                                                <i class="<?= $row['modal_icon_1'] ?> fa-3x text-primary"></i>
                                            </div>
                                            <h5 class="text-primary fw-bold">Pelaporan Publik Realtime</h5>
                                            <p class="mb-0"><?= $row['modal_description_1'] ?></p>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="mb-3">
                                                <i class="<?= $row['modal_icon_2'] ?> fa-3x text-primary"></i>
                                            </div>
                                            <h5 class="text-primary fw-bold">Efisiensi Informasi</h5>
                                            <p class="mb-0"><?= $row['modal_description_2'] ?></p>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div class="mb-3">
                                                <i class="<?= $row['modal_icon_3'] ?> fa-3x text-primary"></i>
                                            </div>
                                            <h5 class="text-primary fw-bold">Digitalisasi Internal</h5>
                                            <p class="mb-0"><?= $row['modal_description_3'] ?></p>
                                        </div>
                                    </div>
                                    <h6 class="text-center mt-5">
                                        Kunjungi <a href="<?= $row['modal_cta_link'] ?>"
                                            target="_blank"><?= $row['modal_cta_text'] ?></a>?
                                    </h6>
                                </div>
                                <div class="modal-footer border-0">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</section><!-- /Studi Kasus Section -->

<!-- Faq Section -->
<section class="faq-9 faq section light-background" id="faq">

    <div class="container">
        <div class="row">

            <div class="col-lg-5" data-aos="fade-up">
                <h2 class="faq-title">Punya Pertanyaan? Check out the FAQ</h2>
                <p class="faq-description">Maecenas tempus tellus eget condimentum rhoncus sem quam semper
                    libero sit amet adipiscing sem neque sed ipsum.</p>
                <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                    <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z"
                            fill="currentColor"></path>
                    </svg>
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
                <div class="faq-container">

                    <div class="faq-item faq-active">
                        <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                        <div class="faq-content">
                            <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus
                                laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor
                                rhoncus dolor purus non.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
                        <div class="faq-content">
                            <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                        <div class="faq-content">
                            <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                                Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl
                                suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis
                                convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                        <div class="faq-content">
                            <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                        <div class="faq-content">
                            <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse
                                in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                        <div class="faq-content">
                            <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed
                                in suscipit sequi. Distinctio ipsam dolore et.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                </div>
            </div>

        </div>
    </div>
</section><!-- /Faq Section -->

<!-- Call To Action 2 Section -->
<section id="call-to-action-2" class="call-to-action-2 section dark-background">

    <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-10">
                <div class="text-center">
                    <h3>Call To Action</h3>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                        officia deserunt mollit anim id est laborum.</p>
                    <a class="cta-btn" href="#">Call To Action</a>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Call To Action 2 Section -->


<?php
$team_query = mysqli_query($conn, "SELECT * FROM our_team ORDER BY id ASC");
?>

<!-- Our Team Section -->
<section id="our-team" class="our-team section py-5">
    <div class="container text-center">
        <h2 class="mb-5 fw-bold">Our Perfect Team</h2>
        <div class="row justify-content-center">
            <?php while ($row = mysqli_fetch_assoc($team_query)) { ?>
                <div class="col-md-4 col-sm-6 mb-5">
                    <div class="team-member">
                        <img src="Aaszo/<?= $row['image_path'] ?>" class="rounded-circle mb-3" width="150" height="150"
                            alt="<?= $row['name'] ?>" style="object-fit: cover;">
                        <h5 class="mb-0 fw-bold"><?= $row['name'] ?></h5>
                        <p class="text-danger small mb-1"><?= $row['role'] ?></p>
                        <p class="small text-muted"><?= $row['description'] ?></p>
                        <div>
                            <?php if ($row['facebook_link']) : ?>
                                <a href="<?= $row['facebook_link'] ?>" class="text-dark me-3" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                            <?php endif; ?>
                            <?php if ($row['twitter_link']) : ?>
                                <a href="<?= $row['twitter_link'] ?>" class="text-dark me-3" target="_blank"><i
                                        class="fab fa-twitter"></i></a>
                            <?php endif; ?>
                            <?php if ($row['instagram_link']) : ?>
                                <a href="<?= $row['instagram_link'] ?>" class="text-dark" target="_blank"><i
                                        class="fab fa-instagram"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>




<!-- Contact Section -->
<section id="contact" class="contact section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4 g-lg-5">
            <?php
            $contact_query = mysqli_query($conn, "SELECT * FROM contact_info LIMIT 1");
            $contact = mysqli_fetch_assoc($contact_query);
            ?>

            <div class="col-lg-5">
                <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                    <h3><?= $contact['section_title'] ?></h3>
                    <p><?= $contact['section_description'] ?></p>

                    <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="content">
                            <h4><?= $contact['location_title'] ?></h4>
                            <p><?= $contact['location_line1'] ?></p>
                            <p><?= $contact['location_line2'] ?></p>
                        </div>
                    </div>

                    <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="content">
                            <h4><?= $contact['phone_title'] ?></h4>
                            <p><?= $contact['phone_number1'] ?></p>
                            <p><?= $contact['phone_number2'] ?></p>
                        </div>
                    </div>

                    <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="content">
                            <h4><?= $contact['email_title'] ?></h4>
                            <p><?= $contact['email_address1'] ?></p>
                            <p><?= $contact['email_address2'] ?></p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-7">
                <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                    <h3>Get In Touch</h3>
                    <p>Tim kami siap menjawab semua pertanyaan Anda seputar layanan, kerja sama, atau konsultasi lebih
                        lanjut.</p>

                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email"
                                    required="">
                            </div>

                            <div class="col-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    required="">
                            </div>

                            <div class="col-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message"
                                    required=""></textarea>
                            </div>

                            <div class="col-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit" class="btn">Send Message</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>

</section><!-- /Contact Section -->