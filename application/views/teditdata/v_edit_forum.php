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
                                <h2>Pemakalah Forum Ilmiah</h2>
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
                                    echo form_open('publikasi/Pemakalah/updatedok',$atribut); 
                                    foreach ($query as $rou) {    
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