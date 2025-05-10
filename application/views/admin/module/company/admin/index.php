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
    
    </div>
    <div class="card-datatable table-responsive">
      <table class="table border-top" id="dataTable">
        <thead>
          <tr>
            <th>Nama&nbsp;Lengkap</th>
            <th>Email</th>
            <th>Tambah</th>
            <th>Edit</th>
            <th>Hapus</th>
            <th>Status</th>
            <th class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($datas as $row) : ?>
          <tr>
            <td><?= $row['nama_lengkap'];?></td>
            <td><?= $row['email_address'];?></td>
            <td>
              <?php if ($row['p_add']=='y') { ?>
                <i class="fa fa-check"></i>
              <?php }else{ ?>
                <i class="fa fa-times"></i>
              <?php } ?>
            </td>
            <td>
              <?php if ($row['p_edit']=='y') { ?>
                <i class="fa fa-check"></i>
              <?php }else{ ?>
                <i class="fa fa-times"></i>
              <?php } ?>
            </td>
            <td>
              <?php if ($row['p_del']=='y') { ?>
                <i class="fa fa-check"></i>
              <?php }else{ ?>
                <i class="fa fa-times"></i>
              <?php } ?>
            </td>
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
              <?php if ($uid!=$row['admin_id']){ ?>
              <a href="<?=base_url($compid.'edit/'.$row['admin_id']);?>" class="btn p-1">
                <i class="ti ti-edit"></i>
              </a>
              <a href="#" class="btn p-1" data-bs-toggle="modal" data-bs-target="#delRow<?=$row['admin_id'];?>">
                <i class="ti ti-trash"></i>
              </a>
              <?php }else{ ?>
                <a href="<?=base_url('admin/company/profile/edit');?>" class="btn p-1">
                  <i class="ti ti-edit"></i>
                </a>
              <?php } ?>
              <!-- Konfirmasi Hapus -->
              <div class="modal fade" id="delRow<?=$row['admin_id'];?>" tabindex="-1" aria-hidden="true">
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
                        <a href="<?=base_url($compid.'hapus/'.$row['admin_id']);?>" class="btn btn-danger">Ya, Hapus</a>
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