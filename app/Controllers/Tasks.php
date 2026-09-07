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
}
