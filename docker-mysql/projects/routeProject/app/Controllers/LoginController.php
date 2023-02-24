<?php

namespace app\Controllers;

use app\Core\Controllers;

class LoginController extends Controllers
{
    public function showForm()
    {
        if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'])
        {
            route("admin.index");
            exit();
        }
        view("auth/login");
    }

    public function login()
    {
        $request = (object)$_REQUEST;

        $email = $request->email;
        $phone = $request->phone;

        $cookie = $_COOKIE;
        if (isset($cookie['users']))
        {
            $users = unserialize($cookie['users']);
            $check = array_filter($users, function($item) use ($email){
                $item = json_decode($item);
                return $item->email == $email;
            });

            if (count($check))
            {
                $user = json_decode($check[0]);

                if ($user->phone == $phone)
                {
                    unset($_SESSION['errors']);
                    $_SESSION['isLogin'] = true;
                    $_SESSION['loginUser'] = json_encode($user);
                    route("admin.index");
                    exit();
                }
            }

//            else
//            {
//                $errors["missing_user"][] = "Kullanıcı bulunamadı";
////                $errors["missing_user"] = ["Kullanıcı bulunamadı"];
//                $_SESSION['errors'] = json_encode($errors);
//                route("login.showForm");
//                exit();
//            }
        }
        $errors["missing_user"][] = "Kullanıcı bulunamadı";
        //                $errors["missing_user"] = ["Kullanıcı bulunamadı"];
        $_SESSION['errors'] = json_encode($errors);
        route("login.showForm");
        exit();
    }
}