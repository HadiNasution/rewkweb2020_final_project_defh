<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Login</h1>
            <br>
            <div class="form-login">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="alamat email terdaftar.">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1">
                </div>
                <br>
                <a href="" class="btn btn-primary"><b>Login</b></a>
            </div>
        </div>
        <div class="col">
            <div class="vertical-line-login"></div>

            <div class="form-regist">
                <h1>Register</h1>
                <h2 id="sub-title">Bergabung sebagai member kami, banyak untung nya.</h2>
                <br>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="alamat email terdaftar.">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nama panggilan anda.">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1">
                </div>
                <br>
                <button type="button" class="btn btn-primary"><b>Register</b></button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>