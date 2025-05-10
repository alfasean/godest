<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0"><?=$namalabel;?></h5>
    </div>
    <div class="card">
      <form class="card-body" action="<?=base_url('admin/faq/add_proses');?>" method="POST">
        
        <?php if ($this->session->flashdata('message')) { ?>
          <div class="alert alert-<?=$this->session->flashdata('msg_color');?>" role="alert">
          <?=$this->session->flashdata('message');?>
          </div>
        <?php } ?>

        <div class="row g-3">
          <div class="col-xl-12 col-md-12 col-sm-12">
            <label class="form-label">Pertanyaan<i class="text-danger">*</i></label>
            <input type="text" class="form-control" name="nama" placeholder="..." required autocomplete="off" />
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12">
            <label class="form-label">Jawaban<i class="text-danger">*</i></label>
            <textarea name="deskripsi" class="form-control" required></textarea>
          </div>
        </div>
        <div class="pt-5 text-end">
          <a href="javascript:window.history.back();" class="btn btn-light me-sm-3 me-1">Batal</a>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- / Content -->