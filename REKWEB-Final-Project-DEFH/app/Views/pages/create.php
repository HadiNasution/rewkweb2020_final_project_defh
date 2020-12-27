<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="mt-3">Tambah Produk Baru.</h2>
            <br>
            <form action="/pages/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Foto produk</label>
                    <div class="col-sm-10">
                        <div class="col-sm2">
                            <img src="/assets/img/product/default.png" class="img-thumbnail img-preview" width="100" height="200">
                        </div>
                        <div class="mb-2">
                            <label for="foto" class="form-label"></label>
                            <input class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto" onchange="previewImg()">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('foto'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Desripsi</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="deskripsi" name="deskripsi"><?= old('deskripsi'); ?>
                        </textarea>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Kategori</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="clothes" value="clothes" checked>
                            <label class="form-check-label" for="clothes">
                                Clothes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="pants" value="pants">
                            <label class="form-check-label" for="pants">
                                Pants
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="shoes" value="shoes">
                            <label class="form-check-label" for="shoes">
                                Shoes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="bags" value="bags">
                            <label class="form-check-label" for="bags">
                                Bags
                            </label>
                        </div>
                    </div>
                </fieldset>
                <div class="row mb-3">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= old('harga'); ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Tambah produk</button>
            </form>
            <i class="fa fa-angle-left" style="margin-top: 40px;" id="icon-back-detail"></i>
            <a href="/pages/dashboard" id="back-to-list-product">Kembali ke daftar produk.</a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>