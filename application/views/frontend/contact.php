
<div class="hero2 hero3">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<div class="intro-wrap">
						<h1 class="mb-3">
                            <span class="d-block font-weight-bold">Kontak Kami</span>
                        </h1>
                        <div class="d-flex align-items-center mb-2 detail-wisata">
							<span>Temukan destinasi impianmu di satu tempat – jelajahi berbagai tempat wisata menarik dengan informasi yang lengkap dan terpercaya.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <?php if($sistem['alamat']=='' && $sistem['cs_phone']=='' && $sistem['cs_email']==''): ?>
                        <div class="col-lg-12">
                            <div class="text-center align-items-center mb-4">
                                <address class="text ft-18 justify-content-center align-items-center mb-0 font-weight-bold">
                                    Saat ini tidak ada informasi untuk ditampilkan.
                                </address>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($sistem['alamat']!=''): ?>
                        <div class="col-lg-12">
                            <div class="quick-contact-item d-flex align-items-center mb-4">
                                <span class="flaticon-house"></span>
                                <address class="text justify-content-center align-items-center mb-0 pre-line-cg">
                                    <?=$sistem['alamat'];?>
                                </address>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($sistem['cs_phone']!=''): ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="quick-contact-item d-flex align-items-center mb-4">
                                <span class="flaticon-phone-call"></span>
                                <address class="text justify-content-center align-items-center mb-0">
                                    <?=$sistem['cs_phone'];?>
                                </address>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if($sistem['cs_email']!=''): ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="quick-contact-item d-flex align-items-center mb-4">
                                <span class="flaticon-mail"></span>
                                <address class="text justify-content-center align-items-center mb-0">
                                    <?=$sistem['cs_email'];?>
                                </address>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-1 cta-section" id="tofootersection"></div>
