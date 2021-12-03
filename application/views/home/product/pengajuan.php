<div class="site-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12">

      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-5 mb-md-0">
        <h2 class="h3 mb-3 text-black font-heading-serif">Data Kredit</h2>
        <div class="p-3 p-lg-5 border">
          <form action="<?= base_url() ?>pengajuan/inputpengajuan/<?= $data_mobil['id_mobil'] ?>" method="post" enctype="multipart/form-data">

            <ul style="border:1px solid #eee; border-radius:0px;" class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Data Diri</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-pengajuan-tab" data-toggle="pill" href="#pills-pengajuan" role="tab" aria-controls="pills-pengajuan" aria-selected="false">Data Pengajuan</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-bukti-tab" data-toggle="pill" href="#pills-bukti" role="tab" aria-controls="pills-bukti" aria-selected="false">Upload Bukti</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_companyname" class="text-black">No KTP<span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" value="<?= $data_users['nik'] ?>" placeholder="Nomor Induk Kependudukan" name="nik">
                  </div>
                </div>
                <div class="form-group">
                  <label for="c_country" class="text-black">Foto KTP<span class="text-danger">*</span></label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="foto_ktp" class="custom-file-input" id="exampleInputFile">
                      <?php if ($data_users['foto_ktp'] == null) { ?>
                        <label id="foto_ktp" class="custom-file-label" for="exampleInputFile">Choose file</label>
                      <?php } else { ?>
                        <label id="foto_ktp" class="custom-file-label" for="exampleInputFile"><?= $data_users['foto_ktp'] ?></label>
                      <?php } ?>
                    </div>
                    <div class="input-group-append">
                      <span style="background: blue;color:white;" class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_companyname" class="text-black">Nama Lengkap<span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" value="<?= $data_users['full_name'] ?>" placeholder="Nama Lengkap" name="full_name">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_companyname" class="text-black">Email<span class="text-danger">*</span> </label>
                    <input type="text" class="form-control" value="<?= $data_users['email'] ?>" placeholder="Email" name="email" autocomplete="off">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_address" class="text-black">Alamat<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="alamat" placeholder="Alamat" autocomplete="off"><?= $data_users['alamat'] ?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_companyname" class="text-black">No Handphone<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="<?= $data_users['hp'] ?>" placeholder="No Handphone" name="hp" autocomplete="off">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_companyname" class="text-black">Tanggal Lahir<span class="text-danger">*</span></label>
                    <input type="date" onChange="getAge()" class="form-control" value="<?= $data_users['tanggal_lahir'] ?>" placeholder="Tanggal Lahir" id="tgl_lahir" name="tanggal_lahir" autocomplete="off">
                  </div>
                </div>

                <span id="notifUsia" hidden="true" style="color:red;">Mohon maaf, anda tidak dapat mengajukan kredit, karena usia anda tidak sesuai kriteria kami !</span>
                <hr>
                <label for="">Kontak Darurat</label>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_companyname" class="text-black">No Telephone 1<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="<?= $data_users['phone_1'] ?>" placeholder="No Telephone 1" name="phone_1" autocomplete="off">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_companyname" class="text-black">No Telephone 2<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="<?= $data_users['phone_2'] ?>" placeholder="No Telephone 2" name="phone_2" autocomplete="off">
                  </div>
                </div>
                <hr>
                <label for="">Data Pekerjaan</label>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_companyname" class="text-black">Alamat Pekerjaan<span class="text-danger">*</span></label>
                    <textarea type="text" class="form-control" placeholder="Alamat Pekerjaan" name="alamat_kantor" autocomplete="off"><?= $data_users['alamat_kantor'] ?> </textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_companyname" class="text-black">No Telephone Pekerjaan<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="<?= $data_users['no_kantor'] ?>" placeholder="No Telphone Pekerjaan" name="no_kantor" autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                    <li class="nav-item" role="presentation">
                      <a onClick="changeActivePengajuan()" class="nav-link btn btn-primary" id="pills-pengajuan-tab" data-toggle="pill" href="#pills-pengajuan" role="tab" aria-controls="pills-pengajuan" aria-selected="false">Selanjutnya</a>
                    </li>
                  </ul>
                </div>

              </div>
              <div class="tab-pane fade" id="pills-pengajuan" role="tabpanel" aria-labelledby="pills-pengajuan-tab">

                <div class="form-group">
                  <label for="c_country" class="text-black">Besar Gaji<span class="text-danger">*</span></label>
                  <input id="nilai_gaji" placeholder="Masukkan Besar Gaji" autocomplete="off" oninput="nilaiGaji()" type="text" class="form-control mb-3" name="gaji_awal">
                  <select  disabled class="form-control" id="select_gaji">
                    <?php if ($data_riwayat != null) { ?>
                      <option value="<?= $data_riwayat['nilai_gaji'] ?>"><?= $data_riwayat['gaji'] ?></option>
                      <option value="">--Pilih Gaji--</option>
                      <?php foreach ($data_gaji as $gaji) { ?>
                        <option value="<?= $gaji['id_sub_kriteria'] ?>"><?= $gaji['sub_kriteria'] ?></option>
                      <?php } ?>
                    <?php } else { ?>
                      <option value="">--Pilih Gaji--</option>
                      <?php foreach ($data_gaji as $gaji) { ?>
                        <option value="<?= $gaji['id_sub_kriteria'] ?>"><?= $gaji['sub_kriteria'] ?></option>
                      <?php } ?>
                    <?php } ?>
                  </select>
                  <input type="hidden" name="gaji" id="gaji">
                </div>

                <div class="form-group">
                  <label for="c_country" class="text-black">Status Kepemilikan Rumah<span class="text-danger">*</span></label>
                  <select name="status" class="form-control">
                    <?php if ($data_riwayat != null) { ?>
                      <option value="<?= $data_riwayat['nilai_status'] ?>"><?= $data_riwayat['status1'] ?></option>
                      <option value="">--Pilih Status Kepemilikan Rumah--</option>
                      <?php foreach ($data_rumah as $rumah) { ?>
                        <option value="<?= $rumah['id_sub_kriteria'] ?>"><?= $rumah['sub_kriteria'] ?></option>
                      <?php } ?>
                    <?php } else { ?>
                      <option value="">--Pilih Status Kepemilikan Rumah--</option>
                      <?php foreach ($data_rumah as $rumah) { ?>
                        <option value="<?= $rumah['id_sub_kriteria'] ?>"><?= $rumah['sub_kriteria'] ?></option>
                      <?php } ?>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="c_country" class="text-black">Status Perkawinan<span class="text-danger">*</span></label>
                  <select onChange="changeTanggungan()" name="status_pernikahan" id="status_pernikahan" class="form-control">
                    <option value="">--Pilih Status Perkawinan--</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Menikah">Menikah</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="c_country" class="text-black">Jumlah Tangungan<span class="text-danger">*</span></label>
                  <select name="tanggungan" id="tanggungan" class="form-control">
                    <?php if ($data_riwayat != null) { ?>
                      <option value="<?= $data_riwayat['nilai_tanggungan'] ?>"><?= $data_riwayat['tanggungan'] ?></option>
                      <option value="">--Pilih Jumlah Tangungan--</option>
                      <?php foreach ($data_tanggungan as $tanggungan) { ?>
                        <option value="<?= $tanggungan['id_sub_kriteria'] ?>"><?= $tanggungan['sub_kriteria'] ?></option>
                      <?php } ?>
                    <?php } else { ?>
                      <option value="">--Pilih Jumlah Tangungan--</option>
                      <?php foreach ($data_tanggungan as $tanggungan) { ?>
                        <option value="<?= $tanggungan['id_sub_kriteria'] ?>"><?= $tanggungan['sub_kriteria'] ?></option>
                      <?php } ?>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="c_country" class="text-black">Jumlah DP<span class="text-danger">*</span></label>
                      <select name="dp" onChange="hitungDp('<?= base_url() ?>','<?= $data_mobil['harga_mobil'] ?>')" id="dp" class="form-control">
                        <option value="">--Pilih Jumlah DP--</option>
                        <?php foreach ($data_kreditke as $kredit) { ?>
                          <option value="<?= $kredit['id_sub_kriteria'] ?>"><?= $kredit['sub_kriteria'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="c_country" class="text-black">Tenor</label>
                      <select name="jangka_waktu" id="tenor" onChange="hitungDp('<?= base_url() ?>','<?= $data_mobil['harga_mobil'] ?>')" class="form-control">
                        <option value="">--Pilih Tenor--</option>
                        <?php foreach ($data_jangka as $jangka) { ?>
                          <option value="<?= $jangka['id_sub_kriteria'] ?>"><?= $jangka['sub_kriteria'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <span style="color: red;">Setiap tenor sudah termasuk biaya adminsitrasi dan pajak<span class="text-danger">*</span></span>
                  </div>

                </div>
                <input type="hidden" name="harga_dp" id="harga_dp">
                <input type="hidden" name="cicilan" id="cicilan">

                <div class="form-row">
                  <div class="col-md-6 mb-3">
                    <input type="text" id="hargaDpSee" placeholder="DP (IDR)" readonly class="form-control">
                  </div>
                  <div class="col-md-6 mb-3">
                    <input type="text" id="cicilanSee" readonly placeholder="Cicilan (IDR)" class="form-control">
                  </div>
                </div>


                <div class="form-group">
                  <label for="c_country" class="text-black">Usia<span class="text-danger">*</span></label>
                  <select name="usia" disabled id="selectUsia" class="form-control">
                    <?php if ($data_riwayat != null) { ?>
                      <option value="<?= $data_riwayat['nilai_usia'] ?>"><?= $data_riwayat['usia'] ?></option>
                      <option value="">--Pilih Usia--</option>
                      <?php foreach ($data_usia as $usia) { ?>
                        <option value="<?= $usia['id_sub_kriteria'] ?>"><?= $usia['sub_kriteria'] ?></option>
                      <?php } ?>
                    <?php } else { ?>
                      <option value="">--Pilih Usia--</option>
                      <?php foreach ($data_usia as $usia) { ?>
                        <option value="<?= $usia['id_sub_kriteria'] ?>"><?= $usia['sub_kriteria'] ?></option>
                      <?php } ?>
                    <?php } ?>
                  </select>

                  <select name="usia" hidden="true" id="selectUsiaForm" class="form-control">
                    <?php if ($data_riwayat != null) { ?>
                      <option value="<?= $data_riwayat['nilai_usia'] ?>"><?= $data_riwayat['usia'] ?></option>
                      <option value="">--Pilih Usia--</option>
                      <?php foreach ($data_usia as $usia) { ?>
                        <option value="<?= $usia['id_sub_kriteria'] ?>"><?= $usia['sub_kriteria'] ?></option>
                      <?php } ?>
                    <?php } else { ?>
                      <option value="">--Pilih Usia--</option>
                      <?php foreach ($data_usia as $usia) { ?>
                        <option value="<?= $usia['id_sub_kriteria'] ?>"><?= $usia['sub_kriteria'] ?></option>
                      <?php } ?>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                    <li class="nav-item" role="presentation">
                      <a onClick="changeActiveBukti()" class="nav-link btn btn-primary" id="pills-bukti-tab" data-toggle="pill" href="#pills-bukti" role="tab" aria-controls="pills-bukti" aria-selected="false">Selanjutnya</a>
                    </li>
                  </ul>
                </div>



              </div>
              <div class="tab-pane fade" id="pills-bukti" role="tabpanel" aria-labelledby="pills-bukti-tab">
                <div class="form-group">


                  <div class="form-group">
                    <label for="c_country" class="text-black">Bukti Slip Gaji<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto_gaji" class="custom-file-input" id="exampleInputFile">
                        <label id="foto_gaji" class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span style="background: blue;color:white;" class="input-group-text">Upload</span>
                      </div>

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="c_country" class="text-black">Bukti Status Kepemilikan Rumah</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto_status" class="custom-file-input" id="exampleInputFile">
                        <label id="foto_status" class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span style="background: blue;color:white;" class="input-group-text">Upload</span>
                      </div>
                    </div>
                    <span style="color: red;">Kosongkan jika tidak memiliki rumah sendiri <span class="text-danger">*</span></span>
                  </div>

                  <hr>
                  <label for="">Bukti lain-lain</label>

                  <div class="form-group">
                    <label for="c_country" class="text-black">Foto KK<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto_tanggungan" class="custom-file-input" id="exampleInputFile">
                        <label id="foto_tanggungan" class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span style="background: blue;color:white;" class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="c_country" class="text-black">Foto NPWP<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto_npwp" class="custom-file-input" id="exampleInputFile">
                        <label id="foto_npwp" class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span style="background: blue;color:white;" class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="c_country" class="text-black">Foto Buku Tabungan<span class="text-danger">*</span></label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto_buku_tabungan" class="custom-file-input" id="exampleInputFile">
                        <label id="foto_buku_tabungan" class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span style="background: blue;color:white;" class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <br>
                  <button class="btn btn-primary btn-lg btn-block" type="submit">Ajukan</button>
                </div>
              </div>
            </div>


          </form>

        </div>
      </div>
      <div class="col-md-6">

        <div class="row mb-5">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black font-heading-serif">Detail Mobil</h2>
            <div class="p-3 p-lg-5 border">
              <table class="table site-block-order-table">
                <thead>
                  <th>Nama Mobil</th>
                  <th>Harga</th>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $data_mobil['nama_mobil'] ?><strong class="mx-2"></td>
                    <td>RP. <?= number_format($data_mobil['harga_mobil'], 0, ",", ".") ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <p class="text-primary">Spesifikasi Ringkas</p>
              <div class="group mb-3">
                <div class="row" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
                  <div class="col">
                    <span style="float: left;"> <i class="fa fa-search"></i> Tipe Mobil</span>
                  </div>
                  <div class="col"><span style="float: right;"><?= $data_mobil['tipe_mobil'] ?></span></div>
                </div>
                <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
                  <div class="col">
                    <span style="float: left;"> <i class="fa fa-car"></i> Merek</span>
                  </div>
                  <div class="col"><span style="float: right;"><?= $data_mobil['nama_merk'] ?></span></div>
                </div>
                <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
                  <div class="col">
                    <span style="float: left;"> <i class="fa fa-car-side"></i> Model</span>
                  </div>
                  <div class="col"><span style="float: right;"><?= $data_mobil['nama_type'] ?></span></div>
                </div>
              </div>
              <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
                <div class="col">
                  <span style="float: left;"> <i class="fa fa-calendar"></i> Tahun</span>
                </div>
                <div class="col"><span style="float: right;"><?= $data_mobil['tahun_mobil'] ?></span></div>
              </div>
              <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
                <div class="col">
                  <span style="float: left;"> <i class="fa fa-cog"></i> Cakupan Mesin</span>
                </div>
                <div class="col"><span style="float: right;"><?= $data_mobil['cakupan_mesin'] ?></span></div>
              </div>
              <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
                <div class="col">
                  <span style="float: left;"> <i class="fa fa-tools"></i> Transmisi</span>
                </div>
                <div class="col"><span style="float: right;"><?= $data_mobil['transmisi'] ?></span></div>
              </div>
              <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
                <div class="col">
                  <span style="float: left;"> <i class="fa fa-gas-pump"></i> Bahan Bakar</span>
                </div>
                <div class="col"><span style="float: right;"><?= $data_mobil['bahan_bakar'] ?></span></div>
              </div>
              <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
                <div class="col">
                  <span style="float: left;"> <i class="fa fa-chair"></i> Penumpang</span>
                </div>
                <div class="col"><span style="float: right;"><?= $data_mobil['penumpang'] ?></span></div>
              </div>
              <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
                <div class="col">
                  <span style="float: left;"> <i class="fa fa-tachometer-alt"></i> Kilometer</span>
                </div>
                <div class="col"><span style="float: right;"><?= $data_mobil['kilometer'] ?></span></div>
              </div>
              <div class="row mt-2" style="border-bottom: 1px solid #eee; padding-bottom:12px;">
                <div class="col">
                  <span style="float: left;"> <i class="fa fa-palette"></i> Warna</span>
                </div>
                <div class="col"><span style="float: right;"><?= $data_mobil['warna'] ?></span></div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- </form> -->
  </div>
</div>

<script>
  function changeTanggungan() {
    var statusPernikahan = document.getElementById("status_pernikahan").value;
    if (statusPernikahan == "Belum Menikah") {
      document.getElementById("tanggungan").value = 29;
      document.getElementById("tanggungan").disabled = true;
    } else {
      document.getElementById("tanggungan").value = "";
      document.getElementById("tanggungan").disabled = false;
    }
  }

  function nilaiGaji() {
    var gaji = document.getElementById("nilai_gaji").value;
    if (gaji < 4000000) {
      document.getElementById("select_gaji").value = 8;
      document.getElementById("gaji").value = 8;
    } else if (gaji > 4000000 && gaji < 6000000) {
      document.getElementById("select_gaji").value = 10;
      document.getElementById("gaji").value = 10;
    } else if (gaji > 6000000 && gaji < 8000000) {
      document.getElementById("select_gaji").value = 11;
      document.getElementById("gaji").value = 11;
    } else if (gaji > 8000000) {
      document.getElementById("select_gaji").value = 12;
      document.getElementById("gaji").value = 12;

    }
  }
</script>