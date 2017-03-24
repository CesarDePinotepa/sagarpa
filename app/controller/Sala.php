<?php
namespace Controller;

/**
 * Created by PhpStorm.
 * User: Ariel
 * Date: 3/16/2017
 * Time: 12:01 AM
 */
class Sala extends AdminController
{
    public function index()
    {
        $records = $this->db->get('sala')->results();
        render('admin/sala/list', compact('records'));
    }

    public function delete($id)
    {
        if ($this->request->isPost()) {
            $this->db->where('id', $this->request->data->id)->delete('sala');
            $this->flash->success("Los datos fueron eliminados");
            $this->url->redirect('admin/sala');
        } else {
            render('admin/sala/delete', compact('id'));
        }
    }

    public function edit($id)
    {
        $model = $this->db->where('id', $id)->get('sala')->row();
        $title = "Editar Sala";
        render('admin/sala/form', compact('model', 'title'));
    }

    public function add()
    {
        $title = "Nueva Sala";
        $model = new \Dummy();
        render('admin/sala/form', compact('model', 'title'));
    }

    public function save()
    {
        $id = $this->request->data->id;

        $data = $this->request->data->only(array(
            'id', 'nombre', 'comment', 'tipo', 'status'
        ));
        if (isset($id) && !empty($id)) {
            //update
            $this->db->where('id', $id)->update('sala', $data);
        } else {
            //save
            unset($data['id']);
            $this->db->insert('sala', $data);
            $id = $this->db->insert_id();
        }
        $this->flash->success("Los datos fueron guardados");
        //$this->edit($id);
        $this->url->redirect('admin/sala/edit/' . $id);
    }
}