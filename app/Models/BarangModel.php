<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang2';
    protected $primaryKey = 'barang_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['barang_id', 'nama_buah', 'deskripsi', 'gambar', 'harga'];

    public function getBarang($barang_id = false)
    {
        if ($barang_id == false) {
            return $this->findAll();
        }

        return $this->where(['barang_id' => $barang_id])->first();
    }

    public function search($keyword)
    {
        // $builder = $this->table('orang');
        // $builder->like('nama', $keyword);
        // return $builder;

        return $this->table('barang2')->like('nama_buah', $keyword);
    }
}
