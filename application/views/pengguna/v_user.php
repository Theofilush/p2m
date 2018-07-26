<?php foreach($da as $row){$buba= $row->author;$bubi= $row->username; }  if ($buba == 'administrator'){ ?>
<div class="right_col" role="main">          
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="x_panel">
                  <div class="x_title">
                      <h4 class="">List Dosen</h4>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3" style="margin-bottom: 5px;">                        
                        <button type="button" class="btn btn-primary btn-xs btnnomargin"  data-toggle="modal" data-target="#modal-tambah"><span class="glyphicon glyphicon-plus"></span>  User Baru</button> 
                      </div>
                    </div>
          
                    <table id="datatable-user" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>NIDN</th>
                          <th>Nama Dosen</th>
                          <th>Program Studi</th> 
                          <th>Email</th>
                          <th>Edit</th>   
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1; 
                        foreach($query as $row){                   
                        ?> 
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><b><?php echo $row->NIDN; ?></b><br>                            
                          </td>
                          <td><b><?php echo $row->username; ?></b></td>
                          <td>                           
                           <b><?php echo $row->prodi; ?></b>
                          </td> 
                          <td>
                          <b><?php echo $row->email; ?></b>
                          </td>                         
                          <td class="ketengah">                              
                              <button type="button" class="btn btn-primary btn-xs btnnomargin"  data-toggle="modal" data-target="#modal-edit<?php echo $row->id;?>"><span class="glyphicon glyphicon-pencil"></span></button> 
                              <a href="<?php echo site_url(); ?>pengguna/users/deleteUser/<?php echo $row->id; ?>" class="btn btn-danger btn-xs btnnomargin" onClick="return doconfirm();"><i class="glyphicon glyphicon-remove  "></i></a> 
                            
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
}?>

<?php
          foreach ($query as $rou) {                   
        ?>
        
<div class="modal fade" id="modal-edit<?php echo $rou->id;?>" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Edit Data Pengguna</h4>
      </div>
      <div class="modal-body">
                                <?php
                                    $atribut = array(
                                            'class' => 'form-horizontal form-label-left',
                                            'data-parsley-validate' => '',
                                            'id'=>'demo-form2'
                                    );                                        
                                        echo form_open('pengguna/users/updateUser',$atribut);
                                        echo form_hidden('id',$rou->id);
                                ?>
                              
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">NIDN
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                    
                                    <input type="text" id="nidn" name="nidn" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rou->NIDN; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Dosen
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rou->username; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Program Studi</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                    
                                    <select class="form-control select2_ok" style="width: 100%;" data-placeholder="Personil" name="prodi">                                            
                                        <option><?php echo $rou->prodi; ?></option>
                                            <?php 
                                              foreach($tampil_prodi as $row){                                               
                                            ?>  
                                            <option><?php echo $row->program_studi; ?></option>                      
                                            <?php
                                            }
                                            ?>   
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Email</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="email" id="email" class="form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo $rou->email; ?>">
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Password</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                                    </div>
                                </div>  <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Ulangi Password</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input type="password" name="cpassword" class="form-control" placeholder="Ulangi Password"/>
                                    </div>
                                </div>  
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="reset">Reset</button>
          <button type="submit" class="btn btn-success" name="btnSimpan" value="Simpan">Submit</button>
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

<div class="modal fade" id="modal-tambah" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Tambah Pengguna Baru</h4>
      </div>
      <div class="modal-body">
                                <?php
                                    $atribut = array(
                                            'class' => 'form-horizontal form-label-left',
                                            'data-parsley-validate' => '',
                                            'id'=>'demo-form2'
                                    );                                        
                                        echo form_open('pengguna/users/tambahUser',$atribut);
                                        echo form_hidden('id',$rou->id);
                                ?>
                              
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">NIDN
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">                                    
                                    <input type="text" id="nidn" name="nidn" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Dosen
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Program Studi</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12">                                    
                                    <select class="form-control select2_ok" style="width: 100%;" data-placeholder="Pilih Prodi" name="prodi">                                            
                                        <option></option>
                                            <?php 
                                              foreach($tampil_prodi as $row){                                               
                                            ?>  
                                            <option><?php echo $row->program_studi; ?></option>                      
                                            <?php
                                            }
                                            ?>   
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Email</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input name="email" id="email" class="form-control col-md-7 col-xs-12" required="required" type="email" >
                                    </div>
                                </div>    
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Password</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input type="password" name="password" class="form-control"/>
                                    </div>
                                </div>  <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12">Ulangi Password</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                    <input type="password" name="cpassword" class="form-control"/>
                                    </div>
                                </div>  
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="reset">Reset</button>
          <button type="submit" class="btn btn-success" name="btnSimpan" value="Simpan">Submit</button>
      </div>
      <?php
                echo form_close();
      ?>
    </div>
  </div>
</div>