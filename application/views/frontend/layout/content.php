<div class="site-section section-2" id="work-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5">
            <h2 class="section-title">Katalog</h2>
            </div>
        </div>
    </div>
    <div class="owl-carousel nonloop-block-13">
        <?php foreach ($katalog as $k) { ?>
            <a class="work-thumb" href="images/about_1.jpg" data-fancybox="gallery">
                <div class="work-text">
                    <h3><?= $k['name'] ?></h3>
                    <span class="category"><?= $k['price'] ?></span>
                </div>
                <img src="<?= base_url('assets/upload/katalog/'.$k['image']) ?>" alt="Image" class="img-fluid">
            </a>
        <?php } ?> 
    </div>
</div>

<div class="site-section section-2" id="process-section" >
    <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5">
            <h2 class="section-title">Manfaat</h2>
          </div>
        </div>
        <div class="row">
            <?php foreach ($manfaat as $m) { ?>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="">
                    <div class="process p-3">
                        <div>
                            <h3><?= $m['title'] ?></h3>
                            <p><?= $m['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="site-section bg-light" id="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5">
                <h2 class="section-title">Testimonial</h2>
            </div>
        </div>
    </div>
    
    <div class="owl-carousel nonloop-block-14">
                
        <?php foreach ($testimonial as $t) { ?>
            <div class="service">
                <div>
                    <h3><?= $t['name'] ?></h3>
                    <img src="<?= base_url('assets/upload/testimonial/'.$t['image']) ?>" class="img-fluid">
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<div class="site-section" id="contact-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <h2 class="section-title mb-3">Hubungi kami</h2>
                <p class="mb-5">Silahkan isi form ini untuk kirim pesan</p>
            
                <form method="post" data-aos="fade" action="<?= base_url('home/contact_us') ?>">
                    <div class="form-group row">
                        <div class="col-md-6 mb-3 mb-lg-0">
                        <input type="text" class="form-control" name="firstname" placeholder="First name" value="<?= set_value('firstname') ?>">
                        <small class="text-danger"><?= form_error('firstname') ?></small>
                        </div>
                        <div class="col-md-6">
                        <input type="text" class="form-control" name="lastname" placeholder="Last name" value="<?= set_value('lastname') ?>">
                        <small class="text-danger"><?= form_error('lastname') ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                        <input type="text" class="form-control" name="subject" placeholder="Subject" value="<?= set_value('subject') ?>">
                        <small class="text-danger"><?= form_error('subject') ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?= set_value('email') ?>">
                        <small class="text-danger"><?= form_error('email') ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                        <textarea class="form-control" id="" cols="30" name="message" rows="10" placeholder="Write your message here."><?= set_value('email') ?></textarea>
                        <small class="text-danger"><?= form_error('message') ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                        
                        <input type="submit" class="btn btn-primary py-3 px-5 btn-block" value="Kirim Pesan">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<style>
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}
</style>

<?php  
$contact = $whatsapp['contact'];
$msg = $whatsapp['message'];
$msg = preg_replace('/\s+/', '%20', $msg);
$url = 'https://api.whatsapp.com/send?phone='.$contact.'&text='.$msg.'';
?>

<a href="<?= $url ?>" class="float" target="_blank">
<i class="fab fa-whatsapp my-float"></i>
</a>