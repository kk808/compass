<?php

namespace App\Controllers;

class ApiDocs extends BaseController
{
    public function index(): string
    {
        return view('api_docs');
    }
}
