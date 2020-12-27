<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mt-5">
        <div class="col">
            <h1>Categories.</h1>
            <h2 id="sub-title">Kami menyediakan 4 kategori.<br> Temukan produk yang cocok untuk mu.</h2>
        </div>
    </div>
    <div class="row ">
        <div class="col mt-3">
            <div class="card">
                <img src="/assets/img/categories/clothes.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title display-2">Clothes</h5>
                    <p class="card-text">Jelajahi koleksi baju terbaik kami <br> Tersedia untuk Pria, Wanita dan juga Anak-anak, dengan model simple dan nyaman dipakai.</p>
                    <a href="/pages/detail_category/clothes" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
        </div>
        <div class="col mt-3">
            <div class="card">
                <img src="/assets/img/categories/pants.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title display-2">Pants</h5>
                    <p class="card-text">Pastikan anda menemukan Celana paling bagus dan nyaman disini <br> Tersedia untuk Pria, Wanita dan juga Anak-anak, dengan model simple dan nyaman dipakai.</p>
                    <a href="/pages/detail_category/pants" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col mt-5">
            <div class="card">
                <img src="/assets/img/categories/shoes.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title display-2">Shoes</h5>
                    <p class="card-text">Kami menyediakan banyak pilihan untuk Sepatu terbaik <br> Sneakers, Sport atau Slip-on adalah 3 jenis Sepatu terpopuler <br> dari brand Adidas, Naiki, dan Airwalk </p>
                    <a href="/pages/detail_category/shoes" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
        </div>
        <div class="col mt-5">
            <div class="card">
                <img src="/assets/img/categories/bags.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title display-2">Bags</h5>
                    <p class="card-text">Tas terbaik terbuat dari material import siap untuk anda bawa pulang <br> Tersedia Tas kantor, Outdoor, Sekolah, Party dan Tas tangan, dengan model simple dan elegan.</p>
                    <a href="/pages/detail_category/bags" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>