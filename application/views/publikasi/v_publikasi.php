<?php foreach($da as $row){$buba= $row->author;$bubi= $row->username; }  ?>
<div class="right_col" role="main">          
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="x_panel">
                  <div class="x_title">
                    <p ><?php echo $this->session->flashdata('notification')?></p>                                           
                      <h4 class="">Publikasi Jurnal</h4>
                      <div class=" hidden-xs hidden-sm col-md-12">
                      <button class="btn btn-default btn-sm" id="reset">Reset</button>
                      <button class="btn btn-default btn-sm" id="dragId1">Jurnal Internasional</button>
                      <button class="btn btn-default btn-sm" id="dragId2">Jurnal Nasional Terakreditasi</button>
                      <button class="btn btn-default btn-sm" id="dragId3">Jurnal Nasional Tidak Terakreditasi (Mempunyai ISSN)</button>
                      </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"> 
                    <div class="row">
                      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-bottom: 5px;">
                        <a href="<?php echo site_url() ?>databaru/NewPublikasiJurnal" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>  Data Baru</a>
                      </div>
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
                        foreach($query as $row){                   
                        ?> 
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td>
                              <b><?php echo $row->judul; ?></b>
                              <b hidden><?php echo $row->cakupan_publikasi;?></b><br>
                          </td>
                          <td>
                            <ul class="titiknya">
                              <li>
                                  <?php echo $row->penulis_publikasi;  ?> 
                              </li>                              
                              <?php
                                if($row->penulis_anggota1 !== NULL){
                                ?>         
                                    <li>
                                      <?php echo $row->penulis_anggota1; ?>
                                    </li>
                                <?php
                                  }
                                ?>     
                                <?php
                                if($row->penulis_anggota2 !== NULL){
                                ?>         
                                    <li>
                                      <?php echo $row->penulis_anggota2; ?>
                                    </li>
                                <?php
                                  }
                                ?>  
                                <?php
                                if($row->penulis_non_dosen !== NULL){
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
                            <button type="button" class="btn btn-success btn-xs btnnomargin"  data-toggle="modal" data-target="#modal-upload<?php echo $row->id_publikasi;?>"><span class="glyphicon glyphicon-cloud-upload"></span></button> 
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
                            }else if(($row->file !== NULL) || ($row->file !== "") ){
                                ?>
                                <a href="<?php echo site_url().'fileupload/publikasi_jurnal/'.$row->file  ?>" class="btn btn-danger btn-xs btnnomargin"><i class="fa fa-fw fa-file-text"></i></a>
                                <?php
                            }
                            ?>
                          </td>
                          <td class="ketengah">                          	
                            <button type="button" class="btn btn-primary btn-xs btnnomargin"  data-toggle="modal" data-target="#modal-edit<?php echo $row->id_publikasi;?>"><span class="glyphicon glyphicon-pencil"></span></button> 
                            <a href="<?php echo site_url(); ?>publikasi/PublikasiJurnal/deletedok/<?php echo $row->id_publikasi; ?>" class="btn btn-danger btn-xs btnnomargin" onClick="return doconfirm();"><i class="glyphicon glyphicon-remove  "></i></a>
                          </td>
                          <td class="ketengah">
                          <span class="font_color_green"><?php echo $row->valid; ?></span>                        
                          <?php
                            if($buba === 'administrator' && ($row->valid == NULL)){
                            ?>
                            <br>
                            <a href="<?php echo site_url(); ?>publikasi/publikasijurnal/validasi/<?php echo $row->id_publikasi; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
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
<div class="modal fade" id="modal-edit<?php echo $rou->id_publikasi;?>" role="dialog" aria-hidden="true">
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
                                        echo form_open('publikasi/publikasijurnal/updatedok',$atribut);
                                        echo form_hidden('id',$rou->id_publikasi);
                                ?>
                                <!--<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Publikasi
                                    </label>
                                    <div class="col-md-5 col-sm-5 col-xs-12">                                    
                                    <select class="form-control" style="width: 100%;" data-placeholder="Pilih Tingkatan" name="tingkat">
                                            <?php 
                                          foreach($cakupan as $row){
                                        ?>                          
                                        <option <?php if (($rou->cakupan_publikasi =='Jurnal Internasional') && ($row->cakupan_publikasi =='Jurnal Internasional')) {
                                            echo 'selected'; 
                                          }elseif (($rou->cakupan_publikasi =='Jurnal Naional Terakreditasi') && ($row->cakupan_publikasi =='Jurnal Naional Terakreditasi')) {
                                            echo 'selected'; 
                                          }elseif (($rou->cakupan_publikasi =='Jurnal Naional Tidak Terakreditasi (Mempunyai ISSN)') && ($row->cakupan_publikasi =='Jurnal Naional Tidak Terakreditasi (Mempunyai ISSN)')) {
                                            echo 'selected'; 
                                          } 
                                          echo '>'.$row->cakupan_publikasi;
                                          ?> 
                                        </option>                   
                                        <?php
                                          }
                                        ?> 
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tahun Publikasi
                                    </label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">                                    
                                    <select class="form-control select2_ok" style="width: 100%;" data-placeholder="Pilih Tahun" name="tahun_publikasi">                                            
                                            <option selected><?php echo $rou->tahun_penerbitan; ?></option> 
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
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Judul
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                    
                                    <textarea name="judul" id="judul" rows="2" cols="20" required="required" style="font-family:Tahoma;height:70px;" class="form-control col-md-7 col-xs-12"><?php echo $rou->judul; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Jurnal
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input type="text" id="nama_jurnal" name="nama_jurnal" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rou->nama_jurnal; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">ISSN</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input id="issn" name="issn" maxlength="30" class="form-control col-md-7 col-xs-12" type="text" required="required" value="<?php echo $rou->issn; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Volume</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="volume" id="volume" maxlength="20" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $rou->volume; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Nomor
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="nomor" id="nomor" maxlength="10" class=" form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $rou->nomor; ?>"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Halaman
                                    </label>
                                    <div class="col-md-1 col-sm-1 col-xs-3">
                                     <input name="halaman_awal" maxlength="5" id="halaman_awal" class=" form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $rou->halaman_awal; ?>">
                                    </div>
                                    <label class="control-label col-md-1 col-sm-1 col-xs-1" style="text-align:center"> s/d </label>
                                    <div class="col-md-1 col-sm-1 col-xs-3">
                                     <input name="halaman_akhir" maxlength="5" id="halaman_akhir" class=" form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $rou->halaman_akhir; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">URL
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="url" id="url" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $rou->url; ?>">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Penulis Publikasi *
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="penulis" id="penulis" class=" form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $rou->penulis_publikasi; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Anggota 1
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="anggota1" id="anggota1" class=" form-control col-md-7 col-xs-12" type="text" value="<?php echo $rou->penulis_anggota1; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Anggota 2
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="anggota2" id="anggota2" class=" form-control col-md-7 col-xs-12" type="text" value="<?php echo $rou->penulis_anggota2; ?>">
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
                                        echo form_open_multipart('publikasi/publikasijurnal/uploaddok/',$atribut);
                                        echo form_hidden('id',$rou->id_publikasi);
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