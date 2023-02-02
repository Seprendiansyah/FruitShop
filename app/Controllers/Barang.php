<?php

namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\BarangModel;
use CodeIgniter\Router\Exceptions\RedirectException;

class Barang extends BaseController
{
    protected $barangModel, $bannerModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->bannerModel = new BannerModel();
    }

    public function index()
    {
        $banner = $this->bannerModel->findAll();

        if (logged_in()) :
            session()->set('jml_keranjang', $this->jmlKeranjang);
        endif;

        // $kategori1 = $this->barangModel->where('kategori_id', 1)->paginate(6, 'barang');
        $buah = $this->barangModel;

        session()->setFlashdata('not_login', 'Silahkan login terlebih dahulu');

        $data = [
            'title' => 'Daftar Barang',
            'banner' => $banner,
            'buah' => $buah->paginate(6, 'buah'),
            'pager' => $this->barangModel->pager
        ];

        return view('/barang/index', $data);
    }

    public function detail($id)
    {
        $barang = $this->barangModel->getBarang($id);

        $data = [
            'title' => $barang['nama_buah'],
            'barang' => $barang
        ];

        session()->setFlashdata('not_login', 'Silahkan login terlebih dahulu');

        return view('/barang/detail', $data);
    }
}
