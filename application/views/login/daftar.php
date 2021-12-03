<!DOCTYPE html>
<html lang="en">

<head>
	<title>Daftar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url() ?>assets/login/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/login/css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?= base_url() ?>assets/home/images/back.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="<?= base_url() ?>login/proses_daftar">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-car"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Daftar
					</span>

					<?php if ($this->session->flashdata('pesan')) { ?>
						<p style="display: none;" id="pesan"><?= $this->session->flashdata('pesan') ?></p>
						<p style="display: none;" id="type"><?= $this->session->flashdata('type') ?></p>
						<p style="display: none;" id="title"><?= $this->session->flashdata('title') ?></p>
					<?php } ?>

					<div class="wrap-input100 ">
						<input class="input100" type="text" name="username" placeholder="Username" autocomplete="off">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 ">
						<input class="input100" type="text" name="full_name" placeholder="Nama Lengkap" autocomplete="off">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 ">
						<input class="input100" type="text" name="email" placeholder="Email" autocomplete="off">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 ">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="wrap-input100 ">
						<input class="input100" type="password" name="confirm_password" placeholder="Konfirmasi Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Daftar
						</button>
					</div>
					<hr>
					
					<div class="text-center ">
						<a class="txt1" href="<?= base_url() ?>login">
					 Halaman Login
						</a>
					</div>


					<div id="dropDownSelect1"></div>

					<!--===============================================================================================-->
					<script src="<?= base_url() ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
					<!--===============================================================================================-->
					<script src="<?= base_url() ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
					<!--===============================================================================================-->
					<script src="<?= base_url() ?>assets/login/vendor/bootstrap/js/popper.js"></script>
					<script src="<?= base_url() ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
					<!--===============================================================================================-->
					<script src="<?= base_url() ?>assets/login/vendor/select2/select2.min.js"></script>
					<!--===============================================================================================-->
					<script src="<?= base_url() ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
					<script src="<?= base_url() ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
					<!--===============================================================================================-->
					<script src="<?= base_url() ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
					<!--===============================================================================================-->
					<script src="<?= base_url() ?>assets/login/js/main.js"></script>
					<script src="<?= base_url() ?>assets/alert.js"></script>
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

</body>

</html>