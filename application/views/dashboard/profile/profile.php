<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
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
                                <?php if($data_detail['foto'] != null)  { ?>
                                <a href="<?= base_url() ?>assets/admin/users/<?= $data_detail['foto'] ?>"><img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>assets/admin/users/<?= $data_detail['foto'] ?>" alt="User profile picture"></a>
                                <?php }else{ ?>
                                <a href="<?= base_url() ?>assets/admin/users/blankuser.png"><img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>assets/admin/users/blankuser.png" alt="User profile picture"></a> 
                                <?php } ?>  
                            </div>
                            <hr>
                            <br>
                            <h3 class="profile-username text-center" style="color: blue;"><?= $data_detail['full_name'] ?></h3>

                            <p class="text-muted text-center"><?= $data_detail['tanggal_lahir'] ?></p>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Ubah Password</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Profile</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?= $data_detail['email'] ?>" class="form-control" name="full_name" placeholder="Email" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">No Handphone</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?= $data_detail['hp'] ?>" class="form-control" name="full_name" placeholder="No Handphone" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?= $data_detail['jenis_kelamin'] ?>" class="form-control" name="full_name" placeholder="Jenis Kelamin" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="alamat" placeholder="Alamat" readonly><?= $data_detail['alamat'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="card card-info">
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form action="<?= base_url() ?>users/ubahpasswordadmin" method="post" class="form-horizontal">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-12 col-form-label">Password Lama :</label>
                                                    <div class="col-sm-12">
                                                        <input type="password" class="form-control" name="passwordlama" placeholder="Masukkan Password Lama">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-12 col-form-label">Password Baru :</label>
                                                    <div class="col-sm-12">
                                                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password Baru">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-12 col-form-label">Konfirmasi Password :</label>
                                                    <div class="col-sm-12">
                                                        <input type="password" class="form-control" name="konfirmasi_password" placeholder="Konfirmasi Password Baru">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="offset-sm-0 col-sm-10">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                                            <label class="form-check-label" for="exampleCheck2">Remember me</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-info">Submit</button>
                                                <button type="submit" class="btn btn-danger float-right">Cancel</button>
                                            </div>
                                            <!-- /.card-footer -->
                                        </form>
                                    </div>
                                    <!-- /.card -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <form action="<?= base_url() ?>users/updateprofileadmin/<?= $data_detail['id_detail'] ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control" name="id_detail">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?= $data_detail['full_name'] ?>" class="form-control" name="full_name" placeholder="Nama Lengkap">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" value="<?= $data_detail['email'] ?>" class="form-control" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">No Handphone</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?= $data_detail['hp'] ?>" class="form-control" name="hp" placeholder="No Handphone">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                <option value="<?= $data_detail['jenis_kelamin'] ?>"><?= $data_detail['jenis_kelamin'] ?></option>
                                                    <option value="">--Jenis Kelamin--</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="alamat" placeholder="Alamat"><?= $data_detail['alamat'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputFile" class="col-sm-2 col-form-label">File input</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input name="foto" type="file" class="custom-file-input" id="exampleInputFile">
                                                        <?php if ($data_detail['foto'] != null) { ?>
                                                            <label class="custom-file-label" for="exampleInputFile"><?= $data_detail['foto'] ?></label>
                                                        <?php } else { ?>
                                                            <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" value="<?= $data_detail['tanggal_lahir'] ?>" name="tanggal_lahir" placeholder="Skills">
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-info">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->