<footer class="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3>About <?= $title ?></h3>
            <p><?= $title ?> adalah skincare id</p>
          </div>

          <div class="col-md-3 ml-auto">
            <h3>Links</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="#"><i class="fab fa-instagram"></i> skincareID</a></li>
              <li><a href="#"><i class="fab fa-facebook-square"></i> skincareID</a></li>
              <li><a href="#"><i class="fab fa-youtube-square"></i> skincareID</a></li>
            </ul>
          </div>

          <div class="col-md-4">
            <h3>Subscribe</h3>
            <form action="<?= base_url('home/subcribe') ?>" method="post">
              <div class="d-flex mb-5">
                <input type="text" class="form-control rounded-0" name="email" placeholder="Email">
                <input type="submit" class="btn btn-primary rounded-0" value="Subscribe">
              </div>
            </form>
          </div>

        </div>

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <a href="<?= base_url('/') ?>"><?= $title  ?></a>
            </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  
    
  </div> <!-- .site-wrap -->

  <script src="<?= base_url('assets/frontend/') ?>js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>js/jquery-ui.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>js/popper.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>js/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>js/jquery.stellar.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>js/jquery.countdown.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>js/jquery.easing.1.3.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>js/aos.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>js/jquery.fancybox.min.js"></script>
  <script src="<?= base_url('assets/frontend/') ?>js/jquery.sticky.js"></script>

  
  <script src="<?= base_url('assets/frontend/') ?>js/main.js"></script>
    
  </body>
</html>