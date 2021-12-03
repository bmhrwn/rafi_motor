<div class="footer">
      <div class="container">
        
        <div class="row">
          <div class="col-12 text-center">
            <div class="social-icons">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-youtube"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="copyright">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                   &copy;<script>document.write(new Date().getFullYear());</script> Rafi Motor | Kredit Mobil <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://google.com" target="_blank" >bmhrwn</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    

  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>

  <script src="<?= base_url()?>assets/home/js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url()?>assets/home/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?= base_url()?>assets/home/js/jquery-ui.js"></script>
  <script src="<?= base_url()?>assets/home/js/popper.min.js"></script>
  <script src="<?= base_url()?>assets/home/js/bootstrap.min.js"></script>
  <script src="<?= base_url()?>assets/home/js/owl.carousel.min.js"></script>
  <script src="<?= base_url()?>assets/home/js/jquery.stellar.min.js"></script>
  <script src="<?= base_url()?>assets/home/js/jquery.countdown.min.js"></script>
  <script src="<?= base_url()?>assets/home/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url()?>assets/home/js/jquery.easing.1.3.js"></script>
  <script src="<?= base_url()?>assets/home/js/aos.js"></script>
  <script src="<?= base_url()?>assets/home/js/jquery.fancybox.min.js"></script>
  <script src="<?= base_url()?>assets/home/js/jquery.sticky.js"></script>
  <script src="<?= base_url()?>assets/home/js/jquery.mb.YTPlayer.min.js"></script>
  <script src="<?= base_url() ?>assets/alert.js"></script>
 <script>
   pesan = document.getElementById('pesan');
   if (pesan != null) {
     swal({
       title: document.getElementById('title').innerHTML,
       text: pesan.innerHTML,
       icon: document.getElementById('type').innerHTML,
     });
   }
 </script>
 <script>
   $(function() {
     $('[data-toggle="tooltip"]').tooltip()
   })
 </script>
  <script src="<?= base_url()?>assets/home/js/main.js"></script>
  <script src="<?= base_url() ?>assets/pengajuan.js"></script>
  <script src="<?= base_url() ?>assets/admin/type.js"></script>
 <script src="<?= base_url() ?>assets/admin/merk.js"></script>
 <script src="<?= base_url() ?>assets/admin/mobil.js"></script>
 <script src="<?= base_url() ?>assets/admin/js/input-file.js"></script>
 <script>
   $(function() {
     bsCustomFileInput.init();
   });
 </script>
</body>

</html>