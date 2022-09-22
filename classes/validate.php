<?php

class validate 
{

private $error = [];

    private function checkString($input)
    {
        $input = is_string($input) ? NULL : "Input is not String";
        return $input;
    }

    private function checkInt($input)
    {
        $input = is_int($input) ? NULL : "Input is not Int";
        return $input;
    }

    private function checkFloat($input)
    {
        $input = is_float($input) ? NULL : "Input is not Float";
        return $input;
    }

    private function checkNumeric($input)
    {
        $input = is_numeric($input) ? NULL : "Input is not Numeric";
        return $input;
    }

    private function checkArray($input)
    {
        $input = is_array($input) ? NULL : "Input is not Array";
        return $input;
    }

    private function checkEmpty($input)
    {
        $input = $input == "" ? "Input is Empty" : NULL;
        return $input;
    }

    private function checkZero($input)
    {
        $input = $input === 0 ? "Input is 0" : NULL;
        return $input;
    }
    
    public function validateInput($validationType, $input)
    {
        if ($validationType == "string") { $this->error[] = $this->checkString($input); }
        if ($validationType == "int") { $this->error[] = $this->checkInt($input); }
        if ($validationType == "float") { $this->error[] = $this->checkFloat($input); }
        if ($validationType == "numeric") { $this->error[] = $this->checkNumeric($input); }
        if ($validationType == "array") { $this->error[] = $this->checkArray($input); }
        if ($validationType == "empty") { $this->error[] = $this->checkEmpty($input); }
        if ($validationType == "zero") { $this->error[] = $this->checkZero($input); }
        if ($validationType == "id") 
        { 
            $this->error[] = $this->checkInt($input);
            $this->error[] = $this->checkZero($input); 
        }
    return $this->error;
    }

public function validateError() 
{

}
}

?>