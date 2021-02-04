<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $ProdukModel;
    public function __construct()
    {
        $this->ProdukModel = new ProdukModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            # code...
            $produk = $this->ProdukModel->search($keyword);
        } else {
            # code...
            $produk = $this->ProdukModel;
        }
        $data = [
            'title' => 'Data Produk',
            'pel' => $produk,
            'produk' => $this->ProdukModel->getProduk(),
        ];
        return view('produk/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Produk',
            'validation' => \Config\Services::validation(),
        ];
        return view('produk/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'np_produk' => 'required|integer|is_unique[produk.np_produk]|max_length[5]|min_length[5]',
            'nama_produk' => 'required',
            'kategori_produk' => 'required',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'gambar' => 'is_image[gambar]|mime_in[gambar, image/jpg,image/jpeg,image/png]|max_size[gambar,2048]'
        ])) {
            # code...
            return redirect()->to('/produk/create')->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            # code...
            $gambar = 'default.png';
        } else {
            $gambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $gambar);
        }
        $this->ProdukModel->save([
            'np_produk' => $this->request->getVar('np_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'kategori_produk' => $this->request->getVar('kategori_produk'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'image' => $gambar,
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/produk/index');
    }
    public function edit($np_produk)
    {
        $data = [
            'title' => 'Edit Data produk',
            'validation' => \Config\Services::validation(),
            'produk' => $this->ProdukModel->getproduk($np_produk)
        ];
        return view('produk/edit', $data);
    }
    public function update($np_produk)
    {
        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            # code...
            $gambar = $this->request->getVar('gambarLama');
        } else {
            if (!$fileGambar == 'default.png') {
                # code...
                unlink('img/' . $this->request->getVar('gambarLama'));
            }
            $gambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $gambar);
        }


        $data = [
            'np_produk' => $np_produk,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'kategori_produk' => $this->request->getVar('kategori_produk'),
            'harga' => $this->request->getVar('harga'),
            'stok' => $this->request->getVar('stok'),
            'image' => $gambar
        ];

        $this->ProdukModel->getEdit($np_produk, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/produk');
    }
    public function delete($np_produk)
    {
        $produk = $this->ProdukModel->getId($np_produk);
        if ($produk['image'] != 'default.png') {
            unlink('img/' . $produk['image']);
        }
        $this->ProdukModel->del($np_produk);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/produk');
    }

    //--------------------------------------------------------------------

}
