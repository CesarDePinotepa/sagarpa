<?php

namespace Controller;

/**
 * Created by PhpStorm.
 * User: Ariel
 * Date: 3/16/2017
 * Time: 12:01 AM
 */
class Personal extends AdminController
{
    public function index()
    {
        $this->db->arrayForSelect('personal', 'nombre');
        $records = $this->db->get('personal')->results();
        render('admin/personal/list', compact('records'));
    }

    public function delete($id)
    {
        if ($this->request->isPost()) {
            $this->db->where('id', $this->request->data->id)->delete('personal');
            $this->flash->success("Los datos fueron eliminados");
            $this->url->redirect('admin/personal');
        } else {
            render('admin/personal/delete', compact('id'));
        }
    }

    public function edit($id)
    {
        $model = $this->db->where('id', $id)->get('personal')->row();
        $title = "Editar Personal";
        render('admin/personal/form', compact('model', 'title'));
    }

    public function add()
    {
        $title = "Nuevo Personal";
        $model = new \Dummy();
        render('admin/personal/form', compact('model', 'title'));
    }

    public function save()
    {
        $id = $this->request->data->id;

        $data = $this->request->data->only(array(
            'id', 'rfc', 'apellido1', 'apellido2', 'nombre',
            'curp', 'puesto', 'direccion'
        ));
        if (isset($id) && !empty($id)) {
            //update
            $this->db->where('id', $id)->update('personal', $data);
        } else {
            //save
            unset($data['id']);
            $this->db->insert('personal', $data);
            $id = $this->db->insert_id();
        }
        $this->flash->success("Los datos fueron guardados");
        //$this->edit($id);
        $this->url->redirect('admin/personal/edit/' . $id);
    }
}