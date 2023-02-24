<?php
use \app\Core\Route;

Route::get("/", function()
{
    view("index");
});

Route::post("/register", "RegisterController@register");

Route::get("/login", "LoginController@showForm")->name("login.showForm");
//dd("")
Route::post("/login", "LoginController@login");

Route::get("/admin/home", function(){
    if (!isset($_SESSION['isLogin']) || !$_SESSION['isLogin'])
    {
        \route("login.showForm");
        exit();
    }

    view("admin/index");
})->name("admin.index");

Route::get("/admin/logout", function(){
    $_SESSION['isLogin']  = false;
    unset($_SESSION['loginUser']);

    \route("login.showForm");
});

