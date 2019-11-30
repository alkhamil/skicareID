<div class="intro-section" id="home-section">
    <div class="container">
    <div class="row align-items-center">
        <div class="col-lg-4 mr-auto" data-aos="fade-up">
        <h1><?= $title ?></h1>
        <p class="mb-5"><?= $banner['description'] ?></p>
        <p><a href="#work-section" class="btn btn-outline-light py-3 px-5">Get Started</a></p>

        </div>
        <div class="col-lg-2 ml-auto"  data-aos="fade-up" data-aos-delay="100">
        <figure class="img-absolute">
            <img src="<?= base_url('assets/upload/banner/'.$banner['banner']) ?>" alt="Image" class="img-fluid">
        </figure>
        </div>
    </div>
    </div>
</div>