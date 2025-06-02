<?= $this->extend('layout') ?>
<?= $this->section('content') ?> 

<?php if (session()->getFlashData('success')) : ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('failed')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('failed') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
    Tambah Data
</button>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <button type ="button" class ="btn btn-sucsess" href ="<?= base_url('download')?> produk/download">
                        download data  </button>
            </div>
            <form action="<?= base_url('produk') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                   
                </div>
                
            </form>
        </div>
    </div>
</div>
<a type ="button" class ="btn btn-success" href ="<?= base_url('produk/download')?> ">
                        Download Data  </a>
<!-- End Add Modal -->

<br><br>

<table class="table datatable">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Foto</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($product as $index => $produk) : ?>
            <tr>
                <th scope="row"><?php echo $index + 1 ?></th>
                <td><?php echo $produk['nama'] ?></td>
                <td><?php echo $produk['harga'] ?></td>
                <td><?php echo $produk['jumlah'] ?></td>
                <td>
                    <?php if ($produk['foto'] != '' and file_exists("img/" . $produk['foto'] . "")) : ?>
                        <img src="<?php echo base_url() . "img/" . $produk['foto'] ?>" width="100px">
                    <?php endif; ?>
                </td>
                <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $produk['id'] ?>">
                        Ubah
                    </button>
                    <a href="<?= base_url('produk/delete/' . $produk['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')">
                        Hapus
                    </a>
                </td>
            </tr>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal-<?= $produk['id'] ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('produk/edit/' . $produk['id']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?= $produk['nama'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" name="harga" class="form-control" value="<?= $produk['harga'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control" value="<?= $produk['jumlah'] ?>" required>
                                </div>
                                <div class="form-group mt-2">
                                    <img src="<?php echo base_url() . "img/" . $produk['foto'] ?>" width="100px">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="check" name="check" value="1">
                                        <label class="form-check-label" for="check">
                                            Ceklis jika ingin mengganti foto
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <label>Foto Baru</label>
                                    <input type="file" class="form-control" name="foto">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Edit Modal -->

        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>
