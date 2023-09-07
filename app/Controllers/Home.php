<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        if(is_LoggedIn()) return view('utamas');
        $error = session()->getFlashdata('error');        
        $data = empty($error)?[]:$error; 
        return view('login',$data);
    }
}
