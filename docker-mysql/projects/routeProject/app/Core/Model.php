<?php

namespace app\Core;

class Model
{
    public Model $model;
    public function create(array $data): void
    {
        session_destroy();
//        $this->check();
//        dd($_SESSION);
//        dd(json_encode($data));
        $_SESSION['users'][] = json_encode($this->model);
    }
    private function check()
    {
        $users =unserialize($_SESSION['users'][0]);
        $modelNew = new $users->model;
        $modelNew->setUser($users);
        dd($modelNew['user']);
        dd($modelNew->user->getFullname());
        dd($users);
        dd(unserialize($_SESSION['users'][0]->email));
        $check = array_filter($_SESSION['users'], function($item){
//            dd($item->email);
           return $item->email == "srcn.ozn5@gmail.com";
        });
        dd($check);
        dd(array_search("srcn.ozn5@gmail.com", $_SESSION['users']));
//        $_SESSION['users']
    }
}