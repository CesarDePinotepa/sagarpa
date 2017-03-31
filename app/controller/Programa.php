<?php

namespace Controller;

/**
 * Created by PhpStorm.
 * User: Ariel
 * Date: 3/16/2017
 * Time: 12:01 AM
 */
class Programa extends AdminController
{
    private $convocatoriaDir;

    private $tipos = array(
        'a' => 'Adquisición de Material Vegetativo,',
        'i' => 'Infraestructura',
        'e' => 'Equipamiento',
        'm' => 'Maquinaria',
    );
    private $tipoPersonas = array(
        'f' => 'Física',
        'm' => 'Moral',
    );

    /**
     * Programa constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->convocatoriaDir = dirname($_SERVER['SCRIPT_FILENAME']) . '/public/upload/convocatoria/';
    }

    public function index()
    {
        $records = $this->db->get('programa')->results();
        $tipos = $this->tipos;
        $tipoPersonas = $this->tipoPersonas;
        render('admin/programa/list', compact('records', 'tipos', 'tipoPersonas'));
    }

    public function delete($id)
    {
        if ($this->request->isPost()) {
            $this->db->where('id', $this->request->data->id)->delete('programa');
            $this->flash->success("Los datos fueron eliminados");
            $this->url->redirect('admin/programa');
        } else {
            render('admin/programa/delete', compact('id'));
        }
    }

    public function edit($id)
    {
        $model = $this->db->where('id', $id)->get('programa')->row();
        $requisitos = $this->db->where('programa_id', $id)->get('requisito')->results();
        $componentes = $this->db->where('programa_id', $id)->get('componente')->results();
        $title = "Editar Programa";
        $tipos = $this->tipos;
        $tipoPersonas = $this->tipoPersonas;
        render('admin/programa/form', compact('model', 'title', 'tipos', 'tipoPersonas', 'requisitos', 'componentes'));
    }

    public function add()
    {
        $title = "Nuevo Programa";
        $model = new \Dummy();
        $requisitos = array();
        $componentes = array();
        $tipos = $this->tipos;
        $tipoPersonas = $this->tipoPersonas;
        render('admin/programa/form', compact('model', 'title', 'tipos', 'tipoPersonas'));
    }

    public function save()
    {
        $id = $this->request->data->id;

        $data = $this->request->data->only(array(
            'id', 'concepto', 'tipo_persona', 'tipo', 'cantidad', 'monto', 'beneficio'
        ));

        if ($_FILES['convocatoria']['name']) {
            @mkdir($this->convocatoriaDir, 0777, true);
            $name = $_FILES['convocatoria']['name'];
            $actual_name = @pathinfo($name, PATHINFO_FILENAME);
            $extension = @pathinfo($name, PATHINFO_EXTENSION);
            $original_name = $actual_name;
            $i = 1;
            while (@file_exists($this->convocatoriaDir . $actual_name . "." . $extension)) {
                $actual_name = (string)$original_name . $i;
                $name = $actual_name . "." . $extension;
                $i++;
            }
            @move_uploaded_file($_FILES['convocatoria']['tmp_name'], $this->convocatoriaDir . $name);
            $data['convocatoria'] = $name;
        }
        if (isset($id) && !empty($id)) {
            //update
            $this->db->where('id', $id)->update('programa', $data);

        } else {
            //save
            unset($data['id']);
            $this->db->insert('programa', $data);
            $id = $this->db->insert_id();
        }
        //salvando requisitos
        $reqs = $this->request->data->requisito;
        //Elimino los q ya no estan
        $this->db->not_in('id', array_map('intval', array_keys($reqs)));
        $this->db->where('programa_id', $id);
        $this->db->delete('requisito');
        //actualizo o guardo segun sea el caso
        foreach ($reqs as $key => $req) {
            $data = array(
                'nombre' => $req['nombre'],
                'tipo' => $req['tipo']
            );
            if ($key > 0) {
                $this->db->where('id', $key);
                $this->db->update('requisito', $data);
            } else {
                $data['programa_id'] = $id;
                $this->db->insert('requisito', $data);
            }
        }


        //salvando componentes
        $reqs = $this->request->data->componente;
        //Elimino los q ya no estan
        $this->db->not_in('id', array_map('intval', array_keys($reqs)));
        $this->db->where('programa_id', $id);
        $this->db->delete('componente');
        //actualizo o guardo segun sea el caso
        foreach ($reqs as $key => $req) {
            $data = array(
                'nombre_componente' => $req['nombre_componente'],
                'subconceptos' => $req['subconceptos']
            );
            if ($key > 0) {
                $this->db->where('id', $key);
                $this->db->update('componente', $data);
            } else {
                $data['programa_id'] = $id;
                $this->db->insert('componente', $data);
            }
        }


        $this->flash->success("Los datos fueron guardados");
        //$this->edit($id);
        $this->url->redirect('admin/programa/edit/' . $id);
    }
}