<?php 
require("config.php");

// Data Kamar
if (isset($_POST['simpan_kamar'])) {
	$status = $_POST['status'];

	if ($_POST['action'] == 0) {		
		$tipe_kamar = $_POST['tipe_kamar'];
		$no_kamar = $_POST['no_kamar'];
		$kd_kamar = $_POST['kd_kamar'];

		$query = "INSERT INTO tb_kamar VALUES ('', '$kd_kamar', '$no_kamar', '$tipe_kamar', '$status')";
		if (mysqli_query($conn, $query)) {
			$data = mysqli_query($conn, "SELECT tipe_kamar, COUNT(no_kamar) FROM tb_kamar WHERE tipe_kamar = '$tipe_kamar'");
			$get_data = mysqli_fetch_assoc($data);
			$jumlah_kamar = $get_data['COUNT(no_kamar)'];
			mysqli_query($conn, "UPDATE tb_tipe_kamar SET jumlah_kamar = '$jumlah_kamar' WHERE nama_tipe = '$tipe_kamar'");

			echo "<script>alert('Data berhasil ditambah'); document.location.href='web.php?".url('data_kamar')."'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan'); document.location.href='web.php?".url('form_kamar')."'</script>";
		}
	}
	else {
		$id = $_POST['action'];
		$query = "UPDATE tb_kamar SET status = '$status' WHERE id='$id'";
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Data berhasil diedit'); document.location.href='web.php?".url('data_kamar')."'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan'); document.location.href='web.php?".url('form_kamar')."&id=".$id."'</script>";
		}
	}
}

if (isset($_POST['hapus_kamar'])) {
	$id = $_POST['hapus_kamar'];
	$data = mysqli_query($conn, "SELECT * FROM tb_kamar WHERE id = '$id'");
	$get_data = mysqli_fetch_assoc($data);
	$tipe_kamar = $get_data['tipe_kamar'];

	$data1 = mysqli_query($conn, "SELECT tipe_kamar, COUNT(no_kamar) FROM tb_kamar WHERE tipe_kamar = '$tipe_kamar'");
	$get_data1 = mysqli_fetch_assoc($data1);
	$jumlah_kamar = $get_data1['COUNT(no_kamar)']-1;

	$query = "DELETE FROM tb_kamar WHERE id='$id'";
	if (mysqli_query($conn, $query)) {
		mysqli_query($conn, "UPDATE tb_tipe_kamar SET jumlah_kamar = '$jumlah_kamar' WHERE nama_tipe = '$tipe_kamar'");
		echo "<script>alert('Data berhasil dihapus'); document.location.href='web.php?".url('data_kamar')."'</script>";
	} else {
		echo "<script>alert('Terjadi kesalahan'); document.location.href='web.php?".url('data_kamar')."'</script>";
	}
}

if (isset($_POST['cari_kamar'])) {
	$tipe_kamar = $_POST['cari_kamar'];
	$data_tipe = mysqli_query($conn, "SELECT * FROM tb_kamar WHERE tipe_kamar = '$tipe_kamar' ORDER BY no_kamar");
	$get = 0;
	$i = 1;
	foreach ($data_tipe as $dta) {
		if ($dta['no_kamar'] != $i) {
			$cek[] = $i;
		}
		$get = $dta['no_kamar'];
		$i = $i+1;
	}

	if (isset($cek[0])) echo sprintf('%03s', $cek[0]);
	else echo sprintf('%03s', $get+1);
}

if (isset($_POST['set_kode'])) {
	$get_string = $_POST['set_kode'];
	$first = explode(' ', $get_string);
	$string = array_shift($first);

	$total = strlen($string);
	for ($i=0; $i < $total; $i++) { 
		$str[] = substr($string, $i, 1);
	}

	$f = 0;
	$m = $total/2;
	$l = $total-1;

	$data = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar WHERE nama_tipe='$get_string'");
	$dta = mysqli_fetch_assoc($data);

	$kode = $str[$f].$str[$m].$str[$l]."-".sprintf('%02s', $dta['id'])."-";
	echo $kode;
}

// Tipe Kamar
if (isset($_POST['cari_tipe'])) {
	$nama_tipe = $_POST['nama_tipe'];
	$data_tipe = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar WHERE nama_tipe = '$nama_tipe'");
	echo mysqli_num_rows($data_tipe);
}

if (isset($_POST['hapus_tipe_kamar'])) {
	$id = $_POST['hapus_tipe_kamar'];
	$kamar = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar WHERE id = '$id'");
	$get_kamar = mysqli_fetch_assoc($kamar);
	$img = $get_kamar['picture'];
	$picture = "assets/images/upload/".$img;
	if (file_exists($picture)) unlink($picture);

	$nama_tipe = $get_kamar['nama_tipe'];

	$query = "DELETE FROM tb_tipe_kamar WHERE id='$id'";
	if (mysqli_query($conn, $query)) {
		mysqli_query($conn, "DELETE FROM tb_kamar WHERE tipe_kamar = '$nama_tipe'");
		echo "<script>alert('Data berhasil dihapus'); document.location.href='web.php?".url('tipe_kamar')."'</script>";
	} else {
		echo "<script>alert('Terjadi kesalahan'); document.location.href='web.php?".url('tipe_kamar')."'</script>";
	}
}

function uang($string) {
	$pisah = explode('.', $string);
	$pisah1 = implode('.', $pisah);
	$ganti = str_replace('Rp.', '', $pisah1);
	$ganti1 = str_replace('.00', '', $ganti);
	$pisah_lagi = explode(',', $ganti1);
	$hasil = implode('', $pisah_lagi);
	return $hasil;
}

if (isset($_POST['simpan_tipe_kamar'])) {
	$nama_tipe = $_POST['nama_tipe'];
	$fas = $_POST['fasilitas'];
	$fasilitas = implode(',', $fas);
	$harga = $_POST['harga_kamar'];
	$harga_kamar = uang($harga);
	$biaya = $_POST['biaya_layanan'];
	$biaya_layanan = uang($biaya);

	if ($_FILES['picture']['name'] != null){
		$namafile = $_FILES['picture']['name'];
		$tmpname = $_FILES['picture']['tmp_name'];

		$ektensi = ['jpg','jpeg','png'];
		$ekstensigambar = explode('.', $namafile);
		$format = strtolower(end($ekstensigambar)) ;

		if (!in_array($format, $ektensi)) echo "<script>alert('Format file tidak didukung');  </script>";
		$nama_gambar =  uniqid().'.jpg';
		move_uploaded_file($tmpname,'assets/images/upload/'.$nama_gambar);
		$edit_img = true; 
	}
	else {
		$nama_gambar = $_POST['edit_img'];
		$edit_img = false;
	}

	$keterangan = $_POST['keterangan'];

	if ($_POST['action'] == 0) {
		$query = "INSERT INTO tb_tipe_kamar VALUES ('', '$nama_tipe', '$fasilitas', '$harga_kamar', '$biaya_layanan', 0, 0, '$nama_gambar', '$keterangan')";
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Data berhasil ditambah'); document.location.href='web.php?".url('tipe_kamar')."'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan'); document.location.href='web.php?".url('form_tipe_kamar')."'</script>";
		}
	}
	else {
		$id = $_POST['action'];

		$query = "UPDATE tb_tipe_kamar SET nama_tipe = '$nama_tipe', harga_kamar = '$harga_kamar', biaya_layanan = '$biaya_layanan', fasilitas = '$fasilitas', picture = '$nama_gambar', keterangan = '$keterangan' WHERE id='$id'";
		if (mysqli_query($conn, $query)) {
			if ($edit_img == true) {
				$img = $_POST['edit_img'];
				$picture = "assets/images/upload/".$img;
				if (file_exists($picture)) unlink($picture);
			}
			echo "<script>alert('Data berhasil diedit'); document.location.href='web.php?".url('tipe_kamar')."'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan'); document.location.href='web.php?".url('form_tipe_kamar')."'</script>";
		}
	}
}

// Fasilitas Kamar
if (isset($_POST['simpan_fasilitas_kamar'])) {
	$nama_fasilitas = $_POST['nama_fasilitas'];
	$keterangan = $_POST['keterangan'];

	if ($_POST['action'] == 0) {
		$query = "INSERT INTO tb_fasilitas_kamar VALUES ('', '$nama_fasilitas', '$keterangan')";
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Data berhasil ditambah'); document.location.href='web.php?".url('fasilitas_kamar')."'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan'); document.location.href='web.php?".url('form_fasilitas')."'</script>";
		}
	}
	else {
		$id = $_POST['action'];
		$query = "UPDATE tb_fasilitas_kamar SET nama_fasilitas = '$nama_fasilitas', keterangan = '$keterangan' WHERE id='$id'";
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Data berhasil diedit'); document.location.href='web.php?".url('fasilitas_kamar')."'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan'); document.location.href='web.php?".url('form_fasilitas')."&id=".$id."'</script>";
		}
	}
}

if (isset($_POST['hapus_fasilitas_kamar'])) {
	$id = $_POST['hapus_fasilitas_kamar'];
	$query = "DELETE FROM tb_fasilitas_kamar WHERE id='$id'";
	if (mysqli_query($conn, $query)) {
		echo "<script>alert('Data berhasil dihapus'); document.location.href='web.php?".url('fasilitas_kamar')."'</script>";
	} else {
		echo "<script>alert('Terjadi kesalahan'); document.location.href='web.php?".url('fasilitas_kamar')."'</script>";
	}

	$data = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar");
	foreach ($data as $i => $dta) {
		$id_tk = $dta['id'];
		$fasilitas = explode(",", $dta['fasilitas']);
		foreach ($fasilitas as $fas) {
			if ($fas != $id) {
				$set_fas[$i][] = $fas;
			}
		}
		$updt_fas = implode(",", $set_fas[$i]);
		mysqli_query($conn, "UPDATE tb_tipe_kamar SET fasilitas = '$updt_fas' WHERE id = '$id_tk'");
	}

}

// Data Admin
if (isset($_POST['simpan_data_admin'])) {
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$telepon = $_POST['telepon'];
	$username = $_POST['username'];
	$password = password_hash("admin", PASSWORD_DEFAULT);

	if ($_POST['action'] == 0) {
		$query = "INSERT INTO tb_admin VALUES ('', '$nama', '$email', '$telepon', 'default_admin.jpg', '$username', '$password')";
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Data berhasil ditambah'); document.location.href='web.php?".url('data_admin')."'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan'); document.location.href='web.php?".url('form_add_admin')."'</script>";
		}
	}
	else {
		$id = $_POST['action'];
		$query = "UPDATE tb_admin SET nama = '$nama', email = '$email', telepon = '$telepon', username = '$username' WHERE id='$id'";
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Data berhasil diedit'); document.location.href='web.php?".url('data_admin')."'</script>";
		} else {
			echo "<script>alert('Terjadi Kesalahan'); document.location.href='web.php?".url('form_add_admin')."&id=".$id."'</script>";
		}
	}
}

if (isset($_POST['hapus_admin'])) {
	$id = $_POST['hapus_admin'];
	$data = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id='id'");
	$dta = mysqli_fetch_assoc($data);
	$query = "DELETE FROM tb_admin WHERE id='$id'";
	if (mysqli_query($conn, $query)) {
		echo "<script>alert('Data berhasil dihapus'); document.location.href='web.php?".url('data_admin')."'</script>";
	} else {
		echo "<script>alert('Terjadi kesalahan'); document.location.href='web.php?".url('data_admin')."'</script>";
	}
}

if (isset($_POST['np_cekin'])) {
	$np = mysqli_real_escape_string($conn, $_POST['np_cekin']);
	$data = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE no_pemesanan = '$np' AND status = 'Booking '");
	$np = mysqli_fetch_assoc($data);
	if (is_array($np)) {
		$nama = $np['nama'];
		$tipe_kamar = $np['tipe_kamar'];
		$no_kamar = $np['no_kamar']; 
		$kamar = explode(',', $no_kamar);
	} else {
		$nama = "Tidak ada data";
		$tipe_kamar = "Tidak ada data";
		$no_kamar = "Tidak ada data";
		$kamar = "Tidak ada data";
	}?>
	<div class="form-group">
		<label class="col-sm-3 control-label">Nama</label>
		<div class="col-sm-8">
			<input type="text" id="nama" class="form-control" value="<?= $nama ?>" placeholder="Nama Pemesan" readonly />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Tipe Kamar</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" value="<?= $tipe_kamar ?>" placeholder="Tipe Kamar DIpesan" readonly />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Nomor Kamar Dipesan</label>
		<div class="col-sm-8">
			<select multiple="" size="<?= count($kamar)*2-1; ?>" class="form-control" readonly>
				<?php $no = 1; foreach ($kamar as $no_km) : ?>		
				<option>
					<?php 
					$nk = mysqli_query($conn, "SELECT * FROM tb_kamar WHERE no_kamar='$no_km' AND tipe_kamar = '$tipe_kamar'");
					$get_nk = mysqli_fetch_assoc($nk);
					if (mysqli_num_rows($nk) != 0)
					echo $no.". ".$no_km."/".$get_nk['kd_kamar'];
					else echo "Nomor Kamar Dipesan";
					?>
				</option>
				<option></option>
				<?php $no = $no + 1; endforeach; ?>				
			</select>
		</div>
	</div>
<?php }

if (isset($_POST['np_cekout'])) {
	$np = mysqli_real_escape_string($conn, $_POST['np_cekout']);
	$data = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE no_pemesanan = '$np' AND status = 'Cek In '");
	$np = mysqli_fetch_assoc($data);

	if (is_array($np)) {
		$nama = $np['nama'];
		$tipe_kamar = $np['tipe_kamar'];
		$tggl_cekin = date('Y-m-d', strtotime($np['tggl_cekin']));
		$no_kamar = $np['no_kamar']; 
	} else {
		$nama = "Tidak ada data";
		$tipe_kamar = "Tidak ada data";
		$tggl_cekin = date('Y-m-d');
		$no_kamar = "Tidak ada data";
	}

	echo $nama." ,, ".$tipe_kamar." ,, ".$tggl_cekin." ,, ".$no_kamar;
}
?>