<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use App\Models\kelas_xiiModel;

class Hapus_kelasXII extends BaseController
{
    protected $model;
    use ResponseTrait;
    function __construct()
    {
        $this->model = new kelas_xiiModel();
    }
    public function delete($id = null)
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
}
