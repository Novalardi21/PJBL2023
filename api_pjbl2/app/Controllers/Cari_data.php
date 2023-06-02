<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\data_guruModel;

class Cari_data extends BaseController
{
    public function index()
    {
        // Mendapatkan parameter pencarian dari permintaan
        $searchTerm = $this->request->getVar('nama');
        var_dump($searchTerm);

        // Membuat instance model yang relevan
        $model = new data_guruModel();
        $respond = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => "berhasil Menemukan data"
            ]
        ];
        // Melakukan pencarian data menggunakan model
        $results = $model->search($searchTerm);
        
    

        // Mengirimkan respons JSON dengan data hasil pencarian
        return $this->response->setJSON($results);
    }
}
