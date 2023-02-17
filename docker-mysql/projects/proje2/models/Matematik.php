<?php
namespace models;
class Matematik extends Teacher
{
    public function calculateSalary(): float
    {
        $salary = self::SALARY;
        if ($this->assignmentStatus)
        {
            $salary += 1000;
        }
        return $salary;
    }
}
