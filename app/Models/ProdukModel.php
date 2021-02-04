<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class ProdukModel extends Model
{

    protected $table = 'produk';
    protected $allowedFields = ['np_produk', 'nama_produk', 'kategori_produk', 'harga', 'stok', 'image'];

    public function getProduk($np_produk = false)
    {
        if ($np_produk == false) {
            # code...
            return $this->findAll();
        }

        return $this->where(['np_produk' => $np_produk])->first();
    }
    public function getCount()
    {
        // $db      = \Config\Database::connect();
        // $query = $db->query("SELECT COUNT(id) FROM user");
        $query = $this->db->table('produk')->countAllResults();
        return $query;
    }

    public function getId($np_produk)
    {
        return $this->where(['np_produk' => $np_produk])->first();
    }
    public function del($np_produk)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('produk');
        $builder->delete(['np_produk' => $np_produk]);
    }
    public function getEdit($np_produk, $data)
    {
        $query = $this->db->table('produk')->update($data, array('np_produk' => $np_produk));
        return $query;
    }
    public function search($keyword)
    {
        return $this->table('produk')->like('nama_produk', $keyword)->orLike('np_produk', $keyword);
    }
}
