<?php echo render('common/admin/header', array('page_title' => $title)); ?>
    <form role="form" id="form" method="post" action="<?php echo route('admin/personal/save'); ?>">
        <input type="hidden" name="id" value="<?php echo $model->id; ?>">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>RFC:</label>
                    <input name="rfc" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->rfc; ?>">
                </div>
                <div class="form-group">
                    <label>Nombre:</label>
                    <input name="nombre" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->nombre; ?>">
                </div>
                <div class="form-group">
                    <label>Apellido Paterno:</label>
                    <input name="apaterno" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->apaterno; ?>">
                </div>
                <div class="form-group">
                    <label>Apellido Materno:</label>
                    <input name="amaterno" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->amaterno; ?>">
                </div>
                <div class="form-group">
                    <label>Estado Civil:</label>
                    <input name="edoCivil" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->edoCivil; ?>">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tipo:</label>
                    <select class="form-control" required name="tipo">
                        <option value="1" <?php echo $model->tipo == 1 ? 'selected' : ''; ?>>Normal</option>
                        <option value="2" <?php echo $model->tipo == 2 ? 'selected' : ''; ?>>Medico</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Telefono:</label>
                    <input name="telefono" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->telefono; ?>">
                </div>
                <div class="form-group">
                    <label>Especialidad:</label>
                    <input name="especialidad" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->especialidad; ?>">
                </div>
                <div class="form-group">
                    <label>Escuela de Procedencia:</label>
                    <input name="escuela" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->escuela; ?>">
                </div>
                <div class="form-group">
                    <label>Experiencia en Años:</label>
                    <input name="experiencia" type="number" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->experiencia; ?>">
                </div>

            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Direccion:</label>
                    <textarea name="direccion" placeholder="" class="form-control" required=""
                              aria-required="true"><?php echo $model->direccion; ?></textarea>
                </div>
                <div class="text-right">
                    <a class="btn btn-sm btn-default m-t-n-xs" href="<?php echo route('admin/personal') ?>">
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