<?php
require_once './App/Models/motoModel.php';
require_once './App/Views/jsonView.php';

class MotosApiController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new MotoModel();
        $this->view = new JSONView();
    }

    // 1. Listar (con paginación)
    public function getPaginado($req, $res)
    {
        $tipo = $req->query->tipo ?? null;
        $orderBy = $req->query->orderBy ?? null;
        $direction = $req->query->direction ?? null;
        $pagina = $req->params->p ?? 1;
        $limit = 5;

        $pagMax = ceil($this->model->countRows() / $limit);

        if (!is_numeric($pagina) || $pagina < 1 || $pagina > $pagMax) {
            return $this->view->response('Página inválida', 400);
        }

        $motos = $this->model->getMotosPaginado($tipo, $orderBy, $direction, $pagina, $limit);

        if (!$motos) {
            return $this->view->response('No hay motos disponibles', 404);
        }

        return $this->view->response($motos, 200);
    }

    // 2. Obtener una moto
    public function get($req, $res)
    {
        $id = $req->params->id;
        $moto = $this->model->getMoto($id);

        if (!$moto) {
            return $this->view->response("No existe la moto con id=$id", 404);
        }

        return $this->view->response($moto, 200);
    }

    // 3. Crear una moto
    public function create($req, $res)
    {
        if (empty($req->body->modelo) || empty($req->body->precio) || empty($req->body->caracteristicas) || empty($req->body->id_tipo)) {
            return $this->view->response('Faltan datos', 400);
        }

        $id = $this->model->insertMoto($req->body->modelo, $req->body->caracteristicas, $req->body->precio, $req->body->id_tipo);
        $moto = $this->model->getMoto($id);

        return $this->view->response($moto, 201);
    }

    // 4. Actualizar
    public function update($req, $res)
    {
        $id = $req->params->id;
        $moto = $this->model->getMoto($id);

        if (!$moto) {
            return $this->view->response('La moto no existe', 404);
        }

        if (empty($req->body->modelo) || empty($req->body->precio) || empty($req->body->caracteristicas) || empty($req->body->id_tipo)) {
            return $this->view->response('Faltan datos', 400);
        }

        $this->model->updateMoto($id, $req->body->modelo, $req->body->caracteristicas, $req->body->precio, $req->body->id_tipo);
        $moto = $this->model->getMoto($id);

        return $this->view->response($moto, 200);
    }

    // 5. Eliminar
    public function delete($req, $res)
    {
        $id = $req->params->id;
        $moto = $this->model->getMoto($id);

        if (!$moto) {
            return $this->view->response('La moto no existe', 404);
        }

        $this->model->deleteMoto($id);
        return $this->view->response('Moto eliminada correctamente', 200);
    }
}
