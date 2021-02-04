<?php

namespace App\Controllers;

use App\Models\TransaksiModel;

class Laporan extends BaseController
{
    protected $TransaksiModel;
    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Laporan',
            'transaksi' => $this->TransaksiModel->getProduk()
        ];
        return view('laporan/index', $data);
    }
}
