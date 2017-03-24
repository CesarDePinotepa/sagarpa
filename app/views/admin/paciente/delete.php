<?php echo render('common/admin/header', array('page_title' => "Eliminar Paciente")); ?>
    <div class="ibox float-e-margins m-b-none">
        <div class="ibox-content text-center p-md" style="border: none">
            <h2><span class="text-danger">Esta seguro que desea eliminar a este paciente??</span></h2>
            <p>
                Esta operacion no podra ser deshecha.
            </p>
            <form method="post" action="<?php echo route('admin/paciente/delete') ?>">
                <input type="hidden" value="<?php echo $id ?>" name="id">
                <a class="btn btn-default btn-lg" href="<?php echo route('admin/paciente') ?>">
                    Cancelar
                </a>
                <button class="btn btn-danger btn-lg" type="submit">Eliminar</button>
            </form>
        </div>
    </div>
<?php echo render('common/admin/footer'); ?>