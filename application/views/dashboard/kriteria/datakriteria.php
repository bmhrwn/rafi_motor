  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Data Kriteria</h1>
      <br>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <button onClick="tambahkriteria('<?= base_url() ?>kriteria/tambahkriteria')" data-toggle="modal" data-target="#modaltambah" style="float: right;position:relative;bottom:2px;" class="btn btn-primary">Tambah Data</button>
              <h5 class="m-0 font-weight-bold text-primary">Data Kriteria</h5>
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
                                  <center>Kode</center>
                              </th>
                              <th>
                                  <center>Kriteria</center>
                              </th>
                              <th>
                                  <center>Bobot</center>
                              </th>
                              <th>
                                  <center>Perbaikan Bobot</center>
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
                              <center>Kode</center>
                          </th>
                          <th>
                              <center>Kriteria</center>
                          </th>
                          <th>
                              <center>Bobot</center>
                          </th>
                          <th>
                              <center>Perbaikan Bobot</center>
                          </th>
                          <th>
                              <center>Action</center>
                          </th>
                          </tr>
                      </tfoot>
                      <tbody>
                          <?php $i = 1;
                            foreach ($data_kriteria as $row) { ?>
                              <tr>
                                  <td>
                                      <center><?= $i++; ?></center>
                                  </td>
                                  <td>
                                      <center><?= $row['kode'] ?></center>
                                  </td>
                                  <td>
                                      <center><?= $row['kriteria'] ?></center>
                                  </td>
                                  <td style="width: 100px;">
                                      <center><?= $row['bobot'] ?></center>
                                  </td>
                                  <td>
                                      <center><?= $row['perbaikan_bobot'] ?></center>
                                  </td>
                                  <td>
                                      <center>
                                          <a data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Data Sub Kriteria" href="<?= base_url() ?>dashboard/datasubkriteria/<?= $row['id_kriteria'] ?>"><button type="button" class="btn btn-success btn-circle btn-icon">
                                                  <i class="fa fa-table"></i></button></a>
                                          <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Data">
                                              <button onClick="updatekriteria('<?= base_url() ?>kriteria/updatekriteria','<?= $row['id_kriteria'] ?>','<?= $row['kode'] ?>','<?= $row['kriteria'] ?>','<?= $row['bobot'] ?>')" data-toggle="modal" data-target="#modaltambah"  type="button" class="btn btn-primary btn-circle btn-icon">
                                                  <i class="fas fa-edit"></i></button>
                                          </span>
                                          <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Hapus Data">
                                          <button onClick="deletekriteria('<?= base_url() ?>kriteria/deletekriteria/<?= $row['id_kriteria'] ?>')" data-toggle="modal" data-target="#modal_delete" type="button" class="btn btn-danger btn-circle btn-icon">
                                              <i class="fa fa-trash"></i></button>
                                          </span>
                                      </center>
                                  </td>
                              </tr>

                      </tbody>
                  <?php } ?>
                  </table>
              </div>
          </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="modal_title"></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="" id="form" method="post">
                          <input type="hidden" name="id_kriteria" id="id_kriteria" class="form-control">
                          <div class="form-group">
                              <label for="">Kode</label>
                              <input type="text" placeholder="Masukkan Kode Kriteria" id="kode" name="kode" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="">Kriteria</label>
                              <input type="text" placeholder="Masukkan Kriteria" id="kriteria" name="kriteria" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="">Bobot</label>
                              <input type="text" placeholder="Masukkan Bobot" id="bobot" name="bobot" class="form-control">
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