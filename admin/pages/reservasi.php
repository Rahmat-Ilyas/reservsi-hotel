<?php 
if (isset($_POST['cekin'])) {
	$np = $_POST['np_i'];
	$update = mysqli_query($conn, "UPDATE tb_pemesanan SET status = 'Cek In' WHERE no_pemesanan = '$np'");
	if (mysqli_affected_rows($conn))
		echo "<script>alert('Nomor Pemesanan ".$np." telah Cek In')</script>";
	else
		echo "<script>alert('Nomor Pemesanan tidak ditemukan')</script>";
}

if (isset($_POST['cekout'])) {
	$np = $_POST['np_o'];
	$tk = $_POST['tipe_kamar'];
	$no_kamar = explode(",", $_POST['no_kamar']);
	$update = mysqli_query($conn, "UPDATE tb_pemesanan SET status = 'Cek Out' WHERE no_pemesanan = '$np'");
	if (mysqli_affected_rows($conn))
		echo "<script>alert('Nomor Pemesanan ".$np." telah Cek Out')</script>";
	else
		echo "<script>alert('Nomor Pemesanan tidak ditemukan')</script>";

	foreach ($no_kamar as $nk) {
		mysqli_query($conn, "UPDATE tb_kamar SET status = 'Kosong' WHERE tipe_kamar = '$tk' AND no_kamar = '$nk'");
	}

	// Update kamar terpakai
	$get = mysqli_query($conn, "SELECT kamar_terpakai FROM tb_tipe_kamar WHERE nama_tipe = '$tk'");
	$dta = mysqli_fetch_assoc($get);
	$get_kmr = $dta['kamar_terpakai'];
	$kmr_pakai = $get_kmr - count($no_kamar);
	mysqli_query($conn, "UPDATE tb_tipe_kamar SET kamar_terpakai = '$kmr_pakai' WHERE nama_tipe = '$tk'");
}
$_SESSION['title'] = "Admin : Hotel Paradiso Makassar";
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<h4 class="m-t-0 m-b-30 header-title"><b>Reservasi</b></h4>
			<hr>
			<div class="row">
				<div class="col-lg-6" style="border-right: 1px solid">
					<h4 class="text-center"><b>Cek In</b></h4>

					<form class="form-horizontal group-border-dashed" method="POST">
						<div class="form-group">
							<label class="col-sm-3 control-label">No Pemesanan</label>
							<div class="col-sm-8">
								<input type="text" id="np_cekin" name="np_i" class="form-control" placeholder="Masukkan Nomor pemesanan" autocomplete="off" />
							</div>
						</div>
						<div class="content_cekin">
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama</label>
								<div class="col-sm-8">
									<input type="text" id="nama" class="form-control" placeholder="Nama Pemesan" readonly />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Tipe Kamar</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" placeholder="Tipe Kamar DIpesan" readonly />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nomor Kamar Dipesan</label>
								<div class="col-sm-8">
									<select multiple="" size="1" class="form-control" readonly>
										<option>Nomor Kamar Dipesan</option>		
									</select>
								</div>
							</div>
						</div>
						<div class="form-group text-right m-b-0">
							<div class="col-sm-3"></div>
							<div class="col-sm-8">
								<button type="submit" name="cekin" class="btn btn-default waves-effect waves-light m-l-5">Cek In</button>
							</div>
						</div>
					</form>
				</div>

				<div class="col-lg-6">
					<h4 class="text-center"><b>Cek Out</b></h4>
					<form class="form-horizontal group-border-dashed" method="POST">

						<div class="form-group">
							<label class="col-sm-3 control-label">No Pemesanan</label>
							<div class="col-sm-8">
								<input type="text" id="np_cekout" name="np_o" class="form-control" placeholder="Masukkan Nomor pemesanan" autocomplete="off" />
							</div>
						</div>
						<div class="content_cekout">
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama</label>
								<div class="col-sm-8">
									<input type="text" id="nama_o" class="form-control" placeholder="Nama Pemesan" readonly />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Tipe Kamar</label>
								<div class="col-sm-8">
									<input type="text" name="tipe_kamar" class="form-control" id="tipe_kamar_o" placeholder="Tipe Kamar DIpesan" readonly />
								</div>
							</div>
							<div class="form-group m-b-30">
								<label class="col-sm-3 control-label">Tanggal Cek In</label>
								<div class="col-sm-8">
									<input type="date" class="form-control" id="tggl_cekin" placeholder="Tipe Kamar DIpesan" readonly />
								</div>
							</div>
						</div>
						<input type="hidden" id="no_kamar" name="no_kamar">
						<div class="form-group text-right m-b-0">
							<div class="col-sm-3"></div>
							<div class="col-sm-8">
								<button type="submit" name="cekout" class="btn btn-default waves-effect waves-light m-l-5">Cek Out</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="">
	$(document).ready(function() {
		$('#np_cekin').click(function() {
			$('#np_cekin').val('PRDS-0')
		});

		$('#np_cekin').keyup(function() {
			var np_cekin = $('#np_cekin').val();
			$.ajax({
				url			: "controller.php",
				method		: "POST",
				data 		: { np_cekin : np_cekin },
				success		: function(data) {
					$('.content_cekin').html(data);
				}
			});
		});

		$('#np_cekout').click(function() {
			$('#np_cekout').val('PRDS-0')
		});

		$(document).on('keyup', '#np_cekout', function() {
			var np_cekout = $('#np_cekout').val();
			$.ajax({
				url			: "controller.php",
				method		: "POST",
				data 		: { np_cekout : np_cekout },
				success		: function(data) {
					var get_data = data.split(" ,, ");

					$('#nama_o').val(get_data[0]);
					$('#tipe_kamar_o').val(get_data[1]);
					$('#tggl_cekin').val(get_data[2]);
					$('#no_kamar').val(get_data[3]);
				}
			});
		});
	});
</script>