<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Validation\Validation;

class data_guruModel extends Model
{
    protected $table = 'data_guru';
    protected $primarykey = "id";
    protected $allowedFields = ['id', 'nama', 'jenis_kelamin', 'NIP','pendidikan', 'jabatan' , 'alamat', 'telepon' ];

    protected $validationRules = [
        'nama' => 'required',
        'jabatan' => 'required'
    ];

    protected $validationMessages = [
        'nama' => [
            'required' => 'masukkan nama'
        ],
        'jabatan' => [
            'required' => 'masukkan jabatan',
        ]
    ];
    public function search($searchTerm)
    {
        // Lakukan logika pencarian data di sini
        // if (!$searchTerm) {
        //     return []; // Kembalikan array kosong jika $searchTerm tidak ada
        // }

        // Contoh: Mencari data guru berdasarkan nama
        $builder = $this->table($this->table);
        $builder->like('nama', $searchTerm);
        $results = $builder->get()->getResult();

        return $results;
    }

    // public function cari($keyword)
    // {
    //     $builder = $this->table('aset');
    //     $builder->like('nama_barang', $keyword);
    //     return $builder;
    // }
}