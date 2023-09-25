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
}
