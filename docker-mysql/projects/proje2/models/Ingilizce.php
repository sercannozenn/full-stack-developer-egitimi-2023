<?php
namespace models;

include_once "../traits/Message.php";
include_once "../contracts/ITest.php";

use contracts\ITest;
use traits\Message;

class Ingilizce extends Teacher implements ITest
{
    use Message;
    private int $experience = 0;
    public function __construct()
    {
        echo "İngilizce çağrıldı <hr>";
    }

    public function calculateSalary(): float
    {
        $salary = parent::SALARY;

        if ($this->experience > 5)
        {
            $salary += 500;
        }

        return $salary;
    }

    /**
     * @return int
     */
    public function getExperience(): int
    {
        return $this->experience;
    }

    /**
     * @param int $experience
     */
    public function setExperience(int $experience): void
    {
        $this->experience = $experience;
    }

    public function goster(): string
    {
        return $this->gonder("Mesajı Göster");
    }
}