<?php

namespace App\Controllers;

use Config\Services;

class Home extends BaseController
{
    public function index()
    {
        
        
    }

    public function surat($tipe = null)    
    {

        $me = session()->getFlashdata('me');
        $data = [
            'me'=> '',
            'title' => 'Surat '.$tipe,
            'currentURI' => 'srt'.$tipe,
            'tipe'=>$tipe
        ];
        if(!empty($me))
        $data['me']= $me['role']==='staff'?$me['nama']:$me['role'];
        $request = curl_init();
        $token = $this->request->getCookie('token');
        curl_setopt($request, CURLOPT_HTTPHEADER,['Authorization: Bearer '.$token]);        
        curl_setopt($request, CURLOPT_URL, base_url() . 'surat_'.$tipe);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($request);
        curl_close($request);
        $body = json_decode($response, true);
        $data['surat'] = $body; 
        
        return view('pages/surat', $data);
    }
    

    public function arsip(){
        $data = [
            'title' => 'Arsip',
            'currentURI' => 'arisp'
        ];
        return view('pages/arsip',$data);
    }
}
