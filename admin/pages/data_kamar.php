<?php 
$data = mysqli_query($conn, "SELECT * FROM tb_kamar ORDER BY kd_kamar");
$_SESSION['title'] = "Admin : Hotel Paradiso Makassar";
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<h4 class="m-t-0 header-title"><b>Data Kamar</b></h4>
			<hr>
			<div style="margin-bottom: 10px;">
				<a href="web.php?<?= url('form_kamar') ?>" role="button" class="btn btn-primary waves-effect waves-light tambah">
					<i class="fa fa-plus-square"></i>&nbsp;Tambah Kamar
				</a>
			</div>
			<table id="datatable" class="table table-striped table-bordered">
				<thead>
					<th>No</th>
					<th>Kode Kamar</th>
					<th>Tipe Kamar</th>
					<th>Nomor Kamar</th>
					<th>Status</th>
					<th style="max-width: 50px;">Action</th>
				</thead>

				<tbody>
					<?php $no = 1; foreach ($data as $dta) : ?>
					<tr>
						<td><?= $no ?></td>
						<td><?= $dta['kd_kamar'] ?></td>
						<td><?= $dta['tipe_kamar'] ?></td>
						<td><?= sprintf('%03s', $dta['no_kamar']) ?></td>
						<td><?= $dta['status'] ?></td>
						<td class="text-center">
							<a href="web.php?<?= url('form_kamar') ?>&id=<?= $dta['id'] ?>" role="button" class="btn btn-default waves-effect waves-light edit" data-toggle1="tooltip" title="Edit">
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
