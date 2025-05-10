<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0"><?=$namalabel;?></h5>
    </div>
    <div class="card">
      <form class="card-body" action="<?=base_url($compid.'add_proses');?>" method="POST">
        
        <?php if ($this->session->flashdata('message')) { ?>
          <div class="alert alert-<?=$this->session->flashdata('msg_color');?>" role="alert">
          <?=$this->session->flashdata('message');?>
          </div>
        <?php } ?>

        <div class="row g-3">
          <div class="col-xl-4 col-md-4 col-sm-5 col-xs-5">
            <label class="form-label" for="multicol-country">Nama Provinsi<i class="text-danger">*</i></label>
            <select class="select2 form-select" name="idp" required>
              <?php $no=1; foreach ($d_provinsi as $row) : ?>
              <option value="<?=$row['id'];?>"><?=$row['name'];?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-xl-8 col-md-8 col-sm-7 col-xs-7">
            <label class="form-label">Nama Kab/Kota<i class="text-danger">*</i></label>
            <input type="text" class="form-control" name="nama" placeholder="..." required autocomplete="off" />
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