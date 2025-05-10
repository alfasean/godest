
	<div class="hero" id="hero">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<div class="intro-wrap">
						<h1 class="mb-5"><span class="d-block"><?=$sistem['header_lg'];?> </span> <span class="small"><?=$sistem['header_sm'];?></span></h1>
						<div class="row">
							<div class="col-12">
								<form class="form transparent-form" action="<?=base_url('s?');?>" method="GET">
									<div class="row mb-2">
										<div class="col-sm-12 col-md-12 mb-3 mb-lg-0 col-lg-6">
											<input type="text" class="form-control" name="slug" placeholder="Cari tempat wisata disini...">
										</div>
										<div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-3">
											<select name="provinsi" class="form-control custom-select" onChange="getSubcategory(this.value)">
												<option value="">-- Provinsi --</option>
												<?php foreach($d_provinsi as $row): ?>
												<option value="<?=$row['id'];?>"><?=$row['name'];?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-3">
											<select name="kabkota" id="kabkota" class="form-control custom-select">
												<option value="">-- Kabupaten / Kota --</option>
											</select>
										</div>
									</div>
									<div class="text-white mt-2 mb-2">
										Jika kolom <b>Provinsi</b> atau <b>Kabupaten / Kota</b> tidak diisi maka sistem akan mencari dari seluruh wilayah yang ada.
									</div>
									<div class="row align-items-center justify-content-center">
										<div class="col-sm-12 col-md-6 mt-3 mb-3 mb-lg-0 col-lg-4">
											<input type="submit" class="btn btn-primary btn-block font-weight-bold" value="Lihat Hasil Pencarian">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="untree_co-section">
		<div class="container">
			<div class="row justify-content-center text-center mb-5">
				<div class="col-lg-6">
					<h2 class="section-title text-center mb-3">Wisata Paling Populer</h2>
					<p>Berikut ini adalah rekomendasi tempat-tempat wisata menarik yang bisa Anda kunjungi bersama keluarga tercinta untuk menciptakan momen liburan yang berkesan dan penuh kebahagiaan.</p>
				</div>
			</div>
			<div class="row" id="post-data-appned">
        		<?php foreach($d_wisata as $row): ?>
				<div class="col-6 col-sm-6 col-md-4 col-lg-3 mb-4">
					<div class="media-1">
						<a href="<?=base_url('d/'.$row['slug']);?>" class="d-block mb-3"><img src="<?=base_url($row['fotoutama']);?>" alt="Foto utama" class="img-fluid custom-image-fit"></a>
						<span class="d-flex align-items-center loc mb-2">
							<span class="icon-room mr-3"></span>
							<span><?=$row['nama_kabkota'];?></span>
						</span>
						<div class="d-flex align-items-center">
							<div>
								<h3 class="dua-baris"><a href="<?=base_url('d/'.$row['slug']);?>"><?=$row['nama_wisata'];?></a></h3>
								<div class="price ml-auto">
									<span class="icon-star mr-2"></span><span><?=$row['rating'];?></span>
								</div>
							</div>
							
						</div>
						
					</div>
				</div>
        		<?php endforeach; ?>
			</div>

			<div id="loadmore_loading" class="text-center d-none">
				<p class="mb-0 pt-4">
					<img src="<?=base_url('assets/frontend/images/loading_gif.gif');?>" alt="" width="120">
				</p>
			</div>
			<div id="lmore_failalrt"></div>
		
    	</div>
	</div>

	<div class="py-5 cta-section" id="tofootersection">
		<div class="container">
			<div class="row text-center">
				<div class="col-md-12">
					<h2 class="mb-2 text-white"><?=$sistem['m_1'];?></h2>
					<p class="mb-4 lead text-white text-white-opacity"><?=$sistem['m_2'];?></p>
					<p class="mb-0">
						<a href="#hero" class="btn btn-outline-white text-white btn-md font-weight-bold"><?=$sistem['m_3'];?></a>
					</p>
				</div>
			</div>
		</div>
	</div>