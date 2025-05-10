
<div class="hero2 hero3">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<div class="intro-wrap">
						<h1 class="mb-3">
                            <span class="d-block font-weight-bold">Pertanyaan yang Sering Diajukan (FAQ)</span>
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
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4">
					<?php if(!$d_faqs): ?>
                    <div class="text-center align-items-center mb-4">
                        <address class="text ft-18 justify-content-center align-items-center mb-0 font-weight-bold">
                            Saat ini tidak ada informasi untuk ditampilkan.
                        </address>
                    </div>
                    <?php endif; ?>
                    <div class="">
                        <?php foreach($d_faqs as $row): ?>
                        <div class="mb-3">
                            <div class="ft-16 font-weight-bold mb-1">
                                <?=$row['nama_faq'];?>
                            </div>
                            <div class="ft-14">
                                <?=$row['deskripsi'];?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
				</div>
			</div>
		
    	</div>
	</div>

    <div class="py-1 cta-section" id="tofootersection"></div>
