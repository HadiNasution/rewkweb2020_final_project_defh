<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>Daftar Produk</h1>
            <form action="" method="GET">
                <div class="input-group mt-3">
                    <input type="text" class="form-control" placeholder="Cari nama,kategori,harga produk disini..." name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari produk</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <br>
            <?php if (session()->getFlashData('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashData('pesan'); ?>
                </div>
            <?php endif; ?>
            <a class="btn btn-primary mt-3" href="/pages/create" role="button"><i class="fa fa-folder"></i>&nbsp;&nbsp;Tambah produk baru</a>
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto produk</th>
                        <th scope="col">Nama produk</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (6 * ($currentPage - 1)); ?>
                    <?php foreach ($product as $p) : ?>
                        <tr>
                            <th class="data-table" scope="row"><?= $i++; ?></th>
                            <td class="data-table"><img src="/assets/img/product/<?= $p['category']; ?>/<?= $p['foto'] ?>" width="50" height="100"></td>
                            <td class="data-table">
                                <p><b><?= $p['nama'] ?></b></p>
                            </td>
                            <td>
                                <a class="btn btn-success" href="/dashboard/<?= $p['slug'] ?>" role="button"><i class="fa fa-bars"></i>&nbsp;&nbsp;Detail produk</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('product', 'product_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>