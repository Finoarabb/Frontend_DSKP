<?php

namespace App\Controllers;

use Config\Services;

class Letter extends BaseController
{
    public function viewPdf($id = null)
    {
        $request = Services::curlrequest();
        $token = $this->request->getCookie('token');
        $request->setHeader('Authorization','Bearer '.$token);
        $response = $request->get(base_url().'viewSurat/'.$id);
        return $this->response->setHeader('Content-Type', $response->getHeaderLine('Content-type'))
        ->setHeader('Content-Disposition', $response->getHeaderLine('Content-Dispotition'))
        ->setBody($response->getBody());
        
    }

    public function surat($tipe = null)    
    {

        $me = session()->getFlashdata('me');
        $data = [
            'me'=> $me,
            'title' => 'Surat '.$tipe,
            'currentURI' => 'srt'.$tipe,
            'tipe'=>$tipe        
        ];
        $request = curl_init();
        $condition = $me['role'] ==='staff'?'disposedLetter':($me['role'] ==='pimpinan'?'approvedLetter':'surat_'.$tipe);
        $token = $this->request->getCookie('token');
        curl_setopt($request, CURLOPT_HTTPHEADER,['Authorization: Bearer '.$token]);        
        curl_setopt($request, CURLOPT_URL, base_url() .$condition );
        curl_setopt($request, CURLOPT_RETURNTRANSFER, TRUE);
        $response = curl_exec($request);
        curl_close($request);
        $body = json_decode($response, true);


        if($me['role']==='pimpinan'):
        $request1 = Services::curlrequest();
        $request1->setHeader('Authorization', 'Bearer '.$token);
        $response1 = $request1->get(base_url() . 'user');
        $user = $response1->getBody();
        $data['user']=$user;
        endif;

        $data['surat'] = $body; 
        $data['msg'] = session()->getFlashdata('msg');
        $data['disposed'] = (session()->getFlashdata('disposed'));
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

    public function approveLetter(){
        $me = session()->getFlashdata('me');
        $request = Services::curlrequest();
        $approveId = $this->request->getPost('approveId');
        $token = $this->request->getCookie('token');
        $request->setHeader('Authorization', 'Bearer '.$token);
        
        $response =$request->put(base_url().'approveLetter',['json'=>['approveId'=>$approveId]]);
        return $this->response->redirect('srtmasuk');
    }

    public function disposeLetter(){

        $data = $this->request->getRawInput();
        
        $request = Services::curlrequest();
        $approveId = $this->request->getPost('approveId');
        $token = $this->request->getCookie('token');
        $request->setHeader('Authorization', 'Bearer '.$token);
        
        $response =$request->post(base_url().'dispose',['json'=>$data]);
        $body= json_decode($response->getBody(),true);
        // var_dump($body);exit;
        if(!empty($body['messages'])) session()->setFlashdata('disposed',$body['messages']['error']);
        else session()->setFlashdata('disposed','');
        return $this->response->redirect('srtmasuk');
    }
    
}
