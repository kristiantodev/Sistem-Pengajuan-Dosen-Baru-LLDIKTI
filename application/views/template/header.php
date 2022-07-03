<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sistem Informasi Manajemen Keahlian Dosen Pada LLDIKTI Wilayah II</title>

   <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo.png">

    <!-- jquery.vectormap css -->
    <link href="<?= base_url('assets/')?>libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/')?>css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/')?>css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/')?>css/app.css" id="app-style" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    
    <!-- DataTables -->
    <link href="<?= base_url('assets/')?>libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/')?>libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?= base_url('assets/')?>libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<body data-layout="detached" data-topbar="colored">

    <div class="container-fluid">
        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="container-fluid">
                        <div class="float-right">
                            <div class="dropdown d-inline-block d-lg-none ml-2">
                                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                                    <form class="p-3">
                                        <div class="form-group m-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>



                         <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-bell-outline"></i>
                                    <span class="badge-danger badge-pill"><font size="2">
                                        
                                        <?php 

                                        if ($this->session->userdata('level') == "Administrator") {
                                            $fieldName='notif_to';
                                            $idUserLogin='admin';
                                            $link='adm';
                                            $listNotif = $this->db->query("SELECT*FROM notifikasi
                                              
                                              LEFT JOIN request_dosen ON request_dosen.id_request=notifikasi.id_request
                                              LEFT JOIN perguruan_tinggi ON perguruan_tinggi.id_pt=request_dosen.id_pt
                                              LEFT JOIN user ON request_dosen.id_pt=user.id_pt
                                              WHERE notifikasi.notif_to='$idUserLogin' AND is_read=0  ORDER BY notifikasi.tgl_notifikasi DESC LIMIT 5 ")->result();
                                        }else{
                                            $fieldName='id_pt';
                                            $link='pt';
                                            $idUserLogin=$this->session->userdata('id_pt');
                                            $listNotif = $this->db->query("SELECT*FROM notifikasi                                      
                                              LEFT JOIN request_dosen ON request_dosen.id_request=notifikasi.id_request
                                              LEFT JOIN perguruan_tinggi ON perguruan_tinggi.id_pt=request_dosen.id_pt
                                              LEFT JOIN user ON request_dosen.id_pt=user.id_pt
                                              WHERE notifikasi.id_pt='$idUserLogin' AND is_read=0  ORDER BY notifikasi.tgl_notifikasi DESC LIMIT 5")->result();
                                        }

                                        $array = array('is_read' => 0, $fieldName => $idUserLogin);
  echo $total = $this->db->where($array)->count_all_results('notifikasi');?>

                                    </font> </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0"> Pemberitahuan </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-simplebar style="max-height: 230px;">

                                        <?php
                                             if ($total == 0) {
                                         ?>
                                              <center>Tidak ada Pemberitahuan</center>
                                          <?php
                                             }else{
                                         ?>


                                         <?php $no=1;
         foreach ($listNotif as $n): ?>

                                         <a href="<?php echo base_url().$link.'/request_dosen/detail/'.$n->id_request;?>/1" class="text-reset notification-item">
                                            <div class="media">
                                                <div class="avatar-xs mr-3">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="far fa-bell"></i>
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mt-0 mb-1"><?php echo $n->status ?> - <?php echo $n->nm_request ?></h6>
                                                    <div class="font-size-12 text-muted">

                                                        <?php if($this->session->userdata('level')=="Administrator"){ ?>
                                                        <p class="mb-1">Dari : <?php echo $n->nm_user ?> - <?php echo $n->nm_pt ?></p>
                                                    <?php }else{ ?>

                                                         <p class="mb-1">Dari : Admin</p>
                                                      
                                                      <?php }?>

                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> &nbsp;<?php echo $n->tgl_notifikasi ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
<?php endforeach; ?>
                                          <?php
                                             }
                                         ?>

        
                                        
                                    </div>
                                    <div class="p-2 border-top">
                                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="<?php echo base_url().$link.'/notifikasi'?>">
                                            <i class="mdi mdi-arrow-right-circle mr-1"></i> Lihat Semua...
                                        </a>
                                    </div>
                                </div>
                            </div>

                   <!--   <div class="dropdown d-inline-block mt-3">
                                <a href="<?= base_url('login/logout')?>" class="btn btn-success btn-sm waves-effect waves-light" onclick="return confirm('Apakah anda ingin logout?')">
                                  <i class="bx bx-power-off"> Logout</i>
                                </a>
                    </div> -->
                        </div>
                        <div>
                            <!-- LOGO -->
                            <div class="navbar-brand-box">
                                <center>
                                <a href="#" class="logo logo-light">
                                    <img src="<?php echo base_url();?>assets/images/logo2.png" alt="" height="75">
                                </a>
                                </center>
                            </div>
                        </div>
                        <marquee align="center" width="60%">
                          <h4 class="mt-4 text-white">
                            Selamat Datang Di Sistem Manajemen Keahlian Dosen Pada LLDIKTI Wilayah II 
                          </h4>
                        </marquee>
                    </div>
                </div>
            </header> 