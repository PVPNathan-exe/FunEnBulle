<?php

namespace App\Controllers;


class c_contact extends BaseController
{

    public function index(){

        return view('contact_view',$data);
    }
}