<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\kelas_xiiModel;

class Kelas_xii extends BaseController
{
    protected $model;
    use ResponseTrait;
    function __construct()
    {
        $this->model = new kelas_xiiModel();
    }
    public function index()
    {
        $data = $this->model->findAll();
        $response = [
            'success' => true,
            'data'      => $data,
        ];

        return $this->response->setJSON($response);
    }
    public function create()
    {
        $data = [
            'NIS' => $this->request->getVar('NIS'),
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'kelas' => $this->request->getVar('kelas'),  
            'alamat' => $this->request->getVar('alamat'),
           
        ];
        // $data = $this->request->getRawinput();
        // var_dump($data);
        $this->model->save($data);
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'berhasil memasukkan data'
            ]
        ];

        return $this->respond($response);
    }
}
