<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        $age = 10;

        $person = new \stdClass();
        $person->age = $age;

//        return view("front.index", ['age' => $age]);
//        return view("front.index", compact("age"));
//        return view("front.index")->with('age', $age)->with("sercan", "Recep");
//        return view("front.index")->with(['age' => $age, 'sercan' => "Recep"]);

        return view("front.index", compact("person"));
//        return view("front.index");
    }

    public function about()
    {
//        return redirect(route("contact"));
//        return redirect()->route("contact");
        return Redirect::route("contact");
    }

    public function contact()
    {
        return view("front.contact");
    }

}
