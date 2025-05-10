    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Login -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center mb-4 mt-2">
                <!-- <a href="javascript:" class="app-brand-link gap-2">
                  <img src="<?=base_url();?>assets/frontend/images/logo/logo2.png" width="240">
                </a> -->
              </div>
              <!-- /Logo -->
              <p class="mb-4">Silahkan masuk ke akun Anda dan mulai menggunakan Aplikasi.</p>

              <?php if ($this->session->flashdata('message')) { ?>
                <div class="alert alert-<?=$this->session->flashdata('msg_color');?>" role="alert">
                <?=$this->session->flashdata('message');?>
                </div>
              <?php } ?>

              <form class="mb-3" action="<?=base_url('login');?>" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Alamat Email</label>
                  <input
                    type="email"
                    class="form-control"
                    name="email"
                    autocomplete="off"
                    placeholder="Masukan email anda..."
                    autofocus />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="idpassword"
                      class="form-control"
                      name="password"
                      placeholder="***************" />
                    <span class="input-group-text cursor-pointer" onclick="showPassword('idpassword')"><i class="ti ti-eye-off" id="matanyagantilgn"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                </div>
              </form>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>
    <!-- / Content -->
