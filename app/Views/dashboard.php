<div>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Content</th>
            <th>Done</th>
        </tr>
        </thead>

        <tbody>
        <?php if (!empty($tasks)) {

            foreach ($tasks as $task) { ?>

                <tr>
                    <td><a href="/dashboard/task/<?=$task->id?>"><?=$task->id?></a></td>
                    <td><?=$task->name?></td>
                    <td><?=$task->email?></td>
                    <td><?=$task->content?></td>
                    <td><input type="checkbox" disabled <?=$task->status ? 'checked' : ''?> /></td>
                </tr>

            <?php }

        } else { ?>
            <tr><td colspan="5">No tasks benn added</td></tr>
        <?php } ?>
        </tbody>
    </table>
</div>
