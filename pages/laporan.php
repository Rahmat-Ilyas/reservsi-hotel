<?php
if (!isset($_SESSION['transaksi'])) header("location: web.php?".url('404'));
$no_pemesanan = $_SESSION['pemesanan']['no_pemesanan'];
$nama = $_SESSION['pemesanan']['nama'];
$email = $_SESSION['pemesanan']['email'];
$tggl_cekin = $_SESSION['pemesanan']['tggl_cekin'];
$tggl_cekout = $_SESSION['pemesanan']['tggl_cekout'];
$lama_inap = $_SESSION['transaksi']['lama_inap'];
$tipe_kamar = $_SESSION['pemesanan']['tipe_kamar'];
$jum_kmr = $_SESSION['pemesanan']['jum_kmr'];

$ttl_hrg_kmr = $_SESSION['transaksi']['ttl_hrg_kmr'];
$ttl_by_lyn = $_SESSION['transaksi']['ttl_by_lyn'];
$total_bayar = $_SESSION['transaksi']['total_bayar'];
date_default_timezone_set("Asia/Makassar");
$i_o = date('d M y', strtotime($tggl_cekin))." - ".date('d M y', strtotime($tggl_cekout));

$data = mysqli_query($conn, "SELECT * FROM tb_tipe_kamar WHERE nama_tipe = '$tipe_kamar'");
$dta = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
  <meta name="author" content="Coderthemes">

  <link rel="shortcut icon" href="admin/assets/images/favicon_1.ico">

  <title>Cetak Laporan Transaksi Pemesanan Kamar</title>

  <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="admin/assets/css/core.css" rel="stylesheet" type="text/css" />
  <link href="admin/assets/css/components.css" rel="stylesheet" type="text/css" />
  <link href="admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
  <link href="admin/assets/css/pages.css" rel="stylesheet" type="text/css" />
  <link href="admin/assets/css/responsive.css" rel="stylesheet" type="text/css" />

  <script src="admin/assets/js/modernizr.min.js"></script>

</head>

<body id="content">        
  <div style="margin-bottom: 18px;"></div>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="clearfix">
                <div class="pull-left">
                  <h4 class="text-right"><img src="images/logo.png" alt="velonic" width="220"></h4>

                </div>
                <div class="pull-right">
                  <h4>Invoice # <br>
                    <strong><?= $no_pemesanan ?></strong>
                  </h4>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">

                  <div class="pull-left m-t-30">
                    <address>
                      <strong>Hotel Paradiso</strong><br>
                      Jl. Perintis Kemerdekaan, Blok B/19 <br>
                      Tamalanrea Indah, Tamalanrea, Makassar<br>
                      Sulawesi Selatan, 90245, Indonesia<br>
                      <abbr title="Phone">P:</abbr> (0411) 582582
                    </address>
                  </div>
                  <div class="pull-right m-t-30">
                    <p><strong>Ordering Name: </strong><?= $nama ?></p>
                    <p class="m-t-10"><strong>Email: </strong><?= $email ?></p>
                    <p class="m-t-10"><strong>Order Date: </strong><?= date('D, d M Y, H:i') ?></p>
                    <p class="m-t-10"><strong>Cek-In/Cek-Out: </strong><?= $i_o ?></p>
                  </div>
                </div>
              </div>
              <div class="m-h-40"></div>
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table m-t-30">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Item</th>
                          <th>Long Days</th>
                          <th>Total Room</th>
                          <th>Price</th>
                          <th>Total</th>
                        </tr></thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td><?= $tipe_kamar ?></td>
                            <td><?= $lama_inap ?> Days</td>
                            <td><?= $jum_kmr ?> Room</td>
                            <td>Rp. <?= $dta['harga_kamar'] ?></td>
                            <td>Rp. <?= $ttl_hrg_kmr ?></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>SERVICE</td>
                            <td><?= $lama_inap ?> Days</td>
                            <td><?= $jum_kmr ?> Room</td>
                            <td>Rp. <?= $dta['biaya_layanan'] ?></td>
                            <td>Rp. <?= $ttl_by_lyn ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="row" style="border-radius: 0px;">
                  <div class="col-md-3 col-md-offset-9">
                    <p class="text-right"><b>Sub-total: </b>Rp. <?= $total_bayar ?></p>
                    <hr>
                    <h3 class="text-right">Rp. <?= $total_bayar ?></h3>
                  </div>
                </div>
                <hr>
                <div class="hidden-print">
                  <div class="pull-right">
                    <div id="editor"></div>
                    <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i>&nbsp;Cetak</a>
                    <button id="save" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-save"></i>&nbsp;Simpan</button>
                    <button id="kembali" name="kembali" class="btn btn-primary waves-effect waves-light"><i class="fa fa-reply"></i>&nbsp;Kembali</button>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>
    </div>

    <script>
      var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="admin/assets/js/jquery.min.js"></script>
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <script src="admin/assets/js/detect.js"></script>
    <script src="admin/assets/js/fastclick.js"></script>
    <script src="admin/assets/js/jquery.slimscroll.js"></script>
    <script src="admin/assets/js/jquery.blockUI.js"></script>
    <script src="admin/assets/js/waves.js"></script>
    <script src="admin/assets/js/wow.min.js"></script>
    <script src="admin/assets/js/jquery.nicescroll.js"></script>
    <script src="admin/assets/js/jquery.scrollTo.min.js"></script>


    <script src="admin/assets/js/jquery.core.js"></script>
    <script src="admin/assets/js/jquery.app.js"></script>
    <script src="admin/assets/js/jspdf.min.js"></script>

    <script>
      $(document).ready(function() {
        $('#kembali').click(function(e) {
          e.preventDefault();
          var konfir = confirm('Pastikan anda sudah mencetak atau menyimpan bukti pembayaran sebelum menutup halaman ini. Klik Oke jika sudah selesai');
          if (konfir == true) {
            $.ajax({
              url         : "controller.php",
              method      : "POST",
              data        : { hapus_session : true},
              success     : function(data) {
                document.location.href="web.php?<?= url('home_user') ?>";
              }
            });
          }
        });
        $('#save').click(function() {
          var doc = new jsPDF();
          doc.canvas.height = 72 * 11;
          doc.canvas.height = 72 * 8.5;
          doc.fromHTML(document.body);
          doc.save('laporan-transaksi-<?= $no_pemesanan ?>.pdf');
        });
      });
    </script>

  </body>
  </html>