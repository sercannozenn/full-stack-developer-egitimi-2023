<?php
namespace app\Controllers;
class RegisterController
{
    public function registerShowForm(): void
    {
        view("register-form");
    }

    public function work(int $id, int $workId)
    {
//        dd("geldi");
        view("work", [
            'id' => $id,
            "workID" => $workId
        ]);
    }

    public function anasayfayaGit()
    {
        return route("index");
    }

    public function workDetail(int $id, int $workId)
    {
//        dd([$id, $workId]);
        return route("users.workDetail", [
            '{id}' => $id,
            '{work_id}' => $workId
        ]);
    }
}