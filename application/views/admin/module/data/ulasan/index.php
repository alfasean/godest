<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0"><?=$namalabel;?></h5>

      <?php if ($this->session->flashdata('message')) { ?>
        <div class="alert alert-<?=$this->session->flashdata('msg_color');?> mt-3" role="alert">
        <?=$this->session->flashdata('message');?>
        </div>
      <?php } ?>
    
    </div>
    <div class="card-datatable table-responsive">
      <table class="table border-top" id="dataTable">
        <thead>
          <tr>
            <th>Wisata</th>
            <th>Ulasan</th>
            <th>Rating</th>
            <th class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($datas as $row) : ?>
          <tr>
            <td><?= $row['nama_wisata'];?></td>
            <td><?= $row['nama_lengkap'];?><br><?= $row['ulasan_text'];?></td>
            <td>
              <?php if($row['rating']==0){
                echo 'IP/ID user yang sama';
                }else{
                  echo '⭐ '.$row['rating'].'/5';
                }
              ?>
            </td>
            <td align="right">
              <a href="<?=base_url($compid.'edit/'.$row['ulasan_id']);?>" class="btn p-1">
                <i class="ti ti-edit"></i>
              </a>
              <a href="#" class="btn p-1" data-bs-toggle="modal" data-bs-target="#delRow<?=$row['ulasan_id'];?>">
                <i class="ti ti-trash"></i>
              </a>
              <!-- Konfirmasi Hapus -->
              <div class="modal fade" id="delRow<?=$row['ulasan_id'];?>" tabindex="-1" aria-hidden="true">
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
                        <a href="<?=base_url($compid.'hapus/'.$row['ulasan_id']);?>" class="btn btn-danger">Ya, Hapus</a>
                      </div>
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