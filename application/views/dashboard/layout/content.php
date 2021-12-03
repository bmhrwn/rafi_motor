  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
     
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) Card Example -->
      <a href="<?= base_url()?>dashboard/datamobil">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Mobil</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_mobil ?></div>
              </div>
             
              <div class="col-auto">
                <i class="fas fa-car fa-2x text-gray-300"></i>
              </div>
            </div>
            </a>
          </div>
        </div>
      </div>
    
      <!-- Earnings (Monthly) Card Example -->
      <a href="<?= base_url()?>dashboard/datapenilaian">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Customer Layak</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_layak?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
            </a>
          </div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <a href="<?= base_url()?>dashboard/datapenilaian">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Customer Tidak Layak</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_tidak_layak?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users-slash fa-2x text-gray-300"></i>
              </div>
            </div>
            </a>
          </div>
        </div>
      </div>
    

      <!-- Pending Requests Card Example -->
      <?php if ($this->session->userdata('admin')) { ?>
      <a href="<?= base_url()?>dashboard/datapengajuan">
      <?php }else{ ?>
        <a href="<?= base_url()?>dashboard">
        <?php }?>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Pengajuan</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_pengajuan?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-table fa-2x text-gray-300"></i>
              </div>
            </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Content Row -->

    <div class="row">

      <!-- Area Chart -->
     \

      <!-- Pie Chart -->
    

    <!-- Content Row -->
    <div class="row">

      <!-- Content Column -->
      <div class="col-lg-6 mb-4">


        <div class="col-lg-6 mb-4">


        </div>
      </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->