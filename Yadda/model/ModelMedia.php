<?php
if (!(
          (isset($_POST['color']) && $_POST['color'] != '')
            && (isset($_POST['dimples']) && $_POST['dimples'] != '')
            && (isset($_FILES['img']) && $_FILES['img']['size'] > 0)
        )) {
        header("Location: ./index.php?function=-'U'");
    }

require_once './model/DbP.php';
require_once './model/DbH.php';

class Media {
  private $imageitself;
  private $mimetype;

public function __construct($imageitself, $mimetype)
    $this->imageitself = $imageitself;
    $this->mimetype = $mimetype;


public function getImageitself() {
  return $this->getImageitself;
}

public function getMimetype() {
  return $this->getMimetype;
}

public function create() $sql ="insert into image (uid, imageitself, mimetype)
                                values (:uid, :imageitself, :mimetype)";

$imageitself = addslashes(file_get_contents($_FILES['img']['tmp_name']));
$mimetype = $_FILES['imageitself']['mimetype'];

}
