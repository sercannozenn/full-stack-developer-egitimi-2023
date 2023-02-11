/**
 * Değişken Veri Tipleri
 */

/**
 * Primitive Sıfat Veri Türü
 *
 * String
 * BigInt
 * Number
 * Boolean
 * Undefined
 *
 */
console.clear();

// var test;
// console.log(test);
// console.log(typeof test);


/**
 *
 * Reference - Referans Veri Türü - Object
 *
 * - Array - Dizi
 * - Null - Boş Değer Ataması
 * - Date - Tarih
 * - Object - Obje-Nesne
 *
 */


// var cities = ["İstanbul", "Ankara"];
// console.log(cities);
// console.log(typeof cities);

// var country = null;
// console.log(country);
// console.log(typeof country);

// var nowDate = new Date();
// console.log(nowDate);
// console.log(typeof nowDate);
//
// console.log(nowDate.getUTCFullYear());

/**
 * Obje Tanımlama - Nesne Tanımlama
 */

var person = {
    firstName: "Tuğçe",
    lastName: "Özen",
    age: 28,
    email: "sercan@gmail.com",
    address: {
        city: "İstanbul",
        district: "Kağıthane",
        postcode: 34060
    },
    cities: ['İstanbul', 'Ankara']
};

// console.log(person);
//
// console.log(typeof person);
// console.clear();
//
// // var email = person.email;
//
// // console.log(person.email);
// // console.log(email);
//
// console.log(person.cities);
// console.log(person.cities[1]);
//
// console.log(person.address.city)

/**
 * Fonksiyon - Function Tanımlama
 *
 */

function fullNameYaz(){
    console.log("Sercan Özen");
    console.log(person.firstName + " " + person.lastName);
}
// fullNameYaz();

    // Void
var fullNameYaz = function (){
    // console.log("Ayfer Özen");
    return "Ayfer Özen";
}

// fullNameYaz();

// console.log(typeof fullNameYaz)
console.log(fullNameYaz())


function topla()
{
    return 1 + 2;
}

console.log(topla());

function carpma(a,b)
{
    return a * b;
}

console.log(carpma(5,6))
























