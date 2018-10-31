<?php
/**
 * view/ViewCity.inc.php
 * @package MVC_NML_Sample
 * @author nml
 * @copyright (c) 2017, nml
 * @license http://www.fsf.org/licensing/ GPLv3
 */

require_once './view/View.php';

class CountryView extends View {

    public function __construct($model) {
        parent::__construct($model);
    }
    private function displayManyCountries() {
        $countries = Country::retrieveCo();
        $s = "<h1>Countries</h1><div class='haves'>";
        foreach ($countries as $country) {
            $s .=  sprintf("%s: %s<br/>\n"
                , $country->getCode(), $country->getName());
        }
        $s .= "</div>";
        return $s;
    }

    private function display1c() {
        return sprintf("%s<br/>\n"
            , $this->model->getId());
    }

    private function countryForm() {
        $s = sprintf("<form action='%s?function=Co' method='post'>\n
                      <div class='gets'>\n
                      <p>
                        Code<br/>
                        <input type='text' name='code' required/>
                      </p>\n
                      <p>
                        Name<br/>
                        <input type='text' name='name' required/>
                      </p>\n
                      <p>
                        Continent<br/>
                        <input type='text' name='continent' required/>
                      </p>\n
                      <p>
                        Region<br/>
                        <input type='text' name='region'
                      </p>\n
                      <p>
                        Surface Area<br/>
                        <input type='text' name='surfacearea' required/>
                      </p>\n
                      <p>
                        Independence Year<br/>
                        <input type='text' name='indepyear' required/>
                      </p>\n
                      <p>
                        Population<br/>
                        <input type='text' name='population' required/>
                      </p>\n
                      <p>
                        Life Expectancy<br/>
                        <input type='text' name='lifeexpectancy'
                      </p>\n
                      <p>
                        GNP<br/>
                        <input type='text' name='gnp' required/>
                      </p>\n
                      <p>
                        Old GNP<br/>
                        <input type='text' name='gnpold' required/>
                      </p>\n
                      <p>
                        Local Name<br/>
                        <input type='text' name='localname' required/>
                      </p>\n
                      <p>
                        Governmentform<br/>
                        <input type='text' name='governmentform'
                      </p>\n
                      <p>
                        Head of State<br/>
                        <input type='text' name='headofstate' required/>
                      </p>\n
                      <p>
                        Capital<br/>
                        <input type='text' name='capital' required/>
                      </p>\n
                      <p>
                        Code2<br/>
                        <input type='text' name='code2'
                        />
                      </p>\n
                      <p><input type='submit' value='Go!'/></p>
                      </div>\n"
                      , $_SERVER['PHP_SELF']
                      );
        return $s;
    }

    private function displayCountry() {
        $s = sprintf("<main class='main'>\n%s\n%s</main>\n"
                    , $this->displayManyCountries()
                    , $this->countryForm());
        return $s;
    }

    public function display(){
       $this->output($this->displayCountry());
    }
}
