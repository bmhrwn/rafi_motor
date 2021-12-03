<div class="site-section  pb-0">
  <div class="container">
    <div class="row mb-5 justify-content-center">
      <div class="col-7 section-title text-center mb-5">
        <h2 class="d-block">Riwayat Pengajuan</h2>
        <hr>
      </div>
    </div>

    <div class="row mb-5">
      <form class="col-md-12" method="post">
        <div class="site-blocks-table">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="product-thumbnail" style="width: 150px;">Nama Lengkap</th>
                <th class="product-thumbnail" style="width: 50px;">Tanggal Pengajuan</th>
                <th class="product-name" style="width: 150px;">Nama Mobil</th>
                <th class="product-price" style="width: 50px;">Status Dokumen</th>
                <th class="product-price" style="width: 50px;">Status Kelayakan</th>
                <th class="product-remove" style="width: 225px;">Action</th>

              </tr>
            </thead>


            <tbody>
              <?php if ($data_riwayat != null) { ?>
                <?php $i = 1;
                foreach ($data_riwayat as $row) { ?>
                  <tr>
                    <td><?= $row['full_name'] ?></td>
                    <td><?= date_format(date_create($row['tanggal_pengajuan']), 'd F Y') ?></td>
                    <td class="product-name">
                      <h2 class="h5 cart-product-title text-black"><?= $row['nama_mobil'] ?></h2>
                    </td>
                    <td>
                      <?php if ($row['status'] == 0) { ?>
                        <span class="btn btn-outline-dark">Belum Di Periksa</span>
                      <?php } else if ($row['status'] == 1) { ?>
                        <span class="btn btn-outline-success">Lolos Administrasi</span>
                      <?php } else if ($row['status'] == 2) { ?>
                        <span class="btn btn-outline-danger">Tidak Lolos Adminstrasi</span>
                      <?php } ?>
                    </td>

                    <td><?php if ($row['status_pengajuan'] == 0) { ?>
                        <span class="btn btn-outline-dark">Menunggu Proses</span>
                      <?php } else if ($row['status_pengajuan'] == 1) { ?>
                        <span class="btn btn-outline-danger">Tidak Layak</span>
                      <?php } else if ($row['status_pengajuan'] == 2) { ?>
                        <span class="btn btn-outline-dark">Menunggu Di Proses</span>
                      <?php } else if ($row['status_pengajuan'] == 3) { ?>
                        <span class="btn btn-outline-danger">Tidak Layak</span>
                      <?php } else if ($row['status_pengajuan'] == 4) { ?>
                        <span class="btn btn-outline-success">Layak</span>
                      <?php } ?>
                    </td>

                    <td>
                    <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Detail Pengajuan">
                        <button onClick="detailPengajuan('<?= base_url() ?>','<?= $row['nik'] ?>','<?= $row['nilai_usia'] ?>','<?= $row['foto_ktp'] ?>','<?= $row['tanggal_lahir'] ?>','<?= $row['phone_1'] ?>','<?= $row['phone_2'] ?>','<?= $row['nilai_gaji'] ?>','<?= $row['foto_gaji'] ?>','<?= $row['nilai_tanggungan'] ?>','<?= $row['foto_tanggungan'] ?>','<?= $row['nilai_status'] ?>','<?= $row['foto_status'] ?>','<?= $row['nilai_jangka'] ?>','<?= $row['harga_dp'] ?>','<?= $row['foto_npwp'] ?>','<?= $row['foto_buku_tabungan'] ?>','<?= $row['id_penilaian'] ?>','<?= $row['check_ktp'] ?>','<?= $row['check_tgllahir'] ?>','<?= $row['check_usia'] ?>','<?= $row['check_phone1'] ?>','<?= $row['check_phone2'] ?>','<?= $row['check_gaji'] ?>','<?= $row['check_tanggungan'] ?>','<?= $row['check_statusrumah'] ?>','<?= $row['check_npwp'] ?>','<?= $row['check_tabungan'] ?>','<?= $row['cicilan'] ?>','<?= $row['status_pernikahan'] ?>','<?= $row['check_pernikahan'] ?>','<?= $row['alamat_kantor'] ?>','<?= $row['no_kantor'] ?>','<?= $row['check_alamatkantor'] ?>','<?= $row['check_nokantor'] ?>','<?= $row['gaji_awal'] ?>','<?= $row['gaji_akhir'] ?>','<?= $row['nilai_kreditke'] ?>')" data-toggle="modal" data-target="#modaldetailpengajuan" type="button" class="btn btn-primary btn-circle btn-icon">
                          <i class="fa fa-info-circle"></i></button>
                      </span>
                      <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Detail Mobil">
                        <button onClick="detailmobil('<?= base_url() ?>assets/admin/mobil/<?= $row['foto_1'] ?>','<?= $row['nama_mobil'] ?>','<?= $row['nama_type'] ?>','<?= $row['nama_merk'] ?>','<?= $row['tipe_mobil'] ?>','<?= $row['tahun_mobil'] ?>','RP. <?= number_format($row['harga_mobil'], 0, ",", ".") ?>','<?= $row['cakupan_mesin'] ?>','<?= $row['transmisi'] ?>','<?= $row['penumpang'] ?>','<?= $row['kilometer'] ?>','<?= $row['bahan_bakar'] ?>','<?= $row['warna'] ?>')" data-toggle="modal" data-target="#modal_detail" type="button" class="btn btn-dark btn-circle btn-icon">
                          <i class="fa fa-car"></i></button>
                      </span>
                      <?php if ($row['status'] == 0) { ?>
                        <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Batal Pengajuan">
                          <button onClick="batalPengajuan('<?= base_url() ?>pengajuan/batalpengajuan/<?= $row['id_penilaian'] ?>')" data-toggle="modal" data-target="#modalBatal" type="button" class="btn btn-danger btn-rounded btn-icon">
                            <i class="fa fa-window-close"></i></button>
                        </span>
                      <?php } ?>
                    </td>

                  </tr>
                <?php } ?>
              <?php } ?>
            </tbody>

          </table>
        </div>
      </form>
    </div>

  </div>
</div>

<div class="modal fade" id="modalBatal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title">Form Batal Pengajuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Anda yakin ingin membatalkan pengajuan tersebut ?
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
        <a style="color:#FFF;" id="batal_pengajuan" class="btn btn-info">Batalkan Pengajuan</a>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="modaldetailpengajuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_title">Form Detail Pengajuan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="form" method="post">
            <div class="container-fluid">
              <div class="card mb-4">
                <div class="card-header">
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Data Diri</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Data Pengajuan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Bukti Lainnya</a>
                    </li>
                  </ul>
                  <span style="color: red;">Keterangan : Jika data tanpa ceklis maka data tersebut tidak sesuai dengan bukti</span>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="pills-tabContent">
                    <!-- TAB PERTAMA DETAIL -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">No KTP</label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="ktp1" aria-label="Text input with checkbox">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" disabled id="check_ktp1" aria-label="Checkbox for following text input">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="tanggal_lahir1" aria-label="Text input with checkbox">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" id="check_tanggal1" disabled aria-label="Checkbox for following text input">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Usia</label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="usia1" aria-label="Text input with checkbox">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" id="check_usia1" disabled aria-label="Checkbox for following text input">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Status Perkawinan</label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="status_pernikahan1" aria-label="Text input with checkbox">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" id="check_pernikahan1" disabled aria-label="Checkbox for following text input">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <a target="_blank" id="foto_ktp1" href="">Klik untuk lihat bukti KTP</a>
                        </div>
                      </div>
                      <hr>
                      <h6>Kontak Darurat</h6>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No Telepon 1</label>
                        <div class="col-sm-9">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="phone_11" aria-label="Text input with checkbox">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input readonly type="checkbox" disabled id="check_phone11" aria-label="Checkbox for following text input">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No Telepon 2</label>
                        <div class="col-sm-9">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="phone_21" aria-label="Text input with checkbox">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input readonly type="checkbox" disabled id="check_phone21" aria-label="Checkbox for following text input">
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                      <hr>
                      <h6>Data Pekerjaan</h6>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Alamat Pekerjaan</label>
                        <div class="col-sm-9">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="alamat_kantor1" aria-label="Text input with checkbox">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input readonly type="checkbox" disabled id="check_alamatkantor1" aria-label="Checkbox for following text input">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">No Telephone Pekerjaan</label>
                        <div class="col-sm-9">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="no_kantor1" aria-label="Text input with checkbox">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input readonly type="checkbox" disabled id="check_nokantor1" aria-label="Checkbox for following text input">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                          <a target="_blank" id="foto_gaji1" href="">Klik untuk lihat bukti pekerjaan</a>
                        </div>

                      </div>
                    </div>

                    <!-- TAB KEDUA DETAIL -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Gaji Awal</label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="nilai_gaji" aria-label="Text input with checkbox">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row" id="form_gajiakhir">
                        <label for="" class="col-sm-2 col-form-label">Sisa Gaji</label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="gaji_akhir" aria-label="Text input with checkbox">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="besar_gaji1" aria-label="Text input with checkbox">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input readonly type="checkbox" disabled id="check_gaji1" aria-label="Checkbox for following text input">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <a target="_blank" id="foto_gaji1" href="">Klik untuk lihat slip gaji</a>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Tanggungan</label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="tanggungan1" aria-label="Text input with checkbox">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" disabled id="check_tanggungan1" aria-label="Checkbox for following text input">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <a target="_blank" id="foto_kk1" href="">Klik untuk lihat Kartu Keluarga</a>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Kepemilikan Rumah</label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="status_rumah1" aria-label="Text input with checkbox">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" disabled id="check_statusrumah1" aria-label="Checkbox for following text input">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <a target="_blank" id="foto_status1" href="">Klik untuk lihat Bukti Status Kepemlikan Rumah</a>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Tenor</label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="tenor1" aria-label="Text input with checkbox">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Jumlah DP</label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="dp1" aria-label="Text input with checkbox">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Cicilan</label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="cicilan1" aria-label="Text input with checkbox">
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- TAB KETIGA DETAIL -->
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">NPWP</label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <a class="mr-auto mt-2" id="foto_npwp1" target="_blank" href="">Klik untuk lihat Bukti NPWP</a>
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" disabled id="check_npwp1" aria-label="Checkbox for following text input">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Buku Tabungan</label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <a class="mr-auto mt-2" target="_blank" id="foto_buku1" href="">Klik untuk lihat Bukti Buku Tabungan</a>
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <input type="checkbox" disabled id="check_tabungan1" aria-label="Checkbox for following text input">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Jumlah Kredit</label>
                        <div class="col-sm-10">
                          <div class="input-group mb-3">
                            <input readonly type="text" class="form-control" id="kredit_ke1" aria-label="Text input with checkbox">
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
    </div>
  </div>


<div class="modal fade" id="modal_detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="max-width: 1000px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <!-- profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <p>Foto</p>
                      <hr>
                      <img class="profile-user-img img-fluid img-circle" id="foto" src="" alt="User profile picture">

                    </div>
                    <hr>
                    <br>
                  </div>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Data Mobil</a></li>
                      <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Spesifikasi Ringkas</a></li>

                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="active tab-pane" id="activity">
                        <div class="form-group row height-detail">
                          <label for="inputName" class="col-sm-3 col-form-label">Nama Mobil:</label>
                          <div class="col-sm-9">
                            <label for="inputname" id="name_mobil" class="col-sm-5 col-form-label"></label>
                          </div>
                        </div>
                        <div class="form-group row height-detail">
                          <label for="inputName" class="col-sm-3 col-form-label">Type:</label>
                          <div class="col-sm-9">
                            <label for="inputname" id="type_1" class="col-sm-5 col-form-label"></label>
                          </div>
                        </div>
                        <div class="form-group row height-detail">
                          <label for="inputName" class="col-sm-3 col-form-label">Merk:</label>
                          <div class="col-sm-9">
                            <label for="inputname" id="merk_1" class="col-sm-5 col-form-label"></label>
                          </div>
                        </div>
                        <div class="form-group row height-detail">
                          <label for="inputName" class="col-sm-3 col-form-label">Harga:</label>
                          <div class="col-sm-9">
                            <label for="inputname" id="harga_1" class="col-sm-5 col-form-label"></label>
                          </div>
                        </div>
                      </div>
                      <!-- /.tab-pane -->
                      <div class="tab-pane" id="timeline">
                        <div class="card-body">
                          <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                              <div class="form-group row height-detail">
                                <label for="inputName" class="col-sm-5 col-form-label">Tipe Mobil:</label>
                                <div class="col-sm-6">
                                  <label for="inputname" id="tipe_mobil1" class="col-sm-5 col-form-label"></label>
                                </div>
                              </div>
                              <div class="form-group row height-detail">
                                <label for="inputName" class="col-sm-5 col-form-label">Tahun:</label>
                                <div class="col-sm-6">
                                  <label for="inputname" id="tahun_1" class="col-sm-5 col-form-label"></label>
                                </div>
                              </div>
                              <div class="form-group row height-detail">
                                <label for="inputName" class="col-sm-5 col-form-label">Cakupan Mesin:</label>
                                <div class="col-sm-6">
                                  <label for="inputname" id="cakupan_1" class="col-sm-5 col-form-label"></label>
                                </div>
                              </div>
                              <div class="form-group row height-detail">
                                <label for="inputName" class="col-sm-5 col-form-label">Transmisi:</label>
                                <div class="col-sm-6">
                                  <label for="inputname" id="transmisi_1" class="col-sm-5 col-form-label"></label>
                                </div>
                              </div>
                              <div class="form-group row height-detail">
                                <label for="inputName" class="col-sm-5 col-form-label">Penumpang:</label>
                                <div class="col-sm-6">
                                  <label for="inputname" id="penumpang_1" class="col-sm-5 col-form-label"></label>
                                </div>
                              </div>
                              <div class="form-group row height-detail">
                                <label for="inputName" class="col-sm-5 col-form-label">Kilometer:</label>
                                <div class="col-sm-7">
                                  <label for="inputname" id="kilometer_1" class="col-sm-6 col-form-label"></label>
                                </div>
                              </div>
                              <div class="form-group row height-detail">
                                <label for="inputName" class="col-sm-5 col-form-label">Bahan Bakar:</label>
                                <div class="col-sm-6">
                                  <label for="inputname" id="bahan_1" class="col-sm-5 col-form-label"></label>
                                </div>
                              </div>
                              <div class="form-group row height-detail">
                                <label for="inputName" class="col-sm-5 col-form-label">Warna:</label>
                                <div class="col-sm-6">
                                  <label for="inputname" id="warna_1" class="col-sm-5 col-form-label"></label>
                                </div>
                              </div>
                            </div>


                          </div>

                          <div class="timeline timeline-inverse">

                          </div>
                        </div>
                      </div>
        </section>
        <br>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>