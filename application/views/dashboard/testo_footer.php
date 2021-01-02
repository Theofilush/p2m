
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
    <script src="<?php echo base_url() ?>asett/plugins/fastclick/lib/fastclick.js"></script>
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
        foreach ($g1abdi as $data) {
          $g1abd[] = $data;
        }
        foreach ($g1liti as $data2) { 
          $g1lit[] = $data2;
        }
        foreach($tampil_prodi as $dat){   //menambpilkan kode prodi pada grafik 2, 3, dan 4         
            $kd[] = $dat->kode_prodi;
        }
        foreach($tampil_tahun as $dat){
            $thn[] = $dat->tahun;
        }
        foreach($top_five as $rowb){ //menampilkan jumlah dan nama prodi dari 5 teratas
            $top5[] =  $rowb->jumlah;
            $top5prodi[] = $rowb->prodi;
        }
        foreach($total_publikasi as $rowc){ //menampilkan jumlah setiap prodi pada publikasi          
          $total_jurnal[] = $rowc;
        }
        foreach($total_penelitian as $rowd){ //menampilkan jumlah setiap prodi pada publikasi          
          $total_penelitiana[] = $rowd;
        }
        foreach($total_pengabdiana as $rowe){ //menampilkan jumlah setiap prodi pada publikasi          
          $total_pengabdianaa[] = $rowe;
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
    function doconfirm(){
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
                      $("#pesan_penulis").val("NIP tidak ditemukan");                        
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
                      $("#pesan_penulis").val("NIP tidak ditemukan");                        
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
                      $("#pesan_penulis2").val("NIP tidak ditemukan");                        
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
                      $("#pesan_penulis3").val("NIP tidak ditemukan");                        
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
        labels: <?php echo json_encode($thn);?>,
        datasets: [{
          label: "Penelitian",
          backgroundColor: "rgba(38, 185, 154, 0.31)",
          borderColor: "rgba(38, 185, 154, 0.7)",
          pointBorderColor: "rgba(38, 185, 154, 0.7)",
          pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointBorderWidth: 1,
          data: <?php echo json_encode($g1lit);?>
        }, {
          label: "Pengabdian",
          backgroundColor: "rgba(3, 88, 106, 0.3)",
          borderColor: "rgba(3, 88, 106, 0.70)",
          pointBorderColor: "rgba(3, 88, 106, 0.70)",
          pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: "rgba(151,187,205,1)",
          pointBorderWidth: 1,
          data: <?php echo json_encode($g1abd);?>
        },  {
          label: "Publikasi",    
          backgroundColor: "rgba(106, 59, 2, 0.3)",
          borderColor: "rgba(106, 59, 2, 0.70)",
          pointBorderColor: "rgba(106, 59, 2, 0.70)",
          pointBackgroundColor: "rgba(106, 59, 2, 0.70)",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: "rgba(151,187,205,1)",
          pointBorderWidth: 1,      
          data: <?php echo json_encode($g1publi);?>
        }]
      },
					options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            },
						legend: {
							display: true
						}
					}
      });  
    }

    if ($('#chart_besar').length) {

        var ctx = document.getElementById("chart_besar");
        var chart_besar = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "Julyy"],
                datasets: [{
                    label: '# of Votes',
                    backgroundColor: "#26B99A",
                    data: [51, 30, 40, 28, 92, 50, 10]
                }, {
                    label: '# of Votes',
                    backgroundColor: "#03586A",
                    data: [41, 56, 25, 48, 72, 34, 12]
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

    if ($('#mybarCharta').length ){
			  var ctx = document.getElementById("mybarCharta");
			  var mybarChart = new Chart(ctx, {
				type: 'bar',
				data: {
				  labels: <?php echo json_encode($kd);?>,
				  datasets: [{
					label: 'Jumlah ',
					backgroundColor: "#26B99A",
					data: <?php echo json_encode($total_penelitiana);?>
				  }]
				},

				options: {
				  scales: {
					yAxes: [{
					  ticks: {
						beginAtZero: true
					  }
					}]
				  },
          legend: {
            display: false
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
            label: 'Jumlah ',
            backgroundColor: "#26B99A",
            data: <?php echo json_encode($total_pengabdianaa);?>
				  }]
				},
        options:{
          scales:{
              xAxes: [{
                  display: true //this will remove all the x-axis grid lines
              }],
              yAxes: [{
                ticks: {
                beginAtZero: true
                }
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
            label: 'Jumlah  ',
            backgroundColor: "#26B99A",
            data: <?php echo json_encode($total_jurnal);?>
				  }]
				},

				options: {
				  scales: {
					yAxes: [{
					  ticks: {
						beginAtZero: true
					  }
					}]
				  },
          legend: {
            display: false
          }
				}
			  });			  
      }
      
    if ($('#canvasDoughnuta').length ){
        var ctx = document.getElementById("canvasDoughnuta");
        //Chart.defaults.global.legend.position = 'left';
        //Chart.defaults.global.legend.position = "left";
			  var datap = {
          labels: <?php echo json_encode($top5prodi);?>,
          datasets: [{
            data: <?php echo json_encode($top5);?>,
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
            },
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  var label = data.labels[tooltipItem.index];
                  var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                   return label + ':' + val + ' (' + (val /<?php foreach($jumba as $rowa){echo $rowa->creditTotal;} ?> * 100).toFixed(2) + '%)';
                }
              }
            }
				  }
			  });
        
			}  
  </script>
  </body>
</html>