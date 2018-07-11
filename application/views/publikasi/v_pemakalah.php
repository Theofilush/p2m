<div class="right_col" role="main">
          
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h4 class="">Pemakalah Forum Ilmiah</h4>
                      <a href="#" class="btn btn-default">Tingkat Internasional</a> 
                      <a href="#" class="btn btn-default">Tingkat Naional</a> 
                      <a href="#" class="btn btn-default">Regional</a>                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-bottom: 5px;">
                        <a href="<?php echo site_url() ?>databaru/NewForumIlmiah" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>  Data Baru</a>                  
                      </div>
                    </div>
          
                    <table id="datatableku2" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Dosen</th>
                          <th>Judul Makalah</th>                        
                          <th>Penyelenggara</th>
                          <th>Berkas Makalah</th>                          
                          <th>Edit</th>
                          <th>Valid</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1; 
                        foreach($query as $row){                   
                        ?> 
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><b><?php echo $row->nama_dosen; ?></b><br>
                            NIDN :&nbsp;<span class="font_color_blue">XXX-XXX-XXX-XXXX-X</span><br>
                            Status :&nbsp;<span class="font_color_blue">XXX-XXX-XXX-XXXX-X</span>
                          </td>
                          <td>
                            <b><?php echo $row->judul_makalah; ?></b><br>
                            Forum :&nbsp;<span class="font_color_blue"><?php echo $row->nama_forum; ?></span><br>
                          </td>
                          <td>                           
                            Institusi  :&nbsp;<span class="font_color_blue"><b><?php echo $row->institusi_penyelenggara; ?></b></span><br>
                            Tgl. :&nbsp;<span class="font_color_blue"> <?php echo $row->waktu_pelakasana_awal; ?> s/d  <?php echo $row->waktu_pelakasana_akhir; ?></span><br>
                            Tempat :&nbsp;<span class="font_color_blue"> <?php echo $row->tempat_pelaksana; ?> </span><br>                            
                          </td>                          
                          <td>
                          <td>
                          	<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-cloud-upload"></span></button> 
                          	<button type="button" class="btn btn-danger"><i class="fa fa-fw fa-file-text"></i></button> 
                          	<!--<input type="image" src="<?php echo base_url() ?>asett/images/icon/upload.png"> 
                            <input type="image" src="<?php echo base_url() ?>asett/images/icon/pdf.png">-->
                          </td>
                          </td>
                          <td>
                          	<button type="button" class="btn btn-gray"><span class="glyphicon glyphicon-pencil"></span></button> 
                          	<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button> 
                          </td>
                          <td>
                          	<span class="font_color_green"><?php echo $row->valid; ?></span><?php echo $row->valid; ?> 
                      	   </td>                         
                        </tr>
                        <?php
                         }
                        ?>
                      </tbody>
                    </table>
          
                  </div>
                </div>
              </div>
          </div>
</div>