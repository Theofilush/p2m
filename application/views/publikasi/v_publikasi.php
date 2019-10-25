<?php foreach($da as $row){$buba= $row->author;$bubi= $row->username; }  ?>
<div class="right_col" role="main">          
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="x_panel">
                  <div class="x_title">
                    <p ><?php echo $this->session->flashdata('notification')?></p>                                           
                      <h4 class="">Publikasi Jurnal</h4>
                      <div class=" hidden-xs hidden-sm col-md-12">
                  Urutkan:
                      <button class="btn btn-default btn-sm" id="reset">Reset</button>
                      <button class="btn btn-default btn-sm" id="dragId1">Jurnal Internasional</button>
                      <button class="btn btn-default btn-sm" id="dragId2">Jurnal Nasional Terakreditasi</button>
                      <button class="btn btn-default btn-sm" id="dragId3">Jurnal Nasional Tidak Terakreditasi (Mempunyai ISSN)</button> —&nbsp;
                                  <select class="form-control select2_ok" style="width: 10%; height:10px;" class="pull-right" data-placeholder="Pilih Tahun" id="dragThn1">                                            
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
                        <a href="<?php echo site_url() ?>databaru/NewPublikasiJurnal" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>  Data Baru</a>
                      </div>
                        <a href="<?php echo site_url() ?>publikasi/PublikasiJurnal/exportexcel" class="btn btn-success pull-right">Excel <i class="fa fa-file-excel-o"></i> </a>
                    </div>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Judul</th>
                          <th>Penulis Publikasi</th>                          
                          <th>Jurnal</th>
                          <th>Berkas</th>
                          <th>Edit</th>
                          <th>Valid</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1; 
                        //  if($buba == 'administrator'){
                        //   echo "foreach($query as $row){";
                        // }else{
                        //   echo "foreach($listAllPublikasi_byProdi as $row){";
                        // }
                        //($buba == 'administrator') ? "foreach($query as $row){" : "foreach($listAllPublikasi_byProdi as $row){";
                        if($buba == 'administrator'){
                          foreach($query as $row){
                        ?> 
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td>
                              <b><?php echo $row->judul; ?></b><br>
                              <b hidden><?php echo $row->cakupan_publikasi;?></b><br>
                              <b hidden><?php echo $row->tahun_penerbitan;?></b><br>
                          </td>
                          <td>
                            <ul class="titiknya">
                              <li>
                                  <?php echo $row->penulis_publikasi;  ?> 
                              </li>                              
                              <?php
                                if($row->penulis_anggota1 != NULL){
                                ?>         
                                    <li>
                                      <?php echo $row->penulis_anggota1; ?>
                                    </li>
                                <?php
                                  }
                                ?>     
                                <?php
                                if($row->penulis_anggota2 != NULL){
                                ?>         
                                    <li>
                                      <?php echo $row->penulis_anggota2; ?>
                                    </li>
                                <?php
                                  }
                                ?>  
                                <?php
                                if($row->penulis_non_dosen != NULL){
                                ?>         
                                    <li>
                                      <?php echo $row->penulis_non_dosen; ?>
                                    </li>
                                <?php
                                  }
                                ?>                               
                            </ul>
                          </td>
                          <td>
                            <b><?php echo $row->nama_jurnal; ?></b><br>                             
                            ISSN :&nbsp;<span class="font_color_blue"><?php echo $row->issn; ?></span><br>
                            Volume :&nbsp;<span class="font_color_blue"> <?php echo $row->volume; ?> </span><br>
                            Nomor :&nbsp;<span class="font_color_blue"> <?php echo $row->nomor; ?> </span><br>
                            Halaman :&nbsp;<span class="font_color_blue"><?php echo $row->halaman_awal; ?> s/d <?php echo $row->halaman_akhir; ?></span><br>
                            URL :&nbsp;<span class="font_color_blue"><a href="<?php echo $row->url; ?>" class="link_url"> <?php echo $row->url; ?></a></span><br>
                          </td>
                          <td class="ketengah">
                          	<?php
                             if ($buba == 'administrator' || ($row->valid == "TIDAK" || $row->valid == NULL)) {
                               if($buba == 'administrator' || ($bubi ==  $row->penulis_publikasi || ($bubi ==  $row->penulis_anggota1) || ($bubi ==  $row->penulis_anggota2))){
                                ?>
                          	<button type="button" class="btn btn-success btn-xs btnnomargin" data-toggle="modal"
                          		data-target="#modal-upload<?php echo $row->id_publikasi;?>"><span
                          			class="glyphicon glyphicon-cloud-upload"></span></button>
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
                          	<a href="<?php echo site_url().'fileupload/publikasi_jurnal/'.$row->file  ?>"
                          		class="btn btn-danger btn-xs btnnomargin"><i class="fa fa-fw fa-file-text"></i></a>
                          	<?php
                                 }
                                }
                              }
                            ?>
                          </td>
                          <td class="ketengah">    
                          <?php
                          if ($buba == 'administrator' || ($row->valid == "TIDAK" || $row->valid == NULL)) {
                            if($buba == 'administrator' || ($bubi ==  $row->penulis_publikasi || ($bubi ==  $row->penulis_anggota1) || ($bubi ==  $row->penulis_anggota2))){
                            ?>                                
                              <a href="<?php echo site_url(); ?>publikasi/PublikasiJurnal/editdok/<?php echo $row->id_publikasi; ?>" class="btn btn-primary btn-xs btnnomargin" ><i class="glyphicon glyphicon-pencil"></i></a> 
                              <a href="<?php echo site_url(); ?>publikasi/PublikasiJurnal/deletedok/<?php echo $row->id_publikasi; ?>" class="btn btn-danger btn-xs btnnomargin" onClick="return doconfirm();"><i class="glyphicon glyphicon-remove"></i></a>
                            <?php
                            }
                              }
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
                              <a href="<?php echo site_url(); ?>publikasi/PublikasiJurnal/validasi/<?php echo $row->id_publikasi; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
                              <a href="<?php echo site_url(); ?>publikasi/PublikasiJurnal/tolakvalidasi/<?php echo $row->id_publikasi; ?>" class="btn btn-xs btn-hitam btnnomargin"><i class="fa fa-thumbs-down"></i></a>
                            <?php
                              } elseif ($buba == 'administrator' && ($row->valid ==  "TIDAK") ) {
                            ?>
                              <a href="<?php echo site_url(); ?>publikasi/PublikasiJurnal/validasi/<?php echo $row->id_publikasi; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
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
                              <td>
                                  <b><?php echo $row->judul; ?></b><br>
                                  <b hidden><?php echo $row->cakupan_publikasi;?></b><br>
                                  <b hidden><?php echo $row->tahun_penerbitan;?></b><br>
                              </td>
                              <td>
                                <ul class="titiknya">
                                  <li>
                                      <?php echo $row->penulis_publikasi;  ?> 
                                  </li>                              
                                  <?php
                                    if($row->penulis_anggota1 != NULL){
                                    ?>         
                                        <li>
                                          <?php echo $row->penulis_anggota1; ?>
                                        </li>
                                    <?php
                                      }
                                    ?>     
                                    <?php
                                    if($row->penulis_anggota2 != NULL){
                                    ?>         
                                        <li>
                                          <?php echo $row->penulis_anggota2; ?>
                                        </li>
                                    <?php
                                      }
                                    ?>  
                                    <?php
                                    if($row->penulis_non_dosen != NULL){
                                    ?>         
                                        <li>
                                          <?php echo $row->penulis_non_dosen; ?>
                                        </li>
                                    <?php
                                      }
                                    ?>                               
                                </ul>
                              </td>
                              <td>
                                <b><?php echo $row->nama_jurnal; ?></b><br>                             
                                ISSN :&nbsp;<span class="font_color_blue"><?php echo $row->issn; ?></span><br>
                                Volume :&nbsp;<span class="font_color_blue"> <?php echo $row->volume; ?> </span><br>
                                Nomor :&nbsp;<span class="font_color_blue"> <?php echo $row->nomor; ?> </span><br>
                                Halaman :&nbsp;<span class="font_color_blue"><?php echo $row->halaman_awal; ?> s/d <?php echo $row->halaman_akhir; ?></span><br>
                                URL :&nbsp;<span class="font_color_blue"><a href="<?php echo $row->url; ?>" class="link_url"> <?php echo $row->url; ?></a></span><br>
                              </td>
                              <td class="ketengah">
                                <?php
                                 if ($buba == 'administrator' || ($row->valid == "TIDAK" || $row->valid == NULL)) {
                                   if($buba == 'administrator' || ($bubi ==  $row->penulis_publikasi || ($bubi ==  $row->penulis_anggota1) || ($bubi ==  $row->penulis_anggota2))){
                                    ?>
                                <button type="button" class="btn btn-success btn-xs btnnomargin" data-toggle="modal"
                                  data-target="#modal-upload<?php echo $row->id_publikasi;?>"><span
                                    class="glyphicon glyphicon-cloud-upload"></span></button>
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
                                <a href="<?php echo site_url().'fileupload/publikasi_jurnal/'.$row->file  ?>"
                                  class="btn btn-danger btn-xs btnnomargin"><i class="fa fa-fw fa-file-text"></i></a>
                                <?php
                                     }
                                    }
                                  }
                                ?>
                              </td>
                              <td class="ketengah">    
                              <?php
                              if ($buba == 'administrator' || ($row->valid == "TIDAK" || $row->valid == NULL)) {
                                if($buba == 'administrator' || ($bubi ==  $row->penulis_publikasi || ($bubi ==  $row->penulis_anggota1) || ($bubi ==  $row->penulis_anggota2))){
                                ?>                                
                                  <a href="<?php echo site_url(); ?>publikasi/PublikasiJurnal/editdok/<?php echo $row->id_publikasi; ?>" class="btn btn-primary btn-xs btnnomargin" ><i class="glyphicon glyphicon-pencil"></i></a> 
                                  <a href="<?php echo site_url(); ?>publikasi/PublikasiJurnal/deletedok/<?php echo $row->id_publikasi; ?>" class="btn btn-danger btn-xs btnnomargin" onClick="return doconfirm();"><i class="glyphicon glyphicon-remove"></i></a>
                                <?php
                                }
                                  }
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
                                  <a href="<?php echo site_url(); ?>publikasi/PublikasiJurnal/validasi/<?php echo $row->id_publikasi; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
                                  <a href="<?php echo site_url(); ?>publikasi/PublikasiJurnal/tolakvalidasi/<?php echo $row->id_publikasi; ?>" class="btn btn-xs btn-hitam btnnomargin"><i class="fa fa-thumbs-down"></i></a>
                                <?php
                                  } elseif ($buba == 'administrator' && ($row->valid ==  "TIDAK") ) {
                                ?>
                                  <a href="<?php echo site_url(); ?>publikasi/PublikasiJurnal/validasi/<?php echo $row->id_publikasi; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
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
<div class="modal fade" id="modal-upload<?php echo $rou->id_publikasi;?>" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
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
                                        echo form_open_multipart('publikasi/PublikasiJurnal/uploaddok/',$atribut);
                                        echo form_hidden('id',$rou->id_publikasi);
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