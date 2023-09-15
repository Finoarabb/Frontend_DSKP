<?php

use Config\Services;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;



function is_LoggedIn()
{
    $request = Services::curlrequest();
    $cookie = Services::request()->getCookie('token');
    if(empty($cookie)) return false;
    $me = $request->get(base_url() . 'me', ['headers' => ['Authorization' => 'Bearer ' . $cookie]]);
    $response = json_decode($me->getBody(),true);
    $result = empty($response['msg']);
    if($result) session()->setFlashdata('me',$response);
    return $result;

    // if($me!==false) return true;
    // return false;
}


