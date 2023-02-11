/**
 *
 * setInterval => Belirli aralıklarla bir kodu çalıştırmak istediğimizde
 * setTimeout  => Belirli bir sürenin sonunda bir kodu çalıştırmak istediğimizde
 */

let liste = document.querySelector("#liste");
let btnStop = document.querySelector("#btnStop");

btnStop.onclick= function () {
    clearInterval(elemanEkle);
};
// function listeyeLiEkle() {
//     let dahaOnceEklenenLiSayisi = document.querySelectorAll("li").length;
//
//     let li = document.createElement("li");
//     li.innerText = dahaOnceEklenenLiSayisi + 1 + ". Eleman";
//
//     liste.appendChild(li);
// }
function listeyeLiEkle() {
    let dahaOnceEklenenLiSayisi = document.querySelectorAll("li").length;

    if (dahaOnceEklenenLiSayisi < 10)
    {
        let li = document.createElement("li");
        li.innerText = dahaOnceEklenenLiSayisi + 1 + ". Eleman";

        liste.appendChild(li);
    }
    else
    {
        clearInterval(elemanEkle);
    }


}

let elemanEkle = setInterval(listeyeLiEkle, 1000);

// setTimeout(intervalDurdur, 5000);

let sayac = 0;
setTimeout(function () {
    alert("Eleman ekleme işlemi bitti");
}, 10500);

function intervalDurdur(){
    clearInterval(elemanEkle);
}