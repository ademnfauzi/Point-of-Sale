<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    protected $PelangganModel;
    public function __construct()
    {
        $this->PelangganModel = new PelangganModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            # code...
            $pelanggan = $this->PelangganModel->search($keyword);
        } else {
            # code...
            $pelanggan = $this->PelangganModel;
        }
        $data = [
            'title' => 'Data Pelanggan',
            'pel' => $pelanggan,
            'pelanggan' => $this->PelangganModel->getPelanggan(),
        ];
        return view('pelanggan/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Pelanggan',
            'validation' => \Config\Services::validation(),
        ];
        return view('pelanggan/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'np_pelanggan' => 'required|integer|is_unique[pelanggan.np_pelanggan]|max_length[5]|min_length[5]',
            'nama' => 'required',
            'email' => 'required|valid_email',
            'jk' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'gambar' => 'is_image[gambar]|mime_in[gambar, image/jpg,image/jpeg,image/png]|max_size[gambar,2048]'
        ])) {
            # code...
            return redirect()->to('/pelanggan/create')->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            # code...
            $gambar = 'default.png';
        } else {
            $gambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $gambar);
        }
        $this->PelangganModel->save([
            'np_pelanggan' => $this->request->getVar('np_pelanggan'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'jk' => $this->request->getVar('jk'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'alamat' => $this->request->getVar('alamat'),
            'image' => $gambar,
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/pelanggan/index');
    }
    public function edit($np_pelanggan)
    {
        $data = [
            'title' => 'Edit Data Pelanggan',
            'validation' => \Config\Services::validation(),
            'pelanggan' => $this->PelangganModel->getPelanggan($np_pelanggan)
        ];
        return view('pelanggan/edit', $data);
    }
    public function update($np_pelanggan)
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
            'np_pelanggan' => $np_pelanggan,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'jk' => $this->request->getVar('jk'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'alamat' => $this->request->getVar('alamat'),
            'image' => $gambar
        ];

        $this->PelangganModel->getEdit($np_pelanggan, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/pelanggan');
    }
    public function delete($np_pelanggan)
    {
        // $this->PelangganModel->del($np_pelanggan);
        // session()->setFlashdata('pesan', 'Data berhasil dihapus');
        // return redirect()->to('/pelanggan');

        $pelanggan = $this->PelangganModel->getId($np_pelanggan);
        if ($pelanggan['image'] != 'default.png') {
            unlink('img/' . $pelanggan['image']);
        }
        $this->PelangganModel->del($np_pelanggan);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/pelanggan');
    }

    //--------------------------------------------------------------------

}
