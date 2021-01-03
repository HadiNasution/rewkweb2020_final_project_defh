<?php

//Kelas Controller, yang mengatur semua data logic dari model dan views yang ada di Pages.

namespace App\Controllers;

use App\Models\Product_model;
use App\Models\Keranjang_model;

class Pages extends BaseController
{
    public function __construct()
    {
        // variable referensi dari Model, disimpan di konstruktor karna akan sering dipakai
        $this->productModel = new Product_model();
        $this->keranjangModel = new Keranjang_model();
    }

    //method untuk views Home
    public function index()
    {
        $data = [
            'title' => 'Home | Acuk Sae' //akan mengirim data 'title'
        ];

        return view('pages/home', $data); //alihkan ke view pages/home dengan mengirim 'data'
    }

    //method untuk views categories
    public function categories()
    {
        $data = [
            'title' => 'Categories | Acuk Sae'
        ];

        return view('pages/categories', $data);
    }

    // method untuk views detail category
    public function detail_category($category)
    {

        $data = [
            'title' => 'Product ' . $category . ' | Acuk Sae',
            'product' => $this->productModel->categories($category),
            'category' => $category
        ];

        return view('pages/detail_category', $data);
    }

    //method untuk views Shop
    public function trends()
    {

        // logic untuk fitur search
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $product = $this->productModel->search($keyword);
        } else {
            $product = $this->productModel;
        }

        $data = [
            'title' => 'Shop | Acuk Sae',
            'product' => $product->findAll()
        ];

        return view('pages/shop', $data);
    }

    //method untuk views detail produk
    public function detail_product($slug)
    {

        $data = [
            'title' => 'Detail Product | Acuk Sae',
            'product' => $this->productModel->getProduct($slug)
        ];

        return view('pages/detail_product', $data);
    }

    //method untuk views new
    public function new()
    {

        $data = [
            'title' => 'New Arrival | Acuk Sae',
            'product' => $this->productModel->latest()
        ];

        return view('pages/new', $data);
    }

    //method untuk views about
    public function about()
    {
        $data = [
            'title' => 'About Us | Acuk Sae'
        ];

        return view('pages/about', $data);
    }

    //method untuk views contact
    public function contact()
    {
        $data = [
            'title' => 'Contact Us | Acuk Sae'
        ];

        return view('pages/contact', $data);
    }

    //method untuk views login
    public function login()
    {
        $data = [
            'title' => 'Login | Acuk Sae'
        ];

        return view('pages/login', $data);
    }


    //method untuk views dashboard
    public function dashboard()
    {
        // mendapatkan angka dari halaman yang aktif
        $currentPage = $this->request->getVar('page_product') ?  $this->request->getVar('page_product') : 1;

        // logic untuk fitur search
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $product = $this->productModel->search($keyword);
        } else {
            $product = $this->productModel;
        }

        $data = [
            'title' => 'Dashboard Admin | Acuk Sae',
            // 'product' => $this->productModel->findAll()
            'product' => $product->paginate(5, 'product'),
            'pager' => $this->productModel->pager,
            'currentPage' => $currentPage
        ];

        return view('pages/dashboard', $data);
    }

    //method untuk views detail
    public function detail($slug)
    {

        $data = [
            'title' => 'Detail Produk | Acuk Sae',
            'product' => $this->productModel->getProduct($slug)
        ];

        return view('pages/detail', $data);

        //jika produk tidak ada di tabel
        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk' . $slug . 'tidak ditemukan.');
        }
    }

    //method untuk views create
    public function create()
    {

        $data = [
            'title' => 'Tambah Produk Baru | Acuk Sae',
            'validation' => \Config\Services::validation()
        ];

        // pages ganti ke product
        return view('pages/create', $data);
    }

    //method untuk fitur save
    public function save()
    {

        //validasi input
        if (!$this->validate([
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto produk harus di cantumkan.',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Format gambar tidak di dukung'
                ]
            ],
            'nama' => 'required|is_unique[product.nama]',
            'deskripsi' => 'required',
            'harga' => 'required'
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/pages/create')->withInput()->with('validation',$validation);

            // jika proses gagal, arahkan kembali ke view create
            return redirect()->to('/pages/create')->withInput();
        }

        // untuk mendapatkan kategory produk
        $categoryFoto = $this->request->getVar('category');
        
        // mendapatkan file foto dari produk baru
        $fotoProduk = $this->request->getFile('foto');

        // menyimpan file foto produk base on category
        $fotoProduk->move('assets/img/product/' . $categoryFoto);

        // mendapatkan nama file foto produk baru
        $namaFoto = $fotoProduk->getName();
        
        // mgenerate slug baru untuk produk baru
        $slug = url_title($this->request->getVar('nama'), '-', true);


        // save ke database
        $this->productModel->save([
            'foto' => $namaFoto,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'category' => $this->request->getVar('category'),
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi')
        ]);


        // kirim session untuk pesan ke user
        session()->setFlashData('pesan', 'Produk berhasil ditambahkan.');

        // jika proses selesai, arahkan ke view dashboard kembali
        return redirect()->to('/pages/dashboard');
    }

    //method untuk fitur delete
    public function delete($id)
    {
        $this->productModel->delete($id);
        session()->setFlashData('pesan', 'Produk berhasil dihapus.');
        return redirect()->to('/pages/dashboard');
    }

    //method untuk views edit
    public function edit($slug)
    {
        $data = [
            'title' => 'Ubah Data Produk | Acuk Sae',
            'validation' => \Config\Services::validation(),
            'product' => $this->productModel->getProduct($slug)
        ];

        // pages ganti ke product
        return view('pages/edit', $data);
    }

    //method untuk views update
    public function update($id)
    {

        //cek nama produk
        $namaLama = $this->productModel->getProduct($this->request->getVar('slug'));
        if ($namaLama['nama'] == $this->request->getVar('nama')) {
            $ruleBaru = 'required';
        } else {
            $ruleBaru = 'required|is_unique[product.nama]';
        }

        //validasi input
        if (!$this->validate([
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Format gambar tidak di dukung'
                ]
            ],
            'nama' => $ruleBaru,
            'deskripsi' => 'required',
            'harga' => 'required'
        ])) {
            return redirect()->to('/pages/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fotoProduk = $this->request->getFile('foto');

        // untuk mendapatkan kategory produk
        $categoryFoto = $this->request->getVar('category');

        // cek gambar, pake gambar lama atau upload baru?
        if ($fotoProduk->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            $namaFoto = $fotoProduk->getName();

            //upload gambar
            $fotoProduk->move('assets/img/product/' . $categoryFoto, $namaFoto);
        }

        $slug = url_title($this->request->getVar('nama'), '-', true);

        // save ke database
        $this->productModel->save([
            'id' => $id,
            'foto' => $namaFoto,
            'nama' => $this->request->getVar('nama'),
            'slug' => $slug,
            'category' => $this->request->getVar('category'),
            'harga' => $this->request->getVar('harga'),
            'deskripsi' => $this->request->getVar('deskripsi')
        ]);

        session()->setFlashData('pesan', 'Produk berhasil diubah.');

        return redirect()->to('/pages/dashboard');
    }

    public function keranjang()
    {
        // logic untuk fitur search
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $product = $this->keranjangModel->search($keyword);
        } else {
            $product = $this->keranjangModel;
        }

        // cek ongkir
        $kotaTujuan = $this->request->getVar('kota');
        $kurir = $this->request->getVar('kurir');

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=23&destination=" . $kotaTujuan . "&weight=1700&courier=" . $kurir,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 9e83f52b5c0eae123a2b7abdab5ca21c"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response;
            $layanan = json_decode($response,true);
        }

        $data = [
            'title' => 'Keranjang | Acuk Sae',
            'product' => $product->latest(),
        ];

        return view('pages/keranjang', $data);
    }

    public function setKeranjang()
    {
        $slug = $this->request->getVar('slug');
        $size = $this->request->getVar('size');
        $warna = $this->request->getVar('warna');
        $jumlah = $this->request->getVar('jumlah');

        if($size==null | $warna==null| $jumlah==null){
            session()->setFlashData('pesan', 'Pilih Ukuran, Warna dan Jumlah.');
            return redirect()->to('/pages/detail_product/'.$slug);
        }else{
            $this->keranjangModel->save([
                'slug'  => $slug,
                'foto' => $this->request->getVar('foto'),
                'jumlah'   => $this->request->getVar('jumlah'),
                'harga' => $this->request->getVar('total_price'),
                'harga_asli' => $this->request->getVar('real_price'),
                'category' => $this->request->getVar('category'),
                'nama'  => $this->request->getVar('nama'),
                'size'  => $this->request->getVar('size'),
                'warna' => $this->request->getVar('warna')
            ]);
            

            // kirim session untuk pesan ke user
            session()->setFlashData('pesan', 'Produk berhasil ditambahkan.');

            // jika proses selesai, arahkan ke view dashboard kembali
            return redirect()->to('/pages/keranjang');
        }
    }

    public function deleteItem($id){
        $this->keranjangModel->delete($id);
        session()->setFlashData('pesan', 'Produk berhasil dihapus.');
        return redirect()->to('/pages/keranjang');
    }

    public function ongkir(){
        //$data['ongkir'] = '';

        
    }

    public function kota($provinsi)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=".$provinsi,
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
            $kota = json_decode($response, true);

            if($kota['rajaongkir']['status']['code'] == 200){
                foreach($kota['rajaongkir']['results'] as $kt){
                    echo "<option value='$kt[city_id]'> $kt[city_name] </option>";
                }
            }
        }
    }
}
