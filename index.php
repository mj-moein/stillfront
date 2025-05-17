<?php

use Stillfront\Exceptions\BaseException;
use Stillfront\Requests\InputValidator;
use Stillfront\Service\TroopsFactory;
require_once 'vendor/autoload.php';

while(true){
    echo "Enter total number of soldiers: ";
    $input = trim(fgets(STDIN));
    $validator = new InputValidator();
    try {
        $validator->validate($input);
        list($spearmen, $swordsmen, $archers) = TroopsFactory::generateTroops($input);
        echo "$spearmen Spearmen" . PHP_EOL;
        echo "$swordsmen Swordsmen" . PHP_EOL;
        echo "$archers Archers" . PHP_EOL;
    }
    catch (BaseException $exception){
        fwrite(STDERR, $exception->getMessage().PHP_EOL);
    }
    catch (Exception $exception){
        echo "error occurred!".PHP_EOL;
    }
}
