
	<div class="hero2">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-12">
					<div class="intro-wrap">
						<h1 class="mb-3">
              <span class="d-block font-weight-bold"><?=$d_detail['nama_wisata'];?></span>
            </h1>
            <div class="d-flex align-items-center mb-2 detail-wisata">
							<span class="icon-room mr-2 icon-detail"></span>
							<span class="satu-baris"><?=$d_detail['alamat_wisata'];?></span>
						</div>
            <div class="d-flex align-items-center mb-2 detail-wisata">
							<span class="icon-clock-o mr-2 icon-detail"></span>
							<span class="satu-baris">Informasi Jam Operasional <a href="#embedmap" id="scrollLink" class="text-price font-weight-bold">Lihat Disini</a></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

  <div class="untree_co-section-detail">
		<div class="container">

			<div class="owl-carousel owl-galeri-slider">

        <?php foreach($d_detail['galeri'] as $row): ?>
				<div class="item">
					<a class="media-thumb" href="<?=base_url($row['foto']);?>" data-fancybox="gallery" data-no-clone>
						<img src="<?=base_url($row['foto']);?>" alt="Galeri_<?=$row['foto_id'];?>" class="img-fluid custom-image-fit-2">
					</a> 
				</div>
        <?php endforeach; ?>

			</div>
      
      <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 order-2 order-md-1">

          <div class="bg-rat rounded-10 p-2 pl-3 pr-3 mt-3">
            <div class="d-flex align-items-center">
              <div class="icon-star mr-3 ft-20 text-rat"></div>
              <div class="ft-18 font-weight-bold text-rat mr-4">
                <div class="ft-12 font-weight-bold text-333">Rating</div>
                <span class="ft-18"><?=$d_detail['rating'];?></span><span class="ft-14">&nbsp;/&nbsp;5</span>
              </div>
              <div class="ft-18 font-weight-bold text-rat mr-4 d-visi-768">
                <div class="ft-12 font-weight-bold text-333">Ulasan</div>
                <a href="#ulasanwisata">
                  <span class="ft-18 mr-2"><?=$d_detail['ulasan'];?></span><span class="ft-14">Lihat ulasan...</span>
                </a>
              </div>
              <div class="d-flex align-items-center d-none-768">
                <div class="font-weight-bold ft-16">
                  <a href="#ulasanwisata" class="text-333">
                    <div class="ft-12">
                      (<?=$d_detail['ulasan'];?>) Ulasan
                    </div>
                    Tulis ulasan Anda tentang pengalaman Anda di sini....
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="bg-sec w-100 rounded-10 p-3 mt-3">
            <div class="text-black font-weight-bold ft-16 mb-2">Informasi Wisata</div>
            <div class="innerhtml"><?=$d_detail['deskripsi_wisata'];?></div>
          </div>

          <?php if($d_detail['nomor_resmi']!='' || $d_detail['situs_resmi']!=''): ?>
          <div class="bg-sec w-100 rounded-10 p-3 mt-3 d-visi-768" id="jamoperational">
            <div class="text-black font-weight-bold ft-16 mb-2">Informasi Kontak</div>
            <?php if($d_detail['nomor_resmi']!=''): ?>
            <div class="">Kontak : <?=$d_detail['nomor_resmi'];?></div>
            <?php endif; ?>
            <?php if($d_detail['situs_resmi']!=''): ?>
            <div class="">Situs Resmi : <a href="<?=$d_detail['situs_resmi'];?>" target="_blank">Klik disini...</a></div>
            <?php endif; ?>
          </div>
          <?php endif; ?>
          
          <?php if($d_detail['embed_map']!=''): ?>
          <div class="mt-3 w-100 d-visi-768" id="embedmap0">
            <?=$d_detail['embed_map'];?>
          </div>
          <?php endif; ?>

          <?php if($d_detail['is_jadwal']=='y'): ?>
          <div class="bg-sec w-100 rounded-10 p-3 mt-3 d-visi-768">
            <div class="text-black font-weight-bold ft-16 mb-2">Jam Operasional</div>
            <table class="table table-striped">
              <tr>
                  <th>Hari</th>
                  <th>Jam</th>
              </tr>
              <tr>
                  <td>Senin</td>
                  <td><?=$d_detail['senin'];?></td>
              </tr>
              <tr>
                  <td>Selasa</td>
                  <td><?=$d_detail['selasa'];?></td>
              </tr>
              <tr>
                  <td>Rabu</td>
                  <td><?=$d_detail['rabu'];?></td>
              </tr>
              <tr>
                  <td>Kamis</td>
                  <td><?=$d_detail['kamis'];?></td>
              </tr>
              <tr>
                  <td>Jumat</td>
                  <td><?=$d_detail['jumat'];?></td>
              </tr>
              <tr>
                  <td>Sabtu</td>
                  <td><?=$d_detail['sabtu'];?></td>
              </tr>
              <tr>
                  <td>Minggu</td>
                  <td><?=$d_detail['minggu'];?></td>
              </tr>
            </table>

            <div class=""><?=$d_detail['info_jadwal'];?></div>
          </div>
          <?php endif; ?>

          <div class="text-black font-weight-bold ft-16 mt-4 mb-2">Wisata Terakit / Mungkin Anda Suka</div>

          <div class="owl-carousel owl-galeri-slider-s">
            <?php foreach($d_terkait as $row): ?>
            <div class="item">
              <a href="<?=base_url('d/'.$row['slug']);?>" class="media-thumb">
              <div class="media-text">
                <h3 class="dua-baris"><?=$row['nama_wisata'];?></h3>
                <span class="location"><?=$row['nama_kabkota'];?></span>
              </div>
                <img src="<?=base_url($row['fotoutama']);?>" alt="" class="img-fluid custom-image-fit-3">
              </a> 
            </div>
            <?php endforeach; ?>
          </div>
                      
          <!-- Kolom Komentar -->
          <div class="comment-section-detail" id="ulasanwisata">
            
            <div class="pb-2">
              <div class="global-content-title ft-18">
                Ulasan (<?=$d_detail['ulasan'];?>)
              </div>
            </div>

            <?php if ($this->session->flashdata('message')) { ?>
              <div class="alert alert-<?=$this->session->flashdata('msg_color');?> mt-3" role="alert">
              <?=$this->session->flashdata('message');?>
              </div>
            <?php } ?>
            
            <div class="comment-box-container">
              <?php foreach ($ulasans as $rowulasan): ?>
                <div class="comment-box">
                  <div class="single-comment-detail">
                    <div class="comment-author-detail"><?= $rowulasan['nama_lengkap']; ?></div>
                    <?php if($rowulasan['rating']>0){ ?>
                    <div class="d-flex align-items-center">
                      <div class="icon-star mr-2 ft-14 text-rat" style="margin-top:-1px;"></div>
                      <div class="ft-14 font-weight-bold text-rat">
                        <span class="ft-14"><?=$rowulasan['rating'];?></span><span class="ft-14">&nbsp;/&nbsp;5</span>
                      </div>
                    </div>
                    <?php } ?>
                    <div class="comment-time-detail"><?= tgl_date($rowulasan['created_at']) . ', ' . substr($rowulasan['created_at'], 11, 5) ?> WIB</div>
                    <div class="comment-text-detail"><?= nl2br($rowulasan['ulasan_text']) ?></div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

            <!-- Show "Load More Comments" button if there are more comments to load -->
            <?php if (count($ulasans) == 3): ?>
            <div class="text-center pt-4">
              <button class="btn btn-primary py-2 load-more-comments">Lihat ulasan lainnya</button>
            </div>
            <?php endif; ?>

            <!-- Form Komentar -->
            <div class="comment-box-detail mt-4 mb-4">
              <form id="ulasanForm" action="<?= site_url('destination/save_ulasan') ?>" method="POST">
                <input type="hidden" name="wisata_id" value="<?= $d_detail['wisata_id'] ?>" required>
                <input type="hidden" name="wisata_slug" value="<?= $d_detail['slug'] ?>" required>
                <input type="hidden" name="ip" value="<?=$dataip;?>" required>
                <?php if ($existing_rating){ ?>
                  <div class="alert alert-info mt-2">
                      Anda sudah memberikan rating <?= $existing_rating ?> ⭐ untuk wisata ini.
                  </div>
                  <input type="hidden" name="rating" value="">
                <?php }else{ ?>
                  <div class="form-group mb-0">
                    <div class="rating-ulasan float-left">
                        <?php for($i=5; $i>=1; $i--): ?>
                            <input type="radio" id="star<?=$i?>" name="rating" value="<?=$i?>" <?= ($existing_rating == $i) ? 'checked' : '' ?>>
                            <label for="star<?=$i?>">&#9733;</label>
                        <?php endfor; ?>
                    </div>
                  </div>
                <?php } ?>
                  

                <div class="form-group">
                    <input type="text" name="nama_lengkap" value="<?=$existing_nama;?>" class="form-control" placeholder="Nama lengkap..." autocomplete="off" required>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="ulasan_text" placeholder="Tulis ulasan Anda di sini..." required></textarea>
                </div>

                <div class="pt-1">
                    <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 order-xs-1 order-1 order-md-2">
          <?php if($d_detail['harga_wisata']!=''): ?>
          <div class="bg-price w-100 rounded-10 p-3 mt-3">
            <div class="ft-12 font-weight-bold text-333">Tiket Harga Mulai Dari</div>
            <div class="ft-18 font-weight-bold text-price"><?=$d_detail['harga_wisata'];?></div>
          </div>
          <?php endif; ?>

          <?php if($d_detail['nomor_resmi']!='' || $d_detail['situs_resmi']!=''): ?>
          <div class="bg-sec w-100 rounded-10 p-3 mt-3 d-none-768" id="jamoperational">
            <div class="text-black font-weight-bold ft-16 mb-2">Informasi Kontak</div>
            <?php if($d_detail['nomor_resmi']!=''): ?>
            <div class="">Kontak : <?=$d_detail['nomor_resmi'];?></div>
            <?php endif; ?>
            <?php if($d_detail['situs_resmi']!=''): ?>
            <div class="">Situs Resmi : <a href="<?=$d_detail['situs_resmi'];?>" target="_blank">Klik disini...</a></div>
            <?php endif; ?>
          </div>
          <?php endif; ?>
          
          <?php if($d_detail['embed_map']!=''): ?>
          <div class="mt-3 w-100 d-none-768" id="embedmap">
            <?=$d_detail['embed_map'];?>
          </div>
          <?php endif; ?>

          <?php if($d_detail['is_jadwal']=='y'): ?>
          <div class="bg-sec w-100 rounded-10 p-3 mt-3 d-none-768">
            <div class="text-black font-weight-bold ft-16 mb-2">Jam Operasional</div>
            <table class="table table-striped">
              <tr>
                  <th>Hari</th>
                  <th>Jam</th>
              </tr>
              <tr>
                  <td>Senin</td>
                  <td><?=$d_detail['senin'];?></td>
              </tr>
              <tr>
                  <td>Selasa</td>
                  <td><?=$d_detail['selasa'];?></td>
              </tr>
              <tr>
                  <td>Rabu</td>
                  <td><?=$d_detail['rabu'];?></td>
              </tr>
              <tr>
                  <td>Kamis</td>
                  <td><?=$d_detail['kamis'];?></td>
              </tr>
              <tr>
                  <td>Jumat</td>
                  <td><?=$d_detail['jumat'];?></td>
              </tr>
              <tr>
                  <td>Sabtu</td>
                  <td><?=$d_detail['sabtu'];?></td>
              </tr>
              <tr>
                  <td>Minggu</td>
                  <td><?=$d_detail['minggu'];?></td>
              </tr>
            </table>

            <div class=""><?=$d_detail['info_jadwal'];?></div>
          </div>
          <?php endif; ?>

        </div>
      </div>

		</div>
	</div>

  <div class="py-1 cta-section" id="tofootersection"></div>

  <!-- JavaScript to handle "Load more comments" functionality -->
  <script type="text/javascript">

    var page_ulasan = 1;

    $(document).ready(function() {
        // When the "Load more comments" button is clicked
        $(".load-more-comments").click(function() {
          page_ulasan += 1;
          var ulasan_slug = '<?= $d_detail['slug'] ?>';
          
          var button = $(this);
          button.prop("disabled", true);
          button.text("Loading...");

          // Fetch the next page of comments via AJAX
          $.ajax({
              url: "<?= base_url('d/') ?>" + ulasan_slug + "/" + page_ulasan, // Memperbarui URL dengan rute yang benar
              method: "GET",
              success: function(response) {
                  console.log(response);
                  // Ambil komentar yang baru dan tambahkan ke container komentar
                  var new_comments = $(response).find('.comment-box');
                  $(".comment-box-container").append(new_comments);
                  
                  // Jika tidak ada tombol "Load More", artinya tidak ada komentar lagi
                  if ($(response).find('.load-more-comments').length == 0) {
                      button.remove();
                  } else {
                      button.prop("disabled", false);
                      button.text("Lihat ulasan lainnya");
                  }
              }
          });
        });
      });
      
      <?php if (!$existing_rating){ ?>
      document.getElementById('ulasanForm').addEventListener('submit', function(e) {
          let ratingChecked = document.querySelector('input[name="rating"]:checked');
          if (!ratingChecked) {
              e.preventDefault(); // cegah submit
              alert("Silakan pilih rating terlebih dahulu.");
          }
      });
      <?php }; ?>

      document.getElementById('scrollLink').addEventListener('click', function(e) {
        e.preventDefault(); // Cegah default scroll
        const isMobile = window.innerWidth <= 767.98;
        const targetId = isMobile ? 'embedmap0' : 'embedmap';
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
          targetElement.scrollIntoView({ behavior: 'smooth' });
        }
      });

  </script>
