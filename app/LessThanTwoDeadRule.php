<?php

namespace  App;
use App\KillAction;

class LessThanTwoDeadRule extends AbstractRule
{
    public function apply(Cell $cell)
    {
     if($this->getNumberAliveNeighbours($cell)<2){
         $killAction = new KillAction($cell);
         $killAction->execute($cell);
         return $killAction;
     }
     $NullAction = new NullAction($cell);
     $NullAction->execute($cell);
     return $NullAction;
    }
}
