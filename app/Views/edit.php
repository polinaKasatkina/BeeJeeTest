<div>

    <?php if (isset($notice) && !empty($notice)) { ?>
        <div class="alert alert-success" role="alert">
            <?= $notice ?>
        </div>
    <?php } ?>

    <div class="row justify-content-start">
        <div class="col-lg-6">
            <form method="post" action="/dashboard/task/<?=$task->id?>/update">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?=isset($request) ? $request->name : $task->name?>">
                    <?php if (isset($errors) &&  isset($errors['name'])) { ?>
                        <p class="text-danger"><?=$errors['name'][0]?></p>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?=isset($request) ? $request->email : $task->email?>">
                    <?php if (isset($errors) && isset($errors['email'])) { ?>
                        <p class="text-danger"><?=$errors['email'][0]?></p>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="text">Task Content</label>
                    <input type="text" class="form-control" id="text" name="text" value="<?=isset($request) ? $request->text : $task->content?>">
                    <?php if (isset($errors) &&  isset($errors['text'])) { ?>
                        <p class="text-danger"><?=$errors['text'][0]?></p>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label><input type="checkbox" class="form-control" name="status" <?= $task->status ? 'checked' : '' ?>> Done</label>
                </div>
                <input type="hidden" name="id" value="<?=$task->id?>" />
                <input type="submit" value="Save" />
            </form>
        </div>
    </div>


</div>
