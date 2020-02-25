<div>

    <?php if (isset($notice)) { ?>
        <div class="alert alert-success" role="alert">
            <?= $notice ?>
        </div>
    <?php } ?>

    <div class="row justify-content-start">
        <div class="col-lg-6">
            <form method="post" action="/new">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <?php if (isset($errors) &&  isset($errors['name'])) { ?>
                        <p class="text-danger"><?=$errors['name']?></p>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <?php if (isset($errors) && isset($errors['email'])) { ?>
                        <p class="text-danger"><?=$errors['email']?></p>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="text">Task Content</label>
                    <input type="text" class="form-control" id="text" name="text">
                    <?php if (isset($errors) &&  isset($errors['text'])) { ?>
                        <p class="text-danger"><?=$errors['text']?></p>
                    <?php } ?>
                </div>
                <input type="submit" value="Save" />
            </form>
        </div>
    </div>


</div>
