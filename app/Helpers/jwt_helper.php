<?php

use Config\Services;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;



function is_LoggedIn()
{
    $request = Services::curlrequest();
    $cookie = Services::request()->getCookie('token');
    $me = $request->get(base_url() . 'me', ['headers' => ['Authorization' => 'Bearer ' . $cookie]]);
    $result = empty(json_decode($me->getBody(),true)['msg']);
    return $result;

    // if($me!==false) return true;
    // return false;
}
