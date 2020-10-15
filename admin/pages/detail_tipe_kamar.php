<?php 
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar WHERE id='$id'");
foreach ($data as $dta) {
	$nama_tipe = $dta['nama_tipe'];
	$fas = $dta['fasilitas'];
	$harga_kamar = $dta['harga_kamar'];
	$biaya_layanan = $dta['biaya_layanan'];
	$jumlah_kamar = $dta['jumlah_kamar'];
	$kamar_terpakai = $dta['kamar_terpakai'];
	$picture = $dta['picture'];
	$keterangan = $dta['keterangan'];
}

if (mysqli_num_rows($data) == 0) echo "<script>document.location.href='web.php?".url('404')."'</script>";

$fasilitas = explode(',', $fas);
$_SESSION['title'] = "Admin : Hotel Paradiso Makassar";
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<h4 class="m-t-0 header-title text-center" style="margin-bottom: 20px;"><b>Detail Tipe Kamar</b></h4>
			<hr>
			<div class="col-sm-12 text-center" style="margin-top: -10px; margin-bottom: 10px;">
				<h2 style="text-decoration: underline;"><?= strtoupper($nama_tipe) ?></h2>
				<img src="assets/images/upload/<?= $picture ?>" alt="image" class="img-responsive img-thumbnail" style="height: 300px; width: 600px;" />
			</div>
			<form class="form-horizontal" role="form" method="POST" action="controller.php" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nama_tipe" class="col-sm-4 control-label">Tipe Kamar</label>
					<div class="col-sm-5">
						<input type="text" class="form-control nama_tipe" id="nama_tipe" name="nama_tipe" value="<?= $nama_tipe ?>" placeholder="Tipe Kamar" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="fasilitas_kamar" class="col-sm-4 control-label">Fasilitas Kamar</label>
					<div class="col-sm-5">
						<select multiple="" size="<?= count($fasilitas)*2-1; ?>" class="form-control" readonly>
							<?php $no = 1; foreach ($fasilitas as $dta) : ?>		
							<option>
								<?php 
								$fas = mysqli_query($conn, "SELECT * FROM tb_fasilitas_kamar WHERE id='$dta'");
								$get_fas = mysqli_fetch_assoc($fas);
								echo $no.". ".$get_fas['nama_fasilitas'];
								?>
							</option>
							<option></option>
							<?php $no = $no + 1; endforeach; ?>				
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="harga_kamar" class="col-sm-4 control-label">Harga Kamar</label>
					<div class="col-sm-5">
						<input type="text" data-a-sign="Rp. " class="form-control autonumber" name="harga_kamar" id="harga_kamar" value="<?= $harga_kamar ?>" placeholder="Harga Kamar" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="biaya_layanan" class="col-sm-4 control-label">Biaya Layanan</label>
					<div class="col-sm-5">
						<input type="text" data-a-sign="Rp. " class="form-control autonumber" name="biaya_layanan" id="biaya_layanan" value="<?= $biaya_layanan ?>" placeholder="Biaya Layanan" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="biaya_layanan" class="col-sm-4 control-label">Jumlah Kamar</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" value="<?= $jumlah_kamar ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="biaya_layanan" class="col-sm-4 control-label">Kamar Terpakai</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" value="<?= $kamar_terpakai ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="keterangan" class="col-sm-4 control-label">Keterangan</label>
					<div class="col-sm-5">
						<textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="8" readonly><?= $keterangan ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<<div class="col-sm-offset-4 col-sm-5">
						<input type="hidden" value="<?= $value ?>" name="action">
						<a href="web.php?<?= url('form_tipe_kamar') ?>&id=<?= $id ?>" role="button" class="btn btn-success waves-effect waves-light edit">
							<i class="fa fa-edit"></i>&nbsp;Edit
						</a>
						<a href="web.php?<?= url('tipe_kamar') ?>" role="button" class="btn btn-default waves-effect waves-light edit">
							<i class="fa fa-reply-all"></i>&nbsp;Kembali
						</a>
					</div>
				</div>
			</form> 
		</div>
	</div>
</div>