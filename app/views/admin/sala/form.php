<?php echo render('common/admin/header', array('page_title' => $title)); ?>
    <form role="form" id="form" method="post" action="<?php echo route('admin/sala/save'); ?>">
        <input type="hidden" name="id" value="<?php echo $model->id; ?>">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nombre:</label>
                    <input name="nombre" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->nombre; ?>">
                </div>
                <div class="form-group">
                    <label>Estado:</label>
                    <select class="form-control" required name="status">
                        <option value="0" <?php echo $model->status == 0 ? 'selected' : ''; ?>>Inhabilitada</option>
                        <option value="1" <?php echo $model->status == 1 ? 'selected' : ''; ?>>Habilitada</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Tipo:</label>
                    <input name="tipo" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->tipo; ?>">
                </div>

            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Comentario:</label>
                    <textarea name="comment" placeholder="" class="form-control" required=""
                              aria-required="true"><?php echo $model->comment; ?></textarea>
                </div>
                <div class="text-right">
                    <a class="btn btn-sm btn-default m-t-n-xs" href="<?php echo route('admin/sala') ?>">
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