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
        $totalTasks = $this->taskModel->countAllResults();
        $doneTasks = $this->taskModel->where('done', 1)->countAllResults();
        $tasks = $this->taskModel->orderBy('id', 'ASC')->paginate(10);
        $notDoneTasks = $totalTasks - $doneTasks;
        $donePercent = $totalTasks > 0 ? $doneTasks / $totalTasks * 100 : 0;

        return view('tasks/index', [
            'tasks' => $tasks,
            'pager' => $this->taskModel->pager,
            'totalTasks' => $totalTasks,
            'doneTasks' => $doneTasks,
            'notDoneTasks' => $notDoneTasks,
            'donePercent' => $donePercent,
        ]);
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
