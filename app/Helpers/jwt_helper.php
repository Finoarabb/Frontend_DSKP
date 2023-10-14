<?php

use Config\Services;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;



function generate_jwt($data, $expiration = 3600)
    {
        $key = getenv('TOKEN_SECRET'); // Fetch the JWT secret key from environment
        $iat = time(); // Current timestamp (issued at)
        $expire = $iat + $expiration; // Expiration timestamp
        $token = JWT::encode([
            'iat' => $iat,
            'exp' => $expire,
            'data' => $data // Custom data to include in the token payload
        ], $key, 'HS256'); // Encoding the payload with the secret key and algorithm
        return $token; // Returning the generated JWT token
    }



    function verify_jwt()
    {
        $request = service('request');

        // Check if a JWT token is present in the request headers
        // $header = $request->getHeaderLine('Authorization');\
        $header = $request->getCookie('token');
        if (empty($header)) {
            return false; // No token found, user is not authenticated
        }
        $token = str_replace('Bearer ',"",$header);

        $key = getenv('TOKEN_SECRET');
        try {
            $decoded=JWT::decode($token, new Key($key, 'HS256'));
            return (array)$decoded->data;
        } catch (\Exception $e) {
            return false;
        }
    }
function is_LoggedIn()
{
    $cookie = Services::request()->getCookie('token');
    if(empty($cookie)) return false;
    $me = verify_jwt();        
    if($me!==false) session()->setFlashdata('me',$me);
    return $me===false?false:true;    
}


