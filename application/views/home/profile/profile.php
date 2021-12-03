<div class="site-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="">

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-5 mb-md-0">
        <h2 class="h3 mb-3 text-black font-heading-serif">Profile Saya</h2>
        <div class="p-3 p-lg-5 border">

          <form action="<?= base_url() ?>users/updateProfileUsers" method="post" enctype="multipart/form-data">

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_companyname" class="text-black">Username<span class="text-danger">*</span> </label>
                <input type="text" class="form-control" value="<?= $data_users['username'] ?>" placeholder="Username" name="username" readonly>
              </div>
            </div>
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
                        <?php if($data_users['foto_ktp'] == null){ ?>
                        <label id="foto_ktp" class="custom-file-label" for="exampleInputFile">Choose file</label>
                        <?php }else{ ?>
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
                <input type="text" class="form-control" value="<?= $data_users['full_name'] ?>" placeholder="Nama Lengkap" name="full_name" autocomplete="off">
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
                <label for="c_companyname" class="text-black">No Handphone<span class="text-danger">*</span> </label>
                <input type="text" class="form-control" value="<?= $data_users['hp'] ?>" placeholder="No Handphone" name="hp" autocomplete="off">
              </div>
            </div>
            <div class="form-group">
              <label for="c_country" class="text-black">Jenis Kelamin<span class="text-danger">*</span></label>
              <select name="jenis_kelamin" class="form-control">
                <?php if ($data_users['jenis_kelamin'] != null) { ?>
                  <option value="<?= $data_users['jenis_kelamin'] ?>"><?= $data_users['jenis_kelamin'] ?></option>
                <?php } else { ?>
                  <option value="">--Pilih Jenis Kelamin--</option>
                <?php } ?>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Wanita">Wanita</option>
              </select>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_companyname" class="text-black">Alamat<span class="text-danger">*</span> </label>
                <textarea type="text" class="form-control" placeholder="Alamat" name="alamat"><?= $data_users['alamat'] ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_companyname" class="text-black">Tanggal Lahir<span class="text-danger">*</span> </label>
                <input type="date" class="form-control" value="<?= $data_users['tanggal_lahir'] ?>" placeholder="Tanggal Lahir" name="tanggal_lahir">
              </div>
            </div>
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
            <br>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" onclick="window.location='thankyou.html'">Ubah</button>
            </div>

        </div>
      </div>
      <div class="col-md-6">

        <div class="row mb-5">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black font-heading-serif">Foto</h2>
            <div class="p-3 p-lg-5 border">

              <div class="form-group row">
                <div class="col-md-12">
                  <center>
                  <?php if ($data_users['foto'] != null) { ?>
                      <img style="width: 200px;height:200px;border-radius:50%;" src="<?= base_url() ?>assets/admin/users/<?= $data_users['foto'] ?>" alt="asd">
                    <?php } else { ?>
                      <img style="width: 250px;height:200px;" src="<?= base_url() ?>assets/admin/users/blankuser.png" alt="asd">
                    <?php } ?>
                    <input class="mt-3" style="border: 2px solid #ddd;border-radius:10px;padding:5px;" type="file" name="foto">
                    </center>

                    </form>
                </div>
              </div>

            </div>
          </div>
        </div>



      </div>
    </div>
    <!-- </form> -->
  </div>
</div>