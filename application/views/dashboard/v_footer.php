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
    <script src="<?php echo base_url() ?>asett/plugins/Chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>asett/dist/js/custom.js"></script>
    <?php
        foreach($tampil_prodi as $dat){            
            $kd[] = $dat->kode_prodi;            
        }
      ?>
      <?php
        foreach($tampil_prodi as $dat){            
            $aaaa[] = $dat->kode_prodi;            
        }
      ?>
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

    if ($('#lineCharta').length ){			
      var ctx = document.getElementById("lineCharta");
      var lineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: <?php echo json_encode($kd);?>,
        datasets: [{
          label: "Penelitian",
          backgroundColor: "rgba(38, 185, 154, 0.31)",
          borderColor: "rgba(38, 185, 154, 0.7)",
          pointBorderColor: "rgba(38, 185, 154, 0.7)",
          pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointBorderWidth: 1,
          data: [31, 74, 6, 39, 20, 85, 70]
        }, {
          label: "Pengabdian",
          backgroundColor: "rgba(3, 88, 106, 0.3)",
          borderColor: "rgba(3, 88, 106, 0.70)",
          pointBorderColor: "rgba(3, 88, 106, 0.70)",
          pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: "rgba(151,187,205,1)",
          pointBorderWidth: 1,
          data: [82, 23, 66, 9, 99, 4, 2]
        },  {
          label: "Publikasi",    
          backgroundColor: "rgba(106, 59, 2, 0.3)",
          borderColor: "rgba(106, 59, 2, 0.70)",
          pointBorderColor: "rgba(106, 59, 2, 0.70)",
          pointBackgroundColor: "rgba(106, 59, 2, 0.70)",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: "rgba(151,187,205,1)",
          pointBorderWidth: 1,      
          data: [30, 14, 7, 70, 6, 7, 50]
        }]
      },
					options: {
						legend: {
							display: true
						}
					}
      });
  
    }
    if ($('#mybarCharta').length ){ 			  
			  var ctx = document.getElementById("mybarCharta");
			  var mybarChart = new Chart(ctx, {
				type: 'bar',
				data: {
				  labels: <?php echo json_encode($kd);?>,
				  datasets: [{
					label: '# of Votes',
					backgroundColor: "#26B99A",
					data: [51, 30, 40, 28, 92, 50, 45]
				  }]
				},

				options: {
				  scales: {
					yAxes: [{
					  ticks: {
						beginAtZero: true
					  }
					}]
				  }
				}
			  });			  
      } 
      
      if ($('#mybarChartb').length ){ 			  
			  var ctx = document.getElementById("mybarChartb");
			  var mybarChart = new Chart(ctx, {
				type: 'bar',
				data: {
				  labels: <?php echo json_encode($kd);?>,
				  datasets: [{
            label: 'pengetesan',
            backgroundColor: "#26B99A",
            data: [51, 30, 40, 28, 92, 50, 45,2,2,2]
				  }]
				},
        options:{
          scales:{
              xAxes: [{
                  display: true //this will remove all the x-axis grid lines
              }]
         },
          legend: {
            display: false
          }				  
        }
			  });			  
      } 
      if ($('#mybarChartc').length ){ 			  
			  var ctx = document.getElementById("mybarChartc");        
			  var mybarChart = new Chart(ctx, {
				type: 'bar',
				data: {
				  labels: <?php echo json_encode($kd);?>,
				  datasets: [{
					label: '# of Votes',
					backgroundColor: "#26B99A",
					data: [51, 30, 40, 28, 92, 50, 45]
				  }]
				},

				options: {
				  scales: {
					yAxes: [{
					  ticks: {
						beginAtZero: true
					  }
					}]
				  }
				}
			  });			  
      }
      
      if ($('#canvasDoughnuta').length ){ 			  
        var ctx = document.getElementById("canvasDoughnuta");
        //Chart.defaults.global.legend.position = 'left';
        //Chart.defaults.global.legend.position = "left";
			  var datap = {
          labels: ["Dark Grey","Purple Color","Gray Color","Green Color","Blue Color"],
          datasets: [{
            data: [120, 50, 140, 180, 100],
            backgroundColor: [
            "#455C73",
            "#9B59B6",
            "#BDC3C7",
            "#26B99A",
            "#3498DB"
            ],
            hoverBackgroundColor: [
            "#34495E",
            "#B370CF",
            "#CFD4D8",
            "#36CAAB",
            "#49A9EA"
            ]
          }]
        };
			  var canvasDoughnut = new Chart(ctx, {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: datap,
          options: {
            legend: {
              display: true
            }
				  }
			  });
        
			}  
  </script>
  </body>
</html>