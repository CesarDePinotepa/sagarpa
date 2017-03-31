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
                    <?php if (!empty($model->convocatoria)): ?>
                        <div class="input-group">
                            <input name="convocatoria" type="file" placeholder="Enter email" class="form-control"
                                   accept=".pdf, .application/pdf, .doc, .docx, .application/msword">
                            <span class="input-group-btn">
                            <a target="_blank"
                               href="<?php echo asset('upload/convocatoria/' . $model->convocatoria); ?>"
                               class="btn btn-default"
                               type="button">Ver fichero!</a>
                        </span>
                        </div>
                    <?php else: ?>
                        <input name="convocatoria" type="file" placeholder="Enter email" class="form-control"
                               accept=".pdf, .application/pdf, .doc, .docx, .application/msword">
                    <?php endif; ?>

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
            <div class="col-sm-6">
                <label>Requisitos:</label>
                <div class="" style="padding-bottom: 10px;">
                    <a href="#add-req" class="btn btn-xs btn-default">Nuevo requisito</a>
                </div>
                <div class="list-requisito">
                    <?php $tipoRequisito = array(
                        '1' => "Requisito 1",
                        '2' => "Requisito 2",
                    ); ?>
                    <?php if (empty($requisitos)) {
                        $dummy = new Dummy();
                        $dummy->id = 0;
                        $requisitos[] = $dummy;
                    } ?>
                    <?php foreach ($requisitos as $req): ?>
                        <div class="row row-list">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <input name="requisito[<?php echo $req->id; ?>][nombre]" type="text"
                                           placeholder="Enter email" class="form-control req-nombre"
                                           required="" aria-required="true" value="<?php echo $req->nombre; ?>">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <?php
                                    echo app()->form->select('requisito[' . $req->id . '][tipo]', $tipoRequisito, $req->tipo, array(
                                        'required' => true,
                                        'class' => 'form-control req-tipo'
                                    ));
                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <a href="#del-req" class="btn btn-xs btn-danger" style="margin-top: 6px;">Eliminar</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-sm-6">
                <label>Componentes:</label>
                <div class="" style="padding-bottom: 10px;">
                    <a href="#add-comp" class="btn btn-xs btn-default">Nuevo componente</a>
                </div>
                <div class="list-componente">
                    <?php if (empty($componentes)) {
                        $dummy = new Dummy();
                        $dummy->id = 0;
                        $componentes[] = $dummy;
                    } ?>
                    <?php foreach ($componentes as $comp): ?>
                        <div class="row row-list">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <input name="componente[<?php echo $comp->id; ?>][nombre_componente]" type="text"
                                           placeholder="Enter email" class="form-control comp-nombre_componente"
                                           required="" aria-required="true"
                                           value="<?php echo $comp->nombre_componente; ?>">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input name="componente[<?php echo $comp->id; ?>][subconceptos]" type="text"
                                               placeholder="Enter email" class="form-control comp-subconceptos"
                                               required="" aria-required="true"
                                               value="<?php echo $comp->subconceptos; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <a href="#del-comp" class="btn btn-xs btn-danger" style="margin-top: 6px;">Eliminar</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
    <script>
        $(function () {
            var counter = -1000;
            var line = $('.list-requisito > .row-list').first().clone();
            var lineComp = $('.list-componente > .row-list').first().clone();
            $(document).on('click', 'a[href="#del-req"], a[href="#del-comp"]', function () {
                $(this).parents('.row-list').remove();
            });
            $('a[href="#add-req"]').click(function () {
                var newline = line.clone();
                counter++;
                newline.find('.req-nombre').attr('name', 'requisito[' + counter + '][nombre]');
                newline.find('.req-tipo').attr('name', 'requisito[' + counter + '][tipo]');
                newline.find('input').val('');
                $('.list-requisito').append(newline);
            });
            $('a[href="#add-comp"]').click(function () {
                var newline = lineComp.clone();
                counter++;
                newline.find('.comp-nombre_componente').attr('name', 'componente[' + counter + '][nombre_componente]');
                newline.find('.comp-subconceptos').attr('name', 'componente[' + counter + '][subconceptos]');
                newline.find('input').val('');
                $('.list-componente').append(newline);
            });
        })
    </script>
<?php echo render('common/admin/footer'); ?>