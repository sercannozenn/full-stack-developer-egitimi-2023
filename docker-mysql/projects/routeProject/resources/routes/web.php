<?php
use \app\Core\Route;

Route::get("/", function()
{
    view("index");
});

Route::post("/register", "RegisterController@register");

