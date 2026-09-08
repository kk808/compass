<?= $this->setVar('title', 'Tasks')->extend('layouts/main') ?>

<?= $this->section('content') ?>
        <h1>Tasks</h1>

        <form action="<?= esc(site_url('tasks'), 'attr') ?>" method="post">
            <?= csrf_field() ?>
            <label for="title">New task</label>
            <input type="text" id="title" name="title" maxlength="255" required>
            <button type="submit">Add task</button>
        </form>

        <?php if (empty($tasks)): ?>
            <p>No tasks yet. Add your first task above.</p>
        <?php else: ?>
            <table>
                <caption><?= count($tasks) ?> task records</caption>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= (int) $task['id'] ?></td>
                        <td>
                        <?php if ($task['done']): ?>
                            <s><?= esc($task['title']) ?></s>
                        <?php else: ?>
                            <span><?= esc($task['title']) ?></span>
                        <?php endif; ?>
                        </td>
                        <td><?= $task['done'] ? 'Completed' : 'Pending' ?></td>
                        <td>
                        <form action="<?= esc(site_url('tasks/' . (int) $task['id'] . '/update'), 'attr') ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="done" value="<?= $task['done'] ? '0' : '1' ?>">
                            <button type="submit"><?= $task['done'] ? 'Mark pending' : 'Mark complete' ?></button>
                        </form>

                        <form action="<?= esc(site_url('tasks/' . (int) $task['id'] . '/delete'), 'attr') ?>" method="post">
                            <?= csrf_field() ?>
                            <button type="submit">Delete</button>
                        </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
<?= $this->endSection() ?>
