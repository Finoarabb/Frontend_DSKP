<?php

use Config\Services;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
    
    function verify_jwt()
    {
        
        // Verify the JWT token and return the result
        $key=getenv('TOKEN_SECRET');
        $token = Services::request()->getCookie('token');
        if(empty($token)) return false;
            try{            
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                return $decoded->data;
            } catch(\Exception $e){
                return false;
            }
    }

    function is_LoggedIn(){
        if(verify_jwt()!==false) return true;
        return false;
    }

