<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\kelas_xModel;
// use CodeIgniter\RESTful\ResourceController;


class Edit_kelasX extends BaseController
{
    protected $model;
    use ResponseTrait;
    function __construct()
    {
        $this->model = new kelas_xModel();
    }
     public function index($id)
    {
        $data = [
            'NIS' => $this->request->getVar('NIS'),
            'nama' => $this->request->getVar('nama'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'kelas' => $this->request->getVar('kelas'),  
            'alamat' => $this->request->getVar('alamat'),
           
        ];
        // $data = [
        //     'NIS' => $this->request->getRawInput()['nama'],
        //     'nama' => $this->request->getRawInput()['nama'],
        //     'jenis_kelamin' => $this->request->getRawInput()['jenis_kelamin'],
        //     'pendidikan' => $this->request->getRawInput()['pendidikan'],
        //     'jabatan' => $this->request->getRawInput()['jabatan'],
        //     'alamat' => $this->request->getRawInput()['alamat'],
        //     'telepon' => $this->request->getRawInput()['telepon'],
        // ];
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
    public function update($id = null)
    {
        // $model = new data_guruModel();
        // $data = [
        //     'nama' => $this->request->getVar('nama'),
        //     'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
        //     'jabatan' => $this->request->getVar('jabatan'),
        //     'alamat' => $this->request->getVar('alamat'),
        //     'telepon' => $this->request->getVar('telepon'),
        // ];
        // $data = [
        //     'nama' => $this->request->getRawInput()['nama'],
        //     'jenis_kelamin' => $this->request->getRawInput()['jenis_kelamin'],
        //     'pendidikan' => $this->request->getRawInput()['pendidikan'],
        //     'jabatan' => $this->request->getRawInput()['jabatan'],
        //     'alamat' => $this->request->getRawInput()['alamat'],
        //     'telepon' => $this->request->getRawInput()['telepon'],
        // ];
        // // $data = $this->request->getRawinput();
        // $data['id'] = $id;
        // var_dump($data);

        // $isExists = $this->model->where('id', $id)->findAll();
        // if (!$isExists) {
        //     return $this->failNotFound("Data gak ada");
        // }
        //   if (!$this->model->save($data)) {
        //     return $this->fail($this->model->errors());
        // }
        // // $model->update($id, $data);        

        // $response = [
        //     'status' => 200,
        //     'error' => null,
        //     'messages' => [
        //         'success' => "berhasil Update data id $id"
        //     ]
        // ];
        // return $this->respond($response);
    }
}
