<?php

namespace Tests\Unit;

use App\Cell;
use App\CommunityResurrectRule;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommunityResurrectTest extends TestCase
{
    /**
     * @var CommunityResurrectRule
     */
    protected $rule;

    public function setUp()
    {
        $this->rule = new CommunityResurrectRule();
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
    public function itResurrectsWhenNumberNeighboursIs2or3()
    {
        $cell = $this->createCell(2);
        $action = $this->rule->apply($cell);
        $this->assertSame($cell, $action->getCell());
        $cell = $this->createCell(3);
        $action = $this->rule->apply($cell);
        $this->assertSame($cell, $action->getCell());
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

    public function itReturnsNullActionWhenNumberNeighboursIsLessThan2()
    {
        $cell = $this->createCell(1);
        $action = $this->rule->apply($cell);
        $this->assertInstanceOf('App\NullAtion',$action);
        $this->assertSame($cell, $action->getCell());
        $cell = $this->createCell(4);
        $action = $this->rule->apply($cell);
        $this->assertInstanceOf('App\NullAtion',$action);
        $this->assertSame($cell, $action->getCell());
    }


}
