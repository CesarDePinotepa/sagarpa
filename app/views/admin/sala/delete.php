<?php echo render('common/admin/header', array('page_title' => "Eliminar Sala")); ?>
    <div class="ibox float-e-margins m-b-none">
        <div class="ibox-content text-center p-md" style="border: none">
            <h2><span class="text-danger">Esta seguro que desea eliminar a este Sala??</span></h2>
            <p>
                Esta operacion no podra ser deshecha.
            </p>
            <form method="post" action="<?php echo route('admin/sala/delete') ?>">
                <input type="hidden" value="<?php echo $id ?>" name="id">
                <a class="btn btn-default btn-lg" href="<?php echo route('admin/sala') ?>">
                    Cancelar
                </a>
                <button class="btn btn-danger btn-lg" type="submit">Eliminar</button>
            </form>
        </div>
    </div>
<?php echo render('common/admin/footer'); ?>