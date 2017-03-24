<?php echo render('common/simple/header'); ?>
    <div class="container">
        <form class="form-signin" action="<?php echo route('login'); ?>" method="post">
            <h2 class="form-signin-heading text-center">Please sign in</h2>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="pass" placeholder="Password" name="pass" required>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <div class="text-center " style="margin-top: 10px;">
                <a href="<?php echo route('forgot'); ?>">Olvidaste tu contraseña?</a>
            </div>
        </form>
    </div>
<?php echo render('common/simple/footer'); ?>