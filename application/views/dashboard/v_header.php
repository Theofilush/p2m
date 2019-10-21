<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url() ?>asett/images/favicon.png" type="image/ico" />

	<title>Universitas Pembangunan Jaya </title>

	<link href="<?php echo base_url() ?>asett/dist/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>asett/dist/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>asett/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css"
		rel="stylesheet">
	<!--<link href="<?php echo base_url() ?>asett/plugins/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">-->
	<link href="<?php echo base_url() ?>asett/plugins/iCheck/skins/all.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>asett/plugins/select2/dist/css/select2.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>asett/plugins/nprogress/nprogress.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>asett/plugins/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
		rel="stylesheet">
	<link href="<?php echo base_url() ?>asett/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"
		rel="stylesheet">
	<link href="<?php echo base_url() ?>asett/plugins/pnotify/dist/pnotify.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>asett/plugins/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>asett/dist/css/custom.css" rel="stylesheet">
</head>

<body class="nav-md"><?php foreach($da as $row){$buba= $row->author;$bubi= $row->username;$bubc= $row->NIDN; }  ?>
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="<?php echo site_url() ?>dashboard" class="site_title"><i class="fa fa-500px "></i>
							<span>LP2M</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="<?php echo base_url() ?>asett/images/user2.png" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2><?php echo  $bubi; ?> </h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br />
					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>Dokumen</h3>
							<ul class="nav side-menu">
								<li><a href="<?php echo site_url() ?>dashboard"><i class="fa fa-home"></i>Beranda</a></li>
								<li><a><i class="fa fa-edit"></i>SumberDana Penelitian <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="<?php echo site_url() ?>penelitian/PenelitianDanaUPJ">Sumber Dana UPJ</a></li>
										<li><a href="<?php echo site_url() ?>penelitian/PenelitianDanaNonUPJ">Sumber Dana non-UPJ</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-desktop"></i>Publikasi <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="<?php echo site_url() ?>publikasi/PublikasiJurnal">Publikasi Jurnal</a></li>
										<li><a href="<?php echo site_url() ?>publikasi/BukuAjar">Buku Ajar/Teks</a></li>
										<li><a href="<?php echo site_url() ?>publikasi/Pemakalah">Pemakalah Forum Ilmiah</a></li>
										<li><a href="<?php echo site_url() ?>publikasi/HakKekayaanIntelektual">Hak Kekayaan Intelektual
												(HKI)</a></li>
										<li><a href="<?php echo site_url() ?>publikasi/LuaranLain">Luaran Lain</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-clone"></i>SumberDana Pengabdian<span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="<?php echo site_url() ?>pengabdian/PengabdianDanaUPJ">Sumber Dana UPJ</a></li>
										<li><a href="<?php echo site_url() ?>pengabdian/PengabdianDanaNonUPJ">Sumber Dana non UPJ</a></li>
									</ul>
								</li>
								<?php
                    if($buba == 'administrator'){
                  ?>
								<li><a href="<?php echo site_url() ?>users"><i class="fa fa-users"></i>Manajemen User</a></li>
								<?php
                    }
                  ?>
							</ul>
						</div>
					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('login/logout'); ?>"
							class="pull-right">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			<div class="top_nav">
				<div class="nav_menu">
					<nav>
						<div class="nav toggle">
							<a id="menu_toggle"><i class="fa fa-bars"></i></a>
						</div>

						<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
									aria-expanded="false">
									<img src="<?php echo base_url() ?>asett/images/user2.png" alt=""><?php echo  $bubi; ?>
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a href="<?php echo site_url('AddYear'); ?>"> <span class=" fa fa-plus"></span>
											Year</a></li>
									<li><a href="<?php echo site_url('pengguna/UbahPassword'); ?>"> Ubah Password</a></li>
									<li>
										<a href="<?php echo site_url('tos'); ?>">
											<span>Help</span>
										</a>
									</li>
									<li><a href="<?php echo site_url('login/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log
											Out</a></li>
								</ul>
							</li>

						</ul>
					</nav>
				</div>
			</div>
			<!-- /top navigation -->
