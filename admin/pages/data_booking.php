<?php 
$data = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE status = 'Booking'");
$_SESSION['set_page'] = "data_booking";
$_SESSION['title'] = "Admin : Hotel Paradiso Makassar";
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<h4 class="m-t-0 header-title"><b>Data Booking</b></h4>
			<hr>
			<table id="datatable" class="table table-striped table-bordered">
				<thead>
					<th>No</th>
					<th>No Pemesanan</th>
					<th>Nama Pemesan</th>
					<th>Email</th>
					<th>Tggl Cek In</th>
					<th>Tggl Cek Out</th>
					<th>Lama Inap</th>
					<th>Detail</th>
				</thead>

				<tbody>
					<?php $no = 1; foreach ($data as $dta) : ?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $dta['no_pemesanan'] ?></td>
						<td><?= $dta['nama'] ?></td>
						<td><?= $dta['email'] ?></td>
						<td><?= date('d M Y',strtotime($dta['tggl_cekin'])) ?></td>
						<td><?= date('d M Y',strtotime($dta['tggl_cekout'])) ?></td>
						<td><?= $dta['lama_inap'] ?> Hari</td>
						<td class="text-center">
							<a href="web.php?<?= url('detail_data_tamu') ?>&id=<?= $dta['id'] ?>" role="button" class="btn btn-default waves-effect waves-light edit" data-toggle1="tooltip" title="Lihat Detail">
								<i class="fa fa-eye"></i>
							</a>
						</td>
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
