<?php
// namespace App\Controllers;

// class LoginController extends BaseController
// {
    
   
//     public function options()
//     {
//         return $this->response->setHeader('Access-Control-Allow-Origin', '*')
//             ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
//             ->setHeader('Access-Control-Allow-Headers', 'Content-Type')
//             ->setHeader('Access-Control-Max-Age', '86400')
//             ->setBody('');
//     }

    

  
// }
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class DataGuru extends ResourceController
{
    protected $modelName = 'App\Models\data_guruModel';
    protected $format    = 'json';

    public function delete($id = null)
    {
        $model = new data_guruModel();
        $data  = $model->find($id);

        if ($data) {
            $model->delete($id);
            return $this->respondDeleted(['message' => 'Data guru berhasil dihapus']);
        } else {
            return $this->failNotFound('Data guru tidak ditemukan');
        }
    }
}

