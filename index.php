<?php

session_start();

include_once("function/koneksi.php");
include_once("function/helper.php");

$page = isset($_GET['page']) ? $_GET['page'] : false;
$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
$totalBarang = count($keranjang);

?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Toko Gataudah</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	</script>
	<!-- Custom fonts for this template-->
	<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="css/style.css" type="text/css" rel="stylesheet" type=" text/css" rel="stylesheet" />

	<script src="<?php echo BASE_URL . "js/jquery-3.1.1.min.js"; ?>"></script>


	<!-- Custom styles for this template-->
	<link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-warning">
	<div class="form-group">
		<table border="0" width="100%" height="auto">
			<tr class="bg-dark">
				<td Align="Right">
					<div id="">
						<?php
						if ($user_id) {
							echo "Hi <b>$nama</b>,
									  <a href='" . BASE_URL . "index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>
									  <a href='" . BASE_URL . "logout.php'>Logout</a>";
						} else {
							echo  "<a style='margin-right:40px'href='" . BASE_URL . "login2.php?page=login'>Masuk</a>
									 <a style='margin-right:40px'href='" . BASE_URL . "register2.php?page=register'>Daftar</a>";
						}
						?>

						<a href="<?php echo BASE_URL . "index.php?page=keranjang2"; ?>" id="button-keranjang">
							<img style='margin-right:40px' src="<?php echo BASE_URL . "images/keranjang.png"; ?>" />
							<?php
							if ($totalBarang != 0) {
								echo "<span class='total-barang'>$totalBarang</span>";
							}
							?>
						</a>
					</div>
	</div>
	</td>
	</tr>
	</table>
	<!-- Page Wrapper -->
	<div id="wrapper">
		<div class="col-md-12 ">
			<div class="i">
				<BR />

				<a href="<?php echo BASE_URL . "index.php"; ?>"
					<href style='font-size: 40px; color: gray; text-decoration: none; font-family: Cooper Black'>TOKO <br> GATAUDAH
				</a>
				<div id="content">

					<?php
					$filename = "$page.php";

					if (file_exists($filename)) {
						include_once($filename);
					} else {
						include_once("main.php");
					}
					?>

				</div>
			</div>


		</div>
</body>

</html>