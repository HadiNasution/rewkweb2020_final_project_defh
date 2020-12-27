<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/assets/img/shop/banner1.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="/assets/img/shop/banner2.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="/assets/img/shop/banner3.jpg" class="d-block w-100">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>
<div class="container">
    <div class="row mt-5">
        <h1>Shop.</h1>
        <h2 id="sub-title">Belanja lebih menyenangkan dengan kami.</h2>
        <div class="row">
            <div class="col">
                <form action="" method="GET">
                    <div class="input-group mt-3">
                        <input type="text" class="form-control" placeholder="Cari nama,kategori,harga produk disini..." name="keyword">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari produk</button>
                    </div>
                </form>
            </div>
        </div>
        <?php foreach ($product as $p) : ?>
            <div class="col-md-4">
                <div class="card mt-5" style="width: 18rem;">
                    <img src="/assets/img/product/<?= $p['category']; ?>/<?= $p['foto'] ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?= $p['nama'] ?></h5>
                        <p class="card-text"><?= $p['deskripsi'] ?></p>
                        <a href="#" class="card-link" id="harga-shop"><b>IDR <?= $p['harga'] ?> K</b></a>
                        <a href="/pages/detail_product/<?= $p['slug']; ?>" class="card-link" id="btn-buy-shop"><b>Buy Now</b></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>