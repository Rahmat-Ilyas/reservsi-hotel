<?php 
// request
if (isset($_POST['kirim_data'])) {
    $_SESSION['pemesanan'] = $_POST;
    header('location: web.php?'.url('transaksi'));
}

// this page
if (!isset($_GET['id'])) header("location: web.php?".url('404'));
$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar WHERE id=$id");
if (!mysqli_num_rows($data)) header("location: web.php?".url('404'));

$dta = mysqli_fetch_assoc($data);
$fasilitas = explode(',', $dta['fasilitas']);

$data_kamar = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar WHERE id != $id");

$tipe_kamar = $dta['nama_tipe'];
$data_kmr = mysqli_query($conn, "SELECT * FROM tb_kamar WHERE tipe_kamar='$tipe_kamar' AND status='Kosong'");

$booking = mysqli_query($conn, "SELECT * FROM tb_pemesanan ORDER BY id DESC");
$get_id = mysqli_fetch_assoc($booking);
$id_psn = $get_id['id']+1;

require 'template/header.php'; 
?>
<!-- All contact Info -->
<section class="all_contact_info">
    <div class="container">
        <center><div class="tittle wow fadeInUp" style="margin-top: -100px">
            <h2 style="margin-top: 50px; font-size: 50px">Reservation</h2>
        </div><br></center>
        <div class="row contact_row">
            <div class="col-sm-6 contact_info">
                <label style="font-size: 30px; margin-top: 10px">Kelebihan Hotel Paradiso Makassar</label><br><br><br>
                <h3>Diskon Pemesanan Hotel</h3>
                <p style="font-size: 15px;">Nikmati diskon hotel mulai dari Rp 50.000 (berlaku kelipatan) dengan menukarkan PePe POINT. Makin banyak pesan hotelnya, makin berlimpah poin yang bisa ditukarkan!</p><br><br>
                <h3>Harga Spesial bagi Member</h3>
                <p style="font-size: 15px;">Dapatkan potongan harga untuk hotel tertentu, khusus member Hotel Horison Makassar! Lihat di sini untuk detailnya</p><br><br>
                <h3>Riwayat Pemesanan</h3>
                <p style="font-size: 15px;">Mau melihat histori dan status pemesanan hotel, tiket pesawat, dan tiket kereta api Anda? Anda bisa mengeceknya langsung di menu 'Pemesanan Saya'.</p><br><br>
                <h3>Tanpa ‘Ribet’ Isi Ulang Identitas</h3>
                <p style="font-size: 15px;">Fitur ‘Data Penumpang’ memudahkan Anda yang pernah memesan tiket pesawat atau kereta api di hotel horison makassar, agar tidak perlu lagi mengisi ulang identitas pada pemesanan selanjutnya.</p>

            </div>
            <div class="col-sm-6 contact_info send_message">
                <form method="POST" class="form-inline contact_box" action="">
                    <center><label style="font-size: 30px; margin-top: -200px;"><?= $dta['nama_tipe'] ?></label></center><br>
                    <img height="300px"; width="550px"; src="admin/assets/images/upload/<?= $dta['picture'] ?>" alt=""><br><br>
                    <label style="font-size: 20px">Kode Pemesanan</label>
                    <input type="text" style="color: black" name="no_pemesanan" class="form-control input_box" value="<?= "PRDS-".sprintf('%05s', $id_psn) ?>" readonly>
                    <label style="font-size: 20px">Nama Lengkap</label>
                    <input type="text"style="color: black" name="nama" class="form-control input_box" placeholder="Nama Lengkap*" required>
                    <label style="font-size: 20px">Email</label>
                    <input type="email"style="color: black" name="email" class="form-control input_box" placeholder="Email*" required>
                    <label style="font-size: 20px">Tanggal Cek In</label>
                    <input type="date" style="color: black" name="tggl_cekin" class="form-control input_box">
                    <label style="font-size: 20px">Tanggal Cek Out</label>
                    <input type="date" style="color: black" name="tggl_cekout" class="form-control input_box">
                    <label style="font-size: 20px">Jumlah Kamar Dipesan</label>
                    <select type="text" style="color: black" id="jumlah_kamar" name="jum_kmr" class="form-control input_box" required>
                        <?php 
                        $jum_kmr = mysqli_query($conn, "SELECT * FROM tb_kamar WHERE tipe_kamar='$tipe_kamar' AND status='Kosong' LIMIT 4"); $i = 1;
                        foreach ($jum_kmr as $jum_kmr) {
                         ?>
                         <option value="<?= $i ?>"><?= $i." Kamar" ?></option>
                         <?php $i = $i + 1; } ?>
                     </select> 

                     <label style="font-size: 20px">Nomor Kamar</label>
                     <div class="row" id="add_attr_kmr">
                        <div class="col-sm-3">
                            <select type="text" style="color: black" id="no_kamar1" name="" class="form-control input_box" required>
                                <option value="">Pilih Kamar</option>
                                <?php 
                                foreach ($data_kmr as $nmr) { ?>
                                    <option id="opt<?= $nmr['no_kamar'] ?>" value="<?= $nmr['no_kamar'] ?>"><?= sprintf('%03s', $nmr['no_kamar'])."/".$nmr['kd_kamar'] ?></option>
                                <?php } ?>     
                            </select> 
                        </div>   
                    </div>    
                    <div id="ket">
                        <label style="color: gray; margin-bottom: 20px; font-size: 12px;">*Pilih kembali <i>"Jumlah  Kamar Dipesan"</i> untuk mengulang</label><br>
                    </div>        
                    <input type="hidden" id="nama_tipe" name="tipe_kamar" value="<?= $dta['nama_tipe'] ?>">
                    <input type="hidden" name="no_kamar1" id="nk1">
                    <input type="hidden" name="no_kamar2" id="nk2">
                    <input type="hidden" name="no_kamar3" id="nk3">
                    <input type="hidden" name="no_kamar4" id="nk4">
                    <button type="submit" name="kirim_data" class="btn btn-default">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src=""></script>
<script>
    $(document).ready(function() {
        $('#ket').hide();

        $(document).on('click', '#jumlah_kamar', function() {
            var jum_kmr = $('#jumlah_kamar').val();
            var nama_tipe = $('#nama_tipe').val();

            $.ajax({
                url         : "controller.php",
                method      : "POST",
                data        : { jum : jum_kmr, nama_tipe : nama_tipe},
                success     : function(data) {
                    $('#add_attr_kmr').html(data);
                }
            });
        });

        function set_nk(n) {
            $(document).on('change', '#no_kamar'+n, function() {
                var no = $('#no_kamar'+n).val();
                var id = '#opt'+no;
                for (var i = 0; i <= 4; i++) {
                    if (i != n) {
                        $('#no_kamar2').find(id).attr('disabled', '');
                        $('#no_kamar3').find(id).attr('disabled', '');
                        $('#no_kamar4').find(id).attr('disabled', '');
                    }
                }
                $('#no_kamar'+n).attr('disabled', '');
                $('#nk'+n).val(no);
                $('#ket').show();
            });
        }
        set_nk(1);
        set_nk(2);
        set_nk(3);
        set_nk(4); 
    });
</script>
<?php 
require 'template/footer.php'
?>