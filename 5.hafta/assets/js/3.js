/**
 * Değişkenlerin Scope Özellikleri
 *
 * Değişken nasıl tanımlarız?
 */

/**
 * var ile Değişken Tanımlama
 *
 * var ile tanımlanan değişkene;
 *  - her yerden ulaşabiliriz.
 *      - function scope adı verilir.
 *  - Tekrar tanımlama yapabiliriz.
 *  - Değerini güncelleyebiliriz.
 *
 */
console.clear();
//
// var fullName = "Sercan Özen";
// var fullName = "İsmail Özen";
//
// console.log(fullName);
//
// fullName = "Ayfer Özen";
// console.log(fullName);

/**
 * let ile Değişken Tanımlama
 *
 * let ile tanımlanan değişkene;
 *  - yalnızca tanımlandığı süslü parantezlerin arasında erişilir.
 *          - Block Scope Özelliği
 *  - tekrar TANIMLANAMAZ!
 *  - Değerlerini güncelleyebiliriz.
 */



let fullName = "Sercan Özen";
// let fullName = "İsmil Özen";
fullName = "Ayfer Özen";

console.log(fullName);


/**
 * const SABİT Tanımlama
 *
 * const ile tanımlanan değişkene
 *
 *  - değişkenin tamamı büyük harflerden oluşturulması tavsiye edilir.
 *  - Block Scope Özelliği - Yalnızca tanımlandığı süslü parantezlerin içerisinden
 *  erişilir.
 *  - Tekrar TANIMLANAMAZ !
 *  - Değeri GÜNCELLENEMEZ !
 *
 */

const AD = "Sercan";
// AD = "Test";
console.log(AD);


















