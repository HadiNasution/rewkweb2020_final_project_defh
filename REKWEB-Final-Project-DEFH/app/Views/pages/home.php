<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col mt-5">
            <h1 id="home-quote">Fashion <br> <span id="mid-quote">Made</span> <br> Simple</h1>
            <a class="btn btn-dark w-100 mt-4" href="/pages/trends" role="button" id="btn-shop">Shop Now</a>
        </div>
        <div class="col" id="hero-img">
            <img src="/assets/img/home/hero-img.png" width="450px" height="700px">
        </div>
    </div>
</div>



<?= $this->endSection(); ?>