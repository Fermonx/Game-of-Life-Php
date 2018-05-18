<?php
/**
 * Created by PhpStorm.
 * User: xavi
 * Date: 17/05/18
 * Time: 12:25
 */

namespace App;


class AbstractAction implements ActionInterface
{
    private $cell;

    public function __construct(Cell $cell)
    {
        $this->cell = $cell;
    }

    public function execute()
    {

    }

    public function getCell()
    {
        return $this->cell;
    }
}