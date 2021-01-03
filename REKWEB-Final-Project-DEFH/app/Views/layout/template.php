<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title><?= $title; ?></title>
</head>

<body>

    <!-- NAVBAR START -->
    <?= $this->include('layout/navbar'); ?>
    <!-- NAVBAR END -->

    <!-- CONTENT START -->
    <?= $this->renderSection('content'); ?>
    <!-- CONTENT END -->

    <footer class="bg-dark text-white" id="footer">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <p style="margin-top: 10px;">Tugas Besar Rekayasa Web <br> Has Been Created By &#128102; </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->
    <scrip src="/js/main.js"></scrip>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChacQVbmmlSaCHYHOQQlkk17E9__CgAjc&liblaries=places"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

    <script>
        function previewImg() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            const fileFoto = new FileReader();

            fileFoto.readAsDataURL(foto.files[0]);

            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

        function generateHargaProduk(nilai) {
            var jumlah = document.getElementById('jumlah').value;

            if (jumlah < 1) {
                jumlah = 1;
                document.getElementById('jumlah').value = jumlah;
            } else {
                var hasil = nilai * jumlah;
                document.getElementById('harga_produk').innerHTML = "<h1 class='mt-5' id='harga_produk'><span class=' ket-harga'>IDR </span> <b>" + hasil + "</b> <span class='ket-harga'>K</span></h1>"
                document.getElementById('total_price').value = hasil;
            }
        }

        document.getElementById('provinsi').addEventListener('change', function() {
            fetch("<?= base_url('rajaongkir/kota') ?>/" + this.value, {
                    method: 'GET',
                })
                .then((response) => response.text())
                .then((data) => {
                    document.getElementById('kota').innerHTML = data
                })
        })

        function kurirJneSelected() {
            var kota = document.getElementById('kota').value;

            if (kota == "") {
                var ongkir = document.getElementById('ongkir').innerHTML = " ";
                alert("Pilih Kota Tujuan terlebih dahulu.");
            } else {
                var ongkir = document.getElementById('ongkir').innerHTML = "Rp." + 12000 + ",-";
                var ongkirHidden = document.getElementById('ongkirTagihan').innerHTML = "Ongkir : <b>IDR 12K</b>"
            }
        }

        function kurirPosSelected() {
            var kota = document.getElementById('kota').value;

            if (kota == "") {
                var ongkir = document.getElementById('ongkir').innerHTML = " ";
                alert("Pilih Kota Tujuan terlebih dahulu.");
            } else {
                var value = document.getElementById('ongkir').innerHTML = "Rp." + 15000 + ",-";
                var ongkirHidden = document.getElementById('ongkirTagihan').innerHTML = "Ongkir : <b>IDR 15K</b>";
            }
        }

        function kurirTikiSelected() {
            var kota = document.getElementById('kota').value;

            if (kota == "") {
                var ongkir = document.getElementById('ongkir').innerHTML = " ";
                alert("Pilih Kota Tujuan terlebih dahulu.");
            } else {
                var value = document.getElementById('ongkir').innerHTML = "Rp." + 11000 + ",-";
                var ongkirHidden = document.getElementById('ongkirTagihan').innerHTML = "Ongkir : <b>IDR 11K</b>";
            }
        }

        // Set the date we're counting down to
        var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
                minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
</body>

</html>