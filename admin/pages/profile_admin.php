<?php
if (isset($_SESSION['this'])) $id = $_SESSION['this'];
else $id = $_COOKIE['this'];

$data = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id='$id'");
$dta = mysqli_fetch_assoc($data);

$nama = $dta['nama'];
$email = $dta['email'];
$telepon = $dta['telepon'];
$foto = $dta['foto'];
$username = $dta['username'];
$_SESSION['title'] = "Admin : Hotel Paradiso Makassar";
?>
<div class="row">
    <div class="col-lg-12">
        <div class="profile-detail card-box">
            <img src="assets/images/admin/<?= $foto ?>" class="img-circle" alt="profile-image">

            <ul class="list-inline status-list m-t-20">
                <li>
                    <h3 class="text-uppercase text-primary m-b-5"><?= $nama ?></h3>
                </li>
            </ul>

            <hr>
            <h4 class="text-uppercase font-600">About Me</h4>

            <div class="text-center">
                <p class="text-muted font-20"><strong>Nama Lengkap: </strong>&nbsp;<span><?= $nama ?></span></p>
                <p class="text-muted font-20"><strong>Email: </strong>&nbsp;<span><?= $email ?></span></p>
                <p class="text-muted font-20"><strong>Telepon: </strong>&nbsp;<span><?= $telepon ?></span></p>
                <p class="text-muted font-20"><strong>Username: </strong>&nbsp;<span><?= $username ?></span></p>

            </div>


            <div class="button-list m-t-20">
                <button type="button" class="btn btn-default waves-effect waves-light">
                    <i class="ti-write"></i>&nbsp; Edit Profile
                </button>
                <a href="config.php?logout=true" role="button" class="btn btn-danger waves-effect waves-light">
                    &nbsp;&nbsp;<i class="ti-power-off"></i>&nbsp; Sign Out&nbsp;&nbsp;
                </a>
            </div>

        </div>
    </div>
</div>