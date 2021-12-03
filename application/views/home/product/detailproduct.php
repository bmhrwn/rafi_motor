<div class="site-section bg-primary py-5 page-title-wrap mt-5">
  <div class="container">
    <h1>Detail Mobil</h4>
  </div>
</div>

<div class="site-section mt-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="owl-carousel hero-slide owl-style">
          <img src="<?= base_url() ?>assets/admin/mobil/<?= $data_detail_mobil['foto_1'] ?>" alt="Image" class="img-fluid">
          <img src="<?= base_url() ?>assets/admin/mobil/<?= $data_detail_mobil['foto_2'] ?>" alt="Image" class="img-fluid">
          <img src="<?= base_url() ?>assets/admin/mobil/<?= $data_detail_mobil['foto_3'] ?>" alt="Image" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-5 ml-auto">
        <h1 class="text-primary"><?= $data_detail_mobil['nama_mobil'] ?></h1>
        <h4 style="color: black;">RP. <?= number_format($data_detail_mobil['harga_mobil'], 0, ",", ".") ?></h4>
        <hr>
        <p class="text-primary">Spesifikasi Ringkas</p>
        <div class="group mb-3">
          <div class="row" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
            <div class="col">
              <span style="float: left;"> <i class="fa fa-search"></i> Tipe Mobil</span>
            </div>
            <div class="col"><span style="float: right;"><?= $data_detail_mobil['tipe_mobil'] ?></span></div>
          </div>
          <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
            <div class="col">
              <span style="float: left;"> <i class="fa fa-car"></i> Merek</span>
            </div>
            <div class="col"><span style="float: right;"><?= $data_detail_mobil['nama_merk'] ?></span></div>
          </div>
          <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
            <div class="col">
              <span style="float: left;"> <i class="fa fa-car-side"></i> Model</span>
            </div>
            <div class="col"><span style="float: right;"><?= $data_detail_mobil['nama_type'] ?></span></div>
          </div>
        </div>
        <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
          <div class="col">
            <span style="float: left;"> <i class="fa fa-calendar"></i> Tahun</span>
          </div>
          <div class="col"><span style="float: right;"><?= $data_detail_mobil['tahun_mobil'] ?></span></div>
        </div>
        <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
          <div class="col">
            <span style="float: left;"> <i class="fa fa-cog"></i> Cakupan Mesin</span>
          </div>
          <div class="col"><span style="float: right;"><?= $data_detail_mobil['cakupan_mesin'] ?></span></div>
        </div>
        <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
          <div class="col">
            <span style="float: left;"> <i class="fa fa-tools"></i> Transmisi</span>
          </div>
          <div class="col"><span style="float: right;"><?= $data_detail_mobil['transmisi'] ?></span></div>
        </div>
        <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
          <div class="col">
            <span style="float: left;"> <i class="fa fa-gas-pump"></i> Bahan Bakar</span>
          </div>
          <div class="col"><span style="float: right;"><?= $data_detail_mobil['bahan_bakar'] ?></span></div>
        </div>
        <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
          <div class="col">
            <span style="float: left;"> <i class="fa fa-chair"></i> Penumpang</span>
          </div>
          <div class="col"><span style="float: right;"><?= $data_detail_mobil['penumpang'] ?></span></div>
        </div>
        <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
          <div class="col">
            <span style="float: left;"> <i class="fa fa-tachometer-alt"></i> Kilometer</span>
          </div>
          <div class="col"><span style="float: right;"><?= $data_detail_mobil['kilometer'] ?></span></div>
        </div>
        <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
          <div class="col">
            <span style="float: left;"> <i class="fa fa-palette"></i> Warna</span>
          </div>
          <div class="col"><span style="float: right;"><?= $data_detail_mobil['warna'] ?></span></div>
        </div>
        <center>
          <p class="mt-3"><a href="<?= base_url() ?>home/pengajuan/<?= $data_detail_mobil['id_mobil'] ?>" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Ajukan</a></p>
        </center>
      </div>
    </div>
    <hr>
    <div class="content mt-5">
      <center><h3 class="text-primary">-- Produk Terkait --</h3></center>
      <div class="row">
        <?php foreach($data_terkait as $row){ ?>
          <div class="col-lg-4 mb-5 col-md-6 mt-3" style="width: 379px;height:392px;">

                <div class="wine_v_1 text-center pb-4">
                    <a href="<?= base_url()?>home/detailproduct/<?= $row['id_mobil']?>" class="thumbnail d-block mb-4"><img style="width: 500px;height:250px;" src="<?= base_url() ?>assets/admin/mobil/<?= $row['foto_1'] ?>" alt="Image" class="img-fluid"></a>
                    <div>
                        <h3 class="heading mb-1 font-weight-bold"><a href="#"><?= $row['nama_mobil']?></a></h3>
                        <span style="font-size: 14px;"><?= $row['tahun_mobil']?> | <?= $row['kilometer']?> | <?= $row['transmisi']?></span><br>
                        <span class="price text-primary font-weight-bold">RP. <?= number_format($row['harga_mobil'], 0, ",", ".") ?></span>
                    </div>


                    <div class="wine-actions">

                        <h3 class="heading-2"><a href="#"><?= $row['nama_mobil']?></a></h3>
                          <span style="font-size: 14px;"><?= $row['tahun_mobil']?> | <?= $row['kilometer']?> | <?= $row['transmisi']?></span><br>
                        <span class="price d-block">RP. <?= number_format($row['harga_mobil'], 0, ",", ".") ?></span>

                        <a href="<?= base_url()?>home/pengajuan/<?= $row['id_mobil']?>" class="btn add"> Ajukan</a>
                    </div>
                </div>
            </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
