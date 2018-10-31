<?php
/**
 * model/ModelYadda.inc.php
 * @package MVC_NML_Sample
 * @author nml
 * @copyright (c) 2017, nml
 * @license http://www.fsf.org/licensing/ GPLv3
 */
require_once './model/DbP.php';
require_once './model/DbH.php';
require_once './model/ModelIf.php';
require_once './model/ModelA.php';

class Profile extends Model {
    private $uid;
    private $tstamp;
    private $content;


    public function __construct(  $uid
                                , $tstamp
                                , $content) {
        $this->uid = $uid;
        $this->tstamp = $tstamp;
        $this->content = $content;
    }

    public function getUid() {
        return $this->uid;
    }
    public function getContent() {
        return $this->content;
    }
    public function getTstamp() {
        return $this->tstamp;
    }

    public function create() {
        $sql = "insert into yadda (uid, tstamp, content)
                        values (:uid, current_timestamp, :content)";

        $dbh = Model::connect();
        try {
            $q = $dbh->prepare($sql);
            $q->bindValue(':uid', $this->getUid());
            $q->bindValue(':content', $this->getContent());
            $q->execute();
        } catch(PDOException $e) {
            printf("<p>Insert failed: <br/>%s</p>\n",
                $e->getMessage());
        }
        $dbh->query('commit');
    }
    public function update() {}
    public function delete() {}



    public static function retrieveP() {
    $yaddas = array();
    $dbh = Model::connect();

    $sql = "select *";
    $sql .= " from user";
    try {
        $q = $dbh->prepare($sql);
        $q->execute();
        while ($row = $q->fetch()) {
            $profile = self::createObject($row);
            array_push($profiles, $profile);
        }
    } catch(PDOException $e) {
        printf("<p>Query failed: <br/>%s</p>\n",
            $e->getMessage());
    } finally {
        return $profiles;
    }
}


}
