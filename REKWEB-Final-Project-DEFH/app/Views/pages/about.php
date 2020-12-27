<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 id="title-about">About Us.</h1>
            <h1 id="brand">Acuk Sae</h1>
            <p id="about">Acuk Sae have been running in the circles of <br>vein for several years.
                Those cycles of journey <br>have been an amazing adventures.
                Besides<br> brave thundering days, the tempering nights,<br> some cloaks
                were washed out, some bottles <br>emptied, some passions tired out.</p>
            <hr>
            <img class="icon-sosmed" src="/assets/img/about/instagram.png" width="25" height="25">
            <a href="https://www.instagram.com/hdinasution/" target="blank"  class="sosmed"> <b> acuksaeId </b></a>
            <img class="icon-sosmed" src="/assets/img/about/facebook.png" width="25" height="25">
            <a href="" class="sosmed"> <b> Acuk Sae Id </b></a>
            <img class="icon-sosmed" src="/assets/img/about/whatsapp.png" width="25" height="25">
            <a href="https://wa.me/6287860069808?text=Hallo%20Acuk%20Sae,%20Saya%20tertarik%20dengan%20produknya." target="blank" class="sosmed"> <b> 087860063808 </b></a>
            <hr>
            <h2 class="alamat">Kunjungan anda akan sangat berarti untuk kami.</h2>
            <br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.5649921972613!2d107.57354311431736!3d-6.942476569890382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8b31f92dbfb%3A0xfc7be4e6e4400c58!2sOclo.official!5e0!3m2!1sid!2sid!4v1608349939356!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <br>
            <a class="btn btn-primary w-100" href="https://goo.gl/maps/AeJrEH7dngPZoHWK7" target="blank" role="button"><b>Buka via Google Maps</b></a>
        </div>
        <div class="col">
            <img id="img1" src="/assets/img/about/store1.jpg" class="img-thumbnail" width="400px" height="400px">
            <img id="img2" src="/assets/img/about/store2.jpg" class="img-thumbnail" width="400px" height="400px">
            <img id="img3" src="/assets/img/about/store3.jpg" class="img-thumbnail" width="400px" height="400px">
        </div>
    </div>
</div>
<?= $this->endSection(); ?>