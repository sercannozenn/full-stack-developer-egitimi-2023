<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', "HomeController@index")->name("home");

Route::get("/about", "HomeController@about")->name("about");

Route::get("/contact", "ContactController@showForm")->name("contact");

Route::post("/contact", "ContactController@contact");

Route::post("/user/{id}/{name?}", "ContactController@user")
    ->name("user")
//    ->where("id", "[0-9]+");
    ->where(["id" => "[0-9]+", "name" => "[a-z]+"]);


Route::match(['get', "post"], "/support-form", "SupportFormController@support")->name("support-form.support");

Route::patch("/users/{id}/guncelle", "UserController@update")->name("user.update");
/**
 * Patch => Kullanıcının sadece bir bilgisi güncellenmek isteniyorsa kullanır. Örneğin yalnızca email
 *
 * Put => Kullanıcının tüm bilgilerini güncelleyebiliriz.
 */
Route::put("/users/{id}/tumunu-guncelle", "UserController@updateAll")->name("user.updateAll");

Route::delete("/users/{id}/sil", "UserController@delete")->name("user.delete");


Route::any("hersey", function(){
   dd("herşey geldi");
});



//Route::resource("article", "ArticleController");
//Route::apiResource("/api/article", "Api/ArticleController");

//Route::get("/users/{id}", "UserController@show")
//    ->name("user.show")
//    ->whereNumber("id");

Route::get("/users/{name}", "UserController@showName")
    ->name("user.showName")
//    ->whereAlpha("name");
    ->whereAlphaNumeric("name");


Route::get("/user/{role}", "UserController@roleCheck")
    ->name("user.roleCheck")
    ->whereIn('role', ['admin', "user"]);


Route::prefix("/admin")->group(function(){
   Route::get("/create-article", "ArticleController@create")->name("admin.create");
   Route::get("/edit-article", "ArticleController@edit")->name("admin.articleEdit");
   Route::post("/article/{id}/delete", "ArticleController@destroy")->name("admin.articleDestroy");
});

Route::controller(\App\Http\Controllers\UserController::class)->prefix("sercan")->group(function(){
   Route::get("/get-user", "getUser");
   Route::get("/delete-user", "deleteUser");
   Route::get("/delete-user2", "deleteUser");
});



























