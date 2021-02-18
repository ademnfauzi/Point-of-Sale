<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data User',
            'user' => $this->UserModel->getUser()
        ];
        return view('user/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Create User Data',
            'validation' => \Config\Services::validation()
        ];
        return view('user/create', $data);
    }
    public function save()
    {
        // validasi
        if (!$this->validate([
            'np_user' => 'required|integer|is_unique[user.np_user]|max_length[5]|min_length[5]',
            'nama' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required',
            'current_password' => 'required|matches[password]',
            'role' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'gambar' => 'is_image[gambar]|mime_in[gambar, image/jpg,image/jpeg,image/png]|max_size[gambar,2048]'
        ])) {
            # code...
            return redirect()->to('/user/create')->withInput();
        }

        $fileGambar = $this->request->getFile('gambar');
        // dd($fileGambar);
        if ($fileGambar->getError() == 4) {
            # code...
            $gambar = 'default.png';
        } else {
            $gambar = $fileGambar->getRandomName();
            $fileGambar->move('img', $gambar);
        }
        // dd($gambar);
        // dd('berhasil');
        $this->UserModel->save([
            'np_user' => $this->request->getVar('np_user'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getVar('role'),
            'jenis_kelamin' => $this->request->getVar('jk'),
            'alamat' => $this->request->getVar('alamat'),
            'image' => $gambar,
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/user');
    }

    public function delete($np_user)
    {
        $user = $this->UserModel->getUser($np_user);
        if ($user['image'] != 'default.png') {
            # code...
            // hapus gambar di file
            unlink('img/' . $user['image']);
        }
        $this->UserModel->del($np_user);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/user');
    }
    public function edit($np_user)
    {
        $data = [
            'title' => 'Edit Data User',
            'validation' => \Config\Services::validation(),
            'user' => $this->UserModel->getUser($np_user)
        ];
        return view('user/edit', $data);
    }
    public function update($np_user)
    {
        // dd($this->request->getVar());
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
            'np_user' => $np_user,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
            'image' => $gambar
        ];

        $this->UserModel->getEdit($np_user, $data);
        // $this->UserModel->insert([
        //     'np_user' => $np_user,
        //     'nama' => $this->request->getVar('nama'),
        //     'email' => $this->request->getVar('email'),
        //     // 'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        //     // 'role' => $this->request->getVar('role'),
        //     // 'jenis_kelamin' => $this->request->getVar('jk'),
        //     'alamat' => $this->request->getVar('alamat'),
        // ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/user');
    }

    //--------------------------------------------------------------------

}
