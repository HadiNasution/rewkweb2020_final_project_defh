<?php

namespace App\Controllers;

use App\Models\Product_model;

class Product extends BaseController
{
    protected $productModel;
    public function __construct()
    {
        $this->productModel = new Product_model();
    }

    public function index(){

        $product = $this->productModel->findAll();
        $data = [
            'title' => 'Daftar Product | Acuk Sae',
            'product' => $product
        ];


        return view('pages/test', $data);
    }
}
?>