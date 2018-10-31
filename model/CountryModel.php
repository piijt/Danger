<?php
/**
 * model/ModelCountry.inc.php
 * @package MVC_NML_Sample
 * @author nml
 * @copyright (c) 2017, nml
 * @license http://www.fsf.org/licensing/ GPLv3
 */
require_once 'model/DbP.php';
require_once 'model/DbH.php';
require_once 'model/ModelIf.php';
require_once 'model/ModelA.php';

class Country extends Model {
    private $code;
    private $name;
    private $continent;
    private $region;
    private $surfacearea;
    private $indepyear;
    private $population;
    private $lifeexpectancy;
    private $gnp;
    private $gnpold;
    private $localname;
    private $governmentform;
    private $headofstate;
    private $capital;
    private $code2;


    public function __construct(  $code
                                , $name
                                , $continent
                                , $region
                                , $surfacearea
                                , $indepyear
                                , $population
                                , $lifeexpectancy
                                , $gnp
                                , $gnpold
                                , $localname
                                , $governmentform
                                , $headofstate
                                , $capital
                                , $code2) {
        $this->code = $code;
        $this->name = $name;
        $this->continent = $continent;
        $this->region = $region;
        $this->surfacearea = $surfacearea;
        $this->indepyear = $indepyear;
        $this->population = $population;
        $this->lifeexpectancy = $lifeexpectancy;
        $this->gnp = $gnp;
        $this->gnpold = $gnpold;
        $this->localname = $localname;
        $this->governmentform = $governmentform;
        $this->headofstate = $headofstate;
        $this->capital = $capital;
        $this->code2 = $code2;
    }

    public function getCode() {
        return $this->code;
    }
    public function getName() {
        return $this->name;
    }
    public function getContinent() {
        return $this->continent;
    }
    public function getRegion() {
        return $this->region;
    }
    public function getSurfaceArea() {
        return $this->surfacearea;
    }
    public function getIndepYear() {
        return $this->indepyear;
    }
    public function getPopulation() {
        return $this->population;
    }
    public function getLifeExpectancy() {
        return $this->lifeexpectancy;
    }
    public function getGnp() {
        return $this->gnp;
    }
    public function getGnpOld() {
        return $this->gnpold;
    }
    public function getLocalName() {
        return $this->localname;
    }
    public function getGovernmentForm() {
        return $this->governmentform;
    }
    public function getHeadOfState() {
        return $this->headofstate;
    }
    public function getCapital() {
        return $this->capital;
    }
    public function getCode2() {
        return $this->code2;
    }

    public function create() {
        $sql = sprintf("insert into country (code, name, continent, region, surfacearea, indepyear, population, lifeexpectancy, gnp, gnpold, localname, governmentform, headofstate, capital, code2)
                        values ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')"
                      , $this->getName()
                      , $this->getCode()
                      , $this->getContinent()
                      , $this->getRegion()
                      , $this->getSurfacearea()
                      , $this->getIndepyear()
                      , $this->getPopulation()
                      , $this->getLifeexpectancy()
                      , $this->getGnp()
                      , $this->getGnpold()
                      , $this->getLocalname()
                      , $this->getGovernmentform()
                      , $this->getHeadofstate()
                      , $this->getCapital()
                      , $this->getCode2());

        $dbh = Model::connect();
        try {
            $q = $dbh->prepare($sql);
            $q->execute();
        } catch(PDOException $e) {
            printf("<p>Insert failed: <br/>%s</p>\n",
                $e->getMessage());
        }
        $dbh->query('commit');
    }
    public function update() {}
    public function delete() {}


    public static function retrieve1($name) {
        $countries = array();
        $dbh = Model::connect();

        $sql = "select *";
        $sql .= " from country";
        $sql .= " where name = :name";
        try {
            $q = $dbh->prepare($sql);
            $q->bindValue(':name', $name);
            $q->execute();
            while ($row = $q->fetch()) {
                $country = self::createObject($row);
                array_push($countries, $country);
            }
        } catch(PDOException $e) {
            printf("<p>Query failed: <br/>%s</p>\n",
                $e->getMessage());
        } finally {
            return $countries;
        }
    }


    public static function retrieveCo() {
    $countries = array();
    $dbh = Model::connect();

    $sql = "select *";
    $sql .= " from country";
    try {
        $q = $dbh->prepare($sql);
        $q->execute();
        while ($row = $q->fetch()) {
            $country = self::createObject($row);
            array_push($countries, $country);
        }
    } catch(PDOException $e) {
        printf("<p>Query failed: <br/>%s</p>\n",
            $e->getMessage());
    } finally {
        return $countries;
    }
}

        public static function retrievem() {
        $countries = array();
        $dbh = Model::connect();

        $sql = "select *";
        $sql .= " from country";
        try {
            $q = $dbh->prepare($sql);
            $q->execute();
            while ($row = $q->fetch()) {
                $country = self::createObject($row);
                array_push($countries, $country);
            }
        } catch(PDOException $e) {
            printf("<p>Query failed: <br/>%s</p>\n",
                $e->getMessage());
        } finally {
            return $countries;
        }
    }

        public static function createObject($a) {
          $code = $a['code'];
          $name = $a['name'];
          $continent = $a['continent'];
          $region = $a['region'];
          $surfacearea = $a['surfacearea'];
          $indepyear = $a['indepyear'];
          $population = $a['population'];
          $lifeexpectancy = $a['lifeexpectancy'];
          $gnp = $a['gnp'];
          $gnpold = $a['gnpold'];
          $localname = $a['localname'];
          $governmentform = $a['governmentform'];
          $headofstate = $a['headofstate'];
          $capital = $a['capital'];
          $code2 = $a['code2'];
          return new Country($code
                           , $name
                           , $continent
                           , $region
                           , $surfacearea
                           , $indepyear
                           , $population
                           , $lifeexpectancy
                           , $gnp
                           , $gnpold
                           , $localname
                           , $governmentform
                           , $headofstate
                           , $capital
                           , $code2);
                           return $country;
  }

}
