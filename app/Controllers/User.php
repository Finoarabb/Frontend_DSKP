<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Disposisi;
use App\Models\User as ModelsUser;
use Config\CURLRequest;
use Config\Services;

class User extends BaseController
{
    protected $user_model;
    public function __construct()
    {
        $this->user_model = new ModelsUser();
    }
    public function index()
    {
        $me = session()->getFlashdata('me');
        $data = [
            'me' => $me,
            'title' => 'Users',
            'currentURI' => 'users',
            'msg'=>session()->getFlashdata('msg')
        ];
        $user = $this->user_model->findAll();
        $data['users'] = $user;
        return view('pages/users', $data);
    }


    public function deleteUser($id = null)
    {
        $this->user_model->delete($id);        
        return $this->response->redirect('/users');
    }

    public function changeRole($id = null)
    {
        $role = $this->request->getPost('role');
        $this->user_model->update($id,['role'=>$role]);
        return $this->response->redirect('/users');
    }

    public function createUser(){
        $rules = [
            'username' => 'required|is_unique[users.username]',
            'nama' => 'required',
            'password' => 'required|min_length[8]',
            'confirm_password' => 'required|matches[password]',
        ];
        $errors = [
            'username' => [
                'required' => 'Username tidak boleh kosong',
                'is_unique' => 'Username sudah digunakan',
            ],
            'nama' => [
                'required' => 'Nama tidak boleh kosong'
            ],
            'password' => [
                'required' => 'Password tidak boleh kosong',
                'min_length' => 'Password minimal harus terdiri dari {param} karakter'
            ],
            'confirm_password' => [
                'required' => 'Silahkan konfirmasi password terlebih dahulu',
                'matches' => 'Password tidak sama'
            ]
        ];
        if($this->validate($rules,$errors)){
            session()->setFlashdata('msg',$this->validator->getErrors());
            return $this->response->redirect('users');
        }
        $data = [
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'password'=>$this->request->getPost('password'),
            'confirm_password'=>$this->request->getPost('confirmPassword'),
        ];
        $role=$this->request->getPost('role');
        if(!empty($role)) $data['role']=$role;
        $response = $this->user_model->insert($data,false);
        if($response!==false) session()->setFlashdata('msg',true);
        return $this->response->redirect('users');
    }

    public function disposableUser($id=null){
        $disp_model = new Disposisi();
        $disposedUser = $disp_model
        ->where('sid',$id)
        ->select('uid')
        ->findAll();
        if(!empty($disposedUser))
        $disposable_user = $this->user_model->whereNotIn('id',array_column($disposedUser, 'uid'))->findAll();        
        else $disposable_user = $this->user_model->findAll();
        return json_encode($disposable_user);

    }
}
