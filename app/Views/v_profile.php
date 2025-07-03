<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

History Transaksi Pembelian <strong><?= esc($username) ?></strong>
<hr>

<div class="table-responsive">
    <!-- Table with stripped rows -->
    <table class="table datatable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID Pembelian</th>
                <th scope="col">Waktu Pembelian</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Alamat</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($buy)) : ?>
                <?php foreach ($buy as $index => $item) : ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td><?= esc($item['id']) ?></td>
                        <td><?= esc($item['created_at']) ?></td>
                        <td><?= number_to_currency($item['total_harga'], 'IDR') ?></td>
                        <td><?= esc($item['alamat']) ?></td>
                        <td><?= ($item['status'] == "1") ? "Sudah Selesai" : "Belum Selesai" ?></td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#detailModal-<?= $item['id'] ?>">
                                Detail
                            </button>
                        </td>
                    </tr>

                    <!-- Detail Modal Begin -->
                    <div class="modal fade" id="detailModal-<?= $item['id'] ?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php if (!empty($product) && !empty($product[$item['id']])) : ?>
                                        <?php foreach ($product[$item['id']] as $index2 => $item2) : ?>
                                            <?= $index2 + 1 ?>)
                                            <?php if (!empty($item2['foto']) && file_exists("img/" . $item2['foto'])) : ?>
                                                <img src="<?= base_url() . "img/" . $item2['foto'] ?>" width="100px">
                                            <?php endif; ?>
                                            <strong><?= esc($item2['nama']) ?></strong><br>
                                            <?= number_to_currency($item2['harga'], 'IDR') ?><br>
                                            (<?= $item2['jumlah'] ?> pcs)<br>
                                            <?= number_to_currency($item2['subtotal_harga'], 'IDR') ?>
                                            <hr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <p class="text-muted">Tidak ada detail transaksi.</p>
                                    <?php endif; ?>
                                    Ongkir: <?= number_to_currency($item['ongkir'], 'IDR') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Detail Modal End -->

                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <!-- End Table with stripped rows -->
</div>

<?= $this->endSection() ?>
