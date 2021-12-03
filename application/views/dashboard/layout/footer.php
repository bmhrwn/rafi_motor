 <!-- Footer -->
 <footer class="sticky-footer bg-white mt-5">
   <div class="container my-auto">
     <div class="copyright text-center my-auto">
       <span>Copyright &copy; Your Website 2020</span>
     </div>
   </div>
 </footer>
 <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
   <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Siap Untuk Keluar?</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">
         Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
       <div class="modal-footer">
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
         <a class="btn btn-primary" href="<?= base_url() ?>login/proseslogout">Keluar</a>
       </div>
     </div>
   </div>
 </div>

 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url() ?>assets/admin/js/sb-admin-2.min.js"></script>

 <script src="<?= base_url() ?>assets/admin/vendor/chart.js/Chart.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="<?= base_url() ?>assets/alert.js"></script>
 <script src="<?= base_url() ?>assets/pengajuan.js"></script>
 <script src="<?= base_url() ?>assets/detailcustomer.js"></script>
 <script>
   $(function() {
     $('[data-toggle="tooltip"]').tooltip()
   })
 </script>
 <script>
   pesan = document.getElementById('pesan');
   if (pesan != null) {
     swal({
       title: document.getElementById('title').innerHTML,
       text: pesan.innerHTML,
       icon: document.getElementById('type').innerHTML,
     });
   }
 </script>
 <script src="<?= base_url() ?>assets/admin/type.js"></script>
 <script src="<?= base_url() ?>assets/admin/merk.js"></script>
 <script src="<?= base_url() ?>assets/admin/mobil.js"></script>
 <script src="<?= base_url() ?>assets/admin/kriteria.js"></script>
 <script src="<?= base_url() ?>assets/admin/subkriteria.js"></script>
 <script src="<?= base_url() ?>assets/admin/js/input-file.js"></script>
 <!-- Page level plugins -->
 <script src="<?= base_url() ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url() ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="<?= base_url() ?>assets/admin/js/demo/datatables-demo.js"></script>
 <script>
   $(function() {
     bsCustomFileInput.init();
   });
 </script>

 <script src="<?= base_url() ?>assets/admin/js/demo/chart-bar-demo.js"></script>
 <script src="<?= base_url() ?>assets/admin/js/demo/chart-pie-demo.js"></script>
 <!-- <script src="<?= base_url() ?>assets/admin/js/chart.js/chart.js"></script> -->
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
         display: true,
         text: "Data Laporan Mobil Bulan <?= $date; ?>"
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
 <script>
   // Pie Chart Example
   var ctx = document.getElementById("myPieChart");
   var myPieChart = new Chart(ctx, {
     type: 'doughnut',
     data: {
       labels: <?php
                $jsDp = json_encode($nama_dp);
                echo "$jsDp \n";
                ?>,
       datasets: [{
         data: <?php
                $jsNilai = json_encode($nilai_dp);
                echo "$jsNilai \n";
                ?>,
         backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
         hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
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
             return  'DP '+ chart.labels[i] + ' : ' + chart.datasets[0].data[i] + ' Pengajuan';
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
  <script>
   // Pie Chart Example
   var ctx = document.getElementById("chartTenor");
   var chartTenor = new Chart(ctx, {
     type: 'doughnut',
     data: {
       labels: <?php
                $jstenor = json_encode($nama_tenor);
                echo "$jstenor \n";
                ?> ,
       datasets: [{
         data: <?php
                $jstenorN = json_encode($nilai_tenor);
                echo "$jstenorN \n";
                ?>,
         backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#ff9100','#f50057'],
         hoverBackgroundColor: ['#0043ca', '#17a673', '#2c9faf','#c56200','#bb002f'],
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
             return  'Tenor '+ chart.labels[i] + ' : ' + chart.datasets[0].data[i] + ' Pengajuan';
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