<?php 
// data pemesan
if (isset($_SESSION['pemesanan'])) {
    $no_pemesanan = $_SESSION['pemesanan']['no_pemesanan'];
    $nama = $_SESSION['pemesanan']['nama'];
    $email = $_SESSION['pemesanan']['email'];
    $tggl_cekin = $_SESSION['pemesanan']['tggl_cekin'];
    $tggl_cekout = $_SESSION['pemesanan']['tggl_cekout'];
    $jum_kmr = $_SESSION['pemesanan']['jum_kmr'];
    $tipe_kamar = $_SESSION['pemesanan']['tipe_kamar'];
    $no_kamar1 = $_SESSION['pemesanan']['no_kamar1'];
    $no_kamar2 = $_SESSION['pemesanan']['no_kamar2'];
    $no_kamar3 = $_SESSION['pemesanan']['no_kamar3'];

    $data_kmr = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar WHERE nama_tipe = '$tipe_kamar'");
    $dta = mysqli_fetch_assoc($data_kmr);

    $sls = strtotime($tggl_cekout) - strtotime($tggl_cekin);
    $hari = $sls/(60*60*24)+1;

    $ttl_hrg_kmr = $dta['harga_kamar'] * $jum_kmr * $hari;
    $ttl_by_lyn = $dta['biaya_layanan'] * $jum_kmr * $hari;
    $total_bayar = $ttl_hrg_kmr + $ttl_by_lyn;
}
else header("location: web.php?".url('404'));


if (isset($_POST['nama_tipe'])) {

}

require 'template/header.php';  
?>
<!-- All contact Info -->        
<section class="blog_all">
    <div class="container">
        <div class="row m0 blog_row">
            <center>
                <div style="width: 1100px; height: 50px; font-size: 20px; color: black; margin-top: -90px;"  class="alert alert-success alert-dismissible" role="alert">
                  <button  type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <center>
                    <strong>Anda hampir sampai!</strong>&nbsp;Kami hanya perlu sedikit rincian lagi.
                </center>
            </div>
        </center>
        <div  class="col-sm-12 main_blog">
          <img src="admin/assets/images/upload/<?= $dta['picture'] ?>" style="height: 500px; width: 1000px; left: -200px;" alt="">
          <div class="col-xs-1 p0">
            <div class="col-md-10">
               <div class="blog_date">
                   <a href="#"><?= date('d') ?></a>
                   <a href="#"><?= date('M') ?></a>
               </div>
           </div>
       </div>
       <div class="post_comment row" style="margin-top: 30px;">
        <div class="col-md-4">
            <div class="col-md-12" style="margin-bottom: 30px;">
                <label style="font-size: 27px;">Data Reservasi</label>
                <div class="row col-md-12" style="margin-bottom: 10px;">
                   <label style="font-size: 17px">Check-In:</label>
                   <input type="date" class="form-control input_box" id="fullname" value="<?= $tggl_cekin ?>" readonly>
               </div>
               <div class="row col-md-12">
                <label style="font-size: 17px">Check-Out:</label >
                <input type="date" class="form-control input_box" id="fullname" value="<?= $tggl_cekout ?>" readonly>
            </div>
            <div class="row col-sm-12"><hr></div>
            <div class="row">
                <label class="col-md-7" style="font-size: 15px"> Jumlah Kamar di Pesan</label>
                <label class="col-md-5" style="font-size: 15px"><?= $jum_kmr ?> Kamar</label> 
            </div>
            <div class="row">
                <label class="col-md-7" style="font-size: 15px">Lama Menginap</label>
                <label class="col-md-5" style="font-size: 15px"><?= $hari ?> Hari</label> 
            </div>
        </div>
        <div class="col-md-12">
            <label style="font-size: 27px;">Detail Pembayaran</label>
            <div class="row">
                <label class="col-md-7" style="font-size: 15px">Kamar/Hari</label>
                <label class="col-md-5" style="font-size: 15px">Rp. <?= $dta['harga_kamar'] ?></label> 
            </div>
            <div class="row">
                <label class="col-md-7" style="font-size: 15px">Biaya Layanan/Hari</label>
                <label class="col-md-5" style="font-size: 15px">Rp. <?= $dta['biaya_layanan'] ?></label> 
            </div>
            <hr>
            <div class="row">
                <label class="col-md-7" style="font-size: 15px"> Total Harga Kamar</label>
                <label class="col-md-5" style="font-size: 15px">Rp. <?= $ttl_hrg_kmr ?></label> 
            </div>
            <div class="row">
                <label class="col-md-7" style="font-size: 15px"> Total Harga Layanan</label>
                <label class="col-md-5" style="font-size: 15px">Rp. <?= $ttl_by_lyn ?></label> 
            </div>
            <hr>
            <div class="row">
                <label class="col-md-7" style="font-size: 17px"> Total Pembayaran</label>
                <label class="col-md-5" style="font-size: 17px">Rp. <?= $total_bayar ?></label> 
            </div>
        </form>
    </div>
</div>
<div class="col-md-8" style="border-left: 1px solid; padding: 0px 40px 30px; margin-bottom: -20px;">
    <form class="comment_box" method="POST" action="controller.php">
        <div class="row col-md-12">
            <label style="font-size: 27px;">Masukkan Rincian Anda</label>
            <div class="row">
                <div class="col-md-4">
                    <label style="font-size: 17px; margin-top: 10px;"><?= $nama ?></label><br>
                    <label style="font-size: 15px"><?= $email ?></label>
                </div>
                <div class="col-md-4">
                    <label style="font-size: 17px; margin-top: 10px;"><?= $no_pemesanan ?></label><br>
                    <label style="font-size: 15px"><?= $hari ?> Hari</label>
                </div>
                <div class="col-md-4">
                    <label style="font-size: 17px; margin-top: 10px;"><?= $tipe_kamar ?></label><br>
                    <label style="font-size: 15px"><?= $jum_kmr ?> Kamar</label>
                </div>
            </div>
        </div>
        <div class="row col-md-12"><hr></div>
        <div class="row col-md-12" style="">
            <div class="row">
                <div class="col-md-6">
                    <label style="font-size: 17px">Nomor Telpon*</label>
                    <input type="text" class="form-control input_box" id="telepon" placeholder="Nomor Telpon*" name="telepon" required>
                </div>
                <div class="col-md-6">
                    <label style="font-size: 17px">Alamat*</label>
                    <input type="text" class="form-control input_box" id="alamat" name="alamat" placeholder="Alamat*" required>
               </div>
           </div>
       </div>
       <div class="row col-md-12" style="margin-top: 40px;"><hr></div>
       <div class="row col-md-12">
        <label style="font-size: 27px;">Masukkan Jaminan Reservasi Anda</label>
        <div class="row" style="margin-top: 10px;">
            <div class="col-md-6">
               <label style="font-size: 17px">Nomor Kartu Kredit*</label style="font-size: 17px">
                <input type="text" class="form-control input_box" name="no_kartu_kredit" placeholder="Nomor Kartu Kredit*" required>
            </div>
            <div class="col-md-6">
               <label style="font-size: 17px">Jenis Kartu*</label>
               <select type="text" class="form-control input_box" name="jenis_kartu" required>
                   <option>Jenis Kartu</option>
                   <option>Debit BCA</option>
                   <option>Debit Mandiri</option>
                   <option>Kartu Bayar</option>
               </select>
           </div>
           <div class="col-md-6 row">
               <div class="col-md-6">
                <br><br><label style="font-size: 15px">Masa berlaku*</label style="font-size: 15px">
                   <select type="text" class="form-control input_box" name="masa_berlaku" required>
                       <option value="">Masa berlaku</option>
                       <option value="01">01</option>
                       <option value="02">02</option>
                       <option value="03">03</option>
                       <option value="04">04</option>
                       <option value="05">05</option>
                       <option value="06">06</option>
                       <option value="07">07</option>
                       <option value="08">08</option>
                       <option value="09">09</option>
                       <option value="10">10</option>
                       <option value="11">11</option>
                       <option value="12">12</option>
                   </select>  
               </div>
               <div class="col-md-6">
                <br><br><label style="font-size: 15px">Tahun*</label style="font-size: 15px">
                   <select type="text" class="form-control input_box" name="tahun" required>
                       <option value="">Tahun</option>
                       <option value="2019">2019</option>
                       <option value="2021">2021</option>
                       <option value="2022">2022</option>
                       <option value="2023">2023</option>
                       <option value="2024">2024</option>
                       <option value="2025">2025</option>
                       <option value="2026">2026</option>
                       <option value="2027">2027</option>
                       <option value="2028">2028</option>
                   </select><br>
               </div>
           </div>
           <label style="font-size: 15px;">&emsp;<input type="checkbox" required>&nbsp;Saya menyetujui ketentuan pemesanan dan syarat umum dengan membuat pemesanan ini.</label><br>
           <div class="roe col-md-12">
            <input type="hidden" name="lama_inap" value="<?= $hari ?>">
            <input type="hidden" name="ttl_hrg_kmr" value="<?= $ttl_hrg_kmr ?>">
            <input type="hidden" name="ttl_by_lyn" value="<?= $ttl_by_lyn ?>">
            <input type="hidden" name="total_bayar" value="<?= $total_bayar ?>">
            <button class="btn-warning" type="submit" name="transaksi">Transaksi</button>
            <a href="web.php?<?= url('room') ?>">
                <button class="btn-primary" type="button" style="background: #808080;">Batal</button>
            </a>
        </div>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>

<!-- End All contact Info -->
<?php 
require 'template/footer.php'
?>