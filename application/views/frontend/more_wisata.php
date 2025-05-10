<?php foreach($d_wisata_more as $row): ?>
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