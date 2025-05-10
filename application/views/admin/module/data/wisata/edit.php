<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0"><?=$namalabel;?></h5>
    </div>
    <div class="card">
      <form class="card-body" action="<?=base_url($compid.'edit_proses/'.$edit['wisata_id']);?>" method="POST" enctype="multipart/form-data">
        
        <?php if ($this->session->flashdata('message')) { ?>
          <div class="alert alert-<?=$this->session->flashdata('msg_color');?>" role="alert">
          <?=$this->session->flashdata('message');?>
          </div>
        <?php } ?>

        <div class="row g-3">
          <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6">
            <label class="form-label" for="multicol-country">Provinsi<i class="text-danger">*</i></label>
            <select class="select2 form-select" name="provinsi" required onChange="getSubcategory(this.value)">
              <option value="">-- Choose --</option>
              <?php foreach ($provinsi as $prov) : ?>
              <option value="<?=$prov['id'];?>" <?php if ($edit['province_id']==$prov['id']) echo 'selected'; ?>><?=$prov['name'];?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-xl-6 col-md-6 col-sm-6 col-xs-6">
            <label class="form-label" for="multicol-country">Kab/Kota<i class="text-danger">*</i></label>
            <select class="select2 form-select" name="kabkota" id="kabkota" required>
              <option value="">-- Choose --</option>
            </select>
          </div>
          <div class="col-xl-8 col-md-8 col-sm-7 col-xs-7">
            <label class="form-label">Nama Wisata<i class="text-danger">*</i></label>
            <input type="text" class="form-control" name="nama" value="<?=$edit['nama_wisata'];?>" placeholder="..." required autocomplete="off" />
          </div>
          <div class="col-xl-4 col-md-4 col-sm-5 col-xs-5">
            <label class="form-label" for="multicol-country">Status<i class="text-danger">*</i></label>
            <select class="select2 form-select" name="status" required>
              <option value="y" <?php if ($edit['is_status']=='y') echo 'selected'; ?>>Aktif</option>
              <option value="n" <?php if ($edit['is_status']=='n') echo 'selected'; ?>>Tidak Aktif</option>
            </select>
          </div>
          <div class="col-xl-6 col-md-6 col-sm-6">
            <label class="form-label">Url Situs Resmi (opsional)</label>
            <input type="text" class="form-control" name="url_situs" value="<?=$edit['situs_resmi'];?>" placeholder="..." autocomplete="off" />
          </div>
          <div class="col-xl-6 col-md-6 col-sm-6">
            <label class="form-label">Nomor Telepon Resmi (opsional)</label>
            <input type="text" class="form-control" name="no_telp" value="<?=$edit['nomor_resmi'];?>" placeholder="..." autocomplete="off" />
          </div>
          <div class="col-xl-6 col-md-6 col-sm-6">
            <label class="form-label">Harga Tiket Weekday (opsional)</label>
            <input type="text" class="form-control" name="harga1" value="<?=$edit['harga_wisata_weekday'];?>" placeholder="..." autocomplete="off" />
          </div>
          <div class="col-xl-6 col-md-6 col-sm-6">
            <label class="form-label">Harga Tiket Weekend (opsional)</label>
            <input type="text" class="form-control" name="harga2" value="<?=$edit['harga_wisata_weekend'];?>" placeholder="..." autocomplete="off" />
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 editoronly">
            <label class="form-label">Deskripsi<i class="text-danger">*</i></label>
            <textarea name="deskripsi" class="form-control"><?=$edit['deskripsi_wisata'];?></textarea>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12">
            <label class="form-label">Alamat<i class="text-danger">*</i></label>
            <textarea name="alamat" class="form-control" required rows="2"><?=$edit['alamat_wisata'];?></textarea>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12">
            <label class="form-label">Embed Map (opsional)</label>
            <textarea name="embedmap" class="form-control" rows="2"><?=$edit['embed_map'];?></textarea>
          </div>
          <div class="col-xl-12 col-md-12 col-sm-12">
            <label class="form-label" for="multicol-country">Tampilkan Jadwal Operasional<i class="text-danger">*</i></label>
            <select class="select2 form-select" name="jadwal" required onchange="handleStatusOperational(this.value)">
              <option value="y" <?php if ($edit['is_jadwal']=='y') echo 'selected'; ?>>Aktif</option>
              <option value="n" <?php if ($edit['is_jadwal']=='n') echo 'selected'; ?>>Tidak Aktif</option>
            </select>
          </div>
          <div class="col-xl-12 col-md-12 col-sm-12" id="opjamnya">
            <?php
            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
            foreach ($hari as $h) {
              $lower = strtolower($h);

              $expldjam = explode("__", $edit[$lower]);
            ?>
            <div class="row mb-2">
              <div class="col-xl-6 col-md-6 col-sm-6 mb-2">
                <div class="form-group">
                  <label class="form-label"><b><?= $h; ?> --</b> Jam Buka</label>
                  <div class="input-group">
                    <input type="time" class="form-control" value="<?=$expldjam[0];?>" name="<?= $lower; ?>" placeholder="..." autocomplete="off" />
                    <select class="form-select" name="<?= $lower; ?>_status" style="max-width: 120px;" onchange="handleStatusChange(this)">
                      <option value="y" <?php if ($edit[$lower]!='__') echo 'selected'; ?>>Buka</option>
                      <option value="n" <?php if ($edit[$lower]=='__') echo 'selected'; ?>>Libur</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-md-6 col-sm-6 mb-2">
                <label class="form-label"><b><?= $h; ?> --</b> Jam Tutup</label>
                <input type="time" class="form-control" value="<?=$expldjam[1];?>" name="<?= $lower; ?>1" placeholder="..." autocomplete="off" />
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12">
            <label class="form-label">Informasi Jadwal Operasional (opsional)</label>
            <textarea name="info_jadwal" class="form-control" rows="2"><?=$edit['info_jadwal'];?></textarea>
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

<script>

  function handleStatusOperational(selectEl) {
    if(selectEl=="y"){
      $('#opjamnya').removeClass('d-none');
    }else{
      $('#opjamnya').addClass('d-none');
    }
  }
  function handleStatusChange(selectEl) {
    const isClosed = selectEl.value === 'n';
    const group = selectEl.closest('.row');
    const inputs = group.querySelectorAll('input[type="time"]');

    if (isClosed) {
      inputs.forEach(input => {
        input.value = '';
        input.readOnly = true;
      });
    } else {
      if (inputs.length >= 2) {
        inputs[0].value = '08:00'; // Jam buka default
        inputs[1].value = '18:00'; // Jam tutup default
      }
      inputs.forEach(input => {
        input.readOnly = false;
      });
    }
  }
</script>

<script>
  $(document).ready(function () {
    getSubcategory("<?=$edit['province_id'];?>","<?=$edit['kabkota_id'];?>");
  });
  function getSubcategory(a,b) {
    $.get('<?=base_url($compid.'get_kabkota');?>/'+a, function(data) {
      $('#kabkota').html(data);
      $('#kabkota').val(b);
    });
  }
</script>