<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Keranjang belanja</h1>
            <h2 id="sub-title"> Check kembali belanjaan anda sebelum Checkout.</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card mt-3" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nama produk</h5>
                    <p class="card-text">Deskripsi produk</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Ukuran</li>
                    <li class="list-group-item">Warna</li>
                    <li class="list-group-item">Jumlah</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Checkout</a>
                    <a href="#" class="card-link">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>