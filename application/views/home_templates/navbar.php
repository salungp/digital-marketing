<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">
      <img src="<?php echo base_url($logo['image']); ?>" height="60">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <?php foreach ($menu as $k) : ?>
        <a class="nav-item nav-link active" href="<?php echo $k['parent']; ?>"><?php echo $k['text']; ?></a>
        <?php endforeach; ?>
        <a class="nav-item btn btn-success" href="https://api.whatsapp.com/send?phone=<?php echo $nomor_wa['text']; ?>&text=Halo%20Saya%20mau%20tanya..."><i class="fa fa-comment"></i> Chat via WA</a>
        <a class="nav-item btn btn-primary" href="tel:+<?php echo $nomor_wa['text']; ?>"><i class="fa fa-phone"></i> Via telepon</a>
      </div>
    </div>
  </div>
</nav>