<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: 9e83f52b5c0eae123a2b7abdab5ca21c"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $provinsi = json_decode($response, true);
}

?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Keranjang belanja</h1>
            <h2 id="sub-title"> Check kembali belanjaan anda sebelum Checkout.</h2>
        </div>
    </div>
    <?php if (logged_in()) : ?>
        <div class="row">
            <div class="row">
                <div class="col">
                    <form action="" method="GET">
                        <div class="input-group mt-3">
                            <input type="text" class="form-control" placeholder="Cari nama,kategori,harga produk disini..." name="keyword">
                            <button class="btn btn-outline-secondary" type="submit" name="submit">Cari produk</button>
                        </div>
                    </form>
                    <?php if (session()->getFlashData('pesan')) : ?>
                        <div class="alert alert-success mt-3" role="alert">
                            <?= session()->getFlashData('pesan'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php
            $item = 0;
            $totalHarga = 0;
            ?>
            <?php foreach ($product as $p) : ?>
                <div class="col-md-4 mt-3">
                    <div class="card mt-3" style="width: 18rem;">
                        <img src="/assets/img/product/<?= $p['category']; ?>/<?= $p['foto'] ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><b><?= $p['nama']; ?></b></h5>
                            <p class="card-text">Category : <?= $p['category']; ?></p>
                            <h5 class="card-text">Harga : <span style="color:green;"><b>IDR <?= $p['harga']; ?>K</b></span> </h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><img src="/assets/img/keranjang/size.png" width="20" height="20" style="margin-left:5px; margin-right:10px;">Ukuran : <b><?= $p['size']; ?></b></li>
                            <li class="list-group-item"><img src="/assets/img/keranjang/color.png" width="20" height="20" style="margin-left:5px; margin-right:10px;">Warna : <b><?= $p['warna']; ?></b></li>
                            <li class="list-group-item"><img src="/assets/img/keranjang/quantity.png" width="20" height="20" style="margin-left:5px; margin-right:10px;">Jumlah : <b><?= $p['jumlah']; ?></b> x <?= $p['harga_asli']; ?>K</li>
                        </ul>
                        <div class="card-body">
                            <div class="btn-action">
                                <form action="/keranjang/<?= $p['id']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash" style="margin-right: 10px;"></i>Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $item++; ?>
                <?php $totalHarga += $p['harga']; ?>
            <?php endforeach; ?>
        </div>
        <hr>
        <?php if ($item == 0) : ?>
            <div class="row mt-5">
                <div class="col">
                    <img src="/assets/img/keranjang/cart.png" width="200" height="200" style="margin-left: 40%; margin-bottom:20px;">
                    <h5 id="sub-title" style="margin-bottom:50px; text-align:center;">Keranjang anda kosong...</h5>
                </div>
            </div>
        <?php else : ?>
            <div class="row mt-5">
                <div class="col">
                    <h5 style="font-size:35px;">Total : <span style="font-size: 40px; color:green;"><b>IDR <?= $totalHarga; ?>K</b></span> </h5>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#modalCheckout" style="font-size: 20px;"><b>Checkout</b></button>
                </div>
            </div>
        <?php endif; ?>

        <!-- Modal -->
        <div class="modal fade" id="modalCheckout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Checkout</b></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>Form pengiriman produk</h5>
                        <form action="/pages/keranjang" method="POST">
                            <?= csrf_field(); ?>
                            <div class="row mb-3 mt-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('nama'); ?>" placeholder="nama penerima">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control " id="alamat" name="alamat"> <?= old('alamat'); ?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-3 mt-3">
                                        <label class="input-group-text" for="provinsi">Provinsi</label>
                                        <select class="form-select" id="provinsi" name="provinsi">
                                            <option selected>pilih provinsi...</option>
                                            <?php if ($provinsi['rajaongkir']['status']['code'] == 200) : ?>
                                                <?php foreach ($provinsi['rajaongkir']['results'] as $pv) : ?>
                                                    <option value="<?= $pv['province_id']; ?>"><?= $pv['province']; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="kota">Kota</label>
                                        <select class="form-select" id="kota" name="kota">
                                            <option value="" selected>pilih kota...</option>

                                        </select>
                                    </div>
                                    <h3 id="sub-title" style="margin-top: 30px;">Kurir : </h3>
                                    <div class="form-check mt-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="jne" value="jne" name="kurir" onclick="kurirJneSelected()">
                                            <img src="/assets/img/keranjang/jne.png" width="100" height="50">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="pos" value="pos" name="kurir" onclick="kurirPosSelected()">
                                            <img src="/assets/img/keranjang/pos.jpg" width="80" height="50">
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="tiki" value="tiki" name="kurir" onclick="kurirTikiSelected()">
                                            <img src="/assets/img/keranjang/tiki.png" width="100" height="50">
                                        </div>
                                    </div>

                                    <h3 id="sub-title" class="mt-3" style="margin-top: 30px;">Ongkos Kirim : </h3>
                                    <h3 id="ongkir"></h3>
                                </div>
                            </div>
                    </div>
                    <hr>
                    <h5 style="font-size: 30px; margin-left:20px;">Total : <span style="font-size: 30px; color:green;"><b>IDR <?= $totalHarga; ?>K</b></span> <i style="font-size: 15px; margin-left:350px;">Belum termasuk ongkir.</i></h5>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success w-50" data-bs-toggle="modal" data-bs-target="#payment"><b>Bayar</b></button>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="payment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Payment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <h3 id="sub-title">Tagihan : </h3>
                                    <div class="row">
                                        <dic class="col">
                                            <h4 id="ongkirTagihan"></h4>
                                        </dic>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h4>Total harga : <b>IDR <?= $totalHarga; ?>K</b></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <h3 id="sub-title">Pembayaran via Transfer : </h3>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <img src="/assets/img/keranjang/bca.png" width="80" height="40" style="display: inline-block; margin-top:10px;">
                                            <h5 style="display: inline-block; margin-left:20px;">No Rekening : 158656221</h5>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <img src="/assets/img/keranjang/mandiri.png" width="80" height="40" style="display: inline-block; margin-top:10px;">
                                            <h5 style="display: inline-block; margin-left:20px;">No Rekening : 1589 63254 89932</h5>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <img src="/assets/img/keranjang/bjb.png" width="80" height="40" style="display: inline-block; margin-top:10px;">
                                            <h5 style="display: inline-block; margin-left:20px;">No Rekening : 2365 2584 2698</h5>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h3 id="sub-title" style="margin-top: 30px;">Lakukan pembayaran sebelum :</h3>
                            <p id="demo"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel pembayaran</button>
                            <button type="button" class="btn btn-success w-50"><b>Konfirmasi Pembayaran</b></button>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <img src="/assets/img/keranjang/exit.png" width="200" height="200" style="margin-left: 40%; margin-bottom:20px; margin-top:50px;">
            <div class="alert alert-warning" style="text-align: center;" role="alert">
                <b>Anda belum Login...</b>
            </div>
        <?php endif; ?>
        </div>
</div>
<?= $this->endSection(); ?>