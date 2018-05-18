<?php

namespace Tests\Unit;

use App\Cell;
use App\MoreThanThreeDeadRule;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MoreThanThreeDeadTest extends TestCase
{
    /**
     * @var MoreThanThreeDeadRule
     */
    protected $rule;

    public function setUp()
    {
        $this->rule = new MoreThanThreeDeadRule();
    }
    /**
     * @test
     */
    public function it_implemented_ruleInterface(){
        $this->assertInstanceOf('App\RuleInterface',$this->rule);
    }

    /**
     * @test
     */
    public function it_implemented_abstractRuleClass(){

        $this->assertInstanceOf('App\AbstractRule', $this->rule);
    }

    /**
     * @test
     */
    public function itNeighboursOverpopulationCellDies()
    {
        $cell = $this->createCell(4);
        $action = $this->rule->apply($cell);
        $this->assertInstanceOf('App\KillAction', $action);
        $this->assertSame($cell, $action->getCell());
    }

    /**
     * @test
     */
    public function itNeighboursTwoOrThreeLiveNullAction()
    {
        $cell = $this->createCell(2);
        $action = $this->rule->apply($cell);
        $this->assertInstanceOf('App\NullAction', $action);
        $cell = $this->createCell(3);
        $action = $this->rule->apply($cell);
        $this->assertInstanceOf('App\NullAction', $action);
    }

    public function createCell($numberofAliveNeighbours)
    {
        $cell = new Cell();
        for($i = 1; $i <= $numberofAliveNeighbours; $i++)
        {
            $cell->addNeighbours(new Cell(true));
        }
        return $cell;
    }
}
