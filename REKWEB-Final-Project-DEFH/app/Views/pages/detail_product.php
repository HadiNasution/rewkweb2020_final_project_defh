<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Detail Produk</h1>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <img class="img-thumbnail" src="/assets/img/product/<?= $product['category']; ?>/<?= $product['foto'] ?>" width="400">
            <br>
            <i class="fa fa-angle-left" style="margin-top: 40px;" id="icon-back-detail"></i>
            <a href="/pages/trends" id="back-to-list-product">Kembali ke Shop.</a>
        </div>
        <div class="col">
            <h1><?= $product['nama']; ?></h1>
            <span id="diskon" class="badge bg-warning text-dark mb-3">New</span>
            <span id="diskon" class="badge bg-info text-dark">Diskon 20%</span>
            <br>
            <h2 id="sub-title"><?= $product['deskripsi']; ?></h2>
            <br>
            <?php if (session()->getFlashData('pesan')) : ?>
                <div class="alert alert-warning mt-3" role="alert">
                    <?= session()->getFlashData('pesan'); ?>
                </div>
            <?php endif; ?>
            <form action="/pages/setKeranjang" method="POST">
                <input type="hidden" name="slug" value=<?= $product['slug']; ?>>
                <input type="hidden" name="foto" value=<?= $product['foto']; ?>>
                <input type="hidden" name="nama" value="<?= $product['nama']; ?>">
                <input type="hidden" name="category" value=<?= $product['category']; ?>>
                <input type="hidden" name="harga" value=<?= $product['harga']; ?>>
                <h3 id="sub-title">Ukuran : </h3>
                <div class="form-check mt-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="s" value="S" name="size">
                        <label class="form-check-label" for="size"><b>S</b></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="m" value="M" name="size">
                        <label class="form-check-label" for="inlineCheckbox2"><b>M</b></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="l" value="L" name="size">
                        <label class="form-check-label" for="size"><b>L</b></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="xl" value="XL" name="size">
                        <label class="form-check-label" for="size"><b>XL</b></label>
                    </div>
                </div>
                <br>
                <h3 id="sub-title">Warna : </h3>
                <div class="form-check mt-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="warna" value="Lapis Blue" name="warna">
                        <div id="lapis-blue"></div>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="warna" value="Primsoe Yellow" name="warna">
                        <div id="primsoe-yellow"></div>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="warna" value="Dimgray" name="warna">
                        <div id="dimgray"></div>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="warna" value="Black" name="warna">
                        <div id="black"></div>
                    </div>
                </div>
                <br>
                <h3 id="sub-title">Jumlah : </h3>
                <input type="number" class="form-control w-50" id="jumlah" name="jumlah" value="1" onchange="generateHargaProduk(<?= $product['harga']; ?>)" />
                <br>

                <h1 class="mt-5" id="harga_produk"><span class="ket-harga">IDR </span> <b><?= $product['harga']; ?></b> <span class="ket-harga">K</span></h1>
                <input type="hidden" name="total_price" id="total_price" value="<?= $product['harga']; ?>">
                <input type="hidden" name="real_price" id="real_price" value="<?= $product['harga']; ?>">
                <?php if (logged_in()) : ?>
                    <button type="submit" id="btn_keranjang" class="btn btn-success mt-3 w-100"><i class="fa fa-shopping-cart" style="margin-right: 10px;"></i>Masukan keranjang</button>
                <?php else : ?>
                    <button id="btn_keranjang" class="btn btn-success mt-3 w-100" disabled><i class="fa fa-shopping-cart" style="margin-right: 10px;"></i>Masukan keranjang</button>
                    <br><br>
                    <div class="alert alert-warning" style="text-align: center;" role="alert">
                        <b>Anda belum Login...</b>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>