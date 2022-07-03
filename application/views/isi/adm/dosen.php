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
          <h4 class="page-title mb-0 font-size-18"> <i class="mdi mdi-inbox-full"></i> &nbsp;&nbsp;Data Dosen</h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="text-right mb-4">  
              <a data-toggle="modal" data-target="#bb">
                <button type="button" class="btn btn-info btn-sm">
                  <i class="fa fa-user-plus"></i> Tambah Dosen</button>
                </a>
              </div>
              <?= $this->session->flashdata('message');?>
              <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead bgcolor="">
                  <tr>
                    <th width="9"><b>No</b></th>
                    <th><b>NIP</b></th>
                    <th><b>Nama Dosen</b></th>
                    <th><b>Specialist</b></th>
                    <th width="125"><b>Aksi</b></th>
                  </tr>
                </thead>


                <tbody>
                 <?php $no=1;
                 foreach ($dosenList as $f): ?>
                  <tr>
                    <td width="7" align="center"><?php echo $no++; ?></td>
                    <td><?php echo $f->nip ?></td>
                    <td>&nbsp;<img src="<?php echo base_url('assets/images/dosen/'.$f->foto) ?>" alt="" height="75" width="70">&nbsp;&nbsp;<?php echo $f->nm_dosen ?></td>
                    <td><?php echo $f->jenjang ?> - <?php echo $f->nm_prodi ?> </td>
                    <td>
                     <a data-toggle="modal" data-target="#modal-edit<?php echo $f->id_dosen ?>" class="btn btn-primary btn-sm"><span data-toggle="tooltip" data-original-title="Ubah"><font color="white"><i class="fas fa-pencil-alt"></i></font></span></a>


                     <a onclick="deleteConfirm('<?php echo site_url('adm/dosen/hapus/'.$f->id_dosen); ?>')" href="#!" data-toggle="tooltip" class="btn btn-danger waves-effect btn-sm waves-light tombol-hapus" data-original-title="Hapus"><span class="icon-label" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-trash"></i> </span><span class="btn-text"></span></a>
                   </a>

                   <a data-toggle="modal" data-target="#modal-profil<?php echo $f->id_dosen ?>" class="btn btn-success btn-sm"><span data-toggle="tooltip" data-original-title="Detail Dosen"><font color="white"><i class="fas fa-user"></i></font></span></a>

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
        <h6 class="modal-title"><font color='white'>Form Tambah Dosen</font></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo site_url('adm/dosen/add'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="row">
            <div class="col-lg-6 col-md-6 col-6">


              <div class="row">
               <div class="col-lg-6 col-md-6 col-6">
                <fieldset class="form-group floating-label-form-group">
                  <label for="email">NIP</label>
                  <input type="text" name="nip" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                </fieldset>
              </div>

              <div class="col-lg-6 col-md-6 col-6">
                <fieldset class="form-group floating-label-form-group">
                  <label for="email">No Registasi Pendidik</label>
                  <input type="text" name="no_registrasi" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                </fieldset>
              </div>
            </div>

            <fieldset class="form-group floating-label-form-group">
              <label for="email">Nama Dosen</label>
              <input type="text" name="nm_dosen" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
            </fieldset>

            <div class="row">
             <div class="col-lg-6 col-md-6 col-6">
              <fieldset class="form-group floating-label-form-group">
                <label for="email">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
              </fieldset>
            </div>

            <div class="col-lg-6 col-md-6 col-6">
              <fieldset class="form-group floating-label-form-group">
                <label for="email">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
              </fieldset>
            </div>
          </div>


          <fieldset class="form-group floating-label-form-group">
            <label for="email">Status Dosen</label>
            <select name="status_dosen" id="select" required class="custom-select">
              <option value="Aktif">Aktif</option>
              <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
          </fieldset>

          <fieldset class="form-group floating-label-form-group">
            <label for="email">Foto</label><br>
            <input type="file" name="foto">
          </fieldset>
        </div>



        <div class="col-lg-6 col-md-6 col-6">

          <fieldset class="form-group floating-label-form-group">
            <label for="email">Perguruan Tinggi Asal</label>
            <select name="id_pt" id="select" required class="custom-select">
              <option value="">-- Perguruan Tinggi --</option>

              <?php foreach ($ptList as $pt): ?>
                <option value="<?php echo $pt->id_pt ?>"><?php echo $pt->nm_pt ?></option>
              <?php endforeach; ?>
            </select>
          </fieldset>


          <div class="row">
           <div class="col-lg-6 col-md-6 col-6">
            <fieldset class="form-group floating-label-form-group">
              <label for="email">Specialist</label>
              <select name="id_prodi" id="select" required class="custom-select">
                <option value="">-- Pilih Prodi --</option>

                <?php foreach ($prodiList as $pr): ?>
                  <option value="<?php echo $pr->id_prodi ?>"><?php echo $pr->jenjang ?>-<?php echo $pr->nm_prodi ?></option>
                <?php endforeach; ?>
              </select>
            </fieldset>
          </div>

          <div class="col-lg-6 col-md-6 col-6">
            <fieldset class="form-group floating-label-form-group">
              <label for="email">Jabatan</label>
              <select name="jabatan" id="select" required class="custom-select">
                <option value="">-- Pilih Jabatan --</option>

                <?php foreach ($jabatanList as $p): ?>
                  <option value="<?php echo $p->nm_jabatan ?>"><?php echo $p->nm_jabatan ?></option>
                <?php endforeach; ?>
              </select>
            </fieldset>

          </div>
        </div>

        <div class="row">
         <div class="col-lg-6 col-md-6 col-6">
          <fieldset class="form-group floating-label-form-group">
            <label for="email">Pendidikan Terakhir</label>
            <input type="text" name="last_edu" class="form-control">
          </fieldset>
        </div>

        <div class="col-lg-6 col-md-6 col-6">
          <fieldset class="form-group floating-label-form-group">
            <label for="email">Tahun Lulus</label>
            <input type="text" name="tahun_lulus" class="form-control">
          </fieldset>
        </div>
      </div>

      <div class="row">
       <div class="col-lg-6 col-md-6 col-6">
        <fieldset class="form-group floating-label-form-group">
          <label for="email">Tanggal Tmp Dosen</label>
          <input type="date" name="tmp_dosen" class="form-control">
        </fieldset>
      </div>

      <div class="col-lg-6 col-md-6 col-6">
        <fieldset class="form-group floating-label-form-group">
          <label for="email">Angka Kredit</label>
          <input type="number" name="angka_kredit" class="form-control">
        </fieldset>
      </div>
    </div>

    <fieldset class="form-group floating-label-form-group">
      <label for="email">Jenis Ikatan</label>
      <select name="jenis_ikatan" id="select" class="custom-select">
        <option value="">-- Pilih Jenis Ikatan--</option>

        <?php foreach ($ikatanList as $k): ?>
          <option value="<?php echo $k->nm_ikatan ?>"><?php echo $k->nm_ikatan ?></option>
        <?php endforeach; ?>
      </select>
    </fieldset>

  </div>
</div>


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



<!-- Modal -->
<?php $no=0; foreach ($dosenList as $f): ?>
<div class="modal fade text-left" id="modal-edit<?php echo $f->id_dosen ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h6 class="modal-title"><font color='white'>Edit Data Dosen</font></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo site_url('adm/dosen/edit'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" readonly value="<?=$f->id_dosen;?>" name="id_dosen" class="form-control" >
        <input type="hidden" name="old_image" value="<?php echo $f->foto ?>"/>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-6">


              <div class="row">
               <div class="col-lg-6 col-md-6 col-6">
                <fieldset class="form-group floating-label-form-group">
                  <label for="email">NIP</label>
                  <input type="text" name="nip" value="<?=$f->nip;?>" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                </fieldset>
              </div>

              <div class="col-lg-6 col-md-6 col-6">
                <fieldset class="form-group floating-label-form-group">
                  <label for="email">No Registasi Pendidik</label>
                  <input type="text" name="no_registrasi" value="<?=$f->no_registrasi;?>" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                </fieldset>
              </div>
            </div>

            <fieldset class="form-group floating-label-form-group">
              <label for="email">Nama Dosen</label>
              <input type="text" name="nm_dosen" value="<?=$f->nm_dosen;?>" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
            </fieldset>

            <div class="row">
             <div class="col-lg-6 col-md-6 col-6">
              <fieldset class="form-group floating-label-form-group">
                <label for="email">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="<?=$f->tempat_lahir;?>" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
              </fieldset>
            </div>

            <div class="col-lg-6 col-md-6 col-6">
              <fieldset class="form-group floating-label-form-group">
                <label for="email">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" value="<?=$f->tgl_lahir;?>" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
              </fieldset>
            </div>
          </div>


          <fieldset class="form-group floating-label-form-group">
            <label for="email">Status Dosen</label>
            <select name="status_dosen" id="select" required class="custom-select">
              <?php if ($f->status_dosen == "Aktif"){ ?>
               <option value="Aktif" selected>Aktif</option>
               <option value="Tidak Aktif">Tidak Aktif</option>
             <?php }else{ ?>
               <option value="Aktif">Aktif</option>
               <option value="Tidak Aktif" selected>Tidak Aktif</option>
             <?php } ?>
           </select>
         </fieldset>

         <div class="row">
           <div class="col-lg-8 col-md-6 col-6">
            <fieldset class="form-group floating-label-form-group">
              <label for="email">Foto</label><br>
              <input type="file" name="foto">
            </fieldset>
          </div>

          <div class="col-lg-4 col-md-6 col-6">
            <img src="<?php echo base_url('assets/images/dosen/'.$f->foto) ?>" alt="" height="75" width="70">
          </div>
        </div>



      </div>



      <div class="col-lg-6 col-md-6 col-6">

        <fieldset class="form-group floating-label-form-group">
          <label for="email">Perguruan Tinggi Asal</label>
          <select name="id_pt" id="select" required class="custom-select">
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
              <select name="id_prodi" id="select" required class="custom-select">
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
              <select name="jabatan" id="select" required class="custom-select">
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
              <input type="text" name="last_edu" value="<?=$f->last_edu;?>" class="form-control">
            </fieldset>
          </div>

          <div class="col-lg-6 col-md-6 col-6">
            <fieldset class="form-group floating-label-form-group">
              <label for="email">Tahun Lulus</label>
              <input type="text" name="tahun_lulus" value="<?=$f->tahun_lulus;?>" class="form-control">
            </fieldset>
          </div>
        </div>

        <div class="row">
         <div class="col-lg-6 col-md-6 col-6">
          <fieldset class="form-group floating-label-form-group">
            <label for="email">Tanggal Tmp Dosen</label>
            <input type="date" name="tmp_dosen" value="<?=$f->tmp_dosen;?>" class="form-control">
          </fieldset>
        </div>

        <div class="col-lg-6 col-md-6 col-6">
          <fieldset class="form-group floating-label-form-group">
            <label for="email">Angka Kredit</label>
            <input type="number" name="angka_kredit" value="<?=$f->angka_kredit;?>" class="form-control">
          </fieldset>
        </div>
      </div>

      <fieldset class="form-group floating-label-form-group">
        <label for="email">Jenis Ikatan</label>
        <select name="jenis_ikatan" id="select" class="custom-select">
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
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary btn-sm"  data-dismiss="modal" value="close">
      <i class="fas fa-times"></i>&nbsp;Keluar
    </button>
    <button type="submit"  class="btn btn-primary btn-sm">
      <i class="fa fa-save"></i>&nbsp;Save
    </button>

  </div>
</form>
</div>
</div>
</div>
<?php endforeach; ?>       


<?php $no=0; foreach ($dosenList as $f): ?>
<div class="modal fade text-left" id="modal-profil<?php echo $f->id_dosen ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
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
<?php endforeach; ?>



<!-- modal -->
<div class="modal modal-danger fade" id="modal-danger">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title"><font color='white'>Konfirmasi Penghapusan</font></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin akan menghapus data ini ?</p>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><font color='white'><i class="fas fa-times"></i>&nbsp;Batal</font></a>
        <a href="#" id="btn-delete" type="button" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>&nbsp;Hapus</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<script>
  function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
</script>