<?php echo render('common/simple/header'); ?>

    <div class="container">
        <form class="form-signin" action="<?php echo route('forgot'); ?>" method="post">
            <h2 class="form-signin-heading text-center">Contraseña olvidada</h2>
            <p>
                Enter your email address and your password will be reset and emailed to you.
            </p>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar contraseña</button>
            <div class="text-center " style="margin-top: 10px;">
                <a href="<?php echo route('login'); ?>">Regresar al inicio</a>
            </div>
        </form>
    </div>

<?php echo render('common/simple/footer'); ?>