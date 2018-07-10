<div class="right_col" role="main">
          
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h4 class="">Penelitian Sumber Dana non-Universitas Pembangunan Jaya</h4>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-bottom: 5px;">
                        <a href="http://localhost/docen/list/AddDocument" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>  Data Baru</a>                  
                      </div>
                    </div>
          
                    <table id="datatable-dana-non" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Judul</th>                          
                          <th>Pesornil</th>
                          <th>Penelitian</th>
                          <th>Dana</th>
                          <th>Tahun Penelitian</th>
                          <th>Berkas</th>
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
                          <td><b><?php echo $row->judul; ?></b></td>
                          <td>
                            Ketua :&nbsp;<span class="font_color_blue"><?php echo $row->ketua_peneliti; ?></span><br>
                            Anggota 1 :&nbsp;<span class="font_color_blue"> <?php echo $row->anggota_peneliti_1; ?> </span><br>
                            Anggota 2 :&nbsp;<span class="font_color_blue"> <?php echo $row->anggota_peneliti_2; ?> </span><br>
                          </td>
                          <td>                            
                            -
                          </td>
                          <td>
                          Sumber Dana :&nbsp;<span class="font_color_blue"><?php echo $row->sumber_dana; ?></span><br>
                          Besaran Dana :&nbsp;<span class="font_color_blue"><?php echo $row->besaran_dana; ?></span><br>
                          </td>
                          <td>                            
                            <b><?php echo $row->tahun_penelitian; ?></b><br>                          	
                          </td>
                          <td>
                          <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-cloud-upload"></span></button> 
                          	<button type="button" class="btn btn-danger"><i class="fa fa-fw fa-file-text"></i></button> 
                          	<!--<input type="image" src="<?php echo base_url() ?>asett/images/icon/upload.png"> 
                            <input type="image" src="<?php echo base_url() ?>asett/images/icon/pdf.png">-->
                              <?php echo $row->file; ?></b>
                          	
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