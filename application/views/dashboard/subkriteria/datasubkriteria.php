  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Data Sub Kriteria</h1>
      <br>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <button onClick="tambahsubkriteria('<?= base_url() ?>subkriteria/tambahsubkriteria/<?= $this->uri->segment(3); ?>')" data-toggle="modal" data-target="#modaltambah" style="float: right;position:relative;bottom:2px;" class="btn btn-primary">Tambah Data</button>
              <h5 class="m-0 font-weight-bold text-primary">Data Sub Kriteria</h5>
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
                                  <center>Sub Kriteria</center>
                              </th>
                              <th>
                                  <center>Bobot</center>
                              </th>
                              <th>
                                  <center>Perbaikan Bobot</center>
                              </th>
                              <th>
                                  <center>Bobot Global</center>
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
                              <center>Sub Kriteria</center>
                          </th>
                          <th>
                              <center>Bobot</center>
                          </th>
                          <th>
                              <center>Perbaikan Bobot</center>
                          </th>
                          <th>
                              <center>Bobot Global</center>
                          </th>
                          <th>
                              <center>Action</center>
                          </th>
                          </tr>
                      </tfoot>
                      <tbody>
                        <?php $i=1; foreach($data_sub_kriteria as $row) { ?>
                          <tr>
                              <td>
                                  <center><?= $i++;?></center>
                              </td>
                              <td>
                                  <center><?= $row['sub_kriteria']?></center>
                              </td>
                              <td>
                                  <center><?= $row['bobot']?></center>
                              </td>
                              <td>
                                  <center><?= $row['perbaikan_bobot']?></center>
                              </td>
                              <td>
                                  <center><?= $row['bobot_global']?></center>
                              </td>
                              <td>
                                  <center>
                                  <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Data">
                                      <button onClick="updatesubkriteria('<?= base_url()?>subkriteria/updatesubkriteria/<?= $row['id_kriteria']?>','<?= $row['id_sub_kriteria']?>','<?= $row['id_kriteria']?>','<?= $row['sub_kriteria']?>','<?= $row['bobot']?>')" data-toggle="modal" data-target="#modaltambah" type="button" class="btn btn-primary btn-circle btn-icon">
                                          <i class="fa fa-edit"></i></button>
                                  </span>
                                  <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Hapus Data">
                                      <button onClick="hapussubkriteria('<?= base_url()?>subkriteria/hapusdata/<?= $row['id_sub_kriteria']?>/<?= $row['id_kriteria']?>')" data-toggle="modal" data-target="#modal_delete" type="button" class="btn btn-danger btn-circle btn-icon">
                                          <i class="fa fa-trash"></i></button>
                                  </span>
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
                          <input type="hidden" name="id_sub_kriteria" id="id_sub_kriteria" class="form-control">
                          <input type="hidden" name="id_kriteria" id="id_kriteria" class="form-control">
                          <div class="form-group">
                              <label for="">Sub Kriteria</label>
                              <input type="text" placeholder="Masukkan Sub Kriteria" id="sub_kriteria" name="sub_kriteria" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="">Bobot</label>
                              <input type="text" placeholder="Masukkan Kriteria" id="bobot" name="bobot" class="form-control">
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
  </div>