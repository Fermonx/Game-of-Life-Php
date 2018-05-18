<?php

namespace Tests\Unit;

use App\NullAction;
use App\Cell;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NullActionTest extends TestCase
{
    /**
     * @var KillAction
     */
    protected $action;

    public function setUp()
    {
        $cell = new Cell();
        $this->action = new NullAction($cell);
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
    public function it_not_change_state(){
        $this->action = new NullAction(new Cell(true));
        $this->action->execute();
        $this->assertTrue($this->action->getCell()->isAlive());

        $this->action= new NullAction(new Cell(false));
        $this->action->execute();
        $this->assertFalse($this->action->getCell()->isAlive());

    }
}
