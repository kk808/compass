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
        $rules = [
            'name' => 'required|min_length[3]|max_length[10]',
            'email' => 'required|valid_email',
        ];
        
        if (!$this->validate($rules)) {
            return view('pages/contact', [
                'title' => 'Contact Us',
                'errors' => $this->validator->getErrors(),
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
            ]);
        }

        $data = [
            'title' => 'Contact Us',
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        return view('pages/contact_success', $data);
    }
}