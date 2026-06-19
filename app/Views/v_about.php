<?php
$hlm = "about";
if(uri_string()!=""){
  $hlm = ucwords(uri_string());
}
?>

<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- Hero Section for About -->
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url('<?= base_url('img/burjo_2.png') ?>');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">About Us</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="<?= base_url('/') ?>">Home</a></span> <span>About</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="ftco-about d-md-flex">
    <div class="one-half img" style="background-image: url('<?= base_url('img/burjo_1.png') ?>');"></div>
    <div class="one-half ftco-animate">
        <div class="overlap">
            <div class="heading-section ftco-animate">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Our Story</h2>
            </div>
            <div>
                <p>Vermata adalah website yang didedikasikan untuk menyediakan informasi dan layanan terbaik bagi pengguna kami. Kami percaya bahwa setiap orang berhak mendapatkan akses mudah ke berbagai kebutuhan digital.</p>
                <p>Didirikan pada tahun 2026, Vermata terus berkembang dan berkomitmen untuk memberikan pengalaman terbaik kepada semua pengguna.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimony Section -->
<section class="ftco-section img" id="ftco-testimony" style="background-image: url('<?= base_url('coffee1-1.0.0/images/bg_1.jpg') ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Testimony</span>
                <h2 class="mb-4">Customers Says</h2>
                <p>Apa kata pengguna kami tentang pengalaman menggunakan Vermata.</p>
            </div>
        </div>
    </div>
    <div class="container-wrap">
        <div class="row d-flex no-gutters">
            <div class="col-lg align-self-sm-end ftco-animate">
                <div class="testimony">
                    <blockquote>
                        <p>&ldquo;Pelayanan sangat memuaskan dan website mudah digunakan.&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="<?= base_url('coffee1-1.0.0/images/person_1.jpg') ?>" alt="">
                        </div>
                        <div class="name align-self-center">Budi Santoso <span class="position">Pelanggan</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg align-self-sm-end">
                <div class="testimony overlay">
                    <blockquote>
                        <p>&ldquo;Informasi lengkap dan respons cepat. Sangat direkomendasikan!&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="<?= base_url('coffee1-1.0.0/images/person_2.jpg') ?>" alt="">
                        </div>
                        <div class="name align-self-center">Ani Wijaya <span class="position">Pelanggan</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg align-self-sm-end ftco-animate">
                <div class="testimony">
                    <blockquote>
                        <p>&ldquo;Tampilan menarik dan fitur lengkap. Saya suka!&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="<?= base_url('coffee1-1.0.0/images/person_3.jpg') ?>" alt="">
                        </div>
                        <div class="name align-self-center">Citra Dewi <span class="position">Pelanggan</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Menu Preview Section -->
<section class="ftco-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 pr-md-5">
                <div class="heading-section text-md-right ftco-animate">
                    <span class="subheading">Discover</span>
                    <h2 class="mb-4">Our Menu</h2>
                    <p class="mb-4">Jelajahi berbagai pilihan menu menarik yang kami sediakan untuk Anda.</p>
                    <p><a href="<?= base_url('/menu') ?>" class="btn btn-primary btn-outline-primary px-4 py-3">View Full Menu</a></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="menu-entry">
                            <a href="#" class="img" style="background-image: url('<?= base_url('coffee1-1.0.0/images/menu-1.jpg') ?>');"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry mt-lg-4">
                            <a href="#" class="img" style="background-image: url('<?= base_url('coffee1-1.0.0/images/menu-2.jpg') ?>');"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry">
                            <a href="#" class="img" style="background-image: url('<?= base_url('coffee1-1.0.0/images/menu-3.jpg') ?>');"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry mt-lg-4">
                            <a href="#" class="img" style="background-image: url('<?= base_url('coffee1-1.0.0/images/menu-4.jpg') ?>');"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Counter Section -->
<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url('<?= base_url('coffee1-1.0.0/images/bg_2.jpg') ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="100">0</strong>
                                <span>Branches</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="85">0</strong>
                                <span>Number of Awards</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="10567">0</strong>
                                <span>Happy Customer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="900">0</strong>
                                <span>Staff</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>