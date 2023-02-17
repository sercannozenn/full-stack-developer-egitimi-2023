<?php
declare(strict_types = 1);

namespace Models;
class Employee
{
    /**
     * Properties | Özellikleri
     */

    public string $firstname;
    public string $lastname;

    private int $age;

    private static string $address  = "Trabzon";
    public static string  $address2 = "Trabzon2";

    public function __construct(int $age = 5)
    {
        $this->age = $age;
        //        echo "Employee construct çalıştı <br>";
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        //        echo "Employee destruct çalıştı <br>";

    }

    public static function getAddress(): string
    {
        //        return self::$address;
        return Employee::$address;
    }

    /**
     * Methodlar
     */
    public function getFirstName(): string
    {
        return $this->firstname;
    }

    private function getLastName(): string
    {
        return $this->lastname;
    }

    public function setFirstName(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function setLastName(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getFullName(): string
    {
        return $this->firstname . " " . $this->lastname;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }
}