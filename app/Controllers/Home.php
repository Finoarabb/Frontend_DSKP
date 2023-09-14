<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        if(is_LoggedIn()) return view('pages/utamas');
        $error = session()->getFlashdata('pages/error');        
        $data = empty($error)?[]:$error; 
        return view('login',$data);
    }
}
