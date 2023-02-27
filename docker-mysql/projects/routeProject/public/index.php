<?php
declare(strict_types = 1);
session_start();
//session_destroy();

use app\Core\Route;

require_once "../app/Helpers/helpers.php";
require_once "../app/Core/Route.php";
require_once "../app/Core/RequestValidator.php";
require_once "../app/Core/Controllers.php";
require_once "../app/Core/Model.php";
require_once "../app/Models/Users.php";
require_once "../resources/routes/web.php";
require_once "../resources/routes/api.php";
require_once "../vendor/autoload.php";

Route::dispatch();


