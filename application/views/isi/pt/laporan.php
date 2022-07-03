<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
function printDiv(elementId) {
 var a = document.getElementById('printing-css').value;
 var b = document.getElementById(elementId).innerHTML;
 window.frames["print_frame"].document.title = document.title;
 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 window.frames["print_frame"].window.focus();
 window.frames["print_frame"].window.print();
}
</script>
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
                <h4 class="page-title mb-0 font-size-18"> <i class="mdi mdi-inbox-full"></i> &nbsp;&nbsp;Laporan Permohonan Dosen</h4>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="text-right mb-4">  
      
            </div>


            <form action="<?php echo site_url('pt/laporan'); ?>" method="post">
                        <table class="table table-striped table-bordered dt-responsive nowrap" width="100%">
                            <thead>
                                <tr>
                                    <td>
                                    Tanggal Mulai : <input type="date" value="<?= date("Y-m-d"); ?>" name="date_start" class="form-control" required>
                                        
                                    </td>
                                    <td>Sampai : <input type="date" value="<?= date("Y-m-d"); ?>" name="date_end" class="form-control" required></td>
                                    <td width="220">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-search"></i>&nbsp; Filter
                                        </button>
                                        
                    </form>
                    <a href="javascript:printDiv('box');">
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                    <i class="fa fa-print"></i> &nbsp;&nbsp;Cetak&nbsp;&nbsp;&nbsp;</button>
                                </a>
                                       
                                    </td>
                                </tr>
                            </thead>
                        </table>

                        <div id="box"> 

            <center><h4>LAPORAN PERMOHONAN PENGAJUAN DOSEN <br> Lembaga Layanan Pedidikan Tinggi Wilayah II (LLDIKTI) Kota Palembang<br>
                       <br> Tanggal : <?php echo tgl_indo($tgl_mulai); ?> s/d <?php echo tgl_indo($tgl_sampai); ?><br></h4></center>
<hr/>
            <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead bgcolor="">
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Judul Permohonan</b></th>

                                    <th width="155"><b>Pemohon</b></th>
                                    <th width="155"><b>Dosen Rekomendasi</b></th>
                                    <th width="150"><b>Status</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $no=1;
         foreach ($laporanList as $f): ?>
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                    <td><?php echo $f->nm_request ?></td>
                                     <td>
                                        <?php echo $f->nm_user ?><br>
                                        (<?php echo $f->nm_pt ?>)<br>
                                        <?php echo tgl_indo($f->tgl_request); ?>
                                      </td>
                                      <td>
                                       <?php echo 'NIP : <br>'.$f->nip ?><br>
                                       <?php echo 'Nama : <br>'.$f->nm_dosen ?><br>
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
    </div>
    <!-- end col -->
  </div>
  <!-- end row -->
                    