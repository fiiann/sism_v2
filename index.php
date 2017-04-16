<?php
	require_once('functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <title>SISM</title>
<link rel="stylesheet" type="text/css" href="assets/css/table.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/owl.theme.css" type="text/css">    
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
    <!-- Bootstrap Select -->
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="assets/css/freelancer.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    
</head>

<body id="page-top" class="index">

    <?php
		include_once('header.php');
	?>

    <!-- Header -->
    <header id='home' style="background-color:#276836">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <i class="fa fa-thumbs-o-up fa-5x"></i>
                    <div class="intro-text">
						<span class="name">Sistem Informasi</span>
						<span class="name">Sertifikasi Mekanik</span>
						<hr class="star-light">

                      
                    </div>
                </div>
            </div>
        </div>
    </header>

     <!-- Portfolio Grid Section -->
     <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .slider-holder
        {
            width: 800px;
            height: 400px;
            background-color: yellow;
            margin-left: auto;
            margin-right: auto;
            margin-top: 0px;
            text-align: center;
            overflow: hidden;
        }
       
        .image-holder
        {
            width: 2400px;
            background-color: red;
            height: 400px;
            clear: both;
            position: relative;
           
            -webkit-transition: left 2s;
            -moz-transition: left 2s;
            -o-transition: left 2s;
            transition: left 2s;
        }
       
        .slider-image
        {
            float: left;
            margin: 0px;
            padding: 0px;
            position: relative;
        }
       
        #

        #slider-image-1:target ~ .image-holder
        {
            left: 0px;
        }
       
        #slider-image-2:target ~ .image-holder
        {
            left: -800px;
        }
       
        #slider-image-3:target ~ .image-holder
        {
            left: -1600px;
        }

        #slider-image-4:target ~ .image-holder
        {
            left: -2400px;
        }

        #slider-image-5:target ~ .image-holder
        {
            left: -3200px;
        }

        .button-holder
        {
            position: relative;
            top: -20px;
        }
       
        .slider-change
        {
            display: inline-block;
            height: 10px;
            width: 10px;
            border-radius: 5px;
            background-color: brown;
        }
        </style>
        <script>
            $('.fadein img:gt(0)').hide();
            setInterval(function(){ },3000);
            $('.fadein :first-child').fadeOut()
            .next('img').fadeIn()
            .end().appendTo('.fadein')
            $(function(){
            $('.fadein img:gt(0)').hide();
            setInterval(function(){
              $('.fadein :first-child').fadeOut()
                 .next('img').fadeIn()
                 .end().appendTo('.fadein');}, 
              3000);
            });
        </script>
    <section>
        <div class="slider-holder">
        <span id="slider-image-1"></span>
        <span id="slider-image-2"></span>
        <span id="slider-image-3"></span>
        <span id="slider-image-4"></span>
        <span id="slider-image-5"></span>
        <div class="image-holder">
            <table>
                <tr>
                    <td><img src="dashboard/assets/img/user/1.jpg" class="slider-image" width="100%" /></td>
                    <td><img src="dashboard/assets/img/user/2.jpg" class="slider-image" height="100%" width="100%" /></td>
                    <td><img src="dashboard/assets/img/user/3.jpg" class="slider-image" width="70%" height="0%"></td>
                    <td><img src="dashboard/assets/img/user/8.jpg" class="slider-image" width="80%" /></td>
                </tr>
                <tr>
                    <td><img src="dashboard/assets/img/user/4.jpg" class="slider-image" /></td>
                    <td><img src="dashboard/assets/img/user/5.jpg" class="slider-image" width="100%" /></td>
                    <td><img src="dashboard/assets/img/user/6.jpg" class="slider-image" /></td>
                    <td><img src="dashboard/assets/img/user/7.jpg" class="slider-image" /></td>
                </tr>
            </table>
        </div>
        <div class="button-holder">
            <a href="#slider-image-1" class="slider-change"></a>
            <a href="#slider-image-2" class="slider-change"></a>
            <a href="#slider-image-3" class="slider-change"></a>
            <a href="#slider-image-4" class="slider-change"></a>
            <a href="#slider-image-5" class="slider-change"></a>
        </div>
    </div>

    </section>
        

    <!-- About Section
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row" align="justify">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Sistem Informasi Sertifikasi Mekanik adalah sistem yang dibuat untuk memudahkan petugas dalam mengelola sertifikasi mekanik. Semua di proses secara komputerisasi yaitu digunakannya suatu software tertentu seperti software pengolah database.</p>
                </div>
                <div class="col-lg-4" >
                    <p> Petugas dapat menginput pekerjaan yang telah dilakukan oleh mekanik Setelah petugas menginputkan pekerjaan, maka dapat diketahui riwayat atau pengalaman suatu mekanik</p>
                </div>
                <!-- <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#" class="btn btn-lg btn-outline">
                        <i class="fa fa-download"></i> Download Theme
                    </a>
                </div> -->
            </div>
        </div>
    </section>


   

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>Jakarta
                            <br>Indonesia</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-github"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About SISM</h3>
                        <p>script is create with Bootstrap theme <a href="http://startbootstrap.com">Start Bootstrap</a> and Modified by <a href="#">SISM Team</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; SISM
                    </div>
                </div>
            </div>
        </div>
    </footer>

   
    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!-- Theme JavaScript -->
    <script src="assets/js/freelancer.min.js"></script>
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/wow.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>
