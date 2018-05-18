<?php
/**
 * Created by PhpStorm.
 * User: xavi
 * Date: 17/05/18
 * Time: 12:23
 */

namespace App;


interface ActionInterface
{

    public function execute();

    public function getCell();
}