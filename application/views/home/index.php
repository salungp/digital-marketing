<section class="banner" id="home" style="background: url(<?php echo base_url($banner['image']); ?>) center center no-repeat;background-size: cover;">
	<div class="container" style="position: relative;">
		<div class="row justify-content-center">
			<div class="col-md-6 d-flex align-items-center" style="height: 540px;">
				<div>
					<h1 class="mb-3 font-weight-bold text-center"><?php echo $banner['text']; ?></h1>
					<p class="width-100 text-center"><?php echo $banner_description['text']; ?></p>

					<div class="d-flex justify-content-center">
						<a href="#armada" class="btn btn-lg btn-success">Ayo mulai <i class="fa fa-angle-down"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section about" id="about">
	<div class="container">
    <div class="row">
      <div class="col-md-6 mb-3">
        <h2 class="section-title" data-aos="zoom-in" data-aos-delay="100">ABOUT PRAMESTHA MOUNTAIN CITY</h2>

        <p data-aos="zoom-in" data-aos-delay="300"><?php echo $tentang['text']; ?></p>

        <a href="#armada" class="btn btn-success">Learn more</a>
      </div>

      <div class="col-md-6">
      	<div class="image-preview">
      		<button class="image-preview-close"><i class="fa fa-close"></i></button>
      		<div class="image-overlay">
      			<button class="image-preview-button"><i class="fa fa-eye"></i></button>
      		</div>
	        <img data-aos="zoom-in" data-aos-delay="500" src="<?php echo base_url($tentang['image']); ?>" class="img-thumbnail" alt="<?php echo $tentang['text']; ?>">
      	</div>
      </div>
    </div>
  </div>
</section>

<section class="section armada-kami" id="armada">
	<div class="container">
		<h3 class="section-title text-center border-center" data-aos="zoom-in"><?php echo $cluster_alinda_3['text']; ?></h3>

		<div class="row">
			<?php foreach($armada as $armadaItem) : ?>
			<div class="col-md-4 mb-3">
				<div class="card" style="position: static !important">
					<div class="image-preview">
		    		<button class="image-preview-close"><i class="fa fa-close"></i></button>
		    		<div class="image-overlay">
		    			<button class="image-preview-button"><i class="fa fa-eye"></i></button>
		    		</div>
		        <img class="card-image" style="height: 200px;object-fit: cover;width: 100%;" data-aos="zoom-in" data-aos-delay="500" src="<?php echo base_url($armadaItem['image']); ?>" class="img-thumbnail" alt="<?php echo $armadaItem['text']; ?>">
		    	</div>
					<div class="card-body">
						<h5 class="card-title font-weight-bold"><?php echo $armadaItem['text']; ?></h5>
						<a href="https://api.whatsapp.com/send?phone=<?php echo $nomor_wa['text']; ?>&text=Halo%20Gemah%20Transindo%20Saya%20mau%20tanya..." class="btn btn-sm btn-success"><i class="fa fa-comments"></i> Pesan sekarang</a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section armada-kami" id="armada">
	<div class="container">
		<h3 class="section-title text-center border-center" data-aos="zoom-in"><?php echo $cluster_alinda_4['text']; ?></h3>

		<div class="row">
			<?php foreach($armada_4 as $armadaItem) : ?>
			<div class="col-md-4 mb-3">
				<div class="card" style="position: static !important">
					<div class="image-preview">
		    		<button class="image-preview-close"><i class="fa fa-close"></i></button>
		    		<div class="image-overlay">
		    			<button class="image-preview-button"><i class="fa fa-eye"></i></button>
		    		</div>
		        <img class="card-image" style="height: 200px;object-fit: cover;width: 100%;" data-aos="zoom-in" data-aos-delay="500" src="<?php echo base_url($armadaItem['image']); ?>" class="img-thumbnail" alt="<?php echo $armadaItem['text']; ?>">
		    	</div>
					<div class="card-body">
						<h5 class="card-title font-weight-bold"><?php echo $armadaItem['text']; ?></h5>
						<a href="https://api.whatsapp.com/send?phone=<?php echo $nomor_wa['text']; ?>&text=Halo%20Gemah%20Transindo%20Saya%20mau%20tanya..." class="btn btn-sm btn-success"><i class="fa fa-comments"></i> Pesan sekarang</a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section layanan" id="show-unit">
	<div class="container">
		<div class="row">
			<div class="col-md-6" data-aos="zoom-in">
				<h2 class="section-title"><?php echo $layanan_section['text']; ?></h2>
				
				<p><?php echo $layanan_text['text']; ?></p>
			</div>
			<div class="col-md-6">
				<div data-aos="zoom-in" data-aos-delay="300" style="background: url(<?php echo base_url($tentang['image']); ?>) center center no-repeat; background-size: cover;" class="video-wrapper img-thumbnail d-flex justify-content-center align-items-center video-section">
					<div class="video-overlay overlay-green"></div>
					<button type="button" class="play-video">
						<i class="fa fa-play"></i>
					</button>
					<video class="d-none video-obj" controls>
						<source src="<?php echo base_url($layanan_section['image']); ?>" type="video/mp4">
					</video>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section layanan" id="fasilitas">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div data-aos="zoom-in" data-aos-delay="300" style="background: url(<?php echo base_url($tentang['image']); ?>) center center no-repeat; background-size: cover;" class="video-wrapper img-thumbnail d-flex justify-content-center align-items-center video-section">
					<div class="video-overlay overlay-green"></div>
					<button type="button" class="play-video">
						<i class="fa fa-play"></i>
					</button>
					<video class="d-none video-obj" controls>
						<source src="<?php echo base_url($fasilitas['image']); ?>" type="video/mp4">
					</video>
				</div>
			</div>
			<div class="col-md-6" data-aos="zoom-in">
				<h2 class="section-title"><?php echo $fasilitas['parent']; ?></h2>
				
				<p><?php echo $fasilitas['text']; ?></p>
			</div>
		</div>
	</div>
</section>

<section class="section why" style="border-bottom: 1px solid rgba(0,0,0,.1);">
	<div class="container">
		<h2 class="section-title text-center border-center" data-aos="zoom-in">Pricing</h2>

		<div class="row">
			<?php $pricing_status = ['regular' => 1, 'advance' => 2, 'premium' => 3]; ?>
			<?php foreach($pricing as $k) : ?>
			<div class="col-md-4">
				<div class="box-pricing" data-aos="zoom-in">
					<div class="pricing-header d-flex align-items-center justify-content-center">
						<h3 class="price font-weight-bold">Rp. <?php echo number_format($k['text'], 0, ',', '.'); ?></h3>
					</div>

					<div class="pricing-body">
						<?php $pricing_list = $this->db->get_where('pricing', ['type' => $pricing_status[$k['parent']]])->result_array(); ?>

						<ul>
							<?php foreach($pricing_list as $key) : ?>
								<?php if ($key['status'] == 1) : ?>
									<li><i style="color: green;" class="fa fa-check"></i> <?php echo $key['text']; ?></li>
								<?php else : ?>
									<li style="text-decoration: line-through;color: #666"><i style="color: red;" class="fa fa-close"></i> <?php echo $key['text']; ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>

					<div class="pricing-footer d-flex justify-content-center p-3">
						<a href="tel:+<?php echo $nomor_wa['text']; ?>" class="btn btn-primary">Contact now</a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="section promo" id="promo">
	<div class="container">
		<h2 class="section-title border-center text-center" data-aos="zoom-in">Special booking and promo</h2>

		<div class="owl-carousel promo-items owl-theme">
			<?php foreach($promo as $k) : ?>
			<div class="promo-item card card-custom mt-3 mb-5" data-aos="zoom-in">
				<div class="card-image">
					<img src="<?php echo base_url($k['image']); ?>" alt="Promo image">
				</div>
				<div class="card-text">
					<?php echo (strlen($k['text']) > 90) ? substr($k['text'], 0, 90) . '...' : $k['text']; ?>
				</div>
				<div class="card-actions">
					<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-<?php echo $k['id']; ?>">
					 	Detail
					</button>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>	
</section>
<?php foreach ($promo as $k) : ?>
<!-- Modal -->
<div class="modal fade" id="modal-<?php echo $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body promo-data">
      	<img src="<?php echo $k['image']; ?>" class="img-thumbnail" alt="<?php echo $k['title']; ?>">
        <p><?php echo $k['text'] ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        <a href="https://api.whatsapp.com/send?phone=<?php echo $nomor_wa['text']; ?>&text=Halo%20Saya%20mau%20tanya..." class="btn btn-success"><i class="fa fa-comment"></i> Pesan sekarang</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<section class="section kontak" id="kontak">
	<div class="container">
		<h2 class="section-title" data-aos="zoom-in">Kontak kami</h2>
		<div class="row justify-content-between">
			<div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
				<h4><?php echo $kontak_atas['title']; ?></h4>
				<p><?php echo $kontak_atas['text']; ?></p>
			</div>
			<div class="col-md-3" data-aos="zoom-in" data-aos-delay="400">
				<?php foreach($kontak_list as $key) : ?>
					<div>- <?php echo $key['text']; ?></div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<button type="button" class="back-to-top bg-success">
	<i class="fa fa-chevron-up"></i>
</button>
<footer>
	<div class="container">
		©2020 <?php echo $footer['text']; ?>
	</div>
</footer>