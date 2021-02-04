<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\PemasokModel;
use App\Models\ProdukModel;

class Dashboard extends BaseController
{
    protected $ProdukModel;
    protected $PelangganModel;
    protected $PemasokModel;
    public function __construct()
    {
        $this->ProdukModel = new ProdukModel();
        $this->PelangganModel = new PelangganModel();
        $this->PemasokModel = new PemasokModel();
    }
    // public function index()
    // {
    //     $data = [
    //         'title' => 'Dashboard',
    //         ''
    //     ];
    //     return view('/dashboard/index', $data);
    // }
}
