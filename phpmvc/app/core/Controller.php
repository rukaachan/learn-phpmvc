<?php 

class Controller {
    public function view($view, $data = [])
    {
        //! mengeck apakah ada file di dalam folder view - home
        require_once "../app/views/" . $view . '.php';
    }

    public function model($model)
    {
        require_once "../app/models/". $model . '.php';
        return new $model;
    }
}

?>