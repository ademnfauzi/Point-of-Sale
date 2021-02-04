<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\PemasokModel;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;


class Kasir extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->PelangganModel = new PelangganModel();
        $this->PemasokModel = new PemasokModel();
        $this->ProdukModel = new ProdukModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard Kasir',
            'pelanggan' => $this->PelangganModel->getCount(),
            'pemasok' => $this->PemasokModel->getCount(),
            'produk' => $this->ProdukModel->getCount(),
        ];
        return view('kasir/index', $data);
    }
}
