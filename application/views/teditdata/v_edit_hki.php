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
                                <h2>Hak Kekayaan Intelektual (HKI)</h2>
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
                                        echo form_open('publikasi/HakKekayaanIntelektual/updatedok',$atribut);
                                        foreach ($query as $rou) {    
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
