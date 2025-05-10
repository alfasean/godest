<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0"><?=$namalabel;?></h5>
    </div>
    <div class="card">
      <form class="card-body" action="<?=base_url($compid.'edit_proses');?>" method="POST" enctype="multipart/form-data">

        <?php if ($this->session->flashdata('message')) { ?>
          <div class="alert alert-<?=$this->session->flashdata('msg_color');?>" role="alert">
          <?=$this->session->flashdata('message');?>
          </div>
        <?php } ?>

        <div class="row g-3">
          <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
            <label class="form-label">Nama Lengkap<i class="text-danger">*</i></label>
            <input type="text" class="form-control" name="nama" value="<?=$auth['nama_lengkap'];?>" placeholder="..." required />
          </div>
          <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6 mb-2">
            <label class="form-label">Email<i class="text-danger">*</i></label>
            <input type="text" class="form-control" name="email" value="<?=$auth['email_address'];?>" placeholder="..." required />
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <label class="form-label">Password</label>
            <div class="input-group input-group-merge">
              <input type="password" id="idpassword" class="form-control" name="password" placeholder="***************" />
              <span class="input-group-text cursor-pointer" onclick="showPassword('idpassword')"><i class="ti ti-eye-off" id="matanyagantilgn"></i></span>
            </div>
            <div class="mt-2 small">Kosongkan jika password tidak diubah.</div>
          </div>
        </div>
        <hr class="my-4 mx-n4" />
        <div class="pt-5 text-end">
          <a href="javascript:window.history.back();" class="btn btn-light me-sm-3 me-1">Batal</a>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- / Content -->