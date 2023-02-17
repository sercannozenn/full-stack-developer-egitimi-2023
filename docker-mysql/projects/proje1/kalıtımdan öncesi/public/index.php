<?php
declare(strict_types = 1);

use Models\Employee;

ini_set("display_errors", 1);
error_reporting(E_ALL);
/**
 * OOP =>  Object-Oriented Programing
 *     =>  Nesne Yönelimi Programlama
 *
 *      -> Daha az kod yazmamızı sağlar.
 *      -> Daha net anlaşılır bir yapı sağlar.
 *
 *      Sınıflar(Classes) ve Nesneler (Objects)
 *
 *          ->nesne yönelimli programlamanın ana öğeleridir.
 *
 *
 *      - Sınıfları nesneler için şablon(template) olarak düşünebiliriz.
 *      - Nesneler ise sınıfın bir örneğidir.
 *
 *
 * En Klasik Örnek :)
 *
 * Sınıf => Araba
 * Nesneler => Renault | Kia | Audi
 *
 * Nesneler sınıfların tüm özelliklerine (property) ve davranışlarını miras/devr alırlar.
 */

/**
 * Çalışan Sınıfı
 */
require_once "../Models/Employee.php";


$employee1 = new Employee(29);
$employee1->setFirstName("Sercan");
$employee1->setLastName("Özen");

$employee1->lastname = "Keçe";

$employee2 = new Employee();
$employee2->setFirstName("Aygün");
$employee2->setLastName("Keçe");

//echo $employee1->getFirstName() . " " . $employee1->getLastName();
echo $employee1->getFullName() . "<br>";
echo $employee2->getFullName() . "<br>";

echo $employee1->getAge() . "<br>";
echo $employee2->getAge() . "<br>";

echo $employee1::getAddress() . "<br>";
echo $employee1::$address2;





/**
 *
 * Access Modifiers | Erişim Belirleyiciler
 *
 * Public    => ile tanımlanan method ya da özelliklere her yerden ulşılabilir.
 * Private   => ile tanımlanan method ya da özelliklere YALNIZCA tanımlandığı sınıf içerisinden ulaşılabilir.
 * Protected => ile tanımlanan method ya da özelliklere tanımlandığı sınıf ve
 *                                                      tanımlandığı sınıftan türeyen sınıflardan ulaşılabilir.
 */








