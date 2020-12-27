<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Contact Us.</h1>
            <h2 id="sub-title"> Kami akan sangat senang membantu anda.</h2>
            <br>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="alamat email yang dapat di hubungi.">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Pesan anda</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <br>
            <button type="button" class="btn btn-primary"><b>Kirim pesan</b></button>
        </div>
        <div class="col">
            <div class="vertical-line"></div>

            <div class="sosmed-group">
                <img class="icon-sosmed-contact" src="/assets/img/about/instagram.png" width="40" height="40">
                <a href="https://www.instagram.com/hdinasution/" target="blank" class="sosmed-contact"> <b> acuksaeId </b></a>
                <br>
                <img class="icon-sosmed-contact" src="/assets/img/about/facebook.png" width="40" height="40">
                <a href="" class="sosmed-contact"> <b> Acuk Sae Id </b></a>
                <br>
                <img class="icon-sosmed-contact" src="/assets/img/about/whatsapp.png" width="40" height="40">
                <a href="https://wa.me/6287860069808?text=Hallo%20Acuk%20Sae,%20Saya%20tertarik%20dengan%20produknya." target="blank" class="sosmed-contact"> <b> 087860069808 </b></a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>