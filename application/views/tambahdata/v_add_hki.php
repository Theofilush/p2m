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
                                        echo form_open_multipart('databaru/newhki/savedok',$atribut);
                                ?>
                                <!--<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->                                
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tahun Pelaksanaan
                                    </label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">                                    
                                    <select class="form-control select2_ok" style="width: 100%;" data-placeholder="Pilih Tahun" name="tahun_publikasi">
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
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Judul HKI
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                    
                                    <textarea name="judul" id="judul" rows="2" cols="20" required="required" style="font-family:Tahoma;height:70px;" class="form-control col-md-7 col-xs-12"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Jenis
                                    </label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">                                    
                                    <select class="form-control" style="width: 100%;" data-placeholder="Pilih Jenisnya" name="jenis">
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
                                    <input id="no_daftar" name="no_daftar" class="form-control col-md-7 col-xs-12" type="text" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Status</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                    
                                    <select class="form-control" style="width: 100%;" data-placeholder="Pilih Tingkatan" name="status">
                                            <?php 
												foreach($status_karya as $row){
											?>  
											<option><?php echo $row->status_hki; ?></option>                      
											<?php
												 }
											?>   
									</select>
                                    </div>
                                </div>  
                                <div class="form-group" id="nomor_hki">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">No. HKI</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="no_hki" id="no_hki" class="form-control col-md-7 col-xs-12" type="text">
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
