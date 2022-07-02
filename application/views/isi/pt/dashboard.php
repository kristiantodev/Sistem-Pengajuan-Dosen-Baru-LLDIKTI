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

                                  <center><b><h3>Profil Perguruan Tinggi</h3></b></center>
                                  <br>
                                   <div class="row">
                                          <div class="col-lg-5 col-md-6 col-5">
                                          
                    <center><img src="<?php echo base_url();?>assets/images/toga.png" height='175'></center>  
                      
                 </div>



                                          <div class="col-lg-7 col-md-6 col-7">
                                          
                                <table width="99%" cellpadding="5">
                                  <tr>
                                    <td>Kode PT</td>
                                    <td>:</td>
                                    <td><?php echo $profilPT->kode_pt ?></td>
                                  </tr>

                                  <tr>
                                    <td>Perguruan Tinggi</td>
                                    <td>:</td>
                                    <td><?php echo $profilPT->nm_pt ?></td>
                                  </tr>

                                  <tr>
                                    <td>Jenis Perguruan Tinggi</td>
                                    <td>:</td>
                                    <td><?php echo $profilPT->jenis_pt ?></td>
                                  </tr>

                                  <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>

                                      <?php
                                            if($profilPT->status_pt == "Aktif"){
                                              $badge = "success";
                                              $icon="check";
                                            }else{
                                              $badge= "danger";
                                              $icon="times";
                                            }
                                       ?>

                                      <span class="badge badge-<?php echo $badge ?>">
                                        <i class="fas fa-<?php echo $icon ?>"></i> &nbsp;<?php echo $profilPT->status_pt ?>&nbsp;&nbsp;</span></td>
                                  </tr>

                                  <tr>
                                    <td>Lokasi</td>
                                    <td>:</td>
                                    <td><?php echo $profilPT->lokasi ?></td>
                                  </tr>
                                 

                                </table>

                                          </div>
                      </div>

            
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page-content -->

          <script src="<?= base_url('assets/')?>libs/jquery/jquery.min.js"></script>
              <script src="<?php echo base_url();?>assets/Chart.min.js"></script>
           <script src="<?php echo base_url();?>assets/widget-charts2.js"></script>                     