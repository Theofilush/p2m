<div class="right_col" role="main">
          
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h4 class="">Publikasi Jurnal</h4>
                      <a href="#" class="btn btn-default">Jurnal Internasional</a> 
                      <a href="#" class="btn btn-default">Jurnal Naional Terakreditasi</a>
                      <a href="#" class="btn btn-default">Jurnal Naional Tidak Terakreditasi (Mempunyai ISSN)</a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-bottom: 5px;">
                        <a href="<?php echo site_url() ?>databaru/NewDoc/publikasi" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>  Data Baru</a>
                      </div>
                    </div>
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Penulis Publikasi</th>
                          <th>Judul</th>                          
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
                          <td><b><?php echo $row->judul; ?></b></td>
                          <td>
                            <ul class="titiknya">
                              <li>
                                  <?php echo $row->penulis_publikasi; ?>    
                              </li>
                            </ul>
                          </td>
                          <td>
                            <b><?php echo $row->nama_jurnal; ?></b><br>
                            ISSN :&nbsp;<span class="font_color_blue">2090-4274</span><br>
                            Volume :&nbsp;<span class="font_color_blue"> <?php echo $row->volume; ?> </span><br>
                            Nomor :&nbsp;<span class="font_color_blue"> <?php echo $row->nomor; ?> </span><br>
                            Halaman :&nbsp;<span class="font_color_blue"><?php echo $row->halaman_awal; ?> s/d <?php echo $row->halaman_akhir; ?></span><br>
                            URL :&nbsp;<span class="font_color_blue"><a href="<?php echo $row->url; ?>" class="link_url"> <?php echo $row->url; ?></a></span><br>
                          </td>
                          <td>
                          	<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-cloud-upload"></span></button> 
                          	<button type="button" class="btn btn-danger"><i class="fa fa-fw fa-file-text"></i></button> 
                          	<!--<input type="image" src="<?php echo base_url() ?>asett/images/icon/upload.png"> 
                            <input type="image" src="<?php echo base_url() ?>asett/images/icon/pdf.png">-->
                          </td>
                          <td>
                          	<button type="button" class="btn btn-gray"><span class="glyphicon glyphicon-pencil"></span></button> 
                          	<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button> 
                          </td>
                          <td>
                          	<span class="font_color_green"><?php echo $row->valid; ?></span><?php echo $row->valid; ?> 
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