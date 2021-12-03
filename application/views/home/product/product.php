<div class="site-section  pb-0">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-7 section-title text-center mb-5">
            <h2 class="d-block">Produk</h2>
            <hr>
          </div>
        </div>
            
        <div class="row">
        <?php foreach($data_mobil as $row) { ?>
            <div class="col-lg-4 mb-5 col-md-6" style="width: 379px;height:392px;">

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

