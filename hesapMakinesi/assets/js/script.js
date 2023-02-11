/**
 * İhtiyaçlar
 *
 * Basılan değeri almak
 *
 * Basılan değer sayıysa:
 *      - Daha önce hiç sayı tutulmamışsa 1.sayıya basılan değeri eşitle.
 *      - Bir önceki basılan değer +-* falan değilse sayıysa birleştir
 *      - Bir önceki basılan değer +-* falansa farklı bir değişkende(sayi2)
 *              şu anki basılanı tut
 *
 * Basılan değer +-*= ise
 *      - ve daha önce en az iki sayı hafızada tutulmuşsa
 *              SONUÇ İLE daha önce basılmış değeri işleme sok.
 *     - daha önce iki farklı sayı hafızada tutulmamışsa ve bir sayı hafıza tutulmuşsa
 *      son basılan işlemi hafızada tut ve bir sonraki işleme basıldığında
 *      üst adımı yap.
 *
 *
 *     İşlem yapıldığında da son tutulan iki sayıyı sil ve istersen
 *          arraye yapılan işlemi kaydet history gibi kullanılabilir.
 *
 *
 */
$(document).ready(function ()
{
    let button = $(".button");
    let screen = $(".screen");

    button.click(function ()
    {
        let clickButton = $(this).text();
        let numberCheck = Number(clickButton);

        let localStorageResult = sessionStorage.getItem("result");

        var sayi1 = sessionStorage.getItem("sayi1");
        var sayi2 = sessionStorage.getItem("sayi2");
        var sonBasilan = sessionStorage.getItem("sonBasilan");
        var islem = sessionStorage.getItem("islem");

        let result = localStorageResult && localStorageResult !== "" ? localStorageResult : 0; //single if

        if (Number.isInteger(numberCheck))
        {
            // Sayıysa
            sonuc = numberProcess(numberCheck, result, sayi1, sayi2, sonBasilan, islem);
        }
        else
        {
            // Sayı değilse
            sonuc = charProcess(clickButton, result, sayi1, sayi2, sonBasilan, islem);
        }
        sessionStorage.setItem("result", sonuc);
        sessionStorage.setItem("sonBasilan", clickButton);



    });
    function lastMemoryCheck(sayi1)
    {
        return Number(sayi1);
    }

    function numberProcess(text, result, sayi1, sayi2, sonBasilan, islem)
    {
        let lastMemoryCheckResult = lastMemoryCheck(sayi1);
        sayi2 = Number(sayi2);
        if (!isNaN(lastMemoryCheckResult) && lastMemoryCheckResult !== undefined && lastMemoryCheckResult === 0
        && sonBasilan !== "*" && sonBasilan !== '/' && sonBasilan !== "+" && sonBasilan !== "-" && sonBasilan !== "=")
        {
            sessionStorage.setItem("sayi1", text);
            screen.text(text);
        }
        else if (lastMemoryCheckResult > 0 && sayi2 === 0 && sonBasilan !== "*" && sonBasilan !== '/' && sonBasilan !== "+" && sonBasilan !== "-" && sonBasilan !== "=")
        {
            sayi1 = sayi1.toString() + text;
            sessionStorage.setItem("sayi1", sayi1);
            screen.text(sayi1);

        }
        else if (lastMemoryCheckResult > 0 && sayi2 === 0 && (sonBasilan === "*" || sonBasilan === '/' || sonBasilan === "+" || sonBasilan === "-"))
        {
            sessionStorage.setItem("sayi2", text);
            screen.text(sayi1.toString() + " " + islem + " " + text);

        }
        else if (lastMemoryCheckResult > 0 && sayi2 > 0 && islem !== null && islem !== "")
        {
            let sayi2Result = sayi2.toString() + text.toString();
            sessionStorage.setItem("sayi2", sayi2Result);

            screen.text(sayi1.toString() + " " + islem + " " + sayi2Result);

        }
        else
        {

            // Yeni işleme geç
            sessionStorage.setItem("sayi1", text);
            screen.text(text);
        }
    }

    function charProcess(text, result, sayi1, sayi2, sonBasilan, islem)
    {
        sayi1 = Number(sayi1);
        sayi2 = Number(sayi2);

        if (Number(sayi1) > 0 && Number(sayi2) === 0)
        {
            sessionStorage.setItem("islem", text);
            if (islem !== "=")
            {
                screen.text(sayi1.toString() + " " + text);
            }
        }
        else if (Number(sayi1) > 0 && Number(sayi2) > 0 && islem !== 0 && islem !== undefined && (islem === '+' || islem === '*' || islem === '-' || islem === '/' || islem === "="))
        {
            let sonuc;
            switch (islem)
            {
                case "+":
                    sonuc = sayi1 + sayi2;
                    break;
                case "-":
                    sonuc = sayi1 - sayi2;
                    break;
                case "*":
                    sonuc = sayi1 * sayi2;
                    break;
                case "/":
                    sonuc = sayi1 / sayi2;
                    break;
                case "=":
                    sonuc = sayi1;
                    break;
                default:
                    alert("Uygun işlem gelmedi");
                    break;
            }
            sessionStorage.setItem("islem", text);
            sessionStorage.setItem("sayi1", sonuc);
            sessionStorage.setItem("sayi2", 0);
            screen.text(sonuc);
        }
        else
        {
            alert("Char bulunamadı")
        }
    }

    screen.text(sessionStorage.getItem("sayi1"));
});