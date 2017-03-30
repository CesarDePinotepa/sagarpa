<?php echo render('common/admin/header', array('page_title' => "Programa")); ?>
    <p>
        <a href="<?php echo route('admin/programa/add'); ?>" class="btn btn-primary ">Nuevo</a>
    </p>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <!--                                                        <td class="client-avatar"><img alt="image" src="img/a2.jpg"> </td>-->
                    <td>
                        <a href="<?php echo route('admin/programa/edit/' . $record->id); ?>"
                           class="client-link"><?php echo $record->nombre . " " . $record->apellido1 . ' ' . $record->apellido2; ?></a>
                    </td>
                    <td> <?php echo $record->rfc; ?></td>
                    <td> <?php echo $record->curp; ?></td>
                    <td><?php
                        switch ($record->puesto) {
                            case 'j': {
                                echo "Jefe de Oficina";
                                break;
                            }

                            case 't': {
                                echo "Técnico";
                                break;
                            }
                        }
                        ?></td>
                    <td class="text-right">
                        <a href="<?php echo route('admin/programa/edit/' . $record->id) ?>"
                           class="btn btn-xs btn-default">
                            <i class="fa fa-pencil"></i> Editar</a>
                        <a href="<?php echo route('admin/programa/delete/' . $record->id) ?>"
                           class="btn btn-xs btn-danger">
                            <i class="fa fa-trash"></i> Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php echo render('common/admin/footer'); ?>