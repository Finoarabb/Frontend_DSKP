<?php

namespace App\Controllers;

use Config\Services;

class Home extends BaseController
{
    public function index()
    {
        
        
    }

    public function utamas()    
    {
        $me = session()->getFlashdata('me');
        $data = [
            'me'=> '',
            'title' => 'Utamas',
            'currentURI' => 'utamas'
        ];
        if(!empty($me))
        $data['me']= $me['role']==='staff'?$me['nama']:$me['role'];
        return view('pages/utamas', $data);
    }
    

    public function arsip(){
        $data = [
            'title' => 'Arsip',
            'currentURI' => 'arisp'
        ];
        return view('pages/arsip',$data);
    }
}
