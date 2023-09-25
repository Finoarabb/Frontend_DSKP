<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Filters\IsLoggedin;
use CodeIgniter\HTTP\RequestTrait;
use CodeIgniter\HTTP\ResponseTrait;
use Config\Services;
use Exception;
use Faker\Provider\Base;

class Login extends BaseController
{

    public function index()
    {
        if(is_LoggedIn()) return $this->response->redirect('srtmasuk');                
        $error = session()->getFlashdata('error');                
        return view('pages/login',empty($error)?[]:$error);
    }

    public function login(){
        $request = curl_init();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];
        curl_setopt($request, CURLOPT_POSTFIELDS, $data);
        curl_setopt($request, CURLOPT_URL, base_url() . 'login');
        curl_setopt($request, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($request);
        curl_close($request);
        
        $body = json_decode($response, true);
        if (isset($body['token']))
            setcookie('token', $body['token'],time()+3600);
            else session()->setFlashdata('error', $body['messages']);
        return $this->response->redirect('/');
    }

    public function logout() {
        setcookie('token','',time()-1,'/');
        return $this->response->redirect('/');
    }
}
