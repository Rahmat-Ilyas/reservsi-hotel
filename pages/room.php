<?php 
require 'template/header.php'; 

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM tb_tipe_kamar WHERE nama_tipe LIKE '%$search%' ORDER BY nama_tipe";
    $tittle = "Search Result";
}
else {
    $query = "SELECT * FROM tb_tipe_kamar ORDER BY nama_tipe";
    $tittle = "Hotel Room";
}

$data = mysqli_query($conn, $query);

$ket = "";
if (!mysqli_num_rows($data)) {
    $ket = "<h1 style='font-style: italic; text-align: center;'>Search is Not Found</h1>";
}
?>
<div class="tittle wow fadeInUp" style="margin-top: -20px;">
    <h2 style="margin-top: -40px; font-size: 50px"><?= $tittle ?></h2>
</div><br>
<section style="margin-top: -40px;" class="blog_tow_area">
    <div class="container">
     <div class="row blog_tow_row">
        <?= $ket ?>
        <?php foreach ($data as $dta) { 
            $fasilitas = explode(',', $dta['fasilitas']);
            $count = count($fasilitas);
            if ($count < 4) $n = $count;
            else $n = 4;
            ?>
            <div class="col-md-4 col-sm-6">
                <div class="renovation">
                    <img src="admin/assets/images/upload/<?= $dta['picture'] ?>" height="250px" alt="">
                    <div class="renovation_content">
                        <a class="clipboard" href="web.php?<?= url('order').'&id='.$dta['id'] ?>"><i class="fa fa-clipboard" aria-hidden="true"></i></a>
                        <a class="tittle" href="web.php?<?= url('order').'&id='.$dta['id'] ?>"><?= $dta['nama_tipe'] ?></a>
                        <div class="date_comment">
                            <a href="javascript:;" title="Harga Kamar"><i class="fa fa-money" aria-hidden="true"></i><?= "Rp. ".$dta['harga_kamar'] ?></a>
                            <a href="javascript:;" title="Kamar Tersedia"><i class="fa fa-key" aria-hidden="true"></i><?= $dta['jumlah_kamar']-$dta['kamar_terpakai'] ?> Room</a>
                        </div><hr><br>
                        <h5 style="text-align: center; margin-top: -20px;"><b>Fasilitas Kamar</b></h5><br>
                        <div class="row">
                            <?php for ($i=0; $i < $n; $i++) {
                                $fas = $fasilitas[$i];
                                $dta_fas = mysqli_query($conn, "SELECT * FROM tb_fasilitas_kamar WHERE id='$fas'");
                                $get_fas = mysqli_fetch_assoc($dta_fas);
                                ?>
                                <div class="col-sm-6">
                                    <h5><i class="fa fa-chevron-right"></i>&nbsp;<?= $get_fas['nama_fasilitas'] ?></h5><br>
                                </div>
                            <?php } ?>
                        </div>
                        <center>
                            <div class="book_bottun" style="margin-bottom: -10px;">
                                <a href="web.php?<?= url('order').'&id='.$dta['id'] ?>" class="button_all">view detail</a>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</section>

<!-- End Our Team Area -->
<?php 
require 'template/footer.php'
?>
