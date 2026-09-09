<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TaskModel;

class TaskController extends ResourceController
{
    protected $modelName = 'App\Models\TaskModel';
    protected $format = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        $task = $this->model->find($id);

        if ($task === null) {
            return $this->failNotFound("Task with id {$id} not found");
        }

        return $this->respond($task);
    }

    public function create()
    {
        $rules = ['title' => 'required|max_length[255]'];

        if (! $this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = $this->request->getJSON(true);
        $id = $this->model->insert($data);

        return $this->respondCreated($this->model->find($id));
    }

    public function update($id = null)
    {
        if ($this->model->find($id) === null) {
            return $this->failNotFound("Task with id {$id} not found");
        }

        $data = $this->request->getJSON(true);
        $this->model->update($id, $data);

        return $this->respond($this->model->find($id));
    }

    public function delete($id = null)
    {
        if ($this->model->find($id) === null) {
            return $this->failNotFound("Task with id {$id} not found");
        }

        $this->model->delete($id);
        return $this->respondDeleted(['id' => $id]);
    }
}