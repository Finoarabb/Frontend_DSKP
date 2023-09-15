<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestTrait;
use CodeIgniter\HTTP\ResponseTrait;
use Config\Services;
use Exception;
use Faker\Provider\Base;

class Login extends BaseController
{
    
    public function index()
    {   
        $request =curl_init();        
        $data = [
            'username'=>$this->request->getPost('username'),
            'password'=>$this->request->getPost('password')
            ] ; 
            curl_setopt($request,CURLOPT_POSTFIELDS,$data);
            curl_setopt($request,CURLOPT_URL,base_url().'login');
            curl_setopt($request,CURLOPT_RETURNTRANSFER,TRUE);
        $response =curl_exec($request);
        curl_close($request);
        $body = json_decode($response,true);
        var_dump($body); exit;
        if(isset($body['token']))
        setcookie('token',$body['token']);
        else session()->setFlashdata('error',$body['messages']);            
            return $this->response->redirect('/');
    }
}
