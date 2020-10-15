<?php 
$data = mysqli_query($conn, "SELECT * FROM tb_pemesanan ORDER BY status");
$_SESSION['title'] = "Laporan Data Tamu";
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<h4 class="m-t-0 header-title"><b>Laporan Data Tamu</b></h4>
			<hr>
			<table id="datatable-buttons" class="table table-striped table-bordered">
				<thead>
					<th>No</th>
					<th>Nama Pemesan</th>
					<th>Telepon</th>
					<th>Tipe Kamar</th>
					<th>Kamar Dipesan</th>
					<th>Tggl Cek In</th>
					<th>Tggl Cek Out</th>
					<th>Lama Inap</th>
					<th>Status</th>
				</thead>

				<tbody>
					<?php $no = 1; foreach ($data as $dta) : ?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $dta['nama'] ?></td>
						<td><?= $dta['telepon'] ?></td>
						<td><?= $dta['tipe_kamar'] ?></td>
						<td><?= $dta['jum_kmr'] ?> Kamar</td>
						<td><?= date('d M Y',strtotime($dta['tggl_cekin'])) ?></td>
						<td><?= date('d M Y',strtotime($dta['tggl_cekout'])) ?></td>
						<td><?= $dta['lama_inap'] ?> Hari</td>
						<td><?= $dta['status'] ?></td>
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
