<?php

namespace app\Controllers;

use app\Core\Controllers;
use app\Models\Users;

class RegisterController extends Controllers
{
    public function register()
    {
        $this->validate([
            'fullname' => "required|min:1",
            "email" => "required|min:3|max:30|type:email",
            "phone"=> "required|min:11|max:11|type:phone",
        ],
        [
            "fullname.required" => "Ad soyad alanı zorunludur",
            "fullname.min" => "Ad soyad alanı minimum 1 karakterden oluşturmalıdır",
            "email.required" => "Email alanı minimum 3 karakterden oluşturmalıdır",
            "email.min" => "Email alanı minimum 3 karakterden oluşturmalıdır",
            "email.max" => "Email alanı maksimum 30 karakterden oluşturmalıdır",
            "email.email" => "Lütfen geçerli bir email girin.",
            "phone.required" => "Telefon numarası alanı minimum 3 karakterden oluşturmalıdır",
            "phone.min" => "Telefon numarası alanı minimum 3 karakterden oluşturmalıdır",
            "phone.max" => "Telefon numarası alanı maksimum 30 karakterden oluşturmalıdır",
            "phone.phone" => "Lütfen geçerli bir telefon numarası girin.",
        ]);
        $_SESSION['errors'] = [];
        $request = $this->request;

        $users = new Users();
        $users->setFullname($request->fullname);
        $users->setEmail($request->email);
        $users->setPhone($request->phone);
//        dd($users->getFullname());
        $users->create([]);


        dd($_SESSION);
        dd("$users");



        dd($_REQUEST);





        
    }
}