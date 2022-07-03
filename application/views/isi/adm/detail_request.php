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
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses'); ?>"></div>
<div class="main-content">
  <div class="page-content">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18"> <i class="fa fa-search"></i> &nbsp;Detail Permohonan : <?php echo $requestDetail->nm_request;?></h4>

            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="text-left mb-4"> 

              <div class="row">
                                          <div class="col-lg-3 col-md-6 col-5">
                                          
                    <center><img src="<?php echo base_url();?>assets/images/surat.png" height='175'>

                   <!--     <br>
                       <a href="<?php echo base_url().'adm/request_dosen'?>" class="btn-read-more">Kembali</a> -->

                    </center>  
                      
                 </div>



                                          <div class="col-lg-9 col-md-6 col-7">
                                          
                                <table width="99%" cellpadding="5">
                                  <tr>
                                    <td>Nama Pemohon</td>
                                    <td>:</td>
                                    <td><?php echo $requestDetail->nm_user;?></td>
                                  </tr>

                                   <tr>
                                    <td width="175">Asal Perguruan Tinggi</td>
                                    <td>:</td>
                                    <td><?php echo $requestDetail->nm_pt;?></td>
                                  </tr>

                                  <tr>
                                    <td>Permohonan Dosen</td>
                                    <td>:</td>
                                    <td><?php echo $requestDetail->nm_prodi;?> - <?php echo $requestDetail->jenjang;?></td>
                                  </tr>

                                  <tr>
                                    <td>Tanggal Permohonan</td>
                                    <td>:</td>
                                    <td><?php echo tgl_indo($requestDetail->tgl_request);?></td>
                                  </tr>

                                  <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td><?php echo $requestDetail->keterangan;?></td>
                                  </tr>

                                  <tr>
                                    <td>Status Permohonan</td>
                                    <td>:</td>
                                    <td><?php 
                                         $icon="";
                                            $btn="";
                                            $remark="";
                                            $isDisabled="disabled";
                                    if($requestDetail->status == "New"){
                                            $icon="fas fa-info-circle";
                                            $btn="btn btn-info btn-sm";
                                            $remark="New - Permohonan Butuh Verifikasi Data";
                                            $isDisabled="";
                                      }else if($requestDetail->status == "Revisi"){
                                            $icon="fas fa-info-circle";
                                            $btn="btn btn-warning btn-sm";
                                            $remark="Revisi - Menunggu Permohonan Direvisi";
                                            $isDisabled="disabled";
                                      }else if($requestDetail->status == "Request-Accept"){
                                            $icon="fas fa-check";
                                            $btn="btn btn-primary btn-sm";
                                            $remark="Accept - Menunggu Konfirmasi Pemohon";
                                            $isDisabled="disabled";
                                      }else if($requestDetail->status == "Request-Reject"){
                                            $icon="fas fa-times";
                                            $btn="btn btn-danger btn-sm";
                                            $remark="Reject - Permohonan Dosen Ditolak";
                                            $isDisabled="disabled";
                                      }else if($requestDetail->status == "Accept"){
                                            $icon="fas fa-check";
                                            $btn="btn btn-success btn-sm";
                                            $remark="Accept - Rekomendasi Dosen telah diACC";
                                            $isDisabled="disabled";
                                      }else if($requestDetail->status == "Reject"){
                                            $icon="fas fa-times";
                                            $btn="btn btn-danger btn-sm";
                                            $remark="Close - Rekomendasi ditolak oleh Pemohon";
                                            $isDisabled="disabled";
                                      }else if($requestDetail->status == "RevisiDone"){
                                            $icon="fas fa-info-circle";
                                            $btn="btn btn-info btn-sm";
                                            $remark="Revisi - Menunggu Konfirmasi Revisi";
                                            $isDisabled="";
                                      }

                                       ?>

                                      <button class="<?=$btn?>"><i class="<?=$icon?>"></i> &nbsp;<?=$remark?></span></button></td>
                                  </tr>

                                    <tr>
                                    <td>Dosen Rekomendasi</td>
                                    <td>:</td>
                                    <td><?php echo $requestDetail->nm_dosen;?></td>
                                  </tr>

                                  <tr>
                                    <td>Catatan</td>
                                    <td>:</td>
                                    <td><?php echo $requestDetail->note;?></td>
                                  </tr>
                                 

                                </table>

                                          </div>
                      </div>
<br>  <br>
                       <p align="right">

             <a data-toggle="modal" data-target="#verifikasi">
                                            <button type="button" <?=$isDisabled;?> class="btn btn-success waves-effect waves-light">
                                    <i class="fa fa-check"></i> Verifikasi Data</button>
                                </a> &nbsp;

                                 <a data-toggle="modal" data-target="#revisi">
                                            <button type="button" <?=$isDisabled;?> class="btn btn-danger waves-effect waves-light">
                                  <i class="fas fa-times"></i> Tolak Pengajuan</button>
                                </a>

            </p>

                    

            <?php if ($requestDetail->file == "default.png") { ?>
              <center>
            <img src="<?php echo base_url('assets/images/request/'.$requestDetail->file) ?>" height="500" height="750"><br>Tidak ada file permohonan yang dilampirkan</center>
            <?php }else{ ?>
<embed src="<?php echo base_url('assets/images/request/'.$requestDetail->file) ?>" width="920px" height="750px" />
             <?php }?> 

             <br>

             
          </div>
        </div>
    </div>
    <!-- end col -->
  </div>
  <!-- end row -->
         

         <!-- Modal Verifikasi -->
                  <div class="modal fade text-left" id="verifikasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-success">
                      <h6 class="modal-title"><font color='white'><i class="fa fa-check"></i>&nbsp; Verifikasi Permohonan</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/request_dosen/verifikasi'); ?>" method="post">
                        <input type="hidden" name="id_request" value="<?php echo $requestDetail->id_request;?>">
                        <input type="hidden" name="id_pt" value="<?php echo $requestDetail2->id_pt;?>">

                      <div class="modal-body">

                        <?php
                             $idProdi = $requestDetail->dosen_specialist_id;
                             $listDosen = $this->db->query("SELECT*FROM dosen WHERE id_prodi='$idProdi'")->result();
                         ?>
                        
                              <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead bgcolor="">
                                                <tr>
                                    <th width="9"><b></b></th>
                                    <th><b>Pilih Dosen <?php echo $requestDetail->nm_prodi;?> - <?php echo $requestDetail->jenjang;?> :</b></th>
                                   
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $u=1;
                                        foreach ($listDosen as $f): ?>
                                <tr>
                                    <td width="20" align="center">
                                      
                                      <input type="radio" required id="outstanding_<?php echo $u; ?>" name="id_dosen" value="<?= $f->id_dosen ?>" onchange="getVals(this, 'question_<?php echo $u; ?>');">
                        <label class="radio" for="outstanding_<?php echo $u; ?>"></label>
                        <label for="outstanding_<?php echo $u; ?>" class="wrapper"></label>

                                    </td>
                                    <td><?php echo $f->nm_dosen; ?></td>
                                </tr>
                                <?php endforeach; ?>
                                                </tbody>
                                            </table>

                      </div>
                      <div class="modal-footer">
                                <button type="submit"  class="btn btn-success">
                                    <i class="fa fa-check"></i>&nbsp;Verifikasi Data
                                </button>
                        
                      </div>
                      </form>
                    </div>
                    </div>
                  </div> 


                           <!-- Modal Revisi-->
                  <div class="modal fade text-left" id="revisi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-danger">
                      <h6 class="modal-title"><font color='white'>Apakah anda yakin untuk Menolak Permohonan ini ?</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/request_dosen/revisi'); ?>" method="post">
                        <input type="hidden" name="id_request" value="<?php echo $requestDetail->id_request;?>">
                        <input type="hidden" name="id_pt" value="<?php echo $requestDetail2->id_pt;?>">
                      <div class="modal-body">

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Catatan</label>
                          <textarea class="form-control" name="note" id="title1" rows="5"></textarea>
                        </fieldset>

                      </div>
                      <div class="modal-footer">
                                <button type="submit"  class="btn btn-danger">
                                    <i class="fas fa-check"></i>&nbsp;Tolak Dengan Revisi
                                </button> Atau

                                 </form>
                      <form action="<?php echo site_url('adm/request_dosen/tolak'); ?>" method="post">
                        <input type="hidden" name="id_request" value="<?php echo $requestDetail->id_request;?>">
                        <input type="hidden" name="id_pt" value="<?php echo $requestDetail2->id_pt;?>">
                        <button type="submit"  class="btn btn-danger">
                                    <i class="fas fa-trash"></i>&nbsp;Tolak Permohonan
                                </button>
                      </form>
                        
                      </div>

                    </div>
                    </div>
                  </div> 