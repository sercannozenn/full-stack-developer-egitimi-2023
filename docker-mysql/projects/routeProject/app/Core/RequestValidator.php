<?php

namespace app\Core;

trait RequestValidator
{
    private $item;
    public function itemValidate(mixed $item, string $conditions): array
    {
        $this->item = $item;

        $explodeConditions = explode("|", $conditions);
        $result = [];

        foreach ($explodeConditions as $condition)
        {
            $explodeCondition = explode(":", $condition);

            if (count($explodeCondition) == 1)
            {
                $processCheck = $this->process($explodeCondition[0]);
                if (!is_bool($processCheck))
                {
                    $result[] = $processCheck;
                }
            }
            else if (count($explodeCondition) < 3)
            {
                $processCheck = $this->process($explodeCondition[0], $explodeCondition[1]);
                if (!is_bool($processCheck))
                {
                    $result[] = $processCheck;
                }
            }
        }
        return $result;
    }


    public function process(string $process, $processValue = null)
    {
        $item = trim($this->item);
        switch ($process)
        {
            case "required":
                if (empty($item))
                {
                    return "required";
                }
                return false;
            case "min":
                if (strlen($item) < $processValue)
                {
                    return "min";
                }
                return false;
            case "max":
                if (strlen($item) > $processValue)
                {
                    return "max";
                }
                return false;
            case "type":
                if ($processValue == "email")
                {
                    if (!filter_var($item, FILTER_VALIDATE_EMAIL))
                    {
                        return "email";
                    }
                }
                else if ($processValue == "phone")
                {
                    $regex = "#05[0-9]{9}#";
                    if (!preg_match($regex, $item))
                    {
                        return "phone";
                    }
                }
                else
                {
                    return "default";
                }
            return false;
        }
    }
}
















