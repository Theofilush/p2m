
        <!-- page content -->
        <div class="right_col" role="main"><?php foreach($da as $row){$profile= $row->username; }  ?>
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Welcome, <?php echo  $profile;?> </h2>
                    <h4 class="pull-right"><?php echo tanggal();?></h4>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <h4>Please don't forget to logout after finish your work. Thanks... :)</h4>
                    </div>
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
                  <h3>Penelitian UPJ</h3>
                  <p>Data penelitian yang didanai oleh UPJ </p>
                </div>
              </div>  
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php echo $this->db->count_all('t_dana_non_upj'); ?></div>
                  <h3>Penelitian Non UPJ</h3>
                  <p>Data penelitian dana diluar UPJ</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php echo $this->db->count_all('t_dana2_upj'); ?></div>
                  <h3>Pengabdian UPJ</h3>
                  <p>Data pengabdian yang didanai oleh UPJ </p>
                </div>
              </div>  
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php echo $this->db->count_all('t_dana_non2_upj'); ?></div>
                  <h3>Pengabdian Non UPJ</h3>
                  <p>Data pengabdian dana diluar UPJ</p>
                </div>
              </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php echo $this->db->count_all('t_buku_ajar'); ?></div>
                  <h3>Buku Ajar</h3>
                  <p>Data Buku Ajar / Teks</p>
                </div>
                </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php echo $this->db->count_all('t_hki'); ?></div>
                  <h3>Hak Kekayaan Intelektual</h3>
                  <p>Data Hak Kekayaan Intelektual (HKI)</p>
                </div>
              </div>
              <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php echo $this->db->count_all('t_luaran_lain'); ?></div>
                  <h3>Luaran Lain</h3>
                  <p>Data Luaran Lain Penelitian </p>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php echo $this->db->count_all('t_forum_ilmiah'); ?></div>
                  <h3>Pemakalah</h3>
                  <p>Data Pemakalah Forum Ilmiah</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"> <?php echo $this->db->count_all('t_publikasi_jurnal'); ?></div>
                  <h3>Publikasi Jurnal</h3>
                  <p>Data Publikasi Jurnal</p>
                </div>
              </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>

          
        </div>

