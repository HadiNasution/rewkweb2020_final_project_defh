<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mt-5">
        <h1>Categories <?= $category; ?>.</h1>
        <h2 id="sub-title">Outfit berkualitas, mulai dari piyama, pakaian olahraga dan casual.</h2>

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