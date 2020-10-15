<?php 
if (isset($_GET['id'])) {
	$titel = "Edit Fasilitas Kamar";
	$value = $_GET['id'];

	$id = $_GET['id'];
	$data = mysqli_query($conn, "SELECT * FROM tb_fasilitas_kamar WHERE id='$id'");
	foreach ($data as $dta) {
		$nama_fasilitas = $dta['nama_fasilitas'];
		$keterangan = $dta['keterangan'];
	}
}
else {
	$titel = "Tambah Fasilitas Kamar";
	$value = 0;

	$nama_fasilitas = null;
	$keterangan = null;
}
$_SESSION['title'] = "Admin : Hotel Paradiso Makassar";
?>
<div class="row">
	<div class="col-lg-12">
		<div class="card-box">
			<h4 class="m-t-0 header-title text-center" style="margin-bottom: 20px;"><b><?= $titel ?></b></h4>
			<hr>
			<form class="form-horizontal" role="form" method="POST" action="controller.php">
				<div class="form-group">
					<label for="nama_fasilitas" class="col-sm-3 control-label">Nama Fasilitas</label>
					<div class="col-sm-7">
						<input type="text" required class="form-control" name="nama_fasilitas" id="nama_fasilitas" value="<?= $nama_fasilitas ?>" placeholder="Nama Fasilitas">
					</div>
				</div>
				<div class="form-group">
					<label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
					<div class="col-sm-7">
						<input type="text" required class="form-control" name="keterangan" id="keterangan" value="<?= $keterangan ?>" placeholder="Keterangan">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-7">
						<input type="hidden" value="<?= $value ?>" name="action">
						<button type="submit" class="btn btn-default waves-effect waves-light" name="simpan_fasilitas_kamar">
							<i class="fa fa-save"></i>&nbsp;Simpan
						</button>
						<a href="web.php?<?= url('fasilitas_kamar') ?>" role="button" class="btn btn-danger waves-effect waves-light m-l-5 batal">
							<i class="fa fa-times-circle"></i>&nbsp;Batal
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>