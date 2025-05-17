<?php

namespace Stillfront\Service;

use Stillfront\Exceptions\GenerateTroopsException;

class TroopsFactory
{
    public static array $hashMap = [];

    /**
     * @param int $input
     * @return array
     * @throws GenerateTroopsException
     */
    public static function generateTroops(int $input) : array
    {
        $tries = 0;
        while(true){
            $rand1 = rand(1, $input - 2);
            $rand2 = rand(1, $input - $rand1 - 1);
            $rand3 = $input - $rand1 - $rand2;
            //preventing repetitive values using hashmap O(1)
            $key = 'rand1:'.$rand1.'rand2:'.$rand2.'rand3:'.$rand3;
            if(!isset(self::$hashMap[$key])){
                self::$hashMap[$key] = 1;
                break;
            }
            $tries++;
            if($tries > 1000){
                throw new GenerateTroopsException('Error generate unique combination of troops');
            }
        }
        return [$rand1, $rand2, $rand3];
    }
}