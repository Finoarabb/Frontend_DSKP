<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\CURLRequest;
use Config\Services;

class User extends BaseController
{
    public function index()
    {
        $me = session()->getFlashdata('me');
        $data = [
            'me' => 'admin',
            'title' => 'Users',
            'currentURI' => 'users',
            'msg'=>session()->getFlashdata('msg')
        ];
        $token = $this->request->getCookie('token');
        $request = curl_init();
        curl_setopt($request, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $token]);
        curl_setopt($request, CURLOPT_URL, base_url() . 'user');
        curl_setopt($request, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($request);
        curl_close($request);
        $body = json_decode($response, true);
        $data['users'] = $body;
        return view('pages/users', $data);
    }


    public function deleteUser($id = null)
    {
        $token = $this->request->getCookie('token');
        $request = Services::curlrequest();
        $request->setHeader('Authorization', 'Bearer ' . $token);
        $response = $request->delete(base_url() . 'user/' . $id);
        return $this->response->redirect('/users');
    }

    public function changeRole($id = null)
    {
        $role = $this->request->getPost('role');
        $token = $this->request->getCookie('token');
        $request = Services::curlrequest();
        $request->setHeader('Authorization', 'Bearer ' . $token);
        $response = $request->put(base_url() . 'user/' . $id, ['json' => ['role'=>$role]]);
        return $this->response->redirect('/users');
    }

    public function createUser(){
        $token = $this->request->getCookie('token');
        $data = [
            'nama'=>$this->request->getPost('nama'),
            'role'=>$this->request->getPost('role'),
            'username'=>$this->request->getPost('username'),
            'password'=>$this->request->getPost('password'),
            'confirm_password'=>$this->request->getPost('confirmPassword'),
        ];
        $request = Services::curlrequest();
        $request->setHeader('Authorization', 'Bearer ' . $token);
        $response = $request->post(base_url() . 'user',['form_params' => $data]);
        $body=json_decode($response->getBody(),true);
        if(!empty($body['messages'])) session()->setFlashdata('msg',$body['messages']);
        elseif(!empty($body['id'])) session()->setFlashdata('msg',true);
        // var_dump();exit;
        return $this->response->redirect('users');
    }
}
