<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\PemasokModel;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->PelangganModel = new PelangganModel();
        $this->PemasokModel = new PemasokModel();
        $this->ProdukModel = new ProdukModel();
        $this->TransaksiModel = new TransaksiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin',
            'user' => $this->UserModel->getCount(),
            'pelanggan' => $this->PelangganModel->getCount(),
            'pemasok' => $this->PemasokModel->getCount(),
            'produk' => $this->ProdukModel->getCount(),
            'transaksi' => $this->TransaksiModel->getCount(),
        ];
        return view('admin/index', $data);
    }
}
