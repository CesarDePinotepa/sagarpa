<?php
namespace Controller;

/**
 * Created by PhpStorm.
 * User: Ariel
 * Date: 3/16/2017
 * Time: 12:01 AM
 */
class Servicio extends AdminController
{
    public function index()
    {
        $records = $this->db->get('servicio')->results();
        render('admin/servicio/list', compact('records'));
    }

    public function delete($id)
    {
        if ($this->request->isPost()) {
            $this->db->where('id', $this->request->data->id)->delete('servicio');
            $this->flash->success("Los datos fueron eliminados");
            $this->url->redirect('admin/servicio');
        } else {
            render('admin/servicio/delete', compact('id'));
        }
    }

    public function edit($id)
    {
        $model = $this->db->where('id', $id)->get('servicio')->row();
        $title = "Editar Servicio";
        render('admin/servicio/form', compact('model', 'title'));
    }

    public function add()
    {
        $title = "Nuevo Servicio";
        $model = new \Dummy();
        render('admin/servicio/form', compact('model', 'title'));
    }

    public function save()
    {
        $id = $this->request->data->id;

        $data = $this->request->data->only(array(
            'id', 'nombre', 'precio', 'tipo'
        ));
        if (isset($id) && !empty($id)) {
            //update
            $this->db->where('id', $id)->update('servicio', $data);
        } else {
            //save
            unset($data['id']);
            $this->db->insert('servicio', $data);
            $id = $this->db->insert_id();
        }
        $this->flash->success("Los datos fueron guardados");
        //$this->edit($id);
        $this->url->redirect('admin/servicio/edit/' . $id);
    }
}