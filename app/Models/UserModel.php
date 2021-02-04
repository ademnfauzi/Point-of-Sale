<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table = 'user';
    protected $allowedFields = ['np_user', 'nama', 'email', 'password', 'role', 'jenis_kelamin', 'alamat', 'image'];

    public function getUser($np_user = false)
    {
        if ($np_user == false) {
            # code...
            return $this->findAll();
        }

        return $this->where(['np_user' => $np_user])->first();
    }
    public function getCount()
    {
        // $db      = \Config\Database::connect();
        // $query = $db->query("SELECT COUNT(id) FROM user");
        $query = $this->db->table('user')->countAllResults();
        return $query;
    }

    public function getEmail($email)
    {
        return $this->where(['email' => $email])->first();
    }
    public function del($np_user)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->delete(['np_user' => $np_user]);
    }
    public function getEdit($np_user, $data)
    {
        $query = $this->db->table('user')->update($data, array('np_user' => $np_user));
        return $query;
    }
}
