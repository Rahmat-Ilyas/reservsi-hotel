<?php require 'template/header.php' ?>

<section style="margin-top: -60px;" class="banner_area" data-stellar-background-ratio="0.5">
    <h2>Contact Us</h2>
    <ol class="breadcrumb">
        <li><a href="web.php?<?= url('home_user') ?>">Home</a></li>
        <li><a href="web.php?<?= url('contact') ?>" class="active">Contact</a></li>
    </ol>
</section>
<!-- End Banner area -->

<!-- Map -->
<div class="contact_map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.7507358237162!2d119.47181051410804!3d-5.143778060334588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee32dc9c47249%3A0xc09d76adc7425f3b!2sHotel+Paradiso!5e0!3m2!1sid!2sid!4v1563446591628!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<!-- End Map -->

<!-- All contact Info -->
<section class="all_contact_info">
    <div class="container">
        <div class="row contact_row">
            <div class="col-sm-6 contact_info">
                <h2>Contact Info</h2>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                <div class="location">
                    <div class="location_laft">
                        <a class="f_location" href="#">location</a>
                        <a href="#">phone</a>
                        <a href="#">fax</a>
                        <a href="#">email</a>
                    </div>
                    <div class="address">
                        <a href="#">Sector # 10, Road # 05, Plot # 31, Uttara, <br> Dhaka 1230 </a>
                        <a href="#">+880 123 456 789</a>
                        <a href="#">(626) 935-3026</a>
                        <a href="#">info@thethemspro.com</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 contact_info send_message">
                <h2>Send Us a Message</h2>
                <form class="form-inline contact_box">
                    <input type="text" class="form-control input_box" placeholder="First Name *">
                    <input type="text" class="form-control input_box" placeholder="Last Name *">
                    <input type="text" class="form-control input_box" placeholder="Your Email *">
                    <input type="text" class="form-control input_box" placeholder="Subject">
                    <input type="text" class="form-control input_box" placeholder="Your Website">
                    <textarea class="form-control input_box" placeholder="Message"></textarea>
                    <button type="submit" class="btn btn-default">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End All contact Info -->
<?php 
require 'template/footer.php'
 ?>