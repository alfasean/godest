  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
        
              <img src="<?=base_url('assets/temp/');?>assets/logo/logo_admin.png" width="160">
            

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
              <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <?php if ($title=='Admin') { $ax = 'active'; }else{ $ax = ''; } ?>
            <li class="menu-item <?=$ax;?>">
              <a href="<?=base_url('admin/company/admin');?>" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Admin">Admin</div>
              </a>
            </li>
            <!-- Dashboards -->
            <?php if ($title=='Pengaturan') { $ac = 'active'; }else{ $ac = ''; } ?>
            <li class="menu-item <?=$ac;?>">
              <a href="<?=base_url('admin/dashboard');?>" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout-sidebar"></i>
                <div data-i18n="Pengaturan">Pengaturan</div>
              </a>
            </li>
            <?php if ($title=='Data Provinsi') { $acccpr = 'active'; }else{ $acccpr = ''; } ?>
            <li class="menu-item <?=$acccpr;?>">
              <a href="<?=base_url('admin/provinsi');?>" class="menu-link">
                <i class="menu-icon tf-icons ti ti-clipboard-list"></i>
                <div data-i18n="Data Provinsi">Data Provinsi</div>
              </a>
            </li>
            <?php if ($title=='Data Kab/Kota') { $acccprb = 'active'; }else{ $acccprb = ''; } ?>
            <li class="menu-item <?=$acccprb;?>">
              <a href="<?=base_url('admin/kabkota');?>" class="menu-link">
                <i class="menu-icon tf-icons ti ti-clipboard-list"></i>
                <div data-i18n="Data Kab/Kota">Data Kab/Kota</div>
              </a>
            </li>
            <?php if ($title=='Data Wisata') { $accc = 'active'; }else{ $accc = ''; } ?>
            <li class="menu-item <?=$accc;?>">
              <a href="<?=base_url('admin/wisata');?>" class="menu-link">
                <i class="menu-icon tf-icons ti ti-layout"></i>
                <div data-i18n="Data Wisata">Data Wisata</div>
              </a>
            </li>
            <?php if ($title=='Ulasan') { $acccc = 'active'; }else{ $acccc = ''; } ?>
            <li class="menu-item <?=$acccc;?>">
              <a href="<?=base_url('admin/ulasan');?>" class="menu-link">
                <i class="menu-icon tf-icons ti ti-table-heart"></i>
                <div data-i18n="Ulasan">Ulasan</div>
              </a>
            </li>
            <?php if ($title=='FAQ') { $acccccc = 'active'; }else{ $acccccc = ''; } ?>
            <li class="menu-item <?=$acccccc;?>">
              <a href="<?=base_url('admin/faq');?>" class="menu-link">
                <i class="menu-icon tf-icons ti ti-help-hexagon"></i>
                <div data-i18n="FAQ">FAQ</div>
              </a>
            </li>
            <?php if ($title=='Syarat Ketentuan') { $acccccc2 = 'active'; }else{ $acccccc2 = ''; } ?>
            <!-- <li class="menu-item <?=$acccccc2;?>">
              <a href="<?=base_url('admin/terms');?>" class="menu-link">
                <i class="menu-icon tf-icons ti ti-exclamation-circle"></i>
                <div data-i18n="Syarat Ketentuan">Syarat Ketentuan</div>
              </a>
            </li> -->
            <?php if ($title=='Kebijakan Privasi') { $acccccc1 = 'active'; }else{ $acccccc1 = ''; } ?>
            <!-- <li class="menu-item <?=$acccccc1;?>">
              <a href="<?=base_url('admin/privacy');?>" class="menu-link">
                <i class="menu-icon tf-icons ti ti-lock-square"></i>
                <div data-i18n="Kebijakan Privasi">Kebijakan Privasi</div>
              </a>
            </li> -->
          </ul>
        </aside>
        <!-- / Menu -->