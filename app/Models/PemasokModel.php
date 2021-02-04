<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class PemasokModel extends Model
{

    protected $table = 'pemasok';
    protected $allowedFields = ['np_pemasok', 'nama', 'email', 'no_telepon', 'alamat', 'image'];

    public function getPemasok($np_pemasok = false)
    {
        if ($np_pemasok == false) {
            # code...
            return $this->findAll();
        }

        return $this->where(['np_pemasok' => $np_pemasok])->first();
    }
    public function getCount()
    {
        // $db      = \Config\Database::connect();
        // $query = $db->query("SELECT COUNT(id) FROM user");
        $query = $this->db->table('pemasok')->countAllResults();
        return $query;
    }

    public function getId($np_pemasok)
    {
        return $this->where(['np_pemasok' => $np_pemasok])->first();
    }
    public function del($np_pemasok)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pemasok');
        $builder->delete(['np_pemasok' => $np_pemasok]);
    }
    public function getEdit($np_pemasok, $data)
    {
        $query = $this->db->table('pemasok')->update($data, array('np_pemasok' => $np_pemasok));
        return $query;
    }
}
