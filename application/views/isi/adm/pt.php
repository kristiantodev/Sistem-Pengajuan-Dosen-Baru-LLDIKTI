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
                <h4 class="page-title mb-0 font-size-18"> <i class="mdi mdi-inbox-full"></i> &nbsp;&nbsp;Data Perguruan Tinggi</h4>
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
                                    <i class="fa fa-plus"></i> Tambah Perguruan Tinggi</button>
                                </a>
            </div>
            <?= $this->session->flashdata('message');?>
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead bgcolor="">
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Kode</b></th>
                                    <th><b>Nama PT</b></th>
                                    <th><b>Jenis PT</b></th>
                                    <th><b>Status</b></th>
                                    <th><b>Lokasi</b></th>

                                    <th width="150"><b>Aksi</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $no=1;
         foreach ($ptku as $f): ?>
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                    <td><?php echo $f->kode_pt ?></td>
                                    <td><?php echo $f->nm_pt ?></td>
                                    <td><?php echo $f->jenis_pt ?></td>
                                    <td><?php echo $f->status_pt ?></td>
                                    <td><?php echo $f->lokasi ?></td>
                                    <td>
 <a data-toggle="modal" data-target="#modal-edit<?php echo $f->id_pt ?>" class="btn btn-primary waves-effect waves-light btn-sm"><span data-toggle="tooltip" data-original-title="Ubah"><font color="white"><i class="fas fa-pencil-alt"></i></font></span></a>
                 
              
                  <a onclick="deleteConfirm('<?php echo site_url('adm/pt/hapus/'.$f->id_pt); ?>')" href="#!" data-toggle="tooltip" class="btn btn-danger btn-sm waves-effect waves-light tombol-hapus" data-original-title="Hapus"><span class="icon-label" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-trash"></i> </span><span class="btn-text"></span></a>
                                        </a>
                                      
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
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'><i class="fa fa-plus"></i>  Form Tambah Perguruan Tinggi</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/pt/add'); ?>" method="post">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Kode PT</label>
                          <input type="text" name="kode_pt" class="form-control" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Nama Perguruan Tinggi</label>
                          <input type="text" name="nm_pt" class="form-control  round" >             
                        </fieldset> 

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Jenis Perguruan Tinggi</label>
                          <select name="jenis_pt" id="select" required class="custom-select">
                  <?php foreach ($jenisPT as $k): ?>
                  <option value="<?php echo $k->nm_jenis ?>"><?php echo $k->nm_jenis ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Status Perguruan Tinggi</label>
                          <select name="status_pt" id="select" required class="custom-select">
                                <option value="Aktif">Aktif</option>
                                 <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Lokasi</label>
                          <textarea class="form-control" name="lokasi" id="title1" rows="3"></textarea>
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



                  <!-- Modal -->
 <?php $no=0; foreach ($ptku as $f): ?>
                  <div class="modal fade text-left" id="modal-edit<?php echo $f->id_pt ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'>Edit Data Perguruan Tinggi</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/pt/edit'); ?>" method="post">
                      <input type="hidden" readonly value="<?=$f->id_pt;?>" name="id_pt" class="form-control" >
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Kode PT</label>
                          <input type="text" value="<?php echo $f->kode_pt ?>" required name="kode_pt" class="form-control" id="email">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Perguruan Tinggi</label>
                          <input type="text" value="<?php echo $f->nm_pt ?>" required name="nm_pt" class="form-control" id="email">
                        </fieldset> 

                      <fieldset class="form-group floating-label-form-group">
                          <label for="email">Jenis PT</label>
                          <select name="jenis_pt" id="select" required class="custom-select">
            
                  <?php foreach ($jenisPT as $k): ?>
                  <option value="<?php echo $k->nm_jenis ?>"

                             <?php
                              if ($k->nm_jenis == $f->jenis_pt){
                              echo "selected";
                                    }else{
                              echo "";
                              }
                              ?>

                  >
                  <?php echo $k->nm_jenis ?></option>
                  <?php endforeach; ?>
                </select>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Status Perguruan Tinggi</label>
                          <select name="status_pt" id="select" required class="custom-select">

                                 <?php if ($f->status_pt == "Aktif"){ ?>
                                 <option value="Aktif" selected>Aktif</option>
                                 <option value="Tidak Aktif">Tidak Aktif</option>
                                 <?php }else{ ?>
                                 <option value="Aktif">Aktif</option>
                                 <option value="Tidak Aktif" selected>Tidak Aktif</option>
                                  <?php } ?>
                          </select>
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Lokasi</label>
                          <textarea class="form-control" name="lokasi" id="title1" rows="3"><?php echo $f->lokasi ?></textarea>
                        </fieldset>
      
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