<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="page-title mb-0 font-size-18"> <i class="fas fa-tachometer-alt"></i> &nbsp;&nbsp;Dashboard</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                            <div class="profile-widgets py-3">
                              <div class="text-center">
                                <div class="">
                                    <img src="<?php echo base_url();?>assets/images/logo.png" alt="" height="125">
                                </div>
                                <div class="mt-3 ">
                                    <a href="#" class="text-dark font-weight-medium font-size-16">Lembaga Layanan Pedidikan Tinggi Wilayah II (LLDIKTI) Kota Palembang</a>
                                    <p class="text-body mt-1 mb-1">Jl. Srijaya No.883, Kec. Alang-Alang Lebar, Kota Palembang</p>
                                </div>
                               
                              </div>
                            </div>
                          </div> <!--card body -->
                        </div>
                      </div><!--col md -->
                      <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Chart Penanganan Request Permohonan Dosen</h4>

                                    <canvas id="chart_request" height="165"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page-content -->

          <script src="<?= base_url('assets/')?>libs/jquery/jquery.min.js"></script>
              <script src="<?php echo base_url();?>assets/Chart.min.js"></script>
           <script src="<?php echo base_url();?>assets/widget-charts2.js"></script>                     
<script>
    
$(function () {

'use strict';

    if( $('#chart_request').length > 0 ){
    var ctx2 = document.getElementById("chart_request").getContext("2d");
    var data2 = {
      labels: [
                <?php foreach ($request_dosenList as $grafik): ?>
          "<?php echo $grafik->status; ?>",
         <?php endforeach; ?>
            ],
      datasets: [
      {
        label: "Jumlah",
        backgroundColor: "#05b085",
        borderColor: "#05b085",
        data: [
                    <?php foreach ($request_dosenList as $grafikCount): ?>
                    <?php echo $grafikCount->jumlah ?>,

                    <?php endforeach; ?>
                ]
      }
      ]
    };
    
    var hBar = new Chart(ctx2, {
      type:"bar",
      data:data2,
      
      options: {
        tooltips: {
          mode:"label"
        },
        scales: {
          yAxes: [{
            stacked: true,
            gridLines: {
              color: "rgba(135,135,135,0)",
            },
            ticks: {
              fontFamily: "Poppins",
              fontColor:"#878787"
            }
          }],
          xAxes: [{
            stacked: true,
            gridLines: {
              color: "rgba(135,135,135,0)",
            },
            ticks: {
              fontFamily: "Poppins",
              fontColor:"#878787"
            }
          }],
          
        },
        elements:{
          point: {
            hitRadius:40
          }
        },
        animation: {
          duration: 3000
        },
        responsive: true,
        maintainAspectRatio:false,
        legend: {
          display: false,
        },
        
        tooltip: {
          backgroundColor:'rgba(33,33,33,1)',
          cornerRadius:0,
          footerFontFamily:"'Poppins'"
        }
        
      }
    });
  }
    

  }); // End of use strict
    </script>        