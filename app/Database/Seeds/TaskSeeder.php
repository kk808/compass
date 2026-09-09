<?php

namespace App\Database\Seeds;

use App\Models\TaskModel;
use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $taskModel = new TaskModel();

        $taskModel->insertBatch([
            ['title' => 'Learn PHP basics', 'done' => 0],
            ['title' => 'Build a controller', 'done' => 1],
            ['title' => 'Forms in PHP', 'done' => 1],
            ['title' => 'Set up a local development environment', 'done' => 1],
            ['title' => 'Configure the database connection', 'done' => 1],
            ['title' => 'Create the tasks migration', 'done' => 1],
            ['title' => 'Build a task model', 'done' => 1],
            ['title' => 'Add task validation rules', 'done' => 0],
            ['title' => 'Create a task list view', 'done' => 1],
            ['title' => 'Add a task creation form', 'done' => 1],
            ['title' => 'Implement task editing', 'done' => 0],
            ['title' => 'Add task deletion', 'done' => 0],
            ['title' => 'Mark tasks as completed', 'done' => 1],
            ['title' => 'Filter tasks by completion status', 'done' => 0],
            ['title' => 'Add task search', 'done' => 0],
            ['title' => 'Paginate the task list', 'done' => 0],
            ['title' => 'Display task completion statistics', 'done' => 1],
            ['title' => 'Build a task progress chart', 'done' => 1],
            ['title' => 'Create the tasks API endpoint', 'done' => 1],
            ['title' => 'Document the API in OpenAPI', 'done' => 0],
            ['title' => 'Write controller tests', 'done' => 0],
            ['title' => 'Test invalid task submissions', 'done' => 0],
            ['title' => 'Improve the mobile layout', 'done' => 0],
            ['title' => 'Review application accessibility', 'done' => 0],
            ['title' => 'Prepare the application for deployment', 'done' => 0],
        ]);
    }
}
