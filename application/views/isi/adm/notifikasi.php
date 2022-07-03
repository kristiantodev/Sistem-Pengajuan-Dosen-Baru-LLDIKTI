<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

<?php
function tgl_indo($tanggal){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
 
  return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

?>

<div class="main-content">
  <div class="page-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18"> <i class="far fa-bell"></i> &nbsp;Notifikasi </h4>

            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="text-left mb-4"> 

              <?php foreach ($listNotif as $n) { ?>

                <?php

                   if ($n->is_read == 0) {
                     $color='info';
                     $icon='far fa-bell';
                     $remark='Belum dibaca';
                   }else{
                     $color='secondary';
                     $icon='far fa-bell';
                     $remark='';
                    }
                    

                 ?>

                 <a href="<?php echo base_url().'adm/request_dosen/detail/'.$n->id_request;?>/1" class="text-reset notification-item">

              <div class="alert alert-<?=$color;?>" role="alert">
                                <h6><b>
                                        <font color="#0285b4"><i class='<?=$icon;?>'></i>&nbsp;<span class="badge badge-info"><?=$remark;?></span>  &nbsp;<?php echo $n->status_request ?> - <?php echo $n->nm_request ?>
                                    </b></h6>

                                <i class='fas fa-user'></i>&nbsp; <?php echo $n->nm_user ?> - <?php echo $n->nm_pt ?> <br>
                                <i class='fas fa-clock '></i>&nbsp; 

                                  <?php 

                                $timeNew = strtotime($n->tgl_notifikasi);
                                $newformatNew = date('h:i:sa',$timeNew);
                                echo $newformatNew ?>

                                <?php 

                                $time = strtotime($n->tgl_notifikasi);
                                 $newformat = date('Y-m-d',$time);
                                echo tgl_indo($newformat) ?></font>

                            </div>

                          </a>

                          <?php } ?>

             
          </div>
        </div>
    </div>
    <!-- end col -->
  </div>
  <!-- end row -->