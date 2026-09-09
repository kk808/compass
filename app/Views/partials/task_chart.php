<section class="task-summary" aria-labelledby="task-summary-title">
    <h2 id="task-summary-title">Task progress</h2>
    <div class="task-summary-content">
        <div class="task-pie<?= $totalTasks === 0 ? ' task-pie-empty' : '' ?>"
             style="--done-percent: <?= esc((string) $donePercent, 'attr') ?>%"
             role="img"
             aria-label="<?= $totalTasks === 0 ? 'No tasks yet' : $doneTasks . ' done, ' . $notDoneTasks . ' not done' ?>"></div>
        <div>
            <h2><strong><?= $totalTasks ?></strong> total tasks</h2>
            <ul class="task-legend">
                <li><span class="task-swatch task-swatch-done" aria-hidden="true"></span>Done: <strong><?= $doneTasks ?></strong></li>
                <li><span class="task-swatch task-swatch-pending" aria-hidden="true"></span>Not done: <strong><?= $notDoneTasks ?></strong></li>
            </ul>
        </div>
    </div>
</section>
