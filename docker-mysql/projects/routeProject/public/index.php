<?php
declare(strict_types = 1);

use app\Core\Route;

require_once "../app/Helpers/helpers.php";
require_once "../app/Core/Route.php";
require_once "../resources/routes/web.php";
require_once "../resources/routes/api.php";

Route::dispatch();
