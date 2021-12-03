<?php if($this->session->flashdata('pesan')) { ?>
<p style="display: none;" id="pesan"><?= $this->session->flashdata('pesan')?></p>
<p style="display: none;" id="type"><?= $this->session->flashdata('type')?></p>
<p  style="display: none;" id="title"><?= $this->session->flashdata('title')?></p>
<?php }?>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 text-center">
            <a href="<?= base_url()?>" class="site-logo">
              <img src="<?= base_url()?>assets/home/images/rafi.png" alt="Image" class="img-fluid">
            </a>
          </div>
          <a href="#" class="mx-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
        </div>
      </div>
            
      <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          
          <div class="mx-auto">
            <nav class="site-navigation position-relative text-left" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none pl-0 d-lg-block border-none">
                <?php if($this->session->userdata('admin')){ ?>
                  <li><a href="<?= base_url()?>dashboard" class="nav-link text-left">Dashboard</a></li>
                <?php }else{?>
                <?php } ?>        
                <?php if (isset($active_home)) {?>
                <li class="active"><a href="<?= base_url()?>" class="nav-link  text-left" style="color: purple;" >Beranda</a></li>
                <?php }else{?>
                  <li class=""><a href="<?= base_url()?>" class="nav-link text-left">Beranda</a></li>
                <?php } ?>
                <?php if(isset($active_product)) { ?>
                <li class="active"><a href="<?= base_url()?>home/product" class="nav-link text-left" style="color: purple;" >Produk</a></li>
                <?php }else{?>
                  <li class=""><a href="<?= base_url()?>home/product" class="nav-link text-left">Produk</a></li>
                <?php }?>
                <?php if($this->session->userdata('username')!= null ) { ?> 
                <?php if(isset($active_riwayat)) { ?>
                  <li class="active"><a href="<?= base_url()?>home/riwayat" class="nav-link text-left" style="color: purple;">Riwayat Pengajuan</a></li>
                <?php }else{ ?>
                  <li><a href="<?= base_url()?>home/riwayat" class="nav-link text-left">Riwayat Pengajuan</a></li>
                <?php } ?>
                <?php if(isset($active_profile)) { ?>
                  <li class="active"><a href="<?= base_url()?>home/profile" class="nav-link text-left" style="color: purple;">Profile</a></li>
                <?php }else{ ?>
                  <li><a href="<?= base_url()?>home/profile" class="nav-link text-left">Profile</a></li>
                <?php } ?>
                <li><a href="<?= base_url()?>login/proseslogout" class="nav-link text-left">Logout</a></li>
                <?php }else{?>
                  <li><a href="<?= base_url()?>login" class="nav-link text-left">Login</a></li>
                <?php } ?>
              </ul>                                                                                                                                                                                                                                                                                         
            </nav>
          </div>
        </div>
      </div>
    </div>
    
    </div>
