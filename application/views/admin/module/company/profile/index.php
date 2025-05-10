<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 order-1 order-md-0">
      <!-- User Card -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="user-avatar-section">
            <div class="d-flex align-items-center flex-column">
              <img
                class="img-fluid rounded mb-3 pt-1"
                src="<?=base_url('assets/temp/assets/img/avatars/1.png');?>"
                height="100"
                width="100"
                alt="Logo Company" />
              <div class="user-info text-center">
                <h4 class="mb-2"><?=$auth['nama_lengkap'];?></h4>
                <span class="badge bg-label-secondary mt-1"><?=$auth['email_address'];?></span>
              </div>
              <?php if ($this->session->flashdata('message')) { ?>
                <div class="alert alert-<?=$this->session->flashdata('msg_color');?> mt-3" role="alert">
                <?=$this->session->flashdata('message');?>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="pb-4 border-bottom"></div>
          <p class="mt-4 small text-uppercase text-muted">Details</p>
          <div class="info-container">
            <ul class="list-unstyled">
              <li class="mb-2">
                <div class="fw-semibold me-1">Nama Lengkap</div>
                <span><?=$auth['nama_lengkap'];?></span>
              </li>
              <li class="mb-2 pt-1">
                <div class="fw-semibold me-1">Alamat Email</div>
                <span><?=$auth['email_address'];?></span>
              </li>
            </ul>
          </div>
            <div class="d-flex justify-content-center">
              <a href="<?=base_url($compid.'edit');?>" class="btn btn-primary">Edit Data</a>
            </div>
        </div>
      </div>
      <!-- /User Card -->
    </div>
    <!-- / Content -->
  </div>
</div>