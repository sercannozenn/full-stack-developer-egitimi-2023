<?php
namespace app\Core;

use app\Core\RequestValidator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class Controllers
{
    use RequestValidator;
    public object $request;

    protected function validate(array $options, array $message)
    {
        $request = (object)$_REQUEST;
        $this->request = $request;
        $result = [];
        foreach ($options as $key => $value)
        {

            if (!isset($_REQUEST[$key]))
            {
                $result[$key][] = "Bulunamadı";
            }
            else
            {
                ${$key} = $request->{$key};

                $processResult = $this->itemValidate(${$key}, $value);
                if (count($processResult))
                {
                    foreach ($processResult as $process)
                    {
                        $result[$key][] = $message[$key . "." . $process];
                    }
                }
            }
        }

        if (count($result))
        {
            $_SESSION['errors'] = json_encode($result);
            header("Location: /");
            exit();
        }

    }


}