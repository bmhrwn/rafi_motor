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
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/style.css">
    <link href="<?= base_url() ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
        @media print {
            .noprint {
                display: none;
            }
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

        <h3 class="mt-3 mb-4">Laporan Grafik Tenor Bulan <?= $text_date ?> </h3>
        <button style="float: right; position:relative;bottom:50px;" class="btn btn-primary noprint" onclick="window.print()"> <i class="fa fa-print"></i> cetak</button>
        <div align="center">
            <center>
                <div class="chart-pie pt-4 pb-2">
                    <canvas style="height: 300px;" id="chartTenor"></canvas>
                </div>
            </center>
        </div>
    </div>


    <script src="<?= base_url() ?>assets/admin/vendor/chart.js/Chart.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/admin/js/demo/chart-bar-demo.js"></script> -->
    <script src="<?= base_url() ?>assets/admin/js/demo/chart-pie-demo.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/chart.js/chart.js"></script>

    <script>
        // Pie Chart Example
        var ctx = document.getElementById("chartTenor");
        var chartTenor = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: <?php
                        $jstenor = json_encode($nama_tenor);
                        echo "$jstenor \n";
                        ?>,
                datasets: [{
                    data: <?php
                            $jstenorN = json_encode($nilai_tenor);
                            echo "$jstenorN \n";
                            ?>,
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#ff9100', '#f50057'],
                    hoverBackgroundColor: ['#0043ca', '#17a673', '#2c9faf', '#c56200', '#bb002f'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var i = tooltipItem.index;
                            //  var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label[tooltipItem.index] || '';
                            return 'Tenor ' + chart.labels[i] + ' : ' + chart.datasets[0].data[i] + ' Pengajuan';
                        }
                    }
                },
                legend: {
                    display: true
                },
                cutoutPercentage: 80,
            },
        });
    </script>
</body>

</html>