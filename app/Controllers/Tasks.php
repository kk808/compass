<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Tasks extends ResourceController
{
    use ResponseTrait;
    private array $tasks = [
        ['id' => 1, 'title' => 'Learn PHP basics', 'done' => false],
        ['id' => 2, 'title' => 'Build a controller', 'done' => true],
        ['id' => 3, 'title' => 'Forms in PHP', 'done' => true],
    ];


    public function index()
    {
        $tasks = $this->tasks;

        return $this->respond($tasks);
    }

    public function show($id = null)
    {
        $tasks = $this->tasks;

        $task = null;
        foreach ($tasks as $t) {
            if ($t['id'] == $id) {
                $task = $t;
                break;
            }
        }

        if ($task) {
            return $this->respond($task);
        } else {
            return $this->failNotFound('Task not found');
        }
    }

    public function createTask()
    {
        $rules = [
            'title' => 'required|max_length[255]',
            'description' => 'required'
        ];

        if (! $this->validate($rules)) {
            return $this->response->setStatusCode(422)->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors(),
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data' => ['title' => $this->request->getJSON()->title],
        ]);
    }

    // TEST using curl
    // error post: 
    // '{"title" : "", "description" : ""}' | curl.exe -i -X POST http://localhost:8080/api/tasks -H "Content-Type: application/json" --data-binary "@-"
    
    // success post: 
    // '{"title" : "New Task", "description" : "Task description"}' | curl.exe -i -X POST http://localhost:8080/api/tasks -H "Content-Type: application/json" --data-binary "@-"
}
