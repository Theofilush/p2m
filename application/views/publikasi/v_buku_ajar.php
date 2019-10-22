<?php foreach($da as $row){$buba= $row->author;$bubi= $row->username; }  ?>
<div class="right_col" role="main">          
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="x_panel">
                  <div class="x_title">
                  <?php echo $this->session->flashdata('notification')?>
                      <h4 class="">Buku Ajar/Teks</h4>
                      <div class=" hidden-xs hidden-sm col-md-12">
                      Urutkan : 
                      <select class="form-control select2_ok" style="width: 10%;" class="pull-right" data-placeholder="Pilih Tahun" id="dragThn5">                                            
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
                        <a href="<?php echo site_url() ?>databaru/NewBukuAjar" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>  Data Baru</a>                  
                      </div>
                      <a href="<?php echo site_url() ?>publikasi/BukuAjar/exportexcel" class="btn btn-success pull-right">Excel <i class="fa fa-file-excel-o"></i> </a>
                    </div>
          
                    <table id="datatableku" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Dosen</th>
                          <th>Judul</th> 
                          <th>Buku</th>
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
                          <td><b><?php echo $row->nama_dosen; ?></b><br>
                            NIDN :&nbsp;<span class="font_color_blue"><?php echo $row->NIDN;?></span><br>
                            <?php
                                if($row->nama_dosen1 != NULL){
                            ?>         
                                    <b><?php echo $row->nama_dosen1; ?></b><br>
                                    NIDN :&nbsp;<span class="font_color_blue"><?php $query_tampil_nidn1=$this->db->query('SELECT * FROM t_buku_ajar JOIN t_login ON t_login.username=t_buku_ajar.nama_dosen1 WHERE id_buku_ajar='.$row->id_buku_ajar);
                                    foreach ($query_tampil_nidn1->result_array() as $nidn1) {
                                      echo $nidn1['NIDN'];                
                                     } 
                                    ?></span><br>
                                <?php
                                  }
                                ?>     
                                <?php
                                if($row->nama_dosen2 != NULL){
                                ?>         
                                     <b><?php echo $row->nama_dosen2; ?></b><br>
                                    NIDN :&nbsp;<span class="font_color_blue"><?php $query_tampil_nidn1=$this->db->query('SELECT * FROM t_buku_ajar JOIN t_login ON t_login.username=t_buku_ajar.nama_dosen2 WHERE id_buku_ajar='.$row->id_buku_ajar);
                                    foreach ($query_tampil_nidn1->result_array() as $nidn1) {
                                      echo $nidn1['NIDN'];                
                                     } 
                                    ?></span><br>                                   
                                <?php
                                  }
                                ?>   
                          </td>
                          <td><b><?php echo $row->judul; ?></b>
                          <b hidden>  - <?php echo $row->tahun_penerbitan;?></b>
                          </td>
                          <td>                           
                            Penerbit :&nbsp;<span class="font_color_blue"><b><?php echo $row->penerbit; ?></b></span><br>
                            ISBN :&nbsp;<span class="font_color_blue"> <?php echo $row->isbn; ?> </span><br>
                            Jml. Halaman :&nbsp;<span class="font_color_blue"> <?php echo $row->jumlah_halaman; ?> </span><br>                            
                          </td>         
                          <td class="ketengah">
                          	<?php
                             if ($buba == 'administrator' || ($row->valid == "TIDAK" || $row->valid == NULL)) {
                               if($buba == 'administrator' || ($bubi ==  $row->nama_dosen || ($bubi ==  $row->nama_dosen1) || ($bubi ==  $row->nama_dosen2))){
                            ?>
                                <button type="button" class="btn btn-success btn-xs btnnomargin" data-toggle="modal" 
                                    data-target="#modal-upload<?php echo $row->id_buku_ajar;?>">
                                  <span class="glyphicon glyphicon-cloud-upload"></span>
                                </button>
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
                                <a href="<?php echo site_url().'fileupload/bukuajar/'.$row->file  ?>"
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
                            if($buba == 'administrator' || ($bubi ==  $row->nama_dosen || ($bubi ==  $row->nama_dosen1) || ($bubi ==  $row->nama_dosen2))){
                            ?>                            
                              <a href="<?php echo site_url(); ?>publikasi/BukuAjar/editdok/<?php echo $row->id_buku_ajar; ?>" class="btn btn-primary btn-xs btnnomargin" ><i class="glyphicon glyphicon-pencil  "></i></a>
                              <a href="<?php echo site_url(); ?>publikasi/BukuAjar/deletedok/<?php echo $row->id_buku_ajar; ?>" class="btn btn-danger btn-xs btnnomargin" onClick="return doconfirm();"><i class="glyphicon glyphicon-remove  "></i></a> 
                            <?php
                              }}
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
                              <a href="<?php echo site_url(); ?>publikasi/BukuAjar/validasi/<?php echo $row->id_buku_ajar; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
                              <a href="<?php echo site_url(); ?>publikasi/BukuAjar/tolakvalidasi/<?php echo $row->id_buku_ajar; ?>" class="btn btn-xs btn-hitam btnnomargin"><i class="fa fa-thumbs-down"></i></a>
                            <?php
                              } elseif ($buba == 'administrator' && ($row->valid ==  "TIDAK") ) {
                            ?>
                              <a href="<?php echo site_url(); ?>publikasi/BukuAjar/validasi/<?php echo $row->id_buku_ajar; ?>" class="btn bg-purple btn-xs btnnomargin"><i class="fa fa-thumbs-up"></i></a>
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
<div class="modal fade" id="modal-upload<?php echo $rou->id_buku_ajar;?>" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Buku Ajar</h4>
      </div>
      <div class="modal-body">
        <?php
            $atribut = array(
              'class' => 'form-horizontal form-label-left',
              'data-parsley-validate' => '',
              'id'=>'demo-form2'
            );                                        
            echo form_open_multipart('publikasi/BukuAjar/uploaddok/',$atribut);
            echo form_hidden('id',$rou->id_buku_ajar);
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