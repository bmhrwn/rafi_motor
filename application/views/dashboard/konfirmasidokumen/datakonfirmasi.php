  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Konfirmasi Dokumen</h1>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Konfirmasi Dokumen</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>
                  <center>No</center>
                </th>
                <th>
                  <center>Nama Lengkap</center>
                </th>
                <th>
                  <center>Status Dokumen</center>
                </th>



                <th>
                  <center>Action</center>
                </th>
              </tr>
            </thead>
            <tfoot>
              <th>
                <center>No</center>
              </th>
              <th>
                <center>Nama Lengkap</center>
              </th>
              <th>
                <center>Status Dokumen</center>
              </th>

              <th>
                <center>Action</center>
              </th>
              </tr>
            </tfoot>
            <tbody>
              <?php $i = 1;
              foreach ($data_penilaian as $row) { ?>
                <tr>
                  <td>
                    <center><?= $i++; ?></center>
                  </td>
                  <td>
                    <center><?= $row['full_name'] ?></center>
                  </td>
                  <td>
                    <center>
                      <?php if ($row['status'] == 0) { ?>
                        <span class="btn btn-outline-dark">Belum diperiksa</span>
                      <?php } else if ($row['status'] == 1) { ?>
                        <span class="btn btn-outline-success">Lolos Administrasi</span>
                      <?php } else if ($row['status'] == 2) { ?>
                        <span class="btn btn-outline-danger">Tidak Lolos Administrasi</span>
                      <?php } ?>
                    </center>
                  </td>

                  <td>
                    <center>

                    <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Detail Pengajuan">
                        <button onClick="detailPengajuan('<?= base_url() ?>','<?= $row['nik'] ?>','<?= $row['nilai_usia'] ?>','<?= $row['foto_ktp'] ?>','<?= $row['tanggal_lahir'] ?>','<?= $row['phone_1'] ?>','<?= $row['phone_2'] ?>','<?= $row['nilai_gaji'] ?>','<?= $row['foto_gaji'] ?>','<?= $row['nilai_tanggungan'] ?>','<?= $row['foto_tanggungan'] ?>','<?= $row['nilai_status'] ?>','<?= $row['foto_status'] ?>','<?= $row['nilai_jangka'] ?>','<?= $row['harga_dp'] ?>','<?= $row['foto_npwp'] ?>','<?= $row['foto_buku_tabungan'] ?>','<?= $row['id_penilaian'] ?>','<?= $row['check_ktp'] ?>','<?= $row['check_tgllahir'] ?>','<?= $row['check_usia'] ?>','<?= $row['check_phone1'] ?>','<?= $row['check_phone2'] ?>','<?= $row['check_gaji'] ?>','<?= $row['check_tanggungan'] ?>','<?= $row['check_statusrumah'] ?>','<?= $row['check_npwp'] ?>','<?= $row['check_tabungan'] ?>','<?= $row['cicilan'] ?>','<?= $row['status_pernikahan'] ?>','<?= $row['check_pernikahan'] ?>','<?= $row['alamat_kantor'] ?>','<?= $row['no_kantor'] ?>','<?= $row['check_alamatkantor'] ?>','<?= $row['check_nokantor'] ?>','<?= $row['gaji_awal'] ?>','<?= $row['gaji_akhir'] ?>','<?= $row['nilai_kreditke'] ?>')" data-toggle="modal" data-target="#modaldetailpengajuan" type="button" class="btn btn-primary btn-circle btn-icon">
                          <i class="fa fa-info-circle"></i></button>
                      </span>
                      <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Detail Customer">
                        <button onClick="readDetailUserss('<?= $row['id_users'] ?>','<?= $row['full_name'] ?>','<?= $row['email'] ?>','<?= $row['alamat'] ?>','<?= $row['hp'] ?>','<?= $row['jenis_kelamin'] ?>','<?= $row['tanggal_lahir'] ?>','<?= base_url() ?>')" data-toggle="modal" data-target="#modalUsersDetail" type="button" class="btn btn-warning btn-circle btn-icon">
                          <i class="fa fa-user"></i></button>
                      </span>
                      <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Detail Mobil">
                        <button onClick="detailmobil('<?= base_url() ?>assets/admin/mobil/<?= $row['foto_1'] ?>','<?= $row['nama_mobil'] ?>','<?= $row['nama_type'] ?>','<?= $row['nama_merk'] ?>','<?= $row['tipe_mobil'] ?>','<?= $row['tahun_mobil'] ?>','RP. <?= number_format($row['harga_mobil'], 0, ",", ".") ?>','<?= $row['cakupan_mesin'] ?>','<?= $row['transmisi'] ?>','<?= $row['penumpang'] ?>','<?= $row['kilometer'] ?>','<?= $row['bahan_bakar'] ?>','<?= $row['warna'] ?>')" data-toggle="modal" data-target="#modal_detail" type="button" class="btn btn-dark btn-circle btn-icon">
                          <i class="fa fa-car"></i></button>
                      </span>
                      <?php if ($row['status'] == 0) { ?>
                        <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Konfirmasi Data">
                          <button onClick="confirmPengajuan('<?= base_url() ?>','<?= $row['nik'] ?>','<?= $row['nilai_usia'] ?>','<?= $row['foto_ktp'] ?>','<?= $row['tanggal_lahir'] ?>','<?= $row['phone_1'] ?>','<?= $row['phone_2'] ?>','<?= $row['nilai_gaji'] ?>','<?= $row['foto_gaji'] ?>','<?= $row['nilai_tanggungan'] ?>','<?= $row['foto_tanggungan'] ?>','<?= $row['nilai_status'] ?>','<?= $row['foto_status'] ?>','<?= $row['nilai_jangka'] ?>','<?= $row['harga_dp'] ?>','<?= $row['foto_npwp'] ?>','<?= $row['foto_buku_tabungan'] ?>','<?= $row['id_penilaian'] ?>','<?= $row['status_pernikahan'] ?>','<?= $row['alamat_kantor'] ?>','<?= $row['no_kantor'] ?>','<?= $row['cicilan'] ?>','<?= $row['gaji_awal'] ?>')" data-toggle="modal" data-target="#modaltambah" type="button" class="btn btn-success btn-circle btn-icon">
                            <i class="fa fa-check"></i></button>
                        </span>
                      <?php } ?>
                    </center>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>






    <!-- Modal -->
    <div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal_title">Konfirmasi Data Dokumen</h5>
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
                        <a class="nav-link active" id="pills-data-diri-tab" data-toggle="pill" href="#pills-data-diri" role="tab" aria-controls="pills-data-diri" aria-selected="true">Data Diri</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-pengajuan-tab" data-toggle="pill" href="#pills-pengajuan" role="tab" aria-controls="pills-pengajuan" aria-selected="false">Data Pengajuan</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-dll-tab" data-toggle="pill" href="#pills-dll" role="tab" aria-controls="pills-dll" aria-selected="false">Bukti Lainnya</a>
                      </li>
                    </ul>
                    <span style="color: blue;">Keterangan : Verifikasi dilakukan apabila data tersebut benar</span>

                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        
                      <!-- TAB PERTAMA -->
                      <div class="tab-pane fade show active" id="pills-data-diri" role="tabpanel" aria-labelledby="pills-data-diri-tab">
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">No KTP</label>
                          <div class="col-sm-10">
                            <div class="input-group mb-3">
                              <input readonly type="text" class="form-control" id="ktp" aria-label="Text input with checkbox">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox" name="check_ktp" aria-label="Checkbox for following text input">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-10">
                            <div class="input-group mb-3">
                              <input readonly type="text" class="form-control" id="tanggal_lahir" aria-label="Text input with checkbox">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox" name="check_tanggal" aria-label="Checkbox for following text input">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Usia</label>
                          <div class="col-sm-10">
                            <div class="input-group mb-3">
                              <input readonly type="text" class="form-control" id="usia" aria-label="Text input with checkbox">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox" name="check_usia" aria-label="Checkbox for following text input">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Status Perkawinan</label>
                          <div class="col-sm-10">
                            <div class="input-group mb-3">
                              <input readonly type="text" class="form-control" id="status_pernikahan" aria-label="Text input with checkbox">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox" name="check_pernikahan" aria-label="Checkbox for following text input">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label"></label>
                          <div class="col-sm-10">
                            <a target="_blank" id="foto_ktp" href="">Klik untuk lihat bukti KTP</a>
                          </div>
                        </div>
                        <hr>
                        <h6>Kontak Darurat</h6>
                        <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label">No Telepon 1</label>
                          <div class="col-sm-9">
                            <div class="input-group mb-3">
                              <input readonly type="text" class="form-control" id="phone_1" aria-label="Text input with checkbox">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input readonly type="checkbox" name="check_phone1" aria-label="Checkbox for following text input">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label">No Telepon 2</label>
                          <div class="col-sm-9">
                            <div class="input-group mb-3">
                              <input readonly type="text" class="form-control" id="phone_2" aria-label="Text input with checkbox">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input readonly type="checkbox" name="check_phone2" aria-label="Checkbox for following text input">
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
                              <input readonly type="text" class="form-control" id="alamat_kantor" aria-label="Text input with checkbox">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input readonly type="checkbox" name="check_alamatkantor" aria-label="Checkbox for following text input">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label">No Telephone Pekerjaan</label>
                          <div class="col-sm-9">
                            <div class="input-group mb-3">
                              <input readonly type="text" class="form-control" id="no_kantor" aria-label="Text input with checkbox">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input readonly type="checkbox" name="check_nokantor" aria-label="Checkbox for following text input">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-3"></div>
                          <div class="col-sm-9">
                            <a target="_blank" id="foto_gaji" href="">Klik untuk lihat bukti pekerjaan</a>
                          </div>

                        </div>
                      </div>

                      <!-- TAB KEDUA -->
                      <div class="tab-pane fade" id="pills-pengajuan" role="tabpanel" aria-labelledby="pills-pengajuan-tab">
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Gaji Awal</label>
                          <div class="col-sm-10">
                            <div class="input-group mb-3">
                              <input readonly type="text" class="form-control" id="nilai_gaji2" aria-label="Text input with checkbox">
                            </div>
                          </div>
                        </div>
                        <input type="hidden" id="gaji_perhitungan">
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label"></label>
                          <div class="col-sm-10">
                            <div class="input-group mb-3">
                              <input readonly type="text" class="form-control" id="besar_gaji" aria-label="Text input with checkbox">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input readonly type="checkbox" name="check_gaji" aria-label="Checkbox for following text input">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label"></label>
                          <div class="col-sm-10">
                            <a target="_blank" id="foto_gaji" href="">Klik untuk lihat slip gaji</a>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Tanggungan</label>
                          <div class="col-sm-10">
                            <div class="input-group mb-3">
                              <input readonly type="text" class="form-control" id="tanggungan" aria-label="Text input with checkbox">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox" name="check_tanggungan" aria-label="Checkbox for following text input">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label"></label>
                          <div class="col-sm-10">
                            <a target="_blank" id="foto_kk" href="">Klik untuk lihat Kartu Keluarga</a>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Kepemilikan Rumah</label>
                          <div class="col-sm-10">
                            <div class="input-group mb-3">
                              <input readonly type="text" class="form-control" id="status_rumah" aria-label="Text input with checkbox">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox" name="check_statusrumah" aria-label="Checkbox for following text input">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label"></label>
                          <div class="col-sm-10">
                            <a target="_blank" id="foto_status" href="">Klik untuk lihat Bukti Status Kepemlikan Rumah</a>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Tenor</label>
                          <div class="col-sm-10">
                            <div class="input-group mb-3">
                              <input readonly type="text" class="form-control" id="tenor" aria-label="Text input with checkbox">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Jumlah DP</label>
                          <div class="col-sm-10">
                            <div class="input-group mb-3">
                              <input readonly type="text" class="form-control" id="dp" aria-label="Text input with checkbox">
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Cicilan</label>
                          <div class="col-sm-10">
                            <div class="input-group mb-3">
                              <input readonly type="text" class="form-control" id="cicilan" aria-label="Text input with checkbox">
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- TAB KETIGA -->
                      <div class="tab-pane fade" id="pills-dll" role="tabpanel" aria-labelledby="pills-dll-tab">
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">NPWP</label>
                          <div class="col-sm-10">
                            <div class="input-group mb-3">
                              <a class="mr-auto mt-2" id="foto_npwp" target="_blank" href="">Klik untuk lihat Bukti NPWP</a>
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox" name="check_npwp" aria-label="Checkbox for following text input">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Buku Tabungan</label>
                          <div class="col-sm-10">
                            <div class="input-group mb-3">
                              <a class="mr-auto mt-2" target="_blank" id="foto_buku" href="">Klik untuk lihat Bukti Buku Tabungan</a>
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <input type="checkbox" name="check_tabungan" aria-label="Checkbox for following text input">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                          <label for="" class="col-sm-2 col-form-label">Jumlah Kredit</label>
                          <div class="col-sm-10">
                            <select required onChange="showButton()" type="text" id="kredit_ke" name="kredit_ke" class="form-control mt-2">
                              <option value="">-- Pilih Jumlah Kredit -- </option>
                              <?php foreach ($kredit as $row) { ?>
                                <option value="<?= $row['id_sub_kriteria'] ?>"><?= $row['sub_kriteria'] ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row " style="margin-top: -20px;">
                          <div class="col-sm-2"></div>
                          <div class="col-sm-10">
                            <button type="button" onClick="showForm()" class="btn btn-outline-primary" id="btn_kredit" hidden="true">Proses</button>
                          </div>
                        </div>

                        <div class="group" id="group">
                            
                        </div>
                        <div class="group" id="groupGaji">
                            
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Konfirmasi Pengajuan</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_title">Form Delete Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Anda yakin ingin menghapus data tersebut ?
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a id="buttondelete" class="btn btn-primary">Delete Data</a>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="modal fade" id="modalPengajuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_title">Form Detail Pengajuan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>

                <th>Besar Gaji</th>
                <th>Status Kepemilikan Rumah</th>
                <th>Tanggungan Anak</th>
                <th>Jangka Waktu</th>
                <th>DP</th>
                <th>Usia</th>
              </tr>
              <tr>

                <td id="gaji"></td>
                <td id="status"></td>
                <td id="tanggungan_table"></td>
                <td id="jangka_waktu"></td>
                <td id="kredit"></td>
                <td id="usia_table"></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="modal fade" id="modalUsersDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_title">Form Detail Customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <tr>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No Handphone</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>

              </tr>
              <tr>
                <td id="nama"></td>
                <td id="email"></td>
                <td id="alamat"></td>
                <td id="hp"></td>
                <td id="jenis_kelamin"></td>
                <td id="tanggal_lahirrr"></td>

              </tr>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal_detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
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
                  <!-- Profile Image -->
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

  <script>
    function showButton() {
      var kredit = document.getElementById("kredit_ke").value;
      if (kredit == "44") {
        document.getElementById("btn_kredit").hidden = true;
        $("#group div").remove();
        $("#groupGaji div").remove();
      } else {
        document.getElementById("btn_kredit").hidden = false;

      }
    }

    function showForm() {
      $("#group div").remove();
      
      var jumlahKredit = document.getElementById("kredit_ke");
      var text = jumlahKredit.options[jumlahKredit.selectedIndex].text;
      var jumlah = 1;
      var nominal = 1;
      var placeholder = 1;
      var id_nominal = 1;
      for(var i = 0; i < text; i++){
        var formGroup = document.createElement('div');
        formGroup.setAttribute('class','form-group row');
        var colFirst = document.createElement('label');
        colFirst.setAttribute('class','col-sm-2 col-form-label')
        colFirst.innerHTML = 'Nominal Kredit ' + jumlah++;
        var colSecond = document.createElement("div");
        colSecond.setAttribute('class','col-sm-10')
        // var input = "<input type='text' class='form-control' name='sisa_" + i +"'>";
        var input = document.createElement('input');
        input.setAttribute('class','form-control mt-2');
        input.setAttribute('name','nominal_'+ nominal++);
        input.setAttribute('type','text');
        input.setAttribute('id','nominal_'+ id_nominal++);
        input.setAttribute('placeholder','Input Nominal Kredit ' + placeholder++);
        input.setAttribute('autocomplete','off');
        colSecond.appendChild(input);
        formGroup.appendChild(colFirst);
        formGroup.appendChild(colSecond);
        $("#group").append(formGroup);
      }
      
      var button = document.createElement('button');
      var formButton = document.createElement('div');
      formButton.setAttribute('class','form-group row');

      var colFirstButton = document.createElement('div');
      colFirstButton.setAttribute('class','col-sm-2');

      var colSecondButton = document.createElement('div');
      colSecondButton.setAttribute('class','col-sm-10');
      
      button.setAttribute('class','btn btn-outline-primary');
      button.setAttribute('onClick','hitungSisaGaji('+text+')');
      button.setAttribute('type','button');
      button.innerHTML = "Hitung Sisa Gaji";

      colSecondButton.appendChild(button);
      formButton.appendChild(colFirstButton);
      formButton.appendChild(colSecondButton);


      $("#group").append(formButton);
    }

    function hitungSisaGaji(jumlahTanggungan){
      $("#groupGaji div").remove();
      var k = 1;
      var totalTanggungan = 0;
      for(var j = 0; j < jumlahTanggungan; j++){
        var nominal = document.getElementById("nominal_"+ k++).value;
        var array = [];
        array.push(nominal);
        var convertNominal = parseInt(nominal);
        totalTanggungan+= convertNominal;
      }

      var gajiAwal = document.getElementById("gaji_perhitungan").value;
      var gajiAkhir = (gajiAwal - totalTanggungan);
      
      var formAkhir = document.createElement('div');
      formAkhir.setAttribute('class','form-group row');
      
      var colFirstGaji = document.createElement('div');
      colFirstGaji.setAttribute('class','col-sm-2 col-form-label');
      colFirstGaji.innerHTML = "Sisa Gaji";

      var colSecondGaji = document.createElement('div');
      colSecondGaji.setAttribute('class','col-sm-10');

      var inputGajiAkhir = document.createElement('input');
      inputGajiAkhir.setAttribute('class','form-control');
      inputGajiAkhir.setAttribute('readonly','true');
      inputGajiAkhir.value = "Rp " + gajiAkhir.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      var inputGajiDatabase = document.createElement('input');
      inputGajiDatabase.setAttribute('type','hidden');
      inputGajiDatabase.setAttribute('name','gaji_akhir');
      inputGajiDatabase.value = gajiAkhir

      colSecondGaji.appendChild(inputGajiAkhir);
      colSecondGaji.appendChild(inputGajiDatabase);

      formAkhir.appendChild(colFirstGaji);
      formAkhir.appendChild(colSecondGaji);

      $("#groupGaji").append(formAkhir);
    }
  </script>