<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Validation\Validation;

class kelas_xiiModel extends Model
{
    protected $table = 'kelas_xii';
    protected $primarykey = "id";
    protected $allowedFields = ['id','NIS', 'nama', 'jenis_kelamin', 'kelas','alamat' ];

    protected $validationRules = [
        'nama' => 'required',
        'kelas' => 'required'
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'masukkan nama'
        ],
        'kelas' => [
            'required' => 'masukkan kelas',
        ]
    ];

    // public function cari($keyword)
    // {
    //     $builder = $this->table('aset');
    //     $builder->like('nama_barang', $keyword);
    //     return $builder;
    // }
}