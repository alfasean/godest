<!DOCTYPE html>
<?php 
  if (isset($htmlclasstemp)) {
    $htmlclasstemp = $htmlclasstemp;
  } else {
    $htmlclasstemp = 'layout-navbar-fixed layout-menu-fixed';
  }

  if (!isset($nmenu)) {
    $nmenu = 'Dashboard';
  }

  if (isset($nmenusub)) {
    $titlenya = $nmenusub.' - '.$title;
  }else{
    $titlenya = $nmenu.' - '.$title;
  }

?>
<html
  lang="en"
  class="light-style <?=$htmlclasstemp;?>"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?=base_url('assets/temp/assets/');?>"
  data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <title><?=$titlenya;?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?=base_url('assets/temp/');?>assets/logo/favicon.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/css/rtl/custom.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/tagify/tagify.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/datatables-select-bs5/select.bootstrap5.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css" />

    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/jquery-timepicker/jquery-timepicker.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/libs/pickr/pickr-themes.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/css/pages/page-auth.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/css/pages/cards-advance.css" />
    <link rel="stylesheet" href="<?=base_url('assets/temp/');?>assets/vendor/confirm-js/jquery-confirm.min.css">
    <!-- Helpers -->
    <script src="<?=base_url('assets/temp/');?>assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <!-- <script src="<?=base_url('assets/temp/');?>assets/vendor/js/template-customizer.js"></script> -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/js/config.js"></script>
    
  </head>
