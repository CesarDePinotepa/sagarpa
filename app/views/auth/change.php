<?php echo render('common/simple/header'); ?>
    <div class="container">
        <form class="form-signin" action="<?php echo route('change'); ?>" method="post">
            <h2 class="form-signin-heading text-center">Cambiar contraseña</h2>
            <input type="hidden" class="form-control" id="key" name="key" required value="<?php echo $key; ?>">
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" class="form-control" id="pass" placeholder="Password" name="pass" required>
            </div>
            <div class="form-group">
                <label for="pass2">Rescriba el Password</label>
                <input type="password" class="form-control" id="pass2" placeholder="Rescriba el Password" name="pass2"
                       required>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Cambiar contraseña</button>
            <div class="text-center " style="margin-top: 10px;">
                <a href="<?php echo route('login'); ?>">Regresar al inicio</a>
            </div>
        </form>
    </div>
<?php echo render('common/simple/footer'); ?>