<?php

namespace app\Controllers;

use app\Models\Users;

class KayitController
{
    private Users $users;

    public function __construct()
    {
        $this->users = new Users();
    }

    public function kayitFormGoster()
    {
        view("form");
    }
    public function kayit()
    {
//        $users = new Users();
//        $users->setName($_REQUEST['ad']);
//        $users->setLastname($_REQUEST['soyad']);

        $this->users->setName($_REQUEST['ad']);
        $this->users->setLastname($_REQUEST['soyad']);

//        $_SESSION['users'] = json_encode($users);
        $_SESSION['users'] = json_encode($this->users);
    }
}