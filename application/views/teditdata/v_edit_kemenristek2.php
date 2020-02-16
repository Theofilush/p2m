<?php foreach($da as $row){$buba= $row->author;$bubi= $row->username; }  ?>
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
                                <h2>Pengabdian Sumber Dana Hibah Dikti</h2>
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
                                        echo form_open('pengabdian/KemenristekDikti/updatedok',$atribut);
                                        foreach ($query as $rou) {    
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
                                    <input id="dana_usulan" name="dana_usulan" class="form-control col-md-7 col-xs-12" type="number" required="required" value="<?php echo $rou->dana_usulan; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Dana Disetujui</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="dana_setujui" id="dana_setujui" class="form-control col-md-7 col-xs-12" required="required" type="number" value="<?php echo $rou->dana_disetujui; ?>">
                                    </div>
                                </div>
                                <?php
                                if ($buba == 'administrator') {
                                ?>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Status Penelitian</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input id="status_penelitian" name="status_penelitian" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $rou->status; ?>">
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
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