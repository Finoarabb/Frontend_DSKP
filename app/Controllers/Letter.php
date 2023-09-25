<?php

namespace App\Controllers;

use Config\Services;

class Letter extends BaseController
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
        $data['msg'] = session()->getFlashdata('msg');
        return view('pages/surat', $data);
    }
    
    public function newSurat(string $tipe=null){
        $me = session()->getFlashdata('me');
        $jenis = $tipe==='masuk'?'asal':'tujuan';
        $file=$this->request->getFile('file');
        $data = [
            'tipe'=>$tipe,
            'no_surat'=> $this->request->getPost('no_surat'),
            'tanggal' => str_replace('/','-',$this->request->getPost('tanggal')),
            $jenis => $this->request->getPost($jenis),                      
        ];
        if(!empty($file->getTempName()))
        $data['file'] = new \CURLFile($file->getTempName(),$file->getMimeType(),$file->getName());
        $request = Services::curlrequest();
        $token = $this->request->getCookie('token');
        $request->setHeader('Authorization', 'Bearer '.$token);
        $response =$request->post(base_url().'letter',['multipart'=>$data]);
        $body = json_decode($response->getBody(),true);
        if(!empty($body['messages']) ) session()->setFlashdata('msg',$body['messages']);
        elseif(!empty($body['no_surat']) ) session()->setFlashdata('msg',true);
        return $this->response->redirect('srt'.$tipe);
    }
    
}
