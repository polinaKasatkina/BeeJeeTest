<div>
    <div class="row">
        <div class="col-md-6 login-form-1">
            <h3>Login</h3>
            <form method="post" action="/login">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?=isset($request) ? $request->name : ''?>"  />
                    <?php if (isset($errors) &&  isset($errors['name'])) { ?>
                        <p class="text-danger"><?=$errors['name'][0]?></p>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" value="<?=isset($request) ? $request->password : ''?>" />
                    <?php if (isset($errors) &&  isset($errors['password'])) { ?>
                        <p class="text-danger"><?=$errors['password'][0]?></p>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" value="Login"  />
                </div>
            </form>
        </div>
    </div>
</div>
