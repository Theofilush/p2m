<?php foreach($da as $row){$buba= $row->author;$bubi= $row->username; }  ?>
<div class="right_col" role="main">          
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="x_panel">
                  <div class="x_title">
                    <p ><?php echo $this->session->flashdata('notification')?></p>  
                      <h4 class="">Pemakalah Forum Ilmiah</h4>          
                      <button class="btn btn-default btn-sm" id="reset2">Reset</button>
                      <button class="btn btn-default btn-sm" id="dragId4">Tingkat Internasional</button>
                      <button class="btn btn-default btn-sm" id="dragId5">Tingkat Nasional</button>
                      <button class="btn btn-default btn-sm" id="dragId6">Regional</button>          
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-bottom: 5px;">
                        <a href="<?php echo site_url() ?>databaru/NewForumIlmiah" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>  Data Baru</a>                  
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
                            <?php
                                if($row->nama_dosen1 !== NULL){
                                ?>         
                                    <b><?php echo $row->nama_dosen1; ?></b><br>
                                    NIDN :&nbsp;<span class="font_color_blue">XXX-XXX-XXX-XXXX-X</span><br>                                    
                                <?php
                                  }
                                ?>     
                                <?php
                                if($row->nama_dosen2 !== NULL){
                                ?>         
                                     <b><?php echo $row->nama_dosen2; ?></b><br>
                                    NIDN :&nbsp;<span class="font_color_blue">XXX-XXX-XXX-XXXX-X</span><br>                                   
                                <?php
                                  }
                                ?>   
                                 Status :&nbsp;<span class="font_color_blue"><?php echo $row->status_pemakalah; ?></span>
                                 <b hidden><?php echo $row->cakupan_forum_ilmiah;?></b><br>
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
                          <td class="ketengah">
                          <button type="button" class="btn btn-success btn-xs btnnomargin"  data-toggle="modal" data-target="#modal-upload<?php echo $row->id_perumi;?>"><span class="glyphicon glyphicon-cloud-upload"></span></button> 
                          	<?php
                            if(($row->file == NULL) || ($row->file == "")){
                            ?>                                
                                <button class="btn btn-default btn-xs btnnomargin source" onclick="
                              new PNotify({
                                  title: 'Terjadi Kesalahan !',
                                  text: 'Berkas Pendukung belum diunggah !',
                                  type: 'error',
                                  delay: 5000,
                                  styling: 'bootstrap3'
                                });  
                              "><i class="fa fa-fw fa-file-text"></i></button>
                                <?php
                            }else if(($row->file != NULL) || ($row->file != "") ){
                                ?>
                                <a href="<?php echo site_url().'fileupload/pemakalah/'.$row->file  ?>" class="btn btn-danger btn-xs btnnomargin"><i class="fa fa-fw fa-file-text"></i></a>
                                <?php
                            }
                            ?>
                          </td>                         
                          <td class="ketengah">                          	
                            <button type="button" class="btn btn-primary btn-xs btnnomargin"  data-toggle="modal" data-target="#modal-edit<?php echo $row->id_perumi;?>"><span class="glyphicon glyphicon-pencil"></span></button> 
                            <a href="<?php echo site_url(); ?>publikasi/Pemakalah/deletedok/<?php echo $row->id_perumi; ?>" class="btn btn-danger btn-xs btnnomargin" onClick="return doconfirm();"><i class="glyphicon glyphicon-remove  "></i></a>                             
                          </td>
                          <td class="ketengah">
                          <span class="font_color_green"><?php echo $row->valid; ?></span>                        
                          <?php
                            if($buba === 'administrator' && ($row->valid == NULL)){
                            ?>
                            <br>
                            <a href="<?php echo site_url(); ?>publikasi/Pemakalah/validasi/<?php echo $row->id_perumi; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
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

           <?php
          foreach ($query as $rou) {                   
        ?>
        
<div class="modal fade" id="modal-edit<?php echo $rou->id_perumi;?>" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Pemakalah Forum Ilmiah</h4>
      </div>
      <div class="modal-body">
                                <?php
                                    $atribut = array(
                                            'class' => 'form-horizontal form-label-left',
                                            'data-parsley-validate' => '',
                                            'id'=>'demo-form2'
                                    );                                        
                                        echo form_open('publikasi/pemakalah/updatedok',$atribut);
                                        echo form_hidden('id',$rou->id_perumi);
                                ?>     
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Data Publikasi Tingkat
                                    </label>
                                    <div class="col-md-7 col-sm- col-xs-12">                                    
                                    <select class="form-control" style="width: 100%;" data-placeholder="Pilih Cakupan" name="tingkat">
                                        <?php 
                                          foreach($cakupan2 as $row){
                                        ?>  
                                         <option <?php if (($rou->cakupan_forum_ilmiah=='Tingkat Internasional') && ($row->cakupan_forum_ilmiah =='Tingkat Internasional')) {
                                            echo 'selected'; 
                                          }elseif (($rou->cakupan_forum_ilmiah =='Tingkat Nasional') && ($row->cakupan_forum_ilmiah =='Tingkat Nasional')) {
                                            echo 'selected'; 
                                          }elseif (($rou->cakupan_forum_ilmiah =='Regional') && ($row->cakupan_forum_ilmiah =='Regional')) {
                                            echo 'selected'; 
                                          } 
                                          echo '>'.$row->cakupan_forum_ilmiah;
                                          ?> 
                                        </option> 
                                        <?php
                                          }
                                        ?>                                         
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tahun Pelaksanaan
                                    </label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">                                    
                                    <select class="form-control select2_ok" style="width: 100%;" data-placeholder="Pilih Tahun" name="tahun_publikasi">
                                      <option selected><?php echo $rou->tahun_pelaksanaan; ?></option> 
                                            <?php 
                                        foreach($tampil_tahun as $row1){
                                          ?>  
                                          <option><?php echo $row1->tahun; ?></option> 
                                      <?php
                                        }
                                      ?>   
								                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Judul Makalah
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                    
                                    <textarea name="judul" id="judul" rows="2" cols="20" required="required" style="font-family:Tahoma;height:70px;" class="form-control col-md-7 col-xs-12"><?php echo $rou->judul_makalah; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Forum
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input type="text" id="nama_forum" name="nama_forum" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rou->nama_forum; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Institusi Penyelenggara</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input id="institusi" name="institusi" class="form-control col-md-7 col-xs-12" type="text" required="required" value="<?php echo $rou->institusi_penyelenggara; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Waktu Pelaksanaan
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-5">                                     
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input name="waktu_awal" type="text" class="form-control pull-right" id="kalenderku1"  value="<?php echo $rou->waktu_pelakasana_awal; ?>">
                                        </div>                       
                                    </div>
                                    <label class="control-label col-md-1 col-sm-1 col-xs-2" style="text-align:center"> s/d </label>
                                    <div class="col-md-3 col-sm-3 col-xs-5">                                     
                                     <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input name="waktu_akhir" type="text" class="form-control pull-right" id="kalenderku2"  value="<?php echo $rou->waktu_pelakasana_akhir; ?>">
                                        </div>    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tempat Pelaksanaan
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="tempat" id="tempat" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $rou->tempat_pelaksana; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Status
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">                                    
                                    <select class="form-control" style="width: 100%;" data-placeholder="Pilih Status" name="status" value="<?php echo $rou->status_pemakalah; ?>">                                        
                                        <?php 
                                          foreach($status_speaker as $row){
                                        ?>  
                                         <option <?php if (($rou->status_pemakalah=='Invited / Keynote Speaker') && ($row->status_pemakalah =='Invited / Keynote Speaker')) {
                                            echo 'selected'; 
                                          }elseif (($rou->status_pemakalah =='Pemakalah Biasa') && ($row->status_pemakalah =='Pemakalah Biasa')) {
                                            echo 'selected'; 
                                          }
                                          echo '>'.$row->status_pemakalah;
                                          ?> 
                                        </option> 
                                        <?php
                                          }
                                        ?>   
                                    </select>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Pemakalah *
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="penulis" id="penulis" class=" form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $rou->nama_dosen; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Anggota 1
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="anggota1" id="anggota1" class=" form-control col-md-7 col-xs-12" type="text" value="<?php echo $rou->nama_dosen1; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Anggota 2
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="anggota2" id="anggota2" class=" form-control col-md-7 col-xs-12" type="text" value="<?php echo $rou->nama_dosen2; ?>">
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

 <?php
    foreach ($query as $rou) {                   
  ?>        
<div class="modal fade" id="modal-upload<?php echo $rou->id_perumi;?>" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Pemakalah Forum Ilmiah</h4>
      </div>
      <div class="modal-body">
                                <?php
                                    $atribut = array(
                                            'class' => 'form-horizontal form-label-left',
                                            'data-parsley-validate' => '',
                                            'id'=>'demo-form2'
                                    );                                        
                                        echo form_open_multipart('publikasi/Pemakalah/uploaddok/',$atribut);
                                        echo form_hidden('id',$rou->id_perumi);
                                ?>                                                             
                                <div class="form-group">
                                 <input type="file" class="form-control" name="filepdf" id="upload" accept="application/pdf" required />
                                </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
          <button type="submit" class="btn btn-success" name="btnUpload" value="Upload">Unggah</button>
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