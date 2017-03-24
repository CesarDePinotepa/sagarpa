<?php echo render('common/admin/header', array('page_title' => "Salas")); ?>
    <p>
        <a href="<?php echo route('admin/sala/add'); ?>" class="btn btn-primary ">Nuevo</a>
    </p>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <!--                                                        <td class="client-avatar"><img alt="image" src="img/a2.jpg"> </td>-->
                    <td>
                        <a href="<?php echo route('admin/sala/edit/' . $record->id); ?>"
                           class="client-link"><?php echo $record->nombre; ?></a>
                    </td>
                    <td> <?php echo $record->tipo; ?></td>
                    <td><?php echo $record->status == 1 ? "Habilitada" : "Inhabilitada"; ?></td>
                    <td class="text-right">
                        <a href="<?php echo route('admin/sala/edit/' . $record->id) ?>"
                           class="btn btn-xs btn-default">
                            <i class="fa fa-pencil"></i> Editar</a>
                        <a href="<?php echo route('admin/sala/delete/' . $record->id) ?>"
                           class="btn btn-xs btn-danger">
                            <i class="fa fa-trash"></i> Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php echo render('common/admin/footer'); ?>