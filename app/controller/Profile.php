<?php
namespace Controller;

/**
 * Created by PhpStorm.
 * User: Ariel
 * Date: 3/16/2017
 * Time: 12:01 AM
 */
class Profile extends AdminController
{
    public function profile()
    {
        $model = $this->auth->user();
        render('admin/profile/form', compact('model'));
    }

    public function profilePost()
    {
        $model = $this->auth->user();
        $data = $this->request->data->only(array(
            'nombre', 'apellidos', 'email'//, 'password'
        ));
        $this->db->where('id', $model->id)->update('usuario', $data);
        $this->flash->success("Su perfil fue actualizado");
        $this->url->redirect('/admin/profile');

    }


    public function logout()
    {
        $this->auth->logout();
        $this->flash->success("Sesión fializada correctamente");
        $this->url->redirect('/login');
    }

    public function change()
    {
        render('admin/profile/change');
    }

    public function changePost()
    {
        $pass = $this->request->data->pass;
        $pass2 = $this->request->data->pass2;
        if ($pass != $pass2) {
            $this->flash->error("Las contrasseñas deben coincidir");
            $this->url->redirect('/admin/change/');
        }
        $user = $this->auth->user();
        $data = array(
            'passwordrecovery' => null,
            'password' => md5($pass)
        );
        app()->db->where('id', $user->id)->update('usuario', $data);
        $this->flash->success("Su contraseña fue cambiada correctamente");
        $this->url->redirect('/admin');
    }
}