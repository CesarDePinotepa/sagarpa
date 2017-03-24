<?php echo render('common/admin/header', array('page_title' => $title)); ?>
    <form role="form" id="form" method="post" action="<?php echo route('admin/paciente/save'); ?>">
        <input type="hidden" name="id" value="<?php echo $model->id; ?>">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>CURP:</label>
                    <input name="curp" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->curp; ?>">
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
                    <label>Nombre:</label>
                    <input name="nombre" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->nombre; ?>">
                </div>
                <div class="form-group">
                    <label>Estado Civil:</label>
                    <input name="edoCivil" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->edoCivil; ?>">
                </div>
                <div class="form-group">
                    <label>Fecha de Nacimiento:</label>
                    <input name="fechaNac" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->fechaNac; ?>">
                </div>
            </div>
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Telefono:</label>
                    <input name="telefono" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->telefono; ?>">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="email" type="email" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->email; ?>">
                </div>
                <div class="form-group">
                    <label>Ocupacion:</label>
                    <input name="ocupacion" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->ocupacion; ?>">
                </div>
                <div class="form-group">
                    <label>Alergias:</label>
                    <input name="alergias" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->alergias; ?>">
                </div>
                <div class="form-group">
                    <label>Expediente:</label>
                    <input name="expediente" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->expediente; ?>">
                </div>
                <div class="form-group">
                    <label>Fecha de Alta:</label>
                    <input name="fechaAlta" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->fechaAlta; ?>">
                </div>

            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Direccion:</label>
                    <textarea name="direccion" placeholder="" class="form-control" required=""
                              aria-required="true"><?php echo $model->direccion; ?></textarea>
                </div>
                <div class="text-right">
                    <a class="btn btn-sm btn-default m-t-n-xs" href="<?php echo route('admin/paciente') ?>">
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