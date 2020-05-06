<?php
// set table
$table = [
  'title' => 'Promo',
  'theme' => 'striped',
  'search' => true,
  'width' => 8,
  'search_url' => base_url('promo/search')
];
?>

<button style="margin-bottom: 20px;" type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create">
  <i class="fa fa-plus"></i>
</button>

<!-- modal create -->
<div class="modal fade" id="modal-create">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah promo list</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('promo/create'); ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="text">Teks</label>
            <textarea name="text" id="text" class="form-control" placeholder="Masukkan teks" required></textarea>
          </div> 
          <div class="form-group">
            <label>Gambar</label>
            <div class="image-upload-wrapper" style="background: #888;background-size: cover !important;"> 
              <label for="image-upload"><i class="fa fa-pencil"></i></label>
              <input type="file" name="image" onchange="previewImage()" id="image-upload" placeholder="Password">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="row">
  <div class="col-md-<?php echo $table['width']; ?>">
    <?php echo $this->session->flashdata('message'); ?>
  </div>
</div>

<?php $this->load->view('templates/table_simple_open', ['table' => $table]); ?>

<thead>
  <tr>
    <th style="width: 10px">No</th>
    <th style="width: 80px;">Aksi</th>
    <th>Isi</th>
    <th>Gambar</th>
  </tr>
</thead>

<tbody>
  <?php $no = 1; ?>
  <?php foreach($promo as $key) : ?>

  <!-- modal edit -->
  <div class="modal fade" id="modal-edit-<?php echo $key['id']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit content</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('promo/update/'.$key['id']); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="text">Teks</label>
              <textarea name="text" id="text" class="form-control" placeholder="Masukkan teks" required><?php echo $key['text']; ?></textarea>
            </div> 
            <div class="form-group">
              <label>Gambar</label>
              <div class="image-upload-wrapper" style="background: url(<?php echo base_url($key['image']); ?>) center center no-repeat !important;background-size: cover !important;"> 
                <label for="image-upload"><i class="fa fa-pencil"></i></label>
                <input type="file" name="image" onchange="previewImage()" id="image-upload" placeholder="Password">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <!-- modal hapus -->
  <div class="modal fade" id="modal-delete-<?php echo $key['id']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus content?</h4>
        </div>
        <div class="modal-body">
          <p>Anda yakin mau menghapus content <?php echo $key['title']; ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <a href="<?php echo base_url('promo/delete/'.$key['id']); ?>" class="btn btn-danger">Hapus</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

    <tr>
      <td><?php echo $no++; ?>.</td>
      <td>
        <div class="btn-group">
          <!-- button edit -->
          <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-edit-<?php echo $key['id']; ?>">
            <i class="fa fa-pencil"></i>
          </button>

          <!-- button delete -->
          <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-delete-<?php echo $key['id']; ?>">
            <i class="fa fa-trash"></i>
          </button>
        </div>
      </td>
      <td><?php echo htmlspecialchars($key['text']); ?></td>
      <td>
       <img src="<?php echo base_url($key['image']); ?>" class="img-thumbnail" width="100"> 
      </td>
    </tr>
  <?php endforeach; ?>
</tbody>

<?php $this->load->view('templates/table_simple_close'); ?>