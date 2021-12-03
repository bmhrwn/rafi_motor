  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Mobil</h1>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <?php if ($this->session->userdata('admin')) { ?>
          <button onClick="tambahmobil('<?= base_url() ?>mobil/tambahmobil')" data-toggle="modal" data-target="#modaltambah" style="float: right;position:relative;bottom:2px;" class="btn btn-primary">Tambah Data</button>
        <?php } ?>
        <h5 class="m-0 font-weight-bold text-primary">Data Mobil</h5>
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
                  <center>Nama Mobil</center>
                </th>
                <th>
                  <center>Type Mobil</center>
                </th>
                <th>
                  <center>Merk Mobil</center>
                </th>

                <th>
                  <center>Action</center>
                </th>

              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>
                  <center>No</center>
                </th>
                <th>
                  <center>Nama Mobil</center>
                </th>
                <th>
                  <center>Type Mobil</center>
                </th>
                <th>
                  <center>Merk Mobil</center>
                </th>

                <th>
                  <center>Action</center>
                </th>

              </tr>
            </tfoot>
            <tbody>
              <?php $i = 1;
              foreach ($data_mobil as $row) { ?>
                <tr>
                  <td>
                    <center><?= $i++; ?></center>
                  </td>
                  <td>
                    <center><?= $row['nama_mobil'] ?></center>
                  </td>
                  <td>
                    <center><?= $row['nama_type'] ?></center>
                  </td>
                  <td>
                    <center><?= $row['nama_merk'] ?></center>
                  </td>

                  <td>
                    <center>
                      <?php if ($this->session->userdata('admin')) { ?>
                        <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Data">
                          <button onClick="updatemobil('<?= base_url() ?>mobil/updatemobil','<?= $row['id_mobil'] ?>','<?= $row['nama_mobil'] ?>','<?= $row['id_type'] ?>','<?= $row['id_merk'] ?>','<?= $row['plat_mobil'] ?>','<?= $row['tahun_mobil'] ?>','<?= $row['harga_mobil'] ?>','<?= $row['tipe_mobil'] ?>','<?= $row['cakupan_mesin'] ?>','<?= $row['transmisi'] ?>','<?= $row['penumpang'] ?>','<?= $row['kilometer'] ?>','<?= $row['warna'] ?>','<?= $row['bahan_bakar'] ?>','<?= $row['varian'] ?>','<?= $row['foto_1'] ?>','<?= $row['foto_2'] ?>','<?= $row['foto_3'] ?>','<?= $row['warna_chart'] ?>')" data-toggle="modal" data-target="#modaltambah" type="button" class="btn btn-primary btn-circle btn-icon">
                            <i class="fa fa-edit"></i></button>
                        </span>
                      <?php } ?>
                      <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Detail Mobil">
                        <button onClick="detailmobil('<?= base_url() ?>assets/admin/mobil/<?= $row['foto_1'] ?>','<?= $row['nama_mobil'] ?>','<?= $row['nama_type'] ?>','<?= $row['nama_merk'] ?>','<?= $row['tipe_mobil'] ?>','<?= $row['tahun_mobil'] ?>','RP. <?= number_format($row['harga_mobil'], 0, ",", ".") ?>','<?= $row['cakupan_mesin'] ?>','<?= $row['transmisi'] ?>','<?= $row['penumpang'] ?>','<?= $row['kilometer'] ?>','<?= $row['bahan_bakar'] ?>','<?= $row['warna'] ?>')" data-toggle="modal" data-target="#modal_detail" type="button" class="btn btn-dark btn-circle btn-icon">
                          <i class="fa fa-car"></i></button>
                      </span>
                      <?php if ($this->session->userdata('admin')) { ?>
                        <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Hapus Data">
                          <button onClick="deletemobil('<?= base_url() ?>mobil/deletemobil/<?= $row['id_mobil'] ?>')" data-toggle="modal" data-target="#modal_delete" type="button" class="btn btn-danger btn-circle btn-icon">
                            <i class="fa fa-trash"></i></button>
                        </span>
                        <?php}?>
                    </center>
                  </td>
                <?php } ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal_title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" id="form" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_mobil" id="id_mobil" class="form-control">
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Nama Mobil</label>
                    <input type="text" placeholder="Masukkan Nama Mobil" id="nama_mobil" name="nama_mobil" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Plat</label>
                    <input type="text" placeholder="Masukkan Plat Mobil" id="plat_mobil" name="plat_mobil" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Type</label>
                    <select class="form-control" name="nama_type" id="nama_type">
                      <option value="">--Pilih Type Mobil--</option>
                      <?php foreach ($data_type as $type) { ?>
                        <option value="<?= $type['id_type'] ?>"><?= $type['nama_type'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Merk</label>
                    <select class="form-control" name="nama_merk" id="nama_merk">
                      <option value="">--Pilih Merk Mobil--</option>
                      <?php foreach ($data_merk as $merk) { ?>
                        <option value="<?= $merk['id_merk'] ?>"><?= $merk['nama_merk'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Tahun</label>
                    <input type="text" placeholder="Masukkan Tahun Mobil" id="tahun_mobil" name="tahun_mobil" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Harga</label>
                    <input type="text" placeholder="Masukkan Harga Mobil" id="harga_mobil" name="harga_mobil" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Tipe Mobil</label>
                    <input type="text" placeholder="Masukkan Tipe Mobil" id="tipe_mobil" name="tipe_mobil" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Cakupan Mesin</label>
                    <input type="text" placeholder="Masukkan Cakupan Mesin Mobil" id="cakupan_mesin" name="cakupan_mesin" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Transmisi</label>
                    <input type="text" placeholder="Masukkan Transmisi Mobil" id="transmisi" name="transmisi" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Penumpang</label>
                    <input type="text" placeholder="Masukkan Penumpang Mobil" id="penumpang" name="penumpang" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Kilometer</label>
                    <input type="text" placeholder="Masukkan Kilometer Mobil" id="kilometer" name="kilometer" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Warna</label>
                    <input type="text" placeholder="Masukkan Warna Mobil" id="warna" name="warna" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Varian</label>
                    <input type="text" placeholder="Masukkan Varian Mobil" id="varian" name="varian" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Bahan Bakar</label>
                    <input type="text" placeholder="Masukkan Bahan Bakar Mobil" id="bahan_bakar" name="bahan_bakar" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Warna Chart</label>
                    <input type="color" placeholder="Masukkan Warna Chart" id="warna_chart" name="warna_chart" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Foto 1</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto_1" class="custom-file-input" id="exampleInputFile">
                        <label id="foto_1" class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span style="background: blue;color:white;" class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Foto 2</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto_2" class="custom-file-input" id="exampleInputFile">
                        <label id="foto_2" class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span style="background: blue;color:white;" class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Foto 3</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto_3" class="custom-file-input" id="exampleInputFile">
                        <label id="foto_3" class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span style="background: blue;color:white;" class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="button" class="btn btn-primary"></button>
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
          <h5 class="modal-title" id="modal_title">Form Hapus Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Anda yakin ingin menghapus data tersebut ?
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a id="buttondelete" class="btn btn-primary">Hapus Data</a>
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
  </div>