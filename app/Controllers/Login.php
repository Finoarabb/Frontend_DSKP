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
<<<<<<< HEAD
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];
        $response = $this->client->post(base_url() . '/login', ['form_params' => $data]);
        $body = json_decode($response->getBody(), true);
        if (isset($body['token']))
            setcookie('token', $body['token']);
        else session()->setFlashdata('error', $body['messages']);
        return $response->redirect('/');
=======
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
        if(isset($body['token']))
        setcookie('token',$body['token']);
        else session()->setFlashdata('error',$body['messages']);            
            return $this->response->redirect('/');
>>>>>>> e3f171d7cca3d1c636716f560e506ae75037470c
    }
}
