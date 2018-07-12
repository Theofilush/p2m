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
                                        echo form_open_multipart('databaru/newforumilmiah/savedok',$atribut);
                                ?>
                                <!--<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">-->
                                
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Data Publikasi Tingkat
                                    </label>
                                    <div class="col-md-7 col-sm- col-xs-12">
                                    <input name="tingkat" id="tingkat" class="form-control col-md-7 col-xs-12" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tahun Pelaksanaan
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="tahun_publikasi" id="tahun_publikasi" class="form-control col-md-7 col-xs-12" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="judul">Judul Makalah
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                    
                                    <textarea name="judul" id="judul" rows="2" cols="20" required="required" style="font-family:Tahoma;height:50px;" class="form-control col-md-7 col-xs-12"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nama_jurnal">Nama Forum
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input type="text" id="nama_forum" name="nama_forum" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="issn" class="control-label col-md-2 col-sm-2 col-xs-12">Institusi Penyelenggara</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input id="institusi" name="institusi" class="form-control col-md-7 col-xs-12" type="text" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Waktu Pelaksanaan
                                    </label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                     <input name="waktu_awal" id="waktu_awal" class=" form-control col-md-7 col-xs-12" required="required" type="text">
                                    </div>
                                    <label class="control-label col-md-1 col-sm-1 col-xs-12" style="text-align:center"> s/d </label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                     <input name="waktu_akhir" id="waktu_akhir" class=" form-control col-md-7 col-xs-12" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Tempat Pelaksanaan
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="tempat" id="tempat" class="form-control col-md-7 col-xs-12" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Status
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="status" id="status" class="form-control col-md-7 col-xs-12" required="required" type="text">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Pemakalah *
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="penulis" id="penulis" class=" form-control col-md-7 col-xs-12" required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Anggota 1
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="anggota1" id="anggota1" class=" form-control col-md-7 col-xs-12" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Anggota2
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="anggota2" id="anggota2" class=" form-control col-md-7 col-xs-12" type="text">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                                                            
                                    <a href="<?php echo base_url() ?>publikasi/Pemakalah" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Batal</a>
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