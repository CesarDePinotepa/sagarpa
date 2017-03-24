<?php echo render('common/admin/header', array('page_title' => "Perfil")); ?>
    <form role="form" id="form" method="post" action="<?php echo route('admin/profile'); ?>">

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nombre:</label>
                    <input name="nombre" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->nombre; ?>">
                </div>
                <div class="form-group">
                    <label>Apellidos:</label>
                    <input name="apellidos" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->apellidos; ?>">
                </div>
            </div>
            <div class="col-sm-6">

                <!--                <div class="form-group">-->
                <!--                    <label>Password:</label>-->
                <!--                    <input name="password" type="password" placeholder="Enter email" class="form-control" required=""-->
                <!--                           aria-required="true" value="--><?php //echo $model->password; ?><!--">-->
                <!--                </div>-->
                <div class="form-group">
                    <label>Email:</label>
                    <input name="email" type="email" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->email; ?>">
                </div>

            </div>
            <div class="col-sm-12">
                <div class="text-right">
                    <button class="btn btn-sm btn-primary m-t-n-xs" type="submit" data-loading-text="Guardando...">
                        <strong>Guardar</strong>
                    </button>
                </div>
            </div>
        </div>
    </form>
<?php echo render('common/admin/footer'); ?>