<?php
namespace app\Models;


class Users
{
    public string $fullname;
    public string $email;
    public int $phone;

    public function setFullname(string $fullname): void
    {
        $this->fullname = $fullname;
    }
    public function getFullname(): string
    {
        return $this->fullname;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getPhone(): int
    {
        return $this->phone;
    }
    public function setPhone(int $phone): void
    {
        $this->phone = $phone;
    }

    public function create():void
    {
        $this->check();
        $_SESSION['users'][] = json_encode($this);
    }

    private function check()
    {
        if (isset($_SESSION['users']))
        {
            $check = array_filter($_SESSION['users'], function($item){
                $item = json_decode($item);
                return $item->email == $this->email;
            });

            if (count($check))
            {
                $errors = [];
                foreach ($check as $item)
                {
                    $item = json_decode($item);
                    $errors['exist'][] = "Daha önce $item->email kulanılmıştır";
                }
                $_SESSION['errors'] = json_encode($errors);
                header("Location: /");
                exit();
            }
        }

        if (isset($_COOKIE['users']))
        {
            $cookieData = unserialize($_COOKIE['users']);

            $check = array_filter($cookieData, function($item){
                $item = json_decode($item);
                return $item->email == $this->email;
            });

            if (count($check))
            {
                $errors = [];
                foreach ($check as $item)
                {
                    $item = json_decode($item);
                    $errors['exist'][] = "Daha önce $item->email kulanılmıştır";
                }
                $_SESSION['errors'] = json_encode($errors);
                header("Location: /");
                exit();
            }

        }

    }

}