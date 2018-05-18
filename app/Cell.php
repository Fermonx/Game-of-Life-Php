<?php
/**
 * Created by PhpStorm.
 * User: xavi
 * Date: 17/05/18
 * Time: 10:49
 */

namespace App;


class Cell
{
    private $alive;

    private $neighbours = array();

    public function __construct($isAlive = true)
    {
        $this->alive = $isAlive;
    }

    public function isAlive()
    {

        return $this->alive;
    }


    public function kill()
    {
        $this->alive = false;
        return $this;
    }

    public function resurrect()
    {
        $this->alive=true;
        return $this;
    }

    public function addNeighbours(Cell $cell)
    {
        $this->neighbours[]=$cell;
        return $this;
    }

    public function getNeighbours()
    {
        return $this->neighbours;
    }

    public function setNeighbours(array $neighbours)
    {
        $this->neighbours=array();
        foreach($neighbours as $neighbour){
            $this->addNeighbours($neighbour);
        }
        return $this;
    }
}