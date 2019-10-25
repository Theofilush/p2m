<?php foreach($da as $row){$buba= $row->author;$bubi= $row->username; }  ?>
<div class="right_col" role="main">          
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="x_panel">
                  <div class="x_title">
                  <?php echo $this->session->flashdata('notification')?>
                      <h4 class="">Pengabdian Sumber Dana non-Universitas Pembangunan Jaya</h4>
                      <div class=" hidden-xs hidden-sm col-md-12">
                      Urutkan : 
                      <select class="form-control select2_ok" style="width: 10%;" class="pull-right" data-placeholder="Pilih Tahun" id="dragThn7">                                            
                                  <option></option>
                                  <?php 
                                    foreach($tampil_tahun as $row1){
                                  ?>  
                                      <option><?php echo $row1->tahun; ?></option> 
                                  <?php
                                    }
                                  ?>   
                                  </select>
                      </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-bottom: 5px;">
                        <a href="<?php echo site_url() ?>databaru/NewPengabdianNonUPJ" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>  Data Baru</a>                  
                      </div>
                      <a href="<?php echo site_url() ?>pengabdian/PengabdianDanaNonUPJ/exportexcel" class="btn btn-success pull-right">Excel <i class="fa fa-file-excel-o"></i> </a>
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
                        if($buba == 'administrator'){
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
                              <?php
                              if ($buba == 'administrator' || ($row->valid == "TIDAK" || $row->valid == NULL)) {
                                if($buba == 'administrator' || ($bubi ==  $row->ketua_peneliti || ($bubi ==  $row->anggota_peneliti_1) || ($bubi ==  $row->anggota_peneliti_2))){
                                ?>  
                              <button type="button" class="btn btn-success btn-xs btnnomargin"  data-toggle="modal" data-target="#modal-upload<?php echo $row->kode_penelitian;?>"><span class="glyphicon glyphicon-cloud-upload"></span></button> 
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
                                    <a href="<?php echo site_url().'fileupload/pengabdian_non_upj/'.$row->file?>" class="btn btn-danger btn-xs btnnomargin"><i class="fa fa-fw fa-file-text"></i></a>
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
                                <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaNonUPJ/editdok/<?php echo $row->kode_penelitian; ?>" class="btn btn-primary btn-xs btnnomargin" ><i class="glyphicon glyphicon-pencil  "></i></a>
                                <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaNonUPJ/deletedok/<?php echo $row->kode_penelitian; ?>" class="btn btn-danger btn-xs btnnomargin" onClick="return doconfirm();"><i class="glyphicon glyphicon-remove  "></i></a>
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
                                  <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaNonUPJ/validasi/<?php echo $row->kode_penelitian; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
                                  <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaNonUPJ/tolakvalidasi/<?php echo $row->kode_penelitian; ?>" class="btn btn-xs btn-hitam btnnomargin"><i class="fa fa-thumbs-down"></i></a>
                                <?php
                                  } elseif ($buba == 'administrator' && ($row->valid ==  "TIDAK") ) {
                                ?>
                                  <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaNonUPJ/validasi/<?php echo $row->kode_penelitian; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
                                <?php
                                  }
                                ?>
                              </td>   
                            </tr>
                            <?php
                          }
                        } else{
                          foreach($queryByProdi as $row){                   
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
                              <?php
                              if ($buba == 'administrator' || ($row->valid == "TIDAK" || $row->valid == NULL)) {
                                if($buba == 'administrator' || ($bubi ==  $row->ketua_peneliti || ($bubi ==  $row->anggota_peneliti_1) || ($bubi ==  $row->anggota_peneliti_2))){
                                ?>  
                              <button type="button" class="btn btn-success btn-xs btnnomargin"  data-toggle="modal" data-target="#modal-upload<?php echo $row->kode_penelitian;?>"><span class="glyphicon glyphicon-cloud-upload"></span></button> 
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
                                    <a href="<?php echo site_url().'fileupload/pengabdian_non_upj/'.$row->file?>" class="btn btn-danger btn-xs btnnomargin"><i class="fa fa-fw fa-file-text"></i></a>
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
                                <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaNonUPJ/editdok/<?php echo $row->kode_penelitian; ?>" class="btn btn-primary btn-xs btnnomargin" ><i class="glyphicon glyphicon-pencil  "></i></a>
                                <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaNonUPJ/deletedok/<?php echo $row->kode_penelitian; ?>" class="btn btn-danger btn-xs btnnomargin" onClick="return doconfirm();"><i class="glyphicon glyphicon-remove  "></i></a>
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
                                  <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaNonUPJ/validasi/<?php echo $row->kode_penelitian; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
                                  <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaNonUPJ/tolakvalidasi/<?php echo $row->kode_penelitian; ?>" class="btn btn-xs btn-hitam btnnomargin"><i class="fa fa-thumbs-down"></i></a>
                                <?php
                                  } elseif ($buba == 'administrator' && ($row->valid ==  "TIDAK") ) {
                                ?>
                                  <a href="<?php echo site_url(); ?>pengabdian/PengabdianDanaNonUPJ/validasi/<?php echo $row->kode_penelitian; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
                                <?php
                                  }
                                ?>
                              </td>   
                            </tr>
                            <?php
                          }
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
<div class="modal fade" id="modal-upload<?php echo $rou->kode_penelitian;?>" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Pengabdian Sumber Dana non-Universitas Pembangunan Jaya</h4>
      </div>
      <div class="modal-body">
                                <?php
                                    $atribut = array(
                                            'class' => 'form-horizontal form-label-left',
                                            'data-parsley-validate' => '',
                                            'id'=>'demo-form2'
                                    );                                        
                                        echo form_open_multipart('pengabdian/PengabdianDanaNonUPJ/uploaddok/',$atribut);
                                        echo form_hidden('id',$rou->kode_penelitian);
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