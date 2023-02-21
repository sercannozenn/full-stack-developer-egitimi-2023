<?php
use \app\Core\Route;

Route::get("/sercan", function()
{
    view("index");
});

Route::get("/kayit", "KayitController@kayitFormGoster");
Route::post("/kayit", "KayitController@kayit")->name("form.kayit");







Route::get("/register", "RegisterController@showForm")->name("register.showForm");
Route::post("/register", "RegisterController@register")->name("register.showForm");





Route::get("/ansayfaya-git", "RegisterController@anasayfayaGit");

Route::get("/", function(){
    echo "burası anasayfa";
})->name("index");

Route::get("/users/{id}/works/{work_id}", "RegisterController@work")->where([
    'id' => "([0-9]+)",
    'work_id' => "([0-9a-z]+)"
])->name("users.workDetail");

Route::get("/work-detail/{id}/{workId}", "RegisterController@workDetail");

Route::get("/register", "RegisterController@registerShowForm");
//Route::post("/register", "RegisterController@register");
Route::post("/form", "RegisterController@register");
Route::put("/register", "RegisterController@register");


Route::prefix("/admin")->group(function()
{
   Route::get("/", "AdminController@index");
   Route::get("/register", "AdminController@register");
   /**
    * /admin/
    * /admin/register
    */
});


Route::dispatch();