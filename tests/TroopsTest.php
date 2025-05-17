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

    public function test_troops_uniqueness()
    {
        $input = rand(3, 1000);
        list($spearmen1, $swordsmen1, $archers1) = \Stillfront\Service\TroopsFactory::generateTroops($input);
        list($spearmen2, $swordsmen2, $archers2) = \Stillfront\Service\TroopsFactory::generateTroops($input);
        $allEqual = (
            $spearmen1 === $spearmen2 &&
            $swordsmen1 === $swordsmen2 &&
            $archers1 === $archers2
        );
        $this->assertFalse($allEqual);

    }
}