<?php

class ProjectsController extends Controller{

    public function __construct($data = array()){
        parent::__construct($data);
        $this->model = new Project();
    }
///   ДЛЯ КОНСТРУКТОРСКОГО ОТДЕЛА


    public function index(){
        $this->data['projects'] = $this->model->getListKo();
    }

    public function view(){
        $params = App::getRouter()->getParams();

        if ( isset($params[0]) ){
            $name = strtolower($params[0]);
            $this->data['project'] = $this->model->getByKoDescription($name);
        }
    }

    public function adminko_index(){
        $this->data['projects'] = $this->model->getListKo();
    }

    public function adminko_add(){
        if ( $_POST ){
            $result = $this->model->save($_POST);
            if ( $result ){
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/adminko/projects/');
        }
    }

    public function adminko_edit(){

        if ( $_POST ){
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $result = $this->model->save($_POST, $id);
            if ( $result ){
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/adminko/projects/');
        }

        if ( isset($this->params[0]) ){
            $this->data['page'] = $this->model->getByKoId($this->params[0]);
        } else {
            Session::setFlash('Wrong page id.');
            Router::redirect('/adminko/projects/');
        }
    }

    public function adminko_delete(){
        if ( isset($this->params[0]) ){
            $result = $this->model->delete($this->params[0]);
            if ( $result ){
                Session::setFlash('Page was deleted.');
            } else {
                Session::setFlash('Error.');
            }
        }
        Router::redirect('/adminko/projects/');
    }


    ///   ДЛЯ ОТДЕЛА ВОДООТВОДА

/*
    public function index(){
        $this->data['projects'] = $this->model->getListVk();
    }

    public function view(){
        $params = App::getRouter()->getParams();

        if ( isset($params[0]) ){
            $name = strtolower($params[0]);
            $this->data['project'] = $this->model->getByVkDescription($name);
        }
    }
*/
    public function adminvk_index(){
        $this->data['projects'] = $this->model->getListVk();
    }

    public function adminvk_add(){
        if ( $_POST ){
            $result = $this->model->save($_POST);
            if ( $result ){
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/adminvk/projects/');
        }
    }

    public function adminvk_edit(){

        if ( $_POST ){
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $result = $this->model->save($_POST, $id);
            if ( $result ){
                Session::setFlash('Page was saved.');
            } else {
                Session::setFlash('Error.');
            }
            Router::redirect('/adminvk/projects/');
        }

        if ( isset($this->params[0]) ){
            $this->data['page'] = $this->model->getByVkId($this->params[0]);
        } else {
            Session::setFlash('Wrong page id.');
            Router::redirect('/adminvk/projects/');
        }
    }

    public function adminvk_delete(){
        if ( isset($this->params[0]) ){
            $result = $this->model->delete($this->params[0]);
            if ( $result ){
                Session::setFlash('Page was deleted.');
            } else {
                Session::setFlash('Error.');
            }
        }
        Router::redirect('/adminvk/projects/');
    }


}