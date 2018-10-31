<?php
    if (!(
          (isset($_POST['color']) && $_POST['color'] != '')
            && (isset($_POST['dimples']) && $_POST['dimples'] != '')
            && (isset($_FILES['img']) && $_FILES['img']['size'] > 0)
        )) {
        header("Location: ./myformim.php?x=1");
    }

    require_once './inc/DbP.inc.php';
    require_once './inc/DbH.inc.php';
    require_once './inc/Sellable.inc.php';
    require_once './inc/Golfball.inc.php';
    $dbh = DbH::getDbH();


    // Keyboard Saver #ack - generer variabler baseret på farven for goldbolden
    foreach($_POST as $key => $value) {
        $$key = trim($value);  // vars with names as in form
    }

    $gb = new GolfBall();
    $gb->setColor($color);
    $gb->setDimples($dimples);
    $gb->addStock(100);

    // Temporary file name stored on the server
    // Read in one gulp and addslashes
    $image = addslashes(file_get_contents($_FILES['img']['tmp_name'])); // Hiver hele temp billedet ud i en variabel.
    $imagetype = $_FILES['img']['type'];

    $sql = 'start transaction;';
    $dbh->query($sql);

    $sql = 'insert into golfballs values(:color, :number, :dimples);'; // indsætter pladsholder pga. sikkerhed.
    try {
      $q = $dbh->prepare($sql);
      $q->bindValue(':number', $gb->getStockLevel()); //bindValue tjekker om der er apostroffer og sletter dem (beskyttelse mod SQL injection)
      $q->bindValue(':color', $gb->getColor());
      $q->bindValue(':dimples', $gb->getDimples());
      $q->execute();
    } catch(PDOException $e) {
      die("Posting failed. Call a friend GB.<br/>".$e->getMessage());
    }

    $sql = 'insert into image values(:color, :dimples, :mimetype, :imageitself);'; // indsætter pladsholder pga. sikkerhed.
    try {
      $q = $dbh->prepare($sql);
      $q->bindValue(':color', $gb->getColor()); // bindValue tjekker om der er apostroffer og sletter dem (beskyttelse mod SQL injection)
      $q->bindValue(':dimples', $gb->getDimples());
      $q->bindValue(':mimetype', $imagetype); // image/jpg or image/png skal html bruge for at vise billedet korrekt.
      $q->bindValue(':imageitself', $image);
      $q->execute();
    } catch (Exception $e) {
      die("Posting failed. Call a friend IMG.<br/>".$e->getMessage());
    }
    $sql = 'commit;';
    $dbh->query($sql);
    header('Location: ./myformim.php?inserted');
