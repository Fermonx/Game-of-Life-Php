<?php

namespace Tests\Unit;

use App\LessThanTwoDeadRule;
use Tests\TestCase;
use App\Cell;
use App\KillAction;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LessThanTwoDeadRuleTest extends TestCase
{
    /**
     * @var LessThanTwoDeadRule
     */
    protected $rule;

    public function setUp()
    {
        $this->rule = new LessThanTwoDeadRule();
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
    public function it_apply_rule_less_than_2_return_dead(){
        $cell = new Cell();
        $cell->addNeighbours(new Cell(true));
        $cell->addNeighbours(new Cell(true));
        $action = $this->rule->apply($cell);
        $this->assertSame($cell,$action->getCell());
    }
}
