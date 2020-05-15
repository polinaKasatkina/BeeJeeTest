<div>


    <div class="row" style="margin-bottom: 15px;">

        <div class="col-lg-4">
            <span>Sort By Name</span>
            <div class="btn-group" role="group" aria-label="Sort By Name">
                <a type="button" class="btn btn-secondary" href="/sort_by/name/desc">DESC</a>
                <a type="button" class="btn btn-secondary" href="/sort_by/name/asc">ASC</a>
            </div>
        </div>

        <div class="col-lg-4">
            <span>Sort By Email</span>
            <div class="btn-group" role="group" aria-label="Sort By Name">
                <a type="button" class="btn btn-secondary" href="/sort_by/email/desc">DESC</a>
                <a type="button" class="btn btn-secondary" href="/sort_by/email/asc">ASC</a>
            </div>
        </div>

        <div class="col-lg-4">
            <span>Sort By Content</span>
            <div class="btn-group" role="group" aria-label="Sort By Name">
                <a type="button" class="btn btn-secondary" href="/sort_by/content/desc">DESC</a>
                <a type="button" class="btn btn-secondary" href="/sort_by/content/asc">ASC</a>
            </div>
        </div>

    </div>

    <div class="row">

        <?php if (!empty($tasks)) {

            foreach ($tasks as $task) { ?>
                <div class="col col-lg-4">
                    <div class="task-block">
                        <div class="task-block-header">
                            <span><?=$task->id?></span>
                            <?php if ($task->status) { ?>
                                <button class="btn btn-sm btn-outline-success">Done</button>
                            <?php } ?>

                            <?php if ($task->edited) { ?>
                                <button class="btn btn-sm btn-outline-danger">Edited by admin</button>
                            <?php } ?>

                        </div>
                        <div class="task-block-content">
                            <p><strong>Name: </strong><?=$task->name?></p>
                            <p><strong>Email: </strong><?=$task->email?></p>
                            <p><strong>Content: </strong><?=$task->content?></p>
                        </div>
                    </div>
                </div>
            <?php }
            ?>

        <?php } else { ?>
            <div class="col-lg-12">No tasks been added</div>
        <?php } ?>

    </div>
    <div class="row">
        <ul id="page-numbers">
            <?php for ($i = 1; $i <= $paginationCount; $i++) { ?>
                <?php

                    if (isset($_GET['page'])) {
                        $active = $i == $_GET['page'] ? 'active' : '';
                    } else {
                        $active = $i == 1 ? 'active' : '';
                    }

                    $url = explode("?", $_SERVER['REQUEST_URI']);
                ?>
                <li class="<?=$active?>">
                    <a href="<?=$url[0]?>?page=<?=$i?>"><?= $i ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
