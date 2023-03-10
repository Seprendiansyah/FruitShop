<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Keranjang extends BaseController
{

    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {

        $keranjang = $this->keranjangModel->where('users_id', $this->userId)->findAll();

        if (logged_in()) :
            unset($_SESSION['jml_keranjang']);
            session()->set('jml_keranjang', $this->jmlKeranjang);
        endif;

        $data = [
            'title' => 'Daftar Keranjang',
            'keranjang' => $keranjang
        ];

        if (logged_in()) {
            return view('keranjang/index', $data);
        } else {
            session()->setFlashdata('error', 'Silahkan login terlebih dahulu');
            return redirect()->to('/login');
        }
    }

    public function tambah($barang_id)
    {

        $barang = $this->barangModel->getBarang($barang_id);

        $this->keranjangModel->save([
            'users_id' => $this->userId,
            'barang_id' => $barang['barang_id'],
            'nama_buah' => $barang['nama_buah'],
            'deskripsi' => $barang['deskripsi'],
            'gambar' => $barang['gambar'],
            'harga' => $barang['harga']
        ]);


        if (logged_in()) :
            unset($_SESSION['jml_keranjang']);
            session()->set('jml_keranjang', $this->jmlKeranjang);
        endif;

        // $db = \Config\Database::connect();

        // $db->query("INSERT INTO keranjang (users_id, barang_id, nama_barang) VALUES ('$userId', '$barangId', '$barangNama')");
        session()->setFlashdata('keranjang_tambah', 'Data berhasil ditambahkan ke keranjang, periksa keranjang anda pada menu diatas.');

        return redirect()->to('/barang/index');
        // return view('/');
    }

    public function delete($id)
    {

        $this->keranjangModel->delete($id);

        return redirect()->to('/keranjang');
    }

    public function detail($id)
    {
        $keranjang = $this->keranjangModel->getKeranjang($id);

        $data = [
            'title' => 'Detail Barang Keranjang',
            'keranjang' => $keranjang
        ];

        return view('keranjang/detail', $data);
    }

    public function update($id)
    {

        $this->keranjangModel->save([
            'id' => $id,
            'harga_dipilih' => $this->request->getVar('pilihan'),
            'catatan' => $this->request->getVar('catatan')
        ]);

        return redirect()->to('/keranjang');
    }
}
