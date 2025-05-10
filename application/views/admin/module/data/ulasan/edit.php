<style>
  .rating-ulasan {
  display: flex;
  flex-direction: row-reverse;
  justify-content: flex-start;
  }

  .rating-ulasan input {
  display: none;
  }

  .rating-ulasan label {
  font-size: 24px;
  color: #ccc;
  cursor: pointer;
  padding: 0 3px;
  transition: color 0.2s;
  }

  .rating-ulasan input:checked ~ label,
  .rating-ulasan label:hover,
  .rating-ulasan label:hover ~ label {
  color: #FFD700; /* warna emas */
  }
</style>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0"><?=$namalabel;?></h5>
    </div>
    <div class="card">
      <form class="card-body" action="<?=base_url($compid.'edit_proses/'.$edit['ulasan_id']);?>" method="POST" enctype="multipart/form-data">
        
        <?php if ($this->session->flashdata('message')) { ?>
          <div class="alert alert-<?=$this->session->flashdata('msg_color');?>" role="alert">
          <?=$this->session->flashdata('message');?>
          </div>
        <?php } ?>
        <div class="row g-3">
          <div class="col-xl-12 col-md-12 col-sm-12">
            <label class="form-label">Nama Lengkap<i class="text-danger">*</i></label>
            <input type="text" class="form-control" name="nama" value="<?=$edit['nama_lengkap'];?>" placeholder="..." required autocomplete="off" />
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12">
            <label class="form-label">Ulasan<i class="text-danger">*</i></label>
            <textarea name="ulasan" class="form-control" required><?=$edit['ulasan_text'];?></textarea>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="form-group mb-0">
              <div class="rating-ulasan float-start">
                  <?php for($i=5; $i>=1; $i--): ?>
                      <input type="radio" id="star<?=$i?>" name="rating" value="<?=$i?>" <?= ($edit['rating'] == $i) ? 'checked' : '' ?>>
                      <label for="star<?=$i?>">&#9733;</label>
                  <?php endfor; ?>
              </div>
            </div>
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