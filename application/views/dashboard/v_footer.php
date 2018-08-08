      </div>      

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            2018 - <a href="http://upj.ac.id">Universitas Pembangunan Jaya</a> | All Data Reserved
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
      <span id="demo-form2" style="display:none;"></span>
    <script src="<?php echo base_url() ?>asett/dist/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>asett/dist/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>asett/plugins//fastclick/lib/fastclick.js"></script>
    <script src="<?php echo base_url() ?>asett/plugins/nprogress/nprogress.js"></script>
    <script src="<?php echo base_url() ?>asett/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?php echo base_url() ?>asett/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>asett/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!--<script src="<?php echo base_url() ?>asett/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>asett/plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>-->
    <script src="<?php echo base_url() ?>asett/plugins/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo base_url() ?>asett/plugins//pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo base_url() ?>asett/plugins/parsleyjs/dist/parsley.min.js"></script>
    <script src="<?php echo base_url() ?>asett/plugins/iCheck/icheck.min.js"></script>
    <script src="<?php echo base_url() ?>asett/plugins/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url() ?>asett/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url() ?>asett/dist/js/custom.js"></script>
  <script>
    $('.select2_ok').select2({
      placeholder: 'Your NULL value caption',
      allowClear: true  
    });
    $('#kalenderku1').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
      orientation: 'auto bottom'
    })
    $('#kalenderku2').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd",
      orientation: 'auto bottom'
    })
    function doconfirm()
    {
        job=confirm("Are you sure to delete permanently?");
        if(job!=true)
        {
            return false;
        }
    }
 
    function cek_nidn(){
        //$("#pesan_username").hide();
        var nidn1 = $("#penulis").val();       
        var nidn3 = $("#anggota2").val();
        if(nidn1 != ""){
            $.ajax({ 
              url: "<?php echo site_url() . 'publikasi/BukuAjar/cek_status_user'; ?>", 
                data: 'penulis='+nidn1,
                type: "POST",
                success: function(msg){                  
                  //$("#pesan_penulis").val(msg);
                    if(msg==1){
                      //$("#pesan_penulis").css("color","#59c113");
                      $("#pesan_penulis").val("NIDN tidak ditemukan");                        
                        error = 0;
                    }else {
                      $("#pesan_penulis").val(msg);  
                        error = 1;
                    }
 
                   // $("#pesan_username").fadeIn(1000);
                }
            });
        }              
        if(nidn3 != ""){
            $.ajax({ 
              url: "<?php echo site_url() . 'publikasi/BukuAjar/cek_status_user'; ?>", 
                data: 'penulis='+nidn3,
                type: "POST",
                success: function(msg){                  
                  //$("#pesan_penulis").val(msg);
                    if(msg==1){
                      //$("#pesan_penulis").css("color","#59c113");
                      $("#pesan_penulis").val("NIDN tidak ditemukan");                        
                        error = 0;
                    }else {
                      $("#pesan_penulis").val(msg);  
                        error = 1;
                    }
 
                   // $("#pesan_username").fadeIn(1000);
                }
            });
        }            
    }
    function cek_nidn2(){
        var nidn2 = $("#anggota1").val();    
        if(nidn2 != ""){
            $.ajax({ 
              url: "<?php echo site_url() . 'publikasi/BukuAjar/cek_status_user'; ?>", 
                data: 'penulis='+nidn2,
                type: "POST",
                success: function(msg){                  
                  //$("#pesan_penulis").val(msg);
                    if(msg==1){
                      //$("#pesan_penulis").css("color","#59c113");
                      $("#pesan_penulis2").val("NIDN tidak ditemukan");                        
                        error = 0;
                    }else {
                      $("#pesan_penulis2").val(msg);  
                        error = 1;
                    }
 
                   // $("#pesan_username").fadeIn(1000);
                }
            });
        }             
    }
    function cek_nidn3(){
        //$("#pesan_username").hide();   
        var nidn3 = $("#anggota2").val();               
        if(nidn3 != ""){
            $.ajax({ 
              url: "<?php echo site_url() . 'publikasi/BukuAjar/cek_status_user'; ?>", 
                data: 'penulis='+nidn3,
                type: "POST",
                success: function(msg){                  
                  //$("#pesan_penulis").val(msg);
                    if(msg==1){
                      //$("#pesan_penulis").css("color","#59c113");
                      $("#pesan_penulis3").val("NIDN tidak ditemukan");                        
                        error = 0;
                    }else {
                      $("#pesan_penulis3").val(msg);  
                        error = 1;
                    }
 
                   // $("#pesan_username").fadeIn(1000);
                }
            });
        }            
    }
  </script>
  </body>
</html>