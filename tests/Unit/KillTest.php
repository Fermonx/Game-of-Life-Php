<?php

namespace Tests\Unit;

use App\ActionInterface;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\KillAction;
use App\Cell;

class KillTest extends TestCase
{
    /**
     * @var KillAction
     */
    protected $action;

    public function setUp()
    {
        $cell = new Cell();
        $this->action = new KillAction($cell);
    }

    /**
     * @test
     */
    public function it_implemented_actionInterface(){
        $this->assertInstanceOf('App\ActionInterface',$this->action);
    }

    /**
     * @test
     */
    public function it_implemented_abstractActionClass(){

        $this->assertInstanceOf('App\AbstractAction', $this->action);
    }
    /**
     * @test
     */
    public function it_action_kill_cell(){
        $this->action->execute();
        $cell =$this->action->getCell();
        $this->assertFalse($cell->isAlive());

    }
}
