<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if(is_LoggedIn()) return view('pages/utamas');
        $error = session()->getFlashdata('error');        
        $data = empty($error)?[]:$error; 
        return view('pages/login',$data);
    }

    public function arsip(){
        $data = [
            'title' => 'Arsip',
            'currentURI' => 'arisp'
        ];
        return view('pages/arsip',$data);
    }
}
