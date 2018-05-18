<?php
/**
 * Created by PhpStorm.
 * User: xavi
 * Date: 17/05/18
 * Time: 12:51
 */
namespace  App;

class ResurrectAction extends AbstractAction
{
    public function execute()
    {
      $this->getCell()->resurrect();
    }

}