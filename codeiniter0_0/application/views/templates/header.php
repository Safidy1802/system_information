<?php
	$this->load->helper('url_helper');
    ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Foodeiblog Template">
    <meta name="keywords" content="Foodeiblog, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Takalo-Eshop</title>

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template'); ?>/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/template'); ?>/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/template'); ?>/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/template'); ?>/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/template'); ?>/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/template'); ?>/css/style.css" type="text/css">
        <!-- Js Plugins -->
    <script src="<?php echo base_url('assets/template'); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url('assets/template'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/template'); ?>/js/jquery.slicknav.js"></script>
    <script src="<?php echo base_url('assets/template'); ?>/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url('assets/template'); ?>/js/main.js"></script>

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="./index.html"><img src="img/humberger/humberger-logo.png" alt=""></a>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="<?php echo site_url('fonction/index');  ?>">Acceuil</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="<?php echo site_url('fonction/statistique');  ?>">Statistique</a></li>
                <!-- <li class="dropdown"><a href="#">Pages</a>
                    <ul class="dropdown__menu">
                        <li><a href="./categories-grid.html">Categories Grid</a></li>
                        <li><a href="./categories-list.html">Categories List</a></li>
                        <li><a href="./single-post.html">Single Post</a></li>
                        <li><a href="./signin.html">Sign In</a></li>
                        <li><a href="./typography.html">Typography</a></li>
                    </ul>
                </li> -->
                <li><a href="<?php echo site_url('fonction/profil');  ?>">Profil</a></li>
                <li><a href="<?php echo site_url('fonction/demande');  ?>">Demandes</a></li>
                <li><a href="<?php echo site_url('fonction/deconnexion');  ?>">Deconnexion</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="humberger__menu__about">
            <div class="humberger__menu__title sidebar__item__title">
                <h6>About me</h6>
            </div>
            <img src="img/humberger/humberger-about.jpg" alt="">
            <h6>Hi every one! I,m Lena Mollein.</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.</p>
            <div class="humberger__menu__about__social sidebar__item__follow__links">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube-play"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-envelope-o"></i></a>
            </div>
        </div>
        <div class="humberger__menu__subscribe">
            <div class="humberger__menu__title sidebar__item__title">
                <h6>Subscribe</h6>
            </div>
            <p>Subscribe to our newsletter and get our newest updates right on your inbox.</p>
            <form action="#">
                <input type="text" class="email-input" placeholder="Your email">
                <label for="agree-check">
                    I agree to the terms & conditions
                    <input type="checkbox" id="agree-check">
                    <span class="checkmark"></span>
                </label>
                <button type="submit" class="site-btn">Subscribe</button>
            </form>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-1 col-6 order-md-1 order-1">
                        <div class="header__humberger">
                            <i class="fa fa-bars humberger__open"></i>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-10 order-md-2 order-3">
                        <nav class="header__menu">
                            <ul>
                            <li><a href="<?php echo site_url('fonction/index');  ?>">Acceuil</a></li>
                                <li><a href="<?php echo site_url('fonction/categorie');  ?>">Categories</a>
                                    <div class="header__megamenu__wrapper">
                                        <div class="header__megamenu">
                                            
                                                <!-- boucle categorie -->
                                                <!-- <?php //foreach ($allcategorie as $categorie) { ?> -->
                                                <?php for ($i=0; $i < 4; $i++) { ?>
                                                        <div class="header__megamenu__item">
                                                            <div class="header__megamenu__item--pic set-bg"
                                                                data-setbg="<?php //echo $allcategorie[$i]['img']; ?>">
                                                                
                                                            </div>
                                                            <div class="header__megamenu__item--text">
                                                                <h5><a href="<?php echo site_url('fonction/categorie/'.$allcategorie[$i]['idcategorie']);  ?>"><?php echo $allcategorie[$i]['nom']; ?></a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                <?php } ?>
                                            
<!-- -- -->
                                            <div class="header__megamenu__item">
                                                <div class="header__megamenu__item--pic set-bg"
                                                    data-setbg="img/megamenu/p-5.jpg">
                                                </div>
                                                <div class="header__megamenu__item--text">
                                                    <h5><a href="<?php echo site_url('fonction/categorie');  ?>">Divers...</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="<?php echo site_url('fonction/statistique');  ?>">Statistique</a></li>

                                <!-- <li class="dropdown"><a href="#">Pages</a>
                                    <ul class="dropdown__menu">
                                        <li><a href="./categories-grid.html">Categories Grid</a></li>
                                        <li><a href="./categories-list.html">Categories List</a></li>
                                        <li><a href="./single-post.html">Single Post</a></li>
                                        <li><a href="./signin.html">Sign In</a></li>
                                        <li><a href="./typography.html">Typography</a></li>
                                    </ul>
                                </li> -->
                                <li><a href="<?php echo site_url('fonction/profil');  ?>">Profil</a></li>
                                <li><a href="<?php echo site_url('fonction/demande');  ?>">Demandes</a></li>
                                <li><a href="<?php echo site_url('fonction/deconnexion');  ?>">Deconnexion</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-1 col-6 order-md-3 order-2">
                        <div class="header__search">
                            <i class="fa fa-search search-switch"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->