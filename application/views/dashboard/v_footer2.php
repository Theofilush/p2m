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
    <!--<script src="?php echo base_url() ?>asett/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
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
  foreach($tampil_prodi as $dat){   //menambpilkan kode prodi pada grafik 2, 3, dan 4         
    $kd[] = $dat->kode_prodi;
  }
  //print_r($g1liti);exit();
  foreach($tampil_tahun as $dat){
    $thn[] = $dat->tahun;
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

    if ($('#grafik_pertama').length) {
      var ctx = document.getElementById("grafik_pertama");
      var grafik_pertama = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: <?php echo json_encode($thn);?>,
              datasets: [{
                  label: 'Penelitian',
                  backgroundColor: "#26B99A",
                  data: <?php echo json_encode($g1liti);?>
                  //data: [10,20,9]
              }, {
                  label: 'Pengabdian',
                  backgroundColor: "#3498DB",
                  //data: [10,20,30]
                   data: <?php echo json_encode($g1abdi);?>
              }, {
                  label: 'Publikasi',
                  backgroundColor: "#9B59B6",
                  data: <?php echo json_encode($g1publi);?>
                  //data: [10,20,30]
              }
            ]
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
          //labels: [1,2,3,4],
				  datasets: [{
            label: 'Jumlah ',
            backgroundColor: "#26B99A",
            //data: [1,2,3,4]
            data: <?php echo json_encode($total_penelitian);?>
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
            data: <?php echo json_encode($total_pengabdiana);?>
            //data: [1,2,3]
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
            data: <?php echo json_encode($total_publikasi);?>
            //data: [1,2,3]
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
          //labels: //?php echo json_encode($top5prodi);?>,
          labels: [
                "Dark Greyyyyyyy",
                "Purple Color",
                "Gray Color",
                "Green Color",
                "Blue Color"
            ],
          datasets: [{
            //data: ?php echo json_encode($top5);?>,
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
			  var canvasDoughnuta = new Chart(ctx, {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: datap
          // options: {
          //   legend: {
          //     display: true
          //   },
          //   tooltips: {
          //     callbacks: {
          //       label: function(tooltipItem, data) {
          //         var label = data.labels[tooltipItem.index];
          //         var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
          //          return label + ':' + val + ' (' + (val ?php foreach($jumba as $rowa){echo $rowa->creditTotal;} ?> * 100).toFixed(2) + '%)';
          //       }
          //     }
          //   }
				  // }
			  });
    }  
    
    if ($('#pieCharta').length) {

      var ctx = document.getElementById("pieCharta");
      var data = {
          datasets: [{
              data: [120, 50, 140, 180, 100],
              backgroundColor: [
                  "#455C73",
                  "#9B59B6",
                  "#BDC3C7",
                  "#26B99A",
                  "#3498DB"
              ],
              label: 'My dataset' // for legend
          }],
          labels: [
              "Dark Gray",
              "Purple",
              "Gray",
              "Green",
              "Blue"
          ]
      };

      var pieCharta = new Chart(ctx, {
          data: data,
          type: 'pie',
          otpions: {
              legend: false
          }
      });

    }

    </script>
  </body>
</html>