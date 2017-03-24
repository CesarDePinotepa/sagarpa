<?php
namespace Controller;

/**
 * Created by PhpStorm.
 * User: Ariel
 * Date: 3/16/2017
 * Time: 12:01 AM
 */
class Paciente extends AdminController
{
    public function index()
    {
        $records = $this->db->get('paciente')->results();
        render('admin/paciente/list', compact('records'));
    }

    public function delete($id)
    {
        if ($this->request->isPost()) {
            $this->db->where('id', $this->request->data->id)->delete('paciente');
            $this->flash->success("Los datos fueron eliminados");
            $this->url->redirect('admin/paciente');
        } else {
            render('admin/paciente/delete', compact('id'));
        }
    }

    public function edit($id)
    {
        $model = $this->db->where('id', $id)->get('paciente')->row();
        $title = "Editar Paciente";
        render('admin/paciente/form', compact('model', 'title'));
    }

    public function add()
    {
        $title = "Nuevo Paciente";
        $model = new \Dummy();
        render('admin/paciente/form', compact('model', 'title'));
    }

    public function save()
    {
        $id = $this->request->data->id;

        $data = $this->request->data->only(array(
            'id', 'curp', 'apaterno', 'amaterno', 'nombre',
            'direccion', 'telefono', 'email', 'ocupacion', 'edoCivil',
            'alergias', 'expediente', 'fechaNac', 'fechaAlta'
        ));
        if (isset($id) && !empty($id)) {
            //update
            $this->db->where('id', $id)->update('paciente', $data);
        } else {
            //save
            unset($data['id']);
            $this->db->insert('paciente', $data);
            $id = $this->db->insert_id();
        }
        $this->flash->success("Los datos fueron guardados");
        //$this->edit($id);
        $this->url->redirect('admin/paciente/edit/' . $id);
    }
}