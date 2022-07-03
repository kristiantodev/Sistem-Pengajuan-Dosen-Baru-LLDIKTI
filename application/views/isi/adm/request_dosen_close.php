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
                <h4 class="page-title mb-0 font-size-18"> <i class="mdi mdi-inbox-full"></i> &nbsp;&nbsp;Daftar Pengajuan Permohonan Ditutup</h4>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="text-right mb-4">  
      
            </div>

            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead bgcolor="">
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Judul Permohonan</b></th>
                                    <th width="155"><b>Pemohon</b></th>
                                    <th width="250"><b>Status</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $no=1;
         foreach ($request_dosenList as $f): ?>
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                    <td><a href="<?php echo base_url().'adm/request_dosen/detail/'.$f->id_request;?>" class="btn-read-more"><?php echo $f->nm_request ?></a></td>
                                     <td>
                                        <?php echo $f->nm_user ?><br>
                                        (<?php echo $f->nm_pt ?>)<br>
                                        <?php echo tgl_indo($f->tgl_request); ?>
                                      </td>
                                    <td>

                                      <?php
                                        
                                        $icon="";
                                            $btn="";
                                            $remark="";
                                            $isDisabled="";

                                       if($f->status == "New"){
                                            $icon="fas fa-info-circle ";
                                            $btn="btn btn-info btn-sm";
                                            $remark="New - Permohonan Butuh Verifikasi Data";
                                       }else if($f->status == "Revisi"){
                                            $icon="fas fa-info-circle";
                                            $btn="btn btn-warning btn-sm";
                                            $remark="Revisi - Menunggu Permohonan Direvisi";
                                      }else if($f->status == "Request-Accept"){
                                            $icon="fas fa-check";
                                            $btn="btn btn-primary btn-sm";
                                            $remark="Accept - Menunggu Konfirmasi Pemohon";
                                      }else if($f->status == "Request-Reject"){
                                            $icon="fas fa-times";
                                            $btn="btn btn-danger btn-sm";
                                            $remark="Reject - Permohonan Dosen Ditolak
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                      }else if($f->status == "Accept"){
                                            $icon="fas fa-check";
                                            $btn="btn btn-success btn-sm";
                                            $remark="Accept - Rekomendasi Dosen telah diACC";
                                      }else if($f->status == "Reject"){
                                            $icon="fas fa-times";
                                            $btn="btn btn-danger btn-sm";
                                            $remark="Close - Rekomendasi ditolak oleh Pemohon";
                                      }else if($f->status == "RevisiDone"){
                                            $icon="fas fa-info-circle";
                                            $btn="btn btn-info btn-sm";
                                            $remark="Revisi - Konfirmasi Ulang Permohonan";
                                      }

                                       ?>

                                      <button class="<?=$btn?>"><i class="<?=$icon?>"></i> &nbsp;<?=$remark?></span></button>
                                        

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
                    

        <!-- Modal -->
                  <div class="modal fade text-left" id="bb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'><i class="fa fa-plus"></i>  Permohonan Permintaan Dosen</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('pt/request_dosen/add'); ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body">

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Judul Permohonan</label>
                          <input type="text" name="nm_request" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
            <label for="email">Dosen Specialist</label>
            <select name="dosen_specialist_id" id="select" required class="custom-select">
              <option value="">-- Pilih Prodi --</option>

              <?php foreach ($prodiList as $pr): ?>
                <option value="<?php echo $pr->id_prodi ?>"><?php echo $pr->jenjang ?>-<?php echo $pr->nm_prodi ?></option>
              <?php endforeach; ?>
            </select>
          </fieldset>

          <fieldset class="form-group floating-label-form-group">
                          <label for="email">Keterangan</label>
                          <textarea class="form-control" name="keterangan" id="title1" rows="5"></textarea>
                        </fieldset>


                         <fieldset class="form-group floating-label-form-group">
            <label for="email">Form Pengajuan *pdf</label><br>
            <input type="file" name="file">
          </fieldset>
                         

                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary btn-sm"  data-dismiss="modal" value="close">
                                    <i class="fas fa-times"></i>&nbsp;Keluar
                                </button>
                                <button type="submit"  class="btn btn-primary btn-sm">
                                    <i class="fa fa-save"></i>&nbsp;Simpan
                                </button>
                        
                      </div>
                      </form>
                    </div>
                    </div>
                  </div>      
