<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title"><?=$namalabel;?></h5>
      <div class="text-start">
        <a href="<?=base_url($compid.'add');?>" class="btn btn-primary btn-sm"><i class="ti ti-plus me-md-1"></i> Tambah Data</a>
      </div>

      <?php if ($this->session->flashdata('message')) { ?>
        <div class="alert alert-<?=$this->session->flashdata('msg_color');?> mt-3" role="alert">
        <?=$this->session->flashdata('message');?>
        </div>
      <?php } ?>

      <?php if ($this->session->flashdata('message2')) { ?>
        <div class="alert alert-<?=$this->session->flashdata('msg_color2');?> mt-3" role="alert">
        <?=$this->session->flashdata('message2');?>
        </div>
      <?php } ?>
    
    </div>
    <div class="card-datatable table-responsive">
      <table class="table border-top" id="dataTable">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th>Nama Wisata</th>
            <th>Alamat</th>
            <th>Status</th>
            <th width="15%" class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($datas as $row) : ?>
          <tr>
            <td><?= $no;?></td>
            <td><?= $row['nama_wisata'];?></td>
            <td><?= $row['alamat_wisata'];?></td>
            <td>
              <?php if ($row['is_status']=='y') { ?>
              <span class="badge bg-label-success">Aktif</span>
              <?php } else if ($row['is_status']=='n') { ?>
              <span class="badge bg-label-danger">Tidak Aktif</span>
              <?php } else { ?>
              <span class="badge bg-label-secondary">Unknown</span>
              <?php } ?>
            </td>
            <td align="right">
              <a href="#modalGambar<?= $row['wisata_id']; ?>" data-bs-toggle="modal" data-bs-target="#modalGambar<?= $row['wisata_id']; ?>" class="btn p-1">
                <i class="ti ti-photo"></i>
              </a>
              <a href="<?=base_url($compid.'edit/'.$row['wisata_id']);?>" class="btn p-1">
                <i class="ti ti-edit"></i>
              </a>
              <a href="#" class="btn p-1" data-bs-toggle="modal" data-bs-target="#delRow<?=$row['wisata_id'];?>">
                <i class="ti ti-trash"></i>
              </a>
              <!-- Konfirmasi Hapus -->
              <div class="modal fade" id="delRow<?=$row['wisata_id'];?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="mb-2">Konfirmasi</h3>
                        <p>Yakin ingin menghapus data ini ?</p>
                      </div>
                      <div class="col-12 text-center pt-3">
                        <button
                          type="button"
                          class="btn btn-light me-sm-3 me-1"
                          data-bs-dismiss="modal"
                          aria-label="Close">
                          Batal
                        </button>
                        <a href="<?=base_url($compid.'hapus/'.$row['wisata_id']);?>" class="btn btn-danger">Ya, Hapus</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="modal fade" id="modalGambar<?= $row['wisata_id']; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Gambar Wisata  <?= $row['nama_wisata']; ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      <?php
                        $gambar = $this->db->get_where('m_wisata_foto', ['wisata_id' => $row['wisata_id']])->result_array();
                      ?>
                      <form method="POST">
                        <div class="row">
                          <?php foreach ($gambar as $g): ?>
                            <div class="col-md-4 mb-3 text-start">
                              <img src="<?= base_url($g['foto']) ?>" class="img-fluid rounded custom-image-fit-cg">
                              <div class="form-check mt-2 text-start">
                                <input type="radio" name="utama" class="form-check-input" onchange="handleStatusUtama(this)" value="<?= $row['wisata_id'].'_'.$g['foto_id'] ?>" <?= ($g['utama'] == 'y') ? 'checked' : '' ?>>
                                <label class="form-check-label">Foto Utama</label>
                              </div>
                              <?php if(count($gambar)>1){ ?>
                              <a href="<?=base_url($compid.'hapus_gambar_id/'.$g['foto_id']);?>" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Hapus gambar ini?')">Hapus</a>
                              <?php } ?>
                            </div>
                          <?php endforeach; ?>
                        </div>
                      </form>
                      <hr>
                      <form method="POST" action="<?=base_url($compid.'add_gambar_id');?>" enctype="multipart/form-data">
                        <input type="hidden" name="wisata_id" value="<?= $row['wisata_id']; ?>">
                        <div class="mb-3">
                          <input type="file" name="gambar[]" class="form-control" multiple required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Gambar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </td>
          </tr>
          <?php $no++; endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- / Content -->

<script>
  function handleStatusUtama(input) {
    var value = input.value; // format: wisataid_fotoid
    var arr = value.split('_');
    var wisata_id = arr[0];
    var foto_id = arr[1];

    $.ajax({
      url: "<?=base_url($compid.'update_utama_gambar');?>",
      type: "POST",
      data: {
        wisata_id: wisata_id,
        foto_id: foto_id
      },
      success: function(response) {
        try {
          var res = JSON.parse(response);
          if (res.success) {
            alert('Berhasil update gambar utama.');
          } else {
            alert('Gagal update gambar.');
          }
        } catch (e) {
          alert('Terjadi kesalahan saat parsing data.');
        }
      },
      error: function() {
        alert('Gagal mengirim request.');
      }
    });
  }
</script>

