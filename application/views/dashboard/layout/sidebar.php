<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>dashboard">
        <div class="sidebar-brand-icon">
          <i class="fas fa-car"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Rafi Motor</div>
      </a>
      <hr class="sidebar-divider">
      <!-- Divider -->
      <div class="sidebar-heading">
        Halaman Utama
      </div>
      <!-- Nav Item - Dashboard -->
      <?php if (isset($active_dashboard)) { ?>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url() ?>dashboard">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
          <hr class="sidebar-divider">
        </li>
      <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url() ?>dashboard">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
          <hr class="sidebar-divider">
        </li>
      <?php } ?>

      <div class="sidebar-heading">
        DATA
      </div>

      <?php if ($this->session->userdata('admin')) { ?>

        <!-- Nav Item - Pages Collapse Menu -->
        <?php if (isset($active_type) || isset($active_mobil) || isset($active_merk)) { ?>
          <li class="nav-item active">
          <?php } else { ?>
          <li class="nav-item ">
          <?php } ?>
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-car"></i>
            <span>Data Mobil</span>
          </a>


          <?php if (isset($active_type) || isset($active_mobil) || isset($active_merk)) { ?>
            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <?php } else { ?>
              <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <?php } ?>

              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Mobil:</h6>
                <?php if (isset($active_type)) { ?>
                  <a class="collapse-item active" href="<?= base_url() ?>dashboard/datatype">Data Type</a>
                <?php } else { ?>
                  <a class="collapse-item" href="<?= base_url() ?>dashboard/datatype">Data Type</a>
                <?php } ?>
                <?php if (isset($active_merk)) { ?>
                  <a class="collapse-item active" href="<?= base_url() ?>dashboard/datamerk">Data Merk</a>
                <?php } else { ?>
                  <a class="collapse-item" href="<?= base_url() ?>dashboard/datamerk">Data Merk</a>
                <?php } ?>
                <?php if (isset($active_mobil)) { ?>
                  <a class="collapse-item active" href="<?= base_url() ?>dashboard/datamobil">Data Mobil</a>
                <?php } else { ?>
                  <a class="collapse-item" href="<?= base_url() ?>dashboard/datamobil">Data Mobil</a>
                <?php } ?>
              </div>
              </div>
          </li>
        <?php } else { ?>
          <?php if (isset($active_mobil)) { ?>
            <li class="nav-item active">

              <a class="nav-link" href="<?= base_url() ?>dashboard/datamobil">
                <i class="fas fa-fw fa-folder"></i>
                <span>Data Mobil</span></a>
            </li>
          <?php } else { ?>
            <li class="nav-item">

              <a class="nav-link" href="<?= base_url() ?>dashboard/datamobil">
                <i class="fas fa-fw fa-folder"></i>
                <span>Data Mobil</span></a>
            </li>
          <?php } ?>
            
          <?php if (isset($active_laporan)) { ?>
          <li class="nav-item active">

            <a class="nav-link" href="<?= base_url() ?>dashboard/datalaporan">
              <i class="fas fa-fw fa-folder"></i>
              <span>Data Laporan</span></a>
          </li>
          <?php }else{?>
            <li class="nav-item">

        <a class="nav-link" href="<?= base_url() ?>dashboard/datalaporan">
        <i class="fas fa-fw fa-folder"></i>
          <span>Data Laporan</span></a>
            </li>
          <?php }?>
        <?php } ?>

        <hr class="sidebar-divider">
        <!-- Heading -->
        <?php if ($this->session->userdata('admin')) { ?>
          <div class="sidebar-heading">
            Proses Kredit
          </div>

          <!-- Nav Item - Pages Collapse Menu -->
          <!-- Nav Item - Charts -->
          <?php if (isset($active_kriteria)) { ?>

            <li class="nav-item active">

              <a class="nav-link" href="<?= base_url() ?>dashboard/datakriteria">
                <i class="fas fa-fw fa-folder"></i>
                <span>Kriteria Kredit</span></a>
            </li>

          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>dashboard/datakriteria">
                <i class="fas fa-fw fa-folder"></i>
                <span>Kriteria Kredit</span></a>
            </li>

          <?php } ?>
          <?php if (isset($active_pengajuan)) { ?>
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url() ?>dashboard/datakonfirmasi">
                <i class="fas fa-fw fa-folder"></i>
                <span>Konfirmasi Dokumen</span></a>
            </li>

          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>dashboard/datakonfirmasi">
                <i class="fas fa-fw fa-folder"></i>
                <span>Konfirmasi Dokumen</span></a>
            </li>

          <?php } ?>
          <?php if (isset($active_perhitungan)) { ?>
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url() ?>dashboard/datapenilaian">
                <i class="fas fa-fw fa-folder"></i>
                <span>Perhitungan Kredit</span></a>
            </li>

          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>dashboard/datapenilaian">
                <i class="fas fa-fw fa-folder"></i>
                <span>Perhitungan Kredit</span></a>
            </li>

          <?php } ?>
          <?php if (isset($active_menyetujui)) { ?>
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url() ?>dashboard/datamenyetujui">
                <i class="fas fa-fw fa-folder"></i>
                <span>Approve Kredit</span></a>
            </li>

          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>dashboard/datamenyetujui">
                <i class="fas fa-fw fa-folder"></i>
                <span>Approve Kredit</span></a>
            </li>

          <?php } ?>
          <?php if (isset($active_laporan)) { ?>
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url() ?>dashboard/datalaporan">
                <i class="fas fa-fw fa-folder"></i>
                <span>Laporan Kredit</span></a>
            </li>
            <hr class="sidebar-divider my-0">
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>dashboard/datalaporan">
                <i class="fas fa-fw fa-folder"></i>
                <span>Laporan Kredit</span></a>
            </li>
            <hr class="sidebar-divider my-0">
          <?php } ?>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">
        <?php } ?>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>

    <!-- End of Sidebar -->