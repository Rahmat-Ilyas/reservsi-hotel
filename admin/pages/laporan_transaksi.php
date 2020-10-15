<?php 
$data = mysqli_query($conn, "SELECT * FROM tb_transaksi");
$_SESSION['title'] = "Laporan Transaksi";
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<h4 class="m-t-0 header-title"><b>Laporan Transaksi</b></h4>
			<hr>
			<table id="datatable-buttons" class="table table-striped table-bordered">
				<thead>
					<th>No</th>
					<th>Nama Pemesan</th>
					<th>Tipe Kamar</th>
					<th>Tggl Cek In</th>
					<th>Tggl Cek Out</th>
					<th>Lama Inap</th>
					<th>Biaya Kamar</th>
					<th>Biaya Layanan</th>
					<th>Total</th>
				</thead>

				<tbody>
					<?php $no = 1; foreach ($data as $dta) : ?>
					<tr>
						<?php 
						$np = $dta['no_pemesanan'];
						$data_tamu = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE no_pemesanan='$np'");
						$dtt = mysqli_fetch_assoc($data_tamu);
						?>
						<td><?= $no ?></td>
						<td><?= $dtt['nama'] ?></td>
						<td><?= $dtt['tipe_kamar'] ?></td>
						<td><?= date('d M Y',strtotime($dtt['tggl_cekin'])) ?></td>
						<td><?= date('d M Y',strtotime($dtt['tggl_cekout'])) ?></td>
						<td><?= $dtt['lama_inap'] ?> Hari</td>
						<td>Rp. <?= $dta['ttl_harga_kamar'] ?></td>
						<td>Rp. <?= $dta['ttl_biaya_layanan'] ?></td>
						<td>Rp. <?= $dta['total_bayar'] ?></td>
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
