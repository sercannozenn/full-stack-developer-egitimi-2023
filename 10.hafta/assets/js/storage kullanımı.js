/**
 * Javascript ile arayacının hafızasında veri tutmak için kullanılan 2 Yöntem:
 *
 * 1- Local Storage
 *              Silinen kadar tarayıcıda kalıcı olarak kalır.
 * 2- Session Storage
 *              Tarayıcı kapanana kadar kullanılabilir.
 *              Silinene kadar kullanılabilir.
 */
// console.log(localStorage);
// console.log(sessionStorage);


/**
 * Veri yazma işlemi => setItem
 * Veri okuma işlemi => getItem
 * Veri silme işlemi => removeItem
 * Tamamen temizleyeceksem => clear
 */


// let firstName = "Umut";
// let lastName  = "Sarı";

// localStorage.setItem("firstName", firstName);
// localStorage.setItem("lastName", lastName);
//
// sessionStorage.setItem("firstName", firstName);
// sessionStorage.setItem("lastName", lastName);

// console.log(localStorage);
// console.log(sessionStorage);


/**
 * Dizileri ve Objeleri / Nesneler Storage a Yazma
 */

let numbers = [5,6,7];
let numbers2 = [55,67,78];

let person = {
    firstName: "Secan",
    lastName : "Özen"
}

sessionStorage.setItem("numbers", numbers);
sessionStorage.setItem("numbers2", JSON.stringify(numbers2));
sessionStorage.setItem("person", JSON.stringify(person));


/**
 * Dizileri ve Objeleri Okuma
 */

// let numbers2 = sessionStorage.getItem("numbers2");
// numbers2 = JSON.parse(numbers2);
//
// // console.log(sessionStorage.getItem("numbers"));
// console.log(JSON.parse(sessionStorage.getItem("numbers2")));
// console.log(numbers2);
// console.log(JSON.parse(sessionStorage.getItem("person")));
//
// console.log(sessionStorage);

/**
 * Silme İşlemi
 */

// sessionStorage.removeItem("numbers");
//
// sessionStorage.clear();
let sayi = 20;
sessionStorage.setItem("sayi", JSON.stringify(sayi));

let gelen = JSON.parse(JSON.stringify(sayi));
console.log(sessionStorage);
console.log(typeof gelen);
document.cookie = "names=sercan" + new Date(2023,2,1,11,0);
console.log(document.cookie);

















