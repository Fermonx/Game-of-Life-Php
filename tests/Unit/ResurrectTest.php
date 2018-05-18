<?php

namespace Tests\Unit;

use App\ResurrectAction;
use App\Cell;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResurrectTest extends TestCase
{
    /**
     * @var ResurrectAction
     */
    protected $action;

    public function setUp(){
        $cell = new Cell(false);
        $this->action= new ResurrectAction($cell);
    }

    /**
     * @test
     */
    public function it_implemented_actionInterface(){
        $this->assertInstanceOf('App\ActionInterface',
            $this->action);
    }

    /**
     * @test
     */
    public function it_implemented_abstractActionClass(){

        $this->assertInstanceOf('App\AbstractAction',
            $this->action);
    }

    /**
     * @test
     */
    public function it_resurrect_cell(){
        $this->action->execute();
        $cell= $this->action->getCell();
        $this->assertTrue($cell->isAlive());
    }



}
