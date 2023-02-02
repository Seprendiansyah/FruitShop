<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'keranjang';
    protected $useTimestamps = true;
    protected $allowedFields = ['users_id', 'barang_id', 'nama_buah', 'deskripsi', 'gambar', 'harga', 'harga_dipilih', 'catatan'];

    public function getKeranjang($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
