<?php 
$data = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar ORDER BY kamar_terpakai DESC LIMIT 3");
require 'template/header.php';
?>
<section class="slider_area row m0">
    <div class="slider_inner">
        <div data-thumb="images/slider-1.jpg"  data-src="images/3.jpg">
            <div class="camera_caption">
             <div class="container">
                <label style="font-size: 50px" class="wow fadeInUp animated" data-wow-delay="1.0s">
                   welcome to hotel paradiso makassar
               </label><br><br><br><br>
               <label style="font-size: 30px; color: gold" class=" wow fadeInUp animated" data-wow-delay="1.8s">
                WELCOMING YOU WITH LOCAL PRIDE  
            </label><br><br><br><br>
            <a class=" wow fadeInUp animated" data-wow-delay="2s" href="web.php?<?= url('profil') ?>">Read More</a>
        </div>
    </div>
</div>
<div data-thumb="images/slider-2.jpg" data-src="images/22.jpg">
    <div class="camera_caption">
     <div class="container">
        <label style="font-size: 50px" class=" wow fadeInUp animated" data-wow-delay="1.0s">
            relax your soul
        </label><br><br><br>
        <label style="font-size: 30px; color: gold  " class=" wow fadeInUp animated" data-wow-delay="1.8s">
            the team of hotel paradiso makassar luxury resort welcomes you.<br>start relaxing your soul  and enjoy your stay
        </label> <br><br><br>
        <a class=" wow fadeInUp animated" data-wow-delay="2s" href="web.php?<?= url('profil') ?>">Read More</a>
    </div>
</div>
</div>
</div>
</section>
<section class="professional_builder row">
    <div class="container">
       <div class="row builder_all">
           <div class="tittle wow fadeInUp">
            <h2>Amenitas</h2><br><br><br><br><br>
        </div>
        <div class="col-md-3 col-sm-6 builder">
            <i class="fa fa-wifi" aria-hidden="true"></i>
            <h4>Free WI-FI</h4>
            <p>Wi-Fi Tersedia di kamar hotel dan tidak dikenakan biaya.</p>
        </div>
        <div class="col-md-3 col-sm-6 builder">
            <i class="fa fa-bus" aria-hidden="true"></i>
            <h4>Free Bus</h4>
            <p>Free bus Tersedia antar dan jemput di bandara.</p>
        </div>
        <div class="col-md-3 col-sm-6 builder">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            <h4>24 Hours</h4>
            <p>24 Hours Tersedia pelayanan kami terbuka</p>
        </div>
        <div class="col-md-3 col-sm-6 builder">
            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
            <h4>Best Service</h4>
            <p>Best Service memberikan pelayanan terbaik kami kepada pengunjung kamar</p>
        </div>
    </div>
</div>
</section>
<section class="about_us_area row">
    <div class="container">
        <div class="tittle wow fadeInUp">
            <h2>Hotel paradiso makassar</h2>
        </div>
        <div class="row about_row" style="margin-top: 0px; font-size: 16px;">
            <div class="col-md-1"></div>
            <div class="who_we_area col-md-10">
                <label style="text-align: center;">
                    Hotel Paradiso Makassar, Semua kamar tamu dilengkapi wilayah dengan sistem telepon IDD, koneksi internet gratis,mini bar, kopi dan fasilitas teh, program TV internasional, Individu Controled AC, Kamar mandi luas dengan fasilitas mewah dan bayak lagi. Simpan Deposit box yang tersedia baik diruangan atau Front Office di mana sistem keamanan 24 jam diterapkan.Sesuai dengan jenis kamar Hotel Paradiso Makassar merupakan bagian dari Hotel Horison Group, Sebuah jaringan hotel lokal, nasional yang pada saat melayani di kota besar di indonesia (bandung, bekasi-jakarta, semarang, palembang, makassar) dan masih lebih dalam proyek. Asgroup hotel yang fokus pada perjalanan bisnis dan liburan, Hotel Paradiso Makassar juga difasilitasi dengan balroom besar (Krakatau) untuk melayani sampai 101000 orang, 7 pertemuan berbagai ukuran ruangan, pusat bisnis, tiket dan pengaturan tur, MCE bantuan atau program Paradiso Tujuan mana kita akan Organizer untuk acara Anda yang indah.<br><br>
                </label>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</section>
<!-- End About Us Area -->

<!-- What ew offer Area -->
<section class="what_we_area row">
    <div class="container">
        <div class="tittle wow fadeInUp"><br><br>
            <h3>Favorite Rooms</h3><br>
            <h5>Find your favorite room, feel more than home</h5>
        </div>
        <div class="row construction_iner">
            <?php foreach ($data as $dta) { 
                $fasilitas = explode(',', $dta['fasilitas']);
                $count = count($fasilitas);
                if ($count < 4) $n = $count;
                else $n = 4;
                ?>
                <div class="col-md-4 col-sm-6 construction">
                    <div class="cns-img">
                        <img height="250px" width="500px" src="admin/assets/images/upload/<?= $dta['picture'] ?>" alt="">
                    </div>
                    <div class="cns-content">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <a href="web.php?<?= url('order').'&id='.$dta['id'] ?>"><?= $dta['nama_tipe'] ?></a><br><br>
                        <h5 style="text-align: center; margin-top: -20px;"><b>Fasilitas Kamar</b></h5><br>
                        <div class="row" style="margin-bottom: -10px;">
                        <?php for ($i=0; $i < $n; $i++) {
                            $fas = $fasilitas[$i];
                            $dta_fas = mysqli_query($conn, "SELECT * FROM tb_fasilitas_kamar WHERE id='$fas'");
                            $get_fas = mysqli_fetch_assoc($dta_fas);
                            $no = $i+1;
                            ?>
                            <div class="col-sm-6 pl2">
                                <h5 style="text-align: left;"><?= $no.". ".$get_fas['nama_fasilitas'] ?></h5>
                                <br>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</section>

<!-- Map -->
<div class="contact_map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.7507358237162!2d119.47181051410804!3d-5.143778060334588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee32dc9c47249%3A0xc09d76adc7425f3b!2sHotel+Paradiso!5e0!3m2!1sid!2sid!4v1563446591628!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<?php 
require 'template/footer.php'
?>