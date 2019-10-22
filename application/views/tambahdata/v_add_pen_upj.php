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
                                <h2>Penelitian Sumber Dana Universitas Pembangunan Jaya</h2>
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
                                        echo form_open_multipart('databaru/NewPenelitianUPJ/savedok',$atribut);
                                ?>
                                <!--<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->                                
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tahun Kegiatan
                                    </label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">                                    
                                    <select class="form-control select2_ok" style="width: 100%;" data-placeholder="Pilih Tahun" name="tahun_kegiatan">
                                            <option><?php echo Date('Y');?></option>
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
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Judul Penelitian
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                    
                                    <textarea name="judul" id="judul" rows="2" cols="20" required="required" style="font-family:Tahoma;height:70px;" class="form-control col-md-7 col-xs-12"></textarea>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Skema Penelitian
                                    </label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">                                   
                                    <select class="form-control" style="width: 100%;" data-placeholder="Pilih Tahun" name="skema">
                                            ?php 
												foreach($tampil_skema as $skemaa){
											?
											<option>?php echo $skemaa->skema; ?</option>                      
											?php
												 }
											?
									</select>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Jenis Penelitian
                                    </label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">                                    
                                    <select class="form-control" style="width: 100%;" data-placeholder="Pilih Tahun" name="jenis">                                            
                                            <?php 
												foreach($tampil_jenis as $r){ 
											?>  
											<option><?php echo $r->jenis_penelitian; ?></option>                      
											<?php
												 }
											?>
									</select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Dana Usulan</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input id="dana_usulan" name="dana_usulan" class="form-control col-md-7 col-xs-12" type="number" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Dana Disetujui</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="dana_setujui" id="dana_setujui" class="form-control col-md-7 col-xs-12" required="required" type="number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Upload Berkas
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                    
                                    <input type="file" class="form-control" name="filepdf" id="upload" accept="application/pdf" required />
                                    Ukuran file  maksimum 5 MB
                                    </div>
                                </div>                                
                                <div class="ln_solid"></div>
                                <h4>Personil Dosen</h4>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">NIDN * </label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input name="penulis" id="penulis" class="form-control col-md-7 col-xs-12" maxlength="10" required="required" type="text" onkeyup='cek_nidn()'>
                                    </div>                                    
                                    <label class="control_label2 col-md-1 col-sm-1 col-xs-12">Nama *</label>                                    
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input name="pesan_penulis" id="pesan_penulis" class="form-control col-md-7 col-xs-12" type="text" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Anggota 1 </label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input name="anggota1" id="anggota1" class="form-control col-md-7 col-xs-12" maxlength="10" type="text" onkeyup='cek_nidn2()'>
                                    </div>                                    
                                    <label class="control_label2 col-md-1 col-sm-1 col-xs-12">Nama </label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input name="pesan_penulis2" id="pesan_penulis2" class="form-control col-md-7 col-xs-12" type="text" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Anggota 2 </label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input name="anggota2" id="anggota2" class="form-control col-md-7 col-xs-12" maxlength="10" type="text" onkeyup='cek_nidn3()'>
                                    </div>                                    
                                    <label class="control_label2 col-md-1 col-sm-1 col-xs-12">Nama </label>                                    
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <input name="pesan_penulis3" id="pesan_penulis3" class="form-control col-md-7 col-xs-12" type="text" readonly>
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