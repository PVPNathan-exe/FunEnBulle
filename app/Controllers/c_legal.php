<?php

namespace App\Controllers;

class c_legal extends BaseController
{
    function index ()
    {

        $data = [
            'title' => 'Mention Legals',
            'titre' => 'Mentions Legals',
        ];
        return view('legal_view', $data);
    }
}