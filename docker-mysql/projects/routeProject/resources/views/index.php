<?php
$errors = new stdClass();
if (isset($_SESSION['errors']) && !empty($_SESSION['errors']))
{

    $errors = json_decode($_SESSION['errors']);
//    dd($errors);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="../../public/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <form action="/register" method="POST" class="col-8 mx-auto" id="registerForm">
        <h1 class="mt-5">Kayıt Ol</h1>
        <?php
        if (count((array)$errors))
        {
            foreach ($errors as $item)
            {
                foreach ($item as $itemContent)
                {
                    echo "<small class='alert alert-danger d-block'>" . $itemContent . "</small>";
                }
            }

        }
        ?>
        <input type="text" class="form-control mt-5" name="fullname" placeholder="Ad/Soyad" id="fullname" value="recep">
        <?php
        if (count((array)$errors) && property_exists($errors, "fullname"))
        {
            foreach ($errors->fullname as $fulnameError)
            {
                echo $fulnameError . "<br>";
            }
        }
        ?>
        <input type="text" class="form-control mt-5" name="email" placeholder="Email" id="email">
        <?php
        if (count((array)$errors) && property_exists($errors, "email"))
        {
            foreach ($errors->email as $itemEmail)
            {
                echo $itemEmail . "<br>";
            }
        }
        ?>
        <input type="text" class="form-control mt-5" name="phone" placeholder="Telefon" id="phone">
        <?php
        if (count((array)$errors) && property_exists($errors, "phone"))
        {
            foreach ($errors->phone as $itemPhone)
            {
                echo $itemPhone . "<br>";
            }
        }
        ?>
        <div class="row">
            <div class="col-6 mx-auto">
                <button type="button" class="btn btn-danger mt-5 w-100" id="btnNext">İleri</button>
            </div>
        </div>
    </form>
</div>

<script src="../../public/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../public/node_modules/jquery/dist/jquery.min.js"></script>
<script src="../../public/assets/js/aures-validator.js"></script>
<script>
    $(document).ready(function () {
        let btnNext = $("#btnNext");
        let registerForm = $("#registerForm");
        let formInputList = $("form > input");
        console.log(formInputList);
        let inputValidate = {
                'fullname':"required|min:1|max:30",
                "email": "required|min:3|max:30|type:email",
                "phone": "required|min:11|max:11|type:phone"
            };

        btnNext.click(function () {
            registerForm.submit();

            // let sonuc = aures(formInputList, inputValidate);
            // if (sonuc)
            // {
            //     registerForm.submit();
            // }

        });



        });

</script>
</body>
</html>