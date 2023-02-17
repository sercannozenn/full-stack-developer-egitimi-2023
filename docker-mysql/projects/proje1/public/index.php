<?php

/**
 *
 * Abstraction | Soyutlama
 *
 * Abstract Class Nedir?
 *
 *      -> Abstract sınıflarda, nomal sınıflar gibi değişkenler ve methodlar tanımlayabiliriz.
 *      -> Normal sınıflar ile ayrıştığı en önemli nokta içerisinde ABSTRACT METHODLAR bulundurabilmesidir.
 *
 *
 * Peki Bu Abstract Methodlar Nedir?
 *      -> abstract anahtar sözcüğü ile tanımlanırlar.
 *      -> abstract sınıfın extends edildiği sınıflarda abstract methodlar çağırılmak zorundadır.
 *      -> abstract methodların parametrelerini, geri dönüş tiplerini ve erişim belirleyicilerini
 *          abstract classlarda belirleyebiliriz.
 *      -> Extends adilmiş sınıf belirlenen Kurallara uymak zorundadır.
 *
 * Neden Abstract Classları Kullanmaya İhtiyaç Duyarız?
 *
 *      -> Tabiki daha kararlı yapılar kurmak için
 *      -> Belli bir şablo doğrultusunda sınıflarımızın nasıl çalıştığından emin olmak için.
 *
 */

/**
 * Interfaceler içerisinde Abstract Classlardan Farklı olarak yalznızca PUBLIC değerler tanımlayabiliriz.
 *
 * Aynı class üzerinde birden fazla interface kullanılabilir. (Imlemente edilebilir)
 * Sabit değişkenler ve soyut methodlar tanımlanabilir.
 */



//echo $teacher->teach("İngilizce");
//echo "<br>";
//
//$teacher->setExperience(10);
//echo $teacher->calculateSalary();
//echo "<br>";
//$matematik = new Matematik();
//echo $matematik->teach("Matematik");
//echo "<br>";
//
//echo $matematik->calculateSalary();
//echo "<br>";
//echo "<br>";
//
//$ileriIngilizce = new IleriIngilizce();
