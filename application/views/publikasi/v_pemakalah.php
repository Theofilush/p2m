<?php foreach($da as $row){$buba= $row->author;$bubi= $row->username; }  ?>
<div class="right_col" role="main">          
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="x_panel">
                  <div class="x_title">
                    <p ><?php echo $this->session->flashdata('notification')?></p>  
                      <h4 class="">Pemakalah Forum Ilmiah</h4>   
                      <div class=" hidden-xs hidden-sm col-md-12">
                      Urutkan:        
                      <button class="btn btn-default btn-sm" id="reset2">Reset</button>
                      <button class="btn btn-default btn-sm" id="dragId4">Tingkat Internasional</button>
                      <button class="btn btn-default btn-sm" id="dragId5">Tingkat Nasional</button>
                      <button class="btn btn-default btn-sm" id="dragId6">Regional</button>    —&nbsp;    
                      <select class="form-control select2_ok" style="width: 10%;" class="pull-right" data-placeholder="Pilih Tahun" id="dragThn2">                                            
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
                        <a href="<?php echo site_url() ?>databaru/NewForumIlmiah" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>  Data Baru</a>                  
                      </div>
                      <a href="<?php echo site_url() ?>publikasi/Pemakalah/exportexcel" class="btn btn-success pull-right">Excel <i class="fa fa-file-excel-o"></i> </a>
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
                        if($buba == 'administrator'){
                          foreach($query as $row){
                            ?> 
                            <tr>
                              <td><?php echo $no++ ?></td>
                              <td><b><?php echo $row->nama_dosen; ?></b><br>
                                NIDN :&nbsp;<span class="font_color_blue"><?php $query_tampil_nidn1=$this->db->query('SELECT * FROM t_forum_ilmiah JOIN t_login ON t_login.username=t_forum_ilmiah.nama_dosen WHERE id_perumi='.$row->id_perumi);
                                        foreach ($query_tampil_nidn1->result_array() as $nidn1) {
                                          echo $nidn1['NIDN'];                
                                        } 
                                        ?></span><br>                           
                                <?php
                                    if($row->nama_dosen1 != NULL){
                                    ?>         
                                        <b><?php echo $row->nama_dosen1; ?></b><br>
                                        NIDN :&nbsp;<span class="font_color_blue"><?php $query_tampil_nidn1=$this->db->query('SELECT * FROM t_forum_ilmiah JOIN t_login ON t_login.username=t_forum_ilmiah.nama_dosen1 WHERE id_perumi='.$row->id_perumi);
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
                                        NIDN :&nbsp;<span class="font_color_blue"><?php $query_tampil_nidn1=$this->db->query('SELECT * FROM t_forum_ilmiah JOIN t_login ON t_login.username=t_forum_ilmiah.nama_dosen2 WHERE id_perumi='.$row->id_perumi);
                                        foreach ($query_tampil_nidn1->result_array() as $nidn1) {
                                          echo $nidn1['NIDN'];                
                                        } 
                                        ?></span><br>                                   
                                    <?php
                                      }
                                    ?>   
                                    Status :&nbsp;<span class="font_color_blue"><?php echo $row->status_pemakalah; ?></span>
                                    <b hidden><?php echo $row->cakupan_forum_ilmiah;?></b><br>
                              </td>
                              <td>
                                <b><?php echo $row->judul_makalah; ?></b><br>
                                Forum :&nbsp;<span class="font_color_blue"><?php echo $row->nama_forum; ?></span><br>
                                    <b hidden><?php echo $row->tahun_pelaksanaan;?></b><br>
                              </td>
                              <td>                           
                                Institusi  :&nbsp;<span class="font_color_blue"><b><?php echo $row->institusi_penyelenggara; ?></b></span><br>
                                Tgl. :&nbsp;<span class="font_color_blue"> <?php echo $row->waktu_pelakasana_awal; ?> s/d  <?php echo $row->waktu_pelakasana_akhir; ?></span><br>
                                Tempat :&nbsp;<span class="font_color_blue"> <?php echo $row->tempat_pelaksana; ?> </span><br>                            
                              </td>
                              <td class="ketengah">
                              <?php
                              if ($buba == 'administrator' || ($row->valid == "TIDAK" || $row->valid == NULL)) {
                                if($buba == 'administrator' || ($bubi ==  $row->nama_dosen || ($bubi ==  $row->nama_dosen1) || ($bubi ==  $row->nama_dosen2))){
                                ?>
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
                                <?php
                                  }}
                                ?>
                              
                              </td>                         
                              <td class="ketengah">  
                              <?php
                              if ($buba == 'administrator' || ($row->valid == "TIDAK" || $row->valid == NULL)) {
                                if($buba == 'administrator' || ($bubi ==  $row->nama_dosen || ($bubi ==  $row->nama_dosen1) || ($bubi ==  $row->nama_dosen2))){
                                ?>                            
                                <a href="<?php echo site_url(); ?>publikasi/Pemakalah/editdok/<?php echo $row->id_perumi; ?>" class="btn btn-primary btn-xs btnnomargin" ><i class="glyphicon glyphicon-pencil  "></i></a>
                                <a href="<?php echo site_url(); ?>publikasi/Pemakalah/deletedok/<?php echo $row->id_perumi; ?>" class="btn btn-danger btn-xs btnnomargin" onClick="return doconfirm();"><i class="glyphicon glyphicon-remove  "></i></a>                             
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
                                  <a href="<?php echo site_url(); ?>publikasi/Pemakalah/validasi/<?php echo $row->id_perumi; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
                                  <a href="<?php echo site_url(); ?>publikasi/Pemakalah/tolakvalidasi/<?php echo $row->id_perumi; ?>" class="btn btn-xs btn-hitam btnnomargin"><i class="fa fa-thumbs-down"></i></a>
                                <?php
                                  } elseif ($buba == 'administrator' && ($row->valid ==  "TIDAK") ) {
                                ?>
                                  <a href="<?php echo site_url(); ?>publikasi/Pemakalah/validasi/<?php echo $row->id_perumi; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
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
                              <td><b><?php echo $row->nama_dosen; ?></b><br>
                                NIDN :&nbsp;<span class="font_color_blue"><?php $query_tampil_nidn1=$this->db->query('SELECT * FROM t_forum_ilmiah JOIN t_login ON t_login.username=t_forum_ilmiah.nama_dosen WHERE id_perumi='.$row->id_perumi);
                                        foreach ($query_tampil_nidn1->result_array() as $nidn1) {
                                          echo $nidn1['NIDN'];                
                                        } 
                                        ?></span><br>                           
                                <?php
                                    if($row->nama_dosen1 != NULL){
                                    ?>         
                                        <b><?php echo $row->nama_dosen1; ?></b><br>
                                        NIDN :&nbsp;<span class="font_color_blue"><?php $query_tampil_nidn1=$this->db->query('SELECT * FROM t_forum_ilmiah JOIN t_login ON t_login.username=t_forum_ilmiah.nama_dosen1 WHERE id_perumi='.$row->id_perumi);
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
                                        NIDN :&nbsp;<span class="font_color_blue"><?php $query_tampil_nidn1=$this->db->query('SELECT * FROM t_forum_ilmiah JOIN t_login ON t_login.username=t_forum_ilmiah.nama_dosen2 WHERE id_perumi='.$row->id_perumi);
                                        foreach ($query_tampil_nidn1->result_array() as $nidn1) {
                                          echo $nidn1['NIDN'];                
                                        } 
                                        ?></span><br>                                   
                                    <?php
                                      }
                                    ?>   
                                    Status :&nbsp;<span class="font_color_blue"><?php echo $row->status_pemakalah; ?></span>
                                    <b hidden><?php echo $row->cakupan_forum_ilmiah;?></b><br>
                              </td>
                              <td>
                                <b><?php echo $row->judul_makalah; ?></b><br>
                                Forum :&nbsp;<span class="font_color_blue"><?php echo $row->nama_forum; ?></span><br>
                                    <b hidden><?php echo $row->tahun_pelaksanaan;?></b><br>
                              </td>
                              <td>                           
                                Institusi  :&nbsp;<span class="font_color_blue"><b><?php echo $row->institusi_penyelenggara; ?></b></span><br>
                                Tgl. :&nbsp;<span class="font_color_blue"> <?php echo $row->waktu_pelakasana_awal; ?> s/d  <?php echo $row->waktu_pelakasana_akhir; ?></span><br>
                                Tempat :&nbsp;<span class="font_color_blue"> <?php echo $row->tempat_pelaksana; ?> </span><br>                            
                              </td>
                              <td class="ketengah">
                              <?php
                              if ($buba == 'administrator' || ($row->valid == "TIDAK" || $row->valid == NULL)) {
                                if($buba == 'administrator' || ($bubi ==  $row->nama_dosen || ($bubi ==  $row->nama_dosen1) || ($bubi ==  $row->nama_dosen2))){
                                ?>
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
                                <?php
                                  }}
                                ?>
                              
                              </td>                         
                              <td class="ketengah">  
                              <?php
                              if ($buba == 'administrator' || ($row->valid == "TIDAK" || $row->valid == NULL)) {
                                if($buba == 'administrator' || ($bubi ==  $row->nama_dosen || ($bubi ==  $row->nama_dosen1) || ($bubi ==  $row->nama_dosen2))){
                                ?>                            
                                <a href="<?php echo site_url(); ?>publikasi/Pemakalah/editdok/<?php echo $row->id_perumi; ?>" class="btn btn-primary btn-xs btnnomargin" ><i class="glyphicon glyphicon-pencil  "></i></a>
                                <a href="<?php echo site_url(); ?>publikasi/Pemakalah/deletedok/<?php echo $row->id_perumi; ?>" class="btn btn-danger btn-xs btnnomargin" onClick="return doconfirm();"><i class="glyphicon glyphicon-remove  "></i></a>                             
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
                                  <a href="<?php echo site_url(); ?>publikasi/Pemakalah/validasi/<?php echo $row->id_perumi; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
                                  <a href="<?php echo site_url(); ?>publikasi/Pemakalah/tolakvalidasi/<?php echo $row->id_perumi; ?>" class="btn btn-xs btn-hitam btnnomargin"><i class="fa fa-thumbs-down"></i></a>
                                <?php
                                  } elseif ($buba == 'administrator' && ($row->valid ==  "TIDAK") ) {
                                ?>
                                  <a href="<?php echo site_url(); ?>publikasi/Pemakalah/validasi/<?php echo $row->id_perumi; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
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