<?php
    require_once './includes/DbP.inc.php';
    require_once './includes/DbH.inc.php';
    $dbh = DbH::getDbH();

    foreach($_GET as $key => $value) {
        $$key = trim($value);  // vars with names as in form - keeyboard safer #ack
    }
    if(isset($color) && isset($dimples)) {
            $sql  = "select color, dimples, mimetype, imageitself";
            $sql .= " from image";
            $sql .= " where color = :color";
            $sql .= " and dimples = :dimples";
        try {
            $q = $dbh->prepare($sql);
            $q->bindValue(':color', $color);
            $q->bindValue(':dimples', $dimples);
            $q->execute();
            $out = $q->fetch();
        } catch(PDOException $e)  {
            printf("Error getting image.<br/>". $e->getMessage(). '<br/>' . $sql);
            die('');
        }

        $out['imageitself'] = stripslashes($out['imageitself']); // strip slashes that was added when inserting to the database
        header("Content-type: " . $out['mimetype']);
        echo $out['imageitself'];
    } else {
        echo 'Fail to output image in getImage.php';
    }
