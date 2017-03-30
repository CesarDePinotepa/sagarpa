<?php

namespace Controller;

/**
 * Created by PhpStorm.
 * User: Ariel
 * Date: 3/16/2017
 * Time: 12:01 AM
 */
class Candidato extends AdminController
{
    public function index()
    {
        $this->db->arrayForSelect('candidato', 'nombre');
        $records = $this->db->get('candidato')->results();
        render('admin/candidato/list', compact('records'));
    }

    public function delete($id)
    {
        if ($this->request->isPost()) {
            $this->db->where('id', $this->request->data->id)->delete('candidato');
            $this->flash->success("Los datos fueron eliminados");
            $this->url->redirect('admin/candidato');
        } else {
            render('admin/candidato/delete', compact('id'));
        }
    }

    public function edit($id)
    {
        $model = $this->db->where('id', $id)->get('candidato')->row();
        $title = "Editar Candidato";
        render('admin/candidato/form', compact('model', 'title'));
    }

    public function add()
    {
        $title = "Nuevo Candidato";
        $model = new \Dummy();
        render('admin/candidato/form', compact('model', 'title'));
    }

    public function save()
    {
        $id = $this->request->data->id;

        $data = $this->request->data->only(array(
            'id', 'rfc', 'apellido1', 'apellido2', 'nombre',
            'curp', 'tipo_persona', 'direccion'
        ));
        if (isset($id) && !empty($id)) {
            //update
            $this->db->where('id', $id)->update('candidato', $data);
        } else {
            //save
            unset($data['id']);
            $res = $this->db->insert('candidato', $data);
            $id = $this->db->insert_id();
        }
        $this->flash->success("Los datos fueron guardados");
        //$this->edit($id);
        $this->url->redirect('admin/candidato/edit/' . $id);
    }
}