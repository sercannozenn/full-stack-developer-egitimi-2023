<?php
namespace contracts;
interface ITeacher
{
    public const SALARY = 9000;
    public function getName(): string;
    public function getLastname(): string;
    public function isAssignmentStatus(): bool;
    public function setAssignmentStatus(bool $assignmentStatus): void;
    public function setName(string $name): void;
    public function setLastname(string $lastname): void;
}