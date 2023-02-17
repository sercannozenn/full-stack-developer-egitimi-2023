<?php
include_once "../models/Teacher.php";
//include_once "../models/Ingilizce.php";
include_once "../models/Matematik.php";
include_once "./Matematik.php";

use models\Matematik as matematikOgretmeni;
//use public\Matematik as newMatematik;


$matematik = new matematikOgretmeni();
//$matematik2 = new newMatematik();

echo $matematik->calculateSalary();
echo "<br>";
//echo $matematik2->calculateSalary();