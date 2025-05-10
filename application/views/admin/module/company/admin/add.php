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
          <div class="col-xl-8 col-md-8 col-sm-7 col-xs-7">
            <label class="form-label">Nama Lengkap<i class="text-danger">*</i></label>
            <input type="text" class="form-control" name="nama" placeholder="..." required autocomplete="off" />
          </div>
          <div class="col-xl-4 col-md-4 col-sm-5 col-xs-5">
            <label class="form-label" for="multicol-country">Status<i class="text-danger">*</i></label>
            <select class="select2 form-select" name="status" required>
              <option value="y">Aktif</option>
              <option value="n">Tidak Aktif</option>
            </select>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <label class="form-label">Email<i class="text-danger">*</i></label>
            <input type="email" class="form-control" name="email" placeholder="..." required />
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <label class="form-label">Password<i class="text-danger">*</i></label>
            <div class="input-group input-group-merge">
              <input type="password" id="idpassword" class="form-control" name="password" placeholder="***************" required />
              <span class="input-group-text cursor-pointer" onclick="showPassword('idpassword')"><i class="ti ti-eye-off" id="matanyagantilgn"></i></span>
            </div>
          </div>
          <div class="col-12">
            <div class="table-responsive">
              <div class="mb-1 mt-2">
                <h6 class="role-title mb-0">Set Permissions</h6>
              </div>
              <table class="table table-flush-spacing">
                <tbody>
                  <tr>
                    <td class="text-nowrap text-center">
                      <div class="d-flex">
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" name="p_add" id="userManagementRead" />
                          <label class="form-check-label" for="userManagementRead"> Tambah </label>
                        </div>
                        <div class="form-check me-3 me-lg-5">
                          <input class="form-check-input" type="checkbox" name="p_edit" id="userManagementWrite" />
                          <label class="form-check-label" for="userManagementWrite"> Edit </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="p_del" id="userManagementCreate" />
                          <label class="form-check-label" for="userManagementCreate"> Hapus </label>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
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