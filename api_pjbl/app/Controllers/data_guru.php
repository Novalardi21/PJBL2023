<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\data_guruModel;
use App\Models\loginModel;

class Data_Guru extends BaseController
{
    protected $model;
    use ResponseTrait;
    function __construct()
    {
        $this->model = new data_guruModel();
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
            'NIP' => $this->request->getVar('NIP'),
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'jabatan' => $this->request->getVar('jabatan'),
            'alamat' => $this->request->getVar('alamat'),
            'telepon' => $this->request->getVar('telepon'),
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
     public function show($id)
    {
        $data = $this->model->where('id', $id)->findAll();
        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->failNotFound("data gak ada");
        }
    }
      public function update($id)
    {
        // $model = new data_guruModel();
        // $data = [
        //     'nama' => $this->request->getVar('nama'),
        //     'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
        //     'jabatan' => $this->request->getVar('jabatan'),
        //     'alamat' => $this->request->getVar('alamat'),
        //     'telepon' => $this->request->getVar('telepon'),
        // ];
        $data = [
            'nama' => $this->request->getRawInput()['nama'],
            'jenis_kelamin' => $this->request->getRawInput()['jenis_kelamin'],
            'pendidikan' => $this->request->getRawInput()['pendidikan'],
            'jabatan' => $this->request->getRawInput()['jabatan'],
            'alamat' => $this->request->getRawInput()['alamat'],
            'telepon' => $this->request->getRawInput()['telepon'],
        ];
        // $data = $this->request->getRawinput();
        $data['id'] = $id;
        var_dump($data);

        $isExists = $this->model->where('id', $id)->findAll();
        if (!$isExists) {
            return $this->failNotFound("Data gak ada");
        }
          if (!$this->model->save($data)) {
            return $this->fail($this->model->errors());
        }
        // $model->update($id, $data);        

        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => "berhasil Update data id $id"
            ]
        ];
        return $this->respond($response);
    }

    public function delete($id)
    {
        $data = $this->model->where('id', $id)->findAll();
        if ($data) {
            $this->model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => "data di hapus"
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('data gak nemu');
        }
    }

    public function search($keyword)
    {
        $model = new data_guruModel();

        // Melakukan pencarian data berdasarkan keyword
        $data = $model->searchData($keyword);
    
        // Menyiapkan respon API
        if (!empty($data)) {
            return $this->respond($data, 200);
        } else {
            return $this->respondNoContent();
        }
    }

    

}
