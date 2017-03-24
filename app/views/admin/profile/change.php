<?php echo render('common/admin/header', array('page_title' => 'Cambiar contraseña')); ?>
    <form class="form-signin" action="<?php echo route('admin/change'); ?>" method="post">
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
    </form>
<?php echo render('common/admin/footer'); ?>