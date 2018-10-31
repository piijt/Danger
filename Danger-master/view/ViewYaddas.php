<?php
require_once './view/View.php';

class YaddaView extends View {

    public function __construct($model) {
        parent::__construct($model);
    }
    private function displayManyYaddas() {
        $yaddas = array();
        $yaddas = Yadda::retrievem();
        $s = "<div class='create-yadda'><h1>Create a Yadda</h1>";
        foreach ($yaddas as $yadda) {
            $s .=  sprintf("%s %s: %s<br/>\n"
                , $yadda->getUid(), strftime("%Y-%m-%d %H:%M:%S", $yadda->getTstamp()), $yadda->getContent());
        }
        return $s;
    }

    private function display1c() {
        return sprintf("%s<br/>\n"
            , $this->model->getUid());
    }

    private function yaddaForm() {
        $s = sprintf("<form action='%s?function=Ya' method='post'>\n
                      <input type='hidden' name='uid' value='%s'/>
                      <textarea rows='4' cols='50' name='content'></textarea>
                      <p><input type='submit' value='Go!'/></p>
                      </div>\n"
                      , $_SERVER['PHP_SELF'], Authentication::getLoginId()
                      );
        return $s;
    }

    private function displayYadda() {
        $s = sprintf("<main class='main'>\n%s\n%s</main>\n"
                    , $this->displayManyYaddas()
                    , $this->yaddaForm());
        return $s;
    }

    public function display(){
       $this->output($this->displayYadda());
    }

  }
