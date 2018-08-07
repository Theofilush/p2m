<?php foreach($da as $row){$buba= $row->author;$bubi= $row->username; }  ?>
<div class="right_col" role="main">          
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="x_panel">
                  <div class="x_title">
                  <?php echo $this->session->flashdata('notification')?>  
                      <h4 class="">Hak Kekayaan Intelektual (HKI)</h4>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-bottom: 5px;">
                        <a href="<?php echo site_url() ?>databaru/NewHKI" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>  Data Baru</a>
                      </div>
                      <a href="<?php echo site_url() ?>publikasi/HakKekayaanIntelektual/exportexcel" class="btn btn-success pull-right">Excel <i class="fa fa-file-excel-o"></i> </a>
                    </div>
          
                    <table id="datatableku3" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
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
                            NIDN :&nbsp;<span class="font_color_blue"><?php $query_tampil_nidn1=$this->db->query('SELECT * FROM t_hki JOIN t_login ON t_login.username=t_hki.nama_dosen WHERE id_hki='.$row->id_hki);
                                    foreach ($query_tampil_nidn1->result_array() as $nidn1) {
                                      echo $nidn1['NIDN'];                
                                     } 
                                    ?></span><br> 
                            <?php
                                if($row->nama_dosen1 != NULL){
                                ?>         
                                    <b><?php echo $row->nama_dosen1; ?></b><br>
                                    NIDN :&nbsp;<span class="font_color_blue"><?php $query_tampil_nidn1=$this->db->query('SELECT * FROM t_hki JOIN t_login ON t_login.username=t_hki.nama_dosen1 WHERE id_hki='.$row->id_hki);
                                    foreach ($query_tampil_nidn1->result_array() as $nidn1) {
                                      echo $nidn1['NIDN'];                
                                     } 
                                    ?></span><br>                                    
                                <?php
                                  }
                                ?>     
                                <?php
                                if($row->nama_dosen2 != NULL){
                                ?>         
                                     <b><?php echo $row->nama_dosen2; ?></b><br>
                                    NIDN :&nbsp;<span class="font_color_blue"><?php $query_tampil_nidn1=$this->db->query('SELECT * FROM t_hki JOIN t_login ON t_login.username=t_hki.nama_dosen2 WHERE id_hki='.$row->id_hki);
                                    foreach ($query_tampil_nidn1->result_array() as $nidn1) {
                                      echo $nidn1['NIDN'];                
                                     } 
                                    ?></span><br>                                   
                                <?php
                                  }
                                ?>                             
                          </td>
                          <td>
                            <b><?php echo $row->judul_hki; ?></b><br>                           
                          </td>
                          <td>                           
                            Jenis  :&nbsp;<span class="font_color_blue"><b><?php echo $row->jenis_hki; ?></b></span><br>
                            No. Pendaftaran :&nbsp;<span class="font_color_blue"> <?php echo $row->no_pendaftaran ; ?></span><br>
                            Status :&nbsp;<span class="font_color_blue"> <?php echo $row->status_hki; ?> </span><br>
                            No. HKI :&nbsp;<span class="font_color_blue"> <?php echo $row->no_hki; ?> </span><br>
                          </td>                          
                          <td class="ketengah">
                          <?php
                          if ($buba == 'administrator' || ($row->valid == "TIDAK" || $row->valid == NULL)) {
                            if($buba == 'administrator' || ($bubi ==  $row->nama_dosen || ($bubi ==  $row->nama_dosen1) || ($bubi ==  $row->nama_dosen2))){
                            ?>
                            <button type="button" class="btn btn-success btn-xs btnnomargin"  data-toggle="modal" data-target="#modal-upload<?php echo $row->id_hki;?>"><span class="glyphicon glyphicon-cloud-upload"></span></button> 
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
                                <a href="<?php echo site_url().'fileupload/hki/'.$row->file  ?>" class="btn btn-danger btn-xs btnnomargin"><i class="fa fa-fw fa-file-text"></i></a>
                                <?php
                            }
                            ?>
                            <?php
                              }}
                            ?>                           
                          </td>                          
                          <td class="ketengah">  
                          <?php
                          if ($buba == 'administrator' || ($row->valid == "TIDAK" || $row->valid == NULL)) {
                            if($buba == 'administrator' || ($bubi ==  $row->nama_dosen || ($bubi ==  $row->nama_dosen1) || ($bubi ==  $row->nama_dosen2))){
                            ?>                            
                            <a href="<?php echo site_url(); ?>publikasi/HakKekayaanIntelektual/editdok/<?php echo $row->id_hki; ?>" class="btn btn-primary btn-xs btnnomargin" ><i class="glyphicon glyphicon-pencil  "></i></a>
                          	<a href="<?php echo site_url(); ?>publikasi/HakKekayaanIntelektual/deletedok/<?php echo $row->id_hki; ?>" class="btn btn-danger btn-xs btnnomargin" onClick="return doconfirm();"><i class="glyphicon glyphicon-remove  "></i></a>
                             <?php
                              }}
                            ?> 
                          </td>
                          <td class="ketengah">
                          <?php
                            if($row->valid == "TIDAK") {
                            echo '<span class="font_color_red">'.$row->valid.'</span>';                            
                              } elseif ($row->valid == "YA" ) {
                            echo '<span class="font_color_green">'.$row->valid.'</span>';                          
                              }                            
                            if($buba == 'administrator' && ($row->valid == NULL)) {
                            ?>                            
                              <a href="<?php echo site_url(); ?>publikasi/HakKekayaanIntelektual/validasi/<?php echo $row->id_hki; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
                              <a href="<?php echo site_url(); ?>publikasi/HakKekayaanIntelektual/tolakvalidasi/<?php echo $row->id_hki; ?>" class="btn btn-xs btn-hitam btnnomargin"><i class="fa fa-thumbs-down"></i></a>
                            <?php
                              } elseif ($buba == 'administrator' && ($row->valid ==  "TIDAK") ) {
                            ?>
                              <a href="<?php echo site_url(); ?>publikasi/HakKekayaanIntelektual/validasi/<?php echo $row->id_hki; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
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
        
<div class="modal fade bs-example-modal-lg" id="modal-edit<?php echo $rou->id_hki;?>" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Hak Kekayaan Intelektual (HKI)</h4>
      </div>
      <div class="modal-body">
                                <?php
                                    $atribut = array(
                                            'class' => 'form-horizontal form-label-left',
                                            'data-parsley-validate' => '',
                                            'id'=>'demo-form2'
                                    );                                        
                                        echo form_open('publikasi/HakKekayaanIntelektual/updatedok',$atribut);
                                        echo form_hidden('id',$rou->id_hki);
                                ?>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tahun Pelaksanaan
                                    </label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">                                    
                                    <select class="form-control select2_ok" style="width: 100%;" data-placeholder="Pilih Tahun" name="tahun_publikasi">
                                    <option selected><?php echo $rou->tahun_pelaksanaan; ?></option> 
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
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Judul HKI
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                    
                                    <textarea name="judul" id="judul" rows="2" cols="20" required="required" style="font-family:Tahoma;height:70px;" class="form-control col-md-7 col-xs-12"><?php echo $rou->judul_hki; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Jenis
                                    </label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">                                    
                                    <select class="form-control" style="width: 100%;" data-placeholder="Pilih Jenisnya" name="jenis">
                                      <option selected><?php echo $rou->jenis_hki; ?></option> 
                                      <?php 
												foreach($jenis_karya as $row){
											?>  
											<option><?php echo $row->jenis_hki; ?></option>                      
											<?php
												 }
											?>   
									</select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">No. Pendaftaran</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input id="no_daftar" name="no_daftar" class="form-control col-md-7 col-xs-12" type="text" required="required"  value="<?php echo $rou->no_pendaftaran; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Status</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                    
                                    <select class="form-control" style="width: 100%;" data-placeholder="Pilih Tingkatan" name="status">
                                           
                                               <?php 
                                          foreach($status_karya as $row){
                                        ?>                          
                                        <option <?php if (($rou->status_hki =='Jurnal Internasional') && ($row->status_pemakalah =='Jurnal Internasional')) {
                                            echo 'selected'; 
                                          }elseif (($rou->status_hki =='Jurnal Naional Terakreditasi') && ($row->status_pemakalah =='Jurnal Naional Terakreditasi')) {
                                            echo 'selected'; 
                                          }elseif (($rou->status_hki =='Jurnal Naional Tidak Terakreditasi (Mempunyai ISSN)') && ($row->status_pemakalah =='Jurnal Naional Tidak Terakreditasi (Mempunyai ISSN)')) {
                                            echo 'selected'; 
                                          } 
                                          echo '>'.$row->status_hki;
                                          ?> 
                                        </option>
                                        <?php
                                          }
                                        ?>
                                    </select>
                                    </div>
                                </div>  
                                <div class="form-group" id="nomor_hki">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">No. HKI</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="no_hki" id="no_hki" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $rou->no_hki; ?>">
                                    </div>
                                </div>                              
                                <div class="ln_solid"></div>
                                <h4>Personil Dosen</h4>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Dosen * </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                        
                                        <select class="form-control select2_ok" style="width: 100%;" data-placeholder="Personil" name="pesan_penulis">                                            
                                        <option><?php echo $rou->nama_dosen; ?></option>
                                            <?php 
                                              foreach($tampil_dosen as $row){
                                                if($row->author != "administrator"){
                                            ?>  
                                            <option><?php echo $row->username; ?></option>                      
                                            <?php
                                            }
                                              }
                                            ?>   
                                        </select>
                                    </div>                                   
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Anggota 1 </label>                                
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                        
                                        <select class="form-control select2_ok" style="width: 100%;" data-placeholder="Anggota 1" name="pesan_penulis2">
                                          <option><?php echo $rou->nama_dosen1; ?></option>
                                            <?php 
                                              foreach($tampil_dosen as $row){
                                                if($row->author != "administrator"){
                                            ?>  
                                            <option><?php echo $row->username; ?></option>                      
                                            <?php
                                            }
                                              }
                                            ?>   
                                        </select>
                                    </div>     
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Anggota 2 </label>                                  
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                        
                                        <select class="form-control select2_ok" style="width: 100%;" data-placeholder="Anggota 2" name="pesan_penulis3">                                            
                                        <option><?php echo $rou->nama_dosen2; ?></option>
                                        <?php 
                                              foreach($tampil_dosen as $row){
                                                if($row->author != "administrator"){
                                            ?>  
                                            <option><?php echo $row->username; ?></option>                      
                                            <?php
                                            }
                                              }
                                            ?>   
                                        </select>
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
<div class="modal fade" id="modal-upload<?php echo $rou->id_hki;?>" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Hak Kekayaan Intelektual (HKI)</h4>
      </div>
      <div class="modal-body">
                                <?php
                                    $atribut = array(
                                            'class' => 'form-horizontal form-label-left',
                                            'data-parsley-validate' => '',
                                            'id'=>'demo-form2'
                                    );                                        
                                        echo form_open_multipart('publikasi/HakKekayaanIntelektual/uploaddok/',$atribut);
                                        echo form_hidden('id',$rou->id_hki);
                                ?>                                                             
                                <div class="form-group">
                                 <input type="file" class="form-control" name="filepdf" id="upload" accept="application/pdf" required />
                                 Ukuran file  maksimum 5 MB
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