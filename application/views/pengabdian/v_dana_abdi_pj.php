<?php foreach($da as $row){$buba= $row->author;$bubi= $row->username; }  ?>
<div class="right_col" role="main">          
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="x_panel">
                  <div class="x_title">
                    <?php echo $this->session->flashdata('notification')?>
                      <h4 class="">Pengabdian  Sumber Dana Universitas Pembangunan Jaya</h4>
                      <!--<button class="btn btn-default btn-sm" id="reset">Reset</button>
                      <button class="btn btn-default btn-sm" id="dragId7">Jurnal Internasional</button>
                      <button class="btn btn-default btn-sm" id="dragId8">Jurnal Nasional Terakreditasi</button>
                      <button class="btn btn-default btn-sm" id="dragId9">Jurnal Nasional Tidak Terakreditasi (Mempunyai ISSN)</button>-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-bottom: 5px;">
                        <a href="<?php echo site_url() ?>databaru/NewPengabdianUPJ" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>  Data Baru</a>                  
                      </div>
                      <a href="<?php echo site_url() ?>pengabdian/PengabdianDanaUPJ/exportexcel" class="btn btn-success pull-right">Excel <i class="fa fa-file-excel-o"></i> </a>
                    </div>
           
                    <table id="datatableku-dana" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
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
                          <?php
                          if ($buba == 'administrator' || ($row->valid == "TIDAK" || $row->valid == NULL)) {
                            if($buba == 'administrator' || ($bubi ==  $row->ketua_peneliti || ($bubi ==  $row->anggota_peneliti_1) || ($bubi ==  $row->anggota_peneliti_2))){
                            ?>
                            <button type="button" class="btn btn-success btn-xs btnnomargin"  data-toggle="modal" data-target="#modal-upload<?php echo $row->kode_penelitan;?>"><span class="glyphicon glyphicon-cloud-upload"></span></button> 
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
                                <a href="<?php echo site_url().'fileupload/pengabdian_upj/'.$row->file  ?>" class="btn btn-danger btn-xs btnnomargin"><i class="fa fa-fw fa-file-text"></i></a>
                                <?php
                            }
                              }}
                            ?> 
                          
                          </td>
                          <td>
                          <?php 
                          if ($buba == 'administrator' || ($row->valid == "TIDAK" || $row->valid == NULL)) {
                            if($buba == 'administrator' || ($bubi ==  $row->ketua_peneliti || ($bubi ==  $row->anggota_peneliti_1) || ($bubi ==  $row->anggota_peneliti_2))){
                            ?>                            
                            <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaUPJ/editdok/<?php echo $row->kode_penelitan; ?>" class="btn btn-primary btn-xs btnnomargin" ><i class="glyphicon glyphicon-pencil  "></i></a>
                            <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaUPJ/deletedok/<?php echo $row->kode_penelitan; ?>" class="btn btn-danger btn-xs btnnomargin" onClick="return doconfirm();"><i class="glyphicon glyphicon-remove  "></i></a> 
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
                              <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaUPJ/validasi/<?php echo $row->kode_penelitan; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
                              <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaUPJ/tolakvalidasi/<?php echo $row->kode_penelitan; ?>" class="btn btn-xs btn-hitam btnnomargin"><i class="fa fa-thumbs-down"></i></a>
                            <?php
                              } elseif ($buba == 'administrator' && ($row->valid ==  "TIDAK") ) {
                            ?>
                              <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaUPJ/validasi/<?php echo $row->kode_penelitan; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
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
        
<div class="modal fade bs-example-modal-lg" id="modal-edit<?php echo $rou->kode_penelitan;?>" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Pengabdian Sumber Dana Universitas Pembangunan Jaya</h4>
      </div>
      <div class="modal-body">
                                <?php
                                    $atribut = array(
                                            'class' => 'form-horizontal form-label-left',
                                            'data-parsley-validate' => '',
                                            'id'=>'demo-form2'
                                    );                                        
                                        echo form_open('pengabdian/PengabdianDanaUPJ/updatedok',$atribut);
                                        echo form_hidden('id',$rou->kode_penelitan);
                                ?>
                                <!--<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tahun Kegiatan
                                    </label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">                                    
                                    <select class="form-control select2_ok" style="width: 100%;" data-placeholder="Pilih Tahun" name="tahun_kegiatan">
                                    <option selected><?php echo $rou->tahun_hibah; ?></option>   
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
                                    <textarea name="judul" id="judul" rows="2" cols="20" required="required" style="font-family:Tahoma;height:70px;" class="form-control col-md-7 col-xs-12"><?php echo $rou->judul_penelitian; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Jenis Pengabdian Masyarakat
                                    </label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">                                   
                                    <select class="form-control" style="width: 100%;" data-placeholder="Pilih Jenis" name="jenis">                                          
                                        <?php 
                                          foreach($tampil_jenis as $hai){
                                        ?>                          
                                        <option <?php if (($rou->jenis_penelitian =='IPTEK bagi Kewirausahaan') && ($hai->jenis_pengabdian =='IPTEK bagi Kewirausahaan')) {
                                            echo 'selected'; 
                                          }elseif (($rou->jenis_penelitian =='IPTEK bagi Masyarakat') && ($hai->jenis_pengabdian =='IPTEK bagi Masyarakat')) {
                                            echo 'selected'; 
                                          }
                                          echo '>'.$hai->jenis_pengabdian;
                                          ?> 
                                        <?php
                                          }
                                        ?>                                         
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Dana Usulan</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input id="dana_usulan" name="dana_usulan" class="form-control col-md-7 col-xs-12" type="text" required="required" value="<?php echo $rou->dana_usulan; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Dana Disetujui</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="dana_setujui" id="dana_setujui" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $rou->dana_disetujui; ?>">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <h4>Personil Dosen</h4>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Dosen * </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                        
                                        <select class="form-control select2_ok" style="width: 100%;" data-placeholder="Personil" name="pesan_penulis">                                            
                                        <option><?php echo $rou->ketua_peneliti; ?></option>
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
                                          <option><?php echo $rou->anggota_peneliti_1; ?></option>
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
                                        <option><?php echo $rou->anggota_peneliti_2; ?></option>
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
<div class="modal fade" id="modal-upload<?php echo $rou->kode_penelitan;?>" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header"> 
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Pengabdian Sumber Dana Universitas Pembangunan Jaya</h4>
      </div>
      <div class="modal-body">
                                <?php
                                    $atribut = array(
                                            'class' => 'form-horizontal form-label-left',
                                            'data-parsley-validate' => '',
                                            'id'=>'demo-form2'
                                    );                                        
                                        echo form_open_multipart('pengabdian/PengabdianDanaUPJ/uploaddok/',$atribut);
                                        echo form_hidden('id',$rou->kode_penelitan);
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