<?php echo render('common/admin/header', array('page_title' => $title)); ?>
    <form role="form" id="form" method="post" action="<?php echo route('admin/users/save'); ?>">
        <input type="hidden" name="id" value="<?php echo $model->id; ?>">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Apellidos:</label>
                    <input name="apellidos" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->apellidos; ?>">
                </div>
                <div class="form-group">
                    <label>Nombre:</label>
                    <input name="nombre" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->nombre; ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Email:</label>
                    <input name="email" type="email" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->email; ?>">
                </div>
                <div class="form-group">
                    <label>Personal:</label>
                    <?php
                    $options = app()->db->arrayForSelect('personal', function ($el) {
                        return $el->nombre . ' ' . $el->apellido1 . ' ' . $el->apellido2;
                    });
                    echo app()->form->select('personal_id', $options, $model->personal_id, array(
                        'class' => 'form-control',
                        'aria-required' => 'true',
                    ));
                    ?>
                </div>

            </div>
            <div class="col-sm-12">
                <div class="text-right">
                    <a class="btn btn-sm btn-default m-t-n-xs" href="<?php echo route('admin/users') ?>">
                        <strong>&#171; Regresar al listado</strong>
                    </a>
                    <button class="btn btn-sm btn-primary m-t-n-xs" type="submit" data-loading-text="Guardando...">
                        <strong>Guardar</strong>
                    </button>
                </div>
            </div>
        </div>
    </form>
<?php echo render('common/admin/footer'); ?>