<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Disposisi;
use App\Models\Letter;
use App\Models\User;

class Login extends BaseController
{

    protected $user_model;
    public function __construct()
    {
        $this->user_model = new User();
        
    } 


    public function index()
    {
        if(is_LoggedIn()) return $this->response->redirect('home');                
        $error = session()->getFlashdata('error');                
        return view('pages/login',empty($error)?[]:$error);
    }

    public function login(){

        $rules = [
            'username' => 'required',
            'password' => 'required|min_length[8]',
        ];
        $errors=[
            'username'=>[
            'required' => 'Username tidak boleh kosong'],
            'password'=>[
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password minimal harus terdiri dari {param} karakter']
        ];
        if (!$this->validate($rules,$errors))  {
            session()->setFlashdata('error',$this->validator->getErrors());
            return $this->response->redirect('/');                                
        }
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password')
        ];
        $user = $this->user_model->where('username',$data['username'])->first();
        if(empty($user)) {
            session()->setFlashdata('error',['username'=>'Username Tidak Ditemukan']);
            return $this->response->redirect('/');                                
        }
        if($user['password']!==$data['password']){
            session()->setFlashdata('error',['password'=>'Password Salah']);
            return $this->response->redirect('/');                                
        }
        $payload = array(
            "uid" => $user['id'],
            "nama"=>$user['nama'],
            "username"=>$user['username'],
            "role"=>$user['role'],
        );  
        $token = generate_jwt($payload);
        if (!empty($token))
            setcookie('token', $token,time()+3600);
        return $this->response->redirect('/');
    }

    public function logout() {
        setcookie('token','',time()-1,'/');
        return $this->response->redirect('/');
    }

    public function home(){
        $me = session()->getFlashdata('me');
        $surat_model = new Letter();
        $surat = $surat_model->findAll();
        $suratMasuk = array_fill(0, 13, 0);
        $suratKeluar = array_fill(0, 13, 0);
        foreach ($surat as $srt) {
            $tgl = strtotime($srt['created_at']);
            $bulan = date('m', $tgl);
            $tahun = date('Y', $tgl);
            $selisihBulan = (date('Y') - $tahun) * 12 + (date('m') - $bulan);
            $key = $selisihBulan > 11 ? 12 : $selisihBulan;
    
            if (empty($srt['asal'])) {
                $suratKeluar[$key]++;
            } else {
                $suratMasuk[$key]++;                
            }
        }
        $dada = [
            'srtmasuk' => $suratMasuk,
            'srtkeluar' => $suratKeluar, 
        ];
        $data = [
            'me'=> $me,
            'title' => 'Dashboard',
            'currentURI' => 'home',
            'data'=>json_encode($dada)          
        ];
        
        return view('pages/home',$data);
    }

    public function dashboard(){
        $bulan = $this->request->getPost('bulan');
        $surat_model = new Letter();
        $srtmasuk = $surat_model
        ->where('DATE_FORMAT(created_at,"%c/%Y")',$bulan)
        ->where('tujuan','')
        ->findAll();
        $srtkeluar = $surat_model
        ->where('DATE_FORMAT(created_at,"%c/%Y")',$bulan)
        ->where('asal','')
        ->findAll();
        $propDisposisi = $surat_model
        ->where('DATE_FORMAT(created_at,"%c/%Y")',$bulan)
        ->whereIn('status',[1,3,5])
        ->findAll();              
        $data = [
            'srtmasuk'=>count($srtmasuk),
            'srtkeluar'=>count($srtkeluar),
            'propDisposisi'=>count($propDisposisi)
        ];
            return json_encode($data);
        }
    }
