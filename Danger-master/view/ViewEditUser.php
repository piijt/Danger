<?php

require_once 'view/View.php';

class UserViewA extends View {
    public function __construct($model) {
        parent::__construct($model);
    }
    public function displayul() {
      $users = User::retrievem();
      $s = "<h1>Users Activate & Deactivate</h1>\n";		
      $s .= "<form action='index.php?function=Ub' method='post'>\n";  
        $s .= "<select name='uid' class='haves1'>\n";
      foreach ($users as $user) {
		 
          $s .=  sprintf("<option value='%s'>%s</option>\n"
              , $user->getUid(), $user);
		
      }
      $s .= "</select>\n <input type='submit' value='Activate user'/></form>\n";
	
      
      return $s;
    }    

public function displayuc() {
   $users = User::retrievem();
     $s = "<form action='index.php?function=Uc' method='post'>\n";
    $s .= "<select name='uid' class='haves1'>\n";
     foreach ($users as $user) {		 
         $s .=  sprintf("<option value='%s'>%s</option>\n"
             , $user->getUid(), $user);
     }
	$s .= "</select>\n <input type='submit' value='Deactivate user'/></form>\n";
     return $s;
	
}

	
	public function displayud() {
   $users = User::retrievem();
     $s = "<form action='index.php?function=Ud' method='post'>\n";
    $s .= "<select name='uid' class='haves1'>\n";
     foreach ($users as $user) {		 
         $s .=  sprintf("<option value='%s'>%s</option>\n"
             , $user->getUid(), $user);
     }
	$s .= "</select>\n <input type='submit' value='Delete user'/></form>\n";
     return $s;
	
}
		public function display(){
       $this->output($this->displayul());
       $this->output1($this->displayuc());
		$this->output1($this->displayud());
      
      
	 }

	
 
    }
