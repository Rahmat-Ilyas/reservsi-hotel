<?php 
if (isset($_GET['id'])) {
	echo "<script>$(document).ready(function() { $('.tipe_kamar').attr('disabled', ''); });</script>";
	$titel = "Edit Data Kamar";
	$value = $_GET['id'];

	$id = $_GET['id'];
	$data = mysqli_query($conn, "SELECT * FROM tb_kamar WHERE id='$id'");
	foreach ($data as $dta) {
		$_POST['tipe_kamar'] = $dta['tipe_kamar'];
		$tipe_kamar = $dta['tipe_kamar'];
		$no_kamar = sprintf('%03s', $dta['no_kamar']);
		$kd_kamar = $dta['kd_kamar'];
		$status = $dta['status'];
	}
}
else {
	$titel = "Tambah Data Kamar";
	$value = 0;

	$tipe_kamar = null;
	$no_kamar = null;
	$kd_kamar = null;
	$status = null;
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
					<label for="tipe_kamar" class="col-sm-3 control-label">Tipe Kamar</label>
					<div class="col-sm-7">
						<select name="tipe_kamar" class="form-control tipe_kamar" required>
							<option value="">---Pilih Tipe Kamar---</option>
							<?php 
							$data_tipe = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar"); 
							foreach ($data_tipe as $tipe) :
								?>
								<option class="tipe" 
								<?php if ($tipe_kamar == $tipe['nama_tipe']) echo "selected" ?>
								value="<?= $tipe['nama_tipe'] ?>"><?= $tipe['nama_tipe'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group append">
					<label for="no_kamar" class="col-sm-3 control-label">Nomor Kamar</label>
					<div class="col-sm-7">
						<input type="text" required class="form-control" name="no_kamar" id="no_kamar" value="<?= $no_kamar ?>" placeholder="Nomor Kamar" readonly required>
					</div>
				</div>
				<div class="form-group append">
					<label for="kd_kamar" class="col-sm-3 control-label">Kode Kamar</label>
					<div class="col-sm-7">
						<input type="text" required class="form-control" name="kd_kamar" id="kd_kamar" value="<?= $kd_kamar ?>" placeholder="Kode Kamar" readonly required>
					</div>
				</div>
				<div class="form-group">
					<label for="status" class="col-sm-3 control-label">Status</label>
					<div class="col-sm-7">
						<select name="status" class="form-control status">
							<?php 
							$set_status = ['Kosong', 'Terisi']; 
							foreach ($set_status as $sts) :
								?>
								<option 
								<?php if ($status == $sts) echo "selected" ?>
								value="<?= $sts ?>"><?= $sts ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-7">
						<input type="hidden" value="<?= $value ?>" name="action">
						<button type="submit" class="btn btn-default waves-effect waves-light" name="simpan_kamar">
							<i class="fa fa-save"></i>&nbsp;Simpan
						</button>
						<a href="web.php?<?= url('data_kamar') ?>" role="button" class="btn btn-danger waves-effect waves-light m-l-5 batal">
							<i class="fa fa-times-circle"></i>&nbsp;Batal
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
<script src="assets/plugins/autoNumeric/autoNumeric.js" type="text/javascript"></script>

<script>
	$(document).ready(function() {
		$('.tipe_kamar').click(function() {
			var tipe = $('.tipe_kamar').val();
			if (tipe!="") {
				$.ajax({
					url		: "controller.php",
					method	: "POST",
					data 	: { cari_kamar: tipe },
					success	: function(data) {
						$('#no_kamar').val(data);
					}
				});

				$.ajax({
					url		: "controller.php",
					method	: "POST",
					data 	: { set_kode: tipe },
					success	: function(data) {
						$('#kd_kamar').val(data+$('#no_kamar').val());
					}
				});
			}
			else {
				$('#no_kamar').val('');
				$('#kd_kamar').val('');
			}
		});

		$('.autonumber').autoNumeric('init');  
	});
</script>