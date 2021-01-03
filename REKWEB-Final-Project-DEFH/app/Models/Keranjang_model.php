<?php

namespace App\Models;

use CodeIgniter\Model;

class Keranjang_model extends Model
{
    protected $table = 'keranjang';
    protected $allowedFields = ['foto','slug','nama', 'category', 'harga', 'size', 'warna', 'jumlah','harga_asli'];

    public function getProduct($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        return $this->table('product')->like('nama', $keyword)->orLike('category', $keyword)->orLike('harga', $keyword);
    }

    public function categories($category)
    {
        return $this->table('product')->where(['category' => $category])->findAll();
    }

    public function latest()
    {
        return $this->table('product')->orderBy('id', 'DESC')->findAll();
    }
}
