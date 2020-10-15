<?php 
if (isset($_GET['id'])) {
	$titel = "Edit Tipe Kamar";
	$value = $_GET['id'];

	$id = $_GET['id'];
	$data = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar WHERE id='$id'");
	$i=0;
	foreach ($data as $dta) {
		$nama_tipe = $dta['nama_tipe'];
		$fas = $dta['fasilitas'];
		$harga_kamar = $dta['harga_kamar'];
		$biaya_layanan = $dta['biaya_layanan'];
		$picture = $dta['picture'];
		$keterangan = $dta['keterangan'];
	}
	$fasilitas = explode(',', $fas);
}
else {
	echo "<script>$(document).ready(function() { $('#picture').attr('required', ''); });</script>";
	$titel = "Tambah Tipe Kamar";
	$value = 0;
	$nama_tipe = null;
	$fasilitas = null;
	$harga_kamar = null;
	$biaya_layanan = null;
	$picture = 'Picture';
	$keterangan = null;
}
$_SESSION['title'] = "Admin : Hotel Paradiso Makassar";
?>
<div class="row">
	<div class="col-lg-12">
		<div class="card-box">
			<h4 class="m-t-0 header-title text-center" style="margin-bottom: 20px;"><b><?= $titel ?></b></h4>
			<hr>
			<form class="form-horizontal" role="form" method="POST" action="controller.php" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nama_tipe" class="col-sm-3 control-label">Tipe Kamar</label>
					<div class="col-sm-7">
						<input type="text" class="form-control nama_tipe" id="nama_tipe" name="nama_tipe" value="<?= $nama_tipe ?>" placeholder="Tipe Kamar" autocomplete="off" required>
					</div>
				</div>
				<div class="form-group">
					<label for="fasilitas_kamar" class="col-sm-3 control-label">Fasilitas Kamar</label>
					<div class="col-sm-7">
						<select multiple="multiple" class="multi-select" id="my_multi_select1" name="fasilitas[]" data-plugin="multiselect" required>
							<?php 
							$data_fasilitas = mysqli_query($conn, "SELECT * FROM tb_fasilitas_kamar"); 
							foreach ($data_fasilitas as $fas) :
								?>
								<option value="<?= $fas['id'] ?>" <?php if (isset($_GET['id'])) foreach ($fasilitas as $fas1) { if ($fas['id'] == $fas1) echo "selected"; } ?>> <?= $fas['nama_fasilitas'] ?></option>
							<?php endforeach; ?>
						</select>
						<p class="text-success">*Pilih fasilitas di kolom pertama</p>
					</div>
				</div>
				<div class="form-group">
					<label for="harga_kamar" class="col-sm-3 control-label">Harga Kamar</label>
					<div class="col-sm-7">
						<input type="text" data-a-sign="Rp. " class="form-control autonumber" name="harga_kamar" id="harga_kamar" value="<?= $harga_kamar ?>" placeholder="Harga Kamar" autocomplete="off" required>
					</div>
				</div>
				<div class="form-group">
					<label for="biaya_layanan" class="col-sm-3 control-label">Biaya Layanan</label>
					<div class="col-sm-7">
						<input type="text" data-a-sign="Rp. " class="form-control autonumber" name="biaya_layanan" id="biaya_layanan" value="<?= $biaya_layanan ?>" placeholder="Biaya Layanan" autocomplete="off" required>
					</div>
				</div>
				<div class="form-group">
					<label for="picture" class="col-sm-3 control-label">Picture</label>
					<div class="col-sm-7">
						<input type="file" class="filestyle" name="picture" id="picture" data-placeholder="<?= $picture ?>">
						<input type="hidden" name="edit_img" value="<?= $picture ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
					<div class="col-sm-7">
						<textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="8" required><?= $keterangan ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<<div class="col-sm-offset-3 col-sm-7">
						<input type="hidden" value="<?= $value ?>" name="action">
						<button type="submit" class="btn btn-default waves-effect waves-light" name="simpan_tipe_kamar">
							<i class="fa fa-save"></i>&nbsp;Simpan
						</button>
						<a href="web.php?<?= url('tipe_kamar') ?>" role="button" class="btn btn-danger waves-effect waves-light m-l-5 batal">
							<i class="fa fa-times-circle"></i>&nbsp;Batal
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="assets/plugins/autoNumeric/autoNumeric.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>

<script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
<script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>

<script>
	$(document).ready(function() {
		$('.nama_tipe').keyup(function() {
			var nama_tipe = $('.nama_tipe').val();

			$.ajax({
				url			: "controller.php",
				method		: "POST",
				data 		: { cari_tipe : "true", nama_tipe : nama_tipe },
				success		: function(data) {
					if (data == 1) {
						alert("Tipe kamar sudah ada, masukkan nama yang lain");
						$('.nama_tipe').val('');
					}
				}
			});
		});

		$('.autonumber').autoNumeric('init');
	});
</script>