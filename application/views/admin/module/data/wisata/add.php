<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0"><?=$namalabel;?></h5>
    </div>
    <div class="card">
      <form class="card-body" action="<?=base_url($compid.'add_proses');?>" method="POST" enctype="multipart/form-data">
        
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
              <option value="<?=$prov['id'];?>"><?=$prov['name'];?></option>
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
            <input type="text" class="form-control" name="nama" placeholder="..." required autocomplete="off" />
          </div>
          <div class="col-xl-4 col-md-4 col-sm-5 col-xs-5">
            <label class="form-label" for="multicol-country">Status<i class="text-danger">*</i></label>
            <select class="select2 form-select" name="status" required>
              <option value="y">Aktif</option>
              <option value="n">Tidak Aktif</option>
            </select>
          </div>
          <div class="col-xl-6 col-md-6 col-sm-6">
            <label class="form-label">Url Situs Resmi (opsional)</label>
            <input type="text" class="form-control" name="url_situs" placeholder="..." autocomplete="off" />
          </div>
          <div class="col-xl-6 col-md-6 col-sm-6">
            <label class="form-label">Nomor Telepon Resmi (opsional)</label>
            <input type="text" class="form-control" name="no_telp" placeholder="..." autocomplete="off" />
          </div>
          <div class="col-xl-6 col-md-6 col-sm-6">
            <label class="form-label">Harga Tiket Weekday (opsional)</label>
            <input type="text" class="form-control" name="harga1" placeholder="..." autocomplete="off" />
          </div>
          <div class="col-xl-6 col-md-6 col-sm-6">
            <label class="form-label">Harga Tiket Weekend (opsional)</label>
            <input type="text" class="form-control" name="harga2" placeholder="..." autocomplete="off" />
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 editoronly">
            <label class="form-label">Deskripsi<i class="text-danger">*</i></label>
            <textarea name="deskripsi" class="form-control"></textarea>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12">
            <label class="form-label">Alamat<i class="text-danger">*</i></label>
            <textarea name="alamat" class="form-control" required rows="2"></textarea>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12">
            <label class="form-label">Embed Map (opsional)</label>
            <textarea name="embedmap" class="form-control" rows="2"></textarea>
          </div>
          <div class="col-xl-12 col-md-12 col-sm-12">
            <label class="form-label">Galeri Foto<i class="text-danger">*</i></label>
            <div id="drop-area">
              <p>Drag & Drop gambar di sini</p>
              <input type="file" id="fileElem" name="gambar[]" multiple accept="image/*" style="display:none">
              <button type="button" class="btn btn-primary" onclick="fileElem.click()">Pilih Gambar</button>
              <div id="gallery-select"></div>
            </div>
          </div>
          <div class="col-xl-12 col-md-12 col-sm-12">
            <label class="form-label" for="multicol-country">Tampilkan Jadwal Operasional<i class="text-danger">*</i></label>
            <select class="select2 form-select" name="jadwal" required onchange="handleStatusOperational(this.value)">
              <option value="y">Aktif</option>
              <option value="n">Tidak Aktif</option>
            </select>
          </div>
          <div class="col-xl-12 col-md-12 col-sm-12" id="opjamnya">
            <?php
            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
            foreach ($hari as $h) {
              $lower = strtolower($h);
            ?>
            <div class="row mb-2">
              <div class="col-xl-6 col-md-6 col-sm-6 mb-2">
                <div class="form-group">
                  <label class="form-label"><b><?= $h; ?> --</b> Jam Buka</label>
                  <div class="input-group">
                    <input type="time" class="form-control" name="<?= $lower; ?>" placeholder="..." value="08:00" autocomplete="off" />
                    <select class="form-select" name="<?= $lower; ?>_status" style="max-width: 120px;" onchange="handleStatusChange(this)">
                      <option value="y">Buka</option>
                      <option value="n">Libur</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-md-6 col-sm-6 mb-2">
                <label class="form-label"><b><?= $h; ?> --</b> Jam Tutup</label>
                <input type="time" class="form-control" name="<?= $lower; ?>1" placeholder="..." value="18:00" autocomplete="off" />
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12">
            <label class="form-label">Informasi Jadwal Operasional (opsional)</label>
            <textarea name="info_jadwal" class="form-control" rows="2"></textarea>
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
let dropArea = document.getElementById('drop-area');
let gallery = document.getElementById('gallery-select');
let fileElem = document.getElementById('fileElem');
let filesArray = [];

// Prevent default drag behaviors
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, preventDefaults, false);
});
function preventDefaults(e) {
  e.preventDefault();
  e.stopPropagation();
}

// Highlight drop area
['dragenter', 'dragover'].forEach(eventName => {
  dropArea.addEventListener(eventName, () => dropArea.classList.add('highlight'), false)
});
['dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, () => dropArea.classList.remove('highlight'), false)
});

// Handle dropped files
dropArea.addEventListener('drop', handleDrop, false);
function handleDrop(e) {
  let dt = e.dataTransfer;
  handleFiles(dt.files);
}

fileElem.addEventListener('change', () => {
  handleFiles(fileElem.files);
});

function handleFiles(fileList) {
  for (let i = 0; i < fileList.length; i++) {
    filesArray.push(fileList[i]);
  }
  updateGallery();
}

// Update preview dan tambahkan tombol hapus
function updateGallery() {
  gallery.innerHTML = '';
  filesArray.forEach((file, index) => {
    let imgURL = URL.createObjectURL(file);
    let div = document.createElement('div');
    div.classList.add('preview-select');
    div.innerHTML = `
      <img src="${imgURL}">
      <button type="button" class="remove-btn-select" onclick="removeImage(${index})">&times;</button>
    `;
    gallery.appendChild(div);
  });

  updateFileInput();
}

// Hapus gambar dari array dan update ulang
function removeImage(index) {
  filesArray.splice(index, 1);
  updateGallery();
}

// Buat ulang input[type=file] secara dinamis dengan FileList
function updateFileInput() {
  let dataTransfer = new DataTransfer();
  filesArray.forEach(file => dataTransfer.items.add(file));
  fileElem.files = dataTransfer.files;
}
</script>

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

  // Jalankan saat halaman dimuat (jaga-jaga ada yang default tutup)
  document.querySelectorAll('select[name$="_status"]').forEach(select => {
    handleStatusChange(select);
  });
</script>

<script>
  function getSubcategory(a) {
    $.get('<?=base_url($compid.'get_kabkota');?>/'+a, function(data) {
      $('#kabkota').html(data);
    });
  }
</script>