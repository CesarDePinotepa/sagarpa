<?php

namespace Controller;

/**
 * Created by PhpStorm.
 * User: Ariel
 * Date: 3/16/2017
 * Time: 12:01 AM
 */
class Auth extends Controller
{
    public function login()
    {
        render('auth/login');
    }

    public function loginPost()
    {
        $user = $this->request->data->name;
        $pass = $this->request->data->pass;
        if ($this->auth->login($user, $pass)) {
            $this->url->redirect('/admin');
        } else {
            $this->url->redirect('/login');
        }
    }

    public function logout()
    {
        $this->auth->logout();
        $this->url->redirect('/login');
    }

    public function forgot()
    {
        render('auth/forgot');
    }

    public function forgotPost()
    {
        $user = $this->db->where('email', $this->request->data->email)->get('usuario')->row();
        if ($user == null) {
            $this->flash->error("No existe el usuario");
        }
        $key = $this->auth->forgot($user->id);
        //send email
        $msg = '<a href="' . route('/change/' . $key) . '" >Siga este enlace para cambiar su contraseña</a>';
        @mail($user->email, "Change password", $msg);

        $this->url->redirect('/login');

    }

    public function change($key)
    {
        $user = $this->db->where('passwordrecovery', $key)->get('usuario')->row();
        if ($user == null) {
            $this->flash->success("Este link expiró.");
            $this->url->redirect('/login');
        }
        render('auth/change', array('key' => $key));
    }

    public function changePost()
    {
        $key = $this->request->data->key;
        $pass = $this->request->data->pass;
        $pass2 = $this->request->data->pass2;
        if ($pass != $pass2) {
            $this->flash->error("Las contrasseñas deben coincidir");
            $this->url->redirect('/change/' . $key);
        }
        $user = $this->db->where('passwordrecovery', $key)->get('usuario')->row();
        $data = array(
            'passwordrecovery' => null,
            'password' => md5($pass)
        );
        app()->db->where('id', $user->id)->update('usuario', $data);
        $this->flash->success("Su contraseña fue cambiada correctamente");
        $this->url->redirect('/login');
    }
}