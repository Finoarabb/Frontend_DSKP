<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
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
    }
}
