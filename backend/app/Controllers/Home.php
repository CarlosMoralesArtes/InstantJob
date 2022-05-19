<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        helper('form');
        return view('welcome_message');
    }
    public function formulari()
    {
        helper('form');
        return view('form');
    }
}
