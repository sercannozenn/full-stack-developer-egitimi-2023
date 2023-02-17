<?php

/**
 * Kalıtım Nedir?
 *
 *      Kalıtım Sınıfların birbirlerinden miras alarak
 *      ortak property ve methodları kullanmasını sağlayarak
 *      daha düzenli geliştirme yapmamızı sağlar.
 */
class Teacher
{
    protected string $name = "öğretmen";
    protected string $lastname;
    protected bool $assignmentStatus = false;

//    public float $salary = 9000;
    public const SALARY = 9000;

    public function __construct()
    {
        echo "Teacher construct çalıştı <br>";
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

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

class Matematik extends Teacher
{
    public string $name = '';
    public function __construct()
    {
        parent::__construct();

        echo "Matematik construct çalıştı <br>";
    }
    public function teachMath(): string
    {
        return "Matematik öğretildi";
    }

    public function viewSalary(): string
    {
        return $this->name . " " . $this->lastname . " maaşı: " . $this->calculateSalary();
    }
}

class Ingilizce extends Teacher
{
    public function __construct()
    {
        echo "İngilizce construct çalıştı";
    }
    private int $experience = 0;

    public function setExperience(int $year):void
    {
        $this->experience = $year;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function teachIng(): string
    {
        return "İngilizce Öğretildi";
    }

    public function calculateSalary(): float
    {
        $salary = parent::calculateSalary();

        if ($this->experience > 5)
        {
            $salary += 500;
        }

        return $salary;
    }
}






















$mathTeacher = new Matematik();
$mathTeacher->setName("Uzuk");
$mathTeacher->setLastname("Soyad");

//echo $mathTeacher->calculateSalary();
echo $mathTeacher->viewSalary();
echo $mathTeacher->teachMath();

$ingTeacher = new Ingilizce();
$ingTeacher->setName("Sercan");
$ingTeacher->setLastname("Özen");
$ingTeacher->setExperience(7);
$ingTeacher->setAssignmentStatus(true);
echo "<br>";
echo "<br>";
echo "<br>";
echo $ingTeacher->teachIng();
echo "<br>";
echo $ingTeacher->getName();
echo "<br>";
echo $ingTeacher->calculateSalary();