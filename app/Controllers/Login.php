<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestTrait;
use CodeIgniter\HTTP\ResponseTrait;
use Config\Services;
use Exception;

class Login extends BaseController
{
    private $client;
    public function __construct()
    {
        $this->client = Services::curlrequest();
    }
    public function index()
    {       
        $data = [
            'username'=>$this->request->getPost('username'),
            'password'=>$this->request->getPost('password')
        ] ;
        try{            
            $response = $this->client->post(base_url().'login',['form_params'=>$data]);
            return $response->getBody();
        } catch(\Exception $e){
            return $e->getMessage();
        }
        
        // var_dump($respond);exit;
    }
}
