<?php
/**
 * Created by PhpStorm.
 * User: xavi
 * Date: 17/05/18
 * Time: 13:13
 */

namespace App;

use App\Cell;


interface RuleInterface
{
    public function apply(Cell $cell);
}