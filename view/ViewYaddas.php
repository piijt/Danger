<?php
require_once './view/View.php';

class YaddaView extends View {

    public function __construct($model) {
        parent::__construct($model);
    }
    private function displayManyYaddas() {
        $yaddas = array();
        $yaddas = Yadda::retrievem();
        $s = "<div id='yadda-output'>";
        foreach ($yaddas as $yadda) {
            $s .=  sprintf("%s %s: %s<br/>\n"
                , $yadda->getUid(), $yadda->getTstamp(), $yadda->getContent());
        }
        return $s;
    }
    private function display1c() {
        return sprintf("%s<br/>\n"
            , $this->model->getUid());
    }
    private function yaddaForm() {
        $s = sprintf("</div><div id='yadda-input'><h1>Create a Yadda</h1>\n
                      <form action='%s?function=Ya' method='post' id='yadda-form'>\n
                      <input type='hidden' id='output' name='uid' value='%s'/>
                      <textarea rows='4' cols='50' name='content'></textarea>
                      <input type='submit' value='Go!'/>\n
                      </form></div>"
                      , $_SERVER['PHP_SELF'], Authentication::getLoginId()
                      );
        return $s;
    }

    private function displayYadda() {
        $s = sprintf("<main class='main'>\n%s\n%s</main>\n"
                    , $this->yaddaForm()
                    , $this->displayManyYaddas());
        return $s;
    }

    public function display(){
       $this->output($this->displayYadda());
    }

  }
