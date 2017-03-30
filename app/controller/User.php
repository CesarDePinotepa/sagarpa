<?php

namespace Controller;

/**
 * Created by PhpStorm.
 * User: Ariel
 * Date: 3/16/2017
 * Time: 12:01 AM
 */
class User extends AdminController
{
    public function index()
    {
        $records = $this->db->get('usuario')->results();
        render('admin/user/list', compact('records'));
    }

    public function delete($id)
    {
        if ($this->request->isPost()) {
            $this->db->where('id', $this->request->data->id)->delete('usuario');
            $this->flash->success("Los datos fueron eliminados");
            $this->url->redirect('admin/users');
        } else {
            render('admin/user/delete', compact('id'));
        }
    }

    public function edit($id)
    {
        $model = $this->db->where('id', $id)->get('usuario')->row();
        $title = "Editar Usuario";
        render('admin/user/form', compact('model', 'title'));
    }

    public function add()
    {
        $title = "Nuevo Usuario";
        $model = new \Dummy();
        render('admin/user/form', compact('model', 'title'));
    }

    public function save()
    {
        $id = $this->request->data->id;

        $data = $this->request->data->only(array(
            'nombre', 'apellidos', 'email', 'id' //, 'password'
        ));
        //$data['password'] = md5($data['password']);
        if (isset($id) && !empty($id)) {
            //update
            $this->db->where('id', $id)->update('usuario', $data);
        } else {
            //save
            unset($data['id']);
            $data['password'] = md5('12345');
            $this->db->insert('usuario', $data);
            $id = $this->db->insert_id();
        }
        $this->flash->success("Los datos fueron guardados");
        //$this->edit($id);
        $this->url->redirect('admin/users/edit/' . $id);
    }
}