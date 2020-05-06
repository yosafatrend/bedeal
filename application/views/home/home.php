<!DOCTYPE html>
<html>
    <head>
        <title>BeDeal | Jasa rekber terpercaya</title>
        <meta charset="utf-8">
        <link rel="icon" href="<?= base_url('public') ?>/assets/img-dashboard/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url('public') ?>/assets/scss/bootstrap.css">
        <link rel="stylesheet" href="<?= base_url('public') ?>/assets/css/home.css">
    </head>
    <body class="">
        <nav class="navbar navbar-light navbar-expand-md fixed-top bg-light-transparent font-segoe" style="padding-top: 2px !important;padding-bottom: 2px !important">
            <div class="container py-2">
                <a class="navbar-brand" href="">
                    <img height="40px" src="<?= base_url('public') ?>/assets/img-dashboard/logo.png" alt="">
                </a>
                <!-- navbars items -->
                <button class="navbar-toggler" data-target="#navbarItems" data-toggle="collapse" >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarItems">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item px-2 active">
                            <a class="nav-link mz" href="#home">Beranda</a>
                        </li>

                        <li class="nav-item px-2">
                            <a class="nav-link mz" href="#tentang">Tentang</a>
                        </li>

                        <li class="nav-item px-2">
                            <a class="nav-link mz" href="#hubungi">Hubungi</a>
                        </li>

                        <li class="nav-item px-2">
                            <div class="v-line"></div>
                        </li>

                        <li class="nav-item px-2">
                            <a class="nav-link mz" href="<?= base_url() ?>/login">Login</a>
                        </li>

                        <li class="nav-item px-2 d-none d-md-inline-block">
                            <a class="btn btn-primary btn-round px-3" role="button" style="padding-bottom: 8px !important" href="<?= base_url() ?>/daftar">Daftar</a>
                        </li>

                        <li class="nav-item px-2 d-md-none">
                            <a class="nav-link mz" role="button" href="" >Daftar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- frontbg -->
        <div class="content-wrapper">
            <!-- introduce -->
            <div class="container-fluid bg-light home-bg" id="home">
                <div class="container w-max-576 text-center text-white font-segoe">
                    <h1 class="front-title" style="font-size: 3.6em !important">Membantu <b>Transaksi Digital</b> Anda</h1>
                    <h5 class="font-weight-thin" style="font-size: 23px !important">Menyediakan pihak ketiga yang terpercaya dalam transaksi rekber anda.</h5>
                    <a href="daftar" class="btn btn-success mulai">MULAI</a>
                </div>
            </div>

            <!-- what is it -->
            <div class="jumbotron noround bg-white font-poppins mb-0" id="tentang">
                <div class="container">
                    <div class="row">
                        <!-- logo -->
                        <div class="d-none d-md-block col-md-4 what-logo">
                            <table style="height: 100%; width: 100%;">
                                <tbody>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <img width="240px" src="<?= base_url('public') ?>/assets/img/handshake.png">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- what is it? -->
                        <div class="col-12 col-md-8 pt-md-3">
                            <div class="section-title d-inline-block ml-4 text-center">
                                <h2>Apa itu Be Deal?</h2>
                                <div class="row">
                                    <div class="col ml-auto mr-1 h-line"></div>
                                    <div class="col mr-auto ml-1 h-line"></div>
                                </div>
                            </div>
                            <p>
                                Be Deal adalah pihak ketiga untuk transaksi digital dengan metode rekber. Be Deal menjadi solusi transaksi online dengan jaminan keamanan dan kemudahan bertransaksi. Ayo tunggu apa lagi, bergabung dengan Be Deal sekarang juga.<br/><b>Bye Bye Ripper, Hello Be Deal!</b>
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            <!-- why should bedeal -->
            <div class="jumbotron noround bg-why font-poppins mb-0 why">
                <div class="container">
                    <div class="section-title text-center pb-3">
                        <h2>Mengapa Be Deal?</h2>
                        <div class="row">
                            <div class="col ml-auto mr-1 h-line"></div>
                            <div class="col mr-auto ml-1 h-line"></div>
                        </div>
                    </div>
                
                    <!-- why -->
                    <div class="row mt-5">
                        <div class="col-12 col-md-4 text-center mb-3 mb-md-0">
                            <div class="container px-md-5 text-center">
                                <img width="100px" class="mb-3" src="<?= base_url('public') ?>/assets/img-dashboard/aman.png" alt="Aman">
                                <p class="font-weight-bold">Aman</p>
                                <p>Kami memiliki admin yang terpercaya dan siap membantu kapanpun dibutuhkan.</p>
                            </div>
                        </div>

                        <div class="col-12 col-md-4 text-center mb-3 mb-md-0">
                            <div class="container px-md-5">
                                <img width="100px" class="mb-3" src="<?= base_url('public') ?>/assets/img-dashboard/mudah.png" alt="Mudah">
                                <p class="font-weight-bold">Mudah</p>
                                <p>Dapat diakses kapan saja, di mana saja, dan oleh siapa saja.</p>
                            </div>
                        </div>

                        <div class="col-12 col-md-4 text-center mb-3 mb-md-0">
                            <div class="container px-md-5">
                                <img width="100px" class="mb-3" src="<?= base_url('public') ?>/assets/img-dashboard/jelas.png" alt="Jelas">
                                <p class="font-weight-bold">Jelas</p>
                                <p>Anda dapat mengawasi dan memonitoring perkembangan serta status transaksi.</p>
                            </div>
                        </div>
                    </div>

                    <!-- directing to bedeal? -->
                    <div class="text-center mt-3">
                        <a href="<?= base_url()?>/daftar">Beralih ke Be Deal sekarang?</a>
                    </div>
                </div>
            </div>

            <footer class="jumbotron bg-dark mb-0 noround text-secondary border-bottom" id="hubungi" style="margin-bottom:  0px!important">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <table style="height: 100%; width: 100%;">
                                <tbody>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <img width="175px" style="max-width: 100%;" src="<?= base_url('public') ?>/assets/img/handshake.png">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- -- -->
                        <div class="col-12 col-md-3 pt-3">
                            <h3 class="mb-4"><b>Tentang</b></h3>
                            <p>Be Deal terus berusaha menjadikan transaksi digital semakin aman setiap harinya.</p>
                        </div>

                        <!-- -- -->
                        <div class="col-12 col-md-3 pt-3">
                            <h3 class="mb-4"><b>Kontak Kami</b></h3>
                            <p><i class="fa fa-phone"></i>&nbsp;081882820134<br><i class="fa fa-envelope"></i>&nbsp;bedealofficial@gmail.com</p>
                        </div>

                        <!-- -- -->
                        <div class="col-12 col-md-2 pt-3">
                            <h3 class="mb-4"><b>Akun</b></h3>
                            <table>
                                <tr>
                                    <td><i class="fab fa-facebook"></i></td>
                                    <td>&nbsp;BeDeal</td>
                                </tr>
                                <tr>
                                    <td><i class="fab fa-instagram"></i></td>
                                    <td>&nbsp;bedeal_</td>
                                </tr>
                                <tr>
                                    <td><i class="fab fa-twitter"></i></td>
                                    <td>&nbsp;bedeal_</td>
                                </tr>
                            </table>
                            
                        </div>
                         <div class="col-12 col-md-2">

                            <table style="height: 100%; width: 100%;">
                                <tbody>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <h3 class="mb-4"><b>Support by</b></h3>
                                            <img width="135px" style="max-width: 100%;" src="<?= base_url('public') ?>/assets/img/tunas.png">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer2 copyright -->
            <footer style="margin-top:  -1px">
                <div class="text-center p-3 bg-dark2 text-white" style="color: #f6f6f6 !important; font-size: 14px;">
                    Copyright &copy;<b>BeDeal.</b> All right reserved.
                </div>
            </footer>
        </div>

        <!-- script -->
        <script src="<?= base_url('public') ?>/assets/js/jquery.js"></script>
        <script src="<?= base_url('public') ?>/assets/js/bootstrap.bundle.js"></script>
        <script src="<?= base_url('public') ?>/assets/js/home.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
    </body>
</html>