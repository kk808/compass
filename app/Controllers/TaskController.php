<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    public function index()
    {
        $tasks = $this->taskModel->findAll();
        return view('tasks/index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $this->taskModel->insert([
            'title' => $this->request->getPost('title'),
            'done' => 0,
        ]);
        return redirect()->to('/tasks');
    }

    public function update($id)
    {
        $this->taskModel->update($id, [
            'done' => $this->request->getPost('done'),
        ]);
        return redirect()->to('/tasks');
    }

    public function delete($id)
    {
        $this->taskModel->delete($id);
        return redirect()->to('/tasks');
    }
}