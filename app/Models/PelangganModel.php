<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class PelangganModel extends Model
{

    protected $table = 'pelanggan';
    protected $allowedFields = ['np_pelanggan', 'nama', 'email', 'jk', 'no_telepon', 'alamat', 'image'];

    public function getPelanggan($np_pelanggan = false)
    {
        if ($np_pelanggan == false) {
            # code...
            return $this->findAll();
        }

        return $this->where(['np_pelanggan' => $np_pelanggan])->first();
    }
    public function getCount()
    {
        // $db      = \Config\Database::connect();
        // $query = $db->query("SELECT COUNT(id) FROM user");
        $query = $this->db->table('pelanggan')->countAllResults();
        return $query;
    }

    public function getId($np_pelanggan)
    {
        return $this->where(['np_pelanggan' => $np_pelanggan])->first();
    }
    public function del($np_pelanggan)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pelanggan');
        $builder->delete(['np_pelanggan' => $np_pelanggan]);
    }
    public function getEdit($np_pelanggan, $data)
    {
        $query = $this->db->table('pelanggan')->update($data, array('np_pelanggan' => $np_pelanggan));
        return $query;
    }
    public function search($keyword)
    {
        return $this->table('pelanggan')->like('nama', $keyword)->orLike('np_pelanggan', $keyword);
    }
}
