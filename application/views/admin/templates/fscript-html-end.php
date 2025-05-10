    <!-- Modal -->

    <div class="modal fade" id="modal_ggf_default" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modal_ggf_default_res"></div>
      </div>
    </div>

    <div class="modal fade" id="modal_novel_simpel" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modal_novel_simpel_res"></div>
      </div>
    </div>

    <div class="modal fade" id="modal_lg_default" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content" id="modal_lg_default_res"></div>
      </div>
    </div>

    <div class="modal fade" id="modal_gg_default" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modal_gg_default_res"></div>
      </div>
    </div>

    <div class="modal fade" id="modal_g_default" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content" id="modal_g_default_res"></div>
      </div>
    </div>

    <div class="modal fade" id="modal_user_simpel" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content" id="modal_user_simpel_res"></div>
      </div>
    </div>

    <div class="modal fade" id="modal_koin_pin_topup" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content" id="modal_koin_pin_topup_res"></div>
      </div>
    </div>

    <div class="modal fade" id="modal_reading_chapter" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content" id="modal_reading_chapter_res"></div>
      </div>
    </div>

    <div class="modal fade" id="modal_loading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content p-3">Loading...<br/>mohon jangan tinggalkan halaman ini.</div>
      </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/hammer/hammer.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/i18n/i18n.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="<?=base_url('assets/temp/');?>assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/swiper/swiper.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    <!-- <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script> -->

    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/select2/select2.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/tagify/tagify.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/bloodhound/bloodhound.js"></script>

    <!-- Main JS -->
    <script src="<?=base_url('assets/temp/');?>assets/js/main.js"></script>

    <?php if ($htmlpagejs!='auth') { ?>
    <script src="<?=base_url('assets/temp/');?>assets/js/forms-selects.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/js/forms-tagify.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/js/forms-typeahead.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/tinymce/tinymce/tinymce.min.js"></script>
    <?php } ?>

    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/moment/moment.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/libs/pickr/pickr.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/vendor/confirm-js/jquery-confirm.min.js"></script>
    <script src="<?=base_url('assets/temp/');?>assets/js/ui-popover.js"></script>

    <!-- Page JS -->
    <?php if ($htmlpagejs=='dashboard') { ?>
    <script src="<?=base_url('assets/temp/');?>assets/js/dashboards-analytics.js"></script>
    <?php } else if ($htmlpagejs=='...') { ?>

    <?php } ?>

    <?php if ($htmlpagejs!='auth') { ?>
    <script src="<?=base_url('assets/temp/');?>assets/js/forms-pickers.js"></script>
    <?php } ?>

    <script>
        $(document).ready(function () {

          $('[data-toggle="tooltip"]').tooltip();
          $('[data-toggle="popover"]').popover();

          $('#dataTable').DataTable({
            ordering: false,
            fixedColumns:   true,
            scrollX:        true,
            scrollCollapse: true,
            "lengthMenu": [[15, 50, 100, -1], [15, 50, 100, "All"]]
          }); // ID From dataTable 

          $('#dataTableatt').DataTable({
            ordering: false,
            fixedColumns:   true,
            scrollX:        true,
            scrollCollapse: true,
            "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "All"]]
          }); // ID From dataTable 

          $('#dataTableatt2').DataTable({
            ordering: false,
            fixedColumns:   {
              left: 1,
              right: 1
            },
            scrollX:        true,
            scrollCollapse: true,
            "lengthMenu": [[50, 75, 100, -1], [50, 75, 100, "All"]]
          }); // ID From dataTable 

          setTimeout(() => {
            $('.dataTables_filter .form-control').removeClass('form-control-sm');
            $('.dataTables_length .form-select').removeClass('form-select-sm');
          }, 200);

        });

        function showImgfile(objFileInput, cid = 'targetfileimg', width = '120') {
          if (objFileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (e) {
              if (width=='auto') {
                $("#"+cid).html('<img src="'+e.target.result+'" class="rounded img-fluid" />');
              }else{
                $("#"+cid).html('<img src="'+e.target.result+'" width="'+width+'" class="rounded" />');
              }
            }
            fileReader.readAsDataURL(objFileInput.files[0]);
          }
        }

        function stringMatch(term, candidate) {
          return candidate && candidate.toLowerCase().indexOf(term.toLowerCase()) >= 0;
        }

        function matchCustom(params, data) {
          // If there are no search terms, return all of the data
          if ($.trim(params.term) === '') {
              return data;
          }
          // Do not display the item if there is no 'text' property
          if (typeof data.text === 'undefined') {
              return null;
          }
          // Match text of option
          if (stringMatch(params.term, data.text)) {
              return data;
          }
          // Match attribute "data-foo" of option
          if (stringMatch(params.term, $(data.element).attr('data-foo'))) {
              return data;
          }
          // Return `null` if the term should not be displayed
          return null;
        }

        function formatCustom(state) {
          return $(
            '<div><div>' + state.text + '</div><div class="foo">'
                + $(state.element).attr('data-foo')
                + '</div></div>'
          );
        }

        function numberOnly(key) {
          // onkeydown="return numberOnly(event.key)"
          return (key >= '0' && key <= '9') || key == '-' || key == '.' || key == 'ArrowLeft' || key == '+' || key == 'ArrowRight' || key == 'Delete' || key == 'Backspace' || key == 'Tab' || key == 'F5' || key == 'command';
        }

        function showPassword(a = 'idpassword') {
          var x = document.getElementById(a);
          if (x.type === "password") {
            x.type = "text";
            $('#matanyagantilgn').addClass('ti-eye');
            $('#matanyagantilgn').removeClass('ti-eye-off');
          } else {
            $('#matanyagantilgn').addClass('ti-eye-off');
            $('#matanyagantilgn').removeClass('ti-eye');
            x.type = "password";
          }
        }
    </script>

    <script type="text/javascript">

      function modalDefault(a){
        $('#modal_g_default_res').html('<span class="p-2">Loading...</span>');
        $('#modal_g_default').modal('toggle');
        modalFromdefault(a);
      }

      function modalFromdefault(a) {
        $.get('<?=base_url();?>'+a, function(data) {
          $('#modal_g_default_res').html(data);
        });
      }

      function modalGDefault(a){
        $('#modal_gg_default_res').html('<span class="p-2">Loading...</span>');
        $('#modal_gg_default').modal('toggle');
        modalFromgdefault(a);
      }

      function modalFromgdefault(a) {
        $.get('<?=base_url();?>'+a, function(data) {
          $('#modal_gg_default_res').html(data);
        });
      }

      function modalGfDefault(a){
        $('#modal_ggf_default_res').html('<span class="p-2">Loading...</span>');
        $('#modal_ggf_default').modal('toggle');
        modalFromgfdefault(a);
      }

      function modalFromgfdefault(a) {
        $.get('<?=base_url();?>'+a, function(data) {
          $('#modal_ggf_default_res').html(data);
        });
      }

      function modalLDefault(a){
        $('#modal_lg_default_res').html('<span class="p-2">Loading...</span>');
        $('#modal_lg_default').modal('toggle');
        modalFromldefault(a);
      }

      function modalFromldefault(a) {
        $.get('<?=base_url();?>'+a, function(data) {
          $('#modal_lg_default_res').html(data);
        });
      }
    </script>

    <script type="text/javascript">
      var BASE_URL = "<?php echo base_url() ?>assets/temp/"; // use your own base url
      tinymce.init({
          selector: ".editoronly textarea",
          theme: "modern",
          // width: 680,
          height: 200,
          relative_urls: false,
          remove_script_host: false,
          // document_base_url: BASE_URL,
          plugins: [
              "advlist autolink link image lists charmap preview hr anchor pagebreak spellchecker paste",
              "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
              "table contextmenu directionality template textcolor responsivefilemanager template"
          ],
          toolbar: "insertfile undo redo | template styleselect | bold italic blockquote | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent pagebreak hr | link unlink image media | forecolor backcolor | preview code",
          templates: [
            {title: 'Default', description: 'Default', content: '{{default}}'},
          ],
          content_style: 'blockquote { padding-left: 15px; border-left: 2px solid blue; }',
          image_advtab: true,
          external_filemanager_path: BASE_URL + "filemanager/",
          filemanager_title: "Media",
          external_plugins: { "filemanager": BASE_URL + "filemanager/plugin.min.js" }
      });
    </script>

    <script type="text/javascript">

      function proses_default(a,b,c = 'Kamu yakin ingin melanjutkan?'){
        $.confirm({
          title: 'Confirm!',
          content: c,
          theme: 'modern',
          closeIcon: true,
          draggable: false,
          animation: 'scale',
          type: 'dark',
          buttons: {
            Cancel: function () { },
            Confirm: function () {
              $('#modal_loading').modal('toggle');
              $('button').addClass('disabled');
              var formData = new FormData($("#"+b)[0]);
              $.ajax({
                type: "POST",
                url: '<?=base_url()?>'+a,
                data:  formData,
                contentType: false,
                cache: false,
                processData:false,
                success: function(result){
                  setTimeout(function(){
                    $('#modal_loading').hide();
                    var myModalEl = document.querySelector('#modal_loading');
                    var myModal = bootstrap.Modal.getOrCreateInstance(myModalEl);
                    myModal.hide();
                    
                    $('button').removeClass('disabled');
                    var res = result.split('~');
                    if (res[0]=='y') {
                      proses_success(res[1]);
                    }else if (res[0]=='n') {
                      proses_failed(res[1]);
                    }else if (res[0]=='reload') {
                      proses_success(res[1],res[0]);
                    }else if (res[0]=='url') {
                      document.body.scrollTop = 0;
                      document.documentElement.scrollTop = 0;
                      document.location=res[1];
                    }else if (res[0]=='reload') {
                      document.body.scrollTop = 0;
                      document.documentElement.scrollTop = 0;
                      location.reload();
                    }
                  }, 250);
                } 
              });
            }
          }
        });
      }

      function proses_success(a,b = null){

        if (a=='default') {
          a = 'Proses berhasil, data berhasil diperbarui.';
        }

        $.confirm({
          icon: 'fa fa-check',
          title: 'Successfully',
          content: a,
          theme: 'modern',
          autoClose: 'OK|1500',
          type: 'green',
          draggable: false,
          buttons: {
            OK: function () {
              if (b=='reload') {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
                location.reload();
              }
            }
          }
        });
      }

      function proses_failed(a,b = null){

        if (a=='default') {
          a = 'Proses gagal, silahkan coba lagi.';
        }

        $.confirm({
          icon: 'fa fa-times',
          title: 'Error',
          content: a,
          theme: 'modern',
          autoClose: 'OK|3000',
          type: 'red',
          draggable: false,
          buttons: {
            OK: function () {
              if (b=='reload') {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
                location.reload();
              }
            }
          }
        });
      }

    </script>
  
  </body>
</html>