<?php require 'template/header.php' ?>
<section class="banner_area" data-stellar-background-ratio="0.5">
    <h2>Log In</h2>
    <ol class="breadcrumb">
        <li><a href="web.php?<?= url('login') ?>" class="active">Login</a></li>
        <li><a href="web.php?<?= url('register') ?>">Log In</a></li>
    </ol>
</section>
<section class="all_contact_info">
    <div class="container">
        <div class="row contact_row">
            <div class="col-sm-6 contact_info">
                <h2>Kelebihan Hotel Paradiso Makassar</h2><br><br>
                <h4>Diskon Pemesanan Hotel</h4>
                <p>Nikmati diskon hotel mulai dari Rp 50.000 (berlaku kelipatan) dengan menukarkan PePe POINT. Makin banyak pesan hotelnya, makin berlimpah poin yang bisa ditukarkan!</p><br>
                <h4>Harga Spesial bagi Member</h4>
                <p>Dapatkan potongan harga untuk hotel tertentu, khusus member Hotel Horison Makassar! Lihat di sini untuk detailnya</p><br>
                <h4>Riwayat Pemesanan</h4>
                <p>Mau melihat histori dan status pemesanan hotel, tiket pesawat, dan tiket kereta api Anda? Anda bisa mengeceknya langsung di menu 'Pemesanan Saya'.</p><br>
                <h4>Tanpa ‘Ribet’ Isi Ulang Identitas</h4>
                <p>Fitur ‘Data Penumpang’ memudahkan Anda yang pernah memesan tiket pesawat atau kereta api di Pegipegi, agar tidak perlu lagi mengisi ulang identitas pada pemesanan selanjutnya.</p>

            </div>
            <div class="col-sm-6 contact_info send_message">
                <h2>Masuk</h2>
                <form method="POST" class="form-inline contact_box">
                    <input type="text" id="email" name="email" class="form-control input_box" placeholder="Email *">
                    <input type="Password" id="password" name="password" class="form-control input_box" placeholder="Password *">
                  <h4>Belum memiliki akun? Daftar <a href="web.php?<?= url('register') ?>">di sini</a></h4><br>
                  <button type="submit" name="submit" class="btn btn-default">Masuk</button><br>
                  <br>
              </form>
          </div>
      </div>
  </div>
</section>
<!-- End All contact Info -->
<?php require 'template/footer.php' ?>