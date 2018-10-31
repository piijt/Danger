<?php
/**
 * Description of GolfBall
 * @author nml
 * example from textbook, Doyle, 2010
 */
class GolfBall implements Sellable {
    private $color;
    private $noinstock;
    private $dimples;

    public function getColor() {
        return $this->color;
    }

    public function setColor( $color ) {
        $this->color = $color;
    }

    public function getDimples() {
        return $this->dimples;
    }

    public function setDimples( $no ) {
        $this->dimples = $no;
    }

    public function addStock( $numItems ) {
        $this->noinstock += $numItems;
    }

    public function sellItems($n) {
        $returnVal = false;
        if ( $this->noinstock >= $n ) {
            $this->noinstock -= $n;
            $returnVal = true;
        }
        return $returnVal;
    }

    public function getStockLevel() {
        return $this->noinstock;
    }

    public function __toString() {
        $s = '';
        $s .= sprintf("        <tr><td>%s</td>"
                . "<td>%s</td>"
                . "<td><img src='getImage.php?color=%s&amp;dimples=%s' width='320' height='240'/></td>" // getImage function via GET (URL) in src.
                . "<td>%s</td></tr>\n"
                , $this->getColor()
                , $this->getDimples()
                , $this->getColor()
                , $this->getDimples()
                , $this->getStockLevel());
        return $s;
    }
}
