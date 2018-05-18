<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Cell;

class CellTest extends TestCase
{
    /**
     * @var Cell
     */
    protected $cell;

    public function setUP(){
        $this->cell= new Cell();
    }

    /**
     * @test
     */
    public function it_is_Alive()
    {
        $this->assertTrue($this->cell->isAlive());
    }

    /**
     * @test
     */
    public function it_is_Dead()
    {
        $this->cell->kill();
        $this->assertFalse($this->cell->isAlive());
    }
    /**
     * @test
     */
    public function it_is_initialized_dead()
    {
        $cell =new Cell(false);
        $this->assertFalse($cell->isAlive());
    }

    /**
     * @test
     */
    public function it_can_add_neighbours()
    {
        $cell = new Cell();
        $this->cell->addNeighbours($cell);
        $this->assertEquals(array($cell), $this->cell->getNeighbours());

    }

    /**
     * @test
     */
    public function it_can_set_neighbours()
    {
        $cell = new Cell();
        $this->cell->setNeighbours(array($cell));
        $this->assertEquals(array($cell), $this->cell->getNeighbours());
    }

    /**
     * @test
     */
    public function it_resurrected(){
        $this->cell= new Cell(false);
        $this->cell->resurrect();
        $this->assertTrue($this->cell->isAlive());
    }
}
