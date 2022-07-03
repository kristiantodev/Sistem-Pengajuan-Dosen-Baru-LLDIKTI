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
                       <!-- <br>
                       <a href="<?php echo base_url().'pt/request_dosen'?>" class="btn-read-more">Kembali</a> -->
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
                                    <td>

                                      <?php 
                                         $icon="";
                                            $btn="";
                                            $remark="";
                                            $isDisabled="disabled";
                                            $isDisabledRevisi="disabled";
                                    if($requestDetail->status == "New"){
                                            $icon="fas fa-clock";
                                            $btn="btn btn-warning btn-sm";
                                            $remark="Proses - Menunggu Proses Verifikasi";
                                            $isDisabled="disabled";
                                      }else if($requestDetail->status == "Revisi"){
                                            $icon="fas fa-info-circle";
                                            $btn="btn btn-warning btn-sm";
                                            $remark="Revisi - Permohonan ditolak dengan Revisi";
                                            $isDisabledRevisi="";
                                      }else if($requestDetail->status == "Request-Accept"){
                                            $icon="fas fa-check";
                                            $btn="btn btn-primary btn-sm";
                                            $remark="Accept - Segera Konfirmasi Hasil Rekomendasi";
                                            $isDisabled="";
                                      }else if($requestDetail->status == "Request-Reject"){
                                            $icon="fas fa-times";
                                            $btn="btn btn-danger btn-sm";
                                            $remark="Reject - Permohonan Dosen Ditolak";
                                            $isDisabled="disabled";
                                      }else if($requestDetail->status == "Accept"){
                                            $icon="fas fa-check";
                                            $btn="btn btn-success btn-sm";
                                            $remark="Accept - Rekomendasi Dosen Telah Disetujui";
                                            $isDisabled="disabled";
                                            $isDisabledRevisi="disabled";
                                      }else if($requestDetail->status == "Reject"){
                                            $icon="fas fa-times";
                                            $btn="btn btn-danger btn-sm";
                                            $remark="Close - Rekomendasi ditolak oleh Pemohon";
                                             $isDisabled="disabled";
                                            $isDisabledRevisi="disabled";
                                      }else if($requestDetail->status == "RevisiDone"){
                                            $icon="fas fa-info-circle";
                                            $btn="btn btn-info btn-sm";
                                            $remark="Revisi - Menunggu Konfirmasi Revisi";
                                             $isDisabled="disabled";
                                            $isDisabledRevisi="disabled";
                                      }

                                       ?>

                                      <button class="<?=$btn?>"><i class="<?=$icon?>"></i> <?=$remark?></span></button></td>
                                  </tr>

                                    <tr>
                                    <td>Dosen Rekomendasi</td>
                                    <td>:</td>
                                    <td>

                                    <?php if($requestDetail->nm_dosen != ""){ ?>
                                        <?php echo $requestDetail->nm_dosen;?>&nbsp;<a data-toggle="modal" data-target="#modal-profil"><button type="button" class="btn btn-info btn-sm waves-effect waves-light">
                                    <i class="fas fa-user"></i> &nbsp;Lihat Profil</button></a>
                                    <?php } ?>
                                  
                                  </td>
                                  </tr>

                                  <tr>
                                    <td>Catatan</td>
                                    <td>:</td>
                                    <td><?php echo $requestDetail->note;?></td>
                                  </tr>
                                 

                                </table>

                                          </div>
                      </div>


                       <br> <br>

             <p align="right">

             <a data-toggle="modal" data-target="#revisiBerkas">
                                            <button type="button" <?=$isDisabledRevisi;?> class="btn btn-info waves-effect waves-light">
                                    <i class="fas fa-upload "></i> Upload Kembali Berkas</button>
                                </a> &nbsp;

             <a onclick="deleteConfirm('<?php echo site_url('pt/request_dosen/terimaDosen/'.$requestDetail->id_request); ?>')" href="#!"><span class="icon-label" data-toggle="modal" data-target="#modal-danger"><button type="button" <?=$isDisabled;?> class="btn btn-success waves-effect waves-light">
                                    <i class="fas fa-check"></i> Terima Rekomendasi Dosen</button></a>


              <a data-toggle="modal" data-target="#tolak">
                                            <button type="button" <?=$isDisabled;?> class="btn btn-danger waves-effect waves-light">
                                    <i class="fas fa-times "></i> Tolak Rekomendasi Dosen</button>
                                </a> &nbsp;
                                

            </p>


                     

            <?php if ($requestDetail->file == "default.png") { ?>
              <center>
            <img src="<?php echo base_url('assets/images/request/'.$requestDetail->file) ?>" height="500" height="750"><br>Tidak ada file permohonan yang dilampirkan</center>
            <?php }else{ ?>
<embed src="<?php echo base_url('assets/images/request/'.$requestDetail->file) ?>" width="920px" height="750px" />
             <?php }?> 

          </div>
        </div>
    </div>
    <!-- end col -->
  </div>
  <!-- end row -->


                             <!-- Modal Revisi-->
                  <div class="modal fade text-left" id="revisiBerkas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-info">
                      <h6 class="modal-title"><font color='white'>Upload Berkas Permohonan *pdf</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('pt/request_dosen/revisiBerkas'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_request" value="<?php echo $requestDetail->id_request;?>">
                        <input type="hidden" name="id_pt" value="<?php echo $requestDetail->id_pt;?>">
                        <input type="hidden" name="old_file" value="<?php echo $requestDetail->file;?>"/>
                      <div class="modal-body">
                            <fieldset class="form-group floating-label-form-group">
                          <label for="email">Upload Berkas</label>
                          <input type="file" name="file" class="form-control">
                        </fieldset>
                      </div>
                      <div class="modal-footer">
                                <button type="submit"  class="btn btn-info">
                                    <i class="fas fa-upload "></i> Upload
                                </button>

                                 </form>
      
                        
                      </div>

                    </div>
                    </div>
                  </div>


                             <!-- Modal Revisi-->
                  <div class="modal fade text-left" id="tolak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-danger">
                      <h6 class="modal-title"><font color='white'>Apakah anda yakin untuk Mereject Permohonan ini ?</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('pt/request_dosen/tolakDosen'); ?>" method="post">
                        <input type="hidden" name="id_request" value="<?php echo $requestDetail->id_request;?>">
                        <input type="hidden" name="id_pt" value="<?php echo $requestDetail->id_pt;?>">
                      <div class="modal-body">

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Catatan</label>
                          <textarea class="form-control" name="note" id="title1" rows="5"></textarea>
                        </fieldset>

                      </div>
                      <div class="modal-footer">
                                <button type="submit"  class="btn btn-danger">
                                    <i class="fas fa-check"></i>&nbsp;Tolak Permohonan
                                </button>

                                 </form>
      
                        
                      </div>

                    </div>
                    </div>
                  </div>


                    <!-- modal -->
<div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
      <h5 class="modal-title"><font color='white'>Konfirmasi</font></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
      </div>
      <div class="modal-body">
      <p>Apakah anda yakin akan mengambil Rekomendasi dosen ini ?</p>
      </div>
      <div class="modal-footer">
      <a href="#" id="btn-delete" type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i>&nbsp;Konfirmasi</a>
      </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  <div class="modal fade text-left" id="modal-profil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h6 class="modal-title"><font color='white'>Profil Dosen - <?=$f->nm_dosen;?></font></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" readonly value="<?=$f->id_dosen;?>" name="id_dosen" class="form-control" >
      <input type="hidden" name="old_image" value="<?php echo $f->foto ?>"/>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-6">


            <div class="row">
             <div class="col-lg-6 col-md-6 col-6">
              <fieldset class="form-group floating-label-form-group">
                <label for="email">NIP</label>
                <input type="text" name="nip" disabled value="<?=$f->nip;?>" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
              </fieldset>
            </div>

            <div class="col-lg-6 col-md-6 col-6">
              <fieldset class="form-group floating-label-form-group">
                <label for="email">No Registasi Pendidik</label>
                <input type="text" name="no_registrasi" disabled value="<?=$f->no_registrasi;?>" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
              </fieldset>
            </div>
          </div>
          <br>
           <div class="row">
         <div class="col-lg-4 col-md-6 col-6">
          <center>
          <img src="<?php echo base_url('assets/images/dosen/'.$f->foto) ?>" alt="" height="75" width="70"></center>
        </div>

        <div class="col-lg-8 col-md-6 col-6">
          <fieldset class="form-group floating-label-form-group">
            <label for="email">Nama Dosen</label>
            <input type="text" name="nm_dosen" disabled value="<?=$f->nm_dosen;?>" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
          </fieldset>

        </div>
      </div>

<br>
          
          <div class="row">
           <div class="col-lg-6 col-md-6 col-6">
            <fieldset class="form-group floating-label-form-group">
              <label for="email">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" disabled value="<?=$f->tempat_lahir;?>" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
            </fieldset>
          </div>

          <div class="col-lg-6 col-md-6 col-6">
            <fieldset class="form-group floating-label-form-group">
              <label for="email">Tanggal Lahir</label>
              <input type="date" name="tgl_lahir" disabled value="<?=$f->tgl_lahir;?>" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
            </fieldset>
          </div>
        </div>


        <fieldset class="form-group floating-label-form-group">
          <label for="email">Status Dosen</label>
          <select name="status_dosen" disabled id="select" required class="custom-select">
            <?php if ($f->status_dosen == "Aktif"){ ?>
             <option value="Aktif" selected>Aktif</option>
             <option value="Tidak Aktif">Tidak Aktif</option>
           <?php }else{ ?>
             <option value="Aktif">Aktif</option>
             <option value="Tidak Aktif" selected>Tidak Aktif</option>
           <?php } ?>
         </select>
       </fieldset>
    </div>
    <div class="col-lg-6 col-md-6 col-6">

      <fieldset class="form-group floating-label-form-group">
        <label for="email">Perguruan Tinggi Asal</label>
        <select name="id_pt" disabled id="select" required class="custom-select">
          <option value="">-- Perguruan Tinggi --</option>

          <?php foreach ($ptList as $pt): ?>
            <option value="<?php echo $pt->id_pt ?>"

              <?php
              if ($f->id_pt == $pt->id_pt){
                echo "selected";
              }else{
                echo "";
              }
              ?>

              ><?php echo $pt->nm_pt ?></option>
            <?php endforeach; ?>
          </select>
        </fieldset>


        <div class="row">
         <div class="col-lg-6 col-md-6 col-6">
          <fieldset class="form-group floating-label-form-group">
            <label for="email">Specialist</label>
            <select name="id_prodi" disabled id="select" required class="custom-select">
              <option value="">-- Pilih Prodi --</option>

              <?php foreach ($prodiList as $pr): ?>
                <option value="<?php echo $pr->id_prodi ?>"

                 <?php
                 if ($f->id_prodi == $pr->id_prodi){
                  echo "selected";
                }else{
                  echo "";
                }
                ?>

                ><?php echo $pr->jenjang ?>-<?php echo $pr->nm_prodi ?></option>
              <?php endforeach; ?>
            </select>
          </fieldset>
        </div>

        <div class="col-lg-6 col-md-6 col-6">
          <fieldset class="form-group floating-label-form-group">
            <label for="email">Jabatan</label>
            <select name="jabatan" disabled id="select" required class="custom-select">
              <option value="">-- Pilih Jabatan --</option>

              <?php foreach ($jabatanList as $p): ?>
                <option value="<?php echo $p->nm_jabatan ?>"

                  <?php
                  if ($f->jabatan == $p->nm_jabatan){
                    echo "selected";
                  }else{
                    echo "";
                  }
                  ?>

                  ><?php echo $p->nm_jabatan ?></option>
                <?php endforeach; ?>
              </select>
            </fieldset>

          </div>
        </div>

        <div class="row">
         <div class="col-lg-6 col-md-6 col-6">
          <fieldset class="form-group floating-label-form-group">
            <label for="email">Pendidikan Terakhir</label>
            <input type="text" name="last_edu" disabled value="<?=$f->last_edu;?>" class="form-control">
          </fieldset>
        </div>

        <div class="col-lg-6 col-md-6 col-6">
          <fieldset class="form-group floating-label-form-group">
            <label for="email">Tahun Lulus</label>
            <input type="text" name="tahun_lulus" disabled value="<?=$f->tahun_lulus;?>" class="form-control">
          </fieldset>
        </div>
      </div>

      <div class="row">
       <div class="col-lg-6 col-md-6 col-6">
        <fieldset class="form-group floating-label-form-group">
          <label for="email">Tanggal Tmp Dosen</label>
          <input type="date" name="tmp_dosen" disabled value="<?=$f->tmp_dosen;?>" class="form-control">
        </fieldset>
      </div>

      <div class="col-lg-6 col-md-6 col-6">
        <fieldset class="form-group floating-label-form-group">
          <label for="email">Angka Kredit</label>
          <input type="number" name="angka_kredit" disabled value="<?=$f->angka_kredit;?>" class="form-control">
        </fieldset>
      </div>
    </div>

    <fieldset class="form-group floating-label-form-group">
      <label for="email">Jenis Ikatan</label>
      <select name="jenis_ikatan" disabled id="select" class="custom-select">
        <option value="">-- Pilih Jenis Ikatan--</option>

        <?php foreach ($ikatanList as $k): ?>
          <option value="<?php echo $k->nm_ikatan ?>"
            <?php
            if ($f->jenis_ikatan == $p->nm_ikatan){
              echo "selected";
            }else{
              echo "";
            }
            ?>
            ><?php echo $k->nm_ikatan ?></option>
          <?php endforeach; ?>
        </select>
      </fieldset>

    </div>
  </div>

</div>

</div>
</div>
</div>
  

  <script>
function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}
</script>
         