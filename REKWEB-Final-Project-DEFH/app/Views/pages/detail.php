<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3>Detail Produk</h3>
            <div class="card mb-3 mt-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/assets/img/product/<?= $product['category']; ?>/<?= $product['foto'] ?>" width="230" height="350">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="detail-product">
                                <h4 class="card-title" id="nama-detail"><b><?= $product['nama'] ?></b></h4>
                                <p class="card-text" id="desripsi-detail"><?= $product['deskripsi'] ?></p>
                                <h4 class="card-text" id="harga-detail"><b>IDR <?= $product['harga'] ?>K</b></h4>
                                <div class="btn-action">
                                    <a href="/dashboard/edit/<?= $product['slug']; ?>" class="btn btn-secondary"><i class="fa fa-pencil" style="margin-right: 10px;"></i>Ubah</a>
                                    <form action="/dashboard/<?= $product['id']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash" style="margin-right: 10px;"></i>Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <i class="fa fa-angle-left" id="icon-back-detail"></i>
            <a href="/pages/dashboard" id="back-to-list-product">Kembali ke daftar produk.</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>