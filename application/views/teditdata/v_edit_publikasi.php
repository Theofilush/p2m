<div class="right_col" role="main">
          
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="x_panel">
                <!--<div class="x_title">
                    <h4 class="">Publikasi Jurnal</h4>                     
                    <div class="clearfix"></div>
                </div>-->
                <div class="x_content">                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                            <div class="x_title">
                                <h2>Publikasi Jurnal</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>                                
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <?php
                                    $atribut = array(
                                            'class' => 'form-horizontal form-label-left',
                                            'data-parsley-validate' => '',
                                            'id'=>'demo-form2'
                                    );                                        
                                        echo form_open('publikasi/PublikasiJurnal/updatedok',$atribut); 
                                        foreach ($query as $rou) {    
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
                                <h4>Personil Dosen</h4>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Dosen * </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                        
                                        <select class="form-control select2_ok" style="width: 100%;" data-placeholder="Personil" name="pesan_penulis">                                            
                                        <option><?php echo $rou->penulis_publikasi; ?></option>
                                        <option value="NULL">Tidak ada</option>
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
                                          <option><?php echo $rou->penulis_anggota1; ?></option>
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
                                        <option><?php echo $rou->penulis_anggota2; ?></option>
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
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                                                                    
                                    <button type="button" onclick="window.history.back()" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Batal</button>
								    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success" name="btnUpload" value="Upload">Submit</button>
                                    </div>
                                </div>
                                <?php
                                        }
                                    echo form_close();
                                ?>
                            </div>
                            </div>
                        </div>
                    </div>
				</div>
                  
            </div>
        </div>
    </div>
</div>