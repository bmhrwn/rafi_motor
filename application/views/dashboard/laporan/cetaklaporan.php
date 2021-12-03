<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        .text {
            color: #0d47a1;
            text-align: center;
            font-weight: bold;
        }

        .line {
            border-bottom: 2px solid #0d47a1;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row" style="height: 130px;">
            <div class="col-3">
                <img src="<?= base_url() ?>assets/admin/icon.png" alt="">
            </div>
            <div class="col-9">
                <img src="<?= base_url() ?>assets/admin/rafi.png" alt="">

            </div>
        </div>
        <div class="row line">
            <div class="col-12">
                <p class="text">Jl Jendral Sudirman No 5 Bekasi Barat (Samping RM. Simpang Raya) Kota Bekasi <br> Telp: 0813 1423 3399 No. Rek BCA : 291-03777-39 a/n Muhammad Jufri</p>
            </div>
        </div>

        <h3 class="mt-3 mb-4">Laporan Bulan <?= $text_date ?> </h3>

        <table class="table table-bordered">
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
                                                      <span class="btn btn-outline-danger">Tidak Sesuai</span>
                                                  <?php } ?>
                                              </center>
                                          </td>

                                      </tr>
                                  <?php } ?>
                             
            </tbody>
        </table>
    </div>
</body>
<script>
    window.print();
</script>

</html>