<?php echo render('common/admin/header', array('page_title' => "Pacientes")); ?>
    <p>
        <a href="<?php echo route('admin/paciente/add'); ?>" class="btn btn-primary ">Nuevo</a>
    </p>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <!--                                                        <td class="client-avatar"><img alt="image" src="img/a2.jpg"> </td>-->
                    <td>
                        <a href="<?php echo route('admin/paciente/edit/' . $record->id); ?>"
                           class="client-link"><?php echo $record->nombre . " " . $record->apaterno . ' ' . $record->amaterno; ?></a>
                    </td>
                    <td class="contact-type"><?php echo $record->curp; ?></td>
                    <td class="contact-type"><i class="fa fa-envelope"> </i><?php echo $record->email; ?></td>
                    <td class="text-right">
                        <a href="<?php echo route('admin/paciente/edit/' . $record->id) ?>"
                           class="btn btn-xs btn-default">
                            <i class="fa fa-pencil"></i> Editar</a>
                        <a href="<?php echo route('admin/paciente/delete/' . $record->id) ?>"
                           class="btn btn-xs btn-danger">
                            <i class="fa fa-trash"></i> Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php echo render('common/admin/footer'); ?>