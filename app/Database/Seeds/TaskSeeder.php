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
        ]);
    }
}
