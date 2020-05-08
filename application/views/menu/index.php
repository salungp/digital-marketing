<?php
// set table
$table = [
  'title' => 'Menu',
  'theme' => 'striped',
  'search' => false,
  'width' => 12
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
        <h4 class="modal-title">Tambah menu</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('menu/create'); ?>" method="post">
          <div class="form-group">
            <label for="text">Teks</label>
            <input type="text" name="text" id="text" class="form-control" placeholder="Masukkan teks" required>
          </div> 

          <div class="form-group">
            <label for="link">Link</label>
            <input type="text" name="link" id="link" class="form-control" placeholder="Masukkan link" required>
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
    <th>Teks</th>
    <th>Link</th>
  </tr>
</thead>

<tbody>
  <?php $no = 1; ?>
  <?php foreach($menu as $key) : ?>

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
          <form action="<?php echo base_url('menu/update/'.$key['id']); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="text">Teks</label>
              <input type="text" name="text" id="text" class="form-control" placeholder="Masukkan teks" value="<?php echo $key['text']; ?>" required>
            </div> 

            <div class="form-group">
              <label for="link">Link</label>
              <input type="text" name="link" id="link" class="form-control" placeholder="Masukkan link" value="<?php echo $key['link']; ?>" required>
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
          <a href="<?php echo base_url('menu/delete/'.$key['id']); ?>" class="btn btn-danger">Hapus</a>
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
      <td><?php echo $key['text']; ?></td>
      <td><?php echo $key['parent']; ?></td>
    </tr>
  <?php endforeach; ?>
</tbody>

<?php $this->load->view('templates/table_simple_close'); ?>