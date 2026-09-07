<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function about(): string
    {
        $data = [
            'title' => 'About Us',
            'description' => 'We help build small business websites.',
        ];

        return view('pages/about', $data);
    }

    public function contact(): string
    {
        $data = [
            'title' => 'Contact Us',
        ];

        return view('pages/contact', $data);
    }

    public function submitContact(): string
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');

        $data = [
            'title' => 'Contact Us',
            'name' => $name,
            'email' => $email,
        ];

        return view('pages/contact_success', $data);
    }
}