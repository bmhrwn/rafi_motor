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

        <h3 class="mt-3 mb-4">Laporan Grafik Pengajuan Mobil <?= $text_date ?> </h3>
        <button style="float: right; position:relative;bottom:50px;" class="btn btn-primary noprint" onclick="window.print()"> <i class="fa fa-print"></i> cetak</button>

        <div class="chart-bar mt-4">
            <canvas style="height: 400px;" id="myBarChartt"></canvas>
        </div>
    </div>

    <!-- Footer -->




    <script src="<?= base_url() ?>assets/admin/vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/demo/chart-bar-demo.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/chart.js/chart.js"></script>

    <script>
        // Bar Chart Example
        var canvas = document.getElementById("myBarChartt");
        var ctx = canvas.getContext("2d");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php
                        $namaMobil = $nama_mobil;
                        $jsMobil = json_encode($namaMobil);
                        echo "$jsMobil \n";
                        ?>,
                datasets: [{
                    label: <?php
                            $namaMobil = $nama_mobil;
                            $jsMobil = json_encode($namaMobil);
                            echo "$jsMobil \n";
                            ?>,
                    backgroundColor: <?php
                                        $warnaChart = $warna_chart;
                                        $jsWarna = json_encode($warnaChart);
                                        echo "$jsWarna \n"
                                        ?>,
                    hoverBackgroundColor: <?php echo "$jsWarna \n" ?>,
                    borderColor: <?php echo "$jsWarna \n" ?>,
                    data: <?php
                            $jumlahMobil = $jumlah_mobil;
                            $jsMobil = json_encode($jumlahMobil);
                            echo "$jsMobil \n"
                            ?>
                }]
            },
            options: {
                title: {
                    display: false,
                    text: "Data Laporan Mobil Bulan "
                },
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false,
                layout: {
                    padding: {
                        left: 1,
                        right: 1,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'month'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        },
                        maxBarThickness: 45,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2],
                            display: true
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }],
                },
                legend: {
                    display: false,
                    labels: {
                        fontColor: 'rgb(255, 99, 12)'
                    }
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
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
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label[tooltipItem.index] || '';
                            return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + ' unit';
                        }
                    }
                },
            }
        });
    </script>

</body>

</html>