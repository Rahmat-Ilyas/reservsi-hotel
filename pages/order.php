<?php 
if (!isset($_GET['id'])) header("location: web.php?".url('404'));
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar WHERE id=$id");
if (!mysqli_num_rows($data)) header("location: web.php?".url('404'));

$dta = mysqli_fetch_assoc($data);
$fasilitas = explode(',', $dta['fasilitas']);
$jumlah_kamar = $dta['jumlah_kamar'];
$kamar_terpakai = $dta['kamar_terpakai'];
$kamar_tersedia = $jumlah_kamar-$kamar_terpakai;

$data_kamar = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar WHERE id != $id");

require 'template/header.php'; 
?>
<section class="building_construction_area">
    <div class="container">
        <div  class="row building_construction_row">
            <div  class="col-sm-8 constructing_laft">
                <center><h2 style="margin-top: -60px"><?= $dta['nama_tipe'] ?></h2></center>
                <img src="admin/assets/images/upload/<?= $dta['picture'] ?>" alt=""><br><br>
                <div class="col-sm-15    constructing_right">
                    <div class="contact_us"><!-- 
                        <div style="border: 4px #000000 solid; background-color: white; height: 55px; width: 195px; "> -->
                            <div class="renovation_content">
                                <h1 style="color: red; text-align:right;"><?= "Rp. ".$dta['harga_kamar'] ?>/Hari</h1><br>
                                <h1 style="color: white ">Deskripsi detail Kamar</h1><br>
                            </div>
                            <p style="text-align: center; font-size: 20px;">
                                <?= $dta['keterangan'] ?>
                            </p><br>
                            <center><h3 style="color: white">Apa yang tersedia untuk Anda</h3></center><br><br>

                            <div class="row">
                                <div class="col-lg-12">
                                    <?php foreach ($fasilitas as $fas) {
                                        $dta_fas = mysqli_query($conn, "SELECT * FROM tb_fasilitas_kamar WHERE id='$fas'");
                                        $get_fas = mysqli_fetch_assoc($dta_fas);
                                        ?>
                                        <div class="col-sm-4">
                                            <h5><i class="fa fa-chevron-right"></i>&nbsp;<?= $get_fas['nama_fasilitas'] ?></h5><br>
                                        </div>
                                    <?php } ?>
                                </div>
                                <center>
                                    <a href="javascript:;" id="pesan">
                                        <button class="button_all" type="submit" style="margin-bottom: -30px;">Pesan</button>
                                    </a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 constructing_right">
                    <center><h2 style="margin-top: -60px">PILIHAN KAMAR LAINNYA</h2></center>
                    <ul class="painting">
                        <?php foreach ($data_kamar as $dt) { ?>
                            <li>
                                <a href="web.php?<?= url('order').'&id='.$dt['id'] ?>"><i class="fa fa-home" aria-hidden="true"></i><?= $dt['nama_tipe'] ?></a>
                            </li>
                            <img src="admin/assets/images/upload/<?= $dt['picture'] ?>" width="360px" height="170px" alt=""><br><br>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Building Construction Area -->

    <script>
        $(document).ready(function() {
            var kamar_tersedia = <?= $kamar_tersedia ?>;
            $('#pesan').click(function() {
                if (kamar_tersedia == 0) {
                    alert("Kamar sudah penuh. Pilih kamar lain");
                    document.location.href="web.php?<?= url('room') ?>";
                }
                else {
                    document.location.href="web.php?<?= url('reservasi').'&id='.$dta['id'] ?>";
                }
            });
        })
    </script>


    <!-- End Our Team Area -->
    <?php 
    require 'template/footer.php'
    ?>
