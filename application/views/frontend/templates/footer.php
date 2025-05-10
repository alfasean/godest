  	
	<div class="site-footer">
		<div class="inner first">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12 col-lg-12 text-center">
						<div class="widget mb-1">
							<!-- <div class="mb-4">
								<img src="<?=base_url('assets/frontend/images/logo/logo2.png');?>" width="260" class="img-fluid">
							</div> -->
							<p>
								<?=$sistem['footer_text'];?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="inner dark mb-0 pb-1">
			<div class="container">
				<div class="row text-center">
					<div class="col-lg-12 mx-auto">
						<p class="pre-line-cg">
							<?=$sistem['footer_copyright'];?>
						</p>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	<div id="overlayer"></div>
	<div class="loader">
		<div class="spinner-border" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>

	<script src="<?=base_url();?>assets/frontend/js/popper.min.js"></script>
	<script src="<?=base_url();?>assets/frontend/js/bootstrap.min.js"></script>
	<script src="<?=base_url();?>assets/frontend/js/owl.carousel.min.js"></script>
	<script src="<?=base_url();?>assets/frontend/js/jquery.animateNumber.min.js"></script>
	<script src="<?=base_url();?>assets/frontend/js/jquery.waypoints.min.js"></script>
	<script src="<?=base_url();?>assets/frontend/js/jquery.fancybox.min.js"></script>
	<script src="<?=base_url();?>assets/frontend/js/aos.js"></script>
	<script src="<?=base_url();?>assets/frontend/js/moment.min.js"></script>
	<script src="<?=base_url();?>assets/frontend/js/daterangepicker.js"></script>
	<script src="<?=base_url();?>assets/frontend/js/typed.js"></script>

	<script src="<?=base_url();?>assets/frontend/js/custom.js"></script>

	<?php if($ogurl=='index' || $ogurl==''){ ?>
    <script>
        var start = 8;
        var limit = 8;
        
        var proses = true;
        var stload = 'on';
        
        $(window).scroll(function() {
            var footerTop = $('#tofootersection').offset().top;
			var scrollBottom = $(window).scrollTop() + $(window).height();
			if (scrollBottom >= footerTop) {
				if (stload == 'on' && proses == true) {
					loadmoreData(start, limit);
				}
			}
        });

        function loadmoreData(a,b) {
            $.ajax({
            type: "GET",
            dataType:'html',
            timeout: 9000,
            async: true,
            url: '<?=base_url('index/wisata_more/');?>'+a+'/'+b,
            beforeSend: function(){
                proses = false;
                $('#loadmore_loading').removeClass('d-none');
            },
            success: function(data) {
                $('#loadmore_loading').addClass('d-none');
                if (data=='' || data=='last') {
                stload = 'last';
                $('#lmore_failalrt').html('');
                }else{
                start = parseInt(start+limit);
                $("#post-data-appned").append(data);
                }
                proses = true;
            },
            error: function(xmlhttprequest, textstatus, message) {
                $('#lmore_failalrt').html('<p class="pt-5 font-weight-bold text-center">Please check your connection...</p>');
                $('#loadmore_loading').addClass('d-none');
                proses = true;
            }
            });
        }
    </script>
    <?php } ?>

	<script>
		function getSubcategory(a,b = '') {
		$.get('<?=base_url('index/get_kabkota');?>/'+a, function(data) {
			$('#kabkota').html(data);
			if(b!=''){
				$('#kabkota').val(b);
			}
		});
		}

		$('#selectedmenunav a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
            $('#selectedmenunav a').click(function(){
            $(this).parent().addClass('active').siblings().removeClass('active')    
        });
	</script>

</body>

</html>