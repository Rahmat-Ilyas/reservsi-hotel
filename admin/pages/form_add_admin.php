<?php 
if (isset($_GET['id'])) {
	echo "<script>$(document).ready(function(){ $('#note').hide(); $('#username').attr('readonly', '') });</script>";
	$titel = "Edit Admin";
	$value = $_GET['id'];

	$id = $_GET['id'];
	$data = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id='$id'");
	foreach ($data as $dta) {
		$nama = $dta['nama'];
		$email = $dta['email'];
		$telepon = $dta['telepon'];
		$username = $dta['username'];
	}
}
else {
	$titel = "Tambah Admin";
	$value = 0;

	$nama = null;
	$email = null;
	$telepon = null;
	$username = null;
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
					<label for="nama" class="col-sm-3 control-label">Nama Admin</label>
					<div class="col-sm-7">
						<input type="text" required class="form-control" name="nama" id="nama" value="<?= $nama ?>" placeholder="Nama Fasilitas">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Email</label>
					<div class="col-sm-7">
						<input type="text" required class="form-control" name="email" id="email" value="<?= $email ?>" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
					<label for="telepon" class="col-sm-3 control-label">Telepon</label>
					<div class="col-sm-7">
						<input type="text" required class="form-control" name="telepon" id="telepon" value="<?= $telepon ?>" placeholder="Telepon">
					</div>
				</div>
				<div class="form-group">
					<label for="username" class="col-sm-3 control-label">Username</label>
					<div class="col-sm-7">
						<input type="text" required class="form-control" name="username" id="username" value="<?= $username ?>" placeholder="Username">
					</div>
				</div>
				<div class="form-group" id="note">
					<label for="" class="col-sm-3 control-label"></label>
					<p class="col-sm-7 text-success">Note: Password default adalah "admin"</p>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-7">
						<input type="hidden" value="<?= $value ?>" name="action">
						<button type="submit" class="btn btn-default waves-effect waves-light" name="simpan_data_admin">
							<i class="fa fa-save"></i>&nbsp;Simpan
						</button>
						<a href="web.php?<?= url('data_admin') ?>" role="button" class="btn btn-danger waves-effect waves-light m-l-5 batal">
							<i class="fa fa-times-circle"></i>&nbsp;Batal
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>