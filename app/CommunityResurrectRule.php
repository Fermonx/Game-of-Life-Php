<?php
/**
 * Created by PhpStorm.
 * User: Fernando
 * Date: 18-05-2018
 * Time: 09:58 AM
 */

namespace App;


class CommunityResurrectRule extends AbstractRule
{
    public function apply(Cell $cell)
    {
        $liveNeighbours = $this->getNumberAliveNeighbours($cell);
        if(in_array($liveNeighbours,array(2,3)))
        {
            $resurrectAction = new ResurrectAction($cell);
            $resurrectAction->execute($cell);
            return $resurrectAction;
        }
        $NullAction = new NullAction($cell);
        $NullAction->execute($cell);
        return $NullAction;
    }
}