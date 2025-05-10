<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0"><?=$namalabel;?></h5>
    </div>
    <div class="card">
      <form class="card-body" action="<?=base_url($compid.'edit_proses/');?>" method="POST" enctype="multipart/form-data">

        <?php if ($this->session->flashdata('message')) { ?>
          <div class="alert alert-<?=$this->session->flashdata('msg_color');?>" role="alert">
          <?=$this->session->flashdata('message');?>
          </div>
        <?php } ?>

        <div class="row g-3">

          <div class="col-xl-12 col-lg-12 col-md-12">
            <h5 class="mb-0">SEO (Search engine optimization)</h5>
          </div>

          <div class="col-xl-12 col-lg-12">
            <label class="form-label">Meta Title<i class="text-danger">*</i></label>
            <input type="text" name="meta_title" class="form-control" required="" value="<?=$sistem['meta_title'];?>">
          </div>
          <div class="col-xl-12 col-lg-12">
            <label class="form-label">Meta Deskripsi<i class="text-danger">*</i></label>
            <textarea name="meta_description" class="form-control" rows="2" required=""><?=$sistem['meta_description'];?></textarea>
          </div>
          <div class="col-xl-12 col-lg-12">
            <label class="form-label">Meta Keyword<i class="text-danger">*</i></label>
            <textarea name="meta_keywords" class="form-control" rows="2" required=""><?=$sistem['meta_keywords'];?></textarea>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 mt-4">
            <h5 class="mb-0">Pengaturan Header</h5>
          </div>

          <div class="col-xl-12 col-lg-12">
            <label class="form-label">Label Header (35 karakter)<i class="text-danger">*</i></label>
            <input type="text" name="header_lg" class="form-control" maxlength="35" required="" value="<?=$sistem['header_lg'];?>">
          </div>

          <div class="col-xl-12 col-lg-12">
            <label class="form-label">Sub Header (100 karakter)<i class="text-danger">*</i></label>
            <input type="text" name="header_sm" class="form-control" maxlength="100" required="" value="<?=$sistem['header_sm'];?>">
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 mt-4">
            <h5 class="mb-0">Label Informasi</h5>
          </div>

          <div class="col-xl-12 col-lg-12">
            <input type="text" name="m_1" class="form-control" required="" value="<?=$sistem['m_1'];?>">
          </div>

          <div class="col-xl-12 col-lg-12">
            <input type="text" name="m_2" class="form-control" required="" value="<?=$sistem['m_2'];?>">
          </div>

          <div class="col-xl-12 col-lg-12">
            <input type="text" name="m_3" class="form-control" required="" value="<?=$sistem['m_3'];?>">
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 mt-4">
            <h5 class="mb-0">Kontak</h5>
          </div>

          <div class="col-xl-12 col-lg-12">
            <label class="form-label">Phone</label>
            <input type="text" name="cs_phone" class="form-control" value="<?=$sistem['cs_phone'];?>">
          </div>

          <div class="col-xl-12 col-lg-12">
            <label class="form-label">Email</label>
            <input type="text" name="cs_email" class="form-control" value="<?=$sistem['cs_email'];?>">
          </div>

          <div class="col-xl-12 col-lg-12">
            <label class="form-label">Alamat / Label Informasi</label>
            <textarea type="text" name="alamat" class="form-control" rows="3"><?=$sistem['alamat'];?></textarea>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 mt-4">
            <h5 class="mb-0">Tentang Kami</h5>
          </div>

          <div class="col-xl-12 col-md-12 editoronly">
            <label class="form-label">Tentang Kami</label>
            <textarea class="form-control" name="about"><?=$sistem['about'];?></textarea>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 mt-4">
            <h5 class="mb-0">Footer</h5>
          </div>

          <div class="col-xl-12 col-lg-12">
            <label class="form-label">Footer Text<i class="text-danger">*</i></label>
            <textarea name="footer_text" class="form-control" rows="2" required=""><?=$sistem['footer_text'];?></textarea>
          </div>

          <div class="col-xl-12 col-lg-12">
            <label class="form-label">Footer Copyright<i class="text-danger">*</i></label>
            <input type="text" name="footer_copyright" class="form-control" required="" value="<?=$sistem['footer_copyright'];?>">
          </div>

        </div>
        <div class="pt-5 text-end">
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- / Content -->