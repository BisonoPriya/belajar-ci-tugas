<?= $this->extend('layout') ?>
<?= $this->section('content') ?> 



<?php if (session()->getFlashData('success')) : ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashData('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
<?php endif; ?>


<?php if (session()->getFlashData('errors')) : ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= is_array(session()->getFlashData('errors')) 
        ? implode('<br>', session()->getFlashData('errors'))
        : session()->getFlashData('errors'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
<?php endif; ?>


<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
  Tambah Diskon
</button>


<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="<?= base_url('diskon/store') ?>" method="post">
        <?= csrf_field(); ?>
        <div class="modal-header">
          <h5 class="modal-title">Tambah Diskon</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-2">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="<?= old('tanggal') ?>" class="form-control" required>
          </div>
          <div class="form-group mb-2">
            <label>Nominal Diskon</label>
            <input type="number" name="nominal" value="<?= old('nominal') ?>" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Tanggal</th>
      <th>Nominal</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($diskon) : ?>
      <?php $no = 1; foreach ($diskon as $row) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $row['tanggal'] ?></td>
          <td>Rp <?= number_format($row['nominal'], 0, ',', '.') ?></td>
          <td>
            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal-<?= $row['id'] ?>">Edit</button>
            <a href="<?= base_url('diskon/delete/' . $row['id']) ?>" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>

      
        <div class="modal fade" id="editModal-<?= $row['id'] ?>" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <form action="<?= base_url('diskon/update/' . $row['id']) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="modal-header">
                  <h5 class="modal-title">Edit Diskon</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <div class="form-group mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" value="<?= $row['tanggal'] ?>" class="form-control" readonly>
                  </div>
                  <div class="form-group mb-2">
                    <label>Nominal Diskon</label>
                    <input type="number" name="nominal" value="<?= $row['nominal'] ?>" class="form-control" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <tr>
        <td colspan="6" class="text-center">Belum ada data diskon.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

>
<?php if (session()->getFlashData('errors')) : ?>
  <script>
    var addModal = new bootstrap.Modal(document.getElementById('addModal'));
    addModal.show();
  </script>
<?php endif; ?>

<?= $this->endSection() ?>
