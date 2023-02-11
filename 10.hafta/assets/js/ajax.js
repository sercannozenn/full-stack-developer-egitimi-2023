/**
 * Ajax İşlemleri Varsayılan olarak Asenkron çalışır.
 *
 * Senkron Nedir?
 * Senkron programlamada kodlar yukarıdak aşağı doğru hiyerarşik olarak çalışır.
 *
 * Asenkron Nedir?
 *  Öncelikli olarak hangi kod bloğu çalışsın isteniyorsa o çalışır.
 *
 *  Javascriptin varsayılan ajax işlemlerine
 *                  XML HTTP Request
 *                      dernir.
 */

let btnGetData = document.querySelector("#btnGetData");
let btnGetContent = document.querySelector("#btnGetContent");
let divContent = document.querySelector("#content");
let gelenCevep;

btnGetData.addEventListener("click", function (event) {

    let xhttp;

    if (window.XMLHttpRequest)
    {
        // Tarayıcımız XML HTTP Request i destekliyorsa
        xhttp = new XMLHttpRequest();
    }
    else
    {
        // Tarayıcı desteklemiyorsa
        xhttp =  new ActiveXObject();
    }
    /**
     * İsteğin durumunu izleme
     */

    // xhttp.onreadystatechange = function () {
    //
    // };

    xhttp.addEventListener("readystatechange", function () {
        /**
         * Durumlar
         * readystate
         *
         * 0 => İstek henüz başlatılmadı
         * 1 => İstek açıldı.
         * 2 => İstek gönderildiğinde.
         * 3 => Yüklendiğinde.
         * 4 => İstek tamamlandığında.
         */

        console.log(this.readyState);
        console.log(this.status);

        // if (this.status === 200)
        // {
        //     switch (this.readyState)
        //     {
        //         case 0:
        //
        //             console.log("İstek henüz başlatılmadı");
        //             break;
        //         case 1:
        //             console.log("ss")
        //             break;
        //         case 2:
        //
        //             break;
        //         case 3:
        //
        //             break;
        //         case 4:
        //             if (this.status === 200)
        //             break
        //         default:
        //
        //             break
        //     }
        // }

        if (this.readyState === 4 && this.status === 200)
        {
            // console.log(this.response);
            let response = this.response;
            response = response.replace(/\\n\\*/g, ' ');
            // console.log(response);
            gelenCevep = JSON.parse(response);
            // console.log(this.response.indexOf("\\n"));

            // console.log(typeof gelenCevep);
            // console.log(JSON.parse(gelenCevep));
        }


    });



    xhttp.open("GET", "https://jsonplaceholder.typicode.com/posts", true);
    /**
     * true  => senkronize olarak arka planda yap.
     * false => Tüm işlemlerin bitmesini bekle ve sonrasında veriyi ver.
     */
    xhttp.send();

});

btnGetContent.addEventListener("click", function (event) {
    if (gelenCevep !== undefined && gelenCevep !== null && Array.isArray(gelenCevep))
    {
        gelenCevep.forEach(function (row) {
            let h3 = document.createElement("h3");
            let title = row.title;
            h3.innerText = title;
            if (row.id % 2 === 0)
            {
                h3.style.color = "green";
            }
            else
            {
                h3.style.color = "red";
            }

            let paragraph = document.createElement("p");
            paragraph.innerText = row.body;

            divContent.appendChild(h3);
            divContent.appendChild(paragraph);
        });
    }
});