<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{

    protected $PelangganModel;
    protected $ProdukModel;
    protected $TransaksiModel;
    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
        $this->ProdukModel = new ProdukModel();
        $this->PelangganModel = new PelangganModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Transaksi',
            'produk' => $this->ProdukModel->getProduk(),
            'pelanggan' => $this->PelangganModel->getPelanggan()
        ];
        // dd($data);
        return view('transaksi/index', $data);
    }
    public function save()
    {
        $this->TransaksiModel->save([
            'no_transaksi' => 'MP11111',
            'np_produk' => $this->request->getVar('np_produk'),
            'np_pelanggan' => $this->request->getVar('pelanggan'),
            'jumlah' => $this->request->getVar('jumlah2'),
            'harga' => $this->request->getVar('harga'),
            'diskon' => $this->request->getVar('diskon'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/transaksi/index');
    }
}
