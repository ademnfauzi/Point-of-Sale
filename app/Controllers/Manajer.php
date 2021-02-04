<?php

namespace App\Controllers;

use App\Models\TransaksiModel;


class Manajer extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard Manajer',
            'transaksi' => $this->TransaksiModel->getCount()
        ];
        return view('manajer/index', $data);
    }
}
