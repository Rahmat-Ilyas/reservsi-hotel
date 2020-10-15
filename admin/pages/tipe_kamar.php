<?php 
$data = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar ORDER BY nama_tipe");
$_SESSION['set_page'] = "tipe_kamar";
$_SESSION['title'] = "Admin : Hotel Paradiso Makassar";
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<h4 class="m-t-0 header-title"><b>Data Tipe Kamar</b></h4>
			<hr>
			<div style="margin-bottom: 10px;">
				<a href="web.php?<?= url('form_tipe_kamar') ?>" role="button" class="btn btn-primary waves-effect waves-light tambah">
					<i class="fa fa-plus-square"></i>&nbsp;Tambah Kamar
				</a>
			</div>
			<table id="datatable" class="table table-striped table-bordered">
				<thead>
					<th>No</th>
					<th>Tipe Kamar</th>
					<th>Harga Kamar</th>
					<th>Biaya Layanan</th>
					<th>Jumlah Kamar</th>
					<th>Kamar Terpakai</th>
					<th style="max-width: 150px;">Action</th>
				</thead>

				<tbody>
					<?php $no = 1; foreach ($data as $dta) : ?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $dta['nama_tipe'] ?></td>
						<td><?= "Rp. ".$dta['harga_kamar'] ?></td>
						<td><?= "Rp. ".$dta['biaya_layanan'] ?></td>
						<td><?= $dta['jumlah_kamar'] ?></td>
						<td>
							<?= $dta['kamar_terpakai'] ?>
							<?php if ($dta['kamar_terpakai'] > 0): ?>
								<a href="javascript;" data-toggle="modal" data-target="#detail<?= $dta['id'] ?>">&nbsp;lihat detail..</a>
							<?php endif ?>
						</td>
						<td class="text-center">
							<a href="web.php?<?= url('detail_tipe_kamar') ?>&id=<?= $dta['id'] ?>" role="button" class="btn btn-default waves-effect waves-light edit" data-toggle1="tooltip" title="Lihat Detail">
								<i class="fa fa-eye"></i>
							</a>
							<a href="web.php?<?= url('form_tipe_kamar') ?>&id=<?= $dta['id'] ?>" role="button" class="btn btn-default waves-effect waves-light edit" data-toggle1="tooltip" title="Edit">
								<i class="fa fa-edit"></i>
							</a>
							<button class="btn btn-danger waves-effect waves-light" type="button" data-toggle="modal" data-target="#staticModal<?= $dta['id'] ?>" data-toggle1="tooltip" title="Hapus">
								<i class="fa fa-trash"></i>
							</button>
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
										<button type="submit" name="hapus_tipe_kamar" value="<?= $dta["id"]?>" class="btn btn-danger hapus">Hapus</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- End Konfirmasi Hapus -->

					<!-- Modal Detail -->
					<div id="detail<?= $dta['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h3 class="modal-title" id="myModalLabel">Detail Pengguna Kamar <?= $dta['nama_tipe'] ?></h3>
								</div>
								<div class="modal-body">
									<p style="font-size: 14px;">
										<?php
										$tk = $dta['nama_tipe'];
										$data_psn = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE tipe_kamar = '$tk' AND status != 'Cek Out'");
										foreach ($data_psn as $psn) { ?>
											<span class="row">
												<span class="col-sm-4">No Pemesanan :</span>
												<span class="col-sm-6"><?= $psn['no_pemesanan'] ?></span>
												<span class="col-sm-4">Nama Pemesan :</span>
												<span class="col-sm-6"><?= $psn['nama'] ?></span>
												<span class="col-sm-4">Kamar Dipakai :</span>
												<span class="col-sm-6">
													<?php
													$no_kamar = explode(",", $psn['no_kamar']);
													foreach ($no_kamar as $nk) {
														$dnk = mysqli_query($conn, "SELECT * FROM tb_kamar WHERE tipe_kamar = '$tk' AND no_kamar = '$nk'");
														$gnk = mysqli_fetch_assoc($dnk);
														echo "| ".$gnk['kd_kamar']." | ";
													}
													?>
												</span>
												<span class="col-sm-12">
													<a href="web.php?<?= url('detail_data_tamu')."&id=".$psn['id'] ?>">Lihat detail pemesanan</a>
												</span>
											</span>
										<?php } ?>
									</p><br>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					<?php $no = $no + 1; endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>