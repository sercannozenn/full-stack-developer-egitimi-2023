<?php
namespace models;
include_once "../contracts/ITeacher.php";

use contracts\ITeacher;

abstract class Teacher implements ITeacher
{
    public string $name;
    public string $lastname;

    public bool $assignmentStatus = false;

    /**
     * @return bool
     */
    public function isAssignmentStatus(): bool
    {
        return $this->assignmentStatus;
    }

    /**
     * @param bool $assignmentStatus
     */
    public function setAssignmentStatus(bool $assignmentStatus): void
    {
        $this->assignmentStatus = $assignmentStatus;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function teach(string $lessonName): string
    {
        return $lessonName . " öğretildi";
    }

    abstract function calculateSalary(): float;


}