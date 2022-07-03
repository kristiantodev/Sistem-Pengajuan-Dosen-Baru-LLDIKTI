<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
<div class="main-content">
  <div class="page-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18"> <i class="mdi mdi-inbox-full"></i> &nbsp;&nbsp;History Pengajuan Permohonan Dosen</h4>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="text-right mb-4">  
              
            </div>
            <?= $this->session->flashdata('message');?>
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead bgcolor="">
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Judul Permohonan</b></th>
                                    <th width="250"><b>Status</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $no=1;
         foreach ($request_dosenList as $f): ?>
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                    <td><a href="<?php echo base_url().'pt/request_dosen/detail/'.$f->id_request;?>" class="btn-read-more"><?php echo $f->nm_request ?></a></td>
                                    <td>

                                      <?php
                                        
                                        $icon="";
                                            $btn="";
                                            $remark="";
                                            $isDisabled="";

                                       if($f->status == "New"){
                                            $icon="fas fa-clock";
                                            $btn="btn btn-warning btn-sm";
                                            $remark="Proses - Menunggu Proses Verifikasi";
                                       }else if($f->status == "Revisi"){
                                            $icon="fas fa-info-circle";
                                            $btn="btn btn-warning btn-sm";
                                            $remark="Revisi - Permohonan ditolak dengan Revisi";
                                      }else if($f->status == "Request-Accept"){
                                            $icon="fas fa-check";
                                            $btn="btn btn-primary btn-sm";
                                            $remark="Accept - Segera Konfirmasi Permohonan";
                                      }else if($f->status == "Request-Reject"){
                                            $icon="fas fa-times";
                                            $btn="btn btn-danger btn-sm";
                                            $remark="Reject - Permohonan Dosen Ditolak&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                      }else if($f->status == "RevisiDone"){
                                            $icon="fas fa-info-circle";
                                            $btn="btn btn-info btn-sm";
                                            $remark="Revisi - Menunggu Konfirmasi Revisi";
                                      }else if($f->status == "Accept"){
                                            $icon="fas fa-check";
                                            $btn="btn btn-success btn-sm";
                                            $remark="Accept - Rekomendasi Dosen telah diACC";
                                      }else if($f->status == "Reject"){
                                            $icon="fas fa-times";
                                            $btn="btn btn-danger btn-sm";
                                            $remark="Close - Rekomendasi ditolak oleh Pemohon";
                                      }

                                       ?>

                                      <button class="<?=$btn?>"><i class="<?=$icon?>"></i> <?=$remark?></span></button>
                                        

                                      </td>
                                </tr>
                                <?php endforeach; ?>
                                                </tbody>
                                            </table>

          </div>
        </div>
    </div>
    <!-- end col -->
  </div>
  <!-- end row -->
                    