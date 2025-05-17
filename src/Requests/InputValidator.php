<?php

namespace Stillfront\Requests;

use Stillfront\Exceptions\ValidationException;

class InputValidator
{

    /**
     * @param $input
     * @return bool
     * @throws ValidationException
     */
    public function validate($input) : bool
    {
        if(!is_numeric($input)){
            throw new ValidationException("The input must be numeric");
        }
        if($input < 3){
            throw new ValidationException("We need at least 3 soldiers so that none of the troop counts are zero");
        }
        return true;
    }
}