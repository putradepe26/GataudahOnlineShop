<?php

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
    <title>Masuk ke Sistem Manajemen Seminar Bimbingan Teknologi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script>
        $(function() {
            $('#slides').slidesjs({
                height: 350,
                play: {
                    auto: true,
                    interval: 3000
                },
                navigation: false
            });
        });
    </script>
    </script>
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet" type=" text/css" rel="stylesheet" />
    <link href="css/banner.css" type="text/css" rel="stylesheet" />

    <script src="<?php echo BASE_URL . "js/jquery-3.1.1.min.js"; ?>"></script>
    <script src="<?php echo BASE_URL . "js/Slides-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-warning">
    <div class="form-group">
        <table border="0" width="100%" height="auto">
            <tr class="bg-dark">
                <td Align="Right">
                    <div id="">

                        <!-- Page Wrapper -->
                        <div id="wrapper">
                            <div class="col-md-12 ">
                                <div class="i">
                                    <BR />

                                    <div id="content">
                                        <?php
                                        if ($totalBarang == 0) {
                                            echo "<h3>Data beli belum ada di keranjang belanja anda</h3>";
                                        } else {

                                            $no = 1;

                                            echo "<table class='table-list'>
				<tr class='baris-title'>
					<th class='tengah'>No</th>
					<th class='kiri'>Image</th>
					<th class='kiri'>Nama Barang</th>
					<th class='tengah'>Qty</th>
					<th class='kanan'>Harga Satuan</th>
					<th class='kanan'>Total</th>
				</tr>";

                                            $subtotal = 0;
                                            foreach ($keranjang as $key => $value) {
                                                $barang_id = $key;

                                                $nama_barang = $value["nama_barang"];
                                                $quantity = $value["quantity"];
                                                $gambar = $value["gambar"];
                                                $harga = $value["harga"];

                                                $total = $quantity * $harga;
                                                $subtotal = $subtotal + $total;

                                                echo "<tr>
					<td class='tengah'>$no</td>
					<td class='kiri'><img src='" . BASE_URL . "images/barang/$gambar' height='100px' /></td>
					<td class='kiri'>$nama_barang</td>
					<td class='tengah'><input type='text' name='$barang_id' value='$quantity' class='update-quantity' /></td>
					<td class='kanan'>" . rupiah($harga) . "</td>
					<td class='kanan hapus_item'>" . rupiah($total) . " <a href='" . BASE_URL . "hapus_item.php?barang_id=$barang_id'>X</a></td>
				</tr>";

                                                $no++;
                                            }

                                            echo "<tr>
				<td colspan='5' class='kanan'><b>Sub Total</b></td>
				<td class='kanan'><b>" . rupiah($subtotal) . "</b></td>
			  </tr>";

                                            echo "</table>";

                                            echo "<div id='frame-button-keranjang'>
				<a id='lanjut-belanja' href='" . BASE_URL . "index.php'>< Lanjut Belanja</a>
				<a id='lanjut-pemesanan' href='" . BASE_URL . "index.php?page=data_pemesan'>Lanjut Pemesanan ></a>
			  </div>";
                                        }

                                        ?>

                                        <script>
                                            $(".update-quantity").on("input", function(e) {
                                                var barang_id = $(this).attr("name");
                                                var value = $(this).val();

                                                $.ajax({
                                                        method: "POST",
                                                        url: "update_keranjang.php",
                                                        data: "barang_id=" + barang_id + "&value=" + value
                                                    })
                                                    .done(function(data) {
                                                        location.reload();
                                                    });

                                            });
                                        </script>

                                    </div>
                                </div>


                            </div>
</body>

</html>