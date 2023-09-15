<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
<<<<<<< HEAD
        // if (is_LoggedIn()) return view('pages/utamas');
        // $error = session()->getFlashdata('pages/error');
        // $data = empty($error) ? [] : $error;
        return view('pages/login');
    }

    public function utamas()
    {
        $data = [
            'title' => 'Utamas',
            'currentURI' => 'utamas'
        ];
        return view('pages/utamas', $data);
=======
        if(is_LoggedIn()) return view('pages/utamas');
        $error = session()->getFlashdata('error');        
        $data = empty($error)?[]:$error; 
        return view('pages/login',$data);
>>>>>>> e3f171d7cca3d1c636716f560e506ae75037470c
    }
}
