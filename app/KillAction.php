<?php
/**
 * Created by PhpStorm.
 * User: xavi
 * Date: 17/05/18
 * Time: 12:30
 */

namespace App;


class KillAction extends AbstractAction
{
    public function execute()
    {
        $this->getCell()->kill();
    }
}