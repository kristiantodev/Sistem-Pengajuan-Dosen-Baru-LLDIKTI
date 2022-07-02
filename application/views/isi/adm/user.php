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
                <h4 class="page-title mb-0 font-size-18"> <i class="fa fa-cogs"></i> &nbsp;&nbsp;Data Pengguna</h4>
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
                                    <i class="fa fa-user-plus"></i> Tambah Admin</button>
                                </a>

                                <a data-toggle="modal" data-target="#bb2">
                                            <button type="button" class="btn btn-info btn-sm">
                                    <i class="fa fa-user-plus"></i> Tambah Admin Kampus</button>
                                </a>
            </div>
            <?= $this->session->flashdata('message');?>
            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead bgcolor="">
                                                <tr>
                                    <th width="9"><b>No</b></th>
                                    <th><b>Foto</b></th>
                                    <th><b>Nama Pengguna</b></th>
                                    <th><b>Username</b></th>
                                    <th><b>Level</b></th>
                                    <th width="150"><b>Aksi</b></th>
                                </tr>
                                                </thead>
    
    
                                                <tbody>
                                             <?php $no=1;
         foreach ($userku as $user): ?>
                                <tr>
                                    <td width="7" align="center"><?php echo $no++; ?></td>
                                    <td align="center"><img src="<?php echo base_url('assets/images/users/'.$user->foto) ?>" alt="" height="55"></td>
                                    <td>
                                      <?php echo $user->nm_user ?>
                                       
                                        <?php if($user->level == "Perguruan Tinggi"){ ?>
                                              <br>(<?php echo $user->nm_pt ?>)
                                        <?php } ?>
                                      </td>
                                    <td><?php echo $user->username ?></td>
                                     <td><?php echo $user->level ?></td>
                                    <td>

               <?php if($this->session->userdata('username') != $user->username){ ?>
                  <a onclick="deleteConfirm('<?php echo site_url('adm/user/hapus/'.$user->id_user); ?>')" href="#!" data-toggle="tooltip" class="btn btn-danger btn-sm waves-effect waves-light tombol-hapus" data-original-title="Hapus"><span class="icon-label" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-trash"></i> </span><span class="btn-text"></span></a>
                                        </a>
                                      <?php }else{
                                        echo "Anda Sedang Login";
                                      } ?>


                                      <?php if($user->level == "Perguruan Tinggi"){ ?>
                                               <a data-toggle="modal" data-target="#modal-edit<?php echo $user->id_user ?>" class="btn btn-primary btn-sm waves-effect waves-light"><span data-toggle="tooltip" data-original-title="Ubah"><font color="white"><i class="fas fa-pencil-alt"></i></font></span></a>
                                        <?php } ?>


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
                      <h6 class="modal-title"><font color='white'><i class="fa fa-user-plus"></i>  Form Tambah Pengguna Sistem</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/user/add'); ?>" method="post">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Nama Pengguna</label>
                          <input type="text" name="nm_user" class="form-control  round <?php echo form_error('nm_user') ? 'is-invalid':'' ?>" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                       <font color="red"><?php echo form_error('nm_user') ?></font>
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Username</label>
                          <input type="text" name="username" class="form-control  round" >
                
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Password</label>
                          <input type="password" name="password" class="form-control  round">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Level</label>
                          <select name="level" id="select" required class="custom-select" readonly>
                                          
                                    <option value="Administrator" readonly>Administrator</option>
                                           </select>
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
                  <div class="modal fade text-left" id="bb2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary">
                      <h6 class="modal-title"><font color='white'><i class="fa fa-user-plus"></i>  Form Tambah Pengguna Sistem</font></h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form action="<?php echo site_url('adm/user/add'); ?>" method="post">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Nama Pengguna</label>
                          <input type="text" name="nm_user" class="form-control  round <?php echo form_error('nm_user') ? 'is-invalid':'' ?>" required oninvalid="this.setCustomValidity('Harap Diisi...')" oninput="setCustomValidity('')">
                       <font color="red"><?php echo form_error('nm_user') ?></font>
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Username</label>
                          <input type="text" name="username" class="form-control  round" >
                
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Password</label>
                          <input type="password" name="password" class="form-control  round">
                        </fieldset>

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Level</label>
                          <select name="level" id="select" required class="custom-select" readonly>
                                    <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                                           </select>
                        </fieldset>  

                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Pilih Perguruan Tinggi</label>
                          <select name="id_pt" id="select" required class="custom-select">
                  <?php foreach ($ptku as $k): ?>
                  <option value="<?php echo $k->id_pt ?>"><?php echo $k->nm_pt ?></option>
                  <?php endforeach; ?>
                </select>
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