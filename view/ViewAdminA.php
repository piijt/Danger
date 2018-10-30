<?php

require_once 'view/View.php';

  class UserViewA extends View {
    public function __construct($model) {
        parent::__construct($model);
    }
    public function displayul() {
      $users = User::retrievem();
      $s = "<h1>Users</h1>\n";
      $s .= "<form action='index.php?function=Ub' method='post'>\n";
      $s .= "<select name='uid' class='haves1'>\n";
      foreach ($users as $user) {
          $s .=  sprintf("<option value='%s'>%s</option>\n"
              , $user->getUid(), $user);
      }
      $s .= "</select>\n <input type='submit' value='Activate user'/></form>\n";
      return $s;
    }
    public function display(){
       $this->output($this->displayul());
    }
}
