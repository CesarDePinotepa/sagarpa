<?php echo render('common/admin/header', array('page_title' => $title)); ?>
    <form role="form" id="form" method="post" action="<?php echo route('admin/programa/save'); ?>"
          enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $model->id; ?>">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Concepto:</label>
                    <input name="concepto" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->concepto; ?>">
                </div>
                <div class="form-group">
                    <label>Tipo:</label>
                    <?php
                    echo app()->form->select('tipo', $tipos, $model->tipo, array(
                        'required' => true,
                        'class' => 'form-control'
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <label>Tipo de Persona:</label>
                    <?php
                    echo app()->form->select('tipo_persona', $tipoPersonas, $model->tipo_persona, array(
                        'required' => true,
                        'class' => 'form-control'
                    ));
                    ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Convocatoria:</label>
                    <input name="convocatoria" type="file" placeholder="Enter email" class="form-control"
                           accept=".pdf, .application/pdf, .doc, .docx, .application/msword">
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Cantidad:</label>
                            <input name="cantidad" type="number" placeholder="Enter email" class="form-control"
                                   required=""
                                   aria-required="true" pattern="\d+?" value="<?php echo $model->cantidad; ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Monto:</label>
                            <input name="monto" type="number" placeholder="Enter email" class="form-control" required=""
                                   aria-required="true" pattern="\d+(\.\d{2})?" value="<?php echo $model->monto; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Beneficio:</label>
                    <input name="beneficio" type="text" placeholder="Enter email" class="form-control" required=""
                           aria-required="true" value="<?php echo $model->beneficio; ?>">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="text-right">
                    <a class="btn btn-sm btn-default m-t-n-xs" href="<?php echo route('admin/programa') ?>">
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