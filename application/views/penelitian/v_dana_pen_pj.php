<div class="right_col" role="main">
          
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h4 class="">Penelitian Sumber Dana Universitas Pembangunan Jaya</h4>
                      <a href="#" class="btn btn-default">Jurnal Internasional</a> 
                      <a href="#" class="btn btn-default">Jurnal Naional Terakreditasi</a> 
                      <a href="#" class="btn btn-default">Jurnal Naional Tidak Terakreditasi (Mempunyai ISSN)</a>                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-bottom: 5px;">
                        <a href="<?php echo site_url() ?>databaru/NewPenelitianUPJ" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>  Data Baru</a>                  
                      </div>
                    </div>

                    <table id="datatableku-dana" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Judul</th>                          
                          <th>Personil</th>
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
                          <td><b><?php echo $row->judul_penelitian; ?></b></td>
                          <td>
                            Ketua :&nbsp;<span class="font_color_blue"><?php echo $row->ketua_peneliti; ?></span><br>
                            Anggota 1 :&nbsp;<span class="font_color_blue"> <?php echo $row->anggota_peneliti_1; ?> </span><br>
                            Anggota 2 :&nbsp;<span class="font_color_blue"> <?php echo $row->anggota_peneliti_2; ?> </span><br>
                          </td>
                          <td>                            
                            Jenis Penelitian :&nbsp;<span class="font_color_blue"><?php echo $row->jenis_penelitian; ?></span><br>
                          </td>
                          <td>
                          Dana Usulan :&nbsp;<span class="font_color_blue"><?php echo $row->dana_usulan; ?></span><br>
                          Dana Disetujui :&nbsp;<span class="font_color_blue"><?php echo $row->dana_disetujui; ?></span><br>
                          </td>
                          <td>                            
                            <b><?php echo $row->tahun_hibah; ?></b><br>                          	
                          </td>
                          <td>
                          <button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-cloud-upload"></span></button> 
                          <a href="<?php echo base_url().'fileupload/'.$row->file  ?>" class="btn btn-warning btn-xs">                                                        
                               <i class="fa fa-fw fa-file-text"></i>                            
                          </a>
                          </td>
                          <td>
                            <button type="button" class="btn btn-primary btn-xs"  data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-pencil"></span></button>                            
                          	<button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>                           
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


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
          <h4>Text in a modal</h4>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
          <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>