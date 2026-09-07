<?php

namespace App\Controllers;

class ProfileController extends BaseController
{
    public function index()
    {
        $profile = [
            'name' => 'Wilson',
            'role' => 'Senior Frontend engineer',
            'skills' => ['React', 'TypeScript', 'PHP'],
            'yearsExperience' => 13,
        ];

        return $this->response->setJSON($profile);
    }
}