<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?=$title?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <link rel="stylesheet" href="<?=base_url()?>public/site/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="<?=base_url()?>public/site/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="<?=base_url()?>public/site/css/main.css">
        <!-- plugin css -->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/jquery-ui/css/jquery.ui.all.css" />
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>public/jquery-ui/css/jquery.ui.css" />
        <!-- site js -->
        <script src="<?=base_url()?>public/site/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <!-- plugin js -->
        <script src="<?=base_url()?>public/jquery-1.9.1.js" type="text/javascript"></script>
        <script src="<?=base_url()?>public/jquery-ui/ui/jquery.ui.core.js"></script>
	<script src="<?=base_url()?>public/jquery-ui/ui/jquery.ui.widget.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<?=site_url()?>"><img src="<?=base_url().'public/images/si-tv-51x26.png'?>"></a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><?=anchor(site_url(), '<i class="icon-home icon-white"></i> Home')?></li>
                            <?php if($this->session->userdata('logged_in')) : ?>
                            <li><?=anchor(site_url('pengumuman/pengumuman'), '<i class="icon-plus-sign icon-white"></i> Tambah Pengumuman', '');?></li>                            
                            <!--
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Nav header</li>
                                    <li><a href="#">Separated link</a></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                            -->
                            <?php endif; ?>
                            <li class="dropdown">
                                <?=anchor(site_url('#'), '<i class="icon-info-sign icon-white"></i> About <b class="caret"></b>', 'class="dropdown-toggle" data-toggle="dropdown"');?>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Website informasi mengenai Pengumuman di SI TV</a></li>                                  
                                </ul>
                            </li>
                        </ul>
                            <?php if($this->session->userdata('logged_in')) : ?>
                                <form class="navbar-form pull-right" action="<?=site_url('auth/login/keluar')?>">
                                    <input type="submit" value="Keluar" class="btn btn-danger">
                                </form>
                                <?php // anchor(site_url('auth/login/keluar'),'Keluar','class="pull-right"');?>
                            <?php else : ?>
                                <?= form_open('auth/login/masuk','name="login_form" class="navbar-form pull-right"'); ?>
                                    <input type="email" name="emailfield" placeholder="Email" class="span2" required>
                                    <input type="password" name="passfield" placeholder="Password" class="span2" required>
                                    <input type="submit" value="Login" id="loginButton" class="btn btn-primary">
                                <?= form_close(); ?>
                            <?php endif; ?>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row-fluid">
                <div class="span3">
                <!--Sidebar content-->
                <div class="hero-unit">
                    <h2>Sistem Informasi Televisi</h2>
                </div>
                </div>
                <div class="span9">
                <!--Body content-->
            

            
            