<?php 
require("config.php");

if (isset($_POST['jum'])) { 
	$nama_tipe = $_POST['nama_tipe'];
	$jum = $_POST['jum'];
	$data = mysqli_query($conn, "SELECT * FROM tb_kamar WHERE tipe_kamar='$nama_tipe' AND status='Kosong'");

	for ($i=0; $i < $jum; $i++) { ?>
		<div class="col-sm-3" id="set">
			<select type="text" style="color: black" id="no_kamar<?= $i+1 ?>" name="" class="form-control input_box" required>
				<option value="">Pilih Kamar</option>
				<?php foreach ($data as $nmr) { ?>
					<option id="opt<?= $nmr['no_kamar'] ?>" value="<?= $nmr['no_kamar'] ?>">
						<?= sprintf('%03s', $nmr['no_kamar']."/".$nmr['kd_kamar']) ?>
					</option>
				<?php } ?>
			</select>
		</div>
	<?php } ?>
<?php } 

if (isset($_POST['transaksi'])) {
	$_SESSION['transaksi'] = $_POST;

	// Ambil data pemesanan
	$no_pemesanan = $_SESSION['pemesanan']['no_pemesanan'];
	$nama = $_SESSION['pemesanan']['nama'];
	$email = $_SESSION['pemesanan']['email'];
	$telepon = $_SESSION['transaksi']['telepon'];
	$alamat = $_SESSION['transaksi']['alamat'];
	$tggl_cekin = $_SESSION['pemesanan']['tggl_cekin'];
	$tggl_cekout = $_SESSION['pemesanan']['tggl_cekout'];
	$lama_inap = $_SESSION['transaksi']['lama_inap'];
	$tipe_kamar = $_SESSION['pemesanan']['tipe_kamar'];
	$jum_kmr = $_SESSION['pemesanan']['jum_kmr'];
	$nk1 = $_SESSION['pemesanan']['no_kamar1'];
	$nk2 = $_SESSION['pemesanan']['no_kamar2'];
	$nk3 = $_SESSION['pemesanan']['no_kamar3'];
	$nk4 = $_SESSION['pemesanan']['no_kamar4'];

	// Update status kamar
	$get_nk = $nk1.",".$nk2.",".$nk3.",".$nk4;
	$no_kamar = explode(',', $get_nk);
	for ($i=0; $i < $jum_kmr; $i++) {
		mysqli_query($conn, "UPDATE tb_kamar SET status = 'Terisi' WHERE tipe_kamar = '$tipe_kamar' AND no_kamar='$no_kamar[$i]'");
		$set_nk[] = $no_kamar[$i];		
	}

	// Tambah data pemesanan kamar
	$no_kmr = implode(',', $set_nk);
	mysqli_query($conn, "INSERT INTO tb_pemesanan VALUES('', '$no_pemesanan', '$nama', '$email', '$telepon', '$alamat', '$tggl_cekin', '$tggl_cekout', '$lama_inap', '$tipe_kamar', '$jum_kmr', '$no_kmr', 'Booking')");

    // Update kamar terpakai
	$get = mysqli_query($conn, "SELECT kamar_terpakai FROM tb_tipe_kamar WHERE nama_tipe = '$tipe_kamar'");
	$dta = mysqli_fetch_assoc($get);
	$get_kmr = $dta['kamar_terpakai'];
	$kmr_pakai = $get_kmr + $jum_kmr;
	mysqli_query($conn, "UPDATE tb_tipe_kamar SET kamar_terpakai = '$kmr_pakai' WHERE nama_tipe = '$tipe_kamar'");

    // Ambil data transaksi
	$no_pemesanan = $_SESSION['pemesanan']['no_pemesanan'];
	$no_kartu_kredit = $_SESSION['transaksi']['no_kartu_kredit'];
	$jenis_kartu = $_SESSION['transaksi']['jenis_kartu'];
	$masa_berlaku = $_SESSION['transaksi']['masa_berlaku'];
	$tahun = $_SESSION['transaksi']['tahun'];
	$ttl_hrg_kmr = $_SESSION['transaksi']['ttl_hrg_kmr'];
	$ttl_by_lyn = $_SESSION['transaksi']['ttl_by_lyn'];
	$total_bayar = $_SESSION['transaksi']['total_bayar'];

	// Tambah data transaksi
	mysqli_query($conn, "INSERT INTO tb_transaksi VALUES('', '$no_pemesanan', '$no_kartu_kredit', '$jenis_kartu', '$masa_berlaku', '$tahun', '$ttl_hrg_kmr', '$ttl_by_lyn', '$total_bayar')");

	echo "<script>alert('Pesanan kamar anda berhasil di proses, Silahkan cetak bukti transaksi untuk diserahkan saat Cek-in di Hotel kami'); document.location.href='web.php?".url('laporan')."'</script>";
}

if (isset($_POST['hapus_session'])) {
	unset($_SESSION['pemesanan']);
	unset($_SESSION['transaksi']);
}
?>