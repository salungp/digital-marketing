<?php
// set table
$table = [
  'title' => 'Pricing',
  'theme' => 'striped',
  'search' => true,
  'width' => 12,
  'search_url' => base_url('pricing/search')
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
        <h4 class="modal-title">Tambah pricing list</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('pricing/create'); ?>" method="post">
          <div class="form-group">
            <label for="text">Teks</label>
            <input type="text" name="text" id="text" class="form-control" placeholder="Masukkan teks" required>
          </div> 

          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
              <option>-pilih-</option>
              <option value="1">available</option>
              <option value="0">not available</option>
            </select>
          </div> 

          <div class="form-group">
            <label for="type">Tipe</label>
            <select name="type" id="type" class="form-control">
              <option>-pilih-</option>
              <option value="1">Regular</option>
              <option value="2">Advance</option>
              <option value="3">Premium</option>
            </select>
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
    <th>Status</th>
    <th>Type</th>
  </tr>
</thead>

<tbody>
  <?php $no = 1; ?>
  <?php foreach($pricing as $key) : ?>

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
          <form action="<?php echo base_url('pricing/update/'.$key['id']); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="text">Teks</label>
              <input type="text" name="text" id="text" class="form-control" placeholder="Masukkan teks" value="<?php echo $key['text']; ?>" required>
            </div> 

            <div class="form-group">
              <label for="status">Status</label>
              <select name="status" id="status" class="form-control">
                <option>-pilih-</option>
                <option value="1" <?php echo $key['status'] == 1 ? 'selected' : ''; ?>>available</option>
                <option value="0" <?php echo $key['status'] == 0 ? 'selected' : ''; ?>>not available</option>
              </select>
            </div> 

            <div class="form-group">
              <label for="type">Tipe</label>
              <select name="type" id="type" class="form-control">
                <option>-pilih-</option>
                <option value="1" <?php echo $key['type'] == 1 ? 'selected' : ''; ?>>Regular</option>
                <option value="2" <?php echo $key['type'] == 2 ? 'selected' : ''; ?>>Advance</option>
                <option value="3" <?php echo $key['type'] == 3 ? 'selected' : ''; ?>>Premium</option>
              </select>
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
          <a href="<?php echo base_url('pricing/delete/'.$key['id']); ?>" class="btn btn-danger">Hapus</a>
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
      <td>
        <?php
          switch ($key['status']) {
            case 1:
              echo '<span class="label label-success">Available</span>';
              break;
            
            case 0:
              echo '<span class="label label-danger">Not Available</span>';
              break;
          }
        ?>  
      </td>
      <td>
        <?php
          switch ($key['type']) {
            case 1:
              echo '<span class="label label-default">Regular</span>';
              break;
            
            case 2:
              echo '<span class="label label-warning">Advance</span>';
              break;

            case 3:
              echo '<span class="label label-primary">Premium</span>';
              break;
          }
        ?>  
      </td>
    </tr>
  <?php endforeach; ?>
</tbody>

<?php $this->load->view('templates/table_simple_close'); ?>