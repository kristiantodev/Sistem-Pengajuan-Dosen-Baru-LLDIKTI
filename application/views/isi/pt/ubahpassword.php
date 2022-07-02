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
                <h4 class="page-title mb-0 font-size-18"> <i class="fa fa-cog"></i> &nbsp;&nbsp;Ubah Password</h4>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="text-left mb-4">  
              
<p align="left">
              <?php if ($this->session->flashdata('successs')): ?>
             
                               <div class='alert bg-success alert-dismissible'>
                               <a type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                           <font color="white"><h4><i class="icon fa fa-check-square"></i> Success !!</h4>
                        <?php echo $this->session->flashdata('successs'); ?></font>  </div>
                            <?php endif; ?> 

                            <?php if ($this->session->flashdata('success')): ?>
             
                               <div class='alert bg-danger alert-dismissible'>
                               <a type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                                   <font color="white"><h4><i class="fas fa-exclamation-triangle "></i> Gagal !!</h4>
                        <?php echo $this->session->flashdata('success'); ?></font></div>
                            <?php endif; ?> 
                    
<form action="<?php base_url('adm/ubah_password') ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                          <label for="email">Password Lama</label>
                          <input type="password" name="current_password" class="form-control <?php echo form_error('current_password') ? 'is-invalid':'' ?>">
                        <font color="red"><?php echo form_error('current_password') ?></font>
                        </fieldset>
                         <fieldset class="form-group floating-label-form-group">
                          <label for="email">Password Baru</label>
                          <input type="password" name="pass_baru" class="form-control <?php echo form_error('pass_baru') ? 'is-invalid':'' ?>">
                        <font color="red"><?php echo form_error('pass_baru') ?></font>
                        </fieldset>
                         <fieldset class="form-group floating-label-form-group">
                          <label for="email">Ulangi Password Baru</label>
                          <input type="password" name="pass_baru2" class="form-control <?php echo form_error('pass_baru2') ? 'is-invalid':'' ?>">
                        <font color="red"><?php echo form_error('pass_baru2') ?></font>
                        </fieldset>
                 

     <button type="submit" class="btn btn-outline btn-success"><b><i class='fa fa-save'></i> &nbsp;&nbsp;Simpan</b>&nbsp;&nbsp;</button>&nbsp;&nbsp;

                      </form>
</p>


          </div>
        </div>
    </div>
    <!-- end col -->
  </div>
  <!-- end row -->
         