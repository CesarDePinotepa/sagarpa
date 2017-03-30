<?php echo render('common/admin/header', array('page_title' => $title)); ?>
    <form role="form" id="form" method="post" action="<?php echo route('admin/candidato/save'); ?>">
        <input type="hidden" name="id" value="<?php echo $model->id; ?>">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nombre:</label>
                    <input name="nombre" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->nombre; ?>">
                </div>
                <div class="form-group">
                    <label>Apellido Paterno:</label>
                    <input name="apellido1" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->apellido1; ?>">
                </div>
                <div class="form-group">
                    <label>Apellido Materno:</label>
                    <input name="apellido2" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->apellido2; ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>RFC:</label>
                    <input name="rfc" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->rfc; ?>">
                </div>
                <div class="form-group">
                    <label>CURP:</label>
                    <input name="curp" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->curp; ?>">
                </div>
                <div class="form-group">
                    <label>Tipo:</label>
                    <select class="form-control" required name="tipo_persona">
                        <option value="m" <?php echo $model->tipo_persona == 'm' ? 'selected' : ''; ?>>Moral
                        </option>
                        <option value="f" <?php echo $model->tipo_persona == 'f' ? 'selected' : ''; ?>>Fisica</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Direccion:</label>
                    <textarea name="direccion" placeholder="" class="form-control" required=""
                              aria-required="true"><?php echo $model->direccion; ?></textarea>
                </div>
                <div class="text-right">
                    <a class="btn btn-sm btn-default m-t-n-xs" href="<?php echo route('admin/candidato') ?>">
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