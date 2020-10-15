<?php 
$data = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar ORDER BY nama_tipe");
$_SESSION['title'] = "Laporan Data Kamar";
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<h4 class="m-t-0 header-title"><b>Laporan Data Kamar</b></h4>
			<hr>
			<table id="datatable-buttons" class="table table-striped table-bordered">
				<thead>
					<th>No</th>
					<th>Tipe Kamar</th>
					<th>Harga Kamar</th>
					<th>Biaya Layanan</th>
					<th>Jumlah Kamar</th>
					<th>Kamar Terpakai</th>
					<th>Kamar Kosong</th>
				</thead>

				<tbody>
					<?php $no = 1; foreach ($data as $dta) : ?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $dta['nama_tipe'] ?></td>
						<td><?= $dta['harga_kamar'] ?></td>
						<td><?= $dta['biaya_layanan'] ?></td>
						<td><?= $dta['jumlah_kamar'] ?> Kamar</td>
						<td><?= $dta['kamar_terpakai'] ?> Kamar</td>
						<td><?= $dta['jumlah_kamar']-$dta['kamar_terpakai'] ?> Kamar</td>
					</tr>
					<!-- Konfirmasi Hapus -->
					<div class="modal fade" id="staticModal<?= $dta['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-sm" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="staticModalLabel">Hapus Data</h5>
								</div>
								<div class="modal-body">
									<p>Yakin ingin menghapus data ini?</p>
								</div>
								<div class="modal-footer form-inline">
									<form action="controller.php" method="POST">
										<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
										<button type="submit" name="hapus_kamar" value="<?= $dta["id"]?>" class="btn btn-danger hapus">Hapus</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- End Konfirmasi Hapus -->
					<?php $no = $no + 1; endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
