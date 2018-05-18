<?php
/**
 * Created by PhpStorm.
 * User: xavi
 * Date: 17/05/18
 * Time: 13:16
 */

namespace App;


class AbstractRule implements RuleInterface
{

    public function apply(Cell $cell)
    {
        // TODO: Implement apply() method.
    }
    public function getNumberAliveNeighbours(Cell $cell)
    {
        $total= 0;
        foreach ($cell->getNeighbours() as $neighbour){
            if($neighbour->isAlive()){
                $total ++;
            }
        }
        return $total;
    }
}