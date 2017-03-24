<?php echo render('common/admin/header', array('page_title' => "Personal")); ?>
    <p>
        <a href="<?php echo route('admin/personal/add'); ?>" class="btn btn-primary ">Nuevo</a>
    </p>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <!--                                                        <td class="client-avatar"><img alt="image" src="img/a2.jpg"> </td>-->
                    <td>
                        <a href="<?php echo route('admin/personal/edit/' . $record->id); ?>"
                           class="client-link"><?php echo $record->nombre . " " . $record->apaterno . ' ' . $record->amaterno; ?></a>
                    </td>
                    <td> <?php echo $record->telefono; ?></td>
                    <td class="contact-type"><i class="fa fa-envelope"> </i>
                    </td>

                    <td><?php
                        switch ($record->tipo) {
                            case 1: {
                                echo "Normal";
                                break;
                            }

                            case 2: {
                                echo "Medico";
                                break;
                            }
                        }
                        ?></td>
                    <td class="text-right">
                        <a href="<?php echo route('admin/personal/edit/' . $record->id) ?>"
                           class="btn btn-xs btn-default">
                            <i class="fa fa-pencil"></i> Editar</a>
                        <a href="<?php echo route('admin/personal/delete/' . $record->id) ?>"
                           class="btn btn-xs btn-danger">
                            <i class="fa fa-trash"></i> Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php echo render('common/admin/footer'); ?>