<?php
namespace app\Models;
class Users
{
    public string $name;
    public string $lastname;


    public function setName(string $name): Users
    {
        $this->name = $name;

        return $this;
    }
    public function setLastname(string $lastname): Users
    {
        $this->lastname = $lastname;

        return $this;
    }


}