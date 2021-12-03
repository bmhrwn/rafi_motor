  <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Data Merk</h1>
      <br>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
          <button onClick="tambahmerk('<?= base_url()?>merk/tambahmerk')" data-toggle="modal" data-target="#modaltambah" style="float: right;position:relative;bottom:2px;" class="btn btn-primary">Tambah Data</button>
              <h5 class="m-0 font-weight-bold text-primary">Data Merk</h5>
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
                                  <center>Nama Merk</center>
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
                                  <center>Nama Merk</center>
                              </th>
                              <th>
                                  <center>Action</center>
                              </th>
                          </tr>
                      </tfoot>
                      <tbody>
                          <?php $i = 1;
                            foreach ($data_merk as $merk) { ?>
                              <tr>
                                  <td>
                                      <center><?= $i++; ?></center>
                                  </td>
                                  <td>
                                      <center><?= $merk['nama_merk'] ?></center>
                                  </td>
                                  <td>
                                      <center>
                                      <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Data">
                                          <button onClick="updatemerk('<?= base_url()?>merk/updatemerk','<?= $merk['id_merk']?>','<?= $merk['nama_merk']?>')" data-toggle="modal" data-target="#modaltambah" type="button" class="btn btn-primary btn-circle btn-icon">
                                              <i class="fa fa-edit"></i></button>
                                      </span>
                                      <span data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Hapus Data">
                                          <button onClick="deletemerk('<?= base_url()?>merk/deletemerk/<?= $merk['id_merk']?>')" data-toggle="modal" data-target="#modal_delete" type="button" class="btn btn-danger btn-circle btn-icon">
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
        <div class="form-group"></div>
        <input type="hidden" name="id_merk" id="id_merk" class="form-control">
        <label for="">Nama Merk</label>
        <input  type="text" placeholder="Masukkan Nama Merk" id="nama_merk" name="nama_merk" class="form-control">
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
        <a  id="buttondelete" class="btn btn-primary">Delete Data</a>
      </div>
    </div>
  </div>
</div>
</div>
             