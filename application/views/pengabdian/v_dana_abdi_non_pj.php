<?php foreach($da as $row){$buba= $row->author;$bubi= $row->username; }  ?>
<div class="right_col" role="main">          
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h4 class="">Pengabdian Sumber Dana non-Universitas Pembangunan Jaya</h4>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-bottom: 5px;">
                        <a href="<?php echo site_url() ?>databaru/NewPengabdianNonUPJ" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>  Data Baru</a>                  
                      </div>
                    </div>
          
                    <table id="datatableku-dana-non" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Judul Pengabdian Masyarakat</th>                          
                          <th>Personil</th>
                          <th>Pengabdian</th>
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
                          <button type="button" class="btn btn-success btn-xs btnnomargin"><span class="glyphicon glyphicon-cloud-upload"></span></button>                           	
                          	<a href="<?php echo base_url().'fileupload/pengabdian_non_upj/'.$row->file  ?>" class="btn btn-danger btn-xs btnnomargin">                                                        
                               <i class="fa fa-fw fa-file-text"></i>                            
                            </a> 
                          	
                          </td>
                          <td>
                          <button type="button" class="btn btn-primary btn-xs btnnomargin"  data-toggle="modal" data-target="#modal-edit<?php echo $row->kode_penelitian;?>"><span class="glyphicon glyphicon-pencil"></span></button> 
                          <a href="<?php echo base_url(); ?>pengabdian/PengabdianDanaNonUPJ/deletedok/<?php echo $row->kode_penelitian; ?>" class="btn btn-danger btn-xs btnnomargin" onClick="return doconfirm();"><i class="glyphicon glyphicon-remove  "></i></a>
                      	   </td>
                           <td class="ketengah">
                          <span class="font_color_green"><?php echo $row->valid; ?></span>                        
                          <?php
                            if($buba === 'administrator' && ($row->valid == NULL)){
                            ?>
                            <br>
                            <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaNonUPJ/validasi/<?php echo $row->kode_penelitian; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
                            <?php
                              }
                            ?>
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

<?php
          foreach ($query as $rou) {                   
        ?>
        
<div class="modal fade bs-example-modal-lg" id="modal-edit<?php echo $rou->kode_penelitian;?>" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Publikasi Jurnal</h4>
      </div>
      <div class="modal-body">
                                <?php
                                    $atribut = array(
                                            'class' => 'form-horizontal form-label-left',
                                            'data-parsley-validate' => '',
                                            'id'=>'demo-form2'
                                    );                                        
                                        echo form_open('pengabdian/PengabdianDanaNonUPJ/updatedok',$atribut);
                                        echo form_hidden('id',$rou->kode_penelitian);
                                ?>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tahun Kegiatan
                                    </label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">                                    
                                    <select class="form-control select2_ok" style="width: 100%;" data-placeholder="Pilih Tahun" name="tahun_kegiatan">
                                    <option selected><?php echo $rou->tahun_penelitian; ?></option> 
                                            <?php 
                                        foreach($tampil_tahun as $row){
                                      ?>  
                                      <option><?php echo $row->tahun; ?></option>                      
                                      <?php
                                        }
                                      ?>   
                                  </select>
                                    </div>
                                </div>
                               <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Judul Pengabdian Masyarakat
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                    
                                    <textarea name="judul" id="judul" rows="2" cols="20" required="required" style="font-family:Tahoma;height:70px;" class="form-control col-md-7 col-xs-12"><?php echo $rou->judul; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Sumber Dana/Mitra
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input type="text" id="sumber_dana" name="sumber_dana" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $rou->sumber_dana; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Besaran Dana</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input id="besaran_dana" name="besaran_dana" class="form-control col-md-7 col-xs-12" type="text" required="required"  value="<?php echo $rou->besaran_dana; ?>">
                                    </div>
                                </div>
                               
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Ketua Peneliti *
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="penulis" id="penulis" class=" form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $rou->ketua_peneliti; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Anggota 1
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="anggota1" id="anggota1" class=" form-control col-md-7 col-xs-12" type="text"  value="<?php echo $rou->anggota_peneliti_1; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Anggota 2
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="anggota2" id="anggota2" class=" form-control col-md-7 col-xs-12" type="text" value="<?php echo $rou->anggota_peneliti_2; ?>">
                                    </div>
                                </div>
 								                                
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="reset">Reset</button>   
          <button type="submit" class="btn btn-success" name="btnUpload" value="Upload">Submit</button>
      </div>
      <?php
                echo form_close();
      ?>
    </div>
  </div>
</div>
<?php
              }              
           ?>