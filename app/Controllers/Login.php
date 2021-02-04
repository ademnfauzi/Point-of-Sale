<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        // $this->session = session();
    }
    public function index()
    {
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];
        return view('/login/index', $data);
    }
    public function login()
    {
        $post = $this->request->getVar();
        // validasi
        if (!$this->validate([
            'email' => 'required|valid_email',
            'password' => 'required',
        ])) {
            # code...
            return redirect()->to('/login/index')->withInput();
        }
        $UserModel = new UserModel();
        // $query = $UserModel->getEmail($post['email']);
        // $userModel = new \App\Models\UserModel;
        $user = $UserModel->where('email', $post['email'])->first();
        // dd($user['password']);
        if ($user) {
            # code...
            if (password_verify($post['password'], $user['password'])) {
                # code...
                $sessData = [
                    'np_user' => $user['np_user'],
                    'nama' => $user['nama'],
                    'password' => $user['password'],
                    'jenis_kelamin' => $user['jenis_kelamin'],
                    'role' => $user['role'],
                    'alamat' => $user['alamat'],
                    'image' => $user['image'],
                    'isLoggedIn' => true
                ];
                session()->set($sessData);

                if ($user['role'] == 'Admin') {
                    # code...
                    // echo "success";
                    return redirect()->to('/admin');
                } elseif ($user['role'] == 'Manajer') {
                    # code...
                    return redirect()->to('/manajer');
                } elseif ($user['role'] == 'Kasir') {
                    # code...
                    return redirect()->to('/kasir');
                } else {
                    dd('data tidak ada');
                }
            }
            session()->setFlashdata('pesan', 'Password yang anda masukan salah !');
            return redirect()->to('/login/index')->withInput();
        }
        session()->setFlashdata('pesan', 'Email atau password yang anda masukan salah !');
        return redirect()->to('/login/index')->withInput();
    }

    public function logout()
    {
        session()->remove('np_user');
        session()->remove('nama');
        session()->remove('password');
        session()->remove('jenis_kelamin');
        session()->remove('role');
        session()->remove('alamat');
        session()->remove('logged_in');
        session()->destroy();

        return redirect()->to('/login');
    }

    //--------------------------------------------------------------------

}
