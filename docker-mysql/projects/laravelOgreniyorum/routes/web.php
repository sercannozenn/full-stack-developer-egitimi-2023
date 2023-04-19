<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;


Route::get('/', "HomeController@index")->name("home");

Route::get("/about", "HomeController@about")->name("about");

Route::get("/contact", "ContactController@showForm")->name("contact");

Route::post("/contact", "ContactController@contact");

Route::post("/user/{id}/{name?}", "ContactController@user")->name("user")
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


Route::any("hersey", function()
{
    dd("herşey geldi");
});


//Route::resource("article", "ArticleController");
//Route::apiResource("/api/article", "Api/ArticleController");

//Route::get("/users/{id}", "UserController@show")
//    ->name("user.show")
//    ->whereNumber("id");

Route::get("/users/{name}", "UserController@showName")->name("user.showName")
    //    ->whereAlpha("name");
    ->whereAlphaNumeric("name");


Route::get("/user/{role}", "UserController@roleCheck")->name("user.roleCheck")->whereIn('role', ['admin', "user"]);


Route::controller(\App\Http\Controllers\UserController::class)->prefix("sercan")->group(function()
{
    Route::get("/get-user", "getUser");
    Route::get("/delete-user", "deleteUser");
    Route::get("/delete-user2", "deleteUser");
});

Route::prefix("/admin")->middleware("auth")->group(function()
{
    Route::get("/", "AdminController@index")->name("admin.index");
    Route::get("/create-article", "ArticleController@create")->name("admin.create");
    Route::get("/edit-article", "ArticleController@edit")->name("admin.articleEdit");
    Route::post("/article/{id}/delete", "ArticleController@destroy")->name("admin.articleDestroy");
});

Route::get("/login", "Auth\LoginController@showLoginForm")->name("auth.login");
Route::post("/login", "Auth\LoginController@login");
Route::post("/logout", "Auth\LoginController@logout")->name("auth.logout");


//Route::get('/profile', function () {
//    // ...
//})->withoutMiddleware([EnsureTokenIsValid::class]);

Route::get("upsert1", function()
{

    //    \App\Models\Article::updateOrCreate(
    //        [
    //            "title" => "Prof.",
    //            "slug_name" => "prof"
    //        ],
    //        // Koşul => Güncellenecek alan
    //        [
    //            "body" => "test3",
    //            "is_active" => 1
    //        ]
    //    );

    $articles = \App\Models\Article::select("title", "is_active")
        ->get()
        ->reject(function(\App\Models\Article $article)
        {
            return $article->is_active === 0;
        })->map(function(\App\Models\Article $article){
            return $article->title;
    });

    $articleNames = \App\Models\Article::where("is_active", 0)
        ->select("title")
        ->get();


    dd($articles, $articleNames->pluck("title"));

});





















