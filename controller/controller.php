<?php

require_once 'model/ModelA.php';

class Controller {
    private $model;
    private $qs;
    private $function;

    public function __construct($qs) {
        $this->qs = $qs;
        foreach ($qs as $key => $value) {
            $$key = $value;
        }
        $this->function = isset($function) ? $function : 'A';
    }
    public function doSomething() {
        switch ($this->function) {
            case 'A':   //auth
                $this->model = new User(null, null, null, null, null);
                $view1 = new LoginView($this->model);
                if (isset($_POST)) {
                    $this->auth($_POST);
                }
                $view1->display();
                break;
            case 'Z':   //logout
                $this->model = new User(null, null, null, null, null);
                $view1 = new LoginView($this->model);
                $this->logout();
                $view1->display();
                break;
            case 'U':   //user create
                $this->model = new User(null, null, null, null, null, null); // init a model
                $view1 = new UserView($this->model);                  // init a view
                if (isset($_POST)) {
                    $this->createUser($_POST);               // activate controller
                }
                $view1->display();
                break;
            case 'Ua':   //user activation create
                $this->model = new User(null, null);                    // init a model
                $view1 = new UserViewA($this->model);                  // init a view
                if (isset($_POST)) {
                    $this->createUser($_POST);                      // activate controller
                }
                $view1->display();
                break;
                $view1->display();
                break;
            case 'Ya':  //yadda create
                $this->model = new Yadda(Authentication::getLoginId(), null, null);   // init a model
                $view1 = new YaddaView($this->model);                 // init view
                if (isset($_POST)) {
                  $this->createYadda($_POST);                  // activate controller
                }
                $view1->display();
                break;
        }
    }

    public function auth($p) {
        if (isset($p) && count($p) > 0) {
            if (!Authentication::isAuthenticated()
                    && Model::areCookiesEnabled()
                    && isset($p['uid'])
                    && isset($p['pwd'])) {
                        Authentication::authenticate($p['uid'], $p['pwd']);
            }
            $p = array();
        }
    }


    public function createUser($p) {
        if (isset($p) && count($p) > 0) {
            $user = User::createObject($p);  // object from array
            $user->create();         // model method to insert into db
            $p = array();
        }
    }

    public function activateUser($p) {
        if (isset($p) && count($p) > 0) {
            $user = User::createObject($p);  // object from array
            $user->activate();         // model method to update in db
            $p = array();
        }
    }


    public function createYadda($p) {
        if (isset($p) && count($p) > 0) {
            $p['id'] = null;
            $yadda = Yadda::createObject($p);  // object from array
            $yadda->create();         // model method to insert into db
            $p = array();
        }
    }


    public function logout() {
        Authentication::Logout();
    }
}
