<?php

namespace App\Controllers;

use App\Models\PemasokModel;

class Pemasok extends BaseController
{
    protected $PemasokModel;
    public function __construct()
    {
        $this->PemasokModel = new PemasokModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Pemasok',
            'pemasok' => $this->PemasokModel->getpemasok()
        ];
        return view('pemasok/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Pemasok',
            'validation' => \Config\Services::validation(),
        ];
        return view('pemasok/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'np_pemasok' => 'required|integer|is_unique[pemasok.np_pemasok]|max_length[5]|min_length[5]',
            'nama' => 'required',
            'email' => 'required|valid_email',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'gambar' => 'is_image[gambar]|mime_in[gambar, image/jpg,image/jpeg,image/png]|max_size[gambar,2048]'
        ])) {
            # code...
            return redirect()->to('/pemasok/create')->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->getError() == 4) {
            # code...
            $gambar = 'default.png';
        } else {
            $gambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $gambar);
        }
        $this->PemasokModel->save([
            'np_pemasok' => $this->request->getVar('np_pemasok'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'alamat' => $this->request->getVar('alamat'),
            'image' => $gambar,
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/pemasok/index');
    }
    public function edit($np_pemasok)
    {
        $data = [
            'title' => 'Edit Data Pemasok',
            'validation' => \Config\Services::validation(),
            'pemasok' => $this->PemasokModel->getpemasok($np_pemasok)
        ];
        return view('pemasok/edit', $data);
    }
    public function update($np_pemasok)
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
            'np_pemasok' => $np_pemasok,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'alamat' => $this->request->getVar('alamat'),
            'image' => $gambar
        ];

        $this->PemasokModel->getEdit($np_pemasok, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/pemasok');
    }
    public function delete($np_pemasok)
    {
        $pemasok = $this->PemasokModel->getId($np_pemasok);
        if ($pemasok['image'] != 'default.png') {
            unlink('img/' . $pemasok['image']);
        }
        $this->PemasokModel->del($np_pemasok);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/pemasok');
    }

    //--------------------------------------------------------------------

}
