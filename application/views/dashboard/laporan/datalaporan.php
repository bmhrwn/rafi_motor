  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Data Laporan</h1>
      <br>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <div class="row">
                  <div class="col-8">

                      <h5 class="m-0 font-weight-bold text-primary">Data Laporan <?= $date ?></h5>
                  </div>
                  <div class="col-4">
                      <div class="row">
                          <?php if ($view == "dokumen") { ?>
                              <button target="_blank" data-toggle="modal" data-target="#modal_cetak" style="float:right;position:relative;left:160px;" class="btn btn-success">Cetak</button>
                          <?php } ?>

                          
                          <button data-toggle="modal" data-target="#modal_bulan" style="float: right;position:relative;left:175px;" class="btn btn-primary">Pilih Bulan</button>

                      </div>
                  </div>
              </div>
          </div>

          <div class="card-body">
              <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Laporan Konfirmasi Dokumen</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Grafik Mobil Pengajuan</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Grafik DP Pengajuan</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tenor" data-toggle="tab">Grafik Tenor Pengajuan</a></li>
              </ul>
              <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                      <div class="table-responsive mt-4">
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
                                          <center>Tanggal Pengajuan</center>
                                      </th>
                                      <th>
                                          <center>Status Dokumen</center>
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
                                      <center>Tanggal Pengajuan</center>
                                  </th>
                                  <th>
                                      <center>Status Dokumen</center>
                                  </th>

                                  </tr>
                              </tfoot>
                              <tbody>
                                  <?php $i = 1;
                                    foreach ($data_laporan as $row) { ?>
                                      <tr>
                                          <td>
                                              <center><?= $i++; ?></center>
                                          </td>
                                          <td>
                                              <center><?= $row['full_name'] ?></center>
                                          </td>
                                          <td>
                                              <center><?= date_format(date_create($row['tanggal_pengajuan']), 'd F Y') ?></center>
                                          </td>
                                          <td>
                                              <center>
                                                  <?php if ($row['status'] == 0) { ?>
                                                      <span class="btn btn-outline-dark">Belum Di Periksa</span>
                                                  <?php } else if ($row['status'] == 1) { ?>
                                                      <span class="btn btn-outline-success">Lolos Administrasi</span>
                                                  <?php } else if ($row['status'] == 2) { ?>
                                                      <span class="btn btn-outline-danger">Tidak Lolos Administrasi</span>
                                                  <?php } ?>
                                              </center>
                                          </td>

                                      </tr>
                                  <?php } ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                      <div class="chart-bar mt-4">
                          <canvas id="myBarChartt"></canvas>
                      </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                      <!-- /.tab-pane -->
                      <div class="card-body">
                          <div class="chart-pie pt-4 pb-2">
                              <canvas id="myPieChart"></canvas>
                          </div>
                          <div class="mt-4 text-center small">
                          </div>
                      </div>
                  </div>
                  <div class="tab-pane" id="tenor">
                      <!-- /.tab-pane -->
                      <div class="card-body">
                          <div class="chart-pie pt-4 pb-2">
                              <canvas id="chartTenor"></canvas>
                          </div>
                          <div class="mt-4 text-center small">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>


  </div>




  <div class="modal fade" id="modal_bulan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modal_title">Form Pilih Bulan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url() ?>dashboard/datalaporan" method="post">
                      <div class="form-group row">
                          <label for="inputPassword" class="col-sm-2 col-form-label">Pilih Bulan</label>
                          <div class="col-sm-10">
                              <input type="month" class="form-control" name="bulan" id="bulan">
                          </div>
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="submit" class="btn btn-primary">Lihat Data</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  
  
  <div class="modal fade" id="modal_cetak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modal_title">Form Pilih Cetak</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url() ?>dashboard/cetak_laporan" target="_blank" method="post">
                      <div class="form-group row">
                          <label for="inputPassword" class="col-sm-2 col-form-label">Pilih Cetak</label>
                          <div class="col-sm-10">
                              <select type="month" class="form-control" name="cetak" id="bulan">
                                    <option value="">-- Pilih Cetak --</option>
                                    <option value="laporan">Laporan Konfirmasi Dokumen</option>
                                    <option value="mobil">Grafik Mobil Pengajuan</option>
                                    <option value="dp">Grafik DP Pengajuan</option>
                                    <option value="tenor">Grafik Tenor Pengajuan</option>
                              <select>
                              <input type="hidden" name="date" value="<?= $cetak_month ?>">
                          </div>
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit"  name="submit" class="btn btn-primary">Lihat Data</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  