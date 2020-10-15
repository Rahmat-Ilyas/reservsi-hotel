<?php 
$data = mysqli_query($conn, "SELECT * FROM tb_transaksi");
$_SESSION['set_page'] = "data_transaksi";
$_SESSION['title'] = "Admin : Hotel Paradiso Makassar";
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<h4 class="m-t-0 header-title"><b>Data Transaksi</b></h4>
			<hr>
			<table id="datatable" class="table table-striped table-bordered">
				<thead>
					<th>No</th>
					<th>No Pemesanan</th>
					<th>No Kartu Kredit</th>
					<th>Jenis Kartu</th>
					<th>Total Harga Kamar</th>
					<th>Total Biaya Layanan</th>
					<th>Total Transaksi</th>
				</thead>

				<tbody>
					<?php $no = 1; foreach ($data as $dta) : ?>
					<tr>
						<td><?= $no ?></td>
						<td>
							<?php 
							$no_pemesanan = $dta['no_pemesanan'];
							$data = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE no_pemesanan = '$no_pemesanan'");
							$id = mysqli_fetch_assoc($data);
							?>
							<a href="web.php?<?= url('detail_data_tamu')."&id=".$id['id'] ?>"><?= $dta['no_pemesanan'] ?></a>
						</td>
						<td><?= $dta['no_kartu_kredit'] ?></td>
						<td><?= $dta['jenis_kartu'] ?></td>
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
