<?php 
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE id='$id'");
foreach ($data as $dta) {
	$no_pemesanan = $dta['no_pemesanan'];
	$nama = $dta['nama'];
	$email = $dta['email'];
	$telepon = $dta['telepon'];
	$alamat = $dta['alamat'];
	$tggl_cekin = $dta['tggl_cekin'];
	$tggl_cekout = $dta['tggl_cekout'];
	$lama_inap = $dta['lama_inap'];
	$tipe_kamar = $dta['tipe_kamar'];
	$jum_kmr = $dta['jum_kmr'];
	$no_kamar = $dta['no_kamar'];
	$status = $dta['status'];
}
if (mysqli_num_rows($data) == 0) echo "<script>document.location.href='web.php?".url('404')."'</script>";

$kamar = explode(',', $no_kamar);
$set_page = $_SESSION['set_page'];
$_SESSION['title'] = "Admin : Hotel Paradiso Makassar";
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			<h4 class="m-t-0 header-title text-center" style="margin-bottom: 20px;"><b>Detail Data Pemesan</b></h4>
			<hr>
			<form class="form-horizontal" role="form" method="POST" action="controller.php" enctype="multipart/form-data">
				<div class="form-group">
					<label for="" class="col-sm-4 control-label">No Pemesanan</label>
					<div class="col-sm-5">
						<input type="text" class="form-control " value="<?= $no_pemesanan ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-4 control-label">Nama</label>
					<div class="col-sm-5">
						<input type="text" class="form-control " value="<?= $nama ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-4 control-label">Email</label>
					<div class="col-sm-5">
						<input type="text" class="form-control " value="<?= $email ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-4 control-label">Alamat</label>
					<div class="col-sm-5">
						<textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" rows="4" readonly><?= $alamat ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-4 control-label">Tanggal Cek-In</label>
					<div class="col-sm-5">
						<input type="text" class="form-control " value="<?= date('d M Y',strtotime($tggl_cekin)) ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-4 control-label">Tanggal Cek-Out</label>
					<div class="col-sm-5">
						<input type="text" class="form-control " value="<?= date('d M Y',strtotime($tggl_cekout)) ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-4 control-label">Lama Menginap</label>
					<div class="col-sm-5">
						<input type="text" class="form-control " value="<?= $lama_inap ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-4 control-label">Tipe Kamar</label>
					<div class="col-sm-5">
						<input type="text" class="form-control " value="<?= $tipe_kamar ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Nomor Kamar Dipesan</label>
					<div class="col-sm-5">
						<select multiple="" size="<?= count($kamar)*2-1; ?>" class="form-control" readonly>
							<?php $no = 1; foreach ($kamar as $no_km) : ?>		
							<option>
								<?php 
								$nk = mysqli_query($conn, "SELECT * FROM tb_kamar WHERE no_kamar='$no_km' AND tipe_kamar = '$tipe_kamar'");
								$get_nk = mysqli_fetch_assoc($nk);
								echo $no.". ".$no_km."/".$get_nk['kd_kamar'];
								?>
							</option>
							<option></option>
							<?php $no = $no + 1; endforeach; ?>				
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="harga_kamar" class="col-sm-4 control-label">Status</label>
					<div class="col-sm-5">
						<input type="text" data-a-sign="Rp. " class="form-control autonumber" name="harga_kamar" id="harga_kamar" value="<?= $status ?>" placeholder="Harga Kamar" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-5">
						<a href="web.php?<?= url($set_page) ?>" role="button" class="btn btn-default waves-effect waves-light edit">
							<i class="fa fa-reply-all"></i>&nbsp;Kembali
						</a>
					</div>
				</div>
			</form> 
		</div>
	</div>
</div>