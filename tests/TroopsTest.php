<?php

class TroopsTest extends \PHPUnit\Framework\TestCase
{
    public function test_troops_generation()
    {
        $input = rand(3, 1000);
        list($spearmen, $swordsmen, $archers) = \Stillfront\Service\TroopsFactory::generateTroops($input);
        $this->assertGreaterThan(0, $spearmen);
        $this->assertGreaterThan(0, $swordsmen);
        $this->assertGreaterThan(0, $archers);
        $this->assertEquals($input, ($spearmen+$swordsmen+$archers));
    }
}