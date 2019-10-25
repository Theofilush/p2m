<!-- page content -->
<div class="right_col" role="main"><?php foreach($da as $row){$profile= $row->username; }  ?>
	<div class="row tile_count" style="margin-bottom:0;text-align:center;">
		<div>
			<div class="col-md-offset-2  col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<span class="count_top"><i class="fa fa-bookmark"></i> Total Penelitian</span>
				<div class="count"><?php echo $jml_raise_liti; ?></div>
				<span class="count_bottom">Penelitian</span>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<span class="count_top"><i class="fa fa-archive"></i> Total Pengabdian</span>
				<div class="count"><?php echo $jml_raise_abdi; ?></div>
				<span class="count_bottom">Pengabdian</span>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<span class="count_top"><i class="fa fa-book"></i> Total Publikasi</span>
				<div class="count"><?php echo $jml_raise_publi; ?></div>
				<span class="count_bottom">
					<!--<i class="green"><i class="fa fa-sort-asc"></i>34% </i> -->Publikasi</span>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
				<span class="count_top"><i class="fa fa-user"></i> Total Dosen</span>
				<div class="count"><?php echo $this->db->count_all('t_login'); ?></div>
				<span class="count_bottom"> Kontributor</span>
				<!--<span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>-->
			</div>
		</div>
	</div>
	<!-- /top tiles -->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Welcome, <?php echo  $profile;?> </h2>
					<h4 class="pull-right"><?php echo tanggal();?></h4>

					<!--<?php
                    foreach($total_penelitian as $rowc){ //menampilkan jumlah setiap prodi pada publikasi                    
                      ?>
                      <h5><?php echo $rowc;?></h5>
                      
                      <?php
                    }
                    ?>-->
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<h4>Please don't forget to logout after finish your work. Thanks... :)</h4>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<canvas id="lineCharta"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Data Penelitian </h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<canvas id="mybarCharta"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Data Pengabdian </h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<canvas id="mybarChartb"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Data Publikasi </h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<canvas id="mybarChartc"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Top 5 Prodi </h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<canvas id="canvasDoughnuta"></canvas>
				</div>
			</div>
		</div>
	</div>
	<!-- top tiles -->
	<div class="row top_tiles">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<div class="x_panel">
				<div class="x_title">
					<h4>Data yang dimiliki Universitas Pembangunan Jaya</h4>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<div class="icon"><i class="fa fa-check-square-o"></i></div>
								<div class="count"><?php echo $this->db->count_all('t_dana_upj'); ?></div>
								<a href="<?php echo site_url() ?>penelitian/PenelitianDanaUPJ">
									<h3 class="hoverku">Penelitian UPJ</h3>
									<p>Data penelitian yang didanai oleh UPJ </p>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<div class="icon"><i class="fa fa-check-square-o"></i></div>
								<div class="count"><?php echo $this->db->count_all('t_dana_non_upj'); ?></div>
								<a href="<?php echo site_url() ?>penelitian/PenelitianDanaNonUPJ">
									<h3 class="hoverku">Penelitian Non UPJ</h3>
									<p>Data penelitian dana diluar UPJ</p>
								</a>
							</div>
						</div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<div class="icon"><i class="fa fa-check-square-o"></i></div>
								<div class="count"><?php echo $this->db->count_all('t_dana_upj'); ?></div>
								<a href="<?php echo site_url() ?>penelitian/KemenristekDikti">
									<h3 class="hoverku">Kemenristek Dikti</h3>
									<p>Data penelitian yang didanai oleh Kemenristek Dikti </p>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<div class="icon"><i class="fa fa-check-square-o"></i></div>
								<div class="count"><?php echo $this->db->count_all('t_dana2_upj'); ?></div>
								<a href="<?php echo site_url() ?>pengabdian/PengabdianDanaUPJ">
									<h3 class="hoverku">Pengabdian UPJ</h3>
									<p>Data pengabdian yang didanai oleh UPJ </p>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<div class="icon"><i class="fa fa-check-square-o"></i></div>
								<div class="count"><?php echo $this->db->count_all('t_dana_non2_upj'); ?></div>
								<a href="<?php echo site_url() ?>pengabdian/PengabdianDanaNonUPJ">
									<h3 class="hoverku">Pengabdian Non UPJ</h3>
									<p>Data pengabdian dana diluar UPJ</p>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<div class="icon"><i class="fa fa-check-square-o"></i></div>
								<div class="count"><?php echo $this->db->count_all('t_buku_ajar'); ?></div>
								<a href="<?php echo site_url() ?>publikasi/BukuAjar">
									<h3 class="hoverku">Buku Ajar</h3>
									<p>Data Buku Ajar / Teks</p>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<div class="icon"><i class="fa fa-check-square-o"></i></div>
								<div class="count"><?php echo $this->db->count_all('t_hki'); ?></div>
								<a href="<?php echo site_url() ?>publikasi/HakKekayaanIntelektual">
									<h3 class="hoverku">Hak Kekayaan Intelektual</h3>
									<p>Data Hak Kekayaan Intelektual (HKI)</p>
								</a>
							</div>
						</div>
						<div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<div class="icon"><i class="fa fa-check-square-o"></i></div>
								<div class="count"><?php echo $this->db->count_all('t_luaran_lain'); ?></div>
								<a href="<?php echo site_url() ?>publikasi/LuaranLain">
									<h3 class="hoverku">Luaran Lain</h3>
									<p>Data Luaran Lain Penelitian </p>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<div class="icon"><i class="fa fa-check-square-o"></i></div>
								<div class="count"><?php echo $this->db->count_all('t_forum_ilmiah'); ?></div>
								<a href="<?php echo site_url() ?>publikasi/Pemakalah">
									<h3 class="hoverku">Pemakalah</h3>
									<p>Data Pemakalah Forum Ilmiah</p>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="tile-stats">
								<div class="icon"><i class="fa fa-check-square-o"></i></div>
								<div class="count"> <?php echo $this->db->count_all('t_publikasi_jurnal'); ?></div>
								<a href="<?php echo site_url() ?>publikasi/PublikasiJurnal">
									<h3 class="hoverku">Publikasi Jurnal</h3>
									<p>Data Publikasi Jurnal</p>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>
